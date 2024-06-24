<?php

include 'config.php';
session_start();
$photograper_id = $_SESSION['photograper_id'];


if(!isset( $photograper_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($photograper_id);
   session_destroy();
   header('location:login.php');
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="css/cdetails.css">

   <style>
        .left-side
        {
         background-image: url("Picure/WhatsApp Image 2024-06-24 at 01.22.23.jpeg");
        }
        body
        {
           background-image:url("Picure/WhatsApp Image 2024-06-24 at 01.22.23.jpeg");
        }
        .imgg{
         width: 80px;
         height: 80px;
         object-fit : cover;
         border-radius : 50%;
        
        }
       </style>

</head>
<body>
<div class="fade-in-image">
   <main>
   <div class="left-side">
         <h1 class="left-names">Find Photograper</h1>
        </div>
       
       <div class="right-side">

<?php
      
      $select = mysqli_query($conn, "SELECT * FROM `photographer_form` WHERE id = '$photograper_id' ") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
      if($fetch['image'] == ''){
         echo '<img src="picure/default-avatar.png">';
      }else{
         echo '<img class="imgg" src="Picure/'.$fetch['image'].'">';
         echo $fetch['name'];
      }
   ?>
      
     
      <button onclick="location.href='update_photographer.php'" class="login-btn">update profile</a> </button>
     <button onclick="location.href='logout.php'" class="login-btn">logout</a> </button> 
     <button onclick="location.href='login.php'" class="login-btn" > New login </a>  </button>  
     <button onclick="location.href='login2.php'" class="login-btn" > register </a> </button> 
      </div></main>
</div>
</body>
</html>

         