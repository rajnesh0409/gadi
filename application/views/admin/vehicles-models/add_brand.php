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
						<form class="form-horizontal" action="admin/vehicle_models/insertModels" id="add_amenity" method="post" enctype="multipart/form-data">
							<fieldset>
                            
                            <div class="control-group">
								<label class="control-label" for="selectError3">Brand <span class="mandatory">*</span></label>
								<div class="controls">
								  <select id="brand_name" name="brand_name" class="required">
								  <option value="" disabled selected>Choose Brand</option>
                                  <?php foreach($brandDetails->result() as $row){ ?>
									<option value="<?php echo $row->name;?>"><?php echo $row->name;?></option>
									<?php }?>
									</select>
								</div>
							  </div>
							  
							    <div class="control-group">
								<label class="control-label" for="selectError3">Vehicle Type <span class="mandatory">*</span></label>
								<div class="controls">
								  <select id="veh_type" name="veh_type" class="required">
                                  <option value="" selected disabled>Choose Vehicle Type</option>
								  </select>
								</div>
							  </div>


                              <div class="control-group">
								<label class="control-label" for="selectError3">Model Name<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="text" class="required" id="model_name" name="model_name" rows="3">
								</div>
							  </div>




                              
                              <div class="control-group">
								<label class="control-label" for="selectError3">Model Year <span class="mandatory">*</span></label>
								<div class="controls">
								  
								  <input type="text" class="required" id="model_year" name="model_year" rows="3">
								<!-- <select id="model_year" name="model_year" class="required">
                                  <?php 
								/*  $base_year = 1947;
									$start_year = $base_year;
									$end_year = $start_year + 69;

										for( $i = $start_year; $i <= $end_year; $i++)
										{   
											echo '<option value='.$i.'>'.$i.'</option>';
										} */?>
									</select> -->
								</div>
							  </div>
                              
                               <div class="control-group">
								<label class="control-label" for="selectError3">Fuel Type<span class="mandatory">*</span></label>
								<div class="controls">
								
								 <input type="checkbox" name="on_petrol" value="yes" style="margin: 6px;">Petrol
                                 <input type="checkbox" name="on_diesel" value="yes" style="margin: 6px;">Diesel
								 <input type="checkbox" name="on_lpg" value="yes" style="margin: 6px;">LPG
                                 <input type="checkbox" name="on_cng" value="yes" style="margin: 6px;">CNG
			
								</div>
							  </div>
 
							 <div class="control-group">
								<label class="control-label" for="selectError3">Transmission<span class="mandatory">*</span></label>
								<div class="controls">
								
								   <input type="checkbox" name="automatic" value="yes" style="margin: 6px;">Automatic
                                   <input type="checkbox" name="manual" value="yes" style="margin: 6px;">Manual
								   
								</div>
							  </div>
                              
                              
                              <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Description</label>
							  <div class="controls">
								<textarea class="required" id="description" name="description" rows="3"></textarea>
							  </div>
							</div>
                              
                            <div class="control-group">
							  <label class="control-label" for="fileInput">Image<span class="mandatory"> * </span></label>
							  <div class="controls">
								<input class="input-file uniform_on required" name="model_image" id="model_image" type="file">
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
