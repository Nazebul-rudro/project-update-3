<?php 

namespace rudhro\Helper;
namespace rudhro\Maincategory;
use rudhro\Helper;

class Maincategory{



    public function __construct(){
    session_start();
    }
    
    public function store($storedata, $files){
        @$bookname = $storedata['bookname'];
@$authorname = $storedata['authorname'];
@$discription = $storedata['discription'];
@$price = $storedata['price'];
@$category_id = $storedata["ct"];
@$image = $files['image']['name'];
@$tmp_name = $files['image']['tmp_name'];
@$targetdir = $_SERVER['DOCUMENT_ROOT']."/project/public/assets/admin/img/products/";
@move_uploaded_file($tmp_name, $targetdir.$image);


    $data = [
        'category_id' => $category_id,
        'bookname' =>$bookname,
        'authorname' => $authorname,
        'discription' => $discription,
        'price' => $price,
        'image' => $image,
        
    ];

    if(!empty($bookname && $authorname && $discription && $price && $category_id && $image)){
// databse connection
$db = new Helper;
$db->dbconnection();

// sql connection
    $sql = "INSERT INTO booklists (category_id, bookname, authorname, discription, price, image) VALUES (:category_id, :bookname, :authorname, :discription, :price, :image)";
    // prepare query
    $stmt = $db->prearesql($sql);
    // $stmt= $conn->prepare($sql);
    // execute query
    $stmt->execute($data);
    $_SESSION["ins_success"] = "Insert Successfully";
    header('Location: categorylist.php');
    }
    }

}
