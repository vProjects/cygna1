<?php
	session_start();
	$pageTitle = 'Add Poll';
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
                    <h1 class="page-header">Add New Poll</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                	<div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-plus-circle fa-fw"></i> Add Polling Details</div>
                        <div class="panel-body">
                        	<form action="v-includes/class.formData.php" role="form" method="post">
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Polling Set No</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="set_no" readonly="readonly" value="<?php echo $manageContent->getNewPollNumber(); ?>"/>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Poll Question</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="ques" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">1st Answer</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="ans[]" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">2nd Answer</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="ans[]" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">3rd Answer</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="ans[]" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">4th Answer</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="ans[]" />
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
                                    	<input type="hidden" name="fn" value="<?php echo md5('add_poll') ?>" />
                                        <input type="submit" class="btn btn-success btn-lg" value="SUBMIT" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
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
