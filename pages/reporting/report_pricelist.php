<?php
session_start();
include "../../config/config.php";
include "../../config/database.php";
include "../../" . $config["webspira"] . "config/connection.php";

$nomor = $_GET["nomor"];
// $tanggal_awal = $_GET["tanggal_awal"];
// $tanggal_akhir = $_GET["tanggal_akhir"];

// $query = "
// SELECT
//     CONCAT_WS(' - ', b.kode, b.nama, d.nama) AS produk,
//     CONCAT(c.nama,' - ',c.kode) AS gudang,
//     IFNULL(SUM(a.jumlah), 0) AS jumlah
//   FROM mhpricelist a
//     JOIN mhbarang b ON a.nomormhbarang = b.nomor AND b.status_aktif > 0 AND b.status_disetujui > 0
//     JOIN mhgudang c ON a.nomormhgudang = c.nomor AND c.status_aktif > 0
//     JOIN mhsatuan d ON b.nomormhsatuan = d.nomor AND d.status_aktif > 0
//   WHERE
//     a.tanggal <= '" . $tanggal_akhir . "'
//     AND FIND_IN_SET(a.nomormhbarang, '" . $nomor . "')
//   GROUP BY a.nomormhbarang, a.nomormhgudang
//   ORDER BY b.nama;
// ;";

$query = "
SELECT
    CONCAT_WS(' - ', rls.kode, rls.nama) AS supplier,
    CONCAT(a.supply) AS supply,
    IFNULL(SUM(a.harga), 0) AS harga,
    DATE_FORMAT(a.tanggal, '%d/%m/%Y') AS tanggal
  FROM mhpricelist a
    JOIN mhrelasi rls ON rls.nomor = a.nomormhrelasi
  WHERE a.status_aktif = 1 
    AND FIND_IN_SET(a.supply, '" . $nomor . "')
  GROUP BY a.nomor
  ORDER BY rls.nama;
;";

$debug = "query = " . str_replace(array("\n", "\r", "\t"), " ", $query);
$mysqli_query = mysqli_query($con, $query);
$data = [];
while ($r = mysqli_fetch_array($mysqli_query)) {
  array_push($data, [
    'supplier' => $r['supplier'],
    'supply' => $r['supply'],
    'harga' => $r['harga'],
    'tanggal' => $r['tanggal'],
  ]);
}

echo json_encode($data);
