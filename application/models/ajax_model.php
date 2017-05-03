<?php

class Ajax_model extends CI_Model {
    public function __construct() 
    {
        parent::__construct();
    }
     
	
	// Mobile no exists or not.
	    public function mobile_check($mob)
    {	
        $data = array('mobile' =>$mob);
        $query = $this->db->get_where(my_test, $data);
        return $query->num_rows();
    }
	
    
}

?>