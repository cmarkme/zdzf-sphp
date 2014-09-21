<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Engagement_program_model extends CI_Model {

	public function save($post='')
	{
		$data = array(
			'date' => date('Y-m-d'),
			'created_by' => $post['created_by'],
			'office' => $post['office'],
			'quarter' => $post['quarter'],
			'fiscial_year' => $post['fiscial_year'],
			'name_of_program' => $post['name_of_program'],
			'name_of_activity' => $post['name_of_activity'],
			'group_type' => $post['group_type'],
			'support_group_county' => $post['support_group_county'],
			'num_duplicate_attendees' => $post['num_duplicate_attendees'],
			'num_first_time_attendees' => $post['num_first_time_attendees'],
			'd_ai_alasken_native' => $post['d_ai_alasken_native'],
			'd_asian_indian' => $post['d_asian_indian'],
			'd_afrcn_american' => $post['d_afrcn_american'],
			'd_chinese' => $post['d_chinese'],
			'd_cuban' => $post['d_cuban'],
			'd_filipino' => $post['d_filipino'],
			'd_japanese' => $post['d_japanese'],
			'd_korean' => $post['d_korean'],
			'd_mexican' => $post['d_mexican'],
			'd_hawaiian_pacific_islndr' => $post['d_hawaiian_pacific_islndr'],
			'd_puerto_rican' => $post['d_puerto_rican'],
			'd_vietnamese' => $post['d_vietnamese'],
			'd_white' => $post['d_white'],
			'd_other_asian' => $post['d_other_asian'],
			'd_other_hispanic_latino' => $post['d_other_hispanic_latino'],
			'd_two_or_more_ethnicity' => $post['d_two_or_more_ethnicity'],
			'd_other_ethnicity' => $post['d_other_ethnicity'],
			'und_ai_alasken_native' => $post['und_ai_alasken_native'],
			'und_asian_indian' => $post['und_asian_indian'],
			'und_afrcn_american' => $post['und_afrcn_american'],
			'und_chinese' => $post['und_chinese'],
			'und_cuban' => $post['und_cuban'],
			'und_filipino' => $post['und_filipino'],
			'und_japanese' => $post['und_japanese'],
			'und_korean' => $post['und_korean'],
			'und_mexican' => $post['und_mexican'],
			'und_hawaiian_pacific_islndr' => $post['und_hawaiian_pacific_islndr'],
			'und_puerto_rican' => $post['und_puerto_rican'],
			'und_vietnamese' => $post['und_vietnamese'],
			'und_white' => $post['und_white'],
			'und_other_asian' => $post['und_other_asian'],
			'und_other_hispanic_latino' => $post['und_other_hispanic_latino'],
			'und_two_or_more_ethnicity' => $post['und_two_or_more_ethnicity'],
			'und_other_ethnicity' => $post['und_other_ethnicity']
		);

		$this->db->insert('lasr_engagement_program', $data);

		return $this->db->insert_id();
	}

	public function update($post='', $id)
	{
		$data = array(
			'created_by' => $post['created_by'],
			'office' => $post['office'],
			'quarter' => $post['quarter'],
			'fiscial_year' => $post['fiscial_year'],
			'name_of_program' => $post['name_of_program'],
			'name_of_activity' => $post['name_of_activity'],
			'group_type' => $post['group_type'],
			'support_group_county' => $post['support_group_county'],
			'num_duplicate_attendees' => $post['num_duplicate_attendees'],
			'num_first_time_attendees' => $post['num_first_time_attendees'],
			'd_ai_alasken_native' => $post['d_ai_alasken_native'],
			'd_asian_indian' => $post['d_asian_indian'],
			'd_afrcn_american' => $post['d_afrcn_american'],
			'd_chinese' => $post['d_chinese'],
			'd_cuban' => $post['d_cuban'],
			'd_filipino' => $post['d_filipino'],
			'd_japanese' => $post['d_japanese'],
			'd_korean' => $post['d_korean'],
			'd_mexican' => $post['d_mexican'],
			'd_hawaiian_pacific_islndr' => $post['d_hawaiian_pacific_islndr'],
			'd_puerto_rican' => $post['d_puerto_rican'],
			'd_vietnamese' => $post['d_vietnamese'],
			'd_white' => $post['d_white'],
			'd_other_asian' => $post['d_other_asian'],
			'd_other_hispanic_latino' => $post['d_other_hispanic_latino'],
			'd_two_or_more_ethnicity' => $post['d_two_or_more_ethnicity'],
			'd_other_ethnicity' => $post['d_other_ethnicity'],
			'und_ai_alasken_native' => $post['und_ai_alasken_native'],
			'und_asian_indian' => $post['und_asian_indian'],
			'und_afrcn_american' => $post['und_afrcn_american'],
			'und_chinese' => $post['und_chinese'],
			'und_cuban' => $post['und_cuban'],
			'und_filipino' => $post['und_filipino'],
			'und_japanese' => $post['und_japanese'],
			'und_korean' => $post['und_korean'],
			'und_mexican' => $post['und_mexican'],
			'und_hawaiian_pacific_islndr' => $post['und_hawaiian_pacific_islndr'],
			'und_puerto_rican' => $post['und_puerto_rican'],
			'und_vietnamese' => $post['und_vietnamese'],
			'und_white' => $post['und_white'],
			'und_other_asian' => $post['und_other_asian'],
			'und_other_hispanic_latino' => $post['und_other_hispanic_latino'],
			'und_two_or_more_ethnicity' => $post['und_two_or_more_ethnicity'],
			'und_other_ethnicity' => $post['und_other_ethnicity']
		);

		$this->db->where('ID', $id)
		->update('lasr_engagement_program', $data);
	}

	public function delete($id='')
	{
		$this->db->where('ID', $id)
		->delete('lasr_engagement_program');
	}

	public function fetch($id='')
	{
		$result = $this->db->where('ID', $id)
		->from('lasr_engagement_program')
		->get()
		->result();

		return $result[0];
	}

	public function fetchAll($limit, $offset, $args = array())
	{
		$return = array(
			'rows' => array(),
			'num_rows' => array());
		
		$this->db->start_cache();

		if(sizeof($args) > 1) {
			if(strlen($args['search_string']))
			{
				$this->db->like('funder', $args['search_string'])
				->or_like('address', $args['search_string'])
				->or_like('city', $args['search_string'])
				->or_like('state', $args['search_string'])
				->or_like('zip', $args['search_string'])
				->or_like('website', $args['search_string']);
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
 		->from('lasr_engagement_program')
 		->limit($limit, $offset)
 		->get();

 		if($data->num_rows > 0)
		{
			$return['rows'] = $data->result();
		}

		$c = $this->db->select('count(*) as count', false)->from('lasr_engagement_program');
        $tmp = $c->get()->result();

        $return['num_rows'] = $tmp[0]->count;

        $this->db->flush_cache();

 		return $return;
	}

}

/* End of file engagement_program_model.php */
/* Location: ./application/models/engagement_program_model.php */

?>