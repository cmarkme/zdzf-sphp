<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(FCPATH.'application/libraries/MY_Admin_Controller.php');

class Admin extends MY_Controller {

	public function index()
	{
		redirect('admin/general');
	}

	public function general()
	{
		if($this->input->post('gs_save_settings')) 
		{
			$this->settings_model->saveAllSettings($this->input->post('settings'));

			$this->session->set_flashdata('admin', 'General settings have been updated.');

			redirect('admin/general');
		}

		$settings = $this->settings_model->loadAllSettings();

		$data['mileage_rate'] = ((isset($settings['mileage_rate'])) ? $settings['mileage_rate'] : 0);
		$data['monthly_medical_insurance_premium'] = ((isset($settings['monthly_medical_insurance_premium'])) ? $settings['monthly_medical_insurance_premium'] : 0);
		$data['monthly_dental_insurance_premium']  = ((isset($settings['monthly_dental_insurance_premium'])) ? $settings['monthly_dental_insurance_premium'] : 0);
		$data['monthly_vision_insurance_premium'] = ((isset($settings['monthly_vision_insurance_premium'])) ? $settings['monthly_vision_insurance_premium'] : 0);
		$data['monthly_live_insurance_premium'] = ((isset($settings['monthly_live_insurance_premium'])) ? $settings['monthly_live_insurance_premium'] : 0);
		$data['workers_comp_insurance_premium'] = ((isset($settings['workers_comp_insurance_premium'])) ? $settings['workers_comp_insurance_premium'] : 0);
		$data['social_security_medical_premium'] = ((isset($settings['social_security_medical_premium'])) ? $settings['social_security_medical_premium'] : 0);
		$data['unemployment'] = ((isset($settings['unemployment'])) ? $settings['unemployment'] : 0);

		$this->load->view('settings/assumptions', $data);
	}

	public function account_codes()
	{
		if($this->input->post('gs_save_settings')) 
		{
			$this->settings_model->saveAllSettings($this->input->post('settings'));

			$this->session->set_flashdata('admin', 'Account codes have been updated.');

			redirect('admin/account_codes');
		}

		$settings = $this->settings_model->loadAllSettings();

		$data['unemployment'] = ((isset($settings['unemployment'])) ? $settings['unemployment'] : 0);

		$data['locations'] = ((isset($settings['locations'])) ? (array)$settings['locations'] : array());
		$data['location_des'] = ((isset($settings['location_des'])) ? (array)$settings['location_des'] : array());
		$data['divisions'] = ((isset($settings['divisions'])) ? (array)$settings['divisions'] : array());
		$data['division_des'] = ((isset($settings['division_des'])) ? (array)$settings['division_des'] : array());
		$data['depts'] = ((isset($settings['depts'])) ? (array)$settings['depts'] : array());
		$data['dept_des'] = ((isset($settings['dept_des'])) ? (array)$settings['dept_des'] : array());
		$data['grants'] = ((isset($settings['grants'])) ? (array)$settings['grants'] : array());
		$data['grant_des'] = ((isset($settings['grant_des'])) ? (array)$settings['grant_des'] : array());
		$data['projects'] = ((isset($settings['projects'])) ? (array)$settings['projects'] : array());
		$data['project_des'] = ((isset($settings['project_des'])) ? (array)$settings['project_des'] : array());

		$this->load->view('settings/account_codes', $data);
	}

	public function discretionary_accounts()
	{
		if($this->input->post('gs_save_settings')) 
		{
			$this->settings_model->saveAllSettings($this->input->post('settings'));

			$this->session->set_flashdata('admin', 'Discretionary accounts have been updated.');

			redirect('admin/discretionary_accounts');
		}

		$settings = $this->settings_model->loadAllSettings();

		$data['da_accounts'] = ((isset($settings['da_accounts'])) ? (array)$settings['da_accounts'] : array());
		$data['da_descriptions'] = ((isset($settings['da_descriptions'])) ? (array)$settings['da_descriptions'] : array());
		$data['da_role_required'] = ((isset($settings['da_role_required'])) ? (array)$settings['da_role_required'] : array());

		$data['user_roles'] = $this->users_model->getUserRoles();

		$this->load->view('settings/discretionary_accounts', $data);
	}

	public function user_settings()
	{
		if($this->input->post('save_user_settings')) 
		{
			$this->settings_model->saveAllSettings($this->input->post('settings'));

			$this->session->set_flashdata('admin', 'User settings have been updated.');

			redirect('admin/user_settings');
		}

		$data['settings'] = get_option('user_settings');

		$this->load->view('settings/user_settings', $data);
	}

	public function locations()
	{
		if($this->input->post('save_locations')) 
		{
			$this->settings_model->saveAllSettings($this->input->post('settings'));

			$this->session->set_flashdata('admin', 'Locations have been updated.');

			redirect('admin/locations');
		}

		$data['locations'] = get_option('office_locations');
		$data['location_addresses'] = get_option('office_location_address');
		$data['location_descriptions'] = get_option('office_location_description');

		$this->load->view('settings/locations', $data);
	}

	public function lasrmetrics_settings()
	{
		if($this->input->post('gs_save_settings')) 
		{
			$this->settings_model->saveAllSettings($this->input->post('settings'));

			$this->session->set_flashdata('admin', 'Lasrmetrics settings have been updated.');

			redirect('admin/lasrmetrics_settings');
		}

		$settings = $this->settings_model->loadAllSettings();

		$data['group_types'] = ((isset($settings['group_types'])) ? (array)$settings['group_types'] : array());
		$data['counties'] = ((isset($settings['counties'])) ? (array)$settings['counties'] : array());
		$data['education_programs'] = ((isset($settings['education_programs'])) ? (array)$settings['education_programs'] : array());
		$data['presenter_types'] = ((isset($settings['presenter_types'])) ? (array)$settings['presenter_types'] : array());
		$data['program_types'] = ((isset($settings['program_types'])) ? (array)$settings['program_types'] : array());
		$data['event_types'] = ((isset($settings['event_types'])) ? (array)$settings['event_types'] : array());
		$data['engagement_types'] = ((isset($settings['engagement_types'])) ? (array)$settings['engagement_types'] : array());
		$data['target_audiences'] = ((isset($settings['target_audiences'])) ? (array)$settings['target_audiences'] : array());
		$data['SPA'] = ((isset($settings['SPA'])) ? (array)$settings['SPA'] : array());
		$data['grant_programs'] = ((isset($settings['grant_programs'])) ? (array)$settings['grant_programs'] : array());
		$data['care_levels'] = ((isset($settings['care_levels'])) ? (array)$settings['care_levels'] : array());

		$this->load->view('settings/lasrmetrics', $data);
	}

	public function reference_agencies()
	{
		if($this->input->post('save_agencies')) 
		{
			$this->settings_model->saveAllSettings($this->input->post('settings'));

			$this->session->set_flashdata('admin', 'References have been updated.');

			redirect('admin/reference_agencies');
		}

		$data['reference_agencies'] = get_option('reference_agencies');

		$this->load->view('settings/agencies', $data);
	}

	public function calendar_settings()
	{
		if($this->input->post('save_resources')) 
		{
			$this->settings_model->saveAllSettings($this->input->post('settings'));

			$this->session->set_flashdata('admin', 'Resources have been updated.');

			redirect('admin/calendar_settings');
		}

		$data['calendar_resources'] = get_option('calendar_resources');

		$this->load->view('settings/calendar', $data);
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
