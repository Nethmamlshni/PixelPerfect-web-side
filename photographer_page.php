<?php

// Database connection
$mysqli = new mysqli("localhost", "root", "", "user_db");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get the photographer's ID from the URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    // Fetch photographer details from the database
    $stmt = $mysqli->prepare("SELECT name ,email,image , contact ,image_work ,gender,birth ,achive  ,course,bio , bank_name ,bank_acc, bank_u_name , bank_branch FROM photographer_form WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($name ,$email, $image ,$contact ,$imagework ,$gender , $birth,  $achiev , $course, $bio, $namebank  , $nameacc, $bankuname , $branchname);
    $stmt->fetch();
    $stmt->close();

    if ($name) { 
        $profile=" P r o f i l e ";
        $names=  '<h1>' . htmlspecialchars($name) .  '</h1>';
        $genders= '<p>' . htmlspecialchars($gender) . '</p>';
       
    } else {
        echo "Photographer not found.";
    }
} else {
    echo "Invalid photographer ID.";
}

$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/hire.css">
    <style>
       
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
        .img{
         width: 80px;
         height: 80px;
         object-fit : cover;
        
        }
       </style>
</head>
<body>
   
    <main>
       
       <h1> <?php echo $profile; ?></h1>
      
       <?php
      if($fetch['image'] == '0'){
         echo '<img class="imgg" src="picure/default-avatar.png">';
      }else{
         echo '<img class="imgg" src="Picure/'. $image .'">';
          }
   ?>
       
        
         <h3 class="names"><?php echo $name ; ?> 
           <?php echo "<br>". "(". $bio . ")" ; ?></h3>

        <form action ="#"  method="POST">
        <div class="detail">
        
       <p>Name : <?php echo $name   ; ?></p>
       <p>Contact : <?php echo $contact ; ?></p>
       <p>Email : <?php echo $email ; ?></p>
       <p>Gender : <?php echo $gender ; ?></p>
       <p>Birth : <?php echo $birth ; ?></p>
    
       <hr>
       <p><b>Education Details :</b> </p>
       
       <p>Course : <?php echo $course ; ?></p>
       <p>Accivement : <?php echo $achiev ; ?></p>
       <hr>
       <p><b>Images :</b></p>
       <?php
      if($fetch['image'] == '0'){
         echo '<img class="img" src="picure/default-avatar.png">';
      }else{
         echo '<img class="img" src="Picure/'. $imagework .'">';
          }
   ?>
       <hr>
       <p><b>Account Details :</b></p>
       <p>Bank Name : <?php echo $namebank ; ?></p>
       <p>Account Name : <?php echo $nameacc ; ?></p>
       <p>Account Number : <?php echo $bankuname ; ?></p>
       <p>Branch : <?php echo $bankbranch ; ?></p>

       <hr>
       
       <a href ="hire.php">Back to page</a> 

       <?php echo "<br>"; ?>
       <hr>
       </div>
</form>    
</main>    
</body>
</html>



