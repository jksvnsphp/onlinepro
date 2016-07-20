<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurant extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Restaurant_model'); 
    }	

	public function index(){
		$data = array();
		$data['allrestaurant'] =  $this->Restaurant_model->getrestaurant();
		$data['Title'] =  'Restaurant Management';
		$this->load->view('index',$data );
		
	}
	

//*******************************************create function for add new Admin**********************************
	public function add(){
		$data['allHotel'] = $this->Restaurant_model->getHotel();
		$data['allCuisine'] = $this->Restaurant_model->getCuisine();
		$data['allSeating'] = $this->Restaurant_model->getSeating();
		$data['allFacilities'] = $this->Restaurant_model->getFacilities();
		$data['allTag'] = $this->Restaurant_model->getTag();
		$data['allType'] = $this->Restaurant_model->getType();
		
		$this->form_validation->set_rules('hotal_id', 'Hotel Name', 'trim|required');		
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');	
        
        if ($this->form_validation->run() == true) {
		
		
			if(isset($_FILES['logo']['name']) && !empty( $_FILES['logo']['name']  ))
			{
				$image_banner = $this->Restaurant_model->do_upload();	
				$image =  $image_banner['file_name'];
			}	
			
			if(!empty(req('cuisines')))
			{
			$cuisines =  implode("|",req('cuisines')); 	
			}
			
			if(!empty(req('seating')))
			{
			$seating =  implode("|",req('seating')); 	
			}
			
			if(!empty(req('facilities')))
			{
			$facilities =  implode("|",req('facilities')); 	
			}
			
			if(!empty(req('tag')))
			{
			$tag =  implode("|",req('tag')); 	
			}
			
			if(!empty(req('type')))
			{
			$type =  implode("|",req('type')); 	
			}
			
		
			
			$data = array(
				'hotal_id'=>req('hotal_id'),
				'restaurant_name'=>req('restaurant_name'),	
				'cuisines'=>$cuisines,
				'seating'=>$seating,
				'facilities'=>$facilities,
				'tag'=>$tag,
				'type'=>$type,						
				'logo'=>$image,
				'Open_Time'=>req('Open_Time'),
				'Close_Time'=>req('Close_Time'),
				'Visitor_Attraction'=>req('Visitor_Attraction'),
				'COST_FOR_TWO'=>req('COST_FOR_TWO'),
				'Longitude'=>req('Longitude'),
				'Latitude'=>req('Latitude'),
				'Booking'=>req('Booking'),
				'Serves'=>req('Serves'),
				'Gift'=>req('Gift'),
				'Giftvoucher'=>req('Giftvoucher'),
				'Region'=>req('Region'),
				'State'=>req('State'),
				'City'=>req('City'),
				'Zipcode'=>req('Zipcode'),
				'Area'=>req('Area'),
				'Res_address'=>req('Res_address'),
				'Contact_Name'=>req('Contact_Name'),
				'Contact_NO'=>req('Contact_NO'),
				'CallUs'=>req('CallUs'),
				'Support_Email'=>req('Support_Email'),
				'Contact_Email'=>req('Contact_Email'),
				'Order_Email'=>req('Order_Email'),
				'Paypal'=>req('Paypal'),
				'Paypal_Url'=>req('Paypal_Url'),
				'Paypal_Email'=>req('Paypal_Email'),
				'Meta_Title'=>req('Meta_Title'),
				'Meta_Tag'=>req('Meta_Tag'),
				'Meta_Keyword'=>req('Meta_Keyword'),
				'Meta_Description'=>req('Meta_Description'),
				'Friendly_URL'=>req('Friendly_URL'),			
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->db->insert(RESTAURANT,$data);
			
			if($result){
				$msg = "Restaurant added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('restaurant');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('restaurant');
			}	
		}
		
		$data['Title'] =  "Add New Restaurant";	
		$this->load->view('add',$data);
	}
// **********************************************End function for add new Admin********************************************
	
// ***********************************************create function for edit Admin*******************************************
	public function edit($id){
		$data['restaurant'] =  $this->Restaurant_model->getrestaurantById($id);	
		$data['allHotel'] = $this->Restaurant_model->getHotel();
		$data['allCuisine'] = $this->Restaurant_model->getCuisine();
		$data['allSeating'] = $this->Restaurant_model->getSeating();
		$data['allFacilities'] = $this->Restaurant_model->getFacilities();
		$data['allTag'] = $this->Restaurant_model->getTag();
		$data['allType'] = $this->Restaurant_model->getType();
			
	   	$this->form_validation->set_rules('hotal_id', 'Hotel Name', 'trim|required');	
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == true) {
			
			if(isset($_FILES['logo']['name']) && !empty( $_FILES['logo']['name']  ))
			{
				$image_banner = $this->Restaurant_model->do_upload();		
				$image =  $image_banner['file_name'];
				@unlink("./../upload/restaurant/".$data['restaurant']['logo']);
			}	
			else
			{
				$image = req('old_logo');				
			}	
			
			if(!empty(req('cuisines')))
			{
			$cuisines =  implode("|",req('cuisines')); 	
			}
			
			if(!empty(req('seating')))
			{
			$seating =  implode("|",req('seating')); 	
			}
			
			if(!empty(req('facilities')))
			{
			$facilities =  implode("|",req('facilities')); 	
			}
			
			if(!empty(req('tag')))
			{
			$tag =  implode("|",req('tag')); 	
			}
			
			if(!empty(req('type')))
			{
			$type =  implode("|",req('type')); 	
			}
			
			
			
			$data = array(  
				'hotal_id'=>req('hotal_id'),
				'restaurant_name'=>req('restaurant_name'),	
				'cuisines'=>$cuisines,
				'seating'=>$seating,
				'facilities'=>$facilities,
				'tag'=>$tag,
				'type'=>$type,						
				'logo'=>$image,
				'Open_Time'=>req('Open_Time'),
				'Close_Time'=>req('Close_Time'),
				'Visitor_Attraction'=>req('Visitor_Attraction'),
				'COST_FOR_TWO'=>req('COST_FOR_TWO'),
				'Longitude'=>req('Longitude'),
				'Latitude'=>req('Latitude'),
				'Booking'=>req('Booking'),
				'Serves'=>req('Serves'),
				'Gift'=>req('Gift'),
				'Giftvoucher'=>req('Giftvoucher'),
				'Region'=>req('Region'),
				'State'=>req('State'),
				'City'=>req('City'),
				'Zipcode'=>req('Zipcode'),
				'Area'=>req('Area'),
				'Res_address'=>req('Res_address'),
				'Contact_Name'=>req('Contact_Name'),
				'Contact_NO'=>req('Contact_NO'),
				'CallUs'=>req('CallUs'),
				'Support_Email'=>req('Support_Email'),
				'Contact_Email'=>req('Contact_Email'),
				'Order_Email'=>req('Order_Email'),
				'Paypal'=>req('Paypal'),
				'Paypal_Url'=>req('Paypal_Url'),
				'Paypal_Email'=>req('Paypal_Email'),
				'Meta_Title'=>req('Meta_Title'),
				'Meta_Tag'=>req('Meta_Tag'),
				'Meta_Keyword'=>req('Meta_Keyword'),
				'Meta_Description'=>req('Meta_Description'),
				'Friendly_URL'=>req('Friendly_URL'),			
				'is_active'=>req('is_active'),
				'modified_at'=>date("Y-m-d H:i:s")	,	
				'modified_by'=>$this->session->userdata('id')		
			);
			
			$result =  $this->Restaurant_model->update($data,$id);
			
			if($result){
				$msg = "restaurant Update Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('restaurant');
			}
			else{
				$msg = "Error in updating!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('restaurant');
			}	
        }
		$data['Title'] =  "Edit Restaurant";	
		$this->load->view('edit',$data );
	}
	
// ***********************************************End function for edit Admin*******************************************

	
// ***********************************************create function for Delete Admin*******************************************		
	public function delete($id){
		$data['restaurant'] =  $this->Restaurant_model->getrestaurantById($id);
		@unlink("./../upload/restaurant/".$data['restaurant']['logo']);
		$result =  $this->Restaurant_model->delete( $id );		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('restaurant');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('restaurant');		
		}
	}	
	
// ***********************************************End function for Delete Admin*******************************************	
	
}
