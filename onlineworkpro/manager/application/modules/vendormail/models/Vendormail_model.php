<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Vendormail_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	

//create function for get newsletter ---------
	public function getNewsletter()
	{
		$SQL = "SELECT  email FROM ".VENDORS."
		   WHERE crowed_vendor=0 and is_active=1 and is_deleted=0
		 ";
		$this->db->select('*');
		$this->db->where('is_deleted',0);
		$query = $this->db->query($SQL);
		return $query->result_array();
		
	}
}	
