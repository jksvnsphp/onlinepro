<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>

<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('mail'); ?>"><i class="fa fa-backward"></i> Mail Template</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Edit Mail Template</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Edit Plan</h3></div>
	

<form action="<?php echo site_url('mail/edit/'.$mail['id']); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">		
<div class="box-body">
	
	
	<div class="form-group">
	<label class="col-md-2 control-label">Title</label>
	<div class="col-md-7">	
	<input type="text" name="title" id="title" value="<?php echo $mail['title']; ?>" class="form-control" placeholder="Enter title" required>
	<?php echo form_error('title'); ?>	
	</div>
	</div>
	
	
	<div class="form-group">
	<label class="col-md-2 control-label">From Email</label>
	<div class="col-md-7">	
	<input type="email" name="from_email" id="from_email" value="<?php echo $mail['from_email']; ?>" class="form-control" placeholder="From email" required>
	<?php echo form_error('from_email'); ?>	
	</div>
	</div>
	
	
	<div class="form-group">
	<label class="col-md-2 control-label">Reply email</label>
	<div class="col-md-7">	
	<input type="text" name="reply_email" id="reply_email" value="<?php echo $mail['reply_email']; ?>" class="form-control" placeholder="Reply email" required>
	<?php echo form_error('reply_email'); ?>	
	</div>
	</div>
	
	
	<div class="form-group">
	<label class="col-md-2 control-label">Subject</label>
	<div class="col-md-7">	
	<input type="text" name="subject" id="subject" value="<?php echo $mail['subject']; ?>"  class="form-control" placeholder="Enter Subject" required>
	<?php echo form_error('subject'); ?>	
	</div>
	</div>		
	
	
	
	
	<div class="form-group">
	<label class="col-md-2 control-label">Message</label>
	<div class="col-md-7">		
	<textarea  cols="80" name="message"  id="area1" style="width:100%;height:250px;"><?php echo $mail['message']; ?></textarea>
	<?php echo form_error('message'); ?>
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

