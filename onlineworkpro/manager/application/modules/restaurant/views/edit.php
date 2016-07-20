<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>
<script language="javascript" type="text/javascript">
	jQuery(document).ready(function($) { 
	
	$("#state_id").change(function()
	{
	
		var id=$(this).val(); 
		var dataString = 'id='+ id; 
		
		$.ajax({ 
		     type: "POST",
			 url: "<?php echo base_url('restaurant/checkstate');?>",
			 data: dataString,
			async: false,
			success: function(result)
			{ 
				if(result){
				
			$("#city_id").html(result);
				}
				
			}
			
		});

	});
});
</script>
<script language="javascript" type="text/javascript">
	jQuery(document).ready(function($) { 
	$("#city_id").change(function()
	{
		var id=$(this).val(); 
		var dataString = 'id='+ id; 		
		$.ajax({ 
		type: "POST",
			 url: "<?php echo base_url('restaurant/checkArea');?>",
			data: dataString,
			cache: false,
			success: function(result)
			{
			if(result){				
			$("#Area").html(result);
				}
				
			}
			
		});

	});
});
</script>
<script language="javascript" type="text/javascript">
	jQuery(document).ready(function($) { 
	$("#City_data").change(function()
	{
	
		var id=$(this).val(); 
	
		var dataString = 'id='+ id; 		
		$.ajax({ 
		type: "POST",
			 url: "<?php echo base_url('restaurant/fetchhotal');?>",
			data: dataString,
			cache: false,
			success: function(result)
			{
			
			if(result){				
			$("#hotal_id").html(result);
				}
				
			}
			
		});

	});
});
</script>

<div class="content-wrapper" style="min-height: 916px;">
  <section class="content-header"> <a class="btn btn-primary" href="<?php echo site_url('restaurant'); ?>"><i class="fa fa-backward"></i> Restaurant</a>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"> Restaurant</li>
    </ol>
  </section>
  <section class="content">
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title"></h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#restaurant" data-toggle="tab">General</a></li>
               <li ><a href="#menusection" data-toggle="tab">Menu</a></li>
            <li><a href="#time" data-toggle="tab">Time</a></li>
            <li><a href="#location" data-toggle="tab">Location</a></li>
            <li><a href="#information" data-toggle="tab">Contact & Information</a></li>
            <li><a href="#seo" data-toggle="tab">SEO Setting</a></li>
          </ul>
          <form action="<?php echo site_url('restaurant/edit/'.$restaurant['id'].''); ?>" method="post" role="form"  enctype="multipart/form-data">
            <div class="tab-content">
              <div class="active tab-pane" id="restaurant">
                <div class="box-body">
                  <div class="row">
                    <?php /*?><div class="col-md-6">
                      <div class="form-group">
                        <label></label>
                        <select name="Citydata"  id="City_data" class="form-control" data-placeholder="Select a City" style="width: 100%;">
                          <option  value=""> Search by City</option>
                          <?php  foreach($Fetchcity as $fct){ ?>
                          <option value="<?php echo $fct['id']; ?>"><?php echo $fct['city']; ?></option>
                          <?php }?>
                        </select>
                      </div>
                    </div><?php */?>
                    
                    <!--<div class="col-md-6">
                  <div class="form-group">
                    <label></label>
                  <select name="hotal_id" id="hotal_id" class="form-control select2">
                  <option  value="">Search by area</option>
                     <option  value="">Ashok Nager</option>
                     <option  value="">Laxmi Nager</option>
                            	             
	               </select>
                  </div>
                
                </div>--> 
                  </div>
            
                  <div class="row">
                    <div class="col-md-6" style="display:none">
                      <div class="form-group">
                        <label>Hotel Name</label>
                        <select name="hotal_id" id="hotal_id" class="form-control ">
                          <?php foreach($allHotel as $Hotel){ ?>
                          <option <?php if($Hotel['id'] == $restaurant['hotal_id'] ){ ?> selected <?php }?>  value="<?php echo $Hotel['id']; ?>"><?php echo $Hotel['hotal_name']; ?></option>
                          <?php }?>
                        </select>
                        <?php  echo form_error('hotal_id'); ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Restaurant Name</label>
                        <input type="text" name="restaurant_name" id="restaurant_name" value="<?php echo set_value('restaurant_name',$restaurant['restaurant_name'] ); ?>" class="form-control" placeholder="Enter Restaurant name">
                        <?php  echo form_error('restaurant_name'); ?>
                      </div>
                    </div>
                  </div>
                  
                  <hr />
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Cuisine</label>
                        <select class="form-control select2" multiple="multiple" name="cuisines[]" id="cuisines[]" data-placeholder="Select a Cuisine" style="width: 100%;">
                          <?php foreach($allCuisine as $Cus){ ?>
                          <option <?php if(strstr($restaurant['cuisines'],$Cus['Cuisines_name'])){ ?> selected <?php }?> value="<?php echo $Cus['Cuisines_name'];?>"><?php echo $Cus['Cuisines_name'];?></option>
                          <?php }?>
                        </select>
                        <?php  echo form_error('cuisines'); ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Type</label>
                        <select name="type" id="type" class="form-control">
                          <?php foreach($allType as $Type){ ?>
                          <option <?php if($restaurant['type']==$Type['type_name']){ ?> selected <?php }?> value="<?php echo $Type['type_name'];?>"><?php echo $Type['type_name'];?></option>
                          <?php }?>
                        </select>
                        <?php  echo form_error('type'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Seating</label>
                        <select class="form-control select2" multiple="multiple" name="seating[]" id="seating" data-placeholder="Select a Seating" style="width: 100%;">
                          <?php foreach($allSeating as $seat){ ?>
                          <option <?php if(strstr($restaurant['seating'],$seat['Seating_name'])){ ?> selected <?php }?> value="<?php echo $seat['Seating_name'];?>"><?php echo $seat['Seating_name'];?></option>
                          <?php }?>
                        </select>
                        <?php  echo form_error('seating'); ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Facilities</label>
                        <select class="form-control select2" multiple="multiple" data-placeholder="Select a Facilities" name="facilities[]" id="facilities" style="width: 100%;">
                          <?php foreach($allFacilities as $fac){ ?>
                          <option <?php if(strstr($restaurant['facilities'],$fac['Facilities_name'])){ ?> selected <?php }?> value="<?php echo $fac['Facilities_name'];?>"><?php echo $fac['Facilities_name'];?></option>
                          <?php }?>
                        </select>
                        <?php  echo form_error('facilities'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Tag</label>
                        <select class="form-control select2" multiple="multiple" data-placeholder="Select a Tag" name="tag[]" id="tag" style="width: 100%;">
                          <?php foreach($allTag as $Tag){ ?>
                          <option <?php if(strstr($restaurant['tag'],$Tag['Tag_name'])){ ?> selected <?php }?>  value="<?php echo $Tag['Tag_name'];?>"><?php echo $Tag['Tag_name'];?></option>
                          <?php }?>
                        </select>
                        <?php  echo form_error('tag'); ?>
                      </div>
                    </div>                    
                  </div>
                  
                  <hr />
                  
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Visitor Attraction</label>
                        <input type="text" name="Visitor_Attraction" id="Visitor_Attraction"  value="<?php echo set_value('Visitor_Attraction',$restaurant['Visitor_Attraction'] ); ?>" class="form-control" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>COST FOR TWO</label>
                        <input type="text" name="COST_FOR_TWO" id="COST_FOR_TWO" value="<?php echo set_value('COST_FOR_TWO',$restaurant['COST_FOR_TWO'] ); ?>" class="form-control" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" name="Longitude" id="Longitude"  value="<?php echo set_value('Longitude',$restaurant['Longitude'] ); ?>" class="form-control" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="Latitude" id="Latitude" value="<?php echo set_value('Latitude',$restaurant['Latitude'] ); ?>" class="form-control" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Available</label>
                        <input type="text" name="Available" id="Available"  value="<?php echo set_value('Available',$restaurant['Available'] ); ?>" class="form-control" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Not Available</label>
                        <input type="text" name="Not_Available" id="Not_Available" value="<?php echo set_value('Not_Available',$restaurant['Not_Available'] ); ?>" class="form-control" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <?php /*?><div class="col-md-6">
                      <div class="form-group">
                        <label>Status</label>
                        <select name="is_active" id="is_active" class="form-control">
                          <option <?php if($restaurant['is_active'] == 1){ ?> selected <?php }?> value="1">Active</option>
                          <option <?php if($restaurant['is_active'] == 0){ ?> selected <?php }?> value="0">In Active</option>
                        </select>
                      </div>
                    </div><?php */?>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="logo" id="logo" value="">
                        <input type="hidden" name="old_logo" value="<?php echo set_value('old_logo',$restaurant['logo'] ); ?>" />
                        <?php if($restaurant['logo']){ ?>
                        <img src="<?php echo SITE_URL; ?>upload/restaurant/<?php echo $restaurant['logo'] ?>" width="100"  style="border: 2px solid #6AC4EC;border-radius: 2px;">
                        <?php }else{?>
                        <img src="<?php echo SITE_URL; ?>upload/no-image.jpg" width="85" style="border: 2px solid #6AC4EC;border-radius: 2px;">
                        <?php }?>
                      </div>
                    </div>
                  </div>
                  <?php /*?><div class="row">
                    <div class="col-md-6">
                      <div class="box-header">
                        <h3 class="box-title">Booking Table</h3>
                      </div>
                      <div class="box-body">
                        <div class="form-group">
                          <div class="col-md-2">
                            <label>
                              <input type="radio" <?php if($restaurant['Booking'] == "Y"){ ?> checked <?php }?> name="Booking" id="Booking" value="Y" >
                              Yes </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="radio" <?php if($restaurant['Booking'] == "N"){ ?> checked <?php }?> name="Booking" id="Booking1" value="N" >
                              No </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="box-header">
                        <h3 class="box-title">Serves</h3>
                      </div>
                      <div class="box-body"> 
                        <!-- radio -->
                        <div class="form-group">
                          <div class="col-md-3">
                            <label>
                              <input type="radio" <?php if($restaurant['Serves'] == 'Veg'){ ?> checked <?php }?> name="Serves" id="Serves" value="Veg"  >
                              Veg </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input type="radio" <?php if($restaurant['Serves'] == 'Non-Veg'){ ?> checked <?php }?> name="Serves" id="Serves1" value="Non-Veg" >
                              Non-Veg </label>
                          </div>
                          <div class="col-md-3">
                            <label>
                              <input type="radio" <?php if($restaurant['Serves'] == 'Both'){ ?> checked <?php }?> name="Serves" id="Serves2" value="Both" >
                              Both </label>
                          </div>
                        </div>
                      </div>
                      <!-- /.box-body --> 
                    </div>
                  </div><?php */?>
                  <?php /*?><div class="row">
                    <div class="col-md-6">
                      <div class="box-header">
                        <h3 class="box-title">Gift Table</h3>
                      </div>
                      <div class="box-body">
                        <div class="form-group">
                          <div class="col-md-2">
                            <label>
                              <input type="radio" <?php if($restaurant['Gift'] == 'Y'){ ?> checked <?php }?> name="Gift" id="Gift" value="Y" onclick="showgift(this.value)"  >
                              Yes </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="radio" <?php if($restaurant['Gift'] == 'N'){ ?> checked <?php }?> name="Gift" id="Gift1" value="N" onclick="showgift(this.value)" >
                              No </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="box-header">
                        <h3 class="box-title">Gift Voucher</h3>
                      </div>
                      <div class="box-body">
                        <div class="form-group">
                          <div class="col-md-2">
                            <label>
                              <input type="radio" <?php if($restaurant['Giftvoucher'] == 'Y'){ ?> checked <?php }?> name="Giftvoucher" id="Giftvoucher"  value="Y"   >
                              Yes </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="radio" <?php if($restaurant['Giftvoucher'] == 'N'){ ?> checked <?php }?> name="Giftvoucher" id="Giftvoucher1"  value="N"  >
                              No </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div><?php */?>
                  <?php /*?><div class="row">
                    <div class="col-md-6">
                      <div class="box-header">
                        <h3 class="box-title">Offer Claim</h3>
                      </div>
                      <div class="box-body">
                        <div class="form-group">
                          <div class="col-md-2">
                            <label>
                              <input type="radio" <?php if($restaurant['Offer_Claim'] == 'Y'){ ?> checked <?php }?> name="Offer_Claim" id="Offer_Claim" value="Y"   >
                              Yes </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="radio" <?php if($restaurant['Offer_Claim'] == 'N'){ ?> checked <?php }?> name="Offer_Claim" id="Offer_Claim1" value="N" >
                              No </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="box-header">
                      <h3 class="box-title">Event</h3>
                    </div>
                    <div class="box-body">
                      <div class="form-group">
                        <div class="col-md-2">
                          <label>
                            <input type="radio" <?php if($restaurant['Event'] =='Y'){ ?> checked <?php }else {}?> name="Event" id="Event" value="Y"   >
                            Yes </label>
                        </div>
                        <div class="col-md-2">
                          <label>
                            <input type="radio" <?php if($restaurant['Event'] == 'N'){ ?> checked <?php }?> name="Event" id="Event1" value="N" >
                            No </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div><?php */?>
                  <div class="box-footer"> <a class="btn btn-primary pull-right" href="#menusection" data-trigger="tab">Next</a> </div>
                </div>
              </div>
              
              
              <div class="tab-pane" id="menusection">
              <div class="box-body">
                <div class="row">
                <div class="col-md-12">
                 <h3 class="box-title">Menu Selection</h3>
                 </div>
                  <?php  foreach($getMenubyIDdata as $MenuvalueId){
					
					  $getmenuid[]= $MenuvalueId['menu_id'];
					  $getmenutype[]= $MenuvalueId['menu_type'];
					  $getmenuImage[]= $MenuvalueId['menu_image'];
					  }
			    // var_dump($getMenubyIDdata);
				//print_r($getmenuid).'</br>';
				//print_r($getmenutype).'</br>';
				//print_r($getmenuImage).'</br>';
					  ?>
                 
                 <?php 
				 $i= -1;
				  foreach($allMenu as $key=>$Menuvalue){  ?>
                 <?php if (in_array($Menuvalue['id'], $getmenuid,TRUE)){$i++;  ?><?php }?>
                 <div class="col-md-12">
                  <div class="col-md-3">                    
                    <div >
                      <div class="form-group">
                        <div>
                          <label>
                           <input name="menu_id[]" <?php if (in_array($Menuvalue['id'], $getmenuid,TRUE)){ ?> checked <?php }?> onClick="run(this.value);"   type="checkbox" id="dis<?php echo $Menuvalue['id'];?>" value="<?php echo $Menuvalue['id'];?>" />
                           <?php echo $Menuvalue['menu_name']; //echo $i; ?> </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-9" id="menu_<?php echo $Menuvalue['id'];?>" style=" <?php if (in_array($Menuvalue['id'], $getmenuid,TRUE)){ ?>display:block<?php } else {?>display:none<?php }?>" >
                  
                  
                  
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">                         
                            <div class="col-md-3">
                              <input type="Checkbox" <?php if(strstr(@$getmenutype[$i],"Breakfast")){ ?> checked <?php }?> name="menu_type<?php echo $Menuvalue['id'];?>[]" id="menu_type" value="Breakfast" >
                              Breakfast </div>
                            <div class="col-md-3">
                              <input type="Checkbox" <?php if(strstr(@$getmenutype[$i],"Lunch")){ ?> checked <?php }?> name="menu_type<?php echo $Menuvalue['id'];?>[]" id="menu_type" value="Lunch" >
                              Lunch </div>
                            <div class="col-md-3">
                              <input type="Checkbox" <?php if(strstr(@$getmenutype[$i],"Evining")){ ?> checked <?php }?> name="menu_type<?php echo $Menuvalue['id'];?>[]" id="menu_type" value="Evining" >
                              Evening </div>
                            <div class="col-md-3">
                              <input type="Checkbox" <?php if(strstr(@$getmenutype[$i],"Dinner")){ ?> checked <?php }?> name="menu_type<?php echo $Menuvalue['id'];?>[]" id="menu_type" value="Dinner" >
                              Dinner </div>
                            <?php echo form_error('is_active'); ?> </div>
                        </div>
                     
                      
                    </div>
                    
                   
                  </div>
                  </div>
                   <?php }?>
                  
                </div>
              <div class="clearfix"></div>
               <div class="box-footer"> <a class="btn btn-primary pull-right" href="#time" data-trigger="tab">Next</a> </div>
            </div>
            </div>
              
              <div class="tab-pane" id="time">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                      <h3 class="box-title"> Time</h3>
                    </div>
                    <div class="row">
                      <div class="col-md-6"> 
                        <!--<div class="box-header">
                      <h3 class="box-title">Day</h3>
                    </div>-->
                        <div class="box-body">
                          <div class="form-group"> 
                            <!--    <input type="checkbox" class="flat-red" name="Mon" id="Mon" value="Mon" >-->
                            <label>
                              <input type="checkbox"  name="shedule_day[]" id="Sun" value="Sun" >
                              Sun </label>
                            <label>
                              <input type="checkbox"  name="shedule_day[]" id="Mon" value="Mon" >
                              Mon </label>
                            <label>
                              <input type="checkbox"  name="shedule_day[]" id="Tue" value="Tue" >
                              Tue</label>
                            <label>
                              <input type="checkbox"  name="shedule_day[]" id="Wed" value="Wed" >
                              Wed </label>
                            <label>
                              <input type="checkbox"  name="shedule_day[]" id="Thu" value="Thu" >
                              Thu </label>
                            <label>
                              <input type="checkbox"  name="shedule_day[]" id="Fri" value="Fri" >
                              Fri </label>
                            <label>
                              <input type="checkbox"  name="shedule_day[]" id="Sat" value="Sat" >
                              Sat </label>
                          </div>
                          <input class="btn btn-primary pull-left" type="button" id="Add_Hours" value="Add Hours"/>
                          
                          <!--   <a class="btn btn-primary pull-left" href="#">Add Hours</a>--> 
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>24 Hours</label>
                            <div class="input-group">
                              <input type="checkbox" id="all_time" name="all_time" value="Hours" >
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="bootstrap-timepicker">
                            <div class="form-group">
                              <label>Open Time</label>
                              <div class="input-group">
                                <input type="text" class="form-control timepicker" name="Open_Time" id="Open_Time" value="<?php echo set_value('Open_Time'); ?>">
                                <div class="input-group-addon"> <i class="fa fa-clock-o"></i> </div>
                              </div>
                              <!-- /.input group --> 
                            </div>
                            <!-- /.form group --> 
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="bootstrap-timepicker">
                            <div class="form-group">
                              <label>Close Time</label>
                              <div class="input-group">
                                <input type="text" class="form-control timepicker" name="Close_Time" id="Close_Time" value="<?php echo set_value('Close_Time'); ?>">
                                <div class="input-group-addon"> <i class="fa fa-clock-o"></i> </div>
                              </div>
                              <!-- /.input group --> 
                            </div>
                            <!-- /.form group --> 
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php  //print_r($getResTime);
			 //  echo $getResTime['hotal_id'];
			   ?>
                    <div class="row" style=" <?php if($getResTime['Time_Sun']!=''){echo "display:block";}else{echo "display:none";} ?>" id="display_Sun">
                      <div class="col-md-12">
                        <div class="col-md-3">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> Sunday </label>
                                <input type="hidden" name="Sunday"  value="Sunday" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div >
                            <div class="form-group">
                              <div>
                                <input readonly="readonly" type="text" name="Time_Sun" id="Time_Sun" value="<?php echo set_value('Time_Sun',$getResTime['Time_Sun'] ); ?>" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> <a class="" id="Close_Sun" href="javascript:void(0)">Close</a> </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> <a  id="clear_Sun" href="javascript:void(0)">Clear</a> </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row" style=" <?php if($getResTime['Time_Mon']!=''){echo "display:block";}else{echo "display:none";} ?>" id="display_Mon">
                      <div class="col-md-12">
                        <div class="col-md-3">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> Monday </label>
                                <input type="hidden" name="Monday"  value="Monday" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div >
                            <div class="form-group">
                              <div>
                                <input readonly="readonly" type="text" name="Time_Mon" id="Time_Mon" value="<?php echo set_value('Time_Mon',$getResTime['Time_Mon'] ); ?>" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> <a class="" id="Close_Mon" href="javascript:void(0)">Close</a> </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> <a class="" id="clear_Mon" href="javascript:void(0)">Clear</a> </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row" style=" <?php if($getResTime['Time_Tue']!=''){echo "display:block";}else{echo "display:none";} ?>" id="display_Tue">
                      <div class="col-md-12">
                        <div class="col-md-3">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> Tuesday </label>
                                <input type="hidden" name="Tuesday"  value="Tuesday" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div >
                            <div class="form-group">
                              <div>
                                <input readonly="readonly" type="text" name="Time_Tue" id="Time_Tue" value="<?php echo set_value('Time_Tue',$getResTime['Time_Tue'] ); ?>" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> <a class="" id="Close_Tue" href="javascript:void(0)">Close</a> </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> <a class="" id="clear_Tue" href="javascript:void(0)">Clear</a> </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row" style=" <?php if($getResTime['Time_Wed']!=''){echo "display:block";}else{echo "display:none";} ?>" id="display_Wed">
                      <div class="col-md-12">
                        <div class="col-md-3">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> Wednesday </label>
                                <input type="hidden" name="Wednesday"  value="Wednesday" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div >
                            <div class="form-group">
                              <div>
                                <input readonly="readonly" type="text" name="Time_Wed" id="Time_Wed" value="<?php echo set_value('Time_Wed',$getResTime['Time_Wed'] ); ?>" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> <a class="" id="Close_Wed" href="javascript:void(0)">Close</a> </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> <a class="" id="clear_Wed" href="javascript:void(0)">Clear</a> </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row" style=" <?php if($getResTime['Time_Thu']!=''){echo "display:block";}else{echo "display:none";} ?>" id="display_Thu">
                      <div class="col-md-12">
                        <div class="col-md-3">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> Thursday </label>
                                <input type="hidden" name="Thursday"  value="Thursday" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div >
                            <div class="form-group">
                              <div>
                                <input readonly="readonly" type="text" name="Time_Thu" id="Time_Thu" value="<?php echo set_value('Time_Thu',$getResTime['Time_Thu'] ); ?>" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> <a class="" id="Close_Thu" href="javascript:void(0)">Close</a> </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> <a class="" id="clear_Thu" href="javascript:void(0)">Clear</a> </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row" style=" <?php if($getResTime['Time_Fri']!=''){echo "display:block";}else{echo "display:none";} ?>" id="display_Fri">
                      <div class="col-md-12">
                        <div class="col-md-3">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> Friday </label>
                                <input type="hidden" name="Friday"  value="Friday" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div >
                            <div class="form-group">
                              <div>
                                <input readonly="readonly" type="text" name="Time_Fri" id="Time_Fri" value="<?php echo set_value('Time_Fri',$getResTime['Time_Fri'] ); ?>" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> <a class="" id="Close_Fri" href="javascript:void(0)">Close</a> </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> <a class=""  id="clear_Fri" href="javascript:void(0)">Clear</a> </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row" style=" <?php if($getResTime['Time_Sat']!=''){echo "display:block";}else{echo "display:none";} ?>" id="display_Sat">
                      <div class="col-md-12">
                        <div class="col-md-3">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> Saturdy </label>
                                <input type="hidden" name="Saturdy"  value="Saturdy" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div >
                            <div class="form-group">
                              <div>
                                <input readonly="readonly" type="text" name="Time_Sat" id="Time_Sat" value="<?php echo set_value('Time_Sat',$getResTime['Time_Sat'] ); ?>" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> <a class="" id="Close_Sat" href="javascript:void(0)">Close</a> </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div >
                            <div class="form-group">
                              <div>
                                <label> <a class="" id="clear_Sat" href="javascript:void(0)">Clear</a> </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="box-footer"> <a class="btn btn-primary pull-right" href="#location" data-trigger="tab">Next</a> </div>
                </div>
              </div>
            
              <div class="tab-pane" id="location">
                <div class="box-body">
                  <div class="row">
                    <?php /*?><div class="col-md-6">
                  <div class="form-group">
                    <label>Region</label>
                  <select name="Region" id="Region" class="form-control">
		        <?php foreach($allRegion as $getRegion){ ?>
                        <option  value="<?php echo $getRegion['Group_name'];?>"><?php echo $getRegion['Group_name'];?></option>
                        <?php }?>	
	             </select>
                  </div>
                </div><?php */?>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>State/Region</label>
                        <select name="State" id="state_id" class="form-control">
                          <option  value="">Select State</option>
                          <?php foreach($allstate as $st){ ?>
                          <option  <?php  if($restaurant['State']==$st['id']){ echo 'selected="selected"';  }else{  } ?>   value="<?php echo $st['id']; ?>"><?php echo $st['state']; ?></option>
                          <?php }?>
                        </select>
                        <?php  echo form_error('State'); ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>City</label>
                        <select name="City" id="city_id" class="form-control" >
                          <?php foreach($allcity as $ct){ ?>
                          <option  <?php  if($restaurant['City']==$ct['id']){ echo 'selected="selected"';  }else{  } ?>   value="<?php echo $ct['id']; ?>"><?php echo $ct['city']; ?></option>
                          <?php }?>
                        </select>
                        <?php  echo form_error('City'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Area</label>
                        <select name="Area" id="Area" class="form-control">
                          <?php  foreach($allarea as $areadata){ ?>
                          <option  <?php  if($restaurant['Area']==$areadata['area']){ echo 'selected="selected"';  }else{  } ?>   value="<?php echo $areadata['area']; ?>"><?php echo $areadata['area']; ?></option>
                          <?php }?>
                        </select>
                        <?php  echo form_error('Area'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="row"> 
                   
                    
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <textarea name="Res_address" id="Res_address" class="form-control"><?php echo set_value('Res_address',$restaurant['Res_address'] ); ?></textarea>
                        <?php  echo form_error('Res_address'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="box-footer"> <a class="btn btn-primary pull-right" href="#information" data-trigger="tab">Next</a> </div>
                </div>
              </div>
              
              <div class="tab-pane" id="information">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Contact Name</label>
                        <input type="text" name="Contact_Name" id="Contact_Name" value="<?php echo set_value('Contact_Name',$restaurant['Contact_Name'] ); ?>" class="form-control" >
                        <?php  echo form_error('Contact_Name'); ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Contact NO.</label>
                        <input type="text" name="Contact_NO" id="Contact_NO" value="<?php echo set_value('Contact_NO',$restaurant['Contact_NO'] ); ?>" class="form-control" >
                        <?php  echo form_error('Contact_NO'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>CallUs No.</label>
                        <input type="text" name="CallUs" id="CallUs" value="<?php echo set_value('CallUs',$restaurant['CallUs'] ); ?>" class="form-control" >
                        <?php  echo form_error('CallUs'); ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Support Email</label>
                        <input type="text" name="Support_Email" id="Support_Email" value="<?php echo set_value('Support_Email',$restaurant['Support_Email'] ); ?>" class="form-control" >
                        <?php  echo form_error('Support_Email'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Contact Email</label>
                        <input type="text" name="Contact_Email" id="Contact_Email" value="<?php echo set_value('Contact_Email',$restaurant['Contact_Email'] ); ?>" class="form-control" >
                        <?php  echo form_error('Contact_Email'); ?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Order Email</label>
                        <input type="text" name="Order_Email" id="Order_Email" value="<?php echo set_value('Order_Email',$restaurant['Order_Email'] ); ?>" class="form-control" >
                        <?php  echo form_error('Order_Email'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="box-header">
                        <h3 class="box-title">Paypal</h3>
                      </div>
                      <div class="box-body">
                        <div class="form-group">
                          <div class="col-md-2">
                            <label>
                              <input type="radio" <?php if($restaurant['Paypal'] == 'Y'){ ?> checked <?php }?> name="Paypal" id="Paypal" value="Y" onclick="showPaypal(this.value)"  >
                              Yes </label>
                          </div>
                          <div class="col-md-2">
                            <label>
                              <input type="radio" <?php if($restaurant['Paypal'] == 'N'){ ?> checked <?php }?> name="Paypal" id="Paypal1" value="N" onclick="showPaypal(this.value)" >
                              No </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" id="displayPaypal" <?php if($restaurant['Paypal'] == 'Y'){ ?> style="display:block" <?php } else {?> style="display:none"<?php }?>>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Paypal Url</label>
                      <input type="text" name="Paypal_Url" id="Paypal_Url" value="<?php echo set_value('Paypal_Url',$restaurant['Paypal_Url'] ); ?>" class="form-control" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Paypal Email</label>
                      <input type="text" name="Paypal_Email" id="Paypal_Email" value="<?php echo set_value('Paypal_Email',$restaurant['Paypal_Email'] ); ?>" class="form-control" >
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-footer"> <a class="btn btn-primary pull-right" href="#seo" data-trigger="tab">Next</a> </div>
            </div>
            
            <div class="tab-pane" id="seo">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Meta Title</label>
                      <textarea name="Meta_Title" id="Meta_Title" class="form-control" placeholder="Enter Meta Title"><?php echo set_value('Meta_Title',$restaurant['Meta_Title'] ); ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Meta Tag</label>
                      <textarea name="Meta_Tag" id="Meta_Tag" class="form-control" placeholder="Enter Meta Tag"><?php echo set_value('Meta_Tag',$restaurant['Meta_Tag'] ); ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Meta Keyword</label>
                      <textarea name="Meta_Keyword" id="Meta_Keyword" class="form-control" placeholder="Enter Meta Keyword"><?php echo set_value('Meta_Keyword',$restaurant['Meta_Keyword'] ); ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Meta Description</label>
                      <textarea name="Meta_Description" id="Meta_Description" class="form-control" placeholder="Enter Meta Description"><?php echo set_value('Meta_Description',$restaurant['Meta_Description'] ); ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Friendly URL</label>
                      <textarea name="Friendly_URL" id="Friendly_URL" class="form-control" placeholder="Enter Friendly URL"><?php echo set_value('Friendly_URL',$restaurant['Friendly_URL'] ); ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary pull-right">Update</button>
                </div>
              </div>
            </div>
            
          </form>
        </div>
        
        <!-- /.row --> 
      </div>
      <!-- /.box-body --> 
      
    </div>
    <!-- /.box --> 
    
    <!-- /.row --> 
    
  </section>
  <!-- /.content --> 
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<?php $this->load->view("footer"); ?>
<script>
$(document).ready(function(){
	
	  /*******************************shedule days  checked section*******************************/
	
    $("#Add_Hours").click(function(){
		
		if($("#Sun").is(':checked'))		
		{
		
		if($("#Open_Time").val()=='24 Hours')
		{
		var op_time='24 Hours';
		}
		else
		{
		var op_time=$("#Open_Time").val() +" - " + $("#Close_Time").val();	
		}
		if($("#Time_Sun").val()!='' && $("#Time_Sun").val()!='Close' && op_time!= '24 Hours' && $("#Time_Sun").val()!='24 Hours')
		{
		 
		var op_time=$("#Time_Sun").val() +","+$("#Open_Time").val() +" - " + $("#Close_Time").val();		
		$("#Time_Sun").val(op_time);
		}
		else
		{
		$("#Time_Sun").val(op_time);
		}
        $("#display_Sun").show();
		$("#Sun").removeAttr('checked');
		}
		
		if($("#Mon").is(':checked'))		
		{
		if($("#Open_Time").val()=='24 Hours')
		{
		var op_time='24 Hours';
		}
		else
		{
		var op_time=$("#Open_Time").val() +" - " + $("#Close_Time").val();	
		}
		if($("#Time_Mon").val()!='' && $("#Time_Mon").val()!='Close' && op_time!= '24 Hours' && $("#Time_Mon").val()!='24 Hours')
		{
		 
		var op_time=$("#Time_Mon").val() +","+$("#Open_Time").val() +" - " + $("#Close_Time").val();		
		$("#Time_Mon").val(op_time);
		}
		else
		{
		$("#Time_Mon").val(op_time);
		}
		$("#Time_Mon").val(op_time);
        $("#display_Mon").show();
		$("#Mon").removeAttr('checked');	
		
		}
		
		
		if($("#Tue").is(':checked'))
		{
	    if($("#Open_Time").val()=='24 Hours')
		{
		var op_time='24 Hours';
		}
		else
		{
		var op_time=$("#Open_Time").val() +" - " + $("#Close_Time").val();	
		}
		
		if($("#Time_Tue").val()!='' && $("#Time_Tue").val()!='Close' && op_time!= '24 Hours' && $("#Time_Tue").val()!='24 Hours')
		{		 
		var op_time=$("#Time_Tue").val() +","+$("#Open_Time").val() +" - " + $("#Close_Time").val();		
		$("#Time_Tue").val(op_time);
		}
		else
		{
		$("#Time_Tue").val(op_time);
		}
		
		$("#Time_Tue").val(op_time);	
        $("#display_Tue").show();
		$("#Tue").removeAttr('checked');
		}
		
	    if($("#Wed").is(':checked'))
		{
		if($("#Open_Time").val()=='24 Hours')
		{
		var op_time='24 Hours';
		}
		else
		{
		var op_time=$("#Open_Time").val() +" - " + $("#Close_Time").val();	
		}
		
		if($("#Time_Wed").val()!='' && $("#Time_Wed").val()!='Close' && op_time!= '24 Hours' && $("#Time_Wed").val()!='24 Hours')
		{
		 
		var op_time=$("#Time_Wed").val() +","+$("#Open_Time").val() +" - " + $("#Close_Time").val();		
		$("#Time_Wed").val(op_time);
		}
		else
		{
		$("#Time_Wed").val(op_time);
		}
		
		$("#Time_Wed").val(op_time);	
        $("#display_Wed").show();
		$("#Wed").removeAttr('checked');
		}
		
		if($("#Thu").is(':checked'))
		{
	    if($("#Open_Time").val()=='24 Hours')
		{
		var op_time='24 Hours';
		}
		else
		{
		var op_time=$("#Open_Time").val() +" - " + $("#Close_Time").val();	
		}
		
		if($("#Time_Thu").val()!='' && $("#Time_Thu").val()!='Close' && op_time!= '24 Hours' && $("#Time_Thu").val()!='24 Hours')
		{
		 
		var op_time=$("#Time_Thu").val() +","+$("#Open_Time").val() +" - " + $("#Close_Time").val();		
		$("#Time_Thu").val(op_time);
		}
		else
		{
		$("#Time_Thu").val(op_time);
		}
		
		$("#Time_Thu").val(op_time);	
        $("#display_Thu").show();
		$("#Thu").removeAttr('checked');
		}
		
		if($("#Fri").is(':checked'))
		{
		if($("#Open_Time").val()=='24 Hours')
		{
		var op_time='24 Hours';
		}
		else
		{
		var op_time=$("#Open_Time").val() +" - " + $("#Close_Time").val();	
		}	
		
		if($("#Time_Fri").val()!='' && $("#Time_Fri").val()!='Close' && op_time!= '24 Hours' && $("#Time_Fri").val()!='24 Hours')
		{
		 
		var op_time=$("#Time_Fri").val() +","+$("#Open_Time").val() +" - " + $("#Close_Time").val();		
		$("#Time_Fri").val(op_time);
		}
		else
		{
		$("#Time_Fri").val(op_time);
		}
		
		
		$("#Time_Fri").val(op_time);	
        $("#display_Fri").show();
		$("#Fri").removeAttr('checked');
		}
		
		if($("#Sat").is(':checked'))
		{
		if($("#Open_Time").val()=='24 Hours')
		{
		var op_time='24 Hours';
		}
		else
		{
		var op_time=$("#Open_Time").val() +" - " + $("#Close_Time").val();	
		}
		
		if($("#Time_Sat").val()!='' && $("#Time_Sat").val()!='Close' && op_time!= '24 Hours' && $("#Time_Sat").val()!='24 Hours')
		{		 
		var op_time=$("#Time_Sat").val() +","+$("#Open_Time").val() +" - " + $("#Close_Time").val();		
		$("#Time_Sat").val(op_time);
		}
		else
		{
		$("#Time_Sat").val(op_time);
		}
			
		$("#Time_Sat").val(op_time);	
        $("#display_Sat").show();
		$("#Sat").removeAttr('checked');
		}
		
    });
	
	  /*******************************End shedule days  checked section*******************************/
	
	/*******************************Clear  Button section*******************************/
	
	  $("#clear_Sun").click(function(){
		 $("#Time_Sun").val("");
        $("#display_Sun").hide();		
       });
	   
	   $("#clear_Mon").click(function(){
		 $("#Time_Mon").val("");
        $("#display_Mon").hide();		
       });

      $("#clear_Tue").click(function(){
		  $("#Time_Tue").val("");
        $("#display_Tue").hide();		
       });
	   
	   $("#clear_Wed").click(function(){
		   $("#Time_Wed").val("");
        $("#display_Wed").hide();		
       });

       $("#clear_Thu").click(function(){
		   $("#Time_Thu").val("");
        $("#display_Thu").hide();		
       });
        
		$("#clear_Fri").click(function(){
		$("#Time_Fri").val("");
        $("#display_Fri").hide();		
       });

      $("#clear_Sat").click(function(){
		  $("#Time_Sat").val("");
        $("#display_Sat").hide();		
       });

	/*******************************End Clear  Button section*******************************/
	
	/*******************************Close  Button section*******************************/
	
	   $("#Close_Sun").click(function(){
       $("#Time_Sun").val("Close");		
       });
	   
	   $("#Close_Mon").click(function(){
        $("#Time_Mon").val("Close");		
       });

      $("#Close_Tue").click(function(){
       $("#Time_Tue").val("Close");			
       });
	   
	   $("#Close_Wed").click(function(){
       $("#Time_Wed").val("Close");		
       });

       $("#Close_Thu").click(function(){
       $("#Time_Thu").val("Close");		
       });
        
		$("#Close_Fri").click(function(){
       $("#Time_Fri").val("Close");			
       });

      $("#Close_Sat").click(function(){
       $("#Time_Sat").val("Close");			
       });

    /*******************************End Close  Button section*******************************/
	  
	  
	 
  
});
</script> 
<script>
 /*******************************24 Hours  checked section*******************************/
$('#all_time').change(function(){
	
        if (this.checked) {
		
        var ss=$("#Open_Time").val("24 Hours");
		 $("#Close_Time").val("24 Hours");	
        }
        else {
			
			 $("#Open_Time").val("");
		     $("#Close_Time").val("");	
         
        }                   
    });
	
	 /*******************************End 24 Hours  checked section*******************************/
</script> 
