<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>


<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('user/add'); ?>"><i class="fa fa-plus-circle"></i>  Add New User</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Add New User</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">

<?php echo $this->session->flashdata('message'); ?>	

<div class="box box-primary">
<div class="box-header with-border"><h3 class="box-title">List of Users</h3></div>
	
<div class="box-body">
	<table <?php if(!empty($get_users)){?>id="example1"<?php }?> class="table table-bordered table-striped">
	<thead>
		<tr>
		<th>Sr No.</th>
		<th>Name</th>
		<th>Email</th>
		<th>Created on</th>
		<th>Last Updated On</th>
		<th>Operation</th>
		</tr>
	</thead>
	<tbody>	
		<tr>
		<?php
		$i = 1;
		foreach($get_users as $users){ 
		?>	
		<td width="8%" style="text-align: center;"><?php echo $i; ?></td>
		<td><?php echo $users['name']; ?></td>
		<td><?php echo $users['email']; ?></td>
		<td><?php echo $users['created_date']; ?></td>
		<td><?php echo $users['updated_date']; ?></td>
		<td width="20%">
			<a class="btn btn-success" href="<?php echo site_url('user/edit/'.$users['id']); ?>"><i class="fa fa-edit"></i> Edit</a>  
			<a class="btn btn-danger" href="<?php echo site_url('user/delete/'.$users['id']); ?>" onclick="return confirm('Are you sure you want to delete')"><i class="fa fa-trash-o"></i> Delete</a>
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

