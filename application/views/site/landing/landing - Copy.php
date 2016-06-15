     <?php $this->load->view('site/templates/header.php');?>
     <style>
	 .sbox {
	    background: rgba(242, 111, 33, 0.9);
        margin: 18px;
        display: block !important;	
        cursor: pointer;		
	 }
	 
	 .scont {
		margin-top: -7%; 
	 }
	 
	 .sbox:hover {
		 background-color: rgb(242, 111, 33);
	 }

	 </style>
	 

        <div class="container scont">

		   <div class="row text-center content-row owl-carousel" id="owl-demo">

				<div class="wow fadeIn lazyOwl" data-wow-delay=".2s">
                    <div class="about-content sbox hvr-float-shadow">
                       <!-- <i class="fa fa-eye fa-4x"></i>-->
                       <img src="images/car-wash.png" width="80" height="80">
                        <h4>Car Wash</h4>
                    </div>
                </div>
                <div class="wow fadeIn lazyOwl" data-wow-delay=".4s">
                    <div class="about-content sbox hvr-float-shadow">
                      <img src="images/break-down.png" width="80" height="80">
                        <h4>Break Down</h4>
                    </div>
                </div>
          
               <div class="wow fadeIn lazyOwl" data-wow-delay=".6s">
                    <div class="about-content sbox hvr-float-shadow">
                        <img src="images/regular-service.png" width="80" height="80">
                        <h4>Regular Service</h4>
                     </div>
                </div>
                <div class="wow fadeIn lazyOwl" data-wow-delay=".8s">
                    <div class="about-content sbox hvr-float-shadow">
                        <img src="images/repair.png" width="80" height="80">
                        <h4>Repair</h4>
                        
                       </div>
                </div>
				  <div class="wow fadeIn lazyOwl" data-wow-delay=".8s">
                    <div class="about-content sbox hvr-float-shadow">
                        <img src="images/repair.png" width="80" height="80">
                        <h4>Dent and Paint</h4>
                        
                       </div>
                </div>
				
            </div>
        </div>
   
	<script>
	

    $(document).ready(function() {
     
      $("#owl-demo").owlCarousel({
      items : 4, //10 items above 1000px browser width
      itemsDesktop : [1000,5], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,3], // betweem 900px and 601px
      itemsTablet: [600,2], //2 items between 600 and 0
      itemsMobile : false ,
	  autoPlay: true
       
      }); 
     
    });


	</script>
	
	 <?php $this->load->view('site/cms/how_it_works.php');?>

   <div class="container">
   <div class="row text-center">
                <div class="col-lg-12 wow fadeIn">
                   <h3 style="font-size:20px;">Our Team</h3>
                   <hr class="colored">
                  <p>We are a young dynamic team of Automotive, Technology and Operations enthusiasts passionate towards disrupting complications of your Vehicle maintenance.
    </p>
                </div>
    </div>
   
   
   
   	<div class="row text-center">
                <div class="col-lg-12 wow fadeIn">
                    <h3 style="font-size:20px;">About us</h3>
                     <hr class="colored">
                    <h5>Automobile care at your fingertips.</h5>
					<p>Hoopy aims at bringing the auto service industry at your fingertips. Giving you the convenience of getting your two-wheelers and four-wheelers serviced from the comfort of your home .Transparent process and Authenticity is our commitment
                    So sit back, relax and book your vehicle service from our App or Website and get offerings from handpicked highly rated service centers.
                    </p>
				
                </div>
    </div>
   
    <section id="process" class="services">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12 wow fadeIn">
                    <h3 style="font-size:20px;">Why Hoopy</h3>
                    <hr class="colored">
                    <p>Convenient, Authentic, Swift...</p>
                </div>
            </div>
            
        </div>
    </section>
    
    <section id="contact">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3 style="font-size:20px;">Contact Us</h3>
                    <hr class="colored">
                   
                </div>
            </div>
            <div class="row content-row">
                <div class="col-lg-8 col-lg-offset-2">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Message</label>
                                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-outline-dark">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
	</div>
	
  <?php $this->load->view('site/templates/footer.php');?>