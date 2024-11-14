<?php 
include("header.php");
include("connection.php");


$select = "SELECT p.product_id, p.product_name, p.product_price, p.product_model, p.product_specification, p.product_image, c.category_name, b.brand_name 
FROM `products` p
INNER JOIN `categories` c
ON p.category_id = c.category_id
INNER JOIN `brands` b
ON p.brand_id = b.brand_id";

$row = mysqli_query($connect, $select);

?>


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
            
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">View Category</h6>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Product Id</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Product Price</th>
                                        <th scope="col">Product Model</th>
                                        <th scope="col">Product Specification</th>
                                        <th scope="col">Product Image</th>
                                        <th scope="col">Category Id</th>
                                        <th scope="col">Brand Id</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($data = mysqli_fetch_assoc($row)){
                                    ?>
                                    <tr>
                                        <td scope="row"> <?php echo $data['product_id']; ?> </td>
                                        <td> <?php echo $data['product_name']?></td>
                                        <td> <?php echo $data['product_price']?></td>
                                        <td> <?php echo $data['product_model']?></td>
                                        <td> <?php echo $data['product_specification']?></td>
                                        <td> <img src="product_images/<?php echo $data['product_image']?> " alt="error" width="100px"></td>
                                        <td> <?php echo $data['category_name']?></td>
                                        <td> <?php echo $data['brand_name']?></td>
                                        <td> <a href="editProduct.php?i=<?php echo $data['product_id']?>" class="btn btn-warning">Edit</a> </td>
                                        <td> <a href="editProduct.php?j=<?php echo $data['product_id']?>" class="btn btn-danger">Delete</a> </td>
                                    </tr>

                               <?php }?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            
            <!-- Table End -->
<?php

// UPDATED 
            if(isset($_GET['i'])){
                $c_id = $_GET['i'];
                $select = "SELECT * FROM `categories` WHERE `category_id` = '$c_id'";
                $row = mysqli_query($connect, $select);

                $data = mysqli_fetch_assoc($row);
?>
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Category</h6>
                            <form action="" method="POST">

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Update Category Name</label>
                                    <input value="<?php echo $data['category_name'] ?>" type="text" class="form-control" id="exampleInputEmail1" name="category_name"
                                        aria-describedby="emailHelp">
                                </div>
                            
                                <button type="submit" class="btn btn-primary" name="update_btn">Update</button> 
                            </form>

                            
                        </div>
                    </div>
                </div>
            </div>
<?php 
                if(isset($_POST['update_btn'])){
                    $c_name = $_POST['category_name'];
                    $updated = "UPDATE `categories` SET `category_name` = '$c_name' WHERE `category_id` = '$c_id'";
                   $done = mysqli_query($connect, $updated);

                   
                    if($done){
                        echo "<script>
                        alert('Record Updated!');
                        window.location.href = 'viewCategory.php';
                        </script>";
                       }
                   
                }

           }
            ?>
<!-- DELETE  -->
<?php
if(isset($_GET['j'])){
                $c_id = $_GET['j'];
                $delete = "DELETE FROM `categories` WHERE `category_id` = '$c_id'";
                $done = mysqli_query($connect, $delete);

                if($done){
                    echo "<script>
                    alert('Record Deleted!');
                    window.location.href = 'viewCategory.php';
                    </script>";
                   }
               
            }

                ?>
<?php 
include("footer.php");
?>