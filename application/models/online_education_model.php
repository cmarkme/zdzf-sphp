<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Online_education_model extends CI_Model {

	public function save($post='')
	{
		$data = array(
			'created_by' => $post['created_by'],
			'date' => date('Y-m-d'),
			'office' => $post['office'],
			'quarter' => $post['quarter'],
			'fiscial_year' => $post['fiscial_year'],
			'month' => $post['month'],
			'name_of_education_program' => $post['name_of_education_program'],
			'program_type' => $post['program_type'],
			'target_audience' => $post['target_audience'],
			'county_program_held' => $post['county_program_held'],
			'spa_1' => $post['spa_1'],
			'spa_2' => $post['spa_2'],
			'spa_3' => $post['spa_3'],
			'spa_4' => $post['spa_4'],
			'spa_5' => $post['spa_5'],
			'spa_6' => $post['spa_6'],
			'spa_7' => $post['spa_7'],
			'spa_8' => $post['spa_8'],
			'spa_unknown' => $post['spa_unknown'],
			'total_number_attendees' => $post['total_number_attendees'],
			'la_county_total' => $post['la_county_total'],
			'san_bernandino_county' => $post['san_bernandino_county'],
			'riverside_county' => $post['riverside_county'],
			'kings_county' => $post['kings_county'],
			'tulare_county' => $post['tulare_county'],
			'inyo_county' => $post['inyo_county'],
			'mono_county' => $post['mono_county'],
			'inland_empire' => $post['inland_empire'],
			'coachella_valley' => $post['coachella_valley'],
			'southwest_riverside' => $post['southwest_riverside'],
			'residence_other' => $post['residence_other'],
			'ai_alasken_native' => $post['ai_alasken_native'],
			'asian_indian' => $post['asian_indian'],
			'afrcn_american' => $post['afrcn_american'],
			'chinese' => $post['chinese'],
			'cuban' => $post['cuban'],
			'filipino' => $post['filipino'],
			'japanese' => $post['japanese'],
			'korean' => $post['korean'],
			'mexican' => $post['mexican'],
			'hawaiian_pacific_islndr' => $post['hawaiian_pacific_islndr'],
			'puerto_rican' => $post['puerto_rican'],
			'vietnamese' => $post['vietnamese'],
			'white' => $post['white'],
			'other_asian' => $post['other_asian'],
			'other_hispanic_latino' => $post['other_hispanic_latino'],
			'two_or_more_ethnicity' => $post['two_or_more_ethnicity'],
			'other_ethnicity' => $post['other_ethnicity'],
			'ethnicity_unknown' => $post['ethnicity_unknown'],
			'nurse' => $post['nurse'],
			'social_worker' => $post['social_worker'],
			'rcfe_administrator' => $post['rcfe_administrator'],
			'cna' => $post['cna'],
			'marriage_family_therapist' => $post['marriage_family_therapist'],
			'other' => $post['other'],
			'if_other_specify' => $post['if_other_specify']
		);

		$this->db->insert('lasr_online_education', $data);

		return $this->db->insert_id();
	}

	public function update($post='', $id)
	{
		$data = array(
			'created_by' => $post['created_by'],
			'office' => $post['office'],
			'quarter' => $post['quarter'],
			'fiscial_year' => $post['fiscial_year'],
			'month' => $post['month'],
			'name_of_education_program' => $post['name_of_education_program'],
			'program_type' => $post['program_type'],
			'target_audience' => $post['target_audience'],
			'county_program_held' => $post['county_program_held'],
			'spa_1' => $post['spa_1'],
			'spa_2' => $post['spa_2'],
			'spa_3' => $post['spa_3'],
			'spa_4' => $post['spa_4'],
			'spa_5' => $post['spa_5'],
			'spa_6' => $post['spa_6'],
			'spa_7' => $post['spa_7'],
			'spa_8' => $post['spa_8'],
			'spa_unknown' => $post['spa_unknown'],
			'total_number_attendees' => $post['total_number_attendees'],
			'la_county_total' => $post['la_county_total'],
			'san_bernandino_county' => $post['san_bernandino_county'],
			'riverside_county' => $post['riverside_county'],
			'kings_county' => $post['kings_county'],
			'tulare_county' => $post['tulare_county'],
			'inyo_county' => $post['inyo_county'],
			'mono_county' => $post['mono_county'],
			'inland_empire' => $post['inland_empire'],
			'coachella_valley' => $post['coachella_valley'],
			'southwest_riverside' => $post['southwest_riverside'],
			'residence_other' => $post['residence_other'],
			'ai_alasken_native' => $post['ai_alasken_native'],
			'asian_indian' => $post['asian_indian'],
			'afrcn_american' => $post['afrcn_american'],
			'chinese' => $post['chinese'],
			'cuban' => $post['cuban'],
			'filipino' => $post['filipino'],
			'japanese' => $post['japanese'],
			'korean' => $post['korean'],
			'mexican' => $post['mexican'],
			'hawaiian_pacific_islndr' => $post['hawaiian_pacific_islndr'],
			'puerto_rican' => $post['puerto_rican'],
			'vietnamese' => $post['vietnamese'],
			'white' => $post['white'],
			'other_asian' => $post['other_asian'],
			'other_hispanic_latino' => $post['other_hispanic_latino'],
			'two_or_more_ethnicity' => $post['two_or_more_ethnicity'],
			'other_ethnicity' => $post['other_ethnicity'],
			'ethnicity_unknown' => $post['ethnicity_unknown'],
			'nurse' => $post['nurse'],
			'social_worker' => $post['social_worker'],
			'rcfe_administrator' => $post['rcfe_administrator'],
			'cna' => $post['cna'],
			'marriage_family_therapist' => $post['marriage_family_therapist'],
			'other' => $post['other'],
			'if_other_specify' => $post['if_other_specify']
		);

		$this->db->where('ID', $id)
		->update('lasr_online_education', $data);
	}

	public function delete($id='')
	{
		$this->db->where('ID', $id)
		->delete('lasr_online_education');
	}

	public function fetch($id='')
	{
		$result = $this->db->where('ID', $id)
		->from('lasr_online_education')
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
 		->from('lasr_online_education')
 		->limit($limit, $offset)
 		->get();

 		if($data->num_rows > 0)
		{
			$return['rows'] = $data->result();
		}

		$c = $this->db->select('count(*) as count', false)->from('lasr_online_education');
        $tmp = $c->get()->result();

        $return['num_rows'] = $tmp[0]->count;

        $this->db->flush_cache();

 		return $return;
	}

}

/* End of file online_education_model.php */
/* Location: ./application/models/online_education_model.php */

?>