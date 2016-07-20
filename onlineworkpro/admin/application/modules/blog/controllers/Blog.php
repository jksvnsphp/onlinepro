<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Blog_model'); 
    }	
	
	public function index(){
		$data['allblog'] = $this->Blog_model->getBlog();
		$this->load->view('index' ,$data);	
	}
	
	
//create function for add new blog -----
	public function add(){
		$this->form_validation->set_rules('title', 'Title', 'trim|required|is_unique['.BLOGS.'.title]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $image ='';

        if ($this->form_validation->run() == true) {		
			
			if(isset($_FILES['userfile']['name']) && !empty( $_FILES['userfile']['name']  ))
			{
				$blog_image = $this->Blog_model->do_upload();	
				$image =  $blog_image['file_name'];
			}				
			
			$data = array(			
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'image'=>$image,				
				'meta_title' => $this->input->post('meta_title'),
				'meta_description' => $this->input->post('meta_description'),
				'meta_keyword' => $this->input->post('meta_keyword'),
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->db->insert(BLOGS,$data);
			
			if($result){
				$msg = "Blog added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('blog');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('warning',$msg));	  
				redirect('blog');
			}	
		}			
		$this->load->view('add');	
	}	
	

//create function for edit blog -----
	public function edit($id){
		$data['blog'] = $this->Blog_model->getBlogById($id);
		
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $image ='';

        if ($this->form_validation->run() == true) {		
			
			if(isset($_FILES['userfile']['name']) && !empty( $_FILES['userfile']['name']  ))
			{
				$blog_image = $this->Blog_model->do_upload();	
				$image =  $blog_image['file_name'];
				
				@unlink("./../upload/blog/".$this->input->post('old_userfile'));
			}	
			else{
				$image = $this->input->post('old_userfile');				
			}				
			
			$data = array(			
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'image'=>$image,				
				'is_active' => $this->input->post('is_active'),				
				'meta_title' => $this->input->post('meta_title'),
				'meta_description' => $this->input->post('meta_description'),
				'meta_keyword' => $this->input->post('meta_keyword'),
				'modified_at'=>date("Y-m-d H:i:s")	,	
				'modified_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->Blog_model->update($data,$id);
			
			if($result){
				$msg = "Updated Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('blog');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('warning',$msg));	  
				redirect('blog');
			}	
		}			
		$this->load->view('edit',$data);	
	}
	
	
//create function for delete page -----
	public function delete($id){
		$result = $this->Blog_model->delete($id);
		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('blog');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('blog');		
		}
	}		
	
	
}
