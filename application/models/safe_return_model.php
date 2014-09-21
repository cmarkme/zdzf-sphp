<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Safe_return_model extends CI_Model {

	public function save($post='')
	{
		$data = array(
			'created_by' => $post['created_by'],
			'date' => date('Y-m-d'),
			'office' => $post['office'],
			'month' => $post['month'],
			'quarter' => $post['quarter'],
			'fiscial_year' => $post['fiscial_year'],
			'num_sr_emergency_responders' => $post['num_sr_emergency_responders'],
			'num_sr_education_emergency_responder_participants' => $post['num_sr_education_emergency_responder_participants'],
			'num_scholarships_total' => $post['num_scholarships_total'],
			'scholar_spa1' => $post['scholar_spa1'],
			'scholar_caucasian' => $post['scholar_caucasian'],
			'scholar_spa2' => $post['scholar_spa2'],
			'scholar_latino' => $post['scholar_latino'],
			'scholar_spa3' => $post['scholar_spa3'],
			'scholar_african_american' => $post['scholar_african_american'],
			'scholar_spa4' => $post['scholar_spa4'],
			'scholar_api' => $post['scholar_api'],
			'scholar_spa5' => $post['scholar_spa5'],
			'scholar_other_ethnicities' => $post['scholar_other_ethnicities'],
			'scholar_spa6' => $post['scholar_spa6'],
			'scholar_unknown_spa' => $post['scholar_unknown_spa'],
			'scholar_spa7' => $post['scholar_spa7'],
			'scholar_spa8' => $post['scholar_spa8'],
			'scholar_coachella_valley' => $post['scholar_coachella_valley'],
			'scholar_inland_empire' => $post['scholar_inland_empire'],
			'scholar_riverside_county' => $post['scholar_riverside_county'],
			'scholar_san_bernandino' => $post['scholar_san_bernandino'],
			'scholar_sw_riverside' => $post['scholar_sw_riverside'],
			'scholar_inyo' => $post['scholar_inyo'],
			'scholar_mono' => $post['scholar_mono'],
			'scholar_kings' => $post['scholar_kings'],
			'scholar_tulare' => $post['scholar_tulare'],
			'scholar_out_of_territory' => $post['scholar_out_of_territory'],
			'scholar_unknown' => $post['scholar_unknown'],
			'scholar_spa_total' => $post['scholar_spa_total'],
			'scholar_ethnicity_total' => $post['scholar_ethnicity_total'],
			'num_sr_reg_istrations_total' => $post['num_sr_reg_istrations_total'],
			'sr_reg_spa1' => $post['sr_reg_spa1'],
			'sr_reg_caucasian' => $post['sr_reg_caucasian'],
			'sr_reg_spa2' => $post['sr_reg_spa2'],
			'sr_reg_latino' => $post['sr_reg_latino'],
			'sr_reg_spa3' => $post['sr_reg_spa3'],
			'sr_reg_african_american' => $post['sr_reg_african_american'],
			'sr_reg_spa4' => $post['sr_reg_spa4'],
			'sr_reg_api' => $post['sr_reg_api'],
			'sr_reg_spa5' => $post['sr_reg_spa5'],
			'sr_reg_other_ethnicities' => $post['sr_reg_other_ethnicities'],
			'sr_reg_spa6' => $post['sr_reg_spa6'],
			'sr_reg_unknown_spa' => $post['sr_reg_unknown_spa'],
			'sr_reg_spa7' => $post['sr_reg_spa7'],
			'sr_reg_spa8' => $post['sr_reg_spa8'],
			'sr_reg_coachella_valley' => $post['sr_reg_coachella_valley'],
			'sr_reg_inland_empire' => $post['sr_reg_inland_empire'],
			'sr_reg_riverside_county' => $post['sr_reg_riverside_county'],
			'sr_reg_san_bernandino' => $post['sr_reg_san_bernandino'],
			'sr_reg_sw_riverside' => $post['sr_reg_sw_riverside'],
			'sr_reg_inyo' => $post['sr_reg_inyo'],
			'sr_reg_mono' => $post['sr_reg_mono'],
			'sr_reg_kings' => $post['sr_reg_kings'],
			'sr_reg_tulare' => $post['sr_reg_tulare'],
			'sr_reg_out_of_territory' => $post['sr_reg_out_of_territory'],
			'sr_reg_unknown' => $post['sr_reg_unknown'],
			'sr_reg_spa_total' => $post['sr_reg_spa_total'],
			'sr_reg_ethnicity_total' => $post['sr_reg_ethnicity_total'],
			'num_sr_wandering_total' => $post['num_sr_wandering_total'],
			'sr_wandering_spa1' => $post['sr_wandering_spa1'],
			'sr_wandering_caucasian' => $post['sr_wandering_caucasian'],
			'sr_wandering_spa2' => $post['sr_wandering_spa2'],
			'sr_wandering_latino' => $post['sr_wandering_latino'],
			'sr_wandering_spa3' => $post['sr_wandering_spa3'],
			'sr_wandering_african_american' => $post['sr_wandering_african_american'],
			'sr_wandering_spa4' => $post['sr_wandering_spa4'],
			'sr_wandering_api' => $post['sr_wandering_api'],
			'sr_wandering_spa5' => $post['sr_wandering_spa5'],
			'sr_wandering_other_ethnicities' => $post['sr_wandering_other_ethnicities'],
			'sr_wandering_spa6' => $post['sr_wandering_spa6'],
			'sr_wandering_unknown_spa' => $post['sr_wandering_unknown_spa'],
			'sr_wandering_spa7' => $post['sr_wandering_spa7'],
			'sr_wandering_spa8' => $post['sr_wandering_spa8'],
			'sr_wandering_coachella_valley' => $post['sr_wandering_coachella_valley'],
			'sr_wandering_inland_empire' => $post['sr_wandering_inland_empire'],
			'sr_wandering_riverside_county' => $post['sr_wandering_riverside_county'],
			'sr_wandering_san_bernandino' => $post['sr_wandering_san_bernandino'],
			'sr_wandering_sw_riverside' => $post['sr_wandering_sw_riverside'],
			'sr_wandering_inyo' => $post['sr_wandering_inyo'],
			'sr_wandering_mono' => $post['sr_wandering_mono'],
			'sr_wandering_kings' => $post['sr_wandering_kings'],
			'sr_wandering_tulare' => $post['sr_wandering_tulare'],
			'sr_wandering_out_of_territory' => $post['sr_wandering_out_of_territory'],
			'sr_wandering_unknown' => $post['sr_wandering_unknown'],
			'sr_wandering_spa_total' => $post['sr_wandering_spa_total'],
			'sr_wandering_ethnicity_total' => $post['sr_wandering_ethnicity_total'],
			'num_missing_total' => $post['num_missing_total'],
			'missing_spa1' => $post['missing_spa1'],
			'missing_caucasian' => $post['missing_caucasian'],
			'missing_spa2' => $post['missing_spa2'],
			'missing_latino' => $post['missing_latino'],
			'missing_spa3' => $post['missing_spa3'],
			'missing_african_american' => $post['missing_african_american'],
			'missing_spa4' => $post['missing_spa4'],
			'missing_api' => $post['missing_api'],
			'missing_spa5' => $post['missing_spa5'],
			'missing_other_ethnicities' => $post['missing_other_ethnicities'],
			'missing_spa6' => $post['missing_spa6'],
			'missing_unknown_spa' => $post['missing_unknown_spa'],
			'missing_spa7' => $post['missing_spa7'],
			'missing_spa8' => $post['missing_spa8'],
			'missing_coachella_valley' => $post['missing_coachella_valley'],
			'missing_inland_empire' => $post['missing_inland_empire'],
			'missing_riverside_county' => $post['missing_riverside_county'],
			'missing_san_bernandino' => $post['missing_san_bernandino'],
			'missing_sw_riverside' => $post['missing_sw_riverside'],
			'missing_inyo' => $post['missing_inyo'],
			'missing_mono' => $post['missing_mono'],
			'missing_kings' => $post['missing_kings'],
			'missing_tulare' => $post['missing_tulare'],
			'missing_out_of_territory' => $post['missing_out_of_territory'],
			'missing_unknown' => $post['missing_unknown'],
			'missing_spa_total' => $post['missing_spa_total'],
			'missing_ethnicity_total' => $post['missing_ethnicity_total']
		);

		$this->db->insert('lasr_safe_return', $data);

		return $this->db->insert_id();
	}

	public function update($post='', $id)
	{
		$data = array(
			'created_by' => $post['created_by'],
			'office' => $post['office'],
			'month' => $post['month'],
			'quarter' => $post['quarter'],
			'fiscial_year' => $post['fiscial_year'],
			'num_sr_emergency_responders' => $post['num_sr_emergency_responders'],
			'num_sr_education_emergency_responder_participants' => $post['num_sr_education_emergency_responder_participants'],
			'num_scholarships_total' => $post['num_scholarships_total'],
			'scholar_spa1' => $post['scholar_spa1'],
			'scholar_caucasian' => $post['scholar_caucasian'],
			'scholar_spa2' => $post['scholar_spa2'],
			'scholar_latino' => $post['scholar_latino'],
			'scholar_spa3' => $post['scholar_spa3'],
			'scholar_african_american' => $post['scholar_african_american'],
			'scholar_spa4' => $post['scholar_spa4'],
			'scholar_api' => $post['scholar_api'],
			'scholar_spa5' => $post['scholar_spa5'],
			'scholar_other_ethnicities' => $post['scholar_other_ethnicities'],
			'scholar_spa6' => $post['scholar_spa6'],
			'scholar_unknown_spa' => $post['scholar_unknown_spa'],
			'scholar_spa7' => $post['scholar_spa7'],
			'scholar_spa8' => $post['scholar_spa8'],
			'scholar_coachella_valley' => $post['scholar_coachella_valley'],
			'scholar_inland_empire' => $post['scholar_inland_empire'],
			'scholar_riverside_county' => $post['scholar_riverside_county'],
			'scholar_san_bernandino' => $post['scholar_san_bernandino'],
			'scholar_sw_riverside' => $post['scholar_sw_riverside'],
			'scholar_inyo' => $post['scholar_inyo'],
			'scholar_mono' => $post['scholar_mono'],
			'scholar_kings' => $post['scholar_kings'],
			'scholar_tulare' => $post['scholar_tulare'],
			'scholar_out_of_territory' => $post['scholar_out_of_territory'],
			'scholar_unknown' => $post['scholar_unknown'],
			'scholar_spa_total' => $post['scholar_spa_total'],
			'scholar_ethnicity_total' => $post['scholar_ethnicity_total'],
			'num_sr_reg_istrations_total' => $post['num_sr_reg_istrations_total'],
			'sr_reg_spa1' => $post['sr_reg_spa1'],
			'sr_reg_caucasian' => $post['sr_reg_caucasian'],
			'sr_reg_spa2' => $post['sr_reg_spa2'],
			'sr_reg_latino' => $post['sr_reg_latino'],
			'sr_reg_spa3' => $post['sr_reg_spa3'],
			'sr_reg_african_american' => $post['sr_reg_african_american'],
			'sr_reg_spa4' => $post['sr_reg_spa4'],
			'sr_reg_api' => $post['sr_reg_api'],
			'sr_reg_spa5' => $post['sr_reg_spa5'],
			'sr_reg_other_ethnicities' => $post['sr_reg_other_ethnicities'],
			'sr_reg_spa6' => $post['sr_reg_spa6'],
			'sr_reg_unknown_spa' => $post['sr_reg_unknown_spa'],
			'sr_reg_spa7' => $post['sr_reg_spa7'],
			'sr_reg_spa8' => $post['sr_reg_spa8'],
			'sr_reg_coachella_valley' => $post['sr_reg_coachella_valley'],
			'sr_reg_inland_empire' => $post['sr_reg_inland_empire'],
			'sr_reg_riverside_county' => $post['sr_reg_riverside_county'],
			'sr_reg_san_bernandino' => $post['sr_reg_san_bernandino'],
			'sr_reg_sw_riverside' => $post['sr_reg_sw_riverside'],
			'sr_reg_inyo' => $post['sr_reg_inyo'],
			'sr_reg_mono' => $post['sr_reg_mono'],
			'sr_reg_kings' => $post['sr_reg_kings'],
			'sr_reg_tulare' => $post['sr_reg_tulare'],
			'sr_reg_out_of_territory' => $post['sr_reg_out_of_territory'],
			'sr_reg_unknown' => $post['sr_reg_unknown'],
			'sr_reg_spa_total' => $post['sr_reg_spa_total'],
			'sr_reg_ethnicity_total' => $post['sr_reg_ethnicity_total'],
			'num_sr_wandering_total' => $post['num_sr_wandering_total'],
			'sr_wandering_spa1' => $post['sr_wandering_spa1'],
			'sr_wandering_caucasian' => $post['sr_wandering_caucasian'],
			'sr_wandering_spa2' => $post['sr_wandering_spa2'],
			'sr_wandering_latino' => $post['sr_wandering_latino'],
			'sr_wandering_spa3' => $post['sr_wandering_spa3'],
			'sr_wandering_african_american' => $post['sr_wandering_african_american'],
			'sr_wandering_spa4' => $post['sr_wandering_spa4'],
			'sr_wandering_api' => $post['sr_wandering_api'],
			'sr_wandering_spa5' => $post['sr_wandering_spa5'],
			'sr_wandering_other_ethnicities' => $post['sr_wandering_other_ethnicities'],
			'sr_wandering_spa6' => $post['sr_wandering_spa6'],
			'sr_wandering_unknown_spa' => $post['sr_wandering_unknown_spa'],
			'sr_wandering_spa7' => $post['sr_wandering_spa7'],
			'sr_wandering_spa8' => $post['sr_wandering_spa8'],
			'sr_wandering_coachella_valley' => $post['sr_wandering_coachella_valley'],
			'sr_wandering_inland_empire' => $post['sr_wandering_inland_empire'],
			'sr_wandering_riverside_county' => $post['sr_wandering_riverside_county'],
			'sr_wandering_san_bernandino' => $post['sr_wandering_san_bernandino'],
			'sr_wandering_sw_riverside' => $post['sr_wandering_sw_riverside'],
			'sr_wandering_inyo' => $post['sr_wandering_inyo'],
			'sr_wandering_mono' => $post['sr_wandering_mono'],
			'sr_wandering_kings' => $post['sr_wandering_kings'],
			'sr_wandering_tulare' => $post['sr_wandering_tulare'],
			'sr_wandering_out_of_territory' => $post['sr_wandering_out_of_territory'],
			'sr_wandering_unknown' => $post['sr_wandering_unknown'],
			'sr_wandering_spa_total' => $post['sr_wandering_spa_total'],
			'sr_wandering_ethnicity_total' => $post['sr_wandering_ethnicity_total'],
			'num_missing_total' => $post['num_missing_total'],
			'missing_spa1' => $post['missing_spa1'],
			'missing_caucasian' => $post['missing_caucasian'],
			'missing_spa2' => $post['missing_spa2'],
			'missing_latino' => $post['missing_latino'],
			'missing_spa3' => $post['missing_spa3'],
			'missing_african_american' => $post['missing_african_american'],
			'missing_spa4' => $post['missing_spa4'],
			'missing_api' => $post['missing_api'],
			'missing_spa5' => $post['missing_spa5'],
			'missing_other_ethnicities' => $post['missing_other_ethnicities'],
			'missing_spa6' => $post['missing_spa6'],
			'missing_unknown_spa' => $post['missing_unknown_spa'],
			'missing_spa7' => $post['missing_spa7'],
			'missing_spa8' => $post['missing_spa8'],
			'missing_coachella_valley' => $post['missing_coachella_valley'],
			'missing_inland_empire' => $post['missing_inland_empire'],
			'missing_riverside_county' => $post['missing_riverside_county'],
			'missing_san_bernandino' => $post['missing_san_bernandino'],
			'missing_sw_riverside' => $post['missing_sw_riverside'],
			'missing_inyo' => $post['missing_inyo'],
			'missing_mono' => $post['missing_mono'],
			'missing_kings' => $post['missing_kings'],
			'missing_tulare' => $post['missing_tulare'],
			'missing_out_of_territory' => $post['missing_out_of_territory'],
			'missing_unknown' => $post['missing_unknown'],
			'missing_spa_total' => $post['missing_spa_total'],
			'missing_ethnicity_total' => $post['missing_ethnicity_total']
		);

		$this->db->where('ID', $id)
		->update('lasr_safe_return', $data);
	}

	public function delete($id='')
	{
		$this->db->where('ID', $id)
		->delete('lasr_safe_return');
	}

	public function fetch($id='')
	{
		$result = $this->db->where('ID', $id)
		->from('lasr_safe_return')
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
 		->from('lasr_safe_return')
 		->limit($limit, $offset)
 		->get();

 		if($data->num_rows > 0)
		{
			$return['rows'] = $data->result();
		}

		$c = $this->db->select('count(*) as count', false)->from('lasr_safe_return');
        $tmp = $c->get()->result();

        $return['num_rows'] = $tmp[0]->count;

        $this->db->flush_cache();

 		return $return;
	}

}

/* End of file outreach_model.php */
/* Location: ./application/models/outreach_model.php */

?>