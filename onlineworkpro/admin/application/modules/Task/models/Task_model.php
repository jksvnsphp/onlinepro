<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Task_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	

	
//create function for get banner ---------
	public function getAdress(){
		$this->db->select('*');
		
		$query = $this->db->get(TASK);
		if($query){
			return $query->result_array();
		}else{
			return false;
		}
	}
	
	
//create function for  get banner by id --------	
	public function getStateById($id){	
		$this->db->where('task_id', $id);
		$query = $this->db->get(TASK);
		return $query->row_array();
	}
	
	
//create function for update banner ----------	
	public function update($data, $id){
		$this->db->where('task_id', $id);
		$res =  $this->db->update(TASK, $data); 
		if($res ){
		  return true;
		}
		else{
			return false;
		}
	}			
	
	
//create function delete banner --------
	public function delete($id){
		$this->db->where('task_id',$id);
		$data['is_deleted'] = 1;
		$query = $this->db->update(TASK,$data);
		
		if($query){
			return true;
		}else{
			return false;
		}
	} 
	

	
}	
