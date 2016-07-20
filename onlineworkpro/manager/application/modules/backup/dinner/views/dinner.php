<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>
<?php  $menu = getMenu(); ?>

<div class="content-wrapper" style="min-height: 916px;">
  <section class="content-header">
    <h1>Dinner</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dinner</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
<div class="col-md-12">
<div class="nav-tabs-custom">
	<ul class="nav nav-tabs">
    
 	<?php $i=0;foreach($menu as $key=>$menuvalue){
		if(strstr($menuvalue['menu_type'],'Dinner'))
		{ 
		 ?>		  
	<li class="<?php if($i == 0){ echo "active"; } ?>">
		<a href="#category<?php echo $menuvalue['id']; ?>" data-toggle="tab"><?php echo $menuvalue['menu_name']; ?>
		<?php /*?><span onclick="menuvalue('<?php echo $menuvalue['id']; ?>')" >&nbsp;&nbsp;<i class="fa fa-trash-o"></i></span><?php */?>
		</a>
	</li>
	<?php $i++; }}?>	
	</ul>
<form action="<?php echo site_url('dinner/add'); ?>" method="post" role="form" class="" enctype="multipart/form-data">
	<div class="tab-content">
		<?php  $i=0;foreach($menu as $key=>$menuvalue){
			if(strstr($menuvalue['menu_type'],'Dinner'))
		    { ?>	
	<div role="tabpanel" class="tab-pane <?php if($i == 0){ echo "active"; } ?>" id="category<?php echo $menuvalue['id']; ?>">
	
	
            <div class="box-body">
              
              <input type="hidden" name="food_type" value="Dinner" />
             

                <input type="hidden" name="menuId[]" value="<?php  echo $menuvalue['id'];?>" />
                
                  
                  <div class="row"> 
                   <div class="col-md-3">
                  <div class="box-header">
                    <h3 class="box-title"><label><?php  echo $menuvalue['menu_name']; ?></label></h3>
                  </div>
                  </div>
                  
                    
                <div class="col-md-3">
                    <div class="form-group">
                    <label>No. Of seats</label>
                    <div class="input-group">
                      <input type="text" class="form-control" name="avaliable_seats<?php  echo $menuvalue['id'];?>" id="avaliable_seats" value="<?php echo set_value('Open_Time',$dinner_details[$i]['avaliable_seats']); ?>">
                      <?php  echo form_error('avaliable_seats'); ?>
                    </div>
                    <!-- /.input group --> 
                  </div>
                  </div>               
                  
                 <div class="col-md-3">
                    <div class="form-group">
                      <label>Time Interval</label>
                        <select name="time_interval<?php  echo $menuvalue['id'];?>" class="form-control">
                          <option <?php if($dinner_details[$i]['time_interval']=='0.20'){echo "selected";}else {}?> value="0.20">0.20</option>
                          <option <?php if($dinner_details[$i]['time_interval']=='0.30'){echo "selected";}else {}?> value="0.30">0.30</option>
                          <option <?php if($dinner_details[$i]['time_interval']=='0.40'){echo "selected";}else {}?> value="0.40">0.40</option>
                          <option <?php if($dinner_details[$i]['time_interval']=='0.50'){echo "selected";}else {}?> value="0.50">0.50</option>
                          <option <?php if($dinner_details[$i]['time_interval']=='0.60'){echo "selected";}else {}?> value="0.60">0.60</option>
                        </select>
                     
                    </div>
                  </div>   
              </div>
                  
              <div class="row">   
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="checkbox" <?php if($dinner_details[$i]['Sunday']=='Sunday'){echo "checked";}else {}?>  name="Sunday<?php  echo $menuvalue['id'];?>" id="Sunday<?php  echo $menuvalue['id'];?>" value="Sunday" onClick="displaysuntime(<?php  echo $menuvalue['id'];?>);" >
                      <label>  Sunday </label>
                    </div>
                  </div>               
                  
                <div id="suntime<?php  echo $menuvalue['id'];?>" style=" <?php if($dinner_details[$i]['Sunday']=='Sunday'){echo "display:block";}else {echo "display:none";}?>">
                  <div class="col-md-3" >
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Open Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Open_Time_sun<?php  echo $menuvalue['id'];?>" id="Open_Time_sun" value="<?php echo set_value('Open_Time_sun',$dinner_details[$i]['Open_Time_sun']); ?>">
                          <div class="input-group-addon"> <i class="fa fa-clock-o"></i> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Close Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Close_Time_sun<?php  echo $menuvalue['id'];?>" id="Close_Time_sun" value="<?php echo set_value('Close_Time',$dinner_details[$i]['Close_Time']); ?>">
                          <div class="input-group-addon"> <i class="fa fa-clock-o"></i> </div>
                        </div>
                      </div>
                    </div>
                  </div> 
                 </div>                 
                
              </div>
              
              <div class="row">   
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="checkbox" <?php if($dinner_details[$i]['Monday']=='Monday'){echo "checked";}else {}?>  name="Monday<?php  echo $menuvalue['id'];?>" id="Monday<?php  echo $menuvalue['id'];?>" value="Monday" onClick="displaymontime(<?php  echo $menuvalue['id'];?>);" >
                      <label>  Monday </label>
                    </div>
                  </div>               
                  
              <div id="montime<?php  echo $menuvalue['id'];?>" style=" <?php if($dinner_details[$i]['Monday']=='Monday'){echo "display:block";}else {echo "display:none";}?>">
                  <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Open Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Open_Time_mon<?php  echo $menuvalue['id'];?>" id="Open_Time_mon" value="<?php echo set_value('Open_Time',$dinner_details[$i]['Open_Time']); ?>">
                          <div class="input-group-addon"> <i class="fa fa-clock-o"></i> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Close Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Close_Time_mon<?php  echo $menuvalue['id'];?>" id="Close_Time_mon" value="<?php echo set_value('Close_Time',$dinner_details[$i]['Close_Time']); ?>">
                          <div class="input-group-addon"> <i class="fa fa-clock-o"></i> </div>
                        </div>
                      </div>
                    </div>
                  </div>                  
                </div>
              </div>
              
              <div class="row">   
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="checkbox" <?php if($dinner_details[$i]['Tuesday']=='Tuesday'){echo "checked";}else {}?>  name="Tuesday<?php  echo $menuvalue['id'];?>" id="Tuesday<?php  echo $menuvalue['id'];?>" value="Tuesday" onClick="displaytuetime(<?php  echo $menuvalue['id'];?>);" >
                      <label>  Tuesday </label>
                    </div>
                  </div>               
                  
                            
               <div id="tuetime<?php  echo $menuvalue['id'];?>" style=" <?php if($dinner_details[$i]['Tuesday']=='Tuesday'){echo "display:block";}else {echo "display:none";}?>">
                  <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Open Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Open_Time_tue<?php  echo $menuvalue['id'];?>" id="Open_Time_tue" value="<?php echo set_value('Open_Time',$dinner_details[$i]['Open_Time']); ?>">
                          <div class="input-group-addon"> <i class="fa fa-clock-o"></i> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Close Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Close_Time_tue<?php  echo $menuvalue['id'];?>" id="Close_Time_tue" value="<?php echo set_value('Close_Time',$dinner_details[$i]['Close_Time']); ?>">
                          <div class="input-group-addon"> <i class="fa fa-clock-o"></i> </div>
                        </div>
                      </div>
                    </div>
                  </div>                  
                </div>
              </div>
              
              <div class="row">   
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="checkbox" <?php if($dinner_details[$i]['Wednesday']=='Wednesday'){echo "checked";}else {}?>  name="Wednesday<?php  echo $menuvalue['id'];?>" id="Wednesday<?php  echo $menuvalue['id'];?>" value="Wednesday" onClick="displaywedtime(<?php  echo $menuvalue['id'];?>);" >
                      <label>  Wednesday </label>
                    </div>
                  </div>               
                  
               <div id="wedtime<?php  echo $menuvalue['id'];?>" style=" <?php if($dinner_details[$i]['Wednesday']=='Wednesday'){echo "display:block";}else {echo "display:none";}?>">      
               
                  <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Open Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Open_Time_wed<?php  echo $menuvalue['id'];?>" id="Open_Time_wed" value="<?php echo set_value('Open_Time',$dinner_details[$i]['Open_Time']); ?>">
                          <div class="input-group-addon"> <i class="fa fa-clock-o"></i> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Close Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Close_Time_wed<?php  echo $menuvalue['id'];?>" id="Close_Time_wed" value="<?php echo set_value('Close_Time',$dinner_details[$i]['Close_Time']); ?>">
                          <div class="input-group-addon"> <i class="fa fa-clock-o"></i> </div>
                        </div>
                      </div>
                    </div>
                  </div>                  
                </div>
              </div>
              
              <div class="row">   
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="checkbox" <?php if($dinner_details[$i]['Thursday']=='Thursday'){echo "checked";}else {}?>  name="Thursday<?php  echo $menuvalue['id'];?>" id="Thursday<?php  echo $menuvalue['id'];?>" value="Thursday" onClick="displaythutime(<?php  echo $menuvalue['id'];?>);" >
                      <label>  Thursday </label>
                    </div>
                  </div>               
                  
                <div id="thutime<?php  echo $menuvalue['id'];?>" style=" <?php if($dinner_details[$i]['Thursday']=='Thursday'){echo "display:block";}else {echo "display:none";}?>">
                  <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Open Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Open_Time_thu<?php  echo $menuvalue['id'];?>" id="Open_Time_thu" value="<?php echo set_value('Open_Time',$dinner_details[$i]['Open_Time']); ?>">
                          <div class="input-group-addon"> <i class="fa fa-clock-o"></i> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Close Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Close_Time_thu<?php  echo $menuvalue['id'];?>" id="Close_Time_thu" value="<?php echo set_value('Close_Time',$dinner_details[$i]['Close_Time']); ?>">
                          <div class="input-group-addon"> <i class="fa fa-clock-o"></i> </div>
                        </div>
                      </div>
                    </div>
                  </div>                  
                </div>
              </div>
              
              <div class="row">   
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="checkbox" <?php if($dinner_details[$i]['Friday']=='Friday'){echo "checked";}else {}?>  name="Friday<?php  echo $menuvalue['id'];?>" id="Friday<?php  echo $menuvalue['id'];?>" value="Friday" onClick="displayfritime(<?php  echo $menuvalue['id'];?>);" >
                      <label>  Friday </label>
                    </div>
                  </div>               
              <div id="fritime<?php  echo $menuvalue['id'];?>" style=" <?php if($dinner_details[$i]['Friday']=='Friday'){echo "display:block";}else {echo "display:none";}?>">
                  <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Open Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Open_Time_fri<?php  echo $menuvalue['id'];?>" id="Open_Time_fri" value="<?php echo set_value('Open_Time',$dinner_details[$i]['Open_Time']); ?>">
                          <div class="input-group-addon"> <i class="fa fa-clock-o"></i> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Close Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Close_Time_fri<?php  echo $menuvalue['id'];?>" id="Close_Time_fri" value="<?php echo set_value('Close_Time',$dinner_details[$i]['Close_Time']); ?>">
                          <div class="input-group-addon"> <i class="fa fa-clock-o"></i> </div>
                        </div>
                      </div>
                    </div>
                  </div>                  
                </div>
              </div>
              
              <div class="row">   
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="checkbox" <?php if($dinner_details[$i]['Saturday']=='Saturday'){echo "checked";}else {}?>  name="Saturday<?php  echo $menuvalue['id'];?>" id="Saturday<?php  echo $menuvalue['id'];?>" value="Saturday" onClick="displaysattime(<?php  echo $menuvalue['id'];?>);" >
                      <label>  Saturday </label>
                    </div>
                  </div>               
                  
               <div id="sattime<?php  echo $menuvalue['id'];?>" style=" <?php if($dinner_details[$i]['Saturday']=='Saturday'){echo "display:block";}else {echo "display:none";}?>">
                  <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Open Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Open_Time_sat<?php  echo $menuvalue['id'];?>" id="Open_Time_sat" value="<?php echo set_value('Open_Time',$dinner_details[$i]['Open_Time']); ?>">
                          <div class="input-group-addon"> <i class="fa fa-clock-o"></i> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Close Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Close_Time_sat<?php  echo $menuvalue['id'];?>" id="Close_Time_sat" value="<?php echo set_value('Close_Time',$dinner_details[$i]['Close_Time']); ?>">
                          <div class="input-group-addon"> <i class="fa fa-clock-o"></i> </div>
                        </div>
                      </div>
                    </div>
                  </div>                  
                </div>
              </div>
              
            </div>

	</div>
    <?php  $i++;  } }?>
	</div>
     <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right">Update Dinner</button>
            </div>
          </form>
</div>
</div></div>
    <!-- /.row --> 
  </section>
  <!-- /.content --> 
  
</div>
<?php $this->load->view("footer"); ?>
 <script type="text/javascript">

function displaysuntime(str) {
  //alert(str);
   var ss=str;
    if(document.getElementById("Sunday"+ss).checked == true) {
      document.getElementById("suntime"+ss).style.display = "block";
    }
    else  {
         document.getElementById("suntime"+ss).style.display = "none";
    }
}


function displaymontime(str) {
  //alert(str);
   var ss=str;
    if(document.getElementById("Monday"+ss).checked == true) {
      document.getElementById("montime"+ss).style.display = "block";
    }
    else  {
         document.getElementById("montime"+ss).style.display = "none";
    }
}


function displaytuetime(str) {
  //alert(str);
   var ss=str;
    if(document.getElementById("Tuesday"+ss).checked == true) {
      document.getElementById("tuetime"+ss).style.display = "block";
    }
    else  {
         document.getElementById("tuetime"+ss).style.display = "none";
    }
}

function displaywedtime(str) {
  //alert(str);
   var ss=str;
    if(document.getElementById("Wednesday"+ss).checked == true) {
      document.getElementById("wedtime"+ss).style.display = "block";
    }
    else  {
         document.getElementById("wedtime"+ss).style.display = "none";
    }
}

function displaythutime(str) {
  //alert(str);
   var ss=str;
    if(document.getElementById("Thursday"+ss).checked == true) {
      document.getElementById("thutime"+ss).style.display = "block";
    }
    else  {
         document.getElementById("thutime"+ss).style.display = "none";
    }
}

function displayfritime(str) {
  //alert(str);
   var ss=str;
    if(document.getElementById("Friday"+ss).checked == true) {
      document.getElementById("fritime"+ss).style.display = "block";
    }
    else  {
         document.getElementById("fritime"+ss).style.display = "none";
    }
}

function displaysattime(str) {
  //alert(str);
   var ss=str;
    if(document.getElementById("Saturday"+ss).checked == true) {
      document.getElementById("sattime"+ss).style.display = "block";
    }
    else  {
         document.getElementById("sattime"+ss).style.display = "none";
    }
}

</script>