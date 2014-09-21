<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Support_group_model extends CI_Model {

	public function save($post='')
	{
		$data = array(
			'created_by' => $post['created_by'],
			'date' => date('Y-m-d'),
			'office' => $post['office'],
			'quarter' => $post['quarter'],
			'fiscial_year' => $post['fiscial_year'],
			'spa' => $post['spa'],
			'name_of_group' => $post['name_of_group'],
			'group_type' => $post['group_type'],
			'support_group_county' => $post['support_group_county'],
			'num_duplicate_attendees' => $post['num_duplicate_attendees'],
			'num_first_time_attendees' => $post['num_first_time_attendees'],
			'd_caucasian' => $post['d_caucasian'],
			'und_caucasian' => $post['und_caucasian'],
			'd_african_american' => $post['d_african_american'],
			'und_african_american' => $post['und_african_american'],
			'd_latino' => $post['d_latino'],
			'und_latino' => $post['und_latino'],
			'd_asian' => $post['d_asian'],
			'und_asian' => $post['und_asian'],
			'd_native_hawaiian_other' => $post['d_native_hawaiian_other'],
			'und_native_hawaiian_other' => $post['und_native_hawaiian_other'],
			'd_two_or_more' => $post['d_two_or_more'],
			'und_two_or_more' => $post['und_two_or_more'],
			'd_other_race' => $post['d_other_race'],
			'und_other_race' => $post['und_other_race'],
			'duplicated_total' => $post['duplicated_total'],
			'unduplicated_total' => $post['unduplicated_total'],
			'd_ai_alasken_native' => $post['d_ai_alasken_native'],
			'und_ai_alasken_native' => $post['und_ai_alasken_native'],
			'd_asian_indian' => $post['d_asian_indian'],
			'und_asian_indian' => $post['und_asian_indian'],
			'd_afrcn_american' => $post['d_afrcn_american'],
			'und_afrcn_american' => $post['und_afrcn_american'],
			'd_chinese' => $post['d_chinese'],
			'und_chinese' => $post['und_chinese'],
			'd_cuban' => $post['d_cuban'],
			'und_cuban' => $post['und_cuban'],
			'd_filipino' => $post['d_filipino'],
			'und_filipino' => $post['und_filipino'],
			'd_japanese' => $post['d_japanese'],
			'und_japanese' => $post['und_japanese'],
			'd_korean' => $post['d_korean'],
			'und_korean' => $post['und_korean'],
			'd_mexican' => $post['d_mexican'],
			'und_mexican' => $post['und_mexican'],
			'd_hawaiian_pacific_islndr' => $post['d_hawaiian_pacific_islndr'],
			'und_hawaiian_pacific_islndr' => $post['und_hawaiian_pacific_islndr'],
			'd_puerto_rican' => $post['d_puerto_rican'],
			'und_puerto_rican' => $post['und_puerto_rican'],
			'd_vietnamese' => $post['d_vietnamese'],
			'und_vietnamese' => $post['und_vietnamese'],
			'd_white' => $post['d_white'],
			'und_white' => $post['und_white'],
			'd_other_asian' => $post['d_other_asian'],
			'und_other_asian' => $post['und_other_asian'],
			'd_other_hispanic_latino' => $post['d_other_hispanic_latino'],
			'und_other_hispanic_latino' => $post['und_other_hispanic_latino'],
			'd_two_or_more_ethnicity' => $post['d_two_or_more_ethnicity'],
			'und_two_or_more_ethnicity' => $post['und_two_or_more_ethnicity'],
			'd_other_ethnicity' => $post['d_other_ethnicity'],
			'und_other_ethnicity' => $post['und_other_ethnicity'],
			'd_person_w_memory_problems' => $post['d_person_w_memory_problems'],
			'und_person_w_memory_problems' => $post['und_person_w_memory_problems'],
			'd_spouse_partnet' => $post['d_spouse_partnet'],
			'und_spouse_partnet' => $post['und_spouse_partnet'],
			'd_daughter_son' => $post['d_daughter_son'],
			'und_daughter_son' => $post['und_daughter_son'],
			'd_sister_brother' => $post['d_sister_brother'],
			'und_sister_brother' => $post['und_sister_brother'],
			'd_grandchild' => $post['d_grandchild'],
			'und_grandchild' => $post['und_grandchild'],
			'd_friend' => $post['d_friend'],
			'und_friend' => $post['und_friend'],
			'd_in_law' => $post['d_in_law'],
			'und_in_law' => $post['und_in_law'],
			'd_other_relative' => $post['d_other_relative'],
			'und_other_relative' => $post['und_other_relative'],
			'd_healthcare_community_service_provider' => $post['d_healthcare_community_service_provider'],
			'und_healthcare_community_service_provider' => $post['und_healthcare_community_service_provider'],
			'd_relationship_other' => $post['d_relationship_other'],
			'und_relationship_other' => $post['und_relationship_other'],
			'd_relation_total' => $post['d_relation_total'],
			'und_relation_total' => $post['und_relation_total'],
			'notes' => $post['notes']
		);

		$this->db->insert('lasr_support_group', $data);

		return $this->db->insert_id();
	}

	public function update($post='', $id)
	{
		$data = array(
			'created_by' => $post['created_by'],
			'office' => $post['office'],
			'quarter' => $post['quarter'],
			'fiscial_year' => $post['fiscial_year'],
			'spa' => $post['spa'],
			'name_of_group' => $post['name_of_group'],
			'group_type' => $post['group_type'],
			'support_group_county' => $post['support_group_county'],
			'num_duplicate_attendees' => $post['num_duplicate_attendees'],
			'num_first_time_attendees' => $post['num_first_time_attendees'],
			'd_caucasian' => $post['d_caucasian'],
			'und_caucasian' => $post['und_caucasian'],
			'd_african_american' => $post['d_african_american'],
			'und_african_american' => $post['und_african_american'],
			'd_latino' => $post['d_latino'],
			'und_latino' => $post['und_latino'],
			'd_asian' => $post['d_asian'],
			'und_asian' => $post['und_asian'],
			'd_native_hawaiian_other' => $post['d_native_hawaiian_other'],
			'und_native_hawaiian_other' => $post['und_native_hawaiian_other'],
			'd_two_or_more' => $post['d_two_or_more'],
			'und_two_or_more' => $post['und_two_or_more'],
			'd_other_race' => $post['d_other_race'],
			'und_other_race' => $post['und_other_race'],
			'duplicated_total' => $post['duplicated_total'],
			'unduplicated_total' => $post['unduplicated_total'],
			'd_ai_alasken_native' => $post['d_ai_alasken_native'],
			'und_ai_alasken_native' => $post['und_ai_alasken_native'],
			'd_asian_indian' => $post['d_asian_indian'],
			'und_asian_indian' => $post['und_asian_indian'],
			'd_afrcn_american' => $post['d_afrcn_american'],
			'und_afrcn_american' => $post['und_afrcn_american'],
			'd_chinese' => $post['d_chinese'],
			'und_chinese' => $post['und_chinese'],
			'd_cuban' => $post['d_cuban'],
			'und_cuban' => $post['und_cuban'],
			'd_filipino' => $post['d_filipino'],
			'und_filipino' => $post['und_filipino'],
			'd_japanese' => $post['d_japanese'],
			'und_japanese' => $post['und_japanese'],
			'd_korean' => $post['d_korean'],
			'und_korean' => $post['und_korean'],
			'd_mexican' => $post['d_mexican'],
			'und_mexican' => $post['und_mexican'],
			'd_hawaiian_pacific_islndr' => $post['d_hawaiian_pacific_islndr'],
			'und_hawaiian_pacific_islndr' => $post['und_hawaiian_pacific_islndr'],
			'd_puerto_rican' => $post['d_puerto_rican'],
			'und_puerto_rican' => $post['und_puerto_rican'],
			'd_vietnamese' => $post['d_vietnamese'],
			'und_vietnamese' => $post['und_vietnamese'],
			'd_white' => $post['d_white'],
			'und_white' => $post['und_white'],
			'd_other_asian' => $post['d_other_asian'],
			'und_other_asian' => $post['und_other_asian'],
			'd_other_hispanic_latino' => $post['d_other_hispanic_latino'],
			'und_other_hispanic_latino' => $post['und_other_hispanic_latino'],
			'd_two_or_more_ethnicity' => $post['d_two_or_more_ethnicity'],
			'und_two_or_more_ethnicity' => $post['und_two_or_more_ethnicity'],
			'd_other_ethnicity' => $post['d_other_ethnicity'],
			'und_other_ethnicity' => $post['und_other_ethnicity'],
			'd_person_w_memory_problems' => $post['d_person_w_memory_problems'],
			'und_person_w_memory_problems' => $post['und_person_w_memory_problems'],
			'd_spouse_partnet' => $post['d_spouse_partnet'],
			'und_spouse_partnet' => $post['und_spouse_partnet'],
			'd_daughter_son' => $post['d_daughter_son'],
			'und_daughter_son' => $post['und_daughter_son'],
			'd_sister_brother' => $post['d_sister_brother'],
			'und_sister_brother' => $post['und_sister_brother'],
			'd_grandchild' => $post['d_grandchild'],
			'und_grandchild' => $post['und_grandchild'],
			'd_friend' => $post['d_friend'],
			'und_friend' => $post['und_friend'],
			'd_in_law' => $post['d_in_law'],
			'und_in_law' => $post['und_in_law'],
			'd_other_relative' => $post['d_other_relative'],
			'und_other_relative' => $post['und_other_relative'],
			'd_healthcare_community_service_provider' => $post['d_healthcare_community_service_provider'],
			'und_healthcare_community_service_provider' => $post['und_healthcare_community_service_provider'],
			'd_relationship_other' => $post['d_relationship_other'],
			'und_relationship_other' => $post['und_relationship_other'],
			'd_relation_total' => $post['d_relation_total'],
			'und_relation_total' => $post['und_relation_total'],
			'notes' => $post['notes']
		);

		$this->db->where('ID', $id)
		->update('lasr_support_group', $data);
	}

	public function delete($id='')
	{
		$this->db->where('ID', $id)
		->delete('lasr_support_group');
	}

	public function fetch($id='')
	{
		$result = $this->db->where('ID', $id)
		->from('lasr_support_group')
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
 		->from('lasr_support_group')
 		->limit($limit, $offset)
 		->get();

 		if($data->num_rows > 0)
		{
			$return['rows'] = $data->result();
		}

		$c = $this->db->select('count(*) as count', false)->from('lasr_support_group');
        $tmp = $c->get()->result();

        $return['num_rows'] = $tmp[0]->count;

        $this->db->flush_cache();

 		return $return;
	}

}

/* End of file outreach_model.php */
/* Location: ./application/models/outreach_model.php */

?>