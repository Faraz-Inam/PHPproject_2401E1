<?php 
include("header.php");
?>

<?php 
include("connection.php");
$c_sel = "SELECT * FROM `categories`";
$c_row = mysqli_query($connect, $c_sel);

$b_sel = "SELECT * FROM `brands`";
$b_row = mysqli_query($connect, $b_sel);



?>


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                   <form action="" method="post" enctype="multipart/form-data">

                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Select</h6>
                           
                            <select name="c_id" class="form-select mb-3" aria-label="Default select example">
                                <option selected>Select Category</option>
                                <?php
                                while($option = mysqli_fetch_assoc($c_row)){ ?>
                                    <option value=" <?php echo $option['category_id']?> "> <?php echo $option['category_name']?> </option>
                             <?php   }
                                ?>
                                
                            </select>

                            <select name="b_id" class="form-select mb-3" aria-label="Default select example">
                                <option selected>Select Brand</option>

                                <?php
                                while($option = mysqli_fetch_assoc($b_row)){ ?>
                                    <option value=" <?php echo $option['brand_id']?> "> <?php echo $option['brand_name']?> </option>
                             <?php   }
                                ?>

                            </select>

                            <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="p_name"
                                        aria-describedby="emailHelp">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Price</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="p_price"
                                        aria-describedby="emailHelp">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Model</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="p_model"
                                        aria-describedby="emailHelp">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product Specification</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="p_spec"
                                        aria-describedby="emailHelp">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Product image</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1" name="p_image"
                                        aria-describedby="emailHelp">
                                </div>
                            
                                <button type="submit" class="btn btn-primary" name="product_btn">Add</button> 
                        </div>
                    </div>

                    </form>
                </div>
            </div>
            <!-- Form End -->
<?php 
if(isset($_POST['product_btn'])){
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $p_model = $_POST['p_model'];
    $p_spec = $_POST['p_spec'];
    $c_id = $_POST['c_id'];
    $b_id = $_POST['b_id'];

    $p_image = $_FILES['p_image'];
    $img_name = $p_image['name'];
    $img_tmpname = $p_image['tmp_name'];
    $img_size = $p_image['size'];
    $img_type = $p_image['type'];

    // $directory = 'product_images/';
    $path = 'product_images/' . $img_name;

    move_uploaded_file($img_tmpname, $path);

    $insert = "INSERT INTO `products`(`product_name`, `product_price`, `product_model`, `product_specification`, `product_image`, `category_id`, `brand_id`) 
    VALUES ('$p_name','$p_price','$p_model','$p_spec','$img_name','$c_id','$b_id')";

    $done = mysqli_query($connect, $insert);
    if($done){
        echo "<script>
        alert('Product Inserted!');
        window.location.href = 'viewProduct.php';
        </script>";
       }

}

?>
            <?php 
include("footer.php");
?>