<?php
	session_start();
	$pageTitle = 'Project Post';
	if(!isset($GLOBALS['_COOKIE']['uid']) && !isset($_SESSION['user_id']))
	{
		header("Location: log_in.php");
	}
	include ("v-templates/header.php");
	
?>
<?php
	//defining an array for the options of edit profile depending on userInfo value
	//getting user info value
	$userInfo = $manageContent->getUserInfoRow($_SESSION['user_id']);
	if($userInfo == 0)
	{
		$op = array('per');
	}
	else
	{
		$op = array('per','img','pro','port','emp','edu');
	}
	
	if(isset($GLOBALS['_GET']['op']) && in_array($GLOBALS['_GET']['op'],$op))
	{
		$operation = $GLOBALS['_GET']['op'];
		
	}
	else
	{
		header("Location: profile.php");
	}
?>
<?php
	//including post header to this page
	include ("v-templates/post-header.php");
?>
<!-- body starts here -->
<div id="profile_body_outline">
	
    <!-- div for showing success message--->
	<div class="alert alert-success" id="success_msg"></div>
	<!-- div for showing warning message--->
	<div class="alert alert-danger" id="warning_msg"></div>
    

	<div class="container">
    	<div class="row profile_body_row">
        	
            <!-- body middle section starts here -->
            
            <div class="col-md-10 profile_middle_part_outline">
            	<div class="post_project_body_outline">
            		<h2 class="post_project_top_heading">Edit Profile</h2>
                	
                	<!-- form panel -->
                		
                		<div class="panel-group" id="accordion">
                        <?php
							//checking for personal info option
							if(isset($op[0]) && $operation == $op[0])
							{
						?>
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="text-head-link">
                                    PERSONAL INFORMATION
                              </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                              <div class="panel-body">    
                              <?php
							  	//checking that user info is present or not
								if($userInfo == 0)
								{
								
							  ?>
                                <form action="v-includes/class.formData.php" class="form-horizontal" role="form" method="post" id="user_personal">
                                      <div class="form-group">
                                        <label class="col-md-3 pp_form_label control-label">First Name<span class="man_field">**</span></label>
                                        <div class="col-md-8">
                                          <input type="text" class="form-control pp_form_textbox" placeholder="First Name" name="f_name" id="per_fname">
                                          <div class="signup-form-error" id="err_per_fname"></div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-md-3 pp_form_label control-label">Last Name<span class="man_field">**</span></label>
                                        <div class="col-md-8">
                                          <input type="text" class="form-control pp_form_textbox" placeholder="Last Name" name="l_name" id="per_lname">
                                          <div class="signup-form-error" id="err_per_lname"></div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-md-3 pp_form_label control-label">Gender<span class="man_field">**</span></label>
                                        <div class="col-md-8">
                                          <div class="col-md-2"><input type="radio"  name="gender" value="male" checked="checked">Male</div>
                                          <div class="col-md-2"><input type="radio"  name="gender" value="female">Female</div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-md-3 pp_form_label control-label">Date of Birth<span class="man_field">**</span></label>
                                        <div class="col-md-4">
                                          <input type="text" class="form-control pp_form_textbox" name="dob" id="per_date">
                                          <div class="signup-form-error" id="err_per_dob"></div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-md-3 pp_form_label control-label">Contact No.<span class="man_field">**</span></label>
                                        <div class="col-md-4">
                                          <input type="text" class="form-control pp_form_textbox" name="contact" placeholder="Contact No." id="per_con">
                                          <div class="signup-form-error" id="err_per_con"></div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-md-3 pp_form_label control-label">Address Line 1<span class="man_field">**</span></label>
                                        <div class="col-md-8">
                                          <input type="text" class="form-control pp_form_textbox" name="add1" placeholder="Address Line 1" id="per_addr1">
                                          <div class="signup-form-error" id="err_per_addr1"></div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-md-3 pp_form_label control-label">Address Line 2</label>
                                        <div class="col-md-8">
                                          <input type="text" class="form-control pp_form_textbox" name="add2" placeholder="Address Line 2">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-md-3 pp_form_label control-label">Pincode<span class="man_field">**</span></label>
                                        <div class="col-md-3">
                                          <input type="text" class="form-control pp_form_textbox" name="pin" placeholder="Pincode" id="per_pin">
                                          <div class="signup-form-error" id="err_per_pin"></div>
                                        </div>
                                        <label class="col-md-2 pp_form_label control-label">City<span class="man_field">**</span></label>
                                        <div class="col-md-3">
                                          <input type="text" class="form-control pp_form_textbox" name="city" placeholder="City" id="per_city">
                                          <div class="signup-form-error" id="err_per_city"></div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-md-3 pp_form_label control-label">State<span class="man_field">**</span></label>
                                        <div class="col-md-3">
                                          <input type="text" class="form-control pp_form_textbox" name="state" placeholder="State" id="per_state">
                                          <div class="signup-form-error" id="err_per_state"></div>
                                        </div>
                                        <label class="col-md-2 pp_form_label control-label">Country<span class="man_field">**</span></label>
                                        <div class="col-md-3">
                                          <input type="text" class="form-control pp_form_textbox" name="country" placeholder="Country" id="per_country">
                                          <div class="signup-form-error" id="err_per_country"></div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="col-md-offset-3 col-md-8">
                                        	<input type="hidden" name="fn" value="<?php echo md5('personal_info'); ?>" />
                                          <button type="button" class="btn btn-success" id="user_per_info">SAVE</button>
                                        </div>
                                      </div>
                                </form>
							  <?php
                                } else if($userInfo == 1)
								{
							   ?>
                                
                                <form action="v-includes/class.formData.php" class="form-horizontal" role="form" method="post">
                                <?php 
									//getting user personal info
									$manageContent->getUserPersonalInfo($_SESSION['user_id']);
								?>
                                  <div class="form-group">
                                    <div class="col-md-offset-3 col-md-8">
                                        <input type="hidden" name="fn" value="<?php echo md5('per_info_update'); ?>" />
                                      <button type="submit" class="btn btn-success ">UPDATE</button>
                                    </div>
                                  </div>
                                </form>
                                
                              <?php } ?>  
                              </div>
                            </div>
                          </div>
                          
                          <?php  } //end of personal info section   ?>
                          
                          <?php
						  	//checking for user images option
							if(isset($op[1]) && $operation == $op[1])
							{
						  ?>
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="text-head-link">
                                        IMAGES
                              </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse in">
                              <div class="panel-body">
                                
                                <form action="#" class="form-horizontal" id="image_info" role="form" method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                    <label class="col-md-3 pp_form_label control-label">Profile Image</label>
                                    <div class="col-md-8">
                                      <input type="file" name="pro_pic" id="pro_pic" class="form-control pp_form_file_upload">
                                      <p class="text-notific">**Maximum filesize is 2mb.</p>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-md-offset-3 col-md-8" id="pro_pic_preview">
                                      
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-md-offset-3 col-md-8">
                                    <input type="hidden" id="pro_x" name="x" /></label>
                                    <input type="hidden" id="pro_y" name="y" /></label>
                                    <input type="hidden" id="pro_x2" name="x2" /></label>
                                    <input type="hidden" id="pro_y2" name="y2" /></label>
                                    <input type="hidden" id="pro_w" name="w" /></label>
                                    <input type="hidden" id="pro_h" name="h" /></label>
                                      <input type="button" class="btn btn-success" value="CROP & SAVE" id="pro_pic_crop">
                                    </div>
                                  </div>
                                </form>
                                <form action="v-includes/class.formData.php" class="form-horizontal" id="image_info" role="form" method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                    <label class="col-md-3 pp_form_label control-label">Cover Image</label>
                                    <div class="col-md-8">
                                      <input type="file" name="cov_pic" id="cov_pic" class="form-control pp_form_file_upload">
                                      <p class="text-notific">**Maximum filesize is 2mb.</p>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-md-offset-3 col-md-8" id="cov_pic_preview">
                                      
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-md-offset-3 col-md-8">
                                    	<input type="hidden" name="fn" value="<?php echo md5('image_info'); ?>" />
                                      <input type="submit" class="btn btn-success" value="SAVE">
                                    </div>
                                  </div>
                                </form>
                                
                              </div>
                            </div>
                          </div>
                          <?php } //end of user images option ?>
                          
                          <?php
						  	//checking for profile info option
							if(isset($op[2]) && $operation == $op[2])
							{
						  ?>
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="text-head-link">
                                    PROFILE INFO
                              </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse in">
                              <div class="panel-body">
                                    
                                <form action="v-includes/class.formData.php" class="form-horizontal" role="form" method="post" id="user_profile">
                                  	<?php 
										//getting user personal info
										$manageContent->getUserProfileInfo($_SESSION['user_id']);
									?>
                                  
                                  
                                  <div class="form-group">
                                    <div class="col-md-offset-3 col-md-8">
                                    	<input type="hidden" name="fn" value="<?php echo md5('profile_info'); ?>" />
                                      <input type="button" id="user_pro_info" class="btn btn-success" value="SAVE" />
                                    </div>
                                  </div>
                                </form>
                                    
                              </div>
                            </div>
                          </div>
                          <?php } //end of profile info option ?>
                          
                          <?php
						  	//checking for portfolio option
							if(isset($op[3]) && $operation == $op[3])
							{
						  ?>
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" class="text-head-link">
                                    PORTFOLIO
                              </h4>
                            </div>
                            <div id="collapsefour" class="panel-collapse collapse in">
                              <div class="panel-body">
                              <?php
							  	//checking that portfolio id iset or not
								if(!isset($GLOBALS['_GET']['port_id']))
								{
							  ?>
                                <form action="v-includes/class.formData.php" method="post" id="user_port" class="form-horizontal" role="form" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-md-3 pp_form_label control-label">File</label>
                                        <div class="col-md-8">
                                          <input type="file" name="file1" class="form-control pp_form_textbox pp_form_file_upload">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 pp_form_label control-label">Skills Required</label>
                                        <div class="col-md-8">
                                          <input type="text" name="skills1" class="form-control pp_form_textbox">
                                        </div>
                                      </div>
                                    <div class="form-group">
                                        <label class="col-md-3 pp_form_label control-label">Description</label>
                                        <div class="col-md-8">
                                          <textarea class="form-control pp_form_textbox pp_text_area" name="des1"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div id="add_another_port"></div>
                                    
                                    <div class="form-group">
                                        <div class="col-md-offset-3 col-md-8">
                                        	<input type="hidden" name="fn" value="<?php echo md5('user_portfolio'); ?>" />
                                          <input type="button" id="port_submit" class="btn btn-success" value="SAVE" />
                                          <button type="button" class="btn btn-primary" id="adding_port">+ADD ANOTHER</button>
                                        </div>
                                   </div>
                                </form>
                                <?php
									} else
									{
										//checking that selecting id is for session user id or not
										$id = $manageContent->getUserIdOfPortid($GLOBALS['_GET']['port_id']);
										if($id == $_SESSION['user_id'])
										{
								?>
                                
                                <form action="v-includes/class.formData.php" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                                    <?php
										//getting values of portfolio
										$manageContent->getUserPortInfo($GLOBALS['_GET']['port_id']);
									?>
                                    
                                    <div class="form-group">
                                        <div class="col-md-offset-3 col-md-8">
                                        	<input type="hidden" name="fn" value="<?php echo md5('user_portfolio_edit'); ?>" />
                                            <input type="hidden" name="portid" value="<?php echo $GLOBALS['_GET']['port_id'] ?>" />
                                          <input type="submit" class="btn btn-success" value="UPDATE" />
                                          
                                        </div>
                                   </div>
                                </form>
                                
                                <?php
										}
										else
										{
											echo '<div class="portfolio_part_heading">No Information Found</div>';
										}
									}
								?>
                              </div>
                            </div>
                          </div>
                          <?php } //end of portfolio option ?>
                          
                          <?php
						  	//checking for employment option
							if(isset($op[4]) && $operation == $op[4])
							{
						  ?>
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" class="text-head-link">
                                    EMPLOYMENT
                              </h4>
                            </div>
                            <div id="collapsefive" class="panel-collapse collapse in">
                              <div class="panel-body">
                              <?php
							  	//checking that portfolio id iset or not
								if(!isset($GLOBALS['_GET']['emp_id']))
								{
							  ?>
                                <form action="v-includes/class.formData.php" method="post" id="user_emp" class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label class="col-md-3 pp_form_label control-label">Company Name</label>
                                        <div class="col-md-8">
                                          <input type="text" class="form-control pp_form_textbox" name="comp1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 pp_form_label control-label">Position</label>
                                        <div class="col-md-8">
                                          <input type="text" class="form-control pp_form_textbox" name="pos1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 pp_form_label control-label">Start Date</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control pp_form_textbox date_range" name="start1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-md-3 pp_form_label control-label">End Date</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control pp_form_textbox date_range" name="end1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 pp_form_label control-label">Descrition</label>
                                        <div class="col-md-8">
                                          <textarea class="form-control pp_form_textbox pp_text_area" name="des1"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div id="add_another_emp"></div>
                                    
                                    <div class="form-group">
                                        <div class="col-md-offset-3 col-md-8">
                                            <input type="hidden" name="fn" value="<?php echo md5('user_employment'); ?>" />
                                          <input type="button" id="emp_submit" class="btn btn-success" value="SAVE" />
                                          <button type="button" class="btn btn-primary" id="adding_emp">+ADD ANOTHER</button>
                                        </div>
                                   </div>
                                </form>
                                <?php
									} else
									{
										//checking that selecting id is for session user id or not
										$id = $manageContent->getUserIdOfEmpid($GLOBALS['_GET']['emp_id']);
										if($id == $_SESSION['user_id'])
										{
								?>
                                
                                <form action="v-includes/class.formData.php" method="post" class="form-horizontal" role="form">
                                    <?php
										//getting values of employment
										$manageContent->getUserEmpInfo($GLOBALS['_GET']['emp_id']);
										
									?>
                                    
                                    <div class="form-group">
                                        <div class="col-md-offset-3 col-md-8">
                                            <input type="hidden" name="fn" value="<?php echo md5('user_employment_edit'); ?>" />
                                            <input type="hidden" name="empid" value="<?php echo $GLOBALS['_GET']['emp_id'] ?>" />
                                          <input type="submit" class="btn btn-success" value="UPDATE" />
                                          
                                        </div>
                                   </div>
                                </form>
                                
                                <?php
										}
										else
										{
											echo '<div class="portfolio_part_heading">No Information Found</div>';
										}
									}
								?>
                              </div>
                            </div>
                          </div>
                          <?php } //end of employment option ?>
                          
                          <?php
						  	//checking for education option
							if(isset($op[5]) && $operation == $op[5])
							{
						  ?>
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseseven" class="text-head-link">
                                    EDUCATION
                              </h4>
                            </div>
                            <div id="collapseseven" class="panel-collapse collapse in">
                              <div class="panel-body">
                               <?php
							  	//checking that portfolio id iset or not
								if(!isset($GLOBALS['_GET']['edu_id']))
								{
							  ?>
                                <form action="v-includes/class.formData.php" method="post" id="user_edu" class="form-horizontal" role="form" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-md-3 pp_form_label control-label">Institution Name</label>
                                        <div class="col-md-8">
                                          <input type="text" class="form-control pp_form_textbox" name="inst1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 pp_form_label control-label">Degree</label>
                                        <div class="col-md-8">
                                          <input type="text" class="form-control pp_form_textbox" name="deg1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 pp_form_label control-label">Start Date</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control pp_form_textbox date_range" name="start1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="col-md-3 pp_form_label control-label">End Date</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control pp_form_textbox date_range" name="end1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 pp_form_label control-label">Descrition</label>
                                        <div class="col-md-8">
                                          <textarea class="form-control pp_form_textbox pp_text_area" name="des1"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div id="add_another_edu"></div>
                                    
                                    <div class="form-group">
                                    <div class="col-md-offset-3 col-md-8">
                                    	<input type="hidden" name="fn" value="<?php echo md5('user_education'); ?>" />
                                      <input type="button" id="edu_submit" class="btn btn-success" value="SAVE" />
                                      <button type="button" class="btn btn-primary" id="adding_edu">+ADD ANOTHER</button>
                                    </div>
                                  </div>
                                </form>
                                
								<?php
									} else
									{
										//checking that selecting id is for session user id or not
										$id = $manageContent->getUserIdOfEduid($GLOBALS['_GET']['edu_id']);
										if($id == $_SESSION['user_id'])
										{
								?>
                                
                                <form action="v-includes/class.formData.php" method="post" class="form-horizontal" role="form">
                                   
                                   <?php
										//getting values of employment
										$manageContent->getUserEduInfo($GLOBALS['_GET']['edu_id']);
										
									?>
                                    
                                    <div class="form-group">
                                      <div class="col-md-offset-3 col-md-8">
                                    	<input type="hidden" name="fn" value="<?php echo md5('user_education_edit'); ?>" />
                                      <input type="hidden" name="eduid" value="<?php echo $GLOBALS['_GET']['edu_id'] ?>" />
                                      <input type="submit" class="btn btn-success" value="UPDATE" />
                                      
                                    </div>
                                  </div>
                                </form>
                                
                                 <?php
										}
										else
										{
											echo '<div class="portfolio_part_heading">No Information Found</div>';
										}
									}
								?>
                                
                                
                              </div>
                            </div>
                          </div>
						<?php }//end of education option ?>				  
						</div>
                		
                	<!-- form panel ends -->
                	
             	</div><!-- post project body outline -->
            </div><!-- profile mid part outline -->
            
            <!-- body middle section ends here -->
            <!-- body right section starts here -->
            
            <div class="col-md-2 profile_right_part_outline">
            	<div class="add_place_outline"></div>
                <div class="add_place_outline"></div>
            </div>
            <!-- body right section ends here -->
        </div>
    </div>
</div>
<!-- body ends here -->
<?php
	include 'v-templates/post-footer.php';
?>
