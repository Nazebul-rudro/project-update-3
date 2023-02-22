<?php



session_start();

if(isset($_SERVER['REQUEST_METHOD']) == "POST"){
    $id = $_POST['id'];
}



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

$sql = "DELETE FROM booklists WHERE id= $id";
$stmt = $conn-> prepare($sql);
$stmt->execute();

$_SESSION['ins_delete'] = 'Deleted Successfully';

header('Location: categorylist.php');




?>