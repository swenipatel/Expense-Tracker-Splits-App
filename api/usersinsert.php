<?php
include 'connect.php';

$name  = mysqli_real_escape_string($con, $_POST["name"] ?? '');
$email = mysqli_real_escape_string($con, $_POST["email"] ?? '');
$password = mysqli_real_escape_string($con, $_POST["password"] ?? '');

if ($name == "" || $email == "" || $password == "") {
    echo "All fields are required.";
    exit;
}

$sql = "INSERT INTO s_users (name, email, password) 
        VALUES ('$name', '$email', '$password')";

if(mysqli_query($con, $sql)){
    echo "Record inserted successfully";
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>
