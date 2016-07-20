<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	

	
//create function for get order ---------
	public function getOrder(){		
		$sql="  SELECT ord.*,  hall.restaurant_name , orst.status, ven.username,ven.name as vendor_name
			    FROM  `".ORDER."` as ord  
				INNER JOIN ".RESTAURANT." as hall on ord.Rest_id =hall.id
				LEFT JOIN  ".ORDER_STATUS." as orst on ord.order_status_id=orst.id
				LEFT JOIN ".VENDORS." as ven on ord.vendor_id=ven.id
			    WHERE ord.Rest_id='136'
			   ORDER by ord.order_date desc
		   "; 
		//echo $sql;
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	
//create function for  get order by id --------	
	public function getOrderById($id){	
		$sql="  SELECT ord.*,  hall.hall_name , orst.status, ven.username,ven.name as vendor_name,ven.mobile,  ven.email  as vendor_email,    hall.estimated_price
			    FROM  `".ORDER."` as ord  
				INNER JOIN ".HALL." as hall on ord.hall_id =hall.id
				LEFT JOIN  ".ORDER_STATUS." as orst on ord.order_status_id=orst.id
				LEFT JOIN ".VENDORS." as ven on hall.vendor_id=ven.id
			   WHERE   ord.id='".$id."'  and  hall.crowed_hall=0
			   ORDER by ord.order_date desc
		   "; 
		//echo $sql;
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	
	
	
	
//create function for  get order by id --------	
	public function getOrderEventDate($id){	
		$sql="  SELECT min(order_event_date) as start_date  , max(order_event_date) as end_date
			    FROM  `".ORDER_DATE."` as ord  
			   WHERE   ord.order_id='".$id."'
		   "; 
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	
	
	
	
	
	
	
//create function for update order ----------	
	public function update($data, $id){
		$this->db->where('id', $id);
		$res =  $this->db->update(ORDER, $data); 
		if($res ){
		  return true;
		}
		else{
			return false;
		}
	}			
	
	
//create function delete order --------
	public function delete($id){
		$this->db->where('id',$id);
		$data['is_deleted'] = 1;
		$query = $this->db->update(ORDER,$data);
		
		if($query){
			return true;
		}else{
			return false;
		}
	} 


//create function for get hall ---------
	public function getHall(){
		$this->db->select('*');
		$this->db->where('is_deleted',0);
		$this->db->where('is_active',1);
		$query = $this->db->get(HALL);
		if($query){
			return $query->result_array();
		}else{
			return false;
		}
	}	
	
//create function for get negotiable ---------
	public function getNegotiation(){
		$this->db->select('*');
		$this->db->where('is_deleted',0);
		$this->db->where('is_active',1);
		$query = $this->db->get(NEGOTIATION);
		if($query){
			return $query->result_array();
		}else{
			return false;
		}
	}		

	public function getStatus(){
		$this->db->select('*');
		$this->db->where('is_deleted',0);
		$this->db->where('is_active',1);
		$query = $this->db->get(ORDER_STATUS);
		return $query->result_array();
	}	
	
	public function getStatusById($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$query = $this->db->get(ORDER_STATUS);
		return $query->row_array();
	}	
	
	
	
	public function getMailDetails($id)
	{
		$this->db->where('is_deleted',0 );
		$this->db->where('id',$id );
		$this->db->where('id',$id );
		return $this->db->get(MAIL_TEMPLATE)->row_array();
	}

	public function getAdminEmail()
	{
		$this->db->where('name','SITE_EMAIL' );
		return $this->db->get(SETTING)->row_array();;
	}
	
	
	//hall details send mail to vendor
	public function orderDetailsSendmailToUser($order_id   , $status_id )
	{
		$mail_template =  $this->Order_model->getMailDetails(11);
		$order_details =  $this->Order_model->getOrderById($order_id);
		$message = $mail_template['message'];
		
		$message = str_replace("[user]", $order_details['email'], $message);
		$message = str_replace("[transaction_id]", $order_details['transaction_id'], $message);
		$message = str_replace("[hall_name]", $order_details['hall_name'], $message);
		$message = str_replace("[order_status]", $order_details['status'], $message);
		$message = str_replace("[site_url]", site_url(), $message);
		
		if($status_id==2)
		{
			$message = str_replace("[vendor_phone_number]", "vendor contact Num :" .$order_details['mobile'], $message);
		}
		else
		{
			$message = str_replace("[vendor_phone_number]", "", $message);
		}
		
		//echo $message ;die;
		$this->load->library('email');
		$config = array();
		$config['mailtype'] = 'html';
		$config['charset']  = 'utf-8';
		$config['newline']  = "\r\n";
		$config['wordwrap'] = TRUE;
		
		$this->email->initialize($config);
		$this->email->from($mail_template['from_email'], $mail_template['from_email'] );
		$this->email->reply_to( $mail_template['reply_email'] , $mail_template['reply_email'] );
		$this->email->to($order_details['email']);
		$this->email->subject($mail_template['subject'] );
		$this->email->message( $message );
		$this->email->send();	
	}
	
	
	
	
	//hall details send mail to orderDetailsSendmailToAdmin
	public function orderDetailsSendmailToVendor($order_id)
	{
		$mail_template =  $this->Order_model->getMailDetails(13);
		$order_details =  $this->Order_model->getOrderById($order_id);
		$message = $mail_template['message'];
		
		$message = str_replace("[user]", $order_details['name'], $message);
		$message = str_replace("[transaction_id]", $order_details['transaction_id'], $message);
		$message = str_replace("[hall_name]", $order_details['hall_name'], $message);
		$message = str_replace("[order_status]", $order_details['status'], $message);
		$message = str_replace("[site_url]", site_url(), $message);
		//echo $message ;die;
		$this->load->library('email');
		$config = array();
		$config['mailtype'] = 'html';
		$config['charset']  = 'utf-8';
		$config['newline']  = "\r\n";
		$config['wordwrap'] = TRUE;
		
		$this->email->initialize($config);
		$this->email->from($mail_template['from_email'], $mail_template['from_email'] );
		$this->email->reply_to( $mail_template['reply_email'] , $mail_template['reply_email'] );
		$this->email->to($order_details['vendor_email']);
		$this->email->subject($mail_template['subject'] );
		$this->email->message( $message );
		$this->email->send();	
	}
	
	
	
	
	
	
	
	//hall details send mail to orderDetailsSendmailToAdmin
	public function orderDetailsSendmailToAdmin($order_id)
	{
		$mail_template =  $this->Order_model->getMailDetails(12);
		$order_details =  $this->Order_model->getOrderById($order_id);
		$message = $mail_template['message'];
		
		$message = str_replace("[user]", $order_details['name'], $message);
		$message = str_replace("[transaction_id]", $order_details['transaction_id'], $message);
		$message = str_replace("[hall_name]", $order_details['hall_name'], $message);
		$message = str_replace("[order_status]", $order_details['status'], $message);
		$message = str_replace("[site_url]", site_url(), $message);
		//echo $message ;die;
		$this->load->library('email');
		$config = array();
		$config['mailtype'] = 'html';
		$config['charset']  = 'utf-8';
		$config['newline']  = "\r\n";
		$config['wordwrap'] = TRUE;
		
		$this->email->initialize($config);
		$this->email->from($mail_template['from_email'], $mail_template['from_email'] );
		$this->email->reply_to( $mail_template['reply_email'] , $mail_template['reply_email'] );
		
		
		
		$admin_email =$this->Order_model->getAdminEmail();
		$this->email->to($admin_email['value']);
		
		//$this->email->to($order_details['vendor_email']);
		$this->email->subject($mail_template['subject'] );
		$this->email->message( $message );
		$this->email->send();	
	}
	
	
	
	
}	
