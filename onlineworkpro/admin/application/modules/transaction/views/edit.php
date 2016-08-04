<?php $this->load->view("header");?>

<?php $this->load->view("navigation");?>

<link href="<?php echo base_url('common/js/build/jquery.datetimepicker.css');?>" rel="stylesheet" type="text/css" />
<div class="content-wrapper" style="min-height: 916px;">
	<section class="content-header">
	<a class="btn btn-primary" href="<?php echo site_url('transaction'); ?>"><i class="fa fa-backward"></i>Back To Transaction</a>
		<ol class="breadcrumb">
		<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Edit New Transaction</li>
		</ol>
	</section>
	
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<?php echo $this->session->flashdata('message'); ?>	
				<div class="box box-primary">
					<div class="box-header with-border"><h3 class="box-title">Edit New Transaction</h3></div>
						<form action="<?php echo site_url('transaction/edit'); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">	
							<input type="hidden" name="transaction_id" id="transaction_id" value="<?php echo $transaction['transaction_id']; ?>" />
							<div class="box-body">
								<div class="form-group">
								<label class="col-md-2 control-label">User</label>

									<div class="col-md-7">	
										<select class="form-control" name="user_id" id="user_id" >
											<option value="">--Select User--</option>
											<?php
											foreach($user as $man) 
											{ 
												if($transaction['user_id'] == $man['user_id'])
													echo "<option  selected='selected'  value='".$man['user_id']."'>".$man['name']."</option>";
												else
													echo "<option value='".$man['user_id']."'>".$man['name']."</option>";
											} 
											?>
										</select>
									<?php echo form_error('user_id'); ?>	
									</div>
								</div>	
							</div>
							
							<div class="box-body">
								<div class="form-group">
								<label class="col-md-2 control-label">Invoice Id</label>
									<div class="col-md-7">	
										<select class="form-control" name="invoice_id" id="invoice_id" >
											<option value="">--Select Invoice--</option>
											<?php
											foreach($invoice as $man)
											{	
												if($transaction['invoice_id'] == $man['invoice_id'])
													echo "<option selected='selected' value='".$man['invoice_id']."'>".$man['invoice_id']."</option>";
												else
													echo "<option value='".$man['invoice_id']."'>".$man['invoice_id']."</option>";
											} 
											?>
										</select>
									<?php echo form_error('user_id'); ?>	
									</div>
								</div>	
							</div>
							
							<div class="box-body">
								<div class="form-group">
								<label class="col-md-2 control-label">TDS</label>
									<div class="col-md-7">	
									<input type="text" name="tds" id="tds" value="<?php echo $transaction['tds']; ?>"  class="form-control" placeholder="Enter TDS">
									<?php echo form_error('tds'); ?>	
									</div>
								</div>	
							</div>
							
							<div class="box-body">
								<div class="form-group">
								<label class="col-md-2 control-label">NEFT No.</label>
									<div class="col-md-7">	
									<input type="text" name="neft_nubber" id="neft_nubber" value="<?php echo $transaction['neft_nubber']; ?>"  class="form-control" placeholder="Enter NEFT No.">
									<?php echo form_error('neft_nubber'); ?>	
									</div>
								</div>	
							</div>
							
							<div class="box-body">
								<div class="form-group">
								<label class="col-md-2 control-label">Amount</label>
									<div class="col-md-7">	
									<input type="text" name="amount" id="amount" value="<?php echo $transaction['amount']; ?>"  class="form-control" placeholder="Enter Amount" />
									<?php echo form_error('amount'); ?>	
									</div>
								</div>	
							</div>
							
							<div class="box-body">
								<div class="form-group">
								<label class="col-md-2 control-label">Net Amount</label>
									<div class="col-md-7">	
									<input type="text" name="net_amount" id="net_amount" value="<?php echo $transaction['net_amount']; ?>"  class="form-control" placeholder="Enter Net Amount" />
									<?php echo form_error('net_amount'); ?>	
									</div>
								</div>	
							</div>
							
							<div class="box-body">
								<div class="form-group">
								<label class="col-md-2 control-label">Transfer Date</label>
									<div class="col-md-7">	
									<input type="text" class="form-control" id="datetimepicker" value="<?php echo $transaction['transaction_date']; ?>"  name="transaction_date" placeholder="Choose Transfer Date"/>
									<?php echo form_error('transaction_date'); ?>	
									</div>
								</div>	
							</div>
							
							<div class="box-body">
								<div class="form-group">
								<label class="col-md-2 control-label">Admin Charge</label>
									<div class="col-md-7">	
									<input type="text" class="form-control" id="admin_charge" value="<?php echo $transaction['admin_charge']; ?>"  name="admin_charge" placeholder="Enter Admin Charge"/>
									<?php echo form_error('admin_charge'); ?>	
									</div>
								</div>	
							</div>
							
							<div class="box-footer">
								<button type="submit" class="btn btn-primary pull-right">Submit</button>
							</div>
						</form>					
				</div>	
			</div><!-- /.col -->
		</div><!-- /.row -->    
	</section><!-- /.content -->   
</div>

<?php $this->load->view("footer"); ?>
<script type="text/javascript" src="<?php echo base_url('common/js/jquery.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('common/js/build/jquery.datetimepicker.full.js');?>"></script>
<script>
$('#datetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
timepicker:true,
//format:'Y-m-d H:i:s' ,
startDate:	new Date() 
});
</script>
