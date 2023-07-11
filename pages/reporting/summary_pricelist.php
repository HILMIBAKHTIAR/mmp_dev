<?php
session_start();
include "../../config/config.php";
include "../../config/database.php";
include "../../" . $config["webspira"] . "config/connection.php";

// $nomor = $_GET["nomor"];
// $tanggal_awal = $_GET["tanggal_awal"];
// $tanggal_akhir = $_GET["tanggal_akhir"];

$query = "
SELECT
    CONCAT(a.supply) AS item,
    FORMAT(IFNULL(MIN(a.harga), 0), 2) AS min,
    FORMAT(IFNULL(MAX(a.harga), 0), 2) AS max,
    FORMAT(IFNULL(MAX(a.harga) - min(a.harga), 0), 2) AS selisih,
    DATE_FORMAT(MAX(a.tanggal), '%d/%m/%Y') as last_update
  FROM mhpricelist a
  WHERE a.status_aktif = 1 
  GROUP BY a.supply
  ORDER BY a.supply
;";

$debug = "query = " . str_replace(array("\n", "\r", "\t"), " ", $query);
$mysqli_query = mysqli_query($con, $query);
$data = [
  "data" => []
];
while ($r = mysqli_fetch_array($mysqli_query)) {
  array_push($data["data"], [
    'item' => $r['item'],
    'min' => $r['min'],
    'max' => $r['max'],
    'selisih' => $r['selisih'],
    'last_update' => $r['last_update'],
  ]);
}

echo json_encode($data);
