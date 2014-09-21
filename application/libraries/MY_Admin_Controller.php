<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Admin_Controller extends CI_Controller {

	public $user;
	public $title;
	private $controller;
	private $method;
	private $notifier;

	public function __construct() {
		parent::__construct();
		
		session_start();
		//$this->output->enable_profiler(TRUE);
		$this->config->load('aa_config');
		
		$this->title = $this->config->item('site_name');

		$this->load->set_theme($this->config->item('theme'));

		$this->notifier = new user_notifier;

		if(($this->users_model->is_admin() == false) && ($this->uri->segment('1') != 'login')) {
			
			redirect('login');
		}

		$this->controller = $this->uri->rsegment(1); // The Controller
		$this->method = $this->uri->rsegment(2); // The Function 


		if($this->controller == 'helpline' && $this->method == 'profile') {
			//redirect('login');
		}

		$this->user = $this->users_model->load_user_data();
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */