<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>

<div class="content-wrapper">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('events/add'); ?>"><i class="fa fa-plus-circle"></i> Add New Events</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Add New Events</li>
</ol>
</section>	

<section class="content">
<div class="row">
<div class="col-xs-12">
	
<?php echo $this->session->flashdata('message'); ?>		

<div class="box box-primary">
<div class="box-header with-border">
	<h3 class="box-title">List of Events</h3>
	
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
		<th>S No</th>
		<th>Events Name</th>
		<th>Hotal Name</th>        
		<th>Status</th>
		<th>Operation</th>
		</tr>
	</thead>
	<tbody>
		<?php  foreach($allevents as $key=>$data){ ?>		
		<tr>
		<td><?php echo $key+1; ?></td>
		<td><?php //echo $data['events_name']; ?>Demo</td>
		<td><?php echo $data['hotal_name']; ?> </td>
		
		
		<td>
			<?php 
				if($data['is_active'] == 1){ 
					echo " active";
				}else{
					echo " In Active";
				}	
			?>
		</td>		
		<td><a class="btn btn-success" href="<?php  echo site_url('events/edit/'.$data['id']); ?>"><i class="fa fa-edit"></i> Edit</a>  
			<a class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete')"  href="<?php  echo site_url('events/delete/'.$data['id']); ?>"><i class="fa fa-trash-o"></i> Delete</a>
            	<a class="btn btn-primary"   href="<?php  echo site_url('gallery/category'); ?>"><i class="fa fa-picture-o"></i> Manage Gallery</a>
		</td>
		</tr>
		<?php  } ?>      
	</tbody>
	</table>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
     
<?php $this->load->view("footer");?>

