<?php 
include 'connection.php';
// include ('connection.php');
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
        <label for="">First Name</label>
        <input type="text" name="fname"> <br>
        <label for="">Last Name</label>
        <input type="text" name="lname"> <br>
        <select name="gender" id="">
            <option disabled selected>Select</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select> <br>
        <label for="">DOB</label>
        <input type="date" name="dob"> <br>
        <label for="">Username</label>
        <input type="text" name="uname"> <br>
        <label for="">Email</label>
        <input type="text" name="email"> <br>
        <label for="">Password</label>
        <input type="text" name="pass"> <br>
        <button type="submit" name="signupBtn">SIgn Up!</button>
    </form>
</body>
</html>

<?php 
if(isset($_POST['signupBtn'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $role_id = 2;

    $insert = "INSERT INTO `users` (`firstname`, `lastname`, `gender`, `date_of_birth`, `username`, `email`, `password`, `role_id`)
    VALUES ('$fname', '$lname', '$gender', '$dob', '$uname', '$email', '$pass', '$role_id')";
    $q = mysqli_query($connect, $insert);

    if($q){
        echo "<script>
        alert('account created');
        window.location.href = 'signin.php';
        </script>";
    }
}
?>