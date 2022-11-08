<!DOCTYPE html>
<html lang="en">
<?php
include 'config.php';


?>

<head>
    <title>Index</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" defer></script>
    <link rel="stylesheet" href="css/style3.css">

    <style>
        .logo {
            width: 100px;
            border-radius: 100px;
            float: left;
        }
    </style>


    <nav class="navbar navbar-expand-sm navbar-light justify-content-between"
        style="background-color: #e3f2fd; height: 18vh; margin-bottom: 0;">
        <div class="container-fluid">
            <section class="logo" style="position: absolute; left: 0; margin-left: 15px;">
                <a href="../software eng/"><img src="../software eng/rentals/WhatsApp Image 2022-10-04 at 23.06.02.jpeg"
                        class="logo" alt="Shan's clothing store"></a>
                <p>Kodisha properties</p>
            </section>

            <!-- Links -->
            <ul class="nav navbar-nav" style="margin-top: 3em;">
                <li class="nav-item">
                    <a class="nav-link" href="../software eng/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="margin-top: 3em;">
                <?php

                if (isset($_SESSION["user_id"]) && !empty($_SESSION['user_id'])) {
                    $user_id = $_SESSION['user_id'];
                    $username_query = "SELECT u_firstname, u_lastname FROM users WHERE u_id = '$user_id'";
                    $username_result = mysqli_query($conn, $username_query);
                    $username_row = mysqli_fetch_assoc($username_result);
                    $username = $username_row['u_firstname'] . ' ' . $username_row['u_lastname'];
                ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span
                            class="glyphicon glyphicon-user"></span>
                        <?php echo $username ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="home.php">Profile</a></li>
                        <li><a href="booked-property.php">Booked Property</a></li>
                        <li><a href="logout.php">Log out</a></li>
                    </ul>
                </li>


                <?php

                } else { ?>
                <li><a href="../dxf/registerform.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                <li><a href="../dxf/loginform.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a href="../dxf/loginlandlord.php"><span
                            class="glyphic../dxf/loginlandlord.phpon glyphicon-log-in"></span> Login As
                        landlord/Admin</a></li>
                <?php } ?>
            </ul>
        </div>
    </nav>

    </body>

</html>