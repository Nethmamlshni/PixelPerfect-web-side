<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];


if(!isset( $user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

    <!-- custom css file link  -->
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
       </style>

</head>
<body>
   

<div class="fade-in-image">
<main >
        <div class="left-side">
         <h1 class="left-names">Find Photograper</h1>
        </div>
       
       <div class="right-side">
         <!--<div class="img">
      <?php
      
         $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
         /*if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }*/
      ?>
      </div>-->
     <center> <h3><?php echo $fetch['name']; ?></h3></center>
     <button onclick="location.href='update_profile.php'" class="login-btn">update profile</a> </button>
     <button onclick="location.href='logout.php'" class="login-btn">logout</a> </button>
     <button onclick="location.href='login.php'" class="login-btn" > New login </a>  </button> 
     <button onclick="location.href='login2.php'" class="login-btn" > register </a> </button>

     

   </div>

      </main>
      </div>

</body>
</html>

