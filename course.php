<?php  
session_start();

//check if user is not logged in
if(!isset($_SESSION["user"])){
    header("location: login.php");
}//check if logged in as user
if($_SESSION["user"]["role"] == "user"){
    header("location: all-questions.php");
}
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
                 <li class="list-group-item" style="color:#3b7fad;">
                     <a href="course.php" class="btn text-danger">
                         <i class="fas fa-grip-vertical" style="color:gray;"></i> Courses</a>
                 </li>    
                 <li class="list-group-item" style="color:gray;">
                    <a href="invigilator.php" class="btn">
                        <i class="fas fa-boxes"  style="color:gray;"></i> Invigilators</a>
                 </li>
                 <li class="list-group-item" style="color:gray;">
                        <a href="timetable.php" class="btn">
                        <i class="fas fa-plus"  style="color:gray;"></i> Timetable</a>
                 </li>
             </ul>
         </div>
         <div class="col-9">
             <div class="container">
                 <a href="javascript:;" class="btn border btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">New Course</a>
                 <h6 class="text-center">All Courses</h6>
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
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM courses";
                        $query = mysqli_query($connection,$sql);
                        $count =1;
                        while($result = mysqli_fetch_assoc($query)){
                            ?>
                            <tr class="table-active">
                              <th scope="row"><?php echo $count ?></th>
                                <td><?php echo $result["name"]; ?></td>
                                <td>
                                  <a href="course-edit.php? edit_id=<?php echo $result["id"] ?>">
                                  <i class="fas fa-edit"></i></a>
                                   |
                                  <a href="course.php? delete_course=<?php echo $result["id"]; ?>">
                                  <i class="fas fa-trash-alt text-danger"></i></a>
                                </td>
                             </tr>
                            <?php
                            $count++;
                        }
                        ?>
                    </tbody>
                    </table>
                    </div> 
         </div>
     </div>
 </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Course</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="" method="post">
              <label for="">Title</label>
              <div class="form-group">
                  <input type="text" class="form-control" name="name" placeholder="Enter course name" id="" required>
              </div>
              <div class="my-3">
                  <button type="submit" class="btn" style="background-color:#3b7fad;" name="add-course"><i class="fas fa-plus text-light"></i></button>
              </div>
          </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="color: #3b7fads"  data-bs-dismiss="modal">Close</button>
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