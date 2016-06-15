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
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span><?php echo $heading;?></h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="admin/become_partner/insert_partner" id="add_amenity" method="post" enctype="multipart/form-data">
							<fieldset>
                              <div class="control-group">
								<label class="control-label" for="selectError3">Business Name<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="text" class="required" id="business_name" name="business_name" rows="3" placeholder="Enter business name">
								</div>
							  </div>

                             <div class="control-group">
								<label class="control-label" for="selectError3">Partner Name<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="text" class="required" id="partner_name" name="partner_name" rows="3" placeholder="Enter partner name">
								</div>
							  </div>
                              
							   <div class="control-group">
								<label class="control-label" for="selectError3">Phone number<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="text" class="required" id="phoneno" name="phoneno" rows="3" placeholder="Enter partner phone number">
								</div>
							  </div>
							  
							   <div class="control-group">
								<label class="control-label" for="selectError3">Email<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="email" class="required" id="email" name="email" rows="3" placeholder="Enter partner email address">
								</div>
							  </div>
							  
							   <div class="control-group">
								<label class="control-label" for="selectError3">TIN number</label>
								<div class="controls">
								  <input type="text" id="tin" name="tin" rows="3" placeholder="Enter TIN number">
								</div>
							  </div>
							  
							    <div class="control-group">
							  <label class="control-label" for="textarea2">Address<span class="mandatory">*</span></label>
							  <div class="controls">
								<textarea class="required" id="address" name="address" rows="3" placeholder="Enter address details"></textarea>
							  </div>
							</div>
							
							 <div class="control-group">
								<label class="control-label">Authorization <span class="mandatory">*</span></label>
								
								<div class="controls">

						     <label class="checkbox inline"> 
			                  <input class="required" type="radio" name="verify" value="Hoopy Verified" checked="checked">Hoopy Verified</label>
								 
							<label class="checkbox inline"> 
			                 <input class="required" type="radio" name="verify" value="Authorized">Authorized</label>  
								
								</div>
							  </div>
							
							
							  
							  <hr><h3 style="padding-left: 46px;padding-bottom: 8px;">Workshop Details</h3></hr>
							    <div class="control-group">
								<label class="control-label" for="selectError3">Workshop phno.<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="text" class="required" id="workshop_phone" name="workshop_phone" rows="3" placeholder="Enter workshop phone number">
								</div>
							  </div>
							  
							   <div class="control-group">
								<label class="control-label" for="selectError3">Workshop Email<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="email" class="required" id="workshop_email" name="workshop_email" rows="3" placeholder="Enter workshop email address">
								</div>
							  </div>

							    <hr><h3 style="padding-left: 46px;padding-bottom: 8px;">Service Manager/Head Mechanic Details</h3></hr>
								
								
							    <div class="control-group">
								<label class="control-label" for="selectError3">Phone number<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="text" class="required" id="manager_phone" name="manager_phone" rows="3" placeholder="Enter phone number">
								</div>
							  </div>
							  
							   <div class="control-group">
								<label class="control-label" for="selectError3">Email<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="email" class="required" id="manager_email" name="manager_email" rows="3" placeholder="Enter email address">
								</div>
							  </div>
                              
                              <hr><h3 style="padding-left: 46px;padding-bottom: 8px;">Choose service category</h3></hr>
						    <div class="control-group">
								<label class="control-label">Services <span class="mandatory">*</span></label>
								<div class="controls">
                             <?php foreach($Services->result() as $row){?>
					  <label class="checkbox inline"> 
			         <input class="required" type="checkbox" name="services[]" value="<?php echo $row->name;?>"><?php echo $row->name;?>
								  </label>
								 <?php }?>
								</div>
							  </div>
							  
							    <div class="control-group">
							  <label class="control-label" for="fileInput">Image<span class="mandatory"> * </span></label>
							  <div class="controls">
								<input class="input-file uniform_on required" name="brand_image" id="brand_image" type="file">
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
