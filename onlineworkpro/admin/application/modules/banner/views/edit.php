<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>

<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('banner'); ?>"><i class="fa fa-backward"></i> Banner</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Edit Banner</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Edit Banner</h3></div>
	

<form action="<?php echo site_url('banner/edit/'.$banner['id']); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">		
<div class="box-body">
	<div class="form-group">
	<label class="col-md-2 control-label">Title</label>
	<div class="col-md-7">	
	<input type="text" name="title" id="title" value="<?php echo $banner['title']; ?>"     class="form-control" placeholder="Enter title">
	<?php echo form_error('title'); ?>	
	</div>
	</div>
	<!--
	<div class="form-group">
	<label class="col-md-2 control-label">Description</label>
	<div class="col-md-7">		
	<textarea  cols="80" name="desc"  id="area1" style="width:100%;height:250px"><?php echo $banner['desc']; ?></textarea>
	<?php echo form_error('desc'); ?>
	</div>
	</div>
	-->
	<div class="form-group">
	<label class="col-md-2 control-label">Status</label>
	<div class="col-md-7">		
	<select name="is_active" id="is_active" class="form-control">
		<option <?php if($banner['is_active'] == 1){ ?> selected <?php }?> value="1">Active</option>		
		<option <?php if($banner['is_active'] == 0){ ?> selected <?php }?> value="0">In active</option>
		
	</select>
	<?php echo form_error('is_active'); ?>
	</div>
	</div>	
	
	<div class="form-group">
	<label class="col-md-2 control-label">Upload  image ( Image size 1366 * 576 )</label>
	<div class="col-sm-5">
	<label class="btn btn-primary" for="inputImage" title="Upload image file">
	<input type="file" class="hide" id="inputImage" name="userfile" accept="image/*">
	Upload  image	
	</label>
	<input type="hidden" name="old_userfile" value="<?php echo $banner['image']; ?>">	
	</div>
	</div>		
	
	<div class="form-group">
	<label class="col-md-2 control-label"></label>
	<div class="col-sm-5">
	<?php if($banner['image']) {?>
	<img src="<?php echo SITE_URL; ?>upload/banner/<?php echo $banner['image']; ?>" class="img-responsive"  width="100">
	<?php }else{?>
	<img src="<?php echo SITE_URL; ?>upload/no-image.jpg" class="img-responsive"  width="100">
	<?php }?>		
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

