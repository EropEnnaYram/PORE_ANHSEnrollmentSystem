<?php
include 'dao/Enrollment_SystemDAO.php';

$teachers_id=$_POST['search_teachers'];
$action=new Enrollment_SystemDAO();
$action->searchTeachers($teachers_id)

?>