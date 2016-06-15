     
	<?php $this->load->view('site/templates/bheader.php');?>
     
  
   
     <div class="container">
     
	 <?php $this->load->view('site/vehicles/midsection.php');?>
	
		
		 <div class="row">
			<div class="col-md-12">
				<div id="content" class="row"> 

					<div class="col-md-12 divu">
					
					
						<div class="row" style="padding-top:10px;">
						

						<div class="col-md-2 sdiv"> Service Category
						</div>
						
						<div class="col-md-2 vdiv" id="cat_name">
						   
						</div>
						
						<div class="col-md-2 sdiv srvcent"> Service Center
						</div>
						
						<div class="col-md-3 vdiv srvcent" id="service_center">
	
						</div>

						
					</div>
					</div>
					
					
					<div class="col-md-12 divu">

						<div class="row">
						<div class="col-md-2 sdiv servbook"> Service Booked
						</div>
						
						<div class="col-md-2 vdiv servbook">
						fghfghfghgf 
						</div>

						<div class="col-md-2 sdiv"> Pickup Location
						</div>
						
						<div class="col-md-2 vdiv" id="pick_point">
						ggghjghjghjghj  
						</div>
						
						
					</div>
					</div>
					
					
					<div class="col-md-12 divu">
					
					<div class="row">
					 <div class="col-md-2 sdiv estcost"> Estimated Cost
						</div>
						
						<div class="col-md-2 vdiv estcost">
						ghjgjghjghj
						</div>	
                       
					   <div class="col-md-2 sdiv"> Drop Location
						</div>
						
						<div class="col-md-2 vdiv" id="drop_point">
						gjgjghjgh
						</div>
					
					</div>
					</div>
					
					
					
					<div class="col-md-12 divu">

						<div class="row">
						<div class="col-md-4 sdiv"> 
						</div>
						<div class="row">
						<div class="col-md-2 sdiv"> Date and Time
						</div>
						
						<div class="col-md-3 vdiv" id="datetime">
						ghjgjghjghjgh
						</div>

					</div>
					</div>

					
					<div class="col-md-12 divu" style="padding-top: 15px; padding-bottom: 40px;">
					
					
						<div class="row">

							<div class="col-md-4 sdiv">
							<button type="button" class="btn-primary hvr-icon-back btn-xs" style="padding-left: 32px !important; padding-right: 14px !important;">Prev</button>
							</div>
							
							<div class="col-md-4 vdiv" style="text-align:center;">
							<button type="button" class="btn-primary btn-xs">Confirm Booking</button> 
							</div>
						
					
					    </div>
					</div>
	
			</div>	

						</div>
						 </div>
						
						<div class="row" style="padding-top:50px;">
					<div class="col-md-11" style="text-align:center;">
					
					
					
					
					</div>
					</div>

			       
					</div>
					
					
				</div>
			</div>
	   </div> 
   
   </div>
   
   
	
   <?php $this->load->view('site/templates/footer.php');?>
   
   <script>
    
	var vehtype = localStorage.getItem("vehtype").trim();
	
	if(vehtype == 'Two%20Wheeler')
	{
		alert('ok');			    

	}
	
	
	var pick_point = localStorage.getItem("pick_point").trim();  
    var drop_point = localStorage.getItem("drop_point").trim();
	var datetime = localStorage.getItem("datetime").trim();  
	var cat_name = localStorage.getItem("cat_name").trim();  
    var veh_id = localStorage.getItem("veh_id").trim();  
	var customer_id = localStorage.getItem("customer_id").trim(); 
	
	$("#pick_point").html(pick_point);
	$("#drop_point").html(drop_point);
	$("#datetime").html(datetime);
	$("#cat_name").html(cat_name);
	
	$(".srvcent").hide();
	$(".servbook").hide();
	$(".estcost").hide();
	
   </script>
   
	 
 <style>
 
.sdiv {  
  padding-right: 20px;
  float:left; 
  font-weight: bold;
  padding-top: 10px;
  }
  
  .rdiv {  
  padding-right: 20px;
  float:left; 
  font-weight: bold;
  padding-top: 10px;
  width: 35%;
  }
  
  .vdiv {  
  float:left; 
  padding-top: 10px;
  color: #8b8b8b;
    font-size: 14px;
    font-family: 'Open Sans', sans-serif;
    line-height: 24px;
  }
  
.imgc {
width:200px;
height:200px;	 	 
}

.btn-primary {
    color: #ffffff !important;
    background-color: #f26f21 !important;
    border-color: #f26f21 !important;
}

.input-group-addon {
	background : #e25d0d !important;
}

.btn-group-xs>.btn, .btn-xs {
    padding: 9px 15px !important;
	
}	

.btn-group-xs>.btn, .btn-xs {
    padding-top: 4px !important;
    padding-bottom: 4px !important;
    font-weight: bold !important;	
	
}
</style> 
  
 