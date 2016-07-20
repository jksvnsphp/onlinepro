<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menumanage_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
    }	


	public function getMenumanage($resid,$menuid){
		$this->db->select("*");
		$this->db->from(RESTMENU);		
		$this->db->where("Res_id='".$resid."'");
		$this->db->where("menu_id='".$menuid."'");		
		$query = $this->db->get();
		return $query->result_array();		
	}

//create function for get category ---------
	/*public function getMenuCategory(){
		$this->db->select("*");	
		$query = $this->db->get(MENU);
		return $query->result_array();
	}*/
	
	
	
		public function getMenuCategory($ResId){
	    
		$this->db->select(" sp.*,ht.menu_name");
		$this->db->from(RESTAURANT_MENU." as sp");
		$this->db->join(MENU." as ht", "ht.id = sp.menu_id");	
		$this->db->where("sp.restaurant_id='".$ResId."'");	
		$query = $this->db->get();
		///echo $str = $this->db->last_query();
	    return $query->result_array();		
		
		//var_dump($ss);	
		//die();		
		
	}


//create function for insert gallery ----------	
	public function insert($data){			
		//start multiple file upload
	    $resid=@$data['ResId'];
	    $menuid= @$data['MenuId'];	
		if(!empty($_FILES['userfile']['name'][0])){
			$image_banner =$this->Menumanage_model->do_upload();	
			foreach($image_banner as $key=>$img){
				$pic = array(
				'Res_id' => $resid,
				'menu_id' => $menuid,
				'image' => $img			
				);
			   $result = $this->db->insert(RESTMENU,$pic);
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
		$gallery_path = './../upload/restaurantmenu';			
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
		$delete = $this->db->get(RESTMENU)->row_array();		
		unlink("./../upload/restaurantmenu/".$delete['image']);
		
		$this->db->where('id',$id);
		$query = $this->db->delete(RESTMENU);
		
		if($query){
			echo 'true';
		}
		else{
			echo 'false';
		}		
	}
	


}
