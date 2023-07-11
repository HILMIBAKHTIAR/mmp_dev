<?php
$_SESSION["grid_".$grid_id]["query"] = "
	select
	b.nomor as nomortdpermintaanbarang
	, b.nama as nama_barang
	, b.nomormhsatuan 
	, b.berat 
	, b.qty 
	, b.keterangan 
	, '' as kosong
	, m.nama as satuan_barang
	from thpermintaanbarang a
	join tdpermintaanbarang b on b.nomorthpermintaanbarang = a.nomor and b.status_aktif > 0
	left join mhsatuan m on m.nomor = b.nomormhsatuan 
	where a.status_aktif = 1 and a.nomor = ".$_GET["no"]." ?
	";

$_SESSION["grid_".$grid_id]["query_order"] = "";
$_SESSION["grid_".$grid_id]["query_search"] = "";
$_SESSION["grid_".$grid_id]["param_input"] = "";
$_SESSION["grid_".$grid_id]["items"] = array(
	"nama_barang",
	"qty",
	"berat",
	"kosong",
	"kosong",
	"satuan_barang",
	"keterangan",
	"nomormhsatuan",
	"nomortdpermintaanbarang"
);
$_SESSION["grid_".$grid_id]["debug"] = 1;
?>