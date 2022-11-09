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
    <div class="container" style="margin-left: 0; padding-left: 0;">
        <div class="header">
            <h1>Admin</h1>
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
                <a href="#"><button class="listings">Reviews</button></a>
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