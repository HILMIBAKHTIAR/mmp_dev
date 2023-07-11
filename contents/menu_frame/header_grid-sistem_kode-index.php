<?php
$index["debug"] = 0;
// $index_navbutton["generate"] = "reload";

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
$index_table["column"][$i]["caption"] = "Kode";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "inisial";
$index_table["column"][$i]["sort"] = "a.inisial";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Inisial";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "date_format";
$index_table["column"][$i]["sort"] = "a.date_format";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Format Tanggal";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "max_digit";
$index_table["column"][$i]["sort"] = "a.max_digit";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Digit";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "keterangan";
$index_table["column"][$i]["sort"] = "a.keterangan";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Keterangan (Menu)";
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

$index["query_select"] = "	SELECT 
								a.*, 
								b.kode as kode,
								CASE
									WHEN a.date_format = 'my' THEN '2 Digit Month + 2 Digit Year (my)'
									WHEN a.date_format = 'ym' THEN '2 Digit Year + 2 Digit Month (ym)'
									WHEN a.date_format = 'Y/m' THEN 'Full Year + / + 2 Digit Month (Y/m)'
									ELSE 'No Date'
								END AS date_format
							FROM ".$index["query_from"]." a
							LEFT JOIN shvariabel b on b.nomor = a.nomorshvariabel
							";
$index["query_where"] .= " AND a.is_setting = 1";
$index["default_order"] = "	a.nomor";
?>