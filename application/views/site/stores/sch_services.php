     
	<?php $this->load->view('site/templates/bheader.php');?>
     
  
   
     <div class="container">
     
	 <?php $this->load->view('site/vehicles/midsection.php');?>
	
		
		 <div class="row">
			<div class="col-md-12">
				<div id="content" class="row"> 

					<div class="col-md-12 divu">
					
					    <input type="hidden" id="pickup_lat" value="manual" />
						<input type="hidden" id="pickup_lon" value="manual" />
						<input type="hidden" id="drop_lat" value="manual" />
						<input type="hidden" id="drop_lon" value="manual" />
						
						<div class="row" style="padding-top:10px;">

						<div class="col-md-2 sdiv"> Pickup Location
						</div>
						
						<div class="col-md-5 vdiv">
						<input type="text" class="form-control" id="pickup"  name="pickup" required pattern="[A-Za-z0-9]{3,20}" style="width: 58%;float: left;" title="No special characters allowed." placeholder="Enter pickup location"> 
						
                         <span class="input-group-btn">
						<button id="locateme" class="btn btn-primary" type="button" style="border-top-right-radius: 5px !important; border-bottom-right-radius: 5px !important;text-transform: capitalize;font-weight: 500;">
						<i class="fa fa-crosshairs" aria-hidden="true"></i> locate me
						</button>
						</span>
						
						</div>

						<div class="col-md-5 divu">
						</div>
					</div>
					</div>
					
					<div class="col-md-12 divu">
					
					
						<div class="row">

						<div class="col-md-2 sdiv">  
						</div>
						
						<div class="col-md-5 vdiv">
						<div class="vdiv">   
						<input id="keepsame" class="checkbox-custom stores" name="checkbox-1" value="dfgdfgd" type="checkbox" >
						<label for="keepsame" class="checkbox-custom-label stserv fuel">Keep drop-off location same as pickup location</label>
						</div>
						</div>
						
						<div class="col-md-5 divu">
						</div>
					</div>
					</div>
					
					<div class="col-md-12 divu">
					
					
						<div class="row" style="padding-top:10px;">

						<div class="col-md-2 sdiv">  Pickup Address
						</div>
						
						<div class="col-md-3 vdiv">
						<input type="text" class="form-control" id="pickup_loc"  name="pickup_loc" required pattern="[A-Za-z0-9]{3,20}" title="No special characters allowed." placeholder="Locality / Street / House no."> 
						   
						</div>
						
						<div class="col-md-6 divu">
						</div>
					</div>
					</div>
					
					
					<div class="col-md-12 divu">

						<div class="row">

						<div class="col-md-2 sdiv"> Date
						</div>
						
						<div class="col-md-3 vdiv">
							<div class="">
									<div class='input-group date' id='datetimepicker1' style="width: 100%;">
										<input type='text' class="form-control" id="date" />
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
									</div>
								</div>
						</div>
						
						<div class="col-md-6 divu">
						</div>
					</div>
					</div>
					
						<div class="col-md-12 divu">
					
					
						<div class="row" style="padding-top:10px;">

						<div class="col-md-2 sdiv"> Time slot
						</div>
						
						<div class="col-md-3 vdiv">
						
						<select class="selectpicker form-control" name="time" id="time">
						  <option value="" selected disabled>Choose Time slot</option>
						 
						 <option value="9 - 10 AM">9 - 11 AM</option>
						 
						   <option value="11 - 12 AM">11 - 1 PM</option>
						
						   <option value="1 - 2 PM">1 - 3 PM</option>
						
						   <option value="3 - 4 PM">3 - 5 PM</option>
						
						   <option value="5 - 6 PM">5 - 7 PM</option>
						
						  
						</select>

						</div>
						
						<div class="col-md-6 divu">
						</div>
					</div>
					</div>
					
					
					<div class="col-md-12 divu">
					
					
						<div class="row">

						<div class="col-md-2 sdiv"> Drop-Off Location
						</div>
						
						<div class="col-md-3 vdiv">
						<input type="text" class="form-control" id="drop"  name="drop" required pattern="[A-Za-z0-9]{3,20}" title="No special characters allowed." placeholder="Enter drop location"> 
						   
						</div>
						
					
					</div>
					</div>
					
					<div class="col-md-12 divu">
					
					
						<div class="row">

						<div class="col-md-2 sdiv"> Drop-Off Address
						</div>
						
						<div class="col-md-3 vdiv">
						<input type="text" class="form-control" id="drop_loc"  name="drop_loc" required pattern="[A-Za-z0-9]{3,20}" title="No special characters allowed." placeholder="Locality / Street / House no."> 
						   
						</div>
						
					
					</div>
					</div>
					
					
					<div class="col-md-12 divu" style="padding-top: 10px;">
					
					
						<div class="row">

							<div class="col-md-2 sdiv">
							<button type="button" class="btn-primary hvr-icon-back btn-xs" style="padding-left: 32px !important; padding-right: 14px !important;" onclick="window.history.back();">Prev</button>
							</div>
							
							<div class="col-md-3 vdiv">
							<button type="button" class="btn-primary hvr-icon-forward btn-xs schnxt">Next</button> 
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

			        </form>
					</div>
					
					
				</div>
			</div>
	   </div> 
   
   </div>
   
   
	
   <?php $this->load->view('site/templates/footer.php');?>
   
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
		<script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
  



  

<script type="text/javascript">
							$(function () {
								$('#datetimepicker1').datetimepicker({ format: 'DD/MM/YYYY'});
							});
						</script>	 
						
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

<script>
		// locate current location
		$('body').on("click","#locateme", function(){
			if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
			}  else { 
			var ssd = "Geolocation is not supported by this browser.";
			}

			function showPosition(position) {
			 var lat =  position.coords.latitude;
			 var lng = position.coords.longitude;

			       // get address on lat lng basis
					$.ajax({
					url: FULLURL+'calls/address',
					data: {
					lat: lat,
					lon: lng
					},
					type: 'GET',
					success: function( data ) {	
						$( "#pickup" ).val(data);
						$("#pickup_lat").val(lat);
						$("#pickup_lon").val(lng);
					}
				    });
			
			}
		});

</script>

<script>

		  function initialize() {

			 var options = { componentRestrictions: {country: "in"}};
					  
			var input = document.getElementById('pickup');
			var autocomplete = new google.maps.places.Autocomplete(input, options);
			
			// on auto place change set new latlng
			autocomplete.addListener('place_changed', function() {
			var place = autocomplete.getPlace();
			var pick_point = $( "#pickup" ).val();
	
					// save lat and lng also
					$.ajax({
					url: FULLURL+'calls/latlng',
					data: {
					address: pick_point
					},
					type: 'GET',
					success: function( data ) {
					var res = data.split("-");
					var lat = res['0'];
					var lon = res['1'];
					$("#pickup_lat").val(lat);
					$("#pickup_lon").val(lon);
					}
				    });
			
			if (!place.geometry) {
			  window.alert("Autocomplete's returned place contains no geometry");
			  return;
			}
			});
			}

			google.maps.event.addDomListener(window, 'load', initialize);
		  </script>
		  
	   <script>

		  function initialize() {

			var options = { componentRestrictions: {country: "in"}};
			
			var input = document.getElementById('drop');
			var autocomplete = new google.maps.places.Autocomplete(input, options);
			// on auto place change set new latlng
			autocomplete.addListener('place_changed', function() {
			var place = autocomplete.getPlace();
			var pick_point = $( "#drop" ).val();
	
					// save lat and lng also
					$.ajax({
					url: FULLURL+'calls/latlng',
					data: {
					address: pick_point
					},
					type: 'GET',
					success: function( data ) {
					var res = data.split("-");
					var lat = res['0'];
					var lon = res['1'];
					$("#drop_lat").val(lat);
					$("#drop_lon").val(lon);
					}
				    });
			
			if (!place.geometry) {
			  window.alert("Autocomplete's returned place contains no geometry");
			  return;
			}
			});
			
			}

			google.maps.event.addDomListener(window, 'load', initialize);
		  </script>
		  
		 <script>

		if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
       var ssd = "Geolocation is not supported by this browser.";
    }

var lat;

function showPosition(position) {
     var lat =  position.coords.latitude;
     var lon = position.coords.longitude;
	 
	// alert(lat);
	 //alert(lon);
     
	 $.ajax({
					url: FULLURL+'calls/address',
					data: {
					lat: lat,
					lon: lon
					},
					type: 'GET',
					success: function( data ) {
					$("#pickup").val(data);
					$("#drop").val(data);
					
					$("#drop_lat").val(lat);
					$("#drop_lon").val(lon);
					$("#pickup_lat").val(lat);
					$("#pickup_lon").val(lon);
					}
				    });
	 
}

</script>  	


<script>
(function(){
	
	   $("#keepsame").on("click",function(e) {            
					var pick_point = $( "#pickup" ).val();
					var drop_point = $( "#drop" ).val(pick_point);
                    var cv = $("#pickup_lat").val();
					var tv = $("#pickup_lon").val();
				    $("#drop_lon").val(tv);
					$("#drop_lat").val(cv);			
        });
		
})()
</script>	
	  
	  
<script>
(function(){
	
	   $(".schnxt").on("click",function(e) {            
			
					var pick_point = $( "#pickup" ).val();
					var drop_point = $( "#drop" ).val();
					var date = $( "#date" ).val();
					var time = $( "#time" ).val();

					if(pick_point == '')
					{
						              new jBox('Notice', {
									 content: 'Please choose pickup location !!',
									 animation: {open: 'tada', close: 'flip'},
									 color: 'red',
									 position: { x: 'right',y: 'top' },
									 offset: { x: -50, y: 100 }
									 }) ;
					return false;				 
					}
					
					if(date == '')
					{
						              new jBox('Notice', {
									 content: 'Please choose Date!!',
									 animation: {open: 'tada', close: 'flip'},
									 color: 'red',
									 position: { x: 'right',y: 'top' },
									 offset: { x: -50, y: 100 }
									 }) ;
					return false;				 
					}
					
					if(time == null)
					{
						              new jBox('Notice', {
									 content: 'Please choose Time Slot !!',
									 animation: {open: 'tada', close: 'flip'},
									 color: 'red',
									 position: { x: 'right',y: 'top' },
									 offset: { x: -50, y: 100 }
									 }) ;
					return false;				 
					}
					
					if(drop_point == '')
					{
						 new jBox('Notice', {
									 content: 'Please choose drop location !!',
									 animation: {open: 'tada', close: 'flip'},
									 color: 'red',
									 position: { x: 'right',y: 'top' },
									 offset: { x: -50, y: 100 }
									 }) ;
					return false;				 
					}
	
					localStorage.setItem("pick_point", pick_point);
					localStorage.setItem("drop_point", drop_point);
					localStorage.setItem("date", date);
					localStorage.setItem("time", time);
					localStorage.setItem("drop_lat", $("#drop_lat").val());
					localStorage.setItem("drop_lon", $("#drop_lon").val());
					localStorage.setItem("pickup_lat", $("#pickup_lat").val());
					localStorage.setItem("pickup_lon", $("#pickup_lon").val());
					localStorage.setItem("pickup_loc", $("#pickup_loc").val());
					localStorage.setItem("drop_loc", $("#drop_loc").val());
	                window.location = SHORTURL+"booking-details";
        });
		
})()
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
    padding-left: 14px !important;
    padding-right: 32px !important;
    padding-top: 4px !important;
    padding-bottom: 4px !important;
    font-weight: bold !important;	
	
}
</style> 
  
 