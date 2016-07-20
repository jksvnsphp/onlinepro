<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php  echo $meta_title; ?></title>
<meta name="description" content="<?php  echo $meta_description; ?>">
<meta name="keywords" content="<?php  echo $meta_keyword; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="<?php echo base_url(); ?>common/front/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>common/front/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 
<script  type="text/javascript" src="<?php echo base_url(); ?>common/front/js/jquery-1.11.3.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>common/front/js/bootstrap.min.js"></script> 
<script  type="text/javascript" src="<?php echo base_url(); ?>common/front/js/zelect.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>common/front/validation/custom.validate.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>common/front/js/jquery-ui.js"></script>
<link href="<?php echo base_url(); ?>common/front/css/jquery-ui.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo base_url(); ?>common/front/validation/jquery.validate.min.js"></script>
<link href="<?php echo base_url(); ?>common/front/validation/custom.css" rel="stylesheet" type="text/css">

</head>
<body <?php  if($this->router->fetch_class()!='home'){ ?>id="bg"<?php } ?>>

<!-----------header Start---------------->
<header>
<nav class="navbar navbar-default navbar-fixed-top">
<div class="container">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> 
			<span class="sr-only">Toggle navigation</span> 
			<span class="icon-bar"></span> 
			<span class="icon-bar"></span> 
			<span class="icon-bar"></span> 
		</button>
		<a class="navbar-brand" href="<?php echo site_url(); ?>">
			<img src="<?php echo SITE_URL; ?>upload/setting/<?php echo $this->Common_model->getDetails("SITE_LOGO"); ?>" />
		</a> 
	</div>

	<div id="navbar" class="navbar-collapse collapse">
		<ul class="nav navbar-nav navbar-right">
			<li>
				<a href="<?php echo site_url('hall'); ?>" title="Find a venue"> 
					<i class="fa fa-search"></i> Find a Venue <span>|</span>
				</a>
			</li>
			
			<li>
				<?php if( $this->session->userdata('vendor_login')){ ?>
					<a href="<?php echo site_url('vendor'); ?>"  title="dashboard" data-toggle="modal" > Dashboard</a>
				<?php }else{    ?>	
				<a href="#" title="list you venue" data-toggle="modal" data-target="#listyourvenue"> 
					<i class="fa fa-pencil"></i> List your Venue <span>|</span>
				</a>
				<?php	} ?>
			</li>
			
			
			<li><a href="#" title="Transaction"  data-toggle="modal" data-target="#Transaction"> <i class="fa transcation"></i>Transaction <span>|</span></a></li>
			
			
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true" title="Help " > 
					<i class="fa fa-life-ring"></i> Help <span></span>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="<?php echo site_url('page/view/how-it-works'); ?>"><?php echo $this->Common_model->getPageTitle("how-it-works"); ?></a>
					</li>
					<li><a href="<?php echo site_url('faq'); ?>">FAQs</a></li>
					<li><a href="<?php echo site_url('page/view/about-us'); ?>">About us</a></li>
					
				</ul>
			</li>
			
			<li>
				<?php if( $this->session->userdata('vendor_login')){ ?>
					<a href="<?php echo site_url('login/logout'); ?>" class="button" title="logout" data-toggle="modal" >Logout</a>
				<?php }else{    ?>
					<a href="#" class="button" title="login" data-toggle="modal" data-target="#loginModal">Hall Vendor Login</a>
				<?php	} ?>
			</li>
		</ul>
	</div>
</div>
</nav>
</header>
<!-----------header End---------------->
