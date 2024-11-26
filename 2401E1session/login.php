<?php 
include 'connection.php';
session_start();
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

<label for="">Password</label>
<input type="password" name="pass"> <br>

<button type="submit" name="loginBtn">Sign In</button>
Create New Account<a href="signup.php">Sign Up</a>
</form>
</body>
</html>

<?php 
if(isset($_POST['loginBtn'])){
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

   $check =  "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";
   $q = mysqli_query($connect, $check);
   $row_count = mysqli_num_rows($q);
   $fetch = mysqli_fetch_assoc($q);
//    echo $row_count;

if($row_count == 1){
   $_SESSION['un'] =  $fetch['username'];
   $_SESSION['userrole'] =  $fetch['role_id'];

   if($fetch['role_id'] == 1){
    header("location: Admin.php");
   }
   else{
    header("location: User.php");
   }
}
}

if(isset($_SESSION['un'])){
    header("location: User.php");
}

?>