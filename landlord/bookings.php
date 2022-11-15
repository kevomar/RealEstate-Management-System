<?php
require 'includes/connect.php';
session_start();

$query = "SELECT * FROM bookings WHERE ld_id = " . $_SESSION['user_id'];
$run = mysqli_query($conn, $query);
?>
<!--<div class="centre" style="margin-left: 15vw; margin-top: 5em; width: 100%; border: solid 1px red;">-->
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Property</th>
            <th scope="col">Landlord</th>
            <th scope="col">checkin date</th>
            <th scope="col">checkout date</th>
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

                $id = $row['bk_id'];
                $property = $row['pr_id'];
                $checkindate = $row['checkin'];
                $checkoutdate = $row['checkout'];
                $status = $row['status'];
                if ($status == 1) {
                    $status = "Pending";
                } else if ($status == 2) {
                    $status = "Approved";
                } else if ($status == 0) {
                    $status = "Available";
                }
        ?>
        <tr>
            <th scope="row"><?php echo $id; ?></th>
            <td><?php echo $user['u_firstname'] . " " . $user['u_lastname']; ?></td>
            <td><?php echo $property; ?></td>
            <td><?php echo $landlord['ld_firstname'] . " " . $landlord['ld_lastname']; ?></td>
            <td><?php echo $checkindate; ?></td>
            <td><?php echo $checkoutdate; ?></td>
            <td><?php echo $status; ?></td>
            <td>
                <button class="btn btn-primary" name="edit_booking"><a href="editbookings.php?id=
                        <?php echo $id; ?>">Edit</a></button>
            </td>
            <td>
                <button class="btn btn-primary" name="view_booking"><a href="view_bookings.php?id=
                        <?php echo $id; ?>">View</a></button>
            </td>
            <td>
                <button class="btn btn-danger" name="delete_booking"><a href="deletebooking.php?id=
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