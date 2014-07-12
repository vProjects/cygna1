<?php
	session_start();
	//including the bll get data class
	include 'v-includes/BLL.getData.php';
	$manageContent = new BLL_manageData();
	
	if(isset($GLOBALS['_COOKIE']['uid']) && !isset($_SESSION['user_id']))
	{
		$_SESSION['user_id'] = $GLOBALS['_COOKIE']['uid'];
	}
	else if(!isset($GLOBALS['_COOKIE']['uid']) && isset($_SESSION['user_id']))
	{
		//setting cookie value
		$manageContent->createUserCookie($_SESSION['user_id']);
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="dist/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="dist/css/style.css" />
<link rel="stylesheet" type="text/css" href="dist/css/style_custom.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="dist/js/bootstrap.js"></script>
<title>CYGNATECH | HOME</title>
</head>

<body id="home_body">
<!-- facebook like box script -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- header starts here -->
<div class="navbar navbar-fixed-top" id="header_navigation" role="navigation">
	<div class="container">
    	<div class="row profile_header_row">
        	<div class="col-sm-12">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#header_nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="glyphicon glyphicon-align-justify"></span>
                    </button>
                    <a class="navbar-brand profile_header_brand" href="index.html"><img src="img/header_logo.png" alt="logo"/></a>
                </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right" id="header_nav">
                    <div id="login_section_outline">
                        <div class="login_box_outline">
                        	<?php
								//checking cookie value and session value
								if(isset($GLOBALS['_COOKIE']['uid']) || isset($_SESSION['user_id'])){
							?>
                            <div class="login_box pull-left" id="signup_outline">
                                <span class="login_text"><a href="cygna.php?op=pro">Cygna</a></span>
                            </div>
                            <div class="login_box pull-left" id="signup_outline">
                                <span class="login_text"><a href="v-modules/logout.php">Log Out</a></span>
                            </div>
                            <?php
								} else {
							?>
                            <div class="login_box pull-left">
                                <span class="login_text" data-toggle="modal" data-target="#myModal"><a href="#">Login</a></span>
                            </div>
                            <div class="login_box pull-left" id="signup_outline">
                                <!--<img src="img/login_icon.png" alt="login" />-->
                                <span class="login_text"><a href="sign_up.php">Signup</a></span>
                            </div>
                            <?php } ?>
                            <div class="clearfix"></div>
                        </div>
                        <!--<div class="input-group search_input_group">
                            <input type="text" class="form-control pull-right search_textbox" />
                            <span class="input-group-addon search_input_addon"><img src="img/header_search_icon.png" /></span>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- header ends here -->
<!-- body starts here -->
<div id="body_outline">
	<div class="container">
    	<!-- slider row starts here -->
    	<div class="row body_slider_row">
        	
            	<div id="carousel-example-generic" class="carousel slide col-sm-12" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                  </ol>
                
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <div class="item active">
                      <img src="img/stock-photo-the-word-brand-in-cut-out-magazine-letters-pinned-to-a-cork-notice-board-an-essential-part-of-any-139304657.jpg" alt="img1">
                      <div class="carousel-caption carousel-caption-custom">
					    <h3>Logos and Branding</h3>
					    <p>Lorem ipsum dolor sit amet, consectetur</p>
					  </div>
                    </div>
                    <div class="item">
                      <img src="img/stock-vector-modern-design-minimal-style-infographic-template-can-be-used-for-infographics-numbered-banners-141801829.jpg" alt="img2">
	                  <div class="carousel-caption carousel-caption-custom">
						 <h3>Responsive Design</h3>
						 <p>Lorem ipsum dolor sit amet, consectetur</p>
					  </div>
                    </div>
                    <div class="item">
                      <img src="img/stock-photo-designer-s-desk-with-responsive-design-concept-195478520.jpg" alt="img3">
                    </div>
                  </div>
                
                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                  </a>
                </div>
            
        </div>
        <!-- slider row ends here -->
        <!-- body details starts here -->
        <div class="row box_part_row">
        	<div class="col-md-3 col-sm-6 col-xs-6 box_part_outline">
            	<a href="finding_job.php" class="hvr-dec-none">
            		<img src="img/httpswww.flickr.comphotoszeldman10821348593.jpg" class="box_part_image" />
	                <div class="box_part_description_outline">
	                	<h3 class="box_part_description_heading">Design</h3>
	                    <p class="box_part_description_description">22254 hourlies</p>
	                </div>
            	</a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 box_part_outline">
            	<a href="finding_job.php" class="hvr-dec-none">
            		<img src="img/stock-photo-web-design-concept-122664079.jpg" class="box_part_image" />
	                <div class="box_part_description_outline">
	                	<h3 class="box_part_description_heading">Web Development</h3>
	                    <p class="box_part_description_description">22254 hourlies</p>
	                </div>
            	</a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 box_part_outline">
            	<a href="finding_job.php" class="hvr-dec-none">
            		<img src="img/httpswww.flickr.comphotosdahlstroms5246229049.jpg" class="box_part_image" />
	                <div class="box_part_description_outline">
	                	<h3 class="box_part_description_heading">Writing and Translation</h3>
	                    <p class="box_part_description_description">22254 hourlies</p>
	                </div>
            	</a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 box_part_outline">
            	<a href="finding_job.php" class="hvr-dec-none">
            		<img src="img/httpswww.flickr.comphotosannahenryson5743035487.jpg" class="box_part_image" />
	                <div class="box_part_description_outline">
	                	<h3 class="box_part_description_heading">Video, Photo &amp; Audio</h3>
	                    <p class="box_part_description_description">22254 hourlies</p>
	                </div>
            	</a>
            </div>
        </div>
        <div class="row box_part_row">
        	<div class="col-md-3 col-sm-6 col-xs-6 box_part_outline">
            	<a href="finding_job.php" class="hvr-dec-none">
            		<img src="img/stock-photo-closeup-of-businesswoman-typing-on-laptop-computer-180863504.jpg" class="box_part_image" />
	                <div class="box_part_description_outline">
	                	<h3 class="box_part_description_heading">Software Dev and Mobile</h3>
	                    <p class="box_part_description_description">22254 hourlies</p>
	                </div>
            	</a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 box_part_outline">
            	<a href="finding_job.php" class="hvr-dec-none">
            		<img src="img/stock-photo-social-media-and-networking-concept-151141895.jpg" class="box_part_image" />
	                <div class="box_part_description_outline">
	                	<h3 class="box_part_description_heading">Social Media</h3>
	                    <p class="box_part_description_description">22254 hourlies</p>
	                </div>
            	</a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 box_part_outline">
            	<a href="finding_job.php" class="hvr-dec-none">
            		<img src="img/stock-photo-business-charts-blue-with-marker-pen-and-paper-clip-95421733.jpg" class="box_part_image" />
	                <div class="box_part_description_outline">
	                	<h3 class="box_part_description_heading">Sales and Marketing</h3>
	                    <p class="box_part_description_description">22254 hourlies</p>
	                </div>
            	</a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 box_part_outline">
            	<a href="finding_job.php" class="hvr-dec-none">
            		<img src="img/stock-photo-business-handshake-at-modern-office-with-bussiness-people-on-background-131432045.jpg" class="box_part_image" />
	                <div class="box_part_description_outline">
	                	<h3 class="box_part_description_heading">Business Support</h3>
	                    <p class="box_part_description_description">22254 hourlies</p>
	                </div>
            	</a>
            </div>
        </div>
        <!-- body details ends here -->
    </div>
</div>
<!-- body ends here -->
<!--footer part starts here -->
<div id="footer_outline">
	<div class="container">
    	<div class="row footer_row">
        	<div class="col-md-4">
            	<h2 class="footer_part_heading"><span class="footer_part_heading_text1">Quick</span><span class="footer_part_heading_text2">Links</span></h2>
                <ul class="footer_quick_links">
                	<li><a href="index.php">Home</a></li>
                    <li><a href="faq.php">How To FAQ</a></li>
                    <li><a href="contact_us.php">Contact Us</a></li>
                    <li><a href="sign_up.php">Join Us Today!</a></li>
                    <li><a href="privacy_policy.php">Privacy Policy</a></li>
                    <li><a href="terms_condition.php">Terms Of Use</a></li>
                </ul>
            </div>
            <div class="col-md-4">
            	<h2 class="footer_part_heading"><span class="footer_part_heading_text1">LIKE</span><span class="footer_part_heading_text2">Us</span></h2>
                <!-- facebook like box code -->
                <div class="fb-like-box" data-href="https://www.facebook.com/FacebookDevelopers" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
                <!-- end here -->
            </div>
            <div class="col-md-4">
            	<h2 class="footer_part_heading"><span class="footer_part_heading_text2">How it works?</span></h2>
                <div class="how_it_works_outline">
                	<div class="col-md-3 col-sm-3 col-xs-3 how_it_works_image_outline"><img src="img/how_it_works_icon1.png" class="how_it_works_image"/></div>
                    <div class="col-md-9 col-sm-9 col-xs-9 how_it_works_text_outline">
                    	<div class="how_it_works_heading">SignUp</div>
                        <p class="how_it_works_para">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. nec, pellentesque eu, pretium quis, sem.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="how_it_works_outline">
                	<div class="col-md-3 col-sm-3 col-xs-3 how_it_works_image_outline"><img src="img/how_it_works_icon2.png" class="how_it_works_image"/></div>
                    <div class="col-md-9 col-sm-9 col-xs-9 how_it_works_text_outline">
                    	<div class="how_it_works_heading">Hire For The Work</div>
                        <p class="how_it_works_para">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. nec, pellentesque eu, pretium quis, sem.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="how_it_works_outline">
                	<div class="col-md-3 col-sm-3 col-xs-3 how_it_works_image_outline"><img src="img/how_it_works_icon3.png" class="how_it_works_image"/></div>
                    <div class="col-md-9 col-sm-9 col-xs-9 how_it_works_text_outline">
                    	<div class="how_it_works_heading">Get The Job Done!</div>
                        <p class="how_it_works_para">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. nec, pellentesque eu, pretium quis, sem.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="how_it_works_outline">
                	<div class="col-md-3 col-sm-3 col-xs-3 how_it_works_image_outline"><img src="img/how_it_works_icon4.png" class="how_it_works_image"/></div>
                    <div class="col-md-9 col-sm-9 col-xs-9 how_it_works_text_outline">
                    	<div class="how_it_works_heading">Pay After Completion</div>
                        <p class="how_it_works_para">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. nec, pellentesque eu, pretium quis, sem.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--footer part ends here -->
<!--footer counter part starts here -->
<div id="footer_counter_outline">
	<div class="container">
    	<div class="row footer_counter_row">
        	<div class="col-md-4 col-sm-4 col-xs-12 footer_counter_text_outline">
            	<div class="footer_counter_value footer_counter_projects">15000000</div>
                <p class="footer_counter_text_bottom">Total Projects</p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 footer_counter_text_outline">
            	<div class="footer_counter_value footer_counter_amount">$50000.00</div>
                <p class="footer_counter_text_bottom">Total Amount</p>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12 footer_counter_text_outline">
            	<div class="footer_counter_value footer_counter_users">15000000</div>
                <p class="footer_counter_text_bottom">Total Users</p>
            </div>
        </div>
    </div>
</div>
<!--footer counter part ends here -->
<!-- copyright part starts here -->
<div id="copyright_outline">
	<div class="container">
    	<div class="row copyright_row">
        	<div class="col-md-12 copyright_text_position">
            	<p class="copyright_para">Copyright 2013 @ YourCompany.com | <a href="terms_condition.html">Terms Of Use</a> | <a href="privacy_policy.html">Privacy Policy</a></p>
            </div>
        </div>
    </div>
</div>
<!-- copyright part ends here -->
<!-- modal part starts here -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header custom-hmodal">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title login_text" id="myModalLabel">Log in</h4>
      </div>
      <div class="modal-body">
			<div class="col-md-12">
			<div class="modal-box">
					<div class="col-md-12">
						<form action="v-includes/class.formData.php" class="form-horizontal" role="form" method="post">
						  <div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label custom-chk">Email/Username</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control" name="username" placeholder="Email or Username">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputPassword3" class="col-sm-3 control-label custom-chk">Password </label>
							<div class="col-sm-9">
							  <input type="password" class="form-control" name="password" placeholder="Password">
							</div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-3 col-sm-5">
							  <div class="checkbox custom-chk">
								<label>
								 <input type="checkbox" name="loggedin_time"> login for 2 weeks
								</label>
								</div>
							</div>
							<div class="col-sm-4 f-psd"><a href="forget_password.php">forgot password?</div></a>
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
							  	<input type="hidden" name="fn" value="<?php echo md5('login');?>" />
								<input type="submit" class="btn btn-default btn-custom" value="Sign In"/>
							</div>
						  </div>
					</form>
				</div>
				<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
				</div>
					<div class="col-md-2"></div>
					<div class="clearfix"></div>
					
      </div>
      <div class="modal-footer custom-hmodal">
	  </div>
      </div>
    </div>
  </div>
</div>
<!-- modal ends here -->
</body>
</html>
