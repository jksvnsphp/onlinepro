<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usermail_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	

//create function for get newsletter ---------
	public function getNewsletter()
	{
		$SQL = "SELECT distinct  email FROM `".ORDER."`
		   WHERE order_status_id=2 and is_deleted=0  and receive_newsletter='1'
		 ";
		$this->db->select('*');
		$this->db->where('is_deleted',0);
		$query = $this->db->query($SQL);
		return $query->result_array();
		
	}
}	
