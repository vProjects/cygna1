<?php
	session_start();
	$pageTitle = 'Survey';
	include ("v-templates/header.php");
?>
<?php
	if(isset($_SESSION['user_id']))
	{
		$user_id = $_SESSION['user_id'];
	}
	else
	{
		$user_id = 'guest';
	}
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
		<div class="col-md-8 col-md-offset-1">
			<h2 class="post_project_top_heading">SURVEY OUR WEBSITE</h2>
		</div>
	</div>

		<div class="row">

			<div class="col-md-8 col-md-offset-1">

				<div class="login-box">
                	<?php
						$survey_stat = $manageContent->getSurveySet($user_id);
						if($survey_stat[0] == 0 || $user_id == 'guest')
						{
					?>
                    
                    <form action="v-includes/class.formData.php" method="post" role="form" class="survey_form">
						 <?php
                            $manageContent->getSurveyQusetions($user_id,$survey_stat[1],'insert');
                         ?>
                         <div class="col-sm-12">
                         	<input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
                         	<input type="hidden" name="fn" value="<?php echo md5('survey_report'); ?>" />
                            <input type="submit" class="btn btn-primary btn-lg center-block" value="SUBMIT" />
                         </div>
                         <div class="clearfix"></div>
                     </form>
					
					<?php
						}
						else
						{
							$manageContent->getSurveyQusetions($user_id,$survey_stat[1],'update');
						}
					?>
                    
                    <?php
						$userSurveyReport = $manageContent->getSurveyFeedback($user_id,$survey_stat[1]);
						if($userSurveyReport == 0 || $user_id == 'guest')
						{
					?>
					<div class="col-sm-12">

                            <div class="col-sm-offset-1 col-sm-9">		

                                    <textarea class="form-control survey_feedback_resize" id="survey_report" rows="2" placeholder=" Your feedback"></textarea>

                            </div>

                            <div class="col-sm-2"><button class="btn btn-info btn-marg btn-lg" id="survey_feddback">Submit</button></div>

						<div class="clearfix"></div>		

					</div>
                    
                    <?php } ?>

					<div class="clearfix"></div>

				</div>

				<div class="clearfix"></div>

			</div>

		

		<!-- sign up box ends here -->

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


