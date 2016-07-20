<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Controller {
	
	function __construct(){
        parent::__construct();
		$this->load->model('Order_model'); 
    }	

	public function index(){
		$data['allorder'] = $this->Order_model->getOrder();
		$this->load->view('index',$data);
	}
	

//create function for add new order -------	
	public function add(){
		$data['allhall'] = $this->Order_model->getHall();
		$data['allnegotiation'] = $this->Order_model->getNegotiation();
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
		$this->form_validation->set_rules('schdule_visit_date', 'Schdule Visit Date', 'trim|required');
		$this->form_validation->set_rules('bid_price', 'Price', 'trim|required');
		$this->form_validation->set_rules('negotiation_id', 'Negotiation', 'trim|required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
		$id = getAutoIncreament(ORDER);		     

        if ($this->form_validation->run() == true) {	
			
			$data = array(
				'transaction_id' => TransactionId('TRA',$id),	
				'hall_id' => $this->input->post('hall_id'),
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'phone_number' => $this->input->post('phone_number'),
				'schdule_visit_date' => $this->input->post('schdule_visit_date'),
				'bid_price' => $this->input->post('bid_price'),
				'negotiation_id' => $this->input->post('negotiation_id'),
				'additional_information' => $this->input->post('additional_information'),
				'order_date' => date('Y-m-d'),
				'ip_address' => $this->input->ip_address(),
				'created_at'=>date("Y-m-d H:i:s")	,	
				'created_by'=>$this->session->userdata('id')					
			);
		
			$result = $this->db->insert(ORDER,$data);
			
			if($result){
				$msg = "Order added Sucessfully!!!";
				$this->session->set_flashdata('message',alert('success',$msg));				
				redirect('order');
			}
			else{
				$msg = "Error in adding!!!";
				$this->session->set_flashdata('message',alert('danger',$msg));	  
				redirect('order');
			}	
		}	
		$this->load->view('add',$data);
	}
	

//create function for view order --------	
	public function view($id){
		$data['order'] = $this->Order_model->getOrderById($id);
		$data['order_date'] = $this->Order_model->getOrderEventDate($id);
		//print_r($data['order_date']);
		$this->load->view('view',$data );
	}
	
	
	function getstatus()
	{
		$order_id = $this->input->post('order_id');
		$status_id = $this->input->post('status_id');
		
		$status_data = $this->Order_model->getStatus();
		
		$sty= '<select name="status" onchange="changeStaus(this.value,'.$order_id.')">';
		foreach($status_data as $st)
		{
			if($status_id==$st['id'])
			{
				$select='selected="selected"';
			}
			else
			{
				$select='';
			}
			
			$sty.= '<option '.$select.' value="'.$st['id'].'">'.$st['status'].'</option>';
		}
		
		$sty.= '</select>';
		
		echo $sty;
		
	}
	
	function changestatus()
	{
		$order_id = $this->input->post('order_id');
		$status_id = $this->input->post('status_id');
		$data = array(				'id' => $order_id,					'order_status_id' => $status_id );
	
		$this->db->where('id',$order_id);
		$query = $this->db->update(ORDER,$data);
		
		
		//send mail for update order
		 $this->Order_model->orderDetailsSendmailToVendor($order_id);
		 $this->Order_model->orderDetailsSendmailToUser($order_id   ,    $status_id   );
		 $this->Order_model->orderDetailsSendmailToAdmin($order_id);
		
		$result = $this->Order_model->getStatusById($status_id);
		?>
		<a onclick="getStatus('<?php echo $order_id; ?>', '<?php echo $status_id; ?>'  )"><?php echo $result['status']; ?></a>
		<?php 
	}
	
	
	
//create function for delete order -----
	public function delete($id){
		$result = $this->Order_model->delete($id);
		
		if($result){
			$msg = "Deleted Successfully!!!";
			$this->session->set_flashdata('message',alert('success',$msg));
			redirect('order');
		}else{
			$msg = "Error in Deletion!!!";
			$this->session->set_flashdata('message',alert('danger',$msg));
			redirect('order');		
		}
	}	
	
}
