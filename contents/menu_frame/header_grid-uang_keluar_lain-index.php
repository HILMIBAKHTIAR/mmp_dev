<?php
$index["debug"] = 1;

// $index["ajax"] = 1;
$index["filter"] = 1;
$index_filter["hide"] = 0;
$index_navbutton["generate"] = "reload|add|export_excel";

// $index_navbutton["generate"] .= "|filter_column";
// $index["filter_column"] = 1;

$i = 0;
$index_filter["field"][$i]["form_group"] = 0;
$index_filter["field"][$i]["label"] = "Tanggal Awal";
$index_filter["field"][$i]["input"] = "tanggal_awal";
$index_filter["field"][$i]["input_class"] = "date_1";
if (empty($index["query_filter"]))
	$index_filter["field"][$i]["input_value"] = '0000-00-00';
$i++;
$index_filter["field"][$i]["form_group"] = 0;
$index_filter["field"][$i]["label"] = "Tanggal Akhir";
$index_filter["field"][$i]["input"] = "tanggal_akhir";
$index_filter["field"][$i]["input_class"] = "date_1";
if (empty($index["query_filter"]))
	$index_filter["field"][$i]["input_value"] = '0000-00-00';
$i++;

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

$index_table["column"][$i]["name"] 		= "metode";
$index_table["column"][$i]["sort"] 		= "a.metode";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Metode";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "account";
$index_table["column"][$i]["sort"] 		= "a.account";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Account";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

// $index_table["column"][$i]["name"] 		= "valuta";
// $index_table["column"][$i]["sort"] 		= "a.valuta";
// $index_table["column"][$i]["search"] 	= 0;
// $index_table["column"][$i]["caption"] 	= "Valuta";
// $index_table["column"][$i]["align"] 	= "";
// $index_table["column"][$i]["width"] 	= "";
// $i++;

$index_table["column"][$i]["name"] 		= "total";
$index_table["column"][$i]["sort"] 		= "a.total";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Total";
$index_table["column"][$i]["align"] 	= "right";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "keterangan_td";
$index_table["column"][$i]["sort"] 		= "t.keterangan";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Keterangan";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "pembuat";
$index_table["column"][$i]["sort"] 		= "m2.nama";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Pembuat";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "status_aktif";
$index_table["column"][$i]["sort"] 		= "a.status_aktif";
$index_table["column"][$i]["search"] 	= 0;
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



$index["query_select"] = " 
	SELECT
		a.*,
		m.nama as valuta,
		m2.nama as pembuat,
		(SELECT GROUP_CONCAT(DISTINCT CONCAT('&#x25C8;&nbsp;', x.nama) SEPARATOR '<br>') FROM tduangkeluar a1 join mhaccount x on x.nomor = a1.nomormhaccount WHERE a1.nomorthuangkeluar = a.nomor AND a1.status_aktif>0) account,
		(SELECT GROUP_CONCAT(DISTINCT CONCAT('&#x25C8;&nbsp;', a1.keterangan) SEPARATOR '<br>') FROM tduangkeluar a1 WHERE a1.nomorthuangkeluar = a.nomor AND a1.status_aktif>0) keterangan_td
	from thuangkeluar a
	join mhvaluta m on m.nomor = a.nomormhvaluta 
	join mhadmin m2 on m2.nomor = a.diubah_oleh 
";

$index["query_where"] .= "	AND a.nomor <> 0 AND a.tipe = 1";
if (empty($index["query_filter"]))
	$index["query_where"] .= " AND a.tanggal = '" . date("Y-m-d") . "' ";
$index["default_order"] = "	a.nomor DESC";



