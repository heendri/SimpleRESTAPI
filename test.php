<?php
require_once "koneksi.php";
global $mysqli;
$query = "SELECT * FROM music_table LIMIT 2";
$data = array();
$result = $mysqli->query($query);
while ($row = mysqli_fetch_object($result)) {
    $data[] = $row;
}
var_dump($data);

$response = array(
    'status' => 1,
    'message' => 'Get List Data Successfully.',
    'data' => $data
);
header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);

// var_dump($response);
