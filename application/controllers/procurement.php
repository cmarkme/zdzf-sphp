<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Procurement extends MY_Controller {

    var $redirect;

	function __construct()
	{
		parent::__construct();
		set_title('Chapter Procurement');

        $this->redirect = can_this_user('procurement') ? 'procurement' : 'procurement/my_orders';
	}

    public function index()
    {
        $data = array();

        $offset = $this->uri->segment($this->config->item('paginiation_segment'));
        $list = $this->procurement_model->get_orders(true, $this->config->item('pagination_per_page'), $offset, $this->input->get_post(NULL, TRUE));

        $p_config = array();
        $p_config['base_url'] = site_url('procurement/page');
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

        $data['procurements'] = $list['rows'];

    	$this->load->view('procurement/list', $data);
    }

    public function all_orders()
    {
        $data = array();

        $offset = $this->uri->segment($this->config->item('paginiation_segment'));
        $list = $this->procurement_model->get_orders(false, $this->config->item('pagination_per_page'), $offset, $this->input->get_post(NULL, TRUE));

        $p_config = array();
        $p_config['base_url'] = site_url('procurement');
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

        $data['procurements'] = $list['rows'];

        $this->load->view('procurement/all_orders', $data);
    }

    public function my_orders()
    {
        $data = array();

        $offset = $this->uri->segment($this->config->item('paginiation_segment'));
        $list = $this->procurement_model->get_orders($this->user->ID, $this->config->item('pagination_per_page'), $offset, $this->input->get_post(NULL, TRUE));

        $p_config = array();
        $p_config['base_url'] = site_url('procurement');
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

        $data['procurements'] = $list['rows'];

        $this->load->view('procurement/my_orders', $data);
    }

    public function templates()
    {
        $data = array();

        $data['templates'] = $this->procurement_model->get_templates();

        $this->load->view('procurement/templates_list', $data);
    }

    public function new_template()
    {

        if($this->input->post('save_template'))
        {
            $t_id = $this->procurement_model->save_template($this->input->post());

            $this->session->set_flashdata('procurement', 'The template has been created.');

            redirect('procurement/templates');
        }

        $this->load->view('procurement/new_template');
    }

    public function edit_template($id)
    {
        $data = array();

        $data['template'] = $this->procurement_model->get_template($id);

    	if($this->input->post('update_template'))
    	{
    		$this->procurement_model->edit_template($id, $this->input->post());

            $this->session->set_flashdata('procurement', 'The template has been updated.');

            redirect('procurement/templates');
    	}

    	$this->load->view('procurement/edit_template', $data);
    }

    public function new_order($id, $product = false)
    {
        if($this->input->post('save_order'))
        {
            $order_id = $this->procurement_model->save_order($id, $this->input->post());

            $this->session->set_flashdata('procurement', 'The order has been saved.');

            redirect($this->redirect);
        }

        if($product) {

            $info = $this->procurement_model->get_product($id, $product);

            echo json_encode($info);
            die();
        }

        $data['template'] = $this->procurement_model->get_template($id);
        $data['products'][''] = 'Select Product';
        $data['locations'] = get_option('office_locations');

        foreach($data['template']->products as $product)
        {
            $data['products'][$product->ID] = $product->item_name;
        }

        $data['user'] = $this->user;
        $accounts = $this->labor_model->get_account_list('procurement');

        $data['account_code'] = $this->config->item('produrement_account');

        foreach($accounts as $key => $value)
        {
            if($value != 'Select Account')
            {
                $t = explode('-', $value);
                $key = str_replace($t[2], $data['account_code'], $key);
                $t[2] = $data['account_code'];

                $data['accounts'][$key] = implode('-', $t);
            }
            else
            {
                $data['accounts'][$key] = $accounts[$key];
            }
        }

        $this->load->view('procurement/create_order', $data);
    }

    public function edit_order($id, $order, $product = false)
    {
        if($this->input->post('update_order'))
        {
            $order_id = $this->procurement_model->update_order($order, $this->input->post());

            $this->session->set_flashdata('procurement', 'The order has been updated.');

            redirect($this->redirect);
        }

        if($product) {

            $info = $this->procurement_model->get_product($id, $product);

            echo json_encode($info);
            die();
        }

        $data['template'] = $this->procurement_model->get_template($id);
        $data['order'] = $this->procurement_model->get_order($id, $order);
        $data['products'][''] = 'Select Product';
        $data['locations'] = get_option('office_locations');
        
        foreach($data['template']->products as $product)
        {
            $data['products'][$product->ID] = $product->item_name;
        }

        $data['user'] = $this->user;
        $accounts = $this->labor_model->get_account_list('procurement');

        $data['account_code'] = $this->config->item('produrement_account');

        foreach($accounts as $key => $value)
        {
            if($value != 'Select Account')
            {
                $t = explode('-', $value);
                $key = str_replace($t[2], $data['account_code'], $key);
                $t[2] = $data['account_code'];

                $data['accounts'][$key] = implode('-', $t);
            }
            else
            {
                $data['accounts'][$key] = $accounts[$key];
            }
        }

        if ($data['order']->created_by != $this->user->ID)
        {
            if(!in_array($data['order']->created_by, $this->user->subs))
            {
                if(!can_this_user('procurement/edit_order/all'))
                    redirect('cheat');              
            }
        }

        $this->load->view('procurement/order_template', $data);
    }

    public function delete_order($template, $order = FALSE)
    {
        if($order == FALSE)
        {
            $this->session->set_flashdata('procurement', 'The template has been deleted.');
            
            $this->db->where('ID', $template)->delete('chapter_procurement_templates');
        }
        else
        {
            $this->session->set_flashdata('procurement', 'The order has been deleted.');

            $this->db->where(array('template_id' => $template, 'ID' => $order))->delete('chapter_procurement_orders');
            $this->db->where('order_id', $order)->delete('chapter_procurement_order_products');
        }

        redirect($this->redirect);
    }

    public function delete_template($template, $order = FALSE)
    {
        if($order == FALSE)
        {
            $this->session->set_flashdata('procurement', 'The template has been deleted.');
            
            $this->db->where('ID', $template)->delete('chapter_procurement_templates');
        }
        else
        {
            $this->session->set_flashdata('procurement', 'The order has been deleted.');

            $this->db->where(array('template_id' => $template, 'ID' => $order))->delete('chapter_procurement_orders');
            $this->db->where('order_id', $order)->delete('chapter_procurement_order_products');
        }

        redirect('procurement/templates');
    }



    public function emails()
    {
        if($this->input->post('save_emails'))
        {
            $this->email_model->save_emails('procurement', $this->input->post('email'));

            $this->session->set_flashdata('procurement', 'Procurement emails have been updated.');

            redirect('procurement/emails');
        }

        $data = $this->email_model->get_emails('procurement');
        $this->load->view('procurement/emails', $data);
    }

    public function download($value='')
    {
        $FileName = 'timeoff-requests-'.date("d-m-y") . '.csv';
        header('Content-Type: application/csv');  
        header('Content-Disposition: attachment; filename="' . $FileName . '"'); 
        header("Pragma: no-cache");
        header("Expires: 0");

        $list = $this->procurement_model->get_orders($this->input->get('user_id'), $this->config->item('pagination_per_page'), 0, $this->input->get_post(NULL, TRUE));
        $timeoff_requests = $list['rows'];
        $headers = array_keys(get_object_vars($timeoff_requests[0]));
    // echo '<pre>'.print_r($headers, true).'</pre>';
        echo implode(',', $headers)."\n";

        foreach($timeoff_requests as $request)
        {
            $request = get_object_vars($request);
            $manager = $this->users_model->get_user_meta($request['created_by']);

            $request['created_by'] = $manager['first_name'].' '.$manager['last_name'];
            $request['date_created'] = date_for_display($request['date_created']);
            $request['date_rec_com'] = date_for_display($request['date_rec_com']);
            $request['date_inv_rec'] = date_for_display($request['date_inv_rec']);
            $request['chk_req_sub'] = date_for_display($request['chk_req_sub']);
            unset($request['form_data']);

            echo implode(',', $request)."\n";
        }
    }   
}

/* End of file procurement.php */
/* Location: ./application/controllers/procurement.php */