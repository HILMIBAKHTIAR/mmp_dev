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


$edit["sp_approve"] = "sp_disetujui_thcylinderproses";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_thcylinderproses";
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

$edit["field"][$i]["label"] = "Tanggal";
$edit["field"][$i]["input"] = "tanggal";
$edit["field"][$i]["label_class"] = "req ";
$edit["field"][$i]["input_class"] = "required date_1";
$edit["field"][$i]["input_attr"]["onchange"] = "setEstimasi()";
$i++;
$edit["field"][$i]["label"] = "Estimasi Arrival";
$edit["field"][$i]["input"] = "tanggal_estimasi";
$edit["field"][$i]["label_class"] = "req ";
$edit["field"][$i]["input_class"] = "required date_1";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;

$edit["field"][$i]["label"]                  = "";
$edit["field"][$i]["input"] = "load_grid_detail_button";
$edit["field"][$i]["input_col"] = "col-sm-3";
$edit["field"][$i]["input_value"] = "Generate Pemesanan Cylinder";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_attr"]["style"] = "text-align:center;background-color:#1c557b;color:white;background-image:none;cursor:pointer;font-size:12px;margin-left:50px;margin-top:20px;";
$edit["field"][$i]["input_attr"]["onclick"] = "generate_pemesanan_cylinder()";
$edit["field"][$i]["input_save"]             = "skip";
$i++;

$edit["field"][$i]["input_save"] = "skip";
$edit["field"][$i]["form_group_class"]       = "hiding";
$edit["field"][$i]["label"] = "nomorthbarang";
$edit["field"][$i]["input"] = "nomorthbarang";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;

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
		kategori = 'CYLINDER_PROSES' AND 
		file_tabel = '$file_tabel' AND 
		file_nomor = $file_nomor");
    $file_count = mysqli_num_rows($file_query);

    $arr_images = array();

    if ($file_count > 0) {
        $edit["field"][$i]["input_element"] = '';
        $count_i = 0;
        while ($row = mysqli_fetch_assoc($file_query)) {
            $json[] = $row;
            array_push($arr_images, $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_PROSES" . "/" . $json[$count_i]["nama"]));
            $edit["field"][$i]["input_element"] .= '<div id="uploaded_file_' . $json[$index]["nomor"] . '">';
            $directory = str_replace("'", "\'", $json[$index]["nama"]);
            $directory_details = explode(".", $directory);
            // echo($directory_details[1]);
            if ($edit["mode"] == "edit")
                if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
                    if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                        $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_PROSES" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                    else
                        $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_PROSES" . "/" . $json[$index]["nama"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
                else
					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_PROSES" . "/" . $json[$index]["nama"])  . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                else
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_PROSES" . "/" . $json[$index]["nama"]) . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
            else	
				if ($r["directory"] == $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", $json[$index]["nama"]))
                if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_PROSES" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
                else
                    $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled checked onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_PROSES" . "/" . $json[$index]["nama"])  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';
            else
					if (strtolower($directory_details[1]) == 'jpg' || strtolower($directory_details[1]) == 'jpeg' || strtolower($directory_details[1]) == 'png')
                $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" >&nbsp;&nbsp;' . '<img src=' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_PROSES" . "/" . $json[$index]["nama"]) . "'" . ' style="vertical-align:middle;margin:0px 50px" width="300px !important;">' . '&nbsp;&nbsp;</a>';
            else
                $edit["field"][$i]["input_element"] .= '<input type="radio" name="upload" disabled onclick="setFile(' . "'" . str_replace("'", "\'", $json[$index]["nama"]) . "'" . ')"><a class="btn btn-outline btn-midnight" style= "white-space: normal; margin-left:2%; width:80%;margin-bottom:12px" onclick="window.open(' . "'" . $_SESSION["setting"]["dir_upload"] . "/" . str_replace("'", "\'", "CYLINDER_PROSES" . "/" . $json[$index]["nama"])  . "'" . ')">&nbsp;&nbsp;' . $json[$index]["kategori"] . " : " . $json[$index]["nama"] . '&nbsp;&nbsp;</a>';


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
        b.nomorthbarang as nomorthbarang,
        DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
        DATE_FORMAT(a.tanggal_estimasi,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_estimasi,
        CONCAT(b.kode, '|', b.nomor) AS 'browse|nomorthdashboardcylinder'
    FROM thcylinderproses a
    join thdashboardcylinder b on a.nomorthdashboardcylinder = b.nomor 
    WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));

    $edit = fill_value($edit, $r);
}


$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$features = "save|back|reload" . check_approval($r, "edit|approve|disappr");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);

if ($edit["mode"] != "add") {
    $i++;
    $edit_navbutton["field"][$i]["input_element"]             = "a";
    $edit_navbutton["field"][$i]["input_float"]               = "right";
    $edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
    $edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
    $edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
    $edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
    $edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
    "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $_GET["no"] . "&table=" . $edit["table"] . "&tipe=CYLINDER_PROSES&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
    $i++;
}
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

    function generate_pemesanan_cylinder() {
        var nomorthhbarang = $('#nomorthhbarang').val();
        var nomorthcylinderproses = parseInt(<?= $_GET['no'] ?>)
        $.ajax({
            type: "post",
            url: "pages/generate_pemesanan_cylinder.php",
            data: {
                // nomorthbarang: parseInt(nomorthbarang),
                nomorthcylinderproses: parseInt(nomorthcylinderproses)
            },
            success: function(response) {
                var data = JSON.parse(response);
                console.log({
                    data
                })

                if (data.error) {
                    return alert(data.error)
                }

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

    // function setEstimasi() {
    //     var inputTanggal = document.getElementById("tanggal").value;
    //     var tanggal = new Date(inputTanggal);
    //     tanggal.setDate(tanggal.getDate() + 3);
    //     var estimasi = tanggal.toISOString().split('T')[0];
    //     document.getElementById("tanggal_estimasi").value = tanggal_estimasi;
    // }

    function pad(str, max) {
        str = str.toString();
        return str.length < max ? pad("0" + str, max) : str;
    }


    function setEstimasi() {
        var from = $("#tanggal").val().split("/");
        var date1 = new Date(from[2], from[1] - 1, from[0]);
        var days = 7;
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
        document.getElementById('tanggal_estimasi').value = datetanggaljatuhtempo;
        $("#tanggal_estimasi").val(datetanggaljatuhtempo);
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