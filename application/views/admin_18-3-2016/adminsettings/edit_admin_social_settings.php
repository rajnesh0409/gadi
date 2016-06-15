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
						<form class="form-horizontal" action="admin/adminlogin/admin_global_settings" method="post" enctype="multipart/form-data">
							<fieldset>
							  <input type="hidden" name="form_mode" value="social" />
							 
							  <div class="control-group">
								<label class="control-label" for="inputSuccess">Facebook Link</label>
								<div class="controls">
								  <input name="facebook_link" id="facebook_link" type="text" value="<?php echo $admin_settings->row()->facebook_link;?>" tabindex="1">
								  <span class="help-inline"></span>
								</div>
							  </div>
                              
                              <div class="control-group">
								<label class="control-label" for="inputSuccess">Twitter Link</label>
								<div class="controls">
								  <input name="twitter_link" id="twitter_link" type="text" tabindex="2" value="<?php echo $admin_settings->row()->twitter_link;?>">
								  <span class="help-inline"></span>
								</div>
							  </div>
                              
                              <div class="control-group">
								<label class="control-label" for="inputSuccess3">Youtube Link</label>
								<div class="controls">
								  <input name="youtube_link" id="youtube_link" type="text" tabindex="3" value="<?php echo $admin_settings->row()->youtube_link;?>">
								  <span class="help-inline"></span>
								</div>
							  </div>
		<!--					   <div class="control-group">
								<label class="control-label" for="inputSuccess3">Facebook App ID</label>
								<div class="controls">
								  <input name="facebook_app_id" id="facebook_app_id" type="text" tabindex="4" value="<?php echo $admin_settings->row()->facebook_app_id;?>">
								  <span class="help-inline"></span>
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="inputSuccess3">Facebook App Secret</label>
								<div class="controls">
								  <input name="facebook_app_secret" id="facebook_app_secret" type="text" tabindex="11" value="<?php echo $admin_settings->row()->facebook_app_secret;?>">
								  <span class="help-inline"></span>
								</div>
							  </div>
                              <label class="error">Note: To create Facebook api click below url, click Apps then Create New App <a href="https://developers.facebook.com/" target="_blank">Facebook Link</a>  </label>-->
							  
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