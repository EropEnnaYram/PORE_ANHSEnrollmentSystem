$(document).ready(function(){
	alert("wew");
    $("#profile").hide();
    $("#subjects").hide();
    $("#home_profile").click(function(){
        $("#profile").show();
        $("#subjects").hide();
    });
    $("#home_subjects").click(function(){
        $("#subjects").show();
        $("#button_add").click(function(){
         alert("Add subjects");
        $.ajax({
            type: "POST",
            url: "add_subjects.php",
            data: {"subjects_name": $("input[name='subjects_name']").val(), "units": $("input[name='units']").val(),"subjects":$("input[name='subjects_id']").val()},
                          
            success: function(data) {
            alert("subjects sucessfully added:" + data);
            $("#tbl_subjects").append(data);
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
                $("#tbl_subjects").append(data);
                alert(JSON.stringify(data));
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
});
    
    /*$.ajax({
    	type: "POST",
    	url: "view_userSchedule.php",
    	success: function(data){
    		$("#student_schedules").append(data);

    	},
    	error: function(data){
    		alert(JSON.stringify(data));

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


    /*$("#button_save").click(function(){
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
                alert(JSON.stringify(data));
                $("#tbl_subjects").html(data);

            },
            error: function(data){
                alert(JSON.stringify(data));

            }

        });

    });*/
    //$("#user_tabs").tabs();
});
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
                //  alert(JSON.stringify(data));
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
