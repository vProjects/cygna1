<?php
	session_start();
	$pageTitle = 'MyCygna';
	if(!isset($GLOBALS['_COOKIE']['uid']) && !isset($_SESSION['user_id']))
	{
		header("Location: log_in.php");
	}
	include ("v-templates/header.php");
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
    <?php
		if(isset($GLOBALS['_GET']))
		{
			$option = $GLOBALS['_GET']['op'];
		}
	?>

	<div class="container">
    	<div class="row profile_body_row">
        	<!-- body left section starts here -->
        	<div class="col-md-3 profile_left_part_outline">
                <div class="profile_box_outline project_list_leftbar_outline">
                	<div class="profile_box_heading">Quick Links</div>
                    <ul class="profile_overview">
                    	<li><a href="cygna.php?op=job">JobList</a></li>
                        <li><a href="cygna.php?op=pro">ProjectList</a></li>
                        <li><a href="message.php">Message</a></li>
                    </ul>
                </div>
                <?php
					include 'v-modules/user-running-projects.php';
				?>
			<?php
				include ("v-modules/polling.php");
			?>	
			</div>	
			
            <!-- body left section ends here -->
            <!-- body right section starts here -->
           <div class="col-md-8 profile_left_part_outline">
           		<?php
					if(isset($option) && $option == 'job')
					{
						echo '<div class="project_list_heading_bar">
								<span class="pull-left">Job List</span>
								<div class="clearfix"></div>
							</div>';
						
						$manageContent->getUserJobList($_SESSION['user_id']);
						
						echo '<div class="project_list_heading_bar bottom_pagination">
								<div class="clearfix"></div>
							</div>';
					}
					else if(isset($option) && $option == 'pro')
					{
						echo '<div class="project_list_heading_bar">
								<span class="pull-left">Project List</span>
								
								<div class="clearfix"></div>
							</div>
							<div class="profile_box_outline">
                    			<div class="portfolio_details">';
						
						$manageContent->getUserProjectList($_SESSION['user_id']);
							
						echo '</div>
							</div>
							<div class="project_list_heading_bar bottom_pagination">
								<div class="clearfix"></div>
							</div>';
					}
				?>
           
            </div>
            <!-- body right section ends here -->
        </div>
    </div>
</div>
</div>
<!-- body ends here -->
<?php
	include 'v-templates/post-footer.php';
?>
