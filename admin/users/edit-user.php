<?php
session_start();
if (!isset($_SESSION['login_success'])) {
	header('location:../login.php?login_require');
}
require '../db-con/db_con.php';
include '../includes/header.php';
include '../includes/nav.php';

$id = $_GET['id'];

$sel_db = "SELECT * FROM users WHERE id=$id";
$sel_db_que = mysqli_query($db_con,$sel_db);
$sel_db_assoc = mysqli_fetch_assoc($sel_db_que);

?>
<?php if ($_SESSION['role']!=0) { ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="card">
					<div class="card-header">
						<h4>User Edit And User Details</h4>
					</div>
					<div class="card-body">
						<form action="edit-user-con.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<input type="hidden" name="id" value="<?php echo $sel_db_assoc['id']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<input type="text" name="name" value="<?php echo $sel_db_assoc['full_name']; ?>" class="form-control">
								<!-- <div class="mt-1">
                                            <?php if(!empty($_SESSION['email_err'])): ?>
                                            <div class="alert alert-dismissable alert-danger">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['email_err']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['email_err']); ?>
                                    </div> -->
							</div>
							<div class="form-group">
								<input type="hidden" name="email" value="<?php echo $sel_db_assoc['email']; ?>" class="form-control">
							</div>
							<div class="form-group">
								<select class="form-control" name="gender">
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select>
							</div>
							<div class="form-group">
								<select name="role" class="form-control">
									<option value="1">Admin</option>
									<option value="2">Moderator</option>
									<option value="0">Member</option>
								</select>
							</div>
							<div class="form-group">
								<input type="file" name="image">
								<p>Present Picture:-</p>
								<img src="../uploads/users/<?php echo $sel_db_assoc['picture']; ?>" width="100">
								<div class="mt-1">
                                            <?php if(!empty($_SESSION['img_err'])): ?>
                                            <div class="alert alert-dismissable alert-danger">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['img_err']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['img_err']); ?>
                                    </div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Update User</button>
							</div>
						</form>
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

</div>";}include '../includes/footer.php';?>