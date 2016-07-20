<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>


<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('type'); ?>"><i class="fa fa-backward"></i> Type</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active"> Type</li>
</ol>
</section>	

<section class="content">
<div class="row">
<div class="col-md-12">
	
<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Edit  Type</h3></div>

<?php 
$attributes = array('class' => 'email', 'class' => 'form-horizontal' ,'role'=>'form' );
echo form_open_multipart('type/edit/'.$type['id'], $attributes); 
?>
<div class="box-body">
	<div class="form-group">
	<label class="col-md-2 control-label">Type Name</label>
	<div class="col-md-7">	
	<input type="text" name="type_name" id="type_name" value="<?php echo set_value('type_name',$type['type_name'] ); ?>" class="form-control" placeholder="Enter type name">
	<?php  echo form_error('type_name'); ?>	
	</div>
	</div>
    
    <div class="form-group">
	<label class="col-md-2 control-label">Status</label>
	<div class="col-md-7">		
	<select name="is_active" id="is_active" class="form-control">
		<option <?php if($type['is_active'] == 1){ ?> selected <?php }?> value="1">Active</option>		
		<option <?php if($type['is_active'] == 0){ ?> selected <?php }?> value="0">In active</option>
	</select>
	<?php echo form_error('is_active'); ?>
	</div>
	</div>
    	
</div>

<div class="box-footer">
<button type="submit" class="btn btn-primary pull-right">Update</button>
</div>
<?php  echo form_close(); ?>
	
</div>
</div><!-- /.col -->
</div><!-- /.row -->    
</section><!-- /.content -->   
</div>

<?php $this->load->view("footer"); ?>
