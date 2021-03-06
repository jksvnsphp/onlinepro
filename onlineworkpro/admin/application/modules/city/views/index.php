<?php $this->load->view("header");?>

<?php $this->load->view("navigation");?>


<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('city/add'); ?>"><i class="fa fa-plus-circle"></i> Add New City</a>
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
<div class="box-header with-border">
	<h3 class="box-title">List of City</h3>
	
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
		<th>City</th>
		<th>State</th>
		<th>Status</th>
		<!--<th>Created On</th>
		<th>Updated On</th> -->
		<th>Operation</th>
		</tr>
	</thead>
	<tbody>	
		<?php
		
		foreach($city as $key=>$ct){ 
		?>			
		<tr>
		<td width="8%" style="text-align: center;"><?php echo $key+1; ?></td>
		<td><?php echo $ct['city']; ?></td>
		<td><?php echo $ct['state']; ?></td>
		<td>
			<?php 
				if($ct['is_active'] == 1){ 
					echo " active";
				}else{
					echo " In Active";
				}	
			?>
		</td>
		<!--<td><?php echo $ct['created_at']; ?></td>
		<td><?php echo $ct['modified_at']; ?></td>-->
		<td width="20%">
			<a class="btn btn-success" href="<?php echo site_url('city/edit/'.$ct['id']); ?>"><i class="fa fa-edit"></i> Edit</a>  
			<a class="btn btn-danger" href="<?php echo site_url('city/delete/'.$ct['id']); ?>" onclick="return confirm('Are you sure you want to delete')"><i class="fa fa-trash-o"></i> Delete</a>
		</td>
		</tr>   
		<?php }?>
	</tbody>
	</table>
</div>
</div>
	
	
</div><!-- /.col -->
</div><!-- /.row -->    
</section><!-- /.content -->   


	
</div>

<?php $this->load->view("footer"); ?>

