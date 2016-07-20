<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	


//create function for get all blog --------
	public function getBlog(){
		$this->db->select('*');
		$this->db->where('is_deleted',0);	
		$query = $this->db->get(BLOGS);
		return $query->result_array();
	}	
	
	
//create function for  get blog by id --------	
	public function getBlogById($id){	
		$this->db->where('id', $id);
		$query = $this->db->get(BLOGS);
		return $query->row_array();
	}	
	

//create function for update blog ----------	
	public function update($data, $id){
		$this->db->where('id', $id);
		$res =  $this->db->update(BLOGS, $data); 
		if($res ){
		  return true;
		}
		else{
			return false;
		}
	}	
		
	
//create function delete blog --------
	public function delete($id){
		$this->db->where('id',$id);
		$data['is_deleted'] = 1;
		$query = $this->db->update(BLOGS,$data);
		
		if($query){
			return true;
		}else{
			return false;
		}
	} 	
	

//create function for file upload -------	
	public function do_upload(){
		$gallery_path = './../upload/blog/' ;			
		$config = array(
			'upload_path' => $gallery_path,
			'allowed_types' => 'gif|jpg|png|jpeg',
			'max_size' => '1000000',
			'remove_spaces' => true,
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
