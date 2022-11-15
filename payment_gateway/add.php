<?php
session_start();
$pr_id = $_GET['pr_id'];
$user_id = $_SESSION['user_id'];
require("conn.php");

//get property details from database
$get_property_queries = "SELECT * FROM property WHERE pr_id = $pr_id";

$query = mysqli_query($conn, $get_property_queries);
if (mysqli_num_rows($query) > 0) {
	while ($row = mysqli_fetch_assoc($query)) {
		$pr_name = $row['pr_name'];
		$pr_description = $row['pr_description'];
		$pr_price = $row['pr_price'];
		$pr_image = $row['pr_image'];
		


if (isset($_POST['complete'])) {
	$amount = $_POST['amount'];
	$type = $_POST['type'];
	$user_id = $_SESSION['user_id'];
	//echo $pr_price;
	$balance = (float)$pr_price - (float)$amount;

	$sql = "INSERT INTO payments (pay_type, pay_amount, u_id) VALUES ('$type','$amount', '$user_id');";

	if (mysqli_query($conn, $sql)) {
		$getpaymentid = "SELECT MAX(`pay_id`) FROM payments";
		$runquery = mysqli_query($conn, $getpaymentid);

		if(mysqli_num_rows($runquery) > 0){
			while($rows = mysqli_fetch_assoc($runquery)){
				//var_dump($rows);
				(int)$pay_id = $rows ["MAX(`pay_id`)"];
				var_dump($pay_id, $pr_id, $user_id, $amount,  $balance);
				$insert_invoice = "INSERT INTO `invoices` ( `pay_id`, `pr_id`, `u_id`, `pay_amount`, `in_balance`) VALUES ('$pay_id', '$pr_id', '$user_id', '$amount',  '$balance');";

				if(mysqli_query($conn, $insert_invoice)){
					echo '<script>alert("payment process complete")</script>';
					header("Location: receipt.php?pr_id=" . $pr_id."&pay_id=".$pay_id);
				}
			}
		}
		
		exit();
	} else {
		echo "Error:Record not added" . mysqli_error($conn);
	}
}

	}
}
?>