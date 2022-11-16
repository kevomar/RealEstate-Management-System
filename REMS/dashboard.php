<?php
require 'includes/connect.php';
?>
<div style="height: 50%;     display: grid;
    grid-template-columns: 2fr 2fr;
    grid-auto-rows: 40%;">
    <div class="card btn btn-primary">
        <h2 class="subtitle">
            No of users
        </h2>
        <h4>
            <?php
            $query = "SELECT * FROM users LIMIT 20";
            $result = mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);
            echo $count;
            ?>
        </h4>
    </div>
    <br>
    <br>
    <div class="card btn btn-success" style="min-width: 30vh;">
        <h2 class="subtitle">
            Revenue
        </h2>
        <h4>
            <?php
                $query = "SELECT pay_id, pay_amount FROM payments LIMIT 20";
                $result = mysqli_query($conn, $query);
                $count = mysqli_num_rows($result);
                $total = 0;
                if ($count > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $total += $row['pay_amount'];
                    }
                }
                echo $total;
            ?>
        </h4>
    </div>
    <br>
    <br>
    <div class="card" style="margin-top: 8em; margin-bottom: auto; width: 70vw;">
        <h2 class="subtitle">
            Recent Payments
        </h2>

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
        $query = "SELECT * FROM invoices";
        $run = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($run) > 0) {
            while ($row = mysqli_fetch_array($run)) {
                $get_user = "SELECT u_firstname, u_lastname FROM users WHERE u_id = " . $row['u_id'] ."LIMIT 20";
                $run_user = mysqli_query($conn, $get_user);
                $user = mysqli_fetch_array($run_user);

                $get_timestamp = "SELECT timestamp FROM payments WHERE pay_id = " . $row['pay_id'] ."LIMIT 20";
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

            </td>
        </tr>
        <?php
            }
        }

        ?>
    </tbody>
</table>
    </div>
</div>