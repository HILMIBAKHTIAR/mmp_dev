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
$index_table["column"][$i]["name"] = "nama";
$index_table["column"][$i]["sort"] = "a.nama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Kecamatan";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "kabupaten";
$index_table["column"][$i]["sort"] = "c.nama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Kabupaten";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "provinsi";
$index_table["column"][$i]["sort"] = "c.nama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Provinsi";
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

// $index["query_where"] .= "	AND a.nomor <> 0 AND a.status_aktif>0 ";
$index["query_select"] = " SELECT a.*, 
												c.nama as kabupaten,
												b.nama as provinsi
												FROM mhkecamatan a 
												LEFT JOIN mhkabupaten c ON c.nomor = a.nomormhkabupaten
												LEFT JOIN mhprovinsi b ON b.nomor = c.nomormhprovinsi
										";
$index["query_where"] .= "AND a.nomor <> 0 AND a.status_aktif>0";
//$index["default_order"] = "	a.urutan";
