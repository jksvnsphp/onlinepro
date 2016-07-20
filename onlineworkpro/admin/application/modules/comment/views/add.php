<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>

<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('comment'); ?>"><i class="fa fa-backward"></i> Back to Comment</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Add New Comment</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Add New Comment</h3></div>
	

<form action="<?php echo site_url('comment/add'); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">	
<div class="box-body">
	<div class="form-group">
	<label class="col-md-2 control-label">Select Blog</label>
	<div class="col-md-7">		
	<select name="blog_id" id="blog_id" class="form-control">
		<option value=""> -- Select -- </option>
		<?php foreach($allblog as $blog){ ?>
		<option value="<?php echo $blog['id']; ?>"><?php echo $blog['title']; ?></option>
		<?php }?>
	</select>
	<?php echo form_error('blog_id'); ?>
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
	<label class="col-md-2 control-label">Email Id</label>
	<div class="col-md-7">	
	<input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Enter email">
	<?php echo form_error('email'); ?>	
	</div>
	</div>	

	<div class="form-group">
	<label class="col-md-2 control-label">Message</label>
	<div class="col-md-7">		
	<textarea  cols="92" name="message"  id="message" rows="5"><?php echo set_value('message'); ?></textarea>
	<?php echo form_error('message'); ?>
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

