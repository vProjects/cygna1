<?php
	session_start();
	$pageTitle = 'Poll Details';
	include 'v-templates/header.php';
?>
	<?php
		include 'v-templates/left_sidebar.php';
	?>
    <?php
		if(isset($GLOBALS['_GET']['action']) && isset($GLOBALS['_GET']['set_no'])) 
		{ 
			$action = $GLOBALS['_GET']['action'];
			$set_no = $GLOBALS['_GET']['set_no'];
	?>
        <div id="page-wrapper">
        	<!-- div for showing success message--->
            <div class="alert alert-success" id="success_msg"></div>
            <!-- div for showing warning message--->
            <div class="alert alert-danger" id="warning_msg"></div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Poll Details</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                	<div class="panel panel-default">
						<?php
							if($action == 'details')
							{
								//getting values
								$manageContent->getPollingResult($set_no);
							}
							else if($action == 'edit')
							{
								//getting editing values
								$manageContent->getPollEdit($set_no);
							}
							
						?>
                    </div>	
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
		} //end of if condition
	include 'v-templates/footer.php';
?>
