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
					<div class="box-content" style="overflow: auto;">
						 
						 <?php 
						if(!empty($details)) {
							
						?>
						
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
						  
							  <tr>
								  
								  <th>Service Partner Name</th>
								  <th>Store Name</th>
								  <th>Store Location</th>
                                  <th>Services Provided</th>
								 

							  </tr>
							  
						  </thead>   
						  <tbody>
                          <?php 
							foreach($details as $key=>$val){
						   ?>
							
							<tr>
                               
							   
								<td class="center"><?php echo $val['partner']['partner_name'];?></td>
								<td class="center"><?php echo $val['stores']['name'];?></td>
								<td class="center"><?php echo $val['stores']['location'];?></td>
								<td class="center"><?php echo $val['stores']['services'];?></td>
                             
							</tr>
							
							<?php } ?>

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