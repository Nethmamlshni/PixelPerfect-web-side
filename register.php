<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $contact = mysqli_real_escape_string($conn, $_POST['contact']);
   

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password,contact) VALUES('$name', '$email', '$pass','$contact')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            echo "<script>alert('Welcome! our pixel perfect family '); window.location.href='index.html';</script>";
           
         }else{
            $message[] = 'registeration failed!';
            echo "Error:".$sql ."<br>" . mysqli_error($conn);
         }
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
   <title>register</title>

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
        
<div id="particles-js" class="snow"></div>
        <main class="login_de">
                  <div class="left-side">
                         <h1 class="left-name">Find Photograper</h1>
                  </div>
          
          <div class="right-side">

       <form action="" method="post" enctype="multipart/form-data">
      <h3 class="or">register now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
       <label>Name</label><br>
      <input type="text" name="name" placeholder="enter username" class="input" required></br>
      <label>Email</label><br>
      <input type="email" name="email" placeholder="enter email" class="input" required></br>
      <label>Password</label><br>
      <input type="password" name="password" placeholder="enter password" class="input" required></br>
      <label>Confirm Password</label><br>
      <input type="password" name="cpassword" placeholder="confirm password" class="input" required></br>
      <label>Contact</label><br>
      <input type="contact" name="contact" placeholder="enter contact" class="input" required></br>
      
      <input type="submit" name="submit" value="register now" class="login-btn">

      <p>already have an account? <a href="login.php">login now</a></p>
   </form>
   
</div>
   </main>
   </div>
</body>
</html>