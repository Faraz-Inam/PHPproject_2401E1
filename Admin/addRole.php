<?php 
include("header.php");
include("connection.php");
?>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Role</h6>
                            <form method="POST">

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Role Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="role_name"
                                        aria-describedby="emailHelp">
                                </div>
                            
                                <button type="submit" class="btn btn-primary" name="role_btn">Add</button> 
                            </form>
                        </div>
                    </div>
                   
                </div>
            </div>
            <!-- Form End -->

            <?php

            if(isset($_POST['role_btn'])){
                $r_name = $_POST['role_name'];

                $insert = "INSERT INTO `roles` (role_name)
                VALUES ('$r_name')";

               $done =  mysqli_query($connect, $insert);

               if($done){
                echo "<script>
                alert('Role Added!');
                window.location.href = 'viewRole.php';
                </script>";
               }
            }
            ?>

            <?php 
include("footer.php");
?>