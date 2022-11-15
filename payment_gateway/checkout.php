<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title> Checkout </title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700'>
  <link rel="stylesheet" href="./style.css">

</head>
<style>
  .info{
    color: black;
    margin-left: 100%;
  }
</style>
<?php 
session_start();
include('conn.php');

$userid = $_SESSION['user_id'];
$amount = $_GET['amount'];
$pr_id = $_GET['pr_id'];

$userquery = "SELECT * FROM users WHERE u_id = $userid";
$propertyquery = "SELECT * FROM property WHERE pr_id = $pr_id";

$userresult = mysqli_query($conn, $userquery);
$propertyresult = mysqli_query($conn, $propertyquery);

if(mysqli_num_rows($userresult) > 0)
{
  $user = mysqli_fetch_array($userresult);
    $user_id = $user['u_id'];
    $user_name = $user['u_firstname'] . " " . $user['u_lastname'];
    $user_email = $user['u_email'];

    $property = mysqli_fetch_array($propertyresult);
    $property_name = $property['pr_name'];
    $property_image = $property['pr_image'];
    $property_price = $property['pr_price'];


?>

<body>
  <!-- partial:index.partial.html -->
  <style>
    .room{
      background: url(<?php echo '../dxf/uploadsforproperties/'.$property_image;?>) no-repeat center center;
    }
  </style>

  <body>
    <div class="model">
      <div class="room">
        <div class="text-cover">
          <h1><?php echo $property_name;?></h1>

          <hr>
        </div>
        <div class="info">
          <p>Name: <?php echo $user_name;?></p>
          <p>Email: <?php echo $user_email;?></p>
        </div>
      </div>
      <div class="payment">
        <div class="receipt-box">
          <h3><img src="tick.jpg" text-align:"centre"></h3>

        </div>
        <div class="payment-info">
          <h3>Payment made Successfully</h3>
          <form>
            <label >Receipt ID:</label><input type="text" name="receiptID" value="" disabled>
       <LABEL>Name:</LABEL> <input type="text" name="name" value="" disabled>
       <label>Property value: </label><input type="text" name="value" disabled>
       <label>Amount Paid:</label><input type="text" name="amount" value="" disabled>
       <label>Balance</label><input type="text" name="balance" value="" disabled>
            <br><br>
            <input class="btn" type="submit" value="Proceed">
          </form>
        </div>
      </div>
    </div>
  </body>
  <!-- partial -->
  <script src="./script.js"></script>

</body>

</html>

<?php 
}
?>
