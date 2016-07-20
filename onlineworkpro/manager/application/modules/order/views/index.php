<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>
<style>
#example1 th{font-size:11px;}

</style>


<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<!--<a class="btn btn-primary" href="<?php echo site_url('order/add'); ?>"><i class="fa fa-plus-circle"></i> Add New Order</a>-->
<h1>Order</h1>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active"> Order</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border">
	<h3 class="box-title">List of Order</h3>

	<div class="btn-group pull-right">
	<button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
	<ul class="dropdown-menu">
		<li><a href="#" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src='<?php echo base_url(); ?>common/icons/csv.png' width="24"/> CSV</a></li>
		<li><a href="#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='<?php echo base_url(); ?>common/icons/pdf.png' width="24"/> PDF</a></li>
		<li><a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='<?php echo base_url(); ?>common/icons/xls.png' width="24"/> XLS</a></li>
		<li class="divider"></li>
	</ul>
	</div>  	
</div>
	
<div class="box-body">
	<table id="customers2" class="table table-bordered table-striped">
	<thead>
		<tr>
		<th>S.No.</th>
		<th>Transaction ID </th>
		<th> Requester name</th>
		<th>Restaurant</th>
		<th>Event date</th>
		<th>Request date</th>
		<th>Order Status</th>
		<th>Operation</th>
		</tr>
	</thead>
	<tbody>	
		<?php
		$i = 1;
		foreach($allorder as $order){ 
		?>			
		<tr>
		<td width="8%" style="text-align: center;"><?php echo $i; ?></td>
		<td><?php echo $order['transaction_id']; ?></td>
		<td><?php echo $order['name']; ?></td>
		<td><?php echo $order['restaurant_name']; ?></td>
		<td><?php    $evnet_date = $this->Order_model->getOrderEventDate($order['id'])  ;  echo               date("Y/m/d", strtotime( $evnet_date['start_date'] ))." to ".date("Y/m/d", strtotime( $evnet_date['end_date'] )); ?>
		
		
		</td>
		<td><?php echo    date("Y/m/d", strtotime( $order['order_date'] ))       ; ?></td>
		<td id="ord<?php echo $order['id']; ?>"><a onclick="getStatus('<?php echo $order['id']; ?>', '<?php echo $order['order_status_id']; ?>'  )"><?php echo $order['status']; ?></a></td>
		<td>
			<a class="btn btn-success" href="<?php echo site_url('order/view/'.$order['id']); ?>"><i class="fa fa-edit"></i> View</a>  
			<a class="btn btn-danger" href="<?php echo site_url('order/delete/'.$order['id']); ?>" onclick="return confirm('Are you sure you want to delete')"><i class="fa fa-trash-o"></i> Delete</a>
		</td>
		</tr>   
		<?php $i++; }?>
	</tbody>
	</table>
</div>
</div>
	
	
</div><!-- /.col -->
</div><!-- /.row -->    
</section><!-- /.content -->   


<script type="text/javascript">
			function getStatus(order_id ,status_id)
			{
					$.ajax({
						url: "<?php echo site_url('order/getstatus'); ?>",
						type: "post",
						data: {order_id: order_id,status_id: status_id  },
						success: function(result) {
							$("#ord"+order_id).html(result);
						}
					});
					
			}
</script>
	

<script type="text/javascript">
			function changeStaus( status_id,order_id)
			{
					$.ajax({
						url: "<?php echo site_url('order/changestatus'); ?>",
						type: "post",
						data: {order_id: order_id,status_id: status_id  },
						success: function(result) {
							$("#ord"+order_id).html(result);
						}
					});
					
			}
</script>

</div>

<?php $this->load->view("footer"); ?>

