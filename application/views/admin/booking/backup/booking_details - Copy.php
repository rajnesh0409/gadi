<?php
$this->load->view('admin/templates/header.php');
?>
<style>

.thtop {
	background: rgba(8, 8, 8, 0.58);
    color: white;
	text-align: center !important;
}

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
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span><?php echo $heading;?></h2>
						
					</div>
					<div class="box-content" style="overflow: auto;">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							 
                              <tr>
								  <th class="thtop">Booking</th>
					             <th colspan="2" class="thtop">Customer</th>
								 <th colspan="5" class="thtop">Vehicle</th>
								 <th colspan="4" class="thtop">Service Detail</th>
                                 <th colspan="2" class="thtop">Action</th>
							  </tr>


							 <tr>
								  <th> Number</th>
								  
								  <th>Name</th>
								  <th>Number</th>
								  
								  <th>Number</th>
								  <th>Brand</th>
								  <th>Model</th>
								  <th>Fuel_Type</th>
								   <th>Transmission</th>
								  
								   <th>Service_Category</th>
								   <th>Store_Name</th>
								   <th>Services</th>
                                   <th>Estimated_Cost</th>
								   
								   <th>Action</th>
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
								<td class="center"><?php echo $val['customer']['user_name'];?></td>
								<td class="center"><?php echo $val['customer']['mobile_no'];?></td>
								
								<td class="center"><?php echo $val['vehicle']['regno'];?></td>
								<td class="center"><?php echo $val['vehicle']['brand_name'];?></td>
								<td class="center"><?php echo $val['vehicle']['model_name'];?></td>
								<td class="center"><?php echo $val['vehicle']['fuel'];?></td>
								<td class="center"><?php echo $val['vehicle']['transmission'];?></td>
								
								
								<td class="center"><?php echo $val['booking']['cat_name'];?></td>
								<td class="center"><?php echo $storename;?></td>
								<td class="center"><?php echo $services;?></td>
								<td class="center"><?php echo $est_cost;?></td>
								
								<td class="center">
									<?php 
								
								if($row->status == 'Active'){
									$mode = 'Inactive';
								}elseif($row->status == 'Inactive'){
									$mode = 'Active';
								}
								
												
								//$mode = ($row->status == 'Active')?'0':'1';
								if ($mode == 'Active'){
							?>
                            		<a title="Click to active" class="tip_top" onclick="return confirm('Are you sure want to Active?')" href="admin/services/change_service_status/<?php echo $mode;?>/<?php echo $row->id;?>/<?php echo $row->partner_id;?>"><span class="label label-important"><?php echo $row->status;?></span></a>
								
							<?php
								}else if ($mode == 'Inactive'){ 	
							?>
							<a title="Click to inactive" onclick="return confirm('Are you sure want to Inactive?')" href="admin/services/change_service_status/<?php echo $mode;?>/<?php echo $row->id;?>/<?php echo $row->partner_id;?>"><span class="label label-success"><?php echo $row->status;?></span></a>
							<?php 
								}?>
                                </td>
							
								
								<td class="center">
	
	<a class="btn btn-danger" onclick="return confirm('Are you sure want to Delete?')" href="admin/services/delete_service/<?php echo $row->id;?>/<?php echo $row->partner_id;?>">
                               
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
                                
                                
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
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	
<?php 
$this->load->view('admin/templates/footer.php');
?>