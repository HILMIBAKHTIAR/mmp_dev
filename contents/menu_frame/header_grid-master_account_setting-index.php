<?php
$index["debug"] = 0;
$index["ajax"] 			= 1;

$i = 0;
$index_table["column"][$i]["name"] = "no";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "kode";
$index_table["column"][$i]["sort"] = "a.kode";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Deskripsi";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "account_awal_kode";
$index_table["column"][$i]["sort"] = "b.kode";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "No Acc. Awal";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "account_awal_nama";
$index_table["column"][$i]["sort"] = "b.nama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Nama Acc. Awal";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "account_akhir_kode";
$index_table["column"][$i]["sort"] = "c.kode";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "No Acc. Akhir";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "account_akhir_nama";
$index_table["column"][$i]["sort"] = "c.nama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Nama Acc. Akhir";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "status_aktif";
$index_table["column"][$i]["sort"] = "a.status_aktif";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Status";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "action";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Action";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;

$index["query_select"] = "	SELECT a.*,
							b.kode AS account_awal_kode, b.nama AS account_awal_nama,
							c.kode AS account_akhir_kode, c.nama AS account_akhir_nama
							FROM " . $index["query_from"] . " a
							LEFT JOIN mhaccount b ON a.nomormhaccountawal = b.nomor AND b.status_aktif > 0
							LEFT JOIN mhaccount c ON a.nomormhaccountakhir = c.nomor AND c.status_aktif > 0 ";
$index["query_where"] .= "	AND a.nomor <> 0 ";
$index["default_order"] = "	a.kode";
