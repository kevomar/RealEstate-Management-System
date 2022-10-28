<?php

include 'config.php';

if(isset($_POST['submit'])){

   
   $pr_name = mysqli_real_escape_string($conn, $_POST['propertyname']);
   $pr_description = mysqli_real_escape_string($conn, $_POST['propertydescription']);
   $pr_price = mysqli_real_escape_string($conn, $_POST['propertyprice']);
   $pr_type = mysqli_real_escape_string($conn, $_POST['propertytype']);
   $pr_ld = mysqli_real_escape_string($conn, $_POST['ld_id']);
   
   $pr_image = $_FILES['propertyimage']['name'];
   $image_size = $_FILES['propertyimage']['size'];
   $image_tmp_name = $_FILES['propertyimage']['tmp_name'];
   $image_folder = 'uploadsforproperties/'.$pr_image;

   $select = "SELECT pr_name FROM `property` WHERE pr_name = '$pr_name' "; 
   $result = mysqli_query($conn, $select);


   if(mysqli_num_rows($result) > 0){
      $message[] = 'property already exist'; 
   }else{
      
      if($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `property`(pr_name, pr_description, pr_image, pr_price, pr_type, ld_id) VALUES('$pr_name', '$pr_description', '$pr_image','$pr_price', '$pr_type' , '$pr_ld')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:viewproperties.php');
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
   <title>registerproperty</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
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
      <input type="hidden" name="pr_id" id="pr_id" class="box" required >
      
      <input type="text" name="propertyname" id="propertyname" placeholder="enter property name" class="box" required>
      <input type="text" name="propertydescription" id="propertydescription" placeholder="enter property description" class="box" required>
      
      <input type="file" name="propertyimage" id="propertyimage" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="text" name="propertyprice" id="propertyprice" placeholder="enter property price" class="box" required>
      <input type="text" name="propertytype" id="propertytype" placeholder="enter property type" class="box" required>

      <input type="test" name="ld_id" id="ld_id" class="box" required >
      
      
      
      <input type="submit" name="submit" value="register now" class="btn">
      
   </form>

</div>

</body>
</html>