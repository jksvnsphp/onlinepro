<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MY_Controller {
		
	function __construct(){
        parent::__construct();
		$this->load->model('Gallery_model'); 
    }	

	public function index(){	
		//$data['allcategory'] = $this->Gallery_model->getCategory();			
		//$this->load->view('index',$data);
	}
	
	//create function for add category ------	
	public function category($ResId){
		
		$data['Title']="Restaurant Gallery";
		$data['resId']=$ResId;
		$this->load->view('category',$data);
	}	
	
		

//create function for add gallery images ------			
	public function add(){	
		$Request_method = $this->input->server('REQUEST_METHOD');
		if($Request_method == "POST"){		
			$data= $this->input->post('Res_id');			
			
			$result = $this->Gallery_model->insert($data);
			
			if($result){
				$msg = "Add Gallery Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('gallery/category/'.$data);
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('gallery/category/'.$data);
			}	
        }		
		
		
		$this->load->view('add',$data);
	}		
	
	
//delete image from gallery image ------
	public function deleteImage(){
		$imageid= $this->input->post('id');
		$result = $this->Gallery_model->deleteImage($imageid);
		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('gallery/category');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('gallery/category');		
		}		
		

	}		
		


}
