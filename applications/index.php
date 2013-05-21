<?php
	session_start();
	 

	if(!isset($_SESSION['username_entered'])){
	 header('Location: home.php');
	 
	}else{
		$username = $_SESSION['username_entered'];
	} 
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <script src="JS/jquery-1.8.2.min.js"></script>
   <script src="JS/jquery-ui-1.9.0.custom.min.js"></script>
   <script src="JS/index.js"></script>
   <script src="JS/index_script.js"></script>
   <link rel="stylesheet" href = "css/jquery-ui-1.10.1.custom.min.css" type='text/css'/>
   <link href ="css/index.css" rel = "stylesheet" type="text/css" />
   
</head>
<body>
     <h1>Welcome <span id ="username">
     <?php if(isset($username)){
             echo $username; }
     ?>
     </span></h1>
     <p id = "p_user"><span id = "username"></span><a id = "log_out" href = "log_out.php">log out</a><br/><br/></p>
     <nav>
	     <ul>
		     <li><a href="#main" id="home">Home</a></li>
		     <li><a href="#about_us" id="about_us">ABOUT US</a>
			     <ul>
				     <li><a  href="#vission_mission" id="vision_mision" title="Vission and Mission">Vission and Mission</a></li>
				     <li><a href="#illustrator" id="illustrators">Illustrator</a></li>
				     <li><a href="#webdesign">Web Design</a></li>
		          </ul>
		     </li>
		     <li><a href="#students" id="students">Students</a>
			     <ul>
				     <li><a href="#add_students" id="students_add">Add Students</a></li>
				     <li><a href="#">User Experience</a></li>
			     </ul>
			 </li>
		     <li><a href="#admisssion">Student Enrollment</a></li>
	         <li><a href="#academic_programs">Student Gradings</a></li>
	         <li><a href="#reports">Reports</a><li>
	         <li><a href="#payments">Payments</a></li>
	         <li><a href="#faculty">Faculty</a><li>
	    </ul>
     </nav>
    <!--<div id="tabs">
     <ul>  
           <li><a href="#home">HOME</a></li>
           <li><a href="#about_us">ABOUT US</a><li>
           <li><a href="#add_students">Add Students</a></li>
           <li><a href="#requirements">Requirements</a></li>
           <li><a href="#facilities">facilities</a></li>
           <li><a href="#more_information">More information</a></li>
     </ul>-->
      <div id="add_students"> 
      <form id="add_students_form">
 		Firstname:<input type="text" name="firstname"/><br />
		Middle Initial:<input type="text" name="middleInitial"/><br />
		Lastname:<input type="text" name="lastname"/><br />
		Phone:<input type="text" name="phone"/><br />
		Email:<input type="text" name="email"/><br />
		Address:<input type="text" name="address"/><br />
		Gender:<input type="radio" name="gender" value="male"/>Male
       		<input type="radio" name="gender" value="female"/>Female<br />
                     <button id="btn_add">ADD RECORD</button><button id="btn_save">SAVE RECORD</button>
                     <center><label for="search">SEARCH</label><input id="search" title="Searching By ID" /></center>
                </form>
                <br/>
                    <br/><br/>
                    <table id="contacts" border="1">
                    <tr>
                       <thead>    
                      <th>Id</th>
	                    <th>Firstname</th>
	                    <th>Middle Initial</th>
	                    <th>Lastname</th>
                      <th>Phone</th>
	                    <th>Email</th>
	                    <th>Address</th>
                      <th>Gender</th>
                      <th>Action</th>
                      </thead>
                    </tr>
        </table>
                  
         <div id="dialog-confirm" title="Are you sure you want to delete it?">
              <p>Are you sure you want to delete it?</p>
         </div>
         <div id="dialog-edit" title="Are you sure you want to edit it?">
            <p>Are you sure you want to delete it?</p>
        </div>
        </div>
        <!--<div id="requirements">
                Freshmen:
                Tranferees
        </div>
        <div id="facilities">
        </div>
        <div id="more_information">
        <p>A system designed to perform the process involved in registration, advising, assessments, and payments of students as well as scheduling of classes
           Efficient and Faster Enrollment Operation also a Long Term Save Data Records.
        </p>
        </div>
        </div>-->
</body>
</html>
