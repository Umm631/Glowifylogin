<?php
require_once('db.php');

$id = $_GET['id'];

$query = "DELETE FROM cart WHERE id='$id'";
mysqli_query($conn, $query);

echo "<script>alert('You've successfully deleted your purchase')</script>";
echo "<script>window.location.href='cart_final.php'</script>";
?>
