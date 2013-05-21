$(document).ready(function(){
alert("hehehe!");
$("#register_button").click(function(){
	     $("#registration_form").dialog( "open" );
	});
        $("#registration_form").dialog({
          autoOpen: false,
          resizable: false,
          width:700,
          height:750,
          modal: true,
          buttons:{
          "Register": function() {
          	//alert("hahaha!");
          	  $.ajax({
				     type: "POST",
				     url: "user_add.php",
				     data: {"firstname": $("input[name='firstname']").val(),
				     		"middleInitial": $("input[name='middleInitial']").val(),
				     		"lastname": $("input[name='lastname']").val(),
				     		"year": $("input[name='year']").val(),
				     		"phone": $("input[name='phone']").val(),
				     		"email": $("input[name='email']").val(),
				     		"username": $("input[name='username_enter']").val(),
				     		"password": $("input[name='password_enter']").val(),
				     		"confirm_password": $("input[name='confirm_password']").val()

				           },
				     success: function(data){
				     	alert(JSON.stringify(data));

				     	 // alert('haha');
			         },
			         error: function(data){
			         	//alert("nothing");
			         		alert(JSON.stringify(data));
			         }
			   });

          	  },
		Cancel:function(){
		     $( this ).dialog( "close" );
		     }
	}

});
$.ajax({
    	type:"POST",
    	url:"home_view_subjects.php",
    	data:{"subjects_name": $("input[name='subjects_name']").val(), "units": $("input[name='units']").val() },
    	success: function(data){
    		$("#tbl_subjects").append(data);

    	},
    	error: function(data){

    	}

    });
$.ajax({
		type: "POST",
		url: "home_view_teachers.php",
		success: function(data){
			$("#table_teachers").append(data);
			alert(data);
		},
		error: function(data){
			alert(data);
		}
	});
$("#button_teachers").click(function(){
		$.ajax({
			type: "POST",
			url: "add_teachers.php",
			data: {
				 "firstname": $("input[name='firstname']").val(),
			     "lastname":$("input[name='lastname']").val(),
			     "type": $("input[name='type']").val(),
			     "grade": $("input[name='grade']").val()
				},
			success: function(data) {
				//$(document.location.reload(true));
				
				$("#table_teachers").append(data);
				//$(document.location.reload(true));
				alert("teachers sucessfully added:" + data);


			},
			error: function(data) {
                alert("cannot add teachers:" + data);
			}

		});

	});
$.ajax({
	type: "POST",
	url: "home_view_grades_sections.php",
	success: function(data){
		alert(JSON.stringify(data));
		$("#table_sections").append(data);

	},
	error: function(data){

	}

});

	$("#tabs").tabs();
});
          	/*var firstname = $("#firstname").val();
		     var middleInitial = $("#middleInitial").val();
		     var lastname = $("#lastname").val();
		     var phone= $("#phone").val();
		     var email = $("#email").val();
		     var new_username = $("#new_username").val();
		     var new_password = $("#new_password").val();
		     var confirm_password = $("#confirm_password").val();
		
		     var string_pattern = /^[A-Z, a-z]*$/;
		     var integer_pattern = /^[0-9]*$/;
		     var firstname_valid = string_pattern.test(firstname);
		     var middleInitial_valid = string_pattern.test(middleInitial);
		     var lastname_valid = string_pattern.test(lastname);
		     var new_username_valid = string_pattern.test(new_username);
		     var phone_valid = integer_pattern.test(phone);
	
		     if(firstname != "" && firstname_valid && middleInitial != "" && middleInitial_valid && lastname != "" && lastname_valid && phone != "" && phone_valid && new_username != "" && new_username_valid && new_password != "" && confirm_password != ""){
		     if($("input[name = 'new_password']").val() == $("input[name = 'confirm_password']").val()){
		      alert("Congratulations..You are already registered..You may now login..Enjoy!!!");*/

		     /*}else{
			     $("#password_mismatched").fadeIn(200);
			     $("#password_mismatched").fadeOut(5000);
			     alert("Password didn't matched:");
			     }
		     }else {
			     $("#invalid_information").fadeIn(200);
			     $("#invalid_information").fadeOut(5000);
			     alert("Please filled up the required information:");
		     }*/
		     
		