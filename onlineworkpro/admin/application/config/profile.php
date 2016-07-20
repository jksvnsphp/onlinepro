<?php if($this->session->userdata('lang_id') == 2){?>
<?php $this->load->view("header_arabic");?>
<?php $this->load->view("profile_arabic");?>
<?php $this->load->view("footer_arabic");?>
<?php }else {?>
<?php $this->load->view("header");?>

<!--occasion page-->
<div class="container" style="min-height: 600px;"><?php echo $this->session->flashdata('message'); ?>
    <div class="row profile">
		
		<div class="col-md-2" style="margin-top:64px;">
			<div class="profile-sidebar" >
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic" >
					<?php if($profile_details['profile_pic']){ ?>	
						<img src="<?php echo SITE_URL; ?>upload/profile/<?php echo $profile_details['profile_pic'] ?>" class="img-responsive" alt="">
					<?php }else{?>	
						<img src="<?php echo SITE_URL; ?>upload/no-image.jpg" class="img-responsive" alt="">
					<?php }?>
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name"><?php echo $profile_details['name']; ?></div>
					<div class="profile-usertitle-job"><a href="<?php echo site_url('order'); ?>"><?php echo $this->Common_model->getDetails('VIEW_ORDER');?></a></div>
				</div>
				<!-- END SIDEBAR USER TITLE -->

				<!-- SIDEBAR MENU -->
				
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-10">
            <div class="box box-primary">
			   <div class="">
				<div class="box-header with-border">
					<h2 class="box-title" style="font-size: 20px; margin: 0; text-align: left;"><?php echo $this->Common_model->getDetails('UPDATE_PROFILE');?></h2>
				</div><hr>
				<div class="box-body">
					<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="<?php echo site_url('profile/index'); ?>" method="post" role="form" style="display: block;" enctype="multipart/form-data">
									<div class="form-group">
										<input type="text" name="name" id="name"  class="form-control" placeholder="Name" value="<?php echo $profile_details['name']; ?>">
									</div>
                                    	<div class="form-group">
										<input type="password" name="password" id=""  class="form-control" placeholder="<?php echo $this->Common_model->getDetails('PASSWORD');?>" value="">
									</div>
                                    
                                    <div class="form-group">
										<input type="text" name="address" id="address"  class="form-control" placeholder="<?php echo $this->Common_model->getDetails('ADDRESS');?>" value="<?php echo $profile_details['address']; ?>">
									</div>
                                    
                                      <div class="form-group">
										<input type="text" name="email" id="email"  class="form-control" placeholder="<?php echo $this->Common_model->getDetails('EMAIL');?>" value="<?php echo $profile_details['email']; ?>">
									</div>
                                    <div class="form-group">
										<input type="text" name="mobile" id="mobile"  class="form-control" placeholder="<?php echo $this->Common_model->getDetails('MOBILE');?>" value="<?php echo $profile_details['mobile']; ?>">
									</div>
									<div class="form-group">		
										<label class="btn btn-primary" for="inputImage" title="Upload image file">
											<input type="file" class="hide" id="inputImage" name="file" accept="image/*"><?php echo $this->Common_model->getDetails('UPLOAD_IMAGE');?>	
										</label>
										<input type="hidden" name="old_image" value="<?php echo $profile_details['profile_pic'];?>">	
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 " style="margin-left: 199px;">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="<?php echo $this->Common_model->getDetails('UPDATE');?>">
											</div>
										</div>
									</div>
									
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		 </div>
	  </div>
	</div>

<!--occasion page end-->
</div>
    
  
<?php $this->load->view("footer"); ?>
<?php } ?>
