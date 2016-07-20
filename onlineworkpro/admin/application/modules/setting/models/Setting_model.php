<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Setting_model extends CI_Model 
{
	
    public function __construct() {
        parent::__construct();
       
    }	

	public function getValue($name)
	{
		$this->db->select('value');
		$this->db->where('name',$name);
		$query = $this->db->get(SETTING)->row_array();;
		return $query['value'];
	}
	
//create function for update website details ------	
	public function update($uploaddata,$key)
	{	//print_r($uploaddata);
		$res =$this->db->query("UPDATE ".SETTING." SET value='".$uploaddata."' WHERE name='".$key."'");	
		//echo $this->db->last_query();die;
		if($res )
		{
		  return true;
		}
		else
		{
			return false;
		}
	}
	
	
	public function uploadfile($name)
	{
		$gallery_path = './../upload/setting/';			
		$config = array(
			'upload_path' => $gallery_path,
		   'allowed_types' => 'gif|jpg|png',
		   'max_size' => '1000000000',
		   'remove_spaces' => true,
		  ); 
		
		  $this->load->library('upload', $config);
		  
		  if ($this->upload->do_upload($name)){
				$image_data = $this->upload->data();
			   return $image_data;
		  }
		  else{
				$image_data = $this->upload->data();
				return $image_data;
		  }
	 }	
	
	
	
	 public function checkunsubscribedhall($num_of_day){
		 $sql ="  SELECT  id , plan_end_date FROM ".HALL."  WHERE  plan_expired='1'   and  is_deleted='0' and  crowed_hall='0'    " ; 
		$result = $this->db->query($sql)->result_array();
		
	    foreach($result as $res)
	    {
			$data = array(  'plan_end_date' => date('Y-m-d', strtotime("+".$num_of_day." days"))	);
			$this->db->where('id', $res['id']);
			$res =  $this->db->update(HALL, $data);
			//echo $this->db->last_query();	
		}
		
		return true;
		
	}	
	
	
	
	
	
	
	
}	
