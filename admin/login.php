<?php
session_start();
include 'includes/header.php';


?>



<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="margin: 0 auto;">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Login | Back To <a href="$">Sam BD</a></h3>
                    </div>
                    <div class="card-body">
                        <form action="login-com.php" method="post">
                            <div class="form-group" style="width: 340px; text-align: center; margin: 0 auto;">
                                <input type="email" name="email" placeholder="Your Email Address" class="form-control input-lg">
                                <div class="mt-1">
                                            <?php if(!empty($_SESSION['email_err'])): ?>
                                            <div class="alert alert-dismissable alert-danger">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['email_err']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['email_err']); ?>
                                        </div>
                            </div>

                            <div class="form-group" style="width: 340px; text-align: center; margin: 0 auto;">
                                <input type="password" name="password" placeholder="Your Password" class="form-control input-lg">
                                <div class="mt-1">
                                            <?php if(!empty($_SESSION['pass_err'])): ?>
                                            <div class="alert alert-dismissable alert-danger">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['pass_err']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['pass_err']); ?>
                                        </div>
                            </div>
                            <br>
                            <div class="form-group" style="width: 340px; text-align: center; margin: 0 auto;">
                                <button type="submit" class="btn btn-primary btn-lg">Login</button>
                                <p>you don't have an account <a href="register.php">register now</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <div class="input-group" style="width: 340px; text-align: center; margin: 0 auto;">
                            <input class="form-control input-lg" title="Confidential signup."
                                placeholder="Enter your email address" type="text">
                            <span class="input-group-btn">
                                <button class="btn btn-lg btn-primary" type="button">OK</button></span>
                        </div> -->