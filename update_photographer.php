<?php

include 'config.php';
session_start();
$photographer_id = $_SESSION['photograper_id'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `photographer_form` SET name = '$update_name', email = '$update_email' WHERE id = '$photographer_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `photographer_form` SET password = '$confirm_pass' WHERE id = '$photographer_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `photographer_form` SET image = '$update_image' WHERE id = '$photographer_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
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
   <title>update profile</title>

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
        .imgg{
         width: 80px;
         height: 80px;
         object-fit : cover;
         border-radius : 50%;
        
        }
       </style>

</head>
<body>
   


   <?php
   $select = mysqli_query($conn, "SELECT * FROM `photographer_form` WHERE id = '$photographer_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>
   <div class="fade-in-image">
    <main >
        <div class="left-side">
         <h1 class="left-names">Find Photograper</h1>
        </div>
       
       <div class="right-side">

  
   <form action="" method="post" enctype="multipart/form-data">
  <div class="img">

      <?php
         if($fetch['image'] == ''){
            echo '<img src="picure/default-avatar.png">';
         }else{
            echo '<img class="imgg" src="Picure/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      </div>
     
            <span>username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="input">
            <span>your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="input">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="input">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>old password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="input">
            <span>new password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="input">
            <span>confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="input">
      <input type="submit" value="update profile" name="update_profile" class="login-btn">
      <a href="home2.php" class="login-btn">go back</a>
   </form>

</div>
</main>
</div>
</body>
</html>