<?php
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Purchase Form</title>
  <style>
    body {
      background-color: #ffe4ec;
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .form-box {
      background: white;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(214, 51, 132, 0.2);
      width: 300px;
    }
    h2 {
      text-align: center;
      color: #d63384;
    }
    input {
      width: 100%;
      margin: 10px 0;
      padding: 10px;
      border-radius: 10px;
      border: 1px solid #ccc;
    }
    button {
      width: 100%;
      background-color: #d63384;
      color: white;
      border: none;
      padding: 12px;
      border-radius: 10px;
      font-weight: bold;
      cursor: pointer;
    }
    button:hover {
      background-color: #c2256c;
    }
  </style>
</head>
<body>
  <div class="form-box">
    <h2>Purchase Form</h2>
    <form action='cart.php' method='post'>
      <input type="hidden" name="product_id" value="<?= $product_id ?>">
      <input type="text" name="nama" placeholder="Name" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="text" name="address" placeholder="Address" required>
      <input type="number" name="amount" placeholder="Amount" required>
      <button type="submit" name="submit">SUBMIT</button>
    </form>
  </div>
</body>
</html>
