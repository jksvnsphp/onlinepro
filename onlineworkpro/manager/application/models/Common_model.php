<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model {
	
    public function __construct(){
        parent::__construct();  
    }
    
//create function for get update profile id ----------		
	public function getProfile($id){
			$this->db->where('id', $id);
			$query = $this->db->get(MANAGER);
			return $query->row_array();
	     }
	
	
//create function for get details ----------		
	public function getDetails($name){
		$this->db->select('value');
		$this->db->where('name',$name);
		$query = $this->db->get(SETTING)->row_array();		
		return $query['value'];
	}
	
	
	//create function for get Menu details ----------		
	public function getMenu($res_id){
		$this->db->select('res.*,ht.menu_name');
		$this->db->from(RESTAURANT_MENU." as res");
		$this->db->join(MENU." as ht", "ht.id = res.menu_id");
		$this->db->where('restaurant_id',$res_id);
		$this->db->where('ht.is_active',1);
		$this->db->where('ht.is_deleted',0);
		$query = $this->db->get();		
		return $query->result_array();
	}
	
	
	
	
	
	
}
