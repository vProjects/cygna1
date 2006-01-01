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
		- method for checking unique email id
		- Auth: Dipanjan
		*/
		function getUniqueEmail($email_id)
		{
			//getting all email id from database
			$allEmail = $this->manageContent->getValue('user_credentials','email_id');
			//initializing a parameter
			$emailCounter = 0;
			foreach($allEmail as $allEmails)
			{
				if($allEmails['email_id'] == $email_id)
				{
					$emailCounter = 1;
					break;
				}
			}
			echo $emailCounter;
		}
		
		/*
		- method for checking unique email id
		- Auth: Dipanjan
		*/
		function getUniqueUsername($username)
		{
			//getting all email id from database
			$allUser = $this->manageContent->getValue('user_credentials','username');
			//initializing a parameter
			$userCounter = 0;
			foreach($allUser as $allUsers)
			{
				if($allUsers['username'] == $username)
				{
					$userCounter = 1;
					break;
				}
			}
			echo $userCounter;
		}
		
		/*
		- method for getting sub category of a category
		- Auth: Dipanjan
		*/
		function getSubCategory($category)
		{
			/* Initially we set sub categories are same */
			echo '<option value="Sub Category 1">Sub Category 1</option>
					<option value="Sub Category 2">Sub Category 2</option>
					<option value="Sub Category 3">Sub Category 3</option>
					<option value="Sub Category 4">Sub Category 4</option>
					<option value="Sub Category 5">Sub Category 5</option>';
		}
		
		/*
		- method for getting post project wok type details
		- Auth: Dipanjan
		*/
		function getWorkTypeDetails($work_type)
		{
			//checking for work type
			if($work_type == 'Hourly')
			{
				echo '<div class="rate_optional_text">
						<div class="pull-left">
							<select class="form-control pp_hourly_selectbox pull-left" name="hourly_rate" id="hourly_rate_list">
								<option value="">-- select hourly rate --</option>
								<option value="Less Than $10/hr">Less Than $10/hr</option>
								<option value="$10/hr to $15/hr">$10/hr to $15/hr</option>
								<option value="$15/hr to $20/hr">$15/hr to $20/hr</option>
								<option value="$20/hr to $30/hr">$20/hr to $30/hr</option>
								<option value="$30/hr to $40/hr">$30/hr to $40/hr</option>
								<option value="$40/hr to $50/hr">$40/hr to $50/hr</option>
								<option value="Above $50/hr">Above $50/hr</option>
								<option value="custom_price_hourly">Enter Custom Price Range</option>
							</select>
						</div>
						<div class="pull-left" id="pp_hourly_manual_rate">
							<input type="text" class="col-md-2 pull-left pp_form_textbox pp_form_pr_textbox" placeholder="min" name="hourly_custom_min" />
							<p class="pull-left"> To </p>
							<input type="text" class="col-md-2 pull-left pp_form_textbox pp_form_pr_textbox" placeholder="max" name="hourly_custom_max" />
							<div class="clearfix"></div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="rate_optional_text" id="pp_hourly_info">
						<input type="text" class="col-md-2 pull-left pp_form_textbox pp_form_mini_textbox" name="hours_of_week"/>
						<p class="pull-left">hrs/week </p>
						<select class="form-control pp_total_week_selectbox pull-left" name="hourly_time_range">
							<option>-- select duration --</option>
							<option value="1-2 weeeks">1-2 weeks</option>
							<option value="3-4 weeks">3-4 weeks</option>
							<option value="1-2 months">1-2 months</option>
							<option value="3-4 months">3-4 months</option>
						</select>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>';
			}
			else if($work_type == 'Fixed')
			{
				echo '<div class="rate_optional_text">
						<div class="pull-left" id="pp_fixed_rate">
							<select class="form-control pp_hourly_selectbox pull-left" name="fixed_rate" id="fixed_rate_list">
								<option value="">-- select fixed rate --</option>
								<option value="Less than $500">Less than $500</option>
								<option value="$500 to $1000">$500 to $1000</option>
								<option value="$1000 to $5000">$1000 to $5000</option>
								<option value="$5000 to $10000">$5000 to $10000</option>
								<option value="Above $10000">Above $10000</option>
								<option value="custom_price_fixed">Enter Custom Price Range</option>
							</select>
						</div>
						<div class="pull-left" id="pp_fixed_manual_rate">
							<input type="text" class="col-md-2 pull-left pp_form_textbox pp_form_pr_textbox" placeholder="min" name="fixed_custom_min" />
							<p class="pull-left"> To </p>
							<input type="text" class="col-md-2 pull-left pp_form_textbox pp_form_pr_textbox" placeholder="max" name="fixed_custom_max" />
							</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>';
			}
		}
		
		/*
		- method for inserting profile crop image
		- Auth: Dipanjan
		*/
		function insertProfileImage($user_id,$cropData)
		{
			
		}
		
		/*
		- method for inserting survey feedback
		- Auth: Dipanjan
		*/
		function insertSurveyFeedback($user_id,$userData)
		{
			//checking for active survey set
			$active_survey_set = $this->manageContent->getValue_where("survey_info","*","status",1);
			$survey_set = $active_survey_set[0]['set_no'];
			//insert the value to survey feedback table
			$column_name = array("user_id","set_no","feedback");
			$column_value = array($user_id,$survey_set,$userData['feedback']);
			$insert = $this->manageContent->insertValue("survey_feedback",$column_name,$column_value);
		}
		
		/*
		- method for inserting polling answer
		- Auth: Dipanjan
		*/
		function insertPollingAnswer($user_id,$userData)
		{
			//getting the user id fiels from database
			$users = $this->manageContent->getValueMultipleCondtn("polling_info","*",array("set_no","answer_no"),array($userData['set_no'],$userData['answer']));
			if(empty($users[0]['user_id']))
			{
				$new_user_id = $user_id;
			}
			else
			{
				$new_user_id = ','.$user_id;
			}
			//updating the user id field
			$update = $this->manageContent->updateValueWhere("polling_info","user_id",$new_user_id,"id",$users[0]['id']);
		}
		
		/*
		- method for getting sub category
		- Auth: Dipanjan
		*/
		function getProjectSubCategory($userData)
		{
			//get sub category from database
			echo '<li class="pro_cat"><a>'.$userData['category'].'</a></li>
					<ul class="profile_overview profile_1st_child_nav">
						<li><i class="glyphicon glyphicon-chevron-right profile_ovr_icon"></i><a>Sub Category 1</a></li>
						<li><i class="glyphicon glyphicon-chevron-right profile_ovr_icon"></i><a>Sub Category 2</a></li>
						<li><i class="glyphicon glyphicon-chevron-right profile_ovr_icon"></i><a>Sub Category 3</a></li>
						<li><i class="glyphicon glyphicon-chevron-right profile_ovr_icon"></i><a>Sub Category 4</a></li>
						<li><i class="glyphicon glyphicon-chevron-right profile_ovr_icon"></i><a>Sub Category 5</a></li>
					</ul>';
		}
		
		/*
		- method for getting project of given category
		- Auth: Dipanjan
		*/
		function getProjectListOfCategory($user_id,$userData)
		{
			//getting the job list of this category
			$jobs = $this->manageContent->getValue_likely_descendingLimit("project_info","*","category",$userData['category'],50);
			//printing the div outline here
			echo '<div class="project_list_heading_bar">
					<span class="pull-left">Projects</span>
					<span class="pull-right">
						<ul class="pagination pagination-sm project_list_pagination_outline">
							<li><a href="#" class="pagination_arrow"><img src="img/pagination_left_arrow.png" /></a></li>
							<li><a href="#" class="pagination_active">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#" class="pagination_arrow"><img src="img/pagination_right_arrow.png" /></a></li>
						</ul>
					</span>
					<div class="clearfix"></div>
				</div>';
			
			//showing the project list	
			if(!empty($jobs))
			{
				//for sub category search
				if(isset($userData['sub_category']))
				{
					//calling the function for sub category
					$project_list_subcategory = $this->getProjectListOfSubCategory($jobs,$user_id,$userData['sub_category']);
				}
				else
				{
					foreach($jobs as $job)
					{
						//reject the jobs which have posted by this user
						if($job['user_id'] != $user_id)
						{
							echo '<div class="project_details_outline">
									<div class="project_title_outline">
										<span class="pull-left project_title_text"><a href="post_bid.php">'.$job['title'].'</a></span>
										<span class="pull-right project_bid_button"><img src="img/hammer.png" /><span class="project_bid_text">Bid</span></span>
										<div class="clearfix"></div>
									</div>
									<div class="project_part_details_outline">
										<p class="project_part_description">'.$this->getSubStringText($job['description'],1000).'</p>
										<div class="project_list_info_outline">
											<span class="project_list_icon pull-left"><img src="img/time_icon.png" /></span>
											<span class="project_list_icon_text pull-left">15 Days Left</span>
											<span class="project_list_icon pull-left"><img src="img/skills_icon.png" /></span>
											<span class="project_list_icon_text pull-left">PHP, Javascript</span>
											<span class="project_list_icon pull-left"><img src="img/price_icon.png" /></span>
											<span class="project_list_icon_text pull-left">$ 500</span>
											<span class="project_list_icon pull-left"><img src="img/bids_icon.png" /></span>
											<span class="project_list_icon_text pull-left">31 Bids</span>
											<div class="clearfix"></div>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>';
						}
					}
				}	
			}
			else
			{
				echo '<div class="portfolio_part_heading">No Project Found</div>';
			}
			
			echo '<div class="project_list_heading_bar bottom_pagination">
					<span class="pull-right">
						<ul class="pagination pagination-sm project_list_pagination_outline">
							<li><a href="#" class="pagination_arrow"><img src="img/pagination_left_arrow.png" /></a></li>
							<li><a href="#" class="pagination_active">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#" class="pagination_arrow"><img src="img/pagination_right_arrow.png" /></a></li>
						</ul>
					</span>
					<div class="clearfix"></div>
				</div>';
		}
		
		/*
		- method for getting project of given sub category
		- Auth: Dipanjan
		*/
		function getProjectListOfSubCategory($jobs,$user_id,$sub_category)
		{
			//initialize the parameter
			$job_count = 0;
			foreach($jobs as $job)
			{
				//checking for user id and sub category
				if($job['user_id'] != $user_id && strpos($job['sub_category'],$sub_category) !== false)
				{
					echo '<div class="project_details_outline">
							<div class="project_title_outline">
								<span class="pull-left project_title_text"><a href="post_bid.php">'.$job['title'].'</a></span>
								<span class="pull-right project_bid_button"><img src="img/hammer.png" /><span class="project_bid_text">Bid</span></span>
								<div class="clearfix"></div>
							</div>
							<div class="project_part_details_outline">
								<p class="project_part_description">'.$this->getSubStringText($job['description'],1000).'</p>
								<div class="project_list_info_outline">
									<span class="project_list_icon pull-left"><img src="img/time_icon.png" /></span>
									<span class="project_list_icon_text pull-left">15 Days Left</span>
									<span class="project_list_icon pull-left"><img src="img/skills_icon.png" /></span>
									<span class="project_list_icon_text pull-left">PHP, Javascript</span>
									<span class="project_list_icon pull-left"><img src="img/price_icon.png" /></span>
									<span class="project_list_icon_text pull-left">$ 500</span>
									<span class="project_list_icon pull-left"><img src="img/bids_icon.png" /></span>
									<span class="project_list_icon_text pull-left">31 Bids</span>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>';
					
					//increament the parameter
					$job_count++;
				}
			}
			
			//checking that no of job available
			if($job_count == 0)
			{
				echo '<div class="portfolio_part_heading">No Project Found</div>';
			}
		}
		
		/*
		- method for awarding a bid
		- Auth: Dipanjan
		*/
		function awardBidForProject($bid_id)
		{
			//checking that bid id is present or not
			$bid_details = $this->manageContent->getValue_where("bid_info","*","bid_id",$bid_id);
			if(!empty($bid_details[0]['bid_id']))
			{
				//update the award field of table
				$update = $this->manageContent->updateValueWhere("bid_info","awarded",1,"bid_id",$bid_id);
				//update award_bid_id field in project info table
				$upd = $this->manageContent->updateValueWhere("project_info","award_bid_id",$bid_id,"project_id",$bid_details[0]['project_id']);
				
				//create the variables
				$award_id = uniqid('AWA');
				$workroom_id = uniqid('WKRM');
				$project_id = $bid_details[0]['project_id'];
				$employer_id = $bid_details[0]['employer_id'];
				$contractor_id = $bid_details[0]['contractor_id'];
				$date = date('Y-m-h');
				$time = date('h:i:s');
				
				//check whether chat id exists or not
				
				
				//`(`id`, `award_id`, `project_id`, `bid_id`, `employer_id`, `contractor_id`, `is_accepted`, `status`)
				//(`id`, `workroom_id`, `project_id`, `bid_id`, `chat_id`, `emp_user_id`, `con_user_id`, `date`, `time`, `job_status`)
			}
		}
		
		/*
		- method for getting sub string of text with given number of character
		- Auth: Dipanjan
		*/
		function getSubStringText($text,$string_no)
		{
			$subString = substr($text,0,$string_no);
			return $subString;
		}
		
		/*
		- method to insert the message in the database
		- Auth Singh
		*/
		function insertMsg($postData)
		{
			if( !empty($postData['msg']) && !empty($postData['bid']) )
			{
				//generate chat id
				$chat_id = uniqid('CHAT');
				
				//get full bid info
				$bid = $this->manageContent->getValue_where("bid_info","*","bid_id",$postData['bid']);
				
				//get project_id from the bid_info table
				$project = $this->manageContent->getValue_where("project_info","*","project_id",$bid[0]['project_id']);
				
				//get the details
				$sender = $_SESSION['user_id'];
				$contractor = $bid[0]['user_id'];
				$employer = $project[0]['user_id'];
				$message = $postData['msg'];
				$bid_id = $postData['bid'];
				$project_id = $bid[0]['project_id'];
				$date = date("Y-m-d g:i:s");
				$status = 1;		//1 for unread message
				
				//insert the values
				$column_name = array("chat_id", "sender", "message", "emp_user_id", "con_user_id", "bid_id", "project_id", "date", "status");
				$column_value = array($chat_id, $sender, $message, $employer, $contractor, $bid_id, $project_id, $date, $status);
				$insert = $this->manageContent->insertValue("chat_info",$column_name,$column_value);
				
				if( $insert > 0 )
				{
					echo "Message send successfully.";
				}
				else {
					echo "Error!!. Please try again.";
				}
			}
			else
			{
				echo "Please fill the form properly and try again.Thank you.";
			}
		}

		/*
		- method for getting messages notification from the database
		- generates the full UI
		- Auth: Singh
		*/
		function getMsgNotification($postData)
		{
			$user_id = $_SESSION['user_id'];
			$messages = $this->manageContent->get_msg_notification("chat_info","*","emp_user_id",$user_id,"con_user_id",$user_id,'sender',$user_id,'status',1);
			
			if( !empty($messages) )
			{
				echo count($messages);
			}
			else
			{
				echo 0;
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
		case 'emailChecking':
		{
			$emailChecking = $fetchData->getUniqueEmail($GLOBALS['_POST']['email']);
			break;
		}
		//for unique username checking
		case 'usernameChecking':
		{
			$usernameChecking = $fetchData->getUniqueUsername($GLOBALS['_POST']['username']);
			break;
		}
		//for getting sub category in post project
		case 'gettingSubCategory':
		{
			$getSubCat = $fetchData->getSubCategory($GLOBALS['_POST']['category']);
			break;
		}
		//for getting post project work type details
		case 'gettingWorkTypeDetails':
		{
			$getWorkType = $fetchData->getWorkTypeDetails($GLOBALS['_POST']['work_type']);
			break;
		}
		//for inserting the crop image of profile image
		case 'gettingProfileCrop':
		{
			print_r($GLOBALS['_FILES']);
			//$getWorkType = $fetchData->getWorkTypeDetails($GLOBALS['_POST']['work_type']);
			break;
		}
		//for inserting the survey feedback
		case 'insertFeedbackReport':
		{
			if(isset($_SESSION['user_id']))
			{
				$user_id = $_SESSION['user_id'];
			}
			else
			{
				$user_id = 'guest';
			}
			$insertFeedback = $fetchData->insertSurveyFeedback($user_id,$GLOBALS['_POST']);
			break;
		}
		//for inserting the polling answer
		case 'insertPollingAnswer':
		{
			$insertPollingAnswer = $fetchData->insertPollingAnswer($_SESSION['user_id'],$GLOBALS['_POST']);
			break;
		}
		//for getting subcategory of given category
		case 'projectCategory':
		{
			$getProjectSubCategory = $fetchData->getProjectSubCategory($GLOBALS['_POST']);
			break;
		}
		//for showing the job of given category
		case 'getProjectOfCatgory':
		{
			$getProjectlistOfCategory = $fetchData->getProjectListOfCategory($_SESSION['user_id'],$GLOBALS['_POST']);
			break;
		}
		//for showing the job of given category
		case 'getProjectOfSubCatgory':
		{
			$getProjectlistOfSubCategory = $fetchData->getProjectListOfCategory($_SESSION['user_id'],$GLOBALS['_POST']);
			break;
		}
		//for awarding the bid for that project
		case 'awardBid':
		{
			$awardBid = $fetchData->awardBidForProject($GLOBALS['_POST']['bid_id']);
			break;
		}
		//for posting a message in the system
		case 'postMsg':
		{
			$fetchData->insertMsg($GLOBALS['_POST']);
			break;
		}
		//for fetching a message in the system
		case 'getMsgNotification':
		{
			$fetchData->getMsgNotification($GLOBALS['_POST']);
			break;
		}
		default:
		{
			break;	
		}
	}

?>