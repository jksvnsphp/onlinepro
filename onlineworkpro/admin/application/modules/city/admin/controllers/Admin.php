<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Admin_model'); 
		if(  $this->session->userdata('logged_in') &&  $this->router->fetch_method()!='logout' ){	
			redirect('dashboard');
		}
    }	

	
//create function for admin login ------
	public function login(){
		 $this->form_validation->set_rules('email', 'Email', 'trim|required');
		 $this->form_validation->set_rules('password', 'Password', 'trim|required');
         $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if ($this->form_validation->run() == true) {
             $result = $this->Admin_model->checkuser();
            if ($result['success']=='yes') {
				$this->session->set_flashdata('sucess', 'You have been sucessfully logged in.');   
				redirect('dashboard');
            } 
			else {
				$this->session->set_flashdata('error', 'Invalid email or password.');   
				redirect(base_url());
            }
        }
        
		$data= array();
		$this->load->view('login' ,  $data );
	}
	

//create function for admin logout -------	
	public function logout(){
		$this->session->sess_destroy();
		redirect('admin/login?logout=You have been sucessfully logged out');
	}	
	
	
}
