<?php  $sess = getProfile(); ?>
<aside class="main-sidebar">
<section class="sidebar" style="height: auto;">
	<div class="user-panel" style="height: 60px;">
	<div class="pull-left image">
	<?php if($sess['profile_pic']){ ?>			
	<img src="<?php echo SITE_URL; ?>upload/profile/<?php echo $sess['profile_pic']; ?>" class="img-thumbnail" alt="User Image" style="padding: 1px;border-radius: 2px;height: 45px;">
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
        
        
        <li class="treeview">
		<a href=""><i class="fa fa-map-marker"></i><span>Location</span><i class="fa fa-angle-left pull-right"></i></a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo site_url('state'); ?>"><i class="fa fa-users"></i><span>State </span><i class="fa fa-angle-left pull-right"></i></a></li>
			<li><a href="<?php echo site_url('city'); ?>"><i class="fa fa-users"></i><span>City </span><i class="fa fa-angle-left pull-right"></i></a></li>
			<li><a href="<?php echo site_url('area'); ?>"><i class="fa fa-users"></i><span>Area </span><i class="fa fa-angle-left pull-right"></i></a></li>
			

		  </ul>			
		</li>
        
		<li class="treeview">
		<a href="<?php echo site_url('setting'); ?>"><i class="fa fa-gear"></i><span>Setting</span><i class="fa fa-angle-left pull-right"></i></a>
		</li>	
        
    <li class="treeview">
		<a href="<?php echo site_url('user'); ?>"><i class="fa fa-user" aria-hidden="true"></i> <span> Users</span><i class="fa fa-angle-left pull-right"></i></a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo site_url('user'); ?>"><i class="fa fa-circle-o"></i>  users</a></li> 
		  </ul>			
	</li>	
        
       
		
		<li class="treeview">
		<a href=""><i class="fa fa-send"></i><span>Pages</span><i class="fa fa-angle-left pull-right"></i></a>
		  <ul class="treeview-menu">
			<li><a href="<?php echo site_url('page'); ?>"><i class="fa fa-circle-o"></i> Page</a></li> 
		  </ul>			
		</li>	

	
		
       
       					
											
	</ul>
</section>
</aside>
