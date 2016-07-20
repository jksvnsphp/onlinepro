<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class City_model extends CI_Model {
	
    public function __construct()
    {
        parent::__construct();  
    }	

	
//create function for get city ---------
	public function getCity(){
		$this->db->select("ct.*,st.state");
		$this->db->from(CITIES." as ct");
		$this->db->join(STATES." as st", "st.id = ct.state_id");
		$this->db->where("ct.is_deleted='0'");
		$this->db->order_by("ct.id","DESC");
		$query = $this->db->get();
		return $query->result_array();	
	}
	
//create function for  get city by id --------	
	public function getCityById($id){	
		$this->db->where('id', $id);
		$query = $this->db->get(CITIES);
		return $query->row_array();
	}
	

//create function for get state ---------	
	public function getState(){	
		$this->db->where("is_deleted='0'");
		$query = $this->db->get(STATES);
		return $query->result_array();
	}
	
	
//create function for update city ----------	
	public function update($data, $id){
		$this->db->where('id', $id);
		$res =  $this->db->update(CITIES, $data); 
		if($res ){
		  return true;
		}
		else{
			return false;
		}
	}			
	
	
//create function delete city --------
	public function delete($id){
		$this->db->where('id',$id);
		$data['is_deleted'] = 1;
		$query = $this->db->update(CITIES,$data);
		
		if($query){
			return true;
		}else{
			return false;
		}
	} 
	

	
	
	
}	
