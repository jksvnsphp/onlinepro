<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Area_model extends CI_Model {
	
    public function __construct()
    {
        parent::__construct();  
    }	

	//create function for get Area ---------
	public function getarea(){
		$this->db->select("ar.*,st.state,ct.city");
		$this->db->from(AREA." as ar");
		$this->db->join(STATES." as st", "st.id = ar.state_id");
		$this->db->join(CITIES." as ct", "ct.id = ar.city_id");
		$this->db->where("ar.is_deleted='0'");
		$this->db->order_by("ar.id","DESC");
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	
	//create function for  get Area by id --------	
	public function getAreaById($id){	
		$this->db->where('id', $id);
		$query = $this->db->get(AREA);
		return $query->row_array();
	}
	
		public function getAreaById1($id){	
		$this->db->select("ar.*,st.state,ct.city");
		$this->db->from(AREA." as ar");
		$this->db->join(STATES." as st", "st.id = ar.state_id");
		$this->db->join(CITIES." as ct", "ct.id = ar.city_id");
		$this->db->where("ar.id = $id");
		$this->db->order_by("ar.id","DESC");
		$query = $this->db->get();
		return $query->result_array();	
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
		return $query->result_array();
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
		$res =  $this->db->update(AREA, $data); 
		if($res ){
		  return true;
		}
		else{
			return false;
		}
	}			
	
	
	//for city drop down menu
	public function save($id){
		$this->db->where('state_id' , $id);
		$query = $this->db->get(CITIES);
		return $query->result_array();
	}	
	
//create function delete city --------
	public function delete($id){
		$this->db->where('id',$id);
		$data['is_deleted'] = 1;
		$query = $this->db->update(AREA,$data);
		
		if($query){
			return true;
		}else{
			return false;
		}
	} 
	

	
	
	
}	
