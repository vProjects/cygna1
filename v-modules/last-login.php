
<?php
	//check whether there is a get variable or not
	if( count($GLOBALS['_GET']) > 0 )
	{
		if( isset($_GET['bid']) && !empty($_GET['bid']) )
		{
			//use the bll method to get the details
			$manageContent->getLastLogin($_GET['bid']);
			
			
		}
	}
?>