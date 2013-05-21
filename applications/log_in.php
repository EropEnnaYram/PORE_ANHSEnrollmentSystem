<?php
session_start();

include 'dao/Enrollment_SystemDAO.php';

$action = new Enrollment_SystemDAO();

if( isset($_REQUEST['username']) && isset($_REQUEST['password'])){
		if (($_REQUEST['username'] == 'anne') && ($_REQUEST['password'] == 'pore')){
			$_SESSION['username'] = $_REQUEST['username'];
			header('Location: admin.php');
		} else {
			$errMsg = "Username and Password didn't match";
			header('Location: log_in.php');
		}
} 
?>

<html lang="en">
<head>
<title>Login</title>
</head>
<body>
<form action="log_in.php" method="POST">
<fieldset>
<legend>Login</legend>
<p><label for="username">Username : </label><input type="text" id="username" name="username" /></p>
<p><label for="password">Password : </label><input type="password" id="password" name="password" /></p>
</fieldset>
<input type="submit" value="Login" />
</form>
<?php if (isset($errMsg)) echo $errMsg; ?>
</body>
</html>
