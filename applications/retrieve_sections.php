<?php
include 'dao/Enrollment_SystemDAO.php';

$sections_id=$_POST['sections_id'];

$action=new Enrollment_SystemDAO();
$action->retrieveSections($sections_id);


?>