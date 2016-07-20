	<footer class="main-footer">
	<strong>Copyright &copy; 2015-2016 
		<a href="http://amigainformatics.com/" target="__blank">Amiga Informatics</a>.</strong> All rights reserved.
	</footer>

	<div class="control-sidebar-bg"></div>
    </div>
   
    <script>
      $(function () {
        $(".customers2").DataTable();
        $("#customers2").DataTable();
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
<!-- Cuisine date picker selection-->
 <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
  
  <script>
  $(function() {
    $( "#datepicker2" ).datepicker();
	
  });
  </script>
  <!--End Cuisine date picker selection-->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
 <!-- Resaturant menu selection-->
  <script type="text/javascript">

$(document).ready(function(){
	
	$(function(){
   $(document).on('click','#display_checkbox',function(){
      if($(this).prop('checked')) {
		
            $( "#menu" ).show();
      } else {
             $( "#menu" ).hide();
      }
   });
});
	
	});
	

</script>
	 <!--End Resaturant menu selection-->
     
     
     <!-- Resaturant menu selection-->
  <script type="text/javascript">

$(document).ready(function(){	
	$(function(){
   $(document).on('click','#display_checkbox1',function(){
	 
      if($(this).prop('checked')) {
		
            $( "#menu1" ).show();
      } else {
             $( "#menu1" ).hide();
      }
   });
});
	
	});
	

</script>
	 <!--End Resaturant menu selection-->
     
           <!-- Resaturant Gift table selection-->
      <script>
   function showgift(str)
   {
	
	   var giftvalue=str;
	   if(giftvalue==0)
	   {
		 document.getElementById("displaygift").style.display = "none";
		}
		else
		{
			 document.getElementById("displaygift").style.display = "block";
		}
	 
	   }
</script>

  
	 <!--End Resaturant  Gift table selection-->
    
     
     
      <!-- Resaturant coupon code selection-->
      <script>
   function showcap(str)
   {
	   var capvalue=str;
	   if(capvalue==0)
	   {
		 document.getElementById("capdiscount").style.display = "none";
		}
		else
		{
			 document.getElementById("capdiscount").style.display = "block";
		}
	 
	   }
</script>

<script language="javascript" type="text/javascript">
function randomString() {
	var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
	var string_length = 8;
	var randomstring = '';
	for (var i=0; i<string_length; i++) {
		var rnum = Math.floor(Math.random() * chars.length);
		randomstring += chars.substring(rnum,rnum+1);
	}
	document.randform.coupon_code.value = randomstring;
}
</script>
      
  
  
	 <!--End Resaturant  coupon code selection-->
     
     
    <!--Start Resaturant Next Tab selection--> 
  <script type="text/javascript">

$(document).ready(function(){
	
$( '[data-trigger="tab"]' ).click( function( e ) {
    var href = $( this ).attr( 'href' );
    e.preventDefault();
    $( '[data-toggle="tab"][href="' + href + '"]' ).trigger( 'click' );
} );
	});
	

</script>
      <!--End Resaturant Next Tab selection-->
     
   <!--  Add More add restautant-->
   <script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="col-md-12"> <input type="file" name="field_name[]" value="" style="margin-top: 13px;"/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="<?php echo base_url(); ?>common/icons/remove-icon.png" style="margin-left: 240px; margin-top: -34px;"/></a> </div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
    <!-- End add More-->
    
    
      <!--  Add More-->
   <script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button1'); //Add button selector
    var wrapper = $('.field_wrapper1'); //Input field wrapper
    var fieldHTML = '<div class="col-md-12"> <input type="file" name="field_name[]" value="" style="margin-top: 13px;"/><a href="javascript:void(0);" class="remove_button1" title="Remove field"><img src="<?php echo base_url(); ?>common/icons/remove-icon.png" style="margin-left: 240px; margin-top: -34px;"/></a> </div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button1', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
    <!-- End add More-->
      <!--Editor-->
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    
    <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
<!--Editor-->
      <!--demo-->
       <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>common/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url(); ?>common/bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>common/plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="<?php echo base_url(); ?>common/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?php echo base_url(); ?>common/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?php echo base_url(); ?>common/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>common/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url(); ?>common/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?php echo base_url(); ?>common/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="<?php echo base_url(); ?>common/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?php echo base_url(); ?>common/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo base_url(); ?>common/plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>common/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>common/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>common/dist/js/demo.js"></script>
    <!-- Page script -->
    
    
    
         <!--start old script -->
    <?php /*?>  <script src="<?php echo base_url(); ?>common/dist/js/app.min.js"></script>
    <script src="<?php echo base_url(); ?>common/dist/js/demo.js"></script>  <?php */?>
    <!-- DataTables -->
	<script type="text/javascript" src="<?php echo base_url(); ?>common/js/plugins/tableexport/tableExport.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>common/js/plugins/tableexport/jquery.base64.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>common/js/plugins/tableexport/jspdf/libs/sprintf.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>common/js/plugins/tableexport/jspdf/jspdf.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>common/js/plugins/tableexport/jspdf/libs/base64.js"></script>  

   	<link rel="stylesheet" href="<?php echo base_url(); ?>common/plugins/datatables/dataTables.bootstrap.css">
    <script src="<?php echo base_url(); ?>common/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>common/plugins/datatables/dataTables.bootstrap.min.js"></script>
    
	<script src="<?php echo base_url(); ?>common/datatable/dataTables.tableTools.js"></script>
	<script src="<?php echo base_url(); ?>common/datatable/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>common/datatable/jquery-ui.min.js"></script> 
      
 
     <!-- End old script -->
     
     
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-46680343-1', 'almsaeedstudio.com');
        ga('send', 'pageview');

    </script>
	 <!--end demo-->
    
     
  </body>
</html>
