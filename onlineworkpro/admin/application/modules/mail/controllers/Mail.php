<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Mail_model'); 
    }	

	public function index(){
		$data['mail'] = $this->Mail_model->getAllMail();
		$this->load->view('index',$data);
	}
	

	

//create function for edit banner --------	
	public function edit($id){
		$data['mail'] = $this->Mail_model->getMailById($id);
		
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == true){
			
			$data = array(
				'title' => $this->input->post('title'),
				'from_email' => $this->input->post('from_email'),
				'reply_email' => $this->input->post('reply_email'),
				'subject' => $this->input->post('subject'),
				'message' => $this->input->post('message'),
				'modified_at'=>date("Y-m-d H:i:s")		
			);
			
			$result = $this->Mail_model->update($data,$id);
			
			if($result){
				$msg = "Update Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('mail');
			}
			else{
				$msg = "Error in editing!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('mail');
			}	
        }
		
		$this->load->view('edit',$data );
	}
	
	
//create function for delete banner -----
	public function delete($id){
		$result = $this->Mail_model->delete($id);
		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('mail');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('mail');		
		}
	}	
	
}
