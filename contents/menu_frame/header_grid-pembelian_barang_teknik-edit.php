<?php
$edit["debug"]       = 1;
$edit["string_code"]    = "kode_pembelian_barang_teknik";
// $edit["manual_save"] = "contents/menu_frame/" . $_SESSION["g.frame"] . "-" . $_SESSION["g.menu"] . "-save.php";




//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "mdbarangteknik";
$edit["detail"][$i]["field_name"] = array(
    "mesin",
    "nomormhmesin",
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
    $edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info", "upload|Upload");
} else {
    if (isset($_GET["no"])) {
        $edit["field"][$i]["box_tabs"] = array("data|Data", "upload|Upload");
    } else {
        $edit["field"][$i]["box_tabs"] = array("data|Data");
    }
}
$edit["field"][$i]["box_tab"] = "data";


$edit["field"][$i]["form_group_class"]                 = "hiding";
$edit["field"][$i]["label"]                         = "Gudang";
$edit["field"][$i]["input"]                         = "nomormhbarangkelompok";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"]                 = 2;
$i++;



$edit["field"][$i]["label"] = "Kode";
$edit["field"][$i]["input"] = "kode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
$i++;


$edit["field"][$i]["label"]       = "Tanggal Beli";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal_beli";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

$edit["field"][$i]["label"]                     = "Nama";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                        = "nama";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["label"]                     = "Sub Group";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhbarangsubkategori";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_barang_subkategori";
$edit["field"][$i]["browse_set"]["param_output"]     = array("grup|grup");

$i++;

//param output
$edit["field"][$i]["label"]                     = "Group";
$edit["field"][$i]["input"]                        = "grup";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["label"]                         = "Lokasi";
$edit["field"][$i]["input"]                         = "nomormhlokasi";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_setting"]                 = "lokasi_pembelian";
// $edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$i++;


$edit["field"][$i]["label"]                     = "Stock Min";
$edit["field"][$i]["input"]                        = "stock_min";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Stock Max";
$edit["field"][$i]["input"]                        = "stock_max";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["label"]                         = "Unit";
$edit["field"][$i]["input"]                         = "nomormhsatuan";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_setting"]                 = "master_satuan";
$i++;

$edit["field"][$i]["label"]                   = "Jenis";
$edit["field"][$i]["input"]                   = "jenis";
$edit["field"][$i]["input_element"] 				= "select1";
$edit["field"][$i]["input_option"] 					= array("good boy|Good Boy","bad boy|Bad Boy");
$i++;

$edit["field"][$i]["label"]                   = "Non Stock";
$edit["field"][$i]["input_element"] = "checkbox";
$edit["field"][$i]["input_col"] = "col-sm-9 ";
$edit["field"][$i]["input"]            = "non_stock";
$i++;

$edit["field"][$i]["label"]                   = "Discontinue";
$edit["field"][$i]["input_element"] = "checkbox";
$edit["field"][$i]["input_col"] = "col-sm-9 ";
$edit["field"][$i]["input"]            = "discontinue";
$i++;

$edit["field"][$i]["label"]                     = "Status";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhstatusteknik";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_status_teknik";
$i++;






//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Detail Barang'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Mesin',
'nomormhmesin'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "mesin",
    "nomormhmesin"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    mesin:'',
    nomormhmesin:''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'mesin'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'mesin'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_mesin }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhmesin'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhmesin'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$i++;

// ---------------------------------------END FRONT GRID 1-------------------------------------------------





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
		kategori = 'BARANG_TEKNIK' AND 
		file_tabel = '$file_tabel' AND 
		file_nomor = $file_nomor");
    $file_count = mysqli_num_rows($file_query);

    $arr_images = array();

    if ($file_count > 0) {
        $edit["field"][$i]["input_element"] = '';
        $count_i = 0;
        while ($row = mysqli_fetch_assoc($file_query)) {
            $json[] = $row;
            array_push($arr_images, $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "BARANG_TEKNIK" . "/" . $json[$count_i]["nama"]));
            $edit["field"][$i]["input_element"] .= '<div id="uploaded_file_' . $json[$index]["nomor"] . '">';
            $directory = str_replace("'", "\'", $json[$index]["nama"]);
            $directory_details = explode(".", $directory);
            // echo($directory_details[1]);
            if ($edit["mode"] == "edit")
                if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
                    if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                        $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "BARANG_TEKNIK" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                    else
                        $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "BARANG_TEKNIK" . "/" . $json[$index]["nama"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
                else
					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "BARANG_TEKNIK" . "/" . $json[$index]["nama"])  . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                else
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "BARANG_TEKNIK" . "/" . $json[$index]["nama"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
            else	
				if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
                if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "BARANG_TEKNIK" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                else
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "BARANG_TEKNIK" . "/" . $json[$index]["nama"])  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
            else
					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "BARANG_TEKNIK" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
            else
                $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "BARANG_TEKNIK" . "/" . $json[$index]["nama"])  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';


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





$edit = generate_info($edit, $r, "insert|update");


if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*,
    DATE_FORMAT(a.tanggal_beli,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_beli,
    CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhbarangsubkategori',
    CONCAT(c.nama, '|', c.nomor) AS 'browse|nomormhlokasi',
    CONCAT(d.nama, '|', d.nomor) AS 'browse|nomormhsatuan',
    CONCAT(f.nama, '|', f.nomor) AS 'browse|nomormhstatusteknik'
    FROM mhbarang a
    left join mhbarangsubkategori b on a.nomormhbarangsubkategori = b.nomor 
    left join mhlokasi c on a.nomormhlokasi = c.nomor 
    left join mhsatuan d on a.nomormhsatuan = d.nomor 
    left join mhstatusteknik f on f.nomor = a.nomormhstatusteknik
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


    $edit = fill_value($edit, $r);
}

if ($edit["mode"] != "add") {
    $edit_navbutton["field"][$i]["input_element"]             = "a";
    $edit_navbutton["field"][$i]["input_float"]               = "right";
    $edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
    $edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
    $edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
    $edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
    $edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
        "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=BARANG_TEKNIK&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
    $i++;
}

$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
// $edit = generate_info($edit, $r, "insert|update");
$edit_navbutton = generate_navbutton($edit_navbutton);
?>



<script type="text/javascript">
    $(document).ready(function() {
        
    });

    // function kode_custom() {
    //     var kode = $("#kode").val();
    //     var nama_barangkategori = $("#nama_barangkategori").val();
    //     const code = `${nama_barangkategori}-${kode}`;

    //     $('#kode_custom').val(code);

    //     return code;
    // }
    // kode_custom()



    function test() {

        var group = $('#group').val();

        var subkategori_nomor = $('#browse_master_barang_subkategori_hidden').val();
        var subkategori_nama = $('#browse_master_barang_subkategori_search').val();


        if (subkategori_nomor != '' && subkategori_nama != '')
            $('#browse_master_barang_subkategori_selected').html('<a href=\"?m=master_barang_subkategori&f=header_grid&sm=edit&a=view&no=' + subkategori_nomor + '\" target=\"_blank\">' + subkategori_nama + '</a>');

        var group = '';
        if (subkategori_nama != '' && subkategori_nama != '-')
            group += '' + subkategori_nama;
        $('#group').val(group);


    }


    function checkHeader() {
        var fields = [

        ];
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