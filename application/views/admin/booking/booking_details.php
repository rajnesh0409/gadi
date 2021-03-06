<?php
$this->load->view('admin/templates/header.php');
?>
<style>

.thtop {
	background: rgba(8, 8, 8, 0.58);
    color: white;
	text-align: center !important;
}

.psd { margin-left: 10px; } 
</style>
		<div class="container-fluid-full">
		<div class="row-fluid">
				
		<?php $this->load->view('admin/templates/sidebar');?>
			
			
			<!-- start: Content -->
			<div id="content" class="span10">

			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="<?php echo base_url();?>admin">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#"><?php echo $heading;?> </a></li>
			</ul>

			<div class="row-fluid">		
				<div class="span12" style="margin-top: 10px;margin-bottom: 15px;">
			
								 
			<a class="btn btn-primary psd" href="admin/booking/booking_details/pending">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Pending Booking 
                                 </a>
			
			<a class="btn btn-info psd" href="admin/booking/booking_details/live">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Live Booking 
                                 </a>					 
								 
            <a class="btn btn-success psd" href="admin/booking/booking_details/completed">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Completed Booking 
                                 </a>	
            <a class="btn btn-danger psd" href="admin/booking/booking_details/cancelled">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Cancelled Booking 
                                 </a>									 
			
			</div>
			</div>
			
			<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span><?php echo $heading;?></h2>
						
					</div>
					<div class="box-content" style="overflow: auto;">
						<table class="table table-striped table-bordered bootstrap-datatable datatable" id="tablu">
						  <thead>
							   <tr>
								  <th class="thtop" colspan="">Booking</th>
					             <th class="thtop" colspan="2">Customer</th>
								 <th class="thtop" colspan="2">Vehicle</th>
								 <th class="thtop" colspan="4">Booking Detail</th>
								 <th class="thtop">Status</th>
								 <th colspan="2" class="thtop">Delivery Boy</th>
                                
							  </tr>


							 <tr>
								  <th>Number</th>  
								  <th>Name</th>
								  <th>Phone no.</th>
								   <th>Brand</th>
								   <th>Model</th>
								   <th>Date</th>
								   <th>Time_Slot</th>
								    <th>Status</th>
								   <th>Details</th>
								  
								   <th>Assign</th>
								   <th>Unassign</th>
								   

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
								
                                <td class="center"><?php echo $val['booking']['booking_no'];?></td>
								<td class="center"><div style="width:118px;"><?php echo $val['customer']['user_name'];?></div></td>
								<td class="center"><?php echo $val['customer']['mobile_no'];?></td>
								
								<td class="center"><?php echo $val['vehicle']['brand_name'];?></td>
								<td class="center"><div style="width:118px;"><?php echo $val['vehicle']['model_name'];?></div></td>
							
								  <td class="center"><?php echo $val['booking']['at_date'];?></td>
								   <td class="center"><div style="width:80px;"><?php echo $val['booking']['at_time'];?></div></td>

								  

								<td>
								<?php 
								$Iscancelled =  $val['booking']['Iscancelled'];
								if($Iscancelled == 'Yes') { ?>
                              <span class="label label-important">Service Cancelled</span>
							  <?php } else { ?>
								
								   <select id="<?php echo $val['booking']['id'];?>" name="stausji" class="required status">
								      <option value="Request recieved" disabled <?php $status = $val['booking']['status']; if($status == 'Request recieved') { echo 'selected'; }  ?>>Request recieved</option>
								      <option value="Request confirmed" <?php $status = $val['booking']['status']; if($status == 'Request confirmed') { echo 'selected'; }  ?> >Request confirmed</option>
								      <option value="Pickup driver assigned" <?php $status = $val['booking']['status']; if($status == 'Pickup driver assigned') { echo 'selected'; }  ?>>Pickup driver assigned</option>
								      <option value="Vehicle picked" <?php $status = $val['booking']['status']; if($status == 'Vehicle picked') { echo 'selected'; }  ?>>Vehicle picked</option>
									  <option value="Service ongoing" <?php $status = $val['booking']['status']; if($status == 'Service ongoing') { echo 'selected'; }  ?>>Service ongoing</option>
									  <option value="Service done" <?php $status = $val['booking']['status']; if($status == 'Service done') { echo 'selected'; }  ?>>Service done</option>
									  <option value="Drop off driver assigned" <?php $status = $val['booking']['status']; if($status == 'Drop off driver assigned') { echo 'selected'; }  ?>>Drop off driver assigned</option>
									  <option value="Service completed" <?php $status = $val['booking']['status']; if($status == 'Service completed') { echo 'selected'; }  ?>>Service completed</option>

									</select>
									
								<?php } ?>	
									
								 </td>
								 
								   <td><a class="btn btn-primary" href="admin/booking/booking_memo/<?php echo $val['booking']['id'];?>">
                                <i class="fa fa-cogs" aria-hidden="true"></i> View Details  
                                 </a></td>
								 
								 <td><a class="btn btn-primary" href="#">
                                <i class="fa fa-user" aria-hidden="true"></i> Assign  
                                 </a></td>
								 <td><a class="btn btn-primary" href="#">
                                <i class="fa fa-user" aria-hidden="true"></i> Unassign 
                                 </a></td>
								
	
                                
							</tr>
							
							<?php 
							
						}
						?>
							
							
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			
		
			
		
    

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		

<?php 
$this->load->view('admin/templates/footer.php');
?>

<script>

			  $(document).on("change",".status", function(){         
				  
				   var todo = $(this).val();
				    var book_id = $(this).attr('id');
				   // updating booking status
					  $.ajax({
					  url: FULLURL+'calls/booking_status',
					  data: {
						book_id: book_id,
						todo: todo,
						},
						type: 'POST',
						success: function( data ) {
                        alert(data);						
						}
					}); 
					
		   });			
</script>

