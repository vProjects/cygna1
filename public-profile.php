<?php
	session_start();
	$pageTitle = 'Profile';
	if(!isset($GLOBALS['_COOKIE']['uid']) && !isset($_SESSION['user_id']))
	{
		header("Location: log_in.php");
	}
	include ("v-templates/header.php");
?>
<?php
	if(isset($GLOBALS['_GET']['uid']))
	{
		//checking for presence of user id
		$result = $manageContent->getUserIdChecking($GLOBALS['_GET']['uid']);
		if($result == 1)
		{
			$user = $GLOBALS['_GET']['uid'];
		}
		else
		{
			header("Location: profile.php");
		}
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
        	<!-- body left section starts here -->
            <div class="col-md-3 profile_left_part_outline">
                <?php 
                    //getting profie images
                    $manageContent->getUserImageForPublic($user,'pp'); 
                ?>
                <div class="profile_box_outline">
                    <?php
                        //getting hourly rate of user
                        $manageContent->getUserHourlyRateForPublic($user);
                    ?>
                </div>
            </div>
            <!-- body left section ends here -->
            <!-- body middle section starts here -->
            <div class="col-md-7 profile_middle_part_outline">
                <?php 
                    //getting cover images
                    $manageContent->getUserImageForPublic($user,'cp'); 
                ?>
                <div class="profile_box_outline">
                    <?php
                        //getting cover images
                        $manageContent->getUserDescriptionForPublic($user); 
                    ?>
                </div>
                <!-- portfolio part start here -->
                <div class="profile_box_outline">
                    <div class="profile_box_heading">Portfolio</div>
                    <div class="portfolio_details">
                       <?php
                            //getting cover images
                            $manageContent->getUserPortfolioForPublic($user); 
                        ?> 
                    </div>
                </div>
                <!-- portfolio part ends here -->
                <!-- my skills part starts here -->
                <div class="profile_box_outline">
                    <div class="profile_box_heading">My Skills</div>
                    <div class="myskills_details">
                         <?php
                            //getting cover images
                            $manageContent->getUserSkillsForPublic($user); 
                        ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- my skills part ends here -->
                <!-- employment details starts here -->
                <div class="profile_box_outline">
                    <div class="profile_box_heading">Employment Details</div>
                    <div class="portfolio_details">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <?php
                                    //getting cover images
                                    $manageContent->getUserEmployementListForPublic($user); 
                                ?>
                            </table>
                        </div>
                        
                    </div>
                </div>
                <!-- employment details ends here -->
                <!-- education details starts here -->
                <div class="profile_box_outline">
                    <div class="profile_box_heading">Education Details</div>
                    <div class="portfolio_details">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <?php
                                    //getting cover images
                                    $manageContent->getUserEducationListForPublic($user); 
                                ?>
                            </table>
                        </div>
                        
                    </div>
                </div>
                <!-- education details ends here -->
            </div>
            <!-- body middle section ends here -->
            <!-- body right section starts here -->
            <div class="col-md-2 profile_right_part_outline">
            	<?php include 'v-modules/ads.php'; ?>
            </div>
            <!-- body right section ends here -->
        </div>
    </div>
</div>
<!-- body ends here -->
<?php
	if(isset($GLOBALS['_COOKIE']['uid']) || isset($_SESSION['user_id']))
	{
		include 'v-templates/post-footer.php';
	}
	else
	{
		include 'v-templates/footer.php';
	}
?>
