<?php
include 'dao/Enrollment_SystemDAO.php';

$teachers_id=$_POST['teachers_id'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$type=$_POST['type'];
$grade=$_POST['grade'];

$action=new Enrollment_SystemDAO();
$action->saveTeachers($teachers_id,$firstname,$lastname,$type,$grade);

?>