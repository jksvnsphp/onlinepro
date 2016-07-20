<?php $this->load->view("header");?>
<?php $this->load->view("navigation");?>
<div class="content-wrapper" style="min-height: 916px;">
<section class="content-header">
<h1> Gallery </h1>
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Gallery</li>
</ol>
</section>
	
<section class="content">
<div class="row">
<div class="col-md-12">
<div class="nav-tabs-custom">
	<ul class="nav nav-tabs">
	<?php foreach($allcategory as $key=>$category){ ?>		  
	<li class="<?php if($key == 0){ echo "active"; } ?>">
		<a href="#category<?php echo $category['id']; ?>" data-toggle="tab"><?php echo $category['title']; ?>
		</a>
	</li>
	<?php }?>	
	</ul>
	<div class="tab-content">
	<?php foreach($allcategory as $key=>$category){ ?>		  
	<div role="tabpanel" class="tab-pane <?php if($key == 0){ echo "active"; } ?>" id="category<?php echo $category['id']; ?>">
	<div class="row">
		<?php $allgallery = $this->Gallery_model->getGallery($category['id']);	 
		foreach($allgallery as $gallery){
		?>
		<div class="col-md-2">
		<div class="thumbnail">
		<img src="<?php echo SITE_URL; ?>upload/gallery/<?php echo $gallery['image']; ?>" alt="" class="gallery_img">	
		</div>
		</div>
		<?php }?>
	</div>

	</div>
	<?php }?>


	</div>
</div>
</div></div>
</section>

</div>

<?php $this->load->view("footer"); ?>


<link rel="stylesheet" href="<?php echo base_url(); ?>common/file-uploader/css/jquery.fileupload.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>common/file-uploader/css/jquery.fileupload-ui.css">

<style>
.gallery_img{height: 113px !important;width: 100%;}
</style>
