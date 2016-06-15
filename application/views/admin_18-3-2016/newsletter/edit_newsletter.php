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
						<form class="form-horizontal" action="admin/newsletter/insertEditNewsletter" id="newsletter" method="post" enctype="multipart/form-data">
							<fieldset>
                            <input type="hidden" name="newsletter_id" value="<?php echo $user_details->row()->id;?>" />
							  <div class="control-group">
								<label class="control-label" for="inputSuccess">Template Name</label>
								<div class="controls">
								  <input name="news_title" id="news_title" type="text" class="required" value="<?php echo $user_details->row()->news_title;?>" tabindex="1">
								  <span class="help-inline"></span>
								</div>
							  </div>
                              
                              <div class="control-group">
								<label class="control-label" for="inputSuccess">Email Subject</label>
								<div class="controls">
								  <input name="news_subject" id="news_subject" type="text" class="required" tabindex="2" value="<?php echo $user_details->row()->news_subject;?>">
								  <span class="help-inline"></span>
								</div>
							  </div>
                           
                            <div class="control-group">
								<label class="control-label" for="inputSuccess">Sender Name</label>
								<div class="controls">
								  <input name="sender_name" id="sender_name" type="text" class="required" tabindex="2" value="<?php echo $user_details->row()->sender_name;?>">
								  <span class="help-inline"></span>
								</div>
							  </div>
                              
                             <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Sender Email Address</label>
							  <div class="controls">
                               <input name="sender_email" id="sender_email" type="text" class="required email" tabindex="2" value="<?php echo $user_details->row()->sender_email;?>">
								
							  </div>
							</div>
                            
                             <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Email Description</label>
							  <div class="controls">
								<textarea class="cleditor required" id="news_descrip" name="news_descrip"  rows="3"><?php echo $user_details->row()->news_descrip;?></textarea>
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