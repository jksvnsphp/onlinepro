<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>

<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>

<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('order'); ?>"><i class="fa fa-backward"></i> Order</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active"> Order</li>
</ol>
</section>
	
<section class="content">
<div class="row">

<section class="invoice" id="printmail">
<div class="row">
	<div class="col-xs-12">
	<h2 class="page-header">
	<?php if($this->Common_model->getDetails("SITE_LOGO")){ ?>	
	<img src="<?php echo SITE_URL; ?>upload/setting/<?php echo $this->Common_model->getDetails("SITE_LOGO"); ?>" width="105" >
	<?php }else{?>	
	<img src="<?php echo SITE_URL; ?>upload/setting/no-image.jpg" width="105" >
	<?php }?>	
	<small class="pull-right">Order Date: <?php echo      date("F j, Y", strtotime( $order['order_date'] ))  ;          ?></small>
	</h2>
	</div>
</div>

<div class="row invoice-info">
	

	<div class="col-sm-4 invoice-col">
	<strong>Hall Details   </strong>
	<address>
	Hall Name: <?php          echo $order['hall_name']; ?><br>
	Vendor Name: <?php if($order['vendor_name']==''){echo $order['username'];}else{  echo $order['vendor_name'];   } ?>
	</address>
	</div>

	<div class="col-sm-4 invoice-col">
	<b>Order ID:</b> <?php echo $order['transaction_id']; ?><br>
	<b>Order Status:</b> <?php echo $order['status']; ?><br>
	<b>Hall Price:</b> <?php echo $order['bid_price']; ?>₦<br>
	
	</div>
</div>


<div class="row">
	<div class="col-xs-12 table-responsive">    <b>Order From</b>
	<table class="table table-striped">
	<thead>
		<tr>
		<th>Name</th>
		<th>Email</th>
		<th>PH.No:</th>
		<th>Bid Price</th>
		<th>Schedule visit date</th>
		</tr>
	</thead>
	
	<tbody>
		<tr>
		<td><?php echo $order['name']; ?></td>
		<td><?php echo $order['email']; ?></td>
		<td><?php echo $order['phone_number']; ?></td>
		<td><?php echo $order['bid_price']; ?>₦</td>
		<td><?php echo   date("F j, Y", strtotime( $order['schdule_visit_date'] ))  ;       ?></td>
		</tr>
	</tbody>
	</table>
	</div>
</div>



<div class="row">
	<div class="col-xs-6">
	<p class="lead">Event Date :</p>
	<p class="text-muted well well-sm no-shadow"><?php  echo  date("F j, Y", strtotime( $order_date['start_date'] ))  ;            ?> : <?php  echo   date("F j, Y", strtotime( $order_date['end_date'] ))         ?> </p>
	</div>
	
	
</div>









<div class="row">
	<div class="col-xs-6">
	<p class="lead">Additional Comment :</p>
	<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;min-height:140px;"><?php  echo $order['additional_information']; ?></p>
	</div>
	
	
</div>


<div class="row no-print">
<div class="col-xs-12">
<a href="" target="_blank" class="btn btn-default" onclick="printContent('printmail')"><i class="fa fa-print"></i> Print</a>
</div>
</div>
</section>

</div>
</section>  
</div>

<?php $this->load->view("footer"); ?>

