<?php
	session_start();
	$pageTitle = 'Add Sub-Category';
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
                    <h1 class="page-header">Add New Sub-Category</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                	<div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-plus-circle fa-fw"></i> Add Sub-Category</div>
                        <div class="panel-body">
                        	<form action="v-includes/class.formData.php" role="form" method="post">
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Sub-Category Name</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="name" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Category</label>
                                    <div class="col-sm-7">
                                        <?php
			                        		//skills in the system
			                        		$manageContent->getCategorySelect();
			                        	?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Sub-Category Skills</label>
                                    <div class="col-sm-7">
                                        <?php
			                        		//skills in the system
			                        		$manageContent->getSkillsSelect();
			                        	?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-7 col-sm-offset-3">
                                    	<input type="hidden" name="fn" value="<?php echo md5('add_subcategory') ?>" />
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
            <div class="row">
            	<div class="col-lg-12">
                	<div class="panel panel-default">
                        <div class="panel-heading"><i class="fa fa-plus-circle fa-fw"></i> Current Sub-Categorys on the system(Click to Edit)</div>
                        <div class="panel-body">
                        	<?php
                        		//skills in the system
                        		$manageContent->getSubCategorys();
                        	?>
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
