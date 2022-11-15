<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<?php
//include 'config.php';
session_start();
$user_ip = getenv('REMOTE_ADDR');
//echo $user_ip;

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    include 'conn.php';

    $query = "SELECT * FROM users where u_id = $user_id";
    $runQuery = mysqli_query($conn, $query);
    if (mysqli_num_rows($runQuery) > 0) {
        while ($user = mysqli_fetch_array($runQuery)) {
            //var_dump($user);
            $name = $user['u_firstname'] . " " . $user['u_lastname'];
            $email = $user['u_email'];
?>

<body>

    <div class="container" style="background: #272075;">

        <form action="add.php?pr_id=<?php echo $_GET['pr_id'];?>" method="post">

            <div class="row">

                <div class="col">

                    <h3 class="title">billing address</h3>

                    <div class="inputBox">
                        <span>full name :</span>
                        <input type="text" value="<?php echo $name; ?>">
                    </div>
                    <div class="inputBox">
                        <span>email :</span>
                        <input type="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="inputBox">
                        <span>address :</span>
                        <input type="text" placeholder="room - street - locality">
                    </div>
                    <div class="inputBox">
                        <span>city :</span>
                        <input type="text" placeholder="Nairobi">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>state :</span>
                            <input type="text" placeholder="Kenya">
                        </div>
                        <div class="inputBox">
                            <span>zip code :</span>
                            <input type="text" placeholder="123 456">
                        </div>
                    </div>

                </div>

                <div class="col">

                    <h3 class="title">payment</h3>

                    <div class="inputBox">
                        <span>cards accepted :</span>
                        <img src="images/card_img.png" alt="">
                    </div>
                    <div class="inputBox">
                        <span>name on card :</span>
                        <input type="text" value="<?php echo $name; ?>">
                    </div>
                    <div class="inputBox">
                        <span>credit card number :</span>
                        <input id="input" type="text" placeholder="1111222233334444">
                    </div>
                    <div class="inputBox">
                        <span>exp month :</span>
                        <input type="text" placeholder="january">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>exp year :</span>
                            <input type="number" placeholder="2022">
                        </div>
                        <div class="inputBox">
                            <span>Amount :</span>
                            <input type="number" placeholder="1000" name="amount">
                            <input type="hidden" placeholder="credit card" name="type">
                        </div>

                    </div>

                </div>

            </div>

            <input type="submit" placeholder="proceed to checkout" class="submit-btn" name="complete">

        </form>
        <script>

        </script>

    </div>

</body>

</html>

<?php
        }
    }
} else {
    header("Location: ../dxf/loginform.php");
}
?>