<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends MY_Controller {
    
    function __construct()
	{
		parent::__construct();
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{  
		$GLOBALS['_title'] = "Alzheimer's Association";
       	$data = array();
       	$data['caldata'] = array();
       	$data['timesheets'] = $this->timesheet_model->get_dashboard_list($this->user->ID, 5, 0);
       	$data['timeoff_requests'] = $this->timeoff_model->get_dashboard_list($this->user->ID, 5, 0);
       	
		$prefs = array (
			'show_next_prev'  => TRUE,
			'next_prev_url'   => site_url(),
			'month_type'   => 'long',
            'day_type'     => 'short'
		);

		$prefs['template'] = '

		   {table_open}<table border="0" cellpadding="0" cellspacing="0" class="ui-datepicker-calendar">{/table_open}

		   {heading_row_start}<tr>{/heading_row_start}

		   {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
		   {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
		   {heading_next_cell}<th style="text-align: right;"><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

		   {heading_row_end}</tr>{/heading_row_end}

		   {week_row_start}<tr>{/week_row_start}
		   {week_day_cell}<td class="weekname ui-state-default">{week_day}</td>{/week_day_cell}
		   {week_row_end}</tr>{/week_row_end}

		   {cal_row_start}<tr>{/cal_row_start}
		   {cal_cell_start}<td class="weekday ui-state-default">{/cal_cell_start}

		   {cal_cell_content}{day}<div class="day-event">{content}</div>{/cal_cell_content}
		   {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

		   {cal_cell_no_content}{day}{/cal_cell_no_content}
		   {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

		   {cal_cell_blank}&nbsp;{/cal_cell_blank}

		   {cal_cell_end}</td>{/cal_cell_end}
		   {cal_row_end}</tr>{/cal_row_end}

		   {table_close}</table>{/table_close}
		';

		$caldata = $this->timeoff_model->get_by_month($this->uri->segment(4), $this->uri->segment(3));

		foreach($caldata as $cal)
		{	
			$first = date('j', strtotime($cal->request_start));
			$last = date('j', strtotime($cal->request_end));

			for($first; $first < $last+1; $first++)
			{
				@$data['caldata'][$first] .= '<p>'.$cal->first_name.' '.$cal->last_name.' Requested time off ('.$cal->current_status.')</p>';
			}
		}
		
		$this->calendar->initialize($prefs);

		$this->load->view('common/home', $data);
	}

	public function cheat()
	{
		$this->load->view('common/cheat');
	}

	public function login()
	{
		$this->load->helper('cookie');
		$data = array();
		$data['login'] = 'Username';
		
		$this->form_validation->set_rules('usr', 'Username', 'trim|required|xss_clean|callback_user_not_default|callback_check_user_login');
		$this->form_validation->set_rules('pwd', 'Password', 'trim|required|xss_clean|callback_password_not_default');
		
		if($this->form_validation->run() !== FALSE) {
			
			redirect('');
		}

		if($this->input->cookie('last_login_name', true))
		{
			$data['login'] = $this->input->cookie('last_login_name', true);
		}
		
		$this->load->view('common/login', $data);
	}

	public function user_not_default($str) 
	{
		if ($str == 'Username')
		{
			$this->form_validation->set_message('user_not_default', 'Please enter a correct value for the %s field');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function password_not_default($str) 
	{
		if ($str == 'Password')
		{
			$this->form_validation->set_message('password_not_default', 'Please enter a correct value for the %s field');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function check_user_login($usr, $pwd)
	{
		if(!$this->users_model->admin_login($usr, $this->input->post('pwd'))) {
				
			$this->form_validation->set_message('check_user_login', 'Username or Password do not match our records.');

			return FALSE;
		}

		return TRUE;
	}

	public function logout() {
        
        $_SESSION['_alz_wils_data'] = '';
        unset($_SESSION['_alz_wils_data']);
        session_destroy();
        
        redirect('login');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */