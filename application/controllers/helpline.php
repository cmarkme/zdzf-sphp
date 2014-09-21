<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Helpline extends MY_Controller {
    
    function __construct()
	{
		parent::__construct();

		//$this->helpline_model->insert_rand();
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
		set_title('Helpline');
		
		$offset = $this->uri->segment($this->config->item('paginiation_segment'));
		$list = $this->helpline_model->get_all_logs($this->config->item('pagination_per_page'), $offset, $this->input->get_post(NULL, TRUE));
		
		$p_config = array();
		$p_config['base_url'] = site_url('helpline/page');
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

		$data['callers'] = $list['rows'];

		$this->pagination->initialize($p_config);

		$this->load->view('helpline/list', $data);
	}

	public function new_profile()
	{
		if($this->input->post('new_caller'))
		{
			$id = $this->helpline_model->new_caller($this->input->post());

			$this->session->set_flashdata('helpline', 'New profile has been created.');

			redirect('helpline/profile/'.$id);
		}

		$data['reference_agencies'] = get_option_for_dropdown('reference_agencies');
		$data['staff'] = get_user_array();
		$data['ethnicity'] = $this->config->item('ethnicity');
		$data['relationship'] = $this->config->item('relationship');
		$data['gender'] = $this->config->item('gender');
		$data['education'] = $this->config->item('education');

		$this->load->view('helpline/new', $data);
	}

	public function profile($id)
	{
		if($this->input->post('update_caller'))
		{
			$this->helpline_model->update_caller($this->input->post());

			$this->session->set_flashdata('helpline', 'The profile has been updated.');

			redirect('helpline/profile/'.$id);
		}

		$data['reference_agencies'] = get_option_for_dropdown('reference_agencies');
		$data['staff'] = get_user_array();
		$data['caller'] = $this->helpline_model->get_caller($id);
		$data['ethnicity'] = $this->config->item('ethnicity');
		$data['relationship'] = $this->config->item('relationship');
		$data['gender'] = $this->config->item('gender');
		$data['education'] = $this->config->item('education');

		$this->load->view('helpline/profile', $data);
	}

	public function referrals()
	{
		
		$this->load->view('helpline/referrals');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */