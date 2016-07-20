<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>

<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('blog'); ?>"><i class="fa fa-backward"></i> Back to Blog</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Edit Blog</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Edit Blog</h3></div>
	

<form action="<?php echo site_url('blog/edit/'.$blog['id']); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">	
<div class="box-body">
	<div class="form-group">
	<label class="col-md-2 control-label">Title</label>
	<div class="col-md-7">	
	<input type="text" name="title" id="title" value="<?php echo $blog['title']; ?>" class="form-control" placeholder="Enter title">
	<?php echo form_error('title'); ?>	
	</div>
	</div>

	<div class="form-group">
	<label class="col-md-2 control-label">Description</label>
	<div class="col-md-7">		
	<textarea  cols="80" name="description"  id="area1" style="width:100%;height:250px;"><?php echo $blog['description']; ?></textarea>
	<?php echo form_error('description'); ?>
	</div>
	</div>

	<div class="form-group">
	<label class="col-md-2 control-label">Status</label>
	<div class="col-md-7">		
	<select name="is_active" id="is_active" class="form-control">
		<option <?php if($blog['is_active'] == 1){ ?> selected <?php }?> value="1">Active</option>		
		<option <?php if($blog['is_active'] == 0){ ?> selected <?php }?> value="0">In active</option>
	</select>
	<?php echo form_error('is_active'); ?>
	</div>
	</div>		
	
	<div class="form-group">
	<label class="col-md-2 control-label"></label>
	<div class="col-sm-5">
	<label class="btn btn-primary" for="inputImage" title="Upload image file">
	<input type="file" class="hide" id="inputImage" name="userfile" accept="image/*">
	Upload  image	
	</label>
	<input type="hidden" name="old_userfile" value="<?php echo $blog['image']; ?>">	
	</div>
	</div>		
	
	<div class="form-group">
	<label class="col-md-2 control-label"></label>
	<div class="col-sm-5">
	<?php if($blog['image']) {?>
	<img src="<?php echo SITE_URL; ?>upload/blog/<?php echo $blog['image']; ?>" class="img-responsive"  width="100">
	<?php }else{?>
	<img src="<?php echo SITE_URL; ?>upload/no-image.jpg" class="img-responsive"  width="100">
	<?php }?>		
	</div>
	</div>		
	
	<div class="form-group">
	<label class="col-md-2 control-label">Meta Title</label>
	<div class="col-md-7">	
	<input type="text" name="meta_title" id="meta_title" value="<?php echo $blog['meta_title']; ?>" class="form-control" placeholder="Enter Meta Title">
	</div>
	</div>
	
	<div class="form-group">
	<label class="col-md-2 control-label">Meta Description</label>
	<div class="col-md-7">	
	<textarea name="meta_description" id="meta_description" rows="3" class="form-control" placeholder="Enter Meta Description"><?php echo $blog['meta_description']; ?></textarea>	
	</div>
	</div>
	
	<div class="form-group">
	<label class="col-md-2 control-label">Meta Keyword</label>
	<div class="col-md-7">	
	<input type="text" name="meta_keyword" id="meta_keyword" value="<?php echo $blog['meta_keyword']; ?>" class="form-control" placeholder="Enter Meta Keyword">
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

