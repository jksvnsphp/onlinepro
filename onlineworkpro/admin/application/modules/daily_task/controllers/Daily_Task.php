<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daily_Task extends MY_Controller {  
	
	function __construct(){
        parent::__construct();
		$this->load->model('DailyTask_model','daily_task'); 
    }	

	public function index()
	{		
		$data['Title']="Daily Task";	
		$data['daily_task'] = $this->daily_task->getDailyTask();
		$this->load->view('index',$data);
	}
	
	//create function for add new daily task -------	
	public function add()
	{	
		$data['user'] = $this->daily_task->getAllUser();
		$data['plan'] = $this->daily_task->getAllPlan();
		$data['task'] = $this->daily_task->getAllTask();
		$this->form_validation->set_rules('user_id', 'User', 'trim|required');
        $this->form_validation->set_rules('plan_id', 'Plan', 'trim|required');
		$this->form_validation->set_rules('task_id', 'Task', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == true)
		{				
			$result = $this->daily_task->insert();
			
			if($result == 1){
				$msg = "Information added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('daily_task');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('daily_task');
			}	
		}	
		$data['Title']="Add Daily Task Detail";	
		$this->load->view('add',$data);
	}
	

	//create function for edit task --------	
	public function edit($id)
	{
		$data['daily_task'] = $this->daily_task->getDailyTaskById($id);		
		$data['user'] = $this->daily_task->getAllUser();
		$data['plan'] = $this->daily_task->getAllPlan();
		$data['task'] = $this->daily_task->getAllTask();
		$this->form_validation->set_rules('user_id', 'User', 'trim|required');
        $this->form_validation->set_rules('plan_id', 'Plan', 'trim|required');
		$this->form_validation->set_rules('task_id', 'Task', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == true)
		{			
			$result = $this->daily_task->update($id);
			
			if($result == 1){
				$msg = "Update Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('daily_task');
			}
			else{
				$msg = "Error in editing!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('daily_task');
			}	
        }
		$data['Title']="Edit Daily Task Detail";	
		$this->load->view('edit',$data );
	}
	
	
	//create function for delete task -----
	public function delete($id)
	{
		$result = $this->daily_task->delete($id);
		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('daily_task');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('daily_task');		
		}
	}	
	
}
