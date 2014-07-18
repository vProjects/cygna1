<?php
	session_start();
	$pageTitle = 'Profile Details';
	include 'v-templates/header.php';
?>
	<?php
		include 'v-templates/left_sidebar.php';
	?>
    <?php
		if(isset($GLOBALS['_GET']['uid'])) { $uid = $GLOBALS['_GET']['uid'];
	?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Profile Details</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-8">
                	<div class="panel panel-default">
						<?php
							if(isset($GLOBALS['_GET']['action']))
							{
								//getting the profile info
								if($GLOBALS['_GET']['action'] == 'account')
								{
									//getting user account info
									$manageContent->getUserAccountDetails($uid);
								}
								else if($GLOBALS['_GET']['action'] == 'portfolio')
								{
									//getting user portfolio info
									$manageContent->getUserPortfolioinfo($uid);
								}
								else if($GLOBALS['_GET']['action'] == 'employment')
								{
									//getting user employment info
									$manageContent->getUserEmployment($uid);
								}
								else if($GLOBALS['_GET']['action'] == 'education')
								{
									//getting user education info
									$manageContent->getUserEducation($uid);
								}
								else if($GLOBALS['_GET']['action'] == 'activation_details')
								{
									//getting user activation details info
									$manageContent->getUserActivation($uid);
								}
								else
								{
									//getting profile basic info
									$manageContent->getMemberProfileDetails($uid);
								}
							}
							else
							{
								//getting profile basic info
                                $manageContent->getMemberProfileDetails($uid);
							}
								
                        ?>
                    <!-- /.panel -->
                    <!-- previous page link -->
                   <p class="previous_page_link"><a href="user-list.php?uid=<?php echo $uid; ?>">back to previous page</a></p>
                   
                </div>
                <!-- /.col-lg-8 -->
                
                <div class="col-lg-4">
                	<div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-link fa-fw"></i> Member Profile Quick Links</div>
                        <div class="panel-body">
                        	<div class="list-group list_item">
                            	<?php
									echo '<a href="memberProfileDetails.php?uid='.$uid.'&action=basic" class="list-group-item"><i class="fa fa-info fa-fw"></i> User Basic Info</a>
									<a href="memberProfileDetails.php?uid='.$uid.'&action=account" class="list-group-item"><i class="fa fa-info fa-fw"></i> User Account Details</a>
									<a href="memberProfileDetails.php?uid='.$uid.'&action=portfolio" class="list-group-item"><i class="fa fa-info fa-fw"></i> User Portfolio</a>
									<a href="memberProfileDetails.php?uid='.$uid.'&action=employment" class="list-group-item"><i class="fa fa-info fa-fw"></i> User Employment</a>
									<a href="memberProfileDetails.php?uid='.$uid.'&action=education" class="list-group-item"><i class="fa fa-info fa-fw"></i> User Education</a>
									<a href="memberProfileDetails.php?uid='.$uid.'&action=activation_details" class="list-group-item"><i class="fa fa-info fa-fw"></i> User Activation Status</a>';
								?>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
		} //end of if condition
	include 'v-templates/footer.php';
?>
