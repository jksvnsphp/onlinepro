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
	
	public function getMenu(){		
		$this->db->select('*');
		$this->db->where('is_deleted',0);	
		$this->db->where('is_active',1);	
		$this->db->order_by('id','desc');	
		$query = $this->db->get(MENU);
		return $query->result_array();		
	}	
	
	
	//create function for get state ---------	
	public function getState(){	
	    $this->db->select('*');
		$this->db->where("is_deleted='0'");
		$this->db->where("is_active='1'");
		$query = $this->db->get(STATES);
		return $query->result_array();
	}
	
	public function getRegion(){		
		$this->db->select('*');
		$this->db->where('is_deleted',0);	
		$this->db->where('is_active',1);	
		$this->db->group_by('Group_name','desc');	
		$query = $this->db->get(GROUP);
		return $query->result_array();		
	}	
	
	public function AllCity(){
		$this->db->select('*');	
		$this->db->where("is_deleted='0'");
		$this->db->where("is_active='1'");
		$query = $this->db->get(CITIES);
		return $query->result_array();
	}
	
	/**************************End add form data*******************************************/

   /**************************start edit form data*******************************************/
	   //for city drop down City
	public function getCity($resstateId){
		$this->db->select('*');
		$this->db->where('state_id',$resstateId);
		$this->db->where("is_deleted='0'");
		$this->db->where("is_active='1'");
		$query = $this->db->get(CITIES);
		return $query->result_array();
	}
	
	
	 //for edit area drop down area
	public function getArea($rescityID){
		$this->db->select('*');
		$this->db->where('city_id' , $rescityID);
		$this->db->where("is_deleted='0'");
		$this->db->where("is_active='1'");
		$query = $this->db->get(AREA);
		return $query->result_array();
	}
	
		 //for edit area drop down area
	public function getfetchhotal($rescityID){
		$this->db->select('*');
		$this->db->where('City' , $rescityID);
		$this->db->where("is_deleted='0'");
		$this->db->where("is_active='1'");
		$query = $this->db->get(Hotal);
		return $query->result_array();
	}
	
	function getrestaurantById($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get(RESTAURANT);
		return $query->row_array();
	}

	
	/**************************End edit form data*******************************************/
	
	public function getrestaurant()
	{	$Resid = $this->session->userdata('ResID');	
		$this->db->select("res.*,ht.hotal_name");
		$this->db->from(RESTAURANT." as res");
		$this->db->join(Hotal." as ht", "ht.id = res.hotal_id");		
		$this->db->where("res.id='".$Resid."'");
		$this->db->order_by("res.id","DESC");
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	
	/************************Fetch Restaurant Time  section************************************/
	function getResTimebyID($id)
	{   $this->db->select("*");
		$this->db->where('rest_id', $id);
		$query = $this->db->get(RESTIME);		
		return $query->row_array();
	}
	
	/************************End Restaurant Time  section************************************/
	
	/************************Fetch Restaurant menu  section************************************/
	function RestMenubyID($id)
	{   $this->db->select("*");
		$this->db->where('restaurant_id', $id);
		$query = $this->db->get(RESTAURANT_MENU);		
		return $query->result_array();
	}
	/************************End Restaurant menu  section************************************/
	
	/************************Fetch  menu image when delete Restaurant section************************************/
	function getMenubyID($id)
	{   $this->db->select("*");
		$this->db->where('Res_id', $id);
		$query = $this->db->get(RESTMENU);		
		return $query->result_array();
	}
	/************************End Restaurant menu image  section************************************/
	
	/************************Fetch  Gallery image when delete Restaurant section************************************/
	function getgallerybyID($id)
	{   $this->db->select("*");
		$this->db->where('Res_id', $id);
		$query = $this->db->get(GALLERY);		
		return $query->result_array();
	}
	/************************End  Gallery image when delete Restaurant section************************************/
	
	
	/************************Update Restaurant  section************************************/
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
	
	/************************End Update Restaurant  section************************************/
	
	/************************delete Restaurant  section************************************/
	public function delete( $id)
	{	$this->db->where('Res_id', $id);		
	    $res1 =  $this->db->delete(RESTMENU);
		
		$this->db->where('restaurant_id', $id);		
	    $res4 =  $this->db->delete(RESTAURANT_MENU);
		
		$this->db->where('Res_id', $id);		
		$res2 =  $this->db->delete(GALLERY);	
		
		$this->db->where('rest_id', $id);		
	    $res3 =  $this->db->delete(RESTIME);			
	   
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
	
	/************************End delete Restaurant  section************************************/
	
	/************************delete Time when Edit  section***********************************************/
	public function deletResTime( $id)
	{	$this->db->where('rest_id', $id);		
	    $res =  $this->db->delete(RESTIME);		
	   	
		if($res )
		{
		  return true;
		}
		else
		{
			return false;
		}
	   	
	}
	 
	 /************************End delete Time  section************************************/
	
	/************************delete menu when Edit section************************************/
	
	public function deletemenu( $id)
	{	$this->db->where('restaurant_id', $id);		
	    $res =  $this->db->delete(RESTAURANT_MENU);		
	   	
		if($res )
		{
		  return true;
		}
		else
		{
			return false;
		}
	   	
	}
	/************************End delete menu  section************************************/
	
	/************************upload logo  section************************************/
	public function do_upload(){
		$gallery_path ="";
		$gallery_path = './../upload/restaurant/' ;			
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
