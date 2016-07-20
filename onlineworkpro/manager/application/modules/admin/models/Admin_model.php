<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Admin_model extends CI_Model {
    public function __construct() {
        parent::__construct(); 
    }
	//create function for admin User Login check -------	
	public function checkuser(){
		$email = req('email');
		$password = req('password');
		dbSelect('SELECT * FROM '.MANAGER.' WHERE email = ' . Nullify($email) . ' AND password = ' . Nullify(sha1($password)) . '',$bUserFound,$aUserFound);
		if($bUserFound){
			 $newdata = array(
			   'id'  => $aUserFound[0]['id'],
			   'ResID'  => $aUserFound[0]['Restaurant_List'],
			   'hotelID'  => $aUserFound[0]['Hotel_List'],
			   'email'     => $aUserFound[0]['email'],
			   'logged_in' => TRUE
			 );
			$this->session->set_userdata($newdata);
			return array('success'=>'yes');
		}else{
			return array('success'=>'falied');
		}
	}
}	
