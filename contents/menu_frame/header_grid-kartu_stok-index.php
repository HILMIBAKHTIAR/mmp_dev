<?php
$index["debug"] = 0;
$index["filter"]      = 1;
$index_filter["hide"] = 0;
// $index["ajax"] 			= 1;
$index_navbutton["generate"] = "reload";
$filter["start_date"] 	= $_SESSION["setting"]["filter_start_date"];
$filter["end_date"] 	= $_SESSION["setting"]["filter_end_date"];

// --------------------------------FILTER------------------------------------
$i = 0;

$index_filter["field"][$i]["label"]                         = "Departement";
$index_filter["field"][$i]["label_class"]                   = "";
$index_filter["field"][$i]["input"]                         = "nomormhrelasi";
$index_filter["field"][$i]["input_class"]                   = "";
$index_filter["field"][$i]["input_element"]                 = "browse";
$index_filter["field"][$i]["browse_setting"]                = "master_departemen";
$i++;

$index_filter["field"][$i]["form_group"] 		= 0;
$index_filter["field"][$i]["label"]                         = "Group";
$index_filter["field"][$i]["label_class"]                   = "";
$index_filter["field"][$i]["input"]                         = "nomormhrelasi";
$index_filter["field"][$i]["input_class"]                   = "";
$index_filter["field"][$i]["input_element"]                 = "browse";
$index_filter["field"][$i]["browse_setting"]                = "master_group_user";
$i++;

$index_filter["field"][$i]["label"]                         = "Subgroup";
$index_filter["field"][$i]["label_class"]                   = "";
$index_filter["field"][$i]["input"]                         = "nomormhrelasi";
$index_filter["field"][$i]["input_class"]                   = "";
$index_filter["field"][$i]["input_element"]                 = "browse";
$index_filter["field"][$i]["browse_setting"]                = "subgroup";
$i++;

$index_filter["field"][$i]["form_group"] 		= 0;
$index_filter["field"][$i]["label"]                         = "Lokasi";
$index_filter["field"][$i]["label_class"]                   = "";
$index_filter["field"][$i]["input"]                         = "nomormhlokasi";
$index_filter["field"][$i]["input_class"]                   = "";
$index_filter["field"][$i]["input_element"]                 = "browse";
$index_filter["field"][$i]["browse_setting"]                = "lokasi_pembelian";
$i++;

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

$index_table["column"][$i]["name"] 		= "nama_barang";
$index_table["column"][$i]["sort"] 		= "a.nama_barang";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Nama Barang";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "unit";
$index_table["column"][$i]["sort"] 		= "t.unit";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Unit";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "pr";
$index_table["column"][$i]["sort"] 		= "m.pr";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "PR";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "lead";
$index_table["column"][$i]["sort"] 		= "m2.lead";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Lead";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "doi";
$index_table["column"][$i]["sort"] 		= "m3.doi";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "DOI";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "last_pr";
$index_table["column"][$i]["sort"] 		= "m4.last_pr";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Last PR";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "tgl_in";
$index_table["column"][$i]["sort"] 		= "m4.tgl_in";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Tgl In";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "tgl_pakai";
$index_table["column"][$i]["sort"] 		= "m4.tgl_pakai";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Tgl Pakai";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "group";
$index_table["column"][$i]["sort"] 		= "m4.group";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Group";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;



$index["query_select"] = " 	SELECT
							a.*,
							t2.kode kode_order,
							m.nama nama_barang,
							m2.nama supplier,
							t4.kode kode_order,
							m3.nama pembuat,
							m4.nama approve
							from thprapenagihanhutang a
							left join tdprapenagihanhutang t on t.nomorthprapenagihanhutang = a.nomor 
							left join thbelinota t2 on t2.nomor = t.transaksinomor and transaksitabel = 'thbelinota' 
							left join tdbelinota t3 on t3.nomorthbelinota = t2.nomor 
							left join mhbarang m on m.nomor = t3.nomormhbarang 
							left join mhrelasi m2 on m2.nomor = t2.nomormhrelasi 
							left join thbeliorder t4 on t4.nomor = t2.nomorthbeliorder 
							left join tdbeliorder t5 on t5.nomorthbeliorder = t4.nomor 
							left join thbelipermintaan t6 on t6.nomor = t5.nomorthbelipermintaan 
							left join mhadmin m3 on m3.nomor = t6.dibuat_oleh 
							left join mhadmin m4 on m4.nomor = t6.disetujui_oleh 
							
										";

if (empty($index["query_filter"]))
	$index["query_filter"] = " AND a.tanggal = '" . date("Y-m-d") . "'";
$index["query_where"] .= "	AND a.nomor <> 0 group by a.nomor";
$index["default_order"] = "	a.nomor DESC";



