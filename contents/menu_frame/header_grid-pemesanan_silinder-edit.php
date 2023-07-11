<?php
$edit["debug"]       = 1;
$edit["string_code"]    = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];
$edit["test_code"]    = "kode_test";
// $edit["unique"]    = ("nomorthbarang");
if ($edit['mode'] == 'add') {
    // $edit["manual_save_beforecommit"] = "contents/menu_frame/header_grid-pemesanan_silinder-save_beforecommit.php";
}
// $edit["manual_save"] = "contents/menu_frame/" . $_SESSION["g.frame"] . "-" . $_SESSION["g.menu"] . "-save.php";




$edit["sp_approve"] = "sp_disetujui_pemesanan_silinder";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_pemesanan_silinder";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";


//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdpemesanancylinderwarna";
$edit["detail"][$i]["field_name"] = array(
    "nomor_silinder",
    "warna",
    "nomorstatus_warna_spare",
    "urutan_unit",
    "nomormhwarna",
    "nomor"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_warna";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------


//------------------------------------------------GRID DATA 2------------------------------------------------------
// $edit["detail"][$i]["table_name"] = "sparesilinder";
// $edit["detail"][$i]["field_name"] = array(
//     "nomor_silinder",
//     "warna",
//     "nomorstatus_warna_spare",
//     "urutan_unit"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_spare";
// $i++;
//------------------------------------------------END GRID DATA 2------------------------------------------------------





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


$query = "SELECT @rownum:=@rownum+1 AS counter
    FROM thspesifikasimarketing t, (SELECT @rownum:=0) r
    ORDER BY counter DESC
    LIMIT 1";

if ($query > 0)
    echo $query;
$r = mysqli_fetch_array(mysqli_query($con, $query));




$edit["field"][$i]["label"] = "Kode Form";
$edit["field"][$i]["input"] = "kode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add") {
    $edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
}
// $edit["field"][$i]["form_group_class"] = "hiding"; 
$i++;

$edit["field"][$i]["label"] = "NO. FORM";
$edit["field"][$i]["input"] = "kode_custom";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;


$edit["field"][$i]["label"] = "Jenis Pemesanan Silinder";
$edit["field"][$i]["input"] = "jenis";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("REC|REC", "REP|REP", "KC|KC", "PEN|PEN", "SC|SC", "PC|PC");
$edit["field"][$i]["input_attr"]["onchange"] = "test()";
$i++;


// $edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Tanggal";
$edit["field"][$i]["input"] = "tanggal";
$edit["field"][$i]["label_class"] = "req ";
$edit["field"][$i]["input_class"] = "required date_1";
$edit["field"][$i]["input_attr"]["onchange"] = "setEstimasi()";
$i++;

$edit["field"][$i]["label"] = "Tanggal Eta";
$edit["field"][$i]["input"] = "tanggal_eta";
$edit["field"][$i]["label_class"] = "req ";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;


$edit["field"][$i]["label"]                         = "Kode Barang";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input"]                         = "nomorthbarang";
$edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_setting"]                 = "master_barang_customer_cylinder";
$edit["field"][$i]["browse_set"]["id"] = "master_barang_customer_cylinder";
$edit["field"][$i]["browse_set"]["param_output"]     = array(
    "width|width",
    "height|height",
    "up|up",
    "nomor_md|nomor_md",
    "sisi_cetak|sisi_cetak",
    "kepemilikan|kepemilikan",
    "surface|surfaces",
    "reverse|reverses",
    "tahapan_proses|proses",
    "nama_customer|customer_view",
    "alias_customer|alias_customer",
    "nomormhrelasi|nomormhrelasi"
);
$edit["field"][$i]["browse_set"]["call_function"] = array("test");
$i++;

$edit["field"][$i]["label"]                     = "nomormhrelasi";
$edit["field"][$i]["input"]                        = "nomormhrelasi";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["form_group_class"]                 = "hiding";
$i++;


$edit["field"][$i]["label"]                     = "Kode Silinder";
$edit["field"][$i]["input"]                        = "kode_silinder";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Nomor MD";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input"]                        = "nomor_md";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$i++;

$edit["field"][$i]["label"]                     = "Proses";
$edit["field"][$i]["input"]                        = "proses";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$i++;


$edit["field"][$i]["label"]                     = "Customer";
$edit["field"][$i]["input"]                        = "customer_view";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$edit["field"][$i]["input_save"] = "skip";
$i++;

$edit["field"][$i]["label"]                     = "alias Customer";
$edit["field"][$i]["input"]                        = "alias_customer";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$edit["field"][$i]["input_save"] = "skip";
$i++;

$edit["field"][$i]["label"]                         = "Supplier Silinder";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input"]                         = "nomormhrelasi_supplier";
$edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_setting"]                 = "master_supplier_silinder";
$i++;



$edit["field"][$i]["label"]                     = "width";
$edit["field"][$i]["input"]                        = "width";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"]                 = "iptmoney1";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "height";
$edit["field"][$i]["input"]                        = "height";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"]                 = "iptmoney1";
$edit["field"][$i]["input_attr"]["onblur"] = "test_circum()";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;

$edit["field"][$i]["label"]                     = "up";
$edit["field"][$i]["input"]                        = "up";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"]                 = "iptmoney1";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "pitch";
$edit["field"][$i]["input"]                        = "pitch";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["onblur"] = "test_circum()";
$edit["field"][$i]["input_class"]                 = "iptmoney1";
$i++;





$edit["field"][$i]["label"]                     = "panjang";
$edit["field"][$i]["input"]                        = "panjang";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"]                 = 1300;
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "circum";
$edit["field"][$i]["input"]                        = "circum";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["onblur"] = "test_circum()";
$edit["field"][$i]["input_class"]                 = "iptmoney1";
$i++;

$edit["field"][$i]["label"]                         = "cylinder base";
$edit["field"][$i]["input"]                         = "cylinder_base";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_option"]                     = array("NEW BASE|NEW BASE", "OLD BASE|OLD BASE");
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                         = "sisi cetak";
$edit["field"][$i]["input"]                         = "sisi_cetak";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_option"]                     = array("SURFACE|SURFACE(CETAK LUAR)", "RESERVE|RESERVE(CETAK DALAM)");
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$i++;

$edit["field"][$i]["label"]                         = "Bagian Transparan";
$edit["field"][$i]["input"]                         = "bagian_transparan";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_option"]                     = array("ADA|ADA", "TIDAK ADA|TIDAK ADA");
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                         = "processing system";
$edit["field"][$i]["input"]                         = "processing_system";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_option"]                     = array("ENGRAVE|ENGRAVE", "LASER|LASER", "IKUT EXISTING|IKUT EXISTING");
$i++;

$edit["field"][$i]["label"]                         = "kepemilikan";
$edit["field"][$i]["input"]                         = "kepemilikan";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_option"]                     = array("MMP|MMP", "CUSTOMER|CUSTOMER");
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "Jumlah Silinder";
$edit["field"][$i]["input"]                        = "jumlahcilinder";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit['mode'] == 'add') {
    $edit["field"][$i]["input_attr"]["value"] = 0;
}
$i++;

$edit["field"][$i]["label"]                     = "Perubahan";
$edit["field"][$i]["input"]                        = "perubahan";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


// $edit["field"][$i]["label"] 					= "Gambar Tambahan";
// $edit["field"][$i]["input"]						= "gambar_tambahan";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
// $i++;

$edit["field"][$i]["input"]                         = "catatan";
$edit["field"][$i]["input_class"]                     = "";
$edit["field"][$i]["input_col"]                     = "col-sm-6";
$edit["field"][$i]["input_element"]                 = "textarea";
$edit["field"][$i]["input_attr"]["rows"]             = "10";
$edit["field"][$i]["input_attr"]["cols"]             = "70";
$edit["field"][$i]["input_attr"]["placeholder"]     = "catatan";
$i++;

//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Warna'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Urutan Unit',
'Serial Number',
'Warna',
'Status',
'nomorstatus_warna_spare',
'Nomormhwarna'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "urutan_unit",
    "nomor",
    "warna",
    "status_silinder",
    "nomorstatus_warna_spare",
    "nomormhwarna",
);

// $counter = 1;

$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    urutan_unit:'',
    nomor:'',
    warna:'',
    status_silinder:'aktif',
    nomorstatus_warna_spare:''
}";


$j = 0;

// $counter++; 

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'urutan_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'urutan_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'warna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'warna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_warna }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'status_silinder'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'status_silinder'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_status_warna_1 }";
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

$i++;


// ---------------------------------------END FRONT GRID 1-------------------------------------------------




//-----------------------------------------FRONTEND GRID 2--------------------------------
// $grid[1] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'Spare'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'Urutan Unit',
// 'Serial Number',
// 'Warna',
// 'Status',
// 'nomorstatus_warna_spare'
// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "urutan_unit",
//     "nomor",
//     "warna",
//     "status_silinder",
//     "nomorstatus_warna_spare"
// );


// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
//     urutan_unit:'',
//     nomor:'',
//     warna:'',
//     status_silinder:'',
//     nomorstatus_warna_spare:''
// }";


// $j = 0;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'urutan_unit'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'urutan_unit'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'warna'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'warna'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'status_silinder'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'status_silinder'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_status_warna }";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorstatus_warna_spare'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorstatus_warna_spare'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
// $j++;

// $i++;
// ---------------------------------------END FRONT GRID 1-------------------------------------------------






// ============================== UPLOAD ============================================


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
		kategori = 'PEMESANAN_SILINDER' AND 
		file_tabel = '$file_tabel' AND 
		file_nomor = $file_nomor");
    $file_count = mysqli_num_rows($file_query);

    $arr_images = array();

    if ($file_count > 0) {
        $edit["field"][$i]["input_element"] = '';
        $count_i = 0;
        while ($row = mysqli_fetch_assoc($file_query)) {
            $json[] = $row;
            array_push($arr_images, $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "PEMESANAN_SILINDER" . "/" . $json[$count_i]["nama"]));
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

$test = $_GET["mmp"];
echo $test;
// ========================================================= end test==============================


if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*,
        DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
        DATE_FORMAT(a.tanggal_eta,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_eta,
        CONCAT(cust_barang.kode_alias, ' - ', b.nama_alias, ' - ' , BINARY FORMAT(b.gramasi, 2), ' - ',  b.nama, '|', b.nomor) AS 'browse|nomorthbarang',
        CONCAT(d.nama, '|', d.nomor) AS 'browse|nomormhrelasi_supplier',
        c.nama as customer_view,
        c.kode_alias as alias_customer
	FROM " . $edit["table"] . " a
    join thbarang b on b.nomor = a.nomorthbarang
    JOIN mhrelasi cust_barang ON cust_barang.nomor = b.nomormhrelasi
    join mhrelasi c on c.nomor = a.nomormhrelasi
    join mhrelasi d on d.nomor = a.nomormhrelasi_supplier
    WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));



    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*,
    (@counter := @counter + 1) - 1 AS urutan_unit,
    a.urutan_unit AS original_urutan_unit,
    b.nama AS status_silinder
    FROM " . $edit["detail"][0]["table_name"] . " a
    LEFT JOIN status_warna_spare b ON b.nomor = a.nomorstatus_warna_spare
    CROSS JOIN (SELECT @counter := 0) AS counter_init
    WHERE a.status_aktif > 0
    AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];


    //query grid detail 1
    // $edit["field"][$grid[1]]["grid_set"]["query"] = "
    // SELECT
    // a.*,
    // b.nama as status_silinder
    // FROM " . $edit["detail"][1]["table_name"] . " a
    // left join status_warna_spare b on b.nomor = a.nomorstatus_warna_spare
    // where a.status_aktif > 0
    // AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"]; 


    $edit = fill_value($edit, $r);
}



$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$features = "save|back|reload|add" . check_approval($r, "edit|approve|print|delete|disappr");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);

// if ($edit["mode"] != "add") {
//     $edit_navbutton["field"][$i]["input_element"]             = "a";
//     $edit_navbutton["field"][$i]["input_float"]               = "right";
//     $edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
//     $edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
//     $edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
//     $edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
//     $edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
//         "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=PEMESANAN_SILINDER&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
//     $i++;
// }
?>


<!-- <?php if ($edit["mode"] == "view") : ?>
    <script>
        $(document).ready(function() {
            $('#surface').attr('disabled', 'disabled');
            $('#newbase').attr('disabled', 'disabled');
            $('#oldbase').attr('disabled', 'disabled');
            $('#reverse').attr('disabled', 'disabled');
            $('#ada').attr('disabled', 'disabled');
            $('#tidakada').attr('disabled', 'disabled');
            $('#engrave').attr('disabled', 'disabled');
            $('#laser').attr('disabled', 'disabled');
            $('#ikutexisting').attr('disabled', 'disabled');
            $('#mmp').attr('disabled', 'disabled');
            $('#customer').attr('disabled', 'disabled');
        });
    </script>
<?php endif; ?> -->



<script type="text/javascript">
    function test() {
        var kode = $("#kode").val();
        var jenis = $('#jenis').val();
        var edit_mode = '<?= $edit['mode'] ?>'
        if (edit_mode == 'edit') {
            kode = kode.substr(0, 5)
        }

        console.log({
            kode
        })


        var kepemilikan = ''
        var alias_customer = $('#alias_customer').val()
        var mmp = parseFloat($('#mmp').val())
        var customer = parseFloat($('#customer').val())

        console.log({
            alias_customer,
            mmp,
            customer
        })

        if (mmp) {
            kepemilikan = 'MMP'
        } else if (customer) {
            kepemilikan = alias_customer ?? 'CUSTOMER'
        } else {
            kepemilikan = 'NONE'
        }

        kepemilikan = 'MMP'

        console.log({
            kepemilikan
        })


        const currentDate = new Date();
        const year = currentDate.getFullYear().toString().substr(-2);
        const month = ('0' + (currentDate.getMonth() + 1)).slice(-2);
        const code = `${kode}/${jenis}/${kepemilikan}/${month}/20${year}`;

        $('#kode_custom').val(code);

        return code;
    }


    function test_circum() {
        var height = $('#height').val();
        var pitch = $('#pitch').val();
        var circum = height * pitch;

        $('#circum').val(circum);
    }


    function test_css() {
        // Get the element by its ID
        const element = document.getElementById('kode_custom');

        // Set the CSS style
        element.style.color = 'red';
        element.style.fontSize = '20px';


    }

    function addWorkDays(startDate, days) {
        if (isNaN(days)) {
            console.log("Value provided for \"days\" was not a number");
            return
        }
        if (!(startDate instanceof Date)) {
            console.log("Value provided for \"startDate\" was not a Date object");
            return
        }
        // Get the day of the week as a number (0 = Sunday, 1 = Monday, .... 6 = Saturday)
        var dow = startDate.getDay();
        var daysToAdd = parseInt(days);
        // If the current day is Sunday add one day
        if (dow == 0)
            daysToAdd++;
        // If the start date plus the additional days falls on or after the closest Saturday calculate weekends
        if (dow + daysToAdd >= 6) {
            //Subtract days in current working week from work days
            var remainingWorkDays = daysToAdd - (5 - dow);
            //Add current working week's weekend
            daysToAdd += 2;
            if (remainingWorkDays > 5) {
                //Add two days for each working week by calculating how many weeks are included
                daysToAdd += 2 * Math.floor(remainingWorkDays / 5);
                //Exclude final weekend if remainingWorkDays resolves to an exact number of weeks
                if (remainingWorkDays % 5 == 0)
                    daysToAdd -= 2;
            }
        }
        startDate.setDate(startDate.getDate() + daysToAdd);
        return startDate;
    }

    function setEstimasi() {
        console.log(setEstimasi)
        var from = $("#tanggal").val().split("/");
        var date1 = new Date(from[2], from[1] - 1, from[0]);
        var days = 7;

        var tanggal_eta = addWorkDays(date1, days);

        console.log({
            tanggal_eta
        })

        var dd = pad(tanggal_eta.getDate(), 2);
        var mm = pad(tanggal_eta.getMonth() + 1, 2); //January is 0!
        var yyyy = tanggal_eta.getFullYear();

        var datetanggaljatuhtempo = dd + '/' + mm + '/' + yyyy;
        // date1.setDate(date1.getDate() + parseInt(days));

        // calculate date1 add 7 days only work days, skip weekend





        console.log({
            datetanggaljatuhtempo
        });
        document.getElementById('tanggal_eta').value = datetanggaljatuhtempo;
        $("#tanggal_eta").val(datetanggaljatuhtempo);
    }

    function pad(str, max) {
        str = str.toString();
        return str.length < max ? pad("0" + str, max) : str;
    }



    $(document).ready(function() {
        calculate_all();
        test_circum();

    });


    // $(document).ready(function() { 
    // 	calculate_all()
    // })

    function calculate_all() {

        var ppn = $('#ppn').val();
        console.log(ppn);
        if (ppn == 1) {
            $('#sum_ppn_<?= $edit["detail"][0]["grid_id"] ?>').val(<?php echo ($_SESSION["setting"]["ppn"]); ?>);
            $('#sum_ppn_<?= $edit["detail"][0]["grid_id"] ?>').attr('readonly', true);
            $('.ppn_section').removeClass('hide');
        } else {
            $('#sum_ppn_<?= $edit["detail"][0]["grid_id"] ?>').val(0);
            $('#sum_ppn_<?= $edit["detail"][0]["grid_id"] ?>').attr('readonly', true);
            $('.ppn_section').addClass('hide');
        }
    }

    function checkHeader() {

        test();

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


<?php include "x_tab_data_images_test.php"; ?>