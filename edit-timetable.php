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

  //if user click edit
if(isset($_GET["edit_timetable_id"]) && !empty($_GET["edit_timetable_id"])){
    $edit_timetable_id = $_GET["edit_timetable_id"];
    //GET data
    $sql = "SELECT * FROM timetable WHERE id = '$edit_timetable_id'";
    $query = mysqli_query($connection,$sql);
    $result = mysqli_fetch_assoc($query);
}else{
    header("location: timetable.php");

}
 ?>

 <div class="container p-3">
     <div class="row">
         <div class="col-12">
             <div class="row">
             <div class="col-6"> 
                 <a href="view-timetable.php" class="btn btn-sm btn-secondary"><i class="fas fa-sign-out-alt"></i> Back</a>
                 </div>
             </div>
         </div>
      
         <div class="col-9">
             <div class="container">
                 <h6 class="text-center">Edit Timetable</h6>
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
                                    <label for="">Course</label>
                                    <select name="course_id" class="form-select" id="">
                                    <?php
                                        $sql = "SELECT * FROM courses ORDER BY id DESC";
                                        $query = mysqli_query($connection, $sql);
                                        while ($result2 = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <option value="<?php echo $result2["id"] ?>" <?php echo $result["course_id"] == $result2["id"] ? "selected" : "" ?>>
                                                <?php echo $result2["name"] ?>
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
                                  <input type="date" name="date_" class="form-control" id="" required value="<?php echo $result["date_"] ?>">
                             </div>
                         </div>
                     </div>
                     <div class="row">
                        <div class="col-6">
                                <div class="form-group">
                                    <label for="">Day </label>
                                    <select name="day_" class="form-select" id="">
                                        <option value="<?php echo $result["day_"] ?>" selected> <?php echo $result["day_"] ?> </option>
                                        <option value="Friday"> Friday </option>
                                        <option value="Saturday"> Saturday </option>
                                    </select>
                                </div>
                            </div> 
                            <div class="col-3">
                             <div class="form-group">
                                 <label for="">From</label>
                                  <input type="time" name="from_" class="form-control" id="" required value="<?php echo $result["from_"] ?>">
                             </div>
                         </div>
                            <div class="col-3">
                             <div class="form-group">
                                 <label for="">To</label>
                                  <input type="time" name="to_" class="form-control" id="" required value="<?php echo $result["to_"] ?>">
                             </div>
                         </div>
                     </div> 
                     <div class="row">
                         <div class="col-6">
                             <div class="form-group">
                                 <label for=""> Venue</label>
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
                          class="btn btn-sm text-light my-2 mx-4" style="background-color:#3b7fad;">
                          Update <i class="fas fa-plus"></i></button>
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