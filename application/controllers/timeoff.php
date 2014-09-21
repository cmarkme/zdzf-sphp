<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timeoff extends MY_Controller {

	var $redirect;

    function __construct()
	{
		parent::__construct();
        set_title('Time Off');

        $this->redirect = can_this_user('timeoff') ? 'timeoff' : 'timeoff/my_timeoff_requests';
	}

	public function index()
	{  
		$offset = $this->uri->segment($this->config->item('paginiation_segment'));
		$list = $this->timeoff_model->get_timeoff_requests(0, $this->config->item('pagination_per_page'), $offset, $this->input->get_post(NULL, TRUE));
		
		$p_config = array();
		$p_config['base_url'] = site_url('timeoff/page');
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

		$this->pagination->initialize($p_config);

       	$data['timeoff_requests'] = $list['rows'];
       	$data['manage'] = array_merge(array($this->user->ID), $this->user->subs);

		$this->load->view('timeoff/requests', $data);
	}

	public function my_timeoff_requests()
	{	
		$offset = $this->uri->segment($this->config->item('paginiation_segment'));
		$list = $this->timeoff_model->get_timeoff_requests($this->user->ID, $this->config->item('pagination_per_page'), $offset, $this->input->get_post(NULL, TRUE));
		
		$p_config = array();
		$p_config['base_url'] = site_url('timeoff/my_timeoff_requests');
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

		$this->pagination->initialize($p_config);

       	$data['timeoff_requests'] = $list['rows'];
       	$data['manage'] = array_merge(array($this->user->ID), $this->user->subs);

		$this->load->view('timeoff/my_requests', $data);
	}

	public function new_timeoff_request()
	{
		if($this->input->post('insert_timeoff_request')) 
		{
			$ts_id = $this->timeoff_model->save_timeoff_request($this->input->post(), $this->user->ID);

			$this->session->set_flashdata('timeoff', 'Your timeoff request has been saved.');

			redirect($this->redirect);
		}

		$data['user'] = $this->user;
		$data['manage'] = array_merge(array($this->user->ID), $this->user->subs);

		$this->load->view('timeoff/request_new', $data);
	}

	public function edit($id)
	{	
		if($this->input->post('update_timeoff_request')) {
			$this->timeoff_model->update_timeoff_request($this->input->post(), $this->uri->segment('3'));

			$this->session->set_flashdata('timeoff', 'Your eidts to the timeoff request have been saved.');

			redirect($this->redirect);
		}

		$data['timeoff_request'] = $this->timeoff_model->get_timeoff_request($id);
		$data['user'] = $this->users_model->get_user($data['timeoff_request']->user_id);
		$data['manage'] = array_merge(array($this->user->ID), $this->user->subs);

		$this->load->view('timeoff/request_edit', $data);
	}

	public function view($id)
	{
		$data['timeoff_request'] = $this->timeoff_model->get_timeoff_request($id);
		$data['user'] = $this->users_model->get_user($data['timeoff_request']->user_id);
		$data['manage'] = array_merge(array($this->user->ID), $this->user->subs);

		$this->load->view('timeoff/request_view', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id)
		->delete('timeoff_requests');

		$this->session->set_flashdata('timeoff', 'The timeoff request has been deleted.');

		redirect($this->redirect);
	}

	public function emails()
	{
		if($this->input->post('save_emails'))
		{
			$this->email_model->save_emails('timeoff', $this->input->post('email'));

			$this->session->set_flashdata('timeoff', 'Timeoff emails have been updated.');

			redirect('timeoff/emails');
		}

		$data = $this->email_model->get_emails('timeoff');
		$this->load->view('timeoff/emails', $data);
	}

	public function download($value='')
	{
		$FileName = 'timeoff-requests-'.date("d-m-y") . '.csv';
		header('Content-Type: application/csv');  
		header('Content-Disposition: attachment; filename="' . $FileName . '"'); 
		header("Pragma: no-cache");
		header("Expires: 0");

		$list = $this->timeoff_model->get_timeoff_requests($this->input->get('user_id'), $this->config->item('pagination_per_page'), 0, $this->input->get_post(NULL, TRUE));
		$timeoff_requests = $list['rows'];
		$headers = array_keys(get_object_vars($timeoff_requests[0]));
	
		echo implode(',', $headers)."\n";

		foreach($timeoff_requests as $request)
		{
			$request = get_object_vars($request);
			$manager = $this->users_model->get_user_meta($request['manager']);

			$request['manager'] = $manager['first_name'].' '.$manager['last_name'];

			echo implode(',', $request)."\n";
		}
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */