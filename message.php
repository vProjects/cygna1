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
					//last loin widget
					include 'v-modules/last-login.php';
					
					include ("v-templates/poll.php");
				?>	
			</div>	
			
            <!-- body left section ends here -->
            <!-- body middle section starts here -->
            <div class="col-md-7 profile_middle_part_outline">
            	<div class="profile_box_outline billing_box_outline">
                	<div class="profile_box_heading">Workroom For: PROJECT NAME</div>
                    <div class="billing_box_inner">
                    	<div class="billing_page_heading">Your Conversation</div>
                        <!-- message section starts here -->
                        <div class="message_details_outline">
	                        <!-- input msg starts here -->
	                        <div class="input_msg_outline">
	                             <div class="col-md-10 col-sm-10 col-xs-10">
	                                <textarea rows="2" class="form-control input_msg_area" id="msg-bx"></textarea>
	                             </div>
	                             <div class="col-md-2 col-sm-2 col-xs-2">
	                                <div class="input_msg_submit" onclick="sendmsg('msg-bx',<?php echo "'".$_GET['bid']."'"; ?>)">SEND</div>
	                             </div>
	                             <div class="clearfix"></div>
	                        </div>
	                        
                        	<?php
                        		//get the messages from the database
                        		$manageContent->getAllMessages($_GET['bid'],0,10);
                        	?>
	                    	
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
<script type="text/javascript">
	function sendmsg(txt_id,bid_id)
	{
		var msg = document.getElementById(txt_id).value;
		if( msg != "" )
		{
			$.ajax({
			  url: "v-includes/class.fetchData.php",
			  type: "POST",
			  data: "msg="+msg+"&bid="+bid_id+"&refData=postMsg"
			}).success(function(data) {
			  alert(data);
			  document.getElementById(txt_id).value = "";
			});
		}
		else
		{
			alert('Please type a message.');
		}
			
	}
	
// 	
	// function getMessage()
	// {
		// var bid = <?php //echo "'".$_GET['bid']."'"; ?>;
// 		
		// if( bid != "" )
		// {
			// $.ajax({
			  // url: "v-includes/class.fetchData.php",
			  // type: "POST",
			  // data: "bid="+bid+"&refData=getMsg"
			// }).success(function(data) {
			  // alert(data);
			// });
		// }
		// else
		// {
			// alert('Error in fetching previous message.');
		// }
	// }
</script>
<?php
	include 'v-templates/post-footer.php';
?>
