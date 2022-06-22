<?php
// require_once "koneksi.php";
// global $mysqli;
// $query = "SELECT * FROM music_table LIMIT 2";
// $data = array();
// $result = $mysqli->query($query);
// while ($row = mysqli_fetch_object($result)) {
//     $data[] = $row;
// }
// var_dump($data);

// $response = array(
//     'status' => 1,
//     'message' => 'Get List Data Successfully.',
//     'data' => $data
// );
// header('Content-Type: application/json');
// echo json_encode($response, JSON_PRETTY_PRINT);



// $array1 = array('blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4);
// $array2 = array('green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8);

// $array1 = array('blue'  => '', 'red'  => '', 'green'  => '', 'purple' => '');
// $array2 = array('blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4);

// var_dump(array_intersect_key($array1, $array2));
// $result = count(array_intersect_key($array1, $array2));
// echo "$result";

// var_dump($response);



require_once "koneksi.php";
global $mysqli;
$query = "SELECT max(id) as id FROM music LIMIT 1";
$data = array();
$result = $mysqli->query($query);
while ($row = mysqli_fetch_object($result)) {
    $data[] = $row;
}
// var_dump($data['max(id)']);
// echo "$data";
$hasil = $data[0];
$result = $hasil->id;
// var_dump($data[0]);
// echo "$data[0]['id']";
// var_dump($hasil);
// echo "$hasil->id";
echo "$result";
