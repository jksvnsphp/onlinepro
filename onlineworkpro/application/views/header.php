<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $Title;?></title>

<!-- Bootstrap -->
<link href="<?php echo base_url(); ?>common/front/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>common/front/css/custom.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script type="text/javascript" src="<?php echo base_url(); ?>common/front/js/jssor.slider.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!--main header-->
<header>
  <div class="container-fluid gutter mainheader">
    <nav class="navbar">
      <div class="container"> 
        
        <!-- Brand and toggle get grouped for better mobile display -->
        
        <div class="navbar-header page-scroll main-top-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
           <a class="navbar-brand m01" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>/upload/setting/<?php echo getsettingDetail('SITE_LOGO');?>" alt=""></a>
          
          <div class="col-md-5 col-sm-4 header-top-search">
            		<div id="sb-search" class="sb-search">
						<form>
							<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
							<input class="sb-search-submit" type="submit" value="">
							<span class="sb-icon-search"></span>
						</form>
					</div>
            </div>
          
          </div>
       
        <!-- Collect the nav links, forms, and other content for toggling -->
        
        <div class="collapse navbar-collapse header-top-search-main" id="bs-example-navbar-collapse-1">
          <div class="row">
            <div class="col-md-5 header-nav">
              <ul class="nav navbar-nav navbar-right top-nav">
                <li class="active"><a href="<?php echo base_url('deals'); ?>" class=""> Deals</a></li>
                <li><a href="#" class="">Events </a></li>
                <li><a href="<?php echo base_url('banquet'); ?>" class=""> Banquets</a></li>
                <li><a href="#" class=""> Caterers</a></li>
              </ul>
            </div>
            <div class="col-md-5" id="inner-search">
            <div id="custom-search-input" class="gutter">
                            <div class="input-group col-md-12">
                                <input type="text" class="  search-query form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
            </div>
            <!--<div class="col-md-5 col-sm-4 header-top-search">
            		<div id="sb-search" class="sb-search">
						<form>
							<input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
							<input class="sb-search-submit" type="submit" value="">
							<span class="sb-icon-search"></span>
						</form>
					</div>
            </div>-->
            <div class="col-md-1 padd-right">
              <button class="btn btn-primary  pull-right header-top-signup">SIGN UP</button>
            </div>
          </div>
        </div>
        
        <!-- /.navbar-collapse --> 
        
      </div>
      
      <!-- /.container-fluid --> 
      
    </nav>
  </div>
</header>
