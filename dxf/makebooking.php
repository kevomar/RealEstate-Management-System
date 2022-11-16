<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
$getname = "SELECT u_firstname, u_lastname FROM `users` WHERE u_id = '$user_id'";
$result = mysqli_query($conn, $getname);
$row = mysqli_fetch_assoc($result);
$name = $row['u_firstname'] . " " . $row['u_lastname'];


$pr_id = $_GET['pr_id'];
$getproperty = "SELECT pr_name,ld_id FROM `property` WHERE pr_id = '$pr_id'";
$result2 = mysqli_query($conn, $getproperty);
$fetch2 = mysqli_fetch_assoc($result2);
$ld_id = $fetch2['ld_id'];

$getlandlord_ids = "SELECT ld_firstname,ld_lastname FROM landlords WHERE ld_id = '$ld_id'";
$run_landlord_ids = mysqli_query($conn, $getlandlord_ids);
$fetch_landlord_ids = mysqli_fetch_assoc($run_landlord_ids);
$landlord_name = $fetch_landlord_ids['ld_firstname'] . " " . $fetch_landlord_ids['ld_lastname'];
?>
<style>
    body {
        background-color: #272075;
        min-height: 100vh;
        min-width: 100vw;
    }

    .container {
        background-color: white;
        margin: 15vh 25vw auto 25vw;
        max-width: 50vw;
        padding: 3em;
        border-radius: 1em;
    }

    .form-group>label {
        font-weight: bold;
        text-transform: capitalize;
    }
</style>
<div class="container">
    <form action="" method="post">
        <div class="form-group">
            <label for="user" class="form-label">name</label>
            <input type="text" class="form-control" name="user" value="<?php echo $name; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="property" class="form-label">property</label>
            <input type="text" class="form-control" name="property" value="<?php echo $fetch2['pr_name']; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="landlord" class="form-label">landlord</label>
            <input type="text" class="form-control" name="landlord" value="<?php echo $landlord_name; ?>" disabled>
        </div>
        <div class="form-group">
            <label for="Checkin" class="form-label">Checkin Date</label>
            <input type="date" class="form-control" name="Checkin">
        </div>
        <div class="form-group">
            <label for="Checkout" class="form-label">Checkout Date</label>
            <input type="date" class="form-control" name="Checkout">
        </div>
        <div class="form-group" style="margin-top: 1em;">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<?php


if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $property = $_POST['property'];
    $landlord = $_POST['landlord'];
    $checkin = $_POST['Checkin'];
    $checkout = $_POST['Checkout'];
    $status = $_POST['status'];

    //check if booking already exists
    $check_booking = "SELECT * FROM `bookings` WHERE u_id = '$user_id' AND pr_id = '$pr_id' AND ld_id = '$ld_id'";
    $run_check_booking = mysqli_query($conn, $check_booking);
    $booking = mysqli_fetch_assoc($run_check_booking);
    $date = $booking['checkin'];
    $count = mysqli_num_rows($run_check_booking);
    if ($count > 0) {
        echo "<script>alert('Booking already scheduled for $date')</script>";
        echo "<script>window.open('./dxf/listings.php','_self')</script>";
    }

    $insert_booking = "INSERT INTO bookings (u_id, pr_id, ld_id, checkin, checkout,status) VALUES ('$user_id', '$pr_id', '$ld_id', '$checkin','$checkout', 0)";
    $run_appointment = mysqli_query($conn, $insert_booking);

    if ($run_appointment) {
        echo "<script>alert('House has been booked!')</script>";
        echo "<script>window.open('adminpage.php', '_self')</script>";
    }
}


?>