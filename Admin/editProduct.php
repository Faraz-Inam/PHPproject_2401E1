<?php
include("header.php");
include("connection.php");

if(isset($_GET['i'])){
    $p_id = $_GET['i'];

$select = "SELECT p.*, category_name, brand_name
FROM products p
INNER JOIN categories c
ON c.category_id = p.category_id
INNER JOIN brands b
ON b.brand_id = p.brand_id WHERE product_id = '$p_id'";
$query = mysqli_query($connect, $select);
$fetch_pr = mysqli_fetch_assoc($query);
?>

<!-- Form Start -->
<form action="" method="post" enctype="multipart/form-data">
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Update Product</h6>

                            <select name="c_id" class="form-select mb-3" aria-label="Default select example">
                                <!-- <option value="<?php echo $fetch_pr['category_id'] ?>"> <?php echo $fetch_pr['category_name'] ?></option> -->
                                <?php
                                $sel_cat = "SELECT * FROM categories";
                                $query_cat = mysqli_query($connect, $sel_cat);
                                while($fetch_cat = mysqli_fetch_assoc($query_cat)){ ?>
                 
                                <option value="<?php echo $fetch_cat['category_id'] ?>" <?php if($fetch_pr['category_id'] == $fetch_cat['category_id']){echo "selected = 'selected'";} ?>> <?php echo $fetch_cat['category_name'] ?> </option>

                              <?php  }?>
                               
                            </select>

                            <select name="b_id" class="form-select mb-3" aria-label="Default select example">
                                 <!-- <option value="<?php echo $fetch_pr['brand_id'] ?>"> <?php echo $fetch_pr['brand_name'] ?></option> -->
                                <?php
                                $sel_brand = "SELECT * FROM brands";
                                $query_brand = mysqli_query($connect, $sel_brand);
                                while($fetch_brand = mysqli_fetch_assoc($query_brand)){ ?>
                 
                                <option value="<?php echo $fetch_brand['brand_id'] ?>" <?php if($fetch_pr['brand_id'] == $fetch_brand['brand_id']){ echo "selected = 'selected'";} ?>> <?php echo $fetch_brand['brand_name'] ?> </option>


                              <?php  }?>
                               
                            </select>
                            
                            <label for="pn" class="form-label">Product Name</label>
                                    <input type="text" name="p_name" value="<?php echo $fetch_pr['product_name'] ?>" class="form-control" id="pn"
                                        aria-describedby="emailHelp">

                                        <label for="pp" class="form-label">Product Price</label>
                                    <input type="text" name="p_price" value="<?php echo $fetch_pr['product_price'] ?>" class="form-control" id="pp"
                                        aria-describedby="emailHelp">

                                        <label for="pm" class="form-label">Product Model</label>
                                    <input type="text" name="p_model" value="<?php echo $fetch_pr['product_model'] ?>" class="form-control" id="pm"
                                        aria-describedby="emailHelp">

                                        <label for="ps" class="form-label">Product Specification</label>
                                    <input type="text" name="p_spec" value="<?php echo $fetch_pr['product_specification'] ?>" class="form-control" id="ps"
                                        aria-describedby="emailHelp">

                                        <label for="pi" class="form-label">Product Image</label>
                                    <input type="file" name="p_image" class="form-control" id="pi"
                                        aria-describedby="emailHelp">

                                        <img src="product_images/<?php echo $fetch_pr['product_image'] ?>" alt="">

                            <button type="submit" name="update_product" class="btn btn-primary m-2">Update</button>
                            
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <!-- Form End -->
<?php 
// } 

if(isset($_POST['update_product'])){
    $c_id = $_POST['c_id'];
    $b_id = $_POST['b_id'];
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $p_model = $_POST['p_model'];
    $p_spec = $_POST['p_spec'];

    $p_image = $_FILES['p_image'];
    $img_name = $p_image['name'];
    $img_tmpname = $p_image['tmp_name'];
    $img_size = $p_image['size'];
    $img_type = $p_image['type'];

    $path = 'product_images/' . $img_name;

    if(is_uploaded_file($img_tmpname)){
        move_uploaded_file($img_tmpname,$path);

        $update = "UPDATE `products` SET `product_name`='$p_name',`product_price`='$p_price',`product_model`='$p_model',`product_specification`='$p_spec', `product_image` = '$img_name', `category_id`='$c_id',`brand_id`='$b_id' WHERE `product_id` = '$p_id'";
        $done = mysqli_query($connect, $update);
        if($done){
            echo
            "<script>
            alert('Product Updated With Image!');
            window.location.href = 'viewProduct.php';
            </script>";
        }
    }
    else{
        $update = "UPDATE `products` SET `product_name`='$p_name',`product_price`='$p_price',`product_model`='$p_model',`product_specification`='$p_spec', `category_id`='$c_id',`brand_id`='$b_id' WHERE `product_id` = '$p_id'";
        $done = mysqli_query($connect, $update);
        if($done){
            echo
            "<script>
            alert('Product Updated Without Image!');
            window.location.href = 'viewProduct.php';
            </script>";
        }
    }
}
}



// DELETE CODE 
if(isset($_GET['j'])){
    $p_id = $_GET['j'];


$delete = "DELETE FROM products WHERE product_id = '$p_id'";
$done = mysqli_query($connect, $delete);
if($done){
    echo
    "<script>
    alert('Product Deleted!');
    window.location.href = 'viewProduct.php';
    </script>";
}
}

?>

<?php
include("footer.php");
?>