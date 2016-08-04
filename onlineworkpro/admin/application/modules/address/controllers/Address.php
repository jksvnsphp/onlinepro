<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Address_model'); 
    }	

	public function index(){
		$data['Address'] = $this->Address_model->getAdress();
		$data['Title']="Address";	
		$this->load->view('index',$data);
	}
	

//create function for add new banner -------	
	public function add(){
		
		$this->form_validation->set_rules('state', 'State', 'trim|required|is_unique['.ADDRESS.'.state]');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == true) {	
			
			$data = array(
				'state' => $this->input->post('state'),
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->db->insert(ADDRESS,$data);
			
			if($result){
				$msg = "Information added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('state');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('state');
			}	
		}	
		$data['Title']="Add State";	
		$this->load->view('add',$data);
	}
	

//create function for edit banner --------	
	public function edit($id){
		$data['state_id'] = $this->Address_model->getStateById($id);
		
		$this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == true){
			
			$data = array(
				'state' => $this->input->post('state'),
				'is_active' => $this->input->post('is_active'),
				'modified_at'=>date("Y-m-d H:i:s")	,	
				'modified_by'=>$this->session->userdata('id')					
			);
			
			$result = $this->Address_model->update($data,$id);
			
			if($result){
				$msg = "Update Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('state');
			}
			else{
				$msg = "Error in editing!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('state');
			}	
        }
		$data['Title']="Edit State";	
		$this->load->view('edit',$data );
	}
	
	
//create function for delete banner -----
	public function delete($id){
		$result = $this->Address_model->delete($id);
		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('state');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('state');		
		}
	}	
	
}
