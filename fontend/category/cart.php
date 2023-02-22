<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=books", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$stmt = $conn->query("SELECT * FROM booklists LIMIT 3");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- google font link -->
    <link rel="stylesheet" href="../../public/assets/fontend/css/header.css">
    <link rel="stylesheet" href="../../public/assets/fontend/css/cart.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body>
    <!-- header start -->
    <header class="backgroundline col-lg-12 col-md-12 col-dm-12">
        <div class="container mt-2">
            <div class="d-flex justify-content-end align-items-center headerButton">
                <p class="px-3"> <i class="fa-solid fa-phone"></i> +8801580339094</p>
                <p class="px-3"><a href="login.php">Login</a></p>
                <p class="px-3"><a href="register.php">Registration</a></p>
            </div>
        </div>
    </header>
    <!-- header end -->
  <div style="border-bottom: 1px solid #ddd;">
  <div class="container">
    <div class="row ">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="col-lg-6 col-md-6 col-sm-6">
      <a class="navbar-brand" href="../index.php">
        <img src="../../public/assets/fontend/img/logo.jpg" alt="" width="60" height="60">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </div>


      <div class="col-lg-6 col-md-6 col-sm-6" id="navbarSupportedContent">
        <div class=" d-flex justify-content-end collapse navbar-collapse">
        <form class="d-flex">
          <input class="form-control me-2 " type="search" placeholder="I am shopping for...." aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

        <ul class="navbar-nav me-auto">
            <li class="nav-item navbarAbsolute">
              <a class="nav-link" aria-current="page" href="#"> <i class="fa-sharp fa-solid fa-arrows-rotate"></i> <span class="refresh">0</span>Compare  </a>
            </li>
            <li class="nav-item navbarAbsolute">
              <a class="nav-link" href="#"><i class="fa-regular fa-heart"></i><span class="refresh">0</span> Wishlist</a>
            </li>
            <li class="nav-item navbarAbsolute">
              <a class="nav-link" href="#"><i class="fa-sharp fa-solid fa-cart-shopping"></i><span class="refresh">0</span> Cart</a>
            </li>          
          </ul>
      </div>
        </div>   
    </nav>
    </div>

  </div>

  </div>



   <!-- at to car start -->
   <section class="h-100 h-custom" style="background-color: #d2c9ff;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                    <h6 class="mb-0 text-muted">3 items</h6>
                  </div>
                  <hr class="my-4">
                        <?php foreach($categories as $category){  ?>
                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img
                        src="../../public/assets/fontend/img/book8.jpg"
                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                      <h6 class="text-muted">Book</h6>
                      <h6 class="text-black mb-0"><?=$category['bookname']?></h6>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                      <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                        <i class="fas fa-minus"></i>
                      </button>

                      <input id="form1" min="0" name="quantity" value="1" type="number"
                        class="form-control form-control-sm" />

                      <button class="btn btn-link px-2"
                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                      <h6 class="mb-0"><?="$".$category['price']?></h6>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                    </div>
                  </div>

                  <hr class="my-4">
                  <?php } ?>

                <div class="pt-5">
                    <h6 class="mb-0"><a href="../category/productlist.php" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">items 3</h5>
                    <h5>$ 132.00</h5>
                  </div>

                  <h5 class="text-uppercase mb-3">Shipping</h5>

                  <div class="mb-4 pb-2">
                    <select class="select">
                      <option value="1">Standard-Delivery- $5.00</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                      <option value="4">Four</option>
                    </select>
                  </div>

                  <h5 class="text-uppercase mb-3">Give code</h5>

                  <div class="mb-5">
                    <div class="form-outline">
                      <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                      <label class="form-label" for="form3Examplea2">Enter your code</label>
                    </div>
                  </div>

                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price</h5>
                    <h5>$ 137.00</h5>
                  </div>

                  <button type="button" class="btn btn-dark btn-block btn-lg"
                    data-mdb-ripple-color="dark">Register</button>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
   <!-- at to car end -->










  <!-- footer start -->
<footer class="">
  <div class="container py-5">
    <div class="row d-flex justify-content-between">
      <div class="col-md-3 col-sm-3">
        <div class="footer_style">
          <ul>
            <li><a href="../index.php">
              <img src="../../public/assets/fontend/img/logo.jpg" alt="" height="80" width="80">
            </a></li>
            <li class="footerContent">Reader's is an online best solution to find any kind of book.</li>
            <li style="display: flex; margin-left: -45px;">
              <input type="email" class=" border" name="" id="email" placeholder="Your Email Address" required>
              <a href="" class="btn btn-success mx-2">Subscribe</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-3">
        <div class="footercontact">
          
          <div>
            
            <ul>
              <h4>Contact Info</h4>
              <li>Address: <br>Level-5, Rajuk Rajib, Cosmo Shopping Complex, Plot-71 Sector-7, ঢাকা 1230 </li>
              <li>Phone: <br>
                +8801580339094
              </li>
              <li>Email: <br>
              support@readers.com.bd</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-3">
        <div class="footercontact">
          <ul>
            <h4>USFUL LINK</h4>
            <li>Blog</li>
            <li>Contact Us</li>
            <li>Coupon</li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-3">
        <div class="footercontact">
          <ul>
            <h4>MY ACCOUNT</h4>
            <li><a href="login.php" style="text-decoration: none; color: #fff;">Login</a></li>
            <li>Order History</li>
            <li>My Wishlist</li>
            <li>Track Order</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- footer end -->
    <!-- fontawesome js file -->
    <script src="https://kit.fontawesome.com/1baf502ca2.js" crossorigin="anonymous"></script>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>