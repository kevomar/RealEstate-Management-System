<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rems";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<h1 style = "color: black;
  font-size: 50px;
  margin-left: 5%;
  margin-top: 2%;">Dashboard</h1>
<div style="height: 50%;     display: Flex;
    grid-template-columns: 1fr 1fr;
    grid-auto-rows: 20%;">
    <div class="card">
        <h2 class="subtitle">
            No of users
        </h2>
        <h4>
            <!--To show no of user -->
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
            <!--To show revenue -->
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