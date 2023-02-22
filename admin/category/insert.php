<?php



// database connection


// include_once("../../vendor/autoload.php");
// use rudhro\Category\Category;
// $store_Category = new Category;

// if(isset($_SERVER['REQUEST_METHOD']) == "POST"){
//   $store_Category->store($_POST);
// }


// echo $_SERVER['DOCUMENT_ROOT'];
// $servername = "localhost";
// $username = "root";
// $password = "";

// try {
//   $conn = new PDO("mysql:host=$servername;dbname=books", $username, $password);
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch(PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// }



// // insert data

// if(isset($_SERVER['REQUEST_METHOD']) == "POST"){
// $bookname = $_POST['bookname'];
// $authorname = $_POST['authorname'];
// $discription = $_POST['discription'];
// $price = $_POST['price'];
// $category_id = $_POST["ct"];
// $image = $_FILES['image']['name'];
// $tmp_name = $_FILES['image']['tmp_name'];
// $targetdir = $_SERVER['DOCUMENT_ROOT']."/project/public/assets/admin/img/products/";
// move_uploaded_file($tmp_name, $targetdir.$image);


//     $data = [
//         'category_id' => $category_id,
//         'bookname' =>$bookname,
//         'authorname' => $authorname,
//         'discription' => $discription,
//         'price' => $price,
//         'image' => $image,
        
//     ];
//     $sql = "INSERT INTO booklists (category_id, bookname, authorname, discription, price, image) VALUES (:category_id, :bookname, :authorname, :discription, :price, :image)";
//     $stmt= $conn->prepare($sql);
//     $stmt->execute($data);
    
//     $_SESSION["ins_success"] = "Insert Successfully";

//     header('Location: categorylist.php');
    
    



    
// }




?>