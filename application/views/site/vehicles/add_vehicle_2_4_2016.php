     
	<?php $this->load->view('site/templates/bheader.php');?>
     
  
   
     <div class="container" style="padding-top: 140px;">
     
	 <?php $this->load->view('site/vehicles/midsection.php');?>
	
		 <div class="row">
			<ul id="tabs">
				<li><a href="#" class="t1" name="#tab1">Select Type</a></li>
				<li><a href="#" class="t2" name="#tab2">Select Brand</a></li>
				<li><a href="#" class="t3" name="#tab3">Select Model</a></li>
				<li><a href="#" class="t4" name="#tab4">Save Vehicle</a></li>    
			</ul>	
		</div>	
		
		 <div class="row">
			<div class="col-md-12">
				<div id="content" class="row"> 
					
					<div class="col-md-12 divu" id="tab1">
					
					<div class="row" style="padding-top:50px;">
					
						<div class="col-md-3" style="text-align:center;">
						<img src="images/vehicles/two.png" alt="hoopy"/>
						 <div>
							<input id="radio-1" class="radio-custom wheelers" name="radio-group" type="radio" value="Two Wheeler">
							<label for="radio-1" class="radio-custom-label">Two Wheeler</label>
						</div>
						</div>
					

						<div class="col-md-3" style="text-align:center;">
						<img src="images/vehicles/four.png" alt="hoopy"/>
						<div>
							<input id="radio-2" class="radio-custom wheelers" name="radio-group" type="radio" value="Four Wheeler">
							<label for="radio-2" class="radio-custom-label">Four Wheeler</label>
						</div>
						</div>
					</div>
					
					<div class="row" style="padding-top:50px;">
					<div class="col-md-3" style="text-align:center;">
					<button type="button" name="#tab2" class="btn btn-primary hvr-icon-wobble-horizontal btn-xs next2">Next</button>
					</div>
					</div>
					
					</div>
					
					
					<div class="col-md-12 divu" id="tab2">
						<div class="row" style="padding-top:50px;">
					
					

						<div class="col-md-3" style="text-align:center;">
						<img src="images/test/bold.jpg" class="imgc img-thumbnail" alt="hoopy"/>
						 <div>
							<input id="1" class="radio-custom" name="radio-group" type="radio" checked>
							<label for="1" class="radio-custom-label">Two Wheeler</label>
						</div>
						</div>
						
							<div class="col-md-3" style="text-align:center;">
						<img src="images/test/skoda.jpg" class="imgc img-thumbnail" alt="hoopy"/>
						<div>
							<input id="2" class="radio-custom"name="radio-group" type="radio">
							<label for="2" class="radio-custom-label">Four Wheeler</label>
						</div>
						</div>
								<div class="col-md-3" style="text-align:center;">
						<img src="images/test/bmw.jpg" class="imgc" alt="hoopy"/>
						<div>
							<input id="3" class="radio-custom"name="radio-group" type="radio">
							<label for="3" class="radio-custom-label">Four Wheeler</label>
						</div>
						</div>
						
								<div class="col-md-3" style="text-align:center;">
						<img src="images/vehicles/transport.png" class="imgc" alt="hoopy"/>
						<div>
							<input id="4" class="radio-custom"name="radio-group" type="radio">
							<label for="4" class="radio-custom-label">Four Wheeler</label>
						</div>
						</div>
						
								<div class="col-md-3" style="text-align:center;">
						<img src="images/vehicles/transport.png" class="imgc" alt="hoopy"/>
						<div>
							<input id="5" class="radio-custom"name="radio-group" type="radio">
							<label for="5" class="radio-custom-label">Four Wheeler</label>
						</div>
						</div>
						
						<div class="col-md-3" style="text-align:center;">
						<img src="images/vehicles/transport.png" class="imgc" alt="hoopy"/>
						<div>
							<input id="6" class="radio-custom"name="radio-group" type="radio">
							<label for="6" class="radio-custom-label">Four Wheeler</label>
						</div>
						</div>
						
					</div>
					
					<div class="row" style="padding-top:50px;padding-bottom: 50px;">
					<div class="col-md-12">
					<button style="float:right;" name="#tab3" type="button" class="btn btn-primary hvr-icon-wobble-horizontal btn-xs next3">Next</button>
					<button style="float:left;" name="#tab1" type="button" class="btn btn-primary hvr-icon-back btn-xs prev1">Prev</button>
					</div>
					</div>

					</div>
					
					
					<div class="col-md-12 divu" id="tab3">
					
					<div class="row" style="padding-top:50px;">

						<div class="col-md-3" style="text-align:center;">
						<img src="images/test/bold.jpg" class="imgc img-thumbnail" alt="hoopy"/>
						 <div>
							<input id="11" class="radio-custom" name="radio-group" type="radio" checked>
							<label for="11" class="radio-custom-label">Two Wheeler</label>
						</div>
						</div>
						
							<div class="col-md-3" style="text-align:center;">
						<img src="images/test/skoda.jpg" class="imgc img-thumbnail" alt="hoopy"/>
						<div>
							<input id="21" class="radio-custom"name="radio-group" type="radio">
							<label for="21" class="radio-custom-label">Four Wheeler</label>
						</div>
						</div>
								<div class="col-md-3" style="text-align:center;">
						<img src="images/test/bmw.jpg" class="imgc" alt="hoopy"/>
						<div>
							<input id="31" class="radio-custom"name="radio-group" type="radio">
							<label for="31" class="radio-custom-label">Four Wheeler</label>
						</div>
						</div>
						
								<div class="col-md-3" style="text-align:center;">
						<img src="images/vehicles/transport.png" class="imgc" alt="hoopy"/>
						<div>
							<input id="41" class="radio-custom"name="radio-group" type="radio">
							<label for="41" class="radio-custom-label">Four Wheeler</label>
						</div>
						</div>
						
								<div class="col-md-3" style="text-align:center;">
						<img src="images/vehicles/transport.png" class="imgc" alt="hoopy"/>
						<div>
							<input id="51" class="radio-custom"name="radio-group" type="radio">
							<label for="51" class="radio-custom-label">Four Wheeler</label>
						</div>
						</div>
						
						<div class="col-md-3" style="text-align:center;">
						<img src="images/vehicles/transport.png" class="imgc" alt="hoopy"/>
						<div>
							<input id="61" class="radio-custom"name="radio-group" type="radio">
							<label for="61" class="radio-custom-label">Four Wheeler</label>
						</div>
						</div>
						
					</div>
					
					<div class="row" style="padding-top:50px;padding-bottom: 50px;">
					<div class="col-md-12">
					<button style="float:right;" name="#tab4" type="button" class="btn btn-primary hvr-icon-wobble-horizontal btn-xs next4">Next</button>
					<button style="float:left;" name="#tab2" type="button" class="btn btn-primary hvr-icon-back btn-xs prev2">Prev</button>
					</div>
					</div>

					</div>
					
					
					<div class="col-md-12 divu" id="tab4">
					
					
						<div class="row" style="padding-top:50px;">

						<div class="col-md-3" style="text-align:center;float:left">
							
						  <div class="sdiv">Vehicle Type</div>
						  <div class="vdiv">Two wheeler</div>
						  
						  <div class="sdiv">Vehicle Brand</div>
						  <div class="vdiv">BMW</div>
						  
						  <div class="sdiv">Vehicle Model</div>
						  <div class="vdiv">ZO996</div>
						  
						</div>
						
						<div class="col-md-9" style="text-align:center; float:left">

							
						   <div class="sdiv">Registration no.</div>
						   <div class="form-group vdiv">
							  <input type="text" class="form-control" id="usr" style="width: 175px;">
						   </div>
						   
						   <div class="sdiv" style="clear: both;">Fuel Type</div>
					
							 <div style="float:left;padding-top: 5px;" class="vdiv"> 
							<input id="611" class="radio-custom"name="radio-group" type="radio">
							<label for="611" class="radio-custom-label">Petrol</label>
						  </div>
						  
						  <div style="padding-top: 5px;" class="vdiv">
							<input id="6111" class="radio-custom"name="radio-group" type="radio">
							<label for="6111" class="radio-custom-label">Diesel</label>
						  </div>

						</div>
						
					    </div>
						
						<div class="row" style="padding-top:50px;">
					<div class="col-md-8" style="text-align:center;">
					<button type="button" class="btn btn-primary  btn-xs hvr-glow">Add Vehicle</button>
					<button style="float:left;" name="#tab3" type="button" class="btn btn-primary hvr-icon-back btn-xs prev3">Prev</button>
					</div>
					</div>

			  
					</div>
					
					
				</div>
			</div>
	   </div> 
   
   </div>
   
   
	
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
  
.imgc {
width:200px;
height:200px;	 	 
}
 
 .checkbox-custom, .radio-custom {
    opacity: 0;
    position: absolute;   
}

.checkbox-custom, .checkbox-custom-label, .radio-custom, .radio-custom-label {
    display: inline-block;
    vertical-align: middle;
    margin: 5px;
    cursor: pointer;
}

.checkbox-custom-label, .radio-custom-label {
    position: relative;
}

.checkbox-custom + .checkbox-custom-label:before, .radio-custom + .radio-custom-label:before {
    content: '';
    background: #fff;
    border: 2px solid #ddd;
    display: inline-block;
    vertical-align: middle;
    width: 20px;
    height: 20px;
    padding: 2px;
    margin-right: 10px;
    text-align: center;
}

.checkbox-custom:checked + .checkbox-custom-label:before {
    background: rgba(242, 111, 33, 0.9);
    box-shadow: inset 0px 0px 0px 4px #fff;
}

.radio-custom + .radio-custom-label:before {
    border-radius: 50%;
}

.radio-custom:checked + .radio-custom-label:before {
    background: rgba(242, 111, 33, 0.9);
    box-shadow: inset 0px 0px 0px 4px #fff;
}


.checkbox-custom:focus + .checkbox-custom-label, .radio-custom:focus + .radio-custom-label {
  outline: 1px solid #ddd; /* focus style */
}
</style> 
  
  
  
  
  
  <style>
  .divu {  min-height: 351px;}

  #tabs {
  overflow: hidden;
  width: 100%;
  margin: 0;
  padding: 0;
  list-style: none;
}

#tabs li {
  float: left;
  margin: 0 -15px 0 0;
}

#tabs a {
  float: left;
  position: relative;
  padding: 0 25px;
  height: 0; 
  line-height: 30px;
  /* text-transform: uppercase; */
  text-decoration: none;
  color: #fff;
  border-right: 30px solid transparent;
  border-bottom: 30px solid #3D3D3D;
  border-bottom-color: #777\9;
  opacity: .3;
  filter: alpha(opacity=30);    
}

/* #tabs a:hover,
#tabs a:focus {
  border-bottom-color: #EE8606;
  opacity: 1;
  filter: alpha(opacity=100);
} */

#tabs a:focus {
  outline: 0;
}

#tabs #current {
  z-index: 3;
  border-bottom-color: #3d3d3d;
  opacity: 1;
  filter: alpha(opacity=100);   
}

#tabs a {
  height: 0; 
  line-height: 35px;
  border-right: 30px solid transparent;
  border-bottom: 35px solid #3D3D3D;    
}
  </style>
  
  <script>
  function resetTabs(){
    $("#content > div").hide(); //Hide all content
    $("#tabs a").attr("id",""); //Reset id's      
}

var myUrl = window.location.href; //get URL
var myUrlTab = myUrl.substring(myUrl.indexOf("#")); // For mywebsite.com/tabs.html#tab2, myUrlTab = #tab2     
var myUrlTabName = myUrlTab.substring(0,4); // For the above example, myUrlTabName = #tab

(function(){
    $("#content > div").hide(); // Initially hide all content
    $("#tabs li:first a").attr("id","current"); // Activate first tab
    $("#content > div:first").fadeIn(); // Show first tab content
    
 /*    $("#tabs a").on("click",function(e) {
        e.preventDefault();
        if ($(this).attr("id") == "current"){ //detection for current tab
         return       
        }
        else{             
        resetTabs();
        $(this).attr("id","current"); // Activate this
        $($(this).attr('name')).fadeIn(); // Show content for current tab
        }
    }); */
	
	   // next button 1st div
	   $(".next2").on("click",function(e) {            
       
        if($('.wheelers').is(':checked')) { 
		var vehtype = $( ".wheelers:radio:checked" ).val();
		alert(vehtype);
		
		localStorage.setItem("vehtype", vehtype);
		
		  $.ajax({
		  url: FULLURL+'Calls/brands',
		  data: {
			driver_id: 'sfsdfdsf',
			},
			type: 'POST',
			success: function( data ) {
				 alert(data);
                 $(".t2").html(data);				 
			}
		});
		
		 
		
		//alert("it's checked");

		}
		else { 
		
		 new jBox('Notice', {
                                 content: 'Please choose vehicle type !!',
								 animation: {open: 'tada', close: 'flip'},
								 color: 'red',
								 position: { x: 'right',y: 'top' },
								 offset: { x: -300, y: 330 }
								 }) ;
		return false; }


       //  return false;
	   resetTabs();
        $(".t2").attr("id","current"); // Activate this
        $($(this).attr('name')).fadeIn(); // Show content for current tab
        });
		
		 // next button 1st div
	   $(".prev1").on("click",function(e) {            
        resetTabs();
        $(".t1").attr("id","current"); // Activate this
        $($(this).attr('name')).fadeIn(); // Show content for current tab
		$('html, body').animate({
			scrollTop: "0px"
		}, 800);
        });
		
		 // next button 2nd div
	   $(".next3").on("click",function(e) {            
        resetTabs();
        $(".t3").attr("id","current"); // Activate this
        $($(this).attr('name')).fadeIn(); // Show content for current tab
		$('html, body').animate({
			scrollTop: "0px"
		}, 800);
        });
		
		$(".prev2").on("click",function(e) {            
        resetTabs();
        $(".t2").attr("id","current"); // Activate this
        $($(this).attr('name')).fadeIn(); // Show content for current tab
		$('html, body').animate({
			scrollTop: "0px"
		}, 800);
        });
		
		 // next button 3rd div
	   $(".next4").on("click",function(e) {            
        resetTabs();
        $(".t4").attr("id","current"); // Activate this
        $($(this).attr('name')).fadeIn(); // Show content for current tab
		$('html, body').animate({
			scrollTop: "0px"
		}, 800);
        });
		
		$(".prev3").on("click",function(e) {            
        resetTabs();
        $(".t3").attr("id","current"); // Activate this
        $($(this).attr('name')).fadeIn(); // Show content for current tab
		$('html, body').animate({
			scrollTop: "0px"
		}, 800);
        });
		

    for (i = 1; i <= $("#tabs li").length; i++) {
      if (myUrlTab == myUrlTabName + i) {
          resetTabs();
          $("a[name='"+myUrlTab+"']").attr("id","current"); // Activate url tab
          $(myUrlTab).fadeIn(); // Show url tab content        
      }
    }
})()
  </script>
	
	