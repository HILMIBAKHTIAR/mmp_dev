<?php
$index["debug"] = 1;
$index["ajax"] = 1;

$index["filter"] = 1;
$index_filter["hide"] = 0;

$index_navbutton["generate"] .= "|filter_column";
$index["filter_column"] = 1;

$i = 0;
$index_filter["field"][$i]["label"] ="Supplier";
$index_filter["field"][$i]["input"] ="supplier";
$index_filter["field"][$i]["input_element"] ="browse";
$index_filter["field"][$i]["browse_setting"] ="master_supplier";
$i++;
$index_filter["field"][$i]["label"] = "Tanggal Awal";
$index_filter["field"][$i]["input"] = "tanggal_awal";
$index_filter["field"][$i]["input_class"] = "date_1";
if(empty($index["query_filter"]))
	$index_filter["field"][$i]["input_value"] = '0000-00-00';
$i++;
$index_filter["field"][$i]["form_group"] = 0;
$index_filter["field"][$i]["label"] = "Tanggal Akhir";
$index_filter["field"][$i]["input"] = "tanggal_akhir";
$index_filter["field"][$i]["input_class"] = "date_1";
if(empty($index["query_filter"]))
	$index_filter["field"][$i]["input_value"] = '0000-00-00';
$i++;

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
$index_table["column"][$i]["visible"] 	= visible_index_column("kode");
$i++;
$index_table["column"][$i]["name"] = "tanggal";
$index_table["column"][$i]["sort"] = "a.tanggal";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Tanggal";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$index_table["column"][$i]["visible"] 	= visible_index_column("tanggal");
$i++;
$index_table["column"][$i]["name"] = "supplier";
$index_table["column"][$i]["sort"] = "d.nama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Supplier";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$index_table["column"][$i]["visible"] 	= visible_index_column("supplier");
$i++;
$index_table["column"][$i]["name"] = "total";
$index_table["column"][$i]["sort"] = "a.nomor";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Total (IDR)";
$index_table["column"][$i]["align"] = "right";
$index_table["column"][$i]["width"] = "";
$index_table["column"][$i]["visible"] 	= visible_index_column("total");
$i++;
$index_table["column"][$i]["name"] = "keterangan";
$index_table["column"][$i]["sort"] = "a.keterangan";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Keterangan";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$index_table["column"][$i]["visible"] 	= visible_index_column("keterangan");
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
$index["query_select"] = "
	SELECT 
		a.*, 
		CONCAT(d.kode, ' - ', d.nama) as supplier,
		DATE_FORMAT(a.tanggal,'".$_SESSION['setting']['date_sql']."') as tanggal
	FROM ".$index["query_from"]." a  
	JOIN mhrelasi d on d.nomor = a.nomormhrelasi				
";
$index["query_where"] = " a.status_aktif = 1 AND a.saldo_awal = 1 and a.nomormhcabang = ".$_SESSION["cabang"]["nomor"];

$index["default_order"] = "	a.nomor desc";
// END SETTING QUERY
?>