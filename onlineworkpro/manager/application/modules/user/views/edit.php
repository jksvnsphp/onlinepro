<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>

<script>
function password_validate(){
	var pass1 =$(".pass1").val();
	var pass2 =$(".pass2").val();
	
	if(pass1 != pass2){
		alert("Password Do not Match.");
		return false;
	}
	return true;
}
</script>

<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('user'); ?>"><i class="fa fa-backward"></i> Back to User</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Edit User</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
	<li class="active"><a href="#setting" data-toggle="tab">General</a></li>
	<li><a href="#password_update" data-toggle="tab">Change Password</a></li>
	<li><a href="#other" data-toggle="tab">Other Details</a></li> 
</ul>

<form action="<?php echo site_url('user/edit/'.$page_id['id']); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data" onsubmit="return password_validate()">	
<div class="tab-content">
		
<div class="active tab-pane" id="setting">
<div class="box-body">
	<div class="form-group">
	<label class="col-md-2 control-label">Name</label>
	<div class="col-md-7">	
	<input type="text" name="name" id="name" value="<?php echo $page_id['name']; ?>" class="form-control" placeholder="Enter title">
	<?php echo form_error('name'); ?>	
	</div>
	</div>
	
	<div class="form-group">
	<label class="col-md-2 control-label">Mobile</label>
	<div class="col-md-7">	
	<input type="text" name="mobile" id="mobile" value="<?php echo $page_id['mobile']; ?>" class="form-control" placeholder="Enter your mobile">
	<?php echo form_error('mobile'); ?>	
	</div>
	</div>
	
	<div class="form-group">
	<label class="col-md-2 control-label">Email</label>
	<div class="col-md-7">	
	<input type="email" name="email" id="email" value="<?php echo $page_id['email']; ?>" class="form-control" placeholder="Enter your email" disabled>
	</div>
	</div>				
	
	<div class="form-group">
	<label class="col-md-2 control-label">Upload  image</label>
	<div class="col-sm-5">
	<label class="btn btn-primary" for="inputImage" title="Upload image file">
	<input type="file" class="hide" id="inputImage" name="userfile" accept="image/*">
	Upload  image	
	</label>
	<input type="hidden" name="old_userfile" value="<?php echo $page_id['profile_pic']; ?>">	
    <?php if($page_id['profile_pic']) {?>
              <img src="<?php echo SITE_URL; ?>upload/user/<?php echo $page_id['profile_pic']; ?>" class="img-responsive"  width="100">
              <?php }else{?>
              <img src="<?php echo SITE_URL; ?>upload/no-image.jpg" class="img-responsive"  width="100">
              <?php }?>		
	</div>
	</div>		
</div>
</div>

<div class="tab-pane" id="password_update">
<div class="box-body">			
	<div class="form-group">
	<label class="col-md-2 control-label">Password</label>
	<div class="col-md-7">	
	<input type="password" name="password" id="password" value="<?php echo set_value('password'); ?>" class="form-control pass1" placeholder="Enter your password">
	</div>
	</div>		
	
	<div class="form-group">
	<label class="col-md-2 control-label">Confirm Password</label>
	<div class="col-md-7">	
	<input type="password" value="<?php echo set_value('password'); ?>" class="form-control pass2" placeholder="Enter your password">
	</div>
	</div>			
</div>
</div>


<div class="tab-pane" id="other">
<div class="box-body">	
	
</div>
</div>


<div class="box-footer">
<button type="submit" class="btn btn-primary pull-right">Submit</button>
</div>
</form>
</div>
	
	
</div><!-- /.col -->
		
</div><!-- /.col -->
</div><!-- /.row -->    
</section><!-- /.content -->   
	
</div>

<?php $this->load->view("footer"); ?>

