
	
	<?php $this->load->view('site/templates/bheader.php');?>

     <div class="container">
     
	 <?php  $this->load->view('site/vehicles/midsection.php');?>
	
		  <div class="row">
		  
		    <div class="col-md-1">
	        <button type="button" class="btn-primary hvr-icon-back btn-xs" style="font-weight: bold;font-size: 14px;" onclick="window.history.back();">Prev</button>
		    </div>
		  
		  
		  <div class="col-md-4">
		 <div class="input-group">
		  <span class="input-group-addon" id="basic-addon1"><img src="<?php echo  SHORTURL; ?>assets/img/store.png" style="width: 13px;"/></span>
           <input type="text" id="searchTextField" class="form-control srch" placeholder="Search stores by location.." aria-describedby="basic-addon1" 
		   style="border-top-right-radius: 5px !important; border-bottom-right-radius: 5px !important;">
           	 </div>
			 
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
         
		  
		  <script>
		  function initialize() {

			var input = document.getElementById('searchTextField');
			var autocomplete = new google.maps.places.Autocomplete(input);
			
			// on auto place change set new latlng
			autocomplete.addListener('place_changed', function() {
			var place = autocomplete.getPlace();
			var pick_point = $( "#searchTextField" ).val();
	
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

		  </div>
		  
		  <div class="col-md-2">
		  	  <select class="sele">
            <option value="" selected disabled>Select Price range </option>
            <option>2500 - 5000</option>
            <option>5000 - 10000</option>
			<option>10000 - 15000</option>
			<option>15000 - 20000</option>
          </select>
		
		  
		  </div>
		   
		   <div class="col-md-2">
		    <select class="sele">
            <option value="" selected disabled>Select Distance range</option>
            <option>Up To 5km</option>
            <option>Up To 10km</option>
			<option>Up To 15km</option>
			<option>Up To 20km</option>
          
          </select>
		  </div>
		  
		    <div class="col-md-2">
		
		  </div>
		  
		   <div class="col-md-2">
		<button type="button" class="btn-primary hvr-icon-forward btn-xs nextbay" style="font-weight: bold;font-size: 14px;">Next</button>
		  </div>
		  
		  </div>
		 
		 
		 <div class="row" style="margin-top:19px; margin-bottom: 55px;">
		 	
		 
		 <div class="col-md-9">
			
			
			<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
           <div id="mapid"></div>
         </div>	
 
          <div class="col-md-3">
			
			   <h4>Store details</h4>
			   <div id="storevere"> </div>

           </div>	


			
	
		</div>	
		
	</div>	

	</div>	

<?php $this->load->view('site/templates/footer.php');?>



 
  <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
 
<!--  <script src="leaflet.js"></script> -->

 <style>
   
 /*   .leaflet-marker-pane > img { width: 39px !important;
    height: 39px !important; } */
	
	.storename {
	color: #333333;
    font-size: 14px;
    font-family: 'Open Sans', sans-serif;
    font-weight: 700;
    text-transform: uppercase;
    padding-top: 15px;
	margin: 0px;
	}
	
	.stserv {
	margin: 0px; 
	color: #8b8b8b;
    font-size: 14px;
    font-family: 'Open Sans', sans-serif;
    line-height: 24px;
	font-weight: normal;
	}
	
	.sele {
     border-radius: 5px;
    padding: 3px;
    margin: 0px;
    color: #8b8b8b;
    font-size: 14px;
    font-family: 'Open Sans', sans-serif;	
	width: 100%;	
	}
	
	.srch {
	height: 100%;
    padding: 3px;
    font-size: 14px;
    border-top-right-radius: 5px !important;
    border-bottom-right-radius: 5px !important;	
	text-indent: 5px;	
	}
	
	.hvr-icon-forward:before {
     padding: 1px 1px;
     font-size: 12px;
}

.hvr-icon-back:before {
     padding: 1px 1px;
     font-size: 12px;
}
	
 </style>
 
 <style>
#mapid { height: 500px; }
</style>
 
 
 <script> 
		if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
       var ssd = "Geolocation is not supported by this browser.";
    }

var lat;

function showPosition(position) {
     var lat =  position.coords.latitude;
     var lng = position.coords.longitude;
     localStorage.setItem("lat", lat);
     localStorage.setItem("lng", lng);	 	
}
		
		
		var lat = localStorage.getItem("lat");
		var lng = localStorage.getItem("lng");		
		var mymap = L.map('mapid').setView([lat,lng], 13);

		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpandmbXliNDBjZWd2M2x6bDk3c2ZtOTkifQ._QA7i5Mpkd_m30IGElHziw', {
			maxZoom: 22,
			attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="http://mapbox.com">Mapbox</a>',
			id: 'mapbox.streets'
		}).addTo(mymap);


		var greenIcon = L.icon({
		iconUrl: SHORTURL+'assets/img/store.png',
    iconSize:     [38, 38], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});


		var userIcon = L.icon({
    iconUrl: SHORTURL+'assets/img/super.png',
    iconSize:     [38, 38], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});

				var marker = L.marker([lat,lng], {icon: userIcon}).addTo(mymap);
				var vehtype = localStorage.getItem("vehtype").trim();
				var cat_name = localStorage.getItem("cat_name").trim();
	            var vehtype = vehtype.replace("%20", " ");

				$.ajax({
					url: FULLURL+'calls/stores_latlng',
					data: {
					lat: lat,
					lng: lng,
					vehtype: vehtype,
					cat_name: cat_name
					},
					type: 'POST',
					success: function( data ) {
					var aml = data.split("-");
					var s = aml.length;

					for (i = 0; i < s; i++) {
						
						var p = aml[i];
						var lmao = p.split(",");
						var ss = lmao.length;
						var store = lmao['0'];
						var slat = lmao['1'];
						var slng = lmao['2'];
						var dst = lmao['3'];
						
						
							L.marker([slat,slng], {icon: greenIcon}).addTo(mymap)
			               .bindPopup("<b>"+store+"</b><br />Approx. "+dst+" km away");

					}
					}
				    });
		
		
		
		
		/* L.circle([lat,lng], 5000, {
			color: '#EC610E',
			fillColor: '#EC610E',
			fillOpacity: 0.1
		}).addTo(mymap);  */

		var popup = L.popup();

		/*  function onMapClick(e) {
			popup
				.setLatLng(e.latlng)
				.setContent("You clicked the map at " + e.latlng.toString())
				.openOn(mymap);
		}  */

		mymap.on('click', onMapClick);

	</script>
	
	<script>
	window.onload = function () {
    if (! localStorage.justOnce) {
        localStorage.setItem("justOnce", "true");
        window.location.reload();
    }
	else
	{
		// call for store details
		var lat = localStorage.getItem("lat");
		var lng = localStorage.getItem("lng");
    
		 $.ajax({
					url: FULLURL+'calls/getstores',
					data: {
					lat: lat,
					lng: lng,
					vehtype: vehtype,
					cat_name: cat_name
					},
					type: 'POST',
					success: function( data ) {
					$("#storevere").html(data);
					}
				    });
						 				
	}	
	
	
	}
	</script>
	
	
	<script>
	
	$('body').on("click",".stores", function(){	
	var s = $(this).val();
	var j=1;
	var checkedValues = $('input:checkbox:checked').map(function() {
		
		var wow = this.value.split("-");
		var wew = wow['0'];	

		if(j == 1)
		{
			 storeid = wew;
			 services = wow['2'];
			 prices = wow['3'];
			 storeid = wow['0'];
			 storename = wow['1'];
			
		}	
		else
		{		
			if(storeid != wew)
			{
				alert("Oop's!! You can only choose multiple services under one store.");
				$(this).attr('checked', false); 
			}
			else
			{
				services = services+','+wow['2'];
				prices = parseInt(prices)+parseInt(wow['3']);
			   
			}	

        }
		
		j = j+1;
		return this.value;
	}).get(checkedValues);
	
		localStorage.setItem("services", services);
		localStorage.setItem("prices", prices);
        localStorage.setItem("storeid", storeid);
		localStorage.setItem("storename", storename);
	});	
	
	
			// move to next page
			$('body').on("click",".nextbay", function(e){	
			if($('.stores').is(':checked')) { 
			 
			       // Go for repairs page only for general service and repairs
					if(cat_name == 'General Service' || cat_name == 'Repairs')
					{
					    window.location = SHORTURL+"additional-repairs/"+vehtype;
					}
                    else
                    {
						window.location = SHORTURL+"schedule-services";
					}

			}
			else { 
			
			 new jBox('Notice', {
									 content: 'Please choose service for vehicle !!',
									 animation: {open: 'tada', close: 'flip'},
									 color: 'red',
									 position: { x: 'right',y: 'top' },
									 offset: { x: -50, y: 100 }
									 }) ;
			return false; }
			});
			
	</script>

   

