<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>

<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('user'); ?>"><i class="fa fa-backward"></i> Back to User</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Add New User</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Add New User</h3></div>
	

<form action="<?php echo site_url('user/add'); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">	
<div class="box-body">
	<div class="form-group">
	<label class="col-md-2 control-label">Name</label>
	<div class="col-md-7">	
	<input type="text" name="name" id="name" value="<?php echo set_value('name'); ?>" class="form-control" placeholder="Enter title">
	<?php echo form_error('name'); ?>	
	</div>
	</div>
	
	<div class="form-group">
	<label class="col-md-2 control-label">Mobile</label>
	<div class="col-md-7">	
	<input type="text" name="mobile" id="mobile" value="<?php echo set_value('mobile'); ?>" class="form-control" placeholder="Enter your mobile">
	<?php echo form_error('mobile'); ?>	
	</div>
	</div>
	
	<div class="form-group">
	<label class="col-md-2 control-label">Email</label>
	<div class="col-md-7">	
	<input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" class="form-control" placeholder="Enter your email">
	<?php echo form_error('email'); ?>	
	</div>
	</div>		
	
	<div class="form-group">
	<label class="col-md-2 control-label">Password</label>
	<div class="col-md-7">	
	<input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>" class="form-control pass1" placeholder="Enter your password">
	<?php echo form_error('password'); ?>	
	</div>
	</div>		
	
	<div class="form-group">
	<label class="col-md-2 control-label">Upload  image</label>
	<div class="col-sm-5">
	<label class="btn btn-primary" for="inputImage" title="Upload image file">
	<input type="file" class="hide" id="inputImage" name="userfile" accept="image/*">
	Upload  image	
	</label>
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

