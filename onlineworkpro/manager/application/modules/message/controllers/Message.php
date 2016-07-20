<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Message_model'); 
		//$this->load->model('Vendor_model'); 
		//$this->load->model('vendor/Vendor_model', 'Vendor_model');
    }	

	public function index(){
		$data['allvenue'] = $this->Message_model->getMessage();
		$this->load->view('index',$data);
	}
	

//create function for add new banner -------	
	public function add(){
		
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		
		
		
        if ($this->form_validation->run() == true) {	
			
			$data = array(
				'vendor_id' => $this->input->post('vendor_id'),
				'title' => $this->input->post('title'),
				'message' => $this->input->post('message'),
				'title' => $this->input->post('title'),
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->db->insert(VENDOR_MESSAGE,$data);
			
			if($result){
				$msg = "Details added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('message');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('message');
			}	
		}	
		
		
		//$vendor  = $this->Vendor_model->getVendors();
		
		//$data['vendor'] = $vendor;
		
		$this->load->view('add' , $data);
	}
	

//create function for edit banner --------	
	public function edit($id){
		$data['vendor_message'] = $this->Message_model->getMessageById($id);
		//pr($data['vendor_message']);
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('is_active', 'Status', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == true){
			
			$data = array(
				'vendor_id' => $this->input->post('vendor_id'),
				'title' => $this->input->post('title'),
				'message' => $this->input->post('message'),
				'is_active' => $this->input->post('is_active'),
				'modified_at'=>date("Y-m-d H:i:s")	,	
				'modified_by'=>$this->session->userdata('id')					
			);
			
			$result = $this->Message_model->update($data,$id);
			
			if($result){
				$msg = "Update Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('message');
			}
			else{
				$msg = "Error in editing!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('message');
			}	
        }
		
		//$vendor  = $this->Vendor_model->getVendors();
		//$data['vendor'] = $vendor;
		
		$this->load->view('edit',$data );
	}
	
	
//create function for delete banner -----
	public function delete($id){
		$result = $this->Message_model->delete($id);
		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('message');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('message');		
		}
	}	
	
}
