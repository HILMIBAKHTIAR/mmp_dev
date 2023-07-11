<?php
$edit["debug"]       = 1;
$edit["uppercase"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];

$edit["sp_approve"] = "sp_disetujui_thjualorder";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_thjualorder";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";


//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdjualorder";
$edit["detail"][$i]["field_name"] = array(
    "produk",
    "po_customer",
    "quantity",
    "uom",
    "price",
    "diskon",
    "amount",
    "subtotal",
    "notes",
    "nomorthbarang",
    "nomor"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------




$i = 0;

if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
} else {
    if (isset($_GET["no"])) {
        $edit["field"][$i]["box_tabs"] = array("data|Data");
    } else {
        $edit["field"][$i]["box_tabs"] = array("data|Data");
    }
}



$edit["field"][$i]["box_tab"] = "data";


$edit["field"][$i]["label"]                         = "Nomor PO";
$edit["field"][$i]["input"]                         = "kode";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"]                 = formatting_code($con, $edit["string_code"]);
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Status PPN";
$edit["field"][$i]["input"] = "status_ppn";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("Non PPN|Non PPN", "Exclude|PPN");
$edit["field"][$i]["input_attr"]["onchange"] = "toggle_ppn()";
$i++;

$edit["field"][$i]["label"]                     = "Customer";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhrelasi";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_customer_po";
$edit["field"][$i]["browse_set"]["param_output"] = array(
    "delivery|delivery",
    "top|browse_master_top_search",
    "nomormhtop|browse_master_top_hidden",
    "valuta|browse_master_valuta_search",
    "nomormhvaluta|browse_master_valuta_hidden"
);
$i++;


// $edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]       = "Tanggal PO";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

$edit["field"][$i]["label"]                     = "TOP";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhtop";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_top";
$i++;

$edit["field"][$i]["label"]                     = "Mata Uang";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhvaluta";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_valuta";
$i++;
// $edit["field"][$i]["browse_set"]["param_output"]     = array("tipe|tipe");
// $edit["field"][$i]["browse_set"]["id"]             = "master_account_penyusutan";
// $edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
// if ($edit["mode"] == "add")
//     $edit["field"][$i]["input_value"] = "IDR - RUPIAH|1";

$edit["field"][$i]["label"]       = "ETA";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal_eta";
$edit["field"][$i]["input_class"] = "required"; 
$edit["field"][$i]["input_class"] = "required date_1";
$edit["field"][$i]["input_attr"]["onchange"] = "calculateDeliveryDate()";
$i++;

$edit["field"][$i]["label"]                     = "Hari Perjalanan";
$edit["field"][$i]["input"]                        = "hari_perjalanan";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
 if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"] = 0;
$edit["field"][$i]["input_attr"]["onchange"] = "calculateDeliveryDate()";
$i++;


$edit["field"][$i]["label"]       = "Delivery";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal_delivery";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
// $edit["field"][$i]["label"] = "delivery";
// $edit["field"][$i]["label_col"] = "col-sm-12";
// $edit["field"][$i]["label_attr"]["style"] = "text-align:left;margin-bottom:10px";
// $edit["field"][$i]["input"] = "delivery";
// $edit["field"][$i]["input_class"] = "";
// $edit["field"][$i]["input_col"] = "col-sm-12";
// $edit["field"][$i]["input_element"] = "textarea";
// $edit["field"][$i]["input_attr"]["rows"] = "4";
// $edit["field"][$i]["input_attr"]["cols"] = "70";
// $i++;


// $edit["field"][$i]["label"] = "Notes";
// $edit["field"][$i]["label_col"] = "col-sm-12";
// $edit["field"][$i]["label_attr"]["style"] = "text-align:left;margin-bottom:10px";
// $edit["field"][$i]["input"] = "notes";
// $edit["field"][$i]["input_class"] = "";
// $edit["field"][$i]["input_col"] = "col-sm-12";
// $edit["field"][$i]["input_element"] = "textarea";
// $edit["field"][$i]["input_attr"]["rows"] = "4";
// $edit["field"][$i]["input_attr"]["cols"] = "70";
// $i++;

// $edit["field"][$i]["form_group"]                 = 0;
// $edit["field"][$i]["label"]                     = "Toleransi";
// $edit["field"][$i]["label_class"]                 = "req";
// $edit["field"][$i]["input"]                     = "nomormhtoleransi";
// $edit["field"][$i]["input_class"]                 = "required";
// $edit["field"][$i]["input_element"]             = "browse";
// $edit["field"][$i]["browse_setting"]             = "toleransi_customer";
// $i++;

// $edit["field"][$i]["label"]                     = "Nama Barang";
// $edit["field"][$i]["label_class"]                 = "req";
// $edit["field"][$i]["input"]                     = "nomormhbarang";
// $edit["field"][$i]["input_class"]                 = "required";
// $edit["field"][$i]["input_element"]             = "browse";
// $edit["field"][$i]["browse_setting"]             = "master_barangjadi";
// $i++;


// $edit["field"][$i]["form_group"]                 = 0;
// $edit["field"][$i]["label"]                     = "Pembayaran";
// $edit["field"][$i]["label_class"]                 = "req";
// $edit["field"][$i]["input"]                     = "nomormhtop";
// $edit["field"][$i]["input_class"]                 = "required";
// $edit["field"][$i]["input_element"]             = "browse";
// $edit["field"][$i]["browse_setting"]             = "master_top";
// $i++;


// $edit["field"][$i]["label"] 					= "Jumlah Warna";
// $edit["field"][$i]["input"]						= "jumlah_warna";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
// $i++;

// $edit["field"][$i]["form_group"]                 = 0;
// $edit["field"][$i]["label"]                     = "Alamat Pengiriman";
// $edit["field"][$i]["label_class"]                 = "req";
// $edit["field"][$i]["input"]                     = "nomormdrelasialamat";
// $edit["field"][$i]["input_class"]                 = "required";
// $edit["field"][$i]["input_element"]             = "browse";
// $edit["field"][$i]["browse_setting"]             = "master_alamat_pengiriman";
// $edit["field"][$i]["browse_set"]["param_input"] = array(
// 	"a.nomormhrelasi|browse_master_customer_hidden"
// );
// $edit["field"][$i]["browse_set"]["param_output"] = array(
// 	"nomor|nomormdrelasialamat"
// );
// $i++;


// $edit["field"][$i]["label"] 					= "nomormdrelasialamat";
// $edit["field"][$i]["input"]						= "nomormdrelasialamat";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
// $edit["field"][$i]["form_group_class"] = "hiding";
// $i++;

// $edit["field"][$i]["form_group"]                 = 0;
// $edit["field"][$i]["label"] 					= "Oem";
// $edit["field"][$i]["input"]						= "oem";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
// $edit["field"][$i]["input_save"] = "skip";
// $i++;


// $edit["field"][$i]["label"] 					= "Komposisi";
// $edit["field"][$i]["input"]						= "komposisi";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
// $i++;

// $edit["field"][$i]["form_group"]                 = 0;
// $edit["field"][$i]["label"] 					= "Hari Perjalanan";
// $edit["field"][$i]["input"]						= "hari_perjalanan";
// $edit["field"][$i]["input_class"] 				= "iptnumber"; 
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
// $i++;


// $edit["field"][$i]["label"] 					= "MOQ";
// $edit["field"][$i]["input"]						= "moq";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
// $i++;

// $edit["field"][$i]["form_group"]                 = 0;
// $edit["field"][$i]["label"]       = "Closed";
// $edit["field"][$i]["label_class"] = "req";
// $edit["field"][$i]["input"]       = "closed";
// $edit["field"][$i]["input_class"] = "required";
// $edit["field"][$i]["input_class"] = "required date_1";
// $i++;

// $edit["field"][$i]["label"] 					= "Size";
// $edit["field"][$i]["input"]						= "size";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
// $i++;


// $edit["field"][$i]["label"] 					= "Harga";
// $edit["field"][$i]["input"]						= "harga";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
// $i++;


// $edit["field"][$i]["label"] = "Status Tiba";
// $edit["field"][$i]["input"] = "status_tiba";
// $edit["field"][$i]["input_element"] = "select1";
// $edit["field"][$i]["input_option"] = array("1|Maju", "0|Mundur");
// $i++;



//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'List Barang'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'PO Customer',
    'Produk',
    'Quantity',
    'UoM',
    'Price',
    'Diskon',
    'Amount',
    'Subtotal',
    'Notes',
    'nomorthbarang'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "po_customer",
    "produk",
    "quantity",
    "uom",
    "price",
    "diskon",
    "amount",
    "subtotal",
    "notes",
    "nomorthbarang"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    kode_barang_customer:'',
    nama:'',
    quantity:'',
    uom:'',
    price:'',
    diskon:'',
    amount:'',
    subtotal:'',
    notes:'',
    nomorthbarang:''
}";

$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "['nomorthbarang']";
$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'po_customer'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'po_customer'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_barang_customer }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'produk'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'produk'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_barang_customer }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'quantity'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'quantity'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'uom'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'uom'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'price'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'price'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'diskon'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'diskon'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'amount'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'amount'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'notes'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'notes'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorthbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorthbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;
$i++;
$edit["field"][$i]["label"]              = "Notes";
$edit["field"][$i]["label_col"] = "col-sm-12";
$edit["field"][$i]["label_attr"]["style"] = "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"]              = "notes";
$edit["field"][$i]["input_element"]      = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "8";
$edit["field"][$i]["input_col"] = "col-sm-6";
$i++;
// ========================================= END GRID 1 ========================================
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                  = "Subtotal";
$edit["field"][$i]["input"]                  = "subtotal";
$edit["field"][$i]["input_col"] = "col-sm-4";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"] . " summary";
if ($edit['mode'] == 'add') {
    $edit["field"][$i]["input_attr"]["value"] = "0";
}
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                  = "Discount";
$edit["field"][$i]["input"]                  = "diskon_prosentase";
$edit["field"][$i]["input_col"] = "col-sm-2";
$edit["field"][$i]["input_class"] = "iptpercent";
$edit["field"][$i]["input_attr"]["maxlength"] = $_SESSION["setting"]["limit_percent"];
if ($edit['mode'] == 'add') {
    $edit["field"][$i]["input_attr"]["value"] = "0";
}
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                  = "";
$edit["field"][$i]["input"]                  = "diskon_nominal";
$edit["field"][$i]["input_col"] = "col-sm-2";
$edit["field"][$i]["input_class"] = "iptmoney";
if ($edit['mode'] == 'add') {
    $edit["field"][$i]["input_attr"]["value"] = "0";
}
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                  = "DPP";
$edit["field"][$i]["input"]                  = "dpp";
$edit["field"][$i]["input_col"] = "col-sm-4";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"] . " summary";
if ($edit['mode'] == 'add') {
    $edit["field"][$i]["input_attr"]["value"] = "0";
}
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group"] = 0;
// $edit["field"][$i]["form_group_class"]       = "hiding";
$edit["field"][$i]["label"]                  = "Tax";
$edit["field"][$i]["input"]                  = "ppn_prosentase";
$edit["field"][$i]["input_col"] = "col-sm-2";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_percent"] . " summary";
$edit["field"][$i]["input_attr"]["maxlength"] = $_SESSION["setting"]["limit_percent"];
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit['mode'] == 'add') {
    $edit["field"][$i]["input_attr"]["value"] = "0";
}
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                  = "";
$edit["field"][$i]["input"]                  = "ppn_nominal";
$edit["field"][$i]["input_col"] = "col-sm-2";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"] . " summary";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit['mode'] == 'add') {
    $edit["field"][$i]["input_attr"]["value"] = "0";
}
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                  = "Total";
$edit["field"][$i]["input"]                  = "total";
$edit["field"][$i]["input_col"] = "col-sm-4";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"] . " summary";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit['mode'] == 'add') {
    $edit["field"][$i]["input_attr"]["value"] = "0";
}
$i++;
$edit["field"][$i]["form_group_class"]       = "hiding";
$edit["field"][$i]["label"] = "ppn";
$edit["field"][$i]["input"] = "ppn";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;


// ============================== UPLOAD ============================================


// $index = 0;
// if ($edit["mode"] != "add") {
//     $edit["field"][$i]["box_tab"]             = "upload";
//     $edit["field"][$i]["input_col"]         = 'col-sm-8 col-sm-offset-2';
//     $edit["field"][$i]["input_element"]     = 'No Uploaded File';

//     $file_nomor = $_GET["no"];
//     $file_tabel = $edit["table"];
//     $file_query = mysqli_query($con, " 
// 	SELECT nomor, `directory`, `nama`, category  
// 	FROM mharchievedfiles 
// 	WHERE 
// 		status_aktif > 0 AND 
// 		category = 'SALES_ORDER' AND 
// 		tablename = '$file_tabel' AND 
// 		filenumber = $file_nomor");
//     $file_count = mysqli_num_rows($file_query);

//     $arr_images = array();

//     if ($file_count > 0) {
//         $edit["field"][$i]["input_element"] = '';
//         $count_i = 0;
//         while ($row = mysqli_fetch_assoc($file_query)) {
//             $json[] = $row;
//             array_push($arr_images, $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Thumbnail/ITEM" . "/" . $json[$count_i]["nama"]));
//             $edit["field"][$i]["input_element"] .= '<div id="uploaded_file_' . $json[$index]["nomor"] . '">';
//             $directory = str_replace("'", "\'", $json[$index]["nama"]);
//             $directory_details = explode(".", $directory);
//             // echo($directory_details[1]);
//             if ($edit["mode"] == "edit")
//                 if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
//                     if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
//                         $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
//                     else
//                         $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
//                 else
// 					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
//                     $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"])  . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
//                 else
//                     $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
//             else	
// 				if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
//                 if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
//                     $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
//                 else
//                     $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"])  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
//             else
// 					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
//                 $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
//             else
//                 $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"])  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';


//             if ($edit["mode"] != "view")
//                 // $edit["field"][$i]["input_element"] .= '<a class="btn btn-danger btn-xs" style="color:white;position:relative;top:-26px;" onclick="file_delete(' . "'" . $json[$index]["nomor"] . "'" . ')">&nbsp;&nbsp;Delete&nbsp;&nbsp;</a>';
//                 $edit["field"][$i]["input_element"] .= '<a class="btn btn-danger btn-xs" style="margin-left:10px;color:white;position:relative;" onclick="file_delete(' . "'" . $json[$index]["nomor"] . "'" . ')">&nbsp;&nbsp;X&nbsp;&nbsp;</a>';
//             $edit["field"][$i]["input_element"] .= '</div>';
//             $index++;
//             $count_i++;
//         }
//     }
//     $edit["field"][$i]["input_save"] = "skip";
//     $i++;
//     $edit["field"][$i]["form_group_class"]       = "hiding";
//     $edit["field"][$i]["label"] = "directory";
//     $edit["field"][$i]["input"] = "directory";
//     $edit["field"][$i]["input_save"] = "skip";
//     $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
//     $i++;
// }

// ========================================================= end test==============================


// ========================================================= end test==============================


if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*,
    DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
    DATE_FORMAT(a.tanggal_eta,'" . $_SESSION[ "setting"]["date_sql"] . "') as tanggal_eta,
    DATE_FORMAT(a.tanggal_delivery,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_delivery,
    CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhtop',
    CONCAT(c.nama, '|', c.nomor) AS 'browse|nomormhrelasi',
    CONCAT(d.nama, '|', d.nomor) AS 'browse|nomormhvaluta'
    FROM thjualorder a
    join mhtop b on b.nomor = a.nomormhtop
    join mhrelasi c on c.nomor = a.nomormhrelasi
    join mhvaluta d on d.nomor = a.nomormhvaluta
    WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));



    //query grid detail 1
    $button_link_action = "CONCAT('<center><a class=\"btn btn-info btn-app-sm\"><i class=\"fa fa-plus-square\" onclick=\"viewDataAction(',a.nomor,')\" title=\"View Data\"></i></a></center>')";

    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*
	FROM " . $edit["detail"][0]["table_name"] . " a
    where a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];



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
$features = "save|back|reload" . check_approval($r, "edit|approve|delete|disappr|print");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);

// if ($edit["mode"] != "add") {
//     $edit_navbutton["field"][$i]["input_element"]             = "a";
//     $edit_navbutton["field"][$i]["input_float"]               = "right";
//     $edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
//     $edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
//     $edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
//     $edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
//     $edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
//         "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=SALES_ORDER&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
//     $i++;
// }

?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#diskon_prosentase').on('keyup', function() {
            var subtotal = $('#subtotal').val();
            var diskon_prosentase = $('#diskon_prosentase').val();

            var diskon_nominal = subtotal * (diskon_prosentase / 100);
            var diskon_nominal1 = diskon_nominal.toFixed(2);

            console.log(diskon_nominal1);
            $("input[name=diskon_nominal]").val(diskon_nominal1);

            // document.getElementById('diskon_nominal').value = diskon_nominal1
            sum_subtotal_<?= $grid_str[0] ?>()
        });

        $('#diskon_nominal').on('keyup', function() {
            var subtotal = $('#subtotal').val();
            var diskon_nominal = $('#diskon_nominal').val();

            var diskon_prosentase = (diskon_nominal / subtotal * 100);
            var diskon_prosentase1 = diskon_prosentase.toFixed(2);

            $("input[name=diskon_prosentase]").val(diskon_prosentase1);
            // document.getElementById('diskon_prosentase').value = diskon_prosentase
            sum_subtotal_<?= $grid_str[0] ?>()
        });
    });


    function load_grid_detail() {
        var no = $('#nomorthspk').val();

        var pages = 'pages/grid_load.php?id=spk_printing_baru_detail-load&no=' + no + '';
        jQuery(<?= $grid_elm[0] ?>).jqGrid('setGridParam', {
            url: pages,
            datatype: 'json',
            loadComplete: function(data) {
                <?= $grid_str[0] ?>_load = 0;
                actGridComplete_<?= $grid_str[0] ?>();
            }
        });
        jQuery(<?= $grid_elm[0] ?>).trigger('reloadGrid');
    }

    function toggle_ppn() {
        var ppn = $('#ppn').val();
        var status_ppn = $('#status_ppn').val();

        if (status_ppn == 'Non PPN') {
            $('#ppn').val(0);
            $('#ppn_prosentase').val(0);
            $('#ppn_nominal').val(0);
        } else {
            $('#ppn').val(1);
            $('#ppn_prosentase').val(<?= $_SESSION["setting"]["ppn"] ?>);
            const ppn_nominal = parseFloat($('#subtotal').val()) * (<?= $_SESSION["setting"]["ppn"] ?> / 100);
            $('#ppn_nominal').val(ppn_nominal);
        }

        console.log({
            ppn,
            status_ppn
        })


        sum_subtotal_<?= $grid_str[0] ?>()
    }

    function pad(str, max) {
        str = str.toString();
        return str.length < max ? pad("0" + str, max) : str;
    }

    function calculateDeliveryDate() {
        var from = $("#tanggal_eta").val().split("/");
        var hariPerjalanan = $("#hari_perjalanan").val();
        var date1 = new Date(from[2], from[1] - 1, from[0]);
        var days = hariPerjalanan;
        date1.setDate(date1.getDate() - parseInt(days));

        // if datetanggaljatuhtempo is weekend then add 2 days
        // var day = date1.getDay();
        // if (day == 6) {
        //     date1.setDate(date1.getDate() + 2);
        // } else if (day == 0) {
        //     date1.setDate(date1.getDate() + 1);
        // }

        var dd = pad(date1.getDate(), 2);
        var mm = pad(date1.getMonth() + 1, 2); //January is 0!
        var yyyy = date1.getFullYear();

        var datetanggaldelivery = dd + '/' + mm + '/' + yyyy;



        console.log({
            datetanggaldelivery
        });
        document.getElementById('tanggal_delivery').value = datetanggaldelivery;
        $("#tanggal_delivery").val(datetanggaldelivery);
    }


    function checkHeader() {
        var fields = [];
        var check_failed = check_value_elements(fields);
        if (check_failed != '')
            return check_failed;
        else
            return true;
    }

    function viewDataAction(nomor) {
        window.open("?m=spk_printing_baru_detail&f=header_grid&&sm=edit&a=edit&no=" + nomor);
    }

    <?= generate_function_checkgrid($grid_str) ?>
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>