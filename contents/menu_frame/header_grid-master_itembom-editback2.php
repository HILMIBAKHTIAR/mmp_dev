<?php
$edit["debug"]                 = 1;
$edit["uppercase"]             = 1;
// $edit["next_save_delay"]     = 3;
$edit["unique"]             = array("kode");
$edit["string_code"]         = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];
// $edit["unique"]             = array("nama");
// $edit["manual_save"]         = "contents/menu_frame/" . $_SESSION["g.frame"] . "-" . $_SESSION["g.menu"] . "-save.php";

// $edit["sp_add"] 							= "sp_disimpan_mhcabang";
// $edit["sp_add_param"] 						= array("param_mode_add|1", "param_nomormhadmin|0");
// $edit["sp_edit"] 							= "sp_disimpan_mhcabang";
// $edit["sp_edit_param"] 						= array("param_mode_edit|1", "param_nomormhadmin|0");
// $_POST["param_nomormhadmin"]				= $_SESSION["login"]["nomor"];
// $_POST["param_mode_add"] 					= "ADD";
// $_POST["param_mode_edit"] 					= "EDIT";

//PEMBUATAN GRID DATA detail bom utama
$i = 0;
$edit["detail"][$i]["table_name"] = "mdbarangbom";
$edit["detail"][$i]["field_name"] = array(
    "nomormhproses",
    "nomormhbarang",
    "nomormhsatuan",
    "proses",
    "kode_barang",
    "jumlah",
    "nomormhsatuan",
    "bom",
    "status"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "bom = '0'";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_utama";
$i++;
//END GRID DATA

//PEMBUATAN GRID DATA pic kantor
// $i = 1;
// $edit["detail"][$i]["table_name"] = "mdrelasipic";
// $edit["detail"][$i]["field_name"] = array(
//     "pic",
//     "telepon",
//     "handphone",
//     "email",
//     "jenis"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "jenis = '0'";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_pic_kantor";
// $i++;
//END GRID DATA

//PEMBUATAN GRID DATA detail alamat pengiriman
// $i = 2;
$edit["detail"][$i]["table_name"] = "mdbarangbom";
$edit["detail"][$i]["field_name"] = array(
    "nomormhproses",
    "nomormhbarang",
    "nomormhsatuan",
    "proses",
    "kode_barang",
    "jumlah",
    "nomormhsatuan",
    "bom",
    "status"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "bom = '1'";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_subtitusi1";
$i++;
//END GRID DATA

//PEMBUATAN GRID DATA pic pengiriman
// $i = 3;
// $edit["detail"][$i]["table_name"] = "mdrelasipic";
// $edit["detail"][$i]["field_name"] = array(
//     "pic",
//     "telepon",
//     "handphone",
//     "email",
//     "jenis"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "jenis = '1'";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_pic_pengiriman";
// $i++;
//END GRID DATA

//PEMBUATAN GRID DATA detail alamat penagihan
// $i = 4;
$edit["detail"][$i]["table_name"] = "mdbarangbom";
$edit["detail"][$i]["field_name"] = array(
    "nomormhproses",
    "nomormhbarang",
    "nomormhsatuan",
    "proses",
    "kode_barang",
    "jumlah",
    "nomormhsatuan",
    "bom",
    "status"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "bom = '2'";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_subtitusi2";
$i++;
//END GRID DATA

//PEMBUATAN GRID DATA pic penagihan
// $i = 5;
// $edit["detail"][$i]["table_name"] = "mdrelasipic";
// $edit["detail"][$i]["field_name"] = array(
//     "pic",
//     "telepon",
//     "handphone",
//     "email",
//     "jenis"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "jenis = '2'";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_pic_penagihan";
// $i++;
//END GRID DATA

$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
}
$edit["field"][$i]["box_tab"] = "data";

$edit["field"][$i]["label"]                     = "Kode";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "kode";
$edit["field"][$i]["input_class"]                 = "required";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "4";
$edit["field"][$i]["input_attr"]["readonly"]     = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
$i++;
// $edit["field"][$i]["form_group_class"] = "hiding";
// $edit["field"][$i]["label"]            = "nomormhrelasikelompok";
// $edit["field"][$i]["input"]            = "nomormhrelasikelompok";
// if ($edit["mode"] == "add") {
//     $edit["field"][$i]["input_value"] = 1;
// }
// $i++;
$edit["field"][$i]["label"]                     = "Nama";
$edit["field"][$i]["label_class"]                 = "";
$edit["field"][$i]["input"]                     = "nomormhbarang";
$edit["field"][$i]["input_class"]                 = "";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_barangjadi";
// $edit["field"][$i]["browse_set"]["param_output"]     = array("kode|kode");
// $edit["field"][$i]["browse_set"]["id"]             = "master_account_penyusutan";
$i++;
$edit["field"][$i]["label"]                     = "Satuan";
$edit["field"][$i]["label_class"]                 = "";
$edit["field"][$i]["input"]                     = "nomormhsatuan";
$edit["field"][$i]["input_class"]                 = "";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_satuan";
// $edit["field"][$i]["browse_set"]["param_output"]     = array("kode|kode");
// $edit["field"][$i]["browse_set"]["id"]             = "master_account_penyusutan";
$i++;
$edit["field"][$i]["label"]         = "Status";
$edit["field"][$i]["input"]         = "status_aktif";
$edit["field"][$i]["input_element"] = "select";
$edit["field"][$i]["input_option"]  = generate_status_option($edit["mode"]);
$i++;
$edit["field"][$i]["label"]                          = "Note";
$edit["field"][$i]["label_col"]                     = "col-sm-12";
$edit["field"][$i]["label_attr"]["style"]             = "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"]                          = "note";
$edit["field"][$i]["input_element"]                  = "textarea";
$edit["field"][$i]["input_attr"]["rows"]             = "5";
$edit["field"][$i]["input_col"]                     = "col-sm-12";
$i++;

$i = count($edit["field"]);
$edit["field"][$i]["box_tabs_close"] = 1;

$edit["field"][$i]["box_tabs"] = array("utama|Utama", "subtitusi1|Subtitusi 1", "subtitusi2|Subtitusi 2");


// -----------------------------------------FRONTEND UNTUK GRID DATA detail alamat kantor-----------------------------------
$edit["field"][$i]["box_tab"] = "utama";
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar BOM UTAMA'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Proses',
'Kode Barang',
'Qty',
'Satuan',
'Status',
'nomormhproses',
'nomormhbarang',
'nomormhsatuan',
'bom'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "proses",
    "kode_barang",
    "jumlah",
    "satuan",
    "status",
    "nomormhproses",
    "nomormhbarang",
    "nomormhsatuan",
    "bom"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    proses:'',
    kode_barang:'',
    jumlah:'',
    satuan:'',
    status:'',
    nomormhproses:'',
    nomormhbarang:'',
    nomormhsatuan:'',
    bom:'0' }";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[]";
$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'proses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'proses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_proses }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kode_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kode_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_kodebarang }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'status'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'status'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhproses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhproses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'bom'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'bom'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$i++;
// ----------------------------------------//END FRONT END GRID DATA---------------------------------------------------

// ------------------------------------------------//FRONTEND UNTUK GRID DATA detail kantor---------------------------
// $grid[1] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar PIC Kantor'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'PIC',
// 'Telepon',
// 'Hanphone',
// 'Email',
// 'jenis'
// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "pic",
//     "telepon",
//     "handphone",
//     "email",
//     "jenis"
// );
// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
//     pic:'',
//     telepon:'',
//     handphone:'',
//     email:'',
//     jenis:'0' }";
// $edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[]";
// $j = 0;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pic'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pic'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_customer }";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'telepon'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'telepon'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'handphone'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'handphone'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'email'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'email'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jenis'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jenis'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $i++;
// ---------------------------------END FRONT END GRID DATA-------------------------------------

// -----------------------------------------FRONTEND UNTUK GRID DATA detail alamat pengiriman-----------------------------------
$edit["field"][$i]["box_tab"] = "subtitusi1";
$grid[2] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][2]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar BOM SUBTITUSI 1'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Proses',
'Kode Barang',
'Qty',
'Satuan',
'Status',
'nomormhproses',
'nomormhbarang',
'nomormhsatuan',
'bom'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "proses",
    "kode_barang",
    "jumlah",
    "satuan",
    "status",
    "nomormhproses",
    "nomormhbarang",
    "nomormhsatuan",
    "bom"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    proses:'',
    kode_barang:'',
    jumlah:'',
    satuan:'',
    status:'',
    nomormhproses:'',
    nomormhbarang:'',
    nomormhsatuan:'',
    bom:'1' }";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[]";
$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'proses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'proses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_proses }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kode_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kode_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_kodebarang }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_kodebarang }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'status'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'status'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhproses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhproses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'bom'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'bom'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$i++;
// ----------------------------------------//END FRONT END GRID DATA---------------------------------------------------

// ------------------------------------------------//FRONTEND UNTUK GRID DATA detail pic pengiriman---------------------------
// $grid[3] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][3]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar PIC Pengiriman'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'PIC',
// 'Telepon',
// 'Hanphone',
// 'jenis'
// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "pic",
//     "telepon",
//     "handphone",
//     "jenis"
// );
// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
//     pic:'',
//     telepon:'',
//     handphone:'',
//     jenis:'1' 
// }";
// $edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[]";
// $j = 0;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pic'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pic'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_customer }";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'telepon'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'telepon'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'handphone'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'handphone'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jenis'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jenis'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $i++;
// ---------------------------------END FRONT END GRID DATA-------------------------------------

// -----------------------------------------FRONTEND UNTUK GRID DATA detail alamat penagihan-----------------------------------
$edit["field"][$i]["box_tab"] = "subtitusi2";
$grid[4] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][4]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar BOM SUBTITUSI 2'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Proses',
'Kode Barang',
'Qty',
'Satuan',
'Status',
'nomormhproses',
'nomormhbarang',
'nomormhsatuan',
'bom'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "proses",
    "kode_barang",
    "jumlah",
    "satuan",
    "status",
    "nomormhproses",
    "nomormhbarang",
    "nomormhsatuan",
    "bom"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    proses:'',
    kode_barang:'',
    jumlah:'',
    satuan:'',
    status:'',
    nomormhproses:'',
    nomormhbarang:'',
    nomormhsatuan:'',
    bom:'2' }";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[]";
$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'proses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'proses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_proses }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kode_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kode_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_kodebarang }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'status'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'status'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhproses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhproses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'bom'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'bom'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$i++;
// ----------------------------------------//END FRONT END GRID DATA---------------------------------------------------

// ------------------------------------------------//FRONTEND UNTUK GRID DATA detail pic pengiriman---------------------------
// $grid[5] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][5]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar PIC Penagihan'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'PIC',
// 'Telepon',
// 'Hanphone',
// 'jenis'
// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "pic",
//     "telepon",
//     "handphone",
//     "jenis"
// );
// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
//     pic:'',
//     telepon:'',
//     handphone:'',
//     jenis:'2' 
// }";
// $edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[]";
// $j = 0;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pic'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pic'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_customer }";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'telepon'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'telepon'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'handphone'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'handphone'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jenis'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jenis'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $i++;
// ---------------------------------END FRONT END GRID DATA-------------------------------------

// $edit["field"][$i]["form_group"]                     = 0;
// $edit["field"][$i]["label"]                         = "Inisial";
// $edit["field"][$i]["label_class"]                     = "req";
// $edit["field"][$i]["input"]                            = "inisial";
// $edit["field"][$i]["input_class"]                     = "required";
// $edit["field"][$i]["input_attr"]["maxlength"]         = "3";
// $i++;
// $edit["field"][$i]["form_group"]                     = 0;
// $edit["field"][$i]["anti_mode"]                     = "Pusat";
// $edit["field"][$i]["label"]                         = "Status";
// $edit["field"][$i]["input"]                         = "pusat";
// $edit["field"][$i]["input_element"]                 = "select";
// $edit["field"][$i]["input_option"]                     = array("0|Non-Pusat", "1|Pusat");
// $i++;
// $edit["field"][$i]["label"]                          = "Keterangan";
// $edit["field"][$i]["label_col"]                     = "col-sm-12";
// $edit["field"][$i]["label_attr"]["style"]             = "text-align:left;margin-bottom:10px";
// $edit["field"][$i]["input"]                          = "keterangan";
// $edit["field"][$i]["input_element"]                  = "textarea";
// $edit["field"][$i]["input_attr"]["rows"]             = "5";
// $edit["field"][$i]["input_col"]                     = "col-sm-12";
// $i++;
// $edit["field"][$i]["label"]                          = "Alamat";
// $edit["field"][$i]["label_col"]                     = "col-sm-12";
// $edit["field"][$i]["label_attr"]["style"]             = "text-align:left;margin-bottom:10px";
// $edit["field"][$i]["input"]                          = "catatan";
// $edit["field"][$i]["input_element"]                  = "textarea";
// $edit["field"][$i]["input_attr"]["rows"]             = "5";
// $edit["field"][$i]["input_col"]                     = "col-sm-12";
// $i++;
$edit["field"][$i]["form_group_class"]                 = "hiding";
$edit["field"][$i]["label"]                         = "Kode TEMP";
$edit["field"][$i]["input"]                         = "kode_temp";
$edit["field"][$i]["input_save"]                     = "skip";
$i++;

if ($edit["mode"] != "add") {
    $edit["query"] = "
	SELECT a.*,
    CONCAT('[', b.nomor, '] ', b.nama, '|', b.nomor) AS 'browse|nomormhbarang',
    CONCAT('[', c.kode, '] ', c.nama, '|', c.nomor) AS 'browse|nomormhsatuan'
	FROM " . $edit["table"] . " a
    LEFT JOIN mhbarang b on a.nomormhbarang = b.nomor
    LEFT JOIN mhsatuan c on a.nomormhsatuan = c.nomor
	WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));

    //query grid untuk detail alamat  kantor
    $edit["field"][$grid[0]]["grid_set"]["query"] = "
    SELECT a.*
    FROM " . $edit["detail"][0]["table_name"] . " a
    WHERE a.status_aktif > 0
    AND a.bom = '0'
    AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];
    //eror handling jika data tidak muncull
    // echo $edit["field"][$grid[0]]["grid_set"]["query"];
    // $edit = fill_value($edit, $r);

    //query grid unutk pic kanror
    // $edit["field"][$grid[1]]["grid_set"]["query"] = "
    // SELECT a.*,
    // a.pic,
    // a.telepon,
    // a.handphone
    // FROM " . $edit["detail"][1]["table_name"] . " a
    // WHERE a.status_aktif > 0
    // AND a.jenis = '0'
    // AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];

    //
    //query grid untuk detail alamat  pengiriman
    $edit["field"][$grid[2]]["grid_set"]["query"] = "
    SELECT a.*
    FROM " . $edit["detail"][2]["table_name"] . " a
    WHERE a.status_aktif > 0
    AND a.bom = '1'
    AND a." . $edit["detail"][2]["foreign_key"] . " = " . $_GET["no"];

    //query grid unutk pic pengiriman
    // $edit["field"][$grid[3]]["grid_set"]["query"] = "
    // SELECT a.*,
    // a.pic,
    // a.telepon,
    // a.handphone
    // FROM " . $edit["detail"][3]["table_name"] . " a
    // WHERE a.status_aktif > 0
    // AND a.jenis = '1'
    // AND a." . $edit["detail"][3]["foreign_key"] . " = " . $_GET["no"];

    //query grid untuk detail alamat  penagihan
    $edit["field"][$grid[4]]["grid_set"]["query"] = "
        SELECT a.*
        FROM " . $edit["detail"][4]["table_name"] . " a
        WHERE a.status_aktif > 0
        AND a.bom = '2'
        AND a." . $edit["detail"][4]["foreign_key"] . " = " . $_GET["no"];

    //query grid unutk pic penagihan
    // $edit["field"][$grid[5]]["grid_set"]["query"] = "
    // SELECT a.*,
    // a.pic,
    // a.telepon,
    // a.handphone
    // FROM " . $edit["detail"][5]["table_name"] . " a
    // WHERE a.status_aktif > 0
    // AND a.jenis = '2'
    // AND a." . $edit["detail"][5]["foreign_key"] . " = " . $_GET["no"];
    $edit = fill_value($edit, $r);
}
$edit = generate_info($edit, $r, "insert|update");

$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit_navbutton = generate_navbutton($edit_navbutton);
?>

<script type="text/javascript">
    $(document).ready(function() {
        // get_nomormhusaha();
        // myFunction();
    });

    function checkHeader() {
        var fields = [];
        var check_failed = check_value_elements(fields);
        if (check_failed != '')
            return check_failed;
        else
            return true;
    }

    // function metode_value_changed(obj) {
    //     <?php if ($edit["mode"] == "add") { ?>
    //         if ($(obj).val() == 'yes') {
    //             $('#yes').val(1);
    //             $('#no').val(0);
    //         } else if ($(obj).val() == 'no') {
    //             $('#yes').val(0);
    //             $('#no').val(1);
    //         } else {
    //             $('#yes').val(0);
    //             $('#no').val(0);
    //         }
    //         browse_clear('master_account_uang_header');
    //     <?php } ?>
    //     if ($(obj).val() == 'yes') {
    //         $('.yes_section').show();
    //     } else {
    //         $('yes_section').hide();
    //     }
    // }

    // function checkSave() {
    //     var tipe = $('#tipe').val();
    //     var nomormhaccount = $('#browse_master_account_aset_hidden').val();
    //     var check_failed = '';

    //     if (tipe == 0 && nomormhaccount == '') {
    //         check_failed += '- Account Wajib Diisi\n\n';
    //     }

    //     if (check_failed != '')
    //         return check_failed;
    //     else
    //         return true;
    // }
    <?= generate_function_checkgrid($grid_str) ?>
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>