<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mastercalander_model extends CI_Model {
    public function __construct() {
        parent::__construct();
       
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
	
    public function insertMasterHotelAvailabilityData($data) {
		$hotel_id = $this->session->userdata('ResID');
	     //$hotel_id = $this->session->userdata('hotelID');	
		 $res = array();
		 //print_r($data);die;
		 foreach ($data as $key => $days) {

			$avail_delete_query = "DELETE FROM ". HOTEL_AVAILABILITY ." WHERE `hotel_id` = '" . $hotel_id . "' AND  `date` = '" . $key. "' AND `status` = 'master-un-available'";
			$datdelete =$this->db->query($avail_delete_query);
			
			
		}
      
		foreach ($data as $key => $days) {
			if ($days == 'master-un-available') {				
			for ($i = 1; $i <= 4; $i++) {
				$avail_insert_query = "INSERT INTO ". HOTEL_AVAILABILITY ." SET `hotel_id` = '" . $hotel_id . "', `food_type_id` = '" . $i . "',  `date` = '" . $key . "', `status` = 'master-un-available'";
				$querydata =$this->db->query($avail_insert_query);
				
			}
		
		}
		}
	return $querydata;	
	}
	

	

	
}	
