<?php
include 'dao/Enrollment_SystemDAO.php';

$subjects_id = $_POST['input_search'];
$action=new Enrollment_SystemDAO();
$action->searchSubjects($subjects_id);


?>