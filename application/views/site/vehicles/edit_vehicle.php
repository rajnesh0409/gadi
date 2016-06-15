  
  <?php $this->load->view('site/templates/bheader.php');?>
  
  <div class="container">
     
	 <?php $this->load->view('site/vehicles/midsection.php');?>
   
   <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4" style="padding-bottom: 45px;">
            <div class="account-wall">
            
            
                <form class="form-signin" action="<?php echo SHORTURL;  ?>editvehicle" method="post" enctype="multipart/form-data">
                
				<div class="form-group labelholder">
				<input class="form-control" type="hidden" name="id" value="<?php echo $veh_details->row()->id;?>">
				<input class="form-control" type="text" name="regno" placeholder="Enter registration number" value="<?php echo $veh_details->row()->regno;?>" required>
			    </div>
				
				<div class="form-group labelholder">
				<input class="form-control" type="text" name="km" value="<?php echo $veh_details->row()->km;?>" placeholder="Enter Km count" required pattern="[0-9]{1,15}" title="Only numbers allowed">
			    </div>

				<div class="form-group">
				
				<div style="width: 55px;margin-top: 20px; margin-bottom: -8px;font-weight: bold;color: #736d6d;"> Fuel </div>
				<div id="fueltype"> </div>
				
			    </div>
				<br>
				<div class="form-group">
				<div style="width: 55px; margin-top: 12px;    margin-bottom: -21px; font-weight: bold; color: #736d6d;"> Transmission </div>
				
				
				
			    </div>
				<div id="trans"> </div>
				
                <button style="margin-top: 18px;" type="submit" class="btn btn-primary  btn-md hvr-glow">Update</button>
			
					
            
                </form>
                
                
            </div>
           
        </div>
    </div>
</div>

<script>
 $('.labelholder').labelholder();
</script>

<script>
 // updating fuel type
					 $.ajax({
					  url: FULLURL+'calls/fuel',
					  data: {
						model_name: '<?php echo $veh_details->row()->model_name;?>',
						model_year: '<?php echo $veh_details->row()->model_year;?>'
						},
						type: 'POST',
						success: function( data ) {
						$("#fueltype").html(data);
                        
						    var fuel = '<?php echo $veh_details->row()->fuel;?>';
							if(fuel == 'Diesel')
							{
								$("#diesel").prop("checked", true);
							}
							else if(fuel == 'Petrol')
							{
								$("#petrol").prop("checked", true);
							}
							else if(fuel == 'CNG')
							{
								$("#cng").prop("checked", true);
							}
							else 
							{
								$("#lpg").prop("checked", true);
							}
						}
					});
					
					// updating transmission type
					 $.ajax({
					  url: FULLURL+'calls/transmission',
					  data: {
						model_name: '<?php echo $veh_details->row()->model_name;?>',
						model_year: '<?php echo $veh_details->row()->model_year;?>'
						},
						type: 'POST',
						success: function( data ) {
						$("#trans").html(data);	
                        
							var trans = '<?php echo $veh_details->row()->transmission;?>';
							if(trans == 'Automatic')
							{
								$("#automatic").prop("checked", true);
							}
							else
							{
								$("#manual").prop("checked", true);
							}						
											
						}
					});
</script>

<style>
.radio-custom-label {
    font-weight: normal !important;	
}

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