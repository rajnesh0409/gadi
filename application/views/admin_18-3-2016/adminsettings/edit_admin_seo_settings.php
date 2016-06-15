<?php
$this->load->view('admin/templates/header.php');

?>

	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
		<?php $this->load->view('admin/templates/sidebar');?>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url(); ?>admin">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#"><?php echo $heading;?> </a></li>
			</ul>

			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span><?php echo $heading;?></h2>
						
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="admin/adminlogin/admin_global_settings" id="seo_settings" method="post" enctype="multipart/form-data">
							<fieldset>
							  <input type="hidden" name="form_mode" value="seo" />
							 
							  <div class="control-group">
								<label class="control-label" for="inputSuccess">Meta Title <span class="mandatory">*</span></label>
								<div class="controls">
								  <input name="meta_title" id="meta_title" type="text" value="<?php echo $admin_settings->row()->meta_title;?>" class="required" tabindex="1">
								  <span class="help-inline"></span>
								</div>
							  </div>
                              
                              <div class="control-group">
								<label class="control-label" for="inputSuccess">Meta Keyword <span class="mandatory">*</span></label>
								<div class="controls">
								  <input name="meta_keyword" id="meta_keyword" type="text" value="<?php echo $admin_settings->row()->meta_keyword;?>" class="required" tabindex="2">
								  <span class="help-inline"></span>
								</div>
							  </div>
                              
                              <div class="control-group">
								<label class="control-label" for="inputSuccess3">Meta Description <span class="mandatory">*</span></label>
								<div class="controls">
								  <textarea name="meta_description"  rows="5" style="width:500px;" tabindex="3" class="required"><?php echo $admin_settings->row()->meta_description;?></textarea>
								  <span class="help-inline"></span>
								</div>
							  </div>
							   
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Save changes</button>
								<button class="btn">Cancel</button>
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			
		
    

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	
<?php 
$this->load->view('admin/templates/footer.php');
?>