<?php
$edit["debug"]       = 1 ;
$edit["string_code"]    = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];



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

$edit["field"][$i]["box_tab"] = "data";

$edit["field"][$i]["form_group_class"]                 = "hiding";
$edit["field"][$i]["label"]                         = "Kategori";
$edit["field"][$i]["input"]                         = "nomormhbarangkategori";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"]                 = 1;
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
$edit["field"][$i]["label_class"] 				= "req";
$edit["field"][$i]["input_class"] 				= "required";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"]                 = formatting_code($con, $edit["string_code"]);
$i++;

// $edit["field"][$i]["label"] 					= "Kode";
// $edit["field"][$i]["input"]						= "kode";
// $edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
// $i++;

$edit["field"][$i]["label"]                     = "Gudang";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhgudang";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_gudang";
$edit["field"][$i]["input_value"] = "GUDANG BAHAN BAKU|1";
$i++;

$edit["field"][$i]["label"] = "Nama Barang";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "nama";
// $edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_attr"]["maxlength"] = "200";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$edit["field"][$i]["input_attr"]["onblur"] = "test()";
$i++;


$edit["field"][$i]["label"]                     = "Jenis";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhbarangjenis";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_jenis_film";
$edit["field"][$i]["browse_set"]["param_output"]     = array("jenis|jenis");
$i++;

$edit["field"][$i]["form_group_class"]                 = "hiding";
$edit["field"][$i]["label"]                         = "jenis";
$edit["field"][$i]["input"]                         = "jenis";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;


$edit["field"][$i]["label"]                     = "Tipe";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormdbarangtipe";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_tipe_filmV2";
$edit["field"][$i]["browse_set"]["param_input"]  	= array("a.nomormhbarangjenis|browse_master_jenis_film_hidden");
// $edit["field"][$i]["browse_set"]["param_output"]     = array("tipe|tipe");
$i++;

$edit["field"][$i]["form_group_class"]                 = "hiding";
$edit["field"][$i]["label"]                         = "tipe";
$edit["field"][$i]["input"]                         = "tipe";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;




$edit["field"][$i]["label"]                     = "Ketebalan";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                        = "ketebalan";
$edit["field"][$i]["input_class"]                 = "iptnumber required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["onblur"] = "test()";
$i++;

$edit["field"][$i]["label"]                     = "Lebar";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                        = "lebar";
$edit["field"][$i]["input_class"]                 = "iptnumber required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["onblur"] = "test()";
$i++;

$edit["field"][$i]["label"]                     = "Panjang";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                        = "panjang";
$edit["field"][$i]["input_class"]                 = "iptnumber required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["onblur"] = "test()";
$i++;

$edit["field"][$i]["label"]                     = "Berat Jenis";
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                        = "berat_jenis";
$edit["field"][$i]["input_class"]                 = "iptmoney2 required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                         = "Stok Minimum";
$edit["field"][$i]["input"]                         = "stok_minimum";
$i++;

$edit["field"][$i]["label"]                         = "Stok Maximum";
$edit["field"][$i]["input"]                         = "stok_maximum";
$i++;



$edit["field"][$i]["label"]                         = "Doi";
$edit["field"][$i]["input"]                         = "doi";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$edit["field"][$i]["input_attr"]["onblur"] = "test()";
$i++;

$edit["field"][$i]["label"]                         = "Status Aktif";
$edit["field"][$i]["input"]                         = "status_aktif";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_option"]                     = array("1|Aktif", "0|Tidak Aktif");
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
// $edit["field"][$i]["label_class"]                     = "req";
// $edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_set"]["id"] = "master_satuan_qty_produksi";
$edit["field"][$i]["browse_setting"]                 = "master_satuan";
$i++;

$edit["field"][$i]["label"]                         = "Satuan Berat";
$edit["field"][$i]["input"]                         = "nomormhsatuanberatproduksi";
// $edit["field"][$i]["label_class"]                     = "req";
// $edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_set"]["id"] = "master_satuan_berat_produksi";
$edit["field"][$i]["browse_setting"]                 = "master_satuan";
$i++;
// --------------------------------------------END PRODUKSI---------------------------------



// --------------------------------------------PURCHASING---------------------------------
$edit["field"][$i]["box_tab"] = "purchasing";


$edit["field"][$i]["label"]                         = "Satuan Qty";
$edit["field"][$i]["input"]                         = "nomormhsatuanqtypurchasing";
// $edit["field"][$i]["label_class"]                     = "req";
// $edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_set"]["id"] = "master_satuan_qty_purchasing";
$edit["field"][$i]["browse_setting"]                 = "master_satuan";
$i++;
$edit["field"][$i]["label"]                         = "Satuan Berat";
$edit["field"][$i]["input"]                         = "nomormhsatuanberatpurchasing";
// $edit["field"][$i]["label_class"]                     = "req";
// $edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_set"]["id"] = "master_satuan_berat_purchasing";
$edit["field"][$i]["browse_setting"]                 = "master_satuan";
$i++;

// --------------------------------------------END PURCHASING---------------------------------


// --------------------------------------------GUDANG---------------------------------
$edit["field"][$i]["box_tab"] = "gudang";

$edit["field"][$i]["label"]                         = "Satuan Qty";
$edit["field"][$i]["input"]                         = "nomormhsatuanqtygudang";
// $edit["field"][$i]["label_class"]                     = "req";
// $edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["browse_set"]["id"] = "master_satuan_qty_gudang";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_setting"]                 = "master_satuan";
$i++;
$edit["field"][$i]["label"]                         = "Satuan Panjang";
$edit["field"][$i]["input"]                         = "nomormhsatuanpanjanggudang";
// $edit["field"][$i]["label_class"]                     = "req";
// $edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["browse_set"]["id"] = "master_satuan_panjang_gudang";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_setting"]                 = "master_satuan";
$i++;
$edit["field"][$i]["label"]                         = "Satuan Berat";
$edit["field"][$i]["input"]                         = "nomormhsatuanberatgudang";
// $edit["field"][$i]["label_class"]                     = "req";
// $edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_set"]["id"] = "master_satuan_berat_gudang";
$edit["field"][$i]["browse_setting"]                 = "master_satuan";
$i++;
// --------------------------------------------END GUDANG---------------------------------


// --------------------------------------------ACCOUNTING---------------------------------
$edit["field"][$i]["box_tab"] = "accounting";

$edit["field"][$i]["label"]                         = "Satuan Qty";
$edit["field"][$i]["input"]                         = "nomormhsatuanqtyaccounting";
// $edit["field"][$i]["label_class"]                     = "req";
// $edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_set"]["id"] = "master_satuan_qty_accounting";
$edit["field"][$i]["browse_setting"]                 = "master_satuan";
$i++;
$edit["field"][$i]["label"]                         = "Satuan Panjang";
$edit["field"][$i]["input"]                         = "nomormhsatuanpanjangaccounting";
// $edit["field"][$i]["label_class"]                     = "req";
// $edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_set"]["id"] = "master_satuan_panjang_accounting";
$edit["field"][$i]["browse_setting"]                 = "master_satuan_panjang_accounting";
$i++;
$edit["field"][$i]["label"]                         = "Satuan Berat";
$edit["field"][$i]["input"]                         = "nomormhsatuanberataccounting";
// $edit["field"][$i]["label_class"]                     = "req";
// $edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_set"]["id"] = "master_satuan_berat_accounting";
$edit["field"][$i]["browse_setting"]                 = "master_satuan";
$i++;

// --------------------------------------------END ACCOUNTING---------------------------------



// --------------------------------------------RND---------------------------------
$edit["field"][$i]["box_tab"] = "rnd";

$edit["field"][$i]["label"]                         = "Satuan Qty";
$edit["field"][$i]["input"]                         = "nomormhsatuanqtyrnd";
// $edit["field"][$i]["label_class"]                     = "req";
// $edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_set"]["id"] = "master_satuan_qty_rnd";
$edit["field"][$i]["browse_setting"]                 = "master_satuan";
$i++;

// $edit["field"][$i]["label"]                     = "Gramasi";
// $edit["field"][$i]["label_class"]                 = "req";
// $edit["field"][$i]["input"]                        = "gramasi";
// $edit["field"][$i]["input_class"]                 = "required";
// $edit["field"][$i]["input_attr"]["maxlength"]     = "200";
// $edit["field"][$i]["input_class"]                 = "iptmoney2";
// $i++;

// --------------------------------------------END RND---------------------------------


// // box tabs
// $i = count($edit["field"]);
// $edit["field"][$i]["box_tabs_close"] = 1;
// $edit["field"][$i]["box_tabs"] = array("produksi|RND DAN PRODUKSI","accounting|Accounting","purchasing|Purchasing","gudang|Gudang");


// //-----------------------------------------FRONTEND GRID 1--------------------------------
// $edit["field"][$i]["box_tab"] = "produksi";
// $grid[0] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'RND DAN PRODUKSI'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'Satuan Qty',
// 'Satuan Isi',
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
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_qty_prod }";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan_berat'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan_berat'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_berat_prod }";
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
// 'Satuan Isi',
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
// 'Satuan Isi',
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
// 'Satuan Isi',
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





if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*,
    e.nomor AS nomormhbarangkategori,
    f.nomor as nomormhbarangkelompok,
    CONCAT(g.nama, '|', g.nomor) AS 'browse|nomormhgudang',
    CONCAT(x.jenis, '|', x.nomor) AS 'browse|nomormhbarangjenis',
    CONCAT(y.tipe, '|', y.nomor) AS 'browse|nomormdbarangtipe',
	--     produksi
    CONCAT(g_prod.nama, '|', g_prod.nomor) AS 'browse|nomormhsatuanqtyproduksi',
    CONCAT(h_prod.nama, '|', h_prod.nomor) AS 'browse|nomormhsatuanberatproduksi',
	--     purchasing
    CONCAT(g_pur.nama, '|', g_pur.nomor) AS 'browse|nomormhsatuanqtypurchasing',
    CONCAT(h_pur.nama, '|', h_pur.nomor) AS 'browse|nomormhsatuanberatpurchasing',
	--     gudang
    CONCAT(g_gud.nama, '|', g_gud.nomor) AS 'browse|nomormhsatuanqtygudang',
    CONCAT(h_gud.nama, '|', h_gud.nomor) AS 'browse|nomormhsatuanberatgudang',
    CONCAT(i_gud.nama, '|', i_gud.nomor) AS 'browse|nomormhsatuanpanjanggudang',
	--     accounting
    CONCAT(g_acc.nama, '|', g_acc.nomor) AS 'browse|nomormhsatuanqtyaccounting',
    CONCAT(h_acc.nama, '|', h_acc.nomor) AS 'browse|nomormhsatuanberataccounting',
    CONCAT(i_acc.nama, '|', i_acc.nomor) AS 'browse|nomormhsatuanpanjangaccounting',
    --     rnd
    CONCAT(g_rnd.nama, '|', g_rnd.nomor) AS 'browse|nomormhsatuanqtyrnd'
	FROM " . $edit["table"] . " a
	left join mhbarangjenis b ON a.nomormhbarangjenis = b.nomor 
    left join mdbarangsatuan c on a.nomor = c.nomormhbarang 
    left join mhbarangjenis x on x.nomor = a.nomormhbarangjenis  
    left join mdbarangtipe y on y.nomor = a.nomormdbarangtipe 
    left join mhbarangkategori e ON a.nomormhbarangkategori = e.nomor
    left join mhbarangkelompok f on a.nomormhbarangkelompok = f.nomor
    left join mhgudang g on g.nomor = a.nomormhgudang
    --     qty
    left join mhsatuan g_prod on g_prod.nomor = a.nomormhsatuanqtyproduksi 
    left join mhsatuan g_pur on g_pur.nomor = a.nomormhsatuanqtypurchasing
    left join mhsatuan g_gud on g_gud.nomor = a.nomormhsatuanqtygudang
    left join mhsatuan g_acc on g_acc.nomor = a.nomormhsatuanqtyaccounting 
    left join mhsatuan g_rnd on g_rnd.nomor = a.nomormhsatuanqtyrnd 
    --     berat
    left join mhsatuan h_prod on h_prod.nomor = a.nomormhsatuanberatproduksi 
    left join mhsatuan h_pur on h_pur.nomor = a.nomormhsatuanberatpurchasing
    left join mhsatuan h_gud on h_gud.nomor = a.nomormhsatuanberatgudang
    left join mhsatuan h_acc on h_acc.nomor = a.nomormhsatuanberataccounting 
    --     panjang
    left join mhsatuan i_gud on i_gud.nomor = a.nomormhsatuanpanjanggudang
    left join mhsatuan i_acc on i_acc.nomor = a.nomormhsatuanpanjangaccounting 
	WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    // //query grid detail 1
    // $edit["field"][$grid[0]]["grid_set"]["query"] = "
    // SELECT
    // a.*,
    // b.nama as satuan_berat,
    // c.nama as satuan_qty,
    // b.nomor as nomormhsatuanberat,
    // c.nomor as nomormhsatuanqty
    // FROM " . $edit["detail"][0]["table_name"] . " a
    // left join mhsatuanberat b on b.nomor = a.nomormhsatuanberat 
    // left join mhsatuanqty c on c.nomor = a.nomormhsatuanqty 
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




    $edit = fill_value($edit, $r);
}



$_SESSION["setting"]["field_status_disetujui"] = "status_disetujui";
$_SESSION["setting"]["field_disetujui_pada"] = "disetujui_pada";
$_SESSION["setting"]["field_disetujui_oleh"] = "disetujui_oleh";
if ($r["status_disetujui"] == 1) {
    $features = "back|reload|disappr";
} else {
    $features = "save|back|reload|approve|edit";
}



$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$features = "save|back|reload|add" . check_approval($r, "edit|approve|delete|disappr");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);


?>

<script type="text/javascript">
    function additional() {
        var string = 'test';

        $('#circum').val(circum);
    }




    $(document).ready(function() {
        // get_nomormhusaha();

    });

    function test() {
        var ketebalan = $('#ketebalan').val();
        var panjang = $('#panjang').val();
        var lebar = $('#lebar').val();
        var nama = $('#nama').val();

        var tipe_nomor = $('#browse_master_tipe_filmV2_hidden').val();
        var tipe_nama = $('#browse_master_tipe_filmV2_search').val();
        if (tipe_nomor != '' && tipe_nama != '') {
            $('#browse_master_tipe_filmV2_selected').html('<a href="?m=master_tipe_filmV2&f=header_grid&sm=edit&a=view&no=' + tipe_nomor + '" target="_blank">' + tipe_nama + '</a>');
        }

        if (ketebalan != '' && ketebalan != '-') {
            var parsedKetebalan = parseFloat(ketebalan);
            if (!isNaN(parsedKetebalan)) {
                ketebalan = parsedKetebalan + ' micron';
                $('#ketebalan').val(ketebalan);
            }
        }

        if (lebar != '' && lebar != '-') {
            var parsedLebar = parseFloat(lebar);
            if (!isNaN(parsedLebar)) {
                lebar = parsedLebar + ' mm';
                $('#lebar').val(lebar);
            }
        }

        if (panjang != '' && panjang != '-') {
            var parsedPanjang = parseFloat(panjang);
            if (!isNaN(parsedPanjang)) {
                panjang = parsedPanjang + ' m';
                $('#panjang').val(panjang);
            }
        }

        nama = '';
        if (tipe_nama != '' && tipe_nama != '-') {
            nama += tipe_nama;
        }
        if (ketebalan != '' && ketebalan != '-') {
            nama += ' ' + ketebalan;
        }
        if (lebar != '' && lebar != '-') {
            nama += ' x ' + lebar;
        }
        if (panjang != '' && panjang != '-') {
            nama += ' x ' + panjang;
        }

        $('#nama').val(nama);
        $('#doi').val(30);

    }



    function checkHeader() {
        var fields = [
        ];
        var check_failed = check_value_elements(fields);
        if (check_failed != '')
            return check_failed;
        else
            return true;
    }

    <?= generate_function_checkgrid($grid_str) ?>
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>