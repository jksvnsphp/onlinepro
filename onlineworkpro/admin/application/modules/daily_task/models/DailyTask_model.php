<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class DailyTask_model extends CI_Model 
{

	//create function for get daily task ---------
	public function getDailyTask()
	{
		$query=$this->db->get(DAILY_TASK);
		return $query->result_array();	
	}
	
	
//create function for  get daily task by id --------	
	public function getDailyTaskById($id)
	{	
		$this->db->where('daily_task_id', $id);
		$query = $this->db->get(DAILY_TASK);
		return $query->row_array();
	}
	
	public function insert()
	{
		$data=array
		(
			'user_id' => $this->input->post('user_id'),
			'task_id' => $this->input->post('task_id'),
			'plan_id' => $this->input->post('plan_id'),
			'status' => $this->input->post('status'),
			'created_date'=>date("Y-m-d H:i:s")					
		);
		if ($this->db->insert(DAILY_TASK,$data))
			{
				return true;
			} 	
	}
//create function for update daily task ----------	
	public function update($id)
	{
		$data=array(
            'user_id' => $this->input->post('user_id'),
			'task_id' => $this->input->post('task_id'),
			'plan_id' => $this->input->post('plan_id'),
			'status' => $this->input->post('status'),
			'updated_date'=>date("Y-m-d H:i:s")		
       );
		 $this->db->where('daily_task_id',$this->input->post('daily_task_id'));
         $query = $this->db->update(DAILY_TASK,$data);
		if($query ){
		  return true;
		}
		else{
			return false;
		}
                   
	}
					
//create function delete daily task --------
	public function delete($id){
		
		$this->db->where('daily_task_id', $id);
        $query = $this->db->delete('DAILY_TASK');
		
		if($query){
			return true;
		}else{
			return false;
		}
	} 
	
	public function getAllUser()
	{
		$query=$this->db->get(USER);
		return $query->result_array();	
	}
	
	public function getAllTask()
	{
		$query=$this->db->get(TASK);
		return $query->result_array();	
	}
	
	public function getAllPlan()
	{
		$query=$this->db->get(PLAN);
		return $query->result_array();	
	}
	
	
	
}	
