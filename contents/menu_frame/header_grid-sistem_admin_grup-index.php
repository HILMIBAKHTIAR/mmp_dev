<?php
$index["debug"] = 0;

$i                                    = 0;
$index_table["column"][$i]["name"]    = "no";
$index_table["column"][$i]["sort"]    = "empty";
$index_table["column"][$i]["search"]  = 0;
$index_table["column"][$i]["caption"] = "";
$index_table["column"][$i]["align"]   = "";
$index_table["column"][$i]["width"]   = "";
$i++;
$index_table["column"][$i]["name"]    = "kode";
$index_table["column"][$i]["sort"]    = "a.kode";
$index_table["column"][$i]["search"]  = 1;
$index_table["column"][$i]["caption"] = "Kode";
$index_table["column"][$i]["align"]   = "";
$index_table["column"][$i]["width"]   = "";
$i++;
$index_table["column"][$i]["name"]    = "nama";
$index_table["column"][$i]["sort"]    = "a.nama";
$index_table["column"][$i]["search"]  = 1;
$index_table["column"][$i]["caption"] = "Nama";
$index_table["column"][$i]["align"]   = "";
$index_table["column"][$i]["width"]   = "";
$i++;
// $index_table["column"][$i]["name"]    = "usaha";
// $index_table["column"][$i]["sort"]    = "b.nama";
// $index_table["column"][$i]["search"]  = 1;
// $index_table["column"][$i]["caption"] = "PT";
// $index_table["column"][$i]["align"]   = "";
// $index_table["column"][$i]["width"]   = "";
// $i++;
$index_table["column"][$i]["name"]    = "tingkatan";
$index_table["column"][$i]["sort"]    = "a.tingkatan";
$index_table["column"][$i]["search"]  = 0;
$index_table["column"][$i]["caption"] = "Level";
$index_table["column"][$i]["align"]   = "";
$index_table["column"][$i]["width"]   = "";
$i++;
$index_table["column"][$i]["name"]    = "menu";
$index_table["column"][$i]["sort"]    = "empty";
$index_table["column"][$i]["search"]  = 0;
$index_table["column"][$i]["caption"] = "Hak Akses";
$index_table["column"][$i]["align"]   = "";
$index_table["column"][$i]["width"]   = "";
$i++;
$index_table["column"][$i]["name"]    = "status_aktif";
$index_table["column"][$i]["sort"]    = "a.status_aktif";
$index_table["column"][$i]["search"]  = 0;
$index_table["column"][$i]["caption"] = "Status";
$index_table["column"][$i]["align"]   = "";
$index_table["column"][$i]["width"]   = "";
$i++;
$index_table["column"][$i]["name"]    = "action";
$index_table["column"][$i]["sort"]    = "empty";
$index_table["column"][$i]["search"]  = 0;
$index_table["column"][$i]["caption"] = "Action";
$index_table["column"][$i]["align"]   = "";
$index_table["column"][$i]["width"]   = "";
$i++;
$index["query_select"] 		= "	SELECT a.*
								FROM ".$index["query_from"]." a
								";
$index["query_where"] .= "	AND a.tingkatan > 0 ";
$index["default_order"] = "	a.tingkatan, a.nama";
?>