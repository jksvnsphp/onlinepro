<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Adress_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	

	
//create function for get banner ---------
	public function getAdress(){
		$this->db->select('*');
		$this->db->where('is_deleted',0);
		$query = $this->db->get(ADDRESS);
		if($query){
			return $query->result_array();
		}else{
			return false;
		}
	}
	
	
//create function for  get banner by id --------	
	public function getStateById($id){	
		$this->db->where('id', $id);
		$query = $this->db->get(ADDRESS);
		return $query->row_array();
	}
	
	
//create function for update banner ----------	
	public function update($data, $id){
		$this->db->where('id', $id);
		$res =  $this->db->update(ADDRESS, $data); 
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
		$query = $this->db->update(ADDRESS,$data);
		
		if($query){
			return true;
		}else{
			return false;
		}
	} 
	

	
	
	
}	
