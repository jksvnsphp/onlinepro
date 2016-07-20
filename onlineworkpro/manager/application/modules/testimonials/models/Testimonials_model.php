<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Testimonials_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	

//create function for get all blog --------
	
	
   public function gethotel(){	
        $this->db->select('*');
		$this->db->where("is_active='1'");
		$query = $this->db->get(Hotal);
		return $query->result_array();
	}
	
	public function getResHotel($id){
		$this->db->select('*');
		$this->db->where('hotal_id' , $id);
		$query = $this->db->get(RESTAURANT);
		return $query->result_array();
	}	
	
	
//create function for get all blog testimonials--------
	public function getTestimonials(){
		
	         $sql="SELECT tst.*,res.restaurant_name
			  FROM ".TESTIMONIALS."  as tst	
			  join 	".RESTAURANT." as res on res.id=tst.Restaurant_List   
			  order by  tst.id desc";	  
		$query = $this->db->query($sql);
		return $query->result_array();
	}	
	
	
//create function for  get blog by id --------	
	public function getTestimonialsById($id){	
		$this->db->where('id', $id);
		$query = $this->db->get(TESTIMONIALS);
		return $query->row_array();
	}	
	

//create function for update blog ----------	
	public function update($data, $id){
		$this->db->where('id', $id);
		$res =  $this->db->update(TESTIMONIALS, $data); 
		if($res ){
		  return true;
		}
		else{
			return false;
		}
	}		
	
	
//create function delete blog --------
	public function delete($id){
		$this->db->where('id',$id);		
		$query = $this->db->delete(TESTIMONIALS);
		
		if($query){
			return true;
		}else{
			return false;
		}
	} 	

	
}	
