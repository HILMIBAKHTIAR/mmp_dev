<?php
$edit["debug"]       = 0;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];

$i = 0;
//------------------------------------------------GRID DATA 1------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdlaporanlamination_1";
$edit["detail"][$i]["field_name"] = array(
    "mulai|jqtime_1",
    "selesai|jqtime_1",
    "no_roll",
    "awal",
    "hasil_1",
    "hasil_2",
    "hasil_3",
    "hasil_4",
    "hasil_5",
    "hasil_6",
    "hasil_7",
    "hasil_8",
    "hasil_9",
    "hasil_10",
    "barang_jadi",
    "sortir",
    "sisa",
    "rusak",
    "keterangan"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_1";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------




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

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]       = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

$edit["field"][$i]["label"]                     = "No. SPK";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomorthspk";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_spk";
$edit["field"][$i]["browse_set"]["param_output"] = array(
	"customer|customer",
	"nomormhrelasi|nomormhrelasi"
);
if ($edit["mode"] == "add")
    $edit["field"][$i]["browse_set"]["call_function"] = array(
        "load_grid_detail"
    );
$i++;


$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "No. Mesin";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhmesin";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_mesin";
$i++;


$edit["field"][$i]["label"]                     = "Shift";
$edit["field"][$i]["input"]                        = "shift";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "Arah Gulungan";
$edit["field"][$i]["input"]                        = "arah_gulungan";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Jenis Produk";
$edit["field"][$i]["input"]                        = "jenis_produk";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["label"]                     = "Ukuran Potong";
$edit["field"][$i]["input"]                        = "ukuran_potong";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;




//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Komposisi Coating (Kg)'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Mulai',
'Selesai',
'No. Roll',
'Awal',
'1',
'2',
'3',
'4',
'5',
'6',
'7',
'8',
'9',
'10',
'Barang Jadi',
'Sortir',
'Sisa',
'Rusak',
'Keterangan'


";
$edit["field"][$i]["grid_set"]["column"] = array(
    "mulai",
    "selesai",
    "no_roll",
    "awal",
    "hasil_1",
    "hasil_2",
    "hasil_3",
    "hasil_4",
    "hasil_5",
    "hasil_6",
    "hasil_7",
    "hasil_8",
    "hasil_9",
    "hasil_10",
    "barang_jadi",
    "sortir",
    "sisa",
    "rusak",
    "keterangan"
);

$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    mulai:'',
    selesai:'',
    no_roll:'',
    awal:'',
    hasil_1:'',
    hasil_2:'',
    hasil_3:'',
    hasil_4:'', 
    hasil_5:'',
    hasil_6:'',
    hasil_7:'',
    hasil_8:'',
    hasil_9:'',
    hasil_10:'',
    barang_jadi:'',
    sortir:'',
    sisa:'',
    rusak:'',
    keterangan:''
}";

$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'mulai'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'mulai'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_jqtime_1";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'selesai'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'selesai'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_jqtime_1"; 
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'no_roll'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'no_roll'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'awal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'awal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'hasil_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'hasil_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'hasil_2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'hasil_2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'hasil_3'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'hasil_3'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'hasil_4'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'hasil_4'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'hasil_5'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'hasil_5'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'hasil_6'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'hasil_6'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'hasil_7'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'hasil_7'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'hasil_8'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'hasil_8'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'hasil_9'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'hasil_9'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'hasil_10'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'hasil_10'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'barang_jadi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'barang_jadi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sortir'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sortir'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sisa'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sisa'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'rusak'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'rusak'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$row                                                                                         = 0;
$k                                                                                                = 0;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'mulai'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "2";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Waktu'";
$k++;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'hasil_1'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "10";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Hasil Turunan, Total:'";
$k++;


$row++;


$i++;

// ---------------------------------------END FRONT GRID 1-------------------------------------------------





if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*
    , DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal
    , CONCAT(b.nama, '|', b.nomor) AS 'browse|nomorthspk'
    , CONCAT(c.nama, '|', c.nomor) AS 'browse|nomormhmesin'
    , d.nama customer
    FROM thlaporanslitting a
    left join thspk b on b.nomor = a.nomorthspk
    left join mhmesin c on c.nomor = a.nomormhmesin
    left join mhrelasi d on d.nomor = a.nomormhrelasi
    WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT a.*
    FROM " . $edit["detail"][0]["table_name"] . " a
    WHERE a.status_aktif = 1 and a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];




    $edit = fill_value($edit, $r);
}



$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$edit_navbutton = generate_navbutton($edit_navbutton);
if ($edit["mode"] != "add") {
    $edit_navbutton["field"][$i]["input_element"]             = "a";
    $edit_navbutton["field"][$i]["input_float"]               = "right";
    $edit_navbutton["field"][$i]["input_attr"]["class"]       = "btn-info dim";
    $edit_navbutton["field"][$i]["input_attr"]["value"]       = "<i class='fa fa-upload' title='Upload'></i>";
    $edit_navbutton["field"][$i]["input_attr"]["data-toggle"] = "tooltip";
    $edit_navbutton["field"][$i]["input_attr"]["title"]       = "Upload";
    $edit_navbutton["field"][$i]["input_attr"]["onclick"]     =
        "link_confirmation('" . get_message(700) . "','?m=master_archieve&f=header_grid&&sm=edit&id=" . $r["nomor"] . "&table=" . $edit["table"] . "&tipe=SALES_ORDER&menu=" . $_SESSION["g.menu"] . "&url=" . $_SESSION["g.url"] . "', '', 'Upload', 'fa fa-upload|btn-dark')";
    $i++;
}

?>

<script type="text/javascript">
    // setTimeout(function() {
    //     load_grid_detail();
    // }, 100);


    <?php if ($edit["mode"] == "view") : ?>
            <
            script >
            $(document).ready(function() {
                $('#jqgh_pengecekan_incoming_bahan_baku_detail_visual_grid_aktual_sample_1').prop('disabled', true);
            });
    <?php endif; ?>


    $(document).ready(function() {

    });


    function load_grid_detail() {

        var pages = 'pages/grid_load.php?id=laporan_lamination_detail_3-load';
        jQuery(<?= $grid_elm[2] ?>).jqGrid('setGridParam', {
            url: pages,
            datatype: 'json',
            loadComplete: function(data) {
                <?= $grid_str[2] ?>_load = 0;
                actGridComplete_<?= $grid_str[2] ?>();
            }
        });
        jQuery(<?= $grid_elm[2] ?>).trigger('reloadGrid');

    }


    function load_grid_detail2() {
        var pages2 = 'pages/grid_load.php?id=laporan_produksi_detail_5-load';
        jQuery(<?= $grid_elm[4] ?>).jqGrid('setGridParam', {
            url: pages2,
            datatype: 'json',
            loadComplete: function(data) {
                <?= $grid_str[4] ?>_load = 0;
                actGridComplete_<?= $grid_str[4] ?>();
            }
        });
        jQuery(<?= $grid_elm[4] ?>).trigger('reloadGrid');

    }





    function checkHeader() {
        var fields = [];
        var check_failed = check_value_elements(fields);
        if (check_failed != '')
            return check_failed;
        else
            return true;
    }

    function viewDataAction(nomor) {
        window.open("?m=spk_printing_baru_detail&f=header_grid&&sm=edit&a=edit&no=" + nomor);
    }

    <?= generate_function_checkgrid($grid_str) ?>
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>