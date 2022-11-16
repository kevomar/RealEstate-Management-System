<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Admin</title>
</head>
<style>
    * {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }

    .listings {
        background-color: transparent;
        border: none;
        color: white;
        margin-top: 1em;
        margin-bottom: 1em;
        width: 100%;
        height: 5vh;
        font-size: 1.5em;

    }

    .listings:hover {
        background-color: #1e3d75;
    }

    .left-section {
        background-color: #272075;
        margin-left: 0;
    }

    .container {
        margin-left: 0;
        padding-left: 0;
    }

    .content {
        margin-left: 0;
        padding-left: 0;
    }
</style>

<body>
    <!--<!DOCTYPE html>
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

        .nav-link{
            color: white;
        }
        a{color: white;}
    </style>


    <nav class="navigation navigation-expand-sm navigation-light justify-content-between"
        style="background-color: #272075; height: auto; margin-bottom: 0; color: white;">
        <div class="container-fluid">
            <section class="logo" style="position: absolute; left: 0; margin-left: 15px;">
                <a href="../software eng/"><img src="../software eng/rentals/WhatsApp Image 2022-10-04 at 23.06.02.jpeg"
                        class="logo" alt="Shan's clothing store"></a>
                <p>Kodisha properties</p>
            </section>

            Links 
            <ul class="nav navigation-nav" style="margin-top: 3em;">
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
            <ul class="nav navigation-nav navigation-right" style="margin-top: 3em;">
                <?php

                /*if (isset($_SESSION["user_id"]) && !empty($_SESSION['user_id'])) {
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
                        <li><a href="../dxf/adminpage.php?">Profile</a></li>
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
                <?php } */?>
            </ul>
        </div>
    </nav>

    </body>

</html>-->


<!--navigation
                -->
<html>
    <head>
        <title>Index</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" defer></script>
       <link rel="stylesheet" href="css/style3.css">

        <style> 
            *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            }
            /*body {
            font-family: cursive;
            }*/
            a {
            text-decoration: none;
            }
            li {
            list-style: none;
            }
            .navigation {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 20px;
                background-color: #272075;
                color: #fff;
                }
                .nav-links a {
                color: #fff;
                }
                /* LOGO */
                .logo {
                font-size: 32px;
                float: left;
                }
                /* navigation MENU */
                .menu {
                display: flex;
                gap: 1em;
                font-size: 18px;
                }
                .menu li:hover {
                background-color: #272075;
                border-radius: 5px;
                transition: 0.3s ease;
                }
                .menu li {
                padding: 5px 14px;
                }
                /* DROPDOWN MENU */
                .services {
                position: relative; 
                }
                .dropdown {
                background-color: rgb(1, 139, 139);
                padding: 1em 0;
                position: absolute; /*WITH RESPECT TO PARENT*/
                display: none;
                border-radius: 8px;
                top: 35px;
                }
                .dropdown li + li {
                margin-top: 10px;
                }
                .dropdown li {
                padding: 0.5em 1em;
                width: 8em;
                text-align: center;
                }
                .dropdown li:hover {
                background-color: #272075;
                }
                .services:hover {
                display: block;
                }
                
        </style>


    </head>

    <body>
        <!--<div class="navigationar">
            <div class="image">

            </div>
            <div class="nav">
                <ul>
                    <li><a href="../software eng/">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>

                </ul>
        </div>-->

        <nav class="navigation">
     <!-- LOGO -->
     <div class="logo">Kodisha</div>
     <!-- NAVIGATION MENU -->
     <ul class="nav-links">
       <div class="menu">
         <li><a href="/">Home</a></li>
         <li><a href="/">About</a></li>
         <li class="services">
           <a href="/">Services</a>
           <!-- DROPDOWN MENU -->

         </li>
         <li><a href="/">Pricing</a></li>

         <?php
            //check is user is logged in
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
                $username_query = "SELECT u_firstname, u_lastname FROM users WHERE u_id = '$user_id'";
                $username_result = mysqli_query($conn, $username_query);
                $username_row = mysqli_fetch_assoc($username_result);
                $username = $username_row['u_firstname'] . ' ' . $username_row['u_lastname'];
         ?>
                  <li><a href="../software eng/">Logout</a></li>
                            <li class="">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span
                            class="glyphicon glyphicon-user"></span>
                        <?php echo $username ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="../dxf/adminpage.php?">Profile</a></li>
                        <li><a href="booked-property.php">Booked Property</a></li>
                        <li><a href="logout.php">Log out</a></li>
                    </ul>
                </li>
           <?php
            } else {
              ?>
         <li><a href="../dxf/loginform.php">Login</a></li>
        <li><a href="../dxf/registerform.php">Register</a></li>
        <li><a href="../dxf/loginlandlord.php">Login As landlord/Admin</a></li>
       </div>
       <?php
            }
            ?>
     </ul>
        </nav>
    <div class="container" style="margin-left: 0; padding-left: 0;">
        <div class="header">

        </div>
        <div class="content">
            <div class="left-section">
                <a href="index.php?dashboard"><button class="listings">Dashboard</button></a>
                <a href="index.php?users"><button class="listings">Users</button></a>
                <a href="index.php?landlord"><button class="listings">Landlords</button></a>
                <a href="index.php?newpropertyview"><button class="listings">Properties</button></a>
                <a href="index.php?appointments"><button class="listings">Appointments</button></a>
                <a href="index.php?bookings"><button class="listings">Bookings</button></a>
                <a href="index.php?payments"><button class="listings">Payments</button></a>
                <a href="../software eng/"><button class="listings">Logout</button></a>
            </div>
            <div class="right-section table-responsive">
                <?php
                if (isset($_GET['bookings'])) {
                    include 'bookings.php';
                } elseif (isset($_GET['appointments'])) {
                    include 'appointments.php';
                } elseif (isset($_GET['payments'])) {
                    include 'payments.php';
                } elseif (isset($_GET['dashboard'])) {
                    include 'dashboard.php';
                } elseif (isset($_GET['users'])) {
                    include 'users.php';
                } elseif (isset($_GET['newpropertyview'])) {
                    include 'newpropertyview.php';
                } elseif (isset($_GET['landlord'])) {
                    include 'landlord.php';
                } else {
                    include 'dashboard.php';
                }
                ?>

            </div>
        </div>
    </div>
</body>

</html>


<!--
-add/remove/edit/view client information(validate)
-insert/edit/delete/view property information
-add/remove/edit/view landlord information
-check in & checkout validation
-check client reviews
-view payments & generate receipts
-view/delete appointments
-view/assign work to maintenance crew
-->