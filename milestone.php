<?php
	session_start();
	$pageTitle = 'Milestone';
	if(!isset($GLOBALS['_COOKIE']['uid']) && !isset($_SESSION['user_id']))
	{
		header("Location: log_in.php");
	}
	include ("v-templates/header.php");
?>
<?php
	if(isset($GLOBALS['_GET']['wid']))
	{
		$wid = $GLOBALS['_GET']['wid'];
	}
	/*else
	{
		header("Location: cygna.php?op=pro");
	}*/
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
					include 'v-modules/workroom.php';
				?>
                <?php
					include 'v-modules/user-running-projects.php';
				?>
            </div>
            <!-- body left section ends here -->
            <!-- body middle section starts here -->
            <div class="col-md-7 profile_middle_part_outline">
            	<div class="profile_box_outline billing_box_outline">
                	<div class="profile_box_heading">Workroom For: PROJECT NAME</div>
                    <div class="billing_box_inner">
                    	<div class="billing_page_heading">Milestones</div>
                        <div class="billing_info_outline">
                        	<div class="milestone_info_heading">Details</div>
                            <div class="milestone_info_table_outline">
                                <table class="table table-hover table-responsive billing_details_table">
                                    <thead>
                                        <tr>
                                            <th>Amount</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>$85.00</td>
                                            <td>2nd phase part1 (USD)</td>
                                            <td class="milestone_info_table_status">Released</td>
                                            <td>Lorem Ipsum</td>
                                        </tr>
                                        <tr>
                                            <td>$200.00</td>
                                            <td>2nd phase (USD)</td>
                                            <td class="milestone_info_table_status">Released</td>
                                            <td>Lorem Ipsum</td>
                                        </tr>
                                        <tr>
                                            <td>$50.00</td>
                                            <td>part2 - basic store (USD)</td>
                                            <td class="milestone_info_table_status">Released</td>
                                            <td>Lorem Ipsum</td>
                                        </tr>
                                        <tr>
                                            <td>$50.00</td>
                                            <td>front end design (USD)</td>
                                            <td class="milestone_info_table_status">Released</td>
                                            <td>Lorem Ipsum</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="milestone_total_amount">Total: $385.00</div>
                        </div>
                    </div>    
                </div>
                <div class="clearfix"></div>
            </div>
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

