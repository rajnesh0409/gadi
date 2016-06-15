     
	<?php $this->load->view('site/templates/bheader.php');?>
     
  
   
     <div class="container">
     
	 <?php $this->load->view('site/vehicles/midsection.php');?>
	
		
		 <div class="row">
			<div class="col-md-12">
				<div id="content" class="row"> 

					<div class="col-md-12 divu">
					
					
						<div class="row" style="padding-top:10px;">

						<div class="col-md-2 sdiv"> Pickup Location
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

						<div class="col-md-2 sdiv"> Date and Time
						</div>
						
						<div class="col-md-3 vdiv">
							<div class="">
									<div class='input-group date' id='datetimepicker1' style="width: 100%;">
										<input type='text' class="form-control" id="datetime" />
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
					
					
						<div class="row">

						<div class="col-md-2 sdiv"> Drop Location
						</div>
						
						<div class="col-md-3 vdiv">
						<input type="text" class="form-control" id="drop"  name="drop" required pattern="[A-Za-z0-9]{3,20}" title="No special characters allowed." placeholder="Enter drop location"> 
						   
						</div>
						
					
					</div>
					</div>
					
					
					<div class="col-md-12 divu" style="padding-top: 10px;">
					
					
						<div class="row">

							<div class="col-md-2 sdiv">
							<button type="button" class="btn-primary hvr-icon-back btn-xs" style="padding-left: 32px !important; padding-right: 14px !important;">Prev</button>
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
								$('#datetimepicker1').datetimepicker();
							});
						</script>	 

<script>

(function(){
	
	   $(".schnxt").on("click",function(e) {            
			
					var pick_point = $( "#pickup" ).val();
					var drop_point = $( "#drop" ).val();
					var datetime = $( "#datetime" ).val();
					
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
					
					if(datetime == '')
					{
						              new jBox('Notice', {
									 content: 'Please choose Date and Time !!',
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
									 content: 'Please choose drop point !!',
									 animation: {open: 'tada', close: 'flip'},
									 color: 'red',
									 position: { x: 'right',y: 'top' },
									 offset: { x: -50, y: 100 }
									 }) ;
					return false;				 
					}

					localStorage.setItem("pick_point", pick_point);
					localStorage.setItem("drop_point", drop_point);
					localStorage.setItem("datetime", datetime);
	                window.location = SHORTURL+"booking-detail";
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
  
 