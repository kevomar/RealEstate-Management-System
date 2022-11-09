<?php

include 'config.php';

if (isset($_POST['submit'])) {

    $u_email = mysqli_real_escape_string($conn, $_POST['email']);
    $u_firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $u_lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $u_phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $u_password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $u_gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $u_dob = mysqli_real_escape_string($conn, $_POST['Dob']);
    $u_image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../dxf/uploads/' . $u_image;

    $select = "SELECT u_email,u_password FROM `users` WHERE u_email = '$u_email' AND u_password = '$u_password'";
    $result = mysqli_query($conn, $select);


    if (mysqli_num_rows($result) > 0) {
        $message[] = 'user already exist';
    } else {
        if ($u_password != $cpass) {
            $message[] = 'confirm password not matched!';
        } elseif ($image_size > 2000000) {
            $message[] = 'image size is too large!';
        } else {
            $insert = mysqli_query($conn, "INSERT INTO `users`(u_email, u_firstname, u_lastname, u_phonenumber, u_image, u_password, u_gender, u_Dob) VALUES('$u_email', '$u_firstname', '$u_lastname', '$u_phonenumber' , '$u_image','$u_password', '$u_gender', '$u_dob')") or die('query failed');

            if ($insert) {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'registered successfully!';
                header('location:index.php?users');
            } else {
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
    <title>register</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<style>
    * {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }

    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap");
    /*{
	font-family: 'Poppins' , sans-serif;
	margin: 0; padding: 0;
	box-sizing: border-box;
	outline: none; border: none;
	text-decoration: none;
}*/

    :root {
        --blue: #3498db;
        --dark-blue: #2980b9;
        --red: #e74c3c;
        --dark-red: #c0392b;
        --black: #333;
        --white: #fff;
        --light-bg: #eee;
        --box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    * {
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

    .delete-btn {
        width: 100%;
        border-radius: 5px;
        padding: 10px 30px;
        color: var(--white);
        text-align: center;
        cursor: pointer;
        font-size: 20px;
        margin-top: 10px;
    }

    .btn:hover {
        background-color: var(--dark-blue);
    }

    .delete-btn {
        background-color: var(--red);
    }

    .delete-btn:hover {
        background-color: var(--dark-red);
    }

    .message {
        margin: 10px 0;
        width: 100%;
        border-radius: 5px;
        padding: 10px;
        text-align: center;
        background-color: var(--red);
        color: var(--white);
        font-size: 20px;
    }

    .form-container {
        min-height: 100vh;
        background-color: var(--light-bg);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .form-container form {
        padding: 20px;
        background-color: var(--white);
        box-shadow: var(--box-shadow);
        text-align: center;
        width: 500px;
        border-radius: 5px;
    }

    .form-container form h3 {
        margin-bottom: 10px;
        font-size: 30px;
        color: var(--black);
        text-transform: uppercase;
    }

    .form-container form .box {
        width: 100%;
        border-radius: 5px;
        padding: 12px 14px;
        font-size: 18px;
        color: var(--black);
        margin: 10px 0;
        background-color: var(--light-bg);
    }

    .form-container form p {
        margin-top: 15px;
        font-size: 20px;
        color: var(--black);
    }

    .form-container form p a {
        color: var(--red);
    }

    .form-container form p a:hover {
        text-decoration: underline;
    }

    .container {
        min-height: 100vh;
        background-color: var(--light-bg);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .container .profile {
        padding: 20px;
        background-color: var(--white);
        box-shadow: var(--box-shadow);
        text-align: center;
        width: 400px;
        border-radius: 5px;
    }

    .container .profile img {
        height: 150px;
        width: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 5px;
    }

    .container .profile h3 {
        margin: 5px 0;
        font-size: 20px;
        color: var(--black);
    }

    .container .profile p {
        margin-top: 20px;
        color: var(--black);
        font-size: 20px;
    }

    .container .profile p a {
        color: var(--red);
    }

    .container .profile p a:hover {
        text-decoration: underline;
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
        width: 200p;
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

    @media (max-width: 650px) {
        .update-profile form .flex {
            flex-wrap: wrap;
            gap: 0;
        }

        .update-profile form .flex .inputBox {
            width: 100%;
        }
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 100%;
        min-width: 100%;
        margin: auto;
        text-align: center;
        font-family: arial;
        display: inline;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        opacity: 0.8;
    }

    /*.container {
  padding: 2px 16px;
}*/

    .image {
        min-width: 100%;
        min-height: 200px;
        max-width: 100%;
        max-height: 200px;
    }

    .bg {
        /* The image used */
        background-image: url("images/carousel.png");

        /* Full height */
        height: 60%;

        /* Center and scale the image nicely */
        background-position: bottom;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .fa {
        padding: 20px;
        font-size: 30px;
        text-align: left;
        text-decoration: none;
        margin: 5px 2px;
    }

    .fa:hover {
        opacity: 0.7;
    }

    .fa-facebook {
        background: #3b5998;
        color: white;
    }

    .fa-linkedin {
        background: #007bb5;
        color: white;
    }

    .active-cyan-3 input[type="text"] {
        border: 1px solid #4dd0e1;
        box-shadow: 0 0 0 1px #4dd0e1;
    }

    .form-container {
        /*background-image: url('../REMS/images/image3.jpeg');
        background-size: contain;
        image-rendering: pixelated;*/
        background-color: #272075;
    }
</style>

<body>

    <div class="form-container">
        <form class="form" action="" method="post" enctype="multipart/form-data">
            <h3>register User</h3>
            <!--<?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class="message">' . $message . '</div>';
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
            <input type="radio" name="gender" value="m" required>Male
            <input type="radio" name="gender" value="f" required>Female
            <input type="date" name="Dob" id="Dob" placeholder="enter date of birth" class="box" required>
            <input type="submit" name="submit" value="register now" class="btn btn-primary">
        </form>
    </div>
</body>

</html>