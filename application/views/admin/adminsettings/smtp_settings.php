<?php
$this->load->view('admin/templates/header.php');
 if (is_file('./commonsettings/hoopy_smtp_settings.php'))
{
	include('commonsettings/hoopy_smtp_settings.php');
}
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
						<form class="form-horizontal" action="admin/adminlogin/save_smtp_settings" method="post" enctype="multipart/form-data">
							<fieldset>
							  
							 
							  <div class="control-group">
								<label class="control-label" for="inputSuccess">SMTP HOST</label>
								<div class="controls">
								  <input name="smtp_host" value="<?php echo $config['smtp_host'];?>" id="smtp_host" type="text" tabindex="1">
								  <span class="help-inline"></span>
								</div>
							  </div>
                              
                              <div class="control-group">
								<label class="control-label" for="inputSuccess">SMTP PORT</label>
								<div class="controls">
								  <input name="smtp_port" value="<?php echo $config['smtp_port'];?>" id="smtp_port" type="text" tabindex="2">
								  <span class="help-inline"></span>
								</div>
							  </div>
                              
                              <div class="control-group">
								<label class="control-label" for="inputSuccess3">SMTP EMAIL</label>
								<div class="controls">
								  <input name="smtp_user" value="<?php echo $config['smtp_user'];?>" id="smtp_user" type="text" tabindex="3">
								  <span class="help-inline"></span>
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label" for="inputSuccess3">SMTP PASSWORD</label>
								<div class="controls">
								  <input name="smtp_pass" value="<?php echo $config['smtp_pass'];?>" id="smtp_pass" type="password" tabindex="4">
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