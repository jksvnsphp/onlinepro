<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lunch_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	


//create function for get update lunch id ----------		
	public function getLunch($res_id){
			$this->db->where('rest_id', $res_id);
			$this->db->where('food_type','Lunch');
			$query = $this->db->get(FOODTIME);
			return $query->result_array();
	}	
	


		
	public function deletemenu( $res_id)
	{	
	$this->db->where('rest_id', $res_id);
	$this->db->where('food_type','Lunch');		
	 $res =  $this->db->delete(FOODTIME);	
	   	
		if($res )
		{
		  return true;
		}
		else
		{
			return false;
		}
	   	
	}
	
	
	/******************************************calender********************************************/	
		
		public function getHotelAvailabilityData($hotel_id, $food_type, $date) {
		if(!empty($date)){
			$today = $date;
		}
		else{
			$today = date('Y-m-d');
		}
		$start = date("Y-m-01", strtotime($today));
		$end = date("Y-m-t", strtotime($today));
		$month_day_count = date("t", strtotime($today));
		$query = "SELECT date, status FROM `bb_hotel_availability` WHERE `hotel_id` = $hotel_id AND `food_type_id` = $food_type AND `date` BETWEEN '$start' AND '$end' ";
		
		 $qh =$this->db->query($query)->result_array();// print_r( $qh );	
		 $holidays = array();
	
		foreach($qh as $res){
			$holidays[$res['date']] = $res['status'];
		}
		//print_r( $holidays );echo '</br>';
		$avail_days = array();
		for ($dt = 0; $dt <= $month_day_count - 1; $dt++) {
			$list_date = date("Y-m-d", strtotime("$start + " . ($dt) . " day"));
			$avail_days[$list_date] = 'available';
		}
		//print_r( $avail_days );echo '</br>';
		$data['holidays'] = array_merge($avail_days, $holidays);
		//print_r( $data['holidays'] );
		$data['last_month'] = date("Y-m-d", strtotime($start. '-1 days'));
		$data['next_month'] = date("Y-m-d", strtotime($end. '+1 days'));
		$data['cur_month'] = date("M Y", strtotime($start));
        //print_r($data);
		return $data;
	}
	
	   public function insertHotelAvailabilityData($data) {
		$hotel_id = $this->session->userdata('ResID');
		$user_id = $this->session->userdata('id');
	    $food_type_id=2;
		//$open = date('H:i:s', strtotime($data['opening-time']));
		//$close = date('H:i:s', strtotime($data['closing-time']));
		$res = array();
		 //print_r($data);die;
		 foreach ($data as $key => $days) {
         $avail_delete_query = "DELETE FROM `bb_hotel_availability` WHERE `hotel_id` = '" . $hotel_id . "' AND `food_type_id` = '" .  $food_type_id . "' AND `status` = 'un-available' AND `date` = '".$key."'";
	   $datdelete =$this->db->query($avail_delete_query);
	   
	   $query = "DELETE FROM ".HOTEL_AVAILABILITY_SEAT." WHERE `hotel_id` = '" .  $hotel_id  . "' AND `food_type_id` = '" .$food_type_id. "'";
	   $datquerydelete =$this->db->query($query);
		}
			
		$query1 = "INSERT INTO ".HOTEL_AVAILABILITY_SEAT." SET `hotel_id` = '" . $hotel_id  . "', `food_type_id` = '" . $food_type_id . "', `opening_time`='" . $open . "',`closing_time`='" . $close . "',`time_interval`='" . $data['time-interval'] . "',`seats`='" . $data['avaliable-seats'] . "',`update_by`='".$user_id."' ";
		$Insertquery1 =$this->db->query($query1);		
      
		foreach ($data as $key => $days) {
			if ($days == 'un-available') {
							
				$avail_insert_query = "INSERT INTO ". HOTEL_AVAILABILITY ." SET `hotel_id` = '" . $hotel_id . "', `food_type_id` = '" .  $food_type_id . "',  `date` = '" . $key . "', `status` = 'un-available'";
				$querydata =$this->db->query($avail_insert_query);
		
		  }
		}
	  return $querydata;	
	}
	
	   public function getMasterHotelAvailabilityData($hotel_id, $date = '') {
		if(!empty($date)){
			$today = $date;
		}
		else{
			$today = date('Y-m-d');
		}
        // $today = date('Y-m-d');
		$start = date("Y-m-01", strtotime($today));
		$end = date("Y-m-t", strtotime($today));
		$month_day_count = date("t", strtotime($today));
		$query = "SELECT date, status FROM ". HOTEL_AVAILABILITY ." WHERE `hotel_id` = $hotel_id AND `status` = 'master-un-available' AND `date` BETWEEN '$start' AND '$end' ";
		  $qh =$this->db->query($query)->result_array(); //print_r( $qh );
		$holidays = array();
		foreach($qh as $res)
		{
			$holidays[$res['date']] = $res['status'];
		}
		$avail_days = array();
		for ($dt = 0; $dt <= $month_day_count - 1; $dt++) {
			$list_date = date("Y-m-d", strtotime("$start + " . ($dt) . " day"));
			$avail_days[$list_date] = 'available';
		}
		$data['holidays'] = array_merge($avail_days, $holidays);
		$data['last_month'] = date("Y-m-d", strtotime($start. '-1 days'));
		$data['next_month'] = date("Y-m-d", strtotime($end. '+1 days'));
		$data['cur_month'] = date("M Y", strtotime($start));

		return $data;
	}
	
	
		/******************************************end calender********************************************/

	
}	
