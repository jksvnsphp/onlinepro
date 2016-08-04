<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Task_model'); 
    }	

	public function index(){
		$data['alltask'] = $this->Task_model->getAdress();//print_r($data['alltask']);die;
		$data['Title']="Task";	
		$this->load->view('index',$data);
	}
	

//create function for add new banner -------	
	public function add(){
		
		$this->form_validation->set_rules('page_title', 'page_title', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == true) {	
			
			$data = array(
				'page_title' => $this->input->post('page_title'),
				'page_link' => $this->input->post('page_link'),
				'create_date'=>date("Y-m-d H:i:s")
								
			);
		
			$result = $this->db->insert(TASK,$data);
			
			if($result){
				$msg = "Task added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('task');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('task');
			}	
		}	
		$data['Title']="Add Task";	
		$this->load->view('add',$data);
	}
	

//create function for edit banner --------	
	public function edit($id){
		//echo "hello";die;
		$data['state_id'] = $this->Task_model->getStateById($id);
		//print_r($data['state_id']);exit;	
		
		$this->form_validation->set_rules('page_title', 'page_title', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == true) {	
			
			$data = array(
				'page_title' => $this->input->post('page_title'),
				'page_link' => $this->input->post('page_link'),
				'status' => $this->input->post('is_active'),
				'update_date'=>date("Y-m-d H:i:s")	,					
			);
			
			$result = $this->Task_model->update($data,$id);
			
			if($result){
				$msg = "Update Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('task');
			}
			else{
				$msg = "Error in editing!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('task');
			}	
        }
		$data['Title']="Edit task";	
		$this->load->view('edit',$data );
	}
	
	
//create function for delete banner -----
	public function delete($id){
		$result = $this->Task_model->delete($id);
		
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
