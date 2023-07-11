<?php
$index["debug"] = 1;
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
$index_table["column"][$i]["sort"] = "a.kode";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "kode";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "customer";
$index_table["column"][$i]["sort"] = "b.nama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "customer";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "barang";
$index_table["column"][$i]["sort"] = "c.nama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Barang";
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

$index["query_select"] = "
                            SELECT a.*,
                            b.nama as customer,
                            c.nama as barang
                            from thdashboardcylinder a
                            join mhrelasi b on a.nomormhrelasi = b.nomor
                            join thbarang c on a.nomorthbarang = c.nomor
";
$index["query_where"] .= "	AND a.nomor <> 0 AND a.status_aktif>0  ";
$index["query_order"] .= "a.priority ASC";
//$index["default_order"] = "	a.urutan";
