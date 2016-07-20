<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Page_model'); 
    }	

	public function index(){
		//$data['allmenu'] = $this->Page_model->getMenu();
		$data['allpage'] = $this->Page_model->getPage();
		$this->load->view('index',$data);
	}
	

//create function for add new page -------	
	public function add(){
		//$data['allmenu'] = $this->Page_model->getMenu();
		
		
		$this->form_validation->set_rules('title', 'Title', 'trim|required|is_unique['.PAGES.'.title]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		//$this->form_validation->set_rules('postition_id', 'Position', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        $title = strtolower($this->input->post('title'));
        $slug = str_replace(' ', '-', $title);

        if ($this->form_validation->run() == true) {		
			
			$data = array(		
				'slug' => $slug,				
				//'postition_id' => $this->input->post('postition_id'),				
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'meta_title' => $this->input->post('meta_title'),
				'meta_description' => $this->input->post('meta_description'),
				'meta_keyword' => $this->input->post('meta_keyword'),
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->db->insert(PAGES,$data);
			
			if($result){
				$msg = "Page added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('page');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('warning',$msg));	  
				redirect('page');
			}	
		}	
		$this->load->view('add',$data);
	}
	

//create function for edit page --------	
	public function edit($id){
		//$data['get_menu'] = $this->Page_model->getMenu();
		$data['page'] = $this->Page_model->getPageById($id);
		
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		//$this->form_validation->set_rules('postition_id', 'Position', 'trim|required');
		$this->form_validation->set_rules('is_active', 'Status', 'trim|required');		
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        $title = strtolower($this->input->post('title'));
        $slug = str_replace(' ', '-', $title);

        if($this->form_validation->run() == true){			
			
			$data = array(		
				//'slug' => $slug,				
			//	'postition_id' => $this->input->post('postition_id'),				
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'is_active' => $this->input->post('is_active'),
				'meta_title' => $this->input->post('meta_title'),
				'meta_description' => $this->input->post('meta_description'),
				'meta_keyword' => $this->input->post('meta_keyword'),
				'modified_at'=>date("Y-m-d H:i:s")	,	
				'modified_by'=>$this->session->userdata('id')					
			);
			
			$result = $this->Page_model->update($data,$id);
			
			if($result){
				$msg = "Update Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('page');
			}
			else{
				$msg = "Error in editing!!!";
				$this->session->set_flashdata('message',alert('warning',$msg));	  
				redirect('page');
			}	
        }
		
		$this->load->view('edit',$data );
	}
	
	
//create function for delete page -----
	public function delete($id){
		$result = $this->Page_model->delete($id);
		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('page');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('page');		
		}
	}	
	
	
	
	
}
