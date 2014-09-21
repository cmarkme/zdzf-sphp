<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 class Settings_Model extends CI_Model {
 
 	public function saveAllSettings($data)
 	{
 		foreach($data as $key => $value)
 		{
 			if(is_array($value))
 			{
 				asort($value);
 				$value = mysql_real_escape_string(serialize($value));
 			}

 			if(strlen($value))
 			{
 				$this->db->query("INSERT INTO `options` (`option_name`, `option_value`) VALUES ('{$key}', '{$value}') ON DUPLICATE KEY UPDATE `option_value` = '{$value}'");
 			}
 		}
 	}

 	public function loadAllSettings()
 	{
 		$query = $this->db->query("SELECT * FROM `options`");
 		$data = array();
 		foreach($query->result() as $row)
 		{
 			$data[$row->option_name] = maybe_unserialize($row->option_value);
 		}

 		return $data;
 	}

 	public function loadSetting($option_name)
 	{
 		$query = $this->db->query("SELECT `option_value` as value FROM `options` WHERE `option_name` = '{$option_name}' LIMIT 1");

 		$data = $query->result();

 		if(isset($data[0]))
 		{
 			return maybe_unserialize($data[0]->value); 			
 		}

 		return array();
 	}
 
 }
 
 /* End of file settings.php */
 /* Location: ./application/models/settings.php */
  ?>