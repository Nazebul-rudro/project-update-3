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

$stmt = $conn->query("SELECT * FROM booklists LIMIT 6");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>


<section>
  <div class="container">
    <h2 class="pb-2 fs-3">Recent Books</h2>
    <div class="row justify-content-between">
      <?php foreach($categories as $category){?>
      <div class="col-lg-2 col-md-2 col-sm-2">
        <div class="card">
          <div class="card-body text-center">
          <img src="../public/assets/fontend/img/book8.jpg" class="card-img-top" alt="..." height="150" width="100">
          <div class="">
            <h5 class="card-title mt-3"><?=$category['bookname'];?></h5>
            <p class="card-text"><?="$".$category['price'];?></p>
            <a href="category/product_details.php?id=<?=$category['id'];?>" class="btn btn-outline-warning">View Details</a>
          </div>
          </div>
        </div>
      </div>
      <?php }  ?>
    </div>
  </div>
</section>