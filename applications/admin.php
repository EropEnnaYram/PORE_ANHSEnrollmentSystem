<?php
session_start();
if (!isset($_SESSION['username'])){
  header('Location: admin.php');
} else {
  $username = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
         <meta charset="utf-8">
         <script src="js/jquery-1.8.2.min.js"></script>
         <script src="js/jquery-ui-1.10.1.custom.min.js"></script>
         <script src="js/homepage.js"></script>
         <script src="js/page_script.js"></script>
         <link rel="stylesheet" href = "css/jquery-ui-1.10.1.custom.min.css" type='text/css'/>
         <link href="css/main_home.css" rel="stylesheet" type="text/css" />
         <title></title>
        
    </head>
          
    <body class="container">
              <div id="body-wrapper">
      	         
               <!--<h1>ALANGALANG NATIONAL HIGH SCHOOL</h1>
                             <img src="images/logo.jpg" id="logo" />-->

              <div id="dropdown">
                <nav>
      	          <ul>
      		          <li><a href="#main" id="home">Home</a></li>
      		          <li><a href="#about_us" id="about_us">ABOUT US</a>
      			          <ul>
      				          <li><a href="#vission_mission" id="vision_mision" title="Vission and Mission">Vission and Mission</a></li>
      				          <li><a href="#requirements" id="requirements">Requirements</a></li>
      				          <li><a href="#facilities">Facilities</a></li>
      				          <li><a href="#subjects" id="subjects_teachers">Subjects</a></li>
                        <li><a href="#teachers" id="teachers_staff">Teachers</a></li>
                        <li><a href="#sections" id="sections_name">Sections</a></li>
                        <li><a href="#students" id="students_name">Students</a></li>
      		               </ul>
      		          </li>
      		          <li><a href="#students_schedules" id="students_schedules">Students Schedules</a>
      			          <ul>
      				          <li><a href="#schedules" id="students_sched">Time Schedules</a></li>
      			          </ul>
      			         </li>
      		          <li><a href="#admisssion">ADMISSION</a></li>
      	            <li><a href="#academic_programs">ACADEMIC PROGRAMS</a></li>
      	         </ul>
                </nav>
              </div><!--dropdown-->
              </span></h1>
              <p id = "p_user"><span id = "username"></span><a id = "log_out" href = "log_in.php">log out</a><br/><br/></p>
              <div id="main">
              
              </div><!--main-->
              <div id="subjects">
                <form id="add_subjects_form">
                  Subjects Name:<input type="text" name="subjects_name" />&nbsp;
                  Units:<input type="text" name="units" />&nbsp;
                  <input type="hidden" name="subjects_id"/>
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
              <div id="teachers">
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
                  <th>Teachers_id</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Type</th>
                  <th>Grade</th>
                  <th>Action</th>
                </thead>
                  </tr>
                </table>
              </div>
              <div id="delete_confirm" title="Are you sure you want to delete it?">
                       <p>Are you sure you want to delete it?</p>
                  </div>
              <div id="sections">
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
                      <th>Action</th>
                    </thead>
                  </tr>
                </table>
              </div>
              <div id="delete_sections" title="Are you sure you want to delete it?">
                  <p>Are you sure you want to delete it?</p>
              </div>
              <div id="students">
                <form id="add_students_form">
                  <tr>
                  <label><p>Firstname:<input type="text" name="firstname" /></p></label>
                  <label><p>Middle Initial:<input type="text" name="middleInitial" /></p></label>
                  <label><p>Lastname:<input type="text" name="lastname" /></p></label>
                  <label><p>Year:<input type="text" name="year" /></p></label>
                  <label><p>Phone:<input type="text" name="phone" /></p></label>
                  <label><p>Email:<input type="text" name="email" /></p></label>
                  <label><p>Username:<input type="text" name="username" /></p></label>
                  <label><p>Password:<input type="password" name="password" /></p></label>
                  <label><p>Confirm Password:<input type="password" name="confirm_password" /></p></label>
                  <input type="hidden" name="students_id">
                </form>
                <button id="add_students">Add Students</button>
                <table id="table_students" border="3">
                  <tr>
                    <thead>
                      <th>Students_id</th>
                      <th>Firstname</th>
                      <th>Middle Initial</th>
                      <th>Lastname</th>
                      <th>Year</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Confirm Password</th>
                      <th>Action</th>
                    </thead>
                  </tr>
                </table>
                <div id="delete_students" title="Are you sure you want to delete it?">
                  <p>Are you sure you want to delete it?</p>
                </div>
              </div>
              <div id="vission_mission">
                             <p>VISION:
                                   The Alangalang National High School Online Enrollment System shall be at the forefront of the knowledge society as a leading institution of                     open learning and distance education.
                              <br />
                              <br />
                              <br />
                             MISION:
                             The Alangalang National High School Online Enrollment System seeks to provide wider access to quality higher education. It shall adhere to the highest             standards of academic excellence , guarantee academic freedom , and encourage social responsibility and nationalistic commitment among its faculty, staff and students.
                              <br />
                              <br />
                              <br />
                         
                        Specifically, the Alangalang National High School Online Enrollment System  has the following objectives:
                             <br />
                             <br />
                             <br />

                        To provide opportunities for alternative access to quality higher education by offering baccalaureate and post-baccalaureate degree programs and non-formal courses by distance education.
                             <br />
                             <br />
                             <br />
                        To develop a system of continuing education for sustaining professional growth and improving technical skills especially for those who cannot leave their jobs or homes for full-time studies; and
                             <br />
                             <br />
                             <br />
                         
                        To contribute towards upgrading the quality of residential instruction in the University and the educational system of the country, in general, by developing, testing and utilizing innovative instructional materials and technology, and sharing these with other colleges and universities through cooperative programs.</p>
              </div>
              <div id="requirements">
                  <p>ffgfjkdjffhf</p>
              </div>
              <div id="schedules">
                <form id="sched_form">
                  Time Start:<input type="text" name="time_start" placeholder="hours:minutes:seconds" />
                  Time End:<input type="text" name="time_end" placeholder="hours:minutes:seconds"/>
                  Date:<input type="text" name="date"  id="datepicker" placeholder="year/month/day" />
                       <!--<input type="checkbox" name="days" value="Tuesday" />Tuesday
                       <input type="checkbox" name="days" value="Wednesday" />Wednesday
                       <input type="checkbox" name="days" value="Thursday" />Thursday
                       <input type="checkbox" name="days" value="Friday" />Friday
                       <input type="checkbox" name="days" value="Saturday" />Saturday
                       <input type="checkbox" name="days" value="Sunday" />Sunday-->
                </form>
                <button id="btn_studentSched">Add Students Schedule</button>
                <table id="table_schedules" border="3">
                  <tr>
                    <thead>
                       <th>Schedules Id</th>
                       <th>Time Start</th>
                       <th>Time End</th>
                       <th>Date</th>
                    </thead>
                  </tr>
                </table>
              </div>
            </div><!--bodywraper-->
    </body>
</html>
