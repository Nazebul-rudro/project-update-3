<?php

use rudhro\Category\Category;

include_once("../../vendor/autoload.php");

$category = new Category;
$categories = $category->index();



if($_SERVER["REQUEST_METHOD"] == "POST"){
    $category = new Category;
    $category->delete($_POST);
}
?>


<!DOCTYPE html>
<html lang="en">
<?php include_once("../inc/head.php") ?>
<?php include_once("../inc/header.php"); ?>


<div class="container-fluid">
    <div class="row flex-nowrap">
        <?php include_once("../inc/sidebar.php"); ?>
        <div class="col py-3">
            <div class="px-4">
                <h2>Crate Category || <a href="../category/categorylist.php" class="text-decoration-none">List</a></h2>
                <a href="./createcetegory.php" class="btn btn-success mt-2">Create Category</a>
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Category Name</th>
                                <th>Category Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($categories as $value) {
                            ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $value['c_name']; ?></td>
                                    <td><?= $value['c_details']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <div>
                        <form action="" method="post">
                            <select class="form-select" aria-label="Default select example" name="ct">
                                <option disabled selected>Deleted Category</option>
                                <?php foreach($categories as $option){ ?>
                                <option value="<?php echo $option['id'];?>"> <?php echo $option['c_name'];?></option>
                                <?php } ?>
                            </select>
                            <div class="d-flex justify-content-end mt-3">
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </v>
        </div>
    </div>
</div>


<?php include_once("../inc/footer.php"); ?>

</html>