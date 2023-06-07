<?php
session_start();
include 'includes/header.php';




?>

<section>
    <div class="container">
        <div class="row">
            <div class="">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>New Registration | Sam BD</h2>
                    </div>
                    <br>
                    <div class="card-body">
                        <form action="register-com.php" method="post" enctype="multipart/form-data">
                            <div>
                                
                                <div>
                                    <label for="firstname" class="col-md-2">
                                        Full Name:
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" name="f_name" class="form-control" placeholder="Enter Full Name">
                                        <div class="mt-1">
                                            <?php if(!empty($_SESSION['name_err'])): ?>
                                            <div class="alert alert-dismissable alert-danger">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['name_err']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['name_err']); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <i class="fa fa-lock fa-2x"></i>
                                    </div>
                                    
                                  </div>
                                </div>        
                                <!-- <div>
                                    <label for="lastname" class="col-md-2">
                                        Last Name:
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control"  placeholder="Enter Last Name">
                                    </div>
                                     <div class="col-md-1">
                                        <i class="fa fa-lock fa-2x"></i>
                                    </div>
                                </div> -->
                                <div>
                                    <label for="emailaddress" class="col-md-2">
                                        Email address:
                                    </label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="email" placeholder="Enter email address">
                                        <div class="mt-1 text-center">
                                            <?php if(!empty($_SESSION['email_err'])): ?>
                                            <div class="alert alert-dismissable alert-danger">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['email_err']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['email_err']); ?>
                                        </div>
                                        <p class="help-block">
                                            Example: yourname@domain.com
                                        </p>
                                    </div>
                                     <div class="col-md-1">
                                        <i class="fa fa-lock fa-2x"></i>
                                    </div>
                                </div>
                                <div>
                                    <label for="password" class="col-md-2">
                                        Password:
                                    </label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="pass" placeholder="Enter Password">
                                        <div class="mt-1 text-center">
                                            <?php if(!empty($_SESSION['pass_err'])): ?>
                                            <div class="alert alert-dismissable alert-danger">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['pass_err']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['pass_err']); ?>
                                        </div>
                                        <p class="help-block">
                                            Min: 6 characters (Alphanumeric only)
                                        </p>
                                    </div>
                                     <div class="col-md-1">
                                        <i class="fa fa-lock fa-2x"></i>
                                    </div>
                                </div>
                                <div>
                                    <label for="password" class="col-md-2">
                                        Confirm Password:
                                    </label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="con_pass" placeholder="Confirm Password">
                                        <div class="mt-1 text-center">
                                            <?php if(!empty($_SESSION['con_pass_err'])): ?>
                                            <div class="alert alert-dismissable alert-danger">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['con_pass_err']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['con_pass_err']); ?>
                                        </div>
                                        
                                    </div>
                                     <div class="col-md-1">
                                        <i class="fa fa-lock fa-2x"></i>
                                    </div>
                                </div>
                                <div>
                                    <label for="sex" class="col-md-2">
                                        Gender:
                                    </label>
                                    <div class="col-md-10">
                                        <label class="radio">
                                            <input type="radio" name="sex" id="sex" value="male" checked>
                                            Male
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="sex" id="Radio1" value="female">
                                            Female
                                        </label>
                                        <div class="mt-1 text-center">
                                            <?php if(!empty($_SESSION['gen_err'])): ?>
                                            <div class="alert alert-dismissable alert-danger">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['gen_err']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['gen_err']); ?>
                                        </div>
                                    </div>             
                                </div>
                                <!-- <div>
                                    <label for="country" class="col-md-2">
                                        Country:
                                    </label>
                                    <div class="col-md-9">
                                        <select name="country" id="country" class="form-control">
                                            <option>--Please Select--</option>
                                            <option>India</option>
                                            <option>United States</option>
                                            <option>Canada</option>
                                            <option>United Kingdom</option>
                                            <option>Others</option>
                                        </select>
                                        <div class="mt-1 text-center">
                                            <?php if(!empty($_SESSION['country_err'])): ?>
                                            <div class="alert alert-dismissable alert-danger">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['country_err']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['country_err']); ?>
                                        </div>
                                    </div>            
                                </div> -->
                                <div>
                                    <label for="uploadimage" class="col-md-2">
                                        Upload Image:
                                    </label>
                                    <div class="col-md-10">
                                        <input type="file" name="image">
                                        <div class="mt-1 text-center">
                                            <?php if(!empty($_SESSION['pic_err'])): ?>
                                            <div class="alert alert-dismissable alert-danger">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['pic_err']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['pic_err']); ?>
                                        </div>
                                        <p class="help-block">
                                            Allowed formats: jpeg, jpg, gif, png
                                        </p>
                                    </div>          
                                </div>
                                <div>
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-10">
                                        <label>
                                            <input type="checkbox">I hereby accept the terms and conditions for using this site</label>
                                    </div>            
                                </div>
                                <div>
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-default">
                                            Register
                                        </button>
                                        

                                        <div class="mt-1 text-center">
                                            <?php if(!empty($_SESSION['insert_com'])): ?>
                                            <div class="alert alert-dismissable alert-success">
                                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                                              <?php echo $_SESSION['insert_com']; ?>
                                            </div>
                                        <?php endif; unset($_SESSION['insert_com']); ?>
                                        </div>
                                        
                                    <br>
                                    <br>
                                    <p>Have an account <a href="login.php">login </a>now</p>
                                    </div>
                                    
<br><br><br><br><br><br><br><br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
