<?php
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
    <h2>Category List ||  <a href="./categorylist.php" class="text-decoration-none">List</a></h2>
    <div class="card my-4">
        <div class="card-body">
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Book Name</th>
                        <th>Author Name</th>
                        <th>Discription</th>
                        <th>Price</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$categories["bookname"];?></td>
                        <td><?=$categories['authorname'];?></td>
                        <td><?=$categories['discription'];?></td>
                        <td><?=$categories['price'];?></td>
                        
                        
                    </tr>
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