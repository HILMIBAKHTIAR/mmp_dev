<?php
$edit["debug"]       = 1;
$edit["uppercase"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];


//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdpermintaananalisasample";
$edit["detail"][$i]["field_name"] = array(
    "produk",
    "nomormhjenispackaging",
    "nomor"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------


// $edit["sp_approve"] = "sp_disetujui_order_beli_fix";
$edit["sp_approve"] = "sp_disetujui_thpermintaananalisasample";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_thpermintaananalisasample";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";




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


$edit["field"][$i]["label"]                         = "Kode";
$edit["field"][$i]["input"]                         = "kode";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"]                 = formatting_code($con, $edit["string_code"]);
$i++;


$edit["field"][$i]["label"]       = "Tanggal";
$edit["field"][$i]["input"]       = "tanggal";
$edit["field"][$i]["input_class"] = "required date_1";
if ($edit["mode"] == "add") {
    $edit["field"][$i]["input_value"] = date("d/m/Y");
}
if ($query_detail["total"] > 0) {
    $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
}
$i++;


$edit["field"][$i]["label"]                     = "Departement";
$edit["field"][$i]["input"]                        = "department";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"]                 = "SALES";
$i++;

$edit["field"][$i]["label"]                         = "Customer";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input"]                         = "customer_analisa";
$i++;

$edit["field"][$i]["label"]                     = "Sales";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhpegawai_sales";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_sales";
$i++;



// $edit["field"][$i]["label"] 						= "Customer";
// $edit["field"][$i]["input"] 						= "nomormhrelasi";
// $edit["field"][$i]["input_element"] 				= "browse";
// $edit["field"][$i]["browse_setting"] 				= "master_customer";
// $i++;



//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Produk'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = " 
'Nama Produk',
'Jenis Packaging',
'Upload Image',
'Image',
'nomormhjenispackaging',
'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "produk",
    "jenis_packaging",
    "view",
    "image",
    "nomormhjenispackaging",
    "nomor"
);

$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ }";

$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "['produk']";
$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'produk'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'produk'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jenis_packaging'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jenis_packaging'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_jenis_packaging }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'view'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'view'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'image'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'image'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhjenispackaging'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhjenispackaging'";
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


$edit["field"][$i]["label"]              = "Catatan";
$edit["field"][$i]["label_col"] = "col-sm-12";
$edit["field"][$i]["label_attr"]["style"] = "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"] = "catatan";
$edit["field"][$i]["input_class"] = "";
$edit["field"][$i]["input_col"] = "col-sm-6";
$edit["field"][$i]["input_element"] = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "10";
$edit["field"][$i]["input_attr"]["cols"] = "70";
$i++;


// ================================================================================== UPLOAD ======================================================

// $index = 0;
// if ($edit["mode"] != "add") {
//     $edit["field"][$i]["box_tab"]             = "upload";
//     $edit["field"][$i]["input_col"]         = 'col-sm-8 col-sm-offset-2';
//     $edit["field"][$i]["input_element"]     = 'No Uploaded File';

//     $file_nomor = $_GET["no"];
//     $file_tabel = $edit["table"];
//     $file_query = mysqli_query($con, " 
// 	SELECT * 
// 	FROM mharchievedfiles 
// 	WHERE 
// 		status_aktif > 0 AND 
// 		kategori = 'PERMINTAAN_ANALISA_SAMPEL' AND 
// 		file_tabel = '$file_tabel' AND 
// 		file_nomor = $file_nomor");
//     $file_count = mysqli_num_rows($file_query);

//     $arr_images = array();

//     if ($file_count > 0) {
//         $edit["field"][$i]["input_element"] = '';
//         $count_i = 0;
//         while ($row = mysqli_fetch_assoc($file_query)) {
//             $json[] = $row;
//             array_push($arr_images, $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "PERMINTAAN_ANALISA_SAMPEL" . "/" . rawurlencode($json[$count_i]["nama"])));
//             $edit["field"][$i]["input_element"] .= '<div id="uploaded_file_' . $json[$index]["nomor"] . '">';
//             $directory = str_replace("'", "\'", $json[$index]["nama"]);
//             $directory_details = explode(".", $directory);
//             // echo($directory_details[1]);
//             if ($edit["mode"] == "edit")
//                 if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
//                     if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
//                         $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "PERMINTAAN_ANALISA_SAMPEL" . "/" . rawurlencode($json[$index]["nama"])) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
//                     else
//                         $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "PERMINTAAN_ANALISA_SAMPEL" . "/" . rawurlencode($json[$index]["nama"])) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
//                 else
// 					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
//                     $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "PERMINTAAN_ANALISA_SAMPEL" . "/" . rawurlencode($json[$index]["nama"]))  . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
//                 else
//                     $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "PERMINTAAN_ANALISA_SAMPEL" . "/" . rawurlencode($json[$index]["nama"])) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
//             else	
// 				if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
//                 if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
//                     $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "PERMINTAAN_ANALISA_SAMPEL" . "/" . rawurlencode($json[$index]["nama"])) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
//                 else
//                     $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "PERMINTAAN_ANALISA_SAMPEL" . "/" . rawurlencode($json[$index]["nama"]))  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
//             else
// 					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
//                 $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "PERMINTAAN_ANALISA_SAMPEL" . "/" . rawurlencode($json[$index]["nama"])) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
//             else
//                 $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "PERMINTAAN_ANALISA_SAMPEL" . "/" . rawurlencode($json[$index]["nama"]))  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';


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
//     $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
//     $i++;
// }


// ==================================================================================END UPLOAD ======================================================



if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*,
    DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
    CONCAT(sales.nama, '|', sales.nomor) AS 'browse|nomormhpegawai_sales'
    FROM thpermintaananalisasample a
    JOIN mhpegawai sales ON sales.nomor = a.nomormhpegawai_sales 
    WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));

    $button_link_action = "CONCAT('<center><a class=\"btn btn-info btn-app-sm\"><i class=\"fa fa-upload\" onclick=\"viewDataImage(',a.nomor,')\" title=\"View Data\"></i></a></center>')";
    //query grid detail 1
    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT z.* FROM (SELECT
    a.nomor, a.produk,
    a.nomormhjenispackaging,
    b.nama as jenis_packaging,
    " . $button_link_action . " as view,
    CONCAT('<img style=\"width: 100px;\" src=\"uploads/', c.directory, '\">') as image
	FROM " . $edit["detail"][0]["table_name"] . " a
    JOIN mhjenispackaging b on b.nomor = a.nomormhjenispackaging
    LEFT JOIN mharchievedfiles c ON a.nomor = c.file_nomor
    AND c.file_tabel = 'tdpermintaananalisasample'
    AND c.status_aktif > 0
    where a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"] . ") z
    GROUP BY z.nomor";

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
//         "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=PERMINTAAN_ANALISA_SAMPEL&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
//     $i++;
// }

?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tabimages").prependTo("#tab_i1_data");
    });

    function setFile(directory) {
        $("#directory").val(directory);
        $("#itemspec").val(1);
    }

    function viewDataImage(nomor) {
        return link_confirmation(
            `Upload File`,
            `?m=master_archieve&f=header_grid&sm=edit&id=${nomor}&no=<?= $_GET["no"] ?>&table=tdpermintaananalisasample&tipe=PERMINTAAN_ANALISA_SAMPEL&menu=<?= $_SESSION["g.menu"] ?>&url=<?= $_SESSION["g.url"] ?>`,
            '',
            'Upload',
            'fa fa-upload|btn-dark'
        );
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