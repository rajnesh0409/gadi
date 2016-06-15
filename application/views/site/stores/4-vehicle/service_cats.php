    
	<?php $this->load->view('site/templates/bheader.php');?>

     <div class="container">
     
	 <?php $this->load->view('site/vehicles/midsection.php');?>
	
		
		 <div class="row">
			<div class="col-md-12">
			
				<div id="content" class="row"> 
						
					<div class="row" style="padding-bottom:50px;">
					
					<input id="veh_id" name="veh_id" type="hidden" value="<?php echo $veh_id;?>">
					<input id="vehtype" name="vehtype" type="hidden" value="<?php echo $veh_type;?>">
					<input id="customer_id" name="customer_id" type="hidden" value="<?php echo $customer_id;?>">
					
					 <?php 
						if ($details->num_rows() > 0) {
							foreach ($details->result() as $row){
								
						if($row->cat_image!=''){
									$img = $row->cat_image;
									}else{
										$img = "no-image.png";
								}
                            $img = SHORTURL.'images/cats/'.$img;								
						?>
						

						<div class="col-md-2 hvr-float-shadow" style="text-align:center; margin-bottom: 15px;">
						<img id="img_<?php echo $row->name;?>" src="<?php echo $img;?>" class="imgc animated zoomIn" alt="hoopy"/>
						 <div>
							<input id="idji<?php echo $row->id;?>" class="radio-custom cats" name="radio-group" type="radio" value="<?php echo $row->name;?>">
							<label for="idji<?php echo $row->id;?>" class="radio-custom-label"><?php echo $row->name;?></label>
						</div>
						</div>
						
						<?php } } ?>
						
						<div class="col-md-2" style="text-align:center; margin-bottom: 15px;">
						<button type="button" class="btn-primary hvr-icon-forward btn-xs catnxt">Next</button> 
						</div>
						
					</div>

	
	</div>
			</div>
	   </div> 				
	</div> 
	
	  <?php $this->load->view('site/templates/footer.php');?>
	  
	  
	 <style>
	 .imgc {
      width: 185px;
      height: 185px;
      }
	  
	  .btn-group-xs>.btn, .btn-xs {
		padding-left: 14px !important;
		padding-right: 32px !important;
		padding-top: 4px !important;
		padding-bottom: 4px !important;
		font-weight: bold !important;	
	
    }
	 
     </style>	

<script>

(function(){
	
	   // next button 1st div
	   $(".catnxt").on("click",function(e) {            
			if($('.cats').is(':checked')) { 
					var cat_name = $( ".cats:radio:checked" ).val();
					var vehtype = $( "#vehtype" ).val();
					var veh_id = $( "#veh_id" ).val();
					var customer_id = $( "#customer_id" ).val();
					
					localStorage.clear();
					localStorage.setItem("cat_name", cat_name);
					localStorage.setItem("vehtype", vehtype);
					localStorage.setItem("veh_id", veh_id);
					localStorage.setItem("customer_id", customer_id);
					
					// if general service and vehicle type is two wheeler
					if(cat_name == 'General Service' && vehtype == 'Two%20Wheeler')
					{
					    window.location = SHORTURL+"schedule-service";

					}	
			}
			else { 
			
			 new jBox('Notice', {
									 content: 'Please choose service type !!',
									 animation: {open: 'tada', close: 'flip'},
									 color: 'red',
									 position: { x: 'right',y: 'top' },
									 offset: { x: -50, y: 100 }
									 }) ;
			return false; }

        });
		
})()
  </script>	 
	