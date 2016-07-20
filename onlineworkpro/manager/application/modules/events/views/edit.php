<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>


<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('events'); ?>"><i class="fa fa-backward"></i> Events</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active"> Events</li>
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
            </div><!-- /.box-header -->
            <div class="box-body">
          
           


<form action="<?php echo site_url('deals/add'); ?>" method="post" role="form"  enctype="multipart/form-data">	
<div class="tab-content">
	

	<div class="box-body">
		
        <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Hotal Name</label>
                   <select name="hotal_id" id="hotal_id" class="form-control">
                   <?php foreach($allHotel as $Hotel){ ?>
                     <option  value="<?php echo $Hotel['id']; ?>"><?php echo $Hotel['hotal_name']; ?></option>
                     <?php }?>		        	             
	               </select>
                  </div>
                </div>
                
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Restaurant Name</label>
                   <select name="hotal_id" id="hotal_id" class="form-control">
                   <?php foreach($allHotel as $Hotel){ ?>
                     <option  value="<?php echo $Hotel['id']; ?>"><?php echo $Hotel['hotal_name']; ?></option>
                     <?php }?>		        	             
	               </select>
                  </div>
                </div>
              </div>
              
              <div class="row"> 
              <div class="col-md-6">
                  <div class="form-group">
                    <label>Banquets Name</label>
                   <input type="text" name="deals_name" id="deals_name" value="" class="form-control" placeholder="Enter Deals name">
                  </div>
                
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Default Image</label>
                  <input type="file" name="logo" id="logo" value="">
                  </div>
                
                </div>
                
              </div>
              
              <div class="row"> 
              <div class="col-md-6">
                  <div class="form-group">
                    <label>Event date</label>
                    <input type="date" name="" id="datepicker" value="<?php echo set_value('mobile'); ?>" class="form-control" >
                  </div>                
                </div>
              </div>
 
              <div class="row"> 
                <div class="col-md-12">
                 
                  <div class="form-group">
                    <label>Description</label>       
	        	<textarea name="COPYRIGHT" id="editor1" class="form-control" placeholder="Enter Description" ></textarea>
 
                  </div>
                </div>
              </div>

    
     <div class="box-footer">
   <button type="submit" class="btn btn-primary pull-right">Submit</button>

    </div>
    								
	</div>


		
</form>	
	
</div>
            
              <!-- /.row -->
         <!-- /.box-body -->
            
          </div><!-- /.box-body -->
            
          </div><!-- /.box -->

          <!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.row -->    
</section><!-- /.content -->   
</div>

<?php $this->load->view("footer"); ?>
