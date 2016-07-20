<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>

<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<h1>Restaurant Gallery </h1>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active"> Restaurant Gallery</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">
<div class="nav-tabs-custom">
	<ul class="nav nav-tabs">
 	  
	<li class="active">
		<a href="#category" data-toggle="tab"> Gallery Image
		
		</a>
	</li>

	</ul>

	<div class="tab-content">
	
	<div role="tabpanel" class="tab-pane active" id="category">
	
	<form action="<?php echo site_url('gallery/add/'.$resId); ?>" method="post" enctype="multipart/form-data" class="form-inline" style="margin: 20px 0;">
		<input type="hidden" name="Res_id" id="Res_id" value="<?php echo $resId;?>"/>

		<div class="form-group">
		<span class="btn btn-success fileinput-button">
		<i class="glyphicon glyphicon-plus"></i><span>Add files...</span>
		<input type="file" name="userfile[]" multiple="multiple" required>
		</span>
		</div>	
		
		<div class="form-group" style="margin-left: 20px;">
		<button type="submit" class="btn btn-primary start"><i class="glyphicon glyphicon-upload"></i><span>upload</span></button>
		</div>
	</form>
	
	<div class="row">
		<?php $allgallery = $this->Gallery_model->getGallery($resId);	 
		foreach($allgallery as $gallery){
		?>
		<div class="col-md-2">
		<div class="thumbnail">
		<img src="<?php echo SITE_URL; ?>upload/gallery/<?php echo $gallery['image']; ?>" alt="" class="gallery_img">	
		<span  onclick="deleteImage('<?php echo $gallery['id']; ?>')" class="closeic"><a href"#"></a><i class="fa fa-close"></i></a></span>		
		</div>
		</div>
		<?php }?>
	</div>

	</div>
	


	</div>
</div>
</div></div>
</section>

</div>


<?php $this->load->view("footer"); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>common/jquery.fileupload.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>common/jquery.fileupload-ui.css">

<style>


/**** gallery image css *****/
.gallery-tab{
    background: #fff;
    padding: 10px;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    min-height: 350px;
    margin-bottom: 20px;
}
.thumbnail{ position:relative;}
.closeic{ position:absolute; right:5px; top:5px; background:#fff; padding:5px 8px; display:none;}
.thumbnail:hover .closeic{ display:block;}
.gallery_img{height: 113px !important;width: 100%;}
</style>

<script type="text/javascript">
function deleteImage(id){
	if(  confirm('Are you sure you want to delete') ){
		$.ajax({
			url: "<?php echo site_url('gallery/deleteImage'); ?>",
			type: "post",
			data: {id: id  },
			success:function(data){
				//alert(data);
				var url = "<?php echo current_url();?>";    
				$(location).attr('href',url);
			}	
		});
	}	
}
</script>	
