<?php
$this->load->view('admin/templates/header');
?>

		<div class="container-fluid-full">
		<div class="row-fluid">
<?php $this->load->view('admin/templates/sidebar');?>
			
			<!--<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>-->
            
            
            	<!-- start: Content -->
			<div id="contentsss" class="span10" style="background: #ffffff;
			filter: none;
			min-height: 100%;
			padding: 28px;
			margin: 0px 0px;
			position: relative;    
			margin-bottom: 90px;">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="<?php echo base_url(); ?>admin">Dashboard</a></li>
			</ul>

           <!-- new-->
				<div class="row-fluid">	

				<a class="quick-button metro yellow span2 hvr-float-shadow" href="admin/users/display_user_list">
					<i class="icon-group"></i>
					<p>Customers</p>
					
				</a>
				<a class="quick-button metro red span2 hvr-float-shadow" href="admin/booking/booking_details">
					<i class="fa fa-pencil-square-o"></i>
					<p>Bookings</p>
					
				</a>
				<a class="quick-button metro blue span2 hvr-float-shadow" href="admin/services/display_services_all">
					<i class="fa fa-cogs"></i>
					<p>Services</p>
					
				</a>

				
				<a class="quick-button metro green span2 hvr-float-shadow" href="admin/services/display_stores_all">
					<i class="fa fa-home"></i>
					<p>Stores</p>
				</a>
			
			
			
				
				<div class="clearfix"></div>
								
			</div><!--/row-->
			
			
			<div class="row-fluid" style="margin-top: 24px;">	

				<a class="quick-button metro yellow span2 hvr-float-shadow" href="admin/brands/display_brands">
					<i class="fa fa-car"></i>
					<p>Brands</p>
					
				</a>
				<a class="quick-button metro red span2 hvr-float-shadow" href="admin/vehicle_models/display_brands">
					<i class="fa fa-car"></i>
					<p>Models</p>
					
				</a>
				<a class="quick-button metro blue span2 hvr-float-shadow" href="admin/become_partner/display_partners">
					<i class="fa fa-users"></i>
					<p>Service Partners</p>
					
				</a>
				
				<a class="quick-button metro blue span2 hvr-float-shadow" href="admin/users/deliveryboys">
					<i class="fa fa-users"></i>
					<p> Delivery Boys</p>
					
				</a>

				<div class="clearfix"></div>
								
			</div><!--/row-->
       <!--new-->
	   
	   
	   	<div class="row-fluid" style="margin-top: 24px; height: 188px;" >	
 
				<a class="quick-button metro yellow span2 hvr-float-shadow" href="admin/users/viewpromos">
					<i class="fa fa-gift"></i>
					<p>Promotions</p>
					
				</a>
				<a class="quick-button metro red span2 hvr-float-shadow" href="admin/users/viewtestimonial">
					<i class="fa fa-list-alt"></i>
					<p>Testimonials</p>
					
				</a>
				<a class="quick-button metro blue span2 hvr-float-shadow" href="admin/users/feedback">
					<i class="fa fa-users"></i>
					<p>Feedback</p>
					
				</a>

				<div class="clearfix"></div>
								
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
	
	<div class="clearfix"></div>
	
   <?php $this->load->view('admin/templates/footer');?>
   
   <link href="<?php echo SHORTURL; ?>assets/css/hover.css" rel="stylesheet" type="text/css">