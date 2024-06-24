<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $contact = mysqli_real_escape_string($conn, $_POST['contact']);
   $gender = mysqli_real_escape_string($conn, $_POST['gender']);
   $birth= mysqli_real_escape_string($conn, $_POST['dob']);
   $achive = mysqli_real_escape_string($conn, $_POST['achiev_message']);
   $course = mysqli_real_escape_string($conn, $_POST['course_message']);
   $bio = mysqli_real_escape_string($conn, $_POST['bio_message']);
   $namebank = mysqli_real_escape_string($conn, $_POST['namebank']);
   $nameacc = mysqli_real_escape_string($conn, $_POST['nameacc']);
   $bankuname = mysqli_real_escape_string($conn, $_POST['bankuname']);
   $branchname = mysqli_real_escape_string($conn, $_POST['bankbranch']);
  
   
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;

   $imagework = $_FILES['imagework']['name'];
   $imagework_size = $_FILES['imagework']['size'];
   $imagework_tmp_name = $_FILES['imagework']['tmp_name'];
   $imagework_folder = 'uploaded_img/'.$imagework;

   
   $select = mysqli_query($conn, "SELECT * FROM `photographer_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `photographer_form`(name, email, password, image, contact, image_work, gender, birth,achive, course, bio, bank_name, bank_acc, bank_u_name, bank_branch  ) VALUES('$name', '$email', '$pass', '$image','$contact','$imagework','$gender','$birth','$achive','$course','$bio','$namebank','$nameacc','$bankuname','$branchname')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            move_uploaded_file($imagework_tmp_name, $imagework_folder);
            $message[] = 'registered successfully!';
            echo "<script>alert('Welcome! our pixel perfect family '); window.location.href='paysucces.php';</script>";
           
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
   <link rel="stylesheet" href="css/pdetails.css">

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
<table>
   <tr>
       <td><label>Name</label></td>
      <td><input type="text" name="name" placeholder="enter username" class="input" required></td>
   </tr>
   <tr>
      <td><label>Email</label></td>
      <td><input type="email" name="email" placeholder="enter email" class="input" required></td>
   </tr>
   <tr>   
      <td><label>Password</label></td>
      <td><input type="password" name="password" placeholder="enter password" class="input" required></td>
   </tr>
   <tr>   
      <td><label>Confirm</label></td>
      <td><input type="password" name="cpassword" placeholder="confirm password" class="input" required></td>
   </tr>
   <tr>   
      <td><label>Contact</label></td>
      <td><input type="contact" name="contact" placeholder="enter contact" class="input" required></td>
   </tr>
   <tr>
            <td>
           <div style="display: flex;">
            <div style="flex: 1;">
              <label>Gender: </label><br>
              <select id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
          </td>
    
          <td>
            <div style="flex: 1;">
              <label>Birth: </label><br>
              <input type="date" id="dob" name="dob">
            </div>
           </td>
           </tr>
         <tr>
           <td> <label >Achievements </label></td>
           <td> <textarea id="message" name="achiev_message"  class="tarea"></textarea></td>
           
 </tr> 
 <tr>         
            <td><label >Courses </label></td>
           <td> <textarea id="message" name="course_message" class="tarea"></textarea> </td>
          
</tr>
<tr>
           <td> <label >Bio </label></td>
           <td> <textarea id="message" name="bio_message" class="tarea" > </textarea></td>
           
   <tr>   
      <td><label>Photo</label></td>
      <td><input type="file" name="image" class="input" accept="image/jpg, image/jpeg, image/png"></td>
   </tr>
   <tr>   
      <td><label>Photo work</label></td>
      <td><input type="file" name="imagework" class="input" accept="image/jpg, image/jpeg, image/png"></td>
   </tr>
   
   <tr>
            <td><label >Back</label></td>
            <td><input class="input"  type="text" placeholder="Bank Name" name="namebank" required /></td>
  </tr>
           
  <tr>
              <td><label >Number</label></td>
              <td><input class="input"  type="text" placeholder="Account Number" name="nameacc" required /></td>
  </tr>
             
 <tr>
           <td><label>your Name</label></td>
            <td><input class="input"  type="text" placeholder="Bank's your Name" name="bankuname" required /></td>
</tr>
            
<tr>
            <td><label>Branch</label></td>
            <td><input class="input"  type="text" placeholder="Branch" name="bankbranch" required /></td>
   </tr>
             
    <tr>
      <td colspan="2"><input type="submit" name="submit" value="register now" class="login-btn"></td>
   </tr>
   <tr>
   <td colspan="2"> <p>already have an account? <a href="login.php">login now</a></p></td>
  
      </table> 
      </form>
   

   
</div>

   </main>
   </div>
</body>
</html>