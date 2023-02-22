<?php

session_start();
// $id = $_GET['id'];



// print_r($categories);


if(isset($_SERVER["REQUEST_METHOD"])== "POST"){
    $bookname = $_POST["bookname"];
    $authorname = $_POST["authorname"];
    $discription = $_POST["discription"];
    $price = $_POST["price"];
    $id = $_POST['id'];
}

$data =[
    'bookname' => $bookname,
    'authorname' => $authorname,
    'discription' => $discription,
    'price' => $price
];


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







$sql = "UPDATE booklists SET bookname=:bookname, authorname=:authorname, discription=:discription, price=:price WHERE id=$id";

$stmt= $conn->prepare($sql);
$stmt->execute($data);


$_SESSION['ins_update'] = "Update Successfully";

header('Location: categorylist.php');


?>