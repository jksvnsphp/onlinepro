<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transaction_model extends CI_Model 
{

	//create function for get transaction---------
	public function getTransaction()
	{
		$query=$this->db->get(TRANSACTION);
		return $query->result_array();	
	}
	
	
	//create function for  get transaction by id --------	
	public function getTransactionById($id)
	{	
		$this->db->where('transaction_id', $id);
		$query = $this->db->get(TRANSACTION);
		return $query->row_array();
	}
	
	//create function for  insert data in transaction --------	
	public function insert()
	{
		$data=array
		(
			'user_id' => $this->input->post('user_id'),
			'invoice_id' => $this->input->post('invoice_id'),
			'transaction_date' => $this->input->post('transaction_date'),
			'neft_nubber' => $this->input->post('neft_nubber'),
			'amount' => $this->input->post('amount'),
			'admin_charge' => $this->input->post('admin_charge'),    
			'tds' => $this->input->post('tds'),
			'net_amount' => $this->input->post('net_amount'),
		);
		 if ($this->db->insert(TRANSACTION,$data))
			{
				return true;
			} 
	}
//create function for update transaction----------	
	public function update()
	{
		$data=array
		(
            'user_id' => $this->input->post('user_id'),
			'invoice_id' => $this->input->post('invoice_id'),
			'transaction_date' => $this->input->post('transaction_date'),
			'neft_nubber' => $this->input->post('neft_nubber'),
			'amount' => $this->input->post('amount'),
			'admin_charge' => $this->input->post('admin_charge'),    
			'tds' => $this->input->post('tds'),
			'net_amount' => $this->input->post('net_amount'),
			'update_date'=>date("Y-m-d H:i:s")	
		);
		 $this->db->where('transaction_id',$this->input->post('transaction_id'));
         $query = $this->db->update(TRANSACTION,$data);
		 
		if($query ){
		  return true;
		}
		else{
			return false;
		}
                   
	}
	
	//create function delete transaction-------
	public function delete($id)
	{		
		$this->db->where('transaction_id', $id);
        $query = $this->db->delete(TRANSACTION);
		
		if($query){
			return true;
		}else{
			return false;
		}
	} 

	//create function for get all user ---------
	public function getUser()
	{
		$query=$this->db->get(USERS);
		return $query->result_array();	
	}
	
	//create function for get all invoice---------
	public function getAllInvoice()
	{
		$query=$this->db->get(INVOICE);
		return $query->result_array();	
	}
}	
