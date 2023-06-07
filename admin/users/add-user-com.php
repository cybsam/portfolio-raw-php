<?php
session_start();

require '../db-con/db_con.php';


$name = $_POST['f_name'];
$email = $_POST['email'];
$password = $_POST['pass'];
$con_pass = $_POST['con_pass'];
$gender = $_POST['sex'];
// $country = $_POST['country'];

$pass_hash = password_hash($password, PASSWORD_DEFAULT);


if (empty($name)) {
	$_SESSION['name_err'] = 'Name fild require...';
	header('location:add-user.php?name_error');
}else if (empty($email)) {
	$_SESSION['email_err'] = 'Email fild require...';
	header('location:add-user.php?email_error');
}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$_SESSION['email_err'] = 'Pleaser Enter Valida Email';
	header('location:add-user.php?valid_email_error');
}else if (empty($password)) {
	$_SESSION['pass_err'] = 'Password fild require...';
	header('location:add-user.php?password_fild_error');

}else if (strlen($password)<6) {
	$_SESSION['pass_err'] = '6 Charecter Password require...';
	header('location:add-user.php?password_not_valid');
}else if(empty($con_pass)){
	$_SESSION['con_pass_err'] = 'Confirm password require';
	header('location:add-user.php?Confirm_password_error');
}else if ($password != $con_pass) {
	$_SESSION['con_pass_err'] = 'Password Not Match';
	header('location:add-user.php?Confirm_password_not_matches');
}else if (empty($gender)) {
	$_SESSION['gen_err'] = 'Select Gender';
	header('location:add-user.php?gender_error');
}
// else if (empty($country)) {
// 	$_SESSION['country_err'] = 'Please Select Your Country';
// 	header('location:add-user.php?country_error');
// }
else{

	

	$u_img = $_FILES['image'];
	$after_explode = explode('.', $u_img['name']);
	$extension = end($after_explode);
	$allow_extension = array('jpg','png','jpeg','ico','bmp','gif');

	if (in_array($extension, $allow_extension)) {
		if ($u_img['size'] <= 200000) {
			$check_db = "SELECT COUNT(*) AS dupli FROM users WHERE email='$email'";
			$check_db_que = mysqli_query($db_con,$check_db);
			$check_db_assoc = mysqli_fetch_assoc($check_db_que);

			if ($check_db_assoc['dupli']==1) {
				$_SESSION['email_err'] = 'Email already register, try a new one, otherwise login now...';
				header('location:add-user.php?duplicate_email_found');
			}else{
				$insert_db = "INSERT INTO users(full_name,email,password,gender) VALUES('$name','$email','$pass_hash','$gender')";
				$insert_db_que = mysqli_query($db_con,$insert_db);

				$last_id = mysqli_insert_id($db_con);
				$file_name = $last_id.'.'.$extension;
				$new_location = "../uploads/users/".$file_name;
				move_uploaded_file($u_img['tmp_name'], $new_location);

				$update_img = "UPDATE users SET picture='$file_name' WHERE id='$last_id'";
				$update_img_que = mysqli_query($db_con,$update_img);

				$_SESSION['insert_com'] = 'Register Complete';
				header('location:add-user.php?register_complete');
			}
		}else{
			$_SESSION['pic_err'] = 'Image size too large';
			header('location:add-user.php?picture_size_err');
		}
	}else{
		$_SESSION['pic_err'] = 'Image File Not Support';
		header('location:add-user.php?picture_not_support');
	}

}


?>