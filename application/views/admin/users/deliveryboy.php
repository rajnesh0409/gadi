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
						<form class="form-horizontal" action="admin/users/insert_dboy" id="add_amenity" method="post" enctype="multipart/form-data">
							<fieldset>

                              <div class="control-group">
								<label class="control-label" for="name">Name<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="text" class="required" required id="name" name="name" rows="3">
								</div>
							  </div>
							  
							   <div class="control-group">
								<label class="control-label" for="name">Phone no.<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="text" class="required" required id="phone" name="phone" rows="3" pattern="[0-9]+">
								</div>
							  </div>
							  
							   <div class="control-group">
								<label class="control-label" for="name">Email Id<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="email" class="required" required id="email" name="email" rows="3">
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="veh_name">Password<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="password" required class="required" id="password" name="password" rows="3">
								</div>
							  </div>

                              <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Address<span class="mandatory">*</span></label>
							  <div class="controls">
								<textarea class="required" required id="address" name="address" rows="3"></textarea>
							  </div>
							</div>
							
							 <div class="control-group">
								<label class="control-label" for="name">Driving no.<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="text" class="required" required id="driving_no" name="driving_no" rows="3">
								</div>
							  </div>
                              
							   <div class="control-group">
							  <label class="control-label" for="fileInput">Driving lic. file<span class="mandatory"> * </span></label>
							  <div class="controls">
								<input class="input-file uniform_on required" required name="driving_file" id="driving_file" type="file">
							  </div>
                                 <span class="mandatory" style="color:grey;">Note: Upload scan copy of driving licence.</span>
							</div> 
							  
                            <div class="control-group">
							  <label class="control-label" for="fileInput">Delivery Boy photo<span class="mandatory"> * </span></label>
							  <div class="controls">
								<input class="input-file uniform_on required" required name="photo" id="photo" type="file">
							  </div>
                                <span class="mandatory" style="color:grey;">Note: Minimum image upload size 500*500</span>
							</div>  
							
							 <div class="control-group">
							  <label class="control-label" for="fileInput">Identity file<span class="mandatory"> * </span></label>
							  <div class="controls">
								<input class="input-file uniform_on required" required name="identity" id="identity" type="file">
							  </div>
                                <span class="mandatory" style="color:grey;">Upload scan copy of identity proof.(eg- Adhaar,Voter Id.)</span> 
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

<script>
$('body').on("change","#brand_name", function(e){	           
        
		var brand = $(this).val();
		//alert(brand);
		 $.ajax({
					  url: FULLURL+'calls/vehtype',
					  data: {
						brand: brand,
						},
						type: 'POST',
						success: function( data ) {
							 //alert(data);
							 $('#veh_type').html(data);
						}
					});
		
        });
</script>
