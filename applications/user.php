<?php
session_start();
if(!isset($_SESSION['username'])){
	header('Location : home.php');
}else{
	$username=$_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
         <meta charset="utf-8">
         <script src="js/jquery-1.8.2.min.js"></script>
         <script src="js/jquery-ui-1.10.1.custom.min.js"></script>
         <script src="js/user.js"></script>
         <script src="js/bootstrap.min.js"></script>
         <link rel="stylesheet" href = "css/jquery-ui-1.10.1.custom.min.css" type='text/css'/>
         <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
         <link  rel="stylesheet"  href="css/user.css" type="text/css" />
         <title></title>
        
</head>       
<body> 
  Welcome <span id ="username_entered"><?php if(isset($username)){ echo $username; }?></span>
  <a href="home.php">Log_out</a>
  <br />
                  <div class="btn-group">
                              <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                              Home
                                    <span class="caret"></span>
                               </a>
                                    <ul class="dropdown-menu">
                                          <li id="home_profile"><a dropdownIndex="1" href="#profile">Profile</a></li>
                                          <li id="home_subjects"><a dropdownIndex="2" href="#subjects">Subjects</a></li>
                                          <li id="home_teachers"><a dropdownIndex="3" href="#teachers">Teachers</a></li>
                                          <li id="home_schedules"><a dropdownIndex="4" href="#schedules">Schedules</a></li>
                                    </ul>
                  </div>
                      <div id="profile">
                                <p>asfdasg</p>
                      </div>
                      <div id="subjects">
                <form id="add_subjects_form">
                  Subjects Name:<input type="text" name="subjects_name" />&nbsp;
                  Units:<input type="text" name="units" />&nbsp;
                  <input type="hidden" name="subjects_id" id="subjects_id"/>
                </form>
                <button id="button_add">Add Subjects</button>
                <button id="button_save">Save Subjects</button>
                <input type="text"  id="input_search" name="input_search" placeholder="Search by Id"/>
                <button id="button_search">Search Subjects</button>
                  <table id="tbl_subjects" border="1">
                  <tr>
                  <thead>
                  <th>SUBJECTS_id</th>
                  <th>SUBJECTS NAME</th>
                  <th>UNITS</th>
                  <th>ACTION</th>
                  </thead>
                  </tr> 
                  </table>
                  <div id="delete_confirm" title="Are you sure you want to delete it?">
                       <p>Are you sure you want to delete it?</p>
                  </div>
                  <div id="edit_confirm" title="Are you sure you want to edit it?">
                    <p>Are you sure you want to edit it?</p>
                  </div>
              </div>
    	<!--<div id="user_tabs">
    		        <ul>
                      <li><a href="#home" id="#home">HOME</a></li>
                      <li><a href="#profile_div" id="#profile">Profile</a></li>
                      <li><a href="#sched" id="schedules">Schedules</a></li>
                      <li><a href="#view_subjects" id="#view_subjects">Subjects</a></li>
                      <li><a href="#view_teachers" id="#view_teachers">Teachers</a></li>
                      <li><a href="#view_grades_sections" id="#view_grades_sections">Grades and Sections</a><li>
                </ul>-->
          	
            <!--<div id="view_subjects">
              <form id="addStudents_subjects_form">
                  Subjects Name:<input type="text" name="subjects_name" />&nbsp;
                  Units<input type="text" name="units" />&nbsp;
                  <input type="hidden" name="subjects_id"/>
                </form>
                <button id="add_subjects_btn">Add Subjects</button>
                <button id="save_subjects_btn">Save Subjects</button>
                <input type="text"  id="input_search" name="input_search" />
                <button id="search_subjects_btn">Search Subjects</button>
                  <table id="table_subjects" border="1">
                  <tr>
                  <thead>
                  <th>SUBJECTS NAME</th>
                  <th>UNITS</th>
                  <th>ACTION</th>
                  </thead>
                  </tr> 
                  </table>
                  <div id="deleteSubject_confirm" title="Are you sure you want to delete it?">
                       <p>Are you sure you want to delete it?</p>
                  </div>
                  <div id="editSubject_confirm" title="Are you sure you want to edit it?">
                    <p>Are you sure you want to edit it?</p>
                  </div>-->
                
         <!-- </div>
          <div id="view_teachers">
            <form id="add_teachers_form">
                  <label><p>Firstname:<input type="text" name="firstname" /></p></label>
                  <label><p>Lastname:<input type="text" name="lastname" /></p></label>
                  <label><p>Type :<input type="text" name="type" /></p></label>
                  <label><p>Grade :<input type="text" name="grade" /></p></label>
                  <input type="hidden" name="teachers_id" />
                </form>
                <button id="button_teachers">Add Teachers</button>
                <button id="btn_save_teachers">Save Teachers</button>
                <input type="text" id="search_teachers" name="search_teachers" />
                <button id="btn_search_teachers">Search Teachers</button>
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
            <form id="add_sections_form" action="add_sections.php">
                  <label><p>Grade:<input type="text" name="grades" /></p></label>
                  <label><p>Sections Name:<input type="text" name="sections_name" /></p></label>
                  <input type="hidden" name="sections_id" />
                </form>
                <button id="button_sections">Add Sections</button>
                <button id="button_saveSection">Save Sections</button>
                <input type="text" id="search_sections" name="search_sections">
                <button id="button_searchSections">Search Sections</button>
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
          <div id="sched">
                <table id="student_schedules">
                      <tr>
                             <thead>
                                  <th>Time Start</th>
                                  <th>Time End</th>
                                  <th>Subjects Name</th>
                                  <th>Firstname</th>
                                  <th>Lastname</th>
                                  <th>Days</th>
                                  <th>Date</th>
                              </thead>
                      </tr>
                </table>
          </div>
      </div>-->
</body>
</html>
