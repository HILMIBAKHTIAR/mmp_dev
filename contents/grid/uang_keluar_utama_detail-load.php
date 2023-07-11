<?php
$_SESSION["grid_".$grid_id]["query"] = "
SELECT
	a.kode,
	a.total,
	a.keterangan,
	'thpenagihanhutang' as transaksitabel,
	a.nomor as transaksinomor,
	1 as nomormhaccount,
	'test' as tipe,
	a.jenis,
	a.nomor
	from thpenagihanhutang a
	join tdpenagihanhutang b on b.nomorthpenagihanhutang = a.nomor 
	join thbelinota c on c.nomor = b.transaksi_nomor and b.transaksi_tabel = 'thbelinota' and b.jenis = 'btb'
	WHERE a.status_aktif = 1
	AND a.status_disetujui = 1 and c.total_terbayar = 0 and a.nomormhrelasi = '".$_GET["no"]."' ?
	group by a.nomor 
 
";

// AND a.status_disetujui = 1 and a.dibuat_pada < '".$_GET["tgl"]."' ?

$_SESSION["grid_".$grid_id]["query_order"] = "";
$_SESSION["grid_".$grid_id]["query_search"] = "";
$_SESSION["grid_".$grid_id]["param_input"] = "";
$_SESSION["grid_".$grid_id]["items"] = array(
	"kode",
	"total",
	"keterangan",
	"transaksitabel",
	"transaksinomor",
	"nomormhaccount",
	"tipe",
	"jenis",
	"nomor"
);
$_SESSION["grid_".$grid_id]["debug"] = 1;
?>