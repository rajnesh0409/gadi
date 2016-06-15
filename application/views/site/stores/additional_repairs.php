     
	<?php $this->load->view('site/templates/bheader.php');?>

     <div class="container">
     
	 <?php $this->load->view('site/vehicles/midsection.php');?>
	
		
		 <div class="row">
			<div class="col-md-12">
			
				<div id="content" class="row"> 

					<div class="col-md-12 divu">
					
					  <div class="row" style="padding-top:10px;">
					  
					   <?php 
						if ($details->num_rows() > 0){
							$i=1;
							foreach ($details->result() as $row){
                          	$sname = $row->service_name.'-'.$row->price.'-'.$row->id;	
                            $pname = $row->service_name.' - Rs. '.$row->price;							
						?>
					
						<div class="col-md-3 sdiv">
						<input id="<?php echo $row->service_name;?>" class="checkbox-custom" name="checkbox-1" type="checkbox" value="<?php echo $sname;?>">
				        <label for="<?php echo $row->service_name;?>" class="checkbox-custom-label stserv fuel"><?php echo $pname;?></label>
						</div>
						
						<?php  
						if($i%2 == 0) {  ?>
						<div class="col-md-6"> </div></div>
						 <div class="row" style="padding-top:10px;">
						<?php } ?>
						
						<?php $i++; } }  ?>
		
					</div>

					</div>
				</div>
					
					
					<div class="col-md-12 divu" style="padding-top: 15px; padding-bottom: 40px;">
					
					
						<div class="row">
						
						    <div class="col-md-3 sdiv">
						   <div class="form-group">
                           <textarea class="form-control" rows="3" placeholder="Service you looking for ??" id="add_repairs"></textarea>
                           </div>
							</div>

							<div class="col-md-3 sdiv">
							<button type="button" class="btn-primary hvr-icon-forward btn-xs repairs">Skip</button>
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
   
<script type="text/javascript">
							$(function () {
								$('#datetimepicker1').datetimepicker();
							});
						</script>	 
						
<script>
$('body').on("click",".checkbox-custom", function(){
		$('.repairs').text('Next');	
});

$('body').on("keyup","#add_repairs", function(){
		$('.repairs').text('Next');	
});

$('body').on("click",".repairs", function(){	

	var j=1;
	var services = '';
	var prices = '';
	var checkedValues = $('input:checkbox:checked').map(function() {

		var wow = this.value.split("-");
		if(j == 1)
		{ 
			 services = wow['0'];
			 prices = wow['1'];	
			 mnseoshrtr = wow['2']; 
		}	
		else
		{		
				services = services+','+wow['0'];
				mnseoshrtr = mnseoshrtr+','+wow['2'];
				prices = parseInt(prices)+parseInt(wow['1']);
        }
		
		j = j+1;
		return this.value;
	}).get(checkedValues);
		
			var add_repairs = $('#add_repairs').val();
			var lservices = localStorage.getItem("services").trim();  
			var lprices = localStorage.getItem("prices").trim();
			services = services+','+lservices;
			
			if(add_repairs != '')
			{
				services = services+','+add_repairs;
				
			}

			prices = parseInt(prices)+parseInt(lprices);
			localStorage.setItem("services", services);
			localStorage.setItem("prices", prices);
			
			if(checkedValues != '')
		   {
				$.ajax({
						url: FULLURL+'calls/repairservice',
						data: {
						mnseoshrtr: mnseoshrtr,
						},
						type: 'POST',
						success: function( data ) {
							data = data.trim();
							if(data == 'success')
							{
								window.location = SHORTURL+"schedule-services";
								
							}	
						}
				  });
		   }
			
		
		window.location = SHORTURL+"schedule-services"; 
       
	});	
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
  
 