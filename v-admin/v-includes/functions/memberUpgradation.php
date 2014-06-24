<?php
	session_start();
	//include the DAL library to use the model layer methods
	include '../lib-DAL.php';
	//creating DAL object
	$manageContent = new ManageContent_DAL();
	
	if(isset($GLOBALS['_POST']))
	{
		$user_id = $GLOBALS['_POST']['uid'];
		$reason = $GLOBALS['_POST']['action_reason'];
		$action = $GLOBALS['_POST']['action'];
		//get the last value of this user in user activation info table
		$getLastValue = $manageContent->getLastValue("user_activation_info","*","user_id",$user_id,"id");
		//get the status of user
		$userStatus = $manageContent->getValue_where("user_credentials","*","user_id",$user_id);
		
		if($userStatus[0]['status'] != $action)
		{
			//get current date and time
			$curDate = date('y-m-d');
			$curTime = date('h:i:s a');
			//update the last row
			$update1 = $manageContent->updateValueWhere("user_activation_info","date_to",$curDate,"id",$getLastValue[0]['id']);
			$update2 = $manageContent->updateValueWhere("user_activation_info","time_to",$curTime,"id",$getLastValue[0]['id']);
			//update the status report of user
			$update3 = $manageContent->updateValueWhere("user_credentials","status",$action,"id",$userStatus[0]['id']);
			//inserting new row
			if($action == 1)
			{
				$action_text = 'Activated';
			}
			else if($action == 0)
			{
				$action_text = 'Deactivated';
			}
			$column_name = array("user_id","date_from","time_from","action","notes");
			$column_value = array($user_id,$curDate,$curTime,$action_text,$reason);
			$insert = $manageContent->insertValue("user_activation_info",$column_name,$column_value);
			
		}
	}
	header("Location: ../../user-list.php");

?>