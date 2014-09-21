<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grants extends MY_Controller {

	public function index()
	{
		$data = array();

		$offset = $this->uri->segment($this->config->item('paginiation_segment'));
		$list = $this->grants_model->getGrantList($this->config->item('pagination_per_page'), $offset, $this->input->get_post(NULL, TRUE));
		
		$p_config = array();
		$p_config['base_url'] = site_url('grants/page');
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

       	$data['grants'] = $list['rows'];
		
		$this->load->view('grants/list', $data);
	}

	public function add()
	{
		if($this->input->post('do_action'))
		{
			$save = $this->input->post();

			$report_att = explode(',', $this->input->post('upload_names'));
			
			$save['nine_nine_zero'] = $this->doUpload('nine_nine_zero');
			$save['ggci_attachments'] = serialize($this->doUpload('ggci_attachments'));
			$save['nce_attachments'] = serialize($this->doUpload('nce_attachments'));
			$save['current_attachments'] = serialize($this->doUpload('current_attachments'));
			$save['grand_guildlines'] = $this->doUpload('grand_guildlines');

			if(is_array($report_att))
			foreach($report_att as $key => $file)
			{
				if(isset($_FILES[$file]))
				{
					$files = $this->doUpload($file);
					$save['report_attachments'][$key] = $files;
				}
			}

			$ID = $this->grants_model->addGrant($save);

			$this->session->set_flashdata('grants', 'The grant has been saved.');


			if(can_this_user('grants/edit'))
			{
				redirect('grants/edit/'.$ID);
			}
			else
			{
				redirect('grants');
			}
		}

		$data = array();
		$data['grants'] = array();

		$users = $this->users_model->get_all_users_meta();

		foreach($users as $user)
		{
			$data['users'][$user->ID] = $user->meta['first_name'].' '.$user->meta['last_name'];
		}
		asort($data['users']);

		$this->load->view('grants/add', $data);
	}

	public function edit($id=0)
	{
		if($this->input->post('do_action'))
		{
			$save = $this->input->post();
			$report_att = explode(',', $this->input->post('upload_names'));

			$save['current_attachments'] = ($this->doUpload('current_attachments') ? serialize(array_merge($this->doUpload('current_attachments'), unserialize($save['old_current_attachments']))) : $save['old_current_attachments']);
			$save['nce_attachments'] = ($this->doUpload('nce_attachments') ? serialize(array_merge($this->doUpload('nce_attachments'), unserialize($save['old_nce_attachments']))) : $save['old_nce_attachments']);
			$save['ggci_attachments'] = ($this->doUpload('ggci_attachments') ? serialize(array_merge($this->doUpload('ggci_attachments'), unserialize($save['old_ggci_attachments']))) : $save['old_ggci_attachments']);
			$save['grand_guildlines'] = $this->doUpload('grand_guildlines');
			$save['nine_nine_zero'] = $this->doUpload('nine_nine_zero');

			if(is_array($report_att))
			foreach($report_att as $key => $file)
			{
				$files = $this->doUpload($file);
				$save['report_attachments'][$key] = $files;
				
				if(empty($save['report_attachments'][$key]) && isset($_POST['old_'.$file]))
				{
					echo 'file name'.$file;
					echo $_POST['old_'.$file];
					$save['report_attachments'][$key] = unserialize(base64_decode($this->input->post('old_'.$file)));
				}
			}

			$this->grants_model->updateGrant($id, $save);

			$this->session->set_flashdata('grants', 'The grant has been updated.');


			redirect('grants/edit/'.$id);
		}

		$data = array();
		$data = $this->grants_model->getGrantData($id);

		$users = $this->users_model->get_all_users_meta();

		foreach($users as $user)
		{
			$data['users'][$user->ID] = $user->meta['first_name'].' '.$user->meta['last_name'];
		}
		asort($data['users']);

		$this->load->view('grants/edit', $data);
	}

	public function delete($id=0)
	{
		$this->grants_model->deleteGrant($id);

		$this->session->set_flashdata('grants', 'The grant has been deleted.');

		redirect('grants');
	}

	public function doUpload($field='')
	{
		$config['upload_path'] = './uploads/';
		$config['max_size'] = 0;
		$config['allowed_types'] = 'jpg|jpeg|png|gif|psd|pdf|doc|docx|csv|txt';

		$this->load->library('upload', $config);

		$tmp = $ret = array();
		$tmp = $this->upload->do_multi_upload($field);

		if(is_array($_FILES[$field]['name']))
		{
			foreach($tmp as $t)
			{
				if(array_key_exists('file_name', $t))
				$ret[] = $t['file_name'];
			}
		}
		else 
		{
			$ret = $tmp['file_name'];
		}

		if(sizeof($ret) > 0)
		{
			return $ret;
		}
		return false;
	}

}

/* End of file grants.php */
/* Location: ./application/controllers/grants.php */
