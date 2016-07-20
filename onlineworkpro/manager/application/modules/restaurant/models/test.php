<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Restaurant_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }
	
/******************create function for get all Hotel ************/

/**************************start add form data*******************************************/
	public function getHotel(){		
		$this->db->select('*');
		$this->db->where('is_deleted',0);	
		$this->db->where('is_active',1);	
		$this->db->order_by('id','desc');	
		$query = $this->db->get(Hotal);
		return $query->result_array();		
	}	
	
		public function getCuisine(){		
		$this->db->select('*');
		$this->db->where('is_deleted',0);	
		$this->db->where('is_active',1);	
		$this->db->order_by('id','desc');	
		$query = $this->db->get(CUISINE);
		return $query->result_array();		
	}	
	
	public function getSeating(){		
		$this->db->select('*');
		$this->db->where('is_deleted',0);	
		$this->db->where('is_active',1);	
		$this->db->order_by('id','desc');	
		$query = $this->db->get(SEATING);
		return $query->result_array();		
	}	
	
	
	public function getFacilities(){		
		$this->db->select('*');
		$this->db->where('is_deleted',0);	
		$this->db->where('is_active',1);	
		$this->db->order_by('id','desc');	
		$query = $this->db->get(FACILITIES);
		return $query->result_array();		
	}	
	
	
	public function getTag(){		
		$this->db->select('*');
		$this->db->where('is_deleted',0);	
		$this->db->where('is_active',1);	
		$this->db->order_by('id','desc');	
		$query = $this->db->get(TAG);
		return $query->result_array();		
	}	
	

	
	public function getType(){		
		$this->db->select('*');
		$this->db->where('is_deleted',0);	
		$this->db->where('is_active',1);	
		$this->db->order_by('id','desc');	
		$query = $this->db->get(TYPE);
		return $query->result_array();		
	}	
	
	/**************************End add form data*******************************************/
	
	public function getrestaurant()
	{		
		$this->db->select("res.*,ht.hotal_name");
		$this->db->from(RESTAURANT." as res");
		$this->db->join(Hotal." as ht", "ht.id = res.hotal_id");
		$this->db->where("res.is_deleted='0'");
		$this->db->order_by("res.id","DESC");
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	
	function getrestaurantById($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get(RESTAURANT);
		return $query->row_array();
	}
	
	
	public function update($data, $id)
	{	
		$this->db->where('id', $id);
		$res =  $this->db->update(RESTAURANT , $data); 
		if($res )
		{
		  return true;
		}
		else
		{
			return false;
		}
	}
	
	public function delete( $id)
	{	
		$this->db->where('id', $id);		
		$res =  $this->db->delete(RESTAURANT);		
		if($res )
		{
		  return true;
		}
		else
		{
			return false;
		}
	
	}
	
	
//create function for file upload -------	
	public function do_upload(){ 	
		$gallery_path = './../upload/restaurant/';			 	
		$config = array(
			'upload_path' => $gallery_path,
			'allowed_types' => 'gif|jpg|png|jpeg',
			'max_size' => '1000000',
			'remove_spaces' => true,
		);	

		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('logo')){
			$image_data = $this->upload->data();			
			return $image_data;
		}
		else{
			$image_data = $this->upload->data();			
			return $image_data;
		}
	}		
	
	
	
}	
