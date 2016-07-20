<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Evening_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	


//create function for get update evening id ----------		
	public function getEvening($res_id){
			$this->db->where('rest_id', $res_id);
			$this->db->where('food_type','Evening');
			$query = $this->db->get(FOODTIME);
			return $query->result_array();
	}	
	


		
	public function deletemenu( $res_id)
	{	
	$this->db->where('rest_id', $res_id);
	$this->db->where('food_type','Evening');		
	 $res =  $this->db->delete(FOODTIME);	
	   	
		if($res )
		{
		  return true;
		}
		else
		{
			return false;
		}
	   	
	}

	
}	
