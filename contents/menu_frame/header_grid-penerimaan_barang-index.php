<?php
$index["debug"] = 0;
$index["filter"]      = 1;
// $index["ajax"] 			= 1;
$index_filter["hide"] = 0;
$filter["start_date"] 	= $_SESSION["setting"]["filter_start_date"];
$filter["end_date"] 	= $_SESSION["setting"]["filter_end_date"];

// --------------------------------FILTER------------------------------------
$i = 0;
$index_filter["field"][$i]["label"]                         = "Relasi";
$index_filter["field"][$i]["label_class"]                   = "";
$index_filter["field"][$i]["input"]                         = "nomormhrelasi";
$index_filter["field"][$i]["input_class"]                   = "";
$index_filter["field"][$i]["input_element"]                 = "browse";
$index_filter["field"][$i]["browse_setting"]                = "master_supplier_penerimaan";
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

$index_table["column"][$i]["name"] 		= "tanggal";
$index_table["column"][$i]["sort"] 		= "a.tanggal";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Tanggal";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "kode_order";
$index_table["column"][$i]["sort"] 		= "d.kode_order";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Kode Order";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "nama_barang";
$index_table["column"][$i]["sort"] 		= "b.nama_barang";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Nama Barang";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "supplier";
$index_table["column"][$i]["sort"] 		= "e.supplier";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "supplier";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "pembuat";
$index_table["column"][$i]["sort"] 		= "a.pembuat";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "pembuat";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "approve";
$index_table["column"][$i]["sort"] 		= "a.approve";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Approve";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;

$index_table["column"][$i]["name"] 		= "status_aktif";
$index_table["column"][$i]["sort"] 		= "t.status";
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
							t.kode as kode_order,
							(SELECT GROUP_CONCAT(DISTINCT CONCAT('&#x25C8;&nbsp;', x.nama) SEPARATOR '<br>') 
							FROM tdbeliorder a1 join thbeliorder t3 on t3.nomor = a1.nomorthbeliorder join mhbarang x on x.nomor = a1.nomormhbarang WHERE t3.nomor = a.nomorthbeliorder AND a1.status_aktif>0) nama_barang,
							m2.nama as supplier, 
							m3.nama as pembuat,
							m4.nama as approve,
							t.status_aktif 
							FROM
							thbelinota a
							left join thbeliorder t on t.nomor = a.nomorthbeliorder 
							left join mhrelasi m2 on m2.nomor = t.nomormhrelasi and m2.nomormhrelasikelompok = 2
							left join mhadmin m3 on m3.nomor = t.dibuat_oleh 
							left join mhadmin m4 on m4.nomor = t.disetujui_oleh
										";

$index["query_where"] .= "	AND a.nomor <> 0 AND a.jenis = 'btb' and a.saldo_awal  = 0";

if (empty($index["query_filter"]))
	$index["query_filter"] = " AND a.tanggal = '" . date("Y-m-d") . "'";
	
$index["default_order"] = "	a.nomor DESC";



