<?php
$index["debug"] = 0;
$index["filter"]      = 1;
$index_filter["hide"] = 1;
// $index["ajax"] 			= 1;
$index_navbutton["generate"] = "reload";
$filter["start_date"] 	= $_SESSION["setting"]["filter_start_date"];
$filter["end_date"] 	= $_SESSION["setting"]["filter_end_date"];

// --------------------------------FILTER------------------------------------

$i = 0;
$index_filter["field"][$i]["label"]                         = "Relasi";
$index_filter["field"][$i]["label_class"]                   = "";
$index_filter["field"][$i]["input"]                         = "nomormhrelasi";
$index_filter["field"][$i]["input_class"]                   = "";
$index_filter["field"][$i]["input_element"]                 = "browse";
$index_filter["field"][$i]["browse_setting"]                = "master_relasi";
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
$index_table["column"][$i]["name"] = "tanggal";
$index_table["column"][$i]["sort"] = "a.tanggal";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Tanggal";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "relasi";
$index_table["column"][$i]["sort"] = "a.relasinama";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Supplier";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "kode_btb";
$index_table["column"][$i]["sort"] = "kode_btb";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Nota Beli";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "uang_keluar";
$index_table["column"][$i]["sort"] = "uang_keluar";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Uang Keluar";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "keterangan_nota";
$index_table["column"][$i]["sort"] = "keterangan_nota";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Keterangan Nota";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;
$index_table["column"][$i]["name"] = "total";
$index_table["column"][$i]["sort"] = "a.total_idr";
$index_table["column"][$i]["search"] = 1;
$index_table["column"][$i]["caption"] = "Total";
$index_table["column"][$i]["align"] = "right";
$index_table["column"][$i]["width"] = "";
$i++;
// $index_table["column"][$i]["name"] = "status_disetujui";
// $index_table["column"][$i]["sort"] = "a.status_disetujui";
// $index_table["column"][$i]["search"] = 0;
// $index_table["column"][$i]["caption"] = "Status";
// $index_table["column"][$i]["align"] = "";
// $index_table["column"][$i]["width"] = "";
// $i++;
$index_table["column"][$i]["name"] = "action";
$index_table["column"][$i]["sort"] = "empty";
$index_table["column"][$i]["search"] = 0;
$index_table["column"][$i]["caption"] = "Action";
$index_table["column"][$i]["align"] = "";
$index_table["column"][$i]["width"] = "";
$i++;




$index["query_select"] = " 	SELECT
							a.*,
							a.kode,
							a.tanggal,
							0 uang_keluar, 
							a.total,
							test.relasi, 
							test.kode_btb, 
							test.keterangan_nota
							from thpenagihanhutang a
							left join (select m2.nama relasi, t5.kode kode_btb, t5.keterangan keterangan_nota, t4.nomorthpenagihanhutang 
														FROM tdpenagihanhutang t4 
													left join thbelinota t5 on t5.nomor = t4.transaksi_nomor and t4.transaksi_tabel = 'thbelinota' 
													left join mhrelasi m2 on m2.nomor = t5.nomormhrelasi and m2.status_aktif > 0
													group by t4.nomorthpenagihanhutang 
											) as test on test.nomorthpenagihanhutang = a.nomor  

							
										";

if (empty($index["query_filter"]))
	$index["query_filter"] = " AND a.dibuat_pada = '" . date("Y-m-d") . "'";
$index["query_where"] .= "	AND a.nomor <> 0 and a.status_aktif = 1";
$index["default_order"] = "	a.nomor DESC";



