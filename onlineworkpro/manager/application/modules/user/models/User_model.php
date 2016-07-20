<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	

//create function for get user ---------
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
	
//create function for get user by id --------	
	public function getUserById($id){	
		$this->db->where('id', $id);
		$query = $this->db->get(USERS);
		return $query->row_array();
	}
		
//create function for update user ----------	
	public function update($data, $id){
		$this->db->where('id', $id);
		$res =  $this->db->update(USERS, $data); 
		if($res ){
		  return true;
		}
		else{
			return false;
		}
	}		
		
//create function delete user --------
	public function delete($id){
		$data['page_id'] = $this->User_model->getUserById($id);
		@unlink("./../upload/user/".$data['page_id']['profile_pic']);
		$this->db->where('id',$id);		
		$query = $this->db->delete(USERS);
		
		if($query){
			return true;
		}else{
			return false;
		}
	} 
	

//create function for file upload -------	
	public function do_upload(){
		$config = array(
			'upload_path' => "./../upload/user/",
			'allowed_types' => 'gif|jpg|png',
			'max_size' => '1000000',
		);	

		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload()){
			$image_data = $this->upload->data();
			return $image_data;
		}
		else{
			$image_data = $this->upload->data();
			return $image_data;
		}
	}		
	
	
	
}	
