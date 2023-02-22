<?php
session_start();


$dir='http://localhost:/project/public/assets/admin/img/products/';


$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=books", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$stmt = $conn->query("SELECT booklists.*, categorylists.c_name FROM booklists LEFT JOIN categorylists ON booklists.category_id = categorylists.id");

// $stmt = $conn->query("SELECT * FROM booklists");
$categories = $stmt->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<?php
include_once("../inc/head.php");
?>
<?php
include_once("../inc/header.php");
?>
<div class="container-fluid">
  <div class="row flex-nowrap">
    <?php include_once("../inc/sidebar.php"); ?>
    <div class="col py-3">
      <h2 class="mt-2">Category List || </h2>
      <?php
      if (isset($_SESSION["ins_success"])) {
      ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> <?php echo $_SESSION["ins_success"]; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

      <?php
        session_unset();
      }
      ?>

      <?php
      if (isset($_SESSION['ins_update'])) {
      ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Success!</strong> <?php echo $_SESSION['ins_update']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

      <?php
        session_unset();
      }
      ?>
      <?php
      if (isset($_SESSION['ins_delete'])) {
      ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Success!</strong> <?php echo $_SESSION['ins_delete']; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

      <?php
        session_unset();
      }
      ?>

      <a href="addproduct.php" class="btn btn-success mt-2">Add Product</a>
      <div class="card my-4">
        <div class="card-body">

          <table class="table">
            <thead>
              <tr>
                <th>SL No</th>
                <th>Book Name</th>
                <th>Category</th>
                <th>Product Image</th>
                <th>Price</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody style="font-size: 14px;">
              <?php
              $i = 0;
              foreach ($categories as $category) {
              ?>
                <tr>
                  <td>
                    <?php
                    echo $i++;
                    
                    ?>
                  </td>
                  <td><?= $category['bookname']; ?></td>
                  <td><?= $category['c_name']; ?></td>
                  
                  <td><img src="<?=$dir.$category['image']; ?>" alt="" height="30" width="40"></td>
                  <td><?= $category['price']; ?></td>
                  <td class="d-flex">
                    <a href="categorydetails.php?id=<?php echo $category['id']; ?>" class="text-decoration-none btn btn-success ">Show</a>
                    <a href="update.php?id=<?php echo $category['id']; ?>" class="text-decoration-none btn btn-warning mx-2">Update</a>
                    <form action="deleted.php" method="post">
                      <input type="hidden" name="id" value="<?= $category['id']; ?>">
                      <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include_once("../inc/footer.php");
?>

</body>

</html>