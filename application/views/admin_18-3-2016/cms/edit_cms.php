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
					<a href="<?php echo base_url(); ?>admin">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#"><?php echo $heading;?> </a></li>
			</ul>

			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span><?php echo $heading;?></h2>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="admin/cms/updatePage" method="post" id="add_cms_rule" enctype="multipart/form-data">
							<fieldset>
                            <input type="hidden" name="page_id" value="<?php echo $cms_details->row()->id;?>" />
							  <div class="control-group">
								<label class="control-label" for="inputSuccess">Page Name <span class="mandatory">*</span></label>
								<div class="controls">
								  <input name="page_name" type="text" class="required" value="<?php echo $cms_details->row()->page_name;?>" tabindex="1">
								  <span class="help-inline"></span>
								</div>
							  </div>
                              
                              <div class="control-group">
								<label class="control-label" for="inputSuccess">Page Title <span class="mandatory">*</span></label>
								<div class="controls">
								  <input name="page_title" type="text" tabindex="2" class="required" value="<?php echo $cms_details->row()->page_title;?>">
								  <span class="help-inline"></span>
								</div>
							  </div>
                              
                             <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Description <span class="mandatory">*</span></label>
							  <div class="controls">
								<textarea class="cleditor required" name="description" rows="3"><?php echo $cms_details->row()->description;?></textarea>
							  </div>
							</div>
                              
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Update</button>
								<!--<button class="btn">Cancel</button>-->
							  </div>
							</fieldset>
						  </form>
					
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