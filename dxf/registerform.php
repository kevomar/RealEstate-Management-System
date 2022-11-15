<?php

include 'config.php';

if(isset($_POST['submit'])){

   $u_email = mysqli_real_escape_string($conn, $_POST['email']);
   $u_firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
   $u_lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
   $u_phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
   $u_password = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $u_gender = mysqli_real_escape_string($conn, $_POST['gender']);
   $u_dob = mysqli_real_escape_string($conn, $_POST['Dob']);
   $u_image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploads/'.$u_image;

   $select = "SELECT u_email,u_password FROM `users` WHERE u_email = '$u_email' AND u_password = '$u_password'"; 
   $result = mysqli_query($conn, $select);


   if(mysqli_num_rows($result) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($u_password != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `users`(u_email, u_firstname, u_lastname, u_phonenumber, u_image, u_password, u_gender, u_Dob) VALUES('$u_email', '$u_firstname', '$u_lastname', '$u_phonenumber' , '$u_image','$u_password', '$u_gender', '$u_dob')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:loginform.php');
         }else{
            $message[] = 'registeration failed!';
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
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

    <title>register</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<style>
* {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}

.form-container{
   background-color: #272075;
}
</style>

<body>

    <div class="form-container">

        <form action="" method="post" enctype="multipart/form-data">
            <h3>register now</h3>
            <!--<?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>-->
            <input type="hidden" name="uid" id="uid" class="box" required>
            <input type="email" name="email" id="email" placeholder="enter email" class="box" required>
            <input type="text" name="firstname" id="firstname" placeholder="enter first name" class="box" required>
            <input type="text" name="lastname" id="lastname" placeholder="enter last name" class="box" required>
            <input type="tel" name="phonenumber" id="phonenumber" placeholder="enter phone number" class="box" required>
            <input type="file" name="image" id="image" class="box" accept="image/jpg, image/jpeg, image/png">
            <input type="password" name="password" id="password" placeholder="enter password" class="box" required>
            <input type="password" name="cpassword" placeholder="confirm password" class="box" required>
            <p>gender</p>
            <input type="radio" name="gender" value="male" required>Male
            <input type="radio" name="gender" value="female" required>Female
            <input type="date" name="Dob" id="Dob" placeholder="enter date of birth" class="box" required>
            <input type="submit" name="submit" value="register now" class="btn btn-primary">
            <p>already have an account? <a href="loginform.php" class="btn btn-danger" style="text-decoration: none; color: white;">login now</a></p>
        </form>

    </div>

</body>

</html>