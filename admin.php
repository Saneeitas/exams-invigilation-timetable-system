<?php  
session_start();

//check if user is not logged in
if(!isset($_SESSION["user"])){
    header("location: login.php");
}
//check if logged in as user
// if($_SESSION["user"]["role"] == "admin"){
//     header("location: all-questions.php");
// }
//header links
 require "inc/header.php"; ?>

 <div class="container">

 <?php
 //header content
 require './pages/header-home.php';
 include 'inc/process.php'; ?>

 <div class="container p-3">
     <div class="row">
         <div class="col-12">
             <div class="row">
                 <div class="col-6"> 
                     <h4>ADMIN DASHBOARD</h4>  
                 </div>
                <!--  <div class="col-6">
                      <a href="logout.php" class="btn btn-sm btn-danger"><i class="fas fa-sign-out-alt"></i> LOGOUT</a>
                 </div> -->
             </div>
         </div>
         <div class="col-3">
             <ul class="list-group">
                 <div> 
                 <li class="list-group-item" style="color:#3b7fad;">
                     <a href="course.php" class="btn">
                         <i class="fas fa-grip-vertical"style="color:#3b7fad;"></i> COURSES</a>
                 </li>    
                 <li  class="list-group-item">
                     <a href="invigilator.php" class="btn">
                         <i class="fas fa-boxes" style="color:#3b7fad;"></i> INVIGILATORS</a>
                 </li  class="list-group-item">
                 <li  class="list-group-item">
                      <a href="timetable.php" class="btn">
                          <i class="fas fa-plus" style="color:#3b7fad;"></i> TIMETABLE</a>
                 </li>
                 </div>
             </ul>
         </div>
         <div class="col-9">
         <div class="container">
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
         </div>
     </div>
 </div>



<?php  
//footer content
require './pages/footer-home.php'; ?>

 </div>


 <?php
 //footer script
  require "inc/footer.php";  ?>