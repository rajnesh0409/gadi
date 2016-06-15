  
  <?php $this->load->view('site/templates/bheader.php');?>
  
  <div class="container">
     
	 <?php $this->load->view('site/vehicles/midsection.php');?>
   
   <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4" style="padding-bottom: 45px;">
            <div class="account-wall">
            
               <!-- <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">-->
                <form class="form-signin" action="register" method="post" enctype="multipart/form-data">
                
				<div class="form-group labelholder">
				<input class="form-control" type="text" name="user_name" placeholder="Name" required>
			    </div>
				
				<div class="form-group labelholder">
				<input class="form-control" type="text" name="mobile_no" placeholder="Mobile Number" required pattern="[0-9]{10,15}" title="Only numbers allowed">
			    </div>

				<div class="form-group labelholder">
				<input class="form-control" type="email" name="email" placeholder="Email ID" required title="Enter valid Email id">
			    </div>
				
				<div class="form-group labelholder">
				<input class="form-control" type="password" name="password" id="password" placeholder="Hoopy Password" required>
			    </div>
				
				<div class="form-group labelholder">
				<input class="form-control" type="password" name="cf_password" id="cf_password" placeholder="Enter Password Again" required >
			    </div>
				
				<div class="form-group">
				
				<input id="radio-1" class="radio-custom" name="gender" type="radio" value="Male" required>
				<label for="radio-1" class="radio-custom-label fuel" style="color:rgba(0, 0, 0, 0.53)">Male</label>
						
                <input id="radio-2" class="radio-custom" name="gender" type="radio" value="Female" required>
				<label for="radio-2" class="radio-custom-label fuel" style="color:rgba(0, 0, 0, 0.53)">Female</label>
				
			    </div>
				
                <button type="submit" class="btn btn-primary  btn-md hvr-glow">Sign up</button>
				
				<!-- <button class="btn btn-lg btn-primary" type="submit">
                    Sign up</button> -->
					
					
             <a href="login" class="pull-center need-help">Already have an account? </a>
                </form>
                
                
            </div>
           
        </div>
    </div>
</div>

<script>
 $('.labelholder').labelholder();
</script>



<style>


.form-signin
{
    max-width: 330px;
    padding: 11px;
    margin: 0 auto;
}

.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}
.form-signin .checkbox
{
    font-weight: normal;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}

.form-signin input[type="text"], .form-signin input[type="email"]
{
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
	border-color: transparent;
    border-bottom: 1px solid #f26f21;
	box-shadow: inset 0 0px 0px transparent;
}
.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
	border-color: transparent;
    border-bottom: 1px solid #f26f21;
	box-shadow: inset 0 0px 0px transparent;
}
.account-wall
{
    margin-top: 20px;
    padding: 40px 0px 20px 0px;
    background-color: #f7f7f7;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.need-help
{
    margin-top: 10px;
	margin-left: 5px;
}

.need-help:hover
{
     text-decoration: underline;
}
   
.new-account
{
    display: block;
    margin-top: 10px;
	
}

#midcen {
text-align :center;	
	
}
</style>    
    
  <?php $this->load->view('site/templates/footer.php');?>