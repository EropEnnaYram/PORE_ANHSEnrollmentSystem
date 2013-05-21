<?php

include 'dao/homeDAO.php';

    $firstname = $_POST['firstname'];
	$middleInitial = $_POST['middleInitial'];
	$lastname = $_POST['lastname'];
	$year = $_POST['year'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];

	
	$action = new homeDAO();
	$action->addStudents($firstname,$middleInitial,$lastname,$year,$phone,$email,$username,$password,$confirm_password);
?>
