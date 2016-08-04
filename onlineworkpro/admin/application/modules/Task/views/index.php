<?php $this->load->view("header");?>

<?php $this->load->view("navigation");?>


<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('task/add'); ?>"><i class="fa fa-plus-circle"></i> Add New Task</a>
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
<div class="box-header with-border">
	<h3 class="box-title">List of Task</h3>
	
	<div class="btn-group pull-right">
	<button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
	<ul class="dropdown-menu">
		<li><a href="#" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src='<?php echo base_url(); ?>common/icons/csv.png' width="24"/> CSV</a></li>
		<li><a href="#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='<?php echo base_url(); ?>common/icons/pdf.png' width="24"/> PDF</a></li>
		<li><a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='<?php echo base_url(); ?>common/icons/xls.png' width="24"/> XLS</a></li>
		<li class="divider"></li>
	</ul>
	</div>  	
</div>
	
<div class="box-body">
	<table id="customers2" class="table table-bordered table-striped">
	<thead>
		<tr>
		<th>Sr No.</th>
		<th>Page Title</th>
		<th>Page LInk</th>
		<th>Created At</th>
		<th>Status</th>
		<!--<th>Created On</th>
		<th>Updated On</th> -->
		<th>Operation</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 1;
		foreach($alltask as $st){ 
		?>			
		<tr>
		<td width="8%" style="text-align: center;"><?php echo $i; ?></td>
		<td><?php echo $st['page_title']; ?></td>
		<td><?php echo $st['page_link']; ?></td>
		<td><?php echo $st['create_date']; ?></td>
		<td>
			<?php 
				if($st['status'] == 'Active'){ 
					echo " active";
				}else{
					echo " In Active";
				}	
			?>
		</td>
		<!--<td><?php echo $st['created_at']; ?></td>
		<td><?php echo $st['modified_at']; ?></td>-->
		<td width="20%">
			<a class="btn btn-success" href="<?php echo site_url('task/edit/'.$st['task_id']); ?>"><i class="fa fa-edit"></i> Edit</a>  
			<a class="btn btn-danger" href="<?php echo site_url('task/delete/'.$st['task_id']); ?>" onclick="return confirm('Are you sure you want to delete')"><i class="fa fa-trash-o"></i> Delete</a>
		</td>
		</tr>   
		<?php $i++; }?>
	</tbody>
	</table>
</div>
</div>
	
	
</div><!-- /.col -->
</div><!-- /.row -->    
</section><!-- /.content -->   


	
</div>

<?php $this->load->view("footer"); ?>

