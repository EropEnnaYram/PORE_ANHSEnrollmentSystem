<?php
	include 'dao/Enrollment_SystemDAO.php';

	$grade = $_POST['grade'];
	$sections_name = $_POST['sections_name'];

	$action=new Enrollment_SystemDAO();
	$action->addSections($grade,$sections_name);

?>