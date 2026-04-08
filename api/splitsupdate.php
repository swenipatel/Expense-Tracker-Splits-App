<?php
include 'connect.php';
header('Content-Type: application/json');

// Get data
$id          = $_POST['id'] ?? null;
$expense_id  = $_POST['expense_id'] ?? null;
$user_id     = $_POST['user_id'] ?? null;
$amount      = $_POST['amount'] ?? null;

// Validate
if (!$id || !$expense_id || !$user_id || !$amount) {
    echo json_encode(["message" => "All fields are required"]);
    exit;
}

// Update query
$sql = "UPDATE s_splits 
        SET expense_id=?, user_id=?, amount=? 
        WHERE id=?";

$stmt = mysqli_prepare($con, $sql);

// i = int, d = decimal
mysqli_stmt_bind_param($stmt, "iidi", $expense_id, $user_id, $amount, $id);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(["message" => "Split updated successfully"]);
} else {
    echo json_encode(["message" => "Error: " . mysqli_error($con)]);
}

mysqli_stmt_close($stmt);
mysqli_close($con);
?>