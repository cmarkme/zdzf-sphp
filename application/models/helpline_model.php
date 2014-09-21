<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Helpline_Model extends CI_Model {

	public function get_all_logs($limit, $offset, $args = array())
	{

		$results = array('rows' => array(),
			'num_rows' => 0);

		$this->db->start_cache();

		if(sizeof($args) > 1) {
			if(strlen($args['search_string']))
			{
				$this->db->like('first_name', $args['search_string'])
				->or_like('last_name', $args['search_string'])
				->or_like('phone', $args['search_string']);
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

		$this->db->limit($limit, $offset);
		$q = $this->db->get('helpline_callers');
        
        if($q->num_rows() > 0) {
            
            $results['rows'] = $q->result();
        }

        $c = $this->db->select('count(*) as count', false)->from('helpline_callers');
        $tmp = $c->get()->result();

        $results['num_rows'] = $tmp[0]->count;

        $this->db->flush_cache();
        
        return $results;
	}

	public function get_caller($id)
	{
		$q = $this->db->where('ID', $id)->from('helpline_callers')->limit(1)->get()->result();

		return $q[0];
	}

	public function new_caller($data)
	{
		$new_data = array(
			'entered_by' => $data['entered_by'],
			'took_call' => $data['took_call'],
			'date_of_call' => date_for_db($data['date_of_call']),
			'first_name' => $data['first_name'],
			'last_name' => $data['last_name'],
			'address' => $data['address'],
			'city' => $data['city'],
			'state' => $data['state'],
			'zip' => $data['zip'],
			'phone' => $data['phone'],
			'email' => $data['email'],
			'gender' => $data['gender'],
			'dob' => date_for_db($data['dob']),
			'language' => $data['language'],
			'ethnicity' => $data['ethnicity'],
			'education' => $data['education'],
			'relationship' => $data['relationship'],
			'reason' => $data['reason'],
			'pwd_gender' => $data['pwd_gender'],
			'pwd_birthday' => date_for_db($data['pwd_birthday']),
			'pwd_ethnicity' => $data['pwd_ethnicity'],
			'pwd_education' => $data['pwd_education'],
			'pwd_diagnosis_date' => date_for_db($data['pwd_diagnosis_date']),
			'pwd_diagnosis_type' => $data['pwd_diagnosis_type'],
			'call_created_by' => serialize($data['call_created_by']),
			'call_date' => serialize($data['call_date']),
			'call_status' => serialize($data['call_status']),
			'call_notes' => serialize($data['call_notes'])
		);

		$this->db->insert('helpline_callers', $new_data);

		return $this->db->insert_id();
	}

	public function update_caller($data)
	{
		$id = $data['update_caller'];
		$update_data = array(
			'entered_by' => $data['entered_by'],
			'took_call' => $data['took_call'],
			'date_of_call' => date_for_db($data['date_of_call']),
			'first_name' => $data['first_name'],
			'last_name' => $data['last_name'],
			'address' => $data['address'],
			'city' => $data['city'],
			'state' => $data['state'],
			'zip' => $data['zip'],
			'phone' => $data['phone'],
			'email' => $data['email'],
			'gender' => $data['gender'],
			'dob' => date_for_db($data['dob']),
			'language' => $data['language'],
			'ethnicity' => $data['ethnicity'],
			'education' => $data['education'],
			'relationship' => $data['relationship'],
			'reason' => $data['reason'],
			'pwd_gender' => $data['pwd_gender'],
			'pwd_birthday' => date_for_db($data['pwd_birthday']),
			'pwd_ethnicity' => $data['pwd_ethnicity'],
			'pwd_education' => $data['pwd_education'],
			'pwd_diagnosis_date' => date_for_db($data['pwd_diagnosis_date']),
			'pwd_diagnosis_type' => $data['pwd_diagnosis_type'],
			'call_created_by' => serialize($data['call_created_by']),
			'call_date' => serialize($data['call_date']),
			'call_status' => serialize($data['call_status']),
			'call_notes' => serialize($data['call_notes'])
		);

		$this->db->where('ID', $id)->update('helpline_callers', $update_data);
	}

	/* public function insert_rand()
	{
		$rand_data = array();

		for($i = 0; $i != 100; $i++) {
			$rand_data[] = array(
				'first_name' 		=> ucfirst($firsts[rand(0, sizeof($firsts)-1)]),
				'last_name' 		=> ucfirst($lasts[rand(0, (sizeof($lasts)-1))]),
				'dob' 				=> rand(1920, 1970).'-'.rand(1, 12).'-'.rand(1,28),
				'gender'			=> $gender[rand(0, (sizeof($gender)-1))],
				'ethnicity'			=> $ethnicity[rand(0, (sizeof($ethnicity)-1))],
				'relationship'		=> $relationship[rand(0, (sizeof($relationship)-1))],
			);
		}

		$this->db->insert_batch('helpline_callers', $rand_data);
	} */
}
?>