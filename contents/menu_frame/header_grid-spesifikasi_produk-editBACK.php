<?php
$edit["debug"]       = 1;
$edit["uppercase"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];



$edit["sp_approve"] = "sp_disetujui_spesifikasiproduk";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_spesifikasiproduk";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";



//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdspesifikasiproduk";
$edit["detail"][$i]["field_name"] = array(
    "warna",
    "jumlah",
    "nomormhwarna",
    "nomor"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------


//------------------------------------------------GRID DATA 2------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdspesifikasiproduk_komposisi";
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
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_komposisi1";
$i++;
//------------------------------------------------END GRID DATA 2------------------------------------------------------



//------------------------------------------------GRID DATA 3------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdspesifikasiproduk_komposisi";
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
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_komposisi2";
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


$edit["field"][$i]["label"] = "Kode";
$edit["field"][$i]["input"] = "kode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
$edit["field"][$i]["form_group_class"] = "hiding";
$i++;

$edit["field"][$i]["label"]       = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
if ($edit["mode"] == "add") {
    $edit["field"][$i]["input_value"] = date("d/m/Y");
}
$i++;

$edit["field"][$i]["label"] = "No. Registrasi";
$edit["field"][$i]["input"] = "kode_custom";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;


// $edit["field"][$i]["form_group"] 					= 0;
// $edit["field"][$i]["label"]                     = "Nomor Registrasi";
// $edit["field"][$i]["input"]                        = "nomor_registrasi";
// $edit["field"][$i]["input_attr"]["maxlength"]     = "200";
// $i++;

$edit["field"][$i]["label"] = "Bukan Dari Permintaan Analisa?";
$edit["field"][$i]["input"] = "is_hasilanalisa";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("0|TIDAK", "1|YA");
$edit["field"][$i]["input_attr"]["onchange"] = "hide_and_show()";
$i++;

// $edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["form_group_class"] = "no_section";
$edit["field"][$i]["label"]                         = "Hasil Analisa Sample";
$edit["field"][$i]["input"]                         = "nomorthhasilanalisasample";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_setting"]                 = "hasil_analisa_sample";
$edit["field"][$i]["browse_set"]["param_output"] = array(
    "produk|nama",
    "width|width",
    "pitch|pitch",
    "length|length",
    "customer|customer",
    "printing|printing",
    "struktur_packaging|struktur_packaging",
    "tahapan_proses|tahapan_proses",
    "total_thickness|total_thickness",
    "jenispackaging|browse_master_jenis_packaging_search",
    "nomormhjenispackaging|browse_master_jenis_packaging_hidden"
);
$edit["field"][$i]["browse_set"]["call_function"] = array(
    "load_grid_detail",
    "load_grid_detail2",
    "load_grid_detail3"
);
$i++;

$edit["field"][$i]["label"]                     = "nomoranalisasample";
$edit["field"][$i]["input"]                        = "nomoranalisasample";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_save"] = "skip";
$edit["field"][$i]["form_group_class"] = "hiding";
$i++;



// $edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["label"]                     = "Nama Produk";
$edit["field"][$i]["input"]                        = "nama";
// $edit["field"][$i]["input_class"]                 = "nama_sampel";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"] 					= "Customer";
$edit["field"][$i]["input"]						= "customer";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

// $edit["field"][$i]["label"]                     = "Customer";
// // $edit["field"][$i]["label_class"]                 = "req";
// $edit["field"][$i]["input"]                     = "nomormhrelasi";
// // $edit["field"][$i]["input_class"]                 = "required";
// $edit["field"][$i]["input_element"]             = "browse";
// $edit["field"][$i]["browse_setting"]             = "master_customer";
// $i++;

// $edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "Franco";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhkabupaten";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_kabupaten";
$i++;

$edit["field"][$i]["label"]                     = "width";
$edit["field"][$i]["input"]                        = "width";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "pitch";
$edit["field"][$i]["input"]                        = "pitch";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

// $edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "length";
$edit["field"][$i]["input"]                        = "length";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Jenis Packaging";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhjenispackaging";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["browse_setting"]             = "master_jenis_packaging";
$i++;

$edit["field"][$i]["label"]                     = "Total Thickness";
$edit["field"][$i]["input"]                        = "total_thickness";
// $edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"] = "Printing";
$edit["field"][$i]["input"] = "printing";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("0|Print", "1|No Print", "2|Surface", "3|Reserve");
$i++;


$edit["field"][$i]["label"]                         = "Arah Gulungan";
$edit["field"][$i]["input"]                         = "arah_gulungan";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_option"]                     = array("terbaca|Terbaca", "ticak terbaca|Tidak Terbaca", "-|-");
$i++;


$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "Ukuran Bahan";
$edit["field"][$i]["input"]                        = "ukuran_bahan";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


// browse data belum dibuat

// $edit["field"][$i]["form_group"]                     = 0;
// $edit["field"][$i]["label"]                         = "Jenis Packaging";
// $edit["field"][$i]["input"]                         = "nomormhjenispackaging";
// $edit["field"][$i]["label_class"]                     = "req";
// $edit["field"][$i]["input_class"]                     = "required";
// $edit["field"][$i]["input_element"]                 = "browse";
// $edit["field"][$i]["browse_setting"]                 = "master_satuan_qty_gudang";
// $i++;

$edit["field"][$i]["label"]                     = "Peruntukan";
$edit["field"][$i]["input"]                        = "peruntukan";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

// $edit["field"][$i]["form_group"] = 0;
// $edit["field"][$i]["label"]                     = "Printing";
// $edit["field"][$i]["input"]                        = "printing";
// $edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
// $edit["field"][$i]["input_attr"]["maxlength"]     = "200";
// $i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "Tahapan Proses";
$edit["field"][$i]["input"]                        = "tahapan_proses";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;

// $edit["field"][$i]["label"]                     = "Struktur Packaging";
// $edit["field"][$i]["input"]                        = "struktur_packaging";
// $edit["field"][$i]["input_attr"]["maxlength"]     = "200";
// $edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
// $i++;


$edit["field"][$i]["label"]                     = "Size Papercore";
$edit["field"][$i]["input"]                        = "size_papercore";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["onblur"] = "add_char()";
// $edit["field"][$i]["input_class"] 				= "iptnumber required"; 
$i++;


$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "Minimun Order";
$edit["field"][$i]["input"]                        = "minimun_order";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"]                 = "iptnumber";
$i++;

$edit["field"][$i]["label"]                     = "Up";
$edit["field"][$i]["input"]                        = "up";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                     = "Harga";
$edit["field"][$i]["input"]                        = "harga";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"] 				= "iptmoney required"; 
// $edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;

$edit["field"][$i]["label"]              = "Struktur Packaging";
$edit["field"][$i]["label_col"] = "col-sm-12";
$edit["field"][$i]["label_attr"]["style"] = "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"] = "struktur_packaging";
$edit["field"][$i]["input_class"] = "";
$edit["field"][$i]["input_col"] = "col-sm-12";
$edit["field"][$i]["input_element"] = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "5";
$edit["field"][$i]["input_attr"]["cols"] = "70";
$i++;
$edit["field"][$i]["label"]              = "notes";
$edit["field"][$i]["label_col"] = "col-sm-12";
$edit["field"][$i]["label_attr"]["style"] = "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"] = "catatan";
$edit["field"][$i]["input_class"] = "";
$edit["field"][$i]["input_col"] = "col-sm-12";
$edit["field"][$i]["input_element"] = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "6";
$edit["field"][$i]["input_attr"]["cols"] = "70";
$i++;



//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Warna'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Warna',
'Jumlah',
'nomormhwarna',
'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "warna",
    "jumlah",
    "nomormhwarna",
    "nomor"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    warna:'',
    jumlah:'',
    nomormhwarna:'',
    nomor:''
}";
$edit["field"][$i]["grid_set"]["navgrid"] = 0;
$edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'warna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'warna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhwarna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhwarna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$i++;
//-----------------------------------------END FRONTEND GRID 1--------------------------------




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
'nomormhbarang',
'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "komposisi",
    "mikron",
    "grid_ke",
    "nomormhbarang",
    "nomor"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    komposisi:'',
    mikron:0,
    grid_ke: 1,
    nomormhbarang: '',
    nomor: ''
}";
$edit["field"][$i]["grid_set"]["navgrid"] = 0;
$edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'komposisi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'komposisi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'mikron'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'mikron'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
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
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$i++;
//-----------------------------------------END FRONTEND GRID 2--------------------------------




//-----------------------------------------FRONTEND GRID 3--------------------------------
$grid[2] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][2]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Komposisi Material 2'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Komposisi',
'Mikron',
'grid ke',
'nomormhbarang',
'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "komposisi",
    "mikron",
    "grid_ke",
    "nomormhbarang",
    "nomor"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    komposisi:'',
    mikron:0,
    grid_ke: 2,
    nomormhbarang:'',
    nomor:''
}";
$edit["field"][$i]["grid_set"]["navgrid"] = 0;
$edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'komposisi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'komposisi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'mikron'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'mikron'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
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
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$i++;
//-----------------------------------------END FRONTEND GRID 3--------------------------------




// ================================================================================== UPLOAD ======================================================

$index = 0;
if ($edit["mode"] != "add") {
    $edit["field"][$i]["box_tab"]             = "upload";
    $edit["field"][$i]["input_col"]         = 'col-sm-8 col-sm-offset-2';
    $edit["field"][$i]["input_element"]     = 'No Uploaded File';

    $file_nomor = $_GET["no"];
    $file_tabel = $edit["table"];
    $file_query = mysqli_query($con, " 
	SELECT * 
	FROM mharchievedfiles 
	WHERE 
		status_aktif > 0 AND 
		kategori = 'SPESIFIKASI_PRODUK' AND 
		file_tabel = '$file_tabel' AND 
		file_nomor = $file_nomor");
    $file_count = mysqli_num_rows($file_query);

    $arr_images = array();

    if ($file_count > 0) {
        $edit["field"][$i]["input_element"] = '';
        $count_i = 0;
        while ($row = mysqli_fetch_assoc($file_query)) {
            $json[] = $row;
            array_push($arr_images, $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "SPESIFIKASI_PRODUK" . "/" . $json[$count_i]["nama"]));
            $edit["field"][$i]["input_element"] .= '<div id="uploaded_file_' . $json[$index]["nomor"] . '">';
            $directory = str_replace("'", "\'", $json[$index]["nama"]);
            $directory_details = explode(".", $directory);
            // echo($directory_details[1]);
            if ($edit["mode"] == "edit")
                if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
                    if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                        $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "SPESIFIKASI_PRODUK" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                    else
                        $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "SPESIFIKASI_PRODUK" . "/" . $json[$index]["nama"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
                else
					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "SPESIFIKASI_PRODUK" . "/" . $json[$index]["nama"])  . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                else
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "SPESIFIKASI_PRODUK" . "/" . $json[$index]["nama"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
            else	
				if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
                if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "SPESIFIKASI_PRODUK" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                else
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "SPESIFIKASI_PRODUK" . "/" . $json[$index]["nama"])  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
            else
					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "SPESIFIKASI_PRODUK" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
            else
                $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "SPESIFIKASI_PRODUK" . "/" . $json[$index]["nama"])  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';


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
    a.*,
    DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal
    , CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhjenispackaging'
    , CONCAT(c2.kode,'-',c1.produk, '|', c.nomor) AS 'browse|nomorthhasilanalisasample'
    , CONCAT(d.nama,'-',d1.nama, '|', d.nomor) AS 'browse|nomormhkabupaten'
    FROM thspesifikasiproduk a
    join mhjenispackaging b on b.nomor = a.nomormhjenispackaging
    left join thhasilanalisasample c on a.nomorthhasilanalisasample = c.nomor
    left join tdpermintaananalisasample c1 on c.nomortdpermintaananalisasample = c1.nomor
    left join thpermintaananalisasample c2 on c.nomorthpermintaananalisasample = c2.nomor
    join mhkabupaten d on a.nomormhkabupaten = d.nomor
    left join mhprovinsi d1 on d.nomormhprovinsi = d1.nomor
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

    //query grid detail 2
    $edit["field"][$grid[1]]["grid_set"]["query"] = "
    SELECT
    a.*
    FROM " . $edit["detail"][1]["table_name"] . " a
    where a.status_aktif > 0
    AND a.grid_ke = 1
    AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];

    //query grid detail 3
    $edit["field"][$grid[2]]["grid_set"]["query"] = "
	SELECT
    a.*
	FROM " . $edit["detail"][2]["table_name"] . " a
    where a.status_aktif > 0
    AND a.grid_ke = 2
	AND a." . $edit["detail"][2]["foreign_key"] . " = " . $_GET["no"];



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
$features = "save|back|reload" . check_approval($r, "edit|approve|delete|disappr");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);

if ($edit["mode"] != "add") {
    $edit_navbutton["field"][$i]["input_element"]             = "a";
    $edit_navbutton["field"][$i]["input_float"]               = "right";
    $edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
    $edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
    $edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
    $edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
    $edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
        "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=SPESIFIKASI_PRODUK&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
    $i++;
}

?>

<script type="text/javascript">
    function load_grid_detail() {
        var no = $('#browse_hasil_analisa_sample_hidden').val();
        var pages = 'pages/grid_load.php?id=spesifikasi_produk_detail-load&no=' + no + '';
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
        var no = $('#browse_hasil_analisa_sample_hidden').val();
        var pages = 'pages/grid_load.php?id=spesifikasi_produk_detail_komposisi1-load&no=' + no + '';
        jQuery(<?= $grid_elm[1] ?>).jqGrid('setGridParam', {
            url: pages,
            datatype: 'json',
            loadComplete: function(data) {
                <?= $grid_str[1] ?>_load = 0;
                actGridComplete_<?= $grid_str[1] ?>();
            }
        });
        jQuery(<?= $grid_elm[1] ?>).trigger('reloadGrid');
    }

    function load_grid_detail3() {
        var no = $('#browse_hasil_analisa_sample_hidden').val();
        var pages = 'pages/grid_load.php?id=spesifikasi_produk_detail_komposisi2-load&no=' + no + '';
        jQuery(<?= $grid_elm[2] ?>).jqGrid('setGridParam', {
            url: pages,
            datatype: 'json',
            loadComplete: function(data) {
                <?= $grid_str[2] ?>_load =0;
                actGridComplete_<?= $grid_str[2] ?>();
            }
        });
        jQuery(<?= $grid_elm[2] ?>).trigger('reloadGrid');
    }


    function kode_custom() {
        var kode = $("#kode").val();
        const currentDate = new Date();
        const year = currentDate.getFullYear().toString().substr(-2);
        const month = ('0' + (currentDate.getMonth() + 1)).slice(-2);
        const code = `${kode}/SLS/${month}/20${year}`;

        $('#kode_custom').val(code);

        return code;
    }


    // function calculate_thickness() {
    //     var komposisi_material_1 = parseFloat($('#komposisi_material_1').val());
    //     var komposisi_material_2 = parseFloat($('#komposisi_material_2').val());
    //     var total_thickness = komposisi_material_1 + komposisi_material_2;

    //     $('#total_thickness').val(total_thickness);
    // }

    function hide_and_show() {
			console.log('hide_and_show')
			var is_hasilanalisa = $('#is_hasilanalisa').val();

            // alert(jenispackaging == 'Roll')

			if (is_hasilanalisa == 1) {
				$('.no_section').hide();
                $("#nama").removeAttr('readonly');
                $("#customer").removeAttr('readonly');
                $("#width").removeAttr('readonly');
                $("#pitch").removeAttr('readonly');
                $("#length").removeAttr('readonly');
                $("#browse_master_jenis_packaging_search").removeAttr('readonly');
			} else {
                $('.no_section').show();
                $("#nama").attr('readonly', 1)
                $("#customer").attr('readonly', 1)
                $("#width").attr('readonly', 1)
                $("#pitch").attr('readonly', 1)
                $("#length").attr('readonly', 1)
                $("#browse_master_jenis_packaging_search").attr('readonly', 1)
			}
		}

    function add_char() {
        var size_papercore = $('#size_papercore').val();
        var lengths = $('#lengths').val();

        if (size_papercore != '' && size_papercore != '-') {
            var parsedsize_papercore = parseFloat(size_papercore);
            if (!isNaN(parsedsize_papercore)) {
                size_papercore = parsedsize_papercore + ' Inch';
                $('#size_papercore').val(size_papercore);
            }
        }

        if (lengths != '' && lengths != '-') {
            var parsedlengths = parseFloat(lengths);
            if (!isNaN(parsedlengths)) {
                lengths = parsedlengths + ' M';
                $('#lengths').val(lengths);
            }
        }


    }

    $(document).ready(function() {
        $("#tabimages").prependTo("#tab_i1_data");
        kode_custom()
    });

    function setFile(directory) {
        $("#directory").val(directory);
        $("#itemspec").val(1);
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


$file_nomor_hasil_analisa = $r["nomorthhasilanalisasample"];
$file_nomor = $_GET["no"];

// $file_tabel = 'tdpermintaananalisasample';
$file_query = mysqli_query($con, " 
SELECT * 
FROM mharchievedfiles 
WHERE 
    status_aktif > 0 AND 
    kategori = 'SPESIFIKASI_PRODUK' AND 
    file_tabel = 'thspesifikasiproduk' AND 
    file_nomor = $file_nomor

UNION ALL

SELECT
    a.* 
FROM
    thhasilanalisasample b
    JOIN tdpermintaananalisasample c ON c.nomor = b.nomortdpermintaananalisasample AND c.status_aktif = 1
    LEFT JOIN mharchievedfiles a ON a.file_nomor  = c.nomor AND a.file_tabel = 'tdpermintaananalisasample' and b.status_aktif = 1
WHERE
    a.status_aktif > 0 
    AND a.kategori = 'PERMINTAAN_ANALISA_SAMPEL' 
    AND b.nomor = $file_nomor_hasil_analisa 
");
// $file_query = mysqli_query($con, " 
//     SELECT
//         a.* 
//     FROM
//         thspesifikasiproduk a
//         join thhasilanalisasample b on a.nomorthhasilanalisasample = b.nomor
//         join thlayoutsample b1 on b.nomorthlayoutsample = b1.nomor
//         JOIN thhasilanalisasample b ON b.nomor = a.file_nomor AND a.file_tabel = 'thlayoutsample' and b.status_aktif = 1
//         JOIN tdpermintaananalisasample d ON d.nomor = b.nomortdpermintaananalisasample AND d.status_aktif = 1
//     WHERE
//         a.status_aktif > 0 
//         AND a.kategori = 'LAYOUT_SAMPLE' 
//         AND a.file_tabel = 'thlayoutsample' 
//         AND b.nomortdpermintaananalisasample = $file_nomor AND b.status_disetujui = 1
// ");

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