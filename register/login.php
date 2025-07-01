<?php
session_start();
include('../DATABASE/connect.php');

// Handle AJAX request
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action']) && $_POST['action'] === 'login') {
    header('Content-Type: application/json');

    $email = $_POST["user_email"];
    $password = $_POST["user_password"];

    $stmt = $con->prepare("SELECT * FROM registrasi WHERE EmailAddress = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['Password'])) {
            // Generate random token (bukan JWT, hanya simulasi)
            $token = bin2hex(random_bytes(32));
            $_SESSION['token'] = $token;

            echo json_encode([
                'status' => 'success',
                'message' => 'Login berhasil!',
                'token' => $token,
                'fullname' => $user['Fullname'],
                'email' => $user['EmailAddress']
            ]);
            exit();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Password salah']);
            exit();
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Email tidak ditemukan']);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Glowify</title>
  <style>
    body {
      background: linear-gradient(to bottom, #fce4ec, #f9f9f9);
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .login-box {
      background: #fff;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(255, 105, 180, 0.2);
      width: 350px;
    }
    h2 {
      color: #d63384;
      text-align: center;
    }
    input {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border-radius: 10px;
      border: 1px solid #ccc;
    }
    button {
      width: 100%;
      margin-top: 20px;
      padding: 12px;
      border: none;
      background-color: #d63384;
      color: white;
      border-radius: 10px;
      font-weight: bold;
      cursor: pointer;
    }
    button:hover {
      background-color: #c2185b;
    }
    .back {
      text-align: center;
      margin-top: 10px;
    }
    .back a {
      text-decoration: none;
      color: #d63384;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Login</h2>
    <form id="loginForm">
      <input type="email" name="user_email" id="user_email" placeholder="Email Address" required>
      <input type="password" name="user_password" id="user_password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
    <div class="back">
      <a href="../homepage.php">← Back to Home</a>
    </div>
  </div>

  <script>
    document.getElementById("loginForm").addEventListener("submit", function(e) {
      e.preventDefault();

      const formData = new FormData();
      formData.append("user_email", document.getElementById("user_email").value);
      formData.append("user_password", document.getElementById("user_password").value);
      formData.append("action", "login");

      fetch("login.php", {
        method: "POST",
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        if (data.status === "success") {
          const sessionData = {
            token: data.token,
            fullname: data.fullname,
            email: data.email,
            expire: Math.floor(Date.now() / 1000) + 3600 // expires in 1 hour
          };
          localStorage.setItem("user_token", JSON.stringify(sessionData));
          alert(data.message);
          window.location.href = "../homepage.php";
        } else {
          alert(data.message);
        }
      })
      .catch(err => {
        console.error("Login error:", err);
        alert("Terjadi kesalahan. Silakan coba lagi.");
      });
    });
  </script>
</body>
</html>
