<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'rems');

// When form submitted, insert values into the database.
if (isset($_POST['submit'])) {
    $ld_firstname = $_POST['Fname'];
    $ld_lastname = $_POST['Sname'];
    $ld_email = $_POST['Email'];
    $ld_phonenumber = $_POST['Phone'];
    $ld_image = $_FILES["image"]['name'];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "../dxf/uploads/" . $ld_image;
    $ld_password = $_POST['password'];
    $ld_dob = $_POST['DOB'];
    $ld_bankaccountno = $_POST['BAN'];
    $ld_address = $_POST['address'];
    $ld_gender = $_POST['gender'];

    $pro = "INSERT INTO `landlords`( ld_firstname, ld_lastname, ld_email, ld_phonenumber, ld_image,ld_dob , ld_bankaccountno, ld_password, ld_address, ld_gender) VALUES('$ld_firstname','$ld_lastname','$ld_email','$ld_phonenumber','$ld_image','$ld_dob','$ld_bankaccountno','$ld_password','$ld_address','$ld_gender')";
    $result = mysqli_query($conn, $pro);
    if ($result) {
        move_uploaded_file($tempname, $folder);
        echo "<script>alert('Registration Successful')</script>";
        header('location:index.php?landlord');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <link rel="stylesheet" href="rlstyle.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<style>
    body {
        background: #272075;
    }

    * {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }

    .card {
        margin-left: 25vw;
        margin-right: 25vw;
        margin-top: 2em;
        padding: 4em;
    }

    span {
        font-weight: bold;
        display: block;
        width: 100%;
    }
</style>

<body>

    <div class="Container">
        <div class="card">
            <h3>Register Now</h3>
            <form action="" method="post" enctype="multipart/form-data">


                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo '<span class="error-msg">' . $error . '</span>';
                    }
                    ;
                }
                ;
                ?>

                <div class="inputbox">
                    <span>First name</span>
                    <input type="text" name="Fname" Id="Fname" required="required">
                </div>
                <br><br>
                <div class="inputbox">
                    <span>Second name</span>
                    <input type="text" name="Sname" Id="Sname" required="required">
                </div>
                <br><br>
                <div class="inputbox">
                    <span>Email</span>
                    <input type="text" name="Email" Id="Email" required="required">
                </div>

                <br><br>
                <div class="inputbox">
                    <span>Phone numbers</span>
                    <input type="tel" name="Phone" Id="Phone" required="required">
                </div>

                <br><br>
                <div class="inputbox">
                    <span>Date of Birth</span>
                    <input type="date" name="DOB" Id="DOB" required="required">
                </div>
                <br><br>
                <div class="inputbox">
                    <span>Address</span>
                    <input type="Text" name="address" Id="address" required="required">
                </div>
                <br><br>
                <div class="inputbox">
                    <span>Bank Account Number</span>
                    <input type="number" name="BAN" Id="BAN" required="required">
                </div>
                <br><br>
                <div class="inputbox">
                    <span>Password</span>
                    <input type="password" name="password" Id="password" required="required">
                </div>
                <br><br>
                <div class="inputbox">
                    <span>Profile Photo</span>
                    <input id="image" type="file" name="image" required="required" capture>
                </div>
                <br><br>
                <div class="inputbox">
                    <span>Gender</span>

                    <select name="gender" id="gender">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
                <br><br>
                <div>
                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
                </div>
            </form>


            <div>
                <p>Already have an account? <a href="../dxf/loginlandlord.php">Login now</a></p>
            </div>


        </div>

</body>

</html>