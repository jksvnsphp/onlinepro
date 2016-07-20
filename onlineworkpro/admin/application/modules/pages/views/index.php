<?php $this->load->view("admin/header");?>
<link rel="stylesheet" type="text/css" href="<?php echo site_url(); ?>themes/admin/js/nestable/jquery.nestable.css" />
<script src="<?php echo base_url('themes/admin/nested/jquery.mjs.nestedSortable.js');?>"></script>
<!-- Script for this page -->
<script type="text/javascript">
$(function () {
	$('#page_sortable').nestedSortable({
		handle: 'div',
		items: 'li',
		toleranceElement: '> div',
		maxLevels: $('#page_sortable').attr('rel'),
		isAllowed: function(item, parent) {    
			try
			{
				var parent_id = parent.attr('rel');
				
				if (typeof parent_id !== 'undefined' && parent_id !== false) {
					//console.log(parent_id+' '+parent.find('span.label-info').length);
					if(parent_id > 0 && parent.find('span.label-info').length == 0)
						return false;
				}
			}
			catch(err)
			{
				//Handle errors here
			}

			return true; 
		},
		dropedCallback: sortablePageDroped
	});



});
function sortablePageDroped(){
	oSortable = null;
	if($('#page_sortable').length)
		oSortable = $('#page_sortable').nestedSortable('toArray');
	$.fn.startLoading();
	$.post('<?php echo site_url('admin/pages/update_ajax'); ?>', 
	{ sortable: oSortable }, 
	function(data){
		$.fn.endLoading();
	}, "json");
}	

$.fn.startLoading = function(data){
	//$('#saveAll, #add-new-page, ol.sortable button, #saveRevision').button('loading');
}
</script>

<section id="main-content">
<section class="wrapper">
<div class="row">
	
<div class="col-md-12">
<ul class="breadcrumbs-alt">
	<li><a href="<?php echo site_url('admin'); ?>">Dashboard</a></li>
	<li><a class="current" href="<?php echo site_url('admin/pages'); ?>"><?php echo lang('Pages & menu'); ?></a></li>
</ul>
</div>	


<div class="col-sm-12">
<section class="panel">
	<header class="panel-heading" style="padding: 10px;">
		<?php echo anchor('admin/pages/edit', '<i class="fa fa-plus"></i>&nbsp;&nbsp;'.lang('Add a page'), 'class="btn btn-primary"')?>
	</header>
	

	<div class="panel-body">
	<div class="dd" id="nestable_list_1">
	<?php echo get_ol_pages_tree($pages_nested)?>
	</div>
	</div>

</section>
</div>    
    
    
</div>
</section>
</section>


<?php $this->load->view("admin/footer");?>
