<?php
	//including the bll get data class
	include 'v-includes/BLL.getData.php';
	$manageContent = new BLL_manageData();
	
	if(isset($GLOBALS['_COOKIE']['uid']) && !isset($_SESSION['user_id']))
	{
		$_SESSION['user_id'] = $GLOBALS['_COOKIE']['uid'];
	}
	else if(!isset($GLOBALS['_COOKIE']['uid']) && isset($_SESSION['user_id']))
	{
		//setting cookie value
		$manageContent->createUserCookie($_SESSION['user_id']);
	}
?>
