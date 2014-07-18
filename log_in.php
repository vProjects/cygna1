<?php
	session_start();
	$pageTitle = 'Login';
	if(isset($GLOBALS['_COOKIE']['uid']) || isset($_SESSION['user_id']))
	{
		header("Location: cygna.php?op=pro");
	}
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
<!-- welcome heading starts here -->
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-8">
			<h2 class="post_project_top_heading">WELCOME TO CYGNATECH</h2>
			<h4 class="welcome-sub-header">Post a job find a job</h4>
		</div>
		<div class="col-md-3"></div>
	</div>
	<!-- welcome heading ends here -->
	<!-- log in box starts here -->
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-7">
			<div class="login-box">
				<div class="col-md-12">
					<div class="col-md-6">
						<h4 class="login-txt">Log in to join us by:</h4>
					</div>
						<div class="logo-part">
							<div class="col-md-3">
							<button type="submit" class="btn  btn-default btn-fb">FACEBOOK</button>
							</div>
							<div class="col-md-3">
							<button type="submit" name="linkedin" class="btn btn-default btn-in">LINKED IN</button>
							</div>
							<div class="clearfix"></div>
						</div>
					
					<div class="clearfix"></div>
				</div>
					<div class="col-md-12">
						<h4 class="login-txt">or</h4>
					</div>
					<div class="col-md-10 col-md-offset-1">
						<form action="v-includes/class.formData.php" class="form-horizontal" role="form" method="post">
						  <div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label custom-chk">Email/Username</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" name="username" placeholder="Email or Username">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputPassword3" class="col-sm-4 control-label custom-chk">Password </label>
							<div class="col-sm-8">
							  <input type="password" class="form-control" name="password" placeholder="Password">
							</div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-4 col-sm-5">
							  <div class="checkbox custom-chk">
								<label>
								  <input type="checkbox" name="loggedin_time"> login for 2 weeks
								</label>
								</div>
							</div>
							<div class="col-sm-3 f-psd"><a href="forget_password.php">forgot password?</a></div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-offset-4 col-sm-8">
							  	<input type="hidden" name="fn" value="<?php echo md5('login');?>" />
								<input type="submit" class="btn btn-lg btn-success" value="Sign In"/>
							</div>
						  </div>
						</form>

					</div>
					<div class="col-md-2"></div>
					<div class="clearfix"></div>
				
			</div>
		</div>
		<!-- log in box ends here -->
		<!-- sign up box starts here -->
		<div class="col-md-3">
			<div class="login-box">
			<h4 class="login-txt">Not a member yet?</h4>
			<div class="signup-part">
			<a href="sign_up.php"><button type="button" name="sign-up" class="btn btn-sign btn-default">Sign up</button></a>
			</div>
			<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-md-1"></div>
		<!-- sign up box ends here -->
	</div>
</div>
</div>	

<!-- body ends here -->
<?php
	include 'v-templates/footer.php';
?>
