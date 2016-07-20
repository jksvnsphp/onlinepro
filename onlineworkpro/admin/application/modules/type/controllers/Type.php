<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Type_model'); 
    }	

	public function index(){
		$data = array();
		$data['alltype'] =  $this->Type_model->gettype();
		$data['Title'] =  'Type List';
		$this->load->view('index',$data );
		
	}
	

//*******************************************create function for add new Admin**********************************
	public function add(){
		
		$this->form_validation->set_rules('type_name', 'Type Name', 'trim|required|is_unique['.TYPE.'.type_name]');		
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$image ='';
        
        if ($this->form_validation->run() == true) {		
		
			
			
			$data = array(
				'type_name'=>$this->input->post('type_name'),				
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->db->insert(TYPE,$data);
			
			if($result){
				$msg = "Type added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('type');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('type');
			}	
		}
		$data['Title'] =  'Add Type';	
		$this->load->view('add',$data);
	}
// **********************************************End function for add new Admin********************************************
	
// ***********************************************create function for edit Admin*******************************************
	public function edit($id){
		$data['type'] =  $this->Type_model->gettypeById($id);		
	    $this->form_validation->set_rules('type_name', 'Type Name', 'trim|required');		
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if ($this->form_validation->run() == true) {
			
			
			$data = array(  
				'type_name'=>$this->input->post('type_name'),				
				'is_active'=>$this->input->post('is_active'),
				'modified_at'=>date("Y-m-d H:i:s")	,	
				'modified_by'=>$this->session->userdata('id')		
			);
			
			$result =  $this->Type_model->update($data,$id);
			
			if($result){
				$msg = "Type Update Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('type');
			}
			else{
				$msg = "Error in updating!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('type');
			}	
        }
		$data['Title'] =  'Edit Type';
		$this->load->view('edit',$data );
	}
	
// ***********************************************End function for edit Admin*******************************************

	
// ***********************************************create function for Delete Admin*******************************************		
	public function delete($id){		
		$result =  $this->Type_model->delete( $id );		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('type');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('type');		
		}
	}	
	
// ***********************************************End function for Delete Admin*******************************************	
	
}
