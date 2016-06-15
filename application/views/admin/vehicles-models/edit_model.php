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
						<form class="form-horizontal" action="admin/vehicle_models/editModel" id="add_amenity" method="post" enctype="multipart/form-data">
							<fieldset>
                            
                              <div class="control-group">
								<label class="control-label" for="selectError3">Model Name</label>
								<div class="controls">
								  <input type="hidden" name="id" value="<?php echo $model_details->row()->id;?>" />
								  <input type="text" class="required" id="model_name" name="model_name" value="<?php echo $model_details->row()->model_name;?>" rows="3">
								</div>
							  </div>

                              
                              <div class="control-group">
								<label class="control-label" for="selectError3">Model Year </label>
								<div class="controls">
								  
								  <input type="text" class="required" id="model_year" name="model_year" value="<?php echo $model_details->row()->model_year;?>" rows="3">
								
								</div>
							  </div>
                              
                               <div class="control-group">
								<label class="control-label" for="selectError3">Fuel Type</label>
								<div class="controls">
								
								 <input type="checkbox" name="on_petrol" value="yes" style="margin: 6px;" <?php $a = $model_details->row()->on_petrol; if($a == 'yes') { echo "checked"; } ?>>Petrol
                                 <input type="checkbox" name="on_diesel" value="yes" style="margin: 6px;" <?php $a = $model_details->row()->on_diesel; if($a == 'yes') { echo "checked"; } ?>>Diesel
								 <input type="checkbox" name="on_lpg" value="yes" style="margin: 6px;" <?php $a = $model_details->row()->on_lpg; if($a == 'yes') { echo "checked"; } ?>>LPG
                                 <input type="checkbox" name="on_cng" value="yes" style="margin: 6px;" <?php $a = $model_details->row()->on_cng; if($a == 'yes') { echo "checked"; } ?>>CNG
			
								</div>
							  </div>
 
							 <div class="control-group">
								<label class="control-label" for="selectError3">Transmission</label>
								<div class="controls">
								
								   <input type="checkbox" name="automatic" value="yes" style="margin: 6px;" <?php $a = $model_details->row()->automatic; if($a == 'yes') { echo "checked"; } ?>>Automatic
                                   <input type="checkbox" name="manual" value="yes" style="margin: 6px;" <?php $a = $model_details->row()->manual; if($a == 'yes') { echo "checked"; } ?>>Manual
								   
								</div>
							  </div>
                              
                              
                              <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Description</label>
							  <div class="controls">
								<textarea class="required" id="description" name="description" rows="3" > <?php echo $model_details->row()->description;?></textarea>
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
