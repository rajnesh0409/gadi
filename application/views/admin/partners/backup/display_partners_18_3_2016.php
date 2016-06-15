<?php
$this->load->view('admin/templates/header.php');
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

	
	<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
    } );
} );
</script>


<style>
div.dataTables_wrapper {
        width: 100%;
        margin: 35px auto;
    }
	
th, td {
          text-align: center !important;  
   }

td {
     padding: 5px !important;
   }  

/* div.dataTables_wrapper {
    padding-top: 20px;
} */  
 
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
				<div class="box span12" style="padding: 25px;">

					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span><?php echo $heading;?></h2>
						
					</div>
				
						<table id="example" class="display" cellspacing="0" width="1652px">
						  <thead>
						  
							  <tr>
								  <th>Name</th>
								  <th>Business</th>
                                  <th>Phoneno.</th>
								  <th>Email</th>
                                  <th>TIN</th>
								  <th>Address</th>
								  <th>Workshop email</th>
								  <th>Workshop phoneno.</th>
								  <th>Manager phoneno.</th>
								  <th>Manager email</th>
								   <th>Services</th>
								   <th>Add Stores</th>
								  <th>View Stores</th>
								  <th>Action</th>
								  
								 

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
								
								<td class="center"><?php echo $row->phoneno;?></td>
								<td class="center"><?php echo $row->email;?></td>
								<td class="center"><?php echo $row->tin;?></td>
								<td class="center"><?php echo $row->address;?></td>
								<td class="center"><?php echo $row->workshop_email;?></td>
								<td class="center"><?php echo $row->workshop_phone;?></td>
								<td class="center"><?php echo $row->manager_phone;?></td>
								<td class="center"><?php echo $row->manager_email;?></td>
								<td class="center"><?php echo $row->services;?></td>

								<td>
								<a class="btn btn-primary" href="admin/vehicle_models/display_models/<?php echo $row->name;?>">
                                  Add stores  
                                 </a>
								<a class="btn btn-primary" href="admin/vehicle_models/display_models/<?php echo $row->name;?>">
                                  View stores  
                                 </a>
								 </td>
								 
								 <td class="center">
										<a class="btn btn-info" href="admin/become_partner/edit_partner/<?php echo $row->id;?>">
										<i class="halflings-icon white edit"></i>    
										</a>
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