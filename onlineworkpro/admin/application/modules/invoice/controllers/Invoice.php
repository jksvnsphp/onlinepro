<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends MY_Controller {
	
	function __construct()
	{
        parent::__construct();
		$this->load->model('Invoice_model','invoice'); 	  
	}	

	public function index()
	{	
		$data['Title']="Invoice List";	
		$data['invoice'] = $this->invoice->getInvoice();
		$this->load->view('index',$data);
	}
	
	//create function for add new invoice -------	
	public function add()
	{
		$data['user'] = $this->invoice->getUser();
		$this->form_validation->set_rules('user_id', 'User', 'trim|required');
		$this->form_validation->set_rules('acknowledment', 'Acknowledment', 'trim|required');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|greater_than[0.99]');
		$this->form_validation->set_rules('transaction_id', 'Transaction Id', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == true)
		{				
			$result = $this->invoice->insert();
			
			if($result == 1){
				$msg = "Information added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('invoice');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('invoice');
			}	
		}	
		$data['Title']="Add Invoice Details";	
		$this->load->view('add',$data);
	}
	

	//create function for edit invoice --------	
	public function edit($id)
	{ 
		$data['invoice'] = $this->invoice->getInvoiceById($id);
		$data['user'] = $this->invoice->getUser();
		$this->form_validation->set_rules('user_id', 'User', 'trim|required');
		$this->form_validation->set_rules('acknowledment', 'Acknowledment', 'trim|required');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|greater_than[0.99]');
		$this->form_validation->set_rules('transaction_id', 'Transaction Id', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == true)
		{			
			$result = $this->invoice->update();
			
			if($result == 1){
				$msg = "Update Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('invoice');
			}
			else{
				$msg = "Error in editing!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('invoice');
			}	
        }
		$data['Title']="Edit Invoice Details";	
		$this->load->view('edit',$data );
	}
	
	
	//create function for delete invoice -----
	public function delete($id)
	{
		$result = $this->invoice->delete($id);
		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('invoice');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('invoice');		
		}
	}	
	
}
