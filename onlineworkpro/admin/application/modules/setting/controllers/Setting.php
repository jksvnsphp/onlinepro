<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Setting_model'); 
		$this->load->helper('custom_helper'); 
    }	

	public function index()
	{
		$RequestMethod = $this->input->server('REQUEST_METHOD');
		if($RequestMethod == "POST"){
			
			
			if(isset($_FILES['SITE_LOGO']['name']) && $_FILES['SITE_LOGO']['name']!='')
			{
				$image_banner = $this->Setting_model->uploadfile( 'SITE_LOGO'  );
				$image = $image_banner['file_name'];
				
				@unlink("./../upload/setting/".$this->input->post('OLD_LOGO'));
				
				$this->Setting_model->update($image,"SITE_LOGO");
			}
			else
			{
				$this->Setting_model->update($this->input->post('OLD_LOGO'),"SITE_LOGO");
			}		
			
				$this->Setting_model->update($this->input->post('SITE_TITLE'),"SITE_TITLE"); 
				$this->Setting_model->update($this->input->post('SITE_ADDRESS'),"SITE_ADDRESS");
				$this->Setting_model->update($this->input->post('SITE_MOBILE'),"SITE_MOBILE");
				$this->Setting_model->update($this->input->post('SITE_EMAIL'),"SITE_EMAIL");
				$this->Setting_model->update($this->input->post('SUPPORT_EMAIL'),"SUPPORT_EMAIL");			
				$this->Setting_model->update($this->input->post('Currency'),"Currency");
				$this->Setting_model->update($this->input->post('Currency_Symbol'),"Currency_Symbol");
				$this->Setting_model->update($this->input->post('COPYRIGHT'),"COPYRIGHT");	
				
				
			if(true)
			{
				$msg = "Your information has been updated successfully.";
				$this->session->set_flashdata('message', alert('success',$msg));  
				redirect('setting');
			}
			else
			{
				$msg = "Error in updation.";
				$this->session->set_flashdata('message', alert('warning',$msg));   
				redirect('setting');
			}
		}
		    
		$data =array();
		$data['Title']="Website Setting";   
		$this->load->view('setting' , $data);		
	}
	

}
