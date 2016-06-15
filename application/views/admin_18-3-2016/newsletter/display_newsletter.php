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
				<li><a href="#">List of Pages </a></li>
			</ul>

			<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>List of Pages</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable14">
						  <thead>
							  <tr>
								  <th>Template Name</th>
								  <th>Email Subject</th>
								  <th>Action</th>
							  </tr>
						  </thead>   
						  <tbody>
                        <?php 
						if ($subscribersList->num_rows() > 0){
							foreach ($subscribersList->result() as $row){
						?>
							<tr>
								<td class="center"><?php echo $row->news_title;?></td>
								<td class="center"><?php echo $row->news_subject;?></td>
							
								<td class="center">
									
									<a class="btn btn-info" href="admin/newsletter/edit_newsletter_form/<?php echo $row->id;?>">
                                  
										<i class="halflings-icon white edit"></i>                                            
									</a>
			<!--<a class="btn btn-danger" onclick="return confirm('Are you sure want to Delete?')" href="admin/newsletter/delete_newsletter/<?php echo $row->id;?>/<?php echo $row->id;?>">-->
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