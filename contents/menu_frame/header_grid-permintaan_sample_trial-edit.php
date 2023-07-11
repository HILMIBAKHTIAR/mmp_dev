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



// //------------------------------------------------GRID DATA 1------------------------------------------------------
// $i = 0;
// $edit["detail"][$i]["table_name"] = "tdspesifikasiproduk";
// $edit["detail"][$i]["field_name"] = array(
//     "warna",
//     "jumlah",
//     "nomormhwarna"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
// $i++;
// //------------------------------------------------END GRID DATA 1------------------------------------------------------


// //------------------------------------------------GRID DATA 2------------------------------------------------------
// $edit["detail"][$i]["table_name"] = "tdspesifikasiproduk_komposisi";
// $edit["detail"][$i]["field_name"] = array(
//     "nomor",
//     "komposisi",
//     "mikron",
//     "grid_ke",
//     "nomormhbarang"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "grid_ke = 1";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_komposisi1";
// $i++;
// //------------------------------------------------END GRID DATA 2------------------------------------------------------



// //------------------------------------------------GRID DATA 3------------------------------------------------------
// $edit["detail"][$i]["table_name"] = "tdspesifikasiproduk_komposisi";
// $edit["detail"][$i]["field_name"] = array(
//     "nomor",
//     "komposisi",
//     "mikron",
//     "grid_ke",
//     "nomormhbarang"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "grid_ke = 2";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_komposisi2";
// $i++;
// //------------------------------------------------END GRID DATA 3------------------------------------------------------





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


$edit["field"][$i]["label"] = "No. Registrasi";
$edit["field"][$i]["input"] = "kode_custom";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
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

$edit["field"][$i]["label"]                     = "Departement";
$edit["field"][$i]["input"]                        = "department";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"]                 = "SALES";
$i++;

$edit["field"][$i]["label"]                     = "Sample/Trial Untuk Konsumen";
$edit["field"][$i]["input"]                        = "customer";
$i++;

$edit["field"][$i]["label"]                         = "Tahapan Test";
$edit["field"][$i]["input"]                         = "tahapan_test";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_option"]                     = array("baru|Baru", "ulang_1|Ulang 1",  "ulang_2|Ulang 2", "ulang_3|Ulang 3");
$i++;

$edit["field"][$i]["label"]                     = "nama sample";
$edit["field"][$i]["input"]                        = "nama_sample";
$i++;

$edit["field"][$i]["label"]                     = "komposisi";
$edit["field"][$i]["input"]                        = "komposisi";
$i++;

$edit["field"][$i]["label"]                     = "ukuran";
$edit["field"][$i]["input"]                        = "ukuran";
$i++;

$edit["field"][$i]["label"]                     = "Quantity Sample (Roll)";
$edit["field"][$i]["input"]                        = "qty_sample";
$i++;

$edit["field"][$i]["label"]                     = "Jenis Packaging";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhjenispackaging";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_jenis_packaging";
$i++;

$edit["field"][$i]["label"]                     = "Peruntukan";
$edit["field"][$i]["input"]                        = "peruntukan";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"] = "Printing";
$edit["field"][$i]["input"] = "printing";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("print|Print", "no_print|No Print", "surface|Surface", "reserve|Reserve");
$i++;

$edit["field"][$i]["label"]                     = "core";
$edit["field"][$i]["input"]                        = "core";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                         = "Arah Gulungan";
$edit["field"][$i]["input"]                         = "arah_gulungan";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_option"]                     = array("terbaca|Terbaca", "ticak terbaca|Tidak Terbaca", "bebas|Bebas");
$i++;

$edit["field"][$i]["label"]                     = "keterangan";
$edit["field"][$i]["input"]                        = "keterangan";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
// $edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;

$edit["field"][$i]["label"]                     = "alamat kirim sample";
$edit["field"][$i]["input"]                        = "alamat_kirim_sample";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
// $edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;


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
    a.*,
    DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal
    , CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhjenispackaging'
    FROM thpermintaananalisasampletrial a
    join mhjenispackaging b on b.nomor = a.nomormhjenispackaging
    WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));



    //query grid detail 1
    // $edit["field"][$grid[0]]["grid_set"]["query"] = "
	// SELECT
    // a.*
	// FROM " . $edit["detail"][0]["table_name"] . " a
    // where a.status_aktif > 0
	// AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];

    // //query grid detail 2
    // $edit["field"][$grid[1]]["grid_set"]["query"] = "
    // SELECT
    // a.*
    // FROM " . $edit["detail"][1]["table_name"] . " a
    // where a.status_aktif > 0
    // AND a.grid_ke = 1
    // AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];

    // //query grid detail 3
    // $edit["field"][$grid[2]]["grid_set"]["query"] = "
	// SELECT
    // a.*
	// FROM " . $edit["detail"][2]["table_name"] . " a
    // where a.status_aktif > 0
    // AND a.grid_ke = 2
	// AND a." . $edit["detail"][2]["foreign_key"] . " = " . $_GET["no"];



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
        const code = `${kode}/PST/${month}/20${year}`;

        $('#kode_custom').val(code);

        return code;
    }


    // function calculate_thickness() {
    //     var komposisi_material_1 = parseFloat($('#komposisi_material_1').val());
    //     var komposisi_material_2 = parseFloat($('#komposisi_material_2').val());
    //     var total_thickness = komposisi_material_1 + komposisi_material_2;

    //     $('#total_thickness').val(total_thickness);
    // }

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

<?php include "x_tab_data_images.php"; ?>