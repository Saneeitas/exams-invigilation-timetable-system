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
 include 'inc/process.php'; ?>

 <div class="container p-3">
     <div class="row">
         <div class="col-12">
             <div class="row">
                 <div class="col-6"> 
                 <a href="timetable.php" class="btn btn-sm btn-secondary"><i class="fas fa-sign-out-alt"></i> Back</a>
                 </div>
             </div>
         </div>
         <div class="col-12">
             <div class="container">
                 <h6 class="text-center">Timetable</h6>
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
                        <th scope="col">SN</th>  
                        <th scope="col">Course</th>
                         <th scope="col">Date</th>
                        <th scope="col">Venue</th>
                        <th scope="col">Time</th>
                        <th scope="col">Invigilators</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM timetable";
                        $query = mysqli_query($connection,$sql);
                        $counter =1;
                        while($result = mysqli_fetch_assoc($query)){
                            ?>
                            <tr class="table-active">
                              <td scope="row"><?php echo $counter; ?></td>
                              <?php 
                                      $id = $result["course_id"];
                                      $sql2 = "SELECT * FROM courses WHERE id='$id'";
                                      $query2 = mysqli_query($connection,$sql2);
                                      $result2 = mysqli_fetch_assoc($query2);
                                  ?>
                              <td scope="row">
                              <?php echo $result2["name"]; ?>
                              </td>
                                <td><?php echo $result["date_"], "<br>", $result["day_"]; ?></td>
                                <td><?php echo $result["venue"]; ?></td>
                                <td><?php echo $result["from_"], " to ", $result["to_"]; ?></td>
                                <?php 
                                      $id = $result["invigilator_id_i"];
                                      $sql3 = "SELECT * FROM invigilators WHERE id='$id'";
                                      $query3 = mysqli_query($connection,$sql3);
                                      $result3 = mysqli_fetch_assoc($query3);

                                      $id = $result["invigilator_id_ii"];
                                      $sql4 = "SELECT * FROM invigilators WHERE id='$id'";
                                      $query4 = mysqli_query($connection,$sql4);
                                      $result4 = mysqli_fetch_assoc($query4);

                                      $id = $result["invigilator_id_iii"];
                                      $sql5 = "SELECT * FROM invigilators WHERE id='$id'";
                                      $query5 = mysqli_query($connection,$sql5);
                                      $result5 = mysqli_fetch_assoc($query5);
                                  ?>
                                <td><?php echo $result3["name"]."<br>".$result4["name"]."<br>".$result5["name"]; ?></td>
                                <td>
                                  <a href="?delete_timetable=<?php echo $result["id"]; ?>">
                                  <i class="fas fa-trash-alt text-danger"></i></a>
                                </td>
                             </tr>
                            <?php
                            $counter++;
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
        <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="" method="post">
              <label for="">Title</label>
              <div class="form-group">
                  <input type="text" class="form-control" name="name" placeholder="Enter title" id="" required>
              </div>
              <div class="my-3">
                  <button type="submit" class="btn btn-primary" name="category">Submit</button>
              </div>
          </form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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