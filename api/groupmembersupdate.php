<?php
include 'connect.php';
header('Content-Type: application/json');

$group_id  = $_POST['group_id '] ?? null;
$user_id = $_POST['user_id'] ?? null;


if (!$id) {
    echo json_encode(["message" => "ID is reqsssuired"]);
    exit;
}

$sql = "UPDATE s_groupmembers SET group_id=?, user_id=?";
$stmt = mysqli_prepare($con, $sql);

mysqli_stmt_bind_param($stmt, "sdsi", $group_id, $user_id, $id);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(["message" => "Product updated"]);
} else {
    echo json_encode(["message" => "Error: " . mysqli_error($con)]);
}

mysqli_stmt_close($stmt);
mysqli_close($con);
?>