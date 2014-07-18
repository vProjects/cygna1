
<div class="profile_header_nav_outline">
    <div class="container">
        <div class="row profile_nav_row">
            <div class="col-md-12">
            <?php
				//checking cookie value and session value
				if(isset($GLOBALS['_COOKIE']['uid']) || isset($_SESSION['user_id'])){
			?>
                <div class="collapse navbar-collapse" id="profile_header_nav">
                    <ul class="nav navbar-nav header_nav_outline">
                        <li class="header_nav"><a href="cygna.php?op=pro">Cygna</a></li>
                        <li class="header_nav"><a href="profile.php">Profile</a></li>
                        <li class="header_nav"><a href="post_project.php">Post a Job</a></li>
                        <li class="header_nav"><a href="project_list.php">Find Job</a></li>
                        <li class="header_nav"><a href="survey.php">Survey</a></li>
                        <li class="header_nav"><a href="ticket.php">Submit Ticket</a></li>
                        <li class="header_nav"><a href="v-modules/logout.php">Log Out</a></li>
                    </ul>
                </div>
            <?php
				} else {
			?>
            	<div class="collapse navbar-collapse" id="profile_header_nav">
                    <ul class="nav navbar-nav header_nav_outline">
                        <li class="header_nav"><a href="index.php">Home</a></li>
                        <li class="header_nav"><a href="services_products.php">Services</a></li>
                        <li class="header_nav"><a href="hiring_freelancer.php">Hire</a></li>
                        <li class="header_nav"><a href="finding_job.php">Work</a></li>
                        <li class="header_nav"><a href="survey.php">Survey</a></li>
                        <li class="header_nav"><a href="contact_us.php">Contact us</a></li>
                    </ul>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</div>


