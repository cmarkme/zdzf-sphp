<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {
    
    var $cap_list;

    function __construct()
    {
        parent::__construct();

        $this->cap_list = $this->config->item('cap_list');
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
		if($this->input->post('bulk_action') && ($this->input->post('bulk_action') != 'bulk')) {
			$this->users_model->do_bulk_action($this->input->post('bulk_action'), $this->input->post('b_action'));
		}

		$data['users'] = $this->users_model->get_all_users();       
		$this->load->view('users/list', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('user_name', 'Username', 'required|xss_clean|trim|is_unique[users.user_name]');
		$this->form_validation->set_rules('user_password', 'Password', 'required|xss_clean|matches[con_password]|trim');
		$this->form_validation->set_rules('con_password', 'Password Confirmation', 'required|xss_clean|matches[user_password]|trim');
		$this->form_validation->set_rules('user_email', 'Email', 'required|xss_clean|valid_email|trim|is_unique[users.user_email]');

		$this->form_validation->set_message('is_unique', '%s already exists in the database');

		if ($this->form_validation->run() == FALSE)
		{
			$accounts = $this->labor_model->get_accounts();

			foreach($accounts['rows'] as $account) {
				$data['accounts'][$account->ID] = $account->ledger;
			}

			$users = $this->users_model->get_all_users();

			foreach($users as $user) {
				$data['users'][$user->ID] = $user->user_name;
			}

			$data['user_roles'] = $this->users_model->getUserRoles();

			$this->load->view('users/add', $data);
		} 
		else 
		{
			$insert_id = $this->users_model->insert($this->input->post());
            $this->session->set_flashdata('user', 'User account has been saved.');
			redirect('users/edit/'.$insert_id);
		}
	}

    public function edit($id)
    {
        if($this->input->post('update_user'))
        {
            $this->users_model->update_user($this->input->post(), $id);
            $this->session->set_flashdata('user', 'User account has been updated.');
            redirect('users/edit/'.$id);
        }

        $data['user'] = $this->users_model->get_user($id);
        $accounts = $this->labor_model->get_accounts();

        foreach($accounts['rows'] as $account) {
            $data['accounts'][$account->ID] = $account->ledger;
        }

        $users = $this->users_model->get_all_users();
        $data['user_roles'] = $this->users_model->getUserRoles();

        foreach($users as $user) {
            $data['users'][$user->ID] = $user->user_name;
        }

        $this->load->view('users/edit', $data);
    }

	public function my_profile()
	{
        $id = $this->user->ID;

		if($this->input->post('update_user'))
		{
			$this->users_model->update_user($this->input->post(), $id);
            $this->session->set_flashdata('user', 'User account has been updated.');
			redirect('users/my_profile');
		}

		$data['user'] = $this->users_model->get_user($id);
		$accounts = $this->labor_model->get_accounts();

		foreach($accounts['rows'] as $account) {
			$data['accounts'][$account->ID] = $account->ledger;
		}

		$users = $this->users_model->get_all_users();
		$data['user_roles'] = $this->users_model->getUserRoles();

		foreach($users as $user) {
			$data['users'][$user->ID] = $user->user_name;
		}

		$this->load->view('users/my_profile', $data);
	}

	public function delete($id)
	{
		$this->db->where('ID', $id);
		$this->db->delete('users');

        $this->session->set_flashdata('user', "The user account(s) have been deleted.");

		redirect('users');
	}

	public function manage_roles()
	{
		$data['roles'] = $this->users_model->getUserRoles();

		$this->load->view('users/roles/list', $data);
	}

	public function add_role()
	{
		if ($this->input->post('save_role')) 
		{
			$id = $this->users_model->saveRole($this->input->post());
			$this->session->set_flashdata('updated', true);
            $this->session->set_flashdata('user', "The user role has been created successfully.");
			redirect('users/edit_role/'.$id);
		}

		$data = array();
		$data['cap_list'] = $this->cap_list;

		$this->load->view('users/roles/add', $data);
	}

	public function edit_role($id='')
	{
		if ($this->input->post('save_role')) 
		{
			$this->users_model->updateRole($id, $this->input->post());
			$this->session->set_flashdata('updated', true);
            $this->session->set_flashdata('user', "The user role has been updated.");
			redirect('users/edit_role/'.$id);
		}

		$role = $this->users_model->getUserRole($id);
		$data = array();
		$data['id'] = $role->ID;
        $data['name'] = $role->name;
		$data['description'] = $role->description;
		$data['caps'] = maybe_unserialize($role->caps);
		$data['cap_list'] = $this->cap_list;

		if(!is_array($data['caps']))
		{
			$data['caps'] = array();
		}

		$this->load->view('users/roles/edit', $data);
	}

	public function delete_role($id='')
	{
		$this->users_model->deleteRole($id);
        $this->session->set_flashdata('user', "The user role has been deleted.");
		redirect('users/manage_roles');
	}

	function get_user($id)
	{
		if(can_this_user('handle_budget_admin_labor'))
		{
			echo json_encode($this->users_model->get_user_meta($id));
			die();
		}

		redirect('cheat');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */