<?php  $sess = getProfile(); ?>
<?php  $menu = getMenu(); 
  //print_r($menu); 
 foreach($menu as $menuvalue)
   {	
      $vv[]=$menuvalue['menu_type'];
	}
	$ssmenu=implode('|',$vv);
	
	//print_r($vv);
	?>

<aside class="main-sidebar">
<section class="sidebar" style="height: auto;">
	<div class="user-panel" style="height: 60px;">
	<div class="pull-left image">
	<?php if($sess['profile_pic']){ ?>			
	<img src="<?php echo SITE_URL; ?>upload/manager/<?php echo $sess['profile_pic']; ?>" class="img-thumbnail" alt="User Image" style="padding: 1px;border-radius: 2px;height: 45px;">
	<?php }else{?>			
	<img src="<?php echo SITE_URL; ?>upload/no-image.jpg" class="img-thumbnail" alt="User Image" style="padding: 1px;border-radius: 2px;height: 45px;">
	<?php }?>	
	</div>
	<div class="pull-left info">
	<p><?php echo $sess['name']; ?></p>
	<a href=""><i class="fa fa-circle text-success"></i> Online</a>
	</div>
	</div>
			
	<ul class="sidebar-menu">
		<li class="header">MAIN NAVIGATION</li>
	<?php /*?>	
      <li class="treeview">     
	<a href="<?php echo site_url('hotal'); ?>"><i class="fa fa-h-square"></i><span>Hotel</span><i class="fa fa-angle-left pull-right"></i></a>    
		</li>	
     <?php */?>
      
       
         <li class="treeview">         
	<a href="<?php echo site_url('restaurant'); ?>"><i class="fa fa-cutlery"></i><span>Restaurant </span><i class="fa fa-angle-left pull-right"></i></a>  
		</li>	
        
         <li class="treeview">         
	<a href="<?php echo site_url('order'); ?>"><i class="fa fa-shopping-cart"></i><span>Order </span><i class="fa fa-angle-left pull-right"></i></a>  
		</li>	
        
         <li class="treeview">         
	<a href="<?php echo site_url('mastercalander'); ?>"><i class="fa fa-calendar-check-o"></i><span>Master Calander </span><i class="fa fa-angle-left pull-right"></i></a>  
		</li>
        
           <li class="treeview">
		<a href=""><i class="fa fa-cutlery"></i><span>Food</span><i class="fa fa-angle-left pull-right"></i></a>
		  <ul class="treeview-menu">
   <?php if(strstr($ssmenu,'Breakfast')){?>    
	<li><a href="<?php echo site_url('breakfast'); ?>"><i class="fa fa-cutlery"></i><span> Break Fast </span><i class="fa fa-angle-left pull-right"></i></a></li>
    <?php }?>
    <?php if(strstr($ssmenu,'Lunch')){?> 
    <li><a href="<?php echo site_url('lunch'); ?>"><i class="fa fa-cutlery"></i><span> Lunch </span><i class="fa fa-angle-left pull-right"></i></a></li>
      <?php }?>
    <?php if(strstr($ssmenu,'Evining')){?> 
    <li><a href="<?php echo site_url('evening'); ?>"><i class="fa fa-cutlery"></i><span> Evening </span><i class="fa fa-angle-left pull-right"></i></a></li>
      <?php }?>
    <?php if(strstr($ssmenu,'Dinner')){?> 
	<li><a href="<?php echo site_url('dinner'); ?>"><i class="fa fa-cutlery"></i><span> Dinner </span><i class="fa fa-angle-left pull-right"></i></a></li>
      <?php }?>
		
		  </ul>			
		</li>	
        
      
        
         <li class="treeview">         
	<a href="<?php echo site_url('gift'); ?>"><i class="fa fa-gift"></i><span>Our Offer </span><i class="fa fa-angle-left pull-right"></i></a>  
		</li>	
        
        <?php /*?> <li class="treeview">         
	<a href="<?php echo site_url('deals'); ?>"><i class="fa fa-delicious"></i><span>Deals </span><i class="fa fa-angle-left pull-right"></i></a>  
		</li>	
        
         <li class="treeview">         
	<a href="<?php echo site_url('banquets'); ?>"><i class="fa fa-bank"></i><span>Banquets </span><i class="fa fa-angle-left pull-right"></i></a>  
		</li>	<?php */?>
        
        <?php /*?> <li class="treeview">         
	<a href="<?php echo site_url('events'); ?>"><i class="fa fa-calendar"></i><span>Events </span><i class="fa fa-angle-left pull-right"></i></a>  
		</li>	<?php */?>
        
        <?php /*?>  <li class="treeview">         
	<a href="<?php echo site_url('catering'); ?>"><i class="fa fa-ship"></i><span>Catering </span><i class="fa fa-angle-left pull-right"></i></a>  
		</li>	
        
       
         <li class="treeview">     
	<a href="<?php echo site_url('cuisines'); ?>"><i class="fa fa-cutlery"></i><span>Cuisines</span><i class="fa fa-angle-left pull-right"></i></a>    
		</li>	
        
          <li class="treeview">     
	<a href="<?php echo site_url('facilities'); ?>"><i class="fa fa-car"></i><span>Facilities</span><i class="fa fa-angle-left pull-right"></i></a>    
		</li>	
        
         <li class="treeview">     
	<a href="<?php echo site_url('type'); ?>"><i class="fa fa-bars"></i><span>Type</span><i class="fa fa-angle-left pull-right"></i></a>    
		</li>	
        
         <li class="treeview">     
	<a href="<?php echo site_url('menu'); ?>"><i class="fa fa-cutlery"></i><span>Menu</span><i class="fa fa-angle-left pull-right"></i></a>    
		</li>	
        
        <li class="treeview">     
	<a href="<?php echo site_url('coupon'); ?>"><i class="fa fa-copyright"></i><span>Gift Voucher</span><i class="fa fa-angle-left pull-right"></i></a>    
		</li>
        
         <li class="treeview">     
	<a href="<?php echo site_url('gift'); ?>"><i class="fa fa-gift"></i><span>Offer </span><i class="fa fa-angle-left pull-right"></i></a>    
		</li>
        
          <li class="treeview">     
	<a href="<?php echo site_url('seating'); ?>"><i class="fa fa-copyright"></i><span>Seating</span><i class="fa fa-angle-left pull-right"></i></a>    
		</li>
        
         <li class="treeview">     
	<a href="<?php echo site_url('tag'); ?>"><i class="fa fa-gift"></i><span>Tag Managment</span><i class="fa fa-angle-left pull-right"></i></a>    
		</li>
        <?php */?>
        <li class="treeview">
		<a href=""><i class="fa fa-users"></i><span>User</span><i class="fa fa-angle-left pull-right"></i></a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo site_url('user'); ?>"><i class="fa fa-circle-o"></i> Customer</a></li>
			<?php /*?><li><a href="<?php echo site_url('manager'); ?>"><i class="fa fa-circle-o"></i> Manager</a></li><?php */?>
		  </ul>			
		</li>
        
       <?php /*?> <li class="treeview">
		<a href=""><i class="fa fa-map-marker"></i><span>Location</span><i class="fa fa-angle-left pull-right"></i></a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo site_url('state'); ?>"><i class="fa fa-users"></i><span>State </span><i class="fa fa-angle-left pull-right"></i></a></li>
			<li><a href="<?php echo site_url('city'); ?>"><i class="fa fa-users"></i><span>City </span><i class="fa fa-angle-left pull-right"></i></a></li>
			<li><a href="<?php echo site_url('area'); ?>"><i class="fa fa-users"></i><span>Area </span><i class="fa fa-angle-left pull-right"></i></a></li>
			<li><a href="<?php echo site_url('group'); ?>"><i class="fa fa-users"></i><span>Group</span><i class="fa fa-angle-left pull-right"></i></a></li>

		  </ul>			
		</li><?php */?>
        
		<?php /*?><li class="treeview">
		<a href="<?php echo site_url('setting'); ?>"><i class="fa fa-gear"></i><span>Setting</span><i class="fa fa-angle-left pull-right"></i></a>
		</li>	
        
        <li class="treeview">
		<a href="<?php echo site_url('sponsor'); ?>"><i class="fa fa-gift"></i><span>Sponsor</span><i class="fa fa-angle-left pull-right"></i></a>
		</li>	
		
		<li class="treeview">
		<a href="<?php echo site_url('social'); ?>"><i class="fa fa-child"></i><span>Social</span><i class="fa fa-angle-left pull-right"></i></a>
		</li>	
		
		<li class="treeview">
		<a href="<?php echo site_url('banner'); ?>"><i class="fa fa-sliders"></i><span>Banner</span><i class="fa fa-angle-left pull-right"></i></a>
		</li>	
		<?php */?>
     <?php /*?>   <li class="treeview">
		<a href="<?php echo site_url('mail'); ?>"><i class="fa fa-envelope"></i><span>Mail Templete</span><i class="fa fa-angle-left pull-right"></i></a>
		</li>	
        <?php */?>
        <li class="treeview">
		<a href=""><i class="fa fa-envelope"></i><span>Newsletter</span><i class="fa fa-angle-left pull-right"></i></a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo site_url('subscriber'); ?>"><i class="fa fa-circle-o"></i> Subscriber</a></li>
			<li><a href="<?php echo site_url('mailbox'); ?>"><i class="fa fa-circle-o"></i>Send Mail To Subscriber </a></li>
			<?php /*?><li><a href="<?php echo site_url('vendormail'); ?>"><i class="fa fa-circle-o"></i>Send Mail To Vendor </a></li>
			<li><a href="<?php echo site_url('usermail'); ?>"><i class="fa fa-circle-o"></i>Send Mail To User </a></li><?php */?>
		  </ul>			
		</li>
		
        <li class="treeview">
		<a href="<?php echo site_url('testimonials'); ?>"><i class="fa fa-sliders"></i><span>Testimonals</span><i class="fa fa-angle-left pull-right"></i></a>
		</li>	
		<?php /*?><li class="treeview">
		<a href=""><i class="fa fa-send"></i><span>Inbox</span><i class="fa fa-angle-left pull-right"></i></a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo site_url('message'); ?>"><i class="fa fa-circle-o"></i> Vendor  Message</a></li>
			<li><a href="<?php echo site_url('faq'); ?>"><i class="fa fa-circle-o"></i> FAQs</a></li>
		  </ul>			
		</li>		<?php */?>		
	<?php /*?>	
		<li class="treeview">
		<a href=""><i class="fa fa-send"></i><span>Blog</span><i class="fa fa-angle-left pull-right"></i></a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo site_url('blog'); ?>"><i class="fa fa-circle-o"></i> Blog</a></li>
			<li><a href="<?php echo site_url('comment'); ?>"><i class="fa fa-circle-o"></i> Comment</a></li>
		  </ul>			
		</li>		
				<?php */?>		
											
	</ul>
</section>
</aside>
