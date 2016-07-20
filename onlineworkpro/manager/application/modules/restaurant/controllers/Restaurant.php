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
	
/**********Start Fetch Location function for get state********/
     public function checkstate(){
		$data=array();
		$option=''; 
		$resstateId=$_POST['id'];		
		$data=$this->Restaurant_model->getCity($resstateId);	
			if(!empty($data)){
		    @$selectCity .= "<option value=''> Choose City </option>";   
			foreach($data as $val){
		    @$selectCity .= "<option value=".$val['id']."> ".$val['city']." </option>";
			}
			 }
			 else
			 {
			 @$selectCity .= "<option value=''> There is no city</option>";   
			 }
			 
			echo @$selectCity; 
	  }
	  
	  
	  public function checkArea(){
		$data=array();
		$option=''; 
		$rescityID=$_POST['id'];
		$data=$this->Restaurant_model->getArea($rescityID);
		   if(!empty($data)){
		    $selectArea .= "<option value=''> Choose area </option>";  
			foreach($data as $val){
			$selectArea .= "<option value=".$val['area']."> ".$val['area']." </option>";
			}}
			else
			 {
			 $selectArea .= "<option value=''> There is no area</option>";   
			 }
			 
			echo $selectArea; 
	  }
	  
	  
	   public function fetchhotal(){
		$data=array();
		$selecthotal=''; 
		$rescityID=$_POST['id'];			
		$data=$this->Restaurant_model->getfetchhotal($rescityID);		
		   if(!empty($data)){
		    @$selecthotal .= "<option value=''> Choose Hotel </option>";  
			foreach($data as $val){
			@$selecthotal .= "<option value=".$val['id']."> ".$val['hotal_name']." </option>";
			}}
			else
			 {
			 @$selecthotal .= "<option value=''> There is no hotel</option>";   
			 }
			 
			echo @$selecthotal; 
	  }
	  
	 	/**********End Fetch Location function for get state********/
		
//*******************************************create function for add new Restaurant**********************************

	public function add(){
		$data['allHotel'] = $this->Restaurant_model->getHotel();
		$data['allCuisine'] = $this->Restaurant_model->getCuisine();
		$data['allSeating'] = $this->Restaurant_model->getSeating();
		$data['allFacilities'] = $this->Restaurant_model->getFacilities();
		$data['allTag'] = $this->Restaurant_model->getTag();
		$data['allType'] = $this->Restaurant_model->getType();
		$data['allMenu'] = $this->Restaurant_model->getMenu();
		
		$data['allRegion'] = $this->Restaurant_model->getRegion();
		$data['allstate'] = $this->Restaurant_model->getState();
		
		$data['Fetchcity'] = $this->Restaurant_model->AllCity();
		
		$this->form_validation->set_rules('hotal_id', 'Hotel Name', 'trim|required');			
		$this->form_validation->set_rules('restaurant_name', 'Restaurant', 'trim|required|is_unique['.RESTAURANT.'.restaurant_name]');
		/*$this->form_validation->set_rules('cuisines', 'cuisines', 'trim|required');*/
		/*$this->form_validation->set_rules('seating', 'seating', 'trim|required');
		$this->form_validation->set_rules('facilities', 'facilities', 'trim|required');
		$this->form_validation->set_rules('tag', 'tag', 'trim|required');*/
	/*	$this->form_validation->set_rules('type', 'Restaurant Type', 'trim|required');
		$this->form_validation->set_rules('State', 'State', 'trim|required');
		$this->form_validation->set_rules('City', 'City', 'trim|required');
		$this->form_validation->set_rules('Area', 'Area', 'trim|required');
		$this->form_validation->set_rules('Res_address', 'Address', 'trim|required');
		$this->form_validation->set_rules('Contact_Name', 'Contact Name', 'trim|required|alpha');
		$this->form_validation->set_rules('Contact_NO', 'Contact Number', 'trim|required');
		$this->form_validation->set_rules('CallUs', 'CallUs number', 'trim|required');
		$this->form_validation->set_rules('Support_Email', 'Support Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('Contact_Email', 'Contact Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('Order_Email', 'Order Email', 'trim|required|valid_email');		*/
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');	
        
        if ($this->form_validation->run() == true) {
		
		/******************************************************************************Restaurant General Insert**********************/		
		
			if(isset($_FILES['logo']['name']) && !empty( $_FILES['logo']['name']  ))
			{
				$image_banner = $this->Restaurant_model->do_upload();	
				$image =  $image_banner['file_name'];
			}	
			if(req('cuisines')!=null)
			{
			 
			$cuisines =  implode("|",req('cuisines')); 	
			}
			else
			{
			$cuisines="";
			}
			if(req('seating')!=null)
			{			 
			$seating =  implode("|",req('seating')); 	
			}
			else
			{
			$seating="";
			}
			if(req('facilities')!=null)
			{
			$facilities =  implode("|",req('facilities')); 	
			}
			else
			{
			$facilities="";
			}
			if(req('tag')!=null)
			{
			$tag =  implode("|",req('tag')); 
			}
			else
			{
			$tag="";
			}
			
			
			$data = array(
				'hotal_id'=>req('hotal_id'),
				'restaurant_name'=>req('restaurant_name'),	
				'cuisines'=>$cuisines,
				'seating'=>$seating,
				'facilities'=>$facilities,
				'tag'=>$tag,
				'type'=>req('type'),						
				'logo'=>$image,
				'Open_Time'=>req('Open_Time'),
				'Close_Time'=>req('Close_Time'),
				'Visitor_Attraction'=>req('Visitor_Attraction'),
				'COST_FOR_TWO'=>req('COST_FOR_TWO'),
				'Longitude'=>req('Longitude'),
				'Latitude'=>req('Latitude'),
				'Available'=>req('Available'),
				'Not_Available'=>req('Not_Available'),
				/*'Booking'=>req('Booking'),
				'Serves'=>req('Serves'),
				'Gift'=>req('Gift'),
				'Giftvoucher'=>req('Giftvoucher'),
				'Offer_Claim'=>req('Offer_Claim'),
				'Event'=>req('Event'),*/
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
		/*******************************************************************************End Restaurant General Insert*********************************/		
		    $ResID=$this->db->insert_id();
		/********************************************************************************Restaurant Time Insert****************************************/	
			if($result){	
		
			$data = array(				
				'hotal_id'=>req('hotal_id'),
				'rest_id'=>$ResID,
				'Sunday'=>req('Sunday'),
				'Time_Sun'=>req('Time_Sun'),
				'Monday'=>req('Monday'),
				'Time_Mon'=>req('Time_Mon'),
				'Tuesday'=>req('Tuesday'),
				'Time_Tue'=>req('Time_Tue'),
				'Wednesday'=>req('Wednesday'),
				'Time_Wed'=>req('Time_Wed'),
				'Thursday'=>req('Thursday'),
				'Time_Thu'=>req('Time_Thu'),
				'Friday'=>req('Friday'),
				'Time_Fri'=>req('Time_Fri'),
				'Saturdy'=>req('Saturdy'),
				'Time_Sat'=>req('Time_Sat'),											
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$resmenu = $this->db->insert(RESTIME,$data);
		/*******************************************************************************End Restaurant Time Insert*****************/	
			
		/*********************************************************************************Restaurant Menu Insert*****************/	
			$ItemName=implode(',',req('menu_id'));

            $ItemNameData=explode(',',rtrim($ItemName,','));			
			
			foreach($ItemNameData as $key=>$val)
			{  
			
			    $ss=req('menu_type'.$val.'');
				$menu_type =  implode("|",$ss);
								
				$data = array(				
				'hotal_id'=>req('hotal_id'),
				'restaurant_id'=>$ResID,
				'menu_id'=>$val,
				'menu_type'=>$menu_type,								
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$resmenu = $this->db->insert(RESTAURANT_MENU,$data);
			}
			/****************************************************************************************End Restaurant Menu Insert*****************/	
				
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
// **********************************************End function for add new Restaurant********************************************
	
// ***********************************************create function for edit Restaurant*******************************************
	public function edit($id){
		$data['restaurant'] =  $this->Restaurant_model->getrestaurantById($id);	
		$data['allHotel'] = $this->Restaurant_model->getHotel();
		$data['allCuisine'] = $this->Restaurant_model->getCuisine();
		$data['allSeating'] = $this->Restaurant_model->getSeating();
		$data['allFacilities'] = $this->Restaurant_model->getFacilities();
		$data['allTag'] = $this->Restaurant_model->getTag();
		$data['allType'] = $this->Restaurant_model->getType();
		$data['allMenu'] = $this->Restaurant_model->getMenu();
		$data['getMenubyIDdata'] = $this->Restaurant_model->RestMenubyID($id);		
		$data['getResTime'] = $this->Restaurant_model->getResTimebyID($id);		
		$data['allRegion'] = $this->Restaurant_model->getRegion();
		$data['allstate'] = $this->Restaurant_model->getState();
		
		$data['Fetchcity'] = $this->Restaurant_model->AllCity();
		
		$resstateId=$data['restaurant']['State'];
		$data['allcity'] = $this->Restaurant_model->getCity($resstateId);
		$rescityID=$data['restaurant']['City'];
		$data['allarea'] = $this->Restaurant_model->getArea($rescityID);
			
	 	$this->form_validation->set_rules('hotal_id', 'Hotel Name', 'trim|required');			
		$this->form_validation->set_rules('restaurant_name', 'Restaurant', 'trim|required');
		/*$this->form_validation->set_rules('cuisines', 'cuisines', 'trim|required');*/
		/*$this->form_validation->set_rules('seating', 'seating', 'trim|required');
		$this->form_validation->set_rules('facilities', 'facilities', 'trim|required');
		$this->form_validation->set_rules('tag', 'tag', 'trim|required');*/
	/*	$this->form_validation->set_rules('type', 'Restaurant Type', 'trim|required');
		$this->form_validation->set_rules('State', 'State', 'trim|required');
		$this->form_validation->set_rules('City', 'City', 'trim|required');
		$this->form_validation->set_rules('Area', 'Area', 'trim|required');
		$this->form_validation->set_rules('Res_address', 'Address', 'trim|required');
		$this->form_validation->set_rules('Contact_Name', 'Contact Name', 'trim|required|alpha');
		$this->form_validation->set_rules('Contact_NO', 'Contact Number', 'trim|required');
		$this->form_validation->set_rules('CallUs', 'CallUs number', 'trim|required');
		$this->form_validation->set_rules('Support_Email', 'Support Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('Contact_Email', 'Contact Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('Order_Email', 'Order Email', 'trim|required|valid_email');	*/
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
			
			$cuisines =  implode("|",req('cuisines')); 	
			
			$seating =  implode("|",req('seating')); 	
			
			$facilities =  implode("|",req('facilities')); 	
			
			$tag =  implode("|",req('tag')); 
			
			
			$data = array(  
				'hotal_id'=>req('hotal_id'),
				'restaurant_name'=>req('restaurant_name'),	
				'cuisines'=>$cuisines,
				'seating'=>$seating,
				'facilities'=>$facilities,
				'tag'=>$tag,
				'type'=>req('type'),						
				'logo'=>$image,
				'Open_Time'=>req('Open_Time'),
				'Close_Time'=>req('Close_Time'),
				'Visitor_Attraction'=>req('Visitor_Attraction'),
				'COST_FOR_TWO'=>req('COST_FOR_TWO'),
				'Longitude'=>req('Longitude'),
				'Latitude'=>req('Latitude'),
				'Available'=>req('Available'),
				'Not_Available'=>req('Not_Available'),
				'Booking'=>req('Booking'),
				'Serves'=>req('Serves'),
				'Gift'=>req('Gift'),
				'Giftvoucher'=>req('Giftvoucher'),
				'Offer_Claim'=>req('Offer_Claim'),
				'Event'=>req('Event'),
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
				/*'is_active'=>req('is_active'),*/
				'modified_at'=>date("Y-m-d H:i:s")	,	
				'modified_by'=>$this->session->userdata('id')		
			);
			
			$result =  $this->Restaurant_model->update($data,$id);
			
			if($result){				
	/*********************************************************************************Start Restaurant Time Insert*****************/			
			$deleteresultTime =  $this->Restaurant_model->deletResTime( $id );		
				$data = array(				
				'hotal_id'=>req('hotal_id'),
				'rest_id'=>$id,
				'Sunday'=>req('Sunday'),
				'Time_Sun'=>req('Time_Sun'),
				'Monday'=>req('Monday'),
				'Time_Mon'=>req('Time_Mon'),
				'Tuesday'=>req('Tuesday'),
				'Time_Tue'=>req('Time_Tue'),
				'Wednesday'=>req('Wednesday'),
				'Time_Wed'=>req('Time_Wed'),
				'Thursday'=>req('Thursday'),
				'Time_Thu'=>req('Time_Thu'),
				'Friday'=>req('Friday'),
				'Time_Fri'=>req('Time_Fri'),
				'Saturdy'=>req('Saturdy'),
				'Time_Sat'=>req('Time_Sat'),											
				'modified_at'=>date("Y-m-d H:i:s")	,	
				'modified_by'=>$this->session->userdata('id')					
			);
		
			$resmenu = $this->db->insert(RESTIME,$data);
	/*********************************************************************************End Restaurant Time Insert*****************/	
			
	/*********************************************************************************Restaurant Menu Insert*****************/			
			$deleteresult =  $this->Restaurant_model->deletemenu( $id );
				
			if($deleteresult)
			{

			$ItemName=implode(',',req('menu_id'));

            $ItemNameData=explode(',',rtrim($ItemName,','));			
			
			foreach($ItemNameData as $key=>$val)
			{  
			
			    $ss=req('menu_type'.$val.'');
				$menu_type =  implode("|",$ss);
								
				$data = array(				
				'hotal_id'=>req('hotal_id'),
				'restaurant_id'=>$id,
				'menu_id'=>$val,
				'menu_type'=>$menu_type,								
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$resmenu = $this->db->insert(RESTAURANT_MENU,$data);
			}
			}
	/****************************************************************************************End Restaurant Menu Insert*****************/		
			
				
				
				$msg = "Restaurant Update Sucessfully!!!";
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
	
// ***********************************************End function for edit Restaurant*******************************************


	
	
	public function delete($id){
		$data['restaurant'] =  $this->Restaurant_model->getrestaurantById($id);			
		$data['getMenubyIDdata'] = $this->Restaurant_model->getMenubyID($id);
		            foreach($data['getMenubyIDdata'] as $MenuvalueId){				
					 @unlink("./../upload/restaurantmenu/".$MenuvalueId['image']);					  
					  }
		$data['getMenubyIDgallery'] = $this->Restaurant_model->getgallerybyID($id);			  
					foreach($data['getMenubyIDgallery'] as $MenuvalueId){				
					 @unlink("./../upload/gallery/".$MenuvalueId['image']);					  
					  }
					  
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
	
// ***********************************************End function for Delete Restaurant*******************************************	
	
}
