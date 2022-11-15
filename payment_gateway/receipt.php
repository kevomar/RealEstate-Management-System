<?php 
session_start();
include('conn.php');

$userid = $_SESSION['user_id'];
$pay_id = $_GET['pay_id'];


$userquery = "SELECT * FROM users WHERE u_id = $userid";
//$propertyquery = "SELECT * FROM property WHERE pr_id = $pr_id";
//$receipt_query = "SELECT * FROM invoices WHERE pay_id = $pay_id";

$userresult = mysqli_query($conn, $userquery);
//$receiptresult = mysqli_query($conn, $);

if(mysqli_num_rows($userresult) > 0)
{
  $user = mysqli_fetch_array($userresult);
    $user_name = $user['u_firstname'] . " " . $user['u_lastname'];
    $user_email = $user['u_email'];

    /*$property = mysqli_fetch_array($propertyresult);
    $property_name = $property['pr_name'];
    $property_image = $property['pr_image'];
    $property_price = $property['pr_price'];*/

}


/**
 * image
 * name
 * email
 * amiount
 * balance
 */

$getmaxid = "SELECT MAX(in_id) FROM invoices";
$runmax = mysqli_query($conn, $getmaxid);

if(mysqli_num_rows($runmax) > 0){
    $max_id = mysqli_fetch_assoc($runmax);
    $max_id = $max_id ["MAX(in_id)"];

    $getinvoice = "SELECT * From invoices WHERE in_id = ".$max_id;
    if($run = mysqli_query($conn, $getinvoice)){
        $receipt = mysqli_fetch_assoc($run);
        $pr_id = $_GET['pr_id'];
        $getimage = "SELECT pr_image,pr_name FROM property WHERE pr_id = ".$pr_id;
        $image = mysqli_fetch_assoc(mysqli_query($conn, $getimage));
        $pr_name = $image["pr_name"];
        $image = $image["pr_image"];




?>

<?php 

    }
}
?>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<link rel="stylesheet" href="css/style2.css">
</head>
<style>
    .contain{
        margin: 0;
        background-color: #272075;
        width: 100vw;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .receipt{
        background: white;
        margin-left: 20vw;
        margin-right: 20vw;
        padding: 3em;
        text-align: center;
    }

    img{
        height: 35vh;
        width: 50%;
    }

    .btn{
        margin-top: 1em;
    }
</style>
<body>
    <div class="contain">
        <div class="receipt">
            <div class="receipt-header">
                <h3>INVOICE</h3>
                <h5>Invoice Id: # <?php  echo $receipt['in_id']?></h5>
                <h3><?php echo $pr_name;?></h3>
            </div>
            <div class="rceipt-body">
                <div class="property-image">
                    <img src="../dxf/uploadsforproperties/<?php  echo $image;?>" alt="image">
                </div>
                <div class="receipt-item">                <label>Name: </label><span><?php echo  $user_name;?></span></div>
                <div class="receipt-item">                <label>Email: </label><span><?php echo  $user_email;?></span></div>
                <div class="receipt-item">                <label>Amount Paid: </label><span><?php echo  $receipt['pay_amount'];?></span></div>
                <div class="receipt-item">                <label>Balance: </label><span><?php echo  $receipt['in_balance'];?></span></div>
                


                <a href="./../dxf/listings.php" class="btn btn-success">complete</a>

            </div>
            
            
        </div>
    </div>
</body>
