	<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="<?php echo base_url(); ?>admin"><i class="icon-bar-chart"></i><span class="hidden-tablet">Dashboard</span></a></li>
                        <li>
							<a class="dropmenu" href="#"><i class="fa fa-user"></i><span class="hidden-tablet">Admin</span>
							<i style="float: right;padding-top: 5px;;" class="fa fa-angle-down" aria-hidden="true"></i></a>
							<ul>
								<li><a class="submenu" href="admin/adminlogin/display_admin_list"><i class="fa fa-users"></i><span class="hidden-tablet">Admin Users</span></a></li>
								<li><a class="submenu" href="admin/adminlogin/change_admin_password_form"><i class="fa fa-users"></i><span class="hidden-tablet">Change Password</span></a></li>
								<li><a class="submenu" href="admin/adminlogin/admin_global_settings_form"><i class="fa fa-users"></i><span class="hidden-tablet">Admin Settings</span></a></li>
                                <!--<li><a class="submenu" href="admin/adminlogin/admin_smtp_settings"><i class="icon-file-alt"></i><span class="hidden-tablet"> SMTP Settings</span></a></li>-->
                                <li><a class="submenu" href="admin/adminlogin/admin_global_settings_social_form"><i class="fa fa-users"></i><span class="hidden-tablet"> Social Media Settings</span></a></li>
                                <li><a class="submenu" href="admin/adminlogin/admin_global_settings_seo_form"><i class="fa fa-users"></i><span class="hidden-tablet"> SEO Settings</span></a></li>
                                
							</ul>	
						</li>
                        
                       <li><a href="admin/users/display_user_list"><i class="fa fa-users"></i><span class="hidden-tablet">Customers</span></a></li>
					    <li><a href="admin/booking/booking_details"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><span class="hidden-tablet">Booking Details</span></a></li>
                       	<li><a href="admin/services/display_services_all"><i class="fa fa-cogs"></i><span class="hidden-tablet">Services</span></a></li>
		                 <li><a href="admin/services/display_stores_all"><i class="fa fa-home"></i><span class="hidden-tablet">Service Stores</span></a></li>

					     <li>
						<a class="dropmenu" href="#"><i class="fa fa-cog"></i><span class="hidden-tablet">Service Categories</span>
						<i style="float: right;padding-top: 5px;" class="fa fa-angle-down" aria-hidden="true"></i>
						</a>
							 <ul>
							 <li><a class="submenu" href="admin/services/add_service_cats"><i class="fa fa-cog"></i><span class="hidden-tablet">Add Service category</span></a></li>
							 <li><a class="submenu" href="admin/services/service_cats"><i class="fa fa-cog"></i><span class="hidden-tablet">Service category List</span></a></li>
							</ul>	
						</li>
						
						  <li>
						<a class="dropmenu" href="#"><i class="fa fa-cogs" aria-hidden="true"></i><span class="hidden-tablet">Additional Repairs</span>
						<i style="float: right;padding-top: 5px;" class="fa fa-angle-down" aria-hidden="true"></i></a>
							 <ul>
							 <li><a class="submenu" href="admin/services/add_repair_service"><i class="fa fa-cogs" aria-hidden="true"></i>
                              <span class="hidden-tablet">Add service</span></a></li>
							 <li><a class="submenu" href="admin/services/repair_services"><i class="fa fa-cogs"></i><span class="hidden-tablet">Additional service List</span></a></li>
							</ul>	
						</li>
					   
					   <li>
					   <a class="dropmenu" href="#"><i class="fa fa-users"></i><span class="hidden-tablet">Service Partners</span>
					   <i style="float: right;padding-top: 5px;" class="fa fa-angle-down" aria-hidden="true"></i></a>
					   
					    <ul>
						 <li><a class="submenu" href="admin/become_partner/add_partner"><i class="fa fa-user"></i><span class="hidden-tablet">Add Partner</span></a></li>
						 <li><a class="submenu" href="admin/become_partner/display_partners"><i class="fa fa-users"></i><span class="hidden-tablet">Partners List</span></a></li>
						
						</ul>	

					   </li>

		        <li>
	    <a class="dropmenu" href="#"><i class="fa fa-car"></i><span class="hidden-tablet">Vehicle Brands</span>
		<i style="float: right;padding-top: 5px;;" class="fa fa-angle-down" aria-hidden="true"></i></a>
			 
			 <ul>
			 <li><a class="submenu" href="admin/brands/add_brand"><i class="fa fa-car"></i><span class="hidden-tablet">Add Brand </span></a></li>
             <li><a class="submenu" href="admin/brands/display_brands "><i class="fa fa-car"></i><span class="hidden-tablet">Brand List</span></a></li>
             
			</ul>	
			
		</li>
        
         <li>
	    <a class="dropmenu" href="#"><i class="fa fa-car"></i><span class="hidden-tablet">Vehicle Models</span>
		<i style="float: right;padding-top: 5px;;" class="fa fa-angle-down" aria-hidden="true"></i></a>
			 <ul>
			 <li><a class="submenu" href="admin/vehicle_models/add_brand"><i class="fa fa-car"></i><span class="hidden-tablet">Add Model </span></a></li>
             <li><a class="submenu" href="admin/vehicle_models/display_brands "><i class="fa fa-car"></i><span class="hidden-tablet">Models List</span></a></li>
             
			</ul>	
		</li>
		
	
				</div>
			</div>
			<!-- end: Main Menu -->
			
	<script>
	$(document).ready(function(){
		$("button").click(function(){
			$("p").toggle();
		});
	});
	</script>		
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	
	<style>
	 i {
    padding-right: 5px !important;
	 font-size: 14px !important;

    }
	</style>