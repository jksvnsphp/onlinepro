<?php $this->load->view("admin/header");?>
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumbs-alt">
					<li><a href="<?php echo site_url('admin'); ?>">Dashboard</a></li>
					<li><a class="current" href="<?php echo site_url('admin/filemanager'); ?>"> English</a></li>
				</ul>
			</div>	
			<div class="col-sm-12">
				<section class="panel">
					<header class="panel-heading" style="padding: 10px;"> 
					</header>
					
				
					<div class="panel-body">
						<?php include_once(site_url('assets/filemanager/index.html')); ?>
					</div>
				</section>
			</div>    
		</div>
	</section>
</section>
<?php $this->load->view("admin/footer");?>
