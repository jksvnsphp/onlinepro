<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {
	
    public function __construct(){
        parent::__construct();  
    }
    
//create function for get update profile id ----------		
	public function getProfile($id){
			$this->db->where('id', $id);
			$query = $this->db->get('admin');
			return $query->row_array();
	     }
	
	
//create function for get details ----------		
	public function getDetails($name){
		$this->db->select('value');
		$this->db->where('name',$name);
		$query = $this->db->get(SETTING)->row_array();;
		return $query['value'];
	}
	
	
	
	
}
