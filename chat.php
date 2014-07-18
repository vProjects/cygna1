<?php
	session_start();
	$pageTitle = 'Chat';
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
                	<div class="profile_box_heading">CATEGORIES</div>
                    <ul class="profile_overview">
                    	<li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                    </ul>
                </div>
                <div class="profile_box_outline">
                	<div class="profile_box_heading">BIDS LEFT</div>
                    <div class="hiring_rate">39 Bids / 100 Bids</div>
                </div>
			<?php
				include ("v-templates/poll.php");
			?>	
            </div>
            <!-- body left section ends here -->
            <!-- body middle part starts here -->
            <div class="col-md-7 profile_middle_part_outline">
            	<div class="chat_details_outlne">
                	<div class="chat_title_outline">
                    	<span class="chat_profile_name pull-left">Profile name</span>
                        <span class="chat_online_status pull-right"><img src="img/green-button-md.png" class="chat_online_button"/>Online</span>
                        <div class="clearfix"></div>
                    </div>
                    <!-- message section starts here -->
                    <div class="chat_message_outline">
                        <div class="chat_part_outline">
                        	<div class="col-md-2 col-sm-2 col-xs-2">
                            	<img src="img/dummy_profile.jpg" class="chat_user_image"/>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                            	<div class="chat_user_msg">
                                	<p>I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it.Place your bids according to the requirement. You can freely ask your doubts.I have a website with new domain. </p>
                                    <p class="pull-right chat_user_msg_date"><span>Tuesday, 18th feb 2014</span> | <span>12:05:46</span></p>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="chat_part_outline">
                            <div class="col-md-10 col-sm-10 col-xs-10">
                            	<div class="chat_user_msg">
                                	<p>I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it.Place your bids according to the requirement. You can freely ask your doubts.I have a website with new domain. </p>
                                    <p class="pull-right chat_user_msg_date"><span>Tuesday, 18th feb 2014</span> | <span>12:05:46</span></p>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                            	<img src="img/dummy_profile1.jpg" class="chat_user_image"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="chat_part_outline">
                        	<div class="col-md-2 col-sm-2 col-xs-2">
                            	<img src="img/dummy_profile.jpg" class="chat_user_image"/>
                            </div>
                            <div class="col-md-10 col-sm-10 col-xs-10">
                            	<div class="chat_user_msg">
                                	<p>I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it.Place your bids according to the requirement. You can freely ask your doubts.I have a website with new domain. </p>
                                    <p class="pull-right chat_user_msg_date"><span>Tuesday, 18th feb 2014</span> | <span>12:05:46</span></p>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="chat_part_outline">
                            <div class="col-md-10 col-sm-10 col-xs-10">
                            	<div class="chat_user_msg">
                                	<p>I have a website with new domain. I want responsive design for my site. I will discuss the details of work after I choose the right person for it.Place your bids according to the requirement. You can freely ask your doubts.I have a website with new domain. </p>
                                    <p class="pull-right chat_user_msg_date"><span>Tuesday, 18th feb 2014</span> | <span>12:05:46</span></p>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                            	<img src="img/dummy_profile1.jpg" class="chat_user_image"/>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- message section ends here -->
                    <!-- input msg starts here -->
                    <div class="input_msg_outline">
                    	 <div class="col-md-10 col-sm-10 col-xs-10">
                         	<textarea rows="2" class="form-control input_msg_area"></textarea>
                         </div>
                         <div class="col-md-2 col-sm-2 col-xs-2">
                         	<div class="input_msg_submit">SUBMIT</div>
                         </div>
                         <div class="clearfix"></div>
                    </div>
                    <!-- input msg ends here -->
                </div>
            </div>
            <!-- body middle part ends here -->
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
