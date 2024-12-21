<?php 
include("header.php");
?>
<?php 
include("connection.php");
$select = "SELECT * FROM `roles`";
$row = mysqli_query($connect, $select);

?>


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
            
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">View Role</h6>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Role Id</th>
                                        <th scope="col">Role Name</th>
                                        <th scope="col">Edit Role</th>
                                        <th scope="col">Delete Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($data = mysqli_fetch_assoc($row)){
                                    ?>
                                    <tr>
                                        <th scope="row"> <?php echo $data['role_id']; ?> </th>
                                        <td> <?php echo $data['role_name']?></td>
                                        <td> <a href="viewRole.php?i=<?php echo $data['role_id']?>" class="btn btn-warning">Edit</a> </td>
                                        <td> <a href="viewRole.php?j=<?php echo $data['role_id']?>" class="btn btn-danger">Delete</a> </td>
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
                $r_id = $_GET['i'];
                $select = "SELECT * FROM `roles` WHERE `role_id` = '$r_id'";
                $row = mysqli_query($connect, $select);

                $data = mysqli_fetch_assoc($row);
?>
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Role</h6>
                            <form action="" method="POST">

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Update Role Name</label>
                                    <input value="<?php echo $data['role_name'] ?>" type="text" class="form-control" id="exampleInputEmail1" name="role_name"
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
                    $c_name = $_POST['role_name'];
                    $updated = "UPDATE `roles` SET `role_name` = '$c_name' WHERE `role_id` = '$c_id'";
                   $done = mysqli_query($connect, $updated);

                   
                    if($done){
                        echo "<script>
                        alert('Role Updated!');
                        window.location.href = 'viewRole.php';
                        </script>";
                       }
                   
                }

           }
            ?>
<!-- DELETE  -->
<?php
if(isset($_GET['j'])){
                $r_id = $_GET['j'];
                $delete = "DELETE FROM `roles` WHERE `role_id` = '$r_id'";
                $done = mysqli_query($connect, $delete);

                if($done){
                    echo "<script>
                    alert('Role Deleted!');
                    window.location.href = 'viewRole.php';
                    </script>";
                   }
               
            }

                ?>
<?php 
include("footer.php");
?>