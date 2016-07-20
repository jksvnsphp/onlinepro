<?php $this->load->view('admin/header'); ?>
<link href="<?php echo base_url(); ?>themes/admin/css/table-responsive.css" rel="stylesheet" />
<style>
.menu_chcks{
	width:auto;
	float:left;
	margin-right:30px;
}
</style>
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
		<div class="row">
			<div class="col-md-12"> 
				<ul class="breadcrumbs-alt">
					<li><a href="<?php echo site_url('admin')?>"><i class="icon-home"></i> <?php echo lang('Home')?></a> </li>
					<li><a href="<?php echo site_url('admin/pages')?>"><?php echo lang('Pages & menu');?></a></li>
					<li><a class="current" href="javascript:void(0);"><?php echo lang('Add a page');?></a></li>
				</ul>
			</div>
		</div>
        <div class="row">
            <div class="col-sm-12">
			
                <section class="panel">
                    <header class="panel-heading" style="padding: 10px;">
            <?php echo anchor('admin/pages', '<i class="fa fa-list"></i>&nbsp;&nbsp;'.lang('Pages & menu'), 'class="btn btn-primary"');?>
                    </header>
					<div class="panel-body">
					<?php if( validation_errors() ){
						echo alert('error','Missing Information');
					}?>
					<?php if($this->session->flashdata('msg')):?>
						<?php echo $this->session->flashdata('msg');?>
					<?php endif;?>

					<div style="padding:30px;">     
                       <?php 
					$id = '';
					if ( isset($page->id) &&  $page->id!=''){ 
						$id = "/".$page->id;
					}?>
                    <?php echo form_open(base_url().'admin/pages/edit'.$id, array('class' => 'form-horizontal', 'role'=>'form'))?>                              
                                <div class="form-group" style="display:none;">
                                  <label><?php echo lang('Parent')?></label>
                                    <?php echo form_dropdown('parent_id', $pages_no_parents, $this->input->post('parent_id') ? $this->input->post('parent_id') : $page->parent_id, 'class="form-control"')?>
									<?php echo form_error('parent_id');?>
                                </div>
                                
                                <?php ?><div class="form-group" style="display:none;">
                                  <label><?php echo lang('Template')?></label>
                                  
                                    <?php echo form_dropdown('template', $templates_page, $this->input->post('template') ? $this->input->post('template') : $page->template, 'class="form-control"'); ?>
                               
                                </div><?php 
								
								?>
								
                                <div class="form-group" style="display:none;">
                                  <label><?php echo lang('Show as')?></label>
                                    <?php echo form_dropdown('type', array('PAGE'=>lang('Page')), $this->input->post('type') ? $this->input->post('type') : $page->type, 'class="form-control"'); ?> 
                                 	<?php echo form_error('type');?>
                                </div>
                                
                                <div class="form-group">
                                    <?php echo form_checkbox('is_visible', '1', set_value('is_visible', $page->is_visible), 'id="inputVisible"')?>
                                   <label><?php echo lang('Status')?></label>
								   <?php echo form_error('is_visible');?>
                                </div>
                                <?php $display_on_menu = $page->display_on_menu; ?>
                                 <div class="form-group">
                                  <label><?php echo lang('display_on_menu')?></label>
								 <div>
										<div class="menu_chcks"><input  type="checkbox" name="display_on_menu[]" value="1"<?php echo ( stristr($display_on_menu, "|1|") ? " checked=\"checked\"" : "" )?> /> Usefull Links</div>
										<div class="menu_chcks"><input  type="checkbox" name="display_on_menu[]" value="2"<?php echo ( stristr($display_on_menu, "|2|") ? " checked=\"checked\"" : "" )?> /> Main Footer</div>
									</div>
                                </div>
                               <?php /*?> <div class="form-group">
                                    <?php echo form_checkbox('is_private', '1', set_value('is_private', $page->is_private), 'id="inputPrivate"')?>
                                  	 <label><?php echo lang('Visible for logged users')?></label>
									 <?php echo form_error('is_private');?>
                                </div><?php */?>
                               <div style="margin-bottom: 0px;" class="tabbable">
                                <?php /*?>  <ul class="nav nav-tabs">
                                    <?php $i=0;foreach($this->Page_model->languages as $key_lang=>$val_lang):$i++;?>
                                    <li class="<?php echo $i==1?'active':''?>"><a data-toggle="tab" href="#<?php echo $key_lang?>"><?php echo $val_lang?></a></li>
                                    <?php endforeach;?>
                                  </ul><?php */?>
                                  <div style="padding-top: 9px;" class="tab-content">
                                    <?php $i=0;foreach($this->Page_model->languages as $key_lang=>$val_lang):$i++;?>
                                    <div id="<?php echo $key_lang?>" class="tab-pane <?php echo $i==1?'active':''?>">
                                        <div class="form-group">
                                          <label><?php echo lang('Title')?></label>
                                            <?php echo form_input('title_'.$key_lang, set_value('title_'.$key_lang, $page->{'title_'.$key_lang}), 'class="form-control copy_to_next" id="inputTitle'.$key_lang.'" placeholder="'.lang('Title').'"')?>
                                          <?php echo form_error('title_'.$key_lang);?>
                                        </div>
                                        <div class="form-group">
                                          <label><?php echo lang('Navigation title')?></label>
                                            <?php echo form_input('navigation_title_'.$key_lang, set_value('navigation_title_'.$key_lang, $page->{'navigation_title_'.$key_lang}), 'class="form-control" id="inputNavigationTitle'.$key_lang.'" placeholder="'.lang('Navigation title').'"')?>
                                          <?php echo form_error('navigation_title_'.$key_lang);?>
                                        </div>
                                        <div class="form-group">
                                          <label><?php echo lang('Keywords')?></label>
                                            <?php echo form_input('keywords_'.$key_lang, set_value('keywords_'.$key_lang, $page->{'keywords_'.$key_lang}), 'class="form-control" id="inputKeywords'.$key_lang.'" placeholder="'.lang('Keywords').'"')?>
                                          <?php echo form_error('keywords_'.$key_lang);?>
                                        </div>
                                        <div class="form-group">
                                          <label><?php echo ('Meta Description')?></label>
                                            <?php echo form_textarea('description_'.$key_lang, set_value('description_'.$key_lang, $page->{'description_'.$key_lang}), 'placeholder="'.lang('Meta_Description').'" rows=4" class="form-control"')?>
                                          <?php echo form_error('description_'.$key_lang);?>
                                        </div>  
                                        
                                        <div class="form-group">
                                          <label><?php echo lang('Body')?></label>
											<textarea name="<?php echo 'body_'.$key_lang; ?>" id="ckeditor1" class="form-control" rows="10" placeholder="<?php echo lang('Body'); ?>"><?php echo (isset($page->{'body_'.$key_lang})?$page->{'body_'.$key_lang}:''); ?></textarea>
                                          <?php echo form_error('body_'.$key_lang);?>
                                        </div>  
                                    </div>
                                    <?php endforeach;?>
                                  </div>
                                </div>
                                <div class="form-group">
                                    <?php echo form_submit('submit', lang('Save'), 'class="btn btn-primary"')?>
                                    <a href="<?php echo site_url('admin/pages')?>" class="btn btn-default" type="button"><?php echo lang('Cancel')?></a>
                                </div>
                       <?php echo form_close()?>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<?php $this->load->view('admin/footer'); ?>

