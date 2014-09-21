<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Travel extends MY_Controller {
    
    var $redirect;

    function __construct()
	{
		parent::__construct();
		set_title('Travel');

		$this->redirect = can_this_user('travel') ? 'travel' : 'travel/my_travel_requests';
	}

	public function index()
	{ 
		$offset = $this->uri->segment($this->config->item('paginiation_segment'));
		$list = $this->travel_model->get_travel_requests(0, $this->config->item('pagination_per_page'), $offset, $this->input->get_post(NULL, TRUE));
		
		$p_config = array();
		$p_config['base_url'] = site_url('travel/page');
		$p_config['total_rows'] = $list['num_rows'];
		$p_config['uri_segment'] = $this->config->item('paginiation_segment');
		$p_config['per_page'] = $this->config->item('pagination_per_page');
		$p_config['num_links'] = 10;
		$p_config['full_tag_open'] = '<div class="pagination"><span>Pages:</span>';
		$p_config['full_tag_close'] = '</div>';
		$p_config['cur_tag_open'] = '<strong class="ui-state-hover ui-corner-all">';
		$p_config['cur_tag_close'] = '</strong>';
		$p_config['anchor_class'] = 'class="ui-state-default ui-corner-all"';
		$p_config['suffix'] = '?'.http_build_query($_GET, '', "&");
		$p_config['first_link'] = FALSE;
		$p_config['last_link'] = FALSE;

       	$data['travel_requests'] = $list['rows'];
       	$data['manage'] = array_merge(array($this->user->ID), $this->user->subs);

       	$this->pagination->initialize($p_config);

		$this->load->view('travel_requests/list', $data);
	}

	public function my_travel_requests()
	{
		$offset = $this->uri->segment($this->config->item('paginiation_segment'));
		$list = $this->travel_model->get_travel_requests($this->user->ID, $this->config->item('pagination_per_page'), $offset, $this->input->get_post(NULL, TRUE));
		
		$p_config = array();
		$p_config['base_url'] = site_url('travel/my_travel_requests');
		$p_config['total_rows'] = $list['num_rows'];
		$p_config['uri_segment'] = $this->config->item('paginiation_segment');
		$p_config['per_page'] = $this->config->item('pagination_per_page');
		$p_config['num_links'] = 10;
		$p_config['full_tag_open'] = '<div class="pagination"><span>Pages:</span>';
		$p_config['full_tag_close'] = '</div>';
		$p_config['cur_tag_open'] = '<strong class="ui-state-hover ui-corner-all">';
		$p_config['cur_tag_close'] = '</strong>';
		$p_config['anchor_class'] = 'class="ui-state-default ui-corner-all"';
		$p_config['suffix'] = '?'.http_build_query($_GET, '', "&");
		$p_config['first_link'] = FALSE;
		$p_config['last_link'] = FALSE;

       	$data['travel_requests'] = $list['rows'];
       	$data['manage'] = array_merge(array($this->user->ID), $this->user->subs);

       	$this->pagination->initialize($p_config);

		$this->load->view('travel_requests/my_requests', $data);
	}

	public function new_travel_request()
	{
		if($this->input->post('insert_travel_request')) 
		{
			$ts_id = $this->travel_model->save_travel_request($this->input->post(), $this->user->ID);

			$this->session->set_flashdata('travel', 'The travel request has been saved.');
			redirect($this->redirect);
		}

		$data['user'] = $this->user;
		$data['users'] = $this->users_model->get_all_users_meta();
		$data['accounts'] = array_merge(array('' => 'Select Account'), $this->labor_model->get_account_list('travel'));
		$data['mileage_rate'] = get_option('mileage_rate', true);
		$data['locations'] = get_option_for_dropdown('office_locations');

		$this->load->view('travel_requests/new', $data);
	}

	public function edit($id)
	{	

		if($this->input->post('update_travel_request')) {
			$this->travel_model->update_travel_request($this->input->post(), $this->uri->segment('3'));

			$this->session->set_flashdata('travel', 'The travel request has been update.');
			redirect($this->redirect);
		}

		$data['travel_request'] = $this->travel_model->get_travel_request($id);
		$data['user'] = $this->users_model->get_user($data['travel_request']['details']->user_id);
		$data['accounts'] = array_merge(array('' => 'Select Account'), $this->labor_model->get_account_list('travel'));
		$data['users'] = $this->users_model->get_all_users_meta();
		$data['manage'] = array_merge(array($this->user->ID), $this->user->subs);
		$data['locations'] = get_option_for_dropdown('office_locations');
		
		if ($data['travel_request']['details']->user_id != $this->user->ID)
		{
			if($data['travel_request']['details']->manager != $this->user->ID)
			{
				if(!can_this_user('travel/edit/all'))
					redirect('cheat');				
			}
		}

		$this->load->view('travel_requests/edit', $data);
	}

	public function view($id)
	{	
		$data['travel_request'] = $this->travel_model->get_travel_request($id);
		$data['user'] = $this->users_model->get_user($data['travel_request']['details']->user_id);
		$data['accounts'] = array_merge(array('' => 'Select Account'), $this->labor_model->get_account_list('travel'));
		$data['users'] = $this->users_model->get_all_users_meta();
		$data['manage'] = array_merge(array($this->user->ID), $this->user->subs);
		$data['locations'] = get_option_for_dropdown('office_locations');
		
		if ($data['travel_request']['details']->user_id != $this->user->ID)
		{
			if($data['travel_request']['details']->manager != $this->user->ID)
			{
				if(!can_this_user('travel/edit/all'))
					redirect('cheat');				
			}
		}

		$this->load->view('travel_requests/view', $data);
	}

	public function delete($id)
	{
		if(can_this_user('travel/delete'))
		{
			$this->db->where('id', $id)
			->delete('travel_requests');

			$this->db->where('travel_id', $id)
			->delete('travel_request_details');

			$this->db->where('travel_id', $id)
			->delete('travel_out_of_town_details');

			$this->session->set_flashdata('travel', 'Travel request has been deleted.');
		}
		else
		{
			$this->session->set_flashdata('travel', 'You cannot delete this document');
		}

		redirect($this->redirect);
	}

	public function emails()
	{
		if($this->input->post('save_emails'))
		{
			$this->email_model->save_emails('travel', $this->input->post('email'));

			$this->session->set_flashdata('travel', 'Travel reimbursement emails have been updated.');

			redirect('travel/emails');
		}

		$data = $this->email_model->get_emails('travel');
		$this->load->view('travel_requests/emails', $data);
	}

	public function download($value='')
	{
		$FileName = 'timeoff-requests-'.date("d-m-y") . '.csv';
		header('Content-Type: application/csv');  
		header('Content-Disposition: attachment; filename="' . $FileName . '"'); 
		header("Pragma: no-cache");
		header("Expires: 0");

		$list = $this->travel_model->get_travel_requests($this->input->get('user_id'), $this->config->item('pagination_per_page'), 0, $this->input->get_post(NULL, TRUE));
		$travel_requests = $list['rows'];
		// echo '<pre>'.print_r($travel_requests, true).'</pre>';
		$headers = array_keys(get_object_vars($travel_requests[0]['details']));
	
		echo implode(',', $headers)."\n";

		foreach($travel_requests as $request)
		{
			$request = get_object_vars($request['details']);
			$manager = $this->users_model->get_user_meta($request['manager']);

			$request['manager'] = $manager['first_name'].' '.$manager['last_name'];
			$request['date_created'] = date_for_display($request['date_created']);

			echo implode(',', $request)."\n";
		}
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */