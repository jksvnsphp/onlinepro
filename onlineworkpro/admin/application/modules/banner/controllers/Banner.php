<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Banner_model'); 
    }	

	public function index(){
		$data['allbanner'] = $this->Banner_model->getBanner();
		$this->load->view('index',$data);
	}
	

//create function for add new banner -------	
	public function add(){
		
		$this->form_validation->set_rules('title', 'Title', 'trim|required|is_unique['.BANNER.'.title]');
		//$this->form_validation->set_rules('desc', 'Description', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $image ='';

        if ($this->form_validation->run() == true) {		
		
			if(isset($_FILES['userfile']['name']) && !empty( $_FILES['userfile']['name']  ))
			{
				$image_banner = $this->Banner_model->do_upload();	
				$image =  $image_banner['file_name'];
			}	
			
			$data = array(
				'title' => $this->input->post('title'),
				//'desc' => $this->input->post('desc'),
				'image'=>$image,
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->db->insert(BANNER,$data);
			
			if($result){
				$msg = "Banner added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('banner');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('warning',$msg));	  
				redirect('banner');
			}	
		}	
		$this->load->view('add');
	}
	

//create function for edit banner --------	
	public function edit($id){
		$data['banner'] = $this->Banner_model->getBannerById($id);
		
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		//$this->form_validation->set_rules('desc', 'Description', 'trim|required');
		$this->form_validation->set_rules('is_active', 'Status', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == true){
			
			if(isset($_FILES['userfile']['name']) && !empty( $_FILES['userfile']['name']  ))
			{
				$image_banner = $this->Banner_model->do_upload();	
				$image =  $image_banner['file_name'];
				
				@unlink("./../upload/banner/".$this->input->post('old_userfile'));
			}	
			else{
				$image = $this->input->post('old_userfile');				
			}				
			
			$data = array(
				'title' => $this->input->post('title'),
				//'desc' => $this->input->post('desc'),
				'is_active' => $this->input->post('is_active'),
				'image'=>$image,
				'modified_at'=>date("Y-m-d H:i:s")	,	
				'modified_by'=>$this->session->userdata('id')					
			);
			
			$result = $this->Banner_model->update($data,$id);
			
			if($result){
				$msg = "Update Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('banner');
			}
			else{
				$msg = "Error in editing!!!";
				$this->session->set_flashdata('message',alert('warning',$msg));	  
				redirect('banner');
			}	
        }
		
		$this->load->view('edit',$data );
	}
	
	
//create function for delete banner -----
	public function delete($id){
		$result = $this->Banner_model->delete($id);
		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('banner');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('banner');		
		}
	}	
	
}
