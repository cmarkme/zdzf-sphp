<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Volunteers extends MY_Controller {

	public function index()
	{
		$data = array();

		$offset = $this->uri->segment($this->config->item('paginiation_segment'));
		$list = $this->volunteers_model->getVolunteerList($this->config->item('pagination_per_page'), $offset, $this->input->get_post(NULL, TRUE));
		
		$p_config = array();
		$p_config['base_url'] = site_url('volunteers/page');
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

       	$data['volunteers'] = $list['rows'];
		
		$this->load->view('volunteers/list', $data);
	}

	public function add()
	{
		if($this->input->post('do_action'))
		{
			$ID = $this->volunteers_model->addVolunteer($this->input->post());

			$this->session->set_flashdata('volunteer', 'The form has been saved.');

			redirect('volunteers/edit/'.$ID);
		}

		$data = array();
		$data['volunteers'] = array();

		$this->load->view('volunteers/add', $data);
	}

	public function edit($id=0)
	{
		if($this->input->post('do_action'))
		{
			$this->volunteers_model->updateVolunteer($id, $this->input->post());

			$this->session->set_flashdata('volunteer', 'The form has been updated.');

			redirect('volunteers/edit/'.$id);
		}

		$data = array();
		$data = $this->volunteers_model->getVolunteerData($id);

		$this->load->view('volunteers/edit', $data);
	}

	public function delete($id=0)
	{
		$this->volunteers_model->deleteVolunteer($id);

		$this->session->set_flashdata('volunteer', 'The form has been deleted.');

		redirect('volunteers');
	}

}

/* End of file volunteers.php */
/* Location: ./application/controllers/volunteers.php */
