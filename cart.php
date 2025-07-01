<?php
require_once('db.php');

$nama = $_POST['nama'];
$email = $_POST['email'];
$address = $_POST['address'];
$amount = $_POST['amount'];
$product_id = $_POST['product_id'];

$query = "INSERT INTO cart(nama, email, `address`, amount, product_id) 
          VALUES('$nama', '$email', '$address', '$amount', '$product_id')";

mysqli_query($conn, $query);

echo "<script>alert('Succeed')</script>";
echo "<script>window.location.href='cart_final.php'</script>";
?>
