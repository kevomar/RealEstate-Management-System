<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<?php
include 'includes/connect.php';

$id  = $_GET['id'];

$query = "SELECT * FROM bookings WHERE bk_id = $id";
$run = mysqli_query($conn, $query);



if (mysqli_num_rows($run) > 0) {
    while ($row = mysqli_fetch_array($run)) {
        $property = $row['pr_id'];
        $checkindate = $row['checkin'];
        $htmldate = strtotime($checkindate);
        $checkoutdate = $row['checkout'];
        $status = $row['status'];
        $u_id = $row['u_id'];

        $get_user = "SELECT u_firstname, u_lastname FROM users WHERE u_id = " . $u_id;
        $run_user = mysqli_query($conn, $get_user);
        $user = mysqli_fetch_array($run_user);

?>
<style>
body {
    background: grey;
}

.card {
    margin-left: 25vw;
    margin-right: 25vw;
    margin-top: 2em;
    padding: 4em;
}
</style>

<body>
    <div class="card">
        <form action="" method="post">
            <div class="form-group">
                <label for="user">User Id</label>
                <input type="text" class="form-control" name="user" placeholder="<?php echo $u_id; ?>" disabled>
            </div>
            <div class="form-group">
                <label for=username>User Name</label>
                <input type="text" class="form-control" name="username"
                    placeholder=<?php echo $user['u_firstname'] . ' ' . $user['u_lastname']; ?> disabled>
            </div>
            <div class="form-group">
                <label for="property">Property</label>
                <input type="text" class="form-control" name="property" id="property"
                    placeholder="<?php echo $property; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="checkindate">Checkin Date</label>
                <input type="date" class="form-control" name="checkindate" id="checkindate"
                    value="<?php echo $checkindate; ?>">
            </div>
            <div class="form-group">
                <label for="checkoutdate">Checkout Date</label>
                <input type="date" class="form-control" name="checkoutdate" id="checkoutdate"
                    value="<?php echo $checkoutdate  ?>">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status">
                    <option value="1">Pending</option>
                    <option value="2">Approved</option>
                    <option value="0">Available</option>
                </select>
            </div>
            <div class="form-group" style="margin-top: 1em;">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
</body>

<?php
    }
}

if (isset($_POST['submit'])) {
    $property = $_POST['property'];
    $checkindate = $_POST['checkindate'];
    $checkoutdate = $_POST['checkoutdate'];
    $status = $_POST['status'];

    $query = "UPDATE bookings SET  checkin = '$checkindate', checkout = '$checkoutdate', status = '$status' WHERE bk_id = $id";
    $run = mysqli_query($conn, $query);

    if ($run) {
        echo "<script>alert('Booking Updated Successfully')</script>";
        echo "<script>window.open('index.php?bookings', '_self')</script>";
    } else {
        echo "<script>alert('Booking Update Failed')</script>";
    }
}


?>