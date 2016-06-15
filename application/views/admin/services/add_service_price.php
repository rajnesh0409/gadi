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
						<form class="form-horizontal" action="admin/services/insertServicePrice" id="add_service" method="post" enctype="multipart/form-data">
							<fieldset>
							 
                             <div class="control-group">
								<label class="control-label" for="selectError3">Select a Service<span class="mandatory"> * </span></label>
								<div class="controls">
								  <select id="selectError3" class="required" name="service_name" required>
                                  <option value="" disabled>Select a Service</option>
                                  <?php if($details->num_rows()>0){
									  foreach($details->result() as $row){?>
									<option value="<?php echo $row->name; ?>"><?php echo $row->name; ?></option>
                                    <?php }
									}?>
								  </select>
								</div>
							  </div>
                             
							 <div class="control-group">
								<label class="control-label" for="inputSuccess">Price<span class="mandatory"> * </span></label>
								<div class="controls">
								  <input name="price" id="price" class="required number" type="text" value="" tabindex="1" required>
								  <span class="help-inline"></span>
								</div>
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

