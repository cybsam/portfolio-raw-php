<?php
session_start();
if (!isset($_SESSION['login_success'])) {
	header('location:../login.php?login_require');
}
require '../db-con/db_con.php';
include '../includes/header.php';
include '../includes/nav.php';


$sel_db = "SELECT * FROM users";
$sel_db_que = mysqli_query($db_con,$sel_db);



?>


<?php if ($_SESSION['role']!=0) { ?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header text-center">
						<h3>All Users</h3>
					</div>
					<div class="card-body">
						<table class="table">
							<tr>
									<th>S.N</th>
									<th>Name</th>
									<th>Email</th>
									<th>Password</th>
									<th>Picture</th>
									<th>Role</th>
									<th>Action</th>
							</tr>
							<?php $sn = 1; foreach ($sel_db_que as $user): ?>
							<tr>
								<td><?php echo $sn++; ?></td>
								<td><?php echo $user['full_name']; ?></td>
								<td><?php echo $user['email']; ?></td>
								<td>********</td>
								<td><img src="../uploads/users/<?php echo $user['picture']; ?>" width="48"></td>
								<td>
									<?php if ($user['role']==1) {
										echo "Admin";
									}elseif ($user['role']==2) {
										echo "Moderator";
									}else{
										echo "Member";
									} ?>
								</td>
								<td>
									<a href="edit-user.php?id=<?php echo $user['id']; ?>" class="btn btn-warning btn-xs">Edit</a>
									<?php if ($_SESSION['role']==1) { ?>
										<a href="delete.php?id=<?php echo $user['id']; ?>" class="btn btn-danger btn-xs">Delete</a>
									<?php }else{
										echo "Permission Require.!";
									} ?>
								</td>
							</tr>
						<?php endforeach; ?>
						</table>
						<a href="add-user.php" class="btn btn-primary">Add User</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php }  else{
    echo "<div class='alert alert-danger' role='alert'>
  <h3>ACCESS DENIED</h3></br>
Did you know! There are about 7 billion people in the world but only few of them have privilege to access this page.

Unfortunately you are not one of them!

If you think you should have the privilege to access this page, please contact with the administrator.

</div>";} include '../includes/footer.php'; ?>