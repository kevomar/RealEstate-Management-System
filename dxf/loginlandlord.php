<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $ld_email = $_POST['email'];//mysqli_real_escape_string($conn, $_POST['email']);
   $ld_password = $_POST['password'];//mysqli_real_escape_string($conn, md5($_POST['password']));
   

   $select = "SELECT * FROM `landlords` WHERE ld_email = '$ld_email' AND ld_password = '$ld_password'"; 
   $result = mysqli_query($conn, $select);
   if($ld_email == 'admin@admin.com' && $ld_password == 'admin'){
      header('location:../REMS/index.php');
   }elseif(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $_SESSION['user_id'] = $row['ld_id'];
      header('location:../landlord/index.php?dashboard&id='.$row['ld_id']);

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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body >
   

    <div class="form-container" style="background-color: #272075;">

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
            <input type="submit" name="submit" value="login now" class="btn btn-primary">
        </form>

    </div>

</body>

</html>