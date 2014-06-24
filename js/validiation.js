// JavaScript Document
//for form validation author DIPANJAN
//function for form validations
function validateRequiredField(id_name,err_id)
{
	var x = document.getElementById(id_name).value;
	if(x == "")
	{
		//make the background color red
		document.getElementById(id_name).style.backgroundColor = '#F6D3D3';
		//showing the msg
		document.getElementById(err_id).innerHTML = '**Please Fill Up The Field';
		document.getElementById(err_id).style.color = 'red';
		result = 0;
		//document.getElementById('btn_submit').disabled = 'true';
		exit();
	}
	else
	{
		//make the background color normal if valid
		document.getElementById(id_name).style.backgroundColor = '#ffffff';
		result = 1;
	}
}
//function for form validations of empty text
function validateTextField(id_name,err_id)
{
	var x = document.getElementById(id_name).innerHTML;
	if(x == "")
	{
		//make the background color red
		document.getElementById(id_name).style.backgroundColor = '#F6D3D3';
		//showing the msg
		document.getElementById(err_id).innerHTML = '**Please Fill Up The Field';
		document.getElementById(err_id).style.color = 'red';
		result = 0;
		//document.getElementById('btn_submit').disabled = 'true';
		exit();
	}
	else
	{
		//make the background color normal if valid
		document.getElementById(id_name).style.backgroundColor = '#ffffff';
		result = 1;
	}
}
//function for checking valid email
function validateEmail(id_name)
{
	var textbx = document.getElementById(id_name);
	var input_value = document.getElementById(id_name).value;
	//check the field is empty
	if(input_value == "")
	{
		textbx.style.backgroundColor = '#F6D3D3';
		result = 0;
	}
	//If not empty then check for email validation
	else
	{
		var x=input_value;
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
		{
			alert("Invalid Email");
			textbx.style.backgroundColor = '#F6D3D3';
			result = 0;
  		}
		else
		{
			textbx.style.backgroundColor = '#ffffff';
			result = 1;
		}
	}
}

//function for checkbox validiation
function validiateSelectbox(id_name,err_id){
	var check = document.getElementById(id_name).checked;
	
	if(check == false)
	{
		document.getElementById(err_id).innerHTML = '**Please Select The Select Box';
		document.getElementById(err_id).style.color = 'red';
		exit();
	}
}
//function for validiation of radiobutton
function validiateRadio(radio1,radio2,err_id){
	var radio_button1 = document.getElementById(radio1).checked;
	var radio_button2 = document.getElementById(radio2).checked;
	
	if(radio_button1 == false && radio_button2 == false)
	{
		document.getElementById(err_id).innerHTML = '**Please Select One Option';
		document.getElementById(err_id).style.color = 'red';
		exit();
	}
}

//function for validiation of integer value
function validiateIntegerField(id_name,err_id){
	var x = document.getElementById(id_name).value;
	if(isNaN(x) != false || x == "")
	{
		//make the background color red
		document.getElementById(id_name).style.backgroundColor = '#F6D3D3';
		//showing the msg
		document.getElementById(err_id).innerHTML = '**Please Fill Up A Number';
		document.getElementById(err_id).style.color = 'red';
		result = 0;
		//document.getElementById('btn_submit').disabled = 'true';
		exit();
	}
	else
	{
		//make the background color normal if valid
		document.getElementById(id_name).style.backgroundColor = '#ffffff';
		result = 1;
	}
}

function checkResult(err_id)
{
	if(result == 0)
	{
		//alert('Please check '+alert_value);
		document.getElementById(err_id).innerHTML = '**Please Fill Up The Field';
		document.getElementById(err_id).style.color = 'red';
		//document.getElementById('btn_submit').disabled = 'true';
		exit();
	}
}
function checkResultEmail(err_id)
{
	if(result == 0)
	{
		//alert('Please check '+alert_value);
		document.getElementById(err_id).innerHTML = '**Please Fill Up The Field';
		document.getElementById(err_id).style.color = 'red';
		//document.getElementById('btn_submit').disabled = 'true';
		return 0;
	}
	else
	{
		return 1;
	}
}
function checkEmptyField(id_name_1)
{
	var y = document.getElementById(id_name_1).value;
	if(y == null || y == "")
	{
		document.getElementById(id_name_1).style.backgroundColor = "#000";
		document.getElementById('btn_submit').disabled = 'true';
		exit(); 
	}
}
function validateSignupForm(form_name)
{
	validateEmail('signup_email_id');
	checkResult('err_signup_email_id');
	validateRequiredField('signup_username','err_signup_username');
	validateRequiredField('signup_password','err_signup_password');
	validateRequiredField('signup_con_password','err_signup_con_password');
	validiateRadio('signup_employer','signup_contractor','err_signup_category');
	validiateSelectbox('signup_terms','err_signup_terms');
	//submit the contact form
	document.getElementById(form_name).submit();
}

//login form validiation
function validateLoginForm(form_name)
{
	validiateRadio('login_employer','login_contractor','err_login_radio');
	//submit the contact form
	document.getElementById(form_name).submit();
}

function validateProjectPostForm(form_name)
{
	validateRequiredField('err_postProject_category','postProject_category');
	validateRequiredField('postProject_name','err_postProject_name');
	validateRequiredField('postProject_description','err_postProject_description');
	validateRequiredField('postProject_skills','err_postProject_skills');
	validateRequiredField('postProject_price','err_postProject_price');
	//submit the contact form
	document.getElementById(form_name).submit();
}

//validiation of personal info form
function validiateUserPersonalForm(form_name)
{
	validateRequiredField('per_fname','err_per_fname');
	validateRequiredField('per_lname','err_per_lname');
	validateRequiredField('per_date','err_per_dob');
	validateRequiredField('per_con','err_per_con');
	validateRequiredField('per_addr1','err_per_addr1');
	validateRequiredField('per_pin','err_per_pin');
	validateRequiredField('per_city','err_per_city');
	validateRequiredField('per_state','err_per_state');
	validateRequiredField('per_country','err_per_country');
	//submit the contact form
	document.getElementById(form_name).submit();
}

//validiation of profile info form
function validiateUserProfileInfoForm(form_name)
{
	validateTextField('skills_list_value','err_pro_skill');
	validiateIntegerField('pro_hour','err_pro_hour');
	validateRequiredField('pro_des','err_pro_des');
	//submit the contact form
	document.getElementById(form_name).submit();
}

//validiation of contact us form
function validiateUserQueryForm(form_name)
{
	validateRequiredField('contact_name','err_contact_name');
	validateRequiredField('contact_phn','err_contact_phn');
	validateEmail('contact_email');
	checkResult('err_contact_email');
	validateRequiredField('contact_title','err_contact_title');
	validateRequiredField('contact_sub','err_contact_sub');
	validateRequiredField('contact_msg','err_contact_msg');
	//submit the contact form
	document.getElementById(form_name).submit();
}

//validiation of submit ticket form
function validiateUserTicketForm(form_name)
{
	validateRequiredField('ticket_title','err_ticket_title');
	validateRequiredField('ticket_sub','err_ticket_sub');
	validateRequiredField('ticket_msg','err_ticket_msg');
	//submit the contact form
	document.getElementById(form_name).submit();
}

/*
	method for alert warning message
	Auth: Dipanjan
*/

function alertWarning(msg) {
    document.getElementById('warning_msg').innerHTML = '<b>' +msg+ '</b>';
	document.getElementById('warning_msg').style.display = 'block';
	var body = $("body");
	body.animate({scrollTop:0}, '500');
	setInterval('$( "#warning_msg" ).hide()', 3000);
}
/*
	method for alert success message
	Auth: Dipanjan
*/

function alertSuccess(msg){
	document.getElementById('success_msg').innerHTML = '<b>' +msg+ '</b>';
	document.getElementById('success_msg').style.display = 'block';
	var body = $("body");
	body.animate({scrollTop:0}, '500');
	setInterval('$( "#success_msg" ).hide()', 3000);
}

//jquery event declararion
$(document).ready(function(e) {
    $('#user_per_info').click(function(e) {
        //calling validiation function
		validiateUserPersonalForm('user_personal');
    });
	
	$('#user_pro_info').click(function(e) {
        //calling validiation function
		validiateUserProfileInfoForm('user_profile');
    });
	
	$('#userContactBtn').click(function(e) {
        //calling validiation function
		validiateUserQueryForm('userContactForm');
    });
	
	$('#userTicketBtn').click(function(e) {
        //calling validiation function
		validiateUserTicketForm('userTicketForm');
    });
});

