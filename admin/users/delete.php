<?php
session_start();

require '../db-con/db_con.php';

$id = $_GET['id'];

$sel_db = "SELECT picture FROM users WHERE id=$id";
$sel_db_que = mysqli_query($db_con,$sel_db);
$sel_db_assoc = mysqli_fetch_assoc($sel_db_que);
$del_pic = "../uploads/users/".$sel_db_assoc['picture'];
unlink($del_pic);

$del_user = "DELETE FROM users WHERE id=$id";
$del_user_que = mysqli_query($db_con,$del_user);

$_SESSION['del_com'] = 'Delete Complete';
header('location:index.php?delete_complete');



?>