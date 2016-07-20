<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>

<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('message'); ?>"><i class="fa fa-backward"></i> Back to Message</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Send Message</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Send Message</h3></div>
	

<form action="<?php echo site_url('message/add'); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">	
<div class="box-body">
	<div class="form-group">
	<label class="col-md-2 control-label">Select Vendor</label>
	<div class="col-md-7">		
	<select name="vendor_id" id="postition_id" class="form-control">
		<?php foreach($vendor as $vend){ ?>
		<option value="<?php echo $vend['id']; ?>"><?php echo $vend['username']; ?></option>
		<?php }?>
	</select>
	</div>
	</div>	
	
	<div class="form-group">
	<label class="col-md-2 control-label">Title</label>
	<div class="col-md-7">	
	<input type="text" name="title" id="title" value="<?php echo set_value('title'); ?>"     class="form-control" placeholder="Enter title">
	<?php echo form_error('title'); ?>	
	</div>
	</div>		
	
	<div class="form-group">
	<label class="col-md-2 control-label">Description</label>
	<div class="col-md-7">		
	<textarea  cols="80" name="message"  id="area1" style="width:100%;height:250px;"><?php echo set_value('message'); ?></textarea>
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

