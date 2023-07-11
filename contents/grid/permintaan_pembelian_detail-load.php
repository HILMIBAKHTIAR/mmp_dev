<?php
$_SESSION["grid_".$grid_id]["query"] = "
	select
	CONCAT(c.kode, ' ', c.nama) AS barang
	, a.jumlah_unit 
	, d.nama area
	, a.keterangan 
	, a.nomor tdbelipermintaanppic
	, c.nomor nomormhbarang
	, d.nomor nomormhlokasi
	, '' kosong
	, 0 nol
	, e.nama satuan
	, e.nomor nomormhsatuanqty
	, a.nomor nomortdbelipermintaanmaster
	FROM
	tdbelipermintaanmaster a
	left join mhbarang c on c.nomor = a.nomormhbarang
	left join mhlokasi d on d.nomor = a.nomormhlokasi 
	left join mhsatuan e on e.nomor = c.nomormhsatuanqtypurchasing 
	left join mhdepartemen m on m.nomor = a.nomormhdepartemen  
	where a.status_aktif = 1 and m.nomor = ".$_GET["no"]." ?
	";

$_SESSION["grid_".$grid_id]["query_order"] = "";
$_SESSION["grid_".$grid_id]["query_search"] = "";
$_SESSION["grid_".$grid_id]["param_input"] = "";
$_SESSION["grid_".$grid_id]["items"] = array(
	"barang",
	"satuan",
	"jumlah_unit",
	"keterangan",
	"kosong",
	"kosong",
	"kosong",
	"kosong",
	"nomormhbarang",
	"nomormhsatuanqty",
	"nol",
	"nomormhlokasi",
	"nomortdbelipermintaanmaster"
);
$_SESSION["grid_".$grid_id]["debug"] = 1;
?>