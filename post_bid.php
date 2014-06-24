<?php
	session_start();
	$pageTitle = 'Bid Post';
	if(!isset($GLOBALS['_COOKIE']['uid']) && !isset($_SESSION['user_id']))
	{
		header("Location: log_in.php");
	}
	include ("v-templates/header.php");
?>
<?php
	if(isset($GLOBALS['_GET']['pid']) || isset($GLOBALS['_GET']['bid'])) 
	{
		if(isset($GLOBALS['_GET']['pid']))
		{
			$pid = $GLOBALS['_GET']['pid']; 
			//getting prioject posted user id
			$proUserId = $manageContent->getUserIdFromPro($pid);
			//checking for project posted user can not access this page
			if($proUserId == $_SESSION['user_id'])
			{
				header("Location: cygna.php?op=pro");
			}
		}
		else if(isset($GLOBALS['_GET']['bid']))
		{
			$bid = $GLOBALS['_GET']['bid'];
			//get the project id
			$pid = $manageContent->getProjectIdFromBid($bid);
			//get bid user id
			$bidUserId = $manageContent->getUserIdFromBid($bid);
			//checking for bid user can only access this page
			if($bidUserId != $_SESSION['user_id'])
			{
				header("Location: cygna.php?op=job");
			}
		}
		//checking project status
		$proStatus = $manageContent->getProjectStatus($pid);
		if(!empty($proStatus['award_bid_id']))
		{
			$warning = 'Job Is Awarded And Closed!!';
		}
		if($proStatus['status'] == 0)
		{
			$warning = 'Project Is Terminated';
		}
		if(time() >= strtotime($proStatus['ending_date'].' 23:59:59'))
		{
			$warning = 'Job Is Closed!!';
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
    	<!-- warning message row -->
        <?php
			if(isset($warning) && !empty($warning))
			{
				//setting button status
				$form_action = '';
				//printing warning message
				echo '<div class="row profile_body_row">
						<div class="col-md-12">
							<div class="portfolio_details" style="border:1px solid #cdcdcd;">
								<div class="pro_status">'.$warning.'</div>
							</div>
						</div>
					</div>';
			}
			else
			{
				$form_action = 'action="v-includes/class.formData.php"';
			}
		?>
    
    	<div class="row profile_body_row">
        	<!-- body left section starts here -->
        	<div class="col-md-8 profile_left_part_outline">
            	<?php
					include 'v-modules/post-bid-project-details.php';
				?>
                <?php
					include 'v-modules/project-bid-list.php';
				?>
            </div>
            <!-- body left section ends here -->
            <!-- body right section starts here -->
            <div class="col-md-4 profile_right_part_outline">
            	<?php
					include 'v-modules/post-bid-proposal-section.php';
				?>
            </div>
            <!-- body right section ends here -->
        </div>
    </div>
</div>
<?php } else { echo '<div class="portfolio_part_heading">Page Not Found.. Error Occured..</div>'; } ?>
<!-- body ends here -->
<?php
	include 'v-templates/post-footer.php';
?>
