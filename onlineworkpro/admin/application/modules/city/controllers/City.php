<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('City_model'); 
    }	

	public function index(){
		$data['city'] = $this->City_model->getCity();
		$data['Title']="City";	
		$this->load->view('index',$data);
	}
	

//create function for add new city -------	
	public function add(){
		
		$this->form_validation->set_rules('city', 'City', 'trim|required|is_unique['.CITIES.'.city]');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == true) {	
			
			$data = array(
				'state_id' => $this->input->post('state_id'),
				'city' => $this->input->post('city'),
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->db->insert(CITIES,$data);
			
			if($result){
				$msg = "City added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('city');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('city');
			}	
		}
		
		$data['state'] = $this->City_model->getState();	
		$data['Title']="Add City";	
		$this->load->view('add' ,$data);
	}
	

//create function for edit city --------	
	public function edit($id){
		$data['city_id'] = $this->City_model->getCityById($id);
		
		$this->form_validation->set_rules('city', 'city', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == true){
			
			$data = array(
				'state_id' => $this->input->post('state_id'),
				'city' => $this->input->post('city'),
				'is_active' => $this->input->post('is_active'),
				'modified_at'=>date("Y-m-d H:i:s")	,	
				'modified_by'=>$this->session->userdata('id')					
			);
			
			$result = $this->City_model->update($data,$id);
			
			if($result){
				$msg = "Update Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('city');
			}
			else{
				$msg = "Error in editing!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('city');
			}	
        }
		$data['state'] = $this->City_model->getState();	
		$data['Title']="Edit City";	
		$this->load->view('edit',$data );
	}
//create function for delete city -----
	public function delete($id){
		$result = $this->City_model->delete($id);
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('city');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('city');		
		}
	}	
	
}
