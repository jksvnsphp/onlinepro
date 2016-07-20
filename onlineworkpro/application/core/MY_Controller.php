<?php
class MY_Controller extends CI_Controller {
	function __construct(){
		parent::__construct();		
		if($this->session->userdata('vendor_login') === NULL || $this->session->userdata('vendor_login')==false ){
            redirect();
        }
	}
	
	
}
