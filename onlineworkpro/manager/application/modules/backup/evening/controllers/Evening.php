<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evening extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Evening_model'); 
		$this->load->helper('custom_helper'); 
    }	

	public function index(){		
		$res_id = $this->session->userdata('ResID');
		
		$data['evening_details'] =  $this->Evening_model->getEvening($res_id);
		
		$data['Title']='Update evening';
		$this->load->view('evening',$data );
	}
	
	
	public function add()
	{
	
		$user_id = $this->session->userdata('id');
		$res_id = $this->session->userdata('ResID');
		$hotal_id = $this->session->userdata('hotelID');
		$menu=$this->input->post('menuId');
		
	    $deleteresult =  $this->Evening_model->deletemenu($res_id );		
		$data['evening_details'] =  $this->Evening_model->getEvening($res_id );	
		
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
			
			if($resultval){
				$msg = "Your information has been updated sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('evening');
			}
			else{
				$msg = "Error in Updation!!!";
				$this->session->set_flashdata('message',alert('warning',$msg));	  
				redirect('evening');
			}
           
   
		$data['Title']='Update evening';
		$this->load->view('evening',$data );
	
		
	}
	
	

	

	
	
}
