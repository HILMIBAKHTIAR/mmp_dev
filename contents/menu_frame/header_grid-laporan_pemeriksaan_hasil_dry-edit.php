<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];






//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdqapdry_tention";
$edit["detail"][$i]["field_name"] = array(
    "std",
    "act"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_tention";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------

//------------------------------------------------GRID DATA 2------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdqapdry_adhesive";
$edit["detail"][$i]["field_name"] = array(
    "adhesive",
    "qty_adhesive",
    "catalis",
    "qty_catalis",
    "ea",
    "nomormhbarang"

);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_adhesive";
$i++;
//------------------------------------------------END GRID DATA 2------------------------------------------------------



//------------------------------------------------GRID DATA 3------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdqapdry_timestamp";
$edit["detail"][$i]["field_name"] = array(
    "jam",
    "no_roll",
    "hasil",
    "width",
    "pitch",
    "bonding",
    "viscositas",
    "speed",
    "keterangan"

);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_timestamp";
$i++;
//------------------------------------------------END GRID DATA 3------------------------------------------------------





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


$edit["field"][$i]["label"]                         = "Kode";
$edit["field"][$i]["input"]                         = "kode";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"]                 = formatting_code($con, $edit["string_code"]);
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "<strong>IMPRESS DOCTOR BLADE</strong><br>Hitam";
$edit["field"][$i]["input"]                        = "hitam";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]       = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Merah";
$edit["field"][$i]["input"]                        = "merah";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Shift";
$edit["field"][$i]["input"]                        = "shift";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "TENTION LAMINATING NIP M";
$edit["field"][$i]["input"]                        = "tln_m";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "No. SPK";
// $edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomorthspk";
// $edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_spk";
$edit["field"][$i]["browse_set"]["param_output"]     = array("nama|nama_produk", "komposisi|komposisi_bahan");
if ($edit["mode"] == "add")
    $edit["field"][$i]["browse_set"]["call_function"] = array(
        "load_grid_detail", "load_grid_detail2"
    );
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "TENTION LAMINATING NIP G";
$edit["field"][$i]["input"]                        = "tln_g";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Nama Produk";
$edit["field"][$i]["input"]                        = "nama_produk";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Komposisi Bahan";
$edit["field"][$i]["input"]                        = "komposisi_bahan";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'PARAMETER TENTION'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Parameter Tention',
'STD',
'ACT'

";
$edit["field"][$i]["grid_set"]["column"] = array(
    "tention",
    "std",
    "act"
);

// $counter = 1;

$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    tention:'',
    std:'',
    act:''
}";


// $edit["field"][$i]["grid_set"]["navgrid"] = 0;
// $edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tention'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tention'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'std'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'std'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'act'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'act'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$i++;

// ---------------------------------------END FRONT GRID 1-------------------------------------------------




$edit["field"][$i]["label"]                     = "<strong>IMPRESS RUBBER ROLL</strong> <br>Impress Sleeve";
$edit["field"][$i]["input"]                        = "impress_sleve";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "<strong>TEMPERATURE CONTROL</strong> <br>Burner";
$edit["field"][$i]["input"]                        = "burner";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Impress M";
$edit["field"][$i]["input"]                        = "impress_m";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Dryer I";
$edit["field"][$i]["input"]                        = "dryer_1";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Impress G";
$edit["field"][$i]["input"]                        = "impress_g";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Dryer II";
$edit["field"][$i]["input"]                        = "dryer_2";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Infeed Nip M";
$edit["field"][$i]["input"]                        = "infeed_nip_m";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["form_group"]                     = 0;
$edit["field"][$i]["label"]                     = "Dryer III";
$edit["field"][$i]["input"]                        = "dryer_3";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["label"]                     = "Infeed Nip G";
$edit["field"][$i]["input"]                        = "infeed_nip_g";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Chamber Arm";
$edit["field"][$i]["input"]                        = "chamber_arm";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;




$edit["field"][$i]["label"]                     = "SC (%)";
$edit["field"][$i]["input"]                        = "sc";
$edit["field"][$i]["input_class"]                 = "iptmoney2";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["label"]                     = "CYL Cloating";
$edit["field"][$i]["input"]                        = "cyl_cloating";
$edit["field"][$i]["input_class"]                 = "iptmoney2";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


//-----------------------------------------FRONTEND GRID 2--------------------------------
$grid[2] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][2]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'KOMPOSISI ADHESIVE'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Adhesive (kg)',
'Qty',
'Catalis (kg)',
'Qty',
'EA',
'nomormhbarang'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "adhesive",
    "qty_adhesive",
    "catalis",
    "qty_catalis",
    "ea",
    "nomormhbarang"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    adhesive:'',
    qty_adhesive:'',
    catalis:'',
    qty_catalis:'',
    ea:'',
    nomormhbarang:''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'adhesive'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'adhesive'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_adhesive }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'qty_adhesive'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'qty_adhesive'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'catalis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'catalis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'qty_catalis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'qty_catalis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'ea'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'ea'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$i++;
// ---------------------------------------END FRONT GRID 2-------------------------------------------------



//-----------------------------------------FRONTEND GRID 3--------------------------------
$grid[3] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][3]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'TIME STAMP'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Jam',
'No. Roll',
'Hasil',
'Width',
'Pitch',
'Bonding',
'Piscositas',
'Speed',
'Keterangan'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "jam",
    "no_roll",
    "hasil",
    "width",
    "pitch",
    "bonding",
    "viscositas",
    "speed",
    "keterangan",
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    jam:'',
    no_roll:'',
    hasil:'',
    width:'',
    pitch:'',
    bonding:'',
    viscositas:'',
    speed:'',
    keterangan:''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jam'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jam'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'no_roll'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'no_roll'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'hasil'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'hasil'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'width'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'width'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pitch'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pitch'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'bonding'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'bonding'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'viscositas'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'viscositas'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'speed'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'speed'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$i++;
// ---------------------------------------END FRONT GRID 3-------------------------------------------------





if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*
    , DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal
    , CONCAT(b.nama, '|', b.nomor) AS 'browse|nomorthspk'
    FROM thqapdry a
    left join thspk b on b.nomor = a.nomorthspk
    WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*
    , b.tention
    FROM " . $edit["detail"][0]["table_name"] . " a
    join headergrid b on b.nomor = a.nomorheadergrid 
    WHERE a.status_aktif = 1 and a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];

    $edit["field"][$grid[1]]["grid_set"]["query"] = "
	SELECT
    a.*
    FROM " . $edit["detail"][1]["table_name"] . " a
    WHERE a.status_aktif = 1 and a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];


    $edit["field"][$grid[2]]["grid_set"]["query"] = "
	SELECT
    a.*
    FROM " . $edit["detail"][2]["table_name"] . " a
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
    <?php if ($edit["mode"] == "view") : ?>
        $(document).ready(function() {
            $('#jqgh_pengecekan_incoming_bahan_baku_detail_visual_grid_aktual_sample_1').prop('disabled', true);
        });
    <?php endif; ?>


    $(document).ready(function() {

    });


    function load_grid_detail() {

        var pages = 'pages/grid_load.php?id=laporan_pemeriksaan_hasil_dry_detail_tention-load';
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


    // function load_grid_detail2()
    // {
    // var pages2 = 'pages/grid_load.php?id=laporan_pemeriksaan_hasil_dry_detail_grammature-load';
    // jQuery(<?= $grid_elm[1] ?>).jqGrid('setGridParam',
    // {
    // url:pages2,
    // datatype:'json',
    // loadComplete:function(data)
    // {
    // <?= $grid_str[1] ?>_load = 0;
    // actGridComplete_<?= $grid_str[1] ?>();
    // }
    // });
    // jQuery(<?= $grid_elm[1] ?>).trigger('reloadGrid');

    // }





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