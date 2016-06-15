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
						<table class="table table-striped table-bordered bootstrap-datatable datatable" >
						  <thead>
						  
							  <tr>
								  <th colspan="8" class="thtop">Service partners</th>
					             <th colspan="2" class="thtop">Workshop</th>
								 <th colspan="2" class="thtop">Manager</th>
								 <th colspan="2" class="thtop">Services</th>
								 <th colspan="2" class="thtop">Stores</th>
                                 <th colspan="2" class="thtop">Action</th>
							  </tr>

							 <tr>
								  <th>Name</th>
								  <th>Business</th>
								   <th>Authorization</th>
								  <th>Service_categories</th>
                                  <th>Phone_no.</th>
								  <th>Email Id</th>
                                  <th>TIN</th>
								  <th>Address</th>
								  <th>Email Id</th>
								  <th>Phone no.</th>
								  <th>Phone no.</th>
								  <th>Email Id</th>
								 
								  <th style="text-align: center;">Add Service</th>
								  <th style="text-align: center;">View Services</th>
								  <th style="text-align: center;">Add store</th>
								  <th style="text-align: center;">View stores</th>
								  <th>Edit</th>
								  <th>Delete</th>

							  </tr>
							  
						  </thead>   
						  <tbody>
                          <?php 
						if ($details->num_rows() > 0){
							foreach ($details->result() as $row){
						?>
							<tr>
								
                                <td class="center">

							<?php echo $row->partner_name;?>
							    </td>
								<td class="center"><?php echo $row->business_name;?></td>
								<td class="center"><?php echo $row->verify;?></td>
								<td class="center"><?php echo $row->services;?></td>
								
								<td class="center"><?php echo $row->phoneno;?></td>
								<td class="center"><?php echo $row->email;?></td>
								<td class="center"><?php echo $row->tin;?></td>
								<td class="center"><?php echo $row->address;?></td>
								<td class="center"><?php echo $row->workshop_email;?></td>
								<td class="center"><?php echo $row->workshop_phone;?></td>
								<td class="center"><?php echo $row->manager_phone;?></td>
								<td class="center"><?php echo $row->manager_email;?></td>
								
								
							    <td><a class="btn btn-primary" href="admin/services/add_service/<?php echo $row->id;?>/<?php echo $row->partner_name;?>">
                                <i class="fa fa-cogs" aria-hidden="true"></i> Add service   
                                 </a></td>
								 
								 <td><a class="btn btn-primary" href="admin/services/display_services/<?php echo $row->id;?>/<?php echo $row->partner_name;?>">
                                  <i class="fa fa-cogs" aria-hidden="true"></i> View services   
                                 </a></td>
							   
							   
							   <td><a class="btn btn-primary" href="admin/services/add_store/<?php echo $row->id;?>/<?php echo $row->partner_name;?>">
                                  <i class="fa fa-map-marker" aria-hidden="true"></i> Add store   
                                 </a></td>
								 
								 <td><a class="btn btn-primary" href="admin/services/display_stores/<?php echo $row->id;?>/<?php echo $row->partner_name;?>">
                                 <i class="fa fa-map-marker" aria-hidden="true"></i>  View stores   
                                 </a></td>
							
								
								<td class="center">
	<a class="btn btn-info" href="admin/become_partner/edit_partner/<?php echo $row->id;?>">
    <i class="halflings-icon white edit"></i>    
    </a>
	</td>
	
	<td class="center">
	
	<a class="btn btn-danger" onclick="return confirm('Are you sure want to Delete?')" href="admin/become_partner/delete_partner/<?php echo $row->id;?>">
                               
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
                                
                                
							</tr>
							
							<?php 
							}
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