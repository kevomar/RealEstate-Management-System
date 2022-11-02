<?php
require 'includes/connect.php';

$query = "SELECT * FROM appointments";
$run = mysqli_query($conn, $query);
?>
<!--<div class="table-responsive" style="width: 100%;
border: solid 1px red;
">-->
<div style="text-align:center;">
    <form action="insert.php" method="post">
        <button class="btn btn-success" name="add_appointment">
            Add Appointment
        </button>
    </form>
</div>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Property</th>
            <th scope="col">Landlord</th>
            <th scope="col">date</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (mysqli_num_rows($run) > 0) {
            while ($row = mysqli_fetch_array($run)) {
                $get_user = "SELECT u_firstname, u_lastname FROM users WHERE u_id = " . $row['u_id'];
                $run_user = mysqli_query($conn, $get_user);
                $user = mysqli_fetch_array($run_user);

                $get_landlord = "SELECT ld_firstname, ld_lastname FROM landlords WHERE ld_id = " . $row['ld_id'];
                $run_landlord = mysqli_query($conn, $get_landlord);
                $landlord = mysqli_fetch_array($run_landlord);

                $id = $row['ap_id'];
                $property = $row['pr_id'];
                $date = $row['ap_date'];
                $status = $row['ap_status'];
                if ($status == 1) {
                    $status = "Pending";
                } else if ($status == 2) {
                    $status = "Complete";
                } else if ($status == 0) {
                    $status = "Cancelled";
                }
        ?>
        <tr>
            <th scope="row"><?php echo $id; ?></th>
            <td><?php echo $user['u_firstname'] . " " . $user['u_lastname']; ?></td>
            <td><?php echo $property; ?></td>
            <td><?php echo $landlord['ld_firstname'] . " " . $landlord['ld_lastname']; ?></td>
            <td><?php echo $date; ?></td>
            <td><?php echo $status; ?></td>
            <td>
                <button class="btn btn-primary" name="edit_appointment"><a href="editappointments.php?id=
                        <?php echo $id; ?>">Edit</a></button>
            </td>
            <td>
                <button class="btn btn-primary" name="view_appointment"><a href="view_appointments.php?id=
                        <?php echo $id; ?>">View</a></button>
            </td>
            <td>
                <button class="btn btn-danger" name="delete_appointment"><a href="deleteappointment.php?id=
                        <?php echo $id; ?>">Delete</a></button>
            </td>
        </tr>
        <?php
            }
        }

        ?>
    </tbody>
</table>
<!--</div>-->