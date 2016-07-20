<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Type_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	
	
	public function gettype()
	{		
			$this->db->where('is_deleted', 0);
			$this->db->order_by('id','desc');
			$query = $this->db->get(TYPE);
			return $query->result_array();
	}
	
	
	function gettypeById($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get(TYPE);
		return $query->row_array();
	}
	
	
	public function update($data, $id)
	{	
		$this->db->where('id', $id);
		$res =  $this->db->update(TYPE , $data); 
		if($res )
		{
		  return true;
		}
		else
		{
			return false;
		}
	}
	
	public function delete( $id)
	{	
		$this->db->where('id', $id);
		//$data['is_deleted']=1;
		$res =  $this->db->delete(TYPE);		
		if($res )
		{
		  return true;
		}
		else
		{
			return false;
		}
	
	}
	
	
//create function for file upload -------	
	public function do_upload(){
		$gallery_path = './../upload/profile/';			
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
