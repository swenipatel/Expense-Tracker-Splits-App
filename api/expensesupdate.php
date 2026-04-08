<?php
include 'connect.php';
header('Content-Type: application/json');

// Get data
$id          = $_POST['id'] ?? null;
$group_id    = $_POST['group_id'] ?? null;
$paid_by     = $_POST['paid_by'] ?? null;
$amount      = $_POST['amount'] ?? null;
$description = $_POST['description'] ?? null;

// Validate
if (!$id || !$group_id || !$paid_by || !$amount) {
    echo json_encode(["message" => "All required fields missing"]);
    exit;
}

// Update query
$sql = "UPDATE s_expenses 
        SET group_id=?, paid_by=?, amount=?, description=? 
        WHERE id=?";

$stmt = mysqli_prepare($con, $sql);

// i = int, d = double, s = string
mysqli_stmt_bind_param($stmt, "iidsi", $group_id, $paid_by, $amount, $description, $id);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(["message" => "Expense updated successfully"]);
} else {
    echo json_encode(["message" => "Error: " . mysqli_error($con)]);
}

mysqli_stmt_close($stmt);
mysqli_close($con);
?>