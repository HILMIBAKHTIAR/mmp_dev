<?php
$edit["debug"]       = 1;
// $edit["string_code"]    = "kode_".$_SESSION["menu_".$_SESSION["g.menu"]]["string"];


// $edit["sp_approve"] 				= "sp_disetujui_thsuratkerja";
// $edit["sp_approve_param"] 			= array("param_nomormhadmin|0","param_status_disetujui|0","param_nomor|0","param_mode|1");
// $edit["sp_disapprove"] 				= "sp_disetujui_thsuratkerja";
// $edit["sp_disapprove_param"] 		= array("param_nomormhadmin|0","param_status_dibatalkan|0","param_nomor|0","param_mode|1");
// $_POST["param_nomormhadmin"] 		= $_SESSION["login"]["nomor"];
// $_POST["param_status_disetujui"]	= 1;
// $_POST["param_status_dibatalkan"]	= 0;
// $_POST["param_nomor"] 				= $_GET["no"];
// $_POST["param_mode"] 				= "";





// //------------------------------------------------GRID DATA 1------------------------------------------------------
// $i = 0;
// $edit["detail"][$i]["table_name"] = "mdbarang_produksi";
// $edit["detail"][$i]["field_name"] = array(
//     "nomormhsatuanqty",
//     "nomormhsatuanberat"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_produksi";
// $i++;
// //------------------------------------------------END GRID DATA 1------------------------------------------------------





// //------------------------------------------------GRID DATA 2------------------------------------------------------
// $edit["detail"][$i]["table_name"] = "mdbarang_accounting";
// $edit["detail"][$i]["field_name"] = array(
//     "nomormhsatuanqty",
//     "nomormhsatuanberat",
//     "nomormhsatuanpanjang"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_accounting";
// $i++;
// //------------------------------------------------END GRID DATA 2------------------------------------------------------



// //------------------------------------------------GRID DATA 3------------------------------------------------------

// $edit["detail"][$i]["table_name"] = "mdbarang_purchasing";
// $edit["detail"][$i]["field_name"] = array(
//     "nomormhsatuanqty",
//     "nomormhsatuanberat"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_purchasing";
// $i++;
// //------------------------------------------------END GRID DATA 3------------------------------------------------------


// //------------------------------------------------GRID DATA 4------------------------------------------------------
// $edit["detail"][$i]["table_name"] = "mdbarang_gudang";
// $edit["detail"][$i]["field_name"] = array(
//     "nomormhsatuanqty",
//     "nomormhsatuanberat",
//     "nomormhsatuanpanjang"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_gudang";
// $i++;
// //------------------------------------------------END GRID DATA 4------------------------------------------------------







// //------------------------------------------------GRID DATA 5------------------------------------------------------
// $edit["detail"][$i]["table_name"] = "mdbarang_rnd";
// $edit["detail"][$i]["field_name"] = array(
//     "nomormhsatuanqty"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_rnd";
// $i++;
// //------------------------------------------------END GRID DATA 5------------------------------------------------------







$i = 0;

if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "produksi|Produksi", "purchasing|Purchasing", "gudang|Gudang", "accounting|Accounting", "rnd|Rnd", "info|Info");
} else {
    if (isset($_GET["no"])) {
        $edit["field"][$i]["box_tabs"] = array("data|Data", "produksi|Produksi", "purchasing|Purchasing", "gudang|Gudang", "accounting|Accounting", "rnd|Rnd", "info|Info");
    } else {
        $edit["field"][$i]["box_tabs"] = array("data|Data", "produksi|Produksi", "purchasing|Purchasing", "gudang|Gudang", "accounting|Accounting", "rnd|Rnd", "info|Info");
    }
}


$edit["field"][$i]["box_tab"]                           = "data";


$edit["field"][$i]["form_group_class"]                 = "hiding";
$edit["field"][$i]["label"]                         = "Kategori";
$edit["field"][$i]["input"]                         = "nomormhbarangkategori";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"]                 = 6;
$i++;


$edit["field"][$i]["form_group_class"]                 = "hiding";
$edit["field"][$i]["label"]                         = "Kelompok";
$edit["field"][$i]["input"]                         = "nomormhbarangkelompok";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"]                 = 1;
$i++;



$edit["field"][$i]["label"]                         = "Kode";
$edit["field"][$i]["input"]                         = "kode";
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
// if ($edit["mode"] == "add")
// 	$edit["field"][$i]["input_value"] 				= formatting_code($con, $edit["string_code"]);
$i++;

//untuk ambil kodehide
$edit["field"][$i]["form_group_class"]                 = "hiding";
$edit["field"][$i]["label"]                         = "Kode";
$edit["field"][$i]["input"]                         = "kodehide";
$edit["field"][$i]["input_save"]                         = "skip";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"]                 = "PAPERC";
$i++;


$edit["field"][$i]["label"]                     = "Lokasi";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhgudang";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_gudang";
$edit["field"][$i]["input_value"] = "GUDANG BAHAN BAKU|1";
$i++;

// belum auto generate
$edit["field"][$i]["label"]                     = "Nama";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                        = "nama";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

// $edit["field"][$i]["label"] 						= "Diameter";
// $edit["field"][$i]["label_class"] 					= "req";
// $edit["field"][$i]["input"] 						= "nomormhpapercore";
// $edit["field"][$i]["input_class"] 					= "required";
// $edit["field"][$i]["input_element"] 				= "browse";
// $edit["field"][$i]["browse_setting"] 				= "master_paper_core";
// $edit["field"][$i]["input_attr"]["onchange"] = "test()";
// $i++;
$edit["field"][$i]["label"]                     = "Tebal";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                        = "ketebalan";
$edit["field"][$i]["input_class"]                 = "iptnumber required";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["onchange"] = "inputKode()";
$i++;

$edit["field"][$i]["label"]                     = "Diameter";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                        = "diameter";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_class"]                 = "iptnumber required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["onchange"] = "inputKode()";
$i++;

$edit["field"][$i]["label"]                     = "Panjang";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                        = "panjang";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_class"]                 = "iptnumber required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["onchange"] = "inputKode()";
// $edit["field"][$i]["input_attr"]["onchange"] = "test()";
$i++;


$edit["field"][$i]["label"]                   = "Potongan";
$edit["field"][$i]["input_element"] = "checkbox";
$edit["field"][$i]["input_col"] = "col-sm-9 ";
$edit["field"][$i]["input"]            = "potongan";
$edit["field"][$i]["input_attr"]["onchange"] = "inputKode()";
$i++;



$edit["field"][$i]["label"]                         = "Stok Minimum";
$edit["field"][$i]["input"]                         = "stok_minimum";
$edit["field"][$i]["input_class"]                 = "iptnumber required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                         = "Stok Maximum";
$edit["field"][$i]["input"]                         = "stok_maximum";
$edit["field"][$i]["input_class"]                 = "iptnumber required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["label"]                         = "Doi";
$edit["field"][$i]["input"]                         = "doi";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$edit["field"][$i]["input_attr"]["onchange"] = "test()";
$i++;

$edit["field"][$i]["label"]                         = "Status Aktif";
$edit["field"][$i]["input"]                         = "status_aktif";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_option"]                     = array("1|Aktif", "0|Tidak Aktif");
$i++;

$edit["field"][$i]["label"]                         = "Jenis";
$edit["field"][$i]["input"]                         = "jenis";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_option"]                     = array("baru|Baru", "potongan|Potongan");
$i++;

$edit["field"][$i]["label"]                      = "Note";
$edit["field"][$i]["label_col"]                 = "col-sm-12";
$edit["field"][$i]["label_attr"]["style"]         = "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"]                      = "note";
$edit["field"][$i]["input_element"]              = "textarea";
$edit["field"][$i]["input_attr"]["rows"]         = "5";
$edit["field"][$i]["input_col"]                 = "col-sm-12";
$i++;




// --------------------------------------------PRODUKSI---------------------------------
$edit["field"][$i]["box_tab"] = "produksi";

$edit["field"][$i]["label"]                         = "Satuan Qty";
$edit["field"][$i]["input"]                         = "nomormhsatuanqtyproduksi";
// $edit["field"][$i]["label_class"] 				    = "req";
// $edit["field"][$i]["input_class"] 				    = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_setting"]                 = "master_satuan_qty";
$i++;


// --------------------------------------------END PRODUKSI---------------------------------



// --------------------------------------------PURCHASING---------------------------------
$edit["field"][$i]["box_tab"] = "purchasing";


$edit["field"][$i]["label"]                         = "Satuan Qty";
$edit["field"][$i]["input"]                         = "nomormhsatuanqtypurchasing";
// $edit["field"][$i]["label_class"] 				    = "req";
// $edit["field"][$i]["input_class"] 				    = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_setting"]                 = "master_satuan_qty_purchasing";
$i++;

// --------------------------------------------END PURCHASING---------------------------------


// --------------------------------------------GUDANG---------------------------------
$edit["field"][$i]["box_tab"] = "gudang";

$edit["field"][$i]["label"]                         = "Satuan Qty";
$edit["field"][$i]["input"]                         = "nomormhsatuanqtygudang";
// $edit["field"][$i]["label_class"] 				    = "req";
// $edit["field"][$i]["input_class"] 				    = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_setting"]                 = "master_satuan_qty_gudang";
$i++;

// --------------------------------------------END GUDANG---------------------------------


// --------------------------------------------ACCOUNTING---------------------------------
$edit["field"][$i]["box_tab"] = "accounting";

$edit["field"][$i]["label"]                         = "Satuan Qty";
$edit["field"][$i]["input"]                         = "nomormhsatuanqtyaccounting";
// $edit["field"][$i]["label_class"] 				    = "req";
// $edit["field"][$i]["input_class"] 				    = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_setting"]                 = "master_satuan_qty_accounting";
$i++;


// --------------------------------------------END ACCOUNTING---------------------------------


// --------------------------------------------RND---------------------------------
$edit["field"][$i]["box_tab"] = "rnd";

$edit["field"][$i]["label"]                         = "Satuan Qty";
$edit["field"][$i]["input"]                         = "nomormhsatuanqtyrnd";
// $edit["field"][$i]["label_class"] 				    = "req";
// $edit["field"][$i]["input_class"] 				    = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_setting"]                 = "master_satuan_qty_rnd";
$i++;

$edit["field"][$i]["label"]                     = "Gramasi";
// $edit["field"][$i]["label_class"] 				= "req";
$edit["field"][$i]["input"]                        = "gramasi";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"]                 = "iptmoney2";
$i++;
// --------------------------------------------END RND---------------------------------




// // box tabs
// $i = count($edit["field"]);
// $edit["field"][$i]["box_tabs_close"] = 1;
// $edit["field"][$i]["box_tabs"] = array("produksi|PRODUKSI","accounting|Accounting","purchasing|Purchasing","gudang|Gudang","rnd|RND");


// //-----------------------------------------FRONTEND GRID 1--------------------------------
// $edit["field"][$i]["box_tab"] = "produksi";
// $grid[0] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'RND DAN PRODUKSI'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'Satuan Qty',
// 'nomormhsatuanqty'
// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "satuan_qty",
//     "nomormhsatuanqty"
// );


// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
//     satuan_qty:'',
//     nomormhsatuanqty:''
// }";

// $edit["field"][$i]["grid_set"]["var"]["column_unique"] = "['nomormhsatuanqty']";

// $j = 0;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan_qty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan_qty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_qty_prod }";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuanqty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuanqty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;

// $i++;
// // ---------------------------------------END FRONT GRID 1-------------------------------------------------





// //-----------------------------------------FRONTEND GRID 2--------------------------------
// $edit["field"][$i]["box_tab"] = "accounting";
// $grid[1] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'ACCOUNTING'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'Satuan Qty',
// 'Satuan Panjang',
// 'Satuan berat',
// 'nomormhsatuanqty',
// 'nomormhsatuanpanjang',
// 'nomormhsatuanberat'
// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "satuan_qty",
//     "satuan_panjang",
//     "satuan_berat",
//     "nomormhsatuanqty",
//     "nomormhsatuanpanjang",
//     "nomormhsatuanberat"
// );


// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
//     satuan_qty:'',
//     satuan_panjang:'',
//     satuan_berat:'', 
//     nomormhsatuanqty:'',
//     nomormhsatuanpanjang:'', 
//     nomormhsatuanberat:''
// }";

// $edit["field"][$i]["grid_set"]["var"]["column_unique"] = "['nomormhsatuanqty']";
// $edit["field"][$i]["grid_set"]["var"]["column_unique"] = "['nomormhsatuanpanjang']";
// $edit["field"][$i]["grid_set"]["var"]["column_unique"] = "['nomormhsatuanberat']";

// $j = 0;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan_qty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan_qty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_qty_accounting }";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan_panjang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan_panjang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_panjang_accounting }";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan_berat'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan_berat'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_berat_accounting }";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuanqty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuanqty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuanpanjang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuanpanjang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuanberat'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuanberat'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;

// $i++;
// // ---------------------------------------END FRONT GRID 2-------------------------------------------------





// //-----------------------------------------FRONTEND GRID 3--------------------------------
// $edit["field"][$i]["box_tab"] = "purchasing";
// $grid[2] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][2]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'PURCHASING'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'Satuan Qty',
// 'Satuan berat',
// 'nomormhsatuanqty',
// 'nomormhsatuanberat'
// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "satuan_qty",
//     "satuan_berat",
//     "nomormhsatuanqty",
//     "nomormhsatuanberat"
// );


// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
//     satuan_qty:'',
//     satuan_berat:'', 
//     nomormhsatuanqty:'', 
//     nomormhsatuanberat:''
// }";

// $edit["field"][$i]["grid_set"]["var"]["column_unique"] = "['nomormhsatuanqty']";
// $edit["field"][$i]["grid_set"]["var"]["column_unique"] = "['nomormhsatuanberat']";

// $j = 0;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan_qty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan_qty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_qty_purchasing }";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan_berat'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan_berat'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_berat_purchasing }";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuanqty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuanqty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuanberat'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuanberat'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;

// $i++;
// // ---------------------------------------END FRONT GRID 3-------------------------------------------------






// //-----------------------------------------FRONTEND GRID 4--------------------------------
// $edit["field"][$i]["box_tab"] = "gudang";
// $grid[3] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][3]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'GUDANG'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'Satuan Qty',
// 'Satuan Panjang',
// 'Satuan berat',
// 'nomormhsatuanqty',
// 'nomormhsatuanpanjang',
// 'nomormhsatuanberat'
// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "satuan_qty",
//     "satuan_panjang",
//     "satuan_berat",
//     "nomormhsatuanqty",
//     "nomormhsatuanpanjang",
//     "nomormhsatuanberat"
// );


// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
//     satuan_qty:'',
//     satuan_panjang:'',
//     satuan_berat:'', 
//     nomormhsatuanqty:'',
//     nomormhsatuanpanjang:'', 
//     nomormhsatuanberat:''
// }";

// $edit["field"][$i]["grid_set"]["var"]["column_unique"] = "['nomormhsatuanqty']";
// $edit["field"][$i]["grid_set"]["var"]["column_unique"] = "['nomormhsatuanpanjang']";
// $edit["field"][$i]["grid_set"]["var"]["column_unique"] = "['nomormhsatuanberat']";

// $j = 0;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan_qty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan_qty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_qty_gudang }";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan_panjang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan_panjang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_panjang_gudang }";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan_berat'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan_berat'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_berat_gudang }";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuanqty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuanqty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuanpanjang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuanpanjang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuanberat'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuanberat'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;

// $i++;
// // ---------------------------------------END FRONT GRID 4-------------------------------------------------




// //-----------------------------------------FRONTEND GRID 5--------------------------------
// $edit["field"][$i]["box_tab"] = "rnd";
// $grid[4] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][4]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'RND'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'Satuan Qty',
// 'nomormhsatuanqty'
// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "satuan_qty",
//     "nomormhsatuanqty"
// );


// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
//     satuan_qty:'',
//     nomormhsatuanqty:''
// }";

// $edit["field"][$i]["grid_set"]["var"]["column_unique"] = "['nomormhsatuanqty']";

// $j = 0;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan_qty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan_qty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_qty_rnd }";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuanqty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuanqty'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;

// $i++;
// // ---------------------------------------END FRONT GRID 5-------------------------------------------------





if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*,
    a.kode as kode,
    e.nomor AS nomormhbarangkategori,
    f.nomor as nomormhbarangkelompok,
    CONCAT(h.nama, '|', h.nomor) AS 'browse|nomormhgudang',
    
    CONCAT(g_prod.nama, '|', g_prod.nomor) AS 'browse|nomormhsatuanqtyproduksi',
	
    CONCAT(g_pur.nama, '|', g_pur.nomor) AS 'browse|nomormhsatuanqtypurchasing',
	
    CONCAT(g_gud.nama, '|', g_gud.nomor) AS 'browse|nomormhsatuanqtygudang',
	
    CONCAT(g_acc.nama, '|', g_acc.nomor) AS 'browse|nomormhsatuanqtyaccounting',
    
    CONCAT(g_rnd.nama, '|', g_rnd.nomor) AS 'browse|nomormhsatuanqtyrnd',
    CONCAT(g.nama, '|', g.nomor) AS 'browse|nomormhpapercore'
	FROM " . $edit["table"] . " a
    left join mdbarangsatuan c on a.nomor = c.nomormhbarang 
    LEFT JOIN mhbarangkategori e ON a.nomormhbarangkategori = e.nomor
    left join mhbarangkelompok f on a.nomormhbarangkelompok = f.nomor 
    left join mhpapercore g on a.nomormhpapercore = g.nomor
    left join mhgudang h on h.nomor = a.nomormhgudang
    
    left join mhsatuan g_prod on g_prod.nomor = a.nomormhsatuanqtyproduksi 
    left join mhsatuan g_pur on g_pur.nomor = a.nomormhsatuanqtypurchasing
    left join mhsatuan g_gud on g_gud.nomor = a.nomormhsatuanqtygudang
    left join mhsatuan g_acc on g_acc.nomor = a.nomormhsatuanqtyaccounting 
    left join mhsatuan g_rnd on g_rnd.nomor = a.nomormhsatuanqtyrnd 
    
    left join mhsatuan h_prod on h_prod.nomor = a.nomormhsatuanberatproduksi 
    left join mhsatuan h_pur on h_pur.nomor = a.nomormhsatuanberatpurchasing
    left join mhsatuan h_gud on h_gud.nomor = a.nomormhsatuanberatgudang
    left join mhsatuan h_acc on h_acc.nomor = a.nomormhsatuanberataccounting 
    left join mhsatuan h_rnd on h_rnd.nomor = a.nomormhsatuanberatrnd 
    
    left join mhsatuan i_prod on i_prod.nomor = a.nomormhsatuanpanjangproduksi 
    left join mhsatuan i_pur on i_pur.nomor = a.nomormhsatuanpanjangpurchasing
    left join mhsatuan i_gud on i_gud.nomor = a.nomormhsatuanpanjanggudang
    left join mhsatuan i_acc on i_acc.nomor = a.nomormhsatuanpanjangaccounting 
    left join mhsatuan i_rnd on i_rnd.nomor = a.nomormhsatuanpanjangrnd
	WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    // //query grid detail 1
    // $edit["field"][$grid[0]]["grid_set"]["query"] = "
    // SELECT
    // a.*,
    // m2.nama as satuan_berat,
    // m4.nama as satuan_qty,
    // m2.nomor as nomormhsatuanberat,
    // m4.nomor as nomormhsatuanqty
    // FROM " . $edit["detail"][0]["table_name"] . " a
    // left join mhsatuanberat m2 on m2.nomor = a.nomormhsatuanberat 
    // left join mhsatuanqty m4 on m4.nomor = a.nomormhsatuanqty 
    // where a.status_aktif > 0
    // AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];


    // //query grid detail 2
    // $edit["field"][$grid[1]]["grid_set"]["query"] = "
    // SELECT
    // a.*,
    // m2.nama as satuan_berat,
    // m3.nama as satuan_panjang,
    // m4.nama as satuan_qty,
    // m2.nomor as nomormhsatuanberat,
    // m3.nomor as nomormhsatuanpanjang,
    // m4.nomor as nomormhsatuanqty
    // FROM " . $edit["detail"][1]["table_name"] . " a
    // left join mhsatuanberat m2 on m2.nomor = a.nomormhsatuanberat 
    // left join mhsatuanpanjang m3 on m3.nomor = a.nomormhsatuanpanjang 
    // left join mhsatuanqty m4 on m4.nomor = a.nomormhsatuanqty 
    // where a.status_aktif > 0
    // AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];



    // //query grid detail 3
    // $edit["field"][$grid[2]]["grid_set"]["query"] = "
    // SELECT
    // a.*,
    // m2.nama as satuan_berat,
    // m4.nama as satuan_qty,
    // m2.nomor as nomormhsatuanberat,
    // m4.nomor as nomormhsatuanqty
    // FROM " . $edit["detail"][2]["table_name"] . " a
    // left join mhsatuanberat m2 on m2.nomor = a.nomormhsatuanberat 
    // left join mhsatuanqty m4 on m4.nomor = a.nomormhsatuanqty 
    // where a.status_aktif > 0
    // AND a." . $edit["detail"][2]["foreign_key"] . " = " . $_GET["no"];


    // //query grid detail 4
    // $edit["field"][$grid[3]]["grid_set"]["query"] = "
    // SELECT
    // a.*,
    // m2.nama as satuan_berat,
    // m3.nama as satuan_panjang,
    // m4.nama as satuan_qty,
    // m2.nomor as nomormhsatuanberat,
    // m3.nomor as nomormhsatuanpanjang,
    // m4.nomor as nomormhsatuanqty
    // FROM " . $edit["detail"][3]["table_name"] . " a
    // left join mhsatuanberat m2 on m2.nomor = a.nomormhsatuanberat 
    // left join mhsatuanpanjang m3 on m3.nomor = a.nomormhsatuanpanjang 
    // left join mhsatuanqty m4 on m4.nomor = a.nomormhsatuanqty 
    // where a.status_aktif > 0
    // AND a." . $edit["detail"][3]["foreign_key"] . " = " . $_GET["no"];


    // //query grid detail 5
    // $edit["field"][$grid[4]]["grid_set"]["query"] = "
    // SELECT
    // a.*,
    // m2.nama as satuan_berat,
    // m3.nama as satuan_panjang,
    // m4.nama as satuan_qty,
    // m2.nomor as nomormhsatuanberat,
    // m3.nomor as nomormhsatuanpanjang,
    // m4.nomor as nomormhsatuanqty
    // FROM " . $edit["detail"][4]["table_name"] . " a
    // left join mhsatuanberat m2 on m2.nomor = a.nomormhsatuanberat 
    // left join mhsatuanpanjang m3 on m3.nomor = a.nomormhsatuanpanjang 
    // left join mhsatuanqty m4 on m4.nomor = a.nomormhsatuanqty 
    // where a.status_aktif > 0
    // AND a." . $edit["detail"][4]["foreign_key"] . " = " . $_GET["no"];



    $edit = fill_value($edit, $r);
}



$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$features = "save|back|reload|add" . check_approval($r, "periode|edit|approve|delete|disappr");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);


?>

<script type="text/javascript">
    $(document).ready(function() {
        // get_nomormhusaha();
        // myFunction();
    });

    function test() {

        $('#doi').val(10);
    }

    function checkHeader() {
        var fields = [];
        var check_failed = check_value_elements(fields);
        if (check_failed != '')
            return check_failed;
        else
            return true;
    }

    function inputKode() {
        var kodehide = $('#kodehide').val();
        var ketebalan = $('#ketebalan').val();
        var diameter = $('#diameter').val();
        var panjang = $('#panjang').val();
        var potongan = $('#potongan').val();

        kode = '';
        if (kodehide != '' && kodehide != '-') {
            kode += kodehide;
        }
        if (ketebalan != '' && ketebalan != '-') {
            kode += '' + ketebalan;
        }
        if (diameter != '' && diameter != '-') {
            kode += '-' + diameter;
        }
        if (panjang != '' && panjang != '-') {
            kode += 'T' + panjang;
        }
        if (potongan != 0 && potongan != '-') {
            kode += 'POT';
        }

        console.log({kode})

        $('#kode').val(kode);
    }

    // var tipe_nomor = $('#browse_master_tipe_filmV2_hidden').val();
    // var tipe_nama = $('#browse_master_tipe_filmV2_search').val();
    // if (tipe_nomor != '' && tipe_nama != '') {
    //     $('#browse_master_tipe_filmV2_selected').html('<a href="?m=master_tipe_filmV2&f=header_grid&sm=edit&a=view&no=' + tipe_nomor + '" target="_blank">' + tipe_nama + '</a>');
    // }

    // if (ketebalan != '' && ketebalan != '-') {
    //     var parsedKetebalan = parseFloat(ketebalan);
    //     if (!isNaN(parsedKetebalan)) {
    //         ketebalan = parsedKetebalan + ' micron';
    //         $('#ketebalan').val(ketebalan);
    //     }
    // }

    // if (lebar != '' && lebar != '-') {
    //     var parsedLebar = parseFloat(lebar);
    //     if (!isNaN(parsedLebar)) {
    //         lebar = parsedLebar + ' mm';
    //         $('#lebar').val(lebar);
    //     }
    // }

    // if (panjang != '' && panjang != '-') {
    //     var parsedPanjang = parseFloat(panjang);
    //     if (!isNaN(parsedPanjang)) {
    //         panjang = parsedPanjang + ' m';
    //         $('#panjang').val(panjang);
    //     }
    // }

    <?= generate_function_checkgrid($grid_str) ?>
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>