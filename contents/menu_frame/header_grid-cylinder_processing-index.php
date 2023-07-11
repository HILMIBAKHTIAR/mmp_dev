<?php
$index["debug"] = 0;
$index["ajax"] 			= 1;
$index_navbutton["generate"] = "reload";

$i = 0;
$index_table["column"][$i]["name"] = "no";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;

$index_table["column"][$i]["name"] = "kode";
$index_table["column"][$i]["sort"] = "b.kode";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "kode";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;

$index_table["column"][$i]["name"] = "barang";
$index_table["column"][$i]["sort"] = "b1.nama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "barang";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;

$index_table["column"][$i]["name"] = "tanggal";
$index_table["column"][$i]["sort"] = "a.tanggal";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "tanggal";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;



$index_table["column"][$i]["name"] = "tanggal_estimasi";
$index_table["column"][$i]["sort"] = "a.tanggal_estimasi";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "tanggal estimasi";
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

$index["query_select"] = " 	SELECT
							a.*,
                            b.kode as kode,
                            b1.nama as barang
							from thcylinderproses a
                            join thdashboardcylinder b on a.nomorthdashboardcylinder = b.nomor
                            join thbarang b1 on b.nomorthbarang = b1.nomor
										";

$index["query_where"] .= "	AND a.nomor <> 0 AND a.status_aktif>0 ";
//$index["default_order"] = "	a.urutan";
