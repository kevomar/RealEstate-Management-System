<?php
include 'includes/connect.php';

$id  = $_GET['id'];

$query = "DELETE  FROM appointments WHERE ap_id = $id";
$run = mysqli_query($conn, $query);

if ($run) {
    echo "<script>alert('Deleted successfully')</script>";
    header("Location: index.php?appointments");
} else {
    echo "<script>alert('Erro deleting record')</script>";
    header("Location: index.php?appointments");
}