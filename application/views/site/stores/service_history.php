     
	<?php $this->load->view('site/templates/bheader.php');?>

     <div class="container">
     
	 <?php $this->load->view('site/vehicles/midsection.php');?>
	
	
		 <div class="row">
			<div class="col-md-12" >

 <table class="table">
    <thead>
       <tr style="background: rgba(128, 128, 128, 0.07);">
        <th>Booking number</th>
		<th>Store name</th>
		<th>Time Schedule Details</th>
		<th>Service Description</th>
		<th>Estimated Cost</th>
		<th>Status</th>
      </tr> 
    </thead>
    <tbody>
     
       <?php 
							foreach ($details as $key=>$val){
							$data = explode(",",$val['booking']['pick_point']);	
   							$pickup = $data['0'].','.$data['1'];
							$data2 = explode(",",$val['booking']['drop_point']);	
   							$drop = $data2['0'].','.$data2['1'];
							
							$storename = $val['booking']['store_name'];
							if(empty($storename))
							{
							 	$storename = '___';
							}	
							
							$services = $val['booking']['services'];
							if(empty($services))
							{
							 	$services = '___';
							}
							
							$est_cost = $val['booking']['est_cost'];
							if(empty($est_cost))
							{
							 	$est_cost = '___';
							}
						?>

	 <tr>
     
	   
		<td><?php echo $val['booking']['booking_no'];?></td>
		 <td><?php echo $storename;  ?></td>
		   
		   <td>
		   <div class="vdiv">Pickup location : <?php echo $pickup;?> </div>
		   <div style="clear: both;"></div>
		   
		    <div class="vdiv">Drop location : 
		  <?php echo $drop;?></div>
		    <div style="clear: both;"></div>
			
		    <div class="vdiv">Date: 
		    <?php echo $val['booking']['at_date'];?></div>
		   
		    <div class="vdiv">Time Slot: 
		    <?php echo $val['booking']['at_time'];?></div>
			
		   
		  
		   </td>
			
		    <td>
			 
			 <div class="vdiv">Vehicle number:
	        <?php echo $val['vehicle']['regno'];?></div>
		   <div style="clear: both;"></div>

			 <div class="vdiv">Service category:
		    <?php echo $val['booking']['cat_name'];?> </div>
		   <div style="clear: both;"></div>
		   
		    <div class="vdiv">Services booked : 
		   <?php echo $services;  ?> </div>
		    <div style="clear: both;"></div>
			</td>
			
			<td> Rs. <?php echo $est_cost;  ?></td>
	
       
		
		<?php 
		$iscancelled = $val['booking']['Iscancelled'];
		$status = $val['booking']['status'];
		if($iscancelled == 'Yes')
		{ ?>
			
		<td>
        <div style="margin-top:5px;">
		<a href="#" class="btn-primary btn-xs hvr-glow" style="background: rgba(245, 0, 0, 0.88);cursor: context-menu;">Service Cancelled</a> 
		</div>
		</td>

		<?php } elseif($status  == 'Service done') { ?>
        
		<td>
		<div style="margin-top:5px;">
		<a href="https://www.instamojo.com/abhinavhoopy/<?php echo $val['booking']['payment_slug'];?>/" rel="im-checkout" data-behaviour="remote" data-style="no-style" data-text="Make Payment" data-token="541d8a53313368e803c80dde7dc9e543"></a>
       <script src="https://d2xwmjc4uy2hr5.cloudfront.net/im-embed/im-embed.min.js"></script>
		</div>
        </td>

		<?php } else {	?>	

		<td>
		
		<?php
		
		if($status == 'Request recieved' || $status == 'Request confirmed')
		{ ?>
	     <span class="label label-primary" id="bsatus_<?php echo $val['booking']['id'];?>"><?php echo $val['booking']['status'];?></span>
		<?php } else { ?>
		 <span class="label label-success" id="bsatus_<?php echo $val['booking']['id'];?>"><?php echo $val['booking']['status'];?></span>
	    <?php } 
	    if($status != 'Service completed')
		{
	    ?>		
        
		<div style="margin-top:5px;">
		<a href="#" id="<?php echo $val['booking']['id'];?>" class="btn-primary btn-xs hvr-glow cancelbook">Cancel Booking</a> 
		</div>

		<?php } ?>
		
		</td>
		
		<?php } ?>
		
      </tr>
	  
	  <?php } ?>	
	  
    </tbody>
  </table>
 
			</div>
	   </div> 
   
   </div>
   
   
	
   <?php $this->load->view('site/templates/footer.php');?>
   
   <script>
   	$(".cancelbook").click(function(){
	
	var r = confirm("Are you sure to cancel this booking?");
    if (r != true) 
	{
	  	return false;
    }
	
	var book_id = $(this).attr('id');
	var status = $("#bsatus_"+book_id).html();
	
	$.ajax({
    url: FULLURL+'calls/cancelbooking',
    data: {
	book_id: book_id,
	status: status
	},
    type: 'POST',
    success: function( data ) {			
        
		if(data != 'success')
		{
			alert(data);
		}
       else
	   {
		   window.location.reload();
	   }		   
		
    }
	});
	});
   </script>
   
  <style>
  
  .im-checkout-btn 
{
    font-size: 13px;
    font-weight: bold !important;
    padding: 6px 20px !important;
    background-color: #f26f21;
    border-color: #f26f21;
    color: #ffffff !important;
    display: initial;
	    border-radius: 5px;
}

.im-powered-link	
{
	padding-top: 10px;
}


	

.table>thead>tr>th {
    vertical-align: bottom;
    border-bottom: 1px solid #ddd !important;
    font-weight: normal;
}

 th, td { width:20%; text-align: left; vertical-align: middle !important;  color: #6B6A6A; font-size: 14px; font-family: 'Open Sans', sans-serif;}
 td { width:20%; text-align: left; vertical-align: middle !important;  color: #8b8b8b; font-size: 14px; }
 
 
.sdiv {  
  font-weight: bold;
  padding: 8px;
    font-size: 14px;
	display: inline-block;
	line-height: 10px;
  }
  
  
  .vdiv {  
  display: inline-block;
  padding: 8px;
  color: #8b8b8b;
  font-size: 14px;
  font-family: 'Open Sans', sans-serif;
  line-height: 12px;
   width: 278px;
  }
  
  .btn-group-xs>.btn, .btn-xs {
    font-size: 11px;
    font-weight: bold !important;
    padding: 2px 6px !important;
	
}

</style>  
   
   

	
