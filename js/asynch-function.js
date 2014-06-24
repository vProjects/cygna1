// JavaScript Document
/*
	Vyrazu Labs
	Author: Dipanjan Bagchi
	Email: dipanjan@vyrazu.com
*/

//method for ajax call from UI form
function sendingRequest(sendingData,returningPlace){
	$.ajax({
		type: "POST",
		url:"v-includes/class.fetchData.php",
		data: sendingData,
		beforeSend:function(){
			// this is where we append a loading image
			$('').html('');
		  },
		success:function(result){
			console.log(result);
			$(returningPlace).html(result);
			return false;
	}});
}

//selecting the email id from textbox
$(document).ready(function(e) {
    $('#signup_email_id').change(function() {
		var email_id = $('#signup_email_id').val();
		sendingData = 'email='+email_id+'&refData=emailChecking';
		$('#err_signup_email_id').css('display','block');
		//calling ajax function
		$.ajax({
			type: "POST",
			url:"v-includes/class.fetchData.php",
			data: sendingData,
			beforeSend:function(){
				// this is where we append a loading image
				$('').html('');
			  },
			success:function(result){
				if(result == 1)
				{
					$('#err_signup_email_id').html('**Email Id Already Exists');
					$('#signup_email_id').val('');
					$('#signup_email_id').focus(function() { 
						$('#err_signup_email_id').fadeOut(500);
					});
					
				}
				return false;
		}});
	});
	
	$('#signup_username').change(function() {
		var username = $('#signup_username').val();
		sendingData = 'username='+username+'&refData=usernameChecking';
		$('#err_signup_username').css('display','block');
		//calling ajax function
		$.ajax({
			type: "POST",
			url:"v-includes/class.fetchData.php",
			data: sendingData,
			beforeSend:function(){
				// this is where we append a loading image
				$('').html('');
			  },
			success:function(result){
				if(result == 1)
				{
					$('#err_signup_username').html('**Username Already Exists');
					$('#signup_username').val('');
					$('#signup_username').focus(function() { 
						$('#err_signup_username').fadeOut(500);
					});
				}
				return false;
		}});
	});
	
	//checking for password character lenght
	$('#signup_password').change(function(e) {
        var pasLen = $(this).val().length;
		//alert(pasLen);
		if(pasLen < 6)
		{
			$('#err_signup_password').html('**Password Must Have Minimum 6 Characters');
			$('#signup_password').val('');
			$('#signup_password').focus(function(e) {
                $('#err_signup_password').fadeOut(500);
            });
			return false;
		}
    });
	
	//getting project sub category
	$('#pro_category').change(function(e) {
        var cat = $(this).val();
		sendingData = 'category='+cat+'&refData=gettingSubCategory';
		
		//calling ajax function
		$.ajax({
			type: "POST",
			url:"v-includes/class.fetchData.php",
			data: sendingData,
			beforeSend:function(){
				// this is where we append a loading image
				$('').html('');
			  },
			success:function(result){
				$('#pro_sub_category').fadeIn(500);
				$('#pro_sub_category').html(result);
				return false;
		}});
    });
	
	//setting work type for post project
	$('#pp_work_type').change(function(e) {
        var work_type = $(this).val();
		//checking for not null value
		if(work_type != null)
		{
			sendingData = 'work_type='+work_type+'&refData=gettingWorkTypeDetails';
			//calling ajax function
			$.ajax({
				type: "POST",
				url:"v-includes/class.fetchData.php",
				data: sendingData,
				beforeSend:function(){
					// this is where we append a loading image
					$('').html('');
				  },
				success:function(result){
					$('#pp_form_work_type').html(result);
					return false;
			}});
		}
    });
	
	/*
		method for showing the custom price range in post project form 
		Auth: Dipanjan
	*/
	
	$(document).on("change", "#hourly_rate_list", function(){
		if($(this).val() == 'custom_price_hourly')
		{
			$('#pp_hourly_manual_rate').css('display','block');
		}
		else
		{
			$('#pp_hourly_manual_rate').css('display','none');
		}
	});
	
	$(document).on("change", "#fixed_rate_list", function(){
		if($(this).val() == 'custom_price_fixed')
		{
			$('#pp_fixed_manual_rate').css('display','block');
		}
		else
		{
			$('#pp_fixed_manual_rate').css('display','none');
		}
	});
	
	//getting the crop image details for profile image
	$('#pro_pic_crop').click(function(e) {
        var img_src = $('#pro_pic_preview img').attr('src');
		var pro_x = $('#pro_x').val();
		var pro_y = $('#pro_y').val();
		var pro_w = $('#pro_w').val();
		var pro_h = $('#pro_h').val();
		var pro_x2 = $('#pro_x2').val();
		var pro_y2 = $('#pro_y2').val();
		
		sendingData = 'src='+img_src+'&pro_x='+pro_x+'&pro_y='+pro_y+'&pro_w='+pro_w+'&pro_h='+pro_h+'&pro_x2='+pro_x2+'&pro_y2='+pro_y2+'&refData=gettingProfileCrop';
		
		//calling ajax function
		$.ajax({
			type: "POST",
			url:"v-includes/class.fetchData.php",
			data: sendingData,
			beforeSend:function(){
				// this is where we append a loading image
				$('').html('');
			  },
			success:function(result){
				console.log(result);
				return false;
		}});
    });
	
	
	//inserting survey feddback report
	$('#survey_feddback').click(function(e) {
        //get feedback value
		var feedback = $('#survey_report').val();
		if(feedback != null)
		{
			sendingData = 'feedback='+feedback+'&refData=insertFeedbackReport';
			//calling ajax function
			$.ajax({
				type: "POST",
				url:"v-includes/class.fetchData.php",
				data: sendingData,
				beforeSend:function(){
					// this is where we append a loading image
					$('').html('');
				  },
				success:function(result){
					location.reload();
					return false;
			}});
		}
		
    });
	
	//inserting polling value
	$('#poll_report').click(function(e) {
        //getting polling set no
		var set_no = $('.poll-box').children('.col-md-12').children('p').attr('id');
		//getting polling answer
		var radio_name = $('.poll_radio_button').attr('name');
		var ans = $('input[name='+radio_name+']:checked').val();
		
		if(ans != null)
		{
			sendingData = 'set_no='+set_no+'&answer='+ans+'&refData=insertPollingAnswer';
			//calling ajax function
			$.ajax({
				type: "POST",
				url:"v-includes/class.fetchData.php",
				data: sendingData,
				beforeSend:function(){
					// this is where we append a loading image
					$('').html('');
				  },
				success:function(result){
					//fade out the poll part
					$('#poll_outline').fadeOut(500);
					return false;
			}});
		}
    });
	
	//awarding bid for a project
	$('#award_bid').click(function(e) {
       //get page url
	   var pageurl = window.location.href;
	   //calculating last occurance of '/' character
	   var lastsl = pageurl.lastIndexOf("/");
	   var lastqu = pageurl.lastIndexOf("?");
	   var pagename = pageurl.substring((lastsl+1),lastqu);
	   //console.log(pagename);
	   //checking the page name
	   if(pagename == 'userProjectFullBidDetails.php')
	   {
		   //getting the bid id
		   var lasteq = pageurl.lastIndexOf("=");
		   var bid_id = pageurl.substring((lasteq+1));
		   
		   sendingData = 'bid_id='+bid_id+'&refData=awardBid';
			//calling ajax function
			$.ajax({
				type: "POST",
				url:"v-includes/class.fetchData.php",
				data: sendingData,
				beforeSend:function(){
					// this is where we append a loading image
					$('').html('');
				  },
				success:function(result){
					location.reload();
					return false;
			}});
	   }
    });
	
	//searching faq answer
	$('#faq_search_btn').click(function(e) {
        var faq_value = $('#faq_search_value').val();
		//sending the page to faq page
		window.location.href = 'faq.php?search_value='+faq_value;
    });
	
	
});