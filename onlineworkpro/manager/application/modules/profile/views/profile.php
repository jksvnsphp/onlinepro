<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>
<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<h1>Profile</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Profile</li>
	</ol>
</section>
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Edit Profile</h3></div>
	
<form action="<?php echo site_url('profile'); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">
<div class="box-body">
	<div class="form-group">
	<label class="col-md-2 control-label">Name</label>
	<div class="col-md-10">	
	<input type="text" name="name" id="name" value="<?php echo $profile_details['name']; ?>" class="form-control" placeholder="Enter name">
	<div class="error"><?php  echo form_error('name'); ?></div>	
	</div>
	</div>

	<div class="form-group">
	<label class="col-md-2 control-label">Mobile</label>
	<div class="col-md-10">		
	<input type="text" name="mobile" id="mobile" value="<?php echo $profile_details['mobile']; ?>" class="form-control" placeholder="Enter name">
	<div class="error"><?php  echo form_error('mobile'); ?></div>	
		
	</div>
	</div>

	<div class="form-group">
	<label class="col-md-2 control-label">Address</label>
	<div class="col-md-10">		
	<input type="text" name="address" id="address" value="<?php echo $profile_details['address']; ?>" class="form-control" placeholder="Enter address">
	<div class="error"><?php  echo form_error('address'); ?></div>		
	</div>
	</div>

	<div class="form-group">
	<label class="col-md-2 control-label">Username</label>
	<div class="col-md-10">		
	<input type="text" name="username" id="username" value="<?php echo $profile_details['username']; ?>" class="form-control" placeholder="Enter username">
	<div class="error"><?php  echo form_error('username'); ?></div>			
	</div>
	</div>	
	
	<div class="form-group">
	<label class="col-md-2 control-label">Email-Id</label>
	<div class="col-md-10">		
	<input type="text" name="email" id="email" value="<?php echo $profile_details['email']; ?>" class="form-control" placeholder="Enter email" disabled>
	</div>
	</div>
	
	<div class="form-group">
	<label class="col-md-2 control-label">Password</label>
	<div class="col-md-10">		
	<input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
	</div>
	</div>	
	
	<div class="form-group">
	<label class="col-md-2 control-label">Upload  image</label>
	<div class="col-sm-5">
	<label class="btn btn-primary" for="inputImage" title="Upload image file">
	<input type="file" class="hide" id="inputImage" name="file" accept="image/*">
	Upload  image	
	</label>
		<input type="hidden" name="old_image" value="<?php echo  $profile_details['profile_pic'];?>">
	</div>
	</div>			
		
	<div class="form-group">
	<label class="col-md-2 control-label"></label>
	<div class="col-md-10">	
	<?php if($profile_details['profile_pic']){ ?>	
	<img src="<?php echo SITE_URL; ?>upload/manager/<?php echo $profile_details['profile_pic'] ?>" width="100"  style="border: 2px solid #6AC4EC;border-radius: 2px;">
	<?php }else{?>	
	<img src="<?php echo SITE_URL; ?>upload/no-image.jpg" width="85" style="border: 2px solid #6AC4EC;border-radius: 2px;">
	<?php }?>	
	</div>
	</div>			
</div>

<div class="box-footer">
<button type="submit" class="btn btn-primary pull-right">Update Profile</button>
</div>
</form>
</div>
	
	
</div><!-- /.col -->
</div><!-- /.row -->    
</section><!-- /.content -->   


	
</div>

<?php $this->load->view("footer"); ?>

