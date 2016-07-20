<?php $this->load->view("header");?>

<?php $this->load->view("navigation");?>

 <script language="javascript" type="text/javascript">
	jQuery(document).ready(function($) { 
	$("#state_id").change(function()
	{
		var id=$(this).val(); 
		var dataString = 'id='+ id; 
		$.ajax({ 
		type: "POST",
			 url: "<?php echo base_url('area/checkstate');?>",
			data: dataString,
			cache: false,
			success: function(html)
			{
			$("#city_id").html(html);
			}
		});

	});
});
</script>


<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('area'); ?>"><i class="fa fa-backward"></i> Area</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Add New City</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Add New Area</h3></div>
	

<form action="<?php echo site_url('area/add'); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">	
<div class="box-body">
	
	<div class="form-group">
	<label class="col-md-2 control-label">State</label>
	<div class="col-md-7">		
	<select name="state_id" id="state_id" class="form-control" required>
		<option value="">Select State</option>
		<?php foreach($state as $st){ ?>
		<option value="<?php echo $st['id']; ?>"><?php echo $st['state']; ?></option>
		<?php }?>
	</select>
	<?php echo form_error('state_id'); ?>
	</div>
	</div>	
	
	
	<div class="form-group">
	<label class="col-md-2 control-label">City</label>
	<div class="col-md-7">		
	<select name="city_id" id="city_id" class="form-control" required>
		<option value="">Select City</option>
		
	</select>
	<?php echo form_error('city_id'); ?>
	</div>
	</div>	



	<div class="form-group">
	<label class="col-md-2 control-label">Area</label>
	<div class="col-md-7">	
	<input type="text" name="area" id="area" value="<?php echo set_value('area'); ?>"    required  class="form-control" placeholder="Enter Area">
	<?php echo form_error('area'); ?>	
	</div>
	</div>	
	
	
	
	<?php /*?><div class="form-group">
	<label class="col-md-2 control-label">Zipcode</label>
	<div class="col-md-7">	
	<input type="text" name="zipcode" id="zipcode" value="<?php echo set_value('zipcode'); ?>"required  class="form-control" placeholder="Enter Zipcode">
	<?php echo form_error('zipcode'); ?>	
	</div>
	</div><?php */?>	






<div class="box-footer">
	
<button type="submit" class="btn btn-primary pull-right">Submit</button>
</div>
</div>
</form>
</div>

	
	
</div><!-- /.col -->
</div><!-- /.row -->    
</section><!-- /.content -->   


	
</div>

<?php $this->load->view("footer"); ?>

