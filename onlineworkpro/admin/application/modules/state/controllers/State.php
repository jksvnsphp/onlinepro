<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('State_model'); 
    }	

	public function index(){
		$data['state'] = $this->State_model->getState();
		$data['Title']="State";	
		$this->load->view('index',$data);
	}
	

//create function for add new banner -------	
	public function add(){
		
		$this->form_validation->set_rules('state', 'State', 'trim|required|is_unique['.STATES.'.state]');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == true) {	
			
			$data = array(
				'state' => $this->input->post('state'),
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->db->insert(STATES,$data);
			
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
		$data['state_id'] = $this->State_model->getStateById($id);
		
		$this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == true){
			
			$data = array(
				'state' => $this->input->post('state'),
				'is_active' => $this->input->post('is_active'),
				'modified_at'=>date("Y-m-d H:i:s")	,	
				'modified_by'=>$this->session->userdata('id')					
			);
			
			$result = $this->State_model->update($data,$id);
			
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
		$result = $this->State_model->delete($id);
		
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
