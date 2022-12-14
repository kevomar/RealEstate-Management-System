<?php

@include 'config.php';
session_start();

if(isset($_POST['add_users'])){
   $u_email = $_POST['u_email'];
   $u_firstname = $_POST['u_firstname'];
   $u_lastname = $_POST['u_lastname'];
   $u_phonenumber = $_POST['u_phonenumber'];
   
   $u_password = $_POST['u_password'];
   $u_gender = $_POST['u_gender'];
   $u_dob = $_POST['u_dob'];

   $u_image = $_FILES['u_image']['name'];
   $u_image_tmp_name = $_FILES['u_image']['tmp_name'];
   $u_image_folder = 'images/'.$u_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `users`(u_email,u_firstname,u_lastname, u_phonenumber,u_image,u_password,u_gender,u_dob) VALUES('$u_email','$u_firstname', '$u_lastname','$u_phonenumber','$u_image','$u_password', '$u_gender','$u_dob')") or die('query failed');

   if($insert_query){
      move_uploaded_file($u_image_tmp_name, $u_image_folder);
      $message[] = 'user add succesfully';
   }else{
      $message[] = 'could not add the user';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `users` WHERE u_id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location:users.php');
      $message[] = 'user has been deleted';
   }else{
      header('location:users.php');
      $message[] = 'user could not be deleted';
   };
};

if(isset($_POST['update_users'])){
   $update_u_id = $_POST['update_u_id'];
   $update_u_email = $_POST['update_u_email'];
   $update_u_firstname = $_POST['update_u_firstname'];
   $update_u_lastname = $_POST['update_u_lastname'];
   $update_u_phonenumber = $_POST['update_u_phonenumber'];

   $update_u_password = $_POST['update_u_password'];
   $update_u_gender = $_POST['update_u_gender'];
   $update_u_dob = $_POST['update_u_dob'];


   $update_u_image = $_FILES['update_u_image']['name'];
   $update_u_image_tmp_name = $_FILES['update_u_image']['tmp_name'];
   $update_u_image_folder = 'images/'.$update_u_image;



   $update_query = mysqli_query($conn, "UPDATE `users` SET u_email = '$update_u_email', u_firstname = '$update_u_firstname', u_lastname = '$update_u_lastname', u_phonenumber =  '$update_u_phonenumber', u_image = '$update_u_image',u_password = '$update_u_password',u_gender = '$update_u_gender',u_dob = '$update_u_dob'  WHERE u_id = '$update_u_id'");

   if($update_query){
      move_uploaded_file($update_u_image_tmp_name, $update_u_image_folder);
      $message[] = 'user updated succesfully';
      header('location:users.php');
   }else{
      $message[] = 'user could not be updated';
      header('location:users.php');
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

            <table class="table table-striped">

                <thead>

                    <th>image</th>
                    <th>email</th>
                    <th>firstname</th>
                    <th>lastname</th>
                    <th>phonenumber </th>
                </thead>


                <tbody>
                    <?php
                    $thylandlord = $_SESSION['user_id'];

            //get properties owned by landlord
            $getpropertyquery = "SELECT u_id from bookings where ld_id = $thylandlord";
            $getpropertyresult = mysqli_query($conn, $getpropertyquery);
            $propertyids = array();
            while($row = mysqli_fetch_assoc($getpropertyresult)){
              $theid  = $row['u_id'];
            
                $select_users_query = "SELECT * FROM `users` WHERE u_id = $theid";
            $select_users = mysqli_query($conn, $select_users_query);
            if(mysqli_num_rows($select_users) > 0){
               while($row = mysqli_fetch_assoc($select_users)){
         ?>

                    <tr>
                        <td><img src="images/<?php echo $row['u_image']; ?>" height="100" alt=""></td>
                        <td><?php echo $row['u_email']; ?></td>
                        <td><?php echo $row['u_firstname']; ?></td>
                        <td><?php echo $row['u_lastname']; ?></td>
                        <td><?php echo $row['u_phonenumber']; ?></td>

                        <td>
                        </td>
                        <td>

                        </td>
                    </tr>

                    <?php
            };    
            }else{
               echo "<div class='empty'>no user added</div>";
            };
            }
         ?>
                </tbody>
            </table>

        </section>



    </div>















    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>