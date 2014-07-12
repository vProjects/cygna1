<?php
	session_start();
	//include the DAL library to use the model layer methods
	include 'class.DAL.php';
	
	//include the utility library to get the browser info
	include 'class.utility.php';
	
	//include the utility library to upload the user files
	include 'class.upload_file.php';
	
	//include the DAL library to send the mail
	include 'class.mail.php';
	
	//form data class starts here
	class formData
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
		- method for sign up the new uesr
		- Auth: Dipanjan
		*/
		function userSignUp($userData)
		{
			//creating the unique user id
			$user_id = uniqid('user');
			//getting last sign in ip
			$last_sign_in_ip = $this->manageUtility->getIpAddress();
			//setting the status value
			$status = 1;
			//inserting values to database
			$column_name = array('user_id','email_id','username','password','category','sign_in_count','last_sign_in_ip','status');
			$column_value = array($user_id,$userData['email_id'],$userData['username'],md5($userData['password']),$userData['category'],1,$last_sign_in_ip,$status);
			//calling DAL methode
			$insertValue = $this->manageContent->insertValue('user_credentials',$column_name,$column_value);
			if($insertValue == 1)
			{
				//set cookie value
				$cookie_exp_time = time() + (24*3600);
				$set_cookie = $this->createCookie('uid',$user_id,$cookie_exp_time);
			}
			//getting current date and time
			$curDate = $this->getCurrentDate();
			$curTime = $this->getCurrentTime();
			$action_value = 'Activated';
			$notes = 'User Registration';
			//inserting values to user_activation_info table
			$column_name2 = array("user_id","date_from","time_from","action","notes");
			$column_value2 = array($user_id,$curDate,$curTime,$action_value,$notes);
			$insertValue2 = $this->manageContent->insertValue('user_activation_info',$column_name2,$column_value2);
			return array($insertValue,$user_id);
		}
		
		/*
		- method for login the user
		- Auth: Dipanjan
		*/
		function userLogin($userData)
		{
			//at first we are checking that the input value is username or email id
			$presenceChar = strpos($userData['username'],'@');
			if(empty($presenceChar))
			{
				$column_name = 'username';
			}
			else
			{
				$column_name = 'email_id';
			}
			//getting the password from database
			$userCreden = $this->manageContent->getValue_where('user_credentials','*',$column_name,$userData['username']);
			if(!empty($userCreden[0]))
			{
				//checking for password field
				if($userCreden[0]['password'] == md5($userData['password']))
				{
					if($userCreden[0]['status'] == 1)
					{
						//setting cookie expiry time
						if($userData['loggedin_time'] == 'on')
						{
							$cookie_exp_time = time() + (2*7*24*3600);
						}
						else
						{
							$cookie_exp_time = time() + (24*3600);
						}
						//creating the cookie
						$set_cookie = $this->createCookie('uid',$userCreden[0]['user_id'],$cookie_exp_time);
						//calculating total number of sign in
						$sign_in = $userCreden[0]['sign_in_count'] + 1;
						//getting last sign in ip
						$last_sign_in_ip = $this->manageUtility->getIpAddress();
						//updating the values
						$update1 = $this->manageContent->updateValueWhere("user_credentials","sign_in_count",$sign_in,"user_id",$userCreden[0]['user_id']);
						$update2 = $this->manageContent->updateValueWhere("user_credentials","last_sign_in_ip",$last_sign_in_ip,"user_id",$userCreden[0]['user_id']);
						$update1 = $this->manageContent->updateValueWhere("user_credentials","date",date("Y-m-d g:i:s"),"user_id",$userCreden[0]['user_id']);
						return array(1,'Login Successfull!!',$userCreden[0]['user_id'],$userCreden[0]['category']);
					}
					else
					{
						return array(0,'You Have Been Deactivated By Admin.. Please Contact To The Admin!!');
					}
				}
				else
				{
					return array(0,'Username or Password Is Incorrect!!');
				}
			}
			else
			{
				return array(0,'Username or Password Is Incorrect!!');
			}
			
		}
		
		/*
		- method for insert personal info
		- Auth: Dipanjan
		*/
		function insertPersonalInfo($user_id,$userData)
		{
			//setting user full name
			$name = $userData['f_name']." ".$userData['l_name'];
			//profile creation date
			$profile_creation_date = $this->getCurrentDate();
			//last updation date
			$last_updation_date = $this->getCurrentDate();
			//column name for insertion
			$column_name = array("user_id","name","gender","dob","contact_no","addr_line1","addr_line2","pincode","city","state","country","profile_creation_date","last_upgradation_date");
			//column value for insertion
			$column_value = array($user_id,$name,$userData['gender'],$userData['dob'],$userData['contact'],$userData['add1'],$userData['add2'],$userData['pin'],$userData['city'],$userData['state'],$userData['country'],$profile_creation_date,$last_updation_date);
			//insert the values to user info table
			$insert = $this->manageContent->insertValue("user_info",$column_name,$column_value);
			return $insert;
		}
		
		/*
		- method for update personal info
		- Auth: Dipanjan
		*/
		function updatePersonalInfo($user_id,$userData)
		{
			//getting id of given user id
			$idRow = $this->manageContent->getValue_where("user_info","*","user_id",$user_id);
			$id = $idRow[0]['id'];
			//updating the values
			if(isset($userData['name']) && !empty($userData['name']))
			{
				$upd = $this->manageContent->updateValueWhere("user_info","name",$userData['name'],"id",$id);
			}
			
			if(isset($userData['gender']) && !empty($userData['gender']))
			{
				$upd = $this->manageContent->updateValueWhere("user_info","gender",$userData['gender'],"id",$id);
			}
			
			if(isset($userData['dob']) && !empty($userData['dob']))
			{
				$upd = $this->manageContent->updateValueWhere("user_info","dob",$userData['dob'],"id",$id);
			}
			
			if(isset($userData['contact']) && !empty($userData['contact']))
			{
				$upd = $this->manageContent->updateValueWhere("user_info","contact_no",$userData['contact'],"id",$id);
			}
			
			if(isset($userData['add1']) && !empty($userData['add1']))
			{
				$upd = $this->manageContent->updateValueWhere("user_info","addr_line1",$userData['add1'],"id",$id);
			}
			
			if(isset($userData['add2']))
			{
				$upd = $this->manageContent->updateValueWhere("user_info","addr_line2",$userData['add2'],"id",$id);
			}
			
			if(isset($userData['pin']) && !empty($userData['pin']))
			{
				$upd = $this->manageContent->updateValueWhere("user_info","pincode",$userData['pin'],"id",$id);
			}
			
			if(isset($userData['city']) && !empty($userData['city']))
			{
				$upd = $this->manageContent->updateValueWhere("user_info","city",$userData['city'],"id",$id);
			}
			
			if(isset($userData['state']) && !empty($userData['state']))
			{
				$upd = $this->manageContent->updateValueWhere("user_info","state",$userData['state'],"id",$id);
			}
			
			if(isset($userData['country']) && !empty($userData['country']))
			{
				$upd = $this->manageContent->updateValueWhere("user_info","country",$userData['country'],"id",$id);
			}
		}
		
		/*
		- method for insert user image info
		- Auth: Dipanjan
		*/
		function insertUserImage($user_id,$userData,$userFile)
		{
			
			//uploading profile pic
			if(!empty($userFile['pro_pic']['name']))
			{
				if(empty($userFile['pro_pic']['size']))
				{
					$upload_error1 = 'Profile Image Size Exceeds Limit';
				}
				else
				{
					//image desired name
					$pro_desired_name = md5('pro'.$user_id);
					$pro_pic = $this->manageFileUploader->upload_file($pro_desired_name,$userFile['pro_pic'],'../files/pro-image/');
					$pro_pic_file = 'files/pro-image/'.$pro_pic;
					//updating the value in database
					$update_pro_image = $this->manageContent->updateValueWhere("user_info","profile_image",$pro_pic_file,"user_id",$user_id);
				}	
			}
			
			
			//uploading cover pic
			if(!empty($userFile['cov_pic']['name']))
			{
				if(empty($userFile['cov_pic']['size']))
				{
					$upload_error2 = 'Cover Image Size Exceeds Limit';
				}
				else
				{
					//image desired name
					$cov_desired_name = md5('cov'.$user_id);
					$cov_pic = $this->manageFileUploader->upload_file($cov_desired_name,$userFile['cov_pic'],'../files/cov-image/');
					$cov_pic_file = 'files/cov-image/'.$cov_pic;
					//updating the value in database
					$update_cov_image = $this->manageContent->updateValueWhere("user_info","cover_image",$cov_pic_file,"user_id",$user_id);
				}	
			}
			
			if(isset($upload_error1) && isset($upload_error2))
			{
				return array(0,$upload_error1." & ".$upload_error2);
			}
			elseif(isset($upload_error1) && !isset($upload_error2))
			{
				return array(0,$upload_error1." & Cover image Uploaded");
			}
			elseif(!isset($upload_error1) && isset($upload_error2))
			{
				return array(0,$upload_error2." & Profile image Uploaded");
			}
			elseif(!isset($upload_error1) && !isset($upload_error2))
			{
				return array(1,"Profile image & Cover image Uploaded");
			}
		}
		
		/*
		- method for inserting profile info
		- Auth: Dipanjan
		*/
		function insertUserProfileInfo($user_id,$userData)
		{
			//getting the skills that user have
			//varriable which will contain the skills in string format
			$skills_string = ""; 
			
			if(!empty($userData['skills']))
			{
				$skills = $userData['skills'];
				//convert array to string seperated by commas
				foreach($skills as $skill)
				{
					$skills_string = $skills_string.",".$skill;
				}
				/*
				- remove the first word from the $skills_string sa it
				- it contains a comma
				*/
				
				$skills_string = substr($skills_string,1);
				//update skills section
				$update_skills = $this->manageContent->updateValueWhere("user_info","skills",$skills_string,"user_id",$user_id);
			}
			
			if(isset($userData['hourly_rate']))
			{
				$update_hour_rate = $this->manageContent->updateValueWhere("user_info","hourly_rate",$userData['hourly_rate'],"user_id",$user_id);
			}
			
			if(isset($userData['terms']))
			{
				$update_terms = $this->manageContent->updateValueWhere("user_info","terms",$userData['terms'],"user_id",$user_id);
			}
			
			if(isset($userData['availability']))
			{
				$update_aval = $this->manageContent->updateValueWhere("user_info","availability",$userData['availability'],"user_id",$user_id);
			}
			
			if(isset($userData['certi']))
			{
				$update_aval = $this->manageContent->updateValueWhere("user_info","no_certificates",$userData['certi'],"user_id",$user_id);
			}
			
			if(isset($userData['int_topic']))
			{
				$update_topic = $this->manageContent->updateValueWhere("user_info","interested_topic",$userData['int_topic'],"user_id",$user_id);
			}
			
			if(isset($userData['description']))
			{
				$update_des = $this->manageContent->updateValueWhere("user_info","description",$userData['description'],"user_id",$user_id);
			}
			
			if($update_skills == 1 || $update_hour_rate == 1 || $update_terms == 1 || $update_aval == 1 || $update_topic == 1 || $update_des == 1)
			{
				return array(1,'Update Successfull!!');
			}
			else
			{
				return array(0,'Update Unsuccessfull!!');
			}
			
		}
		
		/*
		- method for inserting user portfolio
		- Auth: Dipanjan
		*/
		function insertUserPortfolio($user_id,$userData,$userFile)
		{
			//storing total no of portfolio
			$total_port = $userData['total_elem'];
			//getting date
			$curdate = $this->getCurrentDate();
			//using for loop inserting each data
			for($i=1;$i<=$total_port;$i++)
			{
				//checking for empty value
				if(!empty($userFile['file'.$i]['name']) || !empty($userData['skills'.$i]) || !empty($userData['des'.$i]))
				{
					//uploading the image
					if(!empty($userFile['file'.$i]['name']) && !empty($userFile['file'.$i]['size']))
					{
						//image desired name
						$port_desired_name = $user_id.'port'.$i;
						$port_pic = $this->manageFileUploader->upload_file($port_desired_name,$userFile['file'.$i],'../files/portfolio/');
						$port_pic_file = 'files/portfolio/'.$port_pic;
					}
					else
					{
						$port_pic_file = '';
					}
					
					//setting status
					$status = 1;
					//creating column name and column array
					$column_name = array("user_id","file","skills","description","upload_date","status");
					$column_value = array($user_id,$port_pic_file,$userData['skills'.$i],$userData['des'.$i],$curdate,$status);
					
					//inserting the values to database
					$insert = $this->manageContent->insertValue("user_portfolio",$column_name,$column_value);
				}
			}
			return $insert;
		}
		
		/*
		- method for updating user portfolio
		- Auth: Dipanjan
		*/
		function updateUserPortfolio($user_id,$userData,$userFile)
		{
			//getting the values from database
			$port_details = $this->manageContent->getValueMultipleCondtn("user_portfolio","*",array("id","user_id"),array($userData['portid'],$user_id));
			if(!empty($port_details[0]))
			{
				$port_id = $userData['portid'];
				//uploading the image
				if(!empty($userFile['file']['name']) && !empty($userFile['file']['size']))
				{
					//image desired name.
					$dot_pos = strrpos($port_details[0]['file'],'.');
					$substring_range = (($dot_pos)-(strrpos($port_details[0]['file'],'/')+1));
					$port_desired_name = substr($port_details[0]['file'],(strrpos($port_details[0]['file'],'/')+1),$substring_range);
					
					$port_pic = $this->manageFileUploader->upload_file($port_desired_name,$userFile['file'],'../files/portfolio/');
					$port_pic_file = 'files/portfolio/'.$port_pic;
					$upd1 = $this->manageContent->updateValueWhere("user_portfolio","file",$port_pic_file,"id",$port_id);
				}
				
				if(isset($userData['skills']) && !empty($userData['skills']))
				{
					$upd2 = $this->manageContent->updateValueWhere("user_portfolio","skills",$userData['skills'],"id",$port_id);
				}
				
				if(isset($userData['des']) && !empty($userData['des']))
				{
					$upd3 = $this->manageContent->updateValueWhere("user_portfolio","description",$userData['des'],"id",$port_id);
				}
				if(!empty($port_pic) || $upd2 == 1 || $upd3 == 1)
				{
					return 1;
				}
				else
				{
					return 0;
				}
			}
				
		}
		
		/*
		- method for inserting user employment
		- Auth: Dipanjan
		*/
		function insertUserEmployment($user_id,$userData)
		{
			//storing total no of portfolio
			$total_port = $userData['total_elem'];
			//getting date
			$curdate = $this->getCurrentDate();
			//using for loop inserting each data
			for($i=1;$i<=$total_port;$i++)
			{
				//checking for empty value
				if(!empty($userData['comp'.$i]) || !empty($userData['pos'.$i]) || !empty($userData['start'.$i]) || !empty($userData['end'.$i]) || !empty($userData['des'.$i]))
				{
					//setting status
					$status = 1;
					//creating column name and column array
					$column_name = array("user_id","com_name","position","start_date","end_date","description","last_update","status");
					$column_value = array($user_id,$userData['comp'.$i],$userData['pos'.$i],$userData['start'.$i],$userData['end'.$i],$userData['des'.$i],$curdate,$status);
					
					//inserting the values to database
					$insert = $this->manageContent->insertValue("user_employment",$column_name,$column_value);
				}
			}
			return $insert;
		}
		
		/*
		- method for updating user employment
		- Auth: Dipanjan
		*/
		function updateUserEmployment($user_id,$userData)
		{
			//getting the values from database
			$emp_details = $this->manageContent->getValueMultipleCondtn("user_employment","*",array("id","user_id"),array($userData['empid'],$user_id));
			if(!empty($emp_details[0]))
			{
				$emp_id = $userData['empid'];
				if(isset($userData['comp']) && !empty($userData['comp']))
				{
					$upd1 = $this->manageContent->updateValueWhere("user_employment","com_name",$userData['comp'],"id",$emp_id);
				}
				
				if(isset($userData['pos']) && !empty($userData['pos']))
				{
					$upd2 = $this->manageContent->updateValueWhere("user_employment","position",$userData['pos'],"id",$emp_id);
				}
				
				if(isset($userData['start']) && !empty($userData['start']))
				{
					$upd3 = $this->manageContent->updateValueWhere("user_employment","start_date",$userData['start'],"id",$emp_id);
				}
				
				if(isset($userData['end']) && !empty($userData['end']))
				{
					$upd4 = $this->manageContent->updateValueWhere("user_employment","end_date",$userData['end'],"id",$emp_id);
				}
				
				if(isset($userData['des']) && !empty($userData['des']))
				{
					$upd5 = $this->manageContent->updateValueWhere("user_employment","description",$userData['des'],"id",$emp_id);
				}
				if($upd1 == 1 || $upd2 == 1 || $upd3 == 1 || $upd4 == 1 || $upd5 == 1)
				{
					$upd_date = $this->manageContent->updateValueWhere("user_employment","last_update",$this->getCurrentDate(),"id",$edu_id);
					return 1;
				}
				else
				{
					return 0;
				}
				
			}
		}
		
		/*
		- method for inserting user education
		- Auth: Dipanjan
		*/
		function insertUserEducation($user_id,$userData)
		{
			//storing total no of portfolio
			$total_port = $userData['total_elem'];
			//getting date
			$curdate = $this->getCurrentDate();
			//using for loop inserting each data
			for($i=1;$i<=$total_port;$i++)
			{
				//checking for empty value
				if(!empty($userData['inst'.$i]) || !empty($userData['deg'.$i]) || !empty($userData['start'.$i]) || !empty($userData['end'.$i]) || !empty($userData['des'.$i]))
				{
					//setting status
					$status = 1;
					//creating column name and column array
					$column_name = array("user_id","inst_name","degree","start_date","end_date","description","last_update","status");
					$column_value = array($user_id,$userData['inst'.$i],$userData['deg'.$i],$userData['start'.$i],$userData['end'.$i],$userData['des'.$i],$curdate,$status);
					
					//inserting the values to database
					$insert = $this->manageContent->insertValue("user_education",$column_name,$column_value);
				}
			}
			return $insert;
		}
		
		/*
		- method for updating user education
		- Auth: Dipanjan
		*/
		function updateUserEducation($user_id,$userData)
		{
			//getting the values from database
			$edu_details = $this->manageContent->getValueMultipleCondtn("user_education","*",array("id","user_id"),array($userData['eduid'],$user_id));
			if(!empty($edu_details[0]))
			{
				$edu_id = $userData['eduid'];
				if(isset($userData['inst']) && !empty($userData['inst']))
				{
					$upd1 = $this->manageContent->updateValueWhere("user_education","inst_name",$userData['inst'],"id",$edu_id);
				}
				
				if(isset($userData['deg']) && !empty($userData['deg']))
				{
					$upd2 = $this->manageContent->updateValueWhere("user_education","degree",$userData['deg'],"id",$edu_id);
				}
				
				if(isset($userData['start']) && !empty($userData['start']))
				{
					$upd3 = $this->manageContent->updateValueWhere("user_education","start_date",$userData['start'],"id",$edu_id);
				}
				
				if(isset($userData['end']) && !empty($userData['end']))
				{
					$upd4 = $this->manageContent->updateValueWhere("user_education","end_date",$userData['end'],"id",$edu_id);
				}
				
				if(isset($userData['des']) && !empty($userData['des']))
				{
					$upd5 = $this->manageContent->updateValueWhere("user_education","description",$userData['des'],"id",$edu_id);
				}
				if($upd1 == 1 || $upd2 == 1 || $upd3 == 1 || $upd4 == 1 || $upd5 == 1)
				{
					$upd_date = $this->manageContent->updateValueWhere("user_education","last_update",$this->getCurrentDate(),"id",$edu_id);
					return 1;
				}
				else
				{
					return 0;
				}
			}
		}
		
		/*
		- method for inserting project details value
		- Auth: Dipanjan
		*/
		function insertProjectInfo($user_id,$userData,$userFile)
		{
			//creating project id
			$project_id = uniqid('pro');
			//varriable which will contain the skills in string format
			$skills_string = ""; 
			
			if(!empty($userData['skills']))
			{
				$skills = $userData['skills'];
				//convert array to string seperated by commas
				foreach($skills as $skill)
				{
					$skills_string = $skills_string.",".$skill;
				}
				/*
				- remove the first word from the $skills_string sa it
				- it contains a comma
				*/
				
				$skills_string = substr($skills_string,1);
			}
			
			//uploading project pic
			if(!empty($userFile['file']['name']) && !empty($userFile['file']['size']))
			{
				$original_file = $userFile['file']['name'];
				//get unix timestamp
				$unixTimeStamp = time();
				//image desired name
				$project_file_name = md5($project_id.$unixTimeStamp);
				$pro_pic = $this->manageFileUploader->upload_document_file($project_file_name,$userFile['file'],'../files/project/');
				$project_file = 'files/project/'.$pro_pic;	
			}
			else
			{
				$original_file = '';
				$project_file = '';
			}
			//getting current date and time
			$curDate = $this->getCurrentDate();
			$curTime = $this->getCurrentTime();
			//getting work type
			$work_type = $userData['pp_work_type'];
			//getting price range
			if($work_type == 'Hourly')
			{
				if($userData['hourly_rate'] != 'custom_price_hourly')
				{
					$price_range = $userData['hourly_rate'];
				}
				else
				{
					if(!empty($userData['hourly_custom_min']) && !empty($userData['hourly_custom_max']))
					{
						$price_range = '$'.$userData['hourly_custom_min'].'/hr to $'.$userData['hourly_custom_max'].'/hr';
					}
					else
					{
						$price_range = '';
					}
				}
				//getting hours work type other values
				if(!empty($userData['hours_of_week']))
				{
					$hours_of_week = $userData['hours_of_week'];
				}
				else
				{
					$hours_of_week = '';
				}
				
				if(!empty($userData['hourly_time_range']))
				{
					$hourly_time_range = $userData['hourly_time_range'];
				}
				else
				{
					$hourly_time_range = '';
				}
			}
			else if($work_type == 'Fixed')
			{
				if($userData['fixed_rate'] != 'custom_price_fixed')
				{
					$price_range = $userData['fixed_rate'];
				}
				else
				{
					if(!empty($userData['fixed_custom_min']) && !empty($userData['fixed_custom_max']))
					{
						$price_range = '$'.$userData['fixed_custom_min'].' to $'.$userData['fixed_custom_max'];
					}
					else
					{
						$price_range = '';
					}
				}
			}
			
			//getting ip of job posted
			$ip = $this->manageUtility->getIpAddress();
			//job ending date
			$project_valid_time = $userData['pp_project_validity'];
			$job_ending_date = date('Y-m-d', strtotime($curDate." + ".$project_valid_time));
			//setting preferred location
			if(!empty($userData['pp_prefer_loc']))
			{
				$preffered_loc = $userData['pp_prefer_loc'];
			}
			else
			{
				$preffered_loc = 'Any Where';
			}
			//setting status value
			$status = 1;
			
			//inserting the values to database
			$column_name = array("project_id","title","description","user_id","category","sub_category","skills","file_or","file","date","time","work_type","price_range","hour_per_week","hourly_time_frame","job_post_ip","ending_date","preferred_locations","status");
			
			$column_value = array($project_id,$userData['pp_title'],$userData['pp_des'],$user_id,$userData['pro_category'],$userData['pro_sub_category'],$skills_string,$original_file,$project_file,$curDate,$curTime,$work_type,$price_range,$hours_of_week,$hourly_time_range,$ip,$job_ending_date,$preffered_loc,$status);
			
			$insertProjectValue = $this->manageContent->insertValue("project_info",$column_name,$column_value);
			
			return $insertProjectValue;
			
		}
		
		/*
		- method for editing project details value
		- Auth: Dipanjan
		*/
		function editProjectInfo($userData,$userFile)
		{
			$project_id = $userData['pid'];
			//getting values of project
			$proDetails = $this->manageContent->getValue_where('project_info','*','project_id',$project_id);
			if(!empty($proDetails[0]))
			{
				if(isset($userData['pp_title']) && !empty($userData['pp_title']))
				{
					$upd = $this->manageContent->updateValueWhere('project_info','title',$userData['pp_title'],'project_id',$project_id);
				}
				
				if(isset($userData['pp_des']) && !empty($userData['pp_des']))
				{
					$upd = $this->manageContent->updateValueWhere('project_info','description',$userData['pp_des'],'project_id',$project_id);
				}
				
				if(isset($userData['pro_category']) && !empty($userData['pro_category']))
				{
					$upd = $this->manageContent->updateValueWhere('project_info','category',$userData['pro_category'],'project_id',$project_id);
				}
				
				if(isset($userData['pro_sub_category']) && !empty($userData['pro_sub_category']))
				{
					$upd = $this->manageContent->updateValueWhere('project_info','sub_category',$_POST['pro_sub_category'],'project_id',$project_id);
				}
				
				if(!empty($userFile['file']['name']) && !empty($userFile['file']['size']))
				{
					$original_file = $userFile['file']['name'];
					//get unix timestamp
					$unixTimeStamp = time();
					//image desired name
					$project_file_name = md5($project_id.$unixTimeStamp);
					$pro_pic = $this->manageFileUploader->upload_document_file($project_file_name,$userFile['file'],'../files/project/');
					$project_file = 'files/project/'.$pro_pic;
					//update values to database
					$upd = $this->manageContent->updateValueWhere('project_info','file_or',$original_file,'project_id',$project_id);
					$upd = $this->manageContent->updateValueWhere('project_info','file',$project_file,'project_id',$project_id);	
				}
				
				if(!empty($userData['skills']))
				{
					//varriable which will contain the skills in string format
					$skills_string = ""; 
					$skills = $userData['skills'];
					//convert array to string seperated by commas
					foreach($skills as $skill)
					{
						$skills_string = $skills_string.",".$skill;
					}
					/*
					- remove the first word from the $skills_string sa it
					- it contains a comma
					*/
					$skills_string = substr($skills_string,1);
					//update value to database
					$upd = $this->manageContent->updateValueWhere('project_info','skills',$skills_string,'project_id',$project_id);
				}
				
				if(isset($userData['pp_prefer_loc']))
				{
					if(empty($userData['pp_prefer_loc']))
					{
						$pref_loc = 'Any Where'; 
					}
					else
					{
						$pref_loc = $userData['pp_prefer_loc'];
					}
					$upd = $this->manageContent->updateValueWhere('project_info','preferred_locations',$pref_loc,'project_id',$project_id);
				}
				
				if(isset($userData['pp_project_validity']) && !empty($userData['pp_project_validity']))
				{
					$start_date = new DateTime($proDetails[0]['date']);
					$end_date = new DateTime($userData['pp_project_validity']);
					$interval = $start_date->diff($end_date);
					$int_day =  $interval->format('%a');
					if($int_day < 90)
					{
						$upd = $this->manageContent->updateValueWhere('project_info','ending_date',$userData['pp_project_validity'],'project_id',$project_id);
					}
				}
					
			}
		}
		
		/*
		- method for survey report submit
		- Auth: Dipanjan
		*/
		function submitSurveyReport($user_id,$userData)
		{
			//getting the active survey set no
			$active_set = $this->manageContent->getValue_where("survey_info","*","status",1);
			$survey_set_no = $active_set[0]['set_no'];
			//getting the questions which are answered
			foreach($userData as $key=>$value)
			{
				if(substr($key,0,1) == 'q')
				{
					$question_no = substr($key,1);
					//getting values of user id of that answer
					$ans_user = $this->manageContent->getValueMultipleCondtn("survey_info","*",array("set_no","question_no","answer_no"),array($survey_set_no,$question_no,$value));
					$user_field = $ans_user[0]['user_id'];
					if(empty($user_field))
					{
						$new_user_field = $user_id;
					}
					else
					{
						$new_user_field = $ans_user[0]['user_id'].','.$user_id;
					}
					//updating the value
					$update = $this->manageContent->updateValueWhere("survey_info","user_id",$new_user_field,"id",$ans_user[0]['id']);
				}
			}
			return $update;
		}
		
		/*
		- method for inserting a bid
		- Auth: Dipanjan
		*/
		function insertProjectBid($user_id,$userData,$userFile)
		{
			//checking that project is open or not
			$project_values = $this->manageContent->getValue_where("project_info","*","project_id",$userData['pid']);
			if(empty($project_values[0]['award_bid_id']) && time() <= strtotime($project_values[0]['ending_date'].' 23:59:59'))
			{
				//getting user info
				$userInfo = $this->manageContent->getValue_where("user_info","*","user_id",$user_id);
				if(!empty($userInfo[0]))
				{
					//create bid id
					$bid_id = uniqid('bid');
					//uploading bid attachement file
					if(!empty($userFile['file']['name']) && !empty($userFile['file']['size']))
					{
						$original_file = $userFile['file']['name'];
						//get unix timestamp
						$unixTimeStamp = time();
						//image desired name
						$bid_file_name = md5($bid_id.$unixTimeStamp);
						$bid_pic = $this->manageFileUploader->upload_document_file($bid_file_name,$userFile['file'],'../files/project/');
						$bid_file = 'files/project/'.$bid_pic;	
					}
					else
					{
						$original_file = '';
						$bid_file = '';
					}
					//get bid amount and currency
					$bid_amount = intval($userData['bid_price']);
					$currency = '$';
					//getting date, time, ip of bid post
					$curDate = $this->getCurrentDate();
					$curTime = $this->getCurrentTime();
					$ip = $this->manageUtility->getIpAddress();
					//setting status = 1
					$status = 1;
					//inserting the value to table
					$column_name = array("bid_id","project_id","user_id","description","original_file","file","currency","amount","time_range","date","time","ip","status");
					$column_value = array($bid_id,$userData['pid'],$user_id,$userData['bid_pro'],$original_file,$bid_file,$currency,$bid_amount,$userData['time_range'],$curDate,$curTime,$ip,$status);
					$insert = $this->manageContent->insertValue("bid_info",$column_name,$column_value);
					//increasing total no of bids in project info table
					if($insert == 1)
					{
						//increment the value by 1
						$increamentValue = $this->manageContent->increamentValue("project_info","total_bids",1,"project_id",$userData['pid']);
					}
					return $insert;
				}
				else
				{
					return 'You Have To Fill Up Your Personal Information, Then Only You Are Eligible To Place A Bid!!';
				}
					
			}
			else
			{
				return 'Job Is Closed. You Can Not Place Bid!!';
			}
			
		}
		
		/*
		- method for updating the bid
		- Auth: Dipanjan
		*/
		function updateUserBid($user_id,$userData,$userFile)
		{
			//get the id number of this bid
			$id_nmbr = $this->manageContent->getValue_where("bid_info","*","bid_id",$userData['bid']);
			//checking that project is open or not
			$project_values = $this->manageContent->getValue_where("project_info","*","project_id",$id_nmbr[0]['project_id']);
			if(empty($project_values[0]['award_bid_id']) && time() <= strtotime($project_values[0]['ending_date'].' 23:59:59'))
			{
				$id = $id_nmbr[0]['id'];
				if(!empty($userFile['file']['name']) && !empty($userFile['file']['size']))
				{
					$original_file = $userFile['file']['name'];
					//get unix timestamp
					$unixTimeStamp = time();
					//image desired name
					$bid_file_name = md5($userData['bid'].$unixTimeStamp);
					$bid_pic = $this->manageFileUploader->upload_document_file($bid_file_name,$userFile['file'],'../files/project/');
					$bid_file = 'files/project/'.$bid_pic;
					//updating the file
					$update_orfile = $this->manageContent->updateValueWhere("bid_info","original_file",$original_file,"id",$id);
					$update_file = $this->manageContent->updateValueWhere("bid_info","file",$bid_file,"id",$id);
				}
				
				//update the other field
				if(isset($userData['bid_pro']))
				{
					$updte_des1 = $this->manageContent->updateValueWhere("bid_info","description",$userData['bid_pro'],"id",$id);
				}
				
				if(isset($userData['bid_price']))
				{
					$updte_des2 = $this->manageContent->updateValueWhere("bid_info","amount",$userData['bid_price'],"id",$id);
				}
				
				if(isset($userData['bid_price']))
				{
					$updte_des3 = $this->manageContent->updateValueWhere("bid_info","amount",$userData['bid_price'],"id",$id);
				}
				
				if(isset($userData['time_range']))
				{
					$updte_des4 = $this->manageContent->updateValueWhere("bid_info","time_range",$userData['time_range'],"id",$id);
				}
				if($update_orfile == 1 || $update_file == 1 || $updte_des1 == 1 || $updte_des2 == 1 || $updte_des3 == 1 || $updte_des4 == 1)
				{
					return 1;
				}
				else
				{
					return 0;
				}
			}
			else
			{
				return 'Job Is Closed. You Can Not Modify Your Bid!!';
			}
				
		}
		
		/*
		- method for sending contact query
		- Auth: Dipanjan
		*/
		function userContactQuery($userData)
		{
			//creating request id
			$rid = uniqid('r');
			//getting date and time
			$curdate = $this->getCurrentDate();
			$curtime = $this->getCurrentTime();
			//getting request ip
			$request_ip = $this->manageUtility->getIpAddress();
			//setting column name
			$column_name = array('request_id','name','phn_no','email','title','subject','message','request_ip','date','time');
			$column_value = array($rid,$userData['name'],$userData['phn'],$userData['email'],$userData['title'],$userData['subject'],$userData['msg'],$request_ip,$curdate,$curtime);
			//inserting values to database
			$insert = $this->manageContent->insertValue("contact_us",$column_name,$column_value);
			return $insert;
		}
		
		/*
		- method for sending ticket query
		- Auth: Dipanjan
		*/
		function userTicketQuery($user_id,$userData)
		{
			//creating ticket id
			$tid = uniqid('t');
			//getting date and time
			$curdate = $this->getCurrentDate();
			$curtime = $this->getCurrentTime();
			//getting request ip
			$ticket_ip = $this->manageUtility->getIpAddress();
			//setting column name
			$column_name = array('ticket_id','user_id','title','subject','message','ticket_ip','date','time');
			$column_value = array($tid,$user_id,$userData['title'],$userData['subject'],$userData['msg'],$ticket_ip,$curdate,$curtime);
			//inserting values to database
			$insert = $this->manageContent->insertValue("submit_ticket",$column_name,$column_value);
			return $insert;
		}
		
		/*
		- method for setting cookie
		- Auth: Dipanjan
		*/
		function createCookie($cookie_name,$cookie_value,$exp_time)
		{
			//creating the cookie
			$path = '/';
			setcookie($cookie_name,$cookie_value,$exp_time,$path);
		}
		
		/*
		- method for getting current date
		- Auth: Dipanjan
		*/
		function getCurrentDate()
		{
			$date = date('y-m-d');
			return $date;
		}
		
		/*
		- method for getting current time
		- Auth: Dipanjan
		*/
		function getCurrentTime()
		{
			$time = date('h:i:s a');
			return $time;
		}
		
	}
	
	
	
	
	/* getting data from UI layer form */
	//creating object of form data class
	$formData = new formData();
	//applying switch case
	switch ($GLOBALS['_POST']['fn'])
	{
		//for sign up info
		case md5('signup'):
		{
			//checking for same password in two field
			if($GLOBALS['_POST']['password'] == $GLOBALS['_POST']['con_password'])
			{
				//calling userSignUp function to insert user credentials
				$userCreden = $formData->userSignUp($GLOBALS['_POST']);
				if($userCreden[0] == 1)
				{
					$_SESSION['success'] = 'Registration Successfull!!';
					$_SESSION['user_id'] = $userCreden[1];
					$_SESSION['user'] = $GLOBALS['_POST']['category'];
					header("Location: ../profile.php");
				}
				else
				{
					$_SESSION['warning'] = 'Registration Unsuccessfull!!';
					header("Location: ../sign_up.php");
				}
			}
			else
			{
				$_SESSION['warning'] = 'Password Fields Are Not Matching!!';
				header("Location: ../sign_up.php");
			}
			break;
		}
		//for login info
		case md5('login'):
		{
			//checking for empty username and password field
			if(!empty($GLOBALS['_POST']['username']) && !empty($GLOBALS['_POST']['password']))
			{
				//checking for login credentials verification
				$loginCreden = $formData->userLogin($GLOBALS['_POST']);
				if($loginCreden[0] == 0)
				{
					$_SESSION['warning'] = $loginCreden[1];
					header("Location: ../log_in.php");
				}
				else if($loginCreden[0] == 1)
				{
					$_SESSION['success'] = $loginCreden[1];
					$_SESSION['user_id'] = $loginCreden[2];
					$_SESSION['user'] = $loginCreden[3];
					if($loginCreden[3] == 'employer')
					{
						header("Location: ../cygna.php?op=pro");
					}
					else if($loginCreden[3] == 'contractor')
					{
						header("Location: ../cygna.php?op=job");
					}
 				}
			}
			else
			{
				$_SESSION['warning'] = 'Username or Password Field Is Empty!!';
				header("Location: ../log_in.php");
			}
			break;
		}
		//for insert personal info
		case md5('personal_info'):
		{
			//calling the insert function
			$insertPersInfo = $formData->insertPersonalInfo($_SESSION['user_id'],$GLOBALS['_POST']);
			//returning to edit profile page
			if($insertPersInfo == 1)
			{
				$_SESSION['success'] = 'Your Personal Info Inserted Successfully!!';
				header("Location: ../edit_profile.php?op=img");
			}
			else
			{
				$_SESSION['warning'] = 'Your Personal Info Insertion Unsuccessfull!!';
				header("Location: ../edit_profile.php?op=per");
			}
			break;
		}
		//for update personal info
		case md5('per_info_update'):
		{
			//calling the insert function
			$insertPersInfo = $formData->updatePersonalInfo($_SESSION['user_id'],$GLOBALS['_POST']);
			header("Location: ../profile.php");
			break;
		}
		//for uploading image info
		case md5('image_info'):
		{
			$insertUserImage = $formData->insertUserImage($_SESSION['user_id'],$GLOBALS['_POST'],$GLOBALS['_FILES']);
			if($insertUserImage[0] == 1)
			{
				$_SESSION['success'] = $insertUserImage[1];
			}
			else
			{
				$_SESSION['warning'] = $insertUserImage[1];
			}
			header("Location: ../edit_profile.php");
			break;
		}
		//for inserting profile info
		case md5('profile_info'):
		{
			$insertUserProInfo = $formData->insertUserProfileInfo($_SESSION['user_id'],$GLOBALS['_POST']);
			if($insertUserProInfo[0] == 1)
			{
				$_SESSION['success'] = $insertUserProInfo[1];
			}
			else
			{
				$_SESSION['warning'] = $insertUserProInfo[1];
			}
			header("Location: ../profile.php");
			break;
		}
		//for inserting user portfolio
		case md5('user_portfolio'):
		{
			$insertUserPortfolio = $formData->insertUserPortfolio($_SESSION['user_id'],$GLOBALS['_POST'],$GLOBALS['_FILES']);
			if($insertUserPortfolio == 1)
			{
				$_SESSION['success'] = 'Portfolio Saves Successfully!!';
			}
			else
			{
				$_SESSION['warning'] = 'Saving Portfolio Unsuccessfull!';
			}
			header("Location: ../profile.php");
			break;
		}
		//for updating user portfolio
		case md5('user_portfolio_edit'):
		{
			$insertUserPortfolio = $formData->updateUserPortfolio($_SESSION['user_id'],$GLOBALS['_POST'],$GLOBALS['_FILES']);
			if($insertUserPortfolio == 1)
			{
				$_SESSION['success'] = 'Portfolio Saves Successfully!!';
			}
			else
			{
				$_SESSION['warning'] = 'Saving Portfolio Unsuccessfull!';
			}
			header("Location: ../profile.php");
			break;
		}
		//for inserting user employment
		case md5('user_employment'):
		{
			$insertUserEmp = $formData->insertUserEmployment($_SESSION['user_id'],$GLOBALS['_POST']);
			if($insertUserEmp == 1)
			{
				$_SESSION['success'] = 'Employment Saves Successfully!!';
			}
			else
			{
				$_SESSION['warning'] = 'Saving Employment Unsuccessfull!';
			}
			header("Location: ../profile.php");
			break;
		}
		//for updating user employment
		case md5('user_employment_edit'):
		{
			$insertUserEmp = $formData->updateUserEmployment($_SESSION['user_id'],$GLOBALS['_POST']);
			if($insertUserEmp == 1)
			{
				$_SESSION['success'] = 'Employment Saves Successfully!!';
			}
			else
			{
				$_SESSION['warning'] = 'Saving Employment Unsuccessfull!';
			}
			header("Location: ../profile.php");
			break;
		}
		//for inserting user education
		case md5('user_education'):
		{
			$insertUserEdu = $formData->insertUserEducation($_SESSION['user_id'],$GLOBALS['_POST']);
			if($insertUserEdu == 1)
			{
				$_SESSION['success'] = 'Education Saves Successfully!!';
			}
			else
			{
				$_SESSION['warning'] = 'Saving Education Unsuccessfull!';
			}
			header("Location: ../profile.php");
			break;
		}
		//for updating user education
		case md5('user_education_edit'):
		{
			$insertUserEdu = $formData->updateUserEducation($_SESSION['user_id'],$GLOBALS['_POST']);
			if($insertUserEdu == 1)
			{
				$_SESSION['success'] = 'Education Saves Successfully!!';
			}
			else
			{
				$_SESSION['warning'] = 'Saving Education Unsuccessfull!';
			}
			header("Location: ../profile.php");
			break;
		}
		//for inserting values of project post
		case md5('project_post'):
		{
			$insertProjectInfo = $formData->insertProjectInfo($_SESSION['user_id'],$GLOBALS['_POST'],$GLOBALS['_FILES']);
			if($insertProjectInfo == 1)
			{
				$_SESSION['success'] = 'Project Post Successfully!!';
			}
			else
			{
				$_SESSION['warning'] = 'Project Posting unsuccessfull!!';
			}
			header("Location: ../post_project.php");
			break;
		}
		//for editing values of project
		case md5('edit_project'):
		{
			$editProjectinfo = $formData->editProjectInfo($GLOBALS['_POST'],$GLOBALS['_FILES']);
			header("Location: ../cygna.php?op=pro");
			break;
		}
		//for inserting survey report
		case md5('survey_report'):
		{
			$submitSurveyReport = $formData->submitSurveyReport($GLOBALS['_POST']['user_id'],$GLOBALS['_POST']);
			if($submitSurveyReport == 1)
			{
				$_SESSION['success'] = 'Survey Report Submitted Successfully!!';
			}
			else
			{
				$_SESSION['warning'] = 'Survey Report Submission Unsuccessfully!!';
			}
			header("Location: ../survey.php");
			break;
		}
		//for inserting bid for a project
		case md5('insert_bid'):
		{
			$insertBid = $formData->insertProjectBid($_SESSION['user_id'],$GLOBALS['_POST'],$GLOBALS['_FILES']);
			if($insertBid == 1)
			{
				$_SESSION['success'] = 'Your Proposal Submitted Successfully!!';
			}
			else if($insertBid == 0)
			{
				$_SESSION['warning'] = 'Your Proposal Submission Unsuccessfully!!';
			}
			else
			{
				$_SESSION['warning'] = $insertBid;
			}
			header("Location: ../project_list.php");
			break;
		}
		//for inserting bid for a project
		case md5('update_bid'):
		{
			$updateBid = $formData->updateUserBid($_SESSION['user_id'],$GLOBALS['_POST'],$GLOBALS['_FILES']);
			if($updateBid == 1)
			{
				$_SESSION['success'] = 'Your Proposal Updated Successfully!!';
			}
			else if($updateBid == 0)
			{
				$_SESSION['warning'] = 'Your Proposal Update Unsuccessfull!!';
			}
			else
			{
				$_SESSION['warning'] = $updateBid;
			}
			header("Location: ../cygna.php?op=job");
			break;
		}
		//for query of contact us
		case md5('contact_us'):
		{
			$contactQuery = $formData->userContactQuery($GLOBALS['_POST']);
			if($contactQuery == 1)
			{
				$_SESSION['success'] = 'Your message has been successfully sent to us.We will reply you soon!!';
			}
			else
			{
				$_SESSION['warning'] = 'Your message sending failed!!';
			}
			header("Location: ../contact_us.php");
			break;
		}
		//for user submit ticket
		case md5('submit_ticket'):
		{
			$ticketQuery = $formData->userTicketQuery($_SESSION['user_id'],$GLOBALS['_POST']);
			if($ticketQuery == 1)
			{
				$_SESSION['success'] = 'Your message has been successfully sent to us.We will reply you soon!!';
			}
			else
			{
				$_SESSION['warning'] = 'Your message sending failed!!';
			}
			header("Location: ../ticket.php");
			break;
		}
		default:
		{
			break;
		}
	}




?>