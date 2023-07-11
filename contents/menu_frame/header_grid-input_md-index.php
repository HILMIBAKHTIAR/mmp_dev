<?php
$index["debug"] = 1;
$index["ajax"] 			= 1;

$i = 0;
$index_table["column"][$i]["name"] = "no";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "barang";
$index_table["column"][$i]["sort"] = "b.nama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Barang";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "no_md";
$index_table["column"][$i]["sort"] = "a.no_md";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "No MD";
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

$index["query_select"]   = "
	SELECT
		a.*,
    b.nama as barang
	FROM " . $index["query_from"] . " a
	JOIN thbarang b ON b.nomor = a.nomorthbarang
";

$index["query_where"] .= "	AND a.nomor <> 0 AND a.status_aktif>0 ";
$index["query_order"] = "a.nomor DESC";
//$index["default_order"] = "	a.urutan";
