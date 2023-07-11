<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];




//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdqapprinting_sdb";
$edit["detail"][$i]["field_name"] = array(
    "tinggi",
    "sudut",
    "derajat"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------



//------------------------------------------------GRID DATA 2------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdqapprinting_heater";
$edit["detail"][$i]["field_name"] = array(
    "jam",
    "tahap_1",
    "tahap_2",
    "tahap_3",
    "tahap_4",
    "tahap_5",
    "tahap_6",
    "tahap_7",
    "tahap_8"

);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_heater";
$i++;
//------------------------------------------------END GRID DATA 2------------------------------------------------------

//------------------------------------------------GRID DATA 3------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdqapprinting_tekanan";
$edit["detail"][$i]["field_name"] = array(
    "tahap_1",
    "tahap_2",
    "tahap_3",
    "tahap_4",
    "tahap_5",
    "tahap_6",
    "tahap_7",
    "tahap_8"

);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_tekanan";
$i++;
//------------------------------------------------END GRID DATA 3------------------------------------------------------

//------------------------------------------------GRID DATA 4------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdqapprinting_kroscek";
$edit["detail"][$i]["field_name"] = array(
    "jam",
    "no_roll",
    "pas_warna_bawah",
    "pas_warna_sesuai",
    "pas_warna_atas",
    "jumlah",
    "pitch_panjang",
    "pitch_lebar",
    "reject_garis",
    "reject_bercak",
    "reject_lainya",
    "ket_reject"

);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_kroscek";
$i++;
//------------------------------------------------END GRID DATA 4------------------------------------------------------

//------------------------------------------------GRID DATA 4------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdqapprinting_jenistinta";
$edit["detail"][$i]["field_name"] = array(
    "jenis_tinta",
    "tambahan_1",
    "qty_1",
    "tambahan_2",
    "qty_2",
    "tambahan_3",
    "qty_3",
    "tambahan_4",
    "qty_4",
    "visco"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_jenistinta";
$i++;
//------------------------------------------------END GRID DATA 4------------------------------------------------------


$i = 0;

if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "upload|Upload", "info|Info");
} else {
    if (isset($_GET["no"])) {
        $edit["field"][$i]["box_tabs"] = array("data|Data", "upload|Upload");
    } else {
        $edit["field"][$i]["box_tabs"] = array("data|Data");
    }
}



$edit["field"][$i]["box_tab"] = "data";


$edit["field"][$i]["label"]                         = "Kode";
$edit["field"][$i]["input"]                         = "kode";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"]                 = formatting_code($con, $edit["string_code"]);
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]       = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

$edit["field"][$i]["label"]                     = "shift";
$edit["field"][$i]["input"]                        = "shift";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "No. SPK";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomorthspk";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "spk_hasilprinting";
$edit["field"][$i]["browse_set"]["param_output"] = array(
    "customer|browse_master_customer_search",
    "nomormhrelasi|browse_master_customer_hidden",
    "nama|nama_produk",
    "jenis|jenis_solvent",
    "komposisi|komposisi_bahan",
    "lebar|lebar_bahan"
);
$i++;

$edit["field"][$i]["label"]                     = "Nama Produk";
$edit["field"][$i]["input"]                        = "nama_produk";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Customer";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhrelasi";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_customer";
$i++;

$edit["field"][$i]["label"]                     = "Jenis Solvent";
$edit["field"][$i]["input"]                        = "jenis_solvent";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "komposisi bahan";
$edit["field"][$i]["input"]                        = "komposisi_bahan";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Order Jumlah";
$edit["field"][$i]["input"]                        = "order_jumlah";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Lebar Bahan";
$edit["field"][$i]["input"]                        = "lebar_bahan";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Jumlah Baris";
$edit["field"][$i]["input"]                        = "jumlah_baris";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Jumlah Warna";
$edit["field"][$i]["input"]                        = "jumlah_warna";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Kecepatan Mesin";
$edit["field"][$i]["input"]                        = "kecepatan_mesin";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Arah Gulungan";
$edit["field"][$i]["input"]                        = "arah_gulungan";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

// $edit["field"][$i]["label"]       = "Tanggal Kedatangan";
// $edit["field"][$i]["label_class"] = "req";
// $edit["field"][$i]["input"]       = "tanggal_kedatangan";
// $edit["field"][$i]["input_class"] = "required";
// $edit["field"][$i]["input_class"] = "required date_1";
// $i++;


// $edit["field"][$i]["label"]       = "Tanggal Pengecekan";
// $edit["field"][$i]["label_class"] = "req";
// $edit["field"][$i]["input"]       = "tanggal_pengecekan";
// $edit["field"][$i]["input_class"] = "required";
// $edit["field"][$i]["input_class"] = "required date_1";
// $i++;


//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Settingan Doctor Blade'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Tinggi',
'Sudut (<)',
'Derajat'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "tinggi",
    "sudut",
    "derajat"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    tinggi:'',
    sudut:'',
    derajat:''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tinggi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tinggi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sudut'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sudut'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'derajat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'derajat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$i++;
// ---------------------------------------END FRONT GRID 1-------------------------------------------------

//-----------------------------------------FRONTEND GRID 2--------------------------------
$grid[1] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Heater'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Jam',
'1',
'2',
'3',
'4',
'5',
'6',
'7',
'8'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "jam",
    "tahap_1",
    "tahap_2",
    "tahap_3",
    "tahap_4",
    "tahap_5",
    "tahap_6",
    "tahap_7",
    "tahap_8"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    jam:'',
    tahap_1:'',
    tahap_2:'',
    tahap_3:'',
    tahap_4:'',
    tahap_5:'',
    tahap_6:'',
    tahap_7:'',
    tahap_8:''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jam'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jam'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_jqtime_1";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tahap_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tahap_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tahap_2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tahap_2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tahap_3'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tahap_3'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tahap_4'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tahap_4'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tahap_5'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tahap_5'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tahap_6'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tahap_6'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tahap_7'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tahap_7'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tahap_8'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tahap_8'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$i++;
// ---------------------------------------END FRONT GRID 2-------------------------------------------------

//-----------------------------------------FRONTEND GRID 3--------------------------------
$grid[2] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][2]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Tekanan'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'1',
'2',
'3',
'4',
'5',
'6',
'7',
'8'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "tahap_1",
    "tahap_2",
    "tahap_3",
    "tahap_4",
    "tahap_5",
    "tahap_6",
    "tahap_7",
    "tahap_8"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    tahap_1:'',
    tahap_2:'',
    tahap_3:'',
    tahap_4:'',
    tahap_5:'',
    tahap_6:'',
    tahap_7:'',
    tahap_8:''
}";


$j = 0;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tahap_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tahap_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tahap_2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tahap_2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tahap_3'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tahap_3'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tahap_4'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tahap_4'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tahap_5'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tahap_5'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tahap_6'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tahap_6'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tahap_7'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tahap_7'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tahap_8'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tahap_8'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$i++;
// ---------------------------------------END FRONT GRID 3-------------------------------------------------

//-----------------------------------------FRONTEND GRID 4--------------------------------
$grid[3] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][3]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "''";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Jam',
'No. Roll',
'Bawah',
'Sesuai',
'Atas',
'Jumlah(Meter)',
'Panjang',
'Lebar',
'Garis',
'Bercak Tinta',
'Tinta',
'Penyebab / Keterangan Reject'

";
$edit["field"][$i]["grid_set"]["column"] = array(
    "jam",
    "no_roll",
    "pas_warna_bawah",
    "pas_warna_sesuai",
    "pas_warna_atas",
    "jumlah",
    "pitch_panjang",
    "pitch_lebar",
    "reject_garis",
    "reject_bercak",
    "reject_lainya",
    "ket_reject"
);

$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    jam:'',
    no_roll:'',
    pas_warna_bawah:'',
    pas_warna_sesuai:'',
    pas_warna_atas:'',
    jumlah:'',
    pitch_panjang:'',
    pitch_lebar:'',
    reject_garis:'',
    reject_bercak:'',
    reject_lainya:'',
    pitch_lebar:''
}";


// $edit["field"][$i]["grid_set"]["navgrid"] = 0;
// $edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jam'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jam'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_jqtime_1";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'no_roll'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'no_roll'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pas_warna_bawah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pas_warna_bawah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pas_warna_sesuai'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pas_warna_sesuai'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pas_warna_atas'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pas_warna_atas'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pitch_panjang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pitch_panjang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pitch_lebar'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pitch_lebar'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'reject_garis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'reject_garis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'reject_bercak'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'reject_bercak'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'reject_lainya'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'reject_lainya'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'ket_reject'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'ket_reject'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$row                                                                                         = 0;
$k                                                                                                = 0;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'pas_warna_bawah'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "3";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Kesesuaian Warna (Standar)'";
$k++;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'pitch_panjang'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "2";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Pitch'";
$k++;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'reject_garis'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "3";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Item Reject'";
$k++;

$row++;

$i++;


// ---------------------------------------END FRONT GRID 4-------------------------------------------------

//-----------------------------------------FRONTEND GRID 5--------------------------------
$grid[4] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][4]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Jenis Tinta'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Jenis Tinta',
'Tambahan 1',
'Qty',
'Tambahan 2',
'Qty',
'Tambahan 3',
'Qty',
'Tambahan_4',
'Qty',
'visco'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "jenis_tinta",
    "tambahan_1",
    "qty_1",
    "tambahan_2",
    "qty_2",
    "tambahan_3",
    "qty_3",
    "tambahan_4",
    "qty_4",
    "visco",
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    jenis_tinta:'',
    tambahan_1:'',
    qty_1:'',
    tambahan_2:'',
    qty_2:'',
    tambahan_3:'',
    qty_3:'',
    tambahan_4:'',
    qty_4:'',
    visco:'',
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jenis_tinta'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jenis_tinta'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tambahan_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tambahan_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'qty_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'qty_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tambahan_2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tambahan_2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'qty_2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'qty_2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tambahan_3'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tambahan_3'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'qty_3'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'qty_3'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tambahan_4'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tambahan_4'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'qty_4'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'qty_4'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'visco'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'visco'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;


$i++;
// ---------------------------------------END FRONT GRID 5-------------------------------------------------






if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*
    , DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal
    , CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhrelasi'
    , CONCAT(c.kode, '|', c.nomor) AS 'browse|nomorthspk'
    FROM thqapprinting a
    left join mhrelasi b on b.nomor = a.nomormhrelasi
    left join thspk c on a.nomorthspk = c.nomor
    WHERE a.status_aktif = 1 and a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    $edit["field"][$grid[0]]["grid_set"]["query"] = "
    SELECT
    a.*
    FROM " . $edit["detail"][0]["table_name"] . " a
    WHERE a.status_aktif = 1 and a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];

    $edit["field"][$grid[1]]["grid_set"]["query"] = "
    SELECT
    a.*
    FROM " . $edit["detail"][1]["table_name"] . " a
    WHERE a.status_aktif = 1 and a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];


    $edit["field"][$grid[2]]["grid_set"]["query"] = "
    SELECT
    a.*
    FROM " . $edit["detail"][2]["table_name"] . " a
    WHERE a.status_aktif = 1 and a." . $edit["detail"][2]["foreign_key"] . " = " . $_GET["no"];

    $edit["field"][$grid[3]]["grid_set"]["query"] = "
    SELECT
    a.*
    FROM " . $edit["detail"][3]["table_name"] . " a
    WHERE a.status_aktif = 1 and a." . $edit["detail"][3]["foreign_key"] . " = " . $_GET["no"];

    $edit["field"][$grid[4]]["grid_set"]["query"] = "
    SELECT
    a.*
    FROM " . $edit["detail"][4]["table_name"] . " a
    WHERE a.status_aktif = 1 and a." . $edit["detail"][4]["foreign_key"] . " = " . $_GET["no"];

    echo $edit["field"][$grid[4]]["grid_set"]["query"];

    $edit = fill_value($edit, $r);
}



$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$edit_navbutton = generate_navbutton($edit_navbutton);
if ($edit["mode"] != "add") {
    $edit_navbutton["field"][$i]["input_element"]             = "a";
    $edit_navbutton["field"][$i]["input_float"]               = "right";
    $edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
    $edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
    $edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
    $edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
    $edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
        "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=SALES_ORDER&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
    $i++;
}

?>

<script type="text/javascript">
    // setTimeout(function() {
    //     load_grid_detail();
    // }, 100);


    $(document).ready(function() {

    });


    function load_grid_detail() {

        var pages = 'pages/grid_load.php?id=laporan_pemeriksaan_hasil_printing_detail_visual-load';
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