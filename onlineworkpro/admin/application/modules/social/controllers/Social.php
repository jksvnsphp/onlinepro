<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Social_model'); 
    }	

	public function index(){
		$data = array();
		$data['allsocial'] =  $this->Social_model->getSocial();
		$this->load->view('index',$data );
	}
	

//create function for add new social media -------	
	public function add(){
		
		$this->form_validation->set_rules('title', 'Title', 'trim|required|is_unique['.SOCIAL_MEDIA.'.title]');
		$this->form_validation->set_rules('url', 'Url', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$image ='';
        
        if ($this->form_validation->run() == true) {		
		
			if(isset($_FILES['userfile']['name']) && !empty( $_FILES['userfile']['name']  ))
			{
				$image_banner = $this->Social_model->do_upload();	
				$image =  $image_banner['file_name'];
			}	
			
			$data = array(
				'title'=>$this->input->post('title'),
				'url'=>$this->input->post('url'),
				'image'=>$image,
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->db->insert(SOCIAL_MEDIA,$data);
			
			if($result){
				$msg = "Social Media added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('social');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('social');
			}	
		}	
		$this->load->view('add');
	}
	
	
//create function for edit social media -------		
	public function edit($id){
		$data['social'] =  $this->Social_model->getSocialById($id);
		
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('url', 'Url', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == true) {
			
			if(isset($_FILES['userfile']['name']) && !empty( $_FILES['userfile']['name']  ))
			{
				$image_banner = $this->Social_model->do_upload();		
				$image =  $image_banner['file_name'];
				@unlink("./../upload/social/".$data['social']['image']);
			}	
			else
			{
				$image = $this->input->post('old_userfile');				
			}	
			
			$data = array(  
				'title'=>$this->input->post('title'),
				'url'=>$this->input->post('url'),
				'image'=>$image,
				'is_home'=>$this->input->post('is_home'),
				'is_active'=>$this->input->post('is_active'),
				'modified_at'=>date("Y-m-d H:i:s")	,	
				'modified_by'=>$this->session->userdata('id')		
			);
			
			$result =  $this->Social_model->update($data,$id);
			
			if($result){
				$msg = "Social Media Update Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('social');
			}
			else{
				$msg = "Error in updating!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('social');
			}	
        }
		$this->load->view('edit',$data );
	}
	
	
//create function for add new social media -------		
	public function delete($id){
		$result =  $this->Social_model->delete( $id );		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('social');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('social');		
		}
	}	
	
	
	
}
