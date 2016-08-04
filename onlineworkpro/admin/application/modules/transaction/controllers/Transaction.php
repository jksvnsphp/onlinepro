<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends MY_Controller {
	
	function __construct()
	{
        parent::__construct();
		$this->load->model('Transaction_model','transaction'); 	  
	}	

	public function index()
	{		
		$data['Title']="Transaction Detail";	
		$data['transactions'] = $this->transaction->getTransaction();
		$this->load->view('index',$data);
	}
	
	//create function for add new Transaction -------	
	public function add()
	{
		$data['user'] = $this->transaction->getUser();
		$data['invoice'] = $this->transaction->getAllInvoice();
		$this->form_validation->set_rules('user_id', 'User', 'trim|required');
		$this->form_validation->set_rules('invoice_id', 'Invoice', 'trim|required');
		$this->form_validation->set_rules('transaction_date', 'Transfer Date', 'trim|required');
		$this->form_validation->set_rules('neft_nubber', 'NEFT No.', 'trim|required|numeric');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|greater_than[0.99]');
		$this->form_validation->set_rules('tds', 'TDS', 'trim|required|numeric|greater_than[0.99]');
		$this->form_validation->set_rules('admin_charge', 'Admin Charge', 'trim|required|numeric|greater_than[0.99]');
		$this->form_validation->set_rules('net_amount', 'Net Amount', 'trim|required|numeric|greater_than[0.99]');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == true)
		{				
			$result = $this->transaction->insert();
			
			if($result == 1){
				$msg = "Information added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('transaction');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('transaction');
			}	
		}	
		$data['Title']="Add Transaction Details";	
		$this->load->view('add',$data);
	}
	

	//create function for edit transaction --------	
	public function edit($id)
	{
		$data['transaction'] = $this->transaction->getTransactionById($id);
		$data['user'] = $this->transaction->getUser();
		$data['invoice'] = $this->transaction->getAllInvoice();
		$this->form_validation->set_rules('user_id', 'User', 'trim|required');
		$this->form_validation->set_rules('invoice_id', 'Invoice', 'trim|required');
		$this->form_validation->set_rules('transaction_date', 'Transfer Date', 'trim|required');
		$this->form_validation->set_rules('neft_nubber', 'NEFT No.', 'trim|required|numeric');
		$this->form_validation->set_rules('amount', 'Amount', 'trim|required|numeric|greater_than[0.99]');
		$this->form_validation->set_rules('tds', 'TDS', 'trim|required|numeric|greater_than[0.99]');
		$this->form_validation->set_rules('admin_charge', 'Admin Charge', 'trim|required|numeric|greater_than[0.99]');
		$this->form_validation->set_rules('net_amount', 'Net Amount', 'trim|required|numeric|greater_than[0.99]');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == true)
		{			
			$result = $this->transaction->update();
			
			if($result == 1){
				$msg = "Update Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('transaction');
			}
			else{
				$msg = "Error in editing!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('transaction');
			}	
        }
		$data['Title']="Edit Transaction Details";	
		$this->load->view('edit',$data );
	}
	
	
	//create function for delete transaction -----
	public function delete($id)
	{
		$result = $this->transaction->delete($id);
		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('transaction');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('transaction');		
		}
	}	
	
}
