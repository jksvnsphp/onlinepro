<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dinner_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	


//create function for get update dinner id ----------		
	public function getDinner($res_id){
			$this->db->where('rest_id', $res_id);
			$this->db->where('food_type','Dinner');
			$query = $this->db->get(FOODTIME);
			return $query->result_array();
	}	
	


		
	public function deletemenu( $res_id)
	{	
	$this->db->where('rest_id', $res_id);
	$this->db->where('food_type','Dinner');		
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
