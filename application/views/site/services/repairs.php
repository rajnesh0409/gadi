     
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
							<h2>Repairs</h2>
							<h3>
							
							Get your vehicle repaired from our trusted service centers.
						   </h3>
							<p> 
							
							Damages, wear and tear in a vehicle are inevitable which demand immediate attention. This is mostly an expensive affair and people not only end up burning a big hole in their pocket because of lack of awareness but also endanger their lives by ignoring these minor/major glitches.
							 </p> 
						</div>
						<div class="col-lg-12 col-md-12">
							
						</div>
						<div class="professional_details">
							 <p> 
							 
						HOOPY offers you an effortless way to get your vehicle damages fixed at the most transparent and pocket friendly manner. We understand your problem and only after a technical inspection suggest repairs those are necessarily required. We ensure transparency, ‘zero up-selling”, use of genuine parts and provide six months warranty on the same. 
							 </p>
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
</style>
