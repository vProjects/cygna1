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
<script type="text/javascript">
	function sendmsg(txt_id,bid_id)
	{
		var msg = document.getElementById(txt_id).value;
		if( msg != "" )
		{
			$.ajax({
			  url: "v-includes/class.fetchData.php",
			  type: "POST",
			  data: "msg="+msg+"&bid="+bid_id+"&refData=postMsg"
			}).success(function(data) {
			  alert(data);
			  document.getElementById(txt_id).value = "";
			});
		}
		else
		{
			alert('Please type a message.');
		}
			
	}
	
// 	
	// function getMessage()
	// {
		// var bid = <?php //echo "'".$_GET['bid']."'"; ?>;
// 		
		// if( bid != "" )
		// {
			// $.ajax({
			  // url: "v-includes/class.fetchData.php",
			  // type: "POST",
			  // data: "bid="+bid+"&refData=getMsg"
			// }).success(function(data) {
			  // alert(data);
			// });
		// }
		// else
		// {
			// alert('Error in fetching previous message.');
		// }
	// }
	
	function acceptit(bid)
	{
		if( bid != "" )
		{
			$.ajax({
			  url: "v-includes/class.fetchData.php",
			  type: "POST",
			  data: "bid="+bid+"&refData=acceptJob"
			}).success(function(data) {
				if( data != "" )
				{
			  		alert(data);
			  		window.location = "";		
				}
			});
		}
	}
	
	function declineit(bid)
	{
		if( bid != "" )
		{
			$.ajax({
			  url: "v-includes/class.fetchData.php",
			  type: "POST",
			  data: "bid="+bid+"&refData=declineJob"
			}).success(function(data) {
			  	if( data != "" )
				{
			  		alert(data);
			  		window.location = "";			
				}
			});
		}
	}
</script>
</body>
</html>