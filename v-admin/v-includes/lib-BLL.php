<?php
	//include the DAL library to use the model layer methods
	include 'lib-DAL.php';
	
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
					if($job['user_id'] != $user_id && time() <= strtotime($job['ending_date']))
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
				$no_page = intval($no_page) + 1;
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
		- method for getting the member list
		- Auth : Dipanjan
		*/
		function getMemberList($userData)
		{
			if($userData['search_column'] == 'name')
			{
				$member_list = $this->manage_content->getValue_likely("user_info","*","name",$userData['search_value']);
			}
			else if($userData['search_column'] == 'email_id')
			{
				$member_list = $this->manage_content->getValue_likely("user_credentials","*","email_id",$userData['search_value']);
			}
			else if($userData['search_column'] == 'username')
			{
				$member_list = $this->manage_content->getValue_likely("user_credentials","*","username",$userData['search_value']);
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
					$email = $this->manage_content->getValue_where("user_credentials","*","user_id",$member['user_id']);
					$name = $this->manage_content->getValue_where("user_info","*","user_id",$member['user_id']);
					if($email[0]['status'] == 1)
					{
						$action_button = '<a href="user-list.php?uid='.$member['user_id'].'&action=0"><button class="btn btn-danger">Disable</button></a>';
					}
					else
					{
						$action_button = '<a href="user-list.php?uid='.$member['user_id'].'&action=1"><button class="btn btn-success">Enable</button></a>';
					}
					echo '<tr>
							<td>'.$name[0]['name'].'</td>
							<td>'.$email[0]['email_id'].'</td>
							<td><a href="memberProjectList.php?uid='.$member['user_id'].'"><button class="btn btn-primary">Project Details</button></a></td>
							<td><a href="memberBidList.php?uid='.$member['user_id'].'"><button class="btn btn-primary">Bid Details</button></a></td>
							<td><a href="memberProfileDetails.php?uid='.$member['user_id'].'"><button class="btn btn-warning">Profile Details</button></a></td>
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
		
		/*
		- method for getting member list of user id
		- Auth : Dipanjan
		*/
		function getMemberListFromUserId($user_id)
		{
			//get values of this user
			$user_cred = $this->manage_content->getValue_where('user_credentials','*','user_id',$user_id);
			$user_info = $this->manage_content->getValue_where('user_info','*','user_id',$user_id);
			if(!empty($user_cred[0]))
			{
				//checking for status
				if($user_cred[0]['status'] == 1)
				{
					$action_button = '<a href="user-list.php?uid='.$user_id.'&action=0"><button class="btn btn-danger">Disable</button></a>';
				}
				else
				{
					$action_button = '<a href="user-list.php?uid='.$user_id.'&action=1"><button class="btn btn-success">Enable</button></a>';
				}
				
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
                            <tbody>
								<tr>
									<td>'.$user_info[0]['name'].'</td>
									<td>'.$user_cred[0]['email_id'].'</td>
									<td><a href="memberProjectList.php?uid='.$user_id.'"><button class="btn btn-primary">Project Details</button></a></td>
									<td><a href="memberBidList.php?uid='.$user_id.'"><button class="btn btn-primary">Bid Details</button></a></td>
									<td><a href="memberProfileDetails.php?uid='.$user_id.'"><button class="btn btn-warning">Profile Details</button></a></td>
									<td>'.$action_button.'</td>
								</tr>
							</tbody>
                      </table>';
				
			}
		}
		
		/*
		- method for taking member action
		- Auth : Dipanjan
		*/
		function takingMemberAction($userData)
		{
			//getting the email id and full name
			$email = $this->manage_content->getValue_where("user_credentials","*","user_id",$userData['uid']);
			$name = $this->manage_content->getValue_where("user_info","*","user_id",$userData['uid']);
			if($userData['action'] == 0)
			{
				echo '<div class="col-lg-8">
						<div class="panel panel-default">
							<div class="panel-heading">Select The Reason For Deactivating The User</div>
							<div class="panel-body">
								<form action="v-includes/class.formData.php" role="form" method="post">
									<div class="form-group">
										<label class="control-label col-sm-3">Select Reason</label>
										<div class="col-sm-8">
											<select class="form-control" name="action_reason">
												<option value="lorem ipsum1">lorem ipsum1</option>
												<option value="lorem ipsum2">lorem ipsum2</option>
												<option value="lorem ipsum3">lorem ipsum3</option>
											</select>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<div class="col-sm-8 col-sm-offset-3">
											<input type="hidden" name="action" value="'.$userData['action'].'"/>
											<input type="hidden" name="uid" value="'.$userData['uid'].'"/>
											<input type="hidden" name="fn" value="'.md5('member_action').'"/>
											<input type="submit" value="Taking Action" class="btn btn-danger"/>
										</div>
										<div class="clearfix"></div>
									</div>
								</form>
							</div>
						</div>
					</div>';
			}
			else if($userData['action'] == 1)
			{
				echo '<div class="col-lg-8">
						<div class="panel panel-default">
							<div class="panel-heading">Select The Reason For Activating The User</div>
							<div class="panel-body">
								<form action="v-includes/class.formData.php" role="form" method="post">
									<div class="form-group">
										<label class="control-label col-sm-3">Select Reason</label>
										<div class="col-sm-8">
											<div class="col-sm-8">
												<textarea rows="3" class="form-control" name="action_reason"></textarea>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<div class="col-sm-8 col-sm-offset-3">
											<input type="hidden" name="action" value="'.$userData['action'].'"/>
											<input type="hidden" name="uid" value="'.$userData['uid'].'"/>
											<input type="hidden" name="fn" value="'.md5('member_action').'"/>
											<input type="submit" value="Taking Action" class="btn btn-success"/>
										</div>
										<div class="clearfix"></div>
									</div>
								</form>
							</div>
						</div>
					</div>';
					
			}
		}
		
		/*
		- method for getting project details of a member
		- Auth : Dipanjan
		*/
		function getMemberProjectDetails($user_id)
		{
			//getting value from database
			$project_list = $this->manage_content->getValueWhere_descending("project_info","*","user_id",$user_id);
			
			if(!empty($project_list[0]))
			{
				echo '<div class="list-group list_item">';
				foreach($project_list as $project)
				{
					//sub string the project description and skills
					$project_des = substr($project['description'],0,300).'...';
					$project_skills = substr($project['skills'],0,30).'...';
							
					echo '<div class="list-group-item project_list_item">
							<h3 class="project_list_heading"><a href="project_details.php?pid='.$project['project_id'].'">'.$project['title'].'</a></h3>
							<p>'.$project_des.'</p>
							<div class="col-sm-4">
								<p>
									<span class="project_list_topic">Skills: </span>
									<span class="project_list_des">'.$project_skills.'</span>
								</p>
							</div>
							<div class="col-sm-4">
								<p>
									<span class="project_list_topic">Price: </span>
									<span class="project_list_des">'.$project['price_range'].'</span>
								</p>
							</div>
							<div class="col-sm-4">
								<p>
									<span class="project_list_topic">Job Posted On: </span>
									<span class="project_list_des">'.$project['date'].' '.$project['time'].'</span>
								</p>
							</div>
							<div class="clearfix"></div>
						</div>';
				}
				echo '</div>';
			}
			else
			{
				echo '<h3 class="project_list_heading">No Rresult Found</h3>';
			}
		}
		
		/*
		- method for getting bid details of a member
		- Auth : Dipanjan
		*/
		function getMemberBidDetails($user_id)
		{
			//getting bid list of a member
			$bidList = $this->manage_content->getValueWhere_descending("bid_info","*","user_id",$user_id);
			if(!empty($bidList[0]))
			{
				echo '<div class="list-group list_item">';
				foreach($bidList as $bid)
				{
					//getting the project details of this bid
					$project_details = $this->manage_content->getValue_where("project_info","*","project_id",$bid['project_id']);
					
					//sub string the bid description
					$bid_des = substr($bid['description'],0,300).'...';
					
					echo '<div class="list-group-item project_list_item">
							<h3 class="project_list_heading"><a href="bid_details.php?bid='.$bid['bid_id'].'">'.$project_details[0]['title'].'</a></h3>
							<p>'.$bid_des.'</p>
							<div class="col-sm-4">
								<p>
									<span class="project_list_topic">Price: </span>
									<span class="project_list_des">'.$bid['currency'].$bid['amount'].'</span>
								</p>
							</div>
							<div class="col-sm-4">
								<p>
									<span class="project_list_topic">Time Range: </span>
									<span class="project_list_des">'.$bid['time_range'].'</span>
								</p>
							</div>
							<div class="col-sm-4">
								<p>
									<span class="project_list_topic">Job Posted On: </span>
									<span class="project_list_des">'.$bid['date'].' '.$bid['time'].'</span>
								</p>
							</div>
							<div class="clearfix"></div>
						</div>';
					
				}
				echo '</div>';
			}
			else
			{
				echo '<h3 class="project_list_heading">No Rresult Found</h3>';
			}
		}
		
		/*
		- method for getting profile details of a member
		- Auth : Dipanjan
		*/
		function getMemberProfileDetails($user_id)
		{
			echo ' <div class="panel-heading"><i class="fa fa-list fa-fw"></i> Member Profile Basic Info</div>
                        <div class="panel-body">';
			//get profile details
			$profile_credentials = $this->manage_content->getValue_where("user_credentials","*","user_id",$user_id);
			if(!empty($profile_credentials[0]))
			{
				echo '<div class="mem_info_outline">
							<div class="mem_info_topic col-sm-4">Email Id:</div>
							<div class="mem_info_text col-sm-8">'.$profile_credentials[0]['email_id'].'</div>
							<div class="clearfix"></div>
						</div>
						<div class="mem_info_outline">
							<div class="mem_info_topic col-sm-4">Username:</div>
							<div class="mem_info_text col-sm-8">'.$profile_credentials[0]['username'].'</div>
							<div class="clearfix"></div>
						</div>';
				//getting profile basic info
				$profile_info = $this->manage_content->getValue_where("user_info","*","user_id",$user_id);
				if(!empty($profile_info[0]))
				{
					echo '<div class="mem_info_outline">
                            	<div class="mem_info_topic col-sm-4">Name:</div>
                                <div class="mem_info_text col-sm-8">'.$profile_info[0]['name'].'</div>
                                <div class="clearfix"></div>
                            </div>
							<div class="mem_info_outline">
                            	<div class="mem_info_topic col-sm-4">Gender:</div>
                                <div class="mem_info_text col-sm-8">'.$profile_info[0]['gender'].'</div>
                                <div class="clearfix"></div>
                            </div>
							<div class="mem_info_outline">
                            	<div class="mem_info_topic col-sm-4">Date Of Birth:</div>
                                <div class="mem_info_text col-sm-8">'.$profile_info[0]['dob'].'</div>
                                <div class="clearfix"></div>
                            </div>
							<div class="mem_info_outline">
                            	<div class="mem_info_topic col-sm-4">Contact Number:</div>
                                <div class="mem_info_text col-sm-8">'.$profile_info[0]['contact_no'].'</div>
                                <div class="clearfix"></div>
                            </div>
							<div class="mem_info_outline">
                            	<div class="mem_info_topic col-sm-4">Address:</div>
                                <div class="mem_info_text col-sm-8">'.$profile_info[0]['addr_line1'].'<br>'.$profile_info[0]['addr_line2'].'</div>
                                <div class="clearfix"></div>
                            </div>
							<div class="mem_info_outline">
                            	<div class="mem_info_topic col-sm-4">Pin Code:</div>
                                <div class="mem_info_text col-sm-8">'.$profile_info[0]['pincode'].'</div>
                                <div class="clearfix"></div>
                            </div>
							<div class="mem_info_outline">
                            	<div class="mem_info_topic col-sm-4">City:</div>
                                <div class="mem_info_text col-sm-8">'.$profile_info[0]['city'].'</div>
                                <div class="clearfix"></div>
                            </div>
							<div class="mem_info_outline">
                            	<div class="mem_info_topic col-sm-4">State:</div>
                                <div class="mem_info_text col-sm-8">'.$profile_info[0]['state'].'</div>
                                <div class="clearfix"></div>
                            </div>
							<div class="mem_info_outline">
                            	<div class="mem_info_topic col-sm-4">Country:</div>
                                <div class="mem_info_text col-sm-8">'.$profile_info[0]['country'].'</div>
                                <div class="clearfix"></div>
                            </div>
							<div class="mem_info_outline">
                            	<div class="mem_info_topic col-sm-4">Skills:</div>
                                <div class="mem_info_text col-sm-8">'.$profile_info[0]['skills'].'</div>
                                <div class="clearfix"></div>
                            </div>
							<div class="mem_info_outline">
                            	<div class="mem_info_topic col-sm-4">Terms:</div>
                                <div class="mem_info_text col-sm-8">'.$profile_info[0]['terms'].'</div>
                                <div class="clearfix"></div>
                            </div>
							<div class="mem_info_outline">
                            	<div class="mem_info_topic col-sm-4">Hourly Rate:</div>
                                <div class="mem_info_text col-sm-8">'.$profile_info[0]['hourly_rate'].'</div>
                                <div class="clearfix"></div>
                            </div>
							<div class="mem_info_outline">
                            	<div class="mem_info_topic col-sm-4">Availability:</div>
                                <div class="mem_info_text col-sm-8">'.$profile_info[0]['availability'].'</div>
                                <div class="clearfix"></div>
                            </div>
							<div class="mem_info_outline">
                            	<div class="mem_info_topic col-sm-4">Interested Topic:</div>
                                <div class="mem_info_text col-sm-8">'.$profile_info[0]['interested_topic'].'</div>
                                <div class="clearfix"></div>
                            </div>
							<div class="mem_info_outline">
                            	<div class="mem_info_topic col-sm-4">Description:</div>
                                <div class="mem_info_text col-sm-8">'.$profile_info[0]['description'].'</div>
                                <div class="clearfix"></div>
                            </div>';
				}
				else
				{
					echo '<div class="mem_info_outline">
                                <div class="mem_info_text col-sm-8">Other Details Are Not Filled Up By User</div>
                                <div class="clearfix"></div>
                            </div>';
				}
			}
			else
			{
				echo '<h3 class="project_list_heading">No Rresult Found</h3>';
			}
			echo '</div>
                 </div>';
		}
		
		/*
		- method for getting user account details
		- Auth : Dipanjan
		*/
		function getUserAccountDetails($user_id)
		{
			echo ' <div class="panel-heading"><i class="fa fa-list fa-fw"></i> Member Account Info</div>
                        <div class="panel-body">';
			//get value from database
			$profile_details = $this->manage_content->getValue_where("user_account_details","*","user_id",$user_id);
			if(!empty($profile_details[0]))
			{
				
			}
			else
			{
				echo '<h3 class="project_list_heading">No Rresult Found</h3>';
			}
			echo '</div>
                 </div>';
		}
		
		/*
		- method for getting user portfolio details (Relative Links)
		- Auth : Dipanjan
		*/
		function getUserPortfolioinfo($user_id)
		{
			echo ' <div class="panel-heading"><i class="fa fa-list fa-fw"></i> Member Portfolio Info</div>
                        <div class="panel-body">';
			//get portfolio info from database
			$portfolio_details = $this->manage_content->getValueMultipleCondtn("user_portfolio","*",array("user_id","status"),array($user_id,1));
			if(!empty($portfolio_details[0]))
			{
				echo '<div class="list-group list_item">';
				foreach($portfolio_details as $portfolio_detail)
				{
					echo '<div class="list-group-item">
							<div class="col-sm-7">
								<h4>'.$portfolio_detail['skills'].'</h4>
								<p>'.$portfolio_detail['description'].'</p>
							</div>
							<div class="col-sm-5">
								<img src="../'.$portfolio_detail['file'].'" class="img-responsive center-block"/>
							</div>
							<div class="clearfix"></div>
						</div>';
				}
				echo '</div>';
			}
			else
			{
				echo '<h3 class="project_list_heading">No Rresult Found</h3>';
			}
			
			echo '</div>
                 </div>';
		}
		
		/*
		- method for getting user employment details
		- Auth : Dipanjan
		*/
		function getUserEmployment($user_id)
		{
			echo ' <div class="panel-heading"><i class="fa fa-list fa-fw"></i> Member Employment Info</div>
                        <div class="panel-body">';
			
			//get employment details from database
			$emp_details = $this->manage_content->getValueMultipleCondtn("user_employment","*",array("user_id","status"),array($user_id,1));
			if(!empty($emp_details[0]))
			{
				echo '<div class="list-group list_item">';
				foreach($emp_details as $emp_detail)
				{
					echo '<div class="list-group-item">
								<div class="mem_info_outline">
									<div class="mem_info_topic col-sm-4">Company Name:</div>
									<div class="mem_info_text col-sm-8">'.$emp_detail['com_name'].'</div>
									<div class="clearfix"></div>
								</div>
								<div class="mem_info_outline">
									<div class="mem_info_topic col-sm-4">Position:</div>
									<div class="mem_info_text col-sm-8">'.$emp_detail['position'].'</div>
									<div class="clearfix"></div>
								</div>
								<div class="mem_info_outline">
									<div class="mem_info_topic col-sm-4">Start Date:</div>
									<div class="mem_info_text col-sm-8">'.$emp_detail['start_date'].'</div>
									<div class="clearfix"></div>
								</div>
								<div class="mem_info_outline">
									<div class="mem_info_topic col-sm-4">End Date:</div>
									<div class="mem_info_text col-sm-8">'.$emp_detail['end_date'].'</div>
									<div class="clearfix"></div>
								</div>
								<div class="mem_info_outline">
									<div class="mem_info_topic col-sm-4">Description:</div>
									<div class="mem_info_text col-sm-8">'.$emp_detail['description'].'</div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
                            </div>';
				}
				echo '</div>';
			}
			else
			{
				echo '<h3 class="project_list_heading">No Rresult Found</h3>';
			}
			
			echo '</div>
                 </div>';
		}
		
		/*
		- method for getting user education details
		- Auth : Dipanjan
		*/
		function getUserEducation($user_id)
		{
			echo ' <div class="panel-heading"><i class="fa fa-list fa-fw"></i> Member Education Info</div>
                        <div class="panel-body">';
			
			//get education details from database
			$edu_details = $this->manage_content->getValueMultipleCondtn("user_education","*",array("user_id","status"),array($user_id,1));
			if(!empty($edu_details[0]))
			{
				echo '<div class="list-group list_item">';
				foreach($edu_details as $edu_detail)
				{
					echo '<div class="list-group-item">
								<div class="mem_info_outline">
									<div class="mem_info_topic col-sm-4">Institute Name:</div>
									<div class="mem_info_text col-sm-8">'.$edu_detail['inst_name'].'</div>
									<div class="clearfix"></div>
								</div>
								<div class="mem_info_outline">
									<div class="mem_info_topic col-sm-4">Degree:</div>
									<div class="mem_info_text col-sm-8">'.$edu_detail['degree'].'</div>
									<div class="clearfix"></div>
								</div>
								<div class="mem_info_outline">
									<div class="mem_info_topic col-sm-4">Start Date:</div>
									<div class="mem_info_text col-sm-8">'.$edu_detail['start_date'].'</div>
									<div class="clearfix"></div>
								</div>
								<div class="mem_info_outline">
									<div class="mem_info_topic col-sm-4">End Date:</div>
									<div class="mem_info_text col-sm-8">'.$edu_detail['end_date'].'</div>
									<div class="clearfix"></div>
								</div>
								<div class="mem_info_outline">
									<div class="mem_info_topic col-sm-4">Description:</div>
									<div class="mem_info_text col-sm-8">'.$edu_detail['description'].'</div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
                            </div>';
				}
				echo '</div>';
			}
			else
			{
				$this->manage_content->getValue_where("project_info","*","project_id",$project_id);
			}
			echo '</div>
                 </div>';
		}
		
		/*
		- method for getting user activation details
		- Auth : Dipanjan
		*/
		function getUserActivation($user_id)
		{
			echo ' <div class="panel-heading"><i class="fa fa-list fa-fw"></i> Member Activation Details Info</div>
                        <div class="panel-body">';
			//get the value from database
			$acti_details = $this->manage_content->getValue_where("user_activation_info","*","user_id",$user_id);
			if(!empty($acti_details[0]))
			{
				echo '<div class="table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>User Status</th>
									<th>From</th>
									<th>To</th>
									<th>Reason</th>
								</tr>
							</thead>
							<tbody>';
						
						foreach($acti_details as $acti_detail)
						{
							//getting the row color
							if($acti_detail['action'] == 'Activated')
							{
								$row_class = 'success';
							}
							else if($acti_detail['action'] == 'Deactivated')
							{
								$row_class = 'danger';
							}
							//getting present status
							if($acti_detail['date_to'] == "" || $acti_detail['time_to'] == "")
							{
								$present_date = 'Present';
							}
							else
							{
								$present_date = $acti_detail['date_to']." ".$acti_detail['time_to'];
							}
							
							echo '<tr class="'.$row_class.'">
									<td>'.$acti_detail['action'].'</td>
									<td>'.$acti_detail['date_from']." ".$acti_detail['time_from'].'</td>
									<td>'.$present_date.'</td>
									<td>'.$acti_detail['notes'].'</td>
								</tr>';
							
						}
				
				echo '</tbody>
					</table>
					</div>';
			}
			else
			{
				$this->manage_content->getValue_where("project_info","*","project_id",$project_id);
			}
			echo '</div>
                 </div>';
		}
		
		/*
		- method for getting project details of a project
		- Auth : Dipanjan
		*/
		function getProjectPageDetails($project_id)
		{
			//getting details of this project
			$project_details = $this->manage_content->getValue_where("project_info","*","project_id",$project_id);
			if(!empty($project_details[0]))
			{
				echo '<h3 class="project_list_heading"><a href="project_details.php?pid='.$project_id.'">'.$project_details[0]['title'].'</a></h3>
                      <p>'.$project_details[0]['description'].'</p>';
			}
			else
			{
				echo '<h3 class="project_list_heading">No Rresult Found</h3>';
			}
		}
		
		/*
		- method for getting project details of given bid id
		- Auth : Dipanjan
		*/
		function getProjectDetailsOfBid($bid_id)
		{
			//getting details of this project
			$bid_details = $this->manage_content->getValue_where("bid_info","*","bid_id",$bid_id);
			if(!empty($bid_details[0]))
			{
				//get project details
				$pro_details = $this->manage_content->getValue_where("project_info","*","project_id",$bid_details[0]['project_id']);
				echo '<h3 class="project_list_heading"><a href="project_details.php?pid='.$bid_details[0]['project_id'].'">'.$pro_details[0]['title'].'</a></h3>
                      <p>'.$pro_details[0]['description'].'</p>';
			}
			else
			{
				echo '<h3 class="project_list_heading">No Rresult Found</h3>';
			}
		}
		
		/*
		- method for getting project quick links of a project
		- Auth : Dipanjan
		*/
		function getProjectQuickLinks($project_id)
		{
			//getting details of this project
			$project_details = $this->manage_content->getValue_where("project_info","*","project_id",$project_id);
			if(!empty($project_details[0]))
			{
				//get total no of bid
				$totalBid = $this->manage_content->getRowValueMultipleCondition('bid_info',array('project_id'),array($project_id));
				
				//calculate time remaining for this project
				$datetime1 = new DateTime($this->getCurrentDate());
				$datetime2 = new DateTime($project_details[0]['ending_date']);
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
				else if($int_day > 1)
				{
					$time_remaining = $int_day.' days Left';
				}
				else
				{
					$time_remaining = 'Job Is Closed';
				}
				//checking project is awarded or not
				if(!empty($project_details[0]['award_bid_id']))
				{
					//getting bid info of this bid
					$bid_info = $this->manage_content->getValue_where('bid_info','*','bid_id',$project_details[0]['award_bid_id']);
					if($bid_info[0]['awarded'] == 2)
					{
						$award_text = 'Job Is Awarded';
						$time_remaining = 'Job Is Closed';
					}
					else if($bid_info[0]['awarded'] == 1)
					{
						$award_text = 'Job Is Awarded But Not Yet Accepted';
					}
					else
					{
						$award_text = 'Job Is Not Awarded';
					}
				}
				else
				{
					$award_text = 'Job Is Not Awarded';
				}
				//getting project status
				if($project_details[0]['status'] == 1)
				{
					$action_text = '<a class="list-group-item" href="project_details.php?pid='.$project_id.'&action=0"><button class="btn btn-danger">Terminate This Project</button></a>';
				}
				else if($project_details[0]['status'] == 0)
				{
					$action_text = '<a class="list-group-item" href="project_details.php?pid='.$project_id.'&action=1"><button class="btn btn-success">Activate This Project</button></a>';
				}
				
				
				echo '<div class="list-group list_item">
						<a class="list-group-item">Total Bids: '.$totalBid.'</a>
						<a class="list-group-item">'.$time_remaining.'</a>
						<a class="list-group-item">'.$award_text.'</a>
						<a class="list-group-item">'.$project_details[0]['skills'].'</a>
						<a class="list-group-item">'.$project_details[0]['price_range'].'</a>
						<a class="list-group-item">Posted On: '.$project_details[0]['date'].' '.$project_details[0]['time'].'</a>
						'.$action_text.'
					</div>';
			}
			else
			{
				echo '<h3 class="project_list_heading">No Rresult Found</h3>';
			}
		}
		
		/*
		- method for getting quick links of a bid
		- Auth : Dipanjan
		*/
		function getBidQuickLinks($bid_id)
		{
			//get bid details from database
			$bid_details = $this->manage_content->getValue_where("bid_info","*","bid_id",$bid_id);
			if(!empty($bid_details[0]))
			{
				//getting project details
				$project_details = $this->manage_content->getValue_where('project_info','*','project_id',$bid_details[0]['project_id']);
				//checking bid is awarded or not
				if(!empty($project_details[0]['award_bid_id']))
				{
					if($bid_details[0]['awarded'] == 2)
					{
						$award_text = 'Bid Is Awarded';
					}
					else if($bid_details[0]['awarded'] == 1)
					{
						$award_text = 'Bid Is Awarded But Not Yet Accepted';
					}
					else
					{
						$award_text = 'Bid Is Not Awarded';
					}
				}
				else
				{
					$award_text = 'Bid Is Not Awarded';
				}
				//getting bid status
				if($bid_details[0]['status'] == 1)
				{
					$action_text = '<a class="list-group-item" href="bid_details.php?bid='.$bid_id.'&action=0"><button class="btn btn-danger">Terminate This Bid</button></a>';
				}
				else if($bid_details[0]['status'] == 0)
				{
					$action_text = '<a class="list-group-item" href="bid_details.php?bid='.$bid_id.'&action=1"><button class="btn btn-success">Activate This Bid</button></a>';
				}
				
				echo '<div class="list-group list_item">
						<a class="list-group-item">Price: '.$bid_details[0]['currency'].$bid_details[0]['amount'].'</a>
						<a class="list-group-item">Time: '.$bid_details[0]['time_range'].'</a>
						<a class="list-group-item">'.$award_text.'</a>
						<a class="list-group-item">Posted On: '.$bid_details[0]['date'].' '.$bid_details[0]['time'].'</a>
						'.$action_text.'
					</div>';
			}
			else
			{
				echo '<h3 class="project_list_heading">No Rresult Found</h3>';
			}
		}
		
		/*
		- method for getting bid details
		- Auth: Dipanjan
		*/
		function getProjectBidList($project_id)
		{
			//get bid details
			$bidDetails = $this->manage_content->getValue_where("bid_info","*","project_id",$project_id);
			
			if(!empty($bidDetails[0]))
			{
				foreach($bidDetails as $bidDetail)
				{
					//getting bidder name
					$bidderDetails = $this->manage_content->getValue_where("user_info","*","user_id",$bidDetail['user_id']);
					echo '<div class="list-group-item project_list_item">
							<h4 class="project_list_heading"><a>'.$bidderDetails[0]['name'].'</a></h4>
							<p>'.$bidDetail['description'].'</p>
							<div class="col-sm-4">
								<p>
									<span class="project_list_topic">Bid Price: </span>
									<span class="project_list_des">'.$bidDetail['currency'].$bidDetail['amount'].'</span>
								</p>
							</div>
							<div class="col-sm-4">
								<p>
									<span class="project_list_topic">Time Range: </span>
									<span class="project_list_des">'.$bidDetail['time_range'].'</span>
								</p>
							</div>
							<div class="clearfix"></div>
						</div>';
				}
			}
			else
			{
				echo '<h3 class="project_list_heading">No Bids Yet</h3>';
			}
		}
		
		/*
		- method for getting bid details of given bid id
		- Auth: Dipanjan
		*/
		function getDetailsOfBid($bid_id)
		{
			//get bid details
			$bidDetails = $this->manage_content->getValue_where("bid_info","*","bid_id",$bid_id);
			
			if(!empty($bidDetails[0]))
			{
				echo '<div class="list-group-item project_list_item">
						<p>'.$bidDetails[0]['description'].'</p>
						
						<div class="clearfix"></div>
					</div>';
			}
			else
			{
				echo '<h3 class="project_list_heading">No Result Found</h3>';
			}
		}
		
		/*
		- method for getting project details of project id
		- Auth: Dipanjan
		*/
		function getProjectDetailsOfProjectId($project_id)
		{
			//get values of project id
			$pro_details = $this->manage_content->getValue_where('project_info','*','project_id',$project_id);
			return $pro_details;
		}
		
		/*
		- method for getting bid details of bid id
		- Auth: Dipanjan
		*/
		function getBidDetailsOfBidId($bid_id)
		{
			//get values of project id
			$bid_details = $this->manage_content->getValue_where('bid_info','*','bid_id',$bid_id);
			return $bid_details;
		}
		
		/*
		- method for getting new poll number
		- Auth: Dipanjan
		*/
		function getNewPollNumber()
		{
			//get last value of poll number
			$poll = $this->manage_content->getValue_descendingLimit('polling_info','*',1);
			$poll_nmbr = $poll[0]['set_no'];
			$nmbr_count = substr($poll_nmbr,5);
			$new_nmbr = intval($nmbr_count) + 1;
			$new_poll = 'poll_'.$new_nmbr;
			return $new_poll;
		}
		
		/*
		- method for getting new survey number
		- Auth: Dipanjan
		*/
		function getNewSurveyNumber()
		{
			//get last value of poll number
			$survey = $this->manage_content->getValue_descendingLimit('survey_info','*',1);
			$survey_nmbr = $survey[0]['set_no'];
			$nmbr_count = substr($survey_nmbr,7);
			$new_nmbr = intval($nmbr_count) + 1;
			$new_survey = 'survey_'.$new_nmbr;
			return $new_survey;
		}
		
		/*
		- method for getting polling result
		- Auth: Dipanjan
		*/
		function getPollingResult($set_no)
		{
			//get data from database
			$poll_data = $this->manage_content->getValue_where('polling_info','*','set_no',$set_no);
			if(!empty($poll_data[0]))
			{
				//calculating polling percentage
				//declaring an initial variable
				$total_vote = 0;
				foreach($poll_data as $poll)
				{
					if(!empty($poll['user_id']))
					{
						$total_vote = $total_vote + count(explode(',',$poll['user_id']));
					}
				}
				echo '<div class="panel-heading"><i class="fa fa-list fa-fw"></i> Polling Details Info</div>
                        <div class="panel-body">
                        	<div class="mem_info_outline">
								<div class="mem_info_topic col-sm-3">Set No:</div>
								<div class="mem_info_text col-sm-8">'.$poll_data[0]['set_no'].'</div>
								<div class="clearfix"></div>
							</div>
							<div class="mem_info_outline">
								<div class="mem_info_topic col-sm-3">Question:</div>
								<div class="mem_info_text col-sm-8">'.$poll_data[0]['question'].'</div>
								<div class="clearfix"></div>
							</div>';
				 foreach($poll_data as $poll_ans)
				 {
					 //getting percentage of vote
					 if(!empty($poll_ans['user_id']))
					 {
						 $vote = count(explode(',',$poll_ans['user_id']));
					 }
					 else
					 {
						 $vote = 0;
					 }
					 if($total_vote == 0 || $vote == 0)
					 {
						 $per = 0;
					 }
					 else
					 {
						 $per = ($vote/$total_vote)*100;
					 }
					 
					 //styling the vote percenage
					 if($per>=0 && $per<=25)
					 {
						 $pr_bar = 'progress-bar-danger';
					 }
					 else if($per>25 && $per<=50)
					 {
						 $pr_bar = 'progress-bar-warning';
					 }
					 else if($per>50 && $per<=75)
					 {
						 $pr_bar = 'progress-bar-info';
					 }
					 else if($per>75 && $per<=100)
					 {
						 $pr_bar = 'progress-bar-success';
					 }
					 
					 echo '<div class="mem_info_outline">
								<div class="mem_info_topic col-sm-3">Answer'.$poll_ans['answer_no'].':</div>
								<div class="mem_info_text col-sm-8">'.$poll_ans['answer'].'</div>
								<div class="col-sm-8 col-sm-offset-3">
									<div class="progress">
									  <div class="progress-bar '.$pr_bar.'" style="width: '.$per.'%" title="'.$per.'%">
									  </div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>';
				 }
				 
                 echo '</div>';
			}
		}
		
		/*
		- method for getting survey result
		- Auth: Dipanjan
		*/
		function getSurveyResult($set_no)
		{
			//get values from database
			$survey_details = $this->manage_content->getValue_where('survey_info','*','set_no',$set_no);
			if(!empty($survey_details[0]))
			{
				echo '<div class="panel panel-default">
						<div class="panel-heading"><i class="fa fa-plus-circle fa-fw"></i> Survey Details</div>
						<div class="panel-body">
							<div class="mem_info_outline">
								<div class="mem_info_topic col-sm-3">Set No:</div>
								<div class="mem_info_text col-sm-8">'.$set_no.'</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="panel-group" id="accordion">';
				//initialize an empty array
				$question = array();
				foreach($survey_details as $survey_ques)
				{
					if(!in_array($survey_ques['question_no'],$question))
					{
						array_push($question,$survey_ques['question_no']);
					}
				}
				//getting answer and result
				foreach($question as $key=>$value)
				{
					//getting values from database
					$ansDetails = $this->manage_content->getValueMultipleCondtn('survey_info','*',array('set_no','question_no'),array($set_no,$value));
					//calculate total vote
					$total_vote = 0;
					foreach($ansDetails as $votes)
					{
						if(!empty($votes['user_id']))
						{
							$total_vote = $total_vote + count(explode(',',$votes['user_id']));
						}
					}
					//showing the question
					echo '<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$value.'"><i class="fa fa-question-circle fa-fw"></i> Question No '.$value.'</h4>
							</div>
							<div id="collapse'.$value.'" class="panel-collapse collapse">
								<div class="panel-body">
									<div class="mem_info_outline">
										<div class="mem_info_topic col-sm-3">Question:</div>
										<div class="mem_info_text col-sm-8">'.$ansDetails[0]['question'].'</div>
										<div class="clearfix"></div>
									</div>';
					
					foreach($ansDetails as $ans)
					{
						if(!empty($ans['user_id']))
						{
							$vote = count(explode(',',$ans['user_id']));
						}
						else
						{
							$vote = 0;
						}
						if($total_vote == 0 || $vote == 0)
						{
							$per = 0;
						}
						else
						{
							$per = ($vote/$total_vote)*100;
						}
						
						//styling the vote percenage
						 if($per>=0 && $per<=25)
						 {
							 $pr_bar = 'progress-bar-danger';
						 }
						 else if($per>25 && $per<=50)
						 {
							 $pr_bar = 'progress-bar-warning';
						 }
						 else if($per>50 && $per<=75)
						 {
							 $pr_bar = 'progress-bar-info';
						 }
						 else if($per>75 && $per<=100)
						 {
							 $pr_bar = 'progress-bar-success';
						 }
						 
						 echo '<div class="mem_info_outline">
									<div class="mem_info_topic col-sm-3">Answer No '.$ans['answer_no'].':</div>
									<div class="mem_info_text col-sm-8">'.$ansDetails[0]['question'].'</div>
									<div class="col-sm-8 col-sm-offset-3">
										<div class="progress">
										  <div class="progress-bar '.$pr_bar.'" style="width: '.$per.'%" title="'.$per.'%">
										  </div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>';
					}
					
					echo	'</div>
							</div>
						</div>';
				}
				
				echo '</div>';
			}
		}
		
		/*
		- method for getting polling list
		- Auth: Dipanjan
		*/
		function getPollingList()
		{
			//get values from database
			$polls = $this->manage_content->getValue('polling_info','*');
			//declare an empty array
			$set_no = array();
			//getting an array in which list of set no is stored
			foreach($polls as $poll)
			{
				if(!in_array($poll['set_no'],$set_no))
				{
					array_push($set_no,$poll['set_no']);
				}
			}
			if(!empty($set_no))
			{
				foreach($set_no as $key=>$value)
				{
					//getting details of this set
					$setDetails = $this->manage_content->getValue_where('polling_info','*','set_no',$value);
					//getting the status of set
					if($setDetails[0]['status'] == 1)
					{
						$cur_status = '<button class="btn btn-success">Activated</button>';
						$action = '<input type="hidden" name="set_no" value="'.$value.'" />
									<input type="hidden" name="action" value="0" />
									<input type="submit" class="btn btn-danger" value="Deactivate" />';
					}
					else
					{
						$cur_status = '<button class="btn btn-danger">Deactivated</button>';
						$action = '<input type="hidden" name="set_no" value="'.$value.'" />
									<input type="hidden" name="action" value="1" />
									<input type="submit" class="btn btn-success" value="Activate" />';
					}
					echo '<tr>
							<td>'.$setDetails[0]['set_no'].'</td>
							<td>'.$setDetails[0]['question'].'</td>
							<td><a href="pollDetails.php?set_no='.$setDetails[0]['set_no'].'&action=details"><button class="btn btn-primary">Poll Details</button></a></td>
							<td><a href="pollDetails.php?set_no='.$setDetails[0]['set_no'].'&action=edit"><button class="btn btn-info">Edit Info</button></a></td>
							<td>'.$cur_status.'</td>
							<td>
								<form action="v-includes/class.formData.php" method="post">
									<input type="hidden" name="fn" value="'.md5('action_poll').'" />
									'.$action.'
								</form>
							</td>
						</tr>';
				}
			}
		}
		
		/*
		- method for getting survey list
		- Auth: Dipanjan
		*/
		function getSurveyList()
		{
			//get values from database
			$surveyDetails = $this->manage_content->getValue('survey_info','*');
			//declare an empty array
			$set_no = array();
			//getting an array in which set no is stored
			foreach($surveyDetails as $survey)
			{
				if(!in_array($survey['set_no'],$set_no))
				{
					array_push($set_no,$survey['set_no']);
				}
			}
			if(!empty($set_no))
			{
				foreach($set_no as $key=>$value)
				{
					//getting details of this set
					$setDetails = $this->manage_content->getValue_where('survey_info','*','set_no',$value);
					//getting the status of the set
					if($setDetails[0]['status'] == 1)
					{
						$cur_status = '<button class="btn btn-success">Activated</button>';
						$action = '<input type="hidden" name="set_no" value="'.$value.'" />
									<input type="hidden" name="action" value="0" />
									<input type="submit" class="btn btn-danger" value="Deactivate" />';
					}
					else
					{
						$cur_status = '<button class="btn btn-danger">Deactivated</button>';
						$action = '<input type="hidden" name="set_no" value="'.$value.'" />
									<input type="hidden" name="action" value="1" />
									<input type="submit" class="btn btn-success" value="Activate" />';
					}
					echo '<tr>
							<td>'.$setDetails[0]['set_no'].'</td>
							<td><a href="surveyDetails.php?set_no='.$setDetails[0]['set_no'].'&action=details"><button class="btn btn-primary">Survey Details</button></a></td>
							<td><a href="surveyDetails.php?set_no='.$setDetails[0]['set_no'].'&action=edit"><button class="btn btn-info">Edit Info</button></a></td>
							<td>'.$cur_status.'</td>
							<td>
								<form action="v-includes/class.formData.php" method="post">
									<input type="hidden" name="fn" value="'.md5('action_survey').'" />
									'.$action.'
								</form>
							</td>
						</tr>';
				}
			}
		}
		
		/*
		- method for getting polling editing list
		- Auth: Dipanjan
		*/
		function getPollEdit($set_no)
		{
			//getting poll details
			$pollDetails = $this->manage_content->getValue_where('polling_info','*','set_no',$set_no);
			if(!empty($pollDetails[0]))
			{
				echo '<div class="panel-heading"><i class="fa fa-edit fa-fw"></i> Edit Polling Details</div>
                        <div class="panel-body">
                        	<form action="v-includes/class.formData.php" role="form" method="post">
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Polling Set No</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="set_no" readonly="readonly" value="'.$pollDetails[0]['set_no'].'"/>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Poll Question</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="ques" value="'.$pollDetails[0]['question'].'"/>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>';
					
					foreach($pollDetails as $pollDetail)
					{
						echo '<div class="form-group">
                                    <label class="control-label p_label col-sm-3">Answer'.$pollDetail['answer_no'].'</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="ans['.$pollDetail['answer_no'].']" value="'.$pollDetail['answer'].'"/>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>';
					}
                                
                     echo      '<div class="form-group">
                                    <label class="control-label p_label col-sm-3">Status</label>
                                    <div class="col-sm-4">
                                        <select name="status" class="form-control">
                                        	<option value="1"'; if($pollDetails[0]['status'] == 1) { echo 'selected="selected"'; } echo '>Active</option>
                                            <option value="0"'; if($pollDetails[0]['status'] == 0) { echo 'selected="selected"'; } echo '>Deactive</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-7 col-sm-offset-3">
                                    	<input type="hidden" name="fn" value="'.md5('edit_poll').'" />
                                        <input type="submit" class="btn btn-success btn-lg" value="UPDATE" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>';
			}
		}
		
		/*
		- method for getting polling editing list
		- Auth: Dipanjan
		*/
		function getSurveyEdit($set_no)
		{
			//getting survey details
			$surveyDetails = $this->manage_content->getValue_where('survey_info','*','set_no',$set_no);
			if(!empty($surveyDetails[0]))
			{
				echo '<form action="v-includes/class.formData.php" role="form" method="post">
						<div class="panel panel-default">
							<div class="panel-heading"><i class="fa fa-edit fa-fw"></i> Survey Details</div>
							<div class="panel-body">
								<div class="form-group">
									<label class="control-label p_label col-sm-3">Survey Set No</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="set_no" readonly="readonly" value="'.$set_no.'"/>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<div class="panel-group" id="accordion">';
				
				//initialize an empty array
				$question = array();
				foreach($surveyDetails as $survey_ques)
				{
					if(!in_array($survey_ques['question_no'],$question))
					{
						array_push($question,$survey_ques['question_no']);
					}
				}
				//showing the question details
				foreach($question as $key=>$value)
				{
					
					//get values
					$ques = $this->manage_content->getValueMultipleCondtn('survey_info','*',array('set_no','question_no'),array($set_no,$value));
					
					echo '<div class="panel panel-default">
                            	<div class="panel-heading">
                                	<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$value.'"><i class="fa fa-question-circle fa-fw"></i> Question No '.$value.'</h4>
                                </div>
                                <div id="collapse'.$value.'" class="panel-collapse collapse">
                                	<div class="panel-body">
                                    	<div class="form-group">
                                            <label class="control-label p_label col-sm-3">Survey Question '.$value.'</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ques'.$value.'" value="'.$ques[0]['question'].'"/>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>';
                      
					 foreach($ques as $ans)
					 {
						 echo '<div class="form-group">
									<label class="control-label p_label col-sm-3">Answer'.$ans['answer_no'].'</label>
									<div class="col-sm-7">
										<input type="text" class="form-control" name="ans'.$value.'['.$ans['answer_no'].']" value="'.$ans['answer'].'"/>
									</div>
									<div class="clearfix"></div>
								</div>';
					 }
					 //printing the update button
					 if($value == count($question))
					 {
						 echo '<div class="form-group">
									<div class="col-sm-7 col-sm-offset-3">
										<input type="hidden" name="fn" value="'.md5('edit_survey').'" />
										<input type="submit" class="btn btn-success btn-lg" value="UPDATE" />
									</div>
									<div class="clearfix"></div>
								</div>';
					 }
					 
					                    
                     echo       '</div>
                                </div>
                            </div>';
					
				}
				
				echo '</div>
					</form>';
			}
		}
		
		/*
		- method for getting faq list
		- Auth: Dipanjan
		*/
		function getFaqList()
		{
			//get values from database
			$faqList = $this->manage_content->getValue('faq_info','*');
			if(!empty($faqList[0]))
			{
				foreach($faqList as $faq)
				{
					//getting status
					if($faq['status'] == 1)
					{
						$cur_status = '<button class="btn btn-success">Activated</button>';
						$form_Action = '<input type="hidden" name="id" value="'.$faq['id'].'" />
										<input type="hidden" name="action" value="0" />
										<input type="submit" class="btn btn-danger" value="Deactivate" />';
					}
					else
					{
						$cur_status = '<button class="btn btn-danger">Deactivated</button>';
						$form_Action = '<input type="hidden" name="id" value="'.$faq['id'].'" />
										<input type="hidden" name="action" value="1" />
										<input type="submit" class="btn btn-success" value="Activate" />';
					}
					//showing the result
					echo '<tr>
							<td>'.$faq['question'].'</td>
							<td>'.$faq['answer'].'</td>
							<td><a href="faqDetails.php?id='.$faq['id'].'&action=edit"><button class="btn btn-info">Edit Details</button></a></td>
							<td>'.$cur_status.'</td>
							<td>
								<form action="v-includes/class.formData.php" method="post">
									<input type="hidden" name="fn" value="'.md5('action_faq').'" />
									'.$form_Action.'
								</form>
							</td>
						</tr>';
				}
			}
		}
		
		/*
		- method for getting faq edit details
		- Auth: Dipanjan
		*/
		function getFaqEditDetails($id)
		{
			//get values from database
			$faqDetails = $this->manage_content->getValue_where('faq_info','*','id',$id);
			if(!empty($faqDetails[0]))
			{
				echo '<div class="panel-heading"><i class="fa fa-plus-circle fa-fw"></i> Add Faq Details</div>
                        <div class="panel-body">
                        	<form action="v-includes/class.formData.php" role="form" method="post">
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Faq Question</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="ques" value="'.$faqDetails[0]['question'].'"/>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Answer</label>
                                    <div class="col-sm-7">
                                        <textarea rows="6" class="form-control" name="ans">'.$faqDetails[0]['answer'].'</textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Status</label>
                                    <div class="col-sm-4">
                                        <select name="status" class="form-control">
                                        	<option value="1"'; if($faqDetails[0]['status'] == 1) { echo 'selected="selected"'; } echo '>Active</option>
                                            <option value="0"'; if($faqDetails[0]['status'] == 0) { echo 'selected="selected"'; } echo '>Deactive</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-7 col-sm-offset-3">
                                    	<input type="hidden" name="id" value="'.$faqDetails[0]['id'].'" />
										<input type="hidden" name="fn" value="'.md5('edit_faq').'" />
                                        <input type="submit" class="btn btn-success btn-lg" value="UPDATE" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>';
			}
		}
		
		/*
		- method for getting mypage list
		- Auth: Dipanjan
		*/
		function getMypageList()
		{
			//get values from database
			$pageList = $this->manage_content->getValue('mypage','*');
			if(!empty($pageList[0]))
			{
				foreach($pageList as $page)
				{
					//getting status
					if($page['status'] == 1)
					{
						$cur_status = '<button class="btn btn-success">Activated</button>';
						$form_Action = '<input type="hidden" name="id" value="'.$page['page_id'].'" />
										<input type="hidden" name="action" value="0" />
										<input type="submit" class="btn btn-danger" value="Deactivate" />';
					}
					else
					{
						$cur_status = '<button class="btn btn-danger">Deactivated</button>';
						$form_Action = '<input type="hidden" name="id" value="'.$page['page_id'].'" />
										<input type="hidden" name="action" value="1" />
										<input type="submit" class="btn btn-success" value="Activate" />';
					}
					//showing the result
					echo '<tr>
							<td>'.$page['page_id'].'</td>
							<td>'.$page['page_name'].'</td>
							<td><a href="addPage.php?id='.$page['page_id'].'&action=edit"><button class="btn btn-info">Edit Details</button></a></td>
							<td>'.$cur_status.'</td>
							<td>
								<form action="v-includes/class.formData.php" method="post">
									<input type="hidden" name="fn" value="'.md5('action_page').'" />
									'.$form_Action.'
								</form>
							</td>
						</tr>';
				}
			}
		}
		
		/*
		- method for getting mypage details
		- Auth: Dipanjan
		*/
		function getMyPageDetails($id)
		{
			//get values from database
			$pageValue = $this->manage_content->getValue_where('mypage','*','page_id',$id);
			if(!empty($pageValue[0]))
			{
				echo '<div class="panel-heading"><i class="fa fa-edit fa-fw"></i> Edit MyPage Details</div>
                        <div class="panel-body">
                        	<form action="v-includes/class.formData.php" role="form" method="post">
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Page Title</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name" value="'.$pageValue[0]['page_name'].'"/>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Page Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="des" id="editor1">'.$pageValue[0]['page_content'].'</textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Status</label>
                                    <div class="col-sm-4">
                                        <select name="status" class="form-control">
                                        	<option value="1"'; if($pageValue[0]['status'] == 1) { echo 'selected="selected"'; } echo '>Active</option>
                                            <option value="0"'; if($pageValue[0]['status'] == 0) { echo 'selected="selected"'; } echo '>Deactive</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-7 col-sm-offset-3">
                                    	<input type="hidden" name="id" value="'.$pageValue[0]['page_id'].'" />
										<input type="hidden" name="fn" value="'.md5('edit_page').'" />
                                        <input type="submit" class="btn btn-success btn-lg" value="UPDATE" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>';
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
	}
	
?>