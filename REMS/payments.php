<?php
require 'includes/connect.php';

$query = "SELECT * FROM invoices";
$run = mysqli_query($conn, $query);
?>
<!--<div class="centre" style="margin-left: 15vw; margin-top: 5em; width: 100%; border: solid 1px red;">-->
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Property</th>
            <th scope="col">Payment Id</th>
            <th scope="col">Amount</th>
            <th scope="col">Balance</th>
            <th scope="col">Timestamp</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (mysqli_num_rows($run) > 0) {
            while ($row = mysqli_fetch_array($run)) {
                $get_user = "SELECT u_firstname, u_lastname FROM users WHERE u_id = " . $row['u_id'];
                $run_user = mysqli_query($conn, $get_user);
                $user = mysqli_fetch_array($run_user);

                $get_timestamp = "SELECT timestamp FROM payments WHERE pay_id = " . $row['pay_id'];
                $run_timestamp = mysqli_query($conn, $get_timestamp);
                $timestamp = mysqli_fetch_array($run_timestamp);



                $id = $row['in_id'];
                $property = $row['pr_id'];
                $payment_id = $row['pay_id'];;
                $amount = $row['pay_amount'];
                $balance = $row['in_balance'];


        ?>
        <tr>
            <th scope="row"><?php echo $id; ?></th>
            <td><?php echo $user['u_firstname'] . " " . $user['u_lastname']; ?></td>
            <td><?php echo $property; ?></td>
            <td><?php echo $payment_id; ?></td>
            <td><?php echo $amount; ?></td>
            <td><?php echo $balance; ?></td>
            <td><?php echo $timestamp['timestamp']; ?></td>
            <td>
                <form action="editbookings.php" method="post">
                    <button class="btn btn-danger">Reverse</button>
                </form>
            </td>
        </tr>
        <?php
            }
        }

        ?>
    </tbody>
</table>
<!--</div>-->