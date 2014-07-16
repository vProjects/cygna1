<?php
	//include the DAL library to use the model layer methods
	include 'class.DAL.php';
	
	// business layer class starts here
	class BLL_manageData
	{
		public $manage_content;
		
		/*
		- method for constructing DAL class
		- Auth: Dipanjan
		*/
		function __construct()
		{	
			$this->manage_content = new ManageContent_DAL();
			return $this->manage_content;
		}
		
		/*
		- method for creating user cookie
		- Auth: Dipanjan
		*/
		function createUserCookie($user_id)
		{
			//creating user cookie
			$cookie_exp_time = time() + (24*3600);
			$setCookie = $this->createCookie('uid',$user_id,$cookie_exp_time);
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
		- method for getting profile and cover image
		- Auth: Dipanjan
		*/
		function getUserImage($user_id,$image_type)
		{
			//getting values from databases
			$userDetails = $this->manage_content->getValue_where("user_info","*","user_id",$user_id);
			//for profile image
			if(!empty($userDetails[0]['profile_image']))
			{
				$profile_img = $userDetails[0]['profile_image'];
			}
			else
			{
				$profile_img = 'files/pro-image/dummy.png';
			}
			//for profile image
			if(!empty($userDetails[0]['cover_image']))
			{
				$cover_img = $userDetails[0]['cover_image'];
			}
			else
			{
				$cover_img = 'files/cov-image/default.png';
			}
			if($image_type == 'pp')
			{
				echo '<img src="'.$profile_img.'" class="profile_image" alt="Profile Image"/>';
			}
			else if($image_type == 'cp')
			{
				echo '<img src="'.$cover_img.'" class="cover_image" alt="Cover Image"/>';
			}
		}
		
		/*
		- method for getting profile and cover image
		- Auth: Dipanjan
		*/
		function getUserImageForPublic($user_id,$image_type)
		{
			//getting values from databases
			$userDetails = $this->manage_content->getValue_where("user_info","*","user_id",$user_id);
			//for profile image
			if(!empty($userDetails[0]['profile_image']))
			{
				$profile_img = $userDetails[0]['profile_image'];
			}
			else
			{
				$profile_img = 'files/pro-image/dummy.png';
			}
			//for profile image
			if(!empty($userDetails[0]['cover_image']))
			{
				$cover_img = $userDetails[0]['cover_image'];
			}
			else
			{
				$cover_img = 'files/cov-image/default.png';
			}
			if($image_type == 'pp')
			{
				echo '<img src="'.$profile_img.'" class="profile_image" alt="Profile Image"/>';
			}
			else if($image_type == 'cp')
			{
				echo '<img src="'.$cover_img.'" class="cover_image" alt="Cover Image"/>';
			}
		}
		
		/*
		- method for getting user hourly rate
		- Auth: Dipanjan
		*/
		function getUserHourlyRate($user_id)
		{
			//getting values from databases
			$userDetails = $this->manage_content->getValue_where("user_info","*","user_id",$user_id);
			if(!empty($userDetails[0]['hourly_rate']))
			{
				$hourly_rate = '$'.$userDetails[0]['hourly_rate'].'/Hour';
			}
			else
			{
				$hourly_rate = 'Undefined';
			}
			echo '<div class="profile_box_heading">Hire ME 
					<span class="portfolio_part_share pull-right"><a href="edit_profile.php?op=pro">Edit</a></span>
				</div>
        		<div class="hiring_rate">'.$hourly_rate.'</div>';
		}
		
		/*
		- method for getting user hourly rate
		- Auth: Dipanjan
		*/
		function getUserHourlyRateForPublic($user_id)
		{
			//getting values from databases
			$userDetails = $this->manage_content->getValue_where("user_info","*","user_id",$user_id);
			if(!empty($userDetails[0]['hourly_rate']))
			{
				$hourly_rate = '$'.$userDetails[0]['hourly_rate'].'/Hour';
			}
			else
			{
				$hourly_rate = 'Undefined';
			}
			echo '<div class="profile_box_heading">Hire ME</div>
        		<div class="hiring_rate">'.$hourly_rate.'</div>';
		}
		
		/*
		- method for getting user description
		- Auth: Dipanjan
		*/
		function getUserDescription($user_id)
		{
			//getting values from databases
			$userDetails = $this->manage_content->getValue_where("user_info","*","user_id",$user_id);
			
			echo '<div class="profile_box_heading">'.$userDetails[0]['name'].'
					<span class="portfolio_part_share pull-right"><a href="edit_profile.php?op=per">Edit</a></span>
				</div>
        			<div class="hiring_rate profile_details">
						<p>'.$userDetails[0]['description'].'</p>
						<div class="profile_info_outline">
							<div class="profile_info_box pull-left">
								<img src="img/expertise_icon.png"  class="profile_info_icon pull-left"/>
								<div class="profile_info_text_outline pull-left">
									<div class="profile_info_heading">Certifications</div>
									<div class="profile_info_text">'; if(!empty($userDetails[0]['no_certificates'])) { echo substr($userDetails[0]['no_certificates'],0,30); } else { echo 'NULL'; } echo '</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="profile_info_box pull-left">
								<img src="img/availability_icon.png"  class="profile_info_icon pull-left" />
								<div class="profile_info_text_outline pull-left">
									<div class="profile_info_heading">Availability</div>
									<div class="profile_info_text">'.$userDetails[0]['availability'].'</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="profile_info_box pull-left">
								<img src="img/interested_icon.png"  class="profile_info_icon pull-left" />
								<div class="profile_info_text_outline pull-left">
									<div class="profile_info_heading">Interested In</div>
									<div class="profile_info_text">'; if(!empty($userDetails[0]['interested_topic'])) { echo substr($userDetails[0]['interested_topic'],0,30); } else { echo 'Nothing Specify'; } echo '</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>';
		}
		
		/*
		- method for getting user description
		- Auth: Dipanjan
		*/
		function getUserDescriptionForPublic($user_id)
		{
			//getting values from databases
			$userDetails = $this->manage_content->getValue_where("user_info","*","user_id",$user_id);
			
			echo '<div class="profile_box_heading">'.$userDetails[0]['name'].'</div>
        			<div class="hiring_rate profile_details">
						<p>'.$userDetails[0]['description'].'</p>
						<div class="profile_info_outline">
							<div class="profile_info_box pull-left">
								<img src="img/expertise_icon.png"  class="profile_info_icon pull-left"/>
								<div class="profile_info_text_outline pull-left">
									<div class="profile_info_heading">Certifications</div>
									<div class="profile_info_text">'; if(!empty($userDetails[0]['no_certificates'])) { echo substr($userDetails[0]['no_certificates'],0,30); } else { echo 'NULL'; } echo '</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="profile_info_box pull-left">
								<img src="img/availability_icon.png"  class="profile_info_icon pull-left" />
								<div class="profile_info_text_outline pull-left">
									<div class="profile_info_heading">Availability</div>
									<div class="profile_info_text">'.$userDetails[0]['availability'].'</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="profile_info_box pull-left">
								<img src="img/interested_icon.png"  class="profile_info_icon pull-left" />
								<div class="profile_info_text_outline pull-left">
									<div class="profile_info_heading">Interested In</div>
									<div class="profile_info_text">'; if(!empty($userDetails[0]['interested_topic'])) { echo substr($userDetails[0]['interested_topic'],0,30); } else { echo 'Nothing Specify'; } echo '</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>';
		}
		
		/*
		- method for getting user portfolio
		- Auth: Dipanjan
		*/
		function getUserPortfolio($user_id)
		{
			//getting values from databases
			$userportfolios= $this->manage_content->getValue_where("user_portfolio","*","user_id",$user_id);
			
			if(!empty($userportfolios[0]))
			{
				$last_key = array_keys($userportfolios);
				//getting the last number of array and initialize parameter
				$last_key = end($last_key);
				$i=0;
				
				foreach($userportfolios as $userportfolio)
				{
					echo '<div class="portfolio_part_outline'; if($i++ == $last_key) {echo ' borderless_box'; } echo'">
							<div class="col-md-8 col-sm-8 col-xs-8">
								<div class="portfolio_part_heading">'.$userportfolio['skills'].' <span class="portfolio_part_share"><a href="edit_profile.php?op=port&port_id='.$userportfolio['id'].'">Edit</a></span></div>
								<p>'.$userportfolio['description'].'</p>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4"><img src="'.$userportfolio['file'].'" class="pull-right"/></div>
							<div class="clearfix"></div>
						</div>';
				}
			}
			else
			{
				echo '<div class="portfolio_part_heading">You Have Not Uploaded Any Portfolio.</div>';
			}
		}
		
		/*
		- method for getting user portfolio
		- Auth: Dipanjan
		*/
		function getUserPortfolioForPublic($user_id)
		{
			//getting values from databases
			$userportfolios= $this->manage_content->getValue_where("user_portfolio","*","user_id",$user_id);
			
			if(!empty($userportfolios[0]))
			{
				//getting the last number of array and initialize parameter
				$last_key = array_keys($userportfolios);
				$last_key = end($last_key);
				$i=0;
				
				foreach($userportfolios as $userportfolio)
				{
					echo '<div class="portfolio_part_outline'; if($i++ == $last_key) {echo ' borderless_box'; } echo'">
							<div class="col-md-8 col-sm-8 col-xs-8">
								<div class="portfolio_part_heading">'.$userportfolio['skills'].'</div>
								<p>'.$userportfolio['description'].'</p>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4"><img src="'.$userportfolio['file'].'" class="pull-right"/></div>
							<div class="clearfix"></div>
						</div>';
				}
			}
			else
			{
				echo '<div class="portfolio_part_heading">You Have Not Uploaded Any Portfolio.</div>';
			}
		}
		
		/*
		- method for getting user skills
		- Auth: Dipanjan
		*/
		function getUserSkills($user_id)
		{
			//getting values from databases
			$userDetails = $this->manage_content->getValue_where("user_info","*","user_id",$user_id);
			
			if(!empty($userDetails[0]['skills']))
			{
				//seperating the comma(',') and making an array of skill element
				$skills = explode(',',$userDetails[0]['skills']);
				//showing them in page
				foreach($skills as $skill)
				{
					echo '<div class="myskills_box pull-left">'.$skill.'</div>';
				}
			}
			else
			{
				echo '<div class="portfolio_part_heading">You Have Not Choosed Any Skill.</div>';
			}
		}
		
		/*
		- method for getting user skills
		- Auth: Dipanjan
		*/
		function getUserSkillsForPublic($user_id)
		{
			//getting values from databases
			$userDetails = $this->manage_content->getValue_where("user_info","*","user_id",$user_id);
			
			if(!empty($userDetails[0]['skills']))
			{
				//seperating the comma(',') and making an array of skill element
				$skills = explode(',',$userDetails[0]['skills']);
				//showing them in page
				foreach($skills as $skill)
				{
					echo '<div class="myskills_box pull-left">'.$skill.'</div>';
				}
			}
			else
			{
				echo '<div class="portfolio_part_heading">You Have Not Choosed Any Skill.</div>';
			}
		}
		
		/*
		- method for getting user project
		- Auth: Dipanjan
		*/
		function getUserProject($user_id)
		{
			//getting values from databases
			$projectDetails = $this->manage_content->getValue_where("project_info","*","user_id",$user_id);
			
			if(!empty($projectDetails[0]))
			{
				//getting the last number of array and initialize parameter
				$last_key = end(array_keys($projectDetails));
				$i=0;
				
				//showing them in page
				foreach($projectDetails as $projectDetail)
				{
					//showing only top 4 projects
					if($i < 4)
					{
						//sub string the project description
						$sub_project_des = substr($projectDetail['description'],0,200);
						
						echo '<div class="portfolio_part_outline'; if($i++ == $last_key || $i == 4) {echo ' borderless_box'; } echo'">
								<div class="col-md-8 col-sm-8 col-xs-8">
									<div class="portfolio_part_heading">'.$projectDetail['title'].'<span class="portfolio_part_share">Share</span></div>
									<p>'.$sub_project_des.'</p>
								</div>';
						if($i == 4) 
						{ 
							echo '<div class="col-md-4 col-sm-4 col-xs-4"><div class="myprojects_more_button pull-right">MORE</div></div>'; 
						}
							
						echo '<div class="clearfix"></div>
							</div>';
					}	
				}
			}
			else
			{
				echo '<div class="portfolio_part_heading">You Have Not Posted Any Project.</div>';
			}
		}
		
		/*
		- method for getting user employment
		- Auth: Dipanjan
		*/
		function getUserEmployementList($user_id)
		{
			//getting values from databases
			$empDetails = $this->manage_content->getValueMultipleCondtn("user_employment","*",array("user_id","status"),array($user_id,1));
			if(!empty($empDetails[0]))
			{
				echo '<thead>
                    	<tr>
                        	<th>Company</th>
                            <th>Position</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Description</th>
							<th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
				
				foreach($empDetails as $empDetail)
				{
					echo '<tr>
                        	<td>'.$empDetail['com_name'].'</td>
                            <td>'.$empDetail['position'].'</td>
                            <td>'.$empDetail['start_date'].'</td>
                            <td>'.$empDetail['end_date'].'</td>
                            <td>'.$empDetail['description'].'</td>
							<td><span class="portfolio_part_share"><a href="edit_profile.php?op=emp&emp_id='.$empDetail['id'].'">Edit</a></span></td>
                        </tr>';
				}
				
				echo '</tbody>';
			}
		}
		
		/*
		- method for getting user employment
		- Auth: Dipanjan
		*/
		function getUserEmployementListForPublic($user_id)
		{
			//getting values from databases
			$empDetails = $this->manage_content->getValueMultipleCondtn("user_employment","*",array("user_id","status"),array($user_id,1));
			if(!empty($empDetails[0]))
			{
				echo '<thead>
                    	<tr>
                        	<th>Company</th>
                            <th>Position</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>';
				
				foreach($empDetails as $empDetail)
				{
					echo '<tr>
                        	<td>'.$empDetail['com_name'].'</td>
                            <td>'.$empDetail['position'].'</td>
                            <td>'.$empDetail['start_date'].'</td>
                            <td>'.$empDetail['end_date'].'</td>
                            <td>'.$empDetail['description'].'</td>
                        </tr>';
				}
				
				echo '</tbody>';
			}
		}
		
		/*
		- method for getting user education
		- Auth: Dipanjan
		*/
		function getUserEducationList($user_id)
		{
			//getting values from databases
			$empDetails = $this->manage_content->getValueMultipleCondtn("user_education","*",array("user_id","status"),array($user_id,1));
			if(!empty($empDetails[0]))
			{
				echo '<thead>
                    	<tr>
                        	<th>Institute</th>
                            <th>Degree</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Description</th>
							<th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
				
				foreach($empDetails as $empDetail)
				{
					echo '<tr>
                        	<td>'.$empDetail['inst_name'].'</td>
                            <td>'.$empDetail['degree'].'</td>
                            <td>'.$empDetail['start_date'].'</td>
                            <td>'.$empDetail['end_date'].'</td>
                            <td>'.$empDetail['description'].'</td>
							<td><span class="portfolio_part_share"><a href="edit_profile.php?op=edu&edu_id='.$empDetail['id'].'">Edit</a></span></td>
                        </tr>';
				}
				
				echo '</tbody>';
			}
		}
		
		/*
		- method for getting user education
		- Auth: Dipanjan
		*/
		function getUserEducationListForPublic($user_id)
		{
			//getting values from databases
			$empDetails = $this->manage_content->getValueMultipleCondtn("user_education","*",array("user_id","status"),array($user_id,1));
			if(!empty($empDetails[0]))
			{
				echo '<thead>
                    	<tr>
                        	<th>Institute</th>
                            <th>Degree</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>';
				
				foreach($empDetails as $empDetail)
				{
					echo '<tr>
                        	<td>'.$empDetail['inst_name'].'</td>
                            <td>'.$empDetail['degree'].'</td>
                            <td>'.$empDetail['start_date'].'</td>
                            <td>'.$empDetail['end_date'].'</td>
                            <td>'.$empDetail['description'].'</td>
                        </tr>';
				}
				
				echo '</tbody>';
			}
		}
		
		/*
		- method for getting survey set active
		- Auth: Dipanjan
		*/
		function getSurveySet($user_id)
		{
			//checking for active survey set
			$active_survey_set = $this->manage_content->getValue_where("survey_info","*","status",1);
			$survey_set = $active_survey_set[0]['set_no'];
			//initialize the parameter
			$user_survey_status = 0;
			foreach($active_survey_set as $set_no)
			{
				//checking that user id gave the answers or not
				if(strpos($set_no['user_id'],$user_id) !== false)
				{
					$user_survey_status = 1;
					break;
				}
			}
			return array($user_survey_status,$survey_set);
		}
		
		/*
		- method for getting survey questions
		- Auth: Dipanjan
		*/
		function getSurveyQusetions($user_id,$survey_set_no,$action)
		{
			if($user_id == 'guest')
			{
				$user_id = 'none';
			}
			else
			{
				$user_id = $user_id;
			}
			//getting the set which are active
			$active_set = $this->manage_content->getValueMultipleCondtn("survey_info","question_no",array("set_no"),array($survey_set_no));
			if(!empty($active_set[0]['question_no']))
			{
				//initialize an empty array
				$question_set = array();
				//seperating the identical questions in an array
				foreach($active_set as $set_question)
				{
					//checking that qestion number is present oin array or not
					if(!in_array($set_question['question_no'],$question_set))
					{
						//pushing the question number in array
						array_push($question_set,$set_question['question_no']);
					}
				}
				//getting the answers for each question
				if(!empty($question_set[0]))
				{
					foreach($question_set as $questions)
					{
						//getting the value from database
						$question_details = $this->manage_content->getValueMultipleCondtn("survey_info","*",array("question_no","set_no"),array($questions,$survey_set_no));
						//printing the question and the answers
						echo '<div class="col-md-12">
								<p class="question-font">'.$questions.'. '.$question_details[0]['question'].'</p>
								<div class="col-xs-12">';
						
						foreach($question_details as $question_detail)
						{
							
							echo '<div class="col-sm-6">
									<div class="col-sm-9">
										<div class="radio ans-font">';
										//this is for insert value
										if($action == 'insert')
										{
											echo '<label><input type="radio" name="q'.$questions.'" value="'.$question_detail['answer_no'].'">'.$question_detail['answer'].'</label>';
										}
										//this is after inserting value
										else if($action == 'update')
										{
											//checking that user id is present or not
											if(strpos($question_detail['user_id'],$user_id) !== false)
											{
												echo '<label><input type="radio" name="q'.$questions.'" value="'.$question_detail['answer_no'].'" checked="checked">'.$question_detail['answer'].'</label>';
											}
											else
											{
												echo '<label><input type="radio" name="q'.$questions.'" value="'.$question_detail['answer_no'].'">'.$question_detail['answer'].'</label>';
											}
										}
											
							echo		'</div>
									</div>
								</div>';
						}
						
						echo '</div>
							</div>';
					}
				}
			}
			
		}
		
		/*
		- method for getting survey feedback
		- Auth: Dipanjan
		*/
		function getSurveyFeedback($user_id,$survey_set_no)
		{
			//checking for user submitted the feedback or not
			$user_feed = $this->manage_content->getValueMultipleCondtn("survey_feedback","*",array("user_id","set_no"),array($user_id,$survey_set_no));
			if(empty($user_feed[0]))
			{
				return 0;
			}
			else
			{
				return 1;
			}
			
		}
		
		/*
		- method for getting poll set no of user id
		- Auth: Dipanjan
		*/
		function getPollSet($user_id)
		{
			//checking for active poll set
			$poll_set = $this->manage_content->getValue_where("polling_info","*","status",1);
			if(!empty($poll_set[0]))
			{
				//initialize an empty array
				$poll_set_array = array();
				//getting the set no of all active items
				foreach($poll_set as $poll_sets)
				{
					if(!in_array($poll_sets['set_no'],$poll_set_array))
					{
						array_push($poll_set_array,$poll_sets['set_no']);
					}
				}
			}
			if(!empty($poll_set_array[0]))
			{
				//getting the poll set no where user id not present
				foreach($poll_set_array as $set_array)
				{
					//initialize the parameter
					$poll_set_no = '';
					//getting the answers of this set no
					$answer = $this->manage_content->getValue_where("polling_info","*","set_no",$set_array);
					foreach($answer as $answer_set)
					{
						if(strpos($answer_set['user_id'],$user_id) !== false)
						{
							$poll_set_no = $set_array;
							break;
						}
					}
					//checking that poll set no is set or not
					if(empty($poll_set_no))
					{
						return $set_array;
						break;
					}
				}
			}
		}
		
		/*
		- method for getting polling questions
		- Auth: Dipanjan
		*/
		function getPollingDetails($set_no)
		{
			//getting the info from database
			$poll_details = $this->manage_content->getValue_where("polling_info","*","set_no",$set_no);
			//showing them in page
			echo '<div class="profile_box_outline" id="poll_outline">
					<div class="profile_box_heading">POLL</div>
					<div class="poll-box">
						<div class="col-md-12">
							<p class="pole-question-font" id="'.$set_no.'">'.$poll_details[0]['question'].'</p>';
							
			foreach($poll_details as $poll_detail)
			{
				echo '<div class="col-sm-12">
						<div class="radio pole-ans">
							<label>
								<input type="radio" class="poll_radio_button" name="option" value="'.$poll_detail['answer_no'].'">'.$poll_detail['answer'].'</p>
							</label>
						</div>
					</div>';
			}
					
							echo '<div class="col-sm-12">				
								<button class="btn btn-primary btn-lg" id="poll_report">Submit</button>				
							</div>
							</div>
						<div class="clearfix"></div>
					</div>				
				</div>';
		}
		
		/*
		- method for getting latest project list
		- Auth: Dipanjan
		*/
		function getProjectListOfCategory($user_id,$cat,$sub,$page)
		{
			//getting the job list of this category
			if($cat == '' && $sub == '')
			{
				$jobs = $this->manage_content->getValue_descendingLimit("project_info","*",500);
				//creating page url for pagination
				$pageUrl = 'project_list.php?';
			}
			else if($cat != '' && $sub == '')
			{
				$jobs = $this->manage_content->getValue_likely_descendingLimit("project_info","*","category",$cat,100);
				//creating page url for pagination
				$pageUrl = 'project_list.php?cat='.$cat.'&';
			}
			else if($cat != '' && $sub != '')
			{
				$jobs = $this->manage_content->getValue_likely_descendingTwoLimit("project_info","*","category",$cat,"sub_category",$sub,100);
				//creating page url for pagination
				$pageUrl = 'project_list.php?cat='.$cat.'&sub='.$sub.'&';
				
			}
			
			//setting max no of index
			$max_index = 5;
			$limit = 5;
						
			//printing the div outline here
			echo '<div class="project_list_heading_bar">
					<span class="pull-left">Projects</span>';
					
					//getting the pageination
					$pagination = $this->pagination($page,$jobs,$user_id,$pageUrl,$max_index,$limit);
			
			echo '<div class="clearfix"></div>
				</div>';
			
			//calculate the rows number to be shown in this page
			$startNo = $page*$limit;
			$endNo = ($page + 1)*$limit;
			//showing the project list	
			if(!empty($jobs))
			{
				//initialize a parameter to show the result
				$jobNo = 0;
				foreach($jobs as $job)
				{
					//reject the jobs which have posted by this user
					//checking for job ending date exceeds the current date or not
					//checking for job status = 1
					//checking that job is already awarded or not
					if($job['user_id'] != $user_id && time() <= strtotime($job['ending_date'].' 23:59:59') && $job['status'] == 1 && empty($job['award_bid_id']))
					{
						//checking for job no is in between the start point and end point or not
						if($jobNo >= $startNo && $jobNo < $endNo)
						{
							//sub string the project description
							$project_des = substr($job['description'],0,1000);
							//checking that user has bid on this project or not
							$bidState = $this->bidOnProject($job['project_id'],$user_id);
							if($bidState == 1)
							{
								$bid_icon = '<span class="pull-right project_bid_button"><img src="img/hammer.png" /><span class="project_bid_text">Bid</span></span>';
								//getting bid id
								$bid_id = $this->manage_content->getValueMultipleCondtn("bid_info","*",array("project_id","user_id"),array($job['project_id'],$user_id));
								$post_bid_icon = '<a href="post_bid.php?bid='.$bid_id[0]['bid_id'].'">'.$job['title'].'</a>';
							}
							else
							{
								$bid_icon = '';
								$post_bid_icon = '<a href="post_bid.php?pid='.$job['project_id'].'">'.$job['title'].'</a>';
							}
							//calculate time remaining for this project
							$datetime1 = new DateTime($this->getCurrentDate());
							$datetime2 = new DateTime($job['ending_date']);
							$interval = $datetime1->diff($datetime2);
							$int_day =  $interval->format('%a');
							if($int_day == 1)
							{
								$time_remaining = $int_day.' day Left';
							}
							else if($int_day == 0)
							{
								$time_remaining = 'Today Left';
							}
							else
							{
								$time_remaining = $int_day.' days Left';
							}
							//getting the skills for this project
							$job_skills = substr($job['skills'],0,20).'...';
							//getting total bids
							$total_bids = $this->manage_content->getRowValueMultipleCondition("bid_info",array("project_id","status"),array($job['project_id'],1));
							if($total_bids <= 1)
							{
								$total_bid_text = $total_bids.' Bid';
							}
							else
							{
								$total_bid_text = $total_bids.' Bids';
							}
							
							echo '<div class="project_details_outline">
									<div class="project_title_outline">
										<span class="pull-left project_title_text">'.$post_bid_icon.'</span>
										'.$bid_icon.'
										<div class="clearfix"></div>
									</div>
									<div class="project_part_details_outline">
										<p class="project_part_description">'.$project_des.'</p>
										<div class="project_list_info_outline">
											<span class="project_list_icon pull-left"><img src="img/time_icon.png" /></span>
											<span class="project_list_icon_text pull-left">'.$time_remaining.'</span>
											<span class="project_list_icon pull-left"><img src="img/skills_icon.png" /></span>
											<span class="project_list_icon_text pull-left">'.$job_skills.'</span>
											<span class="project_list_icon pull-left"><img src="img/price_icon.png" /></span>
											<span class="project_list_icon_text pull-left">'.$job['price_range'].'</span>
											<span class="project_list_icon pull-left"><img src="img/bids_icon.png" /></span>
											<span class="project_list_icon_text pull-left">'.$total_bid_text.'</span>
											<div class="clearfix"></div>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>';
						}
						//increment the parameter
						$jobNo++;
					}
				}
			}
			else
			{
				echo '<div class="portfolio_part_heading">No Project Found</div>';
			}
			
			echo '<div class="project_list_heading_bar bottom_pagination">';
					
					//getting the pageination
					$pagination = $this->pagination($page,$jobs,$user_id,$pageUrl,$max_index,$limit);
			
			echo '<div class="clearfix"></div>
				</div>';
		}
		
		/*
		- method for checking that user has submitted proposal on a project or not
		- Auth : Dipanjan
		*/
		function bidOnProject($project_id,$user_id)
		{
			//get the value of bid table
			$getValues = $this->manage_content->getValueMultipleCondtn("bid_info","*",array("project_id","status"),array($project_id,1));
			//initiate parameter
			$flag = 0;
			if(!empty($getValues[0]))
			{
				foreach($getValues as $getValue)
				{
					if($getValue['user_id'] == $user_id)
					{
						$flag = 1;
						break;
					}
				}
			}
			return $flag;
		}
		
		/*
		- method for getting the value of the pagination
		- Auth : Dipanjan
		*/
		function pagination($page,$jobList,$user_id,$pageUrl,$max_no_index,$limit)
		{
			//getting no of rows to be fetched
			//initialize a parameter
			$rows = 0;
			if(!empty($jobList[0]))
			{
				foreach($jobList as $job)
				{
					//reject the jobs which have posted by this user
					//checking for job ending date exceeds the current date or not
					//checking for job status = 1
					if($job['user_id'] != $user_id && time() <= strtotime($job['ending_date'].' 23:59:59') && $job['status'] == 1 && empty($job['award_bid_id']))
					{
						//increment the counter
						$rows++;
					}
				}
			}
			
			//used in the db for getting o/p
			$startPoint = $page*$limit ;
			//no of page to be displayed
			$no_page = $rows/$limit ;
			//show pagination when there is more than one page is there
			if($no_page > 1)
			{
				if($rows%$limit == 0)
				{
					$no_page = intval($no_page);
				}
				else
				{
					$no_page = intval($no_page) + 1;
				}
				
				//set no of index to be displayed
				$no_index = 1 ;
				
				//generate the pagination UI
				echo '<span class="pull-right">
						<ul class="pagination pagination-sm project_list_pagination_outline">';
				//logic for setting the prev button
				//condition for escaping the -ve page index when $page = 0
				
				if( ($page-1) < 0 && $page != 0 )
				{
					echo '<li><a class="pagination_arrow" href="'.$pageUrl.'p=0"> <img src="img/pagination_left_arrow.png" /></a></li>';
				}
				elseif( $page != 0 )
				{
					echo '<li><a class="pagination_arrow" href="'.$pageUrl.'p='.($page-1).'"> <img src="img/pagination_left_arrow.png" /></a></li>';
				}
				/*for the indexes*/
				//index initilization variable
				if( ( $page + 1 ) >= ( $no_page - $max_no_index + 1))
				{
					$inti_i = $no_page - $max_no_index + 1 ;
				}
				else
				{
					$inti_i = $page + 1 ;
				}
				for( $i = $inti_i ; $i <= $no_page ; $i++ )
				{
					if( $i > 0 )
					{
						echo '<li><a ';
						//codes for active class
						if( $page == ( $i - 1 ) )
						{
							echo ' class="pagination_active" ';
						}
						echo 'href="'.$pageUrl.'p='.($i-1).'">'.$i.'</a></li>' ;
						//increment the index no by 1
						$no_index++ ;
						if( $no_index > $max_no_index )
						{
							break ;
						}
					}
				}
				if( $page != ( $no_page - 1 ) )
				{
					//for the next button
					echo '<li><a class="pagination_arrow" href="'.$pageUrl.'p='.($page + 1).'"><img src="img/pagination_right_arrow.png" /> </a></li>' ;
				}
				//for the last button
				//echo '<li><a href="'.$PageUrl.'?p='.($no_page - 1).'&limit='.$limit.'">Last</a></li>' ;
				echo	 '</ul>
					</span>';
			}
			
		}
		
		/*
		- method for getting the value of the pagination
		- Auth : Dipanjan
		*/
		function pagination2($page,$result,$pageUrl,$max_no_index,$limit)
		{
			//used in the db for getting o/p
			$startPoint = $page*$limit ;
			//no of page to be displayed
			$no_page = $result/$limit ;
			//show pagination when there is more than one page is there
			if($no_page > 1)
			{
				if($result%$limit == 0)
				{
					$no_page = intval($no_page);
				}
				else
				{
					$no_page = intval($no_page) + 1;
				}
				
				//set no of index to be displayed
				$no_index = 1 ;
				
				//generate the pagination UI
				echo '<div class="pull-right">
                        <ul class="pagination new_pagination">';
				//logic for setting the prev button
				//condition for escaping the -ve page index when $page = 0
				
				if( ($page-1) < 0 && $page != 0 )
				{
					echo '<li><a href="'.$pageUrl.'p=0">&laquo;</a></li>';
				}
				elseif( $page != 0 )
				{
					echo '<li><a href="'.$pageUrl.'p='.($page-1).'">&laquo;</a></li>';
				}
				/*for the indexes*/
				//index initilization variable
				if( ( $page + 1 ) >= ( $no_page - $max_no_index + 1))
				{
					$inti_i = $no_page - $max_no_index + 1 ;
				}
				else
				{
					$inti_i = $page + 1 ;
				}
				for( $i = $inti_i ; $i <= $no_page ; $i++ )
				{
					if( $i > 0 )
					{
						//echo '<li><a ';
						//codes for active class
						if( $page == ( $i - 1 ) )
						{
							echo '<li class="active"><a ';
						}
						else
						{
							echo '<li><a ';
						}
						echo 'href="'.$pageUrl.'p='.($i-1).'">'.$i.'</a></li>' ;
						//increment the index no by 1
						$no_index++ ;
						if( $no_index > $max_no_index )
						{
							break ;
						}
					}
				}
				if( $page != ( $no_page - 1 ) )
				{
					//for the next button
					echo '<li><a href="'.$pageUrl.'p='.($page + 1).'">&raquo;</a></li>';
				}
				
				echo	 '</ul>
					</div>';
			}
			
		}
		
		
		/*
		- method for getting category and sub category list
		- Auth: Dipanjan
		*/
		function getProjectCategoryList($cat,$sub)
		{
			$categories = $this->manage_content->getValue( 'category' ,'*');
			
			if( !empty($categories) )
			{
				foreach ($categories as $category )
				{
					echo '<li class="pro_cat"><a href="project_list.php?cat='.$category['categoryId'].'">'.$category['name'].'</a></li>';
				}
			}
			else
			{
				echo '<li class="pro_cat"><a href="#">Sorry no category available.</a></li>';	
			}
		}

		/*
		- method for getting project details in bid page
		- Auth: Dipanjan
		*/
		function getProjectDetailsInBidPage($project_id)
		{
			//get project details
			$project_details = $this->manage_content->getValue_where("project_info","*","project_id",$project_id);
			
			//calculate time remaining for this project
			$datetime1 = new DateTime($this->getCurrentDate());
			$datetime2 = new DateTime($project_details[0]['ending_date']);
			$interval = $datetime1->diff($datetime2);
			$int_day =  $interval->format('%a');
			if($int_day == 1)
			{
				$time_remaining = $int_day.' day';
			}
			else if($int_day == 0)
			{
				$time_remaining = 'Today';
			}
			else
			{
				$time_remaining = $int_day.' days';
			}
			//setting values for upload file
			if(!empty($project_details[0]['file']))
			{
				$file_path = '<a href="'.$project_details[0]['file'].'" target="_blank">'.$project_details[0]['file_or'].'</a>';
			}
			else
			{
				$file_path = 'No Files';
			}
			//showing the result in page
			echo '<div class="project_description_title_text">'.$project_details[0]['title'].'</div>
				<p class="post_bid_project_description">'.$project_details[0]['description'].'</p>
				<p class="post_bid_info_outline"><span class="post_bid_info_topic">Skills:</span> '.$project_details[0]['skills'].'</p>
				<p class="post_bid_info_outline"><span class="post_bid_info_topic">Price:</span> '.$project_details[0]['price_range'].'</p>
				<p class="post_bid_info_outline"><span class="post_bid_info_topic">Preffered Location:</span> '.$project_details[0]['preferred_locations'].'</p>
				<p class="post_bid_info_outline"><span class="post_bid_info_topic">Time Remaining:</span> '.$time_remaining.'</p>
				<p class="post_bid_info_outline"><span class="post_bid_info_topic">Uploaded Files:</span> '.$file_path.'</p>';
		}
		
		/*
		- method for getting list of bids in post bid page
		- Auth: Dipanjan
		*/
		function getBidListInPostBidPage($project_id)
		{
			//get project details
			$project_details = $this->manage_content->getValue_where("project_info","*","project_id",$project_id);
			//get values from bid table
			$bids = $this->manage_content->getValueMultipleCondtn("bid_info","*",array("project_id","status"),array($project_id,1));
			//get total row value
			$bidRow = $this->manage_content->getRowValueMultipleCondition("bid_info",array("project_id","status"),array($project_id,1));
			
			//printing the header part
			echo '<div class="project_list_heading_bar">
					<span class="pull-left">Proposal List</span>
					<span class="pull-right">Total Bids: <b>'.$bidRow.'</b></span>
					<div class="clearfix"></div>
				</div>';
			
			//showing bid list of this project
			if(!empty($bids[0]))
			{
				foreach($bids as $bid)
				{
					//getting the personal info of bidder
					$perInfo = $this->manage_content->getValue_where("user_info","*","user_id",$bid['user_id']);
					//getting profile pic
					if(!empty($perInfo[0]['profile_image']))
					{
						$pro_img = $perInfo[0]['profile_image'];
					}
					else
					{
						$pro_img = 'img/dummy_profile.png';
					}
					//bidder skills
					$bidder_skills = substr($perInfo[0]['skills'],0,100).'...';
					//bid details
					$bid_text = substr($bid['description'],0,400).'...';
					
					//printing the info
					echo '<div class="project_details_outline post_bid_proposal_list">
							<div class="col-md-2 post_bid_proposal_image_outline">
								<img src="'.$pro_img.'" class="center-block" />
							</div>
							<div class="col-md-10 post_bid_proposal_outline">
								<div class="project_title_text post_bid_bidder_name"><a>'.$perInfo[0]['name'].'</a></div>';
						if($project_details[0]['award_bid_id'] == $bid['bid_id'] && $bid['awarded'] != 0)
						{
							echo '<p class="project_part_description col-sm-9" style="padding:0px">'.$bid_text.'</p>
								<p class="col-sm-3 awarded_logo_right"><img src="img/award2.png" alt="awarded" /></p>';
						}
						else
						{
							echo'<p class="project_part_description">'.$bid_text.'</p>';
						}
								
					echo	'<p class="post_bid_info_outline"><span class="post_bid_info_topic">Skills:</span> '.$bidder_skills.'</p>
								<p class="post_bid_info_outline"><span class="post_bid_info_topic">Price:</span> '.$bid['currency'].' '.$bid['amount'].'</p>
							</div>
							<div class="clearfix"></div>
						</div>';
				}
			}
			else
			{
				echo '<div class="profile_box_outline">
                    	<div class="portfolio_details">
							<div class="portfolio_part_heading">No Bids Till Now</div>
						</div>
					</div>';
			}
		}
		
		/*
		- method for getting list of bids in user project page
		- Auth: Dipanjan
		*/
		function getBidListInUserProjectPage($project_id)
		{
			//get project details
			$project_details = $this->manage_content->getValue_where("project_info","*","project_id",$project_id);
			//get values from bid table
			$bids = $this->manage_content->getValueMultipleCondtn("bid_info","*",array("project_id","status"),array($project_id,1));
			//get total row value
			$bidRow = $this->manage_content->getRowValueMultipleCondition("bid_info",array("project_id","status"),array($project_id,1));
			
			//printing the header part
			echo '<div class="project_list_heading_bar">
					<span class="pull-left">Proposal List</span>
					<span class="pull-right">Total Bids: <b>'.$bidRow.'</b></span>
					<div class="clearfix"></div>
				</div>';
			
			//showing bid list of this project
			if(!empty($bids[0]))
			{
				foreach($bids as $bid)
				{
					//getting the personal info of bidder
					$perInfo = $this->manage_content->getValue_where("user_info","*","user_id",$bid['user_id']);
					//getting profile pic
					if(!empty($perInfo[0]['profile_image']))
					{
						$pro_img = $perInfo[0]['profile_image'];
					}
					else
					{
						$pro_img = 'img/dummy_profile.png';
					}
					//bidder skills
					$bidder_skills = substr($perInfo[0]['skills'],0,100).'...';
					//bid details
					$bid_text = substr($bid['description'],0,400).'...';
					
					//printing the info
					echo '<div class="project_details_outline post_bid_proposal_list">
							<div class="col-md-2 post_bid_proposal_image_outline">
								<img src="'.$pro_img.'" class="center-block" />
							</div>';
						//checking for job is awarded or not
						if($project_details[0]['award_bid_id'] == $bid['bid_id'] && $bid['awarded'] != 0)
						{
							echo	'<div class="col-md-10 post_bid_proposal_outline">
									<div class="project_title_text post_bid_bidder_name">
										<a href="public-profile.php?uid='.$perInfo[0]['user_id'].'">'.$perInfo[0]['name'].'</a>
									</div>
									<p class="project_part_description col-sm-9" style="padding:0px">'.$bid_text.'</p>
									<p class="col-sm-3 awarded_logo_right"><img src="img/award2.png" alt="awarded" /></p>
									<p class="post_bid_info_outline"><span class="post_bid_info_topic">Skills:</span> '.$bidder_skills.'</p>
									<p class="post_bid_info_outline"><span class="post_bid_info_topic">Price:</span> '.$bid['currency'].' '.$bid['amount'].'</p>
									<p class="post_bid_info_outline">
										<div class="expand-bid pull-right">
											<a href="message.php?bid='.$bid['bid_id'].'">
												<p class="pull-right txt-14-1">MESSAGGE</p>
												<span class="pull-right glyphicon glyphicon-comment glyph"></span>
											</a>
										</div>
										<div class="expand-bid pull-right">
											<a href="userProjectFullBidDetails.php?bid='.$bid['bid_id'].'">
												<p class="pull-right txt-14-1">View</p>
												<span class="pull-right glyphicon glyphicon-resize-full glyph"></span>
											</a>
										</div>
									</p>';
						}
						else
						{
							echo	'<div class="col-md-10 post_bid_proposal_outline">
									<div class="project_title_text post_bid_bidder_name"><a>'.$perInfo[0]['name'].'</a></div>
									<p class="project_part_description">'.$bid_text.'</p>
									<p class="post_bid_info_outline"><span class="post_bid_info_topic">Skills:</span> '.$bidder_skills.'</p>
									<p class="post_bid_info_outline"><span class="post_bid_info_topic">Price:</span> '.$bid['currency'].' '.$bid['amount'].'</p>
									<p class="post_bid_info_outline">
										<div class="expand-bid pull-right">
											<a href="userProjectFullBidDetails.php?bid='.$bid['bid_id'].'">
												<p class="pull-right txt-14-1">AWARD</p>
												<span class="pull-right glyphicon glyphicon-ok-circle glyph"></span>
											</a>
										</div>
										<div class="expand-bid pull-right">
											<a href="userProjectFullBidDetails.php?bid='.$bid['bid_id'].'">
												<p class="pull-right txt-14-1">DECLINE</p>
												<span class="pull-right glyphicon glyphicon-remove glyph"></span>
											</a>
										</div>
										<div class="expand-bid pull-right">
											<a href="message.php?bid='.$bid['bid_id'].'">
												<p class="pull-right txt-14-1">MESSAGGE</p>
												<span class="pull-right glyphicon glyphicon-comment glyph"></span>
											</a>
										</div>
										<div class="expand-bid pull-right">
											<a href="userProjectFullBidDetails.php?bid='.$bid['bid_id'].'">
												<p class="pull-right txt-14-1">View</p>
												<span class="pull-right glyphicon glyphicon-resize-full glyph"></span>
											</a>
										</div>
									</p>';
						}
						
								
					echo	'</div>
							<div class="clearfix"></div>
						</div>';
				}
			}
			else
			{
				echo '<div class="profile_box_outline">
                    	<div class="portfolio_details">
							<div class="portfolio_part_heading">No Bids Till Now</div>
						</div>
					</div>';
			}
		}
		
		/*
		- method for updating project id
		- Auth: Dipanjan
		*/
		function updateProjectPost($bid_id)
		{
			//get the bid details from database
			$bid_details = $this->manage_content->getValue_where("bid_info","*","bid_id",$bid_id);
			echo '<textarea rows="20" name="bid_pro" class="form-control post_bid_textarea">'.$bid_details[0]['description'].'</textarea>
					<p>Cost</p>
					<input type="text" name="bid_price" placeholder="Only write the amount" class="form-control post_bid_textbox post_bid_smltext" value="'.$bid_details[0]['amount'].'"/>
					<p>Time Required</p>
					<select name="time_range" class="form-control post_bid_textbox">';
					echo '<option value="1 Day"'; if($bid_details[0]['time_range'] == '1 Day') { echo 'selected="selected"';} echo '>1 Day</option>';
					echo '<option value="3 Days"'; if($bid_details[0]['time_range'] == '3 Days') { echo 'selected="selected"';} echo '>3 Days</option>';
					echo '<option value="5 Days"'; if($bid_details[0]['time_range'] == '5 Days') { echo 'selected="selected"';} echo '>5 Days</option>';
					echo '<option value="1 Week"'; if($bid_details[0]['time_range'] == '1 Week') { echo 'selected="selected"';} echo '>1 Week</option>';
					echo '<option value="2 Weeks"'; if($bid_details[0]['time_range'] == '2 Weeks') { echo 'selected="selected"';} echo '>2 Weeks</option>';
					echo '<option value="1 Month"'; if($bid_details[0]['time_range'] == '1 Month') { echo 'selected="selected"';} echo '>1 Month</option>';
					echo '<option value="2 Months"'; if($bid_details[0]['time_range'] == '2 Months') { echo 'selected="selected"';} echo '>2 Months</option>';
					echo '<option value="Above 2 Months"'; if($bid_details[0]['time_range'] == 'Above 2 Months') { echo 'selected="selected"';} echo '>Above 2 Months</option>';
			echo 	'</select>
					<p>Attach File</p>
					<input type="file" name="file" class="post_bid_textbox"/>';
		}
		
		/*
		- method for getting job list by a user
		- Auth: Dipanjan
		*/
		function getUserJobList($user_id)
		{
			//getting bid list
			$awarded = $this->manage_content->getValue_where("award_info","*",'employer_id',$user_id);
			
			if(!empty($awarded))
			{
				foreach($awarded as $awarded_jobs)
				{
					//getting project details
					$pro_details = $this->manage_content->getValue_where("project_info","*","project_id",$awarded_jobs['project_id']);

					//getting user details of project post
					$project_user = $this->manage_content->getValue_where("user_info","*","user_id",$pro_details[0]['user_id']);
					
					//get the bid details
					$bid_details = $this->manage_content->getValue_where("bid_info","*","bid_id",$awarded_jobs['bid_id']);
					
					echo '<div class="project_details_outline post_bid_proposal_list">
							<div class="col-md-12 post_bid_proposal_outline">
								<div class="row">
									<div class="project_title_text post_bid_bidder_name col-md-12"><a href="post_bid.php?bid='.$awarded_jobs['bid_id'].'">'.$pro_details[0]['title'].'</a></div>
								</div>
								<div class="row">
									<div class="post_bid_bidder_name col-md-12">'.substr($pro_details[0]['description'],0,500).'</div>
								</div>
								<div class="row">
									<div class="col-md-3 col-lg-3 col-sm-4 col-xs-4">
										<p class="bid_specs"><span class="post_bid_info_topic"><span class="glyphicon glyphicon-euro glyph"></span> Price:</span> '.$pro_details[0]['currency'].$pro_details[0]['price_range'].'</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 submitted_on">
										<p class="bid_specs">Submitted on: '.$bid_details[0]['date'].'&nbsp&nbsp'.$bid_details[0]['time'].'</p>
									</div>
								</div>';
					
					//setting job accept or decline btn
					if($awarded_jobs['is_accepted'] != 1 && $awarded_jobs['is_declined'] != 1)
					{
						
						echo '<div class="pull-right">
								<button class="expand-bid pull-right txt-14-1" onclick="declineit('."'".$bid_details[0]['bid_id']."'".')">
									<p class="pull-right txt-14-1">Decline</p>
									<span class="pull-right glyphicon glyphicon-remove glyph"></span>
								</button>
							</div>
							<div class="pull-right">
								<button class="expand-bid pull-right txt-14-1" onclick="acceptit('."'".$bid_details[0]['bid_id']."'".')">
									<p class="pull-right txt-14-1">Accept</p>
									<span class="pull-right glyphicon glyphicon-ok-circle glyph"></span>
								</button>
							</div>';
					}
					if( $awarded_jobs['is_accepted'] == 1 )
					{
						//get the workroom info
						$workroom = $this->manage_content->getValue_where("workroom_info","*","project_id",$awarded_jobs['project_id']);
						
						echo '<div class="pull-right">
								<div class="bid-accept-status pull-right txt-14-1">
									<p class="pull-right txt-14-1">PROJECT ACCEPTED</p>
									<span class="pull-right glyphicon glyphicon-ok-circle glyph"></span>
								</div>
							</div>
							<div class="pull-right">
								<a href="workroom.php?wid='.$workroom[0]['workroom_id'].'">
									<div class="bid-accept-status bid-accept-status_h pull-right txt-14-1">
										<p class="pull-right txt-14-1">WORKROOM</p>
										<span class="pull-right glyphicon glyphicon-folder-open glyph"></span>
									</div>
								</a>
							</div>';
					}
					if( $awarded_jobs['is_declined'] == 1 )
					{
						echo '<div class="pull-right">
								<div class="bid-accept-status pull-right txt-14-1">
									<p class="pull-right txt-14-1">PROJECT DECLINED</p>
									<span class="pull-right glyphicon glyphicon-remove glyph"></span>
								</div>
							</div>';
					}
					echo '
							<div class="expand-bid pull-right">
								<a href="message.php?bid='.$bid_details[0]['bid_id'].'">
									<p class="pull-right txt-14-1">MESSAGGE</p>
									<span class="pull-right glyphicon glyphicon-comment glyph"></span>
								</a>
							</div>
							</div>
						<div class="clearfix"></div>
					</div>';
				}
			}
			else
			{
				echo '<div class="profile_box_outline">
                    	<div class="portfolio_details">
							<div class="portfolio_part_heading">No Jobs Found</div>
						</div>
					</div>';
			}
			
		}
		
		/*
		- method for getting job list by a user
		- Auth: Dipanjan
		*/
		function getMyProposals($user_id)
		{
			//getting bid list
			$bids = $this->manage_content->getValueMultipleCondtnDesc("bid_info","*",array("user_id","status"),array($user_id,1));
			if(!empty($bids[0]))
			{
				foreach($bids as $bid)
				{
					//getting project details
					$pro_details = $this->manage_content->getValue_where("project_info","*","project_id",$bid['project_id']);
					//getting user details of project post
					$project_user = $this->manage_content->getValue_where("user_info","*","user_id",$pro_details[0]['user_id']);
					
					
					
					echo '<div class="project_details_outline post_bid_proposal_list">
							<div class="col-md-12 post_bid_proposal_outline">
								<div class="row">
									<div class="project_title_text post_bid_bidder_name col-md-6"><a href="post_bid.php?bid='.$bid['bid_id'].'">'.$pro_details[0]['title'].'</a></div>
								</div>
								<div class="row">
									<div class="col-md-3 col-lg-3 col-sm-4 col-xs-4">
										<p class="bid_specs"><span class="post_bid_info_topic"><span class="glyphicon glyphicon-euro glyph"></span> Price:</span> '.$bid['currency'].$bid['amount'].'</p>
									</div>
									<div class="col-md-3 col-lg-4 col-sm-4 col-xs-4">
										<p class="bid_specs"><span class="post_bid_info_topic"><span class="glyphicon glyphicon-off glyph"></span>Time:</span> '.$bid['time_range'].'</p>
									</div>
									<div class="col-md-3 col-lg-3 col-sm-4 col-xs-4">
										<p class="bid_specs"><span class="post_bid_info_topic"><span class="glyphicon glyphicon-list-alt glyph"></span> Proposals:</span> 34</p>
									</div>
									<div class="col-md-2 col-lg-2">
										<p class="bid_specs"><span class="post_bid_info_topic"><span class="glyphicon glyphicon-info-sign glyph"></span> </span> Hiring</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 col-lg-4 col-sm-4 col-xs-4 submitted_on">
										<p class="bid_specs">Submitted on: '.$bid['date'].'&nbsp&nbsp'.$bid['time'].'</p>
									</div>
								</div>';
								
					//setting job accept or decline btn
					if($bid['awarded'] == 1 && $pro_details[0]['award_bid_id'] == $bid['bid_info'])
					{
						echo '<div class="col-md-6">
									<form action="v-includes/class.formData.php" method="post">
										<input type="hidden" name="bid" value="'.$bid['bid_id'].'" />
										<input type="hidden" name="fn" value="'.md5('accept_award').'" />
										<input type="submit" class="btn btn-success btn-lg" value="Accept This Job" />
									</form>
								</div>
								<div class="col-md-6">
									<form action="v-includes/class.formData.php" method="post">
										<input type="hidden" name="bid" value="'.$bid['bid_id'].'" />
										<input type="hidden" name="fn" value="'.md5('decline_award').'" />
										<input type="submit" class="btn btn-danger btn-lg" value="Decline The Job" />
									</form>
								</div>';
					}
					echo '</div>
						<div class="clearfix"></div>
					</div>';
				}
			}
			else
			{
				echo '<div class="profile_box_outline">
                    	<div class="portfolio_details">
							<div class="portfolio_part_heading">No Jobs Found</div>
						</div>
					</div>';
			}
		}
		
		/*
		- method for getting bid full details
		- Auth: Dipanjan
		*/
		function getBidFullDetails($bid_id)
		{
			//get details of bid
			$bid_details = $this->manage_content->getValueMultipleCondtn("bid_info","*",array("bid_id","status"),array($bid_id,1));
			if(!empty($bid_details[0]))
			{
				//getting user details
				$userDetails = $this->manage_content->getValue_where("user_info","*","user_id",$bid_details[0]['user_id']);
				//getting project details
				$project_details = $this->manage_content->getValue_where("project_info","*","project_id",$bid_details[0]['project_id']);
				//getting profile pic
				if(!empty($userDetails[0]['pro_image']))
				{
					$pro_pic = $userDetails[0]['pro_image'];
				}
				else
				{
					$pro_pic = 'img/dummy_profile.png';
				}
				//getting uploaded file
				if(!empty($bid_details[0]['file']))
				{
					$filename = '<a href="'.$bid_details[0]['file'].'" target="_blank">'.$bid_details[0]['original_file'].'</a>';
				}
				else
				{
					$filename = 'No Files';
				}
				
				echo '<div class="full_bid_outline">
						<div class="col-md-2 post_bid_proposal_image_outline">
							<img src="'.$pro_pic.'" class="center-block">
						</div>
						<div class="col-md-10 post_bid_proposal_outline">
							<div class="project_description_title_text"><a href="public-profile.php?uid='.$userDetails[0]['user_id'].'">'.$userDetails[0]['name'].'</a></div>
							<p class="post_bid_project_description">'.$bid_details[0]['description'].'</p>
							<p class="post_bid_info_outline">
								<span class="post_bid_info_topic">Skills:</span> '.$userDetails[0]['skills'].'
							</p>
							<p class="post_bid_info_outline">
								<span class="post_bid_info_topic">Proposal Amount:</span> '.$bid_details[0]['currency'].$bid_details[0]['amount'].'
							</p>
							<p class="post_bid_info_outline">
								<span class="post_bid_info_topic">Time Frame:</span> '.$bid_details[0]['time_range'].'
							</p>
							<p class="post_bid_info_outline">
								<span class="post_bid_info_topic">Bid Posted On:</span> '.$bid_details[0]['date'].' | '.$bid_details[0]['time'].'
							</p>
							<p class="post_bid_info_outline">
								<span class="post_bid_info_topic">Uploaded File:</span> '.$filename.'
							</p>';
							if($project_details[0]['award_bid_id'] == $bid_details[0]['bid_id'] && $bid_details[0]['awarded'] != 0)
							{
								echo '<p class="post_bid_info_outline"><img src="img/award2.png" alt="awarded" /></p>';
							}
							else if(empty($project_details[0]['award_bid_id']) &&  $bid_details[0]['awarded'] == 0)
							{
								echo '<p class="post_bid_info_outline"><button class="btn btn-success btn-lg" id="award_bid">Award This Bid</button></p>';
							}
					echo '</div>
						<div class="clearfix"></div>
					</div>';
			}
			else
			{
				echo '<div class="profile_box_outline">
                    	<div class="portfolio_details">
							<div class="portfolio_part_heading">No Bid Details Found</div>
						</div>
					</div>';
			}
		}
		
		/*
		- method for getting project list of user
		- Auth: Dipanjan
		*/
		function getUserProjectList($user_id)
		{
			//get values from database
			$projects = $this->manage_content->getValueMultipleCondtnDesc("project_info","*",array("user_id","status"),array($user_id,1));
			if(!empty($projects[0]))
			{
				foreach($projects as $project)
				{
					echo '<div class="portfolio_part_outline">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="portfolio_part_heading"><a href="userProjectDetails.php?pid='.$project['project_id'].'">'.$project['title'].' </a><span class="portfolio_part_share"><a href="edit_project.php?pid='.$project['project_id'].'">Edit</a></span></div>
                                <p>'.substr($project['description'],0,500).'</p>
								<p>Posted On: '.$project['date'].' | '.$project['time'].'</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>';
				}
			}
			else
			{
				echo '<div class="portfolio_part_heading">No Projects Found</div>';
			}
		}
		
		/*
		- method for getting user personal info
		- Auth: Dipanjan
		*/
		function getUserPersonalInfo($user_id)
		{
			//get user personal info details
			$user = $this->manage_content->getValue_where("user_info","*","user_id",$user_id);
			if(!empty($user[0]))
			{
				echo '<div class="form-group">
						<label class="col-md-3 pp_form_label control-label">First Name</label>
						<div class="col-md-8">
						  <input type="text" class="form-control pp_form_textbox" placeholder="Enter Your Name" name="name" value="'.$user[0]['name'].'">
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Gender</label>
						<div class="col-md-8">
						  <div class="col-md-2"><input type="radio"  name="gender" value="male" '; if($user[0]['gender'] == 'male') { echo 'checked="checked"'; } echo '>Male</div>
						  <div class="col-md-2"><input type="radio"  name="gender" value="female" '; if($user[0]['gender'] == 'female') { echo 'checked="checked"'; } echo '>Female</div>
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Date of Birth</label>
						<div class="col-md-4">
						  <input type="text" class="form-control pp_form_textbox" name="dob" id="per_date" value="'.$user[0]['dob'].'">
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Contact No.</label>
						<div class="col-md-4">
						  <input type="text" class="form-control pp_form_textbox" name="contact" placeholder="Contact No." value="'.$user[0]['contact_no'].'">
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Address Line 1</label>
						<div class="col-md-8">
						  <input type="text" class="form-control pp_form_textbox" name="add1" placeholder="Address Line 1" value="'.$user[0]['addr_line1'].'">
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Address Line 2</label>
						<div class="col-md-8">
						  <input type="text" class="form-control pp_form_textbox" name="add2" placeholder="Address Line 2" value="'.$user[0]['addr_line2'].'">
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Pincode</label>
						<div class="col-md-3">
						  <input type="text" class="form-control pp_form_textbox" name="pin" placeholder="Pincode" value="'.$user[0]['pincode'].'">
						</div>
						<label class="col-md-2 pp_form_label control-label">City</label>
						<div class="col-md-3">
						  <input type="text" class="form-control pp_form_textbox" name="city" placeholder="City" value="'.$user[0]['city'].'">
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-md-3 pp_form_label control-label">State</label>
						<div class="col-md-3">
						  <input type="text" class="form-control pp_form_textbox" name="state" placeholder="State" value="'.$user[0]['state'].'">
						</div>
						<label class="col-md-2 pp_form_label control-label">Country</label>
						<div class="col-md-3">
						  <input type="text" class="form-control pp_form_textbox" name="country" placeholder="Country" value="'.$user[0]['country'].'">
						</div>
					  </div>';
			}
		}
		
		/*
		- method for getting user profile info
		- Auth: Dipanjan
		*/
		function getUserProfileInfo($user_id)
		{
			//get user personal info details
			$user = $this->manage_content->getValue_where("user_info","*","user_id",$user_id);
			if(!empty($user[0]))
			{
				//checking the values of skills selected
				if(!empty($user[0]['skills']))
				{
					$skill = explode(',',$user[0]['skills']);
				}
				else
				{
					$skill = array();
				}
				
				echo '<div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Skills<span class="man_field">**</span></label>
						<div class="col-md-8">
						  <div class="myskills_details ep_skills_list col-md-12" id="skills_list_value">';
						
						if(!empty($skill))
						{
							foreach($skill as $key=>$value)
							{
								echo '<div class="myskills_box pull-left">'.$value.'</div>';
							}
						}
							
							
				echo   	'</div>
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-md-offset-3 col-md-8">
							<div class="form-control pp_form_textbox scrollable-content">
								<label class="checkbox col-md-4">
								  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill1"'; if(in_array('Skill1',$skill)) { echo 'checked="checked"'; } echo '> Skill1
								</label>
								<label class="checkbox col-md-4">
								  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill2"'; if(in_array('Skill2',$skill)) { echo 'checked="checked"'; } echo '> Skill2
								</label>
								<label class="checkbox col-md-4">
								  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill3"'; if(in_array('Skill3',$skill)) { echo 'checked="checked"'; } echo '> Skill3
								</label>
								<label class="checkbox col-md-4">
								  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill4"'; if(in_array('Skill4',$skill)) { echo 'checked="checked"'; } echo '> Skill4
								</label>
								<label class="checkbox col-md-4">
								  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill5"'; if(in_array('Skill5',$skill)) { echo 'checked="checked"'; } echo '> Skill5
								</label>
								<label class="checkbox col-md-4">
								  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill6"'; if(in_array('Skill6',$skill)) { echo 'checked="checked"'; } echo '> Skill6
								</label>
								<label class="checkbox col-md-4">
								  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill7"'; if(in_array('Skill7',$skill)) { echo 'checked="checked"'; } echo '> Skill7
								</label>
								<label class="checkbox col-md-4">
								  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill8"'; if(in_array('Skill8',$skill)) { echo 'checked="checked"'; } echo '> Skill8
								</label>
								<label class="checkbox col-md-4">
								  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill9"'; if(in_array('Skill9',$skill)) { echo 'checked="checked"'; } echo '> Skill9
								</label>
								<label class="checkbox col-md-4">
								  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill10"'; if(in_array('Skill10',$skill)) { echo 'checked="checked"'; } echo '> Skill10
								</label>
								<label class="checkbox col-md-4">
								  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill11"'; if(in_array('Skill11',$skill)) { echo 'checked="checked"'; } echo '> Skill11
								</label>
								<label class="checkbox col-md-4">
								  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill12"'; if(in_array('Skill12',$skill)) { echo 'checked="checked"'; } echo '> Skill12
								</label>
							</div>
							<div class="signup-form-error" id="err_pro_skill"></div>
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Hourly Rate<span class="man_field">**</span></label>
						<div class="col-md-3">
						  <input type="text" class="form-control pp_form_textbox" name="hourly_rate" id="pro_hour" value="'.$user[0]['hourly_rate'].'">
						  <div class="signup-form-error" id="err_pro_hour"></div>
						</div>
						<label class="col-md-3">in $/hr</label>
					  </div>
					  <div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Your Terms</label>
						<div class="col-md-8">
						  <textarea rows="3" class="form-control pp_form_textarea" name="terms">'.$user[0]['terms'].'</textarea>
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Availability<span class="man_field">**</span></label>
						<div class="col-md-8">
						  <select class="form-control pp_form_selectbox" name="availability">
							<option value="Full Time"'; if($user[0]['availability'] == 'Full Time') { echo 'selected="selected"'; } echo '>Full Time</option>
							<option value="Part Time"'; if($user[0]['availability'] == 'Part Time') { echo 'selected="selected"'; } echo '>Part Time</option>
						</select>
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Certifications</label>
						<div class="col-md-5">
						  <input type="text" class="form-control pp_form_textbox" name="certi" value="'.$user[0]['no_certificates'].'">
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Interested Topics</label>
						<div class="col-md-8">
						  <input type="text" class="form-control pp_form_textbox" name="int_topic" value="'.$user[0]['interested_topic'].'">
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Profile Description<span class="man_field">**</span></label>
						<div class="col-md-8">
						  <textarea rows="6" class="form-control pp_form_textarea" name="description" id="pro_des">'.$user[0]['description'].'</textarea>
						  <div class="signup-form-error" id="err_pro_des"></div>
						</div>
					  </div>';
			}
		}
		
		/*
		- method for getting total skill list
		- Auth: Dipanjan
		*/
		function getAllSkillListSelected($userSkills)
		{
			/*//checking the values of skills selected
			if(!empty($userSkills))
			{
				$skill = explode(',',$userSkills);
			}
			else
			{
				$skill = array();
			}
			
			echo '<label class="checkbox col-md-4">
					  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill1"'; if(in_array('Skill1',$skill)) { echo 'selected="selected"'; } echo '> Skill1
					</label>
					<label class="checkbox col-md-4">
					  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill2"'; if(in_array('Skill2',$skill)) { echo 'selected="selected"'; } echo '> Skill2
					</label>
					<label class="checkbox col-md-4">
					  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill3"'; if(in_array('Skill3',$skill)) { echo 'selected="selected"'; } echo '> Skill3
					</label>
					<label class="checkbox col-md-4">
					  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill4"'; if(in_array('Skill4',$skill)) { echo 'selected="selected"'; } echo '> Skill4
					</label>
					<label class="checkbox col-md-4">
					  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill5"'; if(in_array('Skill5',$skill)) { echo 'selected="selected"'; } echo '> Skill5
					</label>
					<label class="checkbox col-md-4">
					  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill6"'; if(in_array('Skill6',$skill)) { echo 'selected="selected"'; } echo '> Skill6
					</label>
					<label class="checkbox col-md-4">
					  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill7"'; if(in_array('Skill7',$skill)) { echo 'selected="selected"'; } echo '> Skill7
					</label>
					<label class="checkbox col-md-4">
					  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill8"'; if(in_array('Skill8',$skill)) { echo 'selected="selected"'; } echo '> Skill8
					</label>
					<label class="checkbox col-md-4">
					  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill9"'; if(in_array('Skill9',$skill)) { echo 'selected="selected"'; } echo '> Skill9
					</label>
					<label class="checkbox col-md-4">
					  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill10"'; if(in_array('Skill10',$skill)) { echo 'selected="selected"'; } echo '> Skill10
					</label>
					<label class="checkbox col-md-4">
					  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill11"'; if(in_array('Skill11',$skill)) { echo 'selected="selected"'; } echo '> Skill11
					</label>
					<label class="checkbox col-md-4">
					  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill12"'; if(in_array('Skill12',$skill)) { echo 'selected="selected"'; } echo '> Skill12
					</label>';*/
					
					echo '<div class="form-group">
						<div class="col-md-offset-3 col-md-8"><div class="form-control pp_form_textbox scrollable-content"><label class="checkbox col-md-4">
                                              <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill1"> Skill1
                                            </label>
                                            <label class="checkbox col-md-4">
                                              <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill2"> Skill2
                                            </label>
                                            <label class="checkbox col-md-4">
                                              <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill3"> Skill3
                                            </label>
                                            <label class="checkbox col-md-4">
                                              <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill4"> Skill4
                                            </label>
                                            <label class="checkbox col-md-4">
                                              <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill5"> Skill5
                                            </label>
                                            <label class="checkbox col-md-4">
                                              <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill6"> Skill6
                                            </label>
                                            <label class="checkbox col-md-4">
                                              <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill7"> Skill7
                                            </label>
                                            <label class="checkbox col-md-4">
                                              <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill8"> Skill8
                                            </label>
                                            <label class="checkbox col-md-4">
                                              <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill9"> Skill9
                                            </label>
                                            <label class="checkbox col-md-4">
                                              <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill10"> Skill10
                                            </label>
                                            <label class="checkbox col-md-4">
                                              <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill11"> Skill11
                                            </label>
                                            <label class="checkbox col-md-4">
                                              <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skill12"> Skill12
                                            </label></div></div>
					  </div>';
		}
		
		/*
		- method for getting user portfolio info
		- Auth: Dipanjan
		*/
		function getUserPortInfo($port_id)
		{
			//get values from database
			$port_details = $this->manage_content->getValue_where("user_portfolio","*","id",$port_id);
			if(!empty($port_details[0]))
			{
				echo '<div class="form-group">
						<label class="col-md-3 pp_form_label control-label">File</label>
						<div class="col-md-8">
						  <input type="file" name="file" class="form-control pp_form_textbox pp_form_file_upload">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Skills Required</label>
						<div class="col-md-8">
						  <input type="text" name="skills" class="form-control pp_form_textbox" value="'.$port_details[0]['skills'].'">
						</div>
					  </div>
					<div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Description</label>
						<div class="col-md-8">
						  <textarea class="form-control pp_form_textbox pp_text_area" name="des">'.$port_details[0]['description'].'</textarea>
						</div>
					</div>';
			}
		}
		
		/*
		- method for getting user employment info
		- Auth: Dipanjan
		*/
		function getUserEmpInfo($emp_id)
		{
			//get values from database
			$emp_details = $this->manage_content->getValue_where("user_employment","*","id",$emp_id);
			if(!empty($emp_details[0]))
			{
				echo '<div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Company Name</label>
						<div class="col-md-8">
						  <input type="text" class="form-control pp_form_textbox" name="comp" value="'.$emp_details[0]['com_name'].'">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Position</label>
						<div class="col-md-8">
						  <input type="text" class="form-control pp_form_textbox" name="pos" value="'.$emp_details[0]['position'].'">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Start Date</label>
						<div class="col-md-4">
							<input type="text" class="form-control pp_form_textbox date_range" name="start" value="'.$emp_details[0]['start_date'].'">
						</div>
					</div>
					<div class="form-group">
					   <label class="col-md-3 pp_form_label control-label">End Date</label>
						<div class="col-md-4">
							<input type="text" class="form-control pp_form_textbox date_range" name="end" value="'.$emp_details[0]['end_date'].'">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Descrition</label>
						<div class="col-md-8">
						  <textarea class="form-control pp_form_textbox pp_text_area" name="des">'.$emp_details[0]['description'].'</textarea>
						</div>
					</div>';
			}
		}
		
		/*
		- method for getting user education info
		- Auth: Dipanjan
		*/
		function getUserEduInfo($edu_id)
		{
			//get values from database
			$edu_details = $this->manage_content->getValue_where("user_education","*","id",$edu_id);
			if(!empty($edu_details[0]))
			{
				echo '<div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Institution Name</label>
						<div class="col-md-8">
						  <input type="text" class="form-control pp_form_textbox" name="inst" value="'.$edu_details[0]['inst_name'].'">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Degree</label>
						<div class="col-md-8">
						  <input type="text" class="form-control pp_form_textbox" name="deg" value="'.$edu_details[0]['degree'].'">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Start Date</label>
						<div class="col-md-4">
							<input type="text" class="form-control pp_form_textbox date_range" name="start" value="'.$edu_details[0]['start_date'].'">
						</div>
					</div>
					<div class="form-group">
					   <label class="col-md-3 pp_form_label control-label">End Date</label>
						<div class="col-md-4">
							<input type="text" class="form-control pp_form_textbox date_range" name="end" value="'.$edu_details[0]['end_date'].'">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 pp_form_label control-label">Descrition</label>
						<div class="col-md-8">
						  <textarea class="form-control pp_form_textbox pp_text_area" name="des">'.$edu_details[0]['description'].'</textarea>
						</div>
					</div>';
			}
		}
		
		/*
		- method for getting project details
		- Auth: Dipanjan
		*/
		function getEditProjectDetails($pid)
		{
			//getting project details
			$proDetails = $this->manage_content->getValue_where('project_info','*','project_id',$pid);
			if(!empty($proDetails[0]))
			{
				//getting sub category of selected category
				$sub_cat = array('Sub Category 1','Sub Category 2','Sub Category 3','Sub Category 4','Sub Category 5');
				//getting project skills
				//checking the values of skills selected
				if(!empty($proDetails[0]['skills']))
				{
					$skill = explode(',',$proDetails[0]['skills']);
				}
				else
				{
					$skill = array();
				}
				//getting preferred location
				if($proDetails[0]['preferred_locations'] == 'Any Where')
				{
					$pre_loc = '';
				}
				else
				{
					$pre_loc = $proDetails[0]['preferred_locations'];
				}
				//calculate project duration time
				/*$datetime1 = new DateTime($proDetails[0]['date']);
				$datetime2 = new DateTime($proDetails[0]['ending_date']);
				$interval = $datetime1->diff($datetime2);
				$int_day =  $interval->format('%a');*/
				
				echo '<div class="form-group pp_form_group">
						<label class="pp_form_label">Project Title</label>
						<input type="text" class="form-control col-md-6 pp_form_textbox" name="pp_title" value="'.$proDetails[0]['title'].'"/>
						<div class="clearfix"></div>
					</div>
					<div class="form-group pp_form_group">
						<label class="pp_form_label">Describe It</label>
						<textarea rows="6" class="form-control pp_form_textarea" name="pp_des">'.$proDetails[0]['description'].'</textarea>
						<div class="clearfix"></div>
					</div>
					<div class="form-group pp_form_group">
						<label class="pp_form_label">Select the category</label>
						<div>
							<select class="form-control pp_form_selectbox pull-left" id="pro_category" name="pro_category">
								<option value="Category1"'; if($proDetails[0]['category'] == 'Category1') { echo 'selected="selected"'; } echo'>Category 1</option>
								<option value="Category2"'; if($proDetails[0]['category'] == 'Category2') { echo 'selected="selected"'; } echo'>Category 2</option>
								<option value="Category3"'; if($proDetails[0]['category'] == 'Category3') { echo 'selected="selected"'; } echo'>Category 3</option>
								<option value="Category4"'; if($proDetails[0]['category'] == 'Category4') { echo 'selected="selected"'; } echo'>Category 4</option>
								<option value="Category5"'; if($proDetails[0]['category'] == 'Category5') { echo 'selected="selected"'; } echo'>Category 5</option>
							</select>
							<select class="form-control pp_form_selectbox pull-left" id="pro_sub_category" name="pro_sub_category" style="display: block;">';
							foreach($sub_cat as $key=>$value)
							{
								echo '<option value="'.$value.'"'; if($proDetails[0]['sub_category'] == $value) { echo 'selected="selected"'; } echo'>'.$value.'</option>';
							}
								
						echo '</select>
							<div class="clearfix"></div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group pp_form_group">
						<label class="pp_form_label">Upload File</label>
						<input type="file" name="file" />
						<div class="clearfix"></div>
					</div>
					<div class="form-group pp_form_group">
						<label class="pp_form_label">Request specific skills or groups</label>
						
						<div class="myskills_details ep_skills_list col-md-12" id="skills_list_value">';
						if(!empty($skill))
						{
							foreach($skill as $key=>$value)
							{
								echo '<div class="myskills_box pull-left">'.$value.'</div>';
							}
						}
					echo '</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group pp_form_group">
						<div class="form-control pp_form_textbox scrollable-content col-md-12">
							<label class="checkbox col-md-4">
							  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skills 1"'; if(in_array('Skills 1',$skill)) { echo 'checked="checked"'; } echo '> Skill1
							</label>
							<label class="checkbox col-md-4">
							  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skills 2"'; if(in_array('Skills 2',$skill)) { echo 'checked="checked"'; } echo '> Skill2
							</label>
							<label class="checkbox col-md-4">
							  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skills 3"'; if(in_array('Skills 3',$skill)) { echo 'checked="checked"'; } echo '> Skill3
							</label>
							<label class="checkbox col-md-4">
							  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skills 4"'; if(in_array('Skills 4',$skill)) { echo 'checked="checked"'; } echo '> Skill4
							</label>
							<label class="checkbox col-md-4">
							  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skills 5"'; if(in_array('Skills 5',$skill)) { echo 'checked="checked"'; } echo '> Skill5
							</label>
							<label class="checkbox col-md-4">
							  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skills 6"'; if(in_array('Skills 6',$skill)) { echo 'checked="checked"'; } echo '> Skill6
							</label>
							<label class="checkbox col-md-4">
							  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skills 7"'; if(in_array('Skills 7',$skill)) { echo 'checked="checked"'; } echo '> Skill7
							</label>
							<label class="checkbox col-md-4">
							  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skills 8"'; if(in_array('Skills 8',$skill)) { echo 'checked="checked"'; } echo '> Skill8
							</label>
							<label class="checkbox col-md-4">
							  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skills 9"'; if(in_array('Skills 9',$skill)) { echo 'checked="checked"'; } echo '> Skill9
							</label>
							<label class="checkbox col-md-4">
							  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skills 10"'; if(in_array('Skills 10',$skill)) { echo 'checked="checked"'; } echo '> Skill10
							</label>
							<label class="checkbox col-md-4">
							  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skills 11"'; if(in_array('Skills 11',$skill)) { echo 'checked="checked"'; } echo '> Skill11
							</label>
							<label class="checkbox col-md-4">
							  <input type="checkbox" name="skills[]" class="skills_checkbox" value="Skills 12"'; if(in_array('Skills 12',$skill)) { echo 'checked="checked"'; } echo '> Skill12
							</label>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group pp_form_group">
						<label class="pp_form_label">Preferred Location</label>
						<input type="text" class="form-control col-md-6 pp_form_textbox" name="pp_prefer_loc" value="'.$pre_loc.'"/>
						<div class="clearfix"></div>
					</div>
					<div class="form-group pp_form_group">
						<label class="pp_form_label">Job will close on</label>
						<input type="text" class="form-control pp_form_multiple_selectbox extend_date" name="pp_project_validity" value="'.$proDetails[0]['ending_date'].'"/>
						<div class="clearfix"></div>
					</div>';
			}
		}
		
		/*
		- method for getting faq page content
		- Auth: Dipanjan
		*/
		function getFaqContent($page,$search_value)
		{
			if(!empty($search_value))
			{
				//get values from database
				$faqDetails = $this->manage_content->getValue_likely('faq_info','*','question',$search_value);
				//setting pagination page url
				$pageUrl = 'faq.php?search_value='.$search_value.'&';
			}
			else
			{
				//get values from database
				$faqDetails = $this->manage_content->getValue_where('faq_info','*','status',1);
				//setting pagination page url
				$pageUrl = 'faq.php?';
			}
			if(!empty($faqDetails[0]))
			{
				//initialize a variable
				$faqCount = 0;
				//setting max no of index
				$max_index = 5;
				$limit = 10;
				//calculate the rows number to be shown in this page
				$startNo = $page*$limit;
				$endNo = ($page + 1)*$limit;
				//count total result
				$total = count($faqDetails);
				
				echo '<div class="faq_qusetions_outline">';
				foreach($faqDetails as $faqDetail)
				{
					if($faqCount >= $startNo && $faqCount < $endNo)
					{
						echo '<div class="accordion-group faq_qusetions_part">
                        	<h5 class="accordion-heading faq_qusetions_text">
                            	'.($faqCount + 1).'. <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse'.($faqCount + 1).'">'.$faqDetail['question'].'</a>
                            </h5>
                            <p class="faq_qusetions_para">'.$faqDetail['date'].' | '.$faqDetail['time'].'</p>
                            
                            <div id="collapse'.($faqCount + 1).'" class="accordion-body collapse">
                            	<p class="faq_answer_outline">'.$faqDetail['answer'].'</p>
                            </div>
                        </div>';
					}
					//increment the counter
					$faqCount++;
				}
				echo '</div>';
				//calling pagination
				$this->pagination2($page,$total,$pageUrl,$max_index,$limit);
			}
		}
		
		/*
		- method for getting dynamic page content
		- Auth: Dipanjan
		*/
		function getDynamicPageContent($page_id)
		{
			//get values from database
			$getValues = $this->manage_content->getValue_where('mypage','*','page_id',$page_id);
			if(!empty($getValues[0]))
			{
				echo '<h2 class="post_project_top_heading">'.$getValues[0]['page_name'].'</h2>
						<div class="hiring_freelancer_text_outline text_page_bg">'.$getValues[0]['page_content'].'</div>';
			}
		}
		
		/*
		- method for getting faq link in contact page
		- Auth: Dipanjan
		*/
		function getFaqLinkInContactPage()
		{
			//get all values in descending order
			$faqDetails = $this->manage_content->getValue_descendingLimit('faq_info','*',10);
			if(!empty($faqDetails[0]))
			{
				foreach($faqDetails as $faqDetail)
				{
					echo '<a href="faq.php"><p>'.$faqDetail['question'].'</p></a>';
				}
			}
		}
		
		/*
		- method for getting user running project list
		- Auth: Dipanjan
		*/
		function getRunningProjectList($user_id)
		{
			//get values from database
			$running_projects = $this->manage_content->getValueOrMultipleCondtn('workroom_info','*',array('emp_user_id','con_user_id'),array($user_id,$user_id));
			if(!empty($running_projects[0]))
			{
				foreach($running_projects as $pro)
				{
					//getting project name
					$pro_details = $this->manage_content->getValue_where('project_info','*','project_id',$pro['project_id']);
					echo '<li><a href="message.php?wid='.$pro['workroom_id'].'">'.substr($pro_details[0]['title'],0,30).'</a></li>';
				}
			}
			else
			{
				echo '<li><a href="#">No Running Project List</a></li>';
			}
		}
		
		/*
		- method for getting user info
		- Auth: Dipanjan
		*/
		function getUserInfoRow($user_id)
		{
			$infoRow = $this->manage_content->getValue_where("user_info","*","user_id",$user_id);
			if(!empty($infoRow[0]))
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}
		
		/*
		- method for getting user id of portfolio id
		- Auth: Dipanjan
		*/
		function getUserIdOfPortid($port_id)
		{
			$portRow = $this->manage_content->getValue_where("user_portfolio","*","id",$port_id);
			return $portRow[0]['user_id'];
		}
		
		/*
		- method for getting user id of employment id
		- Auth: Dipanjan
		*/
		function getUserIdOfEmpid($emp_id)
		{
			$portRow = $this->manage_content->getValue_where("user_employment","*","id",$emp_id);
			return $portRow[0]['user_id'];
		}
		
		/*
		- method for getting user id of education id
		- Auth: Dipanjan
		*/
		function getUserIdOfEduid($edu_id)
		{
			$portRow = $this->manage_content->getValue_where("user_education","*","id",$edu_id);
			return $portRow[0]['user_id'];
		}
		
		/*
		- method for getting user id of this bid's project
		- Auth: Dipanjan
		*/
		function getUserIdOfBidid($bid_id)
		{
			$bidRow = $this->manage_content->getValue_where("bid_info","*","bid_id",$bid_id);
			//getting user id of this project id
			$project_info = $this->manage_content->getValue_where("project_info","*","project_id",$bidRow[0]['project_id']);
			return array($project_info[0]['user_id'],$bidRow[0]['project_id']);
		}
		
		/*
		- method for getting project status
		- Auth: Dipanjan
		*/
		function getProjectStatus($pro_id)
		{
			$proDetails = $this->manage_content->getValue_where("project_info","*","project_id",$pro_id);
			return $proDetails[0];
		}
		
		/*
		- method for getting project id
		- Auth: Dipanjan
		*/
		function getProjectIdFromBid($bid_id)
		{
			$bidRow = $this->manage_content->getValue_where("bid_info","*","bid_id",$bid_id);
			return $bidRow[0]['project_id'];
		}
		
		/*
		- method for getting user id from project id
		- Auth: Dipanjan
		*/
		function getUserIdFromPro($pid)
		{
			$proRow = $this->manage_content->getValue_where("project_info","*","project_id",$pid);
			return $proRow[0]['user_id'];
		}
		
		/*
		- method for getting user id from bid id
		- Auth: Dipanjan
		*/
		function getUserIdFromBid($bid)
		{
			$proRow = $this->manage_content->getValue_where("bid_info","*","bid_id",$bid);
			return $proRow[0]['user_id'];
		}
		
		/*
		- method for getting user id verify
		- Auth: Dipanjan
		*/
		function getUserIdChecking($user_id)
		{
			$userRow = $this->manage_content->getValue_where("user_credentials","*","user_id",$user_id);
			if(!empty($userRow[0]))
			{
				return 1;
			}
			else
			{
				return 0;
			}
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
		
		/*
		 * method to get the user name from the database
		 * @inputParam UserId
		 * @output string
		 * Auth Singh
		 */
		 public function getUserName($user_id)
		 {
		 	$username = $this->manage_content->getValue_where("user_credentials","username","user_id",$user_id);
			return $username[0]['username'];
		 }
		 
		 /*
		 * method to get the last login time from the database
		 * @inputParam UserId
		 * @output string
		 * Auth Singh
		 */
		 public function getLastLoginTime($user_id)
		 {
		 	$date = $this->manage_content->getValue_where("user_credentials","*","user_id",$user_id);
			return $date[0]['date'];
		 }
		 
		 /*
		  * method to get the last login details
		  * create the full UI
		  * @param bid id
		  * Auth Singh 
		  */
		  public function getLastLogin($bid)
		  {
			  //get the bidders name and project id from bid info table
			  $bid_detail = $this->manage_content->getValue_where("bid_info","*","bid_id",$bid);
			  $contractor = $this->getUserName($bid_detail[0]['user_id']);
			  
			  //get the contractor name from project info table
			  $project_info = $this->manage_content->getValue_where("project_info","*","project_id",$bid_detail[0]['project_id']);
			  $employer = $this->getUserName($project_info[0]['user_id']);
			  
			  echo '<div class="profile_box_outline project_list_leftbar_outline">
					<div class="profile_box_heading">Last Login</div>
					<div class="last-login-container">
						<div class="l-l-username">'.$employer.'</div>
						<div class="l-l-date">'.$this->getLastLoginTime($project_info[0]['user_id']).'</div>
						<div class="l-l-username">'.$contractor.'</div>
						<div class="l-l-date">'.$this->getLastLoginTime($bid_detail[0]['user_id']).'</div>
					</div>
				</div>';
		  }
		  
	 	 /*
		- method for getting messages from the database
		- generates the full UI
		- Auth: Singh
		*/
		function getAllMessages($bid_id,$startPoint,$limit)
		{
			$sort_by = 'date';
			$startPoint = $startPoint*$limit;
			$messages = $this->manage_content->getValueWhere_sorted("chat_info","*","bid_id",$bid_id,$sort_by,$startPoint,$limit);
			
			if( !empty($messages) )
			{
				foreach( $messages as $message )
				{
					if( $message['sender'] == $_SESSION['user_id'] )
					{
						echo '<div class="chat_part_outline">
                                <div class="col-md-2 col-sm-2 col-xs-2">
                                    <img src="img/dummy_profile.jpg" class="chat_user_image"/>
                                </div>
                                <div class="col-md-10 col-sm-10 col-xs-10">
                                    <div class="chat_user_msg">
                                        <p>'.nl2br($message['message']).'</p>
                                        <p class="pull-right chat_user_msg_date"><span>'.$message['date'].'</span></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>';
					}
					else
					{
						echo '<div class="chat_part_outline">
                                <div class="col-md-10 col-sm-10 col-xs-10">
                                    <div class="chat_user_msg">
                                        <p>'.nl2br($message['message']).'</p>
                                         <p class="pull-right chat_user_msg_date"><span>'.$message['date'].'</span></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-2">
                                    <img src="img/dummy_profile1.jpg" class="chat_user_image"/>
                                </div>
                                <div class="clearfix"></div>
                            </div>';
							
							
							//set the status to read
							$this->manage_content->updateValueWhere("chat_info","status",0,"id",$message['id']);
					}
					
				}
			}
			else
			{
				echo "Please a message to start the conversation.";
			}
		}

		/*
		- method for getting messages-list from the database
		- generates the full UI
		- Auth: Singh
		*/
		function getMessageList($user_id,$startPoint,$limit)
		{
			$sort_by = 'date';
			$startPoint = $startPoint*$limit;
			$messages = $this->manage_content->getMessageList("chat_info","*",$user_id,$sort_by,$startPoint,$limit);
			
			if( !empty($messages) )
			{
				foreach( $messages as $message )
				{
					//get the project name
					$project_name = $this->manage_content->getValue_where("project_info","*","project_id",$message['project_id']);
					$workroom = $this->manage_content->getValue_where("workroom_info","*","project_id",$message['project_id']);
					
					if( $message['sender'] != $user_id )
					{
						if( $message['status'] == 1 )
						{
							echo '<div class="chat_part_outline">
	                                <div class="col-md-12 col-sm-12 col-xs-12">
	                                    <div class="chat_user_msg">
	                                        <a href="';
							if( !empty($workroom) )
							{
								echo 'workroom.php?wid='.$workroom[0]['workroom_id'];
							}
							else
							{
								echo 'message.php?bid='.$message['bid_id'];
							}
	                        echo '"><p><span class="glyphicon glyphicon-envelope glyph glyph-unread"></span><strong>'.$message['message'].'</strong></p></a>
	                                        <a href="#"><p class="pull-left chat_user_msg_date"><span>'.$project_name[0]['title'].'</span></p></a>
	                                        <p class="pull-right chat_user_msg_date"><span>'.$message['date'].'</span></p>
	                                        <div class="clearfix"></div>
	                                    </div>
	                                </div>
	                                <div class="clearfix"></div>
	                            </div>';
						}
						else
						{
							echo '<div class="chat_part_outline">
	                                <div class="col-md-12 col-sm-12 col-xs-12">
	                                    <div class="chat_user_msg">
	                                        <a href="';
							if( !empty($workroom) )
							{
								echo 'workroom.php?wid='.$workroom[0]['workroom_id'];
							}
							else
							{
								echo 'message.php?bid='.$message['bid_id'];
							}
							echo '"><p><span class="glyphicon glyphicon-envelope glyph"></span>'.$message['message'].'</p></a>
	                                        <a href="#"><p class="pull-left chat_user_msg_date"><span>'.$project_name[0]['title'].'</span></p></a>
	                                        <p class="pull-right chat_user_msg_date"><span>'.$message['date'].'</span></p>
	                                        <div class="clearfix"></div>
	                                    </div>
	                                </div>
	                                <div class="clearfix"></div>
	                            </div>';
						}
					}
				}
			}
			else
			{
				echo 'No new messages.';
			}
		}

		/*
		 * Method to get the number
		 * @return string
		 * Auth Singh 
		 */
		 function getProposalNumber($user_id,$type)
		 {
		 	//initialize the table name
		 	$table = '';
			
		 	if( $type == 'proposal' )
			{
				$table = 'bid_info';
			}
			if( $type == 'posted-projects' )
			{
				$table = 'project_info';
			}

		 	$proposals = $this->manage_content->getValue_where($table,"*","user_id",$user_id);
			
			if( !empty($proposals) )
			{
				return count($proposals);
			}
			else
			{
				return 0;	
			}
		 }

		/*
		 * Method to get the number
		 * @return string
		 * Auth Singh 
		 */
		 function getAwardedJobNumber($user_id,$type)
		 {
		 	//initialize the table name
		 	$table = 'award_info';

		 	$jobs = $this->manage_content->getValue_where($table,"*","employer_id",$user_id);
			
			if( !empty($jobs) )
			{
				return count($jobs);
			}
			else
			{
				return 0;	
			}
		 }
		 
		 /*
		  * @Singh 
		  */
		 function getBidIdFromWid($wid)
		 {
		 	$workroom = $this->manage_content->getValue_where('workroom_info','*','workroom_id',$wid);
			
			if( !empty($workroom) )
			{
				return $workroom[0]['bid_id'];
			}
			else
			{
				return 0;
			}
		 }
		 
		 /*
		  * @Singh 
		  */
		 function isEmployer($user_id,$wid)
		 {
		 	$workroom = $this->manage_content->getValue_where('workroom_info','*','workroom_id',$wid);
			
			if( !empty($workroom) )
			{
				return $workroom[0]['bid_id'];
			}
			else
			{
				return 0;
			}
		 }
		 
		 /*
		  * Method generates the Full UI for Escrow and project details
		  * @Param workroom id
		  * Auth: Singh 
		  */
		 function getProjectEscrowInfo($wid)
		 {
		 	$workroom = $this->manage_content->getValue_where('workroom_info','*','workroom_id',$wid);
			
			//get the project info
			$project = $this->manage_content->getValue_where('project_info','*','project_id',$workroom[0]['project_id']);
			
			//get the bid info
			$bid = $this->manage_content->getValue_where('bid_info','*','bid_id',$workroom[0]['bid_id']);
			
			//get the user_info
			$employer =  $this->manage_content->getValue_where('user_info','*','user_id',$project[0]['user_id']);
			
			if( !empty($employer) )
			{
				echo '<div class="col-md-4 pull-left billing_info_left_part">
                            <p class="billing_info_para">
                                <span class="billing_info_heading">Client:</span>
                                <span class="billing_info_text">'.$employer[0]['name'].'</span>
                            </p>
                            <p class="billing_info_para">
                                <span class="billing_info_heading">Type:</span>
                                <span class="billing_info_text">'.$project[0]['work_type'].'</span>
                            </p>
                            <p class="billing_info_para">
                                <span class="billing_info_heading">Payment:</span>
                                <span class="billing_info_text">Escrow</span>
                            </p>
                        </div>
                        <div class="col-md-4 pull-right billing_info_right_part">
                        	<div class="financial_summary_heading">finanacial summary</div>
                            <p class="billing_info_para">
                                <span class="billing_info_heading">Project Amount:</span>
                                <span class="billing_info_text">'.$bid[0]['currency'].$bid[0]['amount'].'</span>
                            </p>
                            <p class="billing_info_para">
                                <span class="billing_info_heading">Escrow Amount:</span>
                                <span class="billing_info_text">'.$bid[0]['currency'].'00</span>
                            </p>
                            <p class="billing_info_para">
                                <span class="billing_info_heading">Released Amount:</span>
                                <span class="billing_info_text">'.$bid[0]['currency'].'00</span>
                            </p>
							<p class="tax-txt"><a href="#">Enter TAX or VAT Id information</a></p>
                        </div>';
			}
			else
			{
				return 0;
			}
		 }
	}
	
?>