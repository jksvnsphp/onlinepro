<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Message_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	

	
//create function for get banner ---------
	public function getMessage(){
		
		$this->db->select("vm.*, v.username");
		$this->db->from(VENDOR_MESSAGE." as vm");
		$this->db->order_by('vm.id','desc');
		$this->db->join(VENDORS." as v", "vm.vendor_id = v.id",'left');
		$this->db->where("vm.is_deleted='0'");
		$query = $this->db->get();//echo $this->db->last_query();
		return $query->result_array();
	}
	
	
//create function for  get banner by id --------	
	public function getMessageById($id){	
		$this->db->where('id', $id);
		$query = $this->db->get(VENDOR_MESSAGE);
		return $query->row_array();
	}
	
	
//create function for update banner ----------	
	public function update($data, $id){
		$this->db->where('id', $id);
		$res =  $this->db->update(VENDOR_MESSAGE, $data); 
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
		$query = $this->db->update(VENDOR_MESSAGE,$data);
		
		if($query){
			return true;
		}else{
			return false;
		}
	} 
	
	
	
	
	
}	
