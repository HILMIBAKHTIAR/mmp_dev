<?php
$_SESSION["grid_" . $grid_id]["query"] = "
SELECT
a.*,
a.kode_barang AS kode,
a.nama_bahan_baku AS bahan,
'' AS kosong,
a.`nomormhbarang`,
a.`nomor` AS nomormdbarangbom,
b1.`nomor` AS nomorthbarang,
'2' as is_bahan
FROM
mdbarangbom a
JOIN mhbarangbom b
  ON a.nomormhbarangbom = b.nomor
  AND b.status_aktif = 1
JOIN thbarang b1
  ON b.nomorthbarang = b1.nomor
  AND b1.status_aktif = 1
WHERE 1 = 1
AND a.`nomormhbarangbom` = b.nomor
AND b.`nomorthbarang` = " . $_GET['no'] . "
AND a.status_aktif = 1
AND a.proses = 'EXTRU'
	";

$_SESSION["grid_" . $grid_id]["query_order"] = "a.nomor";
$_SESSION["grid_" . $grid_id]["query_search"] = "";
$_SESSION["grid_" . $grid_id]["param_input"] = "";
$_SESSION["grid_" . $grid_id]["items"] = array(
	"kode",
	"bahan",
	"kosong",
	"kosong",
	"nomormhbarang",
	"nomormdbarangbom",
	"is_bahan"
);
$_SESSION["grid_" . $grid_id]["debug"] = 1;
