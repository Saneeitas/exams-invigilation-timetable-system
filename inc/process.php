<?php

require "connection.php";


if(isset($_POST["register"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $password = $_POST["password"];
    $encrypt_password = md5($password);

    //check if user exist
    $sql_check = "SELECT * FROM users WHERE email = '$email'";
    $query_check = mysqli_query($connection,$sql_check);
    if(mysqli_fetch_assoc($query_check)){
        //user exists
        $error = "User already exist";
    }else{
         //insert into DB
        $sql = "INSERT INTO users(name,email,role,password) 
               VALUES('$name','$email','$role','$encrypt_password')";
        $query = mysqli_query($connection,$sql) or die("Cant save data");
        $success = "Registration successfully";
    }  
}

if(isset($_POST["login"])){

    $email = $_POST["email"];
    $password = $_POST["password"];
    $encrypt_password = md5($password);

    //check if user exist
    $sql_check2 = "SELECT * FROM users WHERE email = '$email'";
    $query_check2 = mysqli_query($connection,$sql_check2);
    if(mysqli_fetch_assoc($query_check2)){
       //check if email and password exist
       $sql_check = "SELECT * FROM users WHERE email = '$email' AND password = '$encrypt_password'";
       $query_check = mysqli_query($connection,$sql_check);
       if($result = mysqli_fetch_assoc($query_check)){
       //Login to dashboard
       $_SESSION["user"] = $result;
    if($result["role"] == "student"){
        header("location: student.php");
    }elseif ($result["role"] == "lecturer") {
        header("location: lecturer.php");
    }else{
     header("location: admin.php");
    } 
          
       $success = "User logged in";       
     }else{ 
    //user password wrong
    $error = "User password wrong";
}  
       }else{
        //user not found
        $error = "User email not found";
  } 
}


if(isset($_POST["add-course"])){
    $name = $_POST["name"];
    //sql
    $sql = "INSERT INTO courses(name) VALUES('$name')";
    $query = mysqli_query($connection,$sql);
    
    if($query){
        $success = "Course added";
    }else{
        $error = "Unable to add Course";
    }
}

if(isset($_GET["delete_course"]) && !empty($_GET["delete_course"])){
    $id = $_GET["delete_course"];
    //sql
    $sql = "DELETE FROM courses WHERE id = '$id'";
    $query = mysqli_query($connection,$sql);

    if($query){
        $success = "course deleted";
    }else{
        $error = "Unable to delete course";
    }

}

if(isset($_POST["edit_course"])){
    $name = $_POST["name"];
    $edit_id = $_GET["edit_id"];
    //sql
    $sql = "UPDATE courses SET name = '$name' WHERE id = '$edit_id'";
    $query = mysqli_query($connection,$sql);
    if($query){
        $success = "course updated";
    }else{
        $error = "Unable to update course";
    }

}

if(isset($_POST["add-invigilator"])){
    $name = $_POST["name"];
    //sql
    $sql = "INSERT INTO invigilators(name) VALUES('$name')";
    $query = mysqli_query($connection,$sql);
    
    if($query){
        $success = "invigilator added";
    }else{
        $error = "Unable to add invigilator";
    }
}

if(isset($_GET["delete_invigilator"]) && !empty($_GET["delete_invigilator"])){
    $id = $_GET["delete_invigilator"];
    //sql
    $sql = "DELETE FROM invigilators WHERE id = '$id'";
    $query = mysqli_query($connection,$sql);

    if($query){
        $success = "invigilator deleted";
    }else{
        $error = "Unable to delete invigilator";
    }

}

if(isset($_POST["edit_invigilator"])){
    $name = $_POST["name"];
    $edit_id = $_GET["edit_id"];
    //sql
    $sql = "UPDATE invigilators SET name = '$name' WHERE id = '$edit_id'";
    $query = mysqli_query($connection,$sql);
    if($query){
        $success = "invigilator updated";
    }else{
        $error = "Unable to update invigilator";
    }

}

if(isset($_POST["add_timetable"])){
    $course_id = $_POST["course_id"];
    $date_ = $_POST["date_"];
    $day_ = $_POST["day_"];
    $venue = $_POST["venue"];
    $from_ = $_POST["from_"];
    $to_ = $_POST["to_"];
    $invigilator_id_i = $_POST["invigilator_id_i"];
    $invigilator_id_ii = $_POST["invigilator_id_ii"];
    $invigilator_id_iii = $_POST["invigilator_id_iii"];
    //sql
    $sql = "INSERT INTO timetable(course_id,date_,day_,venue,from_,to_,invigilator_id_i,invigilator_id_ii,invigilator_id_iii) 
    VALUES('$course_id','$date_','$day_','$venue','$from_','$to_','$invigilator_id_i','$invigilator_id_ii','$invigilator_id_iii')";
    $query = mysqli_query($connection,$sql);
    
    if($query){
        $success = "timetable added";
    }else{
        $error = "Unable to add timetable";
    }
}

if(isset($_GET["delete_timetable"]) && !empty($_GET["delete_timetable"])){
    $id = $_GET["delete_timetable"];
    //sql
    $sql = "DELETE FROM timetable WHERE id = '$id'";
    $query = mysqli_query($connection,$sql);

    if($query){
        $success = "timetable deleted";
    }else{
        $error = "Unable to delete timetable";
    }

}

if(isset($_POST["update_profile"])){
    $user_id = $_SESSION["user"]["id"];
    if($_FILES["thumbnail"]["name"] != ""){
        //upload image
        $target_dir = "uploads/";
        $url = $target_dir.basename($_FILES["thumbnail"]["name"]);
        //move uploaded file
        if(move_uploaded_file($_FILES["thumbnail"]["tmp_name"],$url)){
            //update to database
             //parameters 
            $phone = $_POST["phone"];
            $location = $_POST["location"];
            $experience = $_POST["experience"];
            $category_id = $_POST["category_id"];
            $thumbnail = $url;    
            //sql
            $sql = "UPDATE users SET phone ='$phone', location='$location', 
                    experience='$experience', category_id='$category_id', profile_pic='$thumbnail'
                    WHERE id='$user_id' ";
            $query = mysqli_query($connection,$sql);
            //check if
            if($query){
                $success = "Profile updated";
            }else{
                $error = "Unable to update profile";
            }
        }
    }
}


if(isset($_POST["update_profile"])){
    $id = $_SESSION["user"]["id"];
    if($_FILES["thumbnail"]["name"] != ""){
        //upload image
        $target_dir = "uploads/";
        $url = $target_dir.basename($_FILES["thumbnail"]["name"]);
        //move uploaded file
        if(move_uploaded_file($_FILES["thumbnail"]["tmp_name"],$url)){
            //update to database
             //parameters 
             $phone = $_POST["phone"];
             $location = $_POST["location"];
             $experience = $_POST["experience"];
             $category_id = $_POST["category_id"];
             $thumbnail = $url;    
            //sql
            $sql = "UPDATE users SET phone ='$phone', location='$location', 
                    experience='$experience', category_id='$category_id', profile_pic='$thumbnail'
                    WHERE id='$id' ";
            $query = mysqli_query($connection,$sql);
            //check if
            if($query){
                $success = "Profile Updated";
            }else{
                $error = "Unable to update profile";
            }
        }
    }else{
        //leave the upload image and
        //update to database
        //parameters 
        $phone = $_POST["phone"];
        $location = $_POST["location"];
        $experience = $_POST["experience"];
        $category_id = $_POST["category_id"];   
        //sql
        $sql = "UPDATE users SET phone ='$phone', location='$location', 
                    experience='$experience', category_id='$category_id'
                    WHERE id='$id' ";
        $query = mysqli_query($connection,$sql);
        //check if
        if($query){
        $success = "Profile updated";
        }else{
        $error = "Unable to update Profile";
        }

    }
}


if(isset($_POST["edit_user"])){
    //check if change password is click
    if(isset($_POST["change_password"]) && $_POST["change_password"] == "on"){
       //update the user with change_password
       $id = $_GET["edit_user_id"];
       $name = $_POST["name"];
       $email = $_POST["email"];
       $password = md5($_POST["password"]);  
       //sql and query
       $sql = "UPDATE users SET name='$name', email='$email',
               password='$password' WHERE id = '$id' ";
       $query = mysqli_query($connection,$sql);
       //check if
       if($query){
           $success = "User data updated";
       }else{
           $error = "Unable to update data";
       }

    }else{
        //update the data only
        $id = $_GET["edit_user_id"];
        $name = $_POST["name"];
        $email = $_POST["email"];  
        //sql and query
        $sql = "UPDATE users SET name='$name', email='$email'
                WHERE id = '$id' ";
        $query = mysqli_query($connection,$sql);
        //check if
        if($query){
            $success = "User data updated";
        }else{
            $error = "Unable to update data";
        }
    }
}


?>