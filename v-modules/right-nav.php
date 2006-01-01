<div class="profile_box_outline project_list_leftbar_outline">
	<div class="profile_box_heading">Quick Links</div>
    <ul class="profile_overview">
    	<li><a href="cygna.php?op=job">Awarded Jobs (3)</a></li>
        <li><a href="cygna.php?op=pro">Posted Projects (<?php echo $manageContent->getProposalNumber($_SESSION['user_id'],'posted-projects');?>)</a></li>
    	<li><a href="cygna.php?op=mypro">My Proposals (<?php echo $manageContent->getProposalNumber($_SESSION['user_id'],'proposal');?>)</a></li>
    	<li><a href="message-list.php">Inbox (<span id="msg_notification_1">0</span>)</a></li>
    </ul>
</div>