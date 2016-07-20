<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Area_model'); 
    }	

	public function index(){
		$data['area'] = $this->Area_model->getarea();
		$data['Title']="Area";
		$this->load->view('index',$data);
	}
	
//create function for add new city -------	
	public function add(){
		
		$this->form_validation->set_rules('area', 'AREA', 'trim|required|is_unique['.AREA.'.area]');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == true) {	
			
			$data = array(
				'state_id' => $this->input->post('state_id'),
				'city_id' => $this->input->post('city_id'),
				'area' => $this->input->post('area'),
				'zipcode' => $this->input->post('zipcode'),
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->db->insert(AREA,$data);
			if($result){
				$msg = "Area added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('area');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('area');
			}	
		}
		
		$data['state'] = $this->Area_model->getState();	
		$data['city'] = $this->Area_model->getCity();
		$data['Title']="Add Area";
		$this->load->view('add' ,$data);
	}
	

	public function checkstate(){
		$data=array();
		$option=''; 
		$data=$this->Area_model->save($_POST['id']);
			foreach($data as $val){
			$option .= "<option value=".$val['id']."> ".$val['city']." </option>";
			}
			echo $option; 
	  }


//create function for edit city --------	
	public function edit($id){
		$data['area_id'] = $this->Area_model->getAreaById($id);
		$this->form_validation->set_rules('area', 'area', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if($this->form_validation->run() == true){
			
			$data = array(
				'state_id' => $this->input->post('state_id'),
				'city_id' => $this->input->post('city'),
				'area' => $this->input->post('area'),
				'is_active' => $this->input->post('is_active'),
				'modified_at'=>date("Y-m-d H:i:s")	,	
				'modified_by'=>$this->session->userdata('id')					
			);
			
			$result = $this->Area_model->update($data,$id);
			
			if($result){
				$msg = "Update Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('area');
			}
			else{
				$msg = "Error in editing!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('area');
			}	
        }
        $cityid=$data['area_id']['city_id'];
		$data['state'] = $this->Area_model->getState();	
		$data['city'] = $this->Area_model->getCityById($cityid);
		$data['Title']="Edit Area";	
		$this->load->view('edit',$data );
	}
//create function for delete city -----
	public function delete($id){
		$result = $this->Area_model->delete($id);
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('area');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('area');		
		}
	}	
	
}
