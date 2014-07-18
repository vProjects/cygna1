<?php
	session_start();
	$pageTitle = 'Faq';
	include ('v-templates/header.php');
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
        	<div class="col-md-10 profile_left_part_outline">
            	<div class="advertisement_body_outline">
                	<h2 class="post_project_top_heading">Find Answers</h2>
                    <p class="post_project_top_para">Please write your question below. We will get back to you as early as possible.</p>
                    <form class="form-inline faq_form_outline" role="form">
                    	<input type="text" class="form-control faq_answer_search" id="faq_search_value" value="<?php if(isset($GLOBALS['_GET']['search_value'])) { echo $GLOBALS['_GET']['search_value']; } ?>"/>
                        <input type="button" class="btn btn-info" value="Search" id="faq_search_btn" />
                    </form>
                    <?php
						if(isset($GLOBALS['_GET']['p']))
						{
							$page = $GLOBALS['_GET']['p'];
						}
						else
						{
							$page = 0;
						}
						//getting faq page details
						if(isset($GLOBALS['_GET']['search_value']))
						{
							$search_value = $GLOBALS['_GET']['search_value'];
						}
						else
						{
							$search_value = '';
						}
						//calling the function
						$manageContent->getFaqContent($page,$search_value);
					?>
                    
                </div>
            </div>
            <!-- body left section ends here -->
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
<?php
	if(isset($GLOBALS['_COOKIE']['uid']) || isset($_SESSION['user_id']))
	{
		include 'v-templates/post-footer.php';
	}
	else
	{
		include 'v-templates/footer.php';
	}
?>
