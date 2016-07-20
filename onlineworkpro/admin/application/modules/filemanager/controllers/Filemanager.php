<?php

class Filemanager extends Admin_Controller
{
	public function __construct(){
		parent::__construct();
        $this->data['content_language_id'] = $this->Language_model->get_content_lang();
	}
    
    public function index(){
        $this->load->view('index');
	}
}