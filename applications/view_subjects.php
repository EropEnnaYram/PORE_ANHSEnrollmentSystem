<?php
session_start();
include 'dao/Enrollment_SystemDAO.php';
$username=$_SESSION['username'];

$action=new Enrollment_SystemDAO();
$action->viewSubjects($username);



?>
