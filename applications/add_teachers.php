<?php
include 'dao/Enrollment_SystemDAO.php';

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$type=$_POST['type'];
$grade=$_POST['grade'];

$action=new Enrollment_SystemDAO();
$action->addTeachers($firstname,$lastname,$type,$grade);

?>