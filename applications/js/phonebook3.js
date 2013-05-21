$(document).ready(function(){
	
	$.ajax({
		url: "PHP/USERS/determine_current_user.php",
		success: function(data) {
			var parsed_data = JSON.parse(data);
			$("#current_user").val(parsed_data.current_user);
			$("#current_user_id").val(parsed_data.current_user_id);
			$("#username").html(parsed_data.current_user_fullname);
			get_total_phonebook_entries();

		},
		error: function(data) {
			alert("error in determining the current user = " + data);
		}
	}).done(function(){
	
		$.ajax({
			type: "POST",
			url: "PHP/display_entries.php",
			data: {"current_user": $("input[name = 'current_user']").val()},
			success: function(data) {
				$("#entries_table").append(data);
			},
			error: function(data) {
				alert("error in displaying entries = " + data);
			}
		});
	}).done(function(){
	$("#register_button").click(function(){
		$.ajax({
			type: "POST",
			url: "PHP/USERS/add_user.php",
			data: {data: JSON.stringify($("#registration_form").serializeArray())},
			success: function(data) {
				$("#registration_form").append(data);
			},
			error: function(data) {
				alert("error in adding entry = " + data);
			}
		});
	});
	$("#add_button").click(function(){
		$.ajax({
			type: "POST",
			url: "PHP/add_contact_entry.php",
			data: {data: JSON.stringify($("#add_entry_form").serializeArray())},
			success: function(data) {
				$("#entries_table").append(data);
			},
			error: function(data) {
				alert("error in adding entry = " + data);
			}
		});
	});
	
	$("#save_button").click(function(){
		$(this).hide();
		$("#add_button").show();
		
		$.ajax({
			type: "POST",
			url: "PHP/edit_contact_entry.php",
			data: {data: JSON.stringify($("#add_entry_form").serializeArray())},
			success: function(data) {
				var id = $("#id").val();
				$(document.getElementById(id)).html(data);
			},
			error: function() {
				alert("error in saving = " + data);
			}
		});
	});
		
function get_total_contact_entries() {
	$.ajax({
		type: "POST",
		url: "PHP/get_total_contact_entries.php",
		data: {"current_user_id": $("#current_user_id").val()},
		success: function(data) {
			$("#number_of_contacts").val(data);
		},
		error: function(data) {
			alert("error in getting total contact_entries = " + JSON.stringify(data));
		}
	});
}
function delete_entry(id) {
	$.ajax({
		url: "PHP/delete_contact_entry.php",
		data: {"phone_id": id},
		success: function() {
			$(document.getElementById(id)).remove();
		},
		error: function(data) {
			alert("error in deleting = " + data);
		}
	});
}
