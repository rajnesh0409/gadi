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
						<form class="form-horizontal" action="admin/brands/editBrand" id="add_amenity" method="post" enctype="multipart/form-data">
							<fieldset>
							  <div class="control-group">
								<label class="control-label" for="inputSuccess">Name<span class="mandatory"> * </span></label>
								<div class="controls">
								  <input name="name" id="name" class="required" type="text" value="<?php echo $brand_details->row()->name;?>" tabindex="1">
								  <span class="help-inline"></span>
								</div>
							  </div>
                              
                            <div class="control-group">
							  <label class="control-label" for="fileInput">Image<span class="mandatory"> * </span></label>
							  <div class="controls">
								<input class="input-file uniform_on <?php if($brand_details->row()->brand_image==''){?>required<?php } ?>" name="brand_image" id="brand_image" type="file">
							  </div>
                              <span class="mandatory">Note: Minimum image upload size 500*500</span>
                              <?php
							  if($brand_details->row()->brand_image!=''){
									$img = $brand_details->row()->brand_image;
									}else{
										$img = "no-image.png";
								}
							  ?>
                                <div class="controls">
                                    <img src="<?php echo base_url();?>images/brands/<?php echo $img;?>" width="100"/>
                                </div>
                              
							</div>  
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Update</button>
								<!--<button class="btn">Cancel</button>-->
							  </div>
							</fieldset>
                             <input type="hidden" name="id" value="<?php echo $brand_details->row()->id;?>" />
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
