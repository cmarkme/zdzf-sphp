<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lasrmetrics extends MY_Controller {

	public function index()
	{
		//redirect('lasrmetrics/safe_return');
	}

	public function safe_return($option = 'list', $id = 0)
	{
		switch ($option)
		{	
			case 'new':
				$this->_safe_return_new();
			break;

			case 'edit':
				$this->_safe_return_edit($id);
			break;

			default:
			case 'list':
				$data = array();

				$this->load->view('lasrmetrics/safe_return/list', $data);
			break;
		}
	}

		public function _safe_return_new()
		{
			$data = array();
			$data['locations'] = get_option('office_locations');
			
			$this->load->view('lasrmetrics/safe_return/new', $data);
		}

		public function _safe_return_edit($id)
		{
			$data = array();
			$data['locations'] = get_option('office_locations');

			$this->load->view('lasrmetrics/safe_return/edit', $data);
		}

	public function support_group($option = 'list', $id = 0)
	{
		switch ($option)
		{	
			case 'new':
				$this->_support_group_new();
			break;

			case 'edit':
				$this->_support_group_edit($id);
			break;

			default:
			case 'list':
				$data = array();

				$this->load->view('lasrmetrics/support_group/list', $data);
			break;
		}		
	}

		public function _support_group_new()
		{
			$data = array();
			$data['locations'] = get_option_for_dropdown('office_locations');
			$data['group_types'] = get_option_for_dropdown('group_types');
			$data['counties'] = get_option_for_dropdown('counties');
			$data['SPA'] = get_option_for_dropdown('SPA');
			$data['staff'] = get_user_array();
			
			$this->load->view('lasrmetrics/support_group/new', $data);
		}

		public function _support_group_edit($id)
		{
			$data = array();
			$data['locations'] = get_option_for_dropdown('office_locations');
			$data['group_types'] = get_option_for_dropdown('group_types');
			$data['counties'] = get_option_for_dropdown('counties');
			$data['SPA'] = get_option_for_dropdown('SPA');
			$data['staff'] = get_user_array();

			$this->load->view('lasrmetrics/support_group/edit', $data);
		}

	public function education_program($option = 'list', $id = 0)
	{
		switch ($option)
		{	
			case 'new':
				$this->_education_program_new();
			break;

			case 'edit':
				$this->_education_program_edit($id);
			break;

			default:
			case 'list':
				$data = array();

				$this->load->view('lasrmetrics/education_program/list', $data);
			break;
		}		
	}

		public function _education_program_new()
		{
			$data = array();
			$data['staff'] = get_user_array();
			$data['locations'] = get_option_for_dropdown('office_locations');
			$data['presenter_types'] = get_option_for_dropdown('presenter_types');
			$data['education_programs'] = get_option_for_dropdown('education_programs');
			$data['program_types'] = get_option_for_dropdown('program_types');
			$data['target_audiences'] = get_option_for_dropdown('target_audiences');
			$data['SPA'] = get_option_for_dropdown('SPA');
			$data['grant_programs'] = get_option_for_dropdown('grant_programs');
			
			$this->load->view('lasrmetrics/education_program/new', $data);
		}

		public function _education_program_edit($id)
		{
			$data = array();
			$data['staff'] = get_user_array();
			$data['locations'] = get_option_for_dropdown('office_locations');
			$data['presenter_types'] = get_option_for_dropdown('presenter_types');
			$data['education_programs'] = get_option_for_dropdown('education_programs');
			$data['program_types'] = get_option_for_dropdown('program_types');
			$data['target_audiences'] = get_option_for_dropdown('target_audiences');
			$data['SPA'] = get_option_for_dropdown('SPA');
			$data['grant_programs'] = get_option_for_dropdown('grant_programs');

			$this->load->view('lasrmetrics/education_program/edit', $data);
		}

	public function outreach($option = 'list', $id = 0)
	{
		switch ($option)
		{	
			case 'new':
				$this->_outreach_new();
			break;

			case 'edit':
				$this->_outreach_edit($id);
			break;

			case 'delete':
				$this->_outreach_delete($id);
			break;

			default:
			case 'list':
				$this->load->model('outreach_model');
				$data = array();
				$data['outreachs'] = $this->outreach_model->fetchAll();

				$this->load->view('lasrmetrics/outreach/list', $data);
			break;
		}		
	}

		public function _outreach_new()
		{
			$this->load->model('outreach_model');

			if($this->input->post('do_action'))
			{
				$id = $this->outreach_model->save($this->input->post());
				redirect('lasrmetrics/outreach/edit/'.$id);
			}

			$data = array();
			$data['staff'] = get_user_array();
			$data['locations'] = get_option_for_dropdown('office_locations');
			$data['event_types'] = get_option_for_dropdown('event_types');
			$data['grant_programs'] = get_option_for_dropdown('grant_programs');
			$data['SPA'] = get_option_for_dropdown('SPA');
			
			$this->load->view('lasrmetrics/outreach/new', $data);
		}

		public function _outreach_edit($id)
		{
			$this->load->model('outreach_model');

			if($this->input->post('do_action'))
			{
				$this->outreach_model->update($this->input->post(), $id);
				redirect('lasrmetrics/outreach/edit/'.$id);
			}

			$data = array();
			$data = (array)$this->outreach_model->fetch($id);
			$data['staff'] = get_user_array();
			$data['locations'] = get_option_for_dropdown('office_locations');
			$data['event_types'] = get_option_for_dropdown('event_types');
			$data['grant_programs'] = get_option_for_dropdown('grant_programs');
			$data['SPA'] = get_option_for_dropdown('SPA');

			$this->load->view('lasrmetrics/outreach/edit', $data);
		}

		public function _outreach_delete($id='')
		{
			$this->load->model('outreach_model');

			$this->outreach_model->delete($id);
			redirect('lasrmetrics/outreach/list');
		}


	public function care_consultation($option = 'list', $id = 0)
	{
		switch ($option)
		{	
			case 'new':
				$this->_care_consultation_new();
			break;

			case 'edit':
				$this->_care_consultation_edit($id);
			break;

			case 'delete':
				$this->_care_consultation_delete($id);
			break;

			default:
			case 'list':
				$this->load->model('care_consultation_model');
				$data = array();
				$data['care_consultations'] = $this->care_consultation_model->fetchAll();

				$this->load->view('lasrmetrics/care_consultation/list', $data);
			break;
		}		
	}

		public function _care_consultation_new()
		{
			$this->load->model('care_consultation_model');

			if($this->input->post('do_action'))
			{
				$id = $this->care_consultation_model->save($this->input->post());
				redirect('lasrmetrics/care_consultation/edit/'.$id);
			}

			$data = array();
			$data['staff'] = get_user_array();
			$data['locations'] = get_option_for_dropdown('office_locations');
			$data['care_levels'] = get_option_for_dropdown('care_levels');
			
			$this->load->view('lasrmetrics/care_consultation/new', $data);
		}

		public function _care_consultation_edit($id)
		{
			$this->load->model('care_consultation_model');

			if($this->input->post('do_action'))
			{
				$this->care_consultation_model->update($this->input->post(), $id);
				redirect('lasrmetrics/care_consultation/edit/'.$id);
			}

			$data = array();
			$data = (array)$this->care_consultation_model->fetch($id);
			$data['staff'] = get_user_array();
			$data['locations'] = get_option_for_dropdown('office_locations');
			$data['care_levels'] = get_option_for_dropdown('care_levels');

			$this->load->view('lasrmetrics/care_consultation/edit', $data);
		}

		public function _care_consultation_delete($id='')
		{
			$this->load->model('care_consultation_model');

			$this->care_consultation_model->delete($id);
			redirect('lasrmetrics/care_consultation/list');
		}

	public function online_education($option = 'list', $id = 0)
	{
		switch ($option)
		{	
			case 'new':
				$this->_online_education_new();
			break;

			case 'edit':
				$this->_online_education_edit($id);
			break;
			case 'delete':
				$this->_online_education_delete($id);
			break;

			default:
			case 'list':
				$this->load->model('online_education_model');
				$data = array();
				$data['online_education_programs'] = $this->online_education_model->fetchAll();

				$this->load->view('lasrmetrics/online_education/list', $data);
			break;
		}		
	}

		public function _online_education_new()
		{
			$this->load->model('online_education_model');

			if($this->input->post('do_action'))
			{
				$id = $this->online_education_model->save($this->input->post());
				redirect('lasrmetrics/online_education/edit/'.$id);
			}

			$data = array();
			$data['staff'] = get_user_array();
			$data['locations'] = get_option_for_dropdown('office_locations');
			$data['education_programs'] = get_option_for_dropdown('education_programs');
			$data['program_types'] = get_option_for_dropdown('program_types');
			$data['target_audiences'] = get_option_for_dropdown('target_audiences');
			
			$this->load->view('lasrmetrics/online_education/new', $data);
		}

		public function _online_education_edit($id)
		{
			$this->load->model('online_education_model');

			if($this->input->post('do_action'))
			{
				$this->online_education_model->update($this->input->post(), $id);
				redirect('lasrmetrics/online_education/edit/'.$id);
			}

			$data = array();
			$data = (array)$this->online_education_model->fetch($id);
			$data['staff'] = get_user_array();
			$data['locations'] = get_option_for_dropdown('office_locations');
			$data['education_programs'] = get_option_for_dropdown('education_programs');
			$data['program_types'] = get_option_for_dropdown('program_types');
			$data['target_audiences'] = get_option_for_dropdown('target_audiences');

			$this->load->view('lasrmetrics/online_education/edit', $data);
		}

		public function _online_education_delete($id='')
		{
			$this->load->model('online_education_model');

			$this->online_education_model->delete($id);
			redirect('lasrmetrics/online_education/list');
		}

	public function engagement_program($option = 'list', $id = 0)
	{
		switch ($option)
		{	
			case 'new':
				$this->_engagement_program_new();
			break;

			case 'edit':
				$this->_engagement_program_edit($id);
			break;

			case 'delete':
				$this->_engagement_program_delete($id);
			break;

			default:
			case 'list':
				$data = array();
				$data['engagement_programs'] = $this->engagement_program_model->fetchAll();

				$this->load->view('lasrmetrics/engagement_program/list', $data);
			break;
		}		
	}

		public function _engagement_program_new()
		{
			if($this->input->post('do_action'))
			{
				$id = $this->engagement_program_model->save($this->input->post());
				redirect('lasrmetrics/engagement_program/edit/'.$id);
			}

			$data = array();
			$data['staff'] = get_user_array();
			$data['locations'] = get_option_for_dropdown('office_locations');
			$data['engagement_types'] = get_option_for_dropdown('engagement_types');
			$data['counties'] = get_option_for_dropdown('counties');
			
			$this->load->view('lasrmetrics/engagement_program/new', $data);
		}

		public function _engagement_program_edit($id)
		{
			if($this->input->post('do_action'))
			{
				$this->engagement_program_model->update($this->input->post(), $id);
				redirect('lasrmetrics/engagement_program/edit/'.$id);
			}

			$data = array();

			$data = (array)$this->engagement_program_model->fetch($id);
			$data['staff'] = get_user_array();
			$data['locations'] = get_option_for_dropdown('office_locations');
			$data['engagement_types'] = get_option_for_dropdown('engagement_types');
			$data['counties'] = get_option_for_dropdown('counties');

			$this->load->view('lasrmetrics/engagement_program/edit', $data);
		}

		public function _engagement_program_delete($id='')
		{
			$this->engagement_program_model->delete($id);
			redirect('lasrmetrics/engagement_program/list');
		}

	public function statistics()
	{
		$data = array();

		$this->load->view('lasrmetrics/statistics_list', $data);
	}
}

/* End of file lasrmetrics.php */
/* Location: ./application/controllers/lasrmetrics.php */
