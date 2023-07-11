<?php
$index["debug"] = 0;
// $index["ajax"] 			= 1;
$index["filter"]      = 1;
$index_filter["hide"] = 0;
$filter["start_date"] 	= $_SESSION["setting"]["filter_start_date"];
$filter["end_date"] 	= $_SESSION["setting"]["filter_end_date"];

// --------------------------------FILTER------------------------------------
$i = 0;

$index_filter["field"][$i]["label"] 			= "Tanggal Awal";
$index_filter["field"][$i]["label_class"] 		= "req";
$index_filter["field"][$i]["input"] 			= $filter["start_date"];
$index_filter["field"][$i]["input_class"] 		= "required date_1";
if(empty($_SESSION["menu_".$_SESSION["g.menu"]]["filter_".$filter["start_date"]]))
	$index_filter["field"][$i]["input_value"] 	= date($_SESSION["setting"]["date"]);
$i++;

$index_filter["field"][$i]["form_group"] 		= 0;
$index_filter["field"][$i]["label"] 			= "Tanggal Akhir";
$index_filter["field"][$i]["label_class"] 		= "req";
$index_filter["field"][$i]["input"] 			= $filter["end_date"];
$index_filter["field"][$i]["input_class"] 		= "required date_1";
if(empty($_SESSION["menu_".$_SESSION["g.menu"]]["filter_".$filter["end_date"]]))
	$index_filter["field"][$i]["input_value"] 	= date($_SESSION["setting"]["date"]);
$i++;
// --------------------------------END FILTER------------------------------------


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

$index_table["column"][$i]["name"] 		= "tanggal";
$index_table["column"][$i]["sort"] 		= "a.tanggal";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Tanggal";
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

// session_start();
// echo '<pre>';var_dump($_SESSION);echo '</pre>';

$index["query_select"] = " 	SELECT
							a.*
							from thbelipermintaan a
										";

$index["query_where"]  	.= "AND IF(".$_SESSION["menu_".$_SESSION["g.menu_kode"]]["priv"]["view_all"]." <> 1, 
a.dibuat_oleh = ".$_SESSION["login"]["nomor"].", TRUE)
AND a.nomor <> 0 AND a.nomormhdepartemen = 5";


if(empty($index["query_filter"]))
$index["query_filter"] = " AND a.tanggal = '".date("Y-m-d")."'";

$index["default_order"] = "	a.nomor DESC";



