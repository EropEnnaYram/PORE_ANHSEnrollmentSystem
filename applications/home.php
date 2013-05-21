<?php
  session_start();
  include 'dao/userDAO.php';  

  if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
    $LogIn = new userDAO();
    $verrified = $LogIn->LoginUser($_REQUEST['username'],$_REQUEST['password']);    
    if($verrified){
      $_SESSION['username']=$_REQUEST['username'];
      header('Location: user.php');     
    }else{
      $errMsg = "Unknown User!";   
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<script src="js/jquery-1.8.2.min.js"></script>
	<script src="js/jquery-ui-1.10.1.custom.min.js"></script>
	<script src="js/home.js"></script>
  <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href = "css/jquery-ui-1.10.1.custom.min.css" type='text/css'/>
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
  <link rel="stylesheet" href="css/home_tabs.css" type="text/css"/>
</head>
<body>
    <div id="tabs">
        <ul>
            <li><a href="#home" id="#home">HOME</a></li>
            <li><a href="#register_div" id="#register">Register</a></li>
            <li><a href="#login_div" id="login">Login</a></li>
            <li><a href="#view_subjects" id="#view_subjects">Subjects</a></li>
            <li><a href="#view_teachers" id="#view_teachers">Teachers</a></li>
            <li><a href="#view_grades_sections" id="#view_grades_sections">Grades and Sections</a><li>
            <li><a href="#requirements" id="students_requirements">Students Requirements</a></li>


        </ul>
    <div id="home">
        <p>asfdasg</p>
    </div>
    <div id="login_div">
          <form action="home.php" method="POST">                                                                       
                username: <input type="text" name="username" id = "username" /><br />
                password: <input type="password" name="password" id ="password"/>
                          <input type="submit" value="log in" id="log_in_button"><br />
                     
                        <?php
                          if(isset($error_message)){
                            echo "<p id = 'error_message'>".$error_message."</p>";
                        }
                        ?>
          </form>
    </div>
    <div id="view_subjects">
            <table id="tbl_subjects" border="1">
                  <tr>
                      <thead>
                            <th>SUBJECTS NAME</th>
                            <th>UNITS</th>
                       </thead>
                  </tr> 
            </table>
                  <!--<div id="delete_confirm" title="Are you sure you want to delete it?">
                       <p>Are you sure you want to delete it?</p>
                  </div>-->
    </div>
    <div id="view_teachers">
        <table id="table_teachers" border="1">
            <tr>
                <thead>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Type</th>
                        <th>Grade</th>
                </thead>
            </tr>
        </table>
    </div>
    <div id="view_grades_sections">
      <table id="table_sections" border="2">
            <tr>
                  <thead>
                          <th>Sections_id</th>
                          <th>Grade</th>
                          <th>Sections Name</th>
                  </thead>
            </tr>
      </table>
    </div>
    <div id="register_div">
        <form id="registration_form" title="Registration Form">
        	<p><label for="firstname">Firstname : </label><input type="text" id="firstname" name="firstname" /></p>
        	<p><label for="middleInitial">MiddleInitial : </label><input type="text" id="middleInitial" name="middleInitial" /></p>
        	<p><label for="lastname">Lastname : </label><input type="text" id="lastname" name="lastname" /></p>
        	<p><label for="phone">Phone Number : </label><input type="text" id="phone" name="phone"/></p>
          <p><label for="year">Grade : </label><input type="text" id="year" name="year" /></p>
        	<p><label for="email">Email : </label><input type="text" id="email" name="email"/></p>
          <p><label for="username">Username : </label><input type="text" id="username" name="username_enter" /></p>
        	<p><label for="password">Password : </label><input type="password" id="password" name="password_enter" /></p>
          <p><label for="confirm_password">Confirm Password : </label><input type="password" <id="confirm_password"name = "confirm_password" /></p>
                            
        	</form>
        		<button id = "register_button">Register</button>	
    </div>
    <div id="requirements">
     <p> New Students: </p>
        <div id="reqForNewStuds">
          <p>Live Birth(photocopy)</p>
          <p>Card(Form 137)</p>
          <p>Good Moral Character</p>
          <p>Id Picture(2 * 2(2 pieces))</p>
          <p>Brigada Eskwela(cash or work)</p>
          <p>Must Filled Up the registration Form</p>
          <br />
          <br />
        </div>

     <p> Old Students: </p>
        <div id="reqForOldStuds">
          <p>Card(Form 137)</p>
          <p>Cleared Clearance</p>
          <p>Id Picture(2 * 2(2 pieces))</p>
          <p>OCCI Payment(fully paid)</p>
          <p>Brigada Eskwela(cash or work)</p>
          <p>Must Filled Up the registration Form</p>
        </div>
    </div>
</body>
</html>