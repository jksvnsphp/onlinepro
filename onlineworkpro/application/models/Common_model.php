<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model 
{
	
    public function __construct() 
    {
        parent::__construct();  
    }
    	
	
//create function for get update profile id ----------		
	public function getProfile($id){
			$this->db->where('id', $id);
			$query = $this->db->get(VENDORS);
			return $query->row_array();
	}
	
	
//create function for get details ----------		
	public function getDetails($name){
		$this->db->select('value');
		$this->db->where('name',$name);
		$query = $this->db->get(SETTING)->row_array();;
		return $query['value'];
	}

	
//create function for get pages -------
	function getPages(){
			$this->db->select('*');
			$this->db->where('is_deleted',0);
			$this->db->where('is_active',1);
			$query = $this->db->get(PAGES);
			return $query->result_array();
	}
	
//create function for get pages title-------	
	public function getPageTitle($slug){
		$this->db->select('title');
		$this->db->where('slug',$slug);
		$query = $this->db->get(PAGES)->row_array();;
		return $query['title'];
	}	

//create function for get page details-------

	public function getPageDetails($slug){
		$this->db->select('*');
		$this->db->where('slug',$slug);
		$query = $this->db->get(PAGES)->row_array();;
		return $query->row_array();
	}

	
//create function for get social media ---------
	public function getSocial(){
		$this->db->select('*');
		$this->db->where('is_deleted',0);
		$this->db->where('is_active',1);	
		$query = $this->db->get(SOCIAL_MEDIA);
		return $query->result_array();
	}		
	
	
//create function for get social media ---------
	public function getSocialHome(){
		$this->db->select('*');
		$this->db->where('is_deleted',0);
		$this->db->where('is_active',1);	
		$this->db->where('is_home',1);	
		$query = $this->db->get(SOCIAL_MEDIA);
		return $query->result_array();
	}		
	
	
	
	
	
}
