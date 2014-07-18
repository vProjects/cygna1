<!-- body left section starts here -->
<div class="col-md-3 profile_left_part_outline">
    <?php 
		//getting profie images
		$manageContent->getUserImage($_SESSION['user_id'],'pp'); 
	?>
    <div class="profile_box_outline">
        <?php
			//getting hourly rate of user
			$manageContent->getUserHourlyRate($_SESSION['user_id']);
		?>
    </div>
    <div class="profile_box_outline">
        <div class="profile_box_heading">Profile Overview</div>
        <ul class="profile_overview">
            <li><a href="public-profile.php?uid=<?php echo $_SESSION['user_id']; ?>">Public Profile</a></li>
            <li><a href="#">Accounts</a></li>
            <li><a href="#">Resume</a></li>
            <li><a href="#">Portfolio</a></li>
            <li><a href="#">Projects</a></li>
            <li><a href="#">Reviews</a></li>
        </ul>
    </div>
    <div class="profile_box_outline">
        <div class="profile_box_heading">BIDS LEFT</div>
        <div class="hiring_rate">39 Bids / 100 Bids</div>
    </div>
</div>
<!-- body left section ends here -->
<!-- body middle section starts here -->
<div class="col-md-7 profile_middle_part_outline">
    <?php 
		//getting cover images
		$manageContent->getUserImage($_SESSION['user_id'],'cp'); 
	?>
    <div class="profile_box_outline">
		<?php
            //getting cover images
            $manageContent->getUserDescription($_SESSION['user_id']); 
        ?>
    </div>
    <!-- portfolio part start here -->
    <div class="profile_box_outline">
        <div class="profile_box_heading">Portfolio
        	<span class="portfolio_part_share pull-right"><a href="edit_profile.php?op=port">Add</a></span>
        </div>
        <div class="portfolio_details">
           <?php
				//getting cover images
				$manageContent->getUserPortfolio($_SESSION['user_id']); 
			?> 
        </div>
    </div>
    <!-- portfolio part ends here -->
    <!-- my skills part starts here -->
    <div class="profile_box_outline">
        <div class="profile_box_heading">My Skills
        	<span class="portfolio_part_share pull-right"><a href="edit_profile.php?op=pro">Edit</a></span>
        </div>
        <div class="myskills_details">
             <?php
				//getting cover images
				$manageContent->getUserSkills($_SESSION['user_id']); 
			?>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- my skills part ends here -->
    <!-- employment details starts here -->
    <div class="profile_box_outline">
        <div class="profile_box_heading">Employment Details
        	<span class="portfolio_part_share pull-right"><a href="edit_profile.php?op=emp">Add</a></span>
        </div>
        <div class="portfolio_details">
            
            <div class="table-responsive">
            	<table class="table table-bordered table-hover">
                	<?php
						//getting cover images
						$manageContent->getUserEmployementList($_SESSION['user_id']); 
					?>
                </table>
            </div>
            
        </div>
    </div>
    <!-- employment details ends here -->
    <!-- education details starts here -->
    <div class="profile_box_outline">
        <div class="profile_box_heading">Education Details
        	<span class="portfolio_part_share pull-right"><a href="edit_profile.php?op=edu">Add</a></span>
        </div>
        <div class="portfolio_details">
            
            <div class="table-responsive">
            	<table class="table table-bordered table-hover">
                	<?php
						//getting cover images
						$manageContent->getUserEducationList($_SESSION['user_id']); 
					?>
                </table>
            </div>
            
        </div>
    </div>
    <!-- education details ends here -->
</div>
<!-- body middle section ends here -->