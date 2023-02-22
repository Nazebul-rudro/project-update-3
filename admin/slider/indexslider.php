<?php

$webdir = "http://localhost:/project/public/assets/admin/img/uploads_slider/";

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



?>

<!DOCTYPE html>
<html lang="en">
<?php include_once("../inc/head.php") ?>
<?php include_once("../inc/header.php"); ?>


<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php include_once("../inc/sidebar.php"); ?>
        <div class="col py-4 mx-3">
            <h2>Slider Image ||</h2>
            <a href="insertslider.php" class="btn btn-success mt-3">Create Slider</a>
                    <div class="card-body">
            <div class="mt-5 d-flex justify-content-center">
                <div class="card" style="width: 1000px;">
                
                        

                        <div>
                            <div class="card">
                                <div class="">
                                    <table class="table">
                                        <thead>
                                           <tr>
                                           <th>sl</th>
                                            <th>Title</th>
                                            <th>Discritption</th>
                                            <th>image</th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php 
                                             $z = 0;
                                            foreach($sliders as $slider){
                                                
                                            ?>
                                            <tr>
                                            <td><?php echo $z++; ?></td>
                                            <td><?=$slider['slider_title'];?></td>
                                            <td><?=$slider['slider_discription'];?></td>
                                            <td><img src="<?=$webdir.$slider['image'];?>" height="20" width="100"></td>
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
            </div>
        </div>
    </div>
</div>

<?php include_once("../inc/footer.php"); ?>

</html>