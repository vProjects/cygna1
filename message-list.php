<?php
	session_start();
	$pageTitle = 'Message';
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
					if(isset($GLOBALS['_GET']['wid']))
					{
						include 'v-modules/workroom.php';
					}
					else
					{
                		include 'v-modules/right-nav.php';
					}

					include ("v-templates/poll.php");
			?>	
			</div>	
			
            <!-- body left section ends here -->
            <!-- body middle section starts here -->
            <div class="col-md-7 profile_middle_part_outline">
            	<div class="profile_box_outline billing_box_outline">
                	<div class="profile_box_heading">Inbox</div>
                    <div class="billing_box_inner">
                    	<div class="billing_page_heading">Messages</div>
                        <!-- message section starts here -->
                        <div class="message_details_outline">
                        	<div class="chat_part_outline">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="chat_user_msg">
                                        <a href="message.php"><p><span class="glyphicon glyphicon-envelope glyph glyph-unread"></span> I have a website with new domain. I want responsive design for my site. ... </p></a>
                                        <a href="#"><p class="pull-left chat_user_msg_date"><span>Project Name</span></p></a>
                                        <p class="pull-right chat_user_msg_date"><span>Tuesday, 18th feb 2014</span> | <span>12:05:46</span></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="chat_part_outline">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="chat_user_msg">
                                        <a href="message.php"><p><span class="glyphicon glyphicon-envelope glyph"></span> I have a website with new domain. I want responsive design for my site. ... </p></a>
                                        <a href="#"><p class="pull-left chat_user_msg_date"><span>Project Name</span></p></a>
                                        <p class="pull-right chat_user_msg_date"><span>Tuesday, 18th feb 2014</span> | <span>12:05:46</span></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="chat_part_outline">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="chat_user_msg">
                                        <a href="message.php"><p><span class="glyphicon glyphicon-envelope glyph"></span> I have a website with new domain. I want responsive design for my site. ... </p></a>
                                        <a href="#"><p class="pull-left chat_user_msg_date"><span>Project Name</span></p></a>
                                        <p class="pull-right chat_user_msg_date"><span>Tuesday, 18th feb 2014</span> | <span>12:05:46</span></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="chat_part_outline">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="chat_user_msg">
                                        <a href="message.php"><p><span class="glyphicon glyphicon-envelope glyph"></span> I have a website with new domain. I want responsive design for my site. ... </p></a>
                                        <a href="#"><p class="pull-left chat_user_msg_date"><span>Project Name</span></p></a>
                                        <p class="pull-right chat_user_msg_date"><span>Tuesday, 18th feb 2014</span> | <span>12:05:46</span></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="chat_part_outline">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="chat_user_msg">
                                        <a href="message.php"><p><span class="glyphicon glyphicon-envelope glyph"></span> I have a website with new domain. I want responsive design for my site. ... </p></a>
                                        <a href="#"><p class="pull-left chat_user_msg_date"><span>Project Name</span></p></a>
                                        <p class="pull-right chat_user_msg_date"><span>Tuesday, 18th feb 2014</span> | <span>12:05:46</span></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- message section ends here -->
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
</div>
<!-- body ends here -->
<?php
	include 'v-templates/post-footer.php';
?>
