<?php 
session_start();
include("header.php");
include("../Admin/connection.php");

// if(isset($_GET['id'])){
    $p_id = $_GET['id'];

    $products = "SELECT * FROM `products` WHERE `product_id` = '$p_id'";
    $query = mysqli_query($connect, $products);

    $fetch = mysqli_fetch_assoc($query);

    $pn = $fetch['product_name'];
    $pp = $fetch['product_price'];
    $pm = $fetch['product_model'];
    $ps = $fetch['product_specification'];

    $useremail = $_SESSION['useremail'];
    $username = $_SESSION['username'];

    $sub = "Your Order has been Confirmed!";
    $msg = "Dear <b>" . $username . "</b> <br> Your Order has been Confirmed. <br> Product Name: " . $pn . "<br> Product Price: " . $pp . "<br> Product Model: " . $pm . "<br>Product Specification: " . $ps . "<br> Thank You!";
    $header = "From: faraz_inam@aptechnorth.edu.pk" . "\r\n" .
    'Content-Type: text/html; charset=UTF-8' . "\r\n" .
    'MIME-Version: 1.0';

   $done =  mail($useremail, $sub, $msg, $header);

    if($done){
        echo "<script>
        alert('Mail Sent');
        window.location.href = 'index.php';
        </script>";
      }
      else{
        echo "<script>
        alert('Error');
        window.location.href = 'index.php';
        </script>";
      }
// }
?>