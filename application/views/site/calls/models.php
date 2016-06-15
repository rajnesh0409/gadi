 
					<div class="row" style="padding-top:50px;">
					
						    <div class="col-md-3"></div>
						    <div class="col-md-3"></div>
						    <div class="col-md-3"></div>
							 <div class="col-md-3">
							 <div class="input-group">
							  <span class="input-group-addon" id="basic-addon1">  <i class="fa fa-car" style="color:white;"></i></span>
							  <input type="text" id="search-criteria" class="form-control" placeholder="Type model name..." aria-describedby="basic-addon1">
							 </div>
							 </div>
					
					</div>
					
					
					<div class="row">
					
					   <?php 
						if ($details->num_rows() > 0){
							foreach ($details->result() as $row){
								
						if($row->model_image!=''){
									$img = $row->model_image;
									}else{
										$img = "no-image.png";
								}
                            $img = SHORTURL.'images/vehicle-models/'.$img;								
						?>
					
						<div class="col-md-3 hvr-float-shadow models imgmodel" id="md_<?php echo $row->id;?>" style="text-align:center; margin-bottom: 15px; cursor:pointer;">
						<img id="mimg_<?php echo $row->id;?>" src="<?php echo $img;?>" class="imgc animated zoomIn" alt="hoopy"/>
						 <div>
							<input id="idmd<?php echo $row->id;?>" class="radio-custom models md_<?php echo $row->id;?>" name="radio-group" type="radio" value="<?php echo $row->model_name;?>,<?php echo $row->model_year;?>,<?php echo $row->id;?>">
							<label for="idmd<?php echo $row->id;?>" class="radio-custom-label"><?php echo $row->model_name;?></label>
						</div>
						</div>
						
						<?php } } else { echo "Sorry!! we are updating models under this brand."; }?>	

					</div>
					
				    <div class="row" style="padding-top:50px;padding-bottom: 50px;">
					<div class="col-md-12">
					<button style="float:right;display:none;" name="#tab4" type="button" class="btn btn-primary hvr-icon-wobble-horizontal btn-xs next4">Next</button>
					<button style="float:left;display:none;" name="#tab2" type="button" class="btn btn-primary hvr-icon-back btn-xs prev2">Prev</button>
					</div>
					</div>
					
					
				
	
	