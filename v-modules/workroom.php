<?php
	//check the whether the user is employer or contractor
	$is_employer = $manageContent->isEmployer($wid);
?>
<div class="profile_box_outline project_list_leftbar_outline">
   <div class="profile_box_heading">WORKROOM</div>
    <ul class="profile_overview">
        <li><a href="workroom.php?wid=<?php echo $wid; ?>">Message</a></li>
        <li><a href="escrow.php?wid=<?php echo $wid; ?>">Milestones</a></li>
        <li><a href="#">Files</a></li>
        <?php if($is_employer != 1 ){ ?>
        <li><a href="post_bid.php?bid=<?php echo $bid_id ; ?>">My Proposal</a></li>
        <?php } ?>
        <?php if($is_employer == 1 ){ ?>
        <li><a href="userProjectDetails.php?pid=<?php echo $manageContent->getProjectId($wid) ; ?>">Go to My Project</a></li>
        <?php } ?>
        <li><a href="#">Billings & Invoice</a></li>
    </ul>
</div>