<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];
// $edit["unique"]             = array("no_md", "nomorthbarang");
// $edit["manual_save"] = "contents/menu_frame/" . $_SESSION["g.frame"] . "-" . $_SESSION["g.menu"] . "-save.php";


// SETTING DATA GRID FOR SAVE
// $i = 0;
// $edit["detail"][$i]["table_name"] = "tdbarangcustomer";
// $edit["detail"][$i]["field_name"] = array(
//     "proses",
//     "nomor"
// );
// $edit["detail"][$i]["foreign_key"]      = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "";
// $edit["detail"][$i]["string_id"]        = "";
// $edit["detail"][$i]["grid_id"]          = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];
// $i++;
// END SETTING DATA GRID


$edit["sp_approve"] = "sp_disetujui_thcylinderapprove";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_thcylinderapprove";
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
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomorthdashboardcylinder";
// $edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_dashboard_cylinder";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
// $edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "customer";
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhrelasi_customer";
// $edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_customer";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["browse_set"]["param_output"] = array(
    "email|email"
);
$i++;

$edit["field"][$i]["label"] = "Send";
$edit["field"][$i]["input"] = "tanggal_kirim";
$edit["field"][$i]["label_class"] = "req ";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

$edit["field"][$i]["label"] = "Customer Approval Date";
$edit["field"][$i]["input"] = "tanggal_approvecustomer";
$edit["field"][$i]["label_class"] = "req ";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

// $edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]                  = "";
$edit["field"][$i]["input"] = "load_grid_detail_button";
$edit["field"][$i]["input_col"] = "col-sm-2";
$edit["field"][$i]["input_value"] = "Send to Customer";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_attr"]["style"] = "text-align:center;background-color:#1c557b;color:white;background-image:none;cursor:pointer;font-size:12px";
$edit["field"][$i]["input_attr"]["onclick"] = "generate_master_cylinder()";
$edit["field"][$i]["input_save"]             = "skip";
$i++;


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
		kategori = 'CYLINDER_APPROVE' AND 
		file_tabel = '$file_tabel' AND 
		file_nomor = $file_nomor");
    $file_count = mysqli_num_rows($file_query);

    $arr_images = array();

    if ($file_count > 0) {
        $edit["field"][$i]["input_element"] = '';
        $count_i = 0;
        while ($row = mysqli_fetch_assoc($file_query)) {
            $json[] = $row;
            array_push($arr_images, $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_APPROVE" . "/" . $json[$count_i]["nama"]));
            $edit["field"][$i]["input_element"] .= '<div id="uploaded_file_' . $json[$index]["nomor"] . '">';
            $directory = str_replace("'", "\'", $json[$index]["nama"]);
            $directory_details = explode(".", $directory);
            // echo($directory_details[1]);
            if ($edit["mode"] == "edit")
                if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
                    if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                        $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_APPROVE" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                    else
                        $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_APPROVE" . "/" . $json[$index]["nama"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
                else
					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_APPROVE" . "/" . $json[$index]["nama"])  . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                else
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_APPROVE" . "/" . $json[$index]["nama"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
            else	
				if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
                if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_APPROVE" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                else
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_APPROVE" . "/" . $json[$index]["nama"])  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
            else
					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_APPROVE" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
            else
                $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_APPROVE" . "/" . $json[$index]["nama"])  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';


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
        DATE_FORMAT(a.tanggal_approvecustomer,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_approvecustomer,
        CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhrelasi_customer',
        CONCAT(c.kode, '|', c.nomor) AS 'browse|nomorthdashboardcylinder'
    FROM thcylinderapprove a
    left join mhrelasi b on a.nomormhrelasi_customer = b.nomor
    join thdashboardcylinder c on a.nomorthdashboardcylinder = c.nomor
    WHERE a.nomor = " . $_GET["no"];

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
        "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $_GET["no"] . "&table=" . $edit["table"] . "&tipe=CYLINDER_APPROVE&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
    $i++;
}
$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$features = "save|back|reload" . check_approval($r, "edit|approve|disappr");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);
?>

<script type="text/javascript">
    $(document).ready(function() {

    });

    function test_css() {
        // Get the element by its ID
        const element = document.getElementById('arah_baca');
        const br = document.createElement('br');
        const newDiv = document.createElement('div');

        newDiv.innerHTML = 'This is a new div element!';

        // Set the CSS style
        element.style.color = 'red';

        element.appendChild(newDiv);

    }

    function test() {

        var nama = $('#nama').val();
        var ukuran_barang_jadi = $('#ukuran_barang_jadi').val();
        var kode = $('#kode').val();
        var kode_alias = $('#kode_alias').val();

        var tipe_nomor = $('#browse_master_customer_hidden').val();
        var tipe_nama = $('#browse_master_customer_search').val();
        if (tipe_nomor != '' && tipe_nama != '') {
            $('#browse_master_customer_selected').html('<a href="?m=master_customer&f=header_grid&sm=edit&a=view&no=' + tipe_nomor + '" target="_blank">' + tipe_nama + '</a>');
        }



        kode = '';
        if (kode_alias != '' && kode_alias != '-') {
            kode += kode_alias;
        }
        if (nama != '' && nama != '-') {
            kode += '-' + nama;
        }
        if (ukuran_barang_jadi != '' && ukuran_barang_jadi != '-') {
            kode += ' ' + ukuran_barang_jadi;
        }

        $('#kode').val(kode);
    }

    function generate_master_cylinder() {
        $.ajax({
            type: "post",
            url: "pages/generate_cylinder.php",
            data: {
                nomorthbarang: parseInt(<?= $_GET['no'] ?>)
            },
            success: function(response) {
                var data = JSON.parse(response);
                console.log({
                    data
                })

                if (data.message) {
                    return alert(data.message)
                }
            },
            error: function() {
                alert("Pengecekan gagal (Network error)");
            }
        });
    }



    function ukuran_barang_test() {
        var panjang_cilinder = $('#panjang_cilinder').val();
        var width = $('#width').val();
        var height = $('#height').val();
        var ukuran_barang_jadi = $('#ukuran_barang_jadi').val();


        if (ketebalan != '' && ketebalan != '-') {
            var parsedKetebalan = parseFloat(ketebalan);
            if (!isNaN(parsedKetebalan)) {
                ketebalan = parsedKetebalan + ' micron';
                $('#ketebalan').val(ketebalan);
            }
        }

        if (lebar != '' && lebar != '-') {
            var parsedLebar = parseFloat(lebar);
            if (!isNaN(parsedLebar)) {
                lebar = parsedLebar + ' mm';
                $('#lebar').val(lebar);
            }
        }

        if (panjang != '' && panjang != '-') {
            var parsedPanjang = parseFloat(panjang);
            if (!isNaN(parsedPanjang)) {
                panjang = parsedPanjang + ' m';
                $('#panjang').val(panjang);
            }
        }

        nama = '';
        if (tipe_nama != '' && tipe_nama != '-') {
            nama += tipe_nama;
        }
        if (ketebalan != '' && ketebalan != '-') {
            nama += 'x' + ketebalan;
        }
        if (lebar != '' && lebar != '-') {
            nama += 'x' + lebar;
        }
        if (panjang != '' && panjang != '-') {
            nama += 'x' + panjang;
        }

        $('#nama').val(nama);
        $('#ukuran_barang_jadi').val(panjang);
        $('#doi').val(30);

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