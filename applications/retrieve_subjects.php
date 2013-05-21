<?php
include 'dao/Enrollment_SystemDAO.php';

$subjects_id=$_POST['subjects_id'];

$action=new Enrollment_SystemDAO();
$action->retrieveSubjects($subjects_id);


?>