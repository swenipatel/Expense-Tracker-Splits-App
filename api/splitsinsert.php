<?php
include 'connect.php';

// Get data
$expense_id = mysqli_real_escape_string($con, $_POST["expense_id"] ?? '');
$user_id  = mysqli_real_escape_string($con, $_POST["user_id "] ?? '');
$amount = mysqli_real_escape_string($con, $_POST["amount"] ?? '');

// Validate
if ($expense_id == "" || $user_id == "" || $amount == "") {
    echo "All fields are required.";
    exit;
}

// Insert query
$sql = "INSERT INTO s_splits (expense_id, user_id, amount) 
        VALUES ('$expense_id', '$user_id', '$amount')";

if(mysqli_query($con, $sql)){
    echo "Split added successfully";
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>