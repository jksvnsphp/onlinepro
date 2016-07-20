<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>

<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('comment'); ?>"><i class="fa fa-backward"></i> Back to Comment</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Edit Comment</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Edit Comment</h3></div>
	

<form action="<?php echo site_url('comment/edit/'.$comment['id']); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">	
<div class="box-body">
	<div class="form-group">
	<label class="col-md-2 control-label">Select Blog</label>
	<div class="col-md-7">		
	<select name="blog_id" id="blog_id" class="form-control" disabled>
		<option value=""> -- Select -- </option>
		<?php foreach($allblog as $blog){ ?>
		<option <?php if( $comment['blog_id'] == $blog['id']){ ?> selected="selected" <?php }?> value="<?php echo $blog['id']; ?>"><?php echo $blog['title']; ?></option>
		<?php }?>
	</select>
	</div>
	</div>		
	
	<div class="form-group">
	<label class="col-md-2 control-label">Name</label>
	<div class="col-md-7">	
	<input type="text" name="name" id="name" value="<?php echo $comment['name']; ?>" class="form-control" placeholder="Enter name" disabled>
	</div>
	</div>
	
	<div class="form-group">
	<label class="col-md-2 control-label">Email Id</label>
	<div class="col-md-7">	
	<input type="text" name="email" id="email" value="<?php echo $comment['email']; ?>" class="form-control" placeholder="Enter email" disabled>
	</div>
	</div>	

	<div class="form-group">
	<label class="col-md-2 control-label">Message</label>
	<div class="col-md-7">		
	<textarea  cols="92" name="message"  id="message" rows="5" disabled><?php echo $comment['message']; ?></textarea>
	</div>
	</div>

	<div class="form-group">
	<label class="col-md-2 control-label">Status</label>
	<div class="col-md-7">		
	<select name="is_active" id="is_active" class="form-control">
		<option <?php if($comment['is_active'] == 1){ ?> selected <?php }?> value="1">Active</option>		
		<option <?php if($comment['is_active'] == 0){ ?> selected <?php }?> value="0">In active</option>
	</select>
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

