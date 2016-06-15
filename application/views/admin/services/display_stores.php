<?php
$this->load->view('admin/templates/header.php');
?>

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
		
				<div class="span12" style="margin-bottom:15px;">
				<a href="admin/become_partner/display_partners" class="submenu btn btn-primary"><i class="fa fa-users"></i><span class="hidden-tablet">Partners List</span></a>
				</div>
				
			</div>	
			
			<div class="row-fluid">	
		
				<div class="box span12">
				
					<div class="box-header" data-original-title>
					
						<h2><i class="halflings-icon user"></i><span class="break"></span><?php echo $heading;?></h2>
							
					</div>
					<div class="box-content" style="overflow: auto;">
						 
						 <?php 
						if ($details->num_rows() > 0){
							
						?>
						
						<table class="table table-striped table-bordered bootstrap-datatable datatable14">
						  <thead>
						  
							  <tr>
								  <th>Name</th>
								  <th>Location</th>
                                  <th>Services</th>
								  <th>Action</th>

							  </tr>
							  
						  </thead>   
						  <tbody>
                          <?php 
						if ($details->num_rows() > 0){
							foreach ($details->result() as $row){
						?>
							<tr>
								
                               
								<td class="center"><?php echo $row->name;?></td>
								<td class="center"><?php echo $row->location;?></td>
								<td class="center"><?php echo $row->services;?></td>
								
								
					             <td class="center">
	<!--<a class="btn btn-info" href="admin/services/edit_store/<?php // echo $row->id;?>">
    <i class="halflings-icon white edit"></i>    
    </a> -->
	<a class="btn btn-danger" onclick="return confirm('Are you sure want to Delete?')" href="admin/services/delete_store/<?php echo $row->id;?>/<?php echo $row->partner_id;?>">
                               
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
                      <?php
							}
							else
						    {
								echo "Sorry!! no stores added yet...";
								
							}		
                      ?>					  
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