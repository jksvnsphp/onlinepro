<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends CI_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Testimonials_model'); 
    }	
	
	public function index(){
		$data['Title'] =  "Testimonials";
		$data['alltestimonials'] = $this->Testimonials_model->getTestimonials();
		$this->load->view('index' ,$data);	
	}
	
	/******************Fetch Restaurant list by Hotal**********/
	public function GetRestbyHotal(){
		$data=array();
		$getres=''; 
		$data=$this->Testimonials_model->getResHotel($_POST['id']);
		    if(!empty($data)){
			$getres .= "<option value=''> Select Restaurant </option>";
			foreach($data as $val){
			$getres .= "<option value=".$val['id']."> ".$val['restaurant_name']." </option>";
			}}
			else
			{
			$getres .= "<option value=''> There is no Restaurant </option>";
			}
			echo $getres; 
	  }
   /******************End Fetch Restaurant list by Hotal**********/
	
//create function for add new testimonials -----
	public function add(){		
		$data['Hotel']=$this->Testimonials_model->gethotel();
		$this->form_validation->set_rules('Hotel_List', 'Hotel List', 'trim|required');
	    $this->form_validation->set_rules('Restaurant_List', 'Restaurant List', 'trim|required');
	    $this->form_validation->set_rules('Rating', 'Rating', 'trim|required');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Id', 'trim|required|is_unique['.TESTIMONIALS.'.email]');
		$this->form_validation->set_rules('message', 'message', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == true) {					
			
			$data = array(	
			    'Hotel_List' => $this->input->post('Hotel_List'),		
				'Restaurant_List' => $this->input->post('Restaurant_List'),
				'Rating' => $this->input->post('Rating'),
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),	
				'message' => $this->input->post('message'),	
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->db->insert(TESTIMONIALS,$data);
			
			if($result){
				$msg = "Testimonials added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('testimonials');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('warning',$msg));	  
				redirect('testimonials');
			}	
		}	
		$data['Title'] =  "Add New Testimonials";		
		$this->load->view('add',$data);	
	}	
	

//create function for view testimonials -----
	public function edit($id){		
		$data['testimonials'] = $this->Testimonials_model->getTestimonialsById($id);
		$data['Hotel']=$this->Testimonials_model->gethotel();
		$hotelid=$data['testimonials']['Hotel_List'];
		$data['restaurant'] = $this->Testimonials_model->getResHotel($hotelid); 
		
		$this->form_validation->set_rules('is_active', ' Active', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == true) {				
			
			$data = array(	
			    'Hotel_List' => $this->input->post('Hotel_List'),		
				'Restaurant_List' => $this->input->post('Restaurant_List'),
				'Rating' => $this->input->post('Rating'),
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),	
				'message' => $this->input->post('message'),	
				'is_active' => $this->input->post('is_active'),		
				'modified_at'=>date("Y-m-d H:i:s")	,	
				'modified_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->Testimonials_model->update($data,$id);
			
			if($result){
				$msg = "Updated Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('testimonials');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('warning',$msg));	  
				redirect('testimonials');
			}	
		}		
		
		$this->load->view('edit',$data);	
	}	
	
	
//create function for delete testimonials -----
	public function delete($id){
		$result = $this->Testimonials_model->delete($id);
		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('testimonials');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('testimonials');		
		}
	}		
	
	
}
