<?php
include 'connect.php';

$group_id  = mysqli_real_escape_string($con, $_POST["group_id"] ?? '');
$paid_by = mysqli_real_escape_string($con, $_POST["paid_by"] ?? '');
$amount = mysqli_real_escape_string($con, $_POST["amount"] ?? '');
$description= mysqli_real_escape_string($con, $_POST["description"] ?? '');

if ($group_id == "" || $paid_by == "" || $amount == "") {
    echo "All fields are required.";
    exit;
}


$sql = "INSERT INTO s_expenses (group_id, paid_by, amount, description) 
        VALUES ('$group_id', '$paid_by', '$amount', '$description')";

if(mysqli_query($con, $sql)){
    echo "Expense added successfully";
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>