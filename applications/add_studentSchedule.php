<?php
include 'dao/Enrollment_SystemDAO.php';

$time_start=$_POST['time_start'];
$time_end=$_POST['time_end'];
$date=$_POST['date'];

$action=new Enrollment_SystemDAO();
$action->addStudentSchedule($time_start,$time_end,$date);
?>