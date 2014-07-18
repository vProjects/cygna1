<?php
	session_start();
	$pageTitle = 'User Full Bid';
	if(!isset($GLOBALS['_COOKIE']['uid']) && !isset($_SESSION['user_id']))
	{
		header("Location: log_in.php");
	}
	include ("v-templates/header.php");
?>
<?php
	if(isset($GLOBALS['_GET']['bid']))
	{
		$bid = $GLOBALS['_GET']['bid'];
		//getting user id of that project whose bid id is this
		$uid = $manageContent->getUserIdOfBidid($bid);
		if($uid[0] != $_SESSION['user_id'])
		{
			header("Location: cygna.php?op=pro");
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
                <div class="profile_box_outline project_list_leftbar_outline">
                	<div class="profile_box_heading">Quick Links</div>
                    <ul class="profile_overview">
                    	<li><a href="cygna.php?op=job">JobList</a></li>
                        <li><a href="cygna.php?op=pro">ProjectList</a></li>
                        <li><a href="message.php">Message</a></li>
                        <!--<li><a href="post_bid.php">My Proposal</a></li>
                        <li><a href="#">Billings & Invoice</a></li>-->
                    </ul>
                </div>
                <?php
					include 'v-modules/user-running-projects.php';
				?>
			<?php
				include ("v-modules/polling.php");
			?>	
			</div>	
			
            <!-- body left section ends here -->
            <!-- body right section starts here -->
           <div class="col-md-8 profile_left_part_outline">
           		<div class="project_list_heading_bar pro_details_outline">
                    <span class="pull-left">Bid Full Details</span>
                    
                    <div class="clearfix"></div>
                </div>
                <?php
					//getting full bid details
					$manageContent->getBidFullDetails($bid);
				?>
                <!-- previous page link -->
                <p class="previous_page_link"><a href="userProjectDetails.php?pid=<?php echo $uid[1]; ?>">back to previous page</a></p>
            </div>
            <!-- body right section ends here -->
        </div>
    </div>
</div>
</div>
<?php } ?>
<!-- body ends here -->
<?php
	include 'v-templates/post-footer.php';
?>
