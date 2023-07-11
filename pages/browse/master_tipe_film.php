<?php
session_start();
include "../../config/config.php";
include "../../config/database.php";
include "../../" . $config["webspira"] . "config/connection.php";

$search = "";
$search = $_GET["search"];
if ($search) {
  // split search by space
  $searchArray = explode(" ", $search);
  $search = "";
  foreach ($searchArray as $key => $value) {
    $search .= "
      AND CONCAT(a.tipe) LIKE '%" . $value . "%'
    ";
  }
}

$query = "
  SELECT DISTINCT
    a.tipe as nama
  FROM mdsuppliersupply a
  WHERE
    a.status_aktif = 1 
    AND (
      1 = 1
      " . $search . "
    )
  ORDER BY a.tipe ASC
;";
$debug = "query = " . str_replace(array("\n", "\r", "\t"), " ", $query);
$mysqli_query = mysqli_query($con, $query);
$data = [];
while ($r = mysqli_fetch_array($mysqli_query)) {
  array_push($data, [
    'id' => $r["nama"],
    'nama' => $r['nama'],
  ]);
}

echo json_encode($data);
