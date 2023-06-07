<?php
session_start();
if (!isset($_SESSION['login_success'])) {
	header('location:login.php?login_require');
}

require 'db-con/db_con.php';
include 'includes/header.php';
include 'includes/nav.php';





?>