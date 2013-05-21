<?php
session_start();
include 'dao/userDAO.php';
$username=$_SESSION['username'];

$action=new userDAO();
$action->viewUserSchedule($username);
?>