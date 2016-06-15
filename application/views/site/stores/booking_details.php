     
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
						
						<div class="col-md-2 sdiv servbook"> Vehicle Type
						</div>
						
						<div class="col-md-2 vdiv" id="vehtype">
						
						</div>
						
						

						<div class="col-md-2 sdiv"> Pickup Location
						</div>
						
						<div class="col-md-4 vdiv" id="pick_point">
						
						</div>
						
						
					</div>
					</div>
					
					
					<div class="col-md-12 divu">
					
					<div class="row">
					 
					 
					 <div class="col-md-2 sdiv servbook"> Services Booked
						</div>
						
						<div class="col-md-2 vdiv" id="services">
						
						</div>
						
                       
					   <div class="col-md-2 sdiv"> Drop-Off Location
						</div>
						
						<div class="col-md-4 vdiv" id="drop_point">
						
						</div>
					
					</div>
					</div>
					
					
					
					<div class="col-md-12 divu">

						<div class="row">
						 <div class="col-md-2 sdiv servbook"> Estimated Cost
						</div>
						
						<div class="col-md-2 vdiv" id="prices">
						
						</div>

						<div class="row">
						<div class="col-md-2 sdiv"> Date
						</div>
						
						<div class="col-md-3 vdiv" id="date">
						
						</div>

					</div>
					</div>
                   </div>
				   
				   <div class="col-md-12 divu">

					<div class="row">
						
						<div class="col-md-2 sdiv"> Time Slot
						</div>
						
						<div class="col-md-2 vdiv" id="time">
						
						</div>
						
						 <div class="col-md-2 sdiv servbook"> </div>

						<div class="col-md-2 vdiv" id="promocode">
						 <input id="checkji" class="checkbox-custom" name="checkbox-1" type="checkbox">
				        <label for="checkji" class="checkbox-custom-label stserv fuel"> Have Promo code </label>
						</div>

					</div>
					
					<div class="row" id="promobar" style="display:none;">
					<div class="col-md-2 sdiv"> 
						</div>
						
						<div class="col-md-2 vdiv" id="time">
						
						</div>
						
						 <div class="col-md-2 sdiv servbook"> </div>
						
						<div class="col-md-2 vdiv" id="promocode">
						<input type="text" id="promoval" class="form-control" name="regno" style="width: 100%;" required pattern="[A-Za-z0-9]{3,20}" title="No special characters allowed." placeholder="Promo code"> 
						</div>
						
						<div class="col-md-1 vdiv">
						<button type="button" id="promohit" class="btn-primary btn-xs">Check</button> 
						</div>
					
					
					
					</div>
					
					</div>
                   </div>
				   
					
					<div class="col-md-12 divu" style="padding-top: 15px; padding-bottom: 40px;">
					
					
						<div class="row">

							<div class="col-md-5 sdiv">
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
   $('body').on("click","#checkji", function(){	
   var input = document.querySelector('input[type=checkbox]');

        if (input.checked) {
           $('#promobar').show('slow');
        } else {
            $('#promobar').hide('slow');
        }
   });
</script>
   
   
  <script>
   $('body').on("click","#promohit", function(){	
   var promoval = $('#promoval').val();
    
	$.ajax({
    url: FULLURL+'calls/promocheck',
    data: {
	promoval: promoval
	},
    type: 'POST',
    success: function( data ) {
		data = data.trim();
		//alert(data);
		if(data == '2')
		{
			 new jBox('Notice', {
									 content: 'Promocode can be used one time only.',
									 animation: {open: 'tada', close: 'flip'},
									 color: 'red',
									 position: { x: 'right',y: 'top' },
									 offset: { x: -50, y: 100 }
									 }) ;
		}
		else if(data == '3')
		{
			 new jBox('Notice', {
									 content: 'This promocode has been expired or does not exist.',
									 animation: {open: 'tada', close: 'flip'},
									 color: 'red',
									 position: { x: 'right',y: 'top' },
									 offset: { x: -50, y: 100 }
									 }) ;
		}
		else
		{
			$('#prices').html('Rs. '+data);
			 $('#promobar').hide('slow');
			new jBox('Notice', {
									 content: 'Promocode applied successfully.',
									 animation: {open: 'tada', close: 'flip'},
									 color: 'green',
									 position: { x: 'right',y: 'top' },
									 offset: { x: -50, y: 100 }
									 }) ;
			
		}	
    }
	});
	
   });
</script> 
   
   <script>
    
	var pick_point = localStorage.getItem("pick_point").trim();  
    var drop_point = localStorage.getItem("drop_point").trim();
	var date = localStorage.getItem("date").trim();
    var time = localStorage.getItem("time").trim();  	
	var cat_name = localStorage.getItem("cat_name").trim();  
    var veh_id = localStorage.getItem("veh_id").trim();  
	var vehtype = localStorage.getItem("vehtype").trim();
    var vehtype = vehtype.replace("%20", " ");	
	
	var drop_lat = localStorage.getItem("drop_lat").trim(); 
	var drop_loc = localStorage.getItem("drop_loc").trim();
    var drop_lon = localStorage.getItem("drop_loc").trim(); 	
	
	var pickup_loc = localStorage.getItem("pickup_loc").trim(); 
	var pickup_lon = localStorage.getItem("pickup_lon").trim(); 
	var pickup_lat = localStorage.getItem("pickup_lat").trim();
	
	var storename = localStorage.getItem("storename").trim(); 
	var storeid = localStorage.getItem("storeid").trim(); 
	var services = localStorage.getItem("services").trim(); 
	var prices = localStorage.getItem("prices").trim(); 
	
	$("#pick_point").html(pickup_loc+', '+pick_point);
	$("#drop_point").html(drop_loc+', '+drop_point);
	$("#date").html(date);
	$("#time").html(time);
	$("#vehtype").html(vehtype);
	$("#prices").html('Rs. '+prices);
	$("#cat_name").html(cat_name);
	$("#services").html(services);
    $("#service_center").html(storename);
	
	$(".book").click(function(){
	$(this).html('Saving details...');	
	$.ajax({
    url: FULLURL+'calls/savebooking',
    data: {
	prices: prices,
    services: services,
    storeid: storeid,
    storename: storename,
	pickup_lat: pickup_lat,
    pickup_lon: pickup_lon,
    drop_lon: drop_lon,
    drop_lat: drop_lat,
    vehtype: vehtype,
	veh_id:  veh_id, 
    pick_point:  pickup_loc+', '+pick_point,
	drop_point: drop_loc+', '+drop_point,
    date:  date,
	time:  time,
	cat_name: cat_name
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
  
 