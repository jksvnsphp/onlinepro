<?php $this->load->view("header");?>
<?php $this->load->view("navigation"); ?>


<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<h1>Dashboard</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Dashboard</li>
</ol>
</section>
	
<section class="content">
<p> Welcome to Dashboard</p>	

<div class="row">
	<div class="col-lg-3 col-xs-6">
	<div class="small-box bg-yellow">
	<div class="inner">
	<h3>14</h3>
	<p>Total Hotal</p>
	</div>
	<div class="icon">
	<i class="ion ion-document-text"></i>
	</div>
	<a href="#" class="small-box-footer">Hotal </a>
	</div>
	</div>
	
	<div class="col-lg-3 col-xs-6">
	<div class="small-box bg-aqua">
	<div class="inner">
	<h3><?php //echo $ordercount; ?> 5</h3>
	<p>Total Order</p>
	</div>
	<div class="icon">
	<i class="ion ion-bag"></i>
	</div>
	<a href="#" class="small-box-footer">Order </a>
	</div>
	</div>

	<div class="col-lg-3 col-xs-6">
	<div class="small-box bg-red">
	<div class="inner">
	<h3><?php //echo $pagecount; ?> 6</h3>
	<p>Total User</p>
	</div>
	<div class="icon">
	<i class="ion ion-person-add"></i>
	</div>
	<a href="#" class="small-box-footer">User </a>
	</div>
	</div>
	
	<div class="col-lg-3 col-xs-6">
	<div class="small-box bg-blue">
	<div class="inner">
	<h3><?php //echo $subscribercount; ?>$ 105.00</h3>
	<p>Total Earn</p>
	</div>
	<div class="icon">
	<i class="ion ion-android-mail"></i>
	</div>
	<a href="#" class="small-box-footer">Earn </a>
	</div>
	</div>

	
</div>	
</section>

</div>


<?php $this->load->view("footer"); ?>

