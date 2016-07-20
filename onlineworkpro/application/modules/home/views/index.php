<!DOCTYPE html>
<html>
  <head>    
    <meta charset="UTF-8">
    <title>Online WorkPro  Coming Soon </title>
    <meta name="description" content="Online WorkPro Coming Soon ">
    
    <!-- Mobile Specific Meta -->   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- Bootstrap -->
    <link href="<?php base_url();?>htmltemplate/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="<?php base_url();?>htmltemplate/assets/css/style.css">
    <link rel="stylesheet" href="<?php base_url();?>htmltemplate/assets/css/responsive.css">
    <link rel="stylesheet" href="<?php base_url();?>htmltemplate/assets/css/TimeCircles.css">

    <!-- Font Awesome -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Added google font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700|Lobster|Roboto+Slab:400,700' rel='stylesheet' type='text/css'>

    <!--Fav and touch icons-->
    <link rel="shortcut icon" href="<?php base_url();?>htmltemplate/assets/images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="<?php base_url();?>htmltemplate/assets/images/icons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php base_url();?>htmltemplate/assets/images/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php base_url();?>htmltemplate/assets/images/icons/apple-touch-icon-114x114.png">

	<!--[if IE 9]> 
    	<link rel="stylesheet" href="assets/css/ie9.css">
    <![endif]-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
 <body>
 <div class="bg">
	 <div class="bg-color">
		  <div class="container content">
	 
				<div class="row">
					<div class="sun clearfix">
						<div class="col-sm-12">
						   <h1>Online WorkPro </h1>
						   <h3>we are almost ready to</h3>
						   <h2>launch our website</h2>        
						</div>
						<div id="left-block" class="col-sm-4 text-center">
							<img class="img-responsive" src="<?php base_url();?>htmltemplate/assets/images/tab.png" alt="tab"/>
						</div>
						<div id="right-block" class="col-sm-8">
							<div class="row">
							   <div class="col-sm-offset-1 col-sm-10">
									<div class="timing">
										<div id="count-down" data-date="2016-08-12 00:00:00">
											
										</div>
									</div>
									<!-- /.timing -->
							   </div>
							</div>
							<div class="row">
							  <div class="col-sm-offset-2 col-sm-8">
								<p class="alert-success"></p>
								<p class="alert-warning"></p>
								<form class="newsletter-signup" role="form">
								  <div class="input-group">
									<input type="email" class="form-control" id="email" placeholder="info@onlineworkpro.com" required>
									<span class="input-group-btn">
									  <input type="submit" class="btn btn-default btn-sand" value="subscribe">
									</span>
								  </div><!-- /input-group -->
								</form>
							  </div>
							</div>                    
							<p class="followus"></p>
							<ul class="social-icon">
								<li><a href=""><i class="fa fa-camera-retro"></i></a></li>
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-youtube-square"></i></a></li>
							</ul>              
						</div>
					</div>
				</div>
			</div>
			<!-- .container end here -->
	 </div>
 </div>
   
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php base_url();?>htmltemplate/assets/js/bootstrap.min.js"></script>
    <script src="<?php base_url();?>htmltemplate/assets/js/TimeCircles.js"></script>
    <script src="<?php base_url();?>htmltemplate/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?php base_url();?>htmltemplate/assets/js/script.js"></script>
    <script src="<?php base_url();?>htmltemplate/assets/js/jquery.placeholder.js"></script>
    <script type="text/javascript">
    	$(function() {
				// Invoke the plugin
				$('input, textarea').placeholder();
			});
    </script>
    <script>
      $("#count-down").TimeCircles(
       {   
           circle_bg_color: "#8a7f71",
           use_background: true,
           bg_width: 1.0,
           fg_width: 0.02,
           time: {
                Days: { color: "#fefeee" },
                Hours: { color: "#fefeee" },
                Minutes: { color: "#fefeee" },
                Seconds: { color: "#fefeee" }
            }
       }
    );

    </script>
    
  </body>
</html>