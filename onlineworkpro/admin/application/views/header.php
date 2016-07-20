<!DOCTYPE html>
<?php //error_reporting(0);?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Online workpro || <?php echo @$Title;?></title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<?php /*?>	<link rel="stylesheet" href="<?php echo base_url(); ?>common/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <link rel="stylesheet" href="<?php echo base_url(); ?>common/plugins/iCheck/all.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>common/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>common/dist/css/skins/_all-skins.min.css">  <?php */?>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>  	
    
    
    <!--demo-->
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>common/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>common/plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>common/plugins/datepicker/datepicker3.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>common/plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>common/plugins/colorpicker/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>common/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>common/plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>common/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>common/dist/css/skins/_all-skins.min.css">
    
  <!--end demo-->
     <script src="<?php echo base_url(); ?>common/editor/nicEdit.js"></script>
    </script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() {
			new nicEditor({fullPanel : true}).panelInstance('area1');
			new nicEditor({fullPanel : true}).panelInstance('area2');
			new nicEditor({fullPanel : true}).panelInstance('area3');
			new nicEditor({fullPanel : true}).panelInstance('area4');
			 });
  //]]>
  </script> 
  <style>.error{color: #FF3100;}</style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<header class="main-header">
	
<!-- start left header section --->	
<a href="<?php echo base_url(); ?>" class="logo">
<span class="logo-mini"><?php echo getSettingDetails('SITE_TITLE');?></span>
<span class="logo-lg"><?php echo getSettingDetails('SITE_TITLE');?></span>
</a>
<nav class="navbar navbar-static-top" role="navigation">
<a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
<span class="sr-only">Toggle navigation</span>
</a>
	
<?php  $profile = getProfile(); ?>

<!-- start right header section --->		
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
	<li class="user user-menu">
	<a href="<?php echo SITE_URL; ?>" target="__blank">
	<i class="fa fa-eye"></i>
	<span class="hidden-xs">View Website</span>
	</a>
	</li>	
	
	
	<li class="dropdown user user-menu">
	<a href="" class="dropdown-toggle" data-toggle="dropdown">
	<?php if($profile['profile_pic']){ ?>			
	<img src="<?php echo SITE_URL; ?>upload/profile/<?php echo $profile['profile_pic']; ?>" class="user-image" alt="User Image">
	<?php }else{?>	
	<img src="<?php echo SITE_URL; ?>upload/no-image.jpg" class="user-image" alt="User Image">
	<?php }?>			
	<span class="hidden-xs"><?php echo $profile['name']; ?></span>
	</a>
	<ul class="dropdown-menu">
	<!-- User image -->
	<li class="user-header">
	<?php if($profile['profile_pic']){ ?>	
	<img src="<?php echo SITE_URL; ?>upload/profile/<?php echo $profile['profile_pic']; ?>" class="img-circle" alt="User Image">
	<?php }else{?>	
	<img src="<?php echo SITE_URL; ?>upload/no-image.jpg" class="img-circle" alt="User Image">
	<?php }?>	
	<p>Welcome - <?php echo $profile['name']; ?></p>
	</li>
		
	<!-- Menu Footer-->
	<li class="user-footer">
	<div class="pull-left">
	<a href="<?php echo site_url('profile'); ?>" class="btn btn-default btn-flat">Profile</a>
	</div>
	<div class="pull-right">
	<a href="<?php echo site_url('admin/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
	</div>
	</li>
	</ul>
	</li>
</ul>
</div>
</nav>
</header>
