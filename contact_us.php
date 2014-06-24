<?php
	session_start();
	$pageTitle = 'ContactUs';
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
	<!-- sign up box starts here -->
		<div class="row">
		<div class="col-md-8">
			<h2 class="post_project_top_heading">CONTACT US</h2>
		</div>
		<div class="col-md-4"></div>
		</div>
		<div class="row background-custom">
		<div class="col-md-8">
			<div class="contact-box">
				<div class="col-md-12">
					<div class="col-md-12">
						<h4 class="contact-txt">lorem ipsum lorem ipsum lorem ipsum lorem ipsum </h4>
					</div>
					<div class="clearfix"></div>
					<hr>
					
				</div>
				
				<div class="clearfix"></div>
                
					<div class="col-md-10 col-md-offset-1">
						<form class="form-horizontal" id="userContactForm" action="v-includes/class.formData.php" method="post">
						  <div class="form-group">
							<label class="col-sm-3 control-label custom-chk2">Name</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control custom-width" name="name" id="contact_name" placeholder="Your name please">
                              <div class="signup-form-error" id="err_contact_name"></div>
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-3 control-label custom-chk2">Phone Number </label>
							<div class="col-sm-9">
							  <input type="text" class="form-control custom-width" name="phn" id="contact_phn" placeholder="So that we can contact you ">
                              <div class="signup-form-error" id="err_contact_phn"></div>
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-3 control-label custom-chk2">Email </label>
							<div class="col-sm-9">
							  <input type="email" class="form-control custom-width" name="email" id="contact_email" placeholder="So that we can send you an email">
                              <div class="signup-form-error" id="err_contact_email"></div>
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-3 control-label custom-chk2">Title</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control custom-width" name="title" id="contact_title" placeholder="Title of the query">
                              <div class="signup-form-error" id="err_contact_title"></div>
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-3 control-label custom-chk2">Subject</label>
							<div class="col-sm-9">
							  <input type="text" class="form-control custom-width" name="subject" id="contact_sub" placeholder="Subject of the query">
                              <div class="signup-form-error" id="err_contact_sub"></div>
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-3 control-label custom-chk2">Your message</label>
							<div class="col-sm-9">
								 <textarea class="form-control" rows="5" name="msg" id="contact_msg"></textarea>
                                 <div class="signup-form-error" id="err_contact_msg"></div>
							</div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
                            	<input type="hidden" name="fn" value="<?php echo md5('contact_us'); ?>" />
							  <input type="button" id="userContactBtn" class="btn btn-lg btn-primary" value="Send" />
							</div>
						  </div>
					</form>	

					</div>
					<div class="clearfix"></div>
				
			</div>
			</div>
		
		<!-- sign up box ends here -->
		<!-- log in box starts here -->
		<div class="col-md-3">
			<div class="contact-box address-part">
				<h3>Our Address</h3>
				<hr>
				<p><span class="glyphicon glyphicon-phone"></span> +123456789</p>
				<p><span class="glyphicon glyphicon-envelope"></span> support@cygnatech.com</p>
				<div class="queries-top">
					<div class="panel-group" id="accordion">
					  <div class="panel panel-info">
					    <div class="panel-heading">
					      <h4 class="panel-title panel-txt">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                              For top queries please click here!
                            </a>
					      </h4>
					    </div>
					    <div id="collapseOne" class="panel-collapse collapse">
					      	<div class="panel-body">
                                <?php
									//getting recent faq
									$manageContent->getFaqLinkInContactPage();
								?>
					 		</div>
					    </div>
					  </div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
        <!-- log in box ends here -->
		</div>
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
