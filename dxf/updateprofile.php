<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">-->

<?php

include 'config.php';
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

   $update_firstname = mysqli_real_escape_string($conn, $_POST['update_firstname']);
   $update_lastname = mysqli_real_escape_string($conn, $_POST['update_lastname']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `users` SET u_firstname = '$update_firstname', u_lastname = '$update_lastname', u_email = '$update_email' WHERE u_id = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `users` SET u_password = '$confirm_pass' WHERE u_id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploads/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `users` SET u_image = '$update_image' WHERE u_id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
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
    <title>update profile</title>

    <!-- custom css file link  -->
    <!--<link rel="stylesheet" href="css/style.css">-->

</head>

<style>
:root {
    --blue: #3498db;
    --dark-blue: #2980b9;
    --red: #e74c3c;
    --dark-red: #c0392b;
    --black: #333;
    --white: #fff;
    --light-bg: #eee;
    --box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
}

* {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
}

*::-webkit-scrollbar {
    width: 10px;
}

*::-webkit-scrollbar-track {
    background-color: transparent;
}

*::-webkit-scrollbar-thumb {
    background-color: var(--blue);
}

.update-profile {
    min-height: 100vh;
    background-color: var(--light-bg);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

.update-profile form {
    padding: 20px;
    background-color: var(--white);
    box-shadow: var(--box-shadow);
    text-align: center;
    width: 700px;
    text-align: center;
    border-radius: 5px;
}

.update-profile form img {
    height: 200px;
    width: 200px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 5px;
}

.update-profile form .flex {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
    gap: 15px;
}

.update-profile form .flex .inputBox {
    width: 49%;
}

.update-profile form .flex .inputBox span {
    text-align: left;
    display: block;
    margin-top: 15px;
    font-size: 17px;
    color: var(--black);
}

.update-profile form .flex .inputBox .box {
    width: 100%;
    border-radius: 5px;
    background-color: var(--light-bg);
    padding: 12px 14px;
    font-size: 17px;
    color: var(--black);
    margin-top: 10px;
}

@media (max-width:650px) {
    .update-profile form .flex {
        flex-wrap: wrap;
        gap: 0;
    }

    .update-profile form .flex .inputBox {
        width: 100%;
    }
}
</style>

<body>

    <div class="update-profile">

        <?php
         $select = "SELECT * FROM `users` WHERE u_id = '$user_id'"; 
         $result = mysqli_query($conn, $select);

         if(mysqli_num_rows($result) > 0){
            $fetch = mysqli_fetch_assoc($result);
         }
         
      ?>
        <form action="" method="post" enctype="multipart/form-data">
            <?php
         if($fetch['u_image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploads/'.$fetch['u_image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
         ?>
            <div class="flex">
                <div class="inputBox">
                    <span>your email :</span>
                    <input type="email" name="update_email" value="<?php echo $fetch['u_email']; ?>" class="box">
                    <span>firstname :</span>
                    <input type="text" name="update_firstname" value="<?php echo $fetch['u_firstname']; ?>" class="box">
                    <span>lastname :</span>
                    <input type="text" name="update_lastname" value="<?php echo $fetch['u_lastname']; ?>" class="box">
                    <span>your phonenumber :</span>
                    <input type="tel" name="update_phonenumber" value="<?php echo $fetch['u_phonenumber']; ?>"
                        class="box">
                    <span>update your pic :</span>
                    <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
                </div>
                <div class="inputBox">
                    <input type="hidden" name="old_pass" value="<?php echo $fetch['u_password']; ?>">
                    <span>old password :</span>
                    <input type="password" name="update_pass" placeholder="enter previous password" class="box">
                    <span>new password :</span>
                    <input type="password" name="new_pass" placeholder="enter new password" class="box">
                    <span>confirm password :</span>
                    <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
                </div>
            </div>
            <input type="submit" value="update profile" name="update_profile" class="btn btn-primary">
            <a href="home.php" class="btn btn-danger">go back</a>
        </form>

    </div>
</body>

</html>