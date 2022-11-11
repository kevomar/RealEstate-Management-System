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
	}
}


if (isset($_POST['complete'])) {
	$amount = $_POST['amount'];
	$type = $_POST['type'];
	$user_id = $_SESSION['user_id'];

	$sql = "INSERT INTO payments (pay_type, pay_amount, u_id) VALUES ('$type','$amount', '$user_id');";

	if (mysqli_query($conn, $sql)) {
		header("Location: checkout.php?pr_id=" . $pr_id."&amount=" . $amount);
		exit();
	} else {
		echo "Error:Record not added" . mysqli_error($conn);
	}
}
?>