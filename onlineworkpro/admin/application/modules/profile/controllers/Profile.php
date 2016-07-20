<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Profile_model'); 
		$this->load->helper('custom_helper'); 
    }	

	public function index(){
		$user_id = $this->session->userdata('id');
		$data['profile_details'] =  $this->Profile_model->getProfile($user_id);	
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Name', 'trim|required');
		$this->form_validation->set_rules('address', 'Name', 'trim|required');
		$this->form_validation->set_rules('username', 'Name', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
        if ($this->form_validation->run() == true) {
			
			if(isset($_FILES['file']['name']) && !empty( $_FILES['file']['name']  ))
			{
				$image_banner = $this->Profile_model->uploadfile();
				$image =  $image_banner['file_name'];
				@unlink("./../upload/profile/".$data['profile_details']['profile_pic']);
			}
			else
			{
				$image = $this->input->post('old_image');
			}	
			
			$uploaddata = array(  
				'name'=>$this->input->post('name'),
				'mobile'=>$this->input->post('mobile'),
				'address'=>$this->input->post('address'),
				'username'=>$this->input->post('username'),
				'profile_pic'=>$image		
			);
			
			$password= $this->input->post('password');
			if(!empty($password)){
				$uploaddata['password'] = sha1($password);				
			}
			
			$resultval =  $this->Profile_model->update($uploaddata,$user_id);
			
			if($resultval){
				$msg = "Your information has been updated sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('profile','refresh');
			}
			else{
				$msg = "Error in Updation!!!";
				$this->session->set_flashdata('message',alert('warning',$msg));	  
				redirect('profile','refresh');
			}
           
        }
		$data['Title']='Update profile';
		$this->load->view('profile',$data );
	}
	
	

	

	
	
}
