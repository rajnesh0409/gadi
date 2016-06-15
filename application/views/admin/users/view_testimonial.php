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
					<a href="<?php echo base_url(); ?>admin"><?php echo $heading; ?></a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#"> </a></li>
			</ul>
			<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span><?php echo $heading; ?></h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								
								  <th>Photo</th>
								  <th>Name</th>
								  <th>Vehicle name</th>
                                  <th>Description</th>
								  <th>Action</th>
							  </tr>
						  </thead>   
						  <tbody>
                          <?php 
						if ($tests->num_rows() > 0){
							foreach ($tests->result() as $row){
						?>
							<tr> 
							
                                <td><img src="images/testimonials/<?php echo $row->image;?>" width="100"/></td>
								<td class="center"><?php echo $row->name;?></td>
                                <td class="center"><?php echo $row->veh_name;?></td>
								<td class="center"><div style="width:130px;"><?php echo $row->description;?></div></td>

                                <td class="center">
									<a class="btn btn-danger" onclick="return confirm('Are you sure want to Delete?')" href="admin/users/delete_test/<?php echo $row->id;?>">
                               
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