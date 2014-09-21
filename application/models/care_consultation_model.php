<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Care_consultation_model extends CI_Model {

	public function save($post='')
	{
		$data = array(
			'created_by' => $post['created_by'],
			'date' => date('Y-m-d'),
			'event_date' => date('Y-m-d', strtotime($post['event_date'])),
			'office' => $post['office'],
			'quarter' => $post['quarter'],
			'fiscial_year' => $post['fiscial_year'],
			'month' => $post['month'],
			'early_stage_care_consultation' => $post['early_stage_care_consultation'],
			'contracted_agency_name' => $post['contracted_agency_name'],
			'care_level' => $post['care_level'],
			'num_care_consultations' => $post['num_care_consultations'],
			'num_undup_care_consultations' => $post['num_undup_care_consultations'],
			'num_cc_in_person' => $post['num_cc_in_person'],
			'num_cc_by_phone' => $post['num_cc_by_phone'],
			'num_cc_by_email_letter' => $post['num_cc_by_email_letter'],
			'num_cc_hrs_provided' => $post['num_cc_hrs_provided'],
			'd_wilshire' => $post['d_wilshire'],
			'und_wilshire' => $post['und_wilshire'],
			'd_csun' => $post['d_csun'],
			'und_csun' => $post['und_csun'],
			'd_gela' => $post['d_gela'],
			'und_gela' => $post['und_gela'],
			'dup_los_angeles_total' => $post['dup_los_angeles_total'],
			'undup_los_angeles_total' => $post['undup_los_angeles_total'],
			'd_spa_1' => $post['d_spa_1'],
			'und_spa_1' => $post['und_spa_1'],
			'd_spa_2' => $post['d_spa_2'],
			'und_spa_2' => $post['und_spa_2'],
			'd_spa_3' => $post['d_spa_3'],
			'und_spa_3' => $post['und_spa_3'],
			'd_spa_4' => $post['d_spa_4'],
			'und_spa_4' => $post['und_spa_4'],
			'd_spa_5' => $post['d_spa_5'],
			'und_spa_5' => $post['und_spa_5'],
			'd_spa_6' => $post['d_spa_6'],
			'und_spa_6' => $post['und_spa_6'],
			'd_spa_7' => $post['d_spa_7'],
			'und_spa_7' => $post['und_spa_7'],
			'd_spa_8' => $post['d_spa_8'],
			'und_spa_8' => $post['und_spa_8'],
			'd_san_bernandino_county' => $post['d_san_bernandino_county'],
			'und_san_bernandino_county' => $post['und_san_bernandino_county'],
			'd_riverside_county' => $post['d_riverside_county'],
			'und_riverside_county' => $post['und_riverside_county'],
			'd_kings_county' => $post['d_kings_county'],
			'und_kings_county' => $post['und_kings_county'],
			'd_tulare_county' => $post['d_tulare_county'],
			'und_tulare_county' => $post['und_tulare_county'],
			'd_inyo_county' => $post['d_inyo_county'],
			'und_inyo_county' => $post['und_inyo_county'],
			'd_mono_county' => $post['d_mono_county'],
			'und_mono_county' => $post['und_mono_county'],
			'd_coachella_valley' => $post['d_coachella_valley'],
			'und_coachella_valley' => $post['und_coachella_valley'],
			'd_inland_empire' => $post['d_inland_empire'],
			'und_inland_empire' => $post['und_inland_empire'],
			'd_southwest_riverside' => $post['d_southwest_riverside'],
			'und_southwest_riverside' => $post['und_southwest_riverside'],
			'd_unknown' => $post['d_unknown'],
			'und_unknown' => $post['und_unknown'],
			'spa_duplicated_total' => $post['spa_duplicated_total'],
			'spa_unduplicated_total' => $post['spa_unduplicated_total'],
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
			'eth_duplicated_total' => $post['eth_duplicated_total'],
			'eth_unduplicated_total' => $post['eth_unduplicated_total'],
			'd_newspaper' => $post['d_newspaper'],
			'und_newspaper' => $post['und_newspaper'],
			'd_magazine' => $post['d_magazine'],
			'und_magazine' => $post['und_magazine'],
			'd_radio' => $post['d_radio'],
			'und_radio' => $post['und_radio'],
			'd_television' => $post['d_television'],
			'und_television' => $post['und_television'],
			'd_billboard_or_sign' => $post['d_billboard_or_sign'],
			'und_billboard_or_sign' => $post['und_billboard_or_sign'],
			'd_yellow_pages' => $post['d_yellow_pages'],
			'und_yellow_pages' => $post['und_yellow_pages'],
			'd_relative' => $post['d_relative'],
			'und_relative' => $post['und_relative'],
			'd_ref_friend' => $post['d_ref_friend'],
			'und_ref_friend' => $post['und_ref_friend'],
			'd_coworker_or_supervisor' => $post['d_coworker_or_supervisor'],
			'und_coworker_or_supervisor' => $post['und_coworker_or_supervisor'],
			'd_doctor' => $post['d_doctor'],
			'und_doctor' => $post['und_doctor'],
			'd_nursing_home_staff' => $post['d_nursing_home_staff'],
			'und_nursing_home_staff' => $post['und_nursing_home_staff'],
			'd_other_health_professional' => $post['d_other_health_professional'],
			'und_other_health_professional' => $post['und_other_health_professional'],
			'd_alz_assoc_staff_program' => $post['d_alz_assoc_staff_program'],
			'und_alz_assoc_staff_program' => $post['und_alz_assoc_staff_program'],
			'd_mailing' => $post['d_mailing'],
			'und_mailing' => $post['und_mailing'],
			'd_saw_flyer_brochure' => $post['d_saw_flyer_brochure'],
			'und_saw_flyer_brochure' => $post['und_saw_flyer_brochure'],
			'd_email' => $post['d_email'],
			'und_email' => $post['und_email'],
			'd_website' => $post['d_website'],
			'und_website' => $post['und_website'],
			'd_health_fair' => $post['d_health_fair'],
			'und_health_fair' => $post['und_health_fair'],
			'd_telephone_call' => $post['d_telephone_call'],
			'und_telephone_call' => $post['und_telephone_call'],
			'd_dont_remember' => $post['d_dont_remember'],
			'und_dont_remember' => $post['und_dont_remember'],
			'd_ref_other' => $post['d_ref_other'],
			'und_ref_other' => $post['und_ref_other'],
			'source_duplicated_total' => $post['source_duplicated_total'],
			'source_unduplicated_total' => $post['source_unduplicated_total'],
			'd_person_w_memory_problems' => $post['d_person_w_memory_problems'],
			'und_person_w_memory_problems' => $post['und_person_w_memory_problems'],
			'd_spouse_partner' => $post['d_spouse_partner'],
			'und_spouse_partner' => $post['und_spouse_partner'],
			'd_daughter_son' => $post['d_daughter_son'],
			'und_daughter_son' => $post['und_daughter_son'],
			'd_sister_brother' => $post['d_sister_brother'],
			'und_sister_brother' => $post['und_sister_brother'],
			'd_grandchild' => $post['d_grandchild'],
			'und_grandchild' => $post['und_grandchild'],
			'd_friend' => $post['d_friend'],
			'und_friend' => $post['und_friend'],
			'd_inlaw' => $post['d_inlaw'],
			'und_inlaw' => $post['und_inlaw'],
			'd_other_relative' => $post['d_other_relative'],
			'und_other_relative' => $post['und_other_relative'],
			'd_healthcare_comm_service_provider' => $post['d_healthcare_comm_service_provider'],
			'und_healthcare_comm_service_provider' => $post['und_healthcare_comm_service_provider'],
			'd_other' => $post['d_other'],
			'und_other' => $post['und_other'],
			'relationship_duplicated_total' => $post['relationship_duplicated_total'],
			'relationship_unduplicated_total' => $post['relationship_unduplicated_total']
		);

		$this->db->insert('lasr_care_consultation', $data);

		return $this->db->insert_id();
	}

	public function update($post='', $id)
	{
		$data = array(
			'created_by' => $post['created_by'],
			'event_date' => date('Y-m-d', strtotime($post['event_date'])),
			'office' => $post['office'],
			'quarter' => $post['quarter'],
			'fiscial_year' => $post['fiscial_year'],
			'month' => $post['month'],
			'early_stage_care_consultation' => $post['early_stage_care_consultation'],
			'contracted_agency_name' => $post['contracted_agency_name'],
			'care_level' => $post['care_level'],
			'num_care_consultations' => $post['num_care_consultations'],
			'num_undup_care_consultations' => $post['num_undup_care_consultations'],
			'num_cc_in_person' => $post['num_cc_in_person'],
			'num_cc_by_phone' => $post['num_cc_by_phone'],
			'num_cc_by_email_letter' => $post['num_cc_by_email_letter'],
			'num_cc_hrs_provided' => $post['num_cc_hrs_provided'],
			'd_wilshire' => $post['d_wilshire'],
			'und_wilshire' => $post['und_wilshire'],
			'd_csun' => $post['d_csun'],
			'und_csun' => $post['und_csun'],
			'd_gela' => $post['d_gela'],
			'und_gela' => $post['und_gela'],
			'dup_los_angeles_total' => $post['dup_los_angeles_total'],
			'undup_los_angeles_total' => $post['undup_los_angeles_total'],
			'd_spa_1' => $post['d_spa_1'],
			'und_spa_1' => $post['und_spa_1'],
			'd_spa_2' => $post['d_spa_2'],
			'und_spa_2' => $post['und_spa_2'],
			'd_spa_3' => $post['d_spa_3'],
			'und_spa_3' => $post['und_spa_3'],
			'd_spa_4' => $post['d_spa_4'],
			'und_spa_4' => $post['und_spa_4'],
			'd_spa_5' => $post['d_spa_5'],
			'und_spa_5' => $post['und_spa_5'],
			'd_spa_6' => $post['d_spa_6'],
			'und_spa_6' => $post['und_spa_6'],
			'd_spa_7' => $post['d_spa_7'],
			'und_spa_7' => $post['und_spa_7'],
			'd_spa_8' => $post['d_spa_8'],
			'und_spa_8' => $post['und_spa_8'],
			'd_san_bernandino_county' => $post['d_san_bernandino_county'],
			'und_san_bernandino_county' => $post['und_san_bernandino_county'],
			'd_riverside_county' => $post['d_riverside_county'],
			'und_riverside_county' => $post['und_riverside_county'],
			'd_kings_county' => $post['d_kings_county'],
			'und_kings_county' => $post['und_kings_county'],
			'd_tulare_county' => $post['d_tulare_county'],
			'und_tulare_county' => $post['und_tulare_county'],
			'd_inyo_county' => $post['d_inyo_county'],
			'und_inyo_county' => $post['und_inyo_county'],
			'd_mono_county' => $post['d_mono_county'],
			'und_mono_county' => $post['und_mono_county'],
			'd_coachella_valley' => $post['d_coachella_valley'],
			'und_coachella_valley' => $post['und_coachella_valley'],
			'd_inland_empire' => $post['d_inland_empire'],
			'und_inland_empire' => $post['und_inland_empire'],
			'd_southwest_riverside' => $post['d_southwest_riverside'],
			'und_southwest_riverside' => $post['und_southwest_riverside'],
			'd_unknown' => $post['d_unknown'],
			'und_unknown' => $post['und_unknown'],
			'spa_duplicated_total' => $post['spa_duplicated_total'],
			'spa_unduplicated_total' => $post['spa_unduplicated_total'],
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
			'eth_duplicated_total' => $post['eth_duplicated_total'],
			'eth_unduplicated_total' => $post['eth_unduplicated_total'],
			'd_newspaper' => $post['d_newspaper'],
			'und_newspaper' => $post['und_newspaper'],
			'd_magazine' => $post['d_magazine'],
			'und_magazine' => $post['und_magazine'],
			'd_radio' => $post['d_radio'],
			'und_radio' => $post['und_radio'],
			'd_television' => $post['d_television'],
			'und_television' => $post['und_television'],
			'd_billboard_or_sign' => $post['d_billboard_or_sign'],
			'und_billboard_or_sign' => $post['und_billboard_or_sign'],
			'd_yellow_pages' => $post['d_yellow_pages'],
			'und_yellow_pages' => $post['und_yellow_pages'],
			'd_relative' => $post['d_relative'],
			'und_relative' => $post['und_relative'],
			'd_ref_friend' => $post['d_ref_friend'],
			'und_ref_friend' => $post['und_ref_friend'],
			'd_coworker_or_supervisor' => $post['d_coworker_or_supervisor'],
			'und_coworker_or_supervisor' => $post['und_coworker_or_supervisor'],
			'd_doctor' => $post['d_doctor'],
			'und_doctor' => $post['und_doctor'],
			'd_nursing_home_staff' => $post['d_nursing_home_staff'],
			'und_nursing_home_staff' => $post['und_nursing_home_staff'],
			'd_other_health_professional' => $post['d_other_health_professional'],
			'und_other_health_professional' => $post['und_other_health_professional'],
			'd_alz_assoc_staff_program' => $post['d_alz_assoc_staff_program'],
			'und_alz_assoc_staff_program' => $post['und_alz_assoc_staff_program'],
			'd_mailing' => $post['d_mailing'],
			'und_mailing' => $post['und_mailing'],
			'd_saw_flyer_brochure' => $post['d_saw_flyer_brochure'],
			'und_saw_flyer_brochure' => $post['und_saw_flyer_brochure'],
			'd_email' => $post['d_email'],
			'und_email' => $post['und_email'],
			'd_website' => $post['d_website'],
			'und_website' => $post['und_website'],
			'd_health_fair' => $post['d_health_fair'],
			'und_health_fair' => $post['und_health_fair'],
			'd_telephone_call' => $post['d_telephone_call'],
			'und_telephone_call' => $post['und_telephone_call'],
			'd_dont_remember' => $post['d_dont_remember'],
			'und_dont_remember' => $post['und_dont_remember'],
			'd_ref_other' => $post['d_ref_other'],
			'und_ref_other' => $post['und_ref_other'],
			'source_duplicated_total' => $post['source_duplicated_total'],
			'source_unduplicated_total' => $post['source_unduplicated_total'],
			'd_person_w_memory_problems' => $post['d_person_w_memory_problems'],
			'und_person_w_memory_problems' => $post['und_person_w_memory_problems'],
			'd_spouse_partner' => $post['d_spouse_partner'],
			'und_spouse_partner' => $post['und_spouse_partner'],
			'd_daughter_son' => $post['d_daughter_son'],
			'und_daughter_son' => $post['und_daughter_son'],
			'd_sister_brother' => $post['d_sister_brother'],
			'und_sister_brother' => $post['und_sister_brother'],
			'd_grandchild' => $post['d_grandchild'],
			'und_grandchild' => $post['und_grandchild'],
			'd_friend' => $post['d_friend'],
			'und_friend' => $post['und_friend'],
			'd_inlaw' => $post['d_inlaw'],
			'und_inlaw' => $post['und_inlaw'],
			'd_other_relative' => $post['d_other_relative'],
			'und_other_relative' => $post['und_other_relative'],
			'd_healthcare_comm_service_provider' => $post['d_healthcare_comm_service_provider'],
			'und_healthcare_comm_service_provider' => $post['und_healthcare_comm_service_provider'],
			'd_other' => $post['d_other'],
			'und_other' => $post['und_other'],
			'relationship_duplicated_total' => $post['relationship_duplicated_total'],
			'relationship_unduplicated_total' => $post['relationship_unduplicated_total']
		);

		$this->db->where('ID', $id)
		->update('lasr_care_consultation', $data);
	}

	public function delete($id='')
	{
		$this->db->where('ID', $id)
		->delete('lasr_care_consultation');
	}

	public function fetch($id='')
	{
		$result = $this->db->where('ID', $id)
		->from('lasr_care_consultation')
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
 		->from('lasr_care_consultation')
 		->limit($limit, $offset)
 		->get();

 		if($data->num_rows > 0)
		{
			$return['rows'] = $data->result();
		}

		$c = $this->db->select('count(*) as count', false)->from('lasr_care_consultation');
        $tmp = $c->get()->result();

        $return['num_rows'] = $tmp[0]->count;

        $this->db->flush_cache();

 		return $return;
	}

}

/* End of file care_consultation_model.php */
/* Location: ./application/models/care_consultation_model.php */

?>