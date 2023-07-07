<?php  
session_start();

//check if user is not logged in
if(!isset($_SESSION["user"])){
    header("location: login.php");
}//check if logged in as user
// if($_SESSION["user"]["role"] == "user"){
//     header("location: all-questions.php");
// }

//header links
 require "inc/header.php"; ?>

 <div class="container">

 <?php
 //header content
 require './pages/header-home.php';
 include 'inc/process.php'; 
 ?>

 <div class="container p-3">
     <div class="row">
         <div class="col-12">
             <div class="row">
                 <div class="col-6"> 
                     <h4>ADMIN DASHBOARD</h4>  
                 </div>
             </div>
</div>
<div class="col-3">
    <ul class="list-group">
        <div> 
        <li class="list-group-item" style="color:#3b7fad;">
            <a href="course.php" class="btn">
                <i class="fas fa-grip-vertical"style="color:gray;" ></i> Courses</a>
        </li>    
        <li  class="list-group-item">
            <a href="invigilator.php" class="btn">
                <i class="fas fa-boxes" style="color:gray;"></i> Invigilators</a>
        </li  class="list-group-item">
        <li  class="list-group-item">
             <a href="timetable.php" class="btn text-danger">
                 <i class="fas fa-plus" style="color:gray;"></i> Timetable</a>
        </li>
        </div>
    </ul>
</div>


         <div class="col-9">
             <div class="container">
             <a href="view-timetable.php" class="btn border btn-secondary ">View Timetable</a>
                 <h6 class="mt-4">Add Exam Timetable</h6>
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
                 <form action="" method="post" enctype="multipart/form-data">
                 <div class="row">
                        <div class="col-6">
                                <div class="form-group">
                                    <label for="">Select a Course</label>
                                    <select name="course_id" class="form-select" id="">
                                       <?php
                                         $sql = "SELECT * FROM courses ORDER BY id DESC";
                                         $query = mysqli_query($connection,$sql);
                                         while($result = mysqli_fetch_assoc($query)){
                                             ?>
                                             <option value="<?php echo $result["id"] ?>">
                                             <?php echo $result["name"] ?>
                                            </option>
                                             <?php
                                         }
                                       ?>  
                                    </select>
                                </div>
                            </div> 
                            <div class="col-6">
                             <div class="form-group">
                                 <label for="">Date</label>
                                  <input type="date" name="date_" class="form-control" id="" required>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                        <div class="col-6">
                                <div class="form-group">
                                    <label for="">Select a Day </label>
                                    <select name="day_" class="form-select" id="">
                                             <option value="Saturday">Saturday </option>
                                             <option value="Sunday">Sunday</option>
                                             <option value="Monday">Monday </option>
                                             <option value="Tuesday">Tuesday</option>
                                             <option value="Wednesday">Wednesday</option>
                                             <option value="Thursday">Thursday</option>
                                             <option value="Friday">Friday </option>
                                    </select>
                                </div>
                            </div> 
                            <div class="col-3">
                             <div class="form-group">
                                 <label for="">From</label>
                                  <input type="time" name="from_" class="form-control" id="" required>
                             </div>
                         </div>
                            <div class="col-3">
                             <div class="form-group">
                                 <label for="">To</label>
                                  <input type="time" name="to_" class="form-control" id="" required>
                             </div>
                         </div>
                     </div> 
                     <div class="row">
                         <div class="col-6">
                             <div class="form-group">
                                 <label for="">Select a Venue</label>
                                 <select name="venue" class="form-select" id="">
                                             <option value="MLK">MLK </option>
                                             <option value="ADO GARKI">ADO GARKI</option>
                                             <option value="MULTIPURPOSE">MULTI PURPOSE </option>
                                             <option value="HALL D">HALL D</option>
                                             <option value="SLT">SLT</option>
                                    </select>
                             </div>
                         </div>
                        <div class="col-6">
                                <div class="form-group">
                                    <label for="">1st Invigilator</label>
                                    <select name="invigilator_id_i" class="form-select" id="">
                                       <?php
                                         $sql = "SELECT * FROM invigilators ORDER BY id DESC";
                                         $query = mysqli_query($connection,$sql);
                                         while($result = mysqli_fetch_assoc($query)){
                                             ?>
                                             <option value="<?php echo $result["id"] ?>">
                                             <?php echo $result["name"] ?>
                                            </option>
                                             <?php
                                         }
                                       ?>  
                                    </select>
                                </div>
                            </div> 
                     </div>
                     <div class="row">
                     <div class="col-6">
                                <div class="form-group">
                                    <label for="">2nd Invigilator</label>
                                    <select name="invigilator_id_ii" class="form-select" id="">
                                       <?php
                                         $sql = "SELECT * FROM invigilators ORDER BY id DESC";
                                         $query = mysqli_query($connection,$sql);
                                         while($result = mysqli_fetch_assoc($query)){
                                             ?>
                                             <option value="<?php echo $result["id"] ?>">
                                             <?php echo $result["name"] ?>
                                            </option>
                                             <?php
                                         }
                                       ?>  
                                    </select>
                                </div>
                            </div> 
                     <div class="col-6">
                                <div class="form-group">
                                    <label for="">3rd Invigilator</label>
                                    <select name="invigilator_id_iii" class="form-select" id="">
                                       <?php
                                         $sql = "SELECT * FROM invigilators ORDER BY id DESC";
                                         $query = mysqli_query($connection,$sql);
                                         while($result = mysqli_fetch_assoc($query)){
                                             ?>
                                             <option value="<?php echo $result["id"] ?>">
                                             <?php echo $result["name"] ?>
                                            </option>
                                             <?php
                                         }
                                       ?>  
                                    </select>
                                </div>
                            </div> 
                     </div>
                     </div>
                        <div class="form-group">
                         <button type="submit" name="add_timetable" 
                          class="btn btn-sm btn-secondary my-2 mx-4">
                          Add <i class="fas fa-plus"></i></button>
                     </div>
                  </div>
                </form>
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