<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login2</title>
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
        .paysu{
           
            margin-top: 50%; 
           
        }
        
       </style>

</head>
<body>
    <div class="fade-in-image">
    <main class="paysu">
        <div class="left-side">
         <?php echo "<h1 class='left-name'>Find Photograper</h1>"?>
        </div>
       
       <div class="right-side">
         <form>
            <div class="selected">
                <input type="next" class="login-btns" onclick="location.href='photograper-register.php'" value="As a Photographer">
                 </div>
                 <div class="selected">
                <input type="next" class="login-btns" value="As a Customer" onclick="location.href='register.php'">
            </div>
       </form>
       </div>
      </main>
     </div>
</body>
</html>