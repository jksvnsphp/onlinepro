<?php defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Dinner extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Dinner_model'); 
		$this->load->helper('custom_helper'); 
    }	

	public function index(){		
		$res_id = $this->session->userdata('ResID');	
		$hotel_id = $this->session->userdata('ResID');	
		$data['dinner_details'] =  $this->Dinner_model->getDinner($res_id);
		
	 $food_type = 4;  //  e.q breakfast / lunch / dinner
     $food_type_name = array('1' => 'Break Fast', '2' => 'Lunch', '3' => 'Dinner');
     $food_type_name_lower= array('1' => 'breakfast', '2' => 'lunch', '3' => 'dinner');
     $intervals=array('0.20', '0.30', '0.40', '0.50', '0.60');   /// time interval
     $data['dates_in_calender']  =$this->Dinner_model->getHotelAvailabilityData($hotel_id, $food_type, '');
		
		$data['Title']='Update dinner';
		$this->load->view('dinner',$data );
	}
	
	
	public function add()
	{
	
		$user_id = $this->session->userdata('id');
		$res_id = $this->session->userdata('ResID');
		$hotal_id = $this->session->userdata('hotelID');
		$menu=$this->input->post('menuId');
		
	    $deleteresult =  $this->Dinner_model->deletemenu($res_id );		
		$data['dinner_details'] =  $this->Dinner_model->getDinner($res_id );	
		
		//$this->form_validation->set_rules('avaliable_seats', 'avaliable seats', 'trim|required');
       /* $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
        if ($this->form_validation->run() == true) {*/
			
			foreach($menu as $menuvalue)
			{						    
						
				
			 $uploaddata = array(
			  
				'rest_id'=>$res_id,	
				'hotal_id'=>$hotal_id,	
				'menu_id'=>$menuvalue,
				'food_type'=>$this->input->post('food_type'),
		        'time_interval'=>$this->input->post('time_interval'.$menuvalue.''),
	            'avaliable_seats'=>$this->input->post('avaliable_seats'.$menuvalue.''),
				'Sunday'=>$this->input->post('Sunday'.$menuvalue.''),	
				'Monday'=>$this->input->post('Monday'.$menuvalue.''),
				'Tuesday'=>$this->input->post('Tuesday'.$menuvalue.''),	
				'Wednesday'=>$this->input->post('Wednesday'.$menuvalue.''),
				'Thursday'=>$this->input->post('Thursday'.$menuvalue.''),	
				'Friday'=>$this->input->post('Friday'.$menuvalue.''),
				'Saturday'=>$this->input->post('Saturday'.$menuvalue.''),	
				'Open_Time_sun'=>$this->input->post('Open_Time_sun'.$menuvalue.''),
				'Close_Time_sun'=>$this->input->post('Close_Time_sun'.$menuvalue.''),	
				'Open_Time_mon'=>$this->input->post('Open_Time_mon'.$menuvalue.''),
				'Close_Time_mon'=>$this->input->post('Close_Time_mon'.$menuvalue.''),	
				'Open_Time_tue'=>$this->input->post('Open_Time_tue'.$menuvalue.''),
				'Close_Time_tue'=>$this->input->post('Close_Time_tue'.$menuvalue.''),	
				'Open_Time_wed'=>$this->input->post('Open_Time_wed'.$menuvalue.''),
				'Close_Time_wed'=>$this->input->post('Close_Time_wed'.$menuvalue.''),	
				'Open_Time_thu'=>$this->input->post('Open_Time_thu'.$menuvalue.''),
				'Close_Time_thu'=>$this->input->post('Close_Time_thu'.$menuvalue.''),	
				'Open_Time_fri'=>$this->input->post('Open_Time_fri'.$menuvalue.''),
				'Close_Time_fri'=>$this->input->post('Close_Time_fri'.$menuvalue.''),	
				'Open_Time_sat'=>$this->input->post('Open_Time_sat'.$menuvalue.''),
				'Close_Time_sat'=>$this->input->post('Close_Time_sat'.$menuvalue.''),				
				'created_at'=>date("Y-m-d H:i:s"),	
				'created_by'=>$this->session->userdata('id')
				
			);			
			
			$resultval = $this->db->insert(FOODTIME,$uploaddata);
			}
			 $uploaddata=$this->input->post('available-days');		   
		
		   $resulhotaltval = $this->Dinner_model->insertHotelAvailabilityData($uploaddata);		
			if($resultval){
				$msg = "Your information has been updated sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('dinner');
			}
			else{
				$msg = "Error in Updation!!!";
				$this->session->set_flashdata('message',alert('warning',$msg));	  
				redirect('dinner');
			}
           
   
		$data['Title']='Update dinner';
		$this->load->view('dinner',$data );
	
		
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
         $test = $this->Dinner_model->getMasterHotelAvailabilityData($hotel_id, $date);
            echo str_replace("\/", "/", json_encode(array("dates" => $test)));exit;
        break;
    case "single_calender":
        $date = $_POST['sel_date'];
        $hotel_id = $_POST['hotel_id'];
        $food_type = $_POST['type_id'];
            $master = $this->Dinner_model->getMasterHotelAvailabilityData($hotel_id, $date);
            $type = $this->Dinner_model->getHotelAvailabilityData($hotel_id, $food_type, $date);
            $final_data = array_merge($master, $type);
            echo str_replace("\/", "/", json_encode(array("dates" => $final_data)));exit;
        break;
      
    default:
        echo "Default";
        break;
        
}

		$data['Title']='Update breakfast';
		$this->load->view('breakfast',$data );
	
		
	}
	

	

	
	
}
