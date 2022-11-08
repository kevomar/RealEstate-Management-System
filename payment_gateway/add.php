<?php
require("conn.php");
$amount=$_POST['amount'];
$type=$_POST['type'];

$sql="INSERT INTO payments (pay_type, pay_amount) VALUES ('$type','$amount')";

if(mysqli_query($conn,$sql)){
	header("Location: checkout.php");
   exit();
}
else{
	echo "Error:Record not added".mysqli_error($conn);
}

?>