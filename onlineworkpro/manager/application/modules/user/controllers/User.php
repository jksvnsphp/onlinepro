<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('User_model'); 
    }	

	public function index(){
		$data['get_users'] = $this->User_model->getUsers();
		$this->load->view('index',$data);
	}
	

//create function for add new user -------	
	public function add(){
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique['.USERS.'.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $pic = '';

        if ($this->form_validation->run() == true) {	
			
			if(isset($_FILES['userfile']['name']) && !empty( $_FILES['userfile']['name']  ))
			{
				$user_pic = $this->User_model->do_upload();	
				$pic =  $user_pic['file_name'];
			}				
			
			$data = array(
				'name' => $this->input->post('name'),				
				'mobile' => $this->input->post('mobile'),	
				'email' => $this->input->post('email'),
				'password' => sha1($this->input->post('password')),
				'profile_pic' => $pic,
				'created_at'=>date("Y-m-d H:i:s"),	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->db->insert(USERS,$data);
			
			if($result){
				$msg = "User added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('user');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('warning',$msg));	  
				redirect('user');
			}	
		}	
		$this->load->view('add');
	}
	

//create function for edit user --------	
	public function edit($id){
		$data['page_id'] = $this->User_model->getUserById($id);
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == true){		
			
			if(isset($_FILES['userfile']['name']) && !empty( $_FILES['userfile']['name']  ))
			{   @unlink("./../upload/user/".$data['page_id']['profile_pic']);
				$user_pic = $this->User_model->do_upload();	
				$pic =  $user_pic['file_name'];
			}	
			else{
				$pic = $this->input->post('old_userfile');				
			}				
			
			$data = array(
				'name' => $this->input->post('name'),				
				'mobile' => $this->input->post('mobile'),		
				'profile_pic' => $pic,
				'modified_at'=>date("Y-m-d H:i:s"),	
				'modified_by'=>$this->session->userdata('id')					
			);
						
			$password= $this->input->post('password');
			if(!empty($password)){
				$data['password'] = sha1($password);				
			}			
			
			$result = $this->User_model->update($data,$id);
						
			if($result){
				$msg = "Update Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('user');
			}
			else{
				$msg = "Error in editing!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('user');
			}	
        }
		
		$this->load->view('edit',$data );
	}
	
	
//create function for delete user -----
	public function delete($id){
		$result = $this->User_model->delete($id);
		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('user');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('user');		
		}
	}	
	
}
