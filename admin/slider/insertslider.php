<?php

if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
    @$slider_title = $_POST['slider_title'];
    @$slider_discription = $_POST['slider_discription'];
    @$img = $_FILES['image']['name'];
    @$tmp_name = $_FILES['image']['tmp_name'];

    $targetdir = $_SERVER['DOCUMENT_ROOT']."/project/public/assets/admin/img/uploads_slider/";
    @move_uploaded_file($tmp_name, $targetdir.$img);


    $data = [
        'slider_title' => $slider_title,
        'slider_discription' => $slider_discription,
        'img' => $img,
    ];

    if(!empty($slider_title && $slider_discription && $img)){
        
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


    $sql = "INSERT INTO slider (slider_title, slider_discription, image) VALUES (:slider_title, :slider_discription, :img)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    header('Location: indexslider.php');
    }
}



?>




<!DOCTYPE html>
<html lang="en">
<?php include_once("../inc/head.php") ?>
<?php include_once("../inc/header.php"); ?>


<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php include_once("../inc/sidebar.php"); ?>
        <div class="col py-4 mx-3">
            <h2>Add Category ||</h2>
            <div class="mt-5 d-flex justify-content-center">
                <div class="card" style="width: 600px;">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mt-2">
                                <label for="title">Slider Title</label>
                                <input type="text" name="slider_title" id="title" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label for="discription">Slider discription</label>
                                <input type="text" name="slider_discription" id="title" class="form-control">
                            </div>
                            <div class="mt-2">
                                <label for="img">Slider Image</label>
                                <input type="file" name="image" id="" class="form-control">
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <input type="submit" value="Add Slider" class="btn btn-success form-control">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("../inc/footer.php"); ?>

</html>