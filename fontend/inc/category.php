<?php
$weebpathslider = "http://localhost:/project/public/assets/admin/img/uploads_slider/";

$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=books", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$stmt = $conn->query("SELECT * FROM slider");

$sliders = $stmt->fetchAll();
// print_r($sliders);












$servername = "localhost";
$username = "root";
$password = "";
// $weebpathslider = 'http://localhost:/project/public/assets/admin/img/uploads_slider/';



try {
  $conn = new PDO("mysql:host=$servername;dbname=books", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //   echo "Connected successfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


// $data = [
//     'name' => $name,
//     'surname' => $surname,
//     'sex' => $sex,
// ];
// $sql = "INSERT INTO users (name, surname, sex) VALUES (:name, :surname, :sex)";
// $stmt= $pdo->prepare($sql);
// $stmt->execute($data);

$stmt = $conn->query("SELECT * FROM categorylists");
$categories = $stmt->fetchAll();
// print_r($categories);



?>



<div class="container mt-4">
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-3 ">
      <div class="card" style="height:100%">
        <div class="card-body">
          <h2></h2>
          <div class="card">
            <div class="card-header bg-warning">
              Categories
            </div>
            <ul class="list-group list-group-flush">
              <?php foreach ($categories as $ctlist) { ?>
                <li class="list-group-item"><a href="category/productlist.php" class="text-decoration-none"><?= $ctlist['c_name']; ?></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-7 col-md-7 col-sm-7 d-flex justify-content-center mt-3">
      <div class="">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
          <?php
           $counter = 0;
          $active = 'active';
            foreach ($sliders as $slider) {

            ?>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$counter;?>" aria-current="true" class="<?=$active;?>"  aria-label="Slide 1"></button>
            <?php
           $counter++;
            $active = '';
            
          }
            ?>
            <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
          </div>
          <div class="carousel-inner">
            <?php
           $active = 'active';
            foreach ($sliders as $slider) {

            ?>

              <div class="carousel-item <?=$active?>">
                <img src="<?= $weebpathslider.$slider['image']; ?>" class="d-block w-100" alt="..." height="130">
              </div>
            <?php
            $active = '';
            }
            

            ?>

          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

        <div style="margin-top: 30px;">
          <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <img src="../public/assets/fontend/img/book1.jpg" class="card-img-top" alt="...">
                  <div class="pt-2">
                    <a href="" class="text-decoration-none">Classics</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <img src="../public/assets/fontend/img/book2.jpg" class="card-img-top" alt="...">
                  <div class="pt-2">
                    <a href="" class="text-decoration-none">Crime</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <img src="../public/assets/fontend/img/book1.jpg" class="card-img-top" alt="...">
                  <div class="pt-2">
                    <a href="" class="text-decoration-none">Horor</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <img src="../public/assets/fontend/img/book1.jpg" class="card-img-top" alt="...">
                  <div class="pt-2">
                    <a href="" class="text-decoration-none">Humar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-2 col-md-2 col-sm-2 d-flex justify-content-end">

      <div>
        <div class="card">
          <div class="card-body">
            <img src="../public/assets/fontend/img/book5.jpg" class="card-img-top" alt="..." height="80px">
            <p class="card-text mt-2">White Latos</p>
            <a href="" class="btn btn-warning">Price $40</a>
          </div>
        </div>
        <div class="card mt-4">
          <div class="card-body">
            <img src="../public/assets/fontend/img/book6.jpg" class="card-img-top" alt="..." height="80px">
            <p class="card-text mt-2">conch shell</p>
            <a href="" class="btn btn-warning">Price $20</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>