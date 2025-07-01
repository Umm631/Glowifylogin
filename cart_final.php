<?php
require_once('db.php');

// Ambil data cart dan produk
$query = 'SELECT cart.*, beauty.merk 
          FROM cart 
          JOIN beauty ON cart.product_id = beauty.id';
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cart | Glowify</title>
  <style>
    body {
      background-color: #ffe4ec;
      font-family: 'Poppins', sans-serif;
      padding: 40px;
    }

    .container-box {
      background-color: #fff;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(214, 51, 132, 0.15);
      padding: 30px;
      max-width: 1000px;
      margin: auto;
    }

    h2 {
      text-align: center;
      color: #d63384;
      margin-bottom: 20px;
    }

    .btn {
      background-color: #d63384;
      color: white;
      padding: 8px 14px;
      border: none;
      border-radius: 10px;
      text-decoration: none;
      font-weight: bold;
    }

    .btn:hover {
      background-color: #c2256c;
    }

    .btn-danger {
      background-color: #dc3545;
    }

    .btn-danger:hover {
      background-color: #bb2d3b;
    }

    .btn-warning {
      background-color: #ffc107;
      color: black;
    }

    .btn-warning:hover {
      background-color: #e0a800;
    }

    table {
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
    }

    th, td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
      text-align: center;
    }

    .actions {
      display: flex;
      gap: 10px;
      justify-content: center;
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .back {
      text-align: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="container-box">
    <div class="top-bar">
      <a href="product.php" class="btn">Our Product</a>
    </div>

    <h2>Your Cart</h2>

    <table>
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Address</th>
          <th>Product</th>
          <th>Amount</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if (count($data) > 0): ?>
          <?php foreach ($data as $item): ?>
            <tr>
              <td><?= htmlspecialchars($item['nama']) ?></td>
              <td><?= htmlspecialchars($item['email']) ?></td>
              <td><?= htmlspecialchars($item['address']) ?></td>
              <td><?= htmlspecialchars($item['merk']) ?></td>
              <td><?= htmlspecialchars($item['amount']) ?></td>
              <td class="actions">
                <a href="cart_change.php?id=<?= $item['id'] ?>" class="btn btn-warning">Change</a>
                <a href="delete_cart.php?id=<?= $item['id'] ?>" class="btn btn-danger">Delete</a>
              </td>
            </tr>
          <?php endforeach ?>
        <?php else: ?>
          <tr><td colspan="6">Cart is empty.</td></tr>
        <?php endif ?>
      </tbody>
    </table>

    <div class="back">
      <a href="homepage.php" class="btn">← Back to Home</a>
    </div>
  </div>

  <script>
    (function checkAuth() {
        const rawToken = localStorage.getItem('user_token');
        if (!rawToken) {
            alert("Anda belum login.");
            window.location.href = 'register/login.php';
            return;
        }

        try {
            const session = JSON.parse(rawToken);
            const now = Math.floor(Date.now() / 1000);
            if (now > session.expire) {
                alert("Sesi login telah kedaluwarsa.");
                localStorage.removeItem('user_token');
                window.location.href = 'register/login.php';
            }
        } catch (e) {
            console.error("Gagal membaca token:", e);
            localStorage.removeItem('user_token');
            window.location.href = 'register/login.php';
        }
    })();
  </script>
</body>
</html>
