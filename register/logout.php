<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Logout | Glowify</title>
  <script>
    // Hapus token dari localStorage
    localStorage.removeItem("user_token");
    // Redirect ke halaman login
    window.location.href = "login.php";
  </script>
</head>
<body>
</body>
</html>
