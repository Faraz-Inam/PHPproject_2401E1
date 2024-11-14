<?php 
include("header.php");
include("Admin/connection.php");

if(isset($_GET['id'])){
    $p_id = $_GET['id'];

    $products = "SELECT * FROM `products` WHERE `product_id` = '$p_id'";
    $query = mysqli_query($connect, $products);
}
?>


 


    <!-- About Start -->
    <div class="container-xxl py-5 mt-5">
        <div class="container mt-5">
            <div class="row g-5 align-items-center">
           <?php $fetch = mysqli_fetch_assoc($query) ?>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="Admin/product_images/<?php echo $fetch['product_image'] ?>">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-5 mb-4"><?php echo $fetch['product_name'] ?></h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <p><i class="fa fa-check text-primary me-3"></i> Price: <?php echo $fetch['product_price'] ?></p>
                    <p><i class="fa fa-check text-primary me-3"></i>Model: <?php echo $fetch['product_model'] ?></p>
                    <p><i class="fa fa-check text-primary me-3"></i>Specification: <?php echo $fetch['product_specification'] ?></p>
                    <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="">Buy Now</a>
                    <a class="btn btn-warning rounded-pill py-3 px-5 mt-3" href="">Add to Cart</a>
                </div>
                <?php  ?>
            </div>
        </div>
    </div>
    <!-- About End -->


<?php 
include("footer.php");
?>