<?php
require_once('db.php');

$id = $_GET['id'];

$nama = $_POST['nama'];
$email = $_POST['email'];
$address = $_POST['address'];
$amount = $_POST['amount'];

$query = "UPDATE cart SET nama='$nama', email='$email', `address`='$address', amount='$amount' WHERE id='$id'"; // Corrected quotes

mysqli_query($conn, $query);

echo "<script>alert('You've successfully update your purchasement')</script>";
echo "<script>window.location.href='cart_final.php'</script>";
?>
