<?php
require_once('db.php');
$query = "SELECT SUM(amount) AS total FROM cart";
$result = mysqli_query($conn, $query);
$total = 0;
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $total = $row['total'] ?? 0;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="Image/Logo.png">
  <title>Glowify</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<!--Navbar-->
<body>
  <header>
    <a href="" class="brand">Glowify</a>
    <div class="menu-btn"></div>
    <div class="navigation">
      <a href="#main" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">Home</a>
      <a href="#about" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Marketplace</a>
      <a href="Contanct.html" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">Contact</a>
      <a href="register/register.php" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">Register</a>
      <a href="register/login.php" class="login-icon" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="650">
      <i class="fas fa-user"></i>
      <a href="cart_final.php" class="cart-icon" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="700">  
        <i class="fas fa-shopping-cart"></i>
        <span class="cart-count"><?php echo $total; ?></span>
    </a>
    <a href="register/logout.php" class="btn btn-danger">Logout</a>

    </div>
  </header>
  <!--Hero section-->

  <section class="main" id="main">
    <div class="content">
      <div class="column col-right reveal">
        <h2 data-aos="fade-right" data-aos-duration="1000" data-aos-delay="800"> Glow Smart <br><span> Glow Sustainable </span></h2>
        <div class="animated-text" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="900">
          <h3>Because Everyone Deserves to Feel Beauty</h3>
        </div>
  </section>

  <!--  About Section -->

  <section class="about" id="about">
    <div class="content">
      <div class="column col-left reveal">
        <div class="img-card" data-aos="fade-right" data-aos-duration="2000" data-aos-delay="200">
          <img src="Image/product.jpeg" alt="">
        </div>
      </div>
      <div class="column col-right reveal">
        <h2 class="content-title" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">Hey There! We Are Glowify
          </h2>
        <p class="paragraph-text" data-aos="flip-up" data-aos-duration="1000" data-aos-delay="400">“We are a company specializing in preloved skincare — offering high-quality, gently used skincare products that are still safe and effective to use. Our mission is to promote sustainable beauty habits by extending the life of skincare items, making them more affordable and eco-friendly for Gen Z and millennials</p>
    </div>
  </section>



  <!-- Business Work Section -->
  <section class="work" id="work">
    <div class="title">
      <h2 class="section-title" data-aos="fade-up" data-aos-duration="1000">Our Top Products</h2>
    </div>
    <div class="content">
      <div class="card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
        <div class="card-img">
          <img src="Image/Wardah.jpeg" alt="">
        </div>
        <h3>Wardah</h3>
      </div>
      <div class="card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
        <div class="card-img">
          <img src="Image/Sometinc.jpeg" alt="">
        </div>
        <h3>Sometinc</h3>
      </div>
      <div class="card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
        <div class="card-img">
          <img src="Image/Skintific.jpeg" alt="">
        </div>
        <h3>Skintific</h3>
      </div>
      <div class="card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
        <div class="card-img">
          <img src="Image/Hanasui.jpeg" alt="">
        </div>
        <h3>Hanasui</h3>
      </div>
      <div class="card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
        <div class="card-img">
          <img src="Image/Azarine.jpeg" alt="">
        </div>
        <h3>Azarine</h3>
      </div>
      <div class="card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
        <div class="card-img">
          <img src="Image/Skin1004.jpeg" alt="">
        </div>
        <h3>Skin1004</h3>
      </div>
    </div>
  </section>


  <!--Footer-->
  <footer class="footer">
    <span class="footer-title">Glowify</span>
    <p>Portofolio Website 2025 <a href="#">Coding Artorius</a>.</p>
  </footer>

 <!--script-->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({ offset: 0 });
  </script>
  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Footer Glowify</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background: #fff;
    }

    footer {
      background-color: #f9f9f9;
      color: #111;
      padding: 60px 20px;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      animation: fadeInUp 1s ease-in;
    }

    footer div {
      flex: 1 1 200px;
      margin: 20px;
    }

    footer h4 {
      margin-bottom: 15px;
      font-weight: bold;
    }

    footer a {
      display: block;
      color: #444;
      margin: 8px 0;
      text-decoration: none;
      transition: 0.3s;
    }

    footer a:hover {
      color: #FF69B4;
      transform: translateX(5px);
    }

    .newsletter input[type="email"] {
      padding: 10px;
      width: 70%;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-right: 8px;
    }

    .newsletter button {
      padding: 10px 15px;
      background-color: #111;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .newsletter button:hover {
      background-color: #FF69B4;
    }

    .social-icons a {
      color: #111;
      margin-right: 15px;
      font-size: 20px;
      transition: transform 0.3s ease, color 0.3s ease;
    }

    .social-icons a:hover {
      transform: scale(1.2);
      color: #FF69B4;
    }

    .footer-bottom {
      text-align: center;
      margin-top: 40px;
      font-size: 14px;
      color: #999;
    }

    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(30px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

<footer>
  <div>
    <h4>Contact Us</h4>
    <a href="mailto:cs@skintific.com"><i class="fa fa-envelope"></i> cs@skintific.com</a>
  </div>

  <div>
    <h4>Support</h4>
    <a href="#">Track My Order</a>
    <a href="#">Shipping & Delivery</a>
    <a href="#">Returns & Refunds Policy</a>
    <a href="#">FAQs</a>
    <a href="#">Privacy Policy</a>
    <a href="#">Terms of Service</a>
  </div>

  <div>
    <h4>About Us</h4>
    <a href="#">Skintific®</a>
  </div>

  <div class="newsletter">
    <h4>Newsletter</h4>
    <p>Sign up and subscribe us!</p>
    <form>
      <input type="email" placeholder="Your e-mail">
      <button type="submit"><i class="fa fa-arrow-right"></i></button>
    </form>
    <div class="social-icons" style="margin-top: 15px;">
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-youtube"></i></a>
      <a href="#"><i class="fab fa-tiktok"></i></a>
    </div>
  </div>
</footer>
<div class="footer-bottom">
  &copy;2025 SKINTIFIC® All rights reserved. | Glowify - Portofolio Website 2025
 </div>
</body>
</html>>