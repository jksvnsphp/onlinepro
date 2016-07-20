<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>

<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<h1>Setting</h1>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Setting</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	
	
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
	<li class="active"><a href="#setting" data-toggle="tab">General</a></li>
	<li><a href="#common" data-toggle="tab">Common</a></li> 
</ul>

<form action="<?php echo site_url('setting'); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">	
<div class="tab-content">
	
<div class="active tab-pane" id="setting">
	<div class="box-body">
		<div class="form-group">
		<label class="col-md-2 control-label">Website Name</label>
		<div class="col-md-8">	
		<input type="text" name="SITE_TITLE" id="SITE_TITLE" value="<?php echo $this->Setting_model->getValue("SITE_TITLE"); ?>" class="form-control" placeholder="Enter name">
		</div>
		</div>
        
      <?php /*?>  <div class="form-group">
		<label class="col-md-2 control-label">Website Country</label>
		<div class="col-md-8">	
		<input type="text" name="SITE_TITLE" id="SITE_TITLE" value="India" class="form-control" placeholder="Enter name">
		</div>
		</div>
        
        <div class="form-group">
		<label class="col-md-2 control-label">Website State</label>
		<div class="col-md-8">	
		<input type="text" name="SITE_TITLE" id="SITE_TITLE" value="<?php echo $this->Setting_model->getValue("SITE_TITLE"); ?>" class="form-control" placeholder="Enter name">
		</div>
		</div>

      <div class="form-group">
		<label class="col-md-2 control-label">Website City</label>
		<div class="col-md-8">	
		<input type="text" name="SITE_TITLE" id="SITE_TITLE" value="<?php echo $this->Setting_model->getValue("SITE_TITLE"); ?>" class="form-control" placeholder="Enter name">
		</div>
		</div> <?php */?>
        
		<div class="form-group">
		<label class="col-md-2 control-label">Website Address</label>
		<div class="col-md-8">		
		<textarea name="SITE_ADDRESS" id="SITE_ADDRESS" class="form-control" placeholder="Enter name"><?php echo $this->Setting_model->getValue("SITE_ADDRESS"); ?></textarea>
		</div>
		</div>

		<div class="form-group">
		<label class="col-md-2 control-label">Website Mobile</label>
		<div class="col-md-8">		
		<input type="text" name="SITE_MOBILE" id="SITE_MOBILE" value="<?php echo $this->Setting_model->getValue("SITE_MOBILE"); ?>" class="form-control" placeholder="Enter address">
		<div class="error"><?php  echo form_error('mobile'); ?></div>		
		</div>
		</div>
		
		<div class="form-group">
		<label class="col-md-2 control-label"> Email-Id</label>
		<div class="col-md-8">		
		<input type="email" name="SITE_EMAIL" id="SITE_EMAIL" value="<?php echo $this->Setting_model->getValue("SITE_EMAIL"); ?>" class="form-control" placeholder="Enter email">
		</div>
		</div>
		
		<div class="form-group">
		<label class="col-md-2 control-label">Support Email-Id</label>
		<div class="col-md-8">		
		<input type="email" name="SUPPORT_EMAIL" id="SUPPORT_EMAIL" value="<?php echo $this->Setting_model->getValue("SUPPORT_EMAIL"); ?>" class="form-control" placeholder="Enter Support Email-Id">
		</div>
		</div>
        
        <div class="form-group">
		<label class="col-md-2 control-label"> Currency</label>
		<div class="col-md-8">		
		<input type="text" name="Currency" id="Currency" value="<?php echo $this->Setting_model->getValue("Currency"); ?>" class="form-control" placeholder="Currency">
		</div>
		</div>
        
        <div class="form-group">
		<label class="col-md-2 control-label">Currency Symbol</label>
		<div class="col-md-8">		
		<input type="text" name="Currency_Symbol" id="Currency_Symbol" value="<?php echo $this->Setting_model->getValue("Currency_Symbol"); ?>" class="form-control" placeholder="Currency Symbol">
		</div>
		</div>
		
		<div class="form-group">
		<label class="col-md-2 control-label">Website Logo</label>
		<div class="col-sm-5">
		<label class="btn btn-primary" for="inputImage" title="Upload image file">
		<input type="file" class="hide" id="inputImage" name="SITE_LOGO" accept="image/*">
		Upload  image	
		</label>
		<input type="hidden" name="OLD_LOGO" value="<?php echo $this->Setting_model->getValue("SITE_LOGO"); ?>">			
		</div>
		</div>		
		
		<div class="form-group">
		<label class="col-md-2 control-label"></label>
		<div class="col-sm-5">
		<?php if($this->Setting_model->getValue("SITE_LOGO")){ ?>	
		<img src="<?php echo SITE_URL; ?>upload/setting/<?php echo $this->Setting_model->getValue("SITE_LOGO"); ?>" width="105" style="border: 2px solid #6AC4EC;border-radius: 2px;">
		<?php }else{?>	
		<img src="<?php echo SITE_URL; ?>upload/no-image.jpg" width="105"  style="border: 2px solid #6AC4EC;border-radius: 2px;">
		<?php }?>			
		</div>
		</div>							
	</div>
</div>
	
	
<div class="tab-pane" id="common">
	<div class="box-body">
		<div class="form-group">
		<label class="col-md-2 control-label">Copyright</label>
		<div class="col-md-8">	
		<textarea name="COPYRIGHT" id="COPYRIGHT" class="form-control" placeholder="Enter Search a Booking Details"><?php echo $this->Setting_model->getValue("COPYRIGHT"); ?></textarea>
		</div>
		</div>
        
        
	</div>
</div>
		
</div>
	
<div class="box-footer">
<button type="submit" class="btn btn-primary pull-right">Update Setting</button>
</div>		
</form>	
	
</div>
</div>


</div><!-- /.col -->
</div><!-- /.row -->    
</section><!-- /.content -->   
</div>
<?php $this->load->view("footer"); ?>
