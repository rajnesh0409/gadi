  <?php $this->load->view('site/templates/bheader.php');?>
    
<div class="container">

    <?php $this->load->view('site/vehicles/midsection.php');?>
    <div class="row">
        <div class="col-sm-6 col-md-3" style="padding-bottom: 45px;">
          
		  <div id='cssmenu'>
			<ul>
			   <li class='active'><a href='#'>My Profile</a></li>
			   <li><a href='<?php echo SHORTURL; ?>my-vehicles'>My Vehicles</a></li>
			   <li><a href='<?php echo SHORTURL; ?>service-history'>Service History</a></li>
			   <li><a href='<?php echo SHORTURL; ?>change-password'>Change Password</a></li>
			   <li><a href='<?php echo SHORTURL; ?>edit-detail'>Update Profile Details</a></li>
			</ul>
			</ul>
			</div>
			
        </div>
		 <div class="col-sm-6 col-md-8" style="padding-bottom: 45px;">
          
		  	
			<div id="content" class="row"> 

					<div class="col-md-12 divu">
			
			          <div class="row" style="padding-top:10px;">
						

						<div class="col-md-3 sdiv"> Name
						</div>
						
						<div class="col-md-3 vdiv" id="cat_name">
						   <?php echo $user_details->row()->user_name;?>
						</div>
					</div>
					</div>
					<div class="col-md-12 divu">
			
			          <div class="row" style="padding-top:10px;">
						

						<div class="col-md-3 sdiv"> Phone number
						</div>
						
						<div class="col-md-3 vdiv" id="cat_name">
						  <?php echo $user_details->row()->mobile_no;?>
						</div>
					</div>
					</div>
					
					
					<div class="col-md-12 divu">
			
			          <div class="row" style="padding-top:10px;">
						

						<div class="col-md-3 sdiv"> Email Id
						</div>
						
						<div class="col-md-3 vdiv" id="cat_name">
						  <?php echo $user_details->row()->email;?>
						</div>
					</div>
					</div>
					
					<div class="col-md-12 divu">
			
			          <div class="row" style="padding-top:10px;">
						

						<div class="col-md-3 sdiv"> Gender
						</div>
						
						<div class="col-md-3 vdiv" id="cat_name">
						  <?php echo $user_details->row()->gender;?>
						</div>
					</div>
					</div>
					
					
					
					
		
		   </div>
		  
		  
        </div>
		
    </div>
</div>

<script>
 $('.labelholder').labelholder();
</script>

  <?php $this->load->view('site/templates/footer.php');?>
  
  
 <style>

.sdiv {  
  padding-right: 20px;
  float:left; 
  font-weight: bold;
  padding-top: 10px;
  }
  

  .vdiv {  
  float:left; 
  padding-top: 10px;
  color: #8b8b8b;
    font-size: 14px;
    font-family: 'Open Sans', sans-serif;
    line-height: 24px;
  }
 
 
#cssmenu,
#cssmenu ul,
#cssmenu ul li,
#cssmenu ul li a {
  margin: 0;
  padding: 0;
  border: 0;
  list-style: none;
  line-height: 1;
  display: block;
  position: relative;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
#cssmenu {
  width: 180px;
  z-index: 10;
}
#cssmenu ul {
  border: 1px solid #cccccc;
  border-radius: 5px;
  background: #ffffff;
  background: -moz-linear-gradient(bottom, #f0f0f0, #ffffff);
  background: -webkit-linear-gradient(bottom, #f0f0f0, #ffffff);
  background: -o-linear-gradient(bottom, #f0f0f0, #ffffff);
  background: -ms-linear-gradient(bottom, #f0f0f0, #ffffff);
  background: linear-gradient(to top, #f0f0f0, #ffffff);
}
#cssmenu ul li {
  display: block;
  border-bottom: 1px solid #cccccc;
}
#cssmenu ul li.active {
  border-bottom: 0;
}
#cssmenu ul li:last-child {
  border-bottom: 0;
}
#cssmenu ul li a {
  display: block;
  padding: 14px 12px;
  font-family: Helvetica, Arial, sans-serif;
  font-size: 14px;
  font-weight: bold;
  text-decoration: none;
  color: #444444;
}
#cssmenu ul li.active {
  left: -8px;
  width: 194px;
  padding: 2px;
  background: #e25d0d;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.25);
}
#cssmenu ul li.active > a {
  padding: 12px 12px 12px 16px;
  border-left: 1px dashed #de8886;
  border-top: 1px dashed #de8886;
  border-bottom: 1px dashed #de8886;
  color: #ffffff;
  text-shadow: 0 1px 1px #8c2726;
}
#cssmenu ul li.active:after {
  position: absolute;
  right: -16px;
  top: 7px;
  width: 31.526911934581186px;
  height: 31.526911934581186px;
  background: #e25d0d;
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
  content: "";
}
#cssmenu ul li.active:before {
  position: absolute;
  right: -12px;
  top: 9px;
  z-index: 10;
  width: 28.526911934581186px;
  height: 28.526911934581186px;
  border-right: 1px dashed #e9afae;
  border-top: 1px dashed #e9afae;
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
  content: "";
}
#cssmenu ul li.active a:after {
  position: absolute;
  bottom: -7px;
  left: -11px;
  z-index: -1;
  width: 0;
  height: 0;
  border-top: 4px solid transparent;
  border-bottom: 4px solid transparent;
  border-left: 8px solid transparent;
  border-right: 8px solid #982b29;
  content: "";
}

#cssmenu ul li:hover > a { color:white; }
#cssmenu ul li:hover { background:#e25d0d; color:white; }

</style> 
  
   
    
