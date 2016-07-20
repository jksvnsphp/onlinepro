<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banquets extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Banquets_model'); 
    }	

	public function index(){
		$data = array();
		$data['allbanquets'] =  $this->Banquets_model->getbanquets();
		$data['Title'] =  'Banquets Management';
		$this->load->view('index',$data );
		
	}
	

//*******************************************create function for add new Admin**********************************
	public function add(){
		$data['allHotel'] = $this->Banquets_model->getHotel();
		
		$this->form_validation->set_rules('hotal_id', 'Menu Name', 'trim|required');		
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');	
        
        if ($this->form_validation->run() == true) {		
		
		//die("gg");
			if(isset($_FILES['logo']['name']) && !empty( $_FILES['logo']['name']  ))
			{
				$image_banner = $this->Banquets_model->do_upload();	
				$image =  $image_banner['file_name'];
			}	
			
			$data = array(
				'hotal_id'=>req('hotal_id'),
				'banquets_name'=>req('banquets_name'),	
				'cuisines'=>req('cuisines'),			
				'logo'=>$image,
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->db->insert(RESTAURANT,$data);
			
			if($result){
				$msg = "Banquets added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('banquets');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('banquets');
			}	
		}
		
		$data['Title'] =  "Add New Banquets";	
		$this->load->view('add',$data);
	}
// **********************************************End function for add new Admin********************************************
	
// ***********************************************create function for edit Admin*******************************************
	public function edit($id){
		$data['banquets'] =  $this->Banquets_model->getbanquetsById($id);		
	    $this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');		
		$this->form_validation->set_rules('mobile', 'mobile', 'trim|required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('address', 'address', 'trim|required');
		$this->form_validation->set_rules('type', 'type', 'trim|required');		
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == true) {
			
			if(isset($_FILES['banquetsfile']['name']) && !empty( $_FILES['banquetsfile']['name']  ))
			{
				$image_banner = $this->Banquets_model->do_upload();		
				$image =  $image_banner['file_name'];
				@unlink("./../upload/profile/".$data['banquets']['profile_pic']);
			}	
			else
			{
				$image = $this->input->post('old_banquetsfile');				
			}	
			
			if($_REQUEST['password']!='')
			{
			$pass=sha1($this->input->post('password'));
			}
			else
			{
			$pass=$_REQUEST['oldpassword']	;	
			}
			
			$data = array(  
				'name'=>$this->input->post('name'),
				'banquetsname'=>$this->input->post('banquetsname'),
				'email'=>$this->input->post('email'),
				'password'=>$pass,
				'mobile'=>$this->input->post('mobile'),
				'address'=>$this->input->post('address'),
				'type'=>$this->input->post('type'),
				'Permission'=>implode(',',$this->input->post('Permission')),
				'profile_pic'=>$image,
				'is_active'=>$this->input->post('is_active'),
				'modified_at'=>date("Y-m-d H:i:s")	,	
				'modified_by'=>$this->session->banquetsdata('id')		
			);
			
			$result =  $this->Banquets_model->update($data,$id);
			
			if($result){
				$msg = "banquets Update Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('banquets');
			}
			else{
				$msg = "Error in updating!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('banquets');
			}	
        }
		$data['Title'] =  "Edit Banquets";	
		$this->load->view('edit',$data );
	}
	
// ***********************************************End function for edit Admin*******************************************

	
// ***********************************************create function for Delete Admin*******************************************		
	public function delete($id){
		$data['banquets'] =  $this->Banquets_model->getbanquetsById($id);
		@unlink("./../upload/banquets/".$data['banquets']['logo']);
		$result =  $this->Banquets_model->delete( $id );		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('banquets');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('banquets');		
		}
	}	
	
// ***********************************************End function for Delete Admin*******************************************	
	
}
