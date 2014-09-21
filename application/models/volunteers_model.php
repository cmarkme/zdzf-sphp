<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Volunteers_model extends CI_Model {
 
 	public function addVolunteer($post='')
 	{
 		$data = array(
			'ID' => $post['ID'],
			'name' => $post['name'],
			'date' => date_for_db($post['date']),
			'address' => $post['address'],
			'city' => $post['city'],
			'zip' => $post['zip'],
			'email' => $post['email'],
			'sex' => $post['sex'],
			'birthday' => date_for_db($post['birthday']),
			'called' => $post['called'],
			'skills' => $post['skills'],
			'skilled' => serialize($post['skilled']),
			'experience' => $post['experience'],
			'avail_days' => serialize($post['avail_days']),
			'avail_times' => $post['avail_times'],
			'vol_time' => $post['vol_time'],
			'vol_time_per' => $post['vol_time_per'],
			'languages' => $post['languages'],
			'interests' => serialize($post['interests']),
			'interests_other' => $post['interests_other'],
			'diverse' => $post['diverse'],
			'emp_name' => $post['emp_name'],
			'emp_phone' => $post['emp_phone1'].'-'.$post['emp_phone2'].'-'.$post['emp_phone3'],
			'agency' => $post['agency'],
			'agency_address' => $post['agency_address'],
			'type_work_studies' => $post['type_work_studies'],
			'ok_call' => $post['ok_call'],
			'know_someone' => $post['know_someone'],
			'relationship' => $post['relationship'],
			'living' => $post['living']
		);
		$this->db->insert('volunteers', $data);
		$ID = $this->db->insert_id();

		$ref = array(
			'volunteer_id' => $ID,
			'reference1' => $post['reference1'],
			'r1_relation' => $post['r1_relation'],
			'r1_years' => $post['r1_years'],
			'r1_phone' => $post['r1_phone1'].'-'.$post['r1_phone2'].'-'.$post['r1_phone3'],
			'r1_email' => $post['r1_email'],
			'r1_type' => $post['r1_type'],
			'reference2' => $post['reference2'],
			'r2_relation' => $post['r2_relation'],
			'r2_years' => $post['r2_years'],
			'r2_phone' => $post['r2_phone1'].'-'.$post['r2_phone2'].'-'.$post['r2_phone3'],
			'r2_email' => $post['r2_email'],
			'r2_type' => $post['r2_type']
		);
		$this->db->insert('volunteer_references', $ref);

		return $ID;
 	}

 	public function updateVolunteer($ID, $post='')
 	{
 		$data = array(
			'name' => $post['name'],
			'date' => date_for_db($post['date']),
			'address' => $post['address'],
			'city' => $post['city'],
			'zip' => $post['zip'],
			'email' => $post['email'],
			'sex' => $post['sex'],
			'birthday' => date_for_db($post['birthday']),
			'called' => $post['called'],
			'skills' => $post['skills'],
			'skilled' => serialize($post['skilled']),
			'experience' => $post['experience'],
			'avail_days' => serialize($post['avail_days']),
			'avail_times' => $post['avail_times'],
			'vol_time' => $post['vol_time'],
			'vol_time_per' => $post['vol_time_per'],
			'languages' => $post['languages'],
			'interests' => serialize($post['interests']),
			'interests_other' => $post['interests_other'],
			'diverse' => $post['diverse'],
			'emp_name' => $post['emp_name'],
			'emp_phone' => $post['emp_phone1'].'-'.$post['emp_phone2'].'-'.$post['emp_phone3'],
			'agency' => $post['agency'],
			'agency_address' => $post['agency_address'],
			'type_work_studies' => $post['type_work_studies'],
			'ok_call' => $post['ok_call'],
			'know_someone' => $post['know_someone'],
			'relationship' => $post['relationship'],
			'living' => $post['living']
		);
		$this->db->where('ID', $ID)
		->update('volunteers', $data);

		$ref = array(
			'reference1' => $post['reference1'],
			'r1_relation' => $post['r1_relation'],
			'r1_years' => $post['r1_years'],
			'r1_phone' => $post['r1_phone1'].'-'.$post['r1_phone2'].'-'.$post['r1_phone3'],
			'r1_email' => $post['r1_email'],
			'r1_type' => $post['r1_type'],
			'reference2' => $post['reference2'],
			'r2_relation' => $post['r2_relation'],
			'r2_years' => $post['r2_years'],
			'r2_phone' => $post['r2_phone1'].'-'.$post['r2_phone2'].'-'.$post['r2_phone3'],
			'r2_email' => $post['r2_email'],
			'r2_type' => $post['r2_type']
		);
		$this->db->where('volunteer_id', $ID)
		->update('volunteer_references', $ref);

		$this->db->where('volunteer_id', $ID)
		->delete(array('volunteer_positions', 'volunteer_office'));

		$office = array(
			'volunteer_id' => $ID,
			'supervisor' => $post['supervisor'],
			'start_date' => date_for_db($post['start_date']),
			'work_assignment' => $post['work_assignment'],
			'contact_date' => date_for_db($post['contact_date']),
			'interview_date' => date_for_db($post['interview_date']),
			'interviewed' => $post['interviewed'],
			'schedule' => (isset($post['schedule']) ? 1 : 0),
			'schedule_on' => (isset($post['schedule_on']) ? 1 : 0),
			'schedule_on_date' => date_for_db($post['schedule_on_date']),
			'training_type' => $post['training_type'],
			'orientation_on' => (isset($post['orientation_on']) ? 1 : 0),
			'orientation_on_date' => date_for_db($post['orientation_on_date']),
			'comments' => $post['comments']
		);

		$this->db->insert('volunteer_office', $office);
		
		foreach($post['working']['position'] as $key => $dummy)
		{
			if(strlen($post['working']['position'][$key]))
			{
				$insert = array(
					'volunteer_id' => $ID,
					'position' => $post['working']['position'][$key],
					'event' => $post['working']['event'][$key],
					'start_date' => date_for_db($post['working']['start_date'][$key]),
					'end_date' => date_for_db($post['working']['end_date'][$key]),
					);

				$this->db->insert('volunteer_positions', $insert);
			}
		}
 	}

 	public function getVolunteerData($ID='')
 	{
 		$data = $this->db->where('ID', $ID)
 		->select('*')
 		->from('volunteers')
 		->join('volunteer_references', 'volunteers.ID = volunteer_references.volunteer_id', 'left')
 		->join('volunteer_office', 'volunteers.ID = volunteer_office.volunteer_id', 'left')
 		->get()
 		->result();

 		$ret = (array)$data[0];

 		$ret['positions'] = $this->getVolunteerPositions($ID);

 		return $ret;
 	}

 	public function getVolunteerList($limit, $offset, $args = array())
 	{
 		$return = array(
			'rows' => array(),
			'num_rows' => array());
		
		$this->db->start_cache();

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

		if(sizeof($args) > 1) {
			if(strlen($args['search_string']))
			{
				$this->db->like('name', $args['search_string'])
				->or_like('address', $args['search_string'])
				->or_like('city', $args['search_string'])
				->or_like('zip', $args['search_string'])
				->or_like('email', $args['search_string'])
				->or_like('sex', $args['search_string'])
				->or_like('called', $args['search_string'])
				->or_like('skills', $args['search_string'])
				->or_like('skilled', $args['search_string'])
				->or_like('experience', $args['search_string'])
				->or_like('interests', $args['search_string'])
				->or_like('interests_other', $args['search_string'])
				->or_like('avail_days', $args['search_string'])
				->or_like('date', date_for_db($args['search_string']))
				->or_like('birthday', date_for_db($args['search_string']));
			}

			foreach($args['filters']['search_type'] as $key => $a) {
				$search = '';

				switch($args['filters']['search_type'][$key]) {

					case 'equals': 
						if(strlen($args['filters']['search_value'][$args['filters']['search_val'][$key]]) > 0)
						$this->db->where($args['filters']['search_val'][$key], date_for_db($args['filters']['search_value'][$args['filters']['search_val'][$key]]));
					break; 

					case 'not_equal': 
						if(strlen($args['filters']['search_value'][$args['filters']['search_val'][$key]]) > 0)
						$this->db->where($args['filters']['search_val'][$key].' !=', date_for_db($args['filters']['search_value'][$args['filters']['search_val'][$key]]));
					break; 

					case 'less_than': 
						if(strlen($args['filters']['search_value'][$args['filters']['search_val'][$key]]) > 0)
						$this->db->where($args['filters']['search_val'][$key].' <', date_for_db($args['filters']['search_value'][$args['filters']['search_val'][$key]]));
					break; 

					case 'less_than_equal': 
						if(strlen($args['filters']['search_value'][$args['filters']['search_val'][$key]]) > 0)
						$this->db->where($args['filters']['search_val'][$key].' <=', date_for_db($args['filters']['search_value'][$args['filters']['search_val'][$key]]));
					break; 

					case 'greater_than': 
						if(strlen($args['filters']['search_value'][$args['filters']['search_val'][$key]]) > 0)
						$this->db->where($args['filters']['search_val'][$key].' >', date_for_db($args['filters']['search_value'][$args['filters']['search_val'][$key]]));
					break; 

					case 'greater_than_equal': 
						if(strlen($args['filters']['search_value'][$args['filters']['search_val'][$key]]) > 0)
						$this->db->where($args['filters']['search_val'][$key].' >=', date_for_db($args['filters']['search_value'][$args['filters']['search_val'][$key]]));
					break; 

					case 'like': 
						if(strlen($args['filters']['search_value'][$args['filters']['search_val'][$key]]) > 0)
						$this->db->like($args['filters']['search_val'][$key], date_for_db($args['filters']['search_value'][$args['filters']['search_val'][$key]]));
					break; 
				}
			}
		}

		$this->db->stop_cache();

 		$data = $this->db->select('*')
 		->from('volunteers')
 		->join('volunteer_references', 'volunteers.ID = volunteer_references.volunteer_id', 'left')
 		->join('volunteer_office', 'volunteers.ID = volunteer_office.volunteer_id', 'left')
 		->limit($limit, $offset)
 		->get();

 		if($data->num_rows > 0)
		{
			$return['rows'] = $data->result();
		}

		$c = $this->db->select('count(*) as count', false)->from('volunteers');
        $tmp = $c->get()->result();

        $return['num_rows'] = $tmp[0]->count;

        $this->db->flush_cache();

 		return $return;
 	}

 	public function getVolunteerPositions($ID='')
 	{
 		$data = $this->db->where('volunteer_id', $ID)
 		->select('*')
 		->from('volunteer_positions')
 		->get()
 		->result();

 		if(sizeof($data))
 		{
 			return $data; 			
 		}

 		return array(array('position' => '', 'event' => '', 'start_date' => '', 'end_date' => ''));
 	}

 	public function deleteVolunteer($ID='')
 	{
 		$this->db->where('volunteer_id', $ID)
		->delete(array('volunteer_positions', 'volunteer_office', 'volunteer_references'));

 		$this->db->where('ID', $ID)
		->delete('volunteers');
 	}
 
 }
 
 /* End of file volunteers_model.php */
 /* Location: ./application/models/volunteers_model.php */
  ?>