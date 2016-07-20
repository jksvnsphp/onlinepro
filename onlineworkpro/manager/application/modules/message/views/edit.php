<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>

<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('message'); ?>"><i class="fa fa-backward"></i> Back to Message</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Edit Message</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Edit Message</h3></div>
	

<form action="<?php echo site_url('message/edit/'.$vendor_message['id']); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">		
<div class="box-body">

	<div class="form-group">
	<label class="col-md-2 control-label">Vendor </label>
	<div class="col-md-7">		
	<select name="vendor_id" id="vendor_id" class="form-control">
		<?php foreach($vendor as $vend){ ?>
		<option <?php if($vend['id'] == $vendor_message['vendor_id']){ ?> selected <?php }?> value="<?php echo $vend['id']; ?>"><?php echo $vend['username']; ?></option>
		<?php }?>
	</select>
	<?php echo form_error('postition_id'); ?>
	</div>
	</div>	









	<div class="form-group">
	<label class="col-md-2 control-label">Title</label>
	<div class="col-md-7">	
	<input type="text" name="title" id="title" value="<?php echo $vendor_message['title']; ?>"     class="form-control" placeholder="Enter title">
	<?php echo form_error('title'); ?>	
	</div>
	</div>

	<div class="form-group">
	<label class="col-md-2 control-label">Description</label>
	<div class="col-md-7">		
	<textarea  cols="80" name="description"  id="area1" style="width:100%;height:250px;"><?php echo $vendor_message['message']; ?></textarea>
	<?php echo form_error('description'); ?>
	</div>
	</div>
	
	




	<div class="form-group">
	<label class="col-md-2 control-label">Status</label>
	<div class="col-md-7">		
	<select name="is_active" id="is_active" class="form-control">
		<option <?php if($vendor_message['is_active'] == 1){ ?> selected <?php }?> value="1">Active</option>		
		<option <?php if($vendor_message['is_active'] == 0){ ?> selected <?php }?> value="0">In active</option>
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

