
<?php
$index["debug"] = 1;
$index_navbutton["generate"] = "reload|import_excel";
$index["filter"]      = 1;
$index_filter["hide"] = 0;
$filter["start_date"] 	= $_SESSION["setting"]["filter_start_date"];
$filter["end_date"] 	= $_SESSION["setting"]["filter_end_date"];

// --------------------------------FILTER------------------------------------
$i = 0;
$index_filter["field"][$i]["label"]                         = "Supplier";
$index_filter["field"][$i]["label_class"]                   = "";
$index_filter["field"][$i]["input"]                         = "nomormhrelasi";
$index_filter["field"][$i]["input_class"]                   = "";
$index_filter["field"][$i]["input_col"]                     = "col-sm-4";
$index_filter["field"][$i]["input_element"]                 = "browse";
$index_filter["field"][$i]["browse_setting"]                = "master_supplier";
$i++;
$index_filter["field"][$i]["label"] 			= "Tanggal Awal";
$index_filter["field"][$i]["label_class"] 		= "req";
$index_filter["field"][$i]["input"] 			= $filter["start_date"];
$index_filter["field"][$i]["input_class"] 		= "required date_1";
if (empty($_SESSION["menu_" . $_SESSION["g.menu"]]["filter_" . $filter["start_date"]]))
	$index_filter["field"][$i]["input_value"] 	= date($_SESSION["setting"]["date"]);
$i++;
$index_filter["field"][$i]["form_group"] 		= 0;
$index_filter["field"][$i]["label"] 			= "Tanggal Akhir";
$index_filter["field"][$i]["label_class"] 		= "req";
$index_filter["field"][$i]["input"] 			= $filter["end_date"];
$index_filter["field"][$i]["input_class"] 		= "required date_1";
if (empty($_SESSION["menu_" . $_SESSION["g.menu"]]["filter_" . $filter["end_date"]]))
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

$index_table["column"][$i]["name"] 		= "kode_permintaan";
$index_table["column"][$i]["sort"] 		= "d.kode_permintaan";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Kode Permintaan";
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
$index_table["column"][$i]["caption"] 	= "Pembuat";
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
$index_table["column"][$i]["sort"] 		= "a.status_aktif";
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
							(SELECT GROUP_CONCAT(DISTINCT CONCAT('&#x25C8;&nbsp;', x.kode)) FROM tdbeliorder a1 join thbelipermintaan x on x.nomor = a1.nomorthbelipermintaan WHERE a1.nomorthbeliorder=a.nomor AND a1.status_aktif>0) kode_permintaan,
							e.nama as supplier,
							m3.nama as pembuat,
							m2.nama as approve,
							a.status_aktif
							from thbelipraorder a
							join tdbelipraorder t on t.nomorthbelipraorder = a.nomor 
							join mhrelasi e on e.nomor = t.nomormhrelasi 
							left join mhadmin m2 on m2.nomor = a.disetujui_oleh 
							left join mhadmin m3 on m3.nomor = a.dibuat_oleh
			
										";

if (empty($index["query_filter"]))
	$index["query_filter"] = " AND a.tanggal = '" . date("Y-m-d") . "'";
$index["query_where"] .= "	AND a.nomor <> 0 and a.status_disetujui > 0 and a.status_aktif > 0";
$index["default_order"] = "	a.nomor DESC";