<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mastercalander extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Mastercalander_model'); 
		$this->load->helper('custom_helper'); 
    }	

	public function index(){		
		$res_id = $this->session->userdata('ResID');		
		//$data['mastercalander_details'] =  $this->Mastercalander_model->getMastercalander($res_id);	
		$hotel_id = $this->session->userdata('ResID');
		$data['dates_in_calender'] = $this->Mastercalander_model->getMasterHotelAvailabilityData($hotel_id);	
		$data['Title']='Update mastercalander';
		$this->load->view('mastercalander',$data );
	}
	
	
	public function add()
	{
	
		$user_id = $this->session->userdata('id');
		$res_id = $this->session->userdata('ResID');
		//$hotel_id = $this->session->userdata('hotelID');
		 $hotel_id = $this->session->userdata('ResID');
		
		    $uploaddata=$this->input->post('available-days');
			//print_r($uploaddata);	die;	
			$resultval = $this->Mastercalander_model->insertMasterHotelAvailabilityData($uploaddata);	
			
		
			
			if($resultval){
				$msg = "Your information has been updated sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('mastercalander');
			}
			else{
				$msg = "Error in Updation!!!";
				$this->session->set_flashdata('message',alert('warning',$msg));	  
				redirect('mastercalander');
			}
           
      
		$data['Title']='Update mastercalander';
		$this->load->view('mastercalander',$data );
	
		
	}
	
	public function getmonth()
	{  
		$user_id = $this->session->userdata('id');
		$res_id = $this->session->userdata('ResID');		
		 $hotel_id = $this->session->userdata('ResID');
		   $type = $_POST["type"];
  switch ($type) {   
    case "master_calender":
        $date = $_POST['sel_date'];
        $hotel_id = $_POST['hotel_id']; 
         $test = $this->Mastercalander_model->getMasterHotelAvailabilityData($hotel_id, $date);
            echo str_replace("\/", "/", json_encode(array("dates" => $test)));exit;
        break;
    case "single_calender":
        $date = $_POST['sel_date'];
        $hotel_id = $_POST['hotel_id'];
        $food_type = $_POST['type_id'];
            $master = $managerObj->getMasterHotelAvailabilityData($hotel_id, $date);
            $type = $managerObj->getHotelAvailabilityData($hotel_id, $food_type, $date);
            $final_data = array_merge($master, $type);
            echo str_replace("\/", "/", json_encode(array("dates" => $final_data)));exit;
        break;
      
    default:
        echo "Default";
        break;
        
}

           
      
		$data['Title']='Update mastercalander';
		$this->load->view('mastercalander',$data );
	
		
	}
	
	

	

	
	
}
