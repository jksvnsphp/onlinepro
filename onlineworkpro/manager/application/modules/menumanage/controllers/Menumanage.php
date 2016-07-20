<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menumanage extends MY_Controller {
		
	function __construct(){
        parent::__construct();
		$this->load->model('Menumanage_model'); 
    }	

	public function index(){	
		//$data['allmenucategory'] = $this->Menumanage_model->getCategory();			
		//$this->load->view('index',$data);
	}
	
	//create function for add menucategory ------	
	public function menucategory($ResId){	
	    $data['allmenucategory'] = $this->Menumanage_model->getMenuCategory($ResId);		
		$data['Title']="Restaurant Menumanage";
		$data['resId']=$ResId;
		$this->load->view('menucategory',$data);
	}	
	
		

//create function for add menumanage images ------			
	public function add(){	
		$Request_method = $this->input->server('REQUEST_METHOD');
		if($Request_method == "POST"){
			$data = array(
				'ResId' =>$this->input->post('Res_id'),
				'MenuId' =>$this->input->post('menu_id')
			);		
				
			
			$result = $this->Menumanage_model->insert($data);
			
			if($result){
				$msg = "Add Menumanage Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('menumanage/menucategory/'.$data['ResId']);
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('menumanage/menucategory/'.$data['ResId']);
			}	
        }		
		
		$data['Title']="Restaurant Menumanage";
		$this->load->view('menucategory',$data);
	}		
	
	
//delete image from menumanage image ------
	public function deleteImage(){
		$imageid= $this->input->post('id');
		$result = $this->Menumanage_model->deleteImage($imageid);
		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('menumanage/menucategory');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('menumanage/menucategory');		
		}		
		

	}		
		


}
