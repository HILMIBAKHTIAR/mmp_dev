<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];
// $edit["unique"]             = array("no_md", "nomorthbarang");
// $edit["manual_save"] = "contents/menu_frame/" . $_SESSION["g.frame"] . "-" . $_SESSION["g.menu"] . "-save.php";


// SETTING DATA GRID FOR SAVE
$i = 0;
$edit["detail"][$i]["table_name"] = "tdcylindermaker_kombinasidesign";
$edit["detail"][$i]["field_name"] = array(
    "nama_barang",
    "nomorthbarangcustomer",
    "nomor"
);
$edit["detail"][$i]["foreign_key"]      = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"]        = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_kombinasi";
$i++;
// END SETTING DATA GRID


$edit["sp_approve"] = "sp_disetujui_thcylindermaker";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_thcylindermaker";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";



$i = 0;

if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "upload|Upload", "info|Info");
} else {
    if (isset($_GET["no"])) {
        $edit["field"][$i]["box_tabs"] = array("data|Data", "upload|Upload", "info|Info");
    } else {
        $edit["field"][$i]["box_tabs"] = array("data|Data", "upload|Upload", "info|Info");
    }
}


$edit["field"][$i]["box_tab"] = "data";

$edit["field"][$i]["label"]                     = "kode cylinder";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomorthdashboardcylinder";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_dashboard_cylinder";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;

// $edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "Customer";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhrelasi_customer";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$edit["field"][$i]["browse_setting"]             = "master_customer";
$i++;
$edit["field"][$i]["label"]                     = "Supplier";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhrelasi_supplier";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
// $edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$edit["field"][$i]["browse_setting"]             = "master_supplier_silinder";
$edit["field"][$i]["browse_set"]["param_output"] = array(
    "email|email"
);
$i++;

$edit["field"][$i]["label"] = "barang";
$edit["field"][$i]["input"] = "barang";
// $edit["field"][$i]["input_class"] = "required";
// $edit["field"][$i]["label_class"] = "req";
$i++;

// $edit["field"][$i]["label"] = "nomorthbarang";
// $edit["field"][$i]["input"] = "nomorthbarang";
// // $edit["field"][$i]["form_group_class"] = "hiding";
// // $edit["field"][$i]["input_class"] = "required";
// // $edit["field"][$i]["label_class"] = "req";
// $i++;

$edit["field"][$i]["label"] = "Send";
$edit["field"][$i]["input"] = "tanggal_kirim";
$edit["field"][$i]["label_class"] = "req ";
$edit["field"][$i]["input_class"] = "required date_1";
$edit["field"][$i]["input_attr"]["onchange"] = "setEstimasi()";
$i++;
$edit["field"][$i]["label"] = "ETA";
$edit["field"][$i]["input"] = "tanggal_eta";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
$edit["field"][$i]["label_class"] = "req ";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

// $edit["field"][$i]["label"]                   = "Kombinasi Design";
// $edit["field"][$i]["input_element"] = "checkbox";
// $edit["field"][$i]["input_col"] = "col-sm-9 ";
// $edit["field"][$i]["input"]            = "kombinasi_design";
// $i++;

// $edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                  = "";
$edit["field"][$i]["input"] = "load_grid_detail_button";
$edit["field"][$i]["input_col"] = "col-sm-2";
$edit["field"][$i]["input_value"] = "Send to Supplier";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_attr"]["style"] = "text-align:center;background-color:#1c557b;color:white;background-image:none;cursor:pointer;font-size:12px; margin-top:30px;margin-left:20 px; ";
// $edit["field"][$i]["input_attr"]["onclick"] = "generate_master_cylinder()";
$edit["field"][$i]["input_save"]             = "skip";
$i++;


$grid[0] = $i;
$edit["field"][$i]["input_element"]                  = "grid";
$edit["field"][$i]["grid_set"]                       = $edit_grid;
$edit["field"][$i]["grid_set"]["id"]                 = $edit["detail"][0]["grid_id"];
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
$edit["field"][$i]["grid_set"]["navgrid"] = 0;
$edit["field"][$i]["grid_set"]["column_autoaddrow"] = 1;
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[ 'nama_barang' ]";
$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nama_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nama_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_barangcustomer }";
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



// $edit["field"][$i]["anti_mode"]     = "add";
// $edit["field"][$i]["label"]         = "Status";
// $edit["field"][$i]["input"]         = "status_aktif";
// $edit["field"][$i]["input_element"] = "select";
// $edit["field"][$i]["input_option"]  = generate_status_option($edit["mode"]);
// $i++;

//======================upload================================//

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
		kategori = 'CYLINDER_MAKER' AND 
		file_tabel = '$file_tabel' AND 
		file_nomor = $file_nomor");
    $file_count = mysqli_num_rows($file_query);

    $arr_images = array();

    if ($file_count > 0) {
        $edit["field"][$i]["input_element"] = '';
        $count_i = 0;
        while ($row = mysqli_fetch_assoc($file_query)) {
            $json[] = $row;
            array_push($arr_images, $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_MAKER" . "/" . $json[$count_i]["nama"]));
            $edit["field"][$i]["input_element"] .= '<div id="uploaded_file_' . $json[$index]["nomor"] . '">';
            $directory = str_replace("'", "\'", $json[$index]["nama"]);
            $directory_details = explode(".", $directory);
            // echo($directory_details[1]);
            if ($edit["mode"] == "edit")
                if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
                    if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                        $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_MAKER" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                    else
                        $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_MAKER" . "/" . $json[$index]["nama"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
                else
					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_MAKER" . "/" . $json[$index]["nama"])  . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                else
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_MAKER" . "/" . $json[$index]["nama"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
            else	
				if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
                if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_MAKER" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                else
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_MAKER" . "/" . $json[$index]["nama"])  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
            else
					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_MAKER" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
            else
                $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_MAKER" . "/" . $json[$index]["nama"])  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';


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
        DATE_FORMAT(a.tanggal_kirim,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_kirim,
        DATE_FORMAT(a.tanggal_eta,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_eta,
        CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhrelasi_customer',
        CONCAT(b1.nama, '|', b1.nomor) AS 'browse|nomormhrelasi_supplier',
        CONCAT(c.kode, '|', c.nomor) AS 'browse|nomorthdashboardcylinder',
        d.nama_barang_customer as barang,
        d.nomor as nomorthbarang
    FROM thcylindermaker a
    LEFT JOIN mhrelasi b on a.nomormhrelasi_customer = b.nomor
    LEFT JOIN mhrelasi b1 on a.nomormhrelasi_supplier = b1.nomor
    JOIN thdashboardcylinder c on a.nomorthdashboardcylinder = c.nomor
    join thbarang d on c.nomorthbarang = d.nomor
    WHERE a.nomor = " . $_GET["no"];

    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT a.*
	FROM " . $edit["detail"][0]["table_name"] . " a
	WHERE a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));

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
        "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $_GET["no"] . "&table=" . $edit["table"] . "&tipe=CYLINDER_MAKER&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
    $i++;
}

$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$features = "save|back|reload" . check_approval($r, "edit|delete|approve|disappr");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);
?>

<script type="text/javascript">
    $(document).ready(function() {
        load_grid_detail()
    });

    function setEstimasi() {
        var from = $("#tanggal_kirim").val().split("/");
        var date1 = new Date(from[2], from[1] - 1, from[0]);
        var days = 3;
        date1.setDate(date1.getDate() + parseInt(days));

        // if datetanggaljatuhtempo is weekend then add 2 days
        var day = date1.getDay();
        if (day == 6) {
            date1.setDate(date1.getDate() + 2);
        } else if (day == 0) {
            date1.setDate(date1.getDate() + 1);
        }

        var dd = pad(date1.getDate(), 2);
        var mm = pad(date1.getMonth() + 1, 2); //January is 0!
        var yyyy = date1.getFullYear();

        var datetanggaljatuhtempo = dd + '/' + mm + '/' + yyyy;



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

    function load_grid_detail() {
        var no = $('#nomorthbarang').val();
        var pages = 'pages/grid_load.php?id=cylinder_maker_detail_kombinasi-load&no=' + no + '';
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

    <?= generate_function_checkgrid($grid_str) ?>
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>
<?php include "x_tab_data_images_md.php"; ?>