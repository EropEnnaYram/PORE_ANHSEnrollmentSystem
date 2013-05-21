<?php
include 'dao/Enrollment_SystemDAO.php';

$students_id=$_POST['students_id'];

$action=new Enrollment_SystemDAO();
$action->deleteStudents($students_id);

?>