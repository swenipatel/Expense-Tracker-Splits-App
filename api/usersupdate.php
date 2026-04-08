<?php
include 'connect.php';
header('Content-Type: application/json');

$id     = $_POST['id'] ?? null;
$name  = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$password   = $_POST['password'] ?? null;

if (!$id) {
    echo json_encode(["message" => "ID is reqsssuired"]);
    exit;
}

$sql = "UPDATE s_users SET name=?, email=?, password=? WHERE id=?";
$stmt = mysqli_prepare($con, $sql);

mysqli_stmt_bind_param($stmt, "sdsi", $name, $email, $password, $id);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(["message" => "Product updated"]);
} else {
    echo json_encode(["message" => "Error: " . mysqli_error($con)]);
}

mysqli_stmt_close($stmt);
mysqli_close($con);
?>