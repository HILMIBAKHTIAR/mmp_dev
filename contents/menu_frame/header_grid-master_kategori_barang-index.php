<?php
$index["debug"] = 1;
// $index["ajax"] = 1;
// $index_datatable["drawCallback"] = "function ( settings ) {grupReport(this,settings,0,0);}";
$index_datatable["paging"] = "false";
$index_navbutton["generate"] ="reload|add";

// SETTING FIELD INDEX
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
$index_table["column"][$i]["caption"] = "Nama Kategori"; 
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
// END SETTING FIELD INDEX

// SETTING QUERY
$index["query_select"] = "	SELECT 
								a.*
							FROM mhbarangkategori2 a 
							 ";
$index["query_where"] .= "	AND a.nomor > 0 ";
$index["default_order"] = "a.kode";
// END SETTING QUERY
?>
