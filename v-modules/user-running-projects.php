<div class="profile_box_outline">
    <div class="profile_box_heading">RUNNING PROJECTS</div>
    <ul class="profile_overview">
        <?php
			$manageContent->getRunningProjectList($_SESSION['user_id']);
		?>
    </ul>
</div>