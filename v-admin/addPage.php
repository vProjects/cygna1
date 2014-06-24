<?php
	session_start();
	$pageTitle = 'Add Page';
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
                    <h1 class="page-header">MyPage Details</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                	<div class="panel panel-default">
                    	<?php
							if(isset($GLOBALS['_GET']['id']) && $GLOBALS['_GET']['action'] == 'edit')
							{
								$manageContent->getMyPageDetails($GLOBALS['_GET']['id']);
							}
							else
							{
						?>
                        <div class="panel-heading"><i class="fa fa-plus-circle fa-fw"></i> Add MyPage Details</div>
                        <div class="panel-body">
                        	<form action="v-includes/class.formData.php" role="form" method="post">
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Page Title</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Page Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="des" id="editor1"></textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Status</label>
                                    <div class="col-sm-4">
                                        <select name="status" class="form-control">
                                        	<option value="1">Active</option>
                                            <option value="0">Deactive</option>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-7 col-sm-offset-3">
                                    	<input type="hidden" name="fn" value="<?php echo md5('add_page') ?>" />
                                        <input type="submit" class="btn btn-success btn-lg" value="SUBMIT" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                        <?php } ?>
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
