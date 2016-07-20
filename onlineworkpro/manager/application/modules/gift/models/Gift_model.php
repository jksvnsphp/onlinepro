<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gift_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	
	
	public function getgift()
	{	$resID=$this->session->userdata('ResID');
		$this->db->select("co.*,ho.hotal_name,res.restaurant_name");
		$this->db->from(GIFT." as co");
		$this->db->join(Hotal." as ho", "ho.id = co.Hotel_List");
		$this->db->join(RESTAURANT." as res", "res.id = co.Restaurant_List");
		$this->db->where("co.Restaurant_List='".$resID."'");
		$this->db->order_by("co.id","DESC");
		$query = $this->db->get();
		return $query->result_array();	
	}
	
	/*public function getgift()
	{		
			$this->db->where('is_deleted', 0);
			$this->db->order_by('id','desc');
			$query = $this->db->get(GIFT);
			return $query->result_array();
	}
	*/
		//for Restaurant drop down menu
	public function save($id){
		$this->db->where('hotal_id' , $id);
		$query = $this->db->get(RESTAURANT);
		return $query->result_array();
	}	
	
	//create function for get state ---------	
	public function gethotel(){	
	    $this->db->select('*');
		$this->db->where("is_deleted='0'");
		$query = $this->db->get(Hotal);
		return $query->result_array();
	}
	
	
	function getgiftById($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get(GIFT);
		return $query->row_array();
	}
	
	
	public function update($data, $id)
	{	
		$this->db->where('id', $id);
		$res =  $this->db->update(GIFT , $data); 
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
		//$data['is_deleted']=1;
		$res =  $this->db->delete(GIFT);		
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
		$gallery_path = './../upload/profile/';			
		$config = array(
			'upload_path' => $gallery_path,
			'allowed_types' => 'gif|jpg|png|jpeg',
			'max_size' => '1000000',
			'remove_spaces' => true,
		);	

		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload()){
			$image_data = $this->upload->data();
			return $image_data;
		}
		else{
			$image_data = $this->upload->data();
			return $image_data;
		}
	}		
	
	
	
}	
