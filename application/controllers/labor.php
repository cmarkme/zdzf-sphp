<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Labor extends MY_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->helper('admin_helper');
	}

   public function index()
   {
   		$data = array();
   		$data['offset'] = $this->uri->segment($this->config->item('paginiation_segment'));

   		if($this->input->get_post('bulk_action') && ($this->input->get_post('bulk_action') != 'bulk')) {
			$this->labor_model->do_bulk_action($this->input->get_post('bulk_action'), $this->input->get_post('b_action'));

			redirect('labor/'.$data['offset']);
		}

		$list = $this->labor_model->get_accounts($this->config->item('pagination_per_page'), $data['offset'], $this->input->get_post(NULL, TRUE));

   		$p_config = array();
		$p_config['base_url'] = site_url('labor/page');
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

		$data['accounts'] = $list['rows'];

		$this->load->view('labor/view', $data);
   }

   public function new_account()
   {
   		if($this->input->post('insert_account'))
		{
			$send = $this->input->post();
			$send['ledger'] = implode('-', $send['ledger_section']);

			$id = $this->labor_model->insert_account($send);

			$this->session->set_flashdata('labor', 'New labor account created');

			redirect('labor');
		}

		$locations = get_option('office_locations');

		foreach($locations as $location)
		{
			$data['locations'][$location] = $location;
		}

   		$this->load->view('labor/new', $data);
   }

   public function edit_account($id)
   {
   		if($this->input->post('update_account')) 
   		{
   			$send = $this->input->post();
			$send['ledger'] = implode('-', $send['ledger_section']);

   			$this->labor_model->update_account($this->input->post('update_account'), $send);

   			$this->session->set_flashdata('labor', 'Account has been updated.');

   			redirect('labor');
   		}

   		$data = array();
   		$data['account'] = $this->labor_model->get_account($id);
   		
   		$locations = get_option('office_locations');

   		foreach($locations as $location)
   		{
   			$data['locations'][$location] = $location;
   		}

   		$this->load->view('labor/edit', $data);
   }

}

/* End of file labor.php */
/* Location: ./application/controllers/labor.php */