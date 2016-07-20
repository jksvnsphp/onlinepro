<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Subscriber_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	

//create function for get newsletter ---------
	public function getSubscriber(){
		$this->db->select('*');
		$this->db->where('is_deleted',0);
		$this->db->order_by('id','desc');
		$query = $this->db->get(NEWSLETTER);
		if($query){
			return $query->result_array();
		}else{
			return false;
		}
	}
		
//create function delete newsletter --------
	public function delete($id){
		$this->db->where('id',$id);
		$data['is_deleted'] = 1;
		$query = $this->db->update(NEWSLETTER,$data);
		
		if($query){
			return true;
		}else{
			return false;
		}
	} 
	
	
	
}	
