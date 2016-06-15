	<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="<?php echo base_url(); ?>admin"><i class="icon-bar-chart"></i><span class="hidden-tablet">Dashboard</span></a></li>
                        <li>
							<a class="dropmenu" href="#"><i class="icon-user-md"></i><span class="hidden-tablet">Admin</span><span class="label label-important"></span></a>
							<ul>
								<li><a class="submenu" href="admin/adminlogin/display_admin_list"><i class="icon-file-alt"></i><span class="hidden-tablet">Admin Users</span></a></li>
								<li><a class="submenu" href="admin/adminlogin/change_admin_password_form"><i class="icon-file-alt"></i><span class="hidden-tablet">Change Password</span></a></li>
								<li><a class="submenu" href="admin/adminlogin/admin_global_settings_form"><i class="icon-file-alt"></i><span class="hidden-tablet">Admin Settings</span></a></li>
                                <!--<li><a class="submenu" href="admin/adminlogin/admin_smtp_settings"><i class="icon-file-alt"></i><span class="hidden-tablet"> SMTP Settings</span></a></li>-->
                                <li><a class="submenu" href="admin/adminlogin/admin_global_settings_social_form"><i class="icon-file-alt"></i><span class="hidden-tablet"> Social Media Settings</span></a></li>
                                <li><a class="submenu" href="admin/adminlogin/admin_global_settings_seo_form"><i class="icon-file-alt"></i><span class="hidden-tablet"> SEO Settings</span></a></li>
                                
							</ul>	
						</li>
                        
                       <li><a href="admin/users/display_user_list"><i class="icon-user"></i><span class="hidden-tablet">Customers</span></a></li>
                       
					   <li>
					   <a class="dropmenu" href="#"><i class="icon-user"></i><span class="hidden-tablet">Service Partners</span><span class="label label-important"></span></a>
					   
					    <ul>
						 <li><a class="submenu" href="admin/become_partner/display_partners"><i class="icon-file-alt"></i><span class="hidden-tablet">Partners List</span></a></li>
						 <li><a class="submenu" href="admin/become_partner/add_partner"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Partner</span></a></li>
						</ul>	

					   </li>
                       
        <li>
	    <a class="dropmenu" href="#"><i class="icon-dashboard"></i><span class="hidden-tablet">Vehicle Brands</span><span class="label label-important"></span></a>
			 
			 <ul>
             <li><a class="submenu" href="admin/brands/display_brands "><i class="icon-file-alt"></i><span class="hidden-tablet">Brand List</span></a></li>
             <li><a class="submenu" href="admin/brands/add_brand"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Brand </span></a></li>
			</ul>	
			
		</li>
        
         <li>
	    <a class="dropmenu" href="#"><i class="icon-dashboard"></i><span class="hidden-tablet">Vehicle Models</span><span class="label label-important"></span></a>
			 <ul>
             <li><a class="submenu" href="admin/vehicle_models/display_brands "><i class="icon-file-alt"></i><span class="hidden-tablet">Models List</span></a></li>
             <li><a class="submenu" href="admin/vehicle_models/add_brand"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Model </span></a></li>
			</ul>	
		</li>
        
        
      <!--<li><a href="admin/users/display_user_list"><i class="icon-user"></i><span class="hidden-tablet">Amenities Mgnt</span></a></li>  -->  
             
						<!--<li><a href="messages.html"><i class="icon-envelope"></i><span class="hidden-tablet"> Messages</span></a></li>
						<li><a href="tasks.html"><i class="icon-tasks"></i><span class="hidden-tablet"> Tasks</span></a></li>
						<li><a href="ui.html"><i class="icon-eye-open"></i><span class="hidden-tablet"> UI Features</span></a></li>
						<li><a href="widgets.html"><i class="icon-dashboard"></i><span class="hidden-tablet"> Widgets</span></a></li>-->
                    
						<!--<li><a href="form.html"><i class="icon-edit"></i><span class="hidden-tablet"> Forms</span></a></li>
						<li><a href="chart.html"><i class="icon-list-alt"></i><span class="hidden-tablet"> Charts</span></a></li>
						<li><a href="typography.html"><i class="icon-font"></i><span class="hidden-tablet"> Typography</span></a></li>
						<li><a href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet"> Gallery</span></a></li>
						<li><a href="table.html"><i class="icon-align-justify"></i><span class="hidden-tablet"> Tables</span></a></li>
						<li><a href="calendar.html"><i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span></a></li>
						<li><a href="file-manager.html"><i class="icon-folder-open"></i><span class="hidden-tablet"> File Manager</span></a></li>
						<li><a href="icon.html"><i class="icon-star"></i><span class="hidden-tablet"> Icons</span></a></li>-->
                        
						<!--<li><a href="login.html"><i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span></a></li>-->
					</ul>
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
			