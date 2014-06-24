<?php
	session_start();
	$pageTitle = 'Withdraw';
	if(!isset($GLOBALS['_COOKIE']['uid']) && !isset($_SESSION['user_id']))
	{
		header("Location: log_in.php");
	}
	include ("v-templates/header.php");

?>
<?php
	//including post header to this page
	include ("v-templates/post-header.php");
?>
<!-- body starts here -->
<div id="profile_body_outline">
	
    <!-- div for showing success message--->
	<div class="alert alert-success" id="success_msg"></div>
	<!-- div for showing warning message--->
	<div class="alert alert-danger" id="warning_msg"></div>
    

	<div class="container">
    	<div class="row profile_body_row">
        	<!-- body left section starts here -->
        	<div class="col-md-3 profile_left_part_outline">
                <div class="profile_box_outline project_list_leftbar_outline">
                	<div class="profile_box_heading">WORKROOM</div>
                    <ul class="profile_overview">
                    	<li><a href="message.php">Message</a></li>
                        <li><a href="escrow.php">Milestones</a></li>
                        <li><a href="#">Files</a></li>
                        <li><a href="post_bid.php">My Proposal</a></li>
                        <li><a href="#">Billings & Invoice</a></li>
                    </ul>
                </div>
                <div class="profile_box_outline">
                	<div class="profile_box_heading">RUNNING PROJECTS</div>
                    <ul class="profile_overview">
                    	<li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Lorem Ipsum</a></li>
                    </ul>
                </div>
            </div>
            <!-- body left section ends here -->
            <!-- body middle section starts here -->
            <div class="col-md-7 profile_middle_part_outline">
            	<div class="profile_box_outline billing_box_outline">
                	<div class="profile_box_heading">ESCROW PAGE</div>
                    <div class="billing_box_inner">
                    	<div class="billing_page_heading">Escrow and Release Information</div>
                        <div class="billing_info_outline">
                        
                            <div class="col-md-4 pull-left billing_info_left_part">
                                <p class="billing_info_para">
                                    <span class="billing_info_heading">Client:</span>
                                    <span class="billing_info_text">Lorem Ipsum</span>
                                </p>
                                <p class="billing_info_para">
                                    <span class="billing_info_heading">Type:</span>
                                    <span class="billing_info_text">Fixed</span>
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
                                    <span class="billing_info_text">$3000</span>
                                </p>
                                <p class="billing_info_para">
                                    <span class="billing_info_heading">Escrow Amount:</span>
                                    <span class="billing_info_text">$7000</span>
                                </p>
                                <p class="billing_info_para">
                                    <span class="billing_info_heading">Released Amount:</span>
                                    <span class="billing_info_text">$3000</span>
                                </p>
								<p class="tax-txt"><a href="#">Enter TAX or VAT Id information</a></p>
                            </div>
                            <div class="col-md-12 billing_details_table_outline">
                                <table class="table table-hover table-responsive billing_details_table">
                                    <thead>
                                        <tr>
                                            <th>Milestone</th>
											<th>Note</th>
                                            <th>Date</th>
                                            <th>Contract Amount</th>
                                            <th>Fund Escrow</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Home Page</td>
											<td><span class="glyphicon glyphicon-file" data-toggle="modal" data-target=".bs-example-modal-sm"></span></td>
                                            <td>dd-mm-yyyy</td>
                                            <td><button class="btn btn-sm btn-success">Release</button></td>
                                            <td><button class="btn btn-sm btn-info">fund</button></td>
                                        </tr>
                                        <tr>
                                            <td>Profile Page</td>
											<td><span class="glyphicon glyphicon-file" data-toggle="modal" data-target=".bs-example-modal-sm1"></span></td>
                                            <td>dd-mm-yyyy</td>
                                            <td>$3000</td>
											<td><span class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Setting page</td>
											<td><span class="glyphicon glyphicon-file" data-toggle="modal" data-target=".bs-example-modal-sm2"></span></td>
                                            <td>dd-mm-yyyy</td>
                                            <td><button class="btn btn-sm btn-success">Release</button></td>
                                            <td><button class="btn btn-sm btn-info">fund</button></td>
                                        </tr>
										
                                         <tr>
                                            <td>Other Page</td>
											<td><span class="glyphicon glyphicon-file" data-toggle="modal" data-target=".bs-example-modal-sm3"></span></td>
                                            <td>dd-mm-yyyy</td>
                                            <td>$7000</td>
											<td><span class="glyphicon glyphicon-ok"></span></td>
                                        </tr>
										
                                    </tbody>
                                </table>
                            </div>
							<div class="col-md-12">
								<div class="add-milstone">
									<button class="btn btn-default" data-toggle="modal" data-target=".milestone">Add milestone</button>
								</div>
							</div>
                            <div class="clearfix"></div>
                            
                        </div>
                        <p class="billing_bottom_para">If you have any query feel free to contact us our billing team.</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- body middle section ends here -->
        	<!-- body right section starts here -->
            <div class="col-md-2 profile_right_part_outline">
            	<div class="add_place_outline"></div>
                <div class="add_place_outline"></div>
            </div>
            <!-- body right section ends here -->
        </div>
    </div>
</div>
<!-- body ends here -->
<!-- footer starts here -->
<?php
	include 'v-templates/post-footer.php';
?>
<!-- footer ends here -->
<!-- modal starts here -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-header custom-hmodals">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="mySmallModalLabel">Lorem ipsum</h4>
        </div>
        <div class="modal-body">
         If you have any query feel free to contact us our billing team.If you have any query feel free to contact us our billing team.If you have any query feel free to contact us our billing team.
        </div>
      </div><!-- /.modal-content -->
    </div>
    </div>
	<div class="modal fade bs-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-header custom-hmodals">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="mySmallModalLabel">Lorem ipsum</h4>
        </div>
        <div class="modal-body">
         If you have any query feel free to contact us our billing team.If you have any query feel free to contact us our billing team.If you have any query feel free to contact us our billing team.
        </div>
      </div><!-- /.modal-content -->
    </div>
    </div>
	<div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-header custom-hmodals">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="mySmallModalLabel">Lorem ipsum</h4>
        </div>
        <div class="modal-body">
         If you have any query feel free to contact us our billing team.If you have any query feel free to contact us our billing team.If you have any query feel free to contact us our billing team.
        </div>
      </div><!-- /.modal-content -->
    </div>
    </div>
	<div class="modal fade bs-example-modal-sm3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
      <div class="modal-content">

        <div class="modal-header custom-hmodals">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="mySmallModalLabel">Lorem ipsum</h4>
        </div>
        <div class="modal-body">
         If you have any query feel free to contact us our billing team.If you have any query feel free to contact us our billing team.If you have any query feel free to contact us our billing team.
        </div>
      </div><!-- /.modal-content -->
    </div>
	</div>
<div class="modal fade milestone" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header custom-hmodals">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="mySmallModalLabel">Lorem ipsum</h4>
        </div>
        <div class="modal-body">
					<form class="form-horizontal" role="form">
						  <div class="form-group">
							<label class="col-sm-5 control-label custom-chk">Milestone Name:</label>
							<div class="col-sm-7">
							  <input type="text" class="form-control" id="inputmilestone">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-5 control-label custom-chk">Milestone Description: </label>
							<div class="col-sm-7">
							 <textarea class="form-control" rows="2"></textarea>
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-sm-5 control-label custom-chk">Date Of Subscription: </label>
							<div class="col-sm-2">
							 <select class="form-control">
							  <option>1</option>
							  <option>2</option>
							  <option>3</option>
							  <option>4</option>
							  <option>5</option>
							  <option>6</option>
							  <option>7</option>
							  <option>8</option>
							  <option>9</option>
							  <option>10</option>
							  <option>11</option>
							  <option>12</option>
							  <option>13</option>
							  <option>14</option>
							  <option>15</option>
							  <option>16</option>
							  <option>17</option>
							  <option>18</option>
							  <option>19</option>
							  <option>20</option>
							  <option>21</option>
							  <option>22</option>
							  <option>23</option>
							  <option>24</option>
							  <option>25</option>
							  <option>26</option>
							  <option>27</option>
							  <option>28</option>
							  <option>29</option>
							  <option>30</option>
							  <option>31</option>
							</select>
							</div>
							
							<div class="col-sm-2">
							 <select class="form-control">
							 <option>Jan</option>
							 <option>Feb</option>
							 <option>Mar</option>
							 <option>Apr</option>
							 <option>May</option>
							 <option>Jun</option>
							 <option>jul</option>
							 <option>Aug</option>
							 <option>Sep</option>
							 <option>Oct</option>
							 <option>Nov</option>
							 <option>Dec</option>
							 </select>
							</div>
							<div class="col-sm-3">
								<select class="form-control">
									 <option>2013</option>
									 <option>2014</option>
								</select>
							</div>
							
						
							 <div class="form-group">
								<div class="col-sm-offset-5 col-sm-7">
								 <button class="btn btn-primary btn-add">Add</button>
								</div>
							</div>
						</div>
					</form>
		</div>
	</div><!-- /.modal-content -->
   </div>
</div>
	

<!-- modal ends here -->
</body>
</html>
