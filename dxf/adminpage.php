<?php 
session_start();

include("navbar.php");

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
    <title></title>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Admin</h1>
        </div>
        <div class="content">
            <div class="left-section">
				<button class="btn btn-primary btn-grp">
                    <a href="#">Account Overview</a>
                </button>
                <button class="btn btn-primary btn-grp">
                    <a href="adminpage.php?update">Edit Profile</a>
                </button>
                <button class="btn btn-primary btn-grp" name="add_appointment" >
                    <a href="adminpage.php?appointments">Make appointment</a>
                </button>
                <button class="btn btn-primary btn-grp" name="add_appointment" >
                    <a href="adminpage.php?bookings">Make booking</a>
                </button>
                <button class="btn btn-primary btn-grp">
                    <a href="adminpage.php?viewproperties">View Propeties</a>
                </button>
                
                
                <a href="adminpage.php?payments"><button class="btn btn-primary btn-grp">Payments</button></a>
                

            </div>
            <div class="right-section table-responsive">
                <?php
                if (isset($_GET['update'])) {
                    include 'updateprofile.php';
                }
                if (isset($_GET['bookings'])) {
                    include 'bookings.php';
                }
				if (isset($_GET['appointments'])) {
                    include 'appointments.php';
                }
                if (isset($_GET['payments'])) {
                    include 'payments.php';
                }
                if (isset($_GET['dashboard'])) {
                    include 'dashboard.php';
                }
                ?>

            </div>
        </div>
    </div>
</body>

</html>