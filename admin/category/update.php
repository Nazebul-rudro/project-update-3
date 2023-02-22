<?php

// include_once("../../vendor/autoload.php");
// use rudhro\Category\Category;

// $categoryupdate = new Category;

// if(isset($_SERVER["REQUEST_METHOD"])== "POST"){
//     $categoryupdate->update($_POST);
    
// }





session_start();
$_SESSION["ins_update"] = "Update successfully";

$id = $_GET['id'];


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

$stmt = $conn->query("SELECT * FROM booklists WHERE id=$id");
$categories = $stmt->fetch();
// print_r($categories);


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
<?php include_once("../inc/sidebar.php");?>
<div class="col py-3">
    <h2>Update ||  <a href="./categorylist.php" class="text-decoration-none">List</a></h2>
    <div class="card my-4">
        <div class="card-body">
        <form action="update-store.php" method="post">
            <div>
            <input type="hidden" name="id" id="" value="<?=$id?>">
                <label for="" class="form-label mt-1">Book Name</label>
                <input type="text" name="bookname" id="" value="<?=$categories['bookname']?>" class="form-control mt-1">
            </div>
            <div>
                <label for="" class="form-label mt-1">Author Name</label>
                <input type="text" name="authorname" id="" value="<?=$categories['authorname']?>" class="form-control mt-1">
            </div>
            <div>
                <label for="" class="form-label mt-1">Discription</label>
                <input type="text" name="discription" id="" value="<?=$categories['discription']?>" class="form-control mt-1">
            </div>
            <div>
                <label for="" class="form-label mt-1">Price</label>
                <input type="number" name="price" id="" value="<?=$categories['price']?>" class="form-control mt-1">
            </div>
            <div class="mt-3 d-flex justify-content-end">
              <input type="submit" value="Update" class="btn btn-warning">
            </div>
        </form> 
            
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