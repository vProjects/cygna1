<?php
	session_start();
	//include the DAL library to use the model layer methods
	include 'lib-DAL.php';
	
	//include the utility library to get the browser info
	include 'class.utility.php';
	
	//include the utility library to upload the user files
	include 'class.upload_file.php';
	
	//include the DAL library to send the mail
	include 'class.mail.php';
	
	//class for fetching data of ajax request
	class fetchData
	{
		public $manageContent;
		public $manageUtility;
		public $manageFileUploader;
		public $mailSent;
		
		/*
		- method for constructing DAL, Utility, Mail class
		- Auth: Dipanjan
		*/	
		function __construct()
		{
			$this->manageContent = new ManageContent_DAL();
			$this->manageUtility = new utility();
			$this->manageFileUploader = new FileUpload();
			$this->mailSent = new Mail();
		}
		
		/*
		- method for getting member list
		- Auth: Dipanjan
		*/
		function getMemberList($userData)
		{
			if($userData['search_column'] == 'name')
			{
				$member_list = $this->manageContent->getValue_likely("user_info","*","name",$userData['search_value']);
			}
			else if($userData['search_column'] == 'email_id')
			{
				$member_list = $this->manageContent->getValue_likely("user_credentials","*","email_id",$userData['search_value']);
			}
			else if($userData['search_column'] == 'username')
			{
				$member_list = $this->manageContent->getValue_likely("user_credentials","*","username",$userData['search_value']);
			}
			
			//fetching the values to table
			if(!empty($member_list[0]))
			{
				echo '<table class="table table-bordered table-hover">
                        	<thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email Id</th>
                                    <th>Project Posted</th>
                                    <th>Bid On Job</th>
                                    <th>Profile</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>';
							
				foreach($member_list as $member)
				{
					//getting the email id and full name
					$email = $this->manageContent->getValue_where("user_credentials","*","user_id",$member['user_id']);
					$name = $this->manageContent->getValue_where("user_info","*","user_id",$member['user_id']);
					if($email[0]['status'] == 1)
					{
						$action_button = '<a href="functions/memberUpgradation.php?uid='.$member['user_id'].'&action=0"><button class="btn btn-danger">Disable</button></a>';
					}
					else
					{
						$action_button = '<a href="functions/memberUpgradation.php?uid='.$member['user_id'].'&action=1"><button class="btn btn-danger">Disable</button></a>';
					}
					echo '<tr>
							<td>'.$name[0]['name'].'</td>
							<td>'.$email[0]['email_id'].'</td>
							<td><a><button class="btn btn-primary">Project Details</button></a></td>
							<td><a><button class="btn btn-primary">Bid Details</button></a></td>
							<td><a><button class="btn btn-warning">Profile Details</button></a></td>
							<td>'.$action_button.'</td>
						</tr>';
				}
				
				echo '</tbody>
                      </table>';
				
			}
			else
			{
				echo 'No Member Found';
			}
		}
	}
	
	/* receiving data from UI layer Form */
	//making object of class fetchData 
	$fetchData = new fetchData();
	//applying switch case
	switch($GLOBALS['_POST']['refData'])
	{
		//for unique email checking
		case 'getMemberList':
		{
			$member_list = $fetchData->getMemberList($GLOBALS['_POST']);
			break;
		}
		default:
		{
			break;	
		}
	}

?>