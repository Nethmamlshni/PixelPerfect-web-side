<?php

include 'config.php';   

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `photographer_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');
   $select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $fetch_users = mysqli_fetch_assoc($select_users);
      $photographer_id = $fetch_users['id'];
      $_SESSION['photograper_id'] = $photographer_id;
      header('location:home2.php');
   }else{
      if(mysqli_num_rows($select_user) > 0){
         $fetch_users = mysqli_fetch_assoc($select_user);
         $user_id = $fetch_users['id'];
         $_SESSION['user_id'] = $user_id;
         header('location:home.php');
      
   }
   else{
      $message[] = 'incorrect email or password';
   }

}
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!--custom css file link  -->
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
      <div id="particles-js" class="snow"></div>
        <main class="login_de">
           <div class="left-side">
            <h1 class="left-name">Find Photograper</h1>
           </div>
                     
          <div class="right-side">
   


   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="or" >login now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="email" name="email" placeholder="enter email" class="input" required>
      <br>
      <input type="password" name="password" placeholder="enter password" class="input" required>
      <input type="submit" name="submit" value="login now" class="login-btn">
      <p>don't have an account? <a href="login2.php">regiser now</a></p>
   </form>
   </div>
   </main>
   
   </div>



</body>
</html>


