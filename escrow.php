<?php
	session_start();
	$pageTitle = 'Escrow';
	if(!isset($GLOBALS['_COOKIE']['uid']) && !isset($_SESSION['user_id']))
	{
		header("Location: log_in.php");
	}
	include ("v-templates/header.php");
	
	if(isset($GLOBALS['_GET']['wid']))
	{
		$wid = $GLOBALS['_GET']['wid'];
		$bid_id = $manageContent->getBidIdFromWid($_GET['wid']);
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
        			//include the workroom side bar
        			include ('v-modules/workroom.php');
        		?>
                <div class="profile_box_outline">
                	<div class="profile_box_heading">RUNNING PROJECTS</div>
                    <ul class="profile_overview">
                    	<li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                    </ul>
                </div>
            </div>
            <!-- body left section ends here -->
            <!-- body middle section starts here -->
            <div class="col-md-7 profile_middle_part_outline">
            	<div class="profile_box_outline billing_box_outline">
                	<div class="profile_box_heading">ESCROW PAGE</div>
                    <div class="billing_box_inner">
                    	<div class="billing_page_heading">Escrow and Release Information</div>
                        <div class="billing_info_outline">
                        	<?php
                        		//get Escrow and project details
                        		$manageContent->getProjectEscrowInfo($_GET['wid']);
                        	?>
                            <div class="col-md-12 billing_details_table_outline">
                                <table class="table table-hover table-responsive billing_details_table">
                                    <thead>
                                        <tr>
                                            <th>Milestone</th>
											<th>Note</th>
                                            <th>Start Date</th>
                                            <th>Amount</th>
                                            <th>Fund Escrow</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    	//get the milestones
                                    	$manageContent->getProjectMilestoneInfo($_GET['wid']);
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                            	//get the milestones
                            	$manageContent->getAddMilestone($_GET['wid']);
                            ?>
                            <div class="clearfix"></div>
                        </div>
                        <p class="billing_bottom_para">If you have any query feel free to contact us our billing team.</p>
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


	

<!-- modal ends here -->
</body>
</html>
