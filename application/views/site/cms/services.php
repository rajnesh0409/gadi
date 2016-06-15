       
<style>

.ser_p {
    color: white;
    font-family: "Open Sans",sans-serif;
    font-size: 14px;
    line-height: 24px;
}

.about-content {
    padding: 8px;
}

.servp {
	
    color: white;
    font-family: 'Open Sans', sans-serif;
    font-size: 12px;
    line-height: 18px;
	
}

</style>


	   <div class="container scont">

		   <div class="row text-center content-row owl-carousel" id="owl-demo">

				
				   <div class="wow bounceInDown lazyOwl" data-wow-delay=".6s">
                    <a href="<?php echo SHORTURL; ?>general-service" class="about-content sbox hvr-float-shadow">
                        <img src="images/regular-service.png" width="80" height="80">
                        <h4 class="serv">General Service</h4>
						<p class="servp">Your vehicle’s periodic maintenance made easy</p>
                     </a>
                </div>
				
				      <div class="wow bounceInDown lazyOwl" data-wow-delay=".8s">
                    <a href="<?php echo SHORTURL; ?>repairs" class="about-content sbox hvr-float-shadow">
                        <img src="images/repair.png" width="80" height="80">
                        <h4 class="serv">Repair</h4>
                        <p class="servp">Get your vehicle repaired from our trusted service centers</p>
                    </a>
                </div>
				
				  <div class="wow bounceInDown lazyOwl" data-wow-delay=".4s">
                   <a href="<?php echo SHORTURL; ?>breakdown-service" class="about-content sbox hvr-float-shadow">
                      <img src="images/break-down.png" width="80" height="80">
                        <h4 class="serv">Breakdown Services</h4>
						<p class="servp">Feel safe with our instant roadside assistance 24x7</p>
                    </a>
                </div>
				
				
				<div class="wow bounceInDown lazyOwl" data-wow-delay=".2s">
                    <a href="<?php echo SHORTURL; ?>carwash-and-detailing" class="about-content sbox hvr-float-shadow">
                       <!-- <i class="fa fa-eye fa-4x"></i>-->
                       <img src="images/car-wash.png" width="80" height="80">
                        <h4 class="serv">Car wash & Detailing</h4>
						<p class="servp">High quality washing and detailing services for your car</p>
						
                    </a>
                </div>
				
				
              
 
				  <div class="wow bounceInDown lazyOwl" data-wow-delay=".8s">
                    <a href="<?php echo SHORTURL; ?>denting-painting" class="about-content sbox hvr-float-shadow">
                        <img src="images/dent-paint.png" width="80" height="80">
                        <h4 class="serv">Denting and Painting</h4>
                         <p class="servp">Dents and Scratch removal experts in your neighborhood</p>
                    </a>
                </div>
				
            </div>
        </div>
   
	<script>
	

    $(document).ready(function() {
     
      $("#owl-demo").owlCarousel({
      items : 5, //10 items above 1000px browser width
      itemsDesktop : [1000,5], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0
      itemsMobile : false ,
	  autoPlay: true
       
      }); 
     
    });


	</script>