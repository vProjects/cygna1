<?php
	session_start();
	$pageTitle = 'Invite Friends';
	include ('v-templates/header.php');
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
		<div class="row">
			<div class="col-md-9">
				<h2 class="post_project_top_heading">INVITE FRIENDS AND EARN BIDS</h2>
			</div>
			<div class="col-md-3"></div>
		</div>
		<div class="row">
			<div class="col-md-9">
				<div class="carousel slide" id="myCarousel">
						
							<!-- Indicators -->
							<ol class="carousel-indicators">
								<li class="active" data-slide-to="0" data-target="#myCarousel"></li>
								<li data-slide-to="1" data-target="#myCarousel" class=""></li>
								<li data-slide-to="2" data-target="#myCarousel" class=""></li>
							</ol>
						
							<!-- Wrapper for slides -->
							<div class="carousel-inner">
								<div class="item active" id="slide1">
										<img class="img-responsive" src="img/frnd.jpg">
								</div><!-- end item -->
								
								<div class="item" id="slide2">
										<img class="img-responsive" src="img/frnd.jpg">
								</div><!-- end item -->
								
								<div class="item" id="slide3">
										<img class="img-responsive" src="img/frnd.jpg">
								</div><!-- end item -->
							</div><!-- carousel-inner -->
							
							<!-- Controls -->
							<a class="left carousel-control" data-slide="prev" href="#myCarousel"><span class="icon-prev"></span></a>
							<a class="right carousel-control" data-slide="next" href="#myCarousel"><span class="icon-next"></span></a>
						
				</div>		
			</div>
			<div class="col-md-3"></div>
	</div>
			<div class="row">
				<div class="col-md-9">
					<div class="frndbox">
						<div class="frndtxt">
								<p>If you enjoy being a part of cygnatech, we want you to share your experiences to the world. For every Client that you bring onto cygnatech, you'll earn $10. For every Frecygnatechr you bring onto cygnatech, you'll earn 10 Connects, and you'll also give them a gift of 10 Connects to help them get started. It's our way of saying "thank you" for sharing the love and spreading the word.</p>
								<p>Share cygnatech with your friends using the tools above. We take care of all the tracking details and credit you automatically.</p>
								<p>If you refer a Client, all they need to do is register on cygnatech and make a payment of at least $10, and you'll receive $10. For Frecygnatechr referrals, all they need to do is register, verify their email and phone number, and take the cygnatech Pledge, and you'll receive 10 Connects. As an added bonus, they'll also receive 10 Connects as a gift from you.</p>
								<p>If you enjoy being a part of cygnatech, we want you to share your experiences to the world. For every Client that you bring onto cygnatech, you'll earn $10. For every Frecygnatechr you bring onto cygnatech, you'll earn 10 Connects, and you'll also give them a gift of 10 Connects to help them get started. It's our way of saying "thank you" for sharing the love and spreading the word.</p>
								<p>Share cygnatech with your friends using the tools above. We take care of all the tracking details and credit you automatically.</p>
								<p>If you refer a Client, all they need to do is register on cygnatech and make a payment of at least $10, and you'll receive $10. For Frecygnatechr referrals, all they need to do is register, verify their email and phone number, and take the cygnatech Pledge, and you'll receive 10 Connects. As an added bonus, they'll also receive 10 Connects as a gift from you.</p>
								<p>If you enjoy being a part of cygnatech, we want you to share your experiences to the world. For every Client that you bring onto cygnatech, you'll earn $10. For every Frecygnatechr you bring onto cygnatech, you'll earn 10 Connects, and you'll also give them a gift of 10 Connects to help them get started. It's our way of saying "thank you" for sharing the love and spreading the word.</p>
								<p>Share cygnatech with your friends using the tools above. We take care of all the tracking details and credit you automatically.</p>
								<p>If you refer a Client, all they need to do is register on cygnatech and make a payment of at least $10, and you'll receive $10. For Frecygnatechr referrals, all they need to do is register, verify their email and phone number, and take the cygnatech Pledge, and you'll receive 10 Connects. As an added bonus, they'll also receive 10 Connects as a gift from you.</p>
								<p>If you enjoy being a part of cygnatech, we want you to share your experiences to the world. For every Client that you bring onto cygnatech, you'll earn $10. For every Frecygnatechr you bring onto cygnatech, you'll earn 10 Connects, and you'll also give them a gift of 10 Connects to help them get started. It's our way of saying "thank you" for sharing the love and spreading the word.</p>
								<p>Share cygnatech with your friends using the tools above. We take care of all the tracking details and credit you automatically.</p>
								<p>If you refer a Client, all they need to do is register on cygnatech and make a payment of at least $10, and you'll receive $10. For Frecygnatechr referrals, all they need to do is register, verify their email and phone number, and take the cygnatech Pledge, and you'll receive 10 Connects. As an added bonus, they'll also receive 10 Connects as a gift from you.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
		<div class="clearfix"></div>
</div>
</div>
<!-- body ends here -->
<?php
	if(isset($GLOBALS['_COOKIE']['uid']) || isset($_SESSION['user_id']))
	{
		include 'v-templates/post-footer.php';
	}
	else
	{
		include 'v-templates/footer.php';
	}
?>
