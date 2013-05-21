$(document).ready(function(){

  $("#home").click(function(){
	    $('#add_students').hide();
	    
	});
	 $("#about_us").click(function(){
	    $("#students_add").show();
	    $("#illustrator").hide();
	});
	$("#students_add").click(function(){
	    $("#add_students").show();
	    $("#illustrator").hide();
	});
	/*$("#students_add").click(function(){
	    $("add_students_form").dialog( "open");
	});*/
	
	$("#illustrators").click(function(){
	    $("#illustrator").show();
	    $("#vission_mission").hide();
	});
  
  
  
});
