<?php
$this->load->view('admin/templates/header.php');
?>

	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
		<?php $this->load->view('admin/templates/sidebar');?>
			
			<!--<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>-->
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url(); ?>admin">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Admin Settings</a></li>
			</ul>

			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Admin Settings</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="admin/adminlogin/admin_global_settings" method="post" enctype="multipart/form-data" id="admin_settings_form" >
							<fieldset>
							  <input type="hidden" name="form_mode" value="main_settings"/>
							 
							  <div class="control-group">
								<label class="control-label" for="inputSuccess">Admin Name <span class="mandatory">*</span></label>
								<div class="controls">
							<input name="admin_name" value="<?php echo $admin_settings->row()->admin_name;?>" class="required" id="admin_name" type="text" tabindex="1">
								  <span class="help-inline"></span>
								</div>
							  </div><hr>
                              
                             <div class="control-group">
								<label class="control-label" for="inputSuccess">Email Address <span class="mandatory">*</span></label>
								<div class="controls">
								  <input name="email" id="email" type="text" value="<?php echo $admin_settings->row()->email;?>" class="required email" tabindex="2">
								  <span class="help-inline"></span>
								</div>
							  </div>
                              <hr>
                              
                           <div class="control-group">
								<label class="control-label" for="inputSuccess">Site Contact Email <span class="mandatory">*</span></label>
								<div class="controls">
					<input name="site_contact_mail" id="site_contact_mail" value="<?php echo $admin_settings->row()->site_contact_mail;?>" class="required email" type="text" tabindex="3">
								  <span class="help-inline"></span>
								</div>
							  </div>
                              
                              
                              <div class="control-group">
								<label class="control-label" for="inputSuccess3">Site Contact Phone No <span class="mandatory">*</span></label>
								<div class="controls">
								  <input name="site_contact_number" id="site_contact_number" value="<?php echo $admin_settings->row()->site_contact_number;?>" class="required number" type="text" tabindex="4">
								  <span class="help-inline"></span>
								</div>
							  </div> <hr>
                             
                              
                                 <div class="control-group">
								<label class="control-label" for="inputSuccess3">Site Name <span class="mandatory">*</span></label>
								<div class="controls">
								  <input name="email_title" id="email_title" type="text" value="<?php echo $admin_settings->row()->email_title;?>" class="required" tabindex="5">
								  <span class="help-inline"></span>
								</div>
							  </div><hr>
                              
                                <div class="control-group">
								<label class="control-label">Logo <span class="mandatory">*</span></label>
								<div class="controls">
								  <input name="logo_image" id="logo_image" type="file" tabindex="6">
								</div>
                                  <div style="margin:6px 181px;"><img src="<?php echo base_url();?>images/logo/<?php echo $admin_settings->row()->logo_image;?>" class="required" width="100px"/></div>
							  </div><hr>
                              
                                <div class="control-group">
								<label class="control-label">Fevicon <span class="mandatory">*</span></label>
								<div class="controls">
								  <input name="fevicon_image" id="fevicon_image" type="file" tabindex="7">
                                   <div class="form_input"><img src="<?php echo base_url();?>images/logo/<?php echo $admin_settings->row()->fevicon_image;?>" class="required" width="50px"/></div>
								</div>
							  </div><hr>
                              
                           
                              
                                 <div class="control-group">
								<label class="control-label" for="inputSuccess3">Footer Content <span class="mandatory">*</span></label>
								<div class="controls">
								  <input name="footer_content" id="footer_content" type="text" value="<?php echo htmlentities($admin_settings->row()->footer_content);?>"class="required" tabindex="8">
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
			<button type="button" class="close" data-dismiss="modal">�</button>
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