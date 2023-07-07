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
         <div class="col-12 text-center">
             <h6>Al-Qalam University Katsina</h6>
             <h6>College of Computing and Information Science</h6>
         </div>
         </div>
         <div class="col-12">
             <div class="container">
                 <h6 class="text-center">Invigilation Timetable for Second Semester Examination 2022/2023 Session </h6>
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
                    <table class="table my-4">
                    <thead>
                        <tr>
                        <th scope="col">SN</th>  
                         <th scope="col">Date</th>
                        <th scope="col">Venue</th>
                        <th scope="col">Time</th>
                        <th scope="col">Invigilators</th>
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



<?php  
//footer content
require './pages/footer-home.php'; ?>

 </div>


 <?php
 //footer script
  require "inc/footer.php";  ?>