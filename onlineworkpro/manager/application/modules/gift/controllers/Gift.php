<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gift extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Gift_model'); 
    }	

	public function index(){
		$data = array();
		$data['allgift'] =  $this->Gift_model->getgift();
		$data['Title'] =  'Gift Management';
		$this->load->view('index',$data );
		
	}
		public function checkhotel(){
		$data=array();
		$option=''; 
		$data=$this->Gift_model->save($_POST['id']);
			foreach($data as $val){
			$option .= "<option value=".$val['id']."> ".$val['restaurant_name']." </option>";
			}
			echo $option; 
	  }


//*******************************************create function for add new Admin**********************************
	public function add(){
		
		 $this->form_validation->set_rules('Hotel_List', 'Hotel', 'trim|required');
		$this->form_validation->set_rules('Restaurant_List', 'Restaurant', 'trim|required');
		/*$this->form_validation->set_rules('Gift_voucher_Code', 'Gift voucher Code', 'trim|required');
		$this->form_validation->set_rules('Discount_Type', 'Discount Type', 'trim|required');*/
	    $this->form_validation->set_rules('Discount_Price', 'Discount Price', 'trim|required');
		$this->form_validation->set_rules('Valid_From', 'Valid From Date', 'trim|required');
		$this->form_validation->set_rules('Valid_To', 'Valid To Date', 'trim|required');
	
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	
        if ($this->form_validation->run() == true) {				
			$data = array(
			    'Hotel_List'=>$this->input->post('Hotel_List'),
				'Restaurant_List'=>$this->input->post('Restaurant_List'),
				'Gift_voucher_Code'=>$this->input->post('Gift_voucher_Code'),
				'Discount_Type'=>$this->input->post('Discount_Type'),
				'Discount_Price'=>($this->input->post('Discount_Price')),
				'Description'=>($this->input->post('Description')),
				'Valid_From'=>$this->input->post('Valid_From'),
				'Valid_To'=>$this->input->post('Valid_To'),
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->db->insert(GIFT,$data);
			
			if($result){
				$msg = "gift added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('gift');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('gift');
			}	
		}	
		$data['Title'] =  "Add New Offer";	
		$data['Hotel']=$this->Gift_model->gethotel();
		$this->load->view('add',$data);
	}
// **********************************************End function for add new Admin********************************************
	
// ***********************************************create function for edit Admin*******************************************
	public function edit($id){
		$data['gift'] =  $this->Gift_model->getgiftById($id);	
	   $this->form_validation->set_rules('Hotel_List', 'Hotel', 'trim|required');
		$this->form_validation->set_rules('Restaurant_List', 'Restaurant', 'trim|required');
	/*	$this->form_validation->set_rules('Gift_voucher_Code', 'Gift voucher Code', 'trim|required');
		$this->form_validation->set_rules('Discount_Type', 'Discount Type', 'trim|required');*/
	    $this->form_validation->set_rules('Discount_Price', 'Discount Price', 'trim|required');
		$this->form_validation->set_rules('Valid_From', 'Valid From Date', 'trim|required');
		$this->form_validation->set_rules('Valid_To', 'Valid To Date', 'trim|required');
	
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        if ($this->form_validation->run() == true) {
		
			$data = array(  
			     'Hotel_List'=>$this->input->post('Hotel_List'),
				 'Restaurant_List'=>$this->input->post('Restaurant_List'),
				'Gift_voucher_Code'=>$this->input->post('Gift_voucher_Code'),
				'is_active' => $this->input->post('is_active'),
				'Discount_Type'=>$this->input->post('Discount_Type'),
				'Discount_Price'=>($this->input->post('Discount_Price')),
				'Description'=>($this->input->post('Description')),
				'Valid_From'=>$this->input->post('Valid_From'),
				'Valid_To'=>$this->input->post('Valid_To'),
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')		
			);
				//print_r($data);exit;
			$result =  $this->Gift_model->update($data,$id);
			
			if($result){
				$msg = "gift Update Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('gift');
			}
			else{
				$msg = "Error in updating!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('gift');
			}	
        }
		$id=$data['gift']['Hotel_List'];
        $data['Hotel']=$this->Gift_model->gethotel();
        $data['restaurant'] = $this->Gift_model->save($id); 
		$data['Title'] =  "Edit Offer";	
		$this->load->view('edit',$data );
	}
	
// ***********************************************End function for edit Admin*******************************************

	
// ***********************************************create function for Delete Admin*******************************************		
	public function delete($id){
		$data['gift'] =  $this->Gift_model->getgiftById($id);
		@unlink("./../upload/profile/".$data['gift']['profile_pic']);
		$result =  $this->Gift_model->delete( $id );		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('gift');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('gift');		
		}
	}	
	
// ***********************************************End function for Delete Admin*******************************************	
	
}
