<?php
$_SESSION["grid_".$grid_id]["query"] = "
	SELECT
	m.nama as relasi_nama,
	t.dpp,
	t.ppn_nominal,
	t.total,
	0 as nol,
	t.kurs,
	m2.nama as valuta,
	t.nomor as transaksinomor,
	'thbelinota' transaksitabel,
	t.kode transaksikode,
	'btb' transaksinama,
	DATE_FORMAT(t.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as transaksitanggal,
	t.supplier_invoice_nomor supplier_invoice_nomor,
	t.faktur_pajak_nomor faktur_pajak_nomor,
	m.kode relasikode,
	'mhrelasi'relasitabel,
	m2.nomor as nomormhvaluta,
	m.nomor as relasinomor,
	t.supplier_sj_nomor
	from thbelinota t
	join mhrelasi m on m.nomor = t.nomormhrelasi
	left join mhvaluta m2 on m2.nomor = t.nomormhvaluta 
	WHERE t.status_aktif = 1
	AND t.status_disetujui = 1 and t.status_disetujui_dokumen = 1 ?
	
	";
// AND t.status_disetujui = 1 and t.status_disetujui_dokumen = 1 and t.tanggal < '".$_GET["tgl"]."' ?


$_SESSION["grid_".$grid_id]["query_order"] = "";
$_SESSION["grid_".$grid_id]["query_search"] = "";
$_SESSION["grid_".$grid_id]["param_input"] = "";
$_SESSION["grid_".$grid_id]["items"] = array(
	"transaksikode",
	"transaksitanggal",
	"relasi_nama",
	"dpp",
	"ppn_nominal",
	"total",
	"total",
	"kurs",
	"valuta",
	"transaksinomor",
	"transaksitabel",
	"transaksinama",
	"transaksitanggal",
	"supplier_invoice_nomor",
	"faktur_pajak_nomor",
	"relasikode",
	"relasitabel",
	"nomormhvaluta",
	"relasinomor",
	"supplier_sj_nomor"

);
$_SESSION["grid_".$grid_id]["debug"] = 1;
?>