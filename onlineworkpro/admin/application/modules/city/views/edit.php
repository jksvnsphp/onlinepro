<?php $this->load->view("header");?>

<?php $this->load->view("navigation");?>


<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('city'); ?>"><i class="fa fa-backward"></i> City</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Edit City</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Edit City</h3></div>
	

<form action="<?php echo site_url('city/edit/'.$city_id['id']); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">		
<div class="box-body">
	<div class="form-group">
	<label class="col-md-2 control-label">City</label>
	<div class="col-md-7">	
	<input type="text" name="city" id="city" value="<?php echo $city_id['city']; ?>"  required    class="form-control" placeholder="Enter State">
	<?php echo form_error('city'); ?>	
	</div>
	</div>
	
	
	<div class="form-group">
	<label class="col-md-2 control-label">State</label>
	<div class="col-md-7">		
	<select name="state_id" id="state_id" class="form-control" required>
		<option value="">Select State</option>
		<?php foreach($state as $st){ ?>
		<option  <?php  if($city_id['state_id']==$st['id']){ echo 'selected="selected"';  }else{  } ?>   value="<?php echo $st['id']; ?>"><?php echo $st['state']; ?></option>
		<?php }?>
	</select>
	<?php echo form_error('state_id'); ?>
	</div>
	</div>	
	

	<div class="form-group">
	<label class="col-md-2 control-label">Status</label>
	<div class="col-md-7">		
	<select name="is_active" id="is_active" class="form-control">
		<option <?php if($city_id['is_active'] == 1){ ?> selected <?php }?> value="1">Active</option>		
		<option <?php if($city_id['is_active'] == 0){ ?> selected <?php }?> value="0">In active</option>
	</select>
	<?php echo form_error('is_active'); ?>
	</div>
	</div>	
</div>

<div class="box-footer">
<button type="submit" class="btn btn-primary pull-right">Update</button>
</div>
</form>
</div>
		
</div><!-- /.col -->
</div><!-- /.row -->    
</section><!-- /.content -->   
</div>

<?php $this->load->view("footer"); ?>

