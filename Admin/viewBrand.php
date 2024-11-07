<?php 
include("header.php");
?>
<?php 
include("connection.php");
$select = "SELECT * FROM `brands`";
$row = mysqli_query($connect, $select);

?>


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
            
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">View Brand</h6>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Brand Id</th>
                                        <th scope="col">Brand Name</th>
                                        <th scope="col">Edit Brand</th>
                                        <th scope="col">Delete Brand</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($data = mysqli_fetch_assoc($row)){
                                    ?>
                                    <tr>
                                        <th scope="row"> <?php echo $data['brand_id']; ?> </th>
                                        <td> <?php echo $data['brand_name']?></td>
                                        <td> <a href="viewBrand.php?i=<?php echo $data['brand_id']?>" class="btn btn-warning">Edit</a> </td>
                                        <td> <a href="viewBrand.php?j=<?php echo $data['brand_id']?>" class="btn btn-danger" onclick="return confirm('are you sure!')">Delete</a> </td>
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
                $b_id = $_GET['i'];
                $select = "SELECT * FROM `brands` WHERE `brand_id` = '$b_id'";
                $row = mysqli_query($connect, $select);

                $data = mysqli_fetch_assoc($row);
?>
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Brand</h6>
                            <form action="" method="POST">

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Update Brand Name</label>
                                    <input value="<?php echo $data['brand_name'] ?>" type="text" class="form-control" id="exampleInputEmail1" name="brand_name"
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
                    $b_name = $_POST['brand_name'];
                    $updated = "UPDATE `brands` SET `brand_name` = '$b_name' WHERE `brand_id` = '$b_id'";
                   $done = mysqli_query($connect, $updated);

                   
                    if($done){
                        echo "<script>
                        alert('Record Updated!');
                        window.location.href = 'viewBrand.php';
                        </script>";
                       }
                   
                }

           }
            ?>
<!-- DELETE  -->
<?php
if(isset($_GET['j'])){
                $b_id = $_GET['j'];
                $delete = "DELETE FROM `brands` WHERE `brand_id` = '$b_id'";
                $done = mysqli_query($connect, $delete);

                if($done){
                    echo "<script>
                    alert('Record Deleted!');
                    window.location.href = 'viewBrand.php';
                    </script>";
                   }
               
            }

                ?>
<?php 
include("footer.php");
?>