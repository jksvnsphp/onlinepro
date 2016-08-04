<?php $this->load->view("header");?>

<?php $this->load->view("navigation");?>

<div class="content-wrapper" style="min-height: 916px;">
	<section class="content-header">
	<a class="btn btn-primary" href="<?php echo site_url('invoice'); ?>"><i class="fa fa-backward"></i>Back To Invoice</a>
		<ol class="breadcrumb">
		<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Add Invoice Details</li>
		</ol>
	</section>
	
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<?php echo $this->session->flashdata('message'); ?>	
				<div class="box box-primary">
					<div class="box-header with-border"><h3 class="box-title">Add Invoice Details</h3></div>
						<form action="<?php echo site_url('invoice/add'); ?>" method="post" role="form" class="form-horizontal" >	
							<div class="box-body">
								<div class="form-group">
								<label class="col-md-2 control-label">User</label>
									<div class="col-md-7">	
										<select class="form-control" name="user_id" id="user_id" >
											<option value="">--Select User--</option>
											<?php
											foreach($user as $man)
											{ 
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
								<label class="col-md-2 control-label">Amount</label>
									<div class="col-md-7">	
									<input type="text" name="amount" id="amount" value="<?php echo set_value('amount'); ?>"     class="form-control" placeholder="Enter Amount">
									<?php echo form_error('amount'); ?>	
									</div>
								</div>	
							</div>
							
							<div class="box-body">
								<div class="form-group">
								<label class="col-md-2 control-label">Acknowledment</label>
									<div class="col-md-7">	
									<input type="text" name="acknowledment" id="acknowledment" value="<?php echo set_value('acknowledment'); ?>"     class="form-control" placeholder="Enter Acknowledment">
									<?php echo form_error('acknowledment'); ?>	
									</div>
								</div>	
							</div>
							
							<div class="box-body">
								<div class="form-group">
								<label class="col-md-2 control-label">Transaction Id</label>
									<div class="col-md-7">	
									<input type="text" name="transaction_id" id="transaction_id" value="<?php echo set_value('transaction_id'); ?>"     class="form-control" placeholder="Enter Transaction Id">
									<?php echo form_error('transaction_id'); ?>	
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

