<?php 
include 'connection.php';
session_start();

if(!isset($_SESSION['user'])){
    header("location: signin.php");
}

if($_SESSION['role_id'] == 2){
    header("location: user.php");
}

echo "HI! " . $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>This is Admin Page</h1>
    <a href="logout.php">LOGOUT</a>
</body>
</html>