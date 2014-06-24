<?php
	session_start();
	$pageTitle = 'Project List';
	if(!isset($GLOBALS['_COOKIE']['uid']) && !isset($_SESSION['user_id']))
	{
		header("Location: log_in.php");
	}
	include ('v-templates/header.php');
?>
<?php
	if(isset($GLOBALS['_GET']))
	{
		if(isset($GLOBALS['_GET']['cat']))
		{
			$cat = $GLOBALS['_GET']['cat'];
		}
		else
		{
			$cat = '';
		}
		if(isset($GLOBALS['_GET']['sub']))
		{
			$sub = $GLOBALS['_GET']['sub'];
		}
		else
		{
			$sub = '';
		}
		if(isset($GLOBALS['_GET']['p']))
		{
			$page = $GLOBALS['_GET']['p'];
		}
		else
		{
			$page = '';
		}
	}
	else
	{
		$cat = '';
		$sub = '';
		$page = 0;
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
					include 'v-modules/project-categories.php';
				?>
                <div class="profile_box_outline">
                	<div class="profile_box_heading">BIDS LEFT</div>
                    <div class="hiring_rate">39 Bids / 100 Bids</div>
                </div>
            </div>
            <!-- body left section ends here -->
            <!-- body middle section starts here -->
            <div class="col-md-7 profile_middle_part_outline" id="list_of_projects">
            	<?php
					include 'v-modules/project-list.php';
				?>
            </div>
            <!-- body middle section ends here -->
            <!-- body right section starts here -->
            <div class="col-md-2 profile_right_part_outline">
            	<?php
					include 'v-modules/ads.php';
				?>
            </div>
            <!-- body right section ends here -->
        </div>
    </div>
</div>
<!-- body ends here -->
<?php
	include 'v-templates/post-footer.php';
?>
