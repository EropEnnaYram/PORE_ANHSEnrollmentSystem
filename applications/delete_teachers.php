<?php
include 'dao/Enrollment_SystemDAO.php';

$teachers_id=$_POST['teachers_id'];

$action=new Enrollment_SystemDAO();
$action->deleteTeachers($teachers_id);

?>