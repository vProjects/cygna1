<?php
	session_start();
	$pageTitle = 'Transaction Emp';
	if(!isset($GLOBALS['_COOKIE']['uid']) && !isset($_SESSION['user_id']))
	{
		header("Location: log_in.php");
	}
	include ("v-templates/header.php");
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
                	<div class="profile_box_heading">WORKROOM</div>
                    <ul class="profile_overview">
                    	<li><a href="message.php">Message</a></li>
                        <li><a href="milestone.php">Milestones</a></li>
                        <li><a href="#">Files</a></li>
                        <li><a href="#">My Proposal</a></li>
                        <li><a href="#">Billings & Invoice</a></li>
                    </ul>
                </div>
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
			<?php
				include ("v-templates/poll.php");
			?>	
            </div>
            <!-- body left section ends here -->
            <!-- body middle section starts here -->
            <div class="col-md-7 profile_middle_part_outline">
            	<div class="profile_box_outline billing_box_outline">
                	<div class="profile_box_heading">Transaction History</div>
                    <div class="billing_box_inner">
					<div class="billing_page_heading_trans">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
                        <div class="billing_info_outline">
                        	 <div class="milestone_info_table_outline">
                                <table class="table table-hover table-responsive billing_details_table">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Debit amount</th>
                                            <th>Credit amount</th>
											<th>Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>24/03/14</td>
                                            <td>lorem ipsum</td>
                                            <td>$150</td>
											<td>--</td>
                                            <td>$50</td>
                                        </tr>
                                        <tr>
                                            <td>24/03/14</td>
                                            <td>lorem ipsum</td>
                                            <td>--</td>
											<td>$200</td>
                                            <td>$50</td>
                                        </tr>
                                        <tr>
                                            <td>24/03/14</td>
                                            <td>lorem ipsum)</td>
                                            <td>$150</td>
											<td>--</td>
                                            <td>$50</td>
                                        </tr>
                                        <tr>
                                            <td>24/03/14</td>
                                            <td>lorem ipsum</td>
                                            <td>--</td>
											<td>$200</td>
                                            <td>$50</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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

