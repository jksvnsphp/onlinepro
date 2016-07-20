<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	

	
//create function for get banner ---------
	public function getTrending(){
		$this->db->select('*');		
		$this->db->where('sponsor_type','Trendings');			
		$this->db->where('is_active',1);
		$this->db->order_by('priority_order','asc');		
		$query = $this->db->get(SPONSOR);
		return $query->result_array();
	}	
/****************************Fetch all city****************************************/	
	public function AllCity(){
		$this->db->select('*');		
		$this->db->where("is_active='1'");
		$query = $this->db->get(CITIES);
		return $query->result_array();
	}
	/****************************Fetch Cuisiones****************************************/	
	public function getCuisines()
	{		
	        $this->db->select('*');	
			$this->db->where("is_active='1'");
			$this->db->order_by('rand()');
			$this->db->limit('3');			
			$query = $this->db->get(CUISINE);
			return $query->result_array();
	}
	/****************************Fetch Facilites****************************************/	
	public function getFacilities(){		
		$this->db->select('*');
		$this->db->where('is_active',1);	
		$this->db->order_by('rand()');
		$this->db->limit('3');	
		$query = $this->db->get(FACILITIES);
		return $query->result_array();		
	}	
	
	/****************************Fetch offer****************************************/	
	public function getoffer(){		
		$this->db->select('*');
		$this->db->where('is_active',1);	
		$this->db->order_by('id asc');		
		$query = $this->db->get(GIFT);
		return $query->result_array();		
	}	
	
  /****************************Fetch all Review****************************************/	
	public function getallreview(){
		$this->db->select('*');		
		$this->db->where("is_active='1'");
		$this->db->order_by('id asc');
		$query = $this->db->get(TESTIMONIALS);
		return $query->result_array();
	}
	
	
}	
