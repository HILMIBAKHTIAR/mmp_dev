<?php
$index_table["data"][$i]["supplier_nama"] = $data["supplier_nama"];
$index_table["data"][$i]["tanggal"] = $data["tanggal"];
$index_table["data"][$i]["supplier"] = $data["supplier"];
$index_table["data"][$i]["keterangan"] = $data["keterangan"];
$index_table["data"][$i]["valuta_nama"] = $data["valuta_nama"];
$index_table["data"][$i]["transaksi_kode"] = $data["transaksi_kode"];
$index_table["data"][$i]["kurs_nominal"] = number_formatting($data["kurs_nominal"], "money");
$index_table["data"][$i]["total"] = number_formatting($data["total"],"money");
$index_table["data"][$i]["total_idr"] = number_formatting($data["total_idr"],"money");

if($data["total"]<0){
	$index_table["data"][$i]["total"] = "(". number_formatting(abs($data["total"]),"money"). ")";
}
if($data["total_idr"]<0){
	$index_table["data"][$i]["total_idr"] = "(". number_formatting(abs($data["total_idr"]),"money"). ")";
}
?>