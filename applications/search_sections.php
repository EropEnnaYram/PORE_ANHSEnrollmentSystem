<?php
include 'dao/Enrollment_SystemDAO.php';

$sections_id=$_POST['search_sections'];

$action=new Enrollment_SystemDAO();
$action->searchSections($sections_id);
?>