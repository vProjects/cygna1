<?php
	session_start();
	$pageTitle = 'Poll List';
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
                    <h1 class="page-header">Poll List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                	<div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-tasks fa-fw"></i> List Of Polling Details</div>
                        <div class="panel-body">
                        	<div class="table-responsive">
                            	<table class="table table-bordered table-hover table-striped">
                                	<thead>
                                    	<tr>
                                        	<th>Set No</th>
                                            <th>Question</th>
                                            <th>Details</th>
                                            <th>Edit</th>
                                            <th>Current status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
											//getting poll list
											$manageContent->getPollingList();
										?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
	include 'v-templates/footer.php';
?>
