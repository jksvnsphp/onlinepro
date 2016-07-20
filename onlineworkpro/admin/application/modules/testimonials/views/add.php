<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>
<script language="javascript" type="text/javascript">
	jQuery(document).ready(function($) { 
	$("#Hotel_List").change(function()
	{
		var id=$(this).val(); 
		var dataString = 'id='+ id; 
		$.ajax({ 
		type: "POST",
			 url: "<?php echo base_url('testimonials/GetRestbyHotal');?>",
			data: dataString,
			cache: false,
			success: function(result)
			{
				//alert(result);
				if(result)
				{
					$("#Restaurant_List").html(result);
				}
				
			}
		});

	});
});
</script>

<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('testimonials'); ?>"><i class="fa fa-backward"></i> Back to Testimonials</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Add New Testimonials</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Add New Testimonials</h3></div>
	

<form action="<?php echo site_url('testimonials/add'); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">	
<div class="box-body">
    
    <div class="form-group">
	<label class="col-md-2 control-label">Hotel List</label>
	<div class="col-md-7">		
	<select name="Hotel_List" id="Hotel_List" class="form-control">
		<option value="">Select Hotel</option>
		<?php foreach($Hotel as $ht) {?>
			<option value="<?php echo $ht['id']; ?>"><?php echo $ht['hotal_name']; ?></option>
		<?php } ?>
	</select>
	<?php echo form_error('Hotel_List'); ?>
	</div>
	</div>
    
      <div class="form-group">
	<label class="col-md-2 control-label">Restaurant List</label>
	<div class="col-md-7">		
	<select name="Restaurant_List" id="Restaurant_List" class="form-control">
		<option value="">Select Restaurant</option>
		
	</select>
	<?php echo form_error('Restaurant_List'); ?>
	</div>
	</div>	
   
	<div class="form-group">
	<label class="col-md-2 control-label">Rating</label>
	<div class="col-md-7">		
	<select name="Rating" id="Rating" class="form-control">		
        <option value="1">1 Star </option>
         <option value="2">2 Star </option>
          <option value="3">3 Star </option>
           <option value="4">4 Star </option>
            <option value="5">5 Star </option>
			</select>
	<?php echo form_error('Rating'); ?>
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
	<label class="col-md-2 control-label">Comment</label>
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

