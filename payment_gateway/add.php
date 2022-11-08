<?php
session_start();
require("conn.php");

if (isset($_POST['complete'])) {
	$amount = $_POST['amount'];
	$type = $_POST['type'];
	$user_id = $_SESSION['user_id'];

	$sql = "INSERT INTO payments (pay_type, pay_amount, u_id) VALUES ('$type','$amount', 12)";

	if (mysqli_query($conn, $sql)) {
		header("Location: checkout.php");
		exit();
	} else {
		echo "Error:Record not added" . mysqli_error($conn);
	}
}
?>