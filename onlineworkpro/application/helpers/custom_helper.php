<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//create function for alert message -----------------
	function alert( $task , $message){
		
		if($task =='error') {
			$alert ='<div class="alert alert-danger msg"><i class="fa fa-exclamation-circle"></i> '. $message.' </div>';			
		} elseif ($task =='success') {
			$alert ='<div class="alert alert-success msg"><i class="fa fa-check-circle"></i> '. $message.' </div>';		
		} elseif ($task =='warning') {
			$alert ='<div class="alert alert-warning msg"><i class="fa fa-exclamation-triangle"></i> '. $message.' </div>';
		} else {
			$alert ='<div class="alert alert-info msg"><i class="fa fa-info"></i> '. $message.' </div>';
		}
		return $alert;
	
	}



//create function for get current profile details -------
	
	
	ipdeny();
	function ipdeny()
	{	
		$CI =& get_instance();
	    $CI->load->database();
		$CI->load->model('Common_model'); 
		$ip =  $CI->Common_model->getDetails('IP_DENY');
		$ip_val  =  explode(","  ,$ip  );
		
		
	     $cur_IP = $_SERVER['REMOTE_ADDR'];
	    
	     if(!empty($ip_val))
	     {
				if(  in_array(  $cur_IP  , $ip_val  ) )
				{
					die;
				}
		}
	}








//create function for get current profile details -------
	function getProfile()
	{
		$CI =& get_instance();
		$CI->load->database();
		$CI->load->model('Common_model'); 
		$user_id = $CI->session->userdata('id');
		$profile =  $CI->Common_model->getProfile($user_id);
		return $profile;
	}

/*******************************************get setting data*********************/

function getSettingDetails($name){	 
	$CI =& get_instance();
	$CI->db->select('value');
	$CI->db->where('name',$name);	
	$query = $CI->db->get(SETTING)->row_array();
	//$q=$CI->db->last_query();
	//print_r($q);die;
	return $query['value'];
}

function getsettingDetail($name)
{
$CI=& get_instance();
$CI->db->select('value');
$CI->db->where('name',$name);
$query=$CI->db->get(SETTING)->row_array();
return $query['value'];
}


//this code Auto Increment id 
if(!function_exists('getAutoIncreament')){
	
	function getAutoIncreament($tablename) {
		$inc =0 ;
		$ci = get_instance();
		$query = $ci->db->query("SHOW TABLE STATUS WHERE name='$tablename'");
		if ($query) {
			$result = $query->row_array();
			$inc = $result['Auto_increment'];
		} 
		return $inc;
	}
	
}

//this code transaction id 
if(!function_exists('TransactionId')){
	
	function TransactionId($pre,$id){
		$gen_id = sprintf("%05d", $id); 
		return $pre."-".$gen_id;
	}
	
}


function email_send($to,$subject,$msg)
{
	$ci = get_instance();
	$ci->load->library('email');
	
	$config['charset'] = "utf-8";
	$config['mailtype'] = "html";
	$config['newline'] = "\r\n";

	$ci->email->initialize($config);		

	$ci->email->from('no-reply@gmail.com', 'no-reply');
	$ci->email->to($to);
	$ci->email->subject($subject);
	$ci->email->message($msg);
	$ci->email->send(); 
}	


//create function for insert logs -----
function GetuserDetails($id = ''){
	$CI =& get_instance();
	if ($id=="")
		$id =  $CI->session->userdata('vendor_login');
	$CI->db->select('*');
	$CI->db->where('id',$id);
	$query = $CI->db->get('vendors');
	if ($query->num_rows()==1){
		return $query->row_array();
	}
	else{
		return false;
	}
}


function insertLogs($action,$uid = '') {
	$CI =& get_instance();
	if ($uid==''){
		$uid = $CI->session->userdata('vendor_login');
	}
	$userdetails = GetuserDetails($uid);
	$insertArr = array(
		'vendor_id' => $userdetails['id'],
		'name' => $userdetails['name'],
		'email' => $userdetails['email'],
		'mobile' => $userdetails['mobile'],
		'address' => $userdetails['address'],
		'ip' => $_SERVER['REMOTE_ADDR'],
		'action' => $action,
		'browser_details' => $_SERVER['HTTP_USER_AGENT'],
		'date'=> date('Y-m-d H:i:s',time())
	);
	$CI->db->insert('logs', $insertArr);
	//echo $CI->db->last_query();
	$logid = $CI->db->insert_id() ;
	return $logid;
}

