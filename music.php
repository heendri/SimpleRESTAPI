<?php
require_once "method.php";
$mhs = new Music();
$request_method = $_SERVER["REQUEST_METHOD"];
switch ($request_method) {
   case 'GET':
      if (!empty($_GET["id"])) {
         $id = intval($_GET["id"]);
         $mhs->get_single_data($id);
      } else {
         $mhs->get_all_data();
      }
      break;
   case 'POST':
      $mhs->insert_data();
      break;
   case 'DELETE':
      $id = intval($_GET["id"]);
      $mhs->delete_data($id);
      break;
   case 'PUT':
      $id = intval($_GET["id"]);
      $mhs->update_data($id);
      // $mhs->test();
      break;
   default:
      // Invalid Request Method
      header("HTTP/1.0 405 Method Not Allowed");
      break;
}
