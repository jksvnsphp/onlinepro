<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	


//create function for get update profile id ----------		
	public function getProfile($id){
			$this->db->where('id', $id);
			$query = $this->db->get(MANAGER);
			return $query->row_array();
	}	
	

//create function for update profile ----------	
	public function update($data, $id){
		$this->db->where('id', $id);
		$res =  $this->db->update(MANAGER, $data); 
		if($res ){
		  return true;
		}
		else{
			return false;
		}
	}	
		
	
//create function for file upload -------	
	public function uploadfile(){
		$gallery_path = './../upload/manager/';			
		$config = array(
				'upload_path' => $gallery_path,
				'allowed_types' => 'gif|jpg|png|jpeg',
				'max_size' => '1000000',
				'remove_spaces' => true,
		  ); 
		  
		
		  $this->load->library('upload', $config);
		  
		  if ($this->upload->do_upload('file'))		  {
				$image_data = $this->upload->data();
			    return $image_data;
		  }
		  else{
				$image_data = $this->upload->data();
				return $image_data;
		  }
	 }		
	
}	
