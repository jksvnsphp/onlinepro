<?php $this->load->view("header");?>

<?php $this->load->view("navigation");?>


<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('city'); ?>"><i class="fa fa-backward"></i> City</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Add New City</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Add New City</h3></div>
	

<form action="<?php echo site_url('city/add'); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">	
<div class="box-body">
	<div class="form-group">
	<label class="col-md-2 control-label">City</label>
	<div class="col-md-7">	
	<input type="text" name="city" id="city" value="<?php echo set_value('city'); ?>"    required  class="form-control" placeholder="Enter city">
	<?php echo form_error('city'); ?>	
	</div>
	</div>	
</div>




	<div class="form-group">
	<label class="col-md-2 control-label">State</label>
	<div class="col-md-7">		
	<select name="state_id" id="state_id" class="form-control" required>
		<option value="">Select State</option>
		<?php foreach($state as $st){ ?>
		<option value="<?php echo $st['id']; ?>"><?php echo $st['state']; ?></option>
		<?php }?>
	</select>
	<?php echo form_error('state_id'); ?>
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

