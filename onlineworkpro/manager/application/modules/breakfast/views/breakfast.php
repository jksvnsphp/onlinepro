<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>
<?php  $menu = getMenu();//error_reporting(0); 

?>

<div class="content-wrapper" style="min-height: 916px;">
  <section class="content-header">
    <h1>Breakfast</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Breakfast</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
<div class="col-md-12">
<?php echo $this->session->flashdata('message'); ?>	

  
<div class="nav-tabs-custom">
	<ul class="nav nav-tabs">
    
 	<?php $i=0;foreach($menu as $key=>$menuvalue){
		if(strstr($menuvalue['menu_type'],'Breakfast'))
		{
		 ?>		  
	<li class="<?php if($i == 0){ echo "active"; } ?>">
		<a href="#category<?php echo $menuvalue['id']; ?>" data-toggle="tab"><?php echo $menuvalue['menu_name']; ?>		
		</a>
	</li>
	<?php $i++;}}?>	
    <li class="">
		<a href="#availability" data-toggle="tab">Availability </a>
	</li>
	</ul>
<form action="<?php echo site_url('breakfast/add'); ?>" method="post" role="form" class="" enctype="multipart/form-data">
	<div class="tab-content">
		<?php  $i=0;foreach($menu as $key=>$menuvalue){
			if(strstr($menuvalue['menu_type'],'Breakfast'))
		    { ?>	
            
	<div role="tabpanel" class="tab-pane <?php if($i == 0){ echo "active"; } ?>" id="category<?php echo $menuvalue['id']; ?>">
	
	
            <div class="box-body">
              
              <input type="hidden" name="food_type" value="Breakfast" />
             

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
                      <input type="text" class="form-control" name="avaliable_seats<?php  echo $menuvalue['id'];?>" id="avaliable_seats" value="<?php echo set_value('Open_Time',$breakfast_details[$i]['avaliable_seats']); ?>">
                      <?php  echo form_error('avaliable_seats'); ?>
                    </div>
                    <!-- /.input group --> 
                  </div>
                  </div>               
                  
                 <div class="col-md-3">
                    <div class="form-group">
                      <label>Time Interval</label>
                        <select name="time_interval<?php  echo $menuvalue['id'];?>" class="form-control">
                          <option <?php if($breakfast_details[$i]['time_interval']=='0.20'){echo "selected";}else {}?> value="0.20">0.20</option>
                          <option <?php if($breakfast_details[$i]['time_interval']=='0.30'){echo "selected";}else {}?> value="0.30">0.30</option>
                          <option <?php if($breakfast_details[$i]['time_interval']=='0.40'){echo "selected";}else {}?> value="0.40">0.40</option>
                          <option <?php if($breakfast_details[$i]['time_interval']=='0.50'){echo "selected";}else {}?> value="0.50">0.50</option>
                          <option <?php if($breakfast_details[$i]['time_interval']=='0.60'){echo "selected";}else {}?> value="0.60">0.60</option>
                        </select>
                     
                    </div>
                  </div>   
              </div>
                  
              <div class="row">   
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="checkbox" <?php if($breakfast_details[$i]['Sunday']=='Sunday'){echo "checked";}else {}?>  name="Sunday<?php  echo $menuvalue['id'];?>" id="Sunday<?php  echo $menuvalue['id'];?>" value="Sunday" onClick="displaysuntime(<?php  echo $menuvalue['id'];?>);" >
                      <label>  Sunday </label>
                    </div>
                  </div>               
                  
                <div id="suntime<?php  echo $menuvalue['id'];?>" style=" <?php if($breakfast_details[$i]['Sunday']=='Sunday'){echo "display:block";}else {echo "display:none";}?>">
                  <div class="col-md-3" >
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Open Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Open_Time_sun<?php  echo $menuvalue['id'];?>" id="Open_Time_sun" value="<?php echo set_value('Open_Time_sun',$breakfast_details[$i]['Open_Time_sun']); ?>">
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
                          <input type="text" class="form-control timepicker" name="Close_Time_sun<?php  echo $menuvalue['id'];?>" id="Close_Time_sun" value="<?php echo set_value('Close_Time',$breakfast_details[$i]['Close_Time']); ?>">
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
                        <input type="checkbox" <?php if($breakfast_details[$i]['Monday']=='Monday'){echo "checked";}else {}?>  name="Monday<?php  echo $menuvalue['id'];?>" id="Monday<?php  echo $menuvalue['id'];?>" value="Monday" onClick="displaymontime(<?php  echo $menuvalue['id'];?>);" >
                      <label>  Monday </label>
                    </div>
                  </div>               
                  
              <div id="montime<?php  echo $menuvalue['id'];?>" style=" <?php if($breakfast_details[$i]['Monday']=='Monday'){echo "display:block";}else {echo "display:none";}?>">
                  <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Open Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Open_Time_mon<?php  echo $menuvalue['id'];?>" id="Open_Time_mon" value="<?php echo set_value('Open_Time',$breakfast_details[$i]['Open_Time']); ?>">
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
                          <input type="text" class="form-control timepicker" name="Close_Time_mon<?php  echo $menuvalue['id'];?>" id="Close_Time_mon" value="<?php echo set_value('Close_Time',$breakfast_details[$i]['Close_Time']); ?>">
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
                        <input type="checkbox" <?php if($breakfast_details[$i]['Tuesday']=='Tuesday'){echo "checked";}else {}?>  name="Tuesday<?php  echo $menuvalue['id'];?>" id="Tuesday<?php  echo $menuvalue['id'];?>" value="Tuesday" onClick="displaytuetime(<?php  echo $menuvalue['id'];?>);" >
                      <label>  Tuesday </label>
                    </div>
                  </div>               
                  
                            
               <div id="tuetime<?php  echo $menuvalue['id'];?>" style=" <?php if($breakfast_details[$i]['Tuesday']=='Tuesday'){echo "display:block";}else {echo "display:none";}?>">
                  <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Open Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Open_Time_tue<?php  echo $menuvalue['id'];?>" id="Open_Time_tue" value="<?php echo set_value('Open_Time',$breakfast_details[$i]['Open_Time']); ?>">
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
                          <input type="text" class="form-control timepicker" name="Close_Time_tue<?php  echo $menuvalue['id'];?>" id="Close_Time_tue" value="<?php echo set_value('Close_Time',$breakfast_details[$i]['Close_Time']); ?>">
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
                        <input type="checkbox" <?php if($breakfast_details[$i]['Wednesday']=='Wednesday'){echo "checked";}else {}?>  name="Wednesday<?php  echo $menuvalue['id'];?>" id="Wednesday<?php  echo $menuvalue['id'];?>" value="Wednesday" onClick="displaywedtime(<?php  echo $menuvalue['id'];?>);" >
                      <label>  Wednesday </label>
                    </div>
                  </div>               
                  
               <div id="wedtime<?php  echo $menuvalue['id'];?>" style=" <?php if($breakfast_details[$i]['Wednesday']=='Wednesday'){echo "display:block";}else {echo "display:none";}?>">      
               
                  <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Open Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Open_Time_wed<?php  echo $menuvalue['id'];?>" id="Open_Time_wed" value="<?php echo set_value('Open_Time',$breakfast_details[$i]['Open_Time']); ?>">
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
                          <input type="text" class="form-control timepicker" name="Close_Time_wed<?php  echo $menuvalue['id'];?>" id="Close_Time_wed" value="<?php echo set_value('Close_Time',$breakfast_details[$i]['Close_Time']); ?>">
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
                        <input type="checkbox" <?php if($breakfast_details[$i]['Thursday']=='Thursday'){echo "checked";}else {}?>  name="Thursday<?php  echo $menuvalue['id'];?>" id="Thursday<?php  echo $menuvalue['id'];?>" value="Thursday" onClick="displaythutime(<?php  echo $menuvalue['id'];?>);" >
                      <label>  Thursday </label>
                    </div>
                  </div>               
                  
                <div id="thutime<?php  echo $menuvalue['id'];?>" style=" <?php if($breakfast_details[$i]['Thursday']=='Thursday'){echo "display:block";}else {echo "display:none";}?>">
                  <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Open Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Open_Time_thu<?php  echo $menuvalue['id'];?>" id="Open_Time_thu" value="<?php echo set_value('Open_Time',$breakfast_details[$i]['Open_Time']); ?>">
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
                          <input type="text" class="form-control timepicker" name="Close_Time_thu<?php  echo $menuvalue['id'];?>" id="Close_Time_thu" value="<?php echo set_value('Close_Time',$breakfast_details[$i]['Close_Time']); ?>">
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
                        <input type="checkbox" <?php if($breakfast_details[$i]['Friday']=='Friday'){echo "checked";}else {}?>  name="Friday<?php  echo $menuvalue['id'];?>" id="Friday<?php  echo $menuvalue['id'];?>" value="Friday" onClick="displayfritime(<?php  echo $menuvalue['id'];?>);" >
                      <label>  Friday </label>
                    </div>
                  </div>               
              <div id="fritime<?php  echo $menuvalue['id'];?>" style=" <?php if($breakfast_details[$i]['Friday']=='Friday'){echo "display:block";}else {echo "display:none";}?>">
                  <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Open Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Open_Time_fri<?php  echo $menuvalue['id'];?>" id="Open_Time_fri" value="<?php echo set_value('Open_Time',$breakfast_details[$i]['Open_Time']); ?>">
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
                          <input type="text" class="form-control timepicker" name="Close_Time_fri<?php  echo $menuvalue['id'];?>" id="Close_Time_fri" value="<?php echo set_value('Close_Time',$breakfast_details[$i]['Close_Time']); ?>">
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
                        <input type="checkbox" <?php if($breakfast_details[$i]['Saturday']=='Saturday'){echo "checked";}else {}?>  name="Saturday<?php  echo $menuvalue['id'];?>" id="Saturday<?php  echo $menuvalue['id'];?>" value="Saturday" onClick="displaysattime(<?php  echo $menuvalue['id'];?>);" >
                      <label>  Saturday </label>
                    </div>
                  </div>               
                  
               <div id="sattime<?php  echo $menuvalue['id'];?>" style=" <?php if($breakfast_details[$i]['Saturday']=='Saturday'){echo "display:block";}else {echo "display:none";}?>">
                  <div class="col-md-3">
                    <div class="bootstrap-timepicker">
                      <div class="form-group">
                        <label>Open Time</label>
                        <div class="input-group">
                          <input type="text" class="form-control timepicker" name="Open_Time_sat<?php  echo $menuvalue['id'];?>" id="Open_Time_sat" value="<?php echo set_value('Open_Time',$breakfast_details[$i]['Open_Time']); ?>">
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
                          <input type="text" class="form-control timepicker" name="Close_Time_sat<?php  echo $menuvalue['id'];?>" id="Close_Time_sat" value="<?php echo set_value('Close_Time',$breakfast_details[$i]['Close_Time']); ?>">
                          <div class="input-group-addon"> <i class="fa fa-clock-o"></i> </div>
                        </div>
                      </div>
                    </div>
                  </div>                  
                </div>
              </div>
              
            </div>

	</div>
    <?php $i++;} }?>
    
    <div role="tabpanel" class="tab-pane " id="availability">
   
               <div class="box-body">
               
               <div class="row">
                        <div class="col-lg-10 calander-data" >
                                <div class="calender-header">
                                    <div colspan="2"><span id="next" class="next" data-date="<?php echo $dates_in_calender['last_month']; ?>"><a href="javascript:void(0);">&lt;&lt;</a></span></div>
                                    <div colspan="3" id="current-month"><?php echo $dates_in_calender['cur_month'];?></div>
                                    
                                    <div colspan="2"><span id="prev" class="next" data-date="<?php echo $dates_in_calender['next_month']; ?>"><a href="javascript:void(0);">&gt;&gt;</a></span></div>
                                </div>
                                
                              <?php
                                echo '<div class="day-row">';
                                $it = 1;
								//print_r($dates_in_calender);
                                foreach ($dates_in_calender['holidays'] as $key => $calander) {
                                    if ($calander == 'un-available') {
                                        $class = 'red-bg';
                                    } 
                                    else if ($calander == 'master-un-available') {
                                        $class = 'grey-bg';
                                    } else {
                                        $class = 'green-bg';
                                    }
                                    echo '<div class="' . $class . '"><input type="hidden" name="available-days[' . $key . ']" value="' . $calander . '">' . substr($key, -2) . '</div>';
                                    
                                    if ($it % 7 == 0) {
                                        echo '<div style="clear:both"></div>';
                                    }

                                    $it++;
                                }
                                echo '</div>';
                                ?>
                               
                        </div>
                        </div>
               
               </div>
               
	</div>
    
	</div>
     <div class="box-footer">
              <button type="submit" class="btn btn-primary pull-right">Update Breakfast</button>
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



<!--calender script-->
<script>
    $(document).ready(function () {
         $("#start-time").timepicker({ timeFormat: 'h:i:sA' });;
          $("#closing-time").timepicker({ timeFormat: 'h:i:sA' });
        $(document).on('click', '.day-row div', function () {
            var class_name = $(this).attr('class');
            if ($(this).hasClass('green-bg')) {
                $(this).attr('class', 'red-bg');
                $(this).find('input').attr('value', 'un-available');
            }
            else if($(this).hasClass('red-bg')) {
                $(this).attr('class', 'green-bg');
                $(this).find('input').attr('value', 'available');
            }


        });
        $(document).on('click', '.next', function(){
            var sel_date = $(this).data('date');
            var hotel_id = '<?php echo $this->session->userdata('ResID');?>';
            var type_id = '1';
            $.ajax({
                url: "<?php echo site_url('breakfast/getmonth'); ?>",
                type: "POST",
                dataType: 'JSON',
                data: {type: 'single_calender', sel_date: sel_date, hotel_id: hotel_id, type_id:type_id},
                success: function (response) {   
                console.log(response.dates.holidays);                
                    var dates = response.dates.holidays;
                    $('#prev').data('date', response.dates.next_month);
                    $('#next').data('date', response.dates.last_month);
                    $('#current-month').html(response.dates.cur_month)
                    console.log(dates);
                    $(".day-row").html('');
                    var it = 1;
                    
                    $.each(dates, function (k, v) {
                       if (v == 'un-available') {
                            clas = 'red-bg';
                        } 
                        else if (v == 'master-un-available') {
                            clas = 'grey-bg';
                        } else {
                            clas = 'green-bg';
                        }
                        $(".day-row").append('<div class="'+clas+'"><input type="hidden" value="'+v+'" name="available-days['+k+']">' + k.slice(-2) + '</div>');
                        if (it % 7 == 0) {
                            $(".day-row").append('<div style="clear:both"></div>');
                        }
                        it++;
                        
                     });
                }
            });
        });

    });

</script>