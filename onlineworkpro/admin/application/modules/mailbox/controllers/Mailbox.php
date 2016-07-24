<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mailbox extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Mailbox_model'); 
    }	

	public function index(){
		$data['get_mailbox'] = $this->Mailbox_model->getNewsletter();
		$data['get_user'] = $this->Mailbox_model->getUsers();
		
		$this->form_validation->set_rules('from_email', 'From email', 'trim|required|valid_email');
		$this->form_validation->set_rules('reply_email', 'Reply', 'trim|required|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
		$this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[200]');
		
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        if ($this->form_validation->run() == true) 
        {
			
			$email_send =  $this->input->post('email')  ;
			
			$this->load->library("email");
			$config = array();
			$config['mailtype'] = 'html';
			$config['charset']  = 'utf-8';
			$config['newline']  = "\r\n";
			$config['wordwrap'] = TRUE;
			
			
			foreach( $email_send as $send_mail)
			{
			
			
				$this->email->initialize($config);
				$this->email->from(  $this->input->post('from_email'), $this->input->post('from_email') );
				$this->email->reply_to( $this->input->post('reply_email') , $this->input->post('reply_email') );
				
				$this->email->to($send_mail);
				$this->email->subject( $this->input->post('subject') );
				
				$this->email->message( $this->input->post('message') );
				$this->email->send();	
			}
			
			
			$data = array(		
				'send_type' =>"send mail to subscibed user",
				'subject' => $this->input->post('subject'),
				'message' => $this->input->post('message'),
				'email' => implode(", "  ,$email_send  ),
				'send_date'=>date("Y-m-d H:i:s")				
			);
		     $result = $this->db->insert(MAIL_LOG,$data);
		     
		     
			if($result)
			{
				$msg = "Mail has been send to selected subscriber";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('mailbox');
			}
			else
			{
				$msg = "Error in send mail!!!";
				$this->session->set_flashdata('message',alert('warning',$msg));	  
				redirect('mailbox');
			}	
		}
		$this->load->view('index',$data);
	}
	

}
