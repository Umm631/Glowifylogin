<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../DATABASE/connect.php');

$user_username = '';
$user_email = '';
$user_mobile = '';

if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $conf_user_password = $_POST['conf_user_password'];
    $user_mobile = $_POST['user_mobile'];

    // Validasi server-side
    if (empty($user_username) || empty($user_email) || empty($user_password) || empty($conf_user_password)) {
        echo "<script>alert('Semua field wajib diisi');</script>";
        exit();
    }

    if ($user_password !== $conf_user_password) {
        echo "<script>alert('Password tidak cocok');</script>";
        echo "<script>window.location.href='register.php?username=" . urlencode($user_username) . "&email=" . urlencode($user_email) . "&mobile=" . urlencode($user_mobile) . "';</script>";
        exit();
    }

    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);

    $select_query = "SELECT * FROM registrasi WHERE EmailAddress='$user_email'";
    $select_result = mysqli_query($con, $select_query);

    if (!$select_result) {
        die("Query SELECT gagal: " . mysqli_error($con));
    }

    $rows_count = mysqli_num_rows($select_result);

    if ($rows_count > 0) {
        echo "<script>alert('Email sudah terdaftar');</script>";
    } else {
        $insert_query = "INSERT INTO registrasi (Fullname, EmailAddress, Password, Phone_Number) 
                         VALUES ('$user_username', '$user_email', '$hash_password', '$user_mobile')";
        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result) {
            echo "<script>alert('Registrasi berhasil');</script>";
            echo "<script>window.location.href = '../homepage.html';</script>";
            exit();
        } else {
            die("Query INSERT gagal: " . mysqli_error($con));
        }
    }
}

// Retrieve values from URL parameters if available
if (isset($_GET['username'])) {
    $user_username = $_GET['username'];
}
if (isset($_GET['email'])) {
    $user_email = $_GET['email'];
}
if (isset($_GET['mobile'])) {
    $user_mobile = $_GET['mobile'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register | Glowify</title>
  <style>
    body {
      background: linear-gradient(to bottom, #f9e0eb, #fef6f8);
      font-family: 'Poppins', sans-serif;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .register-box {
      background-color: white;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 0 15px rgba(255, 105, 180, 0.2);
      width: 350px;
    }
    h2 {
      text-align: center;
      color: #d63384;
    }
    input, select {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 10px;
      border: 1px solid #ddd;
    }
    button {
      width: 100%;
      background-color: #d63384;
      color: white;
      border: none;
      padding: 12px;
      border-radius: 10px;
      cursor: pointer;
      font-weight: bold;
    }
    button:hover {
      background-color: #c2256c;
    }
    .back {
      text-align: center;
      margin-top: 10px;
    }
    .back a {
      color: #d63384;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="register-box">
    <h2>Register</h2>
    <form action="register.php" method="POST">
      <input type="text" name="user_username" placeholder="Full Name" value="<?php echo htmlspecialchars($user_username); ?>" required>
      <input type="email" name="user_email" placeholder="Email Address" value="<?php echo htmlspecialchars($user_email); ?>" required>
      <input type="password" name="user_password" placeholder="Password" required>
      <input type="password" name="conf_user_password" placeholder="Confirm Password" required>
      <input type="text" name="user_mobile" placeholder="Phone Number" value="<?php echo htmlspecialchars($user_mobile); ?>">
      <button type="submit" name="user_register">Create Account</button>
    </form>
    <div class="back">
      <a href="../homepage.php">← Back to Home</a>
    </div>
  </div>
</body>
</html>
