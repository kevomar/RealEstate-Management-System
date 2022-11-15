<style>
* {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
}
</style>

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

    <style>
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
    .containe{
        margin-left: 0;
        padding-left: 0;
    }
    .content{
        margin-left: 0;
        padding-left: 0;
    }
    </style>
    <div class="containe" style="margin-top: 0; margin-left: 0;">
        <div class=" content" style="margin-top: 0; margin-left: 0;">
            <div class="left-section" style="display: flex; flex-direction: column; text-align: center; margin-left: 0;">

                <a href="adminpage.php?dashboard">
                    <button class="listings">Dashboard
                    </button>
                </a>


                <a href="adminpage.php?update">
                    <button class="listings">Edit Profile
                    </button>
                </a>


                <!--<a href="adminpage.php?viewproperties">
                    <button class="listings">View Propeties
                    </button>
                </a>-->



                <a href="adminpage.php?payments">
                    <button class="listings">Payments
                    </button>
                </a>


            </div>
            <div class="right-section table-responsive">
                <?php
                if (isset($_GET['update'])) {
                    include 'updateprofile.php';
                }
                elseif (isset($_GET['bookings'])) {
                    include 'bookings.php';
                }
				elseif (isset($_GET['makeappointments'])) {
                    include 'makeappointments.php';
                }
                elseif (isset($_GET['payments'])) {
                    include 'payments.php';
                }
                elseif (isset($_GET['dashboard'])) {
                    include 'dashboard.php';
                }
                /*elseif(isset($_GET['viewproperties'])){
                    include 'viewproperties.php';
                }*/
                else {
                    include 'dashboard.php';
                }
                ?>

            </div>
        </div>
    </div>
</body>

</html>