<?php

@include 'config.php';

if(isset($_POST['add_landlordpage'])){

   $ld_email = $_POST['ld_email'];
   $ld_firstname = $_POST['ld_firstname'];
   $ld_lastname = $_POST['ld_lastname'];
   $ld_phonenumber = $_POST['ld_phonenumber'];
   $ld_password = $_POST['ld_password'];
   $ld_gender = $_POST['ld_gender'];
   $ld_dob = $_POST['ld_dob'];
   $ld_bankaccountno = $_POST['ld_bankaccountno'];
   $ld_address = $_POST['ld_address'];
  
   
   $ld_image = $_FILES['ld_image']['name'];
   $ld_image_tmp_name = $_FILES['ld_image']['tmp_name'];
   $ld_image_folder = 'images/'.$ld_image;


   


   $insert_query = mysqli_query($conn, "INSERT INTO `landlords`(ld_email,ld_firstname,ld_lastname,ld_phonenumber,ld_image,ld_password,ld_gender, ld_dob,ld_bankaccountno,ld_address) VALUES('$ld_email','$ld_firstname','$ld_lastname', '$ld_phonenumber','$ld_image' , '$ld_password', '$ld_gender','$ld_dob','$ld_bankaccountno','$ld_address')") or die('query failed');

   if($insert_query){
      move_uploaded_file($ld_image_tmp_name, $ld_image_folder);
      $message[] = 'user add succesfully';
   }else{
      $message[] = 'could not add the user';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `landlords` WHERE ld_id = '$delete_id' ") or die('query failed');
   if($delete_query){
      header('location:landlordAdd.php');
      $message[] = 'user has been deleted';
   }else{
      header('location:landlordAdd.php');
      $message[] = 'user could not be deleted';
   };
};

if(isset($_POST['update_landlord'])){
   $update_ld_id = $_POST['update_ld_id'];
   $update_ld_email = $_POST['update_ld_email'];

   $update_ld_firstname = $_POST['update_ld_firstname'];
   $update_ld_lastname = $_POST['update_ld_lastname'];
   $update_ld_phonenumber = $_POST['update_ld_phonenumber'];

   $update_ld_image = $_FILES['update_ld_image']['name'];
   $update_ld_image_tmp_name = $_FILES['update_ld_image']['tmp_name'];
   $update_ld_image_folder = 'images/'.$update_ld_image;


   $update_ld_password = $_POST['update_ld_password'];
   $update_ld_gender = $_POST['update_ld_gender'];
   $update_ld_dob = $_POST['update_ld_dob'];
   $update_ld_bankaccountno = $_POST['update_ld_bankaccountno'];
   $update_ld_address = $_POST['update_ld_address'];
  
   

   $update_query = mysqli_query($conn, "UPDATE `landlords` SET ld_email = '$update_ld_email', ld_firstname = '$update_ld_firstname', ld_lastname = '$update_ld_lastname', ld_phonenumber = '$update_ld_phonenumber',ld_image = '$update_ld_image', ld_password = '$update_ld_password', ld_gender = '$update_ld_gender', ld_dob = '$update_ld_dob ' , ld_bankaccountno = '$update_ld_bankaccountno',ld_address = '$update_ld_address' WHERE ld_id = '$update_ld_id'");

   if($update_query){
      move_uploaded_file($update_ld_image_tmp_name, $update_ld_image_folder);
      $message[] = 'user updated succesfully';
      header('location:landlordAdd.php');

   }else{
      $message[] = 'user could not be updated';
      header('location:landlordAdd.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>



<div class="container">

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>add landlord page</h3>
   <input type="text" name="ld_email" placeholder="enter your email" class="box" required>
   <input type="text" name="ld_firstname" placeholder="enter your first names" class="box" required>
   <input type="text" name="ld_lastname" placeholder="enter your last  name" class="box" required>
   <input type="number" name="ld_phonenumber" min="0" placeholder="enter your number" class="box" required>
   <input type="file" name="ld_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <input type="text" name="ld_password" min="0" placeholder="enter your password" class="box" required>
   <p>What is your gender?</p>
   <input type="radio" name="ld_gender" value="male"  required>Male
   <input type="radio" name="ld_gender" value="female"  required>Female
   
   <input type="date" name="ld_dob" id="Dob" placeholder="enter date of birth" class="box" required>

   <input type="text" name="ld_bankaccountno" placeholder="enter your bankaccountno" class="box" required>
   <input type="text" name="ld_address" placeholder="enter your address" class="box" required>

   <input type="submit" value="add the user" name="add_landlordpage" class="btn">
</form>

</section>
  <!--
<section class="display-landlord-table">

   <table>

     <thead>
         <th>user image</th>
         <th>Full names</th>
         <th>phone number</th>
          <th>Email</th>
         <th>action</th>
      </thead>     -->
      <section class="display-product-table">

   <table>

      <thead>
         <th>ld_image</th>
         <th>ld_email</th>
         <th>ld_firstname</th>
         <th>ld_lastname</th>
         <th>ld_phonenumber </th>
         <th>ld_address</th>
         <th>action</th>
      </thead>


      <tbody>
         <?php
         
            $select_landlords = mysqli_query($conn, "SELECT * FROM `landlords`");
            if(mysqli_num_rows($select_landlords) > 0){
               while($row = mysqli_fetch_assoc($select_landlords)){
         ?>

         <tr>
            <td><img src="images/<?php echo $row['ld_image']; ?>" height="10" alt=""></td>
           <td><?php echo $row['ld_email']; ?></td>
            <td><?php echo $row['ld_firstname']; ?></td>
            <td><?php echo $row['ld_lastname']; ?></td>
            <td><?php echo $row['ld_phonenumber']; ?></td>
            <td><?php echo $row['ld_address']; ?></td>
            <td>
               <a href="landlordAdd.php?delete=<?php echo $row['ld_id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="landlordAdd.php?edit=<?php echo $row['ld_id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no user added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `landlords` WHERE ld_id = '$edit_id'");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="images/<?php echo $fetch_edit['ld_image']; ?>" height="20" alt="">
      <input type="hidden" name="update_ld_id" value="<?php echo $fetch_edit['ld_id']; ?>">
      <input type="text" class="box" required name="update_ld_email" value="<?php echo $fetch_edit['ld_email']; ?>">
      <input type="text" class="box" required name="update_ld_firstname" value="<?php echo $fetch_edit['ld_firstname']; ?>">
      <input type="text" class="box" required name="update_ld_lastname" value="<?php echo $fetch_edit['ld_lastname']; ?>">
      <input type="number" min="0" class="box" required name="update_ld_phonenumber" value="<?php echo $fetch_edit['ld_phonenumber']; ?>">
      <input type="file" class="box" required name="update_ld_image" accept="image/png, image/jpg, image/jpeg">
      <input type="text" class="box" required name="update_ld_password" value="<?php echo $fetch_edit['ld_password']; ?>">
      <input type="text" class="box" required name="update_ld_gender" value="<?php echo $fetch_edit['ld_gender']; ?>">
      <input type="text" class="box" required name="update_ld_dob" value="<?php echo $fetch_edit['ld_dob']; ?>">
      <input type="text" class="box" required name="update_ld_bankaccountno" value="<?php echo $fetch_edit['ld_bankaccountno']; ?>">
      <input type="text" class="box" required name="update_ld_address" value="<?php echo $fetch_edit['ld_address']; ?>">
      <input type="submit" value="update the user" name="update_landlord" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="option-btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>

</div>















<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>