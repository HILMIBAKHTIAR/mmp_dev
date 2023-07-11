<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];
// $edit["manual_save"] = "contents/menu_frame/" . $_SESSION["g.frame"] . "-" . $_SESSION["g.menu"] . "-save.php";


// SETTING DATA GRID FOR SAVE
$i = 0;
$edit["detail"][$i]["table_name"] = "tdbarangcustomerwarna";
$edit["detail"][$i]["field_name"] = array(
    "urutan_unit",
    "serial_number",
    "warna",
    "nomorstatus_warna_spare",
    "nomormhwarna",
    "nomor"
);
$edit["detail"][$i]["foreign_key"]      = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"]        = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_warna";
$i++;

// END SETTING DATA GRID

// SETTING DATA GRID FOR SAVE
// $edit["detail"][$i]["table_name"] = "tdbarangcustomer_komposisi";
// $edit["detail"][$i]["field_name"] = array(
//     "nomor",
//     "komposisi",
//     "mikron",
//     "nomormhbarang"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_komposisi";
// $i++;
// END SETTING DATA GRID

// SETTING DATA GRID FOR SAVE
$edit["detail"][$i]["table_name"] = "tdbarangcustomer_kombinasidesign";
$edit["detail"][$i]["field_name"] = array(
    "nama_barang",
    "nomorthbarangcustomer",
    "nomor"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_kombinasi";
$i++;
// END SETTING DATA GRID

$edit['sp_edit'] = "sp_edit_thbarang";
$edit["sp_edit_param"] = array("param_nomormhadmin|0", "param_mode|1");
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_nomormhadmin"]         = $_SESSION["login"]["nomor"];
$_POST["param_mode"]                 = "1";



$edit["sp_approve"] = "sp_disetujui_thbarang";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_thbarang";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";



$i = 0;

if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "estimasi|Estimasi", "info|Info");
} else {
    if (isset($_GET["no"])) {
        $edit["field"][$i]["box_tabs"] = array("data|Data", "estimasi|Estimasi", "info|Info");
    } else {
        $edit["field"][$i]["box_tabs"] = array("data|Data", "estimasi|Estimasi", "info|Info");
    }
}

$edit["field"][$i]["box_tab"] = "data";

$edit["field"][$i]["label"]                     = "Kode Barang Customer";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                        = "kode_barang_customer";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["label"]                     = "Nama Barang Customer";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                        = "nama";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$i++;

$edit["field"][$i]["label"]                         = "Customer";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input"]                         = "nomormhrelasi";
$edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_setting"]                 = "master_customer";
$edit["field"][$i]["browse_set"]["param_output"]     = array(
    "kode_alias|kode_alias"
);
$i++;

$edit["field"][$i]["label"]                     = "nama alias customer";
$edit["field"][$i]["input"]                        = "kode_alias";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["label"]                         = "Ukuran Barang Jadi";
$edit["field"][$i]["input"]                         = "ukuran_barang_jadi";
// $edit["field"][$i]["input_class"]                 = "iptmoney1";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$edit["field"][$i]["input_attr"]["onchange"] = "ukuran_barang_test()";
$i++;

$edit["field"][$i]["label"]                     = "Berat Roll";
$edit["field"][$i]["input"]                        = "berat";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"]                 = "iptmoney2";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Nama Alias Barang";
$edit["field"][$i]["input"]                        = "nama_alias";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
// $edit["field"][$i]["input_class"]                 = "iptmoney2";
$i++;

$edit["field"][$i]["label"]                         = "Design Width";
$edit["field"][$i]["input"]                         = "width";
$edit["field"][$i]["input_class"]                 = "iptmoney1";
$edit["field"][$i]["input_attr"]["onchange"] = "ukuran_barang_test(), ukuranbarangjadi()";
$i++;


$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"] = "Kode Barang MMP";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "kode_custom";
$edit["field"][$i]["input_attr"]["maxlength"] = "200";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$i++;

$edit["field"][$i]["label"]                     = "Design Height";
$edit["field"][$i]["input"]                        = "height";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"]                 = "iptmoney1";
$edit["field"][$i]["input_attr"]["onchange"] = "ukuran_barang_test(), ukuranbarangjadi()";
// $edit["field"][$i]["input_attr"]["onchange"] = "";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Nama Barang MMP";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                        = "nama_barang_customer"; // INI BARANG MMP 
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Panjang Roll PO";
$edit["field"][$i]["input_class"]                 = "iptnumber";
$edit["field"][$i]["input"]                        = "panjang";
$edit["field"][$i]["input_attr"]["onchange"] = "setProduksi(), ukuranbarangjadi()";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Gramasi";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                        = "gramasi";
$edit["field"][$i]["input_class"]                 = "required iptnumber";
if ($edit["mode"] == "add") {
    $edit["field"][$i]["input_value"]                 = 0;
}
$i++;


$edit["field"][$i]["label"]                         = "Extra";
$edit["field"][$i]["input"]                         = "extra";
$edit["field"][$i]["input_class"]                 = "iptnumber";
$edit["field"][$i]["input_attr"]["onchange"] = "setProduksi()";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Komposisi";
$edit["field"][$i]["input"]                        = "komposisi";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Netto";
$edit["field"][$i]["input_class"]                 = "iptmoney1";
$edit["field"][$i]["input"]                        = "netto";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Nomor MD";
$edit["field"][$i]["input"]                        = "nomor_md";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$i++;

$edit["field"][$i]["label"]                     = "Isi";
$edit["field"][$i]["input_class"]                 = "iptmoney1";
$edit["field"][$i]["input"]                        = "isi";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                         = "No Reg";
$edit["field"][$i]["input"]                         = "no_reg";
$i++;

$edit["field"][$i]["label"]                     = "Peruntukan";
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                        = "peruntukan";
// $edit["field"][$i]["input_class"]                 = "required";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Jumlah Cylinder";
$edit["field"][$i]["input_class"]                 = "iptmoney1";
$edit["field"][$i]["input"]                        = "jumlah_cilinder";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$i++;

$edit["field"][$i]["label"]                   = "New";
$edit["field"][$i]["input_element"] = "checkbox";
$edit["field"][$i]["input"]            = "new";
$edit["field"][$i]["input_col"] = "col-sm-3";
$i++;

$edit["field"][$i]["label"]                   = "Old";
$edit["field"][$i]["input_element"] = "checkbox";
$edit["field"][$i]["input"]            = "old";
$i++;

$edit["field"][$i]["label"]                         = "Satuan Produksi";
$edit["field"][$i]["input"]                         = "nomormhsatuanproduksi";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_set"]["id"]               = "master_satuan_produksi";
$edit["field"][$i]["browse_setting"]                 = "master_satuan";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                         = "Satuan PO";
$edit["field"][$i]["input"]                         = "nomormhsatuanpo";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_set"]["id"]                = "master_satuan_po";
$edit["field"][$i]["browse_setting"]                 = "master_satuan";
$i++;

$edit["field"][$i]["label"]                     = "Total Micron";
$edit["field"][$i]["input"]                        = "total";
$edit["field"][$i]["input_class"]                 = "iptmoney1";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Produksi";
$edit["field"][$i]["input_class"]                 = "iptnumber";
$edit["field"][$i]["input"]                        = "produksi";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$i++;

$edit["field"][$i]["label"]                         = "Printing";
$edit["field"][$i]["input"]                         = "printing";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_option"]                     = array("PRINTED|PRINTED", "NO PRINT|NO PRINT", "SINGLE COLOUR|SINGLE COLOUR");
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                         = "Arah Baca";
$edit["field"][$i]["input"]                         = "arah_baca";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_option"]                     = array("KEPALA|KEPALA", "EKOR|EKOR", "KOSONG|KOSONG");
$i++;

// $edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Tahapan Proses";
$edit["field"][$i]["input"]                        = "tahapan_proses";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                         = "Eye Mark";
$edit["field"][$i]["input"]                         = "eye_mark";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_option"]                     = array("KIRI|KIRI", "KANAN|KANAN", "KEDUA|KEDUA");
$i++;

$edit["field"][$i]["label"]                         = "Kepemilikan";
$edit["field"][$i]["input"]                         = "kepemilikan";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_option"]                     = array("MMP|MMP", "CUSTOMER|CUSTOMER");
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                         = "Sisi Cetak";
$edit["field"][$i]["input"]                         = "sisi_cetak";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_option"]                     = array("SURFACE|SURFACE(CETAK LUAR)", "RESERVE|RESERVE(CETAK DALAM)");
$i++;

$edit["field"][$i]["label"]                     = "Catatan SPK";
$edit["field"][$i]["input"]                        = "catatan_spk";
// $edit["field"][$i]["input_class"]                 = "required";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Jenis Packaging";
$edit["field"][$i]["input"]                        = "jenis_packaging";
// $edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$i++;
$edit["field"][$i]["label"]                     = "Size Papercore";
$edit["field"][$i]["input"]                        = "size_papercore";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$edit["field"][$i]["input_save"]             = "skip";

$i++;


// $grid[0] = $i;
// $edit["field"][$i]["input_element"]                  = "grid";
// $edit["field"][$i]["grid_set"]                       = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"]                 = $edit["detail"][0]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"]  = "'Proses'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 	'Proses',
// 	'nomor'
// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "proses",
//     "nomor"
// );
// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
// 	proses 		:'',
// 	nomor 			:''
// }";
// $edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[ '' ]";
// $j = 0;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'proses'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'proses'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["edittype"] = "'select'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"] = "'select'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{value:{ 
// 	'PRINTING':'PRINTING', 
// 	'EXTRU':'EXTRU',
//     'SLITTING':'SLITTING',
//     'PACKING':'PACKING'
//  }}";
// //	'TITIPAN_KREDIT_SUPPLIER':'NOTA KREDIT SUPPLIER'
// //	'JUAL_NOTA':'NOTA JUAL
// //$edit["field"][$i]["grid_set"]["nav_option"]["add"] = "false";
// //$edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomor'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomor'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
// $j++;
// $i++;
// END GRID

//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Warna - Cylinder'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Urutan Unit',
'Serial Number',
'Warna',
'Status',
'nomorstatus_warna_spare',
'nomormhwarna',
'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "urutan_unit",
    "serial_number",
    "warna",
    "status_silinder",
    "nomorstatus_warna_spare",
    "nomormhwarna",
    "nomor",
);

// $counter = 1;

$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{}";
$edit["field"][$i]["grid_set"]["navgrid"] = 0;
$edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
$j = 0;

// $counter++; 

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'urutan_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'urutan_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'serial_number'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'serial_number'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'warna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'warna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_warna }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'status_silinder'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'status_silinder'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_status_warna_1 }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorstatus_warna_spare'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorstatus_warna_spare'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhwarna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhwarna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$i++;
// ---------------------------------------END FRONT GRID 1-------------------------------------------------

//-----------------------------------------FRONTEND GRID 2--------------------------------
// $grid[1] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'Komposisi'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'Komposisi',
// 'Mikron',
// 'nomormhbarang',
// 'nomor'
// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "komposisi",
//     "mikron",
//     "nomormhbarang",
//     "nomor"
// );


// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
//     komposisi:'',
//     mikron:0,
//     nomormhbarang: '',
//     nomor: ''
// }";
// $j = 0;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'komposisi'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'komposisi'";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_bahanbakufilm }";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'mikron'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'mikron'";
// // $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhbarang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhbarang'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;
// $i++;


$edit["field"][$i]["box_tab"] = "estimasi";

$edit["field"][$i]["label"] = "Tanggal";
$edit["field"][$i]["input"] = "tanggal";
$edit["field"][$i]["label_class"] = "req ";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;


$edit["field"][$i]["label"]                     = "Tahapan Cylinder";
$edit["field"][$i]["input"]                        = "proses_cilinder";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Panjang";
$edit["field"][$i]["input"]                        = "panjang_cilinder";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"]                 = "iptmoney1";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_attr"]["onchange"] = "ukuran_barang_test()";
$i++;


$edit["field"][$i]["label"]                     = "Kode Cylinder";
$edit["field"][$i]["input"]                        = "kode_cilinder";
$edit["field"][$i]["input_col"] = "col-sm-2";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                  = "";
$edit["field"][$i]["input"] = "load_grid_detail_button";
$edit["field"][$i]["input_col"] = "col-sm-2";
$edit["field"][$i]["input_value"] = "Generate";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_attr"]["style"] = "text-align:center;background-color:#1c557b;color:white;background-image:none;cursor:pointer;font-size:12px";
$edit["field"][$i]["input_attr"]["onclick"] = "generate_master_cylinder()";
$edit["field"][$i]["input_save"]             = "skip";
$i++;


$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Up";
$edit["field"][$i]["input"]                        = "up_cilinder";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_class"]                 = "iptmoney1";
$i++;


$edit["field"][$i]["label"]                     = "Cylinder Join 1";
$edit["field"][$i]["input"]                        = "cilinder_join_1";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Circum";
$edit["field"][$i]["input"]                        = "circum";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"]                 = "iptmoney1";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;


$edit["field"][$i]["label"]                     = "Cylinder Join 2";
$edit["field"][$i]["input"]                        = "cilinder_join_2";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Pitch";
$edit["field"][$i]["input"]                        = "pitch";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"]                 = "iptmoney1";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;


$edit["field"][$i]["label"]                     = "Kode B1";
$edit["field"][$i]["input"]                        = "kode_b1";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Max Speed";
$edit["field"][$i]["input"]                        = "maxspeed";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"]                 = "iptmoney1";
$i++;

$edit["field"][$i]["label"]                     = "Kode B2";
$edit["field"][$i]["input"]                        = "kode_b2";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Kombinasi Design";
$edit["field"][$i]["input"]                        = "kombinasi_design";
$edit["field"][$i]["input_col"] = "col-sm-2";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                  = "";
$edit["field"][$i]["input"] = "load_grid_detail_button_2";
$edit["field"][$i]["input_col"] = "col-sm-2";
$edit["field"][$i]["input_value"] = "Input Design";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_attr"]["style"] = "text-align:center;background-color:#1c557b;color:white;background-image:none;cursor:pointer;font-size:12px";
$edit["field"][$i]["input_attr"]["onclick"] = "generate_dashboard_cylinder()";
$edit["field"][$i]["input_save"]             = "skip";
$i++;

$edit["field"][$i]["label"]                     = "Lokasi Cylinder";
$edit["field"][$i]["input"]                        = "lokasi_cilinder";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;



$edit["field"][$i]["label"]                     = "Lamination";
$edit["field"][$i]["input"]                        = "lamination";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Ukuran Khusus Cetak";
$edit["field"][$i]["input"]                        = "ukuran_khusus_cetak";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"]                 = "iptmoney1";
$i++;

$edit["field"][$i]["label"]                     = "Film Cetak";
$edit["field"][$i]["input"]                        = "film_cetak";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Ukuran Khusus Lam";
$edit["field"][$i]["input"]                        = "ukuran_khusus_lam";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"]                 = "iptmoney1";
$i++;

$edit["field"][$i]["label"]                     = "Film Laminasi";
$edit["field"][$i]["input"]                        = "film_laminasi";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Panjang Roll";
$edit["field"][$i]["input"]                        = "panjang_roll";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"]                 = "iptmoney1";
$i++;

$edit["field"][$i]["label"]                     = "Estimasi Roll Jadi";
$edit["field"][$i]["input"]                        = "estimasi_roll_jadi";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"]                 = "iptmoney1";
$i++;

$edit["field"][$i]["label"]                     = "Bag Process";
$edit["field"][$i]["input"]                        = "bag_process";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$grid[1] = $i;
$edit["field"][$i]["input_element"]                  = "grid";
$edit["field"][$i]["grid_set"]                       = $edit_grid;
$edit["field"][$i]["grid_set"]["id"]                 = $edit["detail"][1]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"]  = "'Kombinasi Design'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
	'nama barang',
	'nomorthbarangcustomer',
	'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "nama_barang",
    "nomorthbarangcustomer",
    "nomor"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
	nama_barang 		:'',
	nomorthbarangcustomer 		:'',
	nomor 			:''
}";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[ 'nama_barang' ]";
$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nama_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nama_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_barangcustomer }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomorthbarangcustomer'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomorthbarangcustomer'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;
$i++;
//END GRID



$index = 0;
if ($edit["mode"] != "add") {
    // $edit["field"][$i]["box_tab"]             = "upload";
    // $edit["field"][$i]["input_col"]         = 'col-sm-8 col-sm-offset-2';
    // $edit["field"][$i]["input_element"]     = 'No Uploaded File';

    $file_nomor = $_GET["no"];
    $file_tabel = $edit["table"];
    $query = " 
	SELECT * 
	FROM mharchievedfiles 
	WHERE 
		status_aktif > 0 AND 
		kategori = 'BARANG_CUSTOMER' AND 
		file_tabel = '$file_tabel' AND 
		file_nomor = $file_nomor
    
    UNION ALL

    SELECT
        a.* 
    FROM
        mharchievedfiles a
        JOIN thinputmd b ON b.nomor = a.file_nomor AND a.file_tabel = 'thinputmd' and b.status_aktif = 1
        JOIN thbarang d ON d.nomor = b.nomorthbarang AND d.status_aktif = 1
    WHERE
        a.status_aktif > 0 
        AND a.kategori = 'NO_MD' 
        AND b.nomorthbarang = $file_nomor AND b.status_disetujui = 1
    ";

    echo $query;

    $file_query = mysqli_query($con, $query);
    $file_count = mysqli_num_rows($file_query);

    $arr_images = array();

    if ($file_count > 0) {
        $edit["field"][$i]["input_element"] = '';
        $count_i = 0;
        while ($row = mysqli_fetch_assoc($file_query)) {
            $json[] = $row;
            array_push($arr_images, $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$count_i]["kategori"] . "/" . $json[$count_i]["nama"]));
            $edit["field"][$i]["input_element"] .= '<div id="uploaded_file_' . $json[$index]["nomor"] . '">';
            $directory = str_replace("'", "\'", $json[$index]["nama"]);
            $directory_details = explode(".", $directory);
            // echo($directory_details[1]);
            if ($edit["mode"] == "edit")
                if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
                    if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                        $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                    else
                        $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
                else
					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"])  . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                else
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
            else	
				if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
                if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                else
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"])  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
            else
					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
            else
                $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "Photo/ITEM" . "/" . $json[$index]["nama"])  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';


            if ($edit["mode"] != "view")
                // $edit["field"][$i]["input_element"] .= '<a class="btn btn-danger btn-xs" style="color:white;position:relative;top:-26px;" onclick="file_delete(' . "'" . $json[$index]["nomor"] . "'" . ')">&nbsp;&nbsp;Delete&nbsp;&nbsp;</a>';
                $edit["field"][$i]["input_element"] .= '<a class="btn btn-danger btn-xs" style="margin-left:10px;color:white;position:relative;" onclick="file_delete(' . "'" . $json[$index]["nomor"] . "'" . ')">&nbsp;&nbsp;X&nbsp;&nbsp;</a>';
            $edit["field"][$i]["input_element"] .= '</div>';
            $index++;
            $count_i++;
        }
    }
    $edit["field"][$i]["input_save"] = "skip";
    $i++;
    $edit["field"][$i]["form_group_class"]       = "hiding";
    $edit["field"][$i]["label"] = "directory";
    $edit["field"][$i]["input"] = "directory";
    $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
    $i++;
}


// ==================================================================================END UPLOAD ======================================================





if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*
    , CONCAT(b.kode_alias, '-', a.nama, '-', CAST(a.ukuran_barang_jadi AS UNSIGNED)) AS kode
    , DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal 
    , CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhrelasi'
    , CONCAT(d.nama, '|', d.nomor) AS 'browse|nomormhsatuanpo'
    , CONCAT(d1.nama, '|', d1.nomor) AS 'browse|nomormhsatuanproduksi'
    , c.struktur_packaging AS komposisi
    , c.total_thickness as total
    , c.tahapan_proses as tahapan_proses
    , c1.nama as jenis_packaging
    , c.size_papercore AS size_papercore
    FROM thbarang a
    LEFT join mhrelasi b on b.nomor = a.nomormhrelasi 
    join thspesifikasiproduk c on a.nomorthspesifikasiproduk = c.nomor
    left join mhjenispackaging c1 on c.nomormhjenispackaging = c1.nomor
    left join mhsatuan d on a.nomormhsatuanpo = d.nomor
    left join mhsatuan d1 on a.nomormhsatuanproduksi = d1.nomor
    WHERE a.status_aktif = 1 AND a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];

    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    $edit["field"][$grid[0]]["grid_set"]["query"] = "
    SELECT a.*,
    b.nama as status_silinder
    FROM " . $edit["detail"][0]["table_name"] . " a
    LEFT JOIN status_warna_spare b ON b.nomor = a.nomorstatus_warna_spare
    WHERE a.status_aktif > 0
    AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];

    $edit["field"][$grid[1]]["grid_set"]["query"] = "
    SELECT a.*
    FROM " . $edit["detail"][1]["table_name"] . " a
    WHERE a.status_aktif > 0
    AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];

    // $edit["field"][$grid[2]]["grid_set"]["query"] = "
    // SELECT a.*
    // FROM " . $edit["detail"][2]["table_name"] . " a
    // WHERE a.status_aktif > 0
    // AND a." . $edit["detail"][2]["foreign_key"] . " = " . $_GET["no"];

    $edit = fill_value($edit, $r);
}

// if ($edit["mode"] != "add") {
//     $edit_navbutton["field"][$i]["input_element"]             = "a";
//     $edit_navbutton["field"][$i]["input_float"]               = "right";
//     $edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
//     $edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
//     $edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
//     $edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
//     $edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
//         "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=BARANG_CUSTOMER&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
//     $i++;
// }


$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$features = "save|back|reload" . check_approval($r, "edit|approve|delete|disappr|print");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#kode_alias').change(function() {
            test();
        })

        $('#nama_alias').change(function() {
            test();
        })

        $('#gramasi').change(function() {
            test();
        })

        <?php if ($edit['mode'] != 'view') : ?>
            $('#load_grid_detail_button').hide()
            $('#load_grid_detail_button_2').hide()
        <?php endif; ?>

        // $('#doi').val(30);
    });

    function test_css() {
        // Get the element by its ID
        const element = document.getElementById('arah_baca');
        const br = document.createElement('br');
        const newDiv = document.createElement('div');

        newDiv.innerHTML = 'This is a new div element!';

        // Set the CSS style
        element.style.color = 'red';

        element.appendChild(newDiv);

    }

    function test() {

        var kode_alias = $('#kode_alias').val();
        var nama_alias = $('#nama_alias').val();
        var gramasi = $('#gramasi').val();

        console.log({
            kode_alias,
            nama_alias,
            gramasi
        })

        kode_custom = '';
        if (kode_alias != '' && kode_alias != '-') {
            kode_custom += kode_alias;
        }
        if (nama_alias != '' && nama_alias != '-') {
            kode_custom += '-' + nama_alias;
        }
        if (gramasi != '' && gramasi != '-') {
            kode_custom += '-' + gramasi;
        }

        $('#kode_custom').val(kode_custom);
    }

    function ukuranbarangjadi() {

        var width = $('#width').val();
        var height = $('#height').val();
        var panjang = $('#panjang').val();

        console.log({
            width,
            height,
            panjang
        })

        ukuran_barang_jadi = '';
        if (width != '' && width != '-') {
            ukuran_barang_jadi += width;
        }
        if (height != '' && height != '-') {
            ukuran_barang_jadi += ' x ' + height;
        }
        if (panjang != '' && panjang != '-') {
            ukuran_barang_jadi += ' x ' + panjang + ' m';
        }

        $('#ukuran_barang_jadi').val(ukuran_barang_jadi);
    }

    function generate_master_cylinder() {

        var kode_cilinder = $('#kode_cilinder').val();
        if (kode_cilinder = '') {
            return alert('Kode Cilinder tidak boleh KOSONG')
        }

        $.ajax({
            type: "post",
            url: "pages/generate_cylinder.php",
            data: {
                nomorthbarang: parseInt(<?= $_GET['no'] ?>)
            },
            success: function(response) {
                var data = JSON.parse(response);
                console.log({
                    data
                })

                if (data.message) {
                    return alert(data.message)
                }
            },
            error: function() {
                alert("Pengecekan gagal (Network error)");
            }
        });
    }

    function generate_dashboard_cylinder() {

        var kombinasi_design = $('#kombinasi_design').val();
        console.log({
            kombinasi_design
        })
        if (kombinasi_design = '') {
            return alert('Kombinasi Design tidak boleh kosong')
        }

        $.ajax({
            type: "post",
            url: "pages/generate_dashboard_cylinder.php",
            data: {
                nomorthbarang: parseInt(<?= $_GET['no'] ?>),
                kode: $('#kombinasi_design').val()
            },
            success: function(response) {
                var data = JSON.parse(response);
                console.log({
                    data
                })

                if (data.message) {
                    return alert(data.message)
                }
            },
            error: function() {
                alert("Pengecekan gagal (Network error)");
            }
        });
    }

    function setProduksi() {
        var extra = parseFloat($('#extra').val());
        var panjang = parseFloat($('#panjang').val());

        var produksi = extra + panjang
        console.log({
            extra,
            panjang,
            produksi
        })
        $('#produksi').val(produksi)
    }


    function checkHeader() {
        var fields = [];
        var check_failed = check_value_elements(fields);
        console.log({
            check_failed
        })
        if (check_failed != '')
            return check_failed;
        else
            return true;
    }

    <?= generate_function_checkgrid($grid_str) ?>
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>

<?php include "x_tab_data_images.php"; ?>