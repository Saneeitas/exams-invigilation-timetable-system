<nav class="navbar rounded navbar-light " style="background-color:gray">
    <div class=" container-fluid">
        <a class="navbar-brand text-light" href="index.php">
            <h4> <i class="fas fa-bars"></i> </h4>
        </a>
        <div class="d-flex">
            <?php 
        if(isset($_SESSION["user"])){
          ?>
            <a href="logout.php" class="nav-link text-danger"> 
                <i class="fas fa-sign-out-alt"></i> Logout</a>
            <?php
        }else{
          ?>
            <a href="login.php" class="nav-link text-light">
            <i class="fas fa-sign-in-alt"></i> Login </a><span></span>
            <?php
        }
      ?>
        </div>
    </div>
</nav>