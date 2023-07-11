<?php
$index["debug"] = 1;
$index["ajax"] 			= 1;
$index_navbutton["generate"] 			= "reload";

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
$index_table["column"][$i]["name"] = "nama";
$index_table["column"][$i]["sort"] = "a.nama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Nama";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "produk";
$index_table["column"][$i]["sort"] = "CONCAT(bb.kode, ' - ', b.produk)";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Produk";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "jenis_packaging";
$index_table["column"][$i]["sort"] = "b.jenis_packaging";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Jenis Packaging";
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
$index["query_select"] = " SELECT a.*, 
												CONCAT(bb.kode, ' - ', b.produk) as produk,
												c.nama as jenis_packaging
												FROM mhbarangbom a 
												LEFT JOIN tdpermintaananalisasample b ON b.nomor = a.nomortdpermintaananalisasample
												LEFT JOIN thpermintaananalisasample bb ON bb.nomor = b.nomorthpermintaananalisasample
												LEFT JOIN mhjenispackaging c ON c.nomor = a.nomormhjenispackaging
										";
$index["query_where"] .= "AND a.nomor <> 0 AND a.status_aktif>0";
$index["query_order"] .= " a.nomor DESC";
