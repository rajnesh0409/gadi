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
						<form class="form-horizontal" action="admin/users/insertpromo" id="add_amenity" method="post" enctype="multipart/form-data">
							<fieldset>
                              <div class="control-group">
								<label class="control-label" for="selectError3">Promo code<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="text" class="required" id="promo_code" name="promo_code" rows="3" placeholder="Enter promo code">
								</div>
							  </div>

                             <div class="control-group">
								<label class="control-label" for="selectError3">Amount<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="text" class="required" id="amount" name="amount" rows="3" placeholder="Enter deduction percentege" pattern="[0-9]+">
								</div>
							  </div>
                              
							   <div class="control-group">
								<label class="control-label" for="selectError3">Occasion<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="text" class="required" id="promo_type" name="promo_type" rows="3" placeholder="Enter occasion name">
								</div>
							  </div>
							  
							  
							
							
							  
							  <hr><h3 style="padding-left: 46px;padding-bottom: 8px;">CHOOSE TIME PERIOD</h3></hr>
							
                                <div class="control-group">
								<label class="control-label" for="from">From<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="text" class="required datepicker" id="from" name="from_time" rows="3" placeholder="From">
								</div>
							  </div>
							   
							    <div class="control-group">
								<label class="control-label" for="to">To<span class="mandatory">*</span></label>
								<div class="controls">
								  <input type="text" class="required datepicker" id="to" name="to_time" rows="3" placeholder="To">
								</div>
							  </div>

							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Add Promo</button>
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

 
