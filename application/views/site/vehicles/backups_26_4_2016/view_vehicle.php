     
	<?php $this->load->view('site/templates/bheader.php');?>
     
  
   
     <div class="container">
     
	 <?php $this->load->view('site/vehicles/midsection.php');?>
	
	
		 <div class="row">
			<div class="col-md-12">

 <table class="table">
    <thead>
      <tr style="background: rgba(128, 128, 128, 0.07);">
        <th>Brand Name</th>
        <th>Model Name</th>
		<th>Vehicle number</th>
		<th>Vehicle Type</th>
		<th>Fuel type </th>
		<th>Transmission </th>
		<th>Service</th>
      </tr>
    </thead>
    <tbody>
     
      <?php 
						if ($details->num_rows() > 0){
							foreach ($details->result() as $row){
						?>



	 <tr>
        <td>
			<img id="bimg_<?php echo $row->id;?>" src="<?php echo $row->brand_img;?>" class="imgc animated zoomIn" style="width: 100px;height: 100px;" alt="hoopy"/>		
		</td>
        
		<td>
		<img id="mimg_<?php echo $row->id;?>" src="<?php echo $row->model_img;?>" class="imgc animated zoomIn" style="width: 100px;height: 100px;" alt="hoopy"/>
	   </td>
	   
		
		 <td><?php echo $row->regno;?></td>
        <td><?php echo $row->veh_type;?></td>
		 <td><?php echo $row->fuel;?></td>
        <td><?php echo $row->transmission;?></td>
		<td>
		<a href="service-cats/<?php echo $row->id;?>/<?php echo $row->veh_type;?>" class="btn-primary hvr-icon-forward btn-xs">Book a Service</a> 
		</td>
      </tr>
	
	<?php  } } ?>

    </tbody>
  </table>
 
			</div>
	   </div> 
   
   </div>
   
   
	
   <?php $this->load->view('site/templates/footer.php');?>
   
  <style>
  
.table>thead>tr>th {
    vertical-align: bottom;
    border-bottom: 1px solid #ddd !important;
    font-weight: normal;
}

 th, td { text-align: left; vertical-align: middle !important;  color: #6B6A6A; font-size: 14px; font-family: 'Open Sans', sans-serif;}
 td { text-align: left; vertical-align: middle !important;  color: #8b8b8b; font-size: 14px; }

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
    padding-top: 5px !important;
    padding-bottom: 5px !important;
    font-weight: bold !important;	
	
}
 
</style>  
   
   

	
