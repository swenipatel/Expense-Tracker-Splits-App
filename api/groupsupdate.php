<?php
include 'connect.php';
header('Content-Type: application/json');

// Get data
$id          = $_POST['id'] ?? null;
$name        = $_POST['name'] ?? null;
$created_by  = $_POST['created_by'] ?? null;

// Validate
if (!$id || !$name || !$created_by) {
    echo json_encode(["message" => "All fields are required"]);
    exit;
}

// Update query (NO id in SET)
$sql = "UPDATE s_groups SET name=?, created_by=? WHERE id=?";

$stmt = mysqli_prepare($con, $sql);

// s = string, i = int
mysqli_stmt_bind_param($stmt, "sii", $name, $created_by, $id);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(["message" => "Group updated successfully"]);
} else {
    echo json_encode(["message" => "Error: " . mysqli_error($con)]);
}

mysqli_stmt_close($stmt);
mysqli_close($con);
?>