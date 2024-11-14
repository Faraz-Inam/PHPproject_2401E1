<?php 
include("header.php");
include("connection.php");


if(isset($_GET['i'])){
    $p_id = $_GET['i'];
    $sel_pr = "SELECT p.*, c.category_name, b.brand_name
    FROM `products` p
    INNER JOIN `categories` c
    ON p.category_id = c.category_id
    INNER JOIN `brands` b
    ON p.brand_id = b.brand_id WHERE product_id = '$p_id'";

    $sel_query = mysqli_query($connect, $sel_pr);
    $fetch_pr = mysqli_fetch_assoc($sel_query);
    ?>

    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
           <form action="" method="post" enctype="multipart/form-data">

            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Select</h6>
                   
                    <select name="c_id" class="form-select mb-3" aria-label="Default select example">
                        <option <?php echo $fetch_pr['category_id']?>> <?php echo $fetch_pr['category_name']?> </option>
                        <?php
                        $cat = "SELECT * FROM categories";
                        $cat_q = mysqli_query($connect, $cat);
                        while($option = mysqli_fetch_assoc($cat_q)){ ?>
                            <option value=" <?php echo $option['category_id']?> "> <?php echo $option['category_name']?> </option>
                     <?php   }
                        ?>
                        
                    </select>

                    <select name="b_id" class="form-select mb-3" aria-label="Default select example">
                        <option <?php echo $fetch_pr['brand_id']?>><?php echo $fetch_pr['brand_name']?></option>
                        <?php
                         $brand = "SELECT * FROM brands";
                         $brand_q = mysqli_query($connect, $brand);
                        while($option = mysqli_fetch_assoc($brand_q)){ ?>
                            <option value=" <?php echo $option['brand_id']?> "> <?php echo $option['brand_name']?> </option>
                     <?php   }
                        ?>

                    </select>

                    <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="p_name" value="<?php echo $fetch_pr['product_name'] ?>"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Product Price</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="p_price" value="<?php echo $fetch_pr['product_price'] ?>"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Product Model</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="p_model" value="<?php echo $fetch_pr['product_model'] ?>"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Product Specification</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="p_spec" value="<?php echo $fetch_pr['product_specification'] ?>"
                                aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Product image</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" name="p_image"
                                aria-describedby="emailHelp">
                        </div>

                        <img src="product_images/<?php echo $fetch_pr['product_image']?>" alt="" width="100px">
                    
                        <button type="submit" class="btn btn-primary" name="update_btn">Update</button> 
                </div>
            </div>

            </form>
        </div>
    </div>
    <!-- Form End -->
 <?php } 
 
 if(isset($_POST['update_btn'])){
    $c_id = $_POST['c_id'];
    $b_id = $_POST['b_id'];
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $p_model = $_POST['p_model'];
    $p_spec = $_POST['p_spec'];

    $p_image = $_FILES['p_image'];

   $update  =  "UPDATE `products` SET `product_name`='$p_name',`product_price`='$p_price',`product_model`='$p_model',`product_specification`='$p_spec',`category_id`='$c_id',`brand_id`='$b_id' WHERE product_id = '$p_id'";
   $done = mysqli_query($connect, $update);
    if($done){
        echo "<script>
        alert('Product Updated!');
        window.location.href = 'viewProduct.php';
        </script>";
       }
}
 ?>



<?php 
include("footer.php");
?>