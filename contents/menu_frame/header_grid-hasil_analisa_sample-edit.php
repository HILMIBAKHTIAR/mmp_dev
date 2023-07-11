<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];


$edit["sp_approve"] = "sp_disetujui_thhasilanalisasample";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_thhasilanalisasample";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";

$edit['sp_add'] = "sp_add_thhasilanalisasample";
$edit["sp_add_param"] = array("param_nomormhadmin|0", "param_mode|1");
$edit['sp_edit'] = "sp_add_thhasilanalisasample";
$edit["sp_edit_param"] = array("param_nomormhadmin|0", "param_mode|1");
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_nomormhadmin"] 		= $_SESSION["login"]["nomor"];
$_POST["param_mode"] 				= "";


//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdhasilanalisasample";
$edit["detail"][$i]["field_name"] = array(
    "warna",
    "jumlah",
    "nomormhwarna",
    "nomor",
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------

//------------------------------------------------GRID DATA 2------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdhasilanalisasample_komposisiproses";
$edit["detail"][$i]["field_name"] = array(
    "nomor",
    "komposisi",
    "mikron",
    "grid_ke",
    "nomormhbarang"
    
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "grid_ke = 1";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_komposisiproses";
$i++;

$edit["detail"][$i]["table_name"] = "tdhasilanalisasample_komposisiproses";
$edit["detail"][$i]["field_name"] = array(
    "nomor",
    "komposisi",
    "mikron",
    "grid_ke",
    "nomormhbarang"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "grid_ke = 2";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_komposisiproses2";
$i++;
//------------------------------------------------END GRID DATA 2------------------------------------------------------

// ------------------------------------------------GRID DATA 3------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdhasilanalisasample_komposisiproses";
$edit["detail"][$i]["field_name"] = array(
    "nomor",
    "proses",
    "grid_ke",
    "nomormhproses"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "grid_ke = 3";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_komposisiproses3";
$i++;
// ------------------------------------------------END GRID DATA 3------------------------------------------------------


//------------------------------------------------GRID DATA 3------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdhasilanalisasample_strukturpackaging";
$edit["detail"][$i]["field_name"] = array(
    "struktur_packaging"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_strukturpackaging";
$i++;
//------------------------------------------------END GRID DATA 3------------------------------------------------------





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

// $edit["field"][$i]["label"]                         = "Customer";
// $edit["field"][$i]["label_class"]                     = "req";
// $edit["field"][$i]["input"]                         = "nomormhrelasi";
// $edit["field"][$i]["input_class"]                     = "required";
// $edit["field"][$i]["input_element"]                 = "browse";
// $edit["field"][$i]["browse_setting"]                 = "master_customer";
// $i++;

$edit["field"][$i]["label"]                     = "Permintaan Analisa Sample";
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomortdpermintaananalisasample";
// $edit["field"][$i]["input_class"]                 = "required";  
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "permintaan_analisa_sample";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
// $edit["field"][$i]["browse_set"]["param_output"]     = array(
//     "customer|customer"
// );
$i++;

$edit["field"][$i]["label"]                     = "customer";
$edit["field"][$i]["input"]                        = "customer";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;

$edit["field"][$i]["label"]                 = "Sales";
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhpegawai_sales";
// $edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$edit["field"][$i]["browse_setting"]             = "master_sales";
$i++;



$edit["field"][$i]["label"]                     = "Jenis Packaging";
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhjenispackaging";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
// $edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_jenis_packaging";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$i++;

// $edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "Width";
$edit["field"][$i]["input"]                        = "width";
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input_class"]                        = "iptnumber required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
if ($edit['mode'] == 'add') {
    $edit["field"][$i]["input_value"] = "0";
}
$i++;

$edit["field"][$i]["label"]                     = "Pitch";
$edit["field"][$i]["input"]                        = "pitch";
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input_class"]                        = "iptnumber required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
if ($edit['mode'] == 'add') {
    $edit["field"][$i]["input_value"] = "0";
}
$i++;

// $edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "Length";
$edit["field"][$i]["input"]                        = "length";
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input_class"]                        = "iptnumber required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
if ($edit['mode'] == 'add') {
    $edit["field"][$i]["input_value"] = "0";
}
$i++;
$edit["field"][$i]["label"]                     = "Open Size";
$edit["field"][$i]["input"]                        = "open_size";
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input_class"]                        = "iptnumber required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
if ($edit['mode'] == 'add') {
    $edit["field"][$i]["input_value"] = "0";
}
$i++;
$edit["field"][$i]["label"]                     = "Tahapan Proses";
$edit["field"][$i]["input"]                        = "tahapan_proses";
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
// if ($edit['mode'] == 'add') {
//     $edit["field"][$i]["input_value"] = "0";
// }
$i++;

$edit["field"][$i]["label"] = "Printing";
$edit["field"][$i]["input"] = "printing";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("0|Print", "1|No Print", "2|Surface", "3|Reserve");
$i++;

$edit["field"][$i]["label"]                     = "Total Thickness";
$edit["field"][$i]["input"]                        = "total_thickness";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input_class"]                        = "iptnumber required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
if ($edit['mode'] == 'add') {
    $edit["field"][$i]["input_value"] = "0";
}
$i++;

// $edit["field"][$i]["form_group"] = 0;
// $edit["field"][$i]["form_group_class"] = "yes_section";
// $edit["field"][$i]["label"]                     = "Dimensi";
// $edit["field"][$i]["input"]                        = "dimensi";
// $edit["field"][$i]["input_attr"]["maxlength"]     = "200";
// $i++;

$edit["field"][$i]["form_group_class"] = "no_section";
$edit["field"][$i]["label"]                     = "Dimensi Bag Making";
$edit["field"][$i]["input"]                        = "dimensi_bag_making";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input_class"]                        = "iptnumber required";
if ($edit['mode'] == 'add') {
    $edit["field"][$i]["input_value"] = "0";
}
$i++;

// $edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["form_group_class"] = "no_section";
$edit["field"][$i]["label"]                     = "Dimensi Bottom";
$edit["field"][$i]["input"]                        = "dimensi_bottom";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input_class"]                        = "iptnumber required";
if ($edit['mode'] == 'add') {
    $edit["field"][$i]["input_value"] = "0";
}
$i++;

$edit["field"][$i]["form_group_class"] = "no_section";
$edit["field"][$i]["label"]                     = "Dimensi Gusset";
$edit["field"][$i]["input"]                        = "dimensi_gusset";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input_class"]                        = "iptnumber required";
if ($edit['mode'] == 'add') {
    $edit["field"][$i]["input_value"] = "0";
}
$i++;

// $edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["form_group_class"] = "no_section";
$edit["field"][$i]["label"]                     = "Dimensi Open Size";
$edit["field"][$i]["input"]                        = "dimensi_open_size";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input_class"]                        = "iptnumber required";
if ($edit['mode'] == 'add') {
    $edit["field"][$i]["input_value"] = "0";
}
$i++;

$edit["field"][$i]["form_group_class"]       = "hiding";
$edit["field"][$i]["label"]                     = "Sum Mikron 1";
$edit["field"][$i]["input"]                        = "sum_mikron_1";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input_class"]                        = "iptnumber required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
if ($edit['mode'] == 'add') {
    $edit["field"][$i]["input_value"] = "0";
}
$i++;

$edit["field"][$i]["form_group_class"]       = "hiding";
$edit["field"][$i]["label"]                     = "Sum Mikron 2";
$edit["field"][$i]["input"]                        = "sum_mikron_2";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input_class"]                        = "iptnumber required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
if ($edit['mode'] == 'add') {
    $edit["field"][$i]["input_value"] = "0";
}
$i++;


//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Warna'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Warna',
'Gramasi',
'nomormhwarna'

";
$edit["field"][$i]["grid_set"]["column"] = array(
    "warna",
    "jumlah",
    "nomormhwarna"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    warna:'',
    jumlah:'',
    nomormhwarna:''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'warna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'warna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_warna }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhwarna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhwarna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$i++;

//-----------------------------------------FRONTEND GRID 2--------------------------------
$grid[1] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Komposisi Material 1'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Komposisi',
'Mikron',
'grid ke',
'nomormhbarang'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "komposisi",
    "mikron",
    "grid_ke",
    "nomormhbarang"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    komposisi:'',
    mikron:0,
    grid_ke: 1,
    nomormhbarang: ''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'komposisi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'komposisi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_bahanbakufilm }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'mikron'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'mikron'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'grid_ke'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'grid_ke'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$i++;

$grid[2] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][2]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Komposisi Material 2'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Komposisi',
'Mikron',
'grid ke',
'nomormhbarang'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "komposisi",
    "mikron",
    "grid_ke",
    "nomormhbarang"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    komposisi:'',
    mikron:0,
    grid_ke: 2,
    nomormhbarang: ''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'komposisi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'komposisi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_bahanbakufilm2 }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'mikron'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'mikron'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'grid_ke'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'grid_ke'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$i++;

//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[3] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][3]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Proses'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Proses',
'grid_ke',
'nomormhproses'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "proses",
    "grid_ke",
    "nomormhproses"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    proses:'',
    grid_ke:3,
    nomormhproses:''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'proses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'proses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_proses }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'grid_ke'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'grid_ke'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhproses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhproses'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$i++;

//-----------------------------------------FRONTEND GRID 3--------------------------------
$grid[4] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][4]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Struktur Packaging'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Struktur Packaging'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "struktur_packaging"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    struktur_packaging:''
}";
$edit["field"][$i]["grid_set"]["navgrid"] = 0;
$edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'struktur_packaging'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'struktur_packaging'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;
$i++;

// ================================================================================== UPLOAD ======================================================

// $index = 0;
// if ($edit["mode"] != "add") {

    
// }


// ==================================================================================END UPLOAD ======================================================



if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*,
    CONCAT(b1.customer_analisa) as customer,
    CONCAT(b1.kode,'-',b.produk, '|', b.nomor) AS 'browse|nomortdpermintaananalisasample',
    CONCAT(c.nama, '|', c.nomor) AS 'browse|nomormhjenispackaging',
    CONCAT(d.nama, '|', d.nomor) AS 'browse|nomormhrelasi',
    CONCAT(sales.nama, '|', sales.nomor) AS 'browse|nomormhpegawai_sales'
    FROM thhasilanalisasample a
    JOIN tdpermintaananalisasample b on a.nomortdpermintaananalisasample = b.nomor
    join thpermintaananalisasample b1  on b.nomorthpermintaananalisasample =  b1.nomor
    JOIN mhpegawai sales ON sales.nomor = a.nomormhpegawai_sales
    LEFT JOIN mhjenispackaging c on c.nomor = a.nomormhjenispackaging
    left join mhrelasi d on d.nomor = a.nomormhrelasi
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
    a.*,
    a.grid_ke as grid_ke
	FROM " . $edit["detail"][1]["table_name"] . " a
    where a.status_aktif > 0 and grid_ke = 1
	AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];

    $edit["field"][$grid[2]]["grid_set"]["query"] = "
	SELECT
    a.*,
    a.grid_ke as grid_ke
	FROM " . $edit["detail"][2]["table_name"] . " a
    where a.status_aktif > 0 and grid_ke = 2
	AND a." . $edit["detail"][2]["foreign_key"] . " = " . $_GET["no"];

    $edit["field"][$grid[3]]["grid_set"]["query"] = "
	SELECT
    a.*,
    a.grid_ke as grid_ke
	FROM " . $edit["detail"][3]["table_name"] . " a
    where a.status_aktif > 0 and grid_ke = 3
	AND a." . $edit["detail"][3]["foreign_key"] . " = " . $_GET["no"];

    $edit["field"][$grid[4]]["grid_set"]["query"] = "
	SELECT
    a.*
	FROM " . $edit["detail"][4]["table_name"] . " a
    where a.status_aktif > 0
	AND a." . $edit["detail"][4]["foreign_key"] . " = " . $_GET["no"];



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
$features = "save|back|reload" . check_approval($r, "edit|approve|disappr");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);


// if ($edit["mode"] != "add") {
//     $edit_navbutton["field"][$i]["input_element"]             = "a";
//     $edit_navbutton["field"][$i]["input_float"]               = "right";
//     $edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
//     $edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
//     $edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
//     $edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
//     $edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
//         "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=HASIL_ANALISA_SAMPEL&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
//     $i++;
// }


?>

<script type="text/javascript">
    $(document).ready(function() {

        hide_and_show()
        $("#tabimages").prependTo("#tab_i1_data");
    });

    function setFile(directory) {
        $("#directory").val(directory);
        $("#itemspec").val(1);
    }

    function hide_and_show() {
			console.log('hide_and_show')
			var jenispackaging = $('#browse_master_jenis_packaging_search').val();

            // alert(jenispackaging == 'Roll')

			if (jenispackaging == 'Roll') {
				$('.no_section').hide();
				$('.no_section').hide();
				$('.no_section').hide();
				$('.no_section').hide();
			} else {
                $('.yes_section').hide();
                $('.no_section').show();
                $('.no_section').show();
                $('.no_section').show();
                $('.no_section').show();
			}
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

<?php

$file_nomor = $r["nomortdpermintaananalisasample"];

$file_tabel = 'tdpermintaananalisasample';
$file_query = mysqli_query($con, " 
	SELECT * 
	FROM mharchievedfiles 
	WHERE 
		status_aktif > 0 AND 
		kategori = 'PERMINTAAN_ANALISA_SAMPEL' AND 
		file_tabel = '$file_tabel' AND 
		file_nomor = $file_nomor
    
    UNION ALL

    SELECT
        a.* 
    FROM
        mharchievedfiles a
        JOIN thlayoutsample b ON b.nomor = a.file_nomor AND a.file_tabel = 'thlayoutsample' and b.status_aktif = 1
        JOIN tdpermintaananalisasample d ON d.nomor = b.nomortdpermintaananalisasample AND d.status_aktif = 1
    WHERE
        a.status_aktif > 0 
        AND a.kategori = 'LAYOUT_SAMPLE' 
        AND a.file_tabel = 'thlayoutsample' 
        AND b.nomortdpermintaananalisasample = $file_nomor AND b.status_disetujui = 1
");

$file_count = mysqli_num_rows($file_query);

$arr_images = array();

if ($file_count > 0) {
    $count_i = 0;
    while ($row = mysqli_fetch_assoc($file_query)) {
        $json[] = $row;
        array_push($arr_images, $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$count_i]["kategori"] . "/" . rawurlencode($json[$count_i]["nama"])));
        $count_i++;
    }
} 

include "x_tab_data_images.php";


// $file_query_dari_layout = mysqli_query($con, "
//     SELECT
//         a.* 
//     FROM
//         mharchievedfiles a
//         JOIN thlayoutsample b ON b.nomor = a.file_nomor AND a.file_tabel = 'thlayoutsample' and b.status_aktif = 1
//         JOIN tdpermintaananalisasample d ON d.nomor = b.nomortdpermintaananalisasample AND d.status_aktif = 1
//     WHERE
//         a.status_aktif > 0 
//         AND a.kategori = 'LAYOUT_SAMPLE' 
//         AND a.file_tabel = 'thlayoutsample' 
//         AND b.nomortdpermintaananalisasample = $file_nomor AND b.status_disetujui = 1
// ");

// $file_count2 = mysqli_num_rows($file_query_dari_layout);

// $arr_images = array();

// if ($file_count > 0) {
//     $count_i = 0;
//     while ($row = mysqli_fetch_assoc($file_query_dari_layout)) {
//         $json[] = $row;
//         array_push($arr_images, $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "LAYOUT_SAMPLE" . "/" . rawurlencode($json[$count_i]["nama"])));
//         $count_i++;
//     }
// }

// include "x_tab_data_images_2.php";



?>