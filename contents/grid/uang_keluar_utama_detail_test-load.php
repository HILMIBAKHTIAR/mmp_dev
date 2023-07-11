<?php
$_SESSION["grid_".$grid_id]["query"] = "
	select
	a.nomor as nomorthbelipermintaan,
	a.kode as kode_permintaan,
	c.nama as satuan_permintaan,
	b.jumlah as qty_permintaan,
	b.nomor as nomortdbelipermintaan,
	c.nomor as nomormhsatuan,
	d.nomor as nomormhbarang,
	CONCAT(d.kode, ' - ' ,d.nama) AS nama_barang,
	'' AS kosong,
	b.jumlah_konversi
	from
	thbelipermintaan a
	join tdbelipermintaan b on a.nomor = b.nomorthbelipermintaan 
	join mhsatuan c on c.nomor = b.nomormhsatuan 
	join mhbarang d on d.nomor = b.nomormhbarang 
	";

$_SESSION["grid_".$grid_id]["query_order"] = "";
$_SESSION["grid_".$grid_id]["query_search"] = "";
$_SESSION["grid_".$grid_id]["param_input"] = "";
$_SESSION["grid_".$grid_id]["items"] = array(
	"kode_permintaan",
	"nama_barang",
	"qty_permintaan",
	"satuan_permintaan",
	"kosong",
	"qty_permintaan",
	"satuan_permintaan",
	"kosong",
	"kosong",
	"kosong",
	"kosong",
	"kosong",
	"nomorthbelipermintaan",
	"nomortdbelipermintaan",
	"jumlah_konversi",
	"qty_permintaan",
	"kosong",
	"nomormhbarang",
	"nomormhsatuan"

);
$_SESSION["grid_".$grid_id]["debug"] = 1;
?>