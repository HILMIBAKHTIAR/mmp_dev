<?php
$index["debug"] = 1;
$index["filter"]      = 1;
$index["ajax"] 			= 1;
$index_filter["hide"] = 0;
$index_navbutton["generate"] = "reload|add|delete";

$index_navbutton["generate"] .= "|filter_column";
$index["filter_column"] = 1;

$filter["start_date"] 	= $_SESSION["setting"]["filter_start_date"];
$filter["end_date"] 	= $_SESSION["setting"]["filter_end_date"];

// --------------------------------FILTER------------------------------------
$i = 0;
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

$index_filter["field"][$i]["label"]                         = "Kode Barang";
$index_filter["field"][$i]["label_class"]                     = "req";
$index_filter["field"][$i]["input"]                         = "nomorthbarang";
$index_filter["field"][$i]["input_class"]                     = "required";
$index_filter["field"][$i]["input_element"]                 = "browse";
$index_filter["field"][$i]["browse_setting"]                 = "master_barang_customer_cylinder";
$index_filter["field"][$i]["browse_set"]["id"] = "master_barang_customer_cylinder";
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

$index_table["column"][$i]["name"] 		= "kode_custom";
$index_table["column"][$i]["sort"] 		= "a.kode_custom";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Kode";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("kode_custom");
$i++;

$index_table["column"][$i]["name"] 		= "kode_silinder";
$index_table["column"][$i]["sort"] 		= "a.kode_silinder";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Kode Cylinder";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("kode_silinder");
$i++;

$index_table["column"][$i]["name"] 		= "barang";
$index_table["column"][$i]["sort"] 		= "b.nama_barang_mmp";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Barang";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("barang");
$i++;

$index_table["column"][$i]["name"] 		= "tanggal";
$index_table["column"][$i]["sort"] 		= "a.tanggal";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Tanggal Pengajuan";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("tanggal");
$i++;

$index_table["column"][$i]["name"] 		= "jenis";
$index_table["column"][$i]["sort"] 		= "a.jenis";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Jenis Pemesanan Silinder";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("jenis");
$i++;

$index_table["column"][$i]["name"] 		= "nomor_md";
$index_table["column"][$i]["sort"] 		= "a.nomor_md";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "No MD";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("nomor_md");
$i++;

$index_table["column"][$i]["name"] 		= "design";
$index_table["column"][$i]["sort"] 		= "a.design";
$index_table["column"][$i]["search"] 	= 1;
$index_table["column"][$i]["caption"] 	= "Design";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$index_table["column"][$i]["visible"] 	= visible_index_column("design");
$i++;

$index_table["column"][$i]["name"] 		= "action";
$index_table["column"][$i]["sort"] 		= "empty";
$index_table["column"][$i]["search"] 	= 0;
$index_table["column"][$i]["caption"] 	= "Action";
$index_table["column"][$i]["align"] 	= "";
$index_table["column"][$i]["width"] 	= "";
$i++;



$test = '
<a data-toggle="modal" href="#myModal';

$modal1 = '"> <img src="https://dev72.inspiraworld.com/mmp_dev/uploads/';


$test2 = '" alt="Image" id="profilepic" style="cursor:pointer; display:flex !important; justify-content:center; height:auto; width:40%;"> </a>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="myModal';

$modal2 = '"><div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-body">
	<img src="https://dev72.inspiraworld.com/mmp_dev/uploads/';

$test3 = '" alt="Image" class="img-responsive" id="profilepic" style="cursor:pointer;display:inline;margin: 0 auto; height:auto; width:100%;"></div></div></div></div>
';


$index["query_select"] = " 	SELECT
							a.*
							, b.nama as barang
							, CONCAT('$test', m.nomor, '$modal1', m.directory, '$test2', m.nomor, '$modal2', m.directory, '$test3') AS design
							FROM
							thpemesanancylinder a
							join thbarang b on a.nomorthbarang = b.nomor
							left join mharchievedfiles m on m.file_nomor = a.nomor and m.file_tabel = 'thpemesanancylinder' and m.kategori = 'PEMESANAN_SILINDER'
										";

// if (empty($index["query_filter"]))
// 	$index["query_filter"] = " AND a.tanggal = '" . date("Y-m-d") . "'";
$index["query_where"] .= "	AND a.nomor <> 0";
$index["default_order"] = "	a.nomor DESC";
