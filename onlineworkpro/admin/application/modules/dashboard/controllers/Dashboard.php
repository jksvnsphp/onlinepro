<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Dashboard_model'); 
		$this->load->helper('custom_helper'); 

    }	

	public function index(){
		$data['Title'] = 'Dashboard';
		 		
		$this->load->view('index',$data);
		
		
		
		
	}
	

	
	
}
