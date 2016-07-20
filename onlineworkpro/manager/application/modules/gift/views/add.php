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
			 url: "<?php echo base_url('gift/checkhotel');?>",
			data: dataString,
			cache: false,
			success: function(result)
			{
				//alert(result);
				if(result)
				{
					$("#Restaurant_List").html(result);
				}
				else
				{
					
					$("#Restaurant_List").html("<option value=''> There is no Restaurant for this  </option>");
				}
			}
		});

	});
});
</script>

<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('gift'); ?>"><i class="fa fa-backward"></i> Offer </a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Offer </li>
</ol>
</section>

<section class="content">
<div class="row">
<div class="col-md-12">
	
<?php echo $this->session->flashdata('message'); ?>	
<?php  $profile = getProfile(); ?>

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Add Offer </h3></div>

<?php 
$attributes = array('class' => 'email', 'class' => 'form-horizontal' ,'role'=>'form' ,'name'=>'randform');
echo form_open_multipart('gift/add', $attributes); 
?>
<div class="box-body">
        <input type="hidden" name="Hotel_List" id="Hotel_List" class="form-control" value="<?php echo $profile['Hotel_List']; ?>" />
      <input type="hidden" name="Restaurant_List" id="Restaurant_List" class="form-control" value="<?php echo $profile['Restaurant_List']; ?>" />	
      <?php /*?><div class="form-group">
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
	</div><?php */?>	
     
      <?php /*?><div class="form-group">
	<label class="col-md-2 control-label">Restaurant List</label>
	<div class="col-md-7">	
    
	<select name="Restaurant_List" id="Restaurant_List" class="form-control">
		<option value="">Select Restaurant</option>
		
	</select>
	<?php echo form_error('Restaurant_List'); ?>
	</div>
	</div><?php */?>	
     
	 
	<?php /*?><div class="form-group">
	<label class="col-md-2 control-label">Offer Voucher</label>
	<div class="col-md-4">	
	<input type="text" name="Gift_voucher_Code" id="coupon_code" value="" class="form-control" placeholder="Click for generate Gift Voucher">
     <?php  echo form_error('Gift_voucher_Code'); ?>
    </div>
    <div class="col-md-3">	
    <button type="button" class="btn btn-block btn-danger btn-flat" onclick="randomString()">Genrate Code</button>
    </div>
    		
	</div><?php */?>
   
    <?php /*?><div class="form-group">
	<label class="col-md-2 control-label"> Discount Type</label>
	<div class="col-md-7">	
	   <select name="Discount_Type" id="Discount_Type" class="form-control">
		<option  value="1" onChange="showbanquet(this)">Fixed </option>		
		<option  value="0" onChange="showbanquet(this)">Percentage(%)</option>
	</select>
	<?php  echo form_error('Discount_Type'); ?>	
	</div>
	</div><?php */?>
    
    <div class="form-group">
	<label class="col-md-2 control-label"> Price</label>
	<div class="col-md-7">	
	<input type="text" name="Discount_Price" id="Discount_Price" value="<?php echo set_value('Discount_Price'); ?>" class="form-control" placeholder="Enter ">
	<?php  echo form_error('Discount_Price'); ?>	
	</div>
	</div>
    
     <div class="form-group">
	<label class="col-md-2 control-label"> Description</label>
	<div class="col-md-7">	
   
	<textarea name="Description" id="Description" value="<?php echo set_value('Description'); ?>" class="form-control" placeholder="Enter "></textarea>
	<?php  echo form_error('Description'); ?>	
	</div>
	</div>
    
    
    
    <div class="form-group">
	<label class="col-md-2 control-label">Valid From</label>
	<div class="col-md-7">	
	<input type="text" name="Valid_From" id="datepicker" value="<?php echo set_value('Valid_From'); ?>" class="form-control" placeholder="Enter ">
	<?php  echo form_error('Valid_From'); ?>	
	</div>
	</div>
    
    <div class="form-group">
	<label class="col-md-2 control-label">Valid to</label>
	<div class="col-md-7">	
	<input type="text" name="Valid_To" id="datepicker2" value="<?php echo set_value('Valid_To'); ?>" class="form-control" >
   
	<?php  echo form_error('Valid_To'); ?>	
	</div>
	</div>
    	
    
</div>

<div class="box-footer">
<button type="submit" class="btn btn-primary pull-right">Submit</button>
</div>
<?php  echo form_close(); ?>
	
</div>
</div><!-- /.col -->
</div><!-- /.row -->    
</section><!-- /.content -->   
</div>

<?php $this->load->view("footer"); ?>
