// JavaScript Document
$(document).ready(function(e) {
    /*
		method for preview profile pic and cover pic
		Auth: Dipanjan
	*/
	$('#pro_pic').change(function() {
		var file = $(this).get(0).files[0];
		var img = document.createElement('img');
		img.src = window.URL.createObjectURL(file);
		$('#pro_pic_preview').html(img);
		var reader = new FileReader();
		reader.onload = function(e) {
			window.URL.revokeObjectURL(this.src);
		}
		//reader.readAsDataURL(file);
		//$('#pro_pic_preview img').css({'width':'200px'});
		
		var data = new FormData($('#image_info')[0]);
	});
	
	$('#cov_pic').change(function() {
		var file = $(this).get(0).files[0];
		var img = document.createElement('img');
		img.src = window.URL.createObjectURL(file);
		$('#cov_pic_preview').html(img);
		var reader = new FileReader();
		reader.onload = function(e) {
			window.URL.revokeObjectURL(this.src);
		}
		//reader.readAsDataURL(file);
		//$('#pro_pic_preview img').css({'width':'200px'});
		
		var data = new FormData($('#image_info')[0]);
	});
	
	/*
		method for showing select skills on textbox
		Auth: Dipanjan
	*/
	$('.skills_checkbox').click(function(e) {
		var skillName = $(this).val();
		//getting the skills textbox value
		//var skillsValue = $('#skills_value').val();
		var skillsValue = $('#skills_list_value').html();
		//checking for checkbox is checked or not
		var checkingStatus = $(this).is(':checked');
		if(checkingStatus == true)
		{
			//checking for skills textbox is empty or not
			/*if(skillsValue.length == 0)
			{
				//adding the value to the textbox
				$('#skills_value').val(skillName);
			}
			else
			{
				//adding the value to the textbox
				$('#skills_value').val(skillsValue+','+skillName);
			}*/
			//the html which will added
			var addingHtml = '<div class="myskills_box pull-left">'+skillName+'</div>';
			$('#skills_list_value').append(addingHtml);
		}
		else if(checkingStatus == false)
		{
			//checking for there is ',' in the value or not
			/*if(skillsValue.indexOf(',') == -1)
			{
				//removing the value of textbox
				$('#skills_value').val('');
			}
			else
			{
				//removing checkbox value of textbox
				var newSkillValue = skillsValue.replace(skillName+',','');
				$('#skills_value').val(newSkillValue);
			}*/
			//the html which will deleted
			var addingHtml = '<div class="myskills_box pull-left">'+skillName+'</div>';
			var newSkillValue = skillsValue.replace(addingHtml,'');
			$('#skills_list_value').html(newSkillValue);
		}
    });
	
	/*
		method for adding another portfolio field
		Auth: Dipanjan
	*/
	$('#adding_port').click(function(e) {
        //finding the last child of adding element
		var last_id = $('#add_another_port').children(':last-child');
		if(last_id.length == 0)
		{
			var port_id = 2;
		}
		else
		{
			//finding the last port_id value
			var last_port_id = last_id.attr('id');
			var port_id = parseInt(last_port_id) + 1;
		}
		
		//the html which will append
		var appending_html = '<div id="'+port_id+'"><div class="form-group"><label class="col-md-3 pp_form_label control-label">File</label><div class="col-md-8"><input type="file" name="file'+port_id+'" class="form-control pp_form_textbox pp_form_file_upload"></div></div><div class="form-group"><label class="col-md-3 pp_form_label control-label">Skills Required</label><div class="col-md-8"><input type="text" name="skills'+port_id+'" class="form-control pp_form_textbox"></div></div><div class="form-group"><label class="col-md-3 pp_form_label control-label">Description</label><div class="col-md-8"><textarea class="form-control pp_form_textbox pp_text_area" name="des'+port_id+'"></textarea></div></div><p class="col-md-offset-3 col-md-8 remove_portfolio_text remove_port">(-) Remove This Portfolio</p><div class="clearfix"></div></div>';
		//append the html
		$('#add_another_port').append(appending_html);
    });
	
	/*
		method for removing that portfolio
		Auth: Dipanjan
	*/
	
	$(document).on("click", ".remove_port",function(){
		$(this).parent().remove();
	});
	
	/*
		method for appending total number of portfolio 
		Auth: Dipanjan
	*/
	$('#port_submit').click(function(e) {
        //finding the last child of adding element
		var last_child_id = $('#add_another_port').children(':last-child');
		
		if(last_child_id.length == 0)
		{
			var input_text = '<input type="hidden" name="total_elem" value="'+1+'"/>';
		}
		else
		{
			//finding the last port_id value
			var last_port_id = last_child_id.attr('id');
			var port_id = parseInt(last_port_id);
			var input_text = '<input type="hidden" name="total_elem" value="'+port_id+'"/>';
		}
		
		//prepending the value
		$('#user_port').children('.form-group:last-child').children('.col-md-8').prepend(input_text);
		//submitting the form
		$('#user_port').submit();
    });
	
	/*
		method for adding another employment field
		Auth: Dipanjan
	*/
	$('#adding_emp').click(function(e) {
        //finding the last child of adding element
		var last_id = $('#add_another_emp').children(':last-child');
		if(last_id.length == 0)
		{
			var port_id = 2;
		}
		else
		{
			//finding the last port_id value
			var last_port_id = last_id.attr('id');
			var port_id = parseInt(last_port_id) + 1;
		}
		
		//the html which will append
		var appending_html = '<div id="'+port_id+'"><div class="form-group"><label class="col-md-3 pp_form_label control-label">Company Name</label><div class="col-md-8"><input type="text" class="form-control pp_form_textbox" name="comp'+port_id+'"></div></div><div class="form-group"><label class="col-md-3 pp_form_label control-label">Position</label><div class="col-md-8"><input type="text" class="form-control pp_form_textbox" name="pos'+port_id+'"></div></div><div class="form-group"><label class="col-md-3 pp_form_label control-label">Start Date</label><div class="col-md-4"><input type="date" class="form-control pp_form_textbox" name="start'+port_id+'"></div></div><div class="form-group"><label class="col-md-3 pp_form_label control-label">End Date</label><div class="col-md-4"><input type="date" class="form-control pp_form_textbox" name="end'+port_id+'"></div></div><div class="form-group"><label class="col-md-3 pp_form_label control-label">Descrition</label><div class="col-md-8"><textarea class="form-control pp_form_textbox pp_text_area" name="des'+port_id+'"></textarea></div></div><p class="col-md-offset-3 col-md-8 remove_portfolio_text remove_emp">(-) Remove This Portfolio</p><div class="clearfix"></div></div>';
		//append the html
		$('#add_another_emp').append(appending_html);
    });
	
	/*
		method for removing that employment
		Auth: Dipanjan
	*/
	
	$(document).on("click", ".remove_emp",function(){
		$(this).parent().remove();
	});
	
	/*
		method for appending total number of employment 
		Auth: Dipanjan
	*/
	$('#emp_submit').click(function(e) {
        //finding the last child of adding element
		var last_child_id = $('#add_another_emp').children(':last-child');
		
		if(last_child_id.length == 0)
		{
			var input_text = '<input type="hidden" name="total_elem" value="'+1+'"/>';
		}
		else
		{
			//finding the last port_id value
			var last_port_id = last_child_id.attr('id');
			var port_id = parseInt(last_port_id);
			var input_text = '<input type="hidden" name="total_elem" value="'+port_id+'"/>';
		}
		
		//prepending the value
		$('#user_emp').children('.form-group:last-child').children('.col-md-8').prepend(input_text);
		//submitting the form
		$('#user_emp').submit();
    });
	
	
	/*
		method for adding another education field
		Auth: Dipanjan
	*/
	$('#adding_edu').click(function(e) {
        //finding the last child of adding element
		var last_id = $('#add_another_edu').children(':last-child');
		if(last_id.length == 0)
		{
			var port_id = 2;
		}
		else
		{
			//finding the last port_id value
			var last_port_id = last_id.attr('id');
			var port_id = parseInt(last_port_id) + 1;
		}
		
		//the html which will append
		var appending_html = '<div id="'+port_id+'"><div class="form-group"><label class="col-md-3 pp_form_label control-label">Institution Name</label><div class="col-md-8"><input type="text" class="form-control pp_form_textbox" name="inst'+port_id+'"></div></div><div class="form-group"><label class="col-md-3 pp_form_label control-label">Degree</label><div class="col-md-8"><input type="text" class="form-control pp_form_textbox" name="deg'+port_id+'"></div></div><div class="form-group"><label class="col-md-3 pp_form_label control-label">Start Date</label><div class="col-md-4"><input type="date" class="form-control pp_form_textbox" name="start'+port_id+'"></div></div><div class="form-group"><label class="col-md-3 pp_form_label control-label">End Date</label><div class="col-md-4"><input type="date" class="form-control pp_form_textbox" name="end'+port_id+'"></div></div><div class="form-group"><label class="col-md-3 pp_form_label control-label">Descrition</label><div class="col-md-8"><textarea class="form-control pp_form_textbox pp_text_area" name="des'+port_id+'"></textarea></div></div><p class="col-md-offset-3 col-md-8 remove_portfolio_text remove_edu">(-) Remove This Portfolio</p><div class="clearfix"></div></div>';
		//append the html
		$('#add_another_edu').append(appending_html);
    });
	
	/*
		method for removing that employment
		Auth: Dipanjan
	*/
	
	$(document).on("click", ".remove_edu",function(){
		$(this).parent().remove();
	});
	
	/*
		method for appending total number of employment 
		Auth: Dipanjan
	*/
	$('#edu_submit').click(function(e) {
        //finding the last child of adding element
		var last_child_id = $('#add_another_edu').children(':last-child');
		
		if(last_child_id.length == 0)
		{
			var input_text = '<input type="hidden" name="total_elem" value="'+1+'"/>';
		}
		else
		{
			//finding the last port_id value
			var last_port_id = last_child_id.attr('id');
			var port_id = parseInt(last_port_id);
			var input_text = '<input type="hidden" name="total_elem" value="'+port_id+'"/>';
		}
		
		//prepending the value
		$('#user_edu').children('.form-group:last-child').children('.col-md-8').prepend(input_text);
		//submitting the form
		$('#user_edu').submit();
    });
	
	//to crop the profile pic
	$(document).on("click","#pro_pic_preview img",function(){

		$('#pro_pic_preview img').Jcrop({
			onSelect: updateCoordsPro,
			setSelect: [ 50, 50, 50, 50 ],
			maxSize: [ 270, 200 ],
			minSize: [ 270, 200 ],
			
		});
	});

	function updateCoordsPro(c)
	{
		$('#pro_x').val(c.x);
		$('#pro_y').val(c.y);
		$('#pro_w').val(c.w);
		$('#pro_h').val(c.h);
		$('#pro_x2').val(c.x2);
		$('#pro_y2').val(c.y2);		
	};

	
});

