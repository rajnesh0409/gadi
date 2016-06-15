  <?php $this->load->view('site/templates/bheader.php');?>
    
<div class="container">

    <?php $this->load->view('site/vehicles/midsection.php');?>
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4" style="padding-bottom: 45px;">
           
            <div class="account-wall">
                    
                <form class="form-signin" action="login-user" method="post" enctype="multipart/form-data">
               
                <div class="form-group labelholder">
				<input class="form-control" type="text" name="user_name" placeholder="Enter your Mobile or Email" required title="Enter your Mobile or Email">
			    </div>
				
				<div class="form-group labelholder">
				<input class="form-control" type="password" name="password" id="password" placeholder="Hoopy Password" title="Enter your password" required>
			    </div>

				
				<div style="margin-bottom: 15px;">
				<input id="checkbox-1" class="checkbox-custom" name="keeplogin" type="checkbox">
				<label style="color: #888181;font-weight: 400; font-size: 15px;" for="checkbox-1" class="checkbox-custom-label">Keep me logged in</label>
			  </div>
						
			
			  
                <button class="btn btn-md btn-primary btn-block hvr-glow" type="submit">
                    Sign in</button>
                     
               
             <a href="signup" class="pull-left need-help">New User </a>
                <a href="<?php echo SHORTURL; ?>forget-password" class="pull-right need-help">Forgot Password? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="#" class="text-center new-account"></a>
        </div>
    </div>
</div>

<script>
 $('.labelholder').labelholder();
</script>

  <?php $this->load->view('site/templates/footer.php');?>
  
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

<style>
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
    background: #EC610E;
    box-shadow: inset 0px 0px 0px 4px #fff;
}

.radio-custom + .radio-custom-label:before {
    border-radius: 50%;
}

.radio-custom:checked + .radio-custom-label:before {
    background: #ccc;
    box-shadow: inset 0px 0px 0px 4px #fff;
}


.checkbox-custom:focus + .checkbox-custom-label, .radio-custom:focus + .radio-custom-label {
  outline: 1px solid #ddd; /* focus style */
}
</style>
    
