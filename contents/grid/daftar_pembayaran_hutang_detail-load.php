<?php
// var_dump("test");
$_SESSION["grid_".$grid_id]["query"] = "
	SELECT
	t.jenis, 
	t2.kode transaksi_kode, 
	t.supplier_invoice_nomor, 
	t.supplier_sj_nomor, 
	t.dpp, 
	t.faktur_pajak_tanggal, 
	t.faktur_pajak_nomor, 
	t.tanggal_terima_tagihan, 
	0 as pph, 
	t.ppn_nominal, 
	t.kurs, 
	(t.total - t.total_terbayar) sisa, 
	0 bayar, 
	t.subtotal, 
	t.keterangan, 
	'thbelinota' transaksi_tabel, 
	t.nomor transaksi_nomor, 
	t.kode transaksi_kode, 
	0 nomormhaccount, 
	m2.nomor nomormhvaluta, 
	'0' tipe, 
	'0' multiplier
	from 
	thbelinota t 
	join thbeliorder t2 on t2.nomor = t.nomorthbeliorder  
	join mhrelasi m on m.nomor = t2.nomormhrelasi 
	join mhvaluta m2 on m2.nomor = t.nomormhvaluta
	where t.status_aktif = 1 and t.status_disetujui_dokumen = 1
	and (t.total - t.total_terbayar) > 0 and t.nomormhrelasi = ".$_GET["no"]."
	

";
$_SESSION["grid_".$grid_id]["query_order"] = "";
$_SESSION["grid_".$grid_id]["query_search"] = "";
$_SESSION["grid_".$grid_id]["param_input"] = "";
$_SESSION["grid_".$grid_id]["items"] = array(
	"jenis",
	"transaksi_kode",
	"supplier_invoice_nomor",
	"supplier_sj_nomor",
	"dpp",
	"faktur_pajak_tanggal",
	"faktur_pajak_nomor",
	"tanggal_terima_tagihan",
	"pph",
	"ppn_nominal",
	"kurs",
	"sisa",
	"bayar",
	"subtotal",
	"keterangan",
	"transaksi_tabel",
	"transaksi_nomor",
	"nomormhaccount",
	"nomormhvaluta",
	"tipe",
	"multiplier",
	"transaksi_kode"
);
$_SESSION["grid_".$grid_id]["debug"] = 1;
?>