     
	<?php $this->load->view('site/templates/bheader.php');?>
     
  
   
     <div class="container">
     
	 <?php $this->load->view('site/vehicles/midsection.php');?>
	
		
		 <div class="row">
			<div class="col-md-12">
				<div id="content" class="row"> 

					<div class="col-md-12 divu">
					
					
						<div class="row" style="padding-top:10px;">
						

						<div class="col-md-3 sdiv"> Service Category
						</div>
						
						<div class="col-md-3 vdiv" id="cat_name">
						   
						</div>

					</div>
					</div>
					
					<div class="col-md-12 divu">
					
					
						<div class="row">
						

						<div class="col-md-3 sdiv"> Vehicle Type
						</div>
						
						<div class="col-md-3 vdiv" id="veh_type">
						   
						</div>

					</div>
					</div>
					

					<div class="col-md-12 divu">

						<div class="row">
						<div class="col-md-3 sdiv"> Date
						</div>
						
						<div class="col-md-3 vdiv" id="date">
						
						</div>
					</div>
				  </div>	
				  
				  <div class="col-md-12 divu">

						<div class="row">
						<div class="col-md-3 sdiv"> Time Slot
						</div>
						
						<div class="col-md-3 vdiv" id="time">
						
						</div>
					</div>
				  </div>	

				  	<div class="col-md-12 divu">

						<div class="row">

						<div class="col-md-3 sdiv"> Address
						</div>
						
						<div class="col-md-3 vdiv" id="pick_point">
					
						</div>

						
					</div>
					</div>
					
					<div class="col-md-12 divu" style="padding-top: 15px; padding-bottom: 40px;">
					
					
						<div class="row">

							<div class="col-md-4 sdiv">
							<button type="button" class="btn-primary hvr-icon-back btn-xs" style="padding-left: 32px !important; padding-right: 14px !important;" onclick="window.history.back();">Prev</button>
							</div>
							
							<div class="col-md-4 vdiv" style="text-align:center;">
							<button type="button" class="btn-primary btn-xs book">Confirm Booking</button> 
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
	var vehtype = vehtype.replace("%20", " ");
	var pick_point = localStorage.getItem("pick_point").trim();  
    var drop_point = localStorage.getItem("drop_point").trim();
	var date = localStorage.getItem("date").trim();  
	var time = localStorage.getItem("time").trim(); 
	var cat_name = localStorage.getItem("cat_name").trim();  
	var veh_id = localStorage.getItem("veh_id").trim();  
 
	var lat = localStorage.getItem("lat");  
	var lon = localStorage.getItem("lon");
	
	$("#pick_point").html(pick_point);
	$("#drop_point").html(drop_point);
	$("#date").html(date);
	$("#time").html(time);
	$("#cat_name").html(cat_name);
	$("#veh_type").html(vehtype);
	
	$(".book").click(function(){
	$.ajax({
    url: FULLURL+'calls/savebooking_2w',
    data: {
	lat: lat,
    lon: lon,	
    vehtype: vehtype,
    pick_point:  pick_point,
	drop_point: drop_point,
    date:  date,
	time:  time,
	cat_name: cat_name,
    veh_id:  veh_id
	},
    type: 'POST',
    success: function( data ) {
	data = data.trim();
    if(data == 'success')
    {
		  window.location = SHORTURL+"service-history";
	}		

    }
});
});

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
  
 