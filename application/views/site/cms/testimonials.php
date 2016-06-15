<div class="row text-center">
                <div class="col-md-12 wow fadeIn">
                    <h3>TESTIMONIALS</h3>
					<hr class="colored">
                </div>
            </div>  


  <div class="row text-center">
      

  <?php 
						if ($tests->num_rows() > 0){
							foreach ($tests->result() as $row){
						?>
	  
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="single_icon  text-center"> 
						<a  class="hb-md-margin">
						<span class="inv hb-md hvr-shrink wow fadeInLeftBig">
							 <img src="images/testimonials/<?php echo $row->image;?>" style="width: 106px;height: 106px; border-radius: 65px;">
						</span> 
						</a>  
						<div class="icon_details">
							
							<p><?php echo $row->description;?>
							<h2><span style="color: rgba(242, 111, 33, 0.9);font-size: 14px;"><?php echo $row->name;?>,</span>
							<span style="font-size: 12px; text-transform: capitalize;"><?php echo $row->veh_name;?></span></h2>
                             </p>
						</div>
						
					</div>
				</div>
				
					<?php 
							}
						}
						?>
				
   </div>