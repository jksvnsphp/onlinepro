<?php $this->load->view("header");?>
<?php $this->load->view("navigation"); //error_reporting(0);?>

<div class="content-wrapper" style="min-height: 916px;">
  <section class="content-header">
    <h1>Mastercalander</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Mastercalander</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12"> <?php echo $this->session->flashdata('message'); ?>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Mastercalander</h3>
          </div>
          <div class="box-body">
          <form action="<?php echo site_url('mastercalander/add'); ?>" class="form-horizontal" method="post"> 
                    <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>">
                    
                    <div class="row">
                        <div class="col-lg-10 calander-data">
                                <div class="calender-header">
                                    <div colspan="2"><span id="next" class="next" data-date="<?php echo $dates_in_calender['last_month']; ?>"><a href="javascript:void(0);">&lt;&lt;</a></span></div>
                                    <div colspan="3" id="current-month"><?php echo $dates_in_calender['cur_month'];?></div>
                                    
                                    <div colspan="2"><span id="prev" class="next" data-date="<?php echo $dates_in_calender['next_month']; ?>"><a href="javascript:void(0);">&gt;&gt;</a></span></div>
                                </div>
                                
                                <?php
                                echo '<div class="day-row">';
                                $it = 1;
                                foreach ( $dates_in_calender['holidays'] as $key => $calander) {
                                    if ($calander == 'master-un-available') {
                                        $class = 'red-bg';
                                    } else {
                                        $class = 'green-bg';
                                    }
                                    echo '<div class="' . $class . '"><input type="hidden" name="available-days[' . $key . ']" value="' . $calander . '">' . $key . '</div>';
                                    if ($it % 7 == 0) {
                                        echo '<div style="clear:both"></div>';
                                    }

                                    $it++;
                                }
                                echo '</div>';
                                ?>
                               
                        </div>
                        </div>
                       
                       
                              <div class="box-footer">
<button type="submit" class="btn btn-primary pull-right">Submit</button>
</div>
                     
                    </div>
                  
                </form>
                 </div>
        </div>
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
  </section>
  <!-- /.content --> 
  
</div>
<?php $this->load->view("footer"); ?>


<script>
    $(document).ready(function () {
        $(document).on('click', '.day-row div', function () {
			
            var class_name = $(this).attr('class');
            if ($(this).hasClass('green-bg')) {
                $(this).attr('class', 'red-bg');
                $(this).find('input').attr('value', 'master-un-available');
            }
            else {
                $(this).attr('class', 'green-bg');
                $(this).find('input').attr('value', 'available');
            }

        });
    });
        $(document).on('click', '.next', function(){
			//alert("ccc");
            var sel_date = $(this).data('date');
            var hotel_id = '<?php echo $this->session->userdata('ResID');?>';
			//alert(sel_date);
            $.ajax({
                url: "<?php echo site_url('mastercalander/getmonth'); ?>",
                type: "POST",
                dataType: 'JSON',
                data: {type: 'master_calender', sel_date: sel_date, hotel_id: hotel_id},
                success: function (response) {
                    var dates = response.dates.holidays;
                    $('#prev').data('date', response.dates.next_month);
                    $('#next').data('date', response.dates.last_month);
                    $('#current-month').html(response.dates.cur_month)
                    console.log(dates);
                    $(".day-row").html('');
                    var it = 1;
                    $.each(dates, function (k, v) {
                       if (v == 'master-un-available') {
                            clas = 'red-bg';
                        } else {
                            clas = 'green-bg';
                        }
                        $(".day-row").append('<div class="'+clas+'"><input type="hidden" value="'+v+'" name="available-days['+k+']">' + k + '</div>');
                        if (it % 7 == 0) {
                            $(".day-row").append('<div style="clear:both"></div>');
                        }
                        it++;
                        
                     });
                }
            });
        });

  

</script>