<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:loginform.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:loginform.php');
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
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class=" container">

        <div class="profile">
            <?php
         $select = "SELECT * FROM `users` WHERE u_id = '$user_id'"; 
         $result = mysqli_query($conn, $select);

         if(mysqli_num_rows($result) > 0){
            $fetch = mysqli_fetch_assoc($result);
         }
         if($fetch['u_image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploads/'.$fetch['u_image'].'">';
         }
      ?>
            <h3><?php echo $fetch['u_firstname']; ?></h3>
            <a href="../dxf/updateprofile.php" class="btn">update profile</a>
            <a href="../dxf/home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
            <p>new <a href="../dxf/loginform.php">login</a> or <a href="registerform.php">register</a></p>
        </div>

    </div>

</body>

</html>

<?php 

include("viewproperties.php");

 ?>