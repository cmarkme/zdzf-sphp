<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $user;
	public $title;
	public $theme_style;
	private $location = array('controller' => '', 'method' => '');
	private $method;
	private $notifier;

	public function __construct() {
		parent::__construct();
		
		session_start();
		//$this->output->enable_profiler(TRUE);
		$this->config->load('aa_config');
		
		$this->title = $this->config->item('site_name');

		$this->load->set_theme($this->config->item('theme'));
		$this->user = $this->users_model->load_user_data();
		$this->theme_style = $this->config->item('theme_style');
		$this->notifier = new user_notifier;

		if(($this->users_model->is_admin() == false) && ($this->uri->segment('1') != 'login')) {
			
			redirect('login');
		}
		else {

			if(isset($this->user->meta['theme']) && $this->user->meta['theme'] != 'default')
			{
				$this->theme_style = $this->user->meta['theme'];
			}

			$this->location['controller'] = $this->uri->rsegment(1); // The Controller
			
			if(!is_numeric($this->uri->rsegment(2))) 
			{
				$this->location['method'] = $this->uri->rsegment(2); // The Function 
			}

			if (preg_match('/([0-9]+)/', $this->uri->segment(1))) 
			{
				$location = '';
			}
			elseif(strlen($this->location['method']))
			{
				$location = implode('/', $this->location);			
			}
			else
			{
				$location = $this->location['controller'];
			}

			if((!can_this_user($location) && !can_this_user($location.'/all')) && $this->uri->segment(1) != '') {
				redirect('cheat');
			}
		}

	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */