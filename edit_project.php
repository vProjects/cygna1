<?php
	session_start();
	$pageTitle = 'Edit Project';
	if(!isset($GLOBALS['_COOKIE']['uid']) && !isset($_SESSION['user_id']))
	{
		header("Location: log_in.php");
	}
	include ("v-templates/header.php");
?>
<?php
	if(isset($GLOBALS['_GET']['pid']))
	{
		//checking that this project is posted by this user or not
		$id = $manageContent->getUserIdFromPro($GLOBALS['_GET']['pid']);
		if($_SESSION['user_id'] == $id)
		{
			$pid = $GLOBALS['_GET']['pid'];
		}
		else
		{
			header("Location: cygna.php?op=pro");
		}
	}
	else
	{
		header("Location: cygna.php?op=pro");
	}
	//checking project status
	$proStatus = $manageContent->getProjectStatus($pid);
	if(!empty($proStatus['award_bid_id']))
	{
		$warning = 'Job Is Awarded And Closed!!';
	}
	if($proStatus['status'] == 0)
	{
		$warning = 'Project Is Terminated';
	}
	if(time() >= strtotime($proStatus['ending_date'].' 23:59:59'))
	{
		$warning = 'Job Is Closed!!';
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
    	<!-- warning message row -->
        <?php
			if(isset($warning) && !empty($warning))
			{
				//setting button status
				$form_action = '';
				//printing warning message
				echo '<div class="row profile_body_row">
						<div class="col-md-12">
							<div class="portfolio_details" style="border:1px solid #cdcdcd;">
								<div class="pro_status">'.$warning.'</div>
							</div>
						</div>
					</div>';
			}
			else
			{
				$form_action = 'action="v-includes/class.formData.php"';
			}
		?>
        
    	<div class="row profile_body_row">
        	<!-- body left section starts here -->
        	<div class="col-md-3 profile_left_part_outline">
                <div class="profile_box_outline project_list_leftbar_outline">
                	<div class="profile_box_heading">CATEGORIES</div>
                    <ul class="profile_overview">
                    	<li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                        <li><a href="#">Category Title</a></li>
                    </ul>
                </div>
            </div>
            <!-- body left section ends here -->
            <!-- body middle section starts here -->
            <div class="col-md-7 profile_middle_part_outline">
				<div class="post_project_body_outline">
                    <h2 class="post_project_top_heading">Edit Your Job</h2>
                    <p class="post_project_top_para">Describe the job or list the skills you're looking for.</p>
                    <form <?php echo $form_action; ?> method="post" role="form" enctype="multipart/form-data" class="form-horizontal">
                        <?php
							//gettin project details
							$manageContent->getEditProjectDetails($pid);
						?>
                        <div class="form-group pp_form_group">
                        	<?php if(!isset($warning)){ ?>
                            <input type="hidden" name="pid" value="<?php echo $pid ?>" />
                            <input type="hidden" name="fn" value="<?php echo md5('edit_project'); ?>" />
                            <input type="submit" class="btn btn-success btn-lg" value="UPDATE"/>
                            <?php } ?>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                    <div class="clearfix"></div>
                </div>
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
<!-- body ends here -->
<?php
	include 'v-templates/post-footer.php';
?>
