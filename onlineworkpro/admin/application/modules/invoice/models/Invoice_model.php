<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Invoice_model extends CI_Model 
{

	//create function for get invoice ---------
	public function getInvoice()
	{
		$query=$this->db->get(INVOICE);
		return $query->result_array();	
	}
	
	
	//create function for  get invoice by id --------	
	public function getInvoiceById($id)
	{	
		$this->db->where('invoice_id', $id);
		$query = $this->db->get(INVOICE);
		return $query->row_array();
	}
	
	//create function for  insert data in user plan --------	
	public function insert()
	{
		$data=array
		(
			'user_id' => $this->input->post('user_id'),
			'acknowledment' => $this->input->post('acknowledment'),
			'amount' => $this->input->post('amount'),
			'transaction_id' => $this->input->post('transaction_id'),
			'created_date'=>date("Y-m-d H:i:s")					
		);
		 if ($this->db->insert(INVOICE,$data))
			{
				return true;
			} 
	}
//create function for update user plan ----------	
	public function update()
	{
		$data=array
		(
            'user_id' => $this->input->post('user_id'),
			'acknowledment' => $this->input->post('acknowledment'),
			'amount' => $this->input->post('amount'),
			'transaction_id' => $this->input->post('transaction_id'),
			'updated_date'=>date("Y-m-d H:i:s")	
		);
		 $this->db->where('invoice_id',$this->input->post('invoice_id'));
         $query = $this->db->update(INVOICE,$data);
		 
		if($query ){
		  return true;
		}
		else{
			return false;
		}
                   
	}
	
	//create function delete user plan --------
	public function delete($id)
	{		
		$this->db->where('invoice_id', $id);
        $query = $this->db->delete(INVOICE);
		
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
	
}	
