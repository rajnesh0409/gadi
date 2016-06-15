     
	<?php $this->load->view('site/templates/bheader.php');?>
     
  
   
     <div class="container">
     
	 <?php $this->load->view('site/vehicles/midsection.php');?>
	
		 <div class="row">
		 <div class="col-md-12">
			<ul id="tabs">
				<li><a href="#" tab="1" class="t1 tabre" name="#tab1">Select Type</a></li>
				<li><a href="#"  tab="2" class="t2 tabre" name="#tab2">Select Brand</a></li>
				<li><a href="#"  tab="3" class="t3 tabre" name="#tab3">Select Model</a></li>
				<li><a href="#"  tab="4" class="t4 tabre" name="#tab4">Save Vehicle</a></li>    
			</ul>
	
		</div>	
		</div>	
		
		 <div class="row">
			<div class="col-md-12">
				<div id="content" class="row"> 
					
					<div class="col-md-12 divu" id="tab1">
					
					<div class="row" style="padding-top:50px;">
					
						<div class="col-md-3 hvr-float-shadow imgvehtype" id="twowheel"  style="text-align:center; cursor: pointer;">
						<img src="images/vehicles/two.png"  alt="hoopy" style="cursor:pointer;" />
						 <div>
							<input id="radio-1" class="radio-custom wheelers twowheel" name="radio-group" type="radio" value="Two Wheeler">
							<label for="radio-1" class="radio-custom-label">Two Wheeler</label>
						</div>
						</div>
					

						<div class="col-md-3 hvr-float-shadow imgvehtype" id="fourwheel" style="text-align:center; cursor: pointer;">
						<img src="images/vehicles/four.png"  alt="hoopy" style="cursor:pointer;" />
						<div>
							<input id="radio-2" class="radio-custom wheelers fourwheel" name="radio-group" type="radio" value="Four Wheeler">
							<label for="radio-2" class="radio-custom-label" >Four Wheeler</label>
						</div>
						</div>
					</div>
					
					<div class="row" style="padding-top:50px; display:none;">
					<div class="col-md-3" style="text-align:center;">
					<button type="button" name="#tab2" class="btn btn-primary hvr-icon-wobble-horizontal btn-xs next2">Next</button>
					</div>
					</div>
					
					</div>
					
					
					<div class="col-md-12 divu" id="tab2">
					Sorry!! We are updating brands list.......
					</div>
					
					
					<div class="col-md-12 divu" id="tab3">
						Sorry!! We are updating models list.......
					</div>
					
					
					<div class="col-md-12 divu" id="tab4">
					
					
	
						<div class="row" style="padding-top:50px;">
						
						

						<div class="col-md-3" style="text-align:center;float:left">
							
						  <div class="sdiv">Vehicle Type</div>
						  <div class="vdiv" id="vehtype"></div>
						  
						  <div class="sdiv">Vehicle Brand</div>
						  <div class="vdiv" id="brandname"></div>
						  
						  <div class="sdiv">Vehicle Model</div>
						  <div class="vdiv" id="modelname"></div>
						  
						  <div class="sdiv">Model Year</div>
						  <div class="vdiv">
						  <input type="text" class="form-control" id="modelyear"  name="modelyear" style="width: 65px;" required pattern="[0-9]{3,20}" title="No special characters allowed." placeholder="Year"> 
						   
						  </div>

						</div>
						
						<div class="col-md-9" style="text-align:center; float:left">

						<form class="form-horizontal" action="site/vehicles/save_vehicle" id="add_amenity" method="post" enctype="multipart/form-data">	
						   
						   <div class="rdiv">Registration no.</div>
						   <div class="vdiv">
						    <input type="hidden" class="form-control" id="veh_type" name="veh_type" style="width: 175px;">
							<input type="hidden" class="form-control" id="brand_name" name="brand_name" style="width: 175px;">
							<input type="hidden" class="form-control" id="model_name" name="model_name" style="width: 175px;">
							<input type="hidden" class="form-control" id="model_year" name="model_year" style="width: 175px;">
							<input type="hidden" class="form-control" id="model_img" name="model_img" style="width: 175px;">
							<input type="hidden" class="form-control" id="brand_img" name="brand_img" style="width: 175px;">
							<input type="text" class="form-control" id="regno"  name="regno" style="width: 206px;" required pattern="[A-Za-z0-9]{3,20}" title="No special characters allowed." placeholder="Enter registration number"> 
						   </div>
						   
						  <div class="rdiv" style="clear: both;">Fuel Type</div>
						  <div id="fueltype"> </div>
						  
						  <div class="rdiv" style="clear: both;">Transmission</div>	
						  <div id="trans">	</div>	

						 
						 
						</div>
						
					    </div>
						
						<div class="row" style="padding-top:50px;">
					<div class="col-md-11" style="text-align:center;">
					<button type="submit" class="btn btn-primary  btn-xs hvr-glow">Add Vehicle</button>
					<button style="float:left;display:none;" name="#tab3" type="button" class="btn btn-primary hvr-icon-back btn-xs prev3">Prev</button>
					</div>
					</div>

			        </form>
					</div>
					
					
				</div>
			</div>
	   </div> 
   
   </div>
   
   
	
   <?php $this->load->view('site/templates/footer.php');?>
   
   <script>
   $('body').on("click",".tabre", function(){
	
	var tab = parseInt($(this).attr('tab'));
	var ctab = parseInt(localStorage.getItem("tab").trim());  
	
	if(tab<ctab)
	{
		var name = $(this).attr('name');
		localStorage.setItem("tab", tab);
		resetTabs();
        $(this).attr("id","current"); // Activate this
		$(name).fadeIn();

		if(tab == '1')
		{
		  $('.t2,.t3,.t4').css('cursor','context-menu');	
		}
		
		if(tab == '2')
		{
		  $('.t3,.t4').css('cursor','context-menu');
		  $('.t1').css('cursor','pointer');		  
		}
		
		if(tab == '3')
		{
		  $('.t4').css('cursor','context-menu');
		  $('.t1,.t2').css('cursor','pointer');		  
		}
		
		if(tab == '4')
		{
		  $('.t1,.t2,.t3').css('cursor','pointer');		  
		}
	}		
	

   });
   </script>
   
   
   
   <script>
   $('body').on("change","#modelyear", function(){
    var myear = $(this).val();	
   $('#model_year').val(myear);
   });
   </script>
   
   
   <script>
$('body').on("keyup","#search-criteria", function(){	
    $('.models').hide();
    var txt = $('#search-criteria').val();
    $('.models').each(function(){
       if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
           $(this).show();
       }
    });
});

</script>


<script>
localStorage.setItem("tab", '1');
</script>

 <script>
 
$('body').on("click",".imgbrand", function(){	
  var s = $(this).attr('id');
  $("."+s).prop("checked", true);
   $(".next3").trigger("click");
});

$('body').on("click",".imgmodel", function(){	
  var s = $(this).attr('id');
  $("."+s).prop("checked", true);
   $(".next4").trigger("click");
});

$('body').on("click",".imgvehtype", function(){	
  var s = $(this).attr('id');
  $("."+s).prop("checked", true);
   $(".next2").trigger("click");
});

</script>
   
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
    	
	   // next button 1st div
	   $(".next2").on("click",function(e) {            
			if($('.wheelers').is(':checked')) { 
					var vehtype = $( ".wheelers:radio:checked" ).val();
					localStorage.setItem("vehtype", vehtype);
					localStorage.setItem("tab", '2');
					$('.t3,.t4').css('cursor','context-menu');
		            $('.t1').css('cursor','pointer');	
					  $.ajax({
					  url: FULLURL+'calls/brands',
					  data: {
						vehtype: vehtype
						},
						type: 'POST',
						success: function( data ) {
							 $("#tab2").html(data);				 
						}
					});

			}
			else { 
			
			 new jBox('Notice', {
									 content: 'Please choose vehicle type !!',
									 animation: {open: 'tada', close: 'flip'},
									 color: 'red',
									 position: { x: 'right',y: 'top' },
									 offset: { x: -50, y: 100 }
									 }) ;
			return false; }

		   resetTabs();
			$(".t2").attr("id","current"); // Activate this
			$($(this).attr('name')).fadeIn(); // Show content for current tab
        });
		
		 // prev button 2nd div
		 
		$('body').on("click",".prev1", function(e){	          
        resetTabs();
        $(".t1").attr("id","current"); // Activate this
        $($(this).attr('name')).fadeIn(); // Show content for current tab
		$('html, body').animate({
			scrollTop: "0px"
		}, 800);
        });
		
		 // next button 2nd div
		$('body').on("click",".next3", function(e){
        $("#tab3").html('Wait!! loading models....');				
		if($('.brands').is(':checked')) { 
					var brand_name = $( ".brands:radio:checked" ).val();
					var brand_img = $("#img_"+brand_name).attr('src');
					localStorage.setItem("brand_name", brand_name);
					localStorage.setItem("brand_img", brand_img);
					var vehtype = localStorage.getItem("vehtype");
					localStorage.setItem("tab", '3');
					var vehtype = vehtype.trim();
					$('.t4').css('cursor','context-menu');
		            $('.t1,.t2').css('cursor','pointer');	

					  $.ajax({
					  url: FULLURL+'calls/models',
					  data: {
						vehtype: vehtype,
						brand_name: brand_name
						},
						type: 'POST',
						success: function( data ) {
						$("#tab3").html(data);				 
						}
					});

			}
			else { 
			
			 new jBox('Notice', {
									 content: 'Please choose Brand !!',
									 animation: {open: 'tada', close: 'flip'},
									 color: 'red',
									 position: { x: 'right',y: 'top' },
									 offset: { x: -50, y: 100 }
									 }) ;
			return false; }
		
		resetTabs();
        $(".t3").attr("id","current"); // Activate this
        $($(this).attr('name')).fadeIn(); // Show content for current tab
		$('html, body').animate({
			scrollTop: "0px"
		}, 800);
        });
		
		$('body').on("click",".prev2", function(e){           
        resetTabs();
        $(".t2").attr("id","current"); // Activate this
        $($(this).attr('name')).fadeIn(); // Show content for current tab
		$('html, body').animate({
			scrollTop: "0px"
		}, 800);
        });
		
		 // next button 3rd div
		$('body').on("click",".next4", function(e){            
        
		if($('.models').is(':checked')) { 
					var model = $( ".models:radio:checked" ).val();
					var model = model.split(",");
					var model_id = model['2'];
					var model_year = model['1'];
					var model_name = model['0'];
					var model_year = model_year.trim();
					var model_name = model_name.trim();
					var model_img = $("#mimg_"+model_id).attr('src');
					var brand_name = localStorage.getItem("brand_name").trim();  
					var vehtype = localStorage.getItem("vehtype").trim();
					var brand_img = localStorage.getItem("brand_img").trim();
                    localStorage.setItem("tab", '4');
                    $('.t1,.t2,.t3').css('cursor','pointer');						
					

					$("#brandname").html(brand_name);
					$("#modelname").html(model_name);
					$("#modelyear").val(model_year);
					$("#vehtype").html(vehtype);
					
					$("#brand_name").val(brand_name);
					$("#model_year").val(model_year);
					$("#model_name").val(model_name);
					$("#veh_type").val(vehtype);
					
					$("#model_img").val(model_img);
					$("#brand_img").val(brand_img);
					
					 // updating fuel type
					 $.ajax({
					  url: FULLURL+'calls/fuel',
					  data: {
						model_name: model_name,
						model_year: model_year
						},
						type: 'POST',
						success: function( data ) {
						$("#fueltype").html(data);				 
						}
					});
					
					// updating transmission type
					 $.ajax({
					  url: FULLURL+'calls/transmission',
					  data: {
						model_name: model_name,
						model_year: model_year
						},
						type: 'POST',
						success: function( data ) {
						$("#trans").html(data);				 
						}
					});
					
					
					
			}
			else { 
			
			 new jBox('Notice', {
									 content: 'Please choose Model !!',
									 animation: {open: 'tada', close: 'flip'},
									 color: 'red',
									 position: { x: 'right',y: 'top' },
									 offset: { x: -50, y: 100 }
									 }) ;
			return false; }

		resetTabs();
        $(".t4").attr("id","current"); // Activate this
        $($(this).attr('name')).fadeIn(); // Show content for current tab
		$('html, body').animate({
			scrollTop: "0px"
		}, 800);
        });
		
		$('body').on("click",".prev3", function(e){            
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
	
 <style>
 
.sdiv {  
  padding-right: 20px;
  float:left; 
  font-weight: bold;
  padding-top: 10px;
  width: 55%;
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
cursor: pointer;	 	 
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
  opacity: .6;
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
  border-bottom-color: #EC610E;
  opacity: 1;
  filter: alpha(opacity=100);   
}

#tabs a {
  height: 0; 
  line-height: 35px;
  border-right: 30px solid transparent;
  border-bottom: 35px solid #3D3D3D;  
  cursor: context-menu;  
}
  </style>	