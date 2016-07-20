<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>


<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('social'); ?>"><i class="fa fa-backward"></i> Social Media</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active"> Social Media</li>
</ol>
</section>	

<section class="content">
<div class="row">
<div class="col-md-12">
	
<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Edit  Social</h3></div>

<?php 
$attributes = array('class' => 'email', 'class' => 'form-horizontal' ,'role'=>'form' );
echo form_open_multipart('social/edit/'.$social['id'], $attributes); 
?>
<div class="box-body">
	<div class="form-group">
	<label class="col-md-2 control-label">Title</label>
	<div class="col-md-7">	
	<input type="text" name="title" id="title" value="<?php echo set_value('title',$social['title']); ?>"     class="form-control" placeholder="Enter title">
	<?php  echo form_error('title'); ?>	
	</div>
	</div>
	
	<div class="form-group">
	<label class="col-md-2 control-label">Url</label>
	<div class="col-md-7">		
	<input type="url" name="url" id="url"  value="<?php echo set_value('url',$social['url'] ); ?>"  class="form-control" placeholder="Please enter url like http://www.abc.com">
	<?php  echo form_error('url'); ?>
	</div>
	</div>
	
	<div class="form-group">
	<label class="col-md-2 control-label">Show on Home</label>
	<div class="col-md-7">	
	<input type="checkbox" name="is_home" id="is_home" value="1" <?php if($social['is_home'] == 1){ ?> checked="checked" <?php }?>>
	</div>
	</div>		
	
	<div class="form-group">
	<label class="col-md-2 control-label">Status</label>
	<div class="col-md-7">		
	<select name="is_active" id="is_active" class="form-control">
		<option <?php if($social['is_active'] == 1){ ?> selected <?php }?> value="1">Active</option>		
		<option <?php if($social['is_active'] == 0){ ?> selected <?php }?> value="0">In active</option>
	</select>
	<?php echo form_error('is_active'); ?>
	</div>
	</div>	
	
	<div class="form-group">
	<label class="col-md-2 control-label">Upload  image</label>
	<div class="col-sm-5">
	<label class="btn btn-primary" for="inputImage" title="Upload image file">
	<input type="file" class="hide" id="inputImage" name="userfile" accept="image/*">
	Upload  image	
	</label>
	<?php  echo form_error('image'); ?>	
	<input type="hidden" name="old_userfile" value="<?php echo $social['image']; ?>">	
	</div>
	</div>		
	
	<div class="form-group">
	<label class="col-md-2 control-label"></label>
	<div class="col-sm-5">
	<?php if($social['image']) {?>
	<img src="<?php echo SITE_URL; ?>upload/social/<?php echo $social['image']; ?>" class="img-responsive"  width="100">
	<?php }else{?>
	<img src="<?php echo SITE_URL; ?>upload/no-image.jpg" class="img-responsive"  width="100">
	<?php }?>		
	</div>
	</div>		
</div>

<div class="box-footer">
<button type="submit" class="btn btn-primary pull-right">Update</button>
</div>
<?php  echo form_close(); ?>
	
</div>
</div><!-- /.col -->
</div><!-- /.row -->    
</section><!-- /.content -->   
</div>

<?php $this->load->view("footer"); ?>
