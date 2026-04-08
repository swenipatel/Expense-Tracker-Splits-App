<?php
include 'connect.php';


$group_id  = mysqli_real_escape_string($con, $_POST["group_id"] ?? '');
$user_id  = mysqli_real_escape_string($con, $_POST["user_id "] ?? '');



if ($group_id == "" || $user_id == "") {
    echo "All fields are required.";
    exit;
}


$sql = "INSERT INTO s_groupmembers (group_id, paid_by) 
        VALUES ('$group_id', '$user_id')";

if(mysqli_query($con, $sql)){
    echo "Expense added successfully";
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>