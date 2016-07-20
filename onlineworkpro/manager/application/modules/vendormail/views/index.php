<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>


<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<h1>Send mail to Vendor</h1>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Send mail to Vendor</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">Send Message</h3></div>
	
<form action="<?php echo site_url('vendormail/index'); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">	
	
		
	<div class="form-group">
	<label class="col-md-2 control-label">Select Vendor</label>
	<div class="col-md-7">	
	<select name="email[]" id="email" class="form-control" multiple="multiple" required >
			<?php foreach($get_mailbox as $mailbox){ ?>
			<option value="<?php echo $mailbox['email']; ?>"><?php echo $mailbox['email']; ?></option>
			<?php }?> 
		</select>	
	</div>
	</div>
		
		
	<div class="form-group">
	<label class="col-md-2 control-label">From email</label>
	<div class="col-md-7">	
	<input type="email" name="from_email" id="from" class="form-control"  required   placeholder="ex  admin@gmail.com"   value="<?php echo set_value('from_email'); ?>" >
	<?php  echo form_error('from_email'); ?>
	</div>
	</div>
		
	<div class="form-group">
	<label class="col-md-2 control-label">Reply email</label>
	<div class="col-md-7">	
	<input type="email" name="reply_email" class="form-control"  required placeholder="ex  admin@gmail.com"   value="<?php echo set_value('reply_email'); ?>"> 
	<?php  echo form_error('reply_email'); ?>
	</div>
	</div>	
		
	
	<div class="form-group">
	<label class="col-md-2 control-label">Subject</label>
	<div class="col-md-7">	
	<input type="text" name="subject" class="form-control" placeholder="Subject:"  required  value="<?php echo set_value('subject'); ?>">
	<?php  echo form_error('subject'); ?>
	</div>
	</div>	
		
	<div class="form-group">
	<label class="col-md-2 control-label">Message</label>
	<div class="col-md-7">	
	<textarea  cols="80" name="message"  id="area1" style="width:100%;height:250px;"   ><?php echo set_value('message'); ?></textarea> (Minimum 200 character needed )
	<?php  echo form_error('message'); ?>
	</div>
	</div>
	</div>
</div>	
	<div class="box-footer">
	<div class="pull-right">
				<button type="submit" class="btn btn-primary pull-right">Submit</button>
	</div>
	</div>
</form>	
</div><!-- /. box -->
	
	
</div><!-- /.col -->
</div><!-- /.row -->    
</section><!-- /.content -->   


	
</div>
<style type="text/css">
.error{color:red}
</style>
<?php $this->load->view("footer"); ?>

