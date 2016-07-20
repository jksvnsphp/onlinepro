<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
    }	


	public function getGallery($id){
		$this->db->select("*");
		$this->db->from(GALLERY);		
		$this->db->where("Res_id='".$id."'");
		$query = $this->db->get();
		return $query->result_array();		
	}



//create function for insert gallery ----------	
	public function insert($resid){			
		//start multiple file upload		
		if(!empty($_FILES['userfile']['name'][0])){
			$image_banner =$this->Gallery_model->do_upload();	
			foreach($image_banner as $img){
				$pic = array(
				'Res_id' => $resid,
				'image' => $img			
				);
			   $result = $this->db->insert(GALLERY,$pic);
			}
		}	
		//end multiple file upload		
		
		if($res ){
		  return true;
		}
		else{
			return false;
		}		

	}			


// multiple files upload -----------
	function do_upload(){       
		$gallery_path = './../upload/gallery';			
		$config = array(
			'upload_path' => $gallery_path,
			'allowed_types' => 'gif|jpg|png|jpeg',
			'max_size' => '1000000',
		);	

		$this->load->library('upload', $config);		 
		$files = $_FILES;
		$cpt = count($_FILES['userfile']['name']);
		
		$return_imag =array();
		 
		for($i=0; $i<$cpt; $i++){	
			$_FILES['userfile']['name']= $files['userfile']['name'][$i];
			$_FILES['userfile']['type']= $files['userfile']['type'][$i];
			$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
			$_FILES['userfile']['error']= $files['userfile']['error'][$i];
			$_FILES['userfile']['size']= $files['userfile']['size'][$i];    

			$this->upload->initialize($config);
			$this->upload->do_upload();
			$image_data = $this->upload->data();
			$return_imag[] =$image_data['file_name'];
		}
		
		return $return_imag;
	}


//create function for get selected gallery ---------
	public function deleteImage($id){
		$this->db->where('id',$id);
		$delete = $this->db->get(GALLERY)->row_array();		
		unlink("./../upload/gallery/".$delete['image']);
		
		$this->db->where('id',$id);
		$query = $this->db->delete('gallery_image');
		
		if($query){
			echo 'true';
		}
		else{
			echo 'false';
		}		
	}
	


}
