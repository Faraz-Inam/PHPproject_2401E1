<?php 
include 'Admin/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">

        <label for="">Username</label>
        <input type="text" name="uname"> <br>

        <label for="">Date Of Birth</label>
        <input type="date" name="dob"> <br>

        <label for="">Gender</label>
        <select name="gender" id="">
            <option disabled selected>Select Gender</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select> <br>

        <label for="">Email</label>
        <input type="text" name="email"> <br>

        <label for="">Password</label>
        <input type="password" name="pass"> <br>

        <button type="submit" name="signupBtn">Sign Up!</button>
        Already have an Account?<a href="login.php">Log In</a>
    </form>
</body>
</html>

<?php 
if(isset($_POST['signupBtn'])){
    $uname = $_POST['uname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $role_id = 2;
    $encPass = password_hash($pass, PASSWORD_BCRYPT);

    $sel = "SELECT * FROM users WHERE username = '$uname'";
    $q = mysqli_query($connect, $sel);
    $row_count = mysqli_num_rows($q);

    if($row_count > 0){
       echo "<script>
        alert('Username already Exist');
        </script>";
    }

    else{
        $insert = "INSERT INTO users(username, date_of_birth, gender, email, password, role_id)
        VALUES('$uname', '$dob', '$gender', '$email', '$encPass', '$role_id')";
        $q = mysqli_query($connect, $insert);
     
        if($q){
         echo "<script> 
         alert('Account Created');
         window.location.href = 'login.php';
         </script>";
        }
    }

}

?>