     
	<?php $this->load->view('site/templates/bheader.php');?>
     
  
   
     <div class="container">
		
		 <div class="row">
			
			<div class="container" style="margin-bottom: 45px; margin-top: 111px;">
			<div class="row">
				<div class="professional">
					<!-- left column -->
					<div class="col-lg-5 col-md-5">
						<div class="single_service">
							<img src="images/single-service.jpg" alt="">
						</div>
					</div>
					<!-- right column -->
					<div class="col-lg-7 col-md-7">
						<div class="professional_details">
							<h2> Breakdown Services</h2>
							<h3>
							Feel safe with our instant roadside assistance 24x7.
						   </h3>
							<p> 
							
						When you are cruising through open roads, it is reassuring to know that there is someone who would rescue you in case of a vehicle breakdown. We understand the discomfort of being stranded with a battered vehicle and waiting too long for support. With Hoopy’s 24x7 roadside assistance you can have a peace of mind and explore the limits without worrying. If you find yourself stuck on a deserted highway, ran out of fuel, got locked out or need towing service, you can rely on our network of competent breakdown service providers. We securely transport your vehicle to a nearby local garage. 
							  </p> 
						</div>
						<div class="col-lg-12 col-md-12">
							<div class="profession_list">
								<ul>
									<li><a href=""><i class="fa fa-hand-o-right" aria-hidden="true"></i>	Towing</a></li>
									<li><a href=""><i class="fa fa-hand-o-right" aria-hidden="true"></i>	Fuel Over</a></li>
									<li><a href=""><i class="fa fa-hand-o-right" aria-hidden="true"></i>	Battery Drained</a></li> 
									<li><a href=""><i class="fa fa-hand-o-right" aria-hidden="true"></i>    Roadside Repair</a></li>
									<li><a href=""><i class="fa fa-hand-o-right" aria-hidden="true"></i>   Flat tyre</a></li>
								</ul>
							</div>
								<div class="professional_details" style="margin-top: 33px;">
						<a href="<?php echo SHORTURL; ?>booknow" data-placement="right" data-toggle="tooltip" title="Book a Service for your vehicle" class="btn-primary btn-xs hvr-glow">
		                <i class="fa fa-check-square-o" aria-hidden="true"></i> Book Service
		               </a>
					</div>
						</div>
						
						
					</div>
				</div> 
				
			</div>
		</div>
			
			
	   </div> 
   
   </div>
   
   
	
   <?php $this->load->view('site/templates/footer.php');?>
  	<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
   
     <style>
  
 .btn-primary {
    color: #ffffff !important;
    background-color: #f26f21 !important;
    border-color: #f26f21 !important;
}



.btn-group-xs>.btn, .btn-xs {
    padding: 9px 12px !important;
	
}	

.btn-group-xs>.btn, .btn-xs {
    padding-top: 8px !important;
    padding-bottom: 8px !important;
    font-weight: bold !important;	
	font-size: 15px;
}
 
</style>  
	
<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800,800italic,300italic);

img {
    max-width: 100%;
}

/** most professionals area start **/
 
#professional_area {
    background: #f9f9f9;
    padding: 60px 0 80px; 
}
.professional_details{}
.professional_details h2{
	font-family: 'Open Sans', sans-serif;
    font-size: 32px;
    color: #1d1b17;
	font-weight:900;
	line-height:40px;
	text-transform:initial;  }
.professional_details h3{
	font-family:  'Open Sans', sans-serif;
    font-size: 16px;
    color: #ef5050;
	font-weight:600;
	line-height:20px;
  margin: 0;
  text-transform:initial; 
}
.professional_details p{
	font-family:  'Open Sans', sans-serif;
    font-size: 14px;
    color: #8b8b8b;
	font-weight:400;
	line-height:25px;
	margin-top:20px;
}

 

*****************************/ 

/*** SINGLE SERVICE PAGE ***/
#single_service_area{
	padding:100px 0;
}
.single_service img {
    padding-top: 30px; 
}

.single_service_heading {
    padding-top: 12%;
}
.single_service_heading h2 {
    font-size: 50px;
    font-family: 'Open Sans', sans-serif;
    font-weight: 900;
    color: #fff;
    border-top: 1px solid #fff;
    border-bottom: 1px solid #fff;
    margin: 0 26%;
    padding: 1% 0;
}
.single_service_heading h3{
	font-size: 16px;
    font-family: 'Open Sans', sans-serif;
    font-weight: 300;
	color:#fff;
}
.profession_list ul li a {
    text-decoration: none;
    color: #1d1b17;
    font-size: 15px;
    font-family: 'Open Sans', sans-serif;
    font-weight: 600;
}
.profession_list ul li i {
    color: #ef5050;
    padding: 0 10px;
}
.profession_list ul li {
    padding: 10px 0;
}
.profession_list ul {
    margin: 0;
    padding: 0;
    list-style: none;
}
.profession_list {
    margin-left: -20px;
}
</style>

