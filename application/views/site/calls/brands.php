 
						
					<div class="row" style="padding-top:50px;">
					
					   <?php 
						if ($details->num_rows() > 0){
							foreach ($details->result() as $row){
								
						if($row->brand_image!=''){
									$img = $row->brand_image;
									}else{
										$img = "no-image.png";
								}
                            $img = SHORTURL.'images/brands/'.$img;	
                        $brand = $row->name;
						$brandname = str_replace(" ","_",$brand);
						
						?>
					
						<div class="col-md-3 hvr-float-shadow imgbrand" id="bd_<?php echo $brandname;?>" style="text-align:center; margin-bottom: 15px;cursor:pointer;">
						<img id="img_<?php echo $brandname;?>" src="<?php echo $img;?>" class="imgc animated zoomIn" alt="hoopy" style="width:120px; height:120px;"/>
						 <div>
							<input id="idji<?php echo $row->id;?>" class="radio-custom brands bd_<?php echo $brandname;?>" name="radio-group" type="radio" value="<?php echo $row->name;?>">
							<label for="idji<?php echo $row->id;?>" class="radio-custom-label"><?php echo $row->name;?></label>
						</div>
						</div>
						
						<?php } } ?>	

					</div>
					
					<div class="row" style="padding-top:50px;padding-bottom: 50px;">
					<div class="col-md-12">
					<button style="float:right;display:none;" name="#tab3" type="button" class="btn btn-primary hvr-icon-wobble-horizontal btn-xs next3">Next</button>
					<button style="float:left;display:none;" name="#tab1" type="button" class="btn btn-primary hvr-icon-back btn-xs prev1">Prev</button>
					</div>
					</div>
					
					
				
	
	