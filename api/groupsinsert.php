<?php
include 'connect.php';

// Get data
$name  = mysqli_real_escape_string($con, $_POST["name"] ?? '');
$created_by = mysqli_real_escape_string($con, $_POST["created_by"] ?? '');

// Validate
if ($name == "" || $created_by == "") {
    echo "All fields are required.";
    exit;
}

// Insert query
$sql = "INSERT INTO s_groups (name, created_by) 
        VALUES ('$name', '$created_by')";

if(mysqli_query($con, $sql)){
    echo "Group created successfully";
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>