<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects_model extends CI_Model { 

	public function save_project($data, $uploads)
	{
		$user = $this->users_model->get_user($data['res_staff']);

		$main = array(
			'project_type' => $data['project_type'],
			'date_created' => date('Y-m-d H:i:s'),
			'first_name' => $user->meta['first_name'],
			'last_name' => $user->meta['last_name'],
			'grant_title' => $data['grant_title'],
			'current_status' => $data['current_status'],
			'fin_dept_title' => $data['fin_dept_title'],
			'total_amt_grant' => $data['total_amt_grant'],
			'start_date' => date_for_db($data['start_date']),
			'end_date' => date_for_db($data['end_date']),
			'res_staff' => $data['res_staff'],
			'py_bal_fwd' => $data['py_bal_fwd'],
			'grantor' => $data['grantor'],
			'org_request' => $data['org_request'],
			'date_of_request' => date_for_db($data['date_of_request']),
			'decision_date' => date_for_db($data['decision_date']),
			'fund_date' => date_for_db($data['fund_date']),
			'account_list' => ((isset($uploads['account_list'])) ? $uploads['account_list'] : ''),
			'amount_pending' => $data['amount_pending'],
			'program_area' => $data['program_area'],
			'add_info' => $data['add_info'],
			'comments' => $data['comments']
		);

		$this->db->insert('grant_fund_projects', $main);

		$p_id = $this->db->insert_id();

		foreach($data['schedule'] as $dummy => $value)
		{
			foreach($value as $key => $val){
				$this->create_meta($p_id, $key, $val, 'finance_schedule');
			}
		}

		foreach($data['expenses'] as $dummy => $value)
		{
			foreach($value as $key => $val){
				$this->create_meta($p_id, $key, $val, 'finance_expenses');
			}
		}

		foreach($data['cumulative_expenses'] as $dummy => $value)
		{
			foreach($value as $key => $val){
				$this->create_meta($p_id, $key, $val, 'finance_cumulative_expenses');
			}
		}

		foreach($data['income'] as $dummy => $value)
		{
			foreach($value as $key => $val){
				$this->create_meta($p_id, $key, $val, 'finance_income');
			}
		}

		foreach($data['cumulative_total'] as $dummy => $value)
		{
			foreach($value as $key => $val){
				$this->create_meta($p_id, $key, $val, 'finance_cumulative_total');
			}
		}

		foreach($uploads['report'] as $dummy => $value)
		{
			foreach($value as $key => $val){
				$this->create_meta($p_id, $key, $val, 'finance_reports');
			}
		}

		return $p_id;
	}

	public function update_project($id, $data, $uploads)
	{
		$user = $this->users_model->get_user($data['res_staff']);

		$main = array(
			'project_type' => $data['project_type'],
			'date_created' => date('Y-m-d H:i:s'),
			'first_name' => $user->meta['first_name'],
			'last_name' => $user->meta['last_name'],
			'grant_title' => $data['grant_title'],
			'current_status' => $data['current_status'],
			'fin_dept_title' => $data['fin_dept_title'],
			'total_amt_grant' => $data['total_amt_grant'],
			'start_date' => date_for_db($data['start_date']),
			'end_date' => date_for_db($data['end_date']),
			'res_staff' => $data['res_staff'],
			'py_bal_fwd' => $data['py_bal_fwd'],
			'grantor' => $data['grantor'],
			'org_request' => $data['org_request'],
			'date_of_request' => date_for_db($data['date_of_request']),
			'decision_date' => date_for_db($data['decision_date']),
			'fund_date' => date_for_db($data['fund_date']),
			'amount_pending' => $data['amount_pending'],
			'program_area' => $data['program_area'],
			'add_info' => $data['add_info'],
			'comments' => $data['comments']
		);

		if(strlen($uploads['account_list']))
		{
			$main['account_list'] = $uploads['account_list'];
		}

		$this->db->where('ID', $id)->update('grant_fund_projects', $main);

		foreach($data['schedule'] as $dummy => $value)
		{
			foreach($value as $key => $val){
				$this->create_meta($id, $key, $val, 'finance_schedule');
			}
		}

		foreach($data['expenses'] as $dummy => $value)
		{
			foreach($value as $key => $val){
				$this->create_meta($id, $key, $val, 'finance_expenses');
			}
		}

		foreach($data['cumulative_expenses'] as $dummy => $value)
		{
			foreach($value as $key => $val){
				$this->create_meta($id, $key, $val, 'finance_cumulative_expenses');
			}
		}

		foreach($data['income'] as $dummy => $value)
		{
			foreach($value as $key => $val){
				$this->create_meta($id, $key, $val, 'finance_income');
			}
		}

		foreach($data['cumulative_total'] as $dummy => $value)
		{
			foreach($value as $key => $val){
				$this->create_meta($id, $key, $val, 'finance_cumulative_total');
			}
		}

		foreach($uploads['report'] as $dummy => $value)
		{
			foreach($value as $key => $val){
				$this->create_meta($id, $key, $val, 'finance_reports');
			}
		}
	}

	public function get_projects($type = 'fund')
	{
		$this->db->where('project_type', $type);
		
		if($this->input->get('sort'))
		{
			foreach($this->input->get('sort') as $sort)
			{
				$sort = explode('|', $sort);
				$this->db->order_by($sort[0], $sort[1]);
			}
		}
		else
		{
			$this->db->order_by('ID', 'ASC');
		}

		$result = $this->db->get('grant_fund_projects')
		->result();

		foreach($result as $key => $data)
		{
			$result[$key]->schedule = $this->get_project_meta($result[$key]->ID, 'finance_schedule');
			$result[$key]->reports = $this->get_project_meta($result[$key]->ID, 'finance_reports');
			$result[$key]->income = $this->get_project_meta($result[$key]->ID, 'finance_income');
			$result[$key]->expenses = $this->get_project_meta($result[$key]->ID, 'finance_expenses');
			$result[$key]->cumulative_total = $this->get_project_meta($result[$key]->ID, 'finance_cumulative_total');
			$result[$key]->cumulative_expenses = $this->get_project_meta($result[$key]->ID, 'finance_cumulative_expenses');
		}

		return $result;
	}

	public function get_project_data($id)
	{
		$data = $this->db->where('ID', $id)
		->limit(1)
		->get('grant_fund_projects')
		->result();

		$data[0]->schedule = $this->get_project_meta($id, 'finance_schedule');
		$data[0]->reports = $this->get_project_meta($id, 'finance_reports');
		$data[0]->income = $this->get_project_meta($id, 'finance_income');
		$data[0]->expenses = $this->get_project_meta($id, 'finance_expenses');
		$data[0]->cumulative_total = $this->get_project_meta($id, 'finance_cumulative_total');
		$data[0]->cumulative_expenses = $this->get_project_meta($id, 'finance_cumulative_expenses');

		return $data[0];
	}

	function get_project_meta($id, $table, $item = null)
	{
		$final = array();

		$result = $this->db->where('project_id', $id)
		->get($table)
		->result();

		foreach($result as $r)
		{
			$final[$r->meta_key] = $r->meta_value;
		}

		return $final;
	}


	private function create_meta($id, $key, $value, $table)
	{
		$data = array(
			'project_id' => $id,
			'meta_key' => $key,
			'meta_value' => $value
		);

		$check = $this->db->where(array('meta_key' => $key, 'project_id' => $id))->get($table);

		if($check->num_rows > 0)
		{
			$this->db->where(array('meta_key' => $key, 'project_id' => $id))->update($table, $data);
		}
		else
		{
			$this->db->insert($table, $data);
		}
	}
}