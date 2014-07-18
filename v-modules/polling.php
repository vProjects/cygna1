<?php
	//getting the poll set no
	$poll_set = $manageContent->getPollSet($_SESSION['user_id']);
	//echo $poll_set;
	if(!empty($poll_set))
	{
		$manageContent->getPollingDetails($poll_set);
	}

?>
