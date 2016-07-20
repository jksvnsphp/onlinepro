<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>

<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('order'); ?>"><i class="fa fa-backward"></i> Order</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Add New Order</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Add New Order</h3></div>
	

<form action="<?php echo site_url('order/add'); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">	
<div class="box-body">
	<div class="form-group">
	<label class="col-md-2 control-label">Hall Name</label>
	<div class="col-md-7">		
	<select name="hall_id" id="hall_id" class="form-control">
		<?php foreach($allhall as $hall){ ?>	
		<option value="<?php echo $hall['id'] ?>"> <?php echo $hall['hall_name'] ?> </option>		
		<?php }?>
	</select>
	<?php echo form_error('hall_id'); ?>
	</div>
	</div>		

	<div class="form-group">
	<label class="col-md-2 control-label">Name</label>
	<div class="col-md-7">	
	<input type="text" name="name" id="name" value="<?php echo set_value('name'); ?>" class="form-control" placeholder="Enter name">
	<?php echo form_error('name'); ?>	
	</div>
	</div>	
	
	<div class="form-group">
	<label class="col-md-2 control-label">Email</label>
	<div class="col-md-7">	
	<input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Enter email">
	<?php echo form_error('email'); ?>	
	</div>
	</div>	
	
	<div class="form-group">
	<label class="col-md-2 control-label">Phone Number</label>
	<div class="col-md-7">	
	<input type="text" name="phone_number" id="phone_number" value="<?php echo set_value('phone_number'); ?>" class="form-control" placeholder="Enter phone number">
	<?php echo form_error('phone_number'); ?>	
	</div>
	</div>	
	
	<div class="form-group">
	<label class="col-md-2 control-label">Schdule Visit Date</label>
	<div class="col-md-7">	
	<div class="input-group"><div class="input-group-addon"><i class="fa fa-calendar"></i></div>		
	<input type="text" id="datepicker" name="schdule_visit_date" class="form-control" placeholder="Enter schdule visit date">
	</div>
	<?php echo form_error('schdule_visit_date'); ?>	
	</div>
	</div>	
	
	<div class="form-group">
	<label class="col-md-2 control-label">Price</label>
	<div class="col-md-7">	
	<input type="text" name="bid_price" id="bid_price" value="<?php echo set_value('bid_price'); ?>" class="form-control" placeholder="Enter price">
	<?php echo form_error('bid_price'); ?>	
	</div>
	</div>	
	
	<div class="form-group">
	<label class="col-md-2 control-label">Negotiation</label>
	<div class="col-md-7">	
	<select name="negotiation_id" id="negotiation_id" class="form-control">
		<?php foreach($allnegotiation as $negotiation){ ?>	
		<option value="<?php echo $negotiation['id'] ?>"> <?php echo $negotiation['negotiation'] ?> </option>		
		<?php }?>
	</select>
	<?php echo form_error('negotiation_id'); ?>	
	</div>
	</div>	
	
	<div class="form-group">
	<label class="col-md-2 control-label">Additional Information</label>
	<div class="col-md-7">	
	<textarea name="additional_information" id="additional_information" value="<?php echo set_value('additional_information'); ?>" class="form-control" placeholder="Enter additional information">
	</textarea>
	<?php echo form_error('additional_information'); ?>	
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

