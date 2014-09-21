<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_Model extends CI_Model {
 
    public function get_all_users($sort = false) 
    {
        if($sort != false)
        {
            $this->db->order_by('user_name', 'asc');
        }

        $q = $this->db->get('users');
        
        if($q->num_rows() > 0) {
            
            return $q->result();
        }
        
        return array();
        
    }

    public function get_all_users_meta($sort = false)
    {
        if($sort != false)
        {
            $this->db->order_by('user_name', 'asc');
        }
        
        $q = $this->db->get('users');
        $users = array();
        
        foreach($q->result() as $r)
        {
            $users[$r->ID] = $this->get_user($r->ID);
        }
        
        
        return $users;
    }

    public function load_user_data()
    {
        if(isset($_SESSION['_alz_wils_data']))
        {
            $data = unserialize(base64_decode($_SESSION['_alz_wils_data']));

            return $this->get_user($data['ID']);
        }

        return false;
    }
    
    public function get_user($uID) 
    {
        
        $q = $this->db->where('ID', $uID)
        ->get('users');
        
        if($q->num_rows() > 0) 
        {
            $data = $q->row();
            $data->meta = $this->get_user_meta($uID);            

            if($data->user_manager) {
                $data->manager = $this->get_user_meta($data->user_manager);
            }

            $data->subs = $this->get_user_subs($uID, true);

            return $data;
        }

        
        return array();
    }

    function get_user_subs($uID, $ids_only = false)
    {
        $q = $this->db->where('user_manager', $uID)
        ->get('users');

        if($q->num_rows() > 0) 
        {
            if(!$ids_only)
            {
                return $q->result();
            }

            $ids = array();

            foreach($q->result() as $res)
            {
                $ids[] = $res->ID;
            }

            return $ids;
        }
        
        return array();
    }

    public function get_user_meta($uID)
    {
        $data = array();
        $meta = array();
        $m = $this->db->where('ID', $uID)
            ->get('user_meta');

        if($m->num_rows() > 0) 
        {
            $meta_info = $m->result();
            
            foreach($meta_info as $key)
            {
                $meta[$key->meta_key] = $key->meta_value;
            }
        }

        return $meta;
    }
	
	public function is_admin() 
    {
		
		if(isset($_SESSION['_alz_wils_data'])) {
            $sess = unserialize(base64_decode($_SESSION['_alz_wils_data']));

            $test = $this->db->query("SELECT * FROM `users` WHERE `session_id` = '{$sess['session']}'");

            if($test->num_rows > 0) {
                
                $data = $test->row();
                
                /*print_r($data);
                echo '<br />'.session_id();*/
                
                return true;
            }
            
		}
		
		return false;
	}
	
	public function admin_login($usr, $pwd) 
    {
        $usr = trim($usr);
        $pwd = trim($pwd);

        $this->load->helper('cookie');
        $salted = $this->salt_password($pwd);

        $user_info = $this->db->query("SELECT `user_name`, `ID` FROM `users` WHERE `user_password` = '{$salted}' AND `user_name` = '{$usr}' AND `user_status` = 'active' limit 1");

        if($user_info->num_rows() > 0) {
            $user = $user_info->row();

            $this->db->Query("UPDATE `users` SET `session_id` = '".session_id()."', `last_login` = '".date('Y-m-d H:i:s')."' WHERE `ID` = '{$user->ID}'");

            $sess = array('display_name' => $user->user_name,
            'ID' => $user->ID,
            'session' => session_id());

            $_SESSION['_alz_wils_data'] = base64_encode(serialize($sess));

            $cookie = array(
                'name'   => 'last_login_name',
                'value'  => $usr,
                'expire' => '31536000'
            );

            $this->input->set_cookie($cookie);
            // echo preg_replace('/http(s)?:\/\//', '', $this->config->item('base_url'));
            // die();

            return true;				
        } else {

            return false;
        }
	}

    public function insert($post)
    {
        $meta = $post['meta'];

        $post['user_password'] = $this->salt_password($post['user_password']);
        $role = $this->getUserRole($post['user_group_id']);
        
        $data = array(
            'user_name' => trim($post['user_name']),
            'user_password' => trim($post['user_password']),
            'user_email' => $post['user_email'],
            'user_group' => $role->name,
            'user_group_id' => $post['user_group_id'],
            'create_date' => date('Y-m-d H:i:s'),
            'user_status' => $post['user_status'],
            'accounts' => isset($post['accounts']) ? base64_encode(serialize($post['accounts'])) : base64_encode(serialize(array())),
            'user_manager' => $post['user_manager']
        );
        
        $this->db->insert('users', $data);
        
        $id = $this->db->insert_id();

        if(is_array($meta))
        {
            foreach($meta as $key => $val)
            {
                $this->db->insert('user_meta', array('ID' => $id, 'meta_key' => $key, 'meta_value' => $val));
            }
        }

        return $id;
    }
    
    public function update_password($usr, $pwd) 
    {
        
        $salt = $this->salt_password($pwd);
        
        $this->db->where('login', $usr);
        $this->db->update('users', array('user_password' => $salt));
        
    }
    
    public function update_user($post, $ID) 
    {
        $meta = $post['meta'];

        $role = $this->getUserRole($post['user_group_id']);

        $data = array(
            'user_name' => $post['user_name'],
            'user_email' => $post['user_email'],
            'user_group' => $role->name,
            'user_group_id' => $post['user_group_id'],
            'user_status' => $post['user_status'],
            'accounts' => isset($post['accounts']) ? base64_encode(serialize($post['accounts'])) : base64_encode(serialize(array())),
            'user_manager' => $post['user_manager']
        );

        if(isset($post['user_password']) && strlen($post['user_password'])) 
        {
            $data['user_password'] = $this->salt_password($post['user_password']);
        }
        
        $this->db->where('ID', $ID);
        $this->db->update('users', $data);

        if(is_array($meta))
        {
            foreach($meta as $key => $val)
            {   
                $t = $this->db->where(array('ID' => $ID, 'meta_key' => $key))
                ->get('user_meta');

                if($t->num_rows > 0) {
                    $this->db->where(array('ID' => $ID, 'meta_key' => $key))
                    ->update('user_meta', array('ID' => $ID, 'meta_key' => $key, 'meta_value' => $val));
                }
                else
                {
                    $this->db->insert('user_meta', array('ID' => $ID, 'meta_key' => $key, 'meta_value' => $val));   
                }
            }
        }
    }
    
    public function salt_password($string) 
    {
        // Create a salt
        $salt = md5($string."%*4!#$;\.k~(_@");

        // Hash the string
        $string = md5("$salt$string$salt");

        return $string;
    }

    public function get_labor_accounts($user_id, $module = 'all')
    {
        $return = array('0' => 'Select Account');
        $accounts = $this->db->select('accounts')
        ->where('ID', $user_id)
        ->get('users');

        $r = $accounts->result();

        if(strlen($r[0]->accounts)) 
        {
            
            $account_ids =  unserialize(base64_decode($r[0]->accounts));

            if(is_array($account_ids) && count($account_ids))
            {
                if($module != 'all')
                {
                    $this->db->where($module, 'on');
                }

                $this->db->where_in('ID', $account_ids);

                $labor_accounts = $this->db->get('labor_accounts')
                ->result();

                foreach($labor_accounts as $la) 
                {
                    if(strlen($la->ledger))
                    $return[$la->ledger] = $la->ledger.'|'.$la->description;
                }

                return $return;
            }
        }

        return $return;
    }

    public function get_labor_accounts2($user_id)
    {
        $return = array();
        $accounts = $this->db->select('accounts')
        ->where('ID', $user_id)
        ->get('users');

        $r = $accounts->result();
        
        if(strlen($r[0]->accounts)) 
        {
            
            $account_ids =  unserialize(base64_decode($r[0]->accounts));

            $labor_accounts = $this->db->where_in('ID', $account_ids)
            ->get('labor_accounts')
            ->result();

            foreach($labor_accounts as $la) 
            {
                if(strlen($la->ledger))
                $return[] = array('name' => $la->ledger, 'description' => $la->description);
            }

            return $return;
        }

        return array();
    }

    public function do_bulk_action($action, $ids)
    {
        $this->db->where_in('ID', $ids);

        switch($action) {

            case 'delete':
                $this->db->delete('users');
            break;

            case 'status_active':
                $this->db->update('users', array('user_status' => 'active'));
            break;

            case 'status_inactive':
                $this->db->update('users', array('user_status' => 'inactive'));
            break;
        }
    }

    public function saveRole($post='')
    {
        $data = array(
            'role_name' => $post['name'],
            'role_description' => $post['description'],
            'role_caps' => serialize($post['caps'])
        );

        $this->db->insert('user_roles', $data);

        return $this->db->insert_id();
    }

    public function updateRole($id, $post='')
    {
        $data = array(
            'role_name' => $post['name'],
            'role_description' => $post['description'],
            'role_caps' => serialize($post['caps'])
        );

        $this->db->where('role_id', $id)
        ->update('user_roles', $data);
    }

    public function deleteRole($id='')
    {
        $this->db->where('role_id', $id)
        ->delete('user_roles');
    }

    public function getUserRoles()
    {
        $query = $this->db->query("SELECT `role_name` as name, `role_description` as description, `role_caps` as caps, `role_id` as ID FROM `user_roles`");
        
        return $query->result();
    }

    public function getUserRole($id)
    {
        $query = $this->db->query("SELECT `role_name` as name, `role_description` as description, `role_caps` as caps, `role_id` as ID FROM `user_roles` WHERE `role_id` = {$id}")->result();
        
        return $query[0];
    }

    public function getUserCaps()
    {
        if(isset($this->user->ID))
        {
            $query = $this->db->query("SELECT `user_roles`.role_caps as caps FROM `user_roles` 
                                        LEFT JOIN `users` ON (`user_roles`.role_id = `users`.user_group_id)
                                        WHERE `users`.ID = {$this->user->ID} LIMIT 1;")->result();

            return $query[0]->caps;
        }

        return array();
    }

}