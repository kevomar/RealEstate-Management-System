<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<?php

include 'includes/connect.php';
if (isset($_POST['add_appointment'])) {
    $getuser_ids = "SELECT u_id FROM users";
    $run_user_ids = mysqli_query($conn, $getuser_ids);



    $getproperty_ids = "SELECT pr_id FROM property";
    $run_property_ids = mysqli_query($conn, $getproperty_ids);

    $getlandlord_ids = "SELECT ld_id FROM landlords";
    $run_landlord_ids = mysqli_query($conn, $getlandlord_ids);
?>

<style>
    body {
        background: #272075;
    }

    .card {
        margin-left: 25vw;
        margin-right: 25vw;
        margin-top: 2em;
        padding: 4em;
    }
</style>
<div class="card">
    <h3 style="text-align:center;">Add appointment</h3>
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
            <label for="AppointmentDate" class="form-label">Appointment Date</label>
            <input type="date" class="form-control" name="AppointmentDate">
        </div>
        <div class="form-group">
            <label for="status " class="form-label">Status</label>
            <select class="form-control" name="status" id="status" class="form-control">
                <option value="1">Pending</option>
                <option value="2">Complete</option>
                <option value="0">Cancelled</option>
            </select>
        </div>
        <div class="form-group" style="margin-top: 1em;">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <input type="submit" value="Back" class="btn btn-danger" name="back" style="margin-left:200px;"
                onclick=goback()>
        </div>
    </form>
</div>
<script>
    function goback() {
        window.open('index.php?appointments');
    }
</script>
<?php
}

if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $property = $_POST['property'];
    $landlord = $_POST['landlord'];
    $AppointmentDate = $_POST['AppointmentDate'];
    $status = $_POST['status'];

    $insert_appointment = "INSERT INTO appointments (u_id, pr_id, ld_id, ap_date, ap_status) VALUES ('$user', '$property', '$landlord', '$AppointmentDate', '$status')";
    $run_appointment = mysqli_query($conn, $insert_appointment);

    if ($run_appointment) {
        echo "<script>alert('Appointment has been added!')</script>";
        echo "<script>window.open('index.php?appointments', '_self')</script>";
    }
}

?>