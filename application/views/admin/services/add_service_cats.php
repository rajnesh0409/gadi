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
						<form class="form-horizontal" action="admin/services/insertcat" id="add_service" method="post" enctype="multipart/form-data">
							<fieldset>
							 
							 <div class="control-group">
								<label class="control-label" for="inputSuccess">Name<span class="required"> * </span></label>
								<div class="controls">
								  <input name="name" id="name" class="required" type="text" value="" tabindex="1" required>
								  <span class="help-inline"></span>
								</div>
							  </div>
							  
							<div class="control-group hidden-phone">
							  <label for="textarea2" class="control-label">Description<span class="required">*</span></label>
							  <div class="controls">
								<textarea rows="3" name="description" id="description" class="required" required></textarea>
							  </div>
							</div>  
							
							   <div class="control-group">
								<label class="control-label" for="inputSuccess">Vehicle type<span class="mandatory"> * </span></label>
								<div class="controls">
								 <input type="checkbox" name="two_wheeler" value="yes" style="margin: 6px;">Two wheeler<br>
                                 <input type="checkbox" name="four_wheeler" value="yes" style="margin: 6px;">Four wheeler
								
								</div>
							  </div>
							
							  <div class="control-group">
							  <label class="control-label" for="fileInput">Image<span class="mandatory"> * </span></label>
							  <div class="controls">
								<input class="input-file uniform_on required" name="cat_image" id="cat_image" type="file">
							  </div>
                                <span class="mandatory">Note: Minimum image upload size 500*500</span>
							</div> 
                              
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Add</button>
								<!--<button class="btn">Cancel</button>-->
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

