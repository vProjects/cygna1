<?php
	session_start();
	$pageTitle = 'Project Details';
	include 'v-templates/header.php';
?>
	<?php
		include 'v-templates/left_sidebar.php';
	?>
    <?php
		if(isset($GLOBALS['_GET']['pid'])) 
		{ $pid = $GLOBALS['_GET']['pid'];
			//getting project details
			$proDetails = $manageContent->getProjectDetailsOfProjectId($pid);
	?>
    
        <div id="page-wrapper">
        	<!-- div for showing success message--->
            <div class="alert alert-success" id="success_msg"></div>
            <!-- div for showing warning message--->
            <div class="alert alert-danger" id="warning_msg"></div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Project Details</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-8">
                	<div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-list fa-fw"></i> Project Details</div>
                        <div class="panel-body">
                        	<?php
								//getting the project details
								$manageContent->getProjectPageDetails($pid);
							?>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                    	<div class="panel-heading"><i class="fa fa-list fa-fw"></i> Bid Details</div>
                        <div class="panel-body">
                        	<div class="list-group list_item">
                            	<?php
									//getting bid list of this project
									$manageContent->getProjectBidList($pid);
								?>
                            </div>
                        </div>
                    </div>
                    
					<?php
						//checking for action
						if(isset($GLOBALS['_GET']['action']))
						{
							$action = $GLOBALS['_GET']['action'];
							echo '<div class="panel panel-default">
									<div class="panel-heading"><i class="fa fa-refresh fa-fw"></i> Action Details</div>
									<div class="panel-body">';
									if($action == 0)
									{
					?>
                    			<form action="v-includes/class.formData.php" role="form" method="post">
									<div class="form-group">
										<label class="control-label col-sm-4">Reason For Teminating</label>
										<div class="col-sm-8">
											<textarea rows="3" class="form-control" name="action_reason"></textarea>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<div class="col-sm-8 col-sm-offset-3 pull-right">
											<input type="hidden" name="action" value="<?php echo $action ?>"/>
											<input type="hidden" name="pid" value="<?php echo $pid ?>"/>
                                            <input type="hidden" name="fn" value="<?php echo md5('project_action') ?>" />
											<input type="submit" value="Taking Action" class="btn btn-danger"/>
										</div>
										<div class="clearfix"></div>
									</div>
								</form>
                    <?php
									}
									else if($action == 1)
									{
					?>
                    			<form action="v-includes/class.formData.php" role="form" method="post">
									<div class="form-group">
										<label class="control-label col-sm-4">Reason For Activating</label>
										<div class="col-sm-8">
											<textarea rows="3" class="form-control" name="action_reason"></textarea>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<div class="col-sm-8 col-sm-offset-3 pull-right">
											<input type="hidden" name="action" value="<?php echo $action ?>"/>
											<input type="hidden" name="pid" value="<?php echo $pid ?>"/>
                                            <input type="hidden" name="fn" value="<?php echo md5('project_action') ?>" />
											<input type="submit" value="Taking Action" class="btn btn-success"/>
										</div>
										<div class="clearfix"></div>
									</div>
								</form>
                    <?php
									}
										
							echo	'</div>
								</div>';
						}
					?>
                    
                    <!-- previous page link -->
                    <?php
						if(!isset($action))
						{
							echo  '<p class="previous_page_link"><a href="memberProjectList.php?uid='.$proDetails[0]['user_id'].'">back to previous page</a></p>';
						}
						else
						{
							echo  '<p class="previous_page_link"><a href="project_details.php?pid='.$pid.'">back to previous page</a></p>';
						}
					?>
                    
                    
                </div>
                <!-- /.col-lg-8 -->
                
                <div class="col-lg-4">
                	<div class="panel panel-default">
                    	<div class="panel-heading"><i class="fa fa-bell fa-fw"></i> Quick Info</div>
                        <div class="panel-body">
                        	<?php
								//getting the project details
								$manageContent->getProjectQuickLinks($pid);
							?>
                        </div>
                    </div>
                    
                    
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
		} // end of if condition
	include 'v-templates/footer.php';
?>
