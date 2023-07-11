<?php
$_SESSION["grid_".$grid_id]["query"] = "
	SELECT
	a.kode,
	a.subtotal,
	a.keterangan,
	'thpenagihanhutang' as transaksitabel,
	a.nomor as transaksinomor,
	1 as nomormhaccount,
	'test' as tipe,
	a.jenis
	from thpenagihanhutang a
	WHERE a.status_aktif = 1
	AND a.status_disetujui = 1 and a.tanggal < '".$_GET["tgl"]."' ?
	
	";
// AND t.status_disetujui = 1 and t.status_disetujui_dokumen = 1 and t.tanggal < '".$_GET["tgl"]."' ?


$_SESSION["grid_".$grid_id]["query_order"] = "";
$_SESSION["grid_".$grid_id]["query_search"] = "";
$_SESSION["grid_".$grid_id]["param_input"] = "";
$_SESSION["grid_".$grid_id]["items"] = array(
	"kode",
	"subtotal",
	"keterangan",
	"transaksitabel",
	"transaksinomor",
	"nomormhaccount",
	"tipe",
	"jenis"
);
$_SESSION["grid_".$grid_id]["debug"] = 1;
?>