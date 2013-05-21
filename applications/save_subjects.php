<?php
include 'dao/Enrollment_SystemDAO.php';

$subjects_id=$_POST['subjects_id'];
$subjects_name=$_POST['subjects_name'];
$units=$_POST['units'];

$action=new Enrollment_SystemDAO();
$action->saveSubjects($subjects_id,$subjects_name,$units);

?>