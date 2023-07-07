<?php  
session_start();

//header links
 require "inc/header.php"; ?>

<div class="container">

    <?php
 //header content
 require './pages/header-home.php';
 include 'inc/process.php'; ?>

    <div class="d-flex aligns-items-center justify-content-center py-3">
        <form action="" method="post">

            <div class="form-group">
                <h4 class="text-center">Login</h4>
                <?php 
              if(isset($error)) {
                  ?>
                <div class="alert alert-danger">
                    <strong><?php echo $error ?></strong>
                </div>
                <?php
              }elseif (isset($success)) {
                  ?>
                <div class="alert alert-success">
                    <strong><?php echo $success ?></strong>
                </div>
                <?php
              }
          ?>
            </div>

            <div class="form-group">
                <input type="text" name="email" class="form-control" placeholder="Enter your email" id="" required>
            </div>
            <div class="form-group my-2">
                <input type="password" name="password" class="form-control" placeholder="Enter password" id="" required>
            </div>
            <button type="submit" name="login" class="btn text-light my-2"
                style="background-color:gray;">Login</button>
            <br>
            <p>If not registered <a href="register.php">Signup</a></p>

        </form>

    </div>



    <?php  
//footer content
require './pages/footer-home.php'; ?>

</div>


<?php
 //footer script
  require "inc/footer.php";  ?>