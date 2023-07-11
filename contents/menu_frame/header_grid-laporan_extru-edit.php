<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];

$i = 0;
//------------------------------------------------GRID DATA 1------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdlaporanextru_1";
$edit["detail"][$i]["field_name"] = array(
    "no_roll_printing",
    "panjang_printing",
    "no_lot",
    "jenis",
    "penjang_lapisan",
    "no_roll_extru",
    "panjang_extru",
    "defect",
    "panjang_waste"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_1";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------


//------------------------------------------------GRID DATA 2------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdlaporanextru_2";
$edit["detail"][$i]["field_name"] = array(
    "coating",
    "nomorheadergrid",
    "resin_sak",
    "resin_kg"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_2";
$i++;
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
$edit["field"][$i]["label"]                     = "Nama Produk";
$edit["field"][$i]["input"]                        = "nama_produk";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_save"] = "skip";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "Customer";
$edit["field"][$i]["input"]                        = "customer";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_save"] = "skip";
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


$edit["field"][$i]["label"]                     = "Screw Speed";
$edit["field"][$i]["input"]                        = "screw_speed";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$edit["field"][$i]["input_class"] 				= "iptnumber"; 
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
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"] = "Solid Content";
$edit["field"][$i]["input"] = "solid_content";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("30|30", "35|35","40|40");
$i++;


$edit["field"][$i]["label"]                     = "HI Volt Meter";
$edit["field"][$i]["input"]                        = "volt_meter";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]                     = "Motor Meter";
$edit["field"][$i]["input"]                        = "motor_meter";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;




//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "' '";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'No. Roll',
'Panjang (m)',
'No. Lot',
'Jenis',
'Panjang (m)',
'No. Roll',
'Panjang (m)',
'Deffect',
'Panjang (m)'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "no_roll_printing",
    "panjang_printing",
    "no_lot",
    "jenis",
    "penjang_lapisan",
    "no_roll_extru",
    "panjang_extru",
    "defect",
    "panjang_waste",
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    no_roll_printing:'',
    panjang_printing:'',
    no_lot:'',
    jenis:'',
    penjang_lapisan:'',
    no_roll_extru:'',
    panjang_extru:'',
    defect:'',
    panjang_waste:''
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

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'no_roll_extru'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'no_roll_extru'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'panjang_extru'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'panjang_extru'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'defect'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'defect'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'panjang_waste'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'panjang_waste'";
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
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'no_roll_extru'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "2";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Setelah Extrusion'";
$k++;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'defect'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "2";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Waste'";
$k++;

$row++;

$i++;

// ---------------------------------------END FRONT GRID 1-------------------------------------------------




//-----------------------------------------FRONTEND GRID 2--------------------------------
$grid[1] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "' '";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
' ',
' ',
'Jenis Resin',
'Sak',
'Kg',
'nomorheadergrid'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "spesifikasi",
    "coating",
    "standart",
    "resin_sak",
    "resin_kg",
    "nomorheadergrid"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    spesifikasi:'',
    coating:'',
    standart:'',
    resin_sak:'',
    resin_kg:'',
    nomorheadergrid:''
}";

$edit["field"][$i]["grid_set"]["navgrid"] = 0;
$edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'spesifikasi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'spesifikasi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'coating'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'coating'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'standart'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'standart'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'resin_sak'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'resin_sak'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'resin_kg'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'resin_kg'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorheadergrid'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorheadergrid'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;



$row                                                                                         = 0;
$k                                                                                                = 0;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'spesifikasi'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "2";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Pemakaian Coating'";
$k++;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'standart'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "3";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Pemakaian Resin'";
$k++;

$row++;


$i++;
// ---------------------------------------END FRONT GRID 2-------------------------------------------------






if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*
    , DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal
    , CONCAT(b.nama, '|', b.nomor) AS 'browse|nomorthspk'
    , CONCAT(c.nama, '|', c.nomor) AS 'browse|nomormhmesin'
    , d.nama customer
    FROM thlaporanextru a
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
    , b.spesifikasi
    , b.standart
    FROM " . $edit["detail"][1]["table_name"] . " a
    left join headergrid b on b.nomor = a.nomorheadergrid
    WHERE a.status_aktif = 1 and a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];
   

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

        var pages = 'pages/grid_load.php?id=laporan_extru_detail_2-load';
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