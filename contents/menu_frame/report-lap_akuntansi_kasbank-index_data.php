<?php
$index_table["data"][$i]["grup"] = ($data["grup"] ? $data["grup"] : "");
$index_table["data"][$i]["tanggal"] = $data["tanggal"];
$index_table["data"][$i]["transaksikode"] = $data["transaksikode"];
$index_table["data"][$i]["detail_account_kode"] = $data["detail_account_kode"] ? $data["detail_account_kode"] : "";
$index_table["data"][$i]["detail_account_nama"] = $data["detail_account_nama"] ? $data["detail_account_nama"] : "";
$index_table["data"][$i]["cabangnama"] = $data["cabangnama"] ? $data["cabangnama"] : "";
$index_table["data"][$i]["keterangan"] = $data["keterangan"] ? $data["keterangan"] : "";
$index_table["data"][$i]["proyek"] = $data["proyek"] ? $data["proyek"] : "";
$index_table["data"][$i]["saldo_debit"] = number_formatting($data["saldo_debit"] ? $data["saldo_debit"] : 0, "money");
$index_table["data"][$i]["saldo_kredit"] = number_formatting($data["saldo_kredit"] ? $data["saldo_kredit"] : 0,"money");
$index_table["data"][$i]["saldo_total"] = number_formatting($data["saldo_total"],"money");

if ($data["saldo_total"] < 0) {
	$index_table["data"][$i]["saldo_total"] = "(". number_formatting(abs($data["saldo_total"]),"money"). ")";
}
?>