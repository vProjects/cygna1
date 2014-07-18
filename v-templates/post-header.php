<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="dist/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="dist/css/jquery.Jcrop.min.css" />
<link rel="stylesheet" type="text/css" href="dist/css/jquery.datepick.css" />
<link rel="stylesheet" type="text/css" href="dist/css/style.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="dist/js/bootstrap.js"></script>
<script src="js/validiation.js"></script>
<script src="js/asynch-function.js"></script>
<script src="js/element-effect.js"></script>
<script src="js/jquery.plugin.js"></script>
<script src="js/jquery.datepick.js"></script>
<script src="js/jquery.Jcrop.min.js"></script>
<title>CYGNATECH | <?php echo $pageTitle; ?></title>
</head>

<body>
<!-- facebook like box script -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

	//function to check new message
	function messageNotification()
	{
		var notification_div = document.getElementById('msg_notification');
		var msg_notification_1 = document.getElementById('msg_notification_1');
		
		$.ajax({
		  url: "v-includes/class.fetchData.php",
		  type: "POST",
		  data: "refData=getMsgNotification"
		}).success(function(data) {
			if( data != 0 )
			{
			  notification_div.innerHTML = data;
			  msg_notification_1.innerHTML = data;
			}
		});
	}
	
	//make the first call
	messageNotification();
	
	$( document ).ready(function() {
	    setInterval(function() {messageNotification();}, 3000);
	});
	
</script>

<!-- header starts here -->
<div class="navbar navbar-fixed-top profile_header_outline" role="navigation">
	<?php if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){ ?>
		<a href="#"><div class="inbox-nav"><span class="glyphicon glyphicon-exclamation-sign glyph"></span>ALERTS(0)</div></a>
	    <a href="message-list.php"><div class="inbox-nav"><span class="glyphicon glyphicon-comment glyph"></span>INBOX(<span id="msg_notification">0</span>)</div></a>
	    <a href="#"><div class="inbox-nav"><span class="glyphicon glyphicon-user glyph"></span><?php echo $manageContent->getUsername($_SESSION['user_id']);?></div></a>
	<?php } ?>
	<div class="container">
    	<div class="row profile_header_row">
        	<div class="col-sm-6 col-ms-6">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#profile_header_nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="glyphicon glyphicon-align-justify"></span>
                    </button>
                    <a class="navbar-brand profile_header_brand" href="index.php"><img src="img/page_logo.png" alt="logo"/></a>
                </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                <?php //include("nav.php") ?>
            </div>
        </div>
    </div>
    <?php include("post-nav.php") ?>
</div>
<!-- header ends here -->

