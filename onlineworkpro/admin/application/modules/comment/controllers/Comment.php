<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Comment_model'); 
    }	
	
	public function index(){
		$data['allcomment'] = $this->Comment_model->getComment();
		$this->load->view('index' ,$data);	
	}
	
	
//create function for add new comment -----
	public function add(){
		$data['allblog'] = $this->Comment_model->getBlog();
		
		$this->form_validation->set_rules('blog_id', 'Blog', 'trim|required');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Id', 'trim|required|is_unique['.BLOG_COMMENT.'.email]');
		$this->form_validation->set_rules('message', 'message', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == true) {					
			
			$data = array(			
				'blog_id' => $this->input->post('blog_id'),
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),	
				'message' => $this->input->post('message'),	
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->db->insert(BLOG_COMMENT,$data);
			
			if($result){
				$msg = "Comment added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('comment');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('warning',$msg));	  
				redirect('comment');
			}	
		}			
		$this->load->view('add',$data);	
	}	
	

//create function for view comment -----
	public function edit($id){
		$data['allblog'] = $this->Comment_model->getBlog();
		$data['comment'] = $this->Comment_model->getCommentById($id);
		
		$this->form_validation->set_rules('is_active', ' Active', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == true) {				
			
			$data = array(	
				'is_active' => $this->input->post('is_active'),		
				'modified_at'=>date("Y-m-d H:i:s")	,	
				'modified_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->Comment_model->update($data,$id);
			
			if($result){
				$msg = "Updated Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('comment');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('warning',$msg));	  
				redirect('comment');
			}	
		}		
		
		$this->load->view('edit',$data);	
	}	
	
	
//create function for delete comment -----
	public function delete($id){
		$result = $this->Comment_model->delete($id);
		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('comment');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('comment');		
		}
	}		
	
	
}
