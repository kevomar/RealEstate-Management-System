<?php
require 'includes/connect.php';
?>
<div style="height: 50%;     display: grid;
    grid-template-columns: 2fr 2fr;
    grid-auto-rows: 40%;">
    <div class="card">
        <h2 class="subtitle">
            No of users
        </h2>
        <h4>
            <?php
            $query = "SELECT * FROM users";
            $result = mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);
            echo $count;
            ?>
        </h4>
    </div>
    <div class="card">
        <h2 class="subtitle">
            Revenue
        </h2>
        <h4>
            <?php
                $query = "SELECT pay_id, pay_amount FROM payments";
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
    <div class="card" style="margin-top: 4em; margin-bottom: auto;">
        <h2 class="subtitle">
            Reviews
        </h2>
        <h4>
            250, 000
        </h4>
    </div>
    <div class="card" style="margin-top: 4em; margin-bottom: auto;">
        <h2 class="subtitle">
            Issues
        </h2>
        <h4>
            250, 000
        </h4>
    </div>
</div>