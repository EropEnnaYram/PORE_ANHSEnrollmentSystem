<?php
include 'dao/Enrollment_SystemDAO.php';

$sections_id=$_POST['sections_id'];
$grade=$_POST['grade'];
$sections_name=$_POST['sections_name'];

$action=new Enrollment_SystemDAO();
$action->saveSections($sections_id,$grade,$sections_name);


?>