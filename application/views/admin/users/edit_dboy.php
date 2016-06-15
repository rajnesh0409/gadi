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
						<form class="form-horizontal" action="admin/users/editdboy" id="add_amenity" method="post" enctype="multipart/form-data">
							<fieldset>

                              <div class="control-group">
								<label class="control-label" for="name">Name<span class="mandatory">*</span></label>
								<div class="controls">
								 <input type="hidden" name="id" value="<?php echo $user_details->row()->id;?>" />
								 <input type="text" class="required" required id="name" name="name" rows="3" value="<?php echo $user_details->row()->name;?>">
								</div>
							  </div>
							  
							   <div class="control-group">
								<label class="control-label" for="name">Phone no.<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="text" class="required" required id="phone" name="phone" rows="3" pattern="[0-9]+" value="<?php echo $user_details->row()->phone;?>">
								</div>
							  </div>
							  
							   <div class="control-group">
								<label class="control-label" for="name">Email Id<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="email" class="required" required id="email" name="email" rows="3" value="<?php echo $user_details->row()->email;?>">
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="veh_name">Password<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="password" required class="required" id="password" name="password" rows="3" value="<?php echo base64_decode($user_details->row()->password);?>">
								</div>
							  </div>

                              <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Address<span class="mandatory">*</span></label>
							  <div class="controls">
								<textarea class="required" required id="address" name="address" rows="3"><?php echo $user_details->row()->address;?></textarea>
							  </div>
							</div>
							
							 <div class="control-group">
								<label class="control-label" for="name">Driving no.<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="text" class="required" required id="driving_no" name="driving_no" value="<?php echo $user_details->row()->driving_no;?>" rows="3">
								</div>
							  </div>
               
                            
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Update</button>
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
