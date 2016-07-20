<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');



///////////////////Check User is logged in or not if logged user redirect to main Website/////////////////
function is_login(){
	$CI =& get_instance();
	//echo $CI->input->cookie('id_user'); die;
	if($CI->session->userdata('user_login') === true)
		return true;
	else
		return false;
}

/**
 * grab contents of _GET or _POST variables
 * also cleans inputs of any nasty stuff
 * to prevent spamming
 
 * @author Amit Choyal <choyalamit1432@gmail.com>
 * @param string variable that you would like to check
 * @param bool choose whether you want to clean the input
 * @param bool choose whether you want to really clean it
 * @param string the return value if the variable is not set
 * @return string
 *
 */
  
function req($request,$clean=false,$all=true,$else='')
{
	$patterns = array('/content\-type:/i','/to:/i','/bcc:/i','/cc:/i');
	if ( $all ) array_push($patterns,'/\r/i','/\n/i','/%0d/i','/%0a/i');
	if ( isset($_POST[$request]) ) {
		if ( $clean ) {
			if ( is_array($_POST[$request]) ) {
				$aReturn_Array = array();
				foreach($_POST[$request] as $value) {
					$aReturn_Array[] = stripslashes(preg_replace($patterns,'',trim($value)));
				}
				return $aReturn_Array;
			}
			else {
				return stripslashes(preg_replace($patterns,'',trim( $_POST[$request] )));
			}
		} else {
			if ( is_array($_POST[$request]) ) {
				$aReturn_Array = array();
				foreach($_POST[$request] as $value) {
					$aReturn_Array[] = stripslashes(trim($value));
				}
				return $aReturn_Array;
			}
			else {
				return stripslashes(trim( $_POST[$request] ));
			}
		}
	} elseif ( isset($_GET[$request]) ) {
		if ( $clean ) {
			if ( is_array($_GET[$request]) ) {
				$aReturn_Array = array();
				foreach($_GET[$request] as $value) {
					$aReturn_Array[] = stripslashes(preg_replace($patterns,'',trim($value)));
				}
				return $aReturn_Array;
			}
			else {
				if ( is_array($_GET[$request]) ) {
					$aReturn_Array = array();
					foreach($_GET[$request] as $value) {
						$aReturn_Array[] = stripslashes(trim($value));
					}
					return $aReturn_Array;
				}
				else {
					return stripslashes(preg_replace($patterns,'',trim( $_GET[$request] )));
				}
			}
		} else {
			return stripslashes(trim( $_GET[$request] ));
		}
	} else {
		return $else;
	}
}

 //create function for get details ----------		
function getSettingDetails($name){
	$CI =& get_instance();
	$CI->db->select('value');
	$CI->db->where('name',$name);
	$query = $CI->db->get(SETTING)->row_array();;
	return $query['value'];
}
	
/// Encryption menthod for password.
function generate_hash($salt, $data, $type = 'sha1') {
	$str_encrypt = $salt . md5($data);
	if ( $type === 'sha1' ) {
		$hash = sha1($str_encrypt);
	} else if ( $type === 'sha512' ) {
		$hash = hash('sha512', $str_encrypt);
	} else {
		return false;
	}
	return $hash;
}


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
	function getProfile(){
		$CI =& get_instance();
		$CI->load->model('Common_model'); 
		$user_id = $CI->session->userdata('id');
		$profile =  $CI->Common_model->getProfile($user_id);
		return $profile;
	}
	
	
////////////////////////////Get Email Message//////////////////////////////////

function GetemailMessageData($tid){
		$CI =& get_instance();
		$query 	= $CI->db->query('SELECT * FROM '.MAIL_TEMPLATE.' where id ="'.$tid.'"');
		if($query){
			return $query->result_array();
		}else{
			return false;
		}
}

/////For Email Send////////////////////////
function SendEmail($data){
	$CI =& get_instance();
	$CI->load->library('email');   
	$config['mailtype'] = 'html';
	$CI->email->initialize($config);
	$CI->email->from($data['from_email'], 'Burpbig');
	$CI->email->reply_to($data['reply_email'], 'Burpbig');
	$CI->email->to($data['toemail']);
	$CI->email->subject($data['subject']);
	$CI->email->message($data['template']);
	if ( $CI->email->send()){
		return true;
	}
	else{
		return false;
	}
}

////////////////Get all the social Links/////////////////
function getSocial(){
	$this->db->select('*');
	$this->db->where('is_active',1);		
	$query = $this->db->get(SOCIAL_MEDIA);
	return $query->result_array();
}



///////////// Get Value From Setting  ////////////////

function getValue($name){
	$CI =& get_instance();
	$CI->db->select('value');
	$CI->db->where('name',$name);
	$query = $CI->db->get('setting');
	return $query->row_array();

}




/**
 * checks to see if a variable is empty
 * @author Amit Choyal  <choyalamit1432@gmail.com>
 * @param string
 * @return bool
 *
 */
function CheckNull($str)
{
	if ( $str == "0" ) {
		return(false);
	} else {
		if ( is_null($str) || $str == "" || empty($str) || strlen($str) <= 0 ) {
			return(true);
		}
	}
}

/**
 * checks to see if a variable is null or empty returns (string) "null" if so
 * if not, cleans the variable and returns it quoted 'var'
 * @author Amit Choyal  <choyalamit1432@gmail.com>
 * @param string variable to be checked
 * @return string
 *
 */
function Nullify($varIn)
{
	if ( CheckNull($varIn) ) {
		return "NULL";
	}
	$varIn = stripslashes($varIn);
	$varIn = addslashes( $varIn );
	return "'" . $varIn . "'";
}
///////////////////Database Quires////////////////////////////

function dbSelect($strQuery, &$bTrigger, &$aArray, $bKeep_Connection_Open = true) {
	$CI =& get_instance();
	global $select_count;
	$select_count++;
	global $strQry;
	$strQry = $strQuery;
	if ($strQry) { //if query string exists then continue
		$SearchQuery = $CI->db->query($strQry);
		if ($SearchQuery->num_rows() == 0) {
		   	$bTrigger = False;
		}
		else {
			$bTrigger = True;
				$aArray = $SearchQuery->result_array();
		}
	}
	else $bTrigger = false;
}

function dbGeneral($strQuery, $srcTable, &$lastID, $bKeep_Connection_Open = true) {
	$CI =& get_instance();
	global $general_count;
	$general_count++;
	global $strQry;
	$strQry = $strQuery;
	if ($strQry) { //if query string exists then continue
		$UpdateQuery = $CI->db->query($strQry);
		if ($srcTable) $lastID = $CI->db->insert_id();
	}
}





