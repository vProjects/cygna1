<?php
	session_start();
	$pageTitle = 'Get Project';
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
                        <li><a href="escrow.php">Milestones</a></li>
                        <li><a href="#">Files</a></li>
                        <li><a href="post_bid.php">My Proposal</a></li>
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
            <!-- body right section starts here -->
           <div class="col-md-8 profile_left_part_outline">
                <div class="project_list_heading_bar">
                	<span class="pull-left">Job List</span>
                    <span class="pull-right">Total awards: <b>5</b></span>
                    <div class="clearfix"></div>
                </div>
                <div class="project_details_outline post_bid_proposal_list">
                	<div class="col-md-2 post_bid_proposal_image_outline">
                    	<img src="img/dummy_profile.jpg" class="center-block" />
                    </div>
                    <div class="col-md-10 post_bid_proposal_outline">
                    	<div class="project_title_text post_bid_bidder_name"><a href="escrow.php">Job Name</a></div>
                        <p class="project_part_description">I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Skills:</span> PHP, ASP.NET</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Price:</span> $500</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="project_details_outline post_bid_proposal_list">
                	<div class="col-md-2 post_bid_proposal_image_outline">
                    	<img src="img/dummy_profile.jpg" class="center-block" />
                    </div>
                    <div class="col-md-10 post_bid_proposal_outline">
                    	<div class="project_title_text post_bid_bidder_name"><a href="escrow.php">Job Name</a></div>
                        <p class="project_part_description">I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Skills:</span> PHP, ASP.NET</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Price:</span> $500</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="project_details_outline post_bid_proposal_list">
                	<div class="col-md-2 post_bid_proposal_image_outline">
                    	<img src="img/dummy_profile.jpg" class="center-block" />
                    </div>
                    <div class="col-md-10 post_bid_proposal_outline">
                    	<div class="project_title_text post_bid_bidder_name"><a href="escrow.php">Job Name</a></div>
                        <p class="project_part_description">I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Skills:</span> PHP, ASP.NET</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Price:</span> $500</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="project_details_outline post_bid_proposal_list">
                	<div class="col-md-2 post_bid_proposal_image_outline">
                    	<img src="img/dummy_profile.jpg" class="center-block" />
                    </div>
                    <div class="col-md-10 post_bid_proposal_outline">
                    	<div class="project_title_text post_bid_bidder_name"><a href="escrow.php">Job Name</a></div>
                        <p class="project_part_description">I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Skills:</span> PHP, ASP.NET</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Price:</span> $500</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="project_details_outline post_bid_proposal_list">
                	<div class="col-md-2 post_bid_proposal_image_outline">
                    	<img src="img/dummy_profile.jpg" class="center-block" />
                    </div>
                    <div class="col-md-10 post_bid_proposal_outline">
                    	<div class="project_title_text post_bid_bidder_name"><a href="escrow.php">Job Name</a></div>
                        <p class="project_part_description">I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it. Place your bids according to the requirement. You can freely ask your doubts.</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Skills:</span> PHP, ASP.NET</p>
                        <p class="post_bid_info_outline"><span class="post_bid_info_topic">Price:</span> $500</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- body right section ends here -->
        </div>
    </div>
</div>
</div>
<!-- body ends here -->
<?php
	include 'v-templates/post-footer.php';
?>
