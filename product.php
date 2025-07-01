<?php
require_once('db.php');
$query = 'SELECT * FROM beauty';
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Our Products | Glowify</title>
  <style>
    body {
      background-color: #ffe4ec;
      font-family: 'Poppins', sans-serif;
      padding: 40px;
    }
    .product-container {
      max-width: 1200px;
      margin: 0 auto;
    }
    h2 {
      color: #d63384;
      text-align: center;
      margin-bottom: 30px;
    }
    .card {
      background: white;
      padding: 15px;
      border-radius: 15px;
      box-shadow: 0 0 8px rgba(214, 51, 132, 0.1);
      text-align: center;
      margin: 15px;
    }
    .card img {
      width: 100%;
      height: 250px;
      object-fit: cover;
      border-radius: 10px;
    }
    .card h5 {
      color: #d63384;
      margin-top: 15px;
    }
    .btn {
      background-color: #d63384;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 10px;
      text-decoration: none;
      display: inline-block;
      margin-top: 10px;
    }
    .btn:hover {
      background-color: #c2256c;
    }
    .back-home {
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="product-container">
    <h2>Our Products</h2>
    <div style="display: flex; flex-wrap: wrap; justify-content: center;">
      <?php foreach ($data as $item): ?>
        <div class="card" style="width: 250px;">
          <img src="uploaded/<?php echo $item['image']; ?>" alt="Product">
          <h5><?php echo htmlspecialchars($item['merk']); ?></h5>
          <p>Harga: <?php echo htmlspecialchars($item['harga']); ?></p>
          <p>Stok: <?php echo htmlspecialchars($item['stok']); ?></p>
          <a class="btn" href="cart_update.php?product_id=<?php echo $item['id']; ?>">Add to Cart</a>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="back-home">
      <a href="homepage.php" class="btn">← Back to Home</a>
    </div>
  </div>
</body>
</html>
