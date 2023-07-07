<?php

session_start();

 require "inc/process.php";
 require "inc/header.php";   
 // require "body.php"; 

 ?>
<div class="container">
    <?php require './pages/header-home.php'; ?>
    <div class="container-fluid my-3">
    <div class="row">
    <div  class="col-12">
    <img class="d-block mx-auto mb-4" src="./images/capture.PNG" style="border-radius: 15px" alt="" width="850" height="450">
    </div>
    </div>
    <?php require './pages/footer-home.php'; ?>
</div>

 <?php 
 require "inc/footer.php"; 
 ?>
