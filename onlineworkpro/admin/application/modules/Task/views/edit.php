<?php $this->load->view("header");?>

<?php $this->load->view("navigation");?>


<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('task'); ?>"><i class="fa fa-backward"></i> Task</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Edit Task</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Edit Task</h3></div>
	

<form action="<?php echo site_url('task/edit/'.$state_id['task_id']); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">		
<div class="box-body">
	<div class="form-group">
	<label class="col-md-2 control-label">Page Title</label>
	<div class="col-md-7">	
	<input type="text" name="page_title" id="state" value="<?php echo $state_id['page_title']; ?>"     class="form-control" placeholder="Enter State">
	<?php echo form_error('page_title'); ?>	
	</div>
	</div>
	
	
	<div class="form-group">
	<label class="col-md-2 control-label">Page Link</label>
	<div class="col-md-7">	
	<input type="text" name="page_link" id="state" value="<?php echo $state_id['page_link']; ?>"     class="form-control" placeholder="Enter Page link">
	<?php echo form_error('page_link'); ?>	
	</div>
	</div>

	<div class="form-group">
	<label class="col-md-2 control-label">Status</label>
	<div class="col-md-7">		
	<select name="is_active" id="is_active" class="form-control">
		<option <?php if($state_id['is_active'] == 'Active'){ ?> selected <?php }?> value="1">Active</option>		
		<option <?php if($state_id['is_active'] == 'Inactive'){ ?> selected <?php }?> value="0">In active</option>
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

