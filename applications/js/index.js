$(document).ready(function() {
  //alert('hello');
  $("#tabs").tabs();
  $.ajax({
		type: "POST",
		url: "view_contact.php",
		success: function(data){
			$("#contacts").append(data);		
		},
		error: function(data){
		}
	});
	/*$("#students_add").click(function() {
	  $("#add_students_form").dialog( "open" );
	});*/
	/*$("#add_students_form").dialog({
          //autoOpen: true,
          resizable: false,
          width:700,
          height:750,
          modal: true,
          buttons:{
          "Register": function() {
          }
        }
      });*/
         // $( "#tabs" ).tabs();
    
     /*$('#breadcrumbs-1').xBreadcrumbs();
	$(".home").click(function(){
	    $('vission_mission').show();
	});*/
	/*$("#register_button").click(function(){
	     $("#registration_form").dialog( "open" );
	});*/ 
	 $("#btn_add").click(function(){
		
		var wordObj = {
			"firstname":$("input[name='firstname']").val(), 
			"middleInitial":$("input[name='middleInitial']").val(),
                     "lastname":$("input[name='lastname']").val(), 
			"phone":$("input[name='phone']").val(),
		       "email":$("input[name='email']").val(), 
			"address":$("input[name='address']").val(),
                     "gender":$("input[name='gender']").val(), 
			 };
		
		$.ajax({
			type: "POST",
			url: "add_contact.php",
			data: wordObj,
			success: function(data){
				$("#contacts").append(data);
				//alert("Congratulations!..You are sucessfully added..")		
			},
			error: function(data){
				alert(data);		
			}
		});		

	});	

	$("#btn_save").click(function(){
	
		var wordObj = {
						//"id":$("input[name='id']").val(),
						"firstname":$("input[name='firstname']").val(), 
			                     "middleInitial":$("input[name='middleInitial']").val(),               
                                          "lastname":$("input[name='lastname']").val(), 
			                     "phone":$("input[name='phone']").val(),
			                     "email":$("input[name='email']").val(), 
		                            "address":$("input[name='address']").val(),
                                          "gender":$("input[name='gender']").val()       
		};
		
		$.ajax({
			type: "POST",
			url: "save_contact.php",
			data: wordObj,
			success: function(data){
			alert("hello");
					$(document.getElementById(wordObj.id)).html(data);
			},
			error: function(data){
				alert(data);		
			}
		});			


	});
	
          /*$("#search").keyUp(function(){
              var id=$("#search").val();
		    var wordObj = {"id":id};
		    
		     $.ajax({
			     type: "POST",
			     url: "search_contact.php",
			     data: wordObj,
			     success: function(data){
					     $(document.getElementById(wordObj.id)).html(data);
			     },
			     error: function(data){
				     alert(data);	
		       s $('"#search"').click(function)() {
		       $('"#search"').val("");
			     }
		     }			

          });*/
}); 
function deleteContacts(id){
	var wordObj = {"id":id};
	alert(id);
     $( "#dialog-confirm" ).dialog({
          autoOpen: true,
          resizable: false,
          width:350,
          height:140,
          modal: true,
          buttons: {
         "Delete all items": function() {
          $.ajax({
		type: "POST",
		data: wordObj,
		url: "delete_contact.php",
		success: function(data){
			$(document.getElementById(id)).remove(); 
			//alert("Are you sure you want to delete it?")
	     //$( this ).dialog( "close" );
	     $(document.location.reload(true));
		},
		error: function(data){
		}
	});
          },
          Cancel: function() {
          $( this ).dialog( "close" );
          }
        }
     });
 }	
  /*function editContacts(id){
	var wordObj = {"id":id};
	$("#dialog-edit").dialog({
	    autoOpen:true,
	    resizable: false;
	    height:140,
	    modal: true,
	    buttons: {
	         "Edit all items":function(){
	                  $.ajax({
	                  type:"POST",
	                  data:wordObj,
	                  url:"edit_contact.php",
	                  sucess: function(data){
	                         var obj = JSON.parse(data);
			               $("input[name = 'id']").val(obj.id);
			               $("input[name = 'firstname']").val(obj.firstname);
			               $("input[name = 'middleInitial']").val(obj.middleInitial);
			               $("input[name = 'lastname']").val(obj.lastname);
			               $("input[name = 'phone']").val(obj.phone); 
			               $("input[name = 'email']").val(obj.email);
			               $("input[name = 'address']").val(obj.address);
			               $("input[name = 'gender']").val(obj.gender);           
	          },
	          error: function(){}
	          });
	     },
	     Cancel:function(){
	     $( this ).dialog( 'close' );
	     }
	   }
	 });
  }*/
function editContacts(id){
	var wordObj = {"id":id};
//	alert(id)
         $("#dialog-edit").dialog({
          autoOpen:true,
           resizable: false,
          height:140,
          modal: true,
          buttons: {
               "Edit":function(){
                    $.ajax({
		          type: "POST",
		          data: wordObj,
		          url: "edit_contact.php",
		          success: function(data){
			          var obj = JSON.parse(data);
			          //$("input[name = 'id']").val(obj.id);
			          $("input[name = 'firstname']").val(obj.firstname);
			          $("input[name = 'middleInitial']").val(obj.middleInitial);
			          $("input[name = 'lastname']").val(obj.lastname);
			          $("input[name = 'phone']").val(obj.phone); 
			          $("input[name = 'email']").val(obj.email);
			          $("input[name = 'address']").val(obj.address);
			          $("input[name = 'gender']").val(obj.gender);                          
			          $( this ).dialog( 'close');
		               },
		               error: function(){}
	               });
	               $( this ).dialog( 'close' );
               },
               Cancel: function(){
                    $( this ).dialog( 'close');
               }
          }
         
         
         });
	    
}
	          

           /*$("#search").keyUp(function(){
              var id=$("#search").val();
		var Obj = {id:id};
					
		};
		
		$.ajax({
			type: "POST",
			url: "search_contact.php",
			data: wordObj,
			success: function(data){
					$(document.getElementById(wordObj.id)).html(data);
			},
			error: function(data){
				alert(data);	
		   $('"#search")	.click(function)() {
		  $('"#search").val("");
			}
		});			


	});
});*/

