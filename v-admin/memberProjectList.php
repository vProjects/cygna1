<?php
	session_start();
	$pageTitle = 'Project List';
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
                    <h1 class="page-header">Project List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                	<div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-list fa-fw"></i> List Of Project Posted</div>
                        <div class="panel-body">
                        	<?php
								if(isset($GLOBALS['_GET']['uid']))
								{
									//getting the project details
									$manageContent->getMemberProjectDetails($GLOBALS['_GET']['uid']);
								}
								else
								{
									echo '<h3 class="project_list_heading">No Rresult Found</h3>';
								}
							?>
                        </div>
                    </div>
                    <!-- previous page link -->
                   <p class="previous_page_link"><a href="user-list.php?uid=<?php echo $GLOBALS['_GET']['uid']; ?>">back to previous page</a></p>
                   
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
