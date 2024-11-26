<?php 
include 'connection.php';
session_start();

if(isset($_SESSION['user'])){
    header("location: user.php");
}
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
        <input type="text" name="pass" id="sp"> <br>
        <input type="checkbox" name="check" onclick="showPass()">
        <label for="">Show Password</label> <br>
        <button type="submit" name="signinBtn">Log In</button>
       Did not Sign Up yet <a href="signup.php">Sign Up!</a>
    </form>
</body>
</html>

<?php 
if(isset($_POST['signinBtn'])){
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

   $verify =  "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";
   $q = mysqli_query($connect, $verify);
   $row_count = mysqli_num_rows($q);
   $fetch = mysqli_fetch_assoc($q);

//    echo $row_count;
if($row_count == 1){
    $_SESSION['user'] = $fetch['username'];
    $_SESSION['role_id'] = $fetch['role_id'];

    if($fetch['role_id'] == 1){
        header("location: admin.php");
    }
    else{
        header("location: user.php");
    }
}

}
?>

<script>
    function showPass(){
       var sp =  document.getElementById('sp');
       if(sp.type == "password"){
        sp.type = "text";
       }
       else{
        sp.type = "password";
       }
    }
</script>
