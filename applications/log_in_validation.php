<?php
	include 'userDAO.php';
	
	$execute = new userDAO();
	
	session_start();
		if(isset($_POST['username_entered']) && isset($_POST['password_entered'])){
			$username_exist = $execute->check_username($_POST['username_entered']);	
			if($username_exist){
				$password_matched = $execute->check_password($_POST['username_entered'], $_POST['password_entered']);
				if($password_matched){
					$_SESSION['username_entered'] = $_POST['username_entered'];
					header('Location:index.php');
					$execute->add_logged_in_users($_POST['username_entered']);
				}else{
					$error_message =  "Wrong PASSWORD";
				}
			}else{
					$error_message =  "Unknown STUDENT";
			}
		}
	//}
?>
