<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<?php
include 'includes/connect.php';

$id = $_GET['id'];

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

<body style="background: #272075">
    <div
        style="margin: 2em 25vw auto 25vw; box-shadow: 5px 5px 5px 5px #8888; border-radius: 2em; padding: 4em; background: #fff;">
        <form action="" method="post">
            <div class="form-group">
                <label for="user">User Id</label>
                <input type="text" class="form-control" name="user" placeholder="<?php echo $u_id; ?>" disabled>
            </div>
            <div class="form-group">
                <label for=username>User Name</label>
                <input type="text" class="form-control" name="username" placeholder=<?php echo $user['u_firstname'] . '
                    ' . $user['u_lastname']; ?> disabled>
            </div>
            <div class="form-group">
                <label for="property">Property</label>
                <input type="text" class="form-control" name="property" id="property"
                    placeholder="<?php echo $property; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="checkindate">Checkin Date</label>
                <input type="date" class="form-control" name="checkindate" id="checkindate"
                    value="<?php echo $checkindate; ?>" disabled>
            </div>
            <div class="form-group">
                <label for="checkoutdate">Checkout Date</label>
                <input type="date" class="form-control" name="checkoutdate" id="checkoutdate"
                    value="<?php echo $checkoutdate ?>" disabled>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status" disabled>
                    <option value="1">Pending</option>
                    <option value="2">Approved</option>
                    <option value="0">Available</option>
                </select>
            </div>
            <div class="form-group" style="margin-top: 1em;">
                <input type="submit" value="Back" class="btn btn-danger" name="back" style="margin-left:200px;"
                    onclick=goback()>
            </div>
        </form>
    </div>
    <script>
        function goback() {
            window.open('index.php?bookings');
        }
    </script>
</body>

<?php
    }
}

if (isset($_POST['submit'])) {
    header("Location: index.php?bookings");
}


?>