<?php

// Database connection
$mysqli = new mysqli("localhost", "root", "", "user_db");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/hire.css">
    <!--<link rel="stylesheet" href="css/chat.css">
    <style>
        main
        {
         background-image: url("Picure/WhatsApp Image 2024-06-24 at 01.22.23.jpeg");
        }
       </style>-->
</head>
<body>
    <?php
$sql = "SELECT id, name ,email ,image FROM photographer_form";
$result = $mysqli->query($sql);
?>
<h1 class="hire_name">C L I C K  M E</h1>
<div class="grid-container">
    <?php 
   
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Using urlencode() to safely pass the first_name in the URL
            $id = $row["id"];
           // echo '<button class="button_hire" ><a href="photographer_page.php?photographer_id=' . $id . '">' . htmlspecialchars($row["first_name"]) . '</a></button>';
            $name='<a href="photographer_page.php?id=' . $id . '">' . htmlspecialchars($row["name"])  . '</a> ' ;
               $stmt = $mysqli->prepare("SELECT image FROM photographer_form WHERE id = ?");
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->bind_result( $image);
                $stmt->fetch();
                $stmt->close();
                 $img='<img class="imgg" src="Picure/'. $image .'">';
                
                
     
    
            
           echo "<div class='grid-item'>
                  $img
                  $name
                <button a href ='photographer_page.php'> ".$name."  </button>             
            </div>";  
        
            }
        
    } else {
        echo "No photographers found.";
    }
    ?>
     
   
    <!-- Chat Button-->
    <button id="chat-icon" onclick="location.href='chat.php'">Chat</button>
    <div id="chat-box"></div> 
    <script src="chat.js"></script>
</body>
</html>