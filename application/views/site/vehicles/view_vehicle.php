     
	<?php $this->load->view('site/templates/bheader.php');?>
     
  
   
     <div class="container">
     
	 <?php $this->load->view('site/vehicles/midsection.php');?>
	
	
		 <div class="row">
			<div class="col-md-12">

 <table class="table">
    <thead>
      <tr style="background: rgba(128, 128, 128, 0.07);">
        <th style="padding-left: 42px;">Brand</th>
        <th>Model Name</th>
		<th>Vehicle number</th>
		<th>Vehicle Type</th>
		<th>Fuel type </th>
		<th>Transmission </th>
		<th>Km Count</th>
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
        
		<td><!--
		<img id="mimg_<?php echo $row->id;?>" src="<?php echo $row->model_img;?>" class="imgc animated zoomIn" style="width: 100px;height: 100px;" alt="hoopy"/>
	    -->
		<?php echo $row->model_name;?>
	   </td>
	   
		
		 <td><?php echo $row->regno;?></td>
        <td><?php echo $row->veh_type;?></td>
		 <td><?php echo $row->fuel;?></td>
        <td><?php echo $row->transmission;?></td>
		 <td><?php $km = $row->km;   if(empty($km)) { echo "___";} else { echo $km.' Km'; }?></td>
		
		<td>
		<a href="service-cats/<?php echo $row->id;?>/<?php echo $row->veh_type;?>" data-toggle="tooltip" title="Book a Service" class="btn-primary btn-xs">
		<i class="fa fa-check-square-o" aria-hidden="true"></i> Book
		</a> 
		
		<a href="edit-vehicle/<?php echo $row->id;?>" class="btn-info btn-xs" data-toggle="tooltip" title="Edit Vehicle details" style="margin-left: 8px !important;">
		<i class="fa fa-edit" aria-hidden="true" style="padding-right: 3px;"></i></a> 
		
		<a href="delete-vehicle/<?php echo $row->id;?>" class="btn-danger btn-xs" data-toggle="tooltip" title="Delete Vehicle" style="margin-left: 8px !important;">
		<i class="fa fa-trash" aria-hidden="true" style="padding-right: 3px;"></i></a> 
		
		</td>
		
      </tr>
	
	<?php  } } ?>

    </tbody>
  </table>
 
			</div>
	   </div> 
   
   </div>
   
   
	
   <?php $this->load->view('site/templates/footer.php');?>
   
   <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
   
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
    padding: 9px 12px !important;
	
}	

.btn-group-xs>.btn, .btn-xs {
    padding-top: 5px !important;
    padding-bottom: 5px !important;
    font-weight: bold !important;	
	
}
 
</style>  
   
   

	
