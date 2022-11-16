<?php session_start();
$_SESSION['user_id'] = $$_GET['id'];;
//$landlordid = $_GET['id'];
?>
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
    <?php //include('../dxf/navbar.php');?>
    <div class="container" style="margin-left: 0; padding-left: 0;">
        <div class=" header">
     
    </div>
    <div class="content">
        <div class="left-section">
        <?php //echo '<script>alert("'.$landlordid.'")</script>';?> 
            <a href="index.php?dashboard<?php //echo $landlordid ?>"><button class="listings">Dashboard</button></a>


            <a href="index.php?users<?php //echo $landlordid ?>"><button class="listings">Tenants</button></a>


            <a href="index.php?newpropertyview<?php //echo $landlordid ?>"><button class="listings">Properties</button></a>

            <a href="index.php?appointment=<?php// echo $landlordid ?>"><button class="listings">Appointments</button></a>
            <a href="index.php?bookings<?php //echo $landlordid ?>"><button class="listings">Bookings</button></a>
            <a href="index.php?payments<?php //echo $landlordid ?>"><button class="listings">Payments</button></a>
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