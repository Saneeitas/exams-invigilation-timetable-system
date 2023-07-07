<nav class="navbar rounded navbar-light " style="background-color:#ffffc2">
    <div class=" container-fluid">
        <a class="navbar-brand text-dark" href="index.php">
            <h4> <i class="fas fa-bars"></i> </h4>
        </a>
        <div class="d-flex">
            <?php 
        if(isset($_SESSION["user"])){
          ?>
            <a href="my-profile.php" class="nav-link text-dark"><i class="fas fa-user-circle"></i> Account </a><span></span>
            <a href="logout.php" class="nav-link text-danger"> 
                <i class="fas fa-sign-out-alt"></i> Logout</a>
            <?php
        }else{
          ?>
            <a href="login.php" class="nav-link text-dark">
            <i class="fas fa-sign-in-alt"></i> Login </a><span></span>
            <a href="register.php" class="nav-link text-dark">
            <i class="fas fa-sign-in-alt"></i> Create Account</a>
            <?php
        }
      ?>
        </div>
    </div>
</nav>