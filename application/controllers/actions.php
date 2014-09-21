<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actions extends MY_Controller {
    
    function __construct()
	{
		parent::__construct();
	}

	public function users_add()
	{
		$this->form_validation->set_rules('user_name', 'Username', 'required|xss_clean|trim|is_unique[users.user_name]');
		$this->form_validation->set_rules('user_password', 'Password', 'required|xss_clean|matches[con_password]|trim');
		$this->form_validation->set_rules('con_password', 'Password Confirmation', 'required|xss_clean|matches[user_password]|trim');
		$this->form_validation->set_rules('user_email', 'Email', 'required|xss_clean|valid_email|trim|is_unique[users.user_email]');

		$this->form_validation->set_message('is_unique', '%s already exists in the database');

		if ($this->form_validation->run() == FALSE)
		{
			return json_encode(array(
				'status' => 'fail',
				'message' => 'There wa'
				));
		} 
		else 
		{
			$this->users_model->insert($this->input->post());
			redirect('users/edit/'.$insert_id);
		}
	}
}

/* End of file actions.php */
/* Location: ./application/controllers/actions.php */