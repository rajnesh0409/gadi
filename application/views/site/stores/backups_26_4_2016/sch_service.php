     
	<?php $this->load->view('site/templates/bheader.php');?>
     
  
   
     <div class="container">
     
	 <?php $this->load->view('site/vehicles/midsection.php');?>
	
		
		 <div class="row">
			<div class="col-md-12">
				<div id="content" class="row"> 

					<div class="col-md-12 divu">
					    <input type="hidden" id="lat" value="manual" />
						<input type="hidden" id="lon" value="manual" />
					
						<div class="row" style="padding-top:10px;">

						<div class="col-md-2 sdiv"> Address
						</div>
						
						<div class="col-md-3 vdiv">
						<input type="text" class="form-control" id="pickup"  name="pickup" required pattern="[A-Za-z0-9]{3,20}" title="No special characters allowed." placeholder="Enter pickup location"> 
						   
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
						  <option value="9 - 10 AM">9 - 10 AM</option>
						  <option value="10 - 11 AM">10 - 11 AM</option>
						   <option value="11 - 12 AM">11 - 12 AM</option>
						  <option value="12 - 1 PM">12 - 1 PM</option>
						   <option value="1 - 2 PM">1 - 2 PM</option>
						  <option value="2 - 3 PM">2 - 3 PM</option>
						   <option value="3 - 4 PM">3 - 4 PM</option>
						  <option value="4 - 5 PM">4 - 5 PM</option>
						   <option value="5 - 6 PM">5 - 6 PM</option>
						  <option value="6 -7 PM">6 -7 PM</option>
						  
						</select>

						</div>
						
						<div class="col-md-6 divu">
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
   
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
         
		  
		  <script>
		  function initialize() {

			var input = document.getElementById('pickup');
			var autocomplete = new google.maps.places.Autocomplete(input);
            
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
					$("#lat").val(lat);
					$("#lon").val(lon);
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
     
	 $.ajax({
					url: FULLURL+'calls/address',
					data: {
					lat: lat,
					lon: lon
					},
					type: 'GET',
					success: function( data ) {
					$("#pickup").val(data);
					
					$("#lat").val(lat);
					$("#lon").val(lon);
					}
				    });
	 
}

</script>  
   
   
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
		<script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
     

<script type="text/javascript">
							$(function () {
								$('#datetimepicker1').datetimepicker({ format: 'DD/MM/YYYY'});
							});
						</script>	 

<script>

(function(){
	
	   $(".schnxt").on("click",function(e) {            
			
					var pick_point = $( "#pickup" ).val();
					var date = $( "#date" ).val();
					var time = $( "#time" ).val();
					
					if(pick_point == '')
					{
						              new jBox('Notice', {
									 content: 'Please choose pickup point !!',
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
									 content: 'Please choose Date !!',
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
									 content: 'Please choose Time Slot!!',
									 animation: {open: 'tada', close: 'flip'},
									 color: 'red',
									 position: { x: 'right',y: 'top' },
									 offset: { x: -50, y: 100 }
									 }) ;
					return false;				 
					}
					

					var lat = $("#lat").val();
					var lon = $("#lon").val();
					localStorage.setItem("lat", lat);
					localStorage.setItem("lon", lon);
					localStorage.setItem("pick_point", pick_point);
					localStorage.setItem("drop_point", pick_point);
					localStorage.setItem("date", date);
					localStorage.setItem("time", time);
	                window.location = SHORTURL+"booking-detail-2w";
				
					
					
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
  
 