<?php

include_once("../../vendor/autoload.php");

use rudhro\Maincategory\Maincategory;
$maincategory = new Maincategory;
if(isset($_SERVER['REQUEST_METHOD']) == "POST"){
  $maincategory->store($_POST, $_FILES);
}


$servername = "localhost";
$username = "root";
$password = "";

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
            <h2>Product Add || </h2>
            <div class="card my-4">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mt-2">
                            <label for="" class="form-label"><strong>Book Name</strong></label>
                            <input type="text" name="bookname" id="" class="form-control">
                        </div>
                        <div class="mt-2">
                            <label for="" class="form-label"><strong>Author Name</strong></label>
                            <input type="text" name="authorname" id="" class="form-control">
                        </div>
                        <div class="mt-2">
                            <label for="" class="form-label"><strong>Discription</strong></label>
                            <input type="text" name="discription" id="" class="form-control">
                        </div>
                        <div class="mt-2">
                            <label for="" class="form-label"><strong>Price</strong></label>
                            <input type="number" name="price" id="" class="form-control">
                        </div>
                        <div class="mt-2">
                            <label for="categorylist"><strong>Select Category :</strong></label>
                            <select class="form-select" aria-label="Default select example" name="ct" id="categorylist">
                                <option selected disabled>Select Category</option>
                                <?php foreach($categories as $option){ ?>
                                <option value="<?php echo $option['id'];?>"> <?php echo $option['c_name'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mt2">
                            <label for="" class="form-label"><strong>Book Image</strong> </label>
                            <input type="file" name="image" id="" class="form-control">
                        </div>
                        <div class="mt-3 d-flex justify-content-center">
                            <input type="submit" value="Add" class="btn btn-success">
                        </div>
                    </form>
                </div>
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