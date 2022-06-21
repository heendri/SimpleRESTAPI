<?php

// we put connection property here
$host = "localhost";
$user = "root";
$password = "";
$database = "db_mahasiswa";

// $host = "sql309.epizy.com";
// $user = "epiz_31966320";
// $password = "RUJsSqcKZXvNWB0";
// $database = "epiz_31966320_mahasiswa";

$mysqli = new mysqli($host, $user, $password, $database);
