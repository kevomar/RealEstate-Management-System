<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $u_email = mysqli_real_escape_string($conn, $_POST['email']);
   $u_password = mysqli_real_escape_string($conn, md5($_POST['password']));
   

   $select = "SELECT * FROM `users` WHERE u_email = '$u_email' AND u_password = '$u_password'"; 
   $result = mysqli_query($conn, $select);


   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $_SESSION['user_id'] = $row['u_id'];
      header('location:home.php');

   }else{
      $message[] = 'incorrect email or password!';
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

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>login now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="email" name="email" placeholder="enter email" class="box" required>
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <input type="submit" name="submit" value="login now" class="btn">
      <p>don't have an account? <a href="registerform.php">regiser now</a></p>
   </form>

</div>

</body>
</html>