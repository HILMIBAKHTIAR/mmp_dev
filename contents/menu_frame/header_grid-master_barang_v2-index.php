<?php
$index["debug"] = 1;
$index["ajax"] 			= 1;
$index["filter"] 			= 1;
$index_navbutton["generate"] = "reload";
$index_navbutton["generate"] .= "|filter_column";
$index["filter_column"] = 1;

$i = 0;

$index_filter["field"][$i]["label"]                     = "Customer";
// $index_filter["field"][$i]["label_class"]                 = "req";
$index_filter["field"][$i]["input"]                     = "nomormhrelasi";
// $index_filter["field"][$i]["input_class"]                 = "required";
$index_filter["field"][$i]["input_element"]             = "browse";
$index_filter["field"][$i]["browse_setting"]             = "master_customer";
$i++;

$i = 0;
$index_table["column"][$i]["name"] 		= "no";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
// $index_table["column"][$i]["visible"] 	= visible_index_column("no");
$i++;

$index_table["column"][$i]["name"] 		= "customer";
$index_table["column"][$i]["sort"] 		= "b.nama";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "customer";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("customer");
$i++;

$index_table["column"][$i]["name"] 		= "kode_custom";
$index_table["column"][$i]["sort"] 		= "a.kode_custom";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Kode barang mmp";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("kode_custom");
$i++;

$index_table["column"][$i]["name"] 		= "kode_barang_customer";
$index_table["column"][$i]["sort"] 		= "a.kode_barang_customer";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Kode barang customer";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("kode_barang_customer");
$i++;

$index_table["column"][$i]["name"] 		= "nama_barang_customer";
$index_table["column"][$i]["sort"] 		= "a.nama_barang_customer";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Nama";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("nama_barang_customer");
$i++;

$index_table["column"][$i]["name"] 		= "nomor_md";
$index_table["column"][$i]["sort"] 		= "a.nomor_md";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "No MD";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("nomor_md");
$i++;

$index_table["column"][$i]["name"] 		= "status_aktif";
$index_table["column"][$i]["sort"] 		= "a.status_aktif";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Status";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "action";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Action";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;



$index["query_select"] = " 	SELECT
							a.*,
							b.nama as customer
							from thbarang a
							join mhrelasi b on a.nomormhrelasi = b.nomor and b.status_aktif = 1
							";

$index["query_where"] .= "	AND a.nomor <> 0";
$index["default_order"] = "	a.nomor DESC";
