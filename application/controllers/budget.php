<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Budget extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		set_title('Budget Managers');
	}

	public function index()
	{
		$data = array();

		$offset = $this->uri->segment($this->config->item('paginiation_segment'));
		$list = $this->budget_model->get_all_budgets($this->config->item('pagination_per_page'), $offset, $this->input->get_post(NULL, TRUE));
		
		$p_config = array();
		$p_config['base_url'] = site_url('budget/page');
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

       	$data['budgets'] = $list['rows'];


		$this->load->view('budget/list', $data);
	}

	public function create()
	{
		$data = array();

		if($this->input->post('insert_budget'))
		{
			$id = $this->budget_model->save_budget($this->input->post());

			$this->session->set_flashdata('budget', 'The budget has been created.');

			redirect('budget/edit/'.$id);
		}

		$data['users'] = $this->users_model->get_all_users_meta(true);
		$data['locations'] = get_option_for_dropdown('locations');
		$data['divisions'] = get_option_for_dropdown('divisions');
		$data['depts'] = get_option_for_dropdown('depts');
		$data['da_accounts'] = get_option('da_accounts');
		$data['da_descriptions'] = get_option('da_descriptions');
		$data['da_role_required'] = get_option('da_role_required');
		$data['settings'] = $this->settings_model->loadAllSettings();

		$this->load->view('budget/new', $data);
	}

	public function edit($id)
	{
		$data = array();
		$data = (array)$this->budget_model->load_budget($id);
		$data['users'] = $this->users_model->get_all_users_meta();
		$data['locations'] = get_option_for_dropdown('locations');
		$data['divisions'] = get_option_for_dropdown('divisions');
		$data['depts'] = get_option_for_dropdown('depts');
		$data['da_accounts'] = get_option('da_accounts');
		$data['da_descriptions'] = get_option('da_descriptions');
		$data['da_role_required'] = get_option('da_role_required');
		$data['settings'] = $this->settings_model->loadAllSettings();

		if($this->input->post('update_budget'))
		{
			$this->budget_model->update_budget($this->input->post(), $this->uri->segment(3));

			$this->session->set_flashdata('budget', 'The budget has been updated.');

			redirect('budget/edit/'.$this->uri->segment(3));
		}

		$this->load->view('budget/edit', $data);
	}
}