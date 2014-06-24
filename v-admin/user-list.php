<?php
	session_start();
	$pageTitle = 'Member List';
	include 'v-templates/header.php';
?>
	<?php
		include 'v-templates/left_sidebar.php';
	?>
        <div id="page-wrapper">
        	<!-- div for showing success message--->
            <div class="alert alert-success" id="success_msg"></div>
            <!-- div for showing warning message--->
            <div class="alert alert-danger" id="warning_msg"></div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Member List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
            	<div class="col-lg-8">
                	
                    <div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-search fa-fw"></i> Member Search</div>
                        <div class="panel-body">
                        	<form role="form">
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Search Value</label>
                                    <div class="col-sm-8">
                                        <input type="text" id="search_value" class="form-control"/>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Search Column</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="search_column">
                                        	<option value="name">Name</option>
                                            <option value="email_id">Email Id</option>
                                            <option value="username">Username</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-8 col-sm-offset-3">
                                        <input type="button" value="Search" id="user_search" class="btn btn-primary"/>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.panel -->
                    
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                	<div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-tasks fa-fw"></i> Options</div>
                        <div class="panel-body">
                        	<div class="list-group list_item">
                            	<div class="list-group-item"><i class="fa fa-money fa-fw"></i> New 20 User</div>
                                <div class="list-group-item"><i class="fa fa-money fa-fw"></i> Top 20 User</div>
                                <div class="list-group-item"><i class="fa fa-money fa-fw"></i> Deactivated User</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
            	<div class="col-lg-12">
                	<div class="table-responsive" id="member_list_fetch">
                        <?php
							if(isset($GLOBALS['_GET']['search_value']) && isset($GLOBALS['_GET']['search_column']))
							{
								$member_list = $manageContent->getMemberList($GLOBALS['_GET']);
							}
							else if(isset($GLOBALS['_GET']['uid']) && isset($GLOBALS['_GET']['action']))
							{
								$member_action = $manageContent->takingMemberAction($GLOBALS['_GET']);
							}
							else if(isset($GLOBALS['_GET']['uid']))
							{
								$member_action = $manageContent->getMemberListFromUserId($GLOBALS['_GET']['uid']);
							}
						?>
                    </div>
                    <!-- /.table -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
	include 'v-templates/footer.php';
?>
