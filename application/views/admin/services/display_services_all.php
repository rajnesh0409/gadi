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
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  
							  <tr>
								 
								  <th>Service Partner Name</th>
								  <th>Service Category</th>
								  <th>Service Name</th>
								   <th>Available for Vehicle Type</th>
								  <th>Price</th>
							  </tr>
							  
						  </thead>   
						  
						  <tbody>
                          <?php 
						
							foreach($details as $key=>$val){
							$two_wheeler = $val['service']['two_wheeler'];
							$four_wheeler =  $val['service']['four_wheeler'];		
						  ?>
							<tr>
								
                               
								<td class="center"><?php echo $val['partner']['partner_name'];?></td>
								<td class="center"><?php echo $val['service']['service_cat'];?></td>
								<td class="center"><?php echo $val['service']['service_name'];?></td>
								<td class="center"><?php if($two_wheeler == 'yes') { echo 'Two wheeler'; }  ?><?php if($four_wheeler == 'yes') { echo ', Four wheeler'; }  ?></td>
								<td class="center">Rs. <?php echo $val['service']['price'];?></td>


							</tr>
							
							<?php  } ?>

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