<?php
include 'connect.php';

header('Content-Type: application/json');

$sql = "SELECT * FROM s_expenses";
$result = mysqli_query($con, $sql);

$response = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }
    echo json_encode($response);
} else {
    echo json_encode(["message" => "No records found"]);
}

mysqli_close($con);
?>