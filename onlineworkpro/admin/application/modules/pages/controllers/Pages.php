<?php

class Pages extends Admin_Controller
{
	public function __construct(){
		parent::__construct();
        $this->load->model('Page_model');
        $this->data['content_language_id'] = $this->Language_model->get_content_lang();
	}
    
    public function index()
	{
	    // Fetch all pages
        $this->data['page_languages'] = $this->Language_model->get_form_dropdown('language');
        $this->data['pages_nested'] = $this->Page_model->get_nested_tree($this->data['content_language_id']);
        // Load view
        $this->load->view('index', $this->data);
	}
    
    public function order(){
		$this->data['sortable'] = TRUE;
        $this->load->view('order', $this->data);
    }
    
    public function update_ajax($filename = NULL)
    {
        // Save order from ajax call
        if(isset($_POST['sortable']) && $this->config->item('app_type') != 'demo'){
            $this->Page_model->save_order($_POST['sortable']);
        }
        $data = array();
        $length = strlen(json_encode($data));
        header('Content-Type: application/json; charset=utf8');
        header('Content-Length: '.$length);
        echo json_encode($data);
        exit();
    }
    
    public function edit($id = NULL){
	    // Fetch a page or set a new one
	    if($id){
            $this->data['page'] = $this->Page_model->get_lang($id, FALSE, $this->data['content_language_id']);
            count($this->data['page']) || $this->data['errors'][] = 'User could not be found';
        }
        else{
            $this->data['page'] = $this->Page_model->get_new();
        }
		// Pages for dropdown
        //$this->data['pages_no_parents'] = $this->Page_model->get_no_parents($this->data['content_language_id']);
        $this->data['pages_no_parents'] = $this->Page_model->get_no_parents_news($this->data['content_language_id'], 'No parent');
        $this->data['page_languages'] = $this->Language_model->get_form_dropdown('language');
        $this->data['templates_page'] = $this->Page_model->get_templates('page_');
		
        // Set up the form
        $rules = $this->Page_model->rules;
        $this->form_validation->set_rules($this->Page_model->get_all_rules());
        // Process the form
        if($this->form_validation->run() == TRUE) {
            if($this->config->item('app_type') == 'demo'){
                $this->session->set_flashdata('msg', alert('error',lang('Data editing disabled in demo')));
                redirect('admin/pages/edit/'.$id);
                exit();
            }
            
            $fields = array('type', 'template','parent_id', 'is_visible', 'display_on_menu', 'is_private');
			$data = array();
			
			foreach($fields as $field){
				$val = $this->input->post($field);
				if ($field == 'display_on_menu'){
					if (count($this->input->post($field))>0){
						$val = '|'.implode('|',$this->input->post($field)).'|';
					}
				}
				$data[$field] = $val;
			}
            if($id == NULL){
                //get max order in parent id and set
                $parent_id = $this->input->post('parent_id');
                $data['order'] = $this->Page_model->max_order($parent_id);
            }

            $data_lang = $this->Page_model->array_from_post($this->Page_model->get_lang_post_fields());
            if($id == NULL){
                $data['date'] = date('Y-m-d H:i:s');
                $data['date_publish'] = date('Y-m-d H:i:s');
            }
                
            
            $id = $this->Page_model->save_with_lang($data, $data_lang, $id);
            //$this->generate_sitemap();
            $this->session->set_flashdata('msg',alert('success',lang('Changes saved')));
            redirect('admin/pages/edit/'.$id);
        }
        // Load the view
        $this->load->view('edit', $this->data);
	}
    
    public function delete($id)
	{
        if($this->config->item('app_type') == 'demo') {
            $this->session->set_flashdata('msg',alert('error',lang('Data editing disabled in demo')));
            redirect('admin/pages');
            exit();
        }
       
		$this->Page_model->delete($id);
        redirect('admin/pages');
	}
    
	public function parent_check($parent_id)
	{
	    if($parent_id==0 || $this->input->post('type') == 'ARTICLE')
            return TRUE;
            
        $page_parent = $this->Page_model->get($parent_id);
        if($page_parent->parent_id == 0){
            return TRUE;
        }
    	$this->form_validation->set_message('parent_check', lang('Just 2 page levels allowed'));
    	return FALSE;
	}
    
    public function _unique_slug($str)
    {
        // Do NOT validate if slug alredy exists
        // UNLESS it's the slug for the current page
        $id = $this->uri->segment(4);
        $this->db->where('slug', $this->input->post('slug'));
        !$id || $this->db->where('id !=', $id);
        $page = $this->Page_model->get();
        if(count($page)){
            $this->form_validation->set_message('_unique_slug', '%s should be unique');
            return FALSE;
        }
        return TRUE;
    }
    
}