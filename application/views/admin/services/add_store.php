<?php
$this->load->view('admin/templates/header.php');
?>

<script type="text/javascript" src="js/jquery.MultiFile.js"> </script>
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
		
				<div class="span12" style="margin-bottom:15px;">
				<a href="admin/become_partner/display_partners" class="submenu btn btn-primary"><i class="fa fa-users"></i><span class="hidden-tablet">Partners List</span></a>
				</div>
				
			</div>	

			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span><?php echo $heading;?></h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="admin/services/insert_store" id="add_amenity" method="post" enctype="multipart/form-data">
							<fieldset>
                              <div class="control-group">
								<label class="control-label" for="selectError3">Store Name<span class="mandatory">*</span></label>
								<div class="controls">
							 
							 <input type="hidden" name="partner_id" value="<?php echo $partner_id; ?>">
							 
							 <input type="text" class="required" id="business_name" name="name" rows="3" placeholder="Enter store name">
								</div>
							  </div>

							   <hr><h3 style="padding-left: 46px;padding-bottom: 8px;">Location Details</h3></hr>
							  
                             <div class="control-group">
								<label class="control-label" for="selectError3">Location name<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="text" class="required" id="location" name="location" rows="3" placeholder="Enter location name">
								</div>
							  </div>
                              
							   <div class="control-group">
								<label class="control-label" for="selectError3">Location latitute<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="text" class="required" id="lat" name="lat" rows="3" placeholder="Enter location latitude">
								</div>
							  </div>
							  
							   <div class="control-group">
								<label class="control-label" for="selectError3">Location longitude<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="text" class="required" id="lng" name="lng" rows="3" placeholder="Enter location longitude">
								</div>
							  </div>
							  
							   <div class="control-group">
								<label class="control-label" for="selectError3">Default rating<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="text" class="required" id="default_rating" name="default_rating" rows="3" placeholder="Enter default rating">
								</div>
							  </div>
							 
                              
                              <hr><h3 style="padding-left: 46px;padding-bottom: 8px;">Choose services</h3></hr>
						    <div class="control-group">
								<label class="control-label">Services <span class="mandatory">*</span></label>
								<div class="controls">
								
								<?php
                                       if ($Services->num_rows() > 0) {
							           foreach ($Services->result() as $row){
								?>
					            
								<label class="checkbox inline"> 
			                    <input type="checkbox" name="services[]" class="required" value="<?php echo $row->service_name;?>"><?php echo $row->service_name;?>
								</label>
								
								<?php } } ?>
								 
								</div>
							  </div>
                     
                              
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Add Store</button>
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
