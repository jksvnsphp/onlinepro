<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Events_model'); 
    }	

	public function index(){
		$data = array();
		$data['allevents'] =  $this->Events_model->getevents();
		$data['Title'] =  'Events Management';
		$this->load->view('index',$data );
		
	}
	

//*******************************************create function for add new Admin**********************************
	public function add(){
		$data['allHotel'] = $this->Events_model->getHotel();
		
		$this->form_validation->set_rules('hotal_id', 'Menu Name', 'trim|required');		
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');	
        
        if ($this->form_validation->run() == true) {		
		
		//die("gg");
			if(isset($_FILES['logo']['name']) && !empty( $_FILES['logo']['name']  ))
			{
				$image_banner = $this->Events_model->do_upload();	
				$image =  $image_banner['file_name'];
			}	
			
			$data = array(
				'hotal_id'=>req('hotal_id'),
				'events_name'=>req('events_name'),	
				'cuisines'=>req('cuisines'),			
				'logo'=>$image,
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->db->insert(RESTAURANT,$data);
			
			if($result){
				$msg = "Events added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('events');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('events');
			}	
		}
		
		$data['Title'] =  "Add New Events";	
		$this->load->view('add',$data);
	}
// **********************************************End function for add new Admin********************************************
	
// ***********************************************create function for edit Admin*******************************************
	public function edit($id){
		$data['events'] =  $this->Events_model->geteventsById($id);		
	    $this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');		
		$this->form_validation->set_rules('mobile', 'mobile', 'trim|required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('address', 'address', 'trim|required');
		$this->form_validation->set_rules('type', 'type', 'trim|required');		
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == true) {
			
			if(isset($_FILES['eventsfile']['name']) && !empty( $_FILES['eventsfile']['name']  ))
			{
				$image_banner = $this->Events_model->do_upload();		
				$image =  $image_banner['file_name'];
				@unlink("./../upload/profile/".$data['events']['profile_pic']);
			}	
			else
			{
				$image = $this->input->post('old_eventsfile');				
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
				'eventsname'=>$this->input->post('eventsname'),
				'email'=>$this->input->post('email'),
				'password'=>$pass,
				'mobile'=>$this->input->post('mobile'),
				'address'=>$this->input->post('address'),
				'type'=>$this->input->post('type'),
				'Permission'=>implode(',',$this->input->post('Permission')),
				'profile_pic'=>$image,
				'is_active'=>$this->input->post('is_active'),
				'modified_at'=>date("Y-m-d H:i:s")	,	
				'modified_by'=>$this->session->eventsdata('id')		
			);
			
			$result =  $this->Events_model->update($data,$id);
			
			if($result){
				$msg = "events Update Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('events');
			}
			else{
				$msg = "Error in updating!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('events');
			}	
        }
		$data['Title'] =  "Edit Events";	
		$this->load->view('edit',$data );
	}
	
// ***********************************************End function for edit Admin*******************************************

	
// ***********************************************create function for Delete Admin*******************************************		
	public function delete($id){
		$data['events'] =  $this->Events_model->geteventsById($id);
		@unlink("./../upload/events/".$data['events']['logo']);
		$result =  $this->Events_model->delete( $id );		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('events');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('events');		
		}
	}	
	
// ***********************************************End function for Delete Admin*******************************************	
	
}
