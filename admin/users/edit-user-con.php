<?php
session_start();
require '../db-con/db_con.php';

$id = $_POST['id'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$role = $_POST['role'];

if ($_FILES['image']['name'] != '') {
	$del_img = "SELECT picture FROM users WHERE id=$id";
	$del_img_que = mysqli_query($db_con,$del_img);
	$del_img_assoc = mysqli_fetch_assoc($del_img_que);
	$del_from = "../uploads/users/".$del_img_assoc['picture'];
	unlink($del_from);

	$u_img = $_FILES['image'];
	$after_explode = explode('.', $u_img['name']);
	$extension = end($after_explode);
	$allow_extension = array('jpg','png','gif','ico');

	if (in_array($extension, $allow_extension)) {
		if ($u_img['size'] <= 200000) {
			

			$file_name = $id.'.'.$extension;
			$new_location = "../uploads/users/".$file_name;
			move_uploaded_file($u_img['tmp_name'], $new_location);

			$update_pic = "UPDATE users SET picture='$file_name' WHERE id='$id'";
			$update_pic_que = mysqli_query($db_con,$update_pic);

			$update_db = "UPDATE users SET full_name='$name',gender='$gender',role='$role' WHERE id='$id'";
			$update_db_que = mysqli_query($db_con,$update_db);

			$_SESSION['update_com'] = 'Update Complete';
			header('location:index.php?update_complete');
		}else{
			$_SESSION['img_err'] = 'Picture Size Is Too Learge';
			header('location:edit-user.php?picture_error');
		}
	}else{
		$_SESSION['img_err'] = 'File Not Support';
		header('location:edit-user.php?picture_error');
	}
}


?>