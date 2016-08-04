<?php $this->load->view("header");?>

<?php $this->load->view("navigation");?>


<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('task'); ?>"><i class="fa fa-backward"></i> Task</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Add New Task</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Add New Task</h3></div>
	

<form action="<?php echo site_url('task/add'); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">	
<div class="box-body">
	<div class="form-group">
	<label class="col-md-2 control-label">Page Title</label>
	<div class="col-md-7">	
	<input type="text" name="page_title" id="page_title" value="<?php echo set_value('page_title'); ?>"     class="form-control" placeholder="Enter page_title">
	<?php echo form_error('page_title'); ?>	
	</div>
	</div>	
	
	<div class="form-group">
	<label class="col-md-2 control-label">Page LInk</label>
	<div class="col-md-7">	
	<input type="text" name="page_link" id="page_link" value="<?php echo set_value('page_link'); ?>"     class="form-control" placeholder="Enter page_link">
	<?php echo form_error('page_link'); ?>	
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

