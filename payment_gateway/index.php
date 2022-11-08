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

<body>

    <div class="container">

        <form action="add.php" method="post">

            <div class="row">

                <div class="col">

                    <h3 class="title">billing address</h3>

                    <div class="inputBox">
                        <span>full name :</span>
                        <input type="text" value="john deo">
                    </div>
                    <div class="inputBox">
                        <span>email :</span>
                        <input type="email" value="example@example.com">
                    </div>
                    <div class="inputBox">
                        <span>address :</span>
                        <input type="text" value="room - street - locality">
                    </div>
                    <div class="inputBox">
                        <span>city :</span>
                        <input type="text" value="Nairobi">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>state :</span>
                            <input type="text" value="Kenya">
                        </div>
                        <div class="inputBox">
                            <span>zip code :</span>
                            <input type="text" value="123 456">
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
                        <input type="text" value="mr. john deo">
                    </div>
                    <div class="inputBox">
                        <span>credit card number :</span>
                        <input type="number" value="1111222233334444">
                    </div>
                    <div class="inputBox">
                        <span>exp month :</span>
                        <input type="text" value="january">
                    </div>

                    <div class="flex">
                        <div class="inputBox">
                            <span>exp year :</span>
                            <input type="number" value="2022">
                        </div>
                        <div class="inputBox">
                            <span>Amount :</span>
                            <input type="number" value="1000" name="amount">
                            <input type="hidden" value="credit card" name="type">
                        </div>

                    </div>

                </div>

            </div>

            <input type="submit" value="proceed to checkout" class="submit-btn" name="complete">

        </form>

    </div>

</body>

</html>