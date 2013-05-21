<?php
session_start();
include 'dao/Enrollment_SystemDAO.php';
$username=$_SESSION['username'];
$subjects_name=$_POST['subjects_name'];
$units=$_POST['units'];


$action=new Enrollment_SystemDAO();
$action->addSubjects($subjects_name,$units,$username);



?>