<?php
$index["debug"] = 0;
$index["ajax"] 			= 1;

$i = 0;
$index_table["column"][$i]["name"] 		= "no";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;
$index_table["column"][$i]["name"] 		= "kode";
$index_table["column"][$i]["sort"] 		= "a.kode";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Kode";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;
$index_table["column"][$i]["name"] 		= "nama";
$index_table["column"][$i]["sort"] 		= "a.nama";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Nama";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;
// browse cabang
$index_table["column"][$i]["name"] = "kota";
$index_table["column"][$i]["sort"] = "b.nama";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "kota/kabupaten";
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


// $index["query_select"] = "  SELECT a.*, a.nama,
// 								b.kode AS kodecabang
// 							FROM mhoutlet a
// 							LEFT JOIN mhcabang b ON b.nomor = a.nomormhcabang
//                             ";
$index["query_select"] = " SELECT a.*, 
												a.nama,
												a.kode,
												b.nama as kota
												FROM mhrelasi a 
												LEFT JOIN  mhkabupaten b on a.nomormhkabupaten = b.nomor
										";
// $index["query_select"] = "  SELECT a.*, a.nama
// 							FROM mhoutlet a";
// $index["query_select"] 	= "	SELECT a.*
// 							FROM mhoutlet " . $index["query_from"] . "a";
$index["query_where"] .= "AND a.nomormhrelasikelompok = 1 AND a.nomor <> 0 AND a.status_aktif>0";
$index["default_order"] = "	a.status_aktif, a.nomor DESC";
