<?php

class User_model extends CI_Model {
    public $error       = array();
    public $error_count = 0;
    
    public function __construct() 
    {
        parent::__construct();
    }
     
	 // user login checking.
    public function check_login()
    {
        $row = $this->input->post('row');

        $data = array('email' => $row['email']);
        $query = $this->db->get_where(USERS, $data);
		
        if ( ($query->num_rows() == 1) ) {
            $user = $query->row();
            $en_password =$user->password;
        }
        // if user found
        if ( ($query->num_rows() == 1) && ($en_password == md5($row['password'])) ){
            $row_q = $query->row();
            $this->session->set_userdata('logged_in', 1);
            $this->session->set_userdata('user_id'  , $row_q->id);
			$this->session->set_userdata('email' , $row_q->email);
			
			redirect('thread/show_threads');
			 
        }
		else 
		{
			$this->error['login'] = 'Please Check Email and Password';
			$this->error_count = 1;
        }
    }
	
	// Change Password
	    public function change_password()
    {
        $row = $this->input->post('row');
	
	$sess_array = array('s_email' => $row['email']);
	//$this->session->userdata['s_email']['s_email'];
		
        $data = array('email' => $row['email']);
        $query = $this->db->get_where(USERS, $data);
        
        // if user found
        if ($query->num_rows() == 1 && $row['password']!=""){
            $row_q = $query->row();
			
			$data=array('password'=>md5($row['password']));
			$this->db->where('email',$row['email']);
			$this->db->update('USERS',$data);
			
            $this->session->set_userdata('logged_in', 1);
            $this->session->set_userdata('user_id'  , $row_q->id);
			$this->session->set_userdata('email' , $row_q->email);
			
			$data=array('password'=>md5($row['password']));
			$this->db->where('email',$row['email']);
			$this->db->update('USERS',$data);
            
			redirect('thread/show_threads');
			 
        } else {
            $this->error['login'] = 'Please Check Email and Password';
            $this->error_count = 1;
        }
    }
	
    //user regitration
	
    public function register()
    {
        $row = $this->input->post('row');
        //check mobile
		 $is_exist_mobile = $this->db->get_where(USERS, 
                array('mobile' => $row['mobile']))->num_rows();
        if ($is_exist_mobile > 0) {
            $this->error['mobile'] = 'Mobile number already exist.';
        }
        // check email 
        $is_exist_email = $this->db->get_where(USERS, 
                array('email' => $row['email']))->num_rows();
        if ($is_exist_email > 0) {
            $this->error['email'] = 'Email already exist.';
        }
        if (strlen($row['mobile']) < 10 || strlen($row['mobile']) >10) {
            $this->error['mobile'] = 'Mobile Number Should Be 10 Digit';
        }
        
        // check password
        if ($row['password'] != $this->input->post('password2')) {
            $this->error['password'] = 'Password not match';
        } 
		else if (strlen($row['password']) < 5) {
            $this->error['password'] = 'Password minimum 5 character';
        }
        if (count($this->error) == 0) {
            //$key = $this->config->item('encryption_key');
            $row['password'] = md5($row['password']);
            $this->db->insert(USERS, $row);
        } 
		else {
            $this->error_count = count($this->error);
        }
    }
}

?>