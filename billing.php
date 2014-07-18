<?php
	session_start();
	$pageTitle = 'Billing';
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
                	<div class="profile_box_heading">Workroom For: PROJECT NAME</div>
                    <div class="billing_box_inner">
                    	<div class="billing_page_heading">Escrow and Release Information</div>
                        <div class="billing_info_outline">
                        
                            <div class="col-md-4 pull-left billing_info_left_part">
                                <p class="billing_info_para">
                                    <span class="billing_info_heading">Client:</span>
                                    <span class="billing_info_text">Lorem Ipsum</span>
                                </p>
                                <p class="billing_info_para">
                                    <span class="billing_info_heading">Type:</span>
                                    <span class="billing_info_text">Fixed</span>
                                </p>
                                <p class="billing_info_para">
                                    <span class="billing_info_heading">Payment:</span>
                                    <span class="billing_info_text">Escrow</span>
                                </p>
                            </div>
                            <div class="col-md-4 pull-right billing_info_right_part">
                            	<div class="financial_summary_heading">finanacial summary</div>
                                <p class="billing_info_para">
                                    <span class="billing_info_heading">Project Amount:</span>
                                    <span class="billing_info_text">$3000</span>
                                </p>
                                <p class="billing_info_para">
                                    <span class="billing_info_heading">Escrow Amount:</span>
                                    <span class="billing_info_text">$3000</span>
                                </p>
                                <p class="billing_info_para">
                                    <span class="billing_info_heading">Released Amount:</span>
                                    <span class="billing_info_text">$3000</span>
                                </p>
                            </div>
                            <div class="col-md-12 billing_details_table_outline">
                                <table class="table table-hover table-responsive billing_details_table">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Date</th>
                                            <th>Release Amount</th>
                                            <th>Escrow Amount</th>
                                            <th>Other Amount</th>
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Release</td>
                                            <td>dd-mm-yyyy</td>
                                            <td>$3000</td>
                                            <td>$3000</td>
                                            <td>$3000</td>
                                        </tr>
                                        <tr>
                                            <td>Fund</td>
                                            <td>dd-mm-yyyy</td>
                                            <td>$3000</td>
                                            <td>$3000</td>
                                            <td>$3000</td>
                                        </tr>
                                        <tr>
                                            <td>Release</td>
                                            <td>dd-mm-yyyy</td>
                                            <td>$3000</td>
                                            <td>$3000</td>
                                            <td>$3000</td>
                                        </tr>
                                        <tr>
                                            <td>Fund</td>
                                            <td>dd-mm-yyyy</td>
                                            <td>$3000</td>
                                            <td>$3000</td>
                                            <td>$3000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
