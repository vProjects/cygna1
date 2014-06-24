<?php
	session_start();
	$pageTitle = 'Forgot Password';
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
	<!-- heading starts here -->
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h2 class="post_project_top_heading">FORGOT YOUR PASSWORD?</h2>
		</div>
		<div class="col-md-2"></div>
	</div>
	<!-- heading ends here -->
	<!-- email box starts here -->
	<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="login-box">
					<div class="col-md-12">
						<div class="forgetheading">
							Just put your email id and we will send the new password to your inbox.
						</div>
					</div>
						<div class="col-md-10">
							<form class="form-horizontal" role="form">
						  <div class="form-group">
							<label for="inputEmail3" class="col-sm-2 control-label custom-chk">Email</label>
							<div class="col-sm-10">
							  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
							</div>
						  </div>
						  <div class="form-group btn-center">
							<div class="col-md-5"></div>
							<div class="col-md-4">
							 <button type="submit" class="btn btn-lg btn-default btn-paswrd">Send Password</button>
							 </div>
							 <div class="col-md-3"></div>
						  </div>
						 </form>
						</div>						
						<div class="col-md-2"></div>												
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
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
