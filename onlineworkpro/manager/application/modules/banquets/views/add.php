<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>

<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<a class="btn btn-primary" href="<?php echo site_url('banquets'); ?>"><i class="fa fa-backward"></i> Banquets</a>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Banquets</li>
</ol>
</section>

        <!-- Main content -->
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
            
            <div class="nav-tabs-custom">
           
<ul class="nav nav-tabs">
	<li class="active"><a href="#deals" data-toggle="tab">General</a></li>
    <li><a href="#term" data-toggle="tab">Term & Condition</a></li> 
   
</ul>

<form action="<?php echo site_url('deals/add'); ?>" method="post" role="form"  enctype="multipart/form-data">	
<div class="tab-content">
	
<div class="active tab-pane" id="deals">
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
                    <label>Capacity (No. of Guests)</label>       
	            <select name="capacity" id="capacity" class="form-control">
                   <?php for($i=1;$i<=2000;$i++){ ?>
                     <option  value="<?php echo $i; ?>"><?php echo $i; ?> Guests</option>
                     <?php }?>		        	             
	               </select>
 
                  </div>
                </div>
              </div>
              
              
 
              <div class="row"> 
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Default Image</label>
                  <input type="file" name="logo" id="logo" value="">
                  </div>
                
                </div>
              </div>

    
     <div class="box-footer">
     <a class="btn btn-primary pull-right" href="#term" data-trigger="tab">Next</a>

    </div>
    								
	</div>
</div>



<div class="tab-pane" id="term">
	<div class="box-body">
    
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label> Description</label>
               	<textarea name="COPYRIGHT" id="COPYRIGHT" class="form-control" placeholder="Enter Meta Description"></textarea>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Term & conditions</label>
               	<textarea name="COPYRIGHT" id="editor1" class="form-control" placeholder="Enter Friendly URL"></textarea>
                  </div>
                </div>
              </div>
              
    
   <div class="box-footer">
<button type="submit" class="btn btn-primary pull-right">Submit</button>
</div>
    
</div>


		
</div>
	
		
</form>	
	
</div>
            
              <!-- /.row -->
            </div><!-- /.box-body -->
            
          </div><!-- /.box -->

          <!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    <?php $this->load->view("footer"); ?>