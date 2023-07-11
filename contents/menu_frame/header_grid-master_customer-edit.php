<?php
$edit["debug"]                 = 0;
// $edit["uppercase"]             = 1;
$edit["unique"]             = array("kode");
$edit["string_code"]         = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];

if ($edit["mode"] != "add") {
    $edit["query"] = "
	SELECT a.*,
    CONCAT(' ', x.termin, '|', x.nomor) AS 'browse|nomormdtoptermin',
    CONCAT(' ', y.dp, '|', y.nomor) AS 'browse|nomormdtopdp',
    CONCAT(' ', b.nama, '|', b.nomor) AS 'browse|nomormhgelar',
    CONCAT(' ', c.nama, '|', c.nomor) AS 'browse|nomormhtop',
    CONCAT(' ', d.nama, '|', d.nomor) AS 'browse|nomormhvaluta',
    CONCAT(' ', sales.nama, '|', sales.nomor) AS 'browse|nomormhpegawai_sales',
    CONCAT(' ', e.nama, '|', e.nomor) AS 'browse|nomormhrelasikategori',
    CONCAT(' ', f.nama, '|', f.nomor) AS 'browse|nomormhkabupaten'
	FROM " . $edit["table"] . " a
    LEFT JOIN mhgelar b on a.nomormhgelar = b.nomor
    LEFT JOIN mhtop c on a.nomormhtop = c.nomor
    LEFT JOIN mdtoptermin x on x.nomor = a.nomormdtoptermin
    LEFT JOIN mdtopdp y on y.nomor = a.nomormdtopdp
    LEFT JOIN mhvaluta d on a.nomormhvaluta = d.nomor
    LEFT JOIN mhrelasikategori e on a.nomormhrelasikategori = e.nomor
    LEFT JOIN mhpegawai sales ON sales.nomor = a.nomormhpegawai_sales
    left JOIN mhkabupaten f on a.nomormhkabupaten = f.nomor
	WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));
}


//PEMBUATAN GRID DATA detail alamat kantor
$i = 0;
$edit["detail"][$i]["table_name"] = "mdrelasialamat";
$edit["detail"][$i]["field_name"] = array(
    "alamat",
    "provinsi",
    "kabupaten",
    "kecamatan",
    "nomormhprovinsi",
    "nomormhkabupaten",
    "nomormhkecamatan",
    "jenis"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "jenis = '0'";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_alamat_kantor";
$i++;
//END GRID DATA

//PEMBUATAN GRID DATA pic kantor
// $i = 1;
$edit["detail"][$i]["table_name"] = "mdrelasipic";
$edit["detail"][$i]["field_name"] = array(
    "pic",
    "telepon",
    "handphone",
    "email",
    "jenis"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "jenis = '0'";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_pic_kantor";
$i++;
//END GRID DATA

//PEMBUATAN GRID DATA detail alamat pengiriman
// $i = 2;
$edit["detail"][$i]["table_name"] = "mdrelasialamat";
$edit["detail"][$i]["field_name"] = array(
    "alamat",
    "oem",
    "provinsi",
    "kabupaten",
    "kecamatan",
    "nomormhprovinsi",
    "nomormhkabupaten",
    "nomormhkecamatan",
    "lama_kirim",
    "jenis"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "jenis = '1'";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_alamat_pengiriman";
$i++;
//END GRID DATA

//PEMBUATAN GRID DATA pic pengiriman
// $i = 3;
$edit["detail"][$i]["table_name"] = "mdrelasipic";
$edit["detail"][$i]["field_name"] = array(
    "pic",
    "telepon",
    "handphone",
    "email",
    "jenis"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "jenis = '1'";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_pic_pengiriman";
$i++;
//END GRID DATA

//PEMBUATAN GRID DATA detail alamat penagihan
// $i = 4;
$edit["detail"][$i]["table_name"] = "mdrelasialamat";
$edit["detail"][$i]["field_name"] = array(
    "alamat",
    "provinsi",
    "kabupaten",
    "kecamatan",
    "nomormhprovinsi",
    "nomormhkabupaten",
    "nomormhkecamatan",
    "jenis"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "jenis = '2'";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_alamat_penagihan";
$i++;
//END GRID DATA

//PEMBUATAN GRID DATA pic penagihan
// $i = 5;
$edit["detail"][$i]["table_name"] = "mdrelasipic";
$edit["detail"][$i]["field_name"] = array(
    "pic",
    "telepon",
    "handphone",
    "email",
    "jenis"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "jenis = '2'";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_pic_penagihan";
$i++;
//END GRID DATA

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

$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"]            = "nomormhrelasikelompok";
$edit["field"][$i]["input"]            = "nomormhrelasikelompok";
if ($edit["mode"] == "add") {
    $edit["field"][$i]["input_value"] = 1;
}
$i++;

$edit["field"][$i]["label"]                     = "Kode";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "kode";
$edit["field"][$i]["input_class"]                 = "required";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "4";
$edit["field"][$i]["input_attr"]["readonly"]     = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "Kode Alias";
$edit["field"][$i]["input"]                     = "kode_alias";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;

$edit["field"][$i]["label"]                         = "Nama";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input"]                            = "nama";
$edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;

//BROWSE Gelar
$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "Gelar";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhgelar";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_gelar";
$i++;

//BROWSE TOP
$edit["field"][$i]["label"]                     = "TOP";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhtop";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_top";
$edit["field"][$i]["browse_set"]["param_output"]     = array(
    "nomor|nomormdtop"
);
$i++;


$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "DP (%)";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormdtopdp";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_top_dp";
$edit["field"][$i]["browse_set"]["param_input"]      = array(
    "a.nomormhtop|browse_master_top_hidden"
);
$i++;


$edit["field"][$i]["label"]         = "Termin (hari)";
$edit["field"][$i]["label_class"]   = "req";
$edit["field"][$i]["input"]         = "nomormdtoptermin";
$edit["field"][$i]["input_class"]   = "required";
$edit["field"][$i]["input_element"] = "browse";
$edit["field"][$i]["browse_setting"] = "master_top_termin";
$edit["field"][$i]["browse_set"]["param_input"] = array(
    "a.nomormhtop|browse_master_top_hidden"
);
$i++;


//browse sppd
$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "Mata Uang";
$edit["field"][$i]["label_class"]                 = "";
$edit["field"][$i]["input"]                     = "nomormhvaluta";
$edit["field"][$i]["input_class"]                 = "";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_valuta";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"] = "IDR - RUPIAH|1";
$i++;

//BROWSE kategoti customer
$edit["field"][$i]["label"]                     = "Kategori Customer";
$edit["field"][$i]["label_class"]                 = "";
$edit["field"][$i]["input"]                     = "nomormhrelasikategori";
$edit["field"][$i]["input_class"]                 = "";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_kategoricustomer";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "Sales";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhpegawai_sales";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_sales";
$i++;

$edit["field"][$i]["label"]                         = "OEM";
$edit["field"][$i]["input"]                            = "oem";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                         = "Toleransi Pengiriman (%)";
$edit["field"][$i]["label_class"]                     = "";
$edit["field"][$i]["input"]                            = "toleransi_pengiriman";
$edit["field"][$i]["input_class"]                     = "";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;

$edit["field"][$i]["label"]                         = "PIC";
$edit["field"][$i]["label_class"]                     = "";
$edit["field"][$i]["input"]                            = "pic";
$edit["field"][$i]["input_class"]                     = "";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                         = "Telepon";
$edit["field"][$i]["label_class"]                     = "";
$edit["field"][$i]["input"]                            = "no_telp";
$edit["field"][$i]["input_class"]                     = "";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;

$edit["field"][$i]["label"] = "PKP";
$edit["field"][$i]["input"] = "pkp";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("yes|YES", "no|NO");
if ($edit["mode"] != "add") {
    $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
    $edit["field"][$i]["input_save"] = "skip";
}
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                         = "email";
$edit["field"][$i]["label_class"]                     = "";
$edit["field"][$i]["input"]                            = "email";
$edit["field"][$i]["input_class"]                     = "";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;

$edit["field"][$i]["label"]                         = "Kabupaten / Kota";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input"]                     = "nomormhkabupaten";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_kabupaten";
$i++;


$edit["field"][$i]["form_group_class"] = "no_section";
$edit["field"][$i]["label"]                         = "KTP";
$edit["field"][$i]["label_class"]                     = "";
$edit["field"][$i]["input"]                            = "ktp";
$edit["field"][$i]["input_class"]                     = "";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;
$edit["field"][$i]["form_group_class"] = "yes_section";
$edit["field"][$i]["label"] = "NPWP";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"] = "nomor_npwp";
$edit["field"][$i]["input_attr"]["maxlength"] = "200";
$i++;
$edit["field"][$i]["form_group_class"] = "yes_section";
$edit["field"][$i]["label"] = "SPPKP";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"] = "sppkp";
$edit["field"][$i]["input_attr"]["maxlength"] = "200";
$i++;
$edit["field"][$i]["form_group_class"] = "yes_section";
$edit["field"][$i]["label"] = "NIB";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"] = "nib";
$edit["field"][$i]["input_attr"]["maxlength"] = "200";
$i++;


// $edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"]                         = "nomormhprovinsidetail";
// $edit["field"][$i]["label_class"]                     = "";
$edit["field"][$i]["input"]                            = "nomormhprovinsidetail";
$edit["field"][$i]["input_save"] = "skip";
// $edit["field"][$i]["input_class"]                     = "";
// $edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;


$edit["field"][$i]["label"]                          = "Keterangan";
$edit["field"][$i]["label_col"]                     = "col-sm-12";
$edit["field"][$i]["label_attr"]["style"]             = "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"]                          = "keterangan";
$edit["field"][$i]["input_element"]                  = "textarea";
$edit["field"][$i]["input_attr"]["rows"]             = "5";
$edit["field"][$i]["input_col"]                     = "col-sm-12";
$i++;


//upload
$index = 0;
if ($edit["mode"] != "add") {
    $edit["field"][$i]["box_tab"]             = "upload";
    $edit["field"][$i]["input_col"]         = 'col-sm-8 col-sm-offset-2';
    $edit["field"][$i]["input_element"]     = 'No Uploaded File';

    $file_nomor = $_GET["no"];
    $file_tabel = $edit["table"];
    $file_query = mysqli_query($con, " 
	SELECT nomor, `directory`, nama, category  
	FROM mharchievedfiles 
	WHERE 
		status_aktif > 0 AND 
		category = 'MASTER_CUSTOMER' AND 
		tablename = '$file_tabel' AND 
		filenumber = $file_nomor");
    $file_count = mysqli_num_rows($file_query);

    if ($file_count > 0) {
        $edit["field"][$i]["input_element"] = '';
        while ($row = mysqli_fetch_assoc($file_query)) {
            $json[] = $row;
            $edit["field"][$i]["input_element"] .= '<div id="uploaded_file_' . $json[$index]["nomor"] . '">';
            $edit["field"][$i]["input_element"] .= '<a class="btn btn-block btn-outline btn-midnight" style= "white-space: break-spaces; margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["directory"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
            if ($edit["mode"] != "view")
                $edit["field"][$i]["input_element"] .= '<a class="btn btn-danger btn-xs" style="color:white;position:relative;top:-26px;" onclick="file_delete(' . "'" . $json[$index]["nomor"] . "'" . ')">&nbsp;&nbsp;Delete&nbsp;&nbsp;</a>';
            $edit["field"][$i]["input_element"] .= '</div>';
            $index++;
        }
    }
    $edit["field"][$i]["input_save"] = "skip";
    $i++;
}


$edit = generate_info($edit, $r, "insert|update");
$i = count($edit["field"]);
$edit["fields"][$i]["box_tabs_close"] = 1;

$edit["field"][$i]["box_tabs"] = array(
    "kantor|Kantor",
    "pengiriman|Pengiriman",
    "penagihan|Penagihan"
);

// -----------------------------------------FRONTEND UNTUK GRID DATA detail alamat kantor-----------------------------------
$edit["field"][$i]["box_tab"] = "kantor";
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar Alamat Kantor'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Provinsi',
'Kabupaten/Kota',
'Kecamatan',
'Alamat',
'nomormhprovinsi',
'nomormhkabupaten',
'nomormhkecamatan',
'jenis',
'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "provinsi",
    "kabupaten",
    "kecamatan",
    "alamat",
    "nomomhprovinsi",
    "nomomhkabupaten",
    "nomomhkecamatan",
    "jenis",
    "nomor"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    provinsi:'',
    kabupaten:'',
    kecamatan:'',
    alamat:'',
nomormhprovinsi:'',
nomormhkabupaten:'',
nomormhkecamatan:'',
jenis:'0',
nomor:'' }";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[]";
$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'provinsi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'provinsi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_provinsi }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kabupaten'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kabupaten'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_kabupaten }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kecamatan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kecamatan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_kecamatan }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'alamat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'alamat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhprovinsi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhprovinsi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhkabupaten'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhkabupaten'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhkecamatan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhkecamatan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jenis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jenis'";
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
// ----------------------------------------//END FRONT END GRID DATA---------------------------------------------------

// ------------------------------------------------//FRONTEND UNTUK GRID DATA detail kantor---------------------------
$grid[1] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar PIC Kantor'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'PIC',
'Telepon',
'Hanphone',
'Email',
'jenis'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "pic",
    "telepon",
    "handphone",
    "email",
    "jenis"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    pic:'',
    telepon:'',
    handphone:'',
    email:'',
    jenis:'0' }";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[]";
$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pic'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pic'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_customer }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'telepon'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'telepon'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'handphone'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'handphone'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'email'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'email'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jenis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jenis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$i++;
// ---------------------------------END FRONT END GRID DATA-------------------------------------

// -----------------------------------------FRONTEND UNTUK GRID DATA detail alamat pengiriman-----------------------------------
$edit["field"][$i]["box_tab"] = "pengiriman";
$grid[2] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][2]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar Alamat pengiriman'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Provinsi',
'Kabupaten/Kota',
'Kecamatan',
'Alamat',
'Oem',
'nomormhprovinsi',
'nomormhkabupaten',
'nomormhkecamatan',
'Lama Kirim',
'jenis',
'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "provinsi",
    "kabupaten",
    "kecamatan",
    "alamat",
    "oem",
    "nomomhprovinsi",
    "nomomhkabupaten",
    "nomomhkecamatan",
    "lama_kirim",
    "jenis",
    "nomor"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
provinsi:'',
kabupaten:'',
kecamatan:'',
alamat:'',
oem:'',
nomormhprovinsi:'',
nomormhkabupaten:'',
nomormhkecamatan:'',
lama_kirim:'',
jenis:'1',
nomor:'' }";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[]";
$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'provinsi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'provinsi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_provinsi1 }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kabupaten'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kabupaten'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_kabupaten1 }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kecamatan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kecamatan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_kecamatan1 }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'alamat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'alamat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_barang }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'oem'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'oem'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhprovinsi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhprovinsi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhkabupaten'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhkabupaten'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhkecamatan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhkecamatan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'lama_kirim'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'lama_kirim'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jenis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jenis'";
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
// ----------------------------------------//END FRONT END GRID DATA---------------------------------------------------

// ------------------------------------------------//FRONTEND UNTUK GRID DATA detail pic pengiriman---------------------------
$grid[3] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][3]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar PIC Pengiriman'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'PIC',
'Telepon',
'Hanphone',
'jenis'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "pic",
    "telepon",
    "handphone",
    "jenis"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    pic:'',
    telepon:'',
    handphone:'',
    jenis:'1' 
}";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[]";
$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pic'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pic'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_customer }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'telepon'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'telepon'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'handphone'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'handphone'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jenis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jenis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$i++;
// ---------------------------------END FRONT END GRID DATA-------------------------------------

// -----------------------------------------FRONTEND UNTUK GRID DATA detail alamat penagihan-----------------------------------
$edit["field"][$i]["box_tab"] = "penagihan";
$grid[4] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][4]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar Alamat Penagihan'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Provinsi',
'Kabupaten',
'Kecamatan',
'Alamat',
'nomormhprovinsi',
'nomormhkabupaten',
'nomormhkecamatan',
'jenis',
'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "provinsi",
    "kabupaten",
    "kecamatan",
    "alamat",
    "nomomhprovinsi",
    "nomomhkabupaten",
    "nomomhkecamatan",
    "jenis",
    "nomor"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    provinsi:'',
    kabupaten:'',
    kecamatan:'',
    alamat:'',
nomormhprovinsi:'',
nomormhkabupaten:'',
nomormhkecamatan:'',
jenis:'2',
nomor:'' }";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[]";
$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'provinsi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'provinsi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_provinsi2 }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kabupaten'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kabupaten'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_kabupaten2 }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kecamatan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kecamatan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_kecamatan2 }";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'alamat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'alamat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhprovinsi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhprovinsi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhkabupaten'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhkabupaten'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhkecamatan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhkecamatan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jenis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jenis'";
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
// ----------------------------------------//END FRONT END GRID DATA---------------------------------------------------

// ------------------------------------------------//FRONTEND UNTUK GRID DATA detail pic penagihan---------------------------
$grid[5] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][5]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar PIC Penagihan'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'PIC',
'Telepon',
'Hanphone',
'jenis'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "pic",
    "telepon",
    "handphone",
    "jenis"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    pic:'',
    telepon:'',
    handphone:'',
    jenis:'2' 
}";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[]";
$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pic'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pic'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_customer }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'telepon'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'telepon'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'handphone'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'handphone'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jenis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jenis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$i++;
// ---------------------------------END FRONT END GRID DATA-------------------------------------




if ($edit["mode"] != "add") {

    //query grid untuk detail alamat  kantor
    $edit["field"][$grid[0]]["grid_set"]["query"] = "
    SELECT a.*,
    a.alamat,
    a.kota
    FROM " . $edit["detail"][0]["table_name"] . " a
    WHERE a.status_aktif > 0
    AND a.jenis = '0'
    AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];
    //eror handling jika data tidak muncull
    // echo $edit["field"][$grid[0]]["grid_set"]["query"];
    // $edit = fill_value($edit, $r);

    //query grid unutk pic kanror
    $edit["field"][$grid[1]]["grid_set"]["query"] = "
    SELECT a.*,
    a.pic,
    a.telepon,
    a.handphone
    FROM " . $edit["detail"][1]["table_name"] . " a
    WHERE a.status_aktif > 0
    AND a.jenis = '0'
    AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];

    //
    //query grid untuk detail alamat  pengiriman
    $edit["field"][$grid[2]]["grid_set"]["query"] = "
    SELECT a.*,
    a.alamat,
    a.kota,
    a.oem,
    a.lama_kirim
    FROM " . $edit["detail"][2]["table_name"] . " a
    WHERE a.status_aktif > 0
    AND a.jenis = '1'
    AND a." . $edit["detail"][2]["foreign_key"] . " = " . $_GET["no"];

    //query grid unutk pic pengiriman
    $edit["field"][$grid[3]]["grid_set"]["query"] = "
    SELECT a.*,
    a.pic,
    a.telepon,
    a.handphone
    FROM " . $edit["detail"][3]["table_name"] . " a
    WHERE a.status_aktif > 0
    AND a.jenis = '1'
    AND a." . $edit["detail"][3]["foreign_key"] . " = " . $_GET["no"];

    //query grid untuk detail alamat  penagihan
    $edit["field"][$grid[4]]["grid_set"]["query"] = "
        SELECT a.*,
        a.alamat,
        a.kota,
        a.oem,
        a.lama_kirim
        FROM " . $edit["detail"][4]["table_name"] . " a
        WHERE a.status_aktif > 0
    AND a.jenis = '2'
        AND a." . $edit["detail"][4]["foreign_key"] . " = " . $_GET["no"];

    //query grid unutk pic penagihan
    $edit["field"][$grid[5]]["grid_set"]["query"] = "
    SELECT a.*,
    a.pic,
    a.telepon,
    a.handphone
    FROM " . $edit["detail"][5]["table_name"] . " a
    WHERE a.status_aktif > 0
    AND a.jenis = '2'
    AND a." . $edit["detail"][5]["foreign_key"] . " = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["field"][$grid[0]]["grid_set"]["query"];

    $edit = fill_value($edit, $r);
}

$features = "save|back|reload|add" . check_approval($r, "edit");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);

if ($edit["mode"] != "add") {
    $edit_navbutton["field"][$i]["input_element"]             = "a";
    $edit_navbutton["field"][$i]["input_float"]               = "right";
    $edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
    $edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
    $edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
    $edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
    $edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
        "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=MASTER_CUSTOMER&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
    $i++;
}

$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
?>

<script type="text/javascript">
    $(document).ready(function() {

        <?php if ($edit["mode"] != "view") { ?>
            $(document).on("change", "#pkp", function() {
                pkp_value_changed(this);
            });
            $('#pkp').change();
        <?php } ?>

    });

    function checkHeader() {
        var fields = ["nomormhtop|top"];
        var check_failed = check_value_elements(fields);
        if (check_failed != '')
            return check_failed;
        else
            return true;
    }


    function pkp_value_changed(obj) {
        <?php if ($edit["mode"] == "add") { ?>
            if ($(obj).val() == 'yes') {
                $('.yes_section').show();
                $('.no_section').hide();
            } else if ($(obj).val() == 'no') {
                $('.no_section').show();
                $('.yes_section').hide();
            } else {
                $('.no_section').hide();
                $('.yes_section').hide();
            }
        <?php } ?>
    }


    function checkSave() {
        var check_failed = '';
        var pkp = $('#pkp').val();
        var ktp = $('#ktp').val();
        var npwp = $('#nomor_npwp').val();
        var sppkp = $('#sppkp').val();
        var nib = $('#nib').val();

        if (pkp == 'no' && ktp == '')
            check_failed += '- Form KTP wajib diisi\n\n';

        if (pkp == 'yes' && npwp == '')
            check_failed += '- Form NPWP wajib diisi\n\n';

        if (pkp == 'yes' && sppkp == '')
            check_failed += '- Form SPPKP wajib diisi\n\n';

        if (pkp == 'yes' && nib == '')
            check_failed += '- Form NIB wajib diisi\n\n';

        if (check_failed != '')
            alert(check_failed);
        else
            return true;
    }

    <?= generate_function_checkgrid($grid_str) ?>
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>