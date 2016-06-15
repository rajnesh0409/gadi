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
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Admin </a></li>
			</ul>

			<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Admin User</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable14">
						  <thead>
							  <tr>
								  <th>Admin Name</th>
								  <th>Email</th>
								 <!-- <th>Type</th>-->
                                  <th>Last Login Date</th>
								  <th>Last Logout Date</th>
                                  <th>Last Login IP</th>
								  <th>Status</th>
								 
							  </tr>
						  </thead>   
						  <tbody>
                          <?php 
						if ($admin_users->num_rows() > 0){
							foreach ($admin_users->result() as $row){
						?>
							<tr>
								<td><?php echo $row->admin_name;?></td>
								<td class="center"><?php echo $row->email;?></td>
								<!--<td class="center"><?php echo ucfirst($row->admin_type).' Admin';?></td>-->
                                <td class="center"><?php echo $row->last_login_date;?></td>
								<td class="center"><?php echo $row->last_logout_date;?></td>
                                <td class="center"><?php echo $row->last_login_ip;?></td>
                                
								<td class="center">
									<span class="label label-success">Active</span>
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