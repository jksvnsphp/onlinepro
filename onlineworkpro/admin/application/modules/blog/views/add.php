<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>

<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('blog'); ?>"><i class="fa fa-backward"></i> Back to Blog</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Add New Blog</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Add New Blog</h3></div>
	

<form action="<?php echo site_url('blog/add'); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">	
<div class="box-body">
	<div class="form-group">
	<label class="col-md-2 control-label">Title</label>
	<div class="col-md-7">	
	<input type="text" name="title" id="title" value="<?php echo set_value('title'); ?>" class="form-control" placeholder="Enter title">
	<?php echo form_error('title'); ?>	
	</div>
	</div>

	<div class="form-group">
	<label class="col-md-2 control-label">Description</label>
	<div class="col-md-7">		
	<textarea  cols="80" name="description"  id="area1" style="width:100%;height:250px;"><?php echo set_value('description'); ?></textarea>
	<?php echo form_error('description'); ?>
	</div>
	</div>
	
	<div class="form-group">
	<label class="col-md-2 control-label"></label>
	<div class="col-sm-5">
	<label class="btn btn-primary" for="inputImage" title="Upload image file">
	<input type="file" class="hide" id="inputImage" name="userfile" accept="image/*">
	Upload  image	
	</label>
	</div>
	</div>		

	<div class="form-group">
	<label class="col-md-2 control-label">Meta Title</label>
	<div class="col-md-7">	
	<input type="text" name="meta_title" id="meta_title" value="<?php echo set_value('title'); ?>" class="form-control" placeholder="Enter Meta Title">
	</div>
	</div>
	
	<div class="form-group">
	<label class="col-md-2 control-label">Meta Description</label>
	<div class="col-md-7">	
	<textarea name="meta_description" id="meta_description" rows="3" value="<?php echo set_value('title'); ?>" class="form-control" placeholder="Enter Meta Description"></textarea>	
	</div>
	</div>
	
	<div class="form-group">
	<label class="col-md-2 control-label">Meta Keyword</label>
	<div class="col-md-7">	
	<input type="text" name="meta_keyword" id="meta_keyword" value="<?php echo set_value('title'); ?>" class="form-control" placeholder="Enter Meta Keyword">
	</div>
	</div>	
</div>

<div class="box-footer">
<button type="submit" class="btn btn-primary pull-right">Submit</button>
</div>
</form>
</div>
	
	
</div>
</div>
</section>
</div>

<?php $this->load->view("footer"); ?>

