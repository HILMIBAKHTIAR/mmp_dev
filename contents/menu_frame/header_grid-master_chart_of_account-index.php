<?php
$index["debug"] = 0;
$index_navbutton["generate"] = "reload|export_excel|add";

$i = 0;
$index_table["column"][$i]["name"] = "no";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "kodeakun";
$index_table["column"][$i]["sort"] = "a.kodeakun";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Kode Akun";
$index_table["column"][$i]["align"] = "left";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "nama";
$index_table["column"][$i]["sort"] = "a.nama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Nama";
$index_table["column"][$i]["align"] = "left";
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

$index["query_select"] = "	SELECT a.*
							FROM " . $index["query_from"] . " a
							";
$index["query_where"] .= "	 AND a.nomor <> 0  AND a.status_aktif  = 1";
$index["default_order"] = "	a.nomor";
