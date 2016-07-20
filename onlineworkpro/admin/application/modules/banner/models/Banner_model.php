<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Banner_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	

	
//create function for get banner ---------
	public function getBanner(){
		$this->db->select('*');
		$this->db->order_by('id','desc');
		$this->db->where('is_deleted',0);
		$query = $this->db->get(BANNER);
		if($query){
			return $query->result_array();
		}else{
			return false;
		}
	}
	
	
//create function for file upload -------	
	public function do_upload(){
		$gallery_path = './../upload/banner/' ;			
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
	
	
//create function delete banner --------
	public function delete($id){
		$this->db->where('id',$id);
		$data['is_deleted'] = 1;
		$query = $this->db->update(BANNER,$data);
		
		if($query){
			return true;
		}else{
			return false;
		}
	} 
	
	
//create function for  get banner by id --------	
	public function getBannerById($id){	
		$this->db->where('id', $id);
		$query = $this->db->get(BANNER);
		return $query->row_array();
	}
	
	
//create function for update banner ----------	
	public function update($data, $id){
		$this->db->where('id', $id);
		$res =  $this->db->update(BANNER, $data); 
		if($res ){
		  return true;
		}
		else{
			return false;
		}
	}		
	
	
	
	
}	
