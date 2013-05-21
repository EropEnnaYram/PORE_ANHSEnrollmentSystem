$(function(){
	alert("wee");
	    $("#datepicker").datepicker({ 
			changeMonth: true,
			changeYear: true,
			dateFormat: 'yy-mm-dd'
		});

   	  //$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
	$("#button_add").click(function(){
		 alert("Add subjects");
		$.ajax({
			type: "POST",
			url: "add_subjects.php",
			data: {"subjects_name": $("input[name='subjects_name']").val(), "units": $("input[name='units']").val() },
			              
			success: function(data) {
			alert("subjects sucessfully added:" + data);
			$("#tbl_subjects").append(data);
			$(document.location.reload(true));
			},
			error: function(data) {
			alert("cannot add subjects:" + data);
			}
		});
	});


	$("#button_save").click(function(){
		alert("save");
			var wordObj = {

				"subjects_id": $("input[name='subjects_id']").val(),
			    "subjects_name": $("input[name='subjects_name']").val(),
			    "units": $("input[name='units']").val()

			};
			//alert(JSON.stringify(wordObj));
		$.ajax({
			type: "POST",
			url: "save_subjects.php",
			data: wordObj,
			success: function(data){
				alert(JSON.stringify(data));
			$("#tbl_subjects").html(data);
			$(document.location.reload(true));

			},
			error: function(data){
				alert("hfgfh"+JSON.stringify(data));

			}


		});
	});


	$("#button_search").click(function(){
		var search_Obj ={"input_search":$("input[name='input_search']").val()
			};
		$.ajax({
			type: "POST",
			url: "search_subjects.php",
			data:search_Obj,
			success: function(data){
				$("#tbl_subjects").hide();
			},
			error: function(data){
				alert(JSON.stringify(data));

			}

		});

	});

	
    $.ajax({
    	type:"POST",
    	url:"view_subjects.php",
    	data:{"subjects_name": $("input[name='subjects_name']").val(), "units": $("input[name='units']").val() },
    	success: function(data){
    		$("#tbl_subjects").append(data);

    	},
    	error: function(data){

    	}

    });
    

    $.ajax({
		type: "POST",
		url: "view_teachers.php",
		success: function(data){
			$("#table_teachers").append(data);
			alert(data);
		},
		error: function(data){
			alert(data);
		}
	});
	
    $("#btn_search_teachers").click(function(){
    	alert("Search");
    	var searchTeachersObj={"search_teachers": $("input[name='search_teachers']").val()};
    $.ajax({
    	type: "POST",
    	url: "search_teachers.php",
    	data: searchTeachersObj,
    	success: function(data){
    		alert(JSON.stringify(data));
    		$("#table_teachers").html(data);

    	},
    	error: function(data){
    		alert(JSON.stringify(data));

    	}
    });

    });

    $("#button_teachers").click(function(){
    	alert("hhdhdhdhhd");
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
	


	$("#btn_save_teachers").click(function(){
		alert("save");
		var wordObj={"teachers_id": $("input[name='teachers_id']").val(),
					 "firstname": $("input[name='firstname']").val(),
					 "lastname": $("input[name='lastname']").val(),
					 "type": $("input[name='type']").val(),
					 "grade": $("input[name='grade']").val()
	                };
		$.ajax({
			type: "POST",
			url: "save_teachers.php",
			data: wordObj,
			success: function(data){
				$("#table_teachers").html(data);
				$(document.location.reload(true));

			},
			error: function(data){

			}

	     });
	});
	

	$.ajax({
		type: "POST",
		url: "view_sections.php",
		success: function(data){
			//$(document.location.reload(true));
			$("#table_sections").append(data);

		},
		error: function(data){

		}

	});
	
	$("#button_sections").click(function(){
		var obj= {"grade": $("input[name='grades']").val(),
			     "sections_name": $("input[name='sections_name']").val()
				};
    	//alert("bleeh!");
		$.ajax({
			type: "POST",
			url: "add_sections.php",
			data: obj,
			success: function(data) {
				$("#table_sections").append(data);
				alert("sections sucessfully added:" + JSON.stringify(data));
					alert(JSON.stringify(data));
				//$(document.location.reload(true));
			},
			error: function(data) {
                alert("cannot add sections:" + data);
			}

		});

	});
	
	$("#button_saveSection").click(function(){
		var saveSectionsObj={"sections_id": $("input[name='sections_id']").val(),
		  				  "grade": $("input[name='grades']").val(),
		  				  "sections_name": $("input[name='sections_name']").val()
	};
	$.ajax({
		type: "POST",
		url: "save_sections.php",
		data: saveSectionsObj,
		success: function(data){
			$("#table_sections").html(data);
			$(document.location.reload(true));

		},
		error: function(data){
			alert(JSON.stringify(data));

		}

	});

	});
	$("#button_searchSections").click(function(){
		var searchSections_obj={"search_sections":$("input[name='search_sections']").val()};
		$.ajax({
			type: "POST",
			url: "search_sections.php",
			data: searchSections_obj,
			success: function(data){
				alert(JSON.stringify(data));
				$("#table_sections").html(data);
				
			},
			error: function(data){
				alert(JSON.stringify(data));
			}

		});

	});
	$.ajax({
		type: "POST",
		url: "view_students.php",
		success: function(data){
			//alert(JSON.stringify(data));
			//alert(data);
			$("#table_students").append(data);
		},
		error: function(data){
		}

	});
	
	$("#add_students").click(function(){
	$.ajax({
		type: "POST",
		url: "add_students.php",
		data: {"firstname": $("input[name='firstname']").val(),
			   "middleInitial": $("input[name='middleInitial']").val(),
			   "lastname": $("input[name='lastname']").val(),
			   "year": $("input[name='year']").val(),
			   "phone": $("input[name='phone']").val(),
			   "email": $("input[name='email']").val(),
			   "username": $("input[name='username']").val(),
			   "password": $("input[name='password']").val(),
			   "confirm_password": $("input[name='confirm_password']").val(),
		},
		success: function(data){
			//alert(JSON.stringify(data));


		},
		error: function(data){

		}

	});
   });
	
	$.ajax({
		type: "POST",
		url: "view_studentSchedule.php",
		success: function(data){
			$("#table_schedules").append(data);

		},
		error: function(data){

		}

	});
	
	$("#btn_studentSched").click(function(){
		var schedObj={"time_start": $("input[name='time_start']").val(),
					   "time_end" :$("input[name='time_end']").val(),
					   "date" :$("input[name='date']").val()

		};
		$.ajax({
			type: "POST",
			url: "add_studentSchedule.php",
			data: schedObj,
			success: function(data){
				alert(JSON.stringify(data));

			},
			error: function(data){

			}
		});

	});

});//end of document ready function


   function deleteSubjects(subjects_id){
	var wordObj = {"subjects_id":subjects_id};
	
     $("#delete_confirm").dialog({
          resizable: false,
          width:350,
          height:140,
          modal: true,
          buttons: {
         "Delete all items": function(data) {
          
          $.ajax({
				type: "POST",
				url: "delete_subjects.php",
				data: wordObj,
				success: function(data){
					$(document.getElementById(subjects_id)).remove(); 
			     $( this ).dialog( "close" );
				},
				error: function(data){
					alert(JSON.stringify(data));
				}
	        });
          $( this ).dialog( "close" );
          },
          "Cancel": function() {
          $( this ).dialog( "close" );
          }
        }
     });
    }

    function editSubjects(subjects_id){
  //  alert(subjects_id);
    var wordObj={"subjects_id": subjects_id};
    /*$("#edit_confirm").dialog({
    	resizable: false,
    	width: 350,
    	height: 140,
    	modal: true,
    	buttons:{
    	"Edit all items": function(data){*/
    		$.ajax({
    			type: "POST",
    			url: "retrieve_subjects.php",
    			data: wordObj,
    			success: function(data){
    			//	alert(JSON.stringify(data));
    				var obj=JSON.parse(data);
    				$("input[name='subjects_id']").val(obj.subjects_id);
    				$("input[name='subjects_name']").val(obj.subjects_name);
    				$("input[name='units']").val(obj.units);


    			},
    			error: function(data){
    				alert(JSON.stringify(data));
    			}

    		});
    	   /*},
    	"Cancel": function(){
    		$( this ).dialog( "close" );
    	}
    	//}

    //});*/
   }
  function editTeachers(teachers_id){
    	alert("edit");
    	var wordObj={"teachers_id": teachers_id};
    	$.ajax({
    		type: "POST",
    		url: "retrieve_teachers.php",
    		data: wordObj,
    		success: function(data){
    			var obj=JSON.parse(data);
    			$("input[name='teachers_id']").val(obj.teachers_id);
    			$("input[name='firstname']").val(obj.firstname);
    			$("input[name='lastname']").val(obj.lastname);
    			$("input[name='type']").val(obj.type);
    			$("input[name='grade']").val(obj.grade);
    			alert(JSON.stringify(data));

    		},
    		error: function(data){
    			alert(JSON.stringify(data));
    		}

    	});
    }
    function deleteTeachers(teachers_id){
    var wordObj={"teachers_id":teachers_id};
    $("#delete_confirm").dialog({
    	resizable: false,
    	width: 350,
    	height: 140,
    	modal: true,
    	buttons:{
    	"Delete": function(data){
    		$.ajax({
    			type: "POST",
    			url: "delete_teachers.php",
    			data: wordObj,
    			success: function(data){
    				$(document.getElementById(teachers_id)).remove();
    				//alert(JSON.stringify(data));
    				$( this ).dialog( "close" );

    			},
    			error: function(data){

    			}

    		});
    		$( this ).dialog( "close" );
    	  },
    	"Cancel": function() {
    	$( this ).dialog( "close" );
    	}
    	}
    });
    }

    function editSections(sections_id){
    	var editObj={"sections_id": sections_id};
    	alert(JSON.stringify(editObj));
        $.ajax({
        	type: "POST",
        	url: "retrieve_sections.php",
        	data: editObj,
        	success: function(data){
        		var sectionObj=JSON.parse(data);
        		$("input[name='sections_id']").val(sectionObj.sections_id);
        		$("input[name='grades']").val(sectionObj.grade);
        		$("input[name='sections_name']").val(sectionObj.sections_name);
        		
        		alert("gdsgsdhd");

        	},
        	error: function(data){
        		alert(JSON.stringify(data));
        	}

        });

    }
    function deleteSections(sections_id){
    var wordObj={"sections_id":sections_id};
    alert("delete_sections");
    	$("#delete_sections").dialog({
    		resizable: false,
    		width: 350,
    		height: 140,
    		modal: true,
    		buttons:{
    		"Delete": function(data){
    		$.ajax({
    			type: "POST",
    			url: "delete_sections.php",
    			data: wordObj,
    			success: function(data){
    				$(document.getElementById(sections_id)).remove();
    				$("#table_sections").append(data);
    				//$(document.location.reload(true));
    				
    			},
    			error: function(data){
    				alert(JSON.stringify(data));

    			}
    		});
    		$( this ).dialog("close");
    	      },
    	    "Cancel": function(){
    	    	$( this ).dialog( "close" );
    	    }

    	    }
    	});

    }
    function deleteStudents(students_id){
    var deleteObj={"students_id": students_id};
        $("#delete_students").dialog({
        	resizable: false,
        	height: 200,
        	width: 300,
        	modal: true,
        	buttons: {
        	"Delete": function(data){
        		$.ajax({
        			type: "POST",
        			url: "delete_students.php",
        			data: deleteObj,
        			success: function(data){
        				$(document.getElementById(students_id)).remove();
        				$("#table_students").append(data);

        			},
        			error: function(data){
        				alert(JSON.stringify(data));

        			}

        		});
        		$( this ).dialog("close");
        	},
        	"Cancel": function(data){
        		$( this ).dialog("close");
        	}

        	}
        });
    }      
           /*$("#register_button").click(function(){
	     $("#registration_form").dialog( "open" );
	});
        $("#registration_form").dialog({
          autoOpen:false,
          resizable: false,
          width:700,
          height:750,
          modal: true,
          buttons:{
          "Register": function() {
          	var firstname = $("#firstname").val();
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
			     //if(new_password == confirm_password) {	
	       //$("#register_button").click(function(){
	
		     if($("input[name = 'new_password']").val() == $("input[name = 'confirm_password']").val()){
		      alert("Congratulations..You are already registered..You may now login..Enjoy!!!");
			     $.ajax({
				     type: "POST",
				     url: "PHP/USERS/add_user.php",
				     data: {data: JSON.stringify($("#registration_form").serializeArray())},
				     success: function(data){
					     $("#registration_div").dialog("close");
					     $("#registered_user_span").html($("input[name = 'new_username']").val());
					     $("#registration_finished").dialog({
						     show: "puff",
						     hide: "explode",
						     height: 250,
						     width: 550,
						     modal: true,
						     buttons: {
							     "OKAY": function(){
								     $(this).dialog("close");
							     }
						     }
					     });
					     /*$.ajax({
					
						     type: "POST",
						     url: "PHP/create_users_table.php",
						     data: {"new_username" : $("input[name = 'new_username']").val()},
						     success: function(data){
						     },
						     error: function(data){
							     alert("error in creating users phonebook table = " + data);
						     }
						
					     });*/
				     /*},
				     error: function(data) {
					     alert("error in adding user! = " + data);
				     }
			     });
		     }else{
			     $("#password_mismatched").fadeIn(200);
			     $("#password_mismatched").fadeOut(5000);
			     alert("Password didn't matched:");
			     }
		     }else {
			     $("#invalid_information").fadeIn(200);
			     $("#invalid_information").fadeOut(5000);
			     alert("Please filled up the required information:");
		     }
		     
		},
		Cancel:function(){
		     $( this ).dialog( "close" );
		     }
	}

});*/
    