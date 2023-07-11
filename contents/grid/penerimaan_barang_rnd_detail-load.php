<?php
$_SESSION["grid_".$grid_id]["query"] = "
	select
	CONCAT(c.kode, ' ', c.nama) AS barang
	, b.jumlah_unit 
	, d.nama area
	, b.keterangan 
	, b.nomor tdbelipermintaanteknik
	, c.nomor nomormhbarang
	, d.nomor nomormhlokasi
	, '' kosong
	, e.nama unit
	, e.nomor nomormhsatuanqty
	FROM
	thbelipermintaanteknik a
	join tdbelipermintaanteknik b on b.nomorthbelipermintaanteknik = a.nomor
	join mhbarang c on c.nomor = b.nomormhbarang
	join mhlokasi d on d.nomor = b.nomormhlokasi 
	join mhsatuan e on e.nomor = c.nomormhsatuanqtypurchasing 
	where a.status_aktif = 1 and b.status_aktif = 1 and a.nomor = ".$_GET["no"]." ?
	";

$_SESSION["grid_".$grid_id]["query_order"] = "";
$_SESSION["grid_".$grid_id]["query_search"] = "";
$_SESSION["grid_".$grid_id]["param_input"] = "";
$_SESSION["grid_".$grid_id]["items"] = array(
	"barang",
	"jumlah_unit",
	"unit",
	"area",
	"keterangan",
	"tdbelipermintaanteknik",
	"nomormhbarang",
	"nomormhlokasi",
	"nomormhsatuanqty"
);
$_SESSION["grid_".$grid_id]["debug"] = 1;
?>