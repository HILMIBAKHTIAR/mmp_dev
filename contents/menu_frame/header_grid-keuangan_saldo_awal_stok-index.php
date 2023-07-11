<?php
$index["debug"] = 1;
$index["filter"] = 1;
$index_filter["hide"] = 0;


$i = 0;
$index_filter["field"][$i]["label"] = "Tanggal Awal";
$index_filter["field"][$i]["input"] = "tanggal_awal";
$index_filter["field"][$i]["input_class"] = "date_1";
if(empty($index["query_filter"]))
	$index_filter["field"][$i]["input_value"] = date($_SESSION["setting"]["date"]);
$i++;
$index_filter["field"][$i]["label"] = "Tanggal Akhir";
$index_filter["field"][$i]["input"] = "tanggal_akhir";
$index_filter["field"][$i]["input_class"] = "date_1";
if(empty($index["query_filter"]))
	$index_filter["field"][$i]["input_value"] = date($_SESSION["setting"]["date"]);
$i++;


$i = 0;
$index_table["column"][$i]["name"] = "no";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "";
$i++;
/*
$index_table["column"][$i]["name"] = "kode";
$index_table["column"][$i]["sort"] = "a.kode";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Kode";
$i++;*/
$index_table["column"][$i]["name"] = "tanggal";
$index_table["column"][$i]["sort"] = "a.tanggal";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Tanggal";
$i++;
$index_table["column"][$i]["name"] = "kode_barang";
$index_table["column"][$i]["sort"] = "b.kode";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Kode Barang";
$i++;
$index_table["column"][$i]["name"] = "nama_barang";
$index_table["column"][$i]["sort"] = "b.nama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Nama Barang";
$i++;
$index_table["column"][$i]["name"] = "jumlah";
$index_table["column"][$i]["sort"] = "a.jumlah";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "QTY";
$i++;
$index_table["column"][$i]["name"] = "satuan";
$index_table["column"][$i]["sort"] = "c.nama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Satuan";
$i++;
/*$index_table["column"][$i]["name"] = "tipe";
$index_table["column"][$i]["sort"] = "d.nama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Tipe";
$i++;*/
$index_table["column"][$i]["name"] = "status_aktif";
$index_table["column"][$i]["sort"] = "a.status_aktif";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Status";
$i++;
$index_table["column"][$i]["name"] = "action";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Action";
$i++;


$index["query_select"] = "SELECT a.*, 
						  DATE_FORMAT(a.tanggal, '" . $_SESSION["setting"]["date_sql"] . "') AS tanggal,
						  b.kode AS kode_barang, 
						  b.nama AS nama_barang,
						  a.jumlah,
							c.nama AS satuan
							FROM ".$index["query_from"]." a
							JOIN mhbarang b ON a.nomormhbarang = b.nomor
							JOIN mhsatuan c ON c.nomor = b.nomormhsatuan";
$index["query_where"] .= " AND a.nomor <> 0 ";
?>