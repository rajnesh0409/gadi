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
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span><?php echo $heading;?></h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable14">
						  <thead>
							  <tr>
								  <th>Category Name</th>
								  <th>Description</th>
								  <th>Vehicle Type</th>
                                  <th>Status</th>
								  <th>Action</th>
							  </tr>
						  </thead>   
						  <tbody>
                          <?php 
						if ($details->num_rows() > 0){
							foreach ($details->result() as $row){
							$two_wheeler = $row->two_wheeler;
							$four_wheeler =  $row->four_wheeler;		
								
						?>
							<tr>
								<td class="center"><?php echo $row->name;?></td>
							<td class="center"><?php echo $row->description;?></td>
							<td class="center"><?php if($two_wheeler == 'yes') { echo 'Two wheeler'; }  ?><?php if($four_wheeler == 'yes') { echo ', Four wheeler'; }  ?></td>
								
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
                            		<a title="Click to active" class="tip_top" onclick="return confirm('Are you sure want to Active?')" href="admin/services/change_cat_status/<?php echo $mode;?>/<?php echo $row->id;?>"><span class="label label-important"><?php echo $row->status;?></span></a>
								
							<?php
								}else if ($mode == 'Inactive'){ 	
							?>
							<a title="Click to inactive" onclick="return confirm('Are you sure want to Inactive?')" href="admin/services/change_cat_status/<?php echo $mode;?>/<?php echo $row->id;?>"><span class="label label-success"><?php echo $row->status;?></span></a>
							<?php 
								}?>
                                </td>
							<td class="center">
	<a class="btn btn-danger" onclick="return confirm('Are you sure want to Delete?')" href="admin/services/delete_cat/<?php echo $row->id;?>">
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