<?php
	session_start();
	$pageTitle = 'Add Survey';
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
                    <h1 class="page-header">Add New Survey</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12">
                	<form action="v-includes/class.formData.php" role="form" method="post">
                        <div class="panel panel-default">
                            <div class="panel-heading"><i class="fa fa-plus-circle fa-fw"></i> Add Survey Details</div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label p_label col-sm-3">Survey Set No</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="set_no" readonly="readonly" value="<?php echo $manageContent->getNewSurveyNumber(); ?>"/>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-group" id="accordion">
                        	<div class="panel panel-default">
                            	<div class="panel-heading">
                                	<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-question-circle fa-fw"></i> Question No 1</h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                	<div class="panel-body">
                                    	<div class="form-group">
                                            <label class="control-label p_label col-sm-3">Survey Question 1</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ques1" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">1st Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans1[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">2nd Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans1[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">3rd Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans1[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">4th Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans1[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                            	<div class="panel-heading">
                                	<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-question-circle fa-fw"></i> Question No 2</h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                	<div class="panel-body">
                                    	<div class="form-group">
                                            <label class="control-label p_label col-sm-3">Survey Question 2</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ques2" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">1st Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans2[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">2nd Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans2[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">3rd Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans2[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">4th Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans2[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                            	<div class="panel-heading">
                                	<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="fa fa-question-circle fa-fw"></i> Question No 3</h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                	<div class="panel-body">
                                    	<div class="form-group">
                                            <label class="control-label p_label col-sm-3">Survey Question 3</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ques3" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">1st Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans3[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">2nd Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans3[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">3rd Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans3[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">4th Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans3[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                            	<div class="panel-heading">
                                	<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><i class="fa fa-question-circle fa-fw"></i> Question No 4</h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse">
                                	<div class="panel-body">
                                    	<div class="form-group">
                                            <label class="control-label p_label col-sm-3">Survey Question 4</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ques4" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">1st Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans4[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">2nd Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans4[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">3rd Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans4[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">4th Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans4[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                            	<div class="panel-heading">
                                	<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><i class="fa fa-question-circle fa-fw"></i> Question No 5</h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse">
                                	<div class="panel-body">
                                    	<div class="form-group">
                                            <label class="control-label p_label col-sm-3">Survey Question 5</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ques5" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">1st Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans5[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">2nd Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans5[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">3rd Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans5[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">4th Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans5[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                            	<div class="panel-heading">
                                	<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseSix"><i class="fa fa-question-circle fa-fw"></i> Question No 6</h4>
                                </div>
                                <div id="collapseSix" class="panel-collapse collapse">
                                	<div class="panel-body">
                                    	<div class="form-group">
                                            <label class="control-label p_label col-sm-3">Survey Question 6</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ques6" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">1st Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans6[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">2nd Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans6[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">3rd Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans6[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">4th Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans6[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                            	<div class="panel-heading">
                                	<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven"><i class="fa fa-question-circle fa-fw"></i> Question No 7</h4>
                                </div>
                                <div id="collapseSeven" class="panel-collapse collapse">
                                	<div class="panel-body">
                                    	<div class="form-group">
                                            <label class="control-label p_label col-sm-3">Survey Question 7</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ques7" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">1st Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans7[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">2nd Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans7[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">3rd Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans7[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">4th Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans7[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                            	<div class="panel-heading">
                                	<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseEight"><i class="fa fa-question-circle fa-fw"></i> Question No 8</h4>
                                </div>
                                <div id="collapseEight" class="panel-collapse collapse">
                                	<div class="panel-body">
                                    	<div class="form-group">
                                            <label class="control-label p_label col-sm-3">Survey Question 8</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ques8" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">1st Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans8[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">2nd Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans8[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">3rd Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans8[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">4th Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans8[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                            	<div class="panel-heading">
                                	<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseNine"><i class="fa fa-question-circle fa-fw"></i> Question No 9</h4>
                                </div>
                                <div id="collapseNine" class="panel-collapse collapse">
                                	<div class="panel-body">
                                    	<div class="form-group">
                                            <label class="control-label p_label col-sm-3">Survey Question 9</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ques9" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">1st Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans9[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">2nd Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans9[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">3rd Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans9[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">4th Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans9[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                            	<div class="panel-heading">
                                	<h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseTen"><i class="fa fa-question-circle fa-fw"></i> Question No 10</h4>
                                </div>
                                <div id="collapseTen" class="panel-collapse collapse">
                                	<div class="panel-body">
                                    	<div class="form-group">
                                            <label class="control-label p_label col-sm-3">Survey Question 10</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ques10" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">1st Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans10[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">2nd Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans10[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">3rd Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans10[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label p_label col-sm-3">4th Answer</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="ans10[]" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-7 col-sm-offset-3">
                                                <input type="hidden" name="fn" value="<?php echo md5('add_survey') ?>" />
                                                <input type="submit" class="btn btn-success btn-lg" value="SUBMIT" />
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
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
