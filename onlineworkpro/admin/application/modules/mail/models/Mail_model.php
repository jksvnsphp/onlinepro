<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mail_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	

	
//create function for get banner ---------
	public function getAllMail(){
		$this->db->select('*');
		$this->db->where('is_deleted',0);
		$query = $this->db->get(MAIL_TEMPLATE);
		return $query->result_array();
	}
	
	
//create function for  get banner by id --------	
	public function getMailById($id){	
		$this->db->where('id', $id);
		$query = $this->db->get(MAIL_TEMPLATE);
		return $query->row_array();
	}
	
	
//create function for update banner ----------	
	public function update($data, $id){
		$this->db->where('id', $id);
		$res =  $this->db->update(MAIL_TEMPLATE, $data); 
		if($res ){
		  return true;
		}
		else{
			return false;
		}
	}			
	
	
//create function delete banner --------
	public function delete($id){
		$this->db->where('id',$id);
		$data['is_deleted'] = 1;
		$query = $this->db->update(MAIL_TEMPLATE,$data);
		
		if($query){
			return true;
		}else{
			return false;
		}
	} 
	

	
	
	
}	
