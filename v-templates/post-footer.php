<!-- footer starts here -->

<div id="profile_footer_outline">
	<div class="container">
    	<div class="row profile_footer_row">
        </div>
    </div>
</div>
<!-- footer ends here -->
<?php
	//checking for session variable and showing the result
	if(isset($_SESSION['success']))
	{
		echo '<script type="text/javascript">alertSuccess("'.$_SESSION['success'].'");</script>';
		unset($_SESSION['success']);
	}
	else if(isset($_SESSION['warning']))
	{
		echo '<script type="text/javascript">alertWarning("'.$_SESSION['warning'].'");</script>';
		unset($_SESSION['warning']);
	}
?>
<script type="text/javascript">
	$('#per_date').datepick({
		dateFormat: 'yyyy-mm-dd',
		minDate: new Date(1900, 1 - 1, 01), 
    	maxDate: new Date(),
		yearRange: '1900:2014',
		showTrigger: '#calImg'
	});
	
	$('.date_range').datepick({
		dateFormat: 'yyyy-mm-dd',
		minDate: new Date(1900, 1 - 1, 01), 
    	maxDate: new Date(),
		yearRange: '1900:2014',
		showTrigger: '#calImg'
	});
	
	$('.extend_date').datepick({
		dateFormat: 'yyyy-mm-dd', 
    	minDate: new Date(),
		maxDate: '+3m',
		showTrigger: '#calImg'
	});
</script>
</body>
</html>