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
					<a href="<?php echo base_url();?>admin">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Admin </a></li>
			</ul>

			<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Admin User</h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="admin/users/insertEditUser" method="post" enctype="multipart/form-data">
							<fieldset>
							 <input type="hidden" name="user_id" value="<?php echo $user_details->row()->user_name;?>" />
							 
							  <div class="control-group">
								<label class="control-label" for="inputSuccess">User Name</label>
								<div class="controls">
								  <input name="user_name" value="<?php echo $user_details->row()->user_name;?>" id="admin_name" type="text" tabindex="1">
								  <span class="help-inline"></span>
								</div>
							  </div><hr>
                              
                             <div class="control-group">
								<label class="control-label" for="inputSuccess">Email Address</label>
								<div class="controls">
								  <input name="email" id="email" type="text" value="<?php echo $user_details->row()->email;?>" tabindex="2">
								  <span class="help-inline"></span>
								</div>
							  </div>
                              <hr>
                         
                         
                               
                              
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