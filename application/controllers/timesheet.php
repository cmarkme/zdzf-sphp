<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Timesheet extends MY_Controller {
    
    var $redirect;

    function __construct()
	{
		parent::__construct();
		set_title('Timesheets');

		$this->redirect = can_this_user('timesheet') ? 'timesheet' : 'timesheet/my_timesheets';
	}

	public function index()
	{  
		$offset = $this->uri->segment($this->config->item('paginiation_segment'));
		$list = $this->timesheet_model->get_timesheets(0, $this->config->item('pagination_per_page'), $offset, $this->input->get_post(NULL, TRUE));
		
		$p_config = array();
		$p_config['base_url'] = site_url('timesheet/page');
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

       	$data['timesheets'] = $list['rows'];

		$this->load->view('timesheets/list', $data);
	}

	public function my_timesheets()
	{
		$offset = $this->uri->segment($this->config->item('paginiation_segment'));
		$list = $this->timesheet_model->get_timesheets($this->user->ID, $this->config->item('pagination_per_page'), $offset, $this->input->get_post(NULL, TRUE));
		
		$p_config = array();
		$p_config['base_url'] = site_url('timesheet/my_timesheets');
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

       	$data['timesheets'] = $list['rows'];

		$this->load->view('timesheets/my_list', $data);
	}

	public function new_timesheet()
	{
		$load_view = 'timesheets/new';

		if($this->input->post('insert_timesheet')) 
		{
			$ts_id = $this->timesheet_model->save_timesheet($this->input->post(), $this->user->ID);

			$this->session->set_flashdata('timesheet', 'Timesheet Saved.');

			redirect($this->redirect);
		}

		if(NULL != $this->timesheet_model->get_template($this->user->ID))
		{
			$data['timesheet'] = $this->timesheet_model->get_template($this->user->ID);
			$data['grant_matching'] = array(
				'week1' => unserialize(base64_decode($data['timesheet']->gweek1)),
				'week2' => unserialize(base64_decode($data['timesheet']->gweek2))
			);

			$data['week1'] = unserialize(base64_decode($data['timesheet']->week1));
			$data['week2'] = unserialize(base64_decode($data['timesheet']->week2));
			$load_view = 'timesheets/new_from_template';
		}

		$accounts = $this->users_model->get_labor_accounts($this->user->ID, 'timesheet');
		$data['account_code'] = $this->config->item('timesheet_account');

		foreach($accounts as $key => $value)
		{
			if($value != 'Select Account')
			{
				$t = explode('-', $value);
				$key = str_replace($t[2], $data['account_code'], $key);
				$t[2] = $data['account_code'];

				$data['accounts'][$key] = implode('-', $t);
			}
			else
			{
				$data['accounts'][$key] = $accounts[$key];
			}
		}

		$data['user'] = $this->user;
		$users = $this->users_model->get_all_users_meta();

		foreach($users as $user)
		{
			$data['users'][$user->ID] = $user->meta['first_name'].' '.$user->meta['last_name'];
		}
		asort($data['users']);

		$data['manager'] = $this->users_model->get_user($data['user']->user_manager);

		$this->load->view($load_view, $data);
	}

	public function edit($id)
	{	
		if($this->input->post('update_timesheet')) {
			$this->timesheet_model->update_timesheet($this->input->post(), $this->uri->segment('3'), $this->input->post('user_id'));

			$this->session->set_flashdata('timesheet', 'Timesheet Updated.');

			redirect($this->redirect);
		}

		$data['timesheet'] = $this->timesheet_model->get_timesheet($id);

		$accounts = unserialize(base64_decode($data['timesheet']->accounts));
		if(!isset($accounts) || !is_array($accounts)) {
			$accounts = $this->users_model->get_labor_accounts($this->user->ID, 'timesheet');
		}

		$data['account_code'] = $this->config->item('timesheet_account');

		foreach($accounts as $key => $value)
		{
			if($value != 'Select Account')
			{
				$t = explode('-', $value);
				$key = str_replace($t[2], $data['account_code'], $key);
				$t[2] = $data['account_code'];

				$data['accounts'][$key] = implode('-', $t);
			}
			else
			{
				$data['accounts'][$key] = $accounts[$key];
			}
		}

		$data['user'] = $this->users_model->get_user($data['timesheet']->user_id);
		$users = $this->users_model->get_all_users_meta();

		foreach($users as $user)
		{
			$data['users'][$user->ID] = $user->meta['first_name'].' '.$user->meta['last_name'];
		}
		asort($data['users']);

		$data['grant_matching'] = array(
			'week1' => unserialize(base64_decode($data['timesheet']->gweek1)),
			'week2' => unserialize(base64_decode($data['timesheet']->gweek2))
		);

		$data['week1'] = unserialize(base64_decode($data['timesheet']->week1));
		$data['week2'] = unserialize(base64_decode($data['timesheet']->week2));

		$data['manager'] = $this->users_model->get_user($data['timesheet']->manager);

		if ($data['timesheet']->user_id != $this->user->ID)
		{
			if($data['timesheet']->manager != $this->user->ID)
			{
				if(!can_this_user('timesheet/edit/all'))
					redirect('cheat');				
			}
		}

		$this->load->view('timesheets/edit', $data);
	}

	public function view($id)
	{	
		$data['timesheet'] = $this->timesheet_model->get_timesheet($id);

		$accounts = unserialize(base64_decode($data['timesheet']->accounts));
		if(!isset($accounts) || !is_array($accounts)) {
			$accounts = $this->users_model->get_labor_accounts($this->user->ID, 'timesheet');
		}

		$data['account_code'] = $this->config->item('timesheet_account');

		foreach($accounts as $key => $value)
		{
			if($value != 'Select Account')
			{
				$t = explode('-', $value);
				$key = str_replace($t[2], $data['account_code'], $key);
				$t[2] = $data['account_code'];

				$data['accounts'][$key] = implode('-', $t);
			}
			else
			{
				$data['accounts'][$key] = $accounts[$key];
			}
		}

		$data['user'] = $this->users_model->get_user($data['timesheet']->user_id);
		$users = $this->users_model->get_all_users_meta();

		foreach($users as $user)
		{
			$data['users'][$user->ID] = $user->meta['first_name'].' '.$user->meta['last_name'];
		}
		asort($data['users']);

		$data['grant_matching'] = array(
			'week1' => unserialize(base64_decode($data['timesheet']->gweek1)),
			'week2' => unserialize(base64_decode($data['timesheet']->gweek2))
		);

		$data['week1'] = unserialize(base64_decode($data['timesheet']->week1));
		$data['week2'] = unserialize(base64_decode($data['timesheet']->week2));

		$data['manager'] = $this->users_model->get_user($data['timesheet']->manager);

		if ($data['timesheet']->user_id != $this->user->ID)
		{
			if($data['timesheet']->manager != $this->user->ID)
			{
				if(!can_this_user('timesheet/edit/all'))
					redirect('cheat');				
			}
		}

		$this->load->view('timesheets/view', $data);
	}

	public function template_list()
	{
		$offset = $this->uri->segment($this->config->item('paginiation_segment'));
		$list = $this->timesheet_model->get_timesheets(0, $this->config->item('pagination_per_page'), $offset, $this->input->get_post(NULL, TRUE), 'template');
		
		$p_config = array();
		$p_config['base_url'] = site_url('timesheet');
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

       	$data['timesheets'] = $list['rows'];

		$this->load->view('timesheets/template_list', $data);
	}

	public function new_template()
	{
		if($this->input->post('insert_template')) 
		{
			$ts_id = $this->timesheet_model->save_timesheet($this->input->post(), $this->input->post('user_id'), 'template');

			$this->session->set_flashdata('timesheet', 'Timesheet Template Saved');

			redirect('timesheet/template_list');
		}

		$accounts = array_merge(array('' => 'Select Account'), $this->labor_model->get_account_list('timesheet'));

		$data['account_code'] = $this->config->item('timesheet_account');

		foreach($accounts as $key => $value)
		{
			if($value != 'Select Account')
			{
				$t = explode('-', $value);
				$key = str_replace($t[2], $data['account_code'], $key);
				$t[2] = $data['account_code'];

				$data['accounts'][$key] = implode('-', $t);
			}
			else
			{
				$data['accounts'][$key] = $accounts[$key];
			}
		}

		$users = $this->users_model->get_all_users_meta();

		foreach($users as $user)
		{
			$data['users'][$user->ID] = $user->meta['first_name'].' '.$user->meta['last_name'];
		}
		asort($data['users']);

		$this->load->view('timesheets/template_new', $data);
	}

	public function edit_template($id)
	{	
		if($this->input->post('update_timesheet')) 
		{
			if($this->input->post('submit_request') == 'Create New Timesheet for the Current Pay Period from this Template')
			{
				$this->timesheet_model->save_timesheet($this->input->post(), $this->input->post('user_id'));
			}
			else
			{
				$this->timesheet_model->update_timesheet($this->input->post(), $id, $this->input->post('user_id'), 'template');
			}

			if ($this->input->post('submit_request') == 'Create New Timesheet for the Current Pay Period from this Template')
			{
				$this->session->set_flashdata('timesheet', 'New Timesheet Created.');
			}
			else
			{
				$this->session->set_flashdata('timesheet', 'Template Updated');
			}

			redirect('timesheet/template_list');
		}

		$accounts = array_merge(array('' => 'Select Account'), $this->labor_model->get_account_list('timesheet'));

		$data['account_code'] = $this->config->item('timesheet_account');

		foreach($accounts as $key => $value)
		{
			if($value != 'Select Account')
			{
				$t = explode('-', $value);
				$key = str_replace($t[2], $data['account_code'], $key);
				$t[2] = $data['account_code'];

				$data['accounts'][$key] = implode('-', $t);
			}
			else
			{
				$data['accounts'][$key] = $accounts[$key];
			}
		}

		$data['timesheet'] = $this->timesheet_model->get_timesheet($id);
		$data['user'] = $data['timesheet']->user_id;
		$data['grant_matching'] = array(
			'week1' => unserialize(base64_decode($data['timesheet']->gweek1)),
			'week2' => unserialize(base64_decode($data['timesheet']->gweek2))
		);

		$data['week1'] = unserialize(base64_decode($data['timesheet']->week1));
		$data['week2'] = unserialize(base64_decode($data['timesheet']->week2));

		$users = $this->users_model->get_all_users_meta();

		foreach($users as $user)
		{
			$data['users'][$user->ID] = $user->meta['first_name'].' '.$user->meta['last_name'];
		}
		asort($data['users']);

		$this->load->view('timesheets/template_edit', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id)
		->delete('timesheets');

		redirect($this->redirect);
	}

	public function delete_template($id)
	{
		$this->db->where('id', $id)
		->delete('timesheets');

		redirect('timesheet/template_list');
	}

	public function emails()
	{
		if($this->input->post('save_emails'))
		{
			$this->email_model->save_emails('timesheet', $this->input->post('email'));

			$this->session->set_flashdata('timesheet', 'Timesheet emails have been updated.');

			redirect('timesheet/emails');
		}

		$data = $this->email_model->get_emails('timesheet');
		$this->load->view('timesheets/emails', $data);
	}

	public function download($value='')
	{
		$FileName = 'timesheets-'.date("d-m-y") . '.csv';
		header('Content-Type: application/csv');  
		header('Content-Disposition: attachment; filename="' . $FileName . '"'); 
		header("Pragma: no-cache");
		header("Expires: 0");

		$list = $this->timesheet_model->get_timesheets($this->input->get('user_id'), $this->config->item('pagination_per_page'), 0, $this->input->get_post(NULL, TRUE));
		$timesheets = $list['rows'];

		$headers = array_keys(get_object_vars($timesheets[0]));
		unset($headers[9], $headers[10], $headers[11], $headers[12], $headers[13], $headers[26]);
			
		echo implode(',', $headers)."\n";

		foreach($timesheets as $request)
		{
			$request = get_object_vars($request);
			$manager = $this->users_model->get_user_meta($request['manager']);
			$request['date_created'] 	= date_for_display($request['date_created']);

			unset($request['accounts'], $request['gweek1'], $request['gweek2'], $request['week1'], $request['week2'], $request['type']);

			$request['manager'] = @$manager['first_name'].' '.@$manager['last_name'];
			$request['period_start'] 	= date_for_display($request['period_start']);
			$request['period_end'] 		= date_for_display($request['period_end']);
			$request['last_edit'] 		= date_for_display($request['last_edit']);

			echo implode(',', $request)."\n";
		}
	}	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */