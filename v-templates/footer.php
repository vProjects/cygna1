<!--footer part starts here -->
<div id="footer_outline">
	<div class="container">
    	<div class="row footer_row">
        	<div class="col-md-3">
            	<h3 class="other_footer_part_heading">CygnaTech</h3>
                <ul class="other_footer_nav_ul">
                	<li><a href="index.php">Home</a></li>
                    <li><a href="#">How It Works</a></li>
                    <li><a href="finding_job.php">Projects</a></li>
                    <li><a href="services_products.php">Services</a></li>
                    <li><a href="about_us.php">About Us</a></li>
                    <li><a href="contact_us.php">Contact Us</a></li>
                    
                    
                </ul>
            </div>
            <div class="col-md-3">
            	<h3 class="other_footer_part_heading">LIKE Us</h3>
                <!-- facebook like box code -->
                <div class="fb-like-box" data-href="https://www.facebook.com/FacebookDevelopers" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
                <!-- end here -->
            </div>
            <div class="col-md-3">
            	<h3 class="other_footer_part_heading">Quick Links</h3>
                <ul class="other_footer_nav_ul">
                	<li><a href="faq.php">How To FAQ</a></li>
                    <li><a href="privacy_policy.php">Privacy Policy</a></li>
                    <li><a href="terms_condition.php">Terms of Use</a></li>
                    <li><a href="advertise_with_us.php">Advertise With Us</a></li>
                    <li><a href="sign_up.php">Join Us Today!</a></li>
                </ul>
            </div>
            <div class="col-md-3">
            	<h3 class="other_footer_part_heading">Get In Touch</h3>
                <a href="index.php"><img src="img/header_logo.png" alt="logo" class="other_footer_company_logo"></a>
                <div class="footer_social_icon_outline">
                	<li><img src="img/facebook-2-icon-32.png" /></li>
                    <li><img src="img/twitter-2-icon-32.png" /></li>
                    <li><img src="img/linkedin-2-icon-32.png" /></li>
                    <li><img src="img/google-plus-2-icon-32.png" /></li>
                    <div class="clearfix"></div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!--footer part ends here -->
<!-- copyright part starts here -->
<div id="copyright_outline">
	<div class="container">
    	<div class="row copyright_row">
        	<div class="col-md-12 copyright_text_position">
            	<p class="copyright_para">Copyright 2013 @ YourCompany.com | <a href="terms_condition.php">Terms Of Use</a> | <a href="privacy_policy.php">Privacy Policy</a></p>
            </div>
        </div>
    </div>
</div>
<!-- copyright part ends here -->
<?php
	//checking for session variable and showing the result
	if(isset($_SESSION['success']))
	{
		echo '<script type="text/javascript">alertSuccess("'.$_SESSION['success'].'");</script>';
		unset($_SESSION['success']);
	}
	else if(isset($_SESSION['warning']))
	{
		echo '<script type="text/javascript">alertWarning("'.$_SESSION['warning'].'");</script>';
		unset($_SESSION['warning']);
	}
?>
<script type="text/javascript">
	$('#per_date').datepick({
		dateFormat: 'yyyy-mm-dd',
		minDate: new Date(1900, 1 - 1, 01), 
    	maxDate: new Date(),
		yearRange: '1900:2014',
		showTrigger: '#calImg'
	});
	
	$('.date_range').datepick({
		dateFormat: 'yyyy-mm-dd',
		minDate: new Date(1900, 1 - 1, 01), 
    	maxDate: new Date(),
		yearRange: '1900:2014',
		showTrigger: '#calImg'
	});
	
	$('.extend_date').datepick({
		dateFormat: 'yyyy-mm-dd', 
    	minDate: new Date(),
		maxDate: '+3m',
		showTrigger: '#calImg'
	});
</script>
</body>
</html>