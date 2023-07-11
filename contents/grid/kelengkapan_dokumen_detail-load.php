<?php
$_SESSION["grid_".$grid_id]["query"] = "
	select
	m2.nama as nama_barang,
	t.jumlah_unit as jumlah_unit_order,
	t.jumlah_selesai_terima,
	t.harga_satuan,
	m3.nama as satuan,
	t.diskon_1_nominal,
	t.subtotal,
	t.keterangan,
	'' as kosong,
	t.nomor as nomortdbeliorder,
	m2.nomor as nomormhbarang,
	m3.nomor as nomormhsatuan
	FROM
	thbeliorder a
	join mhrelasi m on m.nomor = a.nomormhrelasi and m.nomormhrelasikelompok = 2
	join tdbeliorder t on t.nomorthbeliorder = a.nomor 
	left join mhbarang m2 on m2.nomor = t.nomormhbarang 
	left join thbelipermintaan t2 on t2.nomor = t.nomorthbelipermintaan
	left join mhsatuan m3 on m3.nomor = t.nomormhsatuan 
	";

$_SESSION["grid_".$grid_id]["query_order"] = "";
$_SESSION["grid_".$grid_id]["query_search"] = "";
$_SESSION["grid_".$grid_id]["param_input"] = "";
$_SESSION["grid_".$grid_id]["items"] = array(
	"nama_barang",
	"jumlah_unit_order",
	"kosong",
	"satuan",
	"harga_satuan",
	"diskon_1_nominal",
	"subtotal",
	"keterangan",
	"nomortdbeliorder",
	"nomormhbarang",
	"nomormhsatuan"
);
$_SESSION["grid_".$grid_id]["debug"] = 1;
?>