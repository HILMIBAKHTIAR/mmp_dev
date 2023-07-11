<?php
$index["debug"] = 1;
$index["filter"] = 1;
$index_filter["hide"] = 0;

$i = 0;
$index_filter["field"][$i]["label"] = "Tanggal Awal";
$index_filter["field"][$i]["input"] = "tanggal_awal";
$index_filter["field"][$i]["input_class"] = "date_1";
if (empty($index["query_filter"]))
	$index_filter["field"][$i]["input_value"] = '0000-00-00';
$i++;
$index_filter["field"][$i]["label"] = "Tanggal Akhir";
$index_filter["field"][$i]["input"] = "tanggal_akhir";
$index_filter["field"][$i]["input_class"] = "date_1";
if (empty($index["query_filter"]))
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
$i++;
$index_table["column"][$i]["name"] = "jenis_uang";
$index_table["column"][$i]["sort"] = "a.jenis_uang";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Jenis Uang";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "status_kliring";
$index_table["column"][$i]["sort"] = "IF(a.status_kliring = 0, 'Kliring Giro', 'Unkliring Giro')";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Status Kliring";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "dibuat_pada";
$index_table["column"][$i]["sort"] = "a.dibuat_pada";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Dibuat Pada";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "keterangan";
$index_table["column"][$i]["sort"] = "a.keterangan";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Keterangan";
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
$index["query_select"] = "
	SELECT
		a.*,
		DATE_FORMAT(a.dibuat_pada,'".$_SESSION["setting"]["date_sql"]."') AS dibuat_pada,
		IF(a.status_kliring = 'kliring', 'Kliring Giro', 'Unkliring Giro') as status_kliring
	FROM ".$index["query_from"]." a
";
// $index["query_where"] = " a.status_aktif = 1";
$index["default_order"] = "	a.dibuat_pada DESC";
// END SETTING QUERY
?>