<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model {
	
    public function __construct() {
        parent::__construct();
       
    }	

//create function for get all blog --------
	public function getBlog(){		
		$this->db->select('*');
		$this->db->where('is_deleted',0);	
		$this->db->where('is_active',1);
		
		$query = $this->db->get(BLOGS);
		return $query->result_array();		
	}	
	

//create function for get all blog comment--------
	public function getComment(){
/*		$this->db->select('cmt.*, bg.title');
		$this->db->from('blog_comment as cmt');
		$this->db->join('blogs as bg', 'cmt.blog_id = bg.id');
		$this->db->where('cmt.is_deleted',0);	
		$query = $this->db->get();
		return $query->result_array();		
*/

		$sql="SELECT cmt.*, bg.title  
			  FROM ".BLOG_COMMENT."  as cmt
		      INNER JOIN ".BLOGS." as bg on cmt.blog_id = bg.id
			  WHERE cmt.is_deleted='0'  order by  cmt.id desc";	  
		$query = $this->db->query($sql);
		return $query->result_array();
	}	
	
	
//create function for  get blog by id --------	
	public function getCommentById($id){	
		$this->db->where('id', $id);
		$query = $this->db->get(BLOG_COMMENT);
		return $query->row_array();
	}	
	

//create function for update blog ----------	
	public function update($data, $id){
		$this->db->where('id', $id);
		$res =  $this->db->update(BLOG_COMMENT, $data); 
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
		$data['is_deleted'] = 1;
		$query = $this->db->update(BLOG_COMMENT,$data);
		
		if($query){
			return true;
		}else{
			return false;
		}
	} 	

	
}	
