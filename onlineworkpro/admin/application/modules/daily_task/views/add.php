<?php $this->load->view("header");?>

<?php $this->load->view("navigation");?>

<div class="content-wrapper" style="min-height: 916px;">
	
	<section class="content-header">
	<a class="btn btn-primary" href="<?php echo site_url('daily_task'); ?>"><i class="fa fa-backward"></i>Back To Daily Task</a>
		<ol class="breadcrumb">
		<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Add New 	Daily Task</li>
		</ol>
	</section>
	
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<?php echo $this->session->flashdata('message'); ?>	
				<div class="box box-primary">
					<div class="box-header with-border"><h3 class="box-title">Add New Daily Task</h3></div>
						<form action="<?php echo site_url('daily_task/add'); ?>" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">	
							
							<div class="box-body">
								<div class="form-group">
								<label class="col-md-2 control-label">User</label>
									<div class="col-md-7">	
										<select class="form-control" name="user_id" id="user_id" >
											<option value="">--Select User--</option>
											<?php
											foreach($user as $man)
											{ 
												echo "<option value='".$man['user_id']."'>".$man['name']."</option>";
											} 
											?>
										</select>
									<?php echo form_error('user_id'); ?>	
									</div>
								</div>	
							</div>
							
							<div class="box-body">
								<div class="form-group">
								<label class="col-md-2 control-label">Plan</label>
									<div class="col-md-7">	
										<select class="form-control" name="plan_id" id="plan_id" >
											<option value="">--Select Plan--</option>
											<?php
											foreach($plan as $man)
											{ 
												echo "<option value='".$man['plan_id']."'>".$man['plan_name']."</option>";
											} 
											?>
										</select>
									<?php echo form_error('plan_id'); ?>	
									</div>
								</div>	
							</div>
							
							<div class="box-body">
								<div class="form-group">
								<label class="col-md-2 control-label">Task</label>
									<div class="col-md-7">	
										<select class="form-control" name="task_id" id="task_id" >
											<option value="">--Select Task--</option>
											<?php
											foreach($task as $man)
											{ 
												echo "<option value='".$man['task_id']."'>".$man['page_title']."</option>";
											} 
											?>
										</select>
									<?php echo form_error('task_id'); ?>	
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
