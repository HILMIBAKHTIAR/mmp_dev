<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];

if ($edit["mode"] == "add") {
    $r = mysqli_fetch_array(mysqli_query($con, "
	SELECT
	CONCAT(kode,' - ',nama,'|',nomor) AS 'browse|nomormhsatuanspk'
	FROM mhsatuan WHERE kode = 'ROLL'"));
}

//------------------------------------------------GRID DATA PRINTING------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdspk_printingwarna";
$edit["detail"][$i]["field_name"] = array(
    "warna_cylinder",
    "serial_number",
    "nomorthbarang",
    "nomor"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_spkprinting_warna";
$i++;

$edit["detail"][$i]["table_name"] = "tdspk_bahan";
$edit["detail"][$i]["field_name"] = array(
    "kode",
    "bahan",
    "qty",
    "meter",
    "nomormhbarang",
    "nomormdbarangbom",
    "nomor",
    "is_bahan"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "is_bahan = 1";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_spkprinting_bahan";
$i++;
//------------------------------------------------END GRID DATA PRINTING------------------------------------------------------

//------------------------------------------------GRID DATA Extrusi------------------------------------------------------

$edit["detail"][$i]["table_name"] = "tdspk_bahan";
$edit["detail"][$i]["field_name"] = array(
    "kode",
    "bahan",
    "qty",
    "meter",
    "nomormhbarang",
    "nomormdbarangbom",
    "nomor",
    "is_bahan"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "is_bahan = 2";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_spkextrusi_bahan";
$i++;
//------------------------------------------------END GRID DATA EXTRUSI------------------------------------------------------

//------------------------------------------------GRID DATA DRY------------------------------------------------------

$edit["detail"][$i]["table_name"] = "tdspk_bahan";
$edit["detail"][$i]["field_name"] = array(
    "kode",
    "bahan",
    "qty",
    "meter",
    "nomormhbarang",
    "nomormdbarangbom",
    "nomor",
    "is_bahan"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "is_bahan = 3";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_spkdry_bahan";
$i++;
//------------------------------------------------END GRID DATA DRY------------------------------------------------------

$i = 0;

if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "printing|Printing", "extrusi|Extrusi", "dry|Dry Laminasi", "sliting|Sliting", "info|info");
} else {
    if (isset($_GET["no"])) {
        $edit["field"][$i]["box_tabs"] = array("data|Data", "printing|Printing", "extrusi|Extrusi", "dry|Dry Laminasi", "sliting|Sliting", "info|info");
    } else {
        $edit["field"][$i]["box_tabs"] = array("data|Data", "printing|Printing", "extrusi|Extrusi", "dry|Dry Laminasi", "sliting|Sliting", "info|info");
    }
}


$edit["field"][$i]["box_tab"] = "data";

$edit["field"][$i]["label"]                         = "Kode";
$edit["field"][$i]["input"]                         = "kode";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"]                 = formatting_code($con, $edit["string_code"]);
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "order";
$edit["field"][$i]["input"]                        = "order";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("0|ULANGAN", "1|BARU");
$i++;

$edit["field"][$i]["label"]                     = "Satuan";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhsatuanspk";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_satuan";
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "No PO";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomortdjualorder";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "sales_order_spk";
$edit["field"][$i]["browse_set"]["param_output"]             =
    [
        "customer|customer",
        "nama_barang|nama",
        "komposisi|komposisi",
        "ukuran_barang_jadi|ukuran_barang_jadi",
        "kode_custom|kode_barang",
        "brg_id|id_barang",
        "quantity|qty_spk",
        "no_md|no_md",
        "no_md_printing|no_md_printing",
        "satuanproduk|produk",
        "total_micron|total_micron",
        "eye_mark|eye_mark",
        "sisi_cetak|sisi_cetak",
        "arah_baca|arah_baca",
        "ukuran_sliting|ukuran_sliting",
        "arah_baca_sliting|arah_baca_sliting",
        "eye_mark_sliting|eye_mark_sliting",
        "qty_sliting|qty_sliting",
        "proses_spk|proses_spk",
        "baris|baris"
    ];
$edit["field"][$i]["browse_set"]["call_function"] =
    [
        "load_grid_detail(),
        load_grid_detail2(),
        load_grid_detail3(),
        load_grid_detail4()
        "
    ];
if ($edit['mode'] == 'edit') {
    $edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
}
$i++;


$edit["field"][$i]["label"]                     = "Qty";
$edit["field"][$i]["input"]                        = "qty_spk";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "Nama Barang";
$edit["field"][$i]["input"]                        = "nama";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;

$edit["field"][$i]["label"]       = "Terbit";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggalterbit";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "Komposisi";
$edit["field"][$i]["input"]                        = "komposisi";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]       = "produksi";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggalproduksi";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"]                 = '00/00/0000';
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "ukuran barang jadi";
$edit["field"][$i]["input"]                        = "ukuran_barang_jadi";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]       = "Selesai";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggalselesai";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "Customer";
$edit["field"][$i]["input"]                        = "customer";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "kode barang";
$edit["field"][$i]["input"]                        = "kode_barang";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "produk";
$edit["field"][$i]["input"]                        = "produk";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;

$edit["field"][$i]["label"]                     = "BRG ID";
$edit["field"][$i]["input"]                        = "id_barang";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "Total Micron";
$edit["field"][$i]["input"]                        = "total_micron";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;

$edit["field"][$i]["label"]                     = "No Inspect";
$edit["field"][$i]["input"]                        = "no_inspect";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "Tahapan Proses";
$edit["field"][$i]["input"]                        = "proses_spk";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;

$edit["field"][$i]["label"]                     = "No MD";
$edit["field"][$i]["input"]                        = "no_md";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;

//-------------------------PRINTING-----------------------------------//
$edit["field"][$i]["box_tab"] = "printing";

$edit["field"][$i]["label"]                         = "Arah Baca";
$edit["field"][$i]["input"]                         = "arah_baca";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$edit["field"][$i]["input_option"]                     = array("KEPALA|KEPALA", "EKOR|EKOR", "KOSONG|KOSONG");
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                         = "Eye Mark";
$edit["field"][$i]["input"]                         = "eye_mark";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$edit["field"][$i]["input_option"]                     = array("KIRI|KIRI", "KANAN|KANAN", "KEDUA|KEDUA");
$i++;

$edit["field"][$i]["label"]                         = "Sisi Cetak";
$edit["field"][$i]["input"]                         = "sisi_cetak";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$edit["field"][$i]["input_option"]                     = array("SURFACE|SURFACE(CETAK LUAR)", "RESERVE|RESERVE(CETAK DALAM)");
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "No MD";
$edit["field"][$i]["input"]                        = "no_md_printing";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;


$grid[0] = $i;
$edit["field"][$i]["input_element"]                  = "grid";
$edit["field"][$i]["grid_set"]                       = $edit_grid;
$edit["field"][$i]["grid_set"]["id"]                 = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"]  = "'List Warna Printing'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
	'warna cylinder',
	'serial number',
    'nomorthbarang',
    'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "warna_cylinder",
    "serial_number",
    "nomorthbarang",
    "nomor"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
	warna_cylinder 		:'',
	serial_number 		:'',
	nomorthbarang 		:'',
	nomor 			:''
}";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[ '' ]";
$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'warna_cylinder'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'warna_cylinder'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'serial_number'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'serial_number'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomorthbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomorthbarang'";
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
// END GRID

$grid[1] = $i;
$edit["field"][$i]["input_element"]                  = "grid";
$edit["field"][$i]["grid_set"]                       = $edit_grid;
$edit["field"][$i]["grid_set"]["id"]                 = $edit["detail"][1]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"]  = "'List Bahan bom printing'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'kode',
'Bahan Printing',
'Qty',
'Meter',
'nomormhbarang', 
'nomormdbarangbom',
'is_bahan',
'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "kode",
    "bahan",
    "qty",
    "meter",
    "nomormhbarang",
    "nomormdbarangbom",
    "is_bahan",
    "nomor"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{
    is_bahan 			:'1'
 }";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[ 'bahan', 'kode' ]";
$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'bahan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'bahan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'qty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'qty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'meter'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'meter'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomormdbarangbom'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomormdbarangbom'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'is_bahan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'is_bahan'";
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
// END GRID

$edit["field"][$i]["label"]              = "Catatan Printing";
$edit["field"][$i]["label_col"] = "col-sm-12";
$edit["field"][$i]["label_attr"]["style"] = "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"] = "catatan_printing";
$edit["field"][$i]["input_class"] = "";
$edit["field"][$i]["input_col"] = "col-sm-6";
$edit["field"][$i]["input_element"] = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "5";
$edit["field"][$i]["input_attr"]["cols"] = "70";
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]              = "Catatan PPIC";
$edit["field"][$i]["label_col"] = "col-sm-12";
$edit["field"][$i]["label_attr"]["style"] = "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"] = "catatan_printing_ppic";
$edit["field"][$i]["input_class"] = "";
$edit["field"][$i]["input_col"] = "col-sm-6";
$edit["field"][$i]["input_element"] = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "5";
$edit["field"][$i]["input_attr"]["cols"] = "70";
$i++;




//-------------------------EXTRUSI-----------------------------------//
$edit["field"][$i]["box_tab"] = "extrusi";

$edit["field"][$i]["label"]              = "Catatan Laminasi";
$edit["field"][$i]["label_col"] = "col-sm-12";
$edit["field"][$i]["label_attr"]["style"] = "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"] = "catatan_laminasi_extrusi";
$edit["field"][$i]["input_class"] = "";
$edit["field"][$i]["input_col"] = "col-sm-12";
$edit["field"][$i]["input_element"] = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "5";
$edit["field"][$i]["input_attr"]["cols"] = "70";
$i++;

$grid[2] = $i;
$edit["field"][$i]["input_element"]                  = "grid";
$edit["field"][$i]["grid_set"]                       = $edit_grid;
$edit["field"][$i]["grid_set"]["id"]                 = $edit["detail"][2]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"]  = "'List Bahan bom extrusi'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
        'kode',
        'Bahan Printing',
        'Qty',
        'Meter',
        'nomormhbarang',
        'nomormdbarangbom',
        'is_bahan',
        'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "kode",
    "bahan",
    "qty",
    "meter",
    "nomormhbarang",
    "nomormdbarangbom",
    "is_bahan",
    "nomor"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
	is_bahan 		:'2'
}";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[ 'bahan', 'kode' ]";
$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'bahan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'bahan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'qty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'qty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'meter'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'meter'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomormdbarangbom'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomormdbarangbom'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'is_bahan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'is_bahan'";
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
// END GRID



//-------------------------DRY-----------------------------------//

$edit["field"][$i]["box_tab"] = "dry";


$grid[3] = $i;
$edit["field"][$i]["input_element"]                  = "grid";
$edit["field"][$i]["grid_set"]                       = $edit_grid;
$edit["field"][$i]["grid_set"]["id"]                 = $edit["detail"][3]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"]  = "'List Bahan bom dry'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
        'kode',
        'Bahan Printing',
        'Qty',
        'Meter',
        'nomormhbarang',
        'nomormdbarangbom',
        'is_bahan',
        'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "kode",
    "bahan",
    "qty",
    "meter",
    "nomormhbarang",
    "nomormdbarangbom",
    "is_bahan",
    "nomor"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
	is_bahan 		:'3'
}";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[ 'bahan', 'kode' ]";
$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'bahan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'bahan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'qty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'qty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'meter'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'meter'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomormdbarangbom'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomormdbarangbom'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'is_bahan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'is_bahan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;
$i++;
// END GRID

$edit["field"][$i]["label"]              = "Catatan Laminasi";
$edit["field"][$i]["label_col"] = "col-sm-12";
$edit["field"][$i]["label_attr"]["style"] = "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"] = "catatan_laminasi_dry";
$edit["field"][$i]["input_class"] = "";
$edit["field"][$i]["input_col"] = "col-sm-12";
$edit["field"][$i]["input_element"] = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "5";
$edit["field"][$i]["input_attr"]["cols"] = "70";
$i++;

//-------------------------SLITING-----------------------------------//

$edit["field"][$i]["box_tab"] = "sliting";

$edit["field"][$i]["label"]                     = "ukuran sliting";
$edit["field"][$i]["input"]                        = "ukuran_sliting";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;

$edit["field"][$i]["label"]                     = "paper core";
$edit["field"][$i]["input"]                        = "paper_core_sliting";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "baris";
$edit["field"][$i]["input"]                        = "baris";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;

$edit["field"][$i]["label"]                     = "qty";
$edit["field"][$i]["input"]                        = "qty_sliting";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;

$edit["field"][$i]["label"]                         = "Arah Baca";
$edit["field"][$i]["input"]                         = "arah_baca_sliting";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$edit["field"][$i]["input_option"]                     = array("KEPALA|KEPALA", "EKOR|EKOR", "KOSONG|KOSONG");
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                         = "Eye Mark";
$edit["field"][$i]["input"]                         = "eye_mark_sliting";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$edit["field"][$i]["input_option"]                     = array("KIRI|KIRI", "KANAN|KANAN", "KEDUA|KEDUA");
$i++;

$edit["field"][$i]["label"]              = "Catatan Packing Customer";
$edit["field"][$i]["label_col"] = "col-sm-12";
$edit["field"][$i]["label_attr"]["style"] = "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"] = "catatan_packing_customer";
$edit["field"][$i]["input_class"] = "";
$edit["field"][$i]["input_col"] = "col-sm-12";
$edit["field"][$i]["input_element"] = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "5";
$edit["field"][$i]["input_attr"]["cols"] = "70";
$i++;
$edit["field"][$i]["label"]              = "Catatan";
$edit["field"][$i]["label_col"] = "col-sm-12";
$edit["field"][$i]["label_attr"]["style"] = "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"] = "catatan_sliting";
$edit["field"][$i]["input_class"] = "";
$edit["field"][$i]["input_col"] = "col-sm-12";
$edit["field"][$i]["input_element"] = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "5";
$edit["field"][$i]["input_attr"]["cols"] = "70";
$i++;




if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*,
    CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhsatuanspk',
    CONCAT(c1.kode,'-',c2.nama_barang_customer, '|', c.nomor) AS 'browse|nomortdjualorder',
    DATE_FORMAT(a.tanggalproduksi,'" . $_SESSION["setting"]["date_sql"] . "') as tanggalproduksi,
    DATE_FORMAT(a.tanggalterbit,'" . $_SESSION["setting"]["date_sql"] . "') as tanggalterbit,
    DATE_FORMAT(a.tanggalselesai,'" . $_SESSION["setting"]["date_sql"] . "') as tanggalselesai
    FROM thspkmmp a
    join mhsatuan b on a.nomormhsatuanspk = b.nomor
    join tdjualorder c on a.nomortdjualorder = c.nomor and c.status_aktif
    join thjualorder c1 on c.nomorthjualorder = c1.nomor and c1.status_aktif
    join thbarang c2 on c.nomorthbarang = c2.nomor and c2.status_aktif
    WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));



    //query grid detail 1
    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*
	FROM " . $edit["detail"][0]["table_name"] . " a
    where a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];

    $edit["field"][$grid[1]]["grid_set"]["query"] = "
	SELECT
    a.*
	FROM " . $edit["detail"][1]["table_name"] . " a
    where a.status_aktif > 0
    and a.is_bahan = 1
	AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];

    $edit["field"][$grid[2]]["grid_set"]["query"] = "
	SELECT
    a.*
	FROM " . $edit["detail"][2]["table_name"] . " a
    where a.status_aktif > 0
    and a.is_bahan = 2
	AND a." . $edit["detail"][2]["foreign_key"] . " = " . $_GET["no"];

    $edit["field"][$grid[3]]["grid_set"]["query"] = "
	SELECT
    a.*
	FROM " . $edit["detail"][3]["table_name"] . " a
    where a.status_aktif > 0
    and a.is_bahan = 3
	AND a." . $edit["detail"][3]["foreign_key"] . " = " . $_GET["no"];

    $edit = fill_value($edit, $r);
}

if ($edit["mode"] == "add") {
    $edit  = fill_value($edit, $r);
}
// $edit = generate_info($edit, $r);
$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$features = "save|back|reload|add" . check_approval($r, "edit|delete|approve|disappr");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);
?>

<script type="text/javascript">
    $(document).ready(function() {
        // get_nomormhusaha();
        // myFunction();
    });

    function load_grid_detail() {
        // var no = $('#browse_hasil_analisa_sample_hidden').val();
        var no = $('#id_barang').val();
        var pages = 'pages/grid_load.php?id=spk_detail_spkprinting_warna-load&no=' + no + '';
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

    function load_grid_detail2() {
        // var no = $('#browse_hasil_analisa_sample_hidden').val();
        var no = $('#id_barang').val();
        var pages = 'pages/grid_load.php?id=spk_detail_spkprinting_bahan-load&no=' + no + '';
        jQuery(<?= $grid_elm[1] ?>).jqGrid('setGridParam', {
            url: pages,
            datatype: 'json',
            loadComplete: function(data) {
                <?= $grid_str[1] ?>_load = 1;
                actGridComplete_<?= $grid_str[1] ?>();
            }
        });
        jQuery(<?= $grid_elm[1] ?>).trigger('reloadGrid');
    }

    function load_grid_detail3() {
        // var no = $('#browse_hasil_analisa_sample_hidden').val();
        var no = $('#id_barang').val();
        var pages = 'pages/grid_load.php?id=spk_detail_spkextrusi_bahan-load&no=' + no + '';
        jQuery(<?= $grid_elm[2] ?>).jqGrid('setGridParam', {
            url: pages,
            datatype: 'json',
            loadComplete: function(data) {
                <?= $grid_str[2] ?>_load = 2;
                actGridComplete_<?= $grid_str[2] ?>();
            }
        });
        jQuery(<?= $grid_elm[2] ?>).trigger('reloadGrid');
    }

    function load_grid_detail4() {
        // var no = $('#browse_hasil_analisa_sample_hidden').val();
        var no = $('#id_barang').val();
        var pages = 'pages/grid_load.php?id=spk_detail_spkdry_bahan-load&no=' + no + '';
        jQuery(<?= $grid_elm[3] ?>).jqGrid('setGridParam', {
            url: pages,
            datatype: 'json',
            loadComplete: function(data) {
                <?= $grid_str[3] ?>_load = 3;
                actGridComplete_<?= $grid_str[3] ?>();
            }
        });
        jQuery(<?= $grid_elm[3] ?>).trigger('reloadGrid');
    }

    function checkHeader() {
        var fields = [];
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