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
					<div class="box-content" style="overflow: auto;">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								
								  <th>Name</th>
								  <th>Email</th>
                                  <th>Mobile no</th>
                                  <th>Gender</th>
								  <th>Platform</th>
								   <th>Isverfied</th>
								  <th>Status</th>
								  <th>Feedback</th>
								  <th>Registered_on</th>
								  <th>Action</th>
							  </tr>
						  </thead>   
						  <tbody>
                          <?php 
						if ($usersList->num_rows() > 0){
							foreach ($usersList->result() as $row){
						?>
							<tr> 
							
                                <td><?php echo $row->user_name;?></td>
								<td class="center"><?php echo $row->email;?></td>
                                <td class="center"><?php echo $row->mobile_no;?></td>
								<td class="center"><?php echo $row->gender;?></td>
								<td class="center"><?php echo $row->reg_device;?></td>
								<td class="center"><?php echo $row->is_verified;?></td>

								<td class="center">
									<?php 
								if($row->status == 'Active'){
									$mode = 0;
								}elseif($row->status == 'Inactive'){
									$mode = 1;
								}									
								//$mode = ($row->status == 'Active')?'0':'1';
								if ($mode == '0'){
							?>
								<a title="Click to inactive" onclick="return confirm('Are you sure want to Inactive?')" href="admin/users/change_user_status/<?php echo $mode;?>/<?php echo $row->id;?>"><span class="label label-success"><?php echo $row->status;?></span></a>
							<?php
								}else if ($mode == '1'){ 	
							?>
								<a title="Click to active" class="tip_top" onclick="return confirm('Are you sure want to Active?')" href="admin/users/change_user_status/<?php echo $mode;?>/<?php echo $row->id;?>"><span class="label label-important"><?php echo $row->status;?></span></a>
							<?php 
								}?>
                                </td>
								 
								 <td class="center">
									<a class="btn btn-info" href="admin/users/customer_feedbacks/<?php echo $row->id;?>">
                                    
										Feedback                                          
									</a>
									
								</td>
								<td class="center"><?php $s = $row->created;   $p = explode(' ',$s); echo $p['0']; ?></td>
                                <td class="center">
								
									<!--
									<a class="btn btn-success" href="admin/users/view_user/<?php echo $row->id;?>">
                                    
										<i class="halflings-icon white zoom-in"></i>                                            
									</a>
									<a class="btn btn-info" href="admin/users/edit_user_form/<?php echo $row->id;?>">
                                  
										<i class="halflings-icon white edit"></i>                                            
									</a>-->
									<a class="btn btn-danger" onclick="return confirm('Are you sure want to Delete?')" href="admin/users/delete_user/<?php echo $row->id;?>/<?php echo $row->group;?>">
                               
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