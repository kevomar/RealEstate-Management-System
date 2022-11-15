<?php
include("config.php");
$pr_id = $_GET['id'];
$sql = "DELETE FROM property WHERE pr_id = {$pr_id}";
$result = mysqli_query($conn, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success'>Property Deleted</p>";
	header("Location:newpropertyview.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning'>Property Not Deleted</p>";
	header("Location:index.php:newpropertyview");
}
mysqli_close($con);
?>