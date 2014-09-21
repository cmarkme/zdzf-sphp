<?php 

class user_notifier 
{
	private $user;
	private $moduel;
	private $data;
	private $to;
	private $subject;
	private $message;
	private $headers;

	function user_notifier()
	{

	}

	function set_user($user)
	{
		$CI =& get_instance();

		$this->user = $CI->users_model->get_user( $user );
		$this->manager = $CI->users_model->get_user($this->data['manager']);
	}

	function set_data($data)
	{
		$this->data = $data;
	}

	function set_template($module, $type)
	{
		$obj = $this->email_model->get_email($module, $type);
		
		$this->module = $module;
		$this->to = self::get_real_to($obj->send_to);
		$this->subject = $obj->subject;
		$this->message = self::parse_message_shortcodes($obj->message);
	}

	public function get_message()
	{
		return $this->message;
	}

	function get_real_to($to)
	{
		switch($to)
		{
			case '[user]':
				return $this->user->user_email;
			break;

			case '[manager]':
				return $this->manager->user_email;
			break;

			default;
				return $to;
			break;
		}
	}

	function parse_message_shortcodes($message)
	{
		switch($this->module)
		{
			case 'timesheet':
				$find = array('[first_name]', '[last_name]', '[email]', '[manager_first_name]', '[manager_last_name]', '[period_start]', '[period_end]', '[chargable_hours]', '[holiday]', '[unpaid_time_off]', '[personal_time]', '[total_hours]', '[vacation]', '[sicktime]', '[birthday]', '[other]', '[date_created]');

				$replace = array($this->user->meta['first_name'], $this->user->meta['last_name'], $this->user->user_email, $this->manager->meta['first_name'], $this->manager->meta['last_name'], date_for_display($this->data['period_start']), date_for_display($this->data['period_end']), $this->data['chargable_hours'], $this->data['holiday'], $this->data['unpaid_time_off'], $this->data['personal_time'], $this->data['total_hours'], $this->data['vacation'], $this->data['sicktime'], $this->data['birthday'], $this->data['other'], date_for_display($this->data['date_created']));
			break;

			case 'timeoff':
				$find = array('[first_name]', '[last_name]', '[email]', '[manager_first_name]', '[manager_last_name]', '[current_status]', '[request_type]', '[combination]', '[days_or_hours]','[request_start]', '[request_end]', '[comments]', '[date_created]');

				$replace = array($this->user->meta['first_name'], $this->user->meta['last_name'], $this->user->user_email, $this->manager->meta['first_name'], $this->manager->meta['last_name'], $this->data['current_status'], $this->data['request_type'], $this->data['combination'], $this->data['days_or_hours'], date_for_display($this->data['request_start']), date_for_display($this->data['request_end']), $this->data['comments'], date_for_display($this->data['date_created']));
			break;

			case 'travel':
				$find = array('[first_name]', '[last_name]', '[email]', '[manager_first_name]', '[manager_last_name]', '[current_status]', '[month_of]', '[date_created]');

				$replace = array($this->user->meta['first_name'], $this->user->meta['last_name'], $this->user->user_email, $this->manager->meta['first_name'], $this->manager->meta['last_name'], $this->data['current_status'], $this->data['for_month'], date_for_display($this->data['date_created']));
			break;

			default:
				$find = $replace = array();
			break;
		}

		return str_replace($find, $replace, $message);
	}

	function send()
	{
		if($this->to && $this->subject)
		{
			$this->headers  = 'MIME-Version: 1.0' . "\r\n";
			$this->headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
			mail($this->to, $this->subject, $this->message, $this->headers);			
		}
	}
}
?>