<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mailbox_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	

//create function for get newsletter ---------
	public function getNewsletter()
	{
		$this->db->select('*');
		$this->db->where('is_deleted',0);
		$query = $this->db->get(NEWSLETTER);
		if($query){
			return $query->result_array();
		}else{
			return false;
		}
	}
	
	public function getUsers(){
		$this->db->select('*');
		$this->db->where('is_deleted',0);
		$query = $this->db->get(USERS);
		if($query){
			return $query->result_array();
		}else{
			return false;
		}
	}
	
}	
