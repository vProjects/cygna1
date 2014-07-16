<div class="profile_box_outline project_list_leftbar_outline">
	<div class="profile_box_heading">Quick Links</div>
    <ul class="profile_overview">
    	<li><a href="cygna.php?op=job">Running Projects <?php echo "<div class='job-count pull-right'>".$manageContent->getAwardedJobNumber($_SESSION['user_id'],'posted-projects')."</div>";?></a></li>
        <li><a href="cygna.php?op=pro">Posted Projects <?php echo "<div class='job-count pull-right'>".$manageContent->getProposalNumber($_SESSION['user_id'],'posted-projects')."</div>";?></a></li>
    	<li><a href="cygna.php?op=mypro">My Proposals <?php echo "<div class='job-count pull-right'>".$manageContent->getProposalNumber($_SESSION['user_id'],'proposal')."</div>";?></a></li>
    	<li><a href="message-list.php">Inbox <div class='job-count pull-right'><span id="msg_notification_1">0</span></div></a></li>
    </ul>
</div>