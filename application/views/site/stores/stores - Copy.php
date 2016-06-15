     
	<?php // $this->load->view('site/templates/bheader.php');?>
     
  
   
     <div class="container">
     
	 <?php // $this->load->view('site/vehicles/midsection.php');?>
	
		 <div class="row">
		 <div class="col-md-12">
			
    



			
		</div>	
		</div>	
		
	</div>	
	
	<div id="mapid"></div>
	
	        <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />


 
 
 
 
  <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
 
<!--  <script src="leaflet.js"></script> -->

 <style>
    .leaflet-marker-pane > img { width: 39px !important;
    height: 39px !important; } 
	
	.leaflet-map-pane, .leaflet-tile, .leaflet-marker-icon, .leaflet-marker-shadow, .leaflet-tile-pane, .leaflet-tile-container, .leaflet-overlay-pane, .leaflet-shadow-pane, .leaflet-marker-pane, .leaflet-popup-pane, .leaflet-overlay-pane svg, .leaflet-zoom-box, .leaflet-image-layer, .leaflet-layer{
   
	}
	
 </style>
 
 
 <script>

		var mymap = L.map('mapid').setView([51.505, -0.09], 13);

		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpandmbXliNDBjZWd2M2x6bDk3c2ZtOTkifQ._QA7i5Mpkd_m30IGElHziw', {
			maxZoom: 22,
			attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="http://mapbox.com">Mapbox</a>',
			id: 'mapbox.streets'
		}).addTo(mymap);


		var greenIcon = L.icon({
    iconUrl: 'animals.png',
    shadowUrl: 'leaf-shadow.png',

    iconSize:     [38, 95], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});


		L.marker([51.5, -0.09], {icon: greenIcon}).addTo(mymap)
			.bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();
			
		L.marker([51.50575, -0.13922], {icon: greenIcon}).addTo(mymap)
			.bindPopup("<b>Hello world!</b><br /> <a href='#'>Book a Service</a>").openPopup();	
			

		L.circle([51.508, -0.11], 500, {
			color: 'red',
			fillColor: '#f03',
			fillOpacity: 0.5
		}).addTo(mymap).bindPopup("I am a circle.");

		L.polygon([
			[51.509, -0.08],
			[51.503, -0.06],
			[51.51, -0.047]
		]).addTo(mymap).bindPopup("I am a polygon.");


		var popup = L.popup();

		function onMapClick(e) {
			popup
				.setLatLng(e.latlng)
				.setContent("You clicked the map at " + e.latlng.toString())
				.openOn(mymap);
		}

		mymap.on('click', onMapClick);

	</script>