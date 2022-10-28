<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<?php

include 'config.php';
if (isset($_POST['add_booking'])) {
    $getuser_ids = "SELECT u_id FROM users";
    $run_user_ids = mysqli_query($conn, $getuser_ids);



    $getproperty_ids = "SELECT pr_id FROM property";
    $run_property_ids = mysqli_query($conn, $getproperty_ids);

    $getlandlord_ids = "SELECT ld_id FROM landlords";
    $run_landlord_ids = mysqli_query($conn, $getlandlord_ids);
?>
<div>
    <form action="" method="post">
        <div class="form-group">
            <label for="user" class="form-label">User Id</label>
            <php>
                <select name="user" id="user" class="form-control">
                    <option value="n/a">Select User</option>
                    <?php
                        if (mysqli_num_rows($run_user_ids) > 0) {
                            while ($row = mysqli_fetch_array($run_user_ids)) {
                                echo "<option value='" . $row['u_id'] . "'>" . $row['u_id'] . "</option>";
                            }
                        }
                        ?>
                </select>
            </php>
        </div>
        <div class="form-group">
            <label for="property" class="form-label">Property Id</label>
            <select name="property" id="property" class="form-control">
                <option value="0">Select Property</option>
                <?php
                    if (mysqli_num_rows($run_property_ids) > 0) {
                        while ($row = mysqli_fetch_array($run_property_ids)) {
                            echo "<option value='" . $row['pr_id'] . "'>" . $row['pr_id'] . "</option>";
                        }
                    }
                    ?>
            </select>
        </div>
        <div class="form-group">
            <label for="landlord" class="form-label">Landlord Id</label>
            <select class="form-control" id="landlord" name="landlord">
                <option value="0">Select Landlord</option>
                <?php
                    if (mysqli_num_rows($run_landlord_ids) > 0) {
                        while ($row = mysqli_fetch_array($run_landlord_ids)) {
                            echo "<option value='" . $row['ld_id'] . "'>" . $row['ld_id'] . "</option>";
                        }
                    }
                    ?>
            </select>
        </div>
        <div class="form-group">
            <label for="checkinDate" class="form-label">Checkin Date</label>
            <input type="date" class="form-control" name="checkinDate">
        </div>
        <div class="form-group">
            <label for="checkoutDate" class="form-label">Checkout Date</label>
            <input type="date" name="checkoutDate" class="form-control">
        </div>
        <div class="form-group">
            <label for="status " class="form-label">Status</label>
            <select class="form-control" name="status" id="status" class="form-control">
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
<?php
}

if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $property = $_POST['property'];
    $landlord = $_POST['landlord'];
    $checkinDate = $_POST['checkinDate'];
    $checkoutDate = $_POST['checkoutDate'];
    $status = $_POST['status'];

    $insert_booking = "INSERT INTO bookings (u_id, pr_id, ld_id, checkin, checkout, status) VALUES ('$user', '$property', '$landlord', '$checkinDate', '$checkoutDate', '$status')";
    $run_insert_booking = mysqli_query($conn, $insert_booking);

    if ($run_insert_booking) {
        echo "<script>alert('Booking has been inserted!')</script>";
        echo "<script>window.open('index.php?view_booking', '_self')</script>";
    }
}

?>