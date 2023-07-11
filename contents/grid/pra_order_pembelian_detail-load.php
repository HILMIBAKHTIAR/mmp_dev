<?php
$_SESSION["grid_".$grid_id]["query"] = "
	select
	a.nomor as nomorthbelipermintaan,
	a.kode as kode_permintaan,
	c.nama as satuan_permintaan,
	b.jumlah as qty_permintaan,
	b.nomor as nomortdbelipermintaan,
	c.nomor as nomormhsatuanqty,
	d.nomor as nomormhbarang,
	CONCAT(d.kode, ' - ' ,d.nama) AS nama_barang,
	'' AS kosong,
	b.jumlah_konversi, 
	b.jumlah,
	b.jumlah_unit,
	b.keterangan,
	'0' AS nol,
	'69' AS test,
	e.nama as satuan_berat,
	b.jumlah_berat,
	e.nomor as nomormhsatuanberat,
	d.berat_jenis 
	from
	thbelipermintaan a
	join tdbelipermintaan b on a.nomor = b.nomorthbelipermintaan 
	join mhsatuan c on c.nomor = b.nomormhsatuanqty 
	join mhbarang d on d.nomor = b.nomormhbarang 
	left join mhsatuan e on e.nomor = d.nomormhsatuanberatpurchasing 
	where a.status_aktif > 0 and a.status_disetujui > 0
	";

$_SESSION["grid_".$grid_id]["query_order"] = "";
$_SESSION["grid_".$grid_id]["query_search"] = "";
$_SESSION["grid_".$grid_id]["param_input"] = "";
$_SESSION["grid_".$grid_id]["items"] = array(
	"kode_permintaan",
	"nama_barang",
	"qty_permintaan",
	"satuan_permintaan",
	"keterangan",
	"jumlah", //inputan
	"satuan_permintaan", //inputan
	"jumlah_berat",
	"berat_jenis",
	"satuan_berat",
	"kosong", //tanggal
	"nol",  //ppn
	"nol", //harga
	"nol", //diskon_1
	"nol", //diskon_nominal_1
	"nol", //subtotal
	"nomorthbelipermintaan",
	"nomortdbelipermintaan",
	"jumlah_konversi",
	"jumlah",
	"nomormhbarang",
	"nomormhsatuanqty",
	"nomormhsatuanberat"

);
$_SESSION["grid_".$grid_id]["debug"] = 1;
?>