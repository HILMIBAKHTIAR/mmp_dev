<?php
$edit["debug"]       = 0;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];

$i = 0;
//------------------------------------------------GRID DATA 1------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdlaporanlamination_1";
$edit["detail"][$i]["field_name"] = array(
    "adhesive",
    "catalyst",
    "solvent"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_1";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------


//------------------------------------------------GRID DATA 2------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdlaporanlamination_2";
$edit["detail"][$i]["field_name"] = array(
    "no_roll_printing",
    "panjang_printing",
    "no_lot",
    "jenis",
    "penjang_lapisan",
    "no_roll_dry",
    "panjang_dry",
    "visco",
    "gramature",
    "meter"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_2";
$i++;
//------------------------------------------------END GRID DATA 2------------------------------------------------------



//------------------------------------------------GRID DATA 3------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdlaporanlamination_3";
$edit["detail"][$i]["field_name"] = array(
    "nomorheadergrid",
    "jumlah",
    "verifikasi"

);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_3";
$i++;
//------------------------------------------------END GRID DATA 3------------------------------------------------------





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
$edit["field"][$i]["label"]                     = "Jenis Produk";
$edit["field"][$i]["input"]                        = "jenis_produk";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["label"]                     = "Jumlah Order";
$edit["field"][$i]["input"]                        = "jumlah_order";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
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
$edit["field"][$i]["label"]                     = "Line Speed";
$edit["field"][$i]["input"]                        = "speed";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"] 				= "iptnumber"; 
$i++;


$edit["field"][$i]["label"]       = "Waktu Mulai";
$edit["field"][$i]["input"]       = "mulai_proses";
$edit["field"][$i]["input_class"] = "required jqtime_1";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]       = "Waktu Selesai";
$edit["field"][$i]["input"]       = "selesai_proses";
$edit["field"][$i]["input_class"] = "required jqtime_1";
$i++;


$edit["field"][$i]["label"]                     = "FIlm A";
$edit["field"][$i]["input"]                        = "film_a";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "Film B";
$edit["field"][$i]["input"]                        = "film_b";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Komposisi Bahan";
$edit["field"][$i]["input"]                        = "komposisi_bahan";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"] = "Solid Content";
$edit["field"][$i]["input"] = "solid_content";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("30|30", "35|35","40|40");
$i++;


$edit["field"][$i]["label"] = "Screen Cylinder";
$edit["field"][$i]["input"] = "screen_cylinder";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("100|100", "110|110","120|120","130|130","140|140","150|150");
$i++;


//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Komposisi Coating (Kg)'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Adhesive',
'Catalyst',
'Solvent'

";
$edit["field"][$i]["grid_set"]["column"] = array(
    "adhesive",
    "catalyst",
    "solvent"
);

$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    adhesive:'',
    catalyst:'',
    solvent:''
}";

$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'adhesive'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'adhesive'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'catalyst'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'catalyst'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'solvent'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'solvent'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$i++;

// ---------------------------------------END FRONT GRID 1-------------------------------------------------




//-----------------------------------------FRONTEND GRID 2--------------------------------
$grid[1] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "' '";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'No. Roll',
'Panjang (m)',
'No. Lot',
'Jenis',
'Panjang (m)',
'No. Roll',
'Panjang (m)',
'Visco',
'Gramature',
'Waste'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "no_roll_printing",
    "panjang_printing",
    "no_lot",
    "jenis",
    "penjang_lapisan",
    "no_roll_dry",
    "panjang_dry",
    "visco",
    "gramature",
    "meter"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    no_roll_printing:'',
    panjang_printing:'',
    no_lot:'',
    jenis:'',
    penjang_lapisan:'',
    no_roll_dry:'',
    panjang_dry:'',
    visco:'',
    gramature:'',
    meter:''
}";

$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'no_roll_printing'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'no_roll_printing'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'panjang_printing'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'panjang_printing'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'no_lot'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'no_lot'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jenis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jenis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'penjang_lapisan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'penjang_lapisan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'no_roll_dry'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'no_roll_dry'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'panjang_dry'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'panjang_dry'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'visco'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'visco'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'gramature'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'gramature'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'meter'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'meter'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$row                                                                                         = 0;
$k                                                                                                = 0;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'no_roll_printing'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "2";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Dari Printing'";
$k++;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'no_lot'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "3";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Bahan Lapisan'";
$k++;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'no_roll_dry'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "2";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Setelah Dry'";
$k++;

$row++;

$i++;
// ---------------------------------------END FRONT GRID 2-------------------------------------------------




//-----------------------------------------FRONTEND GRID 3--------------------------------
$grid[2] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][2]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Pemakaian Adhesif (Kg)'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Bahan',
'Jumlah (Kg)',
'Verifikasi QC',
'nomorheadergrid'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "bahan",
    "jumlah",
    "verifikasi",
    "nomorheadergrid"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    bahan:'',
    jumlah:'',
    verifikasi:'',
    nomorheadergrid:''
}";

$edit["field"][$i]["grid_set"]["navgrid"] = 0;
$edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;

$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'bahan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'bahan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'verifikasi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'verifikasi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorheadergrid'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorheadergrid'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;


$i++;
// ---------------------------------------END FRONT GRID 3-------------------------------------------------





if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*
    , DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal
    , CONCAT(b.nama, '|', b.nomor) AS 'browse|nomorthspk'
    , CONCAT(c.nama, '|', c.nomor) AS 'browse|nomormhmesin'
    , d.nama customer
    FROM thlaporanlamination a
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
    echo  $edit["field"][$grid[0]]["grid_set"]["query"];

    $edit["field"][$grid[1]]["grid_set"]["query"] = "
	SELECT
    a.*
    FROM " . $edit["detail"][1]["table_name"] . " a
    WHERE a.status_aktif = 1 and a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];
    // echo  $edit["field"][$grid[1]]["grid_set"]["query"];

    $edit["field"][$grid[2]]["grid_set"]["query"] = "
	SELECT
    a.*
    , e.spesifikasi as bahan
    FROM " . $edit["detail"][2]["table_name"] . " a
    left join headergrid e on e.nomor = a.nomorheadergrid
    WHERE a.status_aktif = 1 and a." . $edit["detail"][2]["foreign_key"] . " = " . $_GET["no"];



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