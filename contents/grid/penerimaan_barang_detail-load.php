<?php
$_SESSION["grid_".$grid_id]["query"] = "
	select
		CONCAT(m2.kode, ' - ', m2.nama) AS nama_barang,
		(d.jumlah_order - d.jumlah_diterima) as jumlah_unit_order,
		d.jumlah_selesai_terima,
		d.harga_satuan,
		m3.nama as satuan,
		d.diskon_1,
		d.diskon_nominal_1,
		d.subtotal,
		d.keterangan,
		d.nomor as nomortdbeliorder,
		m2.nomor as nomormhbarang,
		d.nomormhsatuanqty,
		d.nomormhsatuanberat,
		1 as jumlah_konversi,
		' ' as batch_number,
		DATE_FORMAT(NOW(), '%d/%m/%Y') as expired_date
	FROM
	thbeliorder a
	join tdbeliorder d on d.nomorthbeliorder = a.nomor 
	join mhbarang m2 on m2.nomor = d.nomormhbarang 
	join mhrelasi m on m.nomor = a.nomormhrelasi and m.nomormhrelasikelompok = 2
	left join mhsatuan m3 on m3.nomor = d.nomormhsatuanqty 
	where 
		a.status_aktif = 1 
		AND d.status_aktif = 1
		AND d.jumlah_diterima < d.jumlah_order
		AND a.tanggal <= '".$_GET["tanggal"]."'
		and a.nomor = ".$_GET["no"]." ?
";

$_SESSION["grid_".$grid_id]["query_order"] = "";
$_SESSION["grid_".$grid_id]["query_search"] = "";
$_SESSION["grid_".$grid_id]["param_input"] = "";
$_SESSION["grid_".$grid_id]["items"] = array(
	"nama_barang",
	"jumlah_unit_order",
	"jumlah_unit",
	"satuan",
	"harga_satuan",
	"diskon_1",
	"diskon_nominal_1",
	"subtotal",
	"batch_number",
	"expired_date",
	"keterangan",
	"nomortdbeliorder",
	"nomormhbarang",
	"nomormhsatuanqty",
	"nomormhsatuanberat",
	"jumlah_konversi",
);
$_SESSION["grid_".$grid_id]["debug"] = 1;
?>