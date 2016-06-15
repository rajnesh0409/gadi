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
								
								  <th>Photo</th>
								  <th>Name</th>
								  <th>USER ID</th>
								  <th>Password</th>
								  <th>Email</th>
                                  <th>Mobile_no.</th> 
								  <th>Address</th> 
								 
								  <th>Driving_no.</th>
								   <th>Status</th>
								  <th>Licence_file</th>
								  <th>Identity file</th>
								  <th>Action</th>
							  </tr>
						  </thead>   
						  <tbody>
                          <?php 
						if ($dboys->num_rows() > 0){
							foreach ($dboys->result() as $row){
						?>
							<tr> 
							
                                <td><div style="width:80px;"><img src="images/photos/<?php echo $row->photo;?>" width="100" style="width: 79px; height: 72px;"/> </div> </td>
								<td><?php echo $row->name;?></td>
								<td class="center"><?php echo $row->uid;?></td>
                                <td class="center"><?php echo base64_decode($row->password);?></td>
								<td class="center"><?php echo $row->email;?></td>
								<td class="center"><?php echo $row->phone;?></td>
								<td class="center"><div style="width:150px;"><?php echo $row->address;?></div></td>
								<td class="center"><?php echo $row->driving_no;?></td>

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
								<a title="Click to inactive" onclick="return confirm('Are you sure want to Inactive?')" href="admin/users/dboy_status/<?php echo $mode;?>/<?php echo $row->id;?>"><span class="label label-success"><?php echo $row->status;?></span></a>
							<?php
								}else if ($mode == '1'){ 	
							?>
								<a title="Click to active" class="tip_top" onclick="return confirm('Are you sure want to Active?')" href="admin/users/dboy_status/<?php echo $mode;?>/<?php echo $row->id;?>"><span class="label label-important"><?php echo $row->status;?></span></a>
							<?php 
								}?>
                                </td>
								 
								 <td class="center">
									<a class="btn btn-info" href="images/drivers/<?php echo $row->driving_file;?>">
                                    <i class="halflings-icon white zoom-in"></i>  
										Driving file                                          
									</a>
									
								</td>
								
								 <td class="center">
									<a class="btn btn-info" href="images/identity/<?php echo $row->identity;?>">
                                    <i class="halflings-icon white zoom-in"></i>  
										Identity file                                          
									</a>
									
								</td>
								
								
                                <td class="center">
									<div style="width:112px;">
									<a class="btn btn-success" href="admin/users/edit_dboy/<?php echo $row->id;?>">
                                    
										<i class="fa fa-pencil-square-o" aria-hidden="true"></i>                                        
									</a>
								
									<a class="btn btn-danger" onclick="return confirm('Are you sure want to Delete?')" href="admin/users/delete_dboy/<?php echo $row->id;?>">
                               
										<i class="halflings-icon white trash"></i> 
									</a>
									</div>
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