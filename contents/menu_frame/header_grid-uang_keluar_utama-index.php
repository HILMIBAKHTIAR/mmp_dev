<?php
$index["debug"] = 1;
$index["filter"] = 1;
$index_filter["hide"] = 0;
// $index_navbutton["generate"] ="reload|add";

$i = 0;
$index_filter["field"][$i]["label"] ="Supplier";
$index_filter["field"][$i]["input"] ="relasinomor";
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
$index_table["column"][$i]["sort"] 		= "b.account";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Account";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "supplier";
$index_table["column"][$i]["sort"] 		= "e.nama";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Supplier";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

// $index_table["column"][$i]["name"] 		= "valuta";
// $index_table["column"][$i]["sort"] 		= "c.nama";
// $index_table["column"][$i]["search"] 	= 0;
// $index_table["column"][$i]["caption"] 	= "Valuta";
// $index_table["column"][$i]["align"] 	= "";
// $index_table["column"][$i]["width"] 	= "";
// $i++;

$index_table["column"][$i]["name"] 		= "total";
$index_table["column"][$i]["sort"] 		= "a.total";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Total";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "keterangan";
$index_table["column"][$i]["sort"] 		= "a.keterangan";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Keterangan";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "pembuat";
$index_table["column"][$i]["sort"] 		= "d.nama";
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



$index["query_select"] = " 	SELECT
							a.nomor,
							a.kode 
							, a.tanggal 
							, a.metode 
							, b.nama as account
							, e.nama as supplier
							, c.nama as valuta
							, a.total 
							, a.keterangan 
							, d.nama as pembuat
							from thuangkeluar a
							left join mhaccount b on b.nomor = a.nomormhaccount 
							join mhvaluta c on c.nomor = a.nomormhvaluta 
							join mhadmin d on d.nomor = a.dibuat_oleh  
							join mhrelasi e on e.nomor = a.nomormhrelasi and e.nomormhrelasikelompok = 2
										";

$index["query_where"] .= "	AND a.nomor <> 0 AND a.tipe = 1";

if(empty($index["query_filter"]))
    $index["query_where"] .= " AND a.tanggal = '".date("Y-m-d")."' ";

$index["default_order"] = "	a.tanggal DESC, a.kode DESC";
?>