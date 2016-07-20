<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Page_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	

	
//create function for get page ---------
	public function getPage(){
		$this->db->select('*');
		$this->db->where('is_deleted',0);
		$query = $this->db->get(PAGES);
		if($query){
			return $query->result_array();
		}else{
			return false;
		}
	}
	
	
//create function for get menu ---------
	public function getMenu(){
		//$this->db->select('*');
		//$this->db->where('is_deleted',0);
		//$query = $this->db->get('position');
		
		$query = $this->db->query('SELECT * FROM '.POSITION.' WHERE is_deleted=0 AND is_active=1');
		if($query){
			return $query->result_array();
		}else{
			return false;
		}
	}	
	

//create function for  get page by id --------	
	public function getPageById($id){	
		$this->db->where('id', $id);
		$query = $this->db->get(PAGES);
		return $query->row_array();
	}
	
	
//create function for update page ----------	
	public function update($data, $id){
		$this->db->where('id', $id);
		$res =  $this->db->update(PAGES, $data); 
		if($res ){
		  return true;
		}
		else{
			return false;
		}
	}		
	
	
//create function delete page --------
	public function delete($id){
		$this->db->where('id',$id);
		$data['is_deleted'] = 1;
		$query = $this->db->update(PAGES,$data);
		
		if($query){
			return true;
		}else{
			return false;
		}
	} 
	

	
	
	
}	
