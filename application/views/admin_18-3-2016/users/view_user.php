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
				<li><a href="#">View User </a></li>
			</ul>

			<div class="row-fluid">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>View User</h2>
					</div>
					<div class="box-content form-horizontal">
						
							<fieldset>
							 <h2>Basic Info</h2>
								  <div class="control-group">
								<label class="control-label" for="inputSuccess">User Image :</label>
								<div class="controls">
                                <img src="<?php echo base_url(); ?>images/users/<?php echo $user_details->row()->thumbnail;?>" width="100px">
							
								  <span class="help-inline"></span>
								</div>
							  </div><hr>
                              
							  <div class="control-group">
								<label class="control-label" for="inputSuccess">User Name :</label>
								<div class="controls">
							<?php echo $user_details->row()->user_name;?>
								  <span class="help-inline"></span>
								</div>
							  </div><hr>
                              
                             <div class="control-group">
								<label class="control-label" for="inputSuccess">Email Address :</label>
								<div class="controls">
								 <?php echo $user_details->row()->email;?>
								  <span class="help-inline"></span>
								</div>
							  </div>
                              <hr>
                              
                            <div class="control-group">
								<label class="control-label" for="inputSuccess">Gender :</label>
								<div class="controls">
								 <?php echo $user_details->row()->gender;?>
								  <span class="help-inline"></span>
								</div>
							  </div>
                              <hr>
                       <?php if($user_details->row()->about!=''){ ?>
                            <div class="control-group">
								<label class="control-label" for="inputSuccess">About me:</label>
								<div class="controls">
								 <?php echo $user_details->row()->about;?>
								  <span class="help-inline"></span>
								</div>
							  </div>
                              <hr>
                              <?php }?>
                 <?php /*?><h2>Social Profiles</h2>
                               <?php if($user_details->row()->facebook!=''){ ?>
                          <div class="control-group">
								<label class="control-label" for="inputSuccess">Facebook:</label>
								<div class="controls">
								 <a href="<?php echo $user_details->row()->facebook;?>" target="_blank"> <?php echo $user_details->row()->facebook;?></a>
								  <span class="help-inline"></span>
								</div>
							  </div>
                              <hr>
                              <?php } ?>
                               <?php if($user_details->row()->twitter!=''){ ?>
                               <div class="control-group">
								<label class="control-label" for="inputSuccess">Twitter:</label>
								<div class="controls">
								<a href="<?php echo $user_details->row()->twitter;?>" target="_blank"> <?php echo $user_details->row()->twitter;?></a>
								  <span class="help-inline"></span>
								</div>
							  </div>
                              <hr>
                              <?php }?>
                              <?php if($user_details->row()->instagram!=''){ ?>
                                  <div class="control-group">
								<label class="control-label" for="inputSuccess">Instagram :</label>
								<div class="controls">
								 <a href="<?php echo $user_details->row()->instagram;?> target="_blank""> <?php echo $user_details->row()->instagram;?></a>
								  <span class="help-inline"></span>
								</div>
							  </div>
                              <hr>
                              <?php }?>
                               <?php if($user_details->row()->linkedin!=''){ ?>
                              <div class="control-group">
								<label class="control-label" for="inputSuccess">Linkedin :</label>
								<div class="controls">
								<a href="<?php echo $user_details->row()->linkedin;?>" target="_blank"> <?php echo $user_details->row()->linkedin;?></a>
								  <span class="help-inline"></span>
								</div>
							  </div>
                              <hr>
                              <?php }?>
                        <h2>Preference</h2>
                         <?php if($user_details->row()->smoker!=''){ ?>
                             <div class="control-group">
								<label class="control-label" for="inputSuccess">Smoker :</label>
								<div class="controls">
								 <?php echo $user_details->row()->smoker;?>
								  <span class="help-inline"></span>
								</div>
							  </div>
                              <hr>
                         <?php }?>
                                <?php if($user_details->row()->high_education!=''){ ?>
                                <div class="control-group">
								<label class="control-label" for="inputSuccess">Highest Edu Level :</label>
								<div class="controls">
								 <?php echo $user_details->row()->high_education;?>
								  <span class="help-inline"></span>
								</div>
							  </div>
                              <hr>
                              <?php } ?>
                                  
                            <?php if($user_details->row()->drink!=''){ ?>
                              <div class="control-group">
								<label class="control-label" for="inputSuccess">Drink :</label>
								<div class="controls">
								 <?php echo $user_details->row()->drink;?>
								  <span class="help-inline"></span>
								</div>
							  </div>
                              <hr>
                            <?php } ?>      
                              <?php if($user_details->row()->ethnicity!=''){ ?>                    
                               <div class="control-group">
								<label class="control-label" for="inputSuccess">Ethnicity :</label>
								<div class="controls">
								 <?php echo $user_details->row()->ethnicity;?>
								  <span class="help-inline"></span>
								</div>
							  </div>
                              <hr>
                              <?php }?>
                               <?php if($user_details->row()->ethnicity!=''){ ?> 
                               <div class="control-group">
								<label class="control-label" for="inputSuccess">Profession :</label>
								<div class="controls">
								 <?php echo $user_details->row()->profession;?>
								  <span class="help-inline"></span>
								</div>
							  </div>
                              <hr>
                              <?php }?>
                               <?php if($user_details->row()->fav_music!=''){ ?> 
                              <div class="control-group">
								<label class="control-label" for="inputSuccess">Fav. Music :</label>
								<div class="controls">
								 <?php echo $user_details->row()->fav_music;?>
								  <span class="help-inline"></span>
								</div>
							  </div>
                              <hr>
                              <?php }?>
                               <?php if($user_details->row()->fav_sports!=''){ ?> 
                              <div class="control-group">
								<label class="control-label" for="inputSuccess">Fav. Sports :</label>
								<div class="controls">
								 <?php echo $user_details->row()->fav_sports;?>
								  <span class="help-inline"></span>
								</div>
							  </div>
                              <hr>
                              <?php }?>
                               <?php if($user_details->row()->matching_percentage!=''){ ?> 
                         <div class="control-group">
								<label class="control-label" for="inputSuccess">Maching Percentage :</label>
								<div class="controls">
								 <?php 
                                 $hasCompletedSkill = 10;
									$hasCompletedBooks = 55;
									$maximumPoints  = 100;
									//$percentage = ($hasCompletedSkill+$hasCompletedBooks)*$maximumPoints/100;
									$percentage = ($user_details->row()->matching_percentage)*$maximumPoints/100;
									echo "<div style='width:100px; background-color:white; height:20px; border:1px solid #000;'>
										<div style='width:".$percentage."px; background-color:#FF1493; height:20px;'>".$percentage."%"."</div>
									</div>";?> 
								  <span class="help-inline"></span>
								</div>
							  </div>
                              <hr>     
                              <?php }?>
                              
                     <!--  <div class="control-group">
								<label class="control-label" for="inputSuccess">Review :</label>
								<div class="controls">
								 <?php echo $user_details->row()->about;?>
								  <span class="help-inline"></span>
								</div>
							  </div>
                        <hr> --> 
                        
                       <div class="control-group">
								<label class="control-label" for="inputSuccess">Rating :</label>
								<div class="controls">
								 <img src="images/star-rating.png" height="70" width="100" />
								  <span class="help-inline"></span>
								</div>
							  </div>
                        <hr>         <?php */?>
                              
                             
                              
							  <div class="form-actions">
								<a href="javascript:history.go(-1);" ><button type="submit" class="btn btn-primary" > Go Back </button></a>
							</div>
							</fieldset>
						  
					
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