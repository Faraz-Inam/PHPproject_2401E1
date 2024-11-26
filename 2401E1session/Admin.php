<?php 
include 'connection.php';
session_start();
if(!isset($_SESSION['un'])){
    header("location: login.php");
}

if($_SESSION['userrole'] == 2){
    header('location: User.php');
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
    <h1>This is Admin Panel</h1>
    <a href="logout.php">Logout</a>
</body>
</html>