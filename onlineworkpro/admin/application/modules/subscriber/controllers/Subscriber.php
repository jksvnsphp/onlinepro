<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscriber extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Subscriber_model'); 
    }	

	public function index(){
		$data['allsubscriber'] = $this->Subscriber_model->getSubscriber();
		$this->load->view('index',$data);
	}
	

//create function for add new newsletter -------	
	public function add(){
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique['.NEWSLETTER.'.email]');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == true) {		
			
			$data = array(
				'name' => $this->input->post('name'),			
				'email' => $this->input->post('email'),
				'created_at'=>date("Y-m-d H:i:s"),	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->db->insert(NEWSLETTER,$data);
			
			if($result){
				$msg = "Subscriber added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('subscriber');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('subscriber');
			}	
		}	
		$this->load->view('add');
	}
	

//create function for delete newsletter -----
	public function delete($id){
		$result = $this->Subscriber_model->delete($id);
		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('subscriber');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('subscriber');		
		}
	}	
	
}
