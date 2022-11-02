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

<body>
    <div class="container">
        <div class="header">
            <h1>Admin</h1>
        </div>
        <div class="content">
            <div class="left-section">
                <button class="btn btn-primary btn-grp">
                    <a href="index.php?dashboard">Dashboard</a>
                </button>
                <button class="btn btn-primary btn-grp">
                    <a href="index.php?users">Users</a>
                </button>
                <button class="btn btn-primary btn-grp">
                    <a href="index.php?landlord">Landlords</a>
                </button>
                <button class="btn btn-primary btn-grp">
                    <a href="index.php?newpropertyview">Propeties</a>
                </button>
                <a href="index.php?appointments"><button class="btn btn-primary btn-grp">Appointments</button></a>
                <a href="index.php?bookings"><button class="btn btn-primary btn-grp">Bookings</button></a>
                <a href="index.php?payments"><button class="btn btn-primary btn-grp">Payments</button></a>
                <a href="#"><button class="btn btn-primary btn-grp">Reviews</button></a>
                <a href="../software eng/"><button class="btn btn-primary btn-grp">Logout</button></a>

            </div>
            <div class="right-section table-responsive">
                <?php
                if (isset($_GET['bookings'])) {
                    include 'bookings.php';
                }
                elseif (isset($_GET['appointments'])) {
                    include 'appointments.php';
                }
                elseif (isset($_GET['payments'])) {
                    include 'payments.php';
                }
                elseif (isset($_GET['dashboard'])) {
                    include 'dashboard.php';
                }
                elseif (isset($_GET['users'])) {
                    include 'users.php';
                }
                elseif (isset($_GET['newpropertyview'])) {
                    include 'newpropertyview.php';
                }
                elseif (isset($_GET['landlord'])) {
                    include 'landlord.php';
                }
                else {
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