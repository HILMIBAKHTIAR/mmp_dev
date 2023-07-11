<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];


$i = 0;
//------------------------------------------------GRID DATA 1------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdqaprosesoutinspec";
$edit["detail"][$i]["field_name"] = array(
    "std",
    "toleransi",
    "sample_1",
    "sample_2",
    "sample_3",
    "sample_4",
    "sample_5",
    "sample_6",
    "sample_7",
    "sample_8"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_specification";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------



//------------------------------------------------GRID DATA 2------------------------------------------------------
$edit["detail"][$i]["table_name"] = "tdqaprosesoutinspec_visual";
$edit["detail"][$i]["field_name"] = array(
    "visual",
    "sample_1",
    "sample_2",
    "sample_3",
    "sample_4",
    "sample_5",
    "sample_6",
    "sample_7",
    "sample_8",
    "sample_9",
    "sample_10"

);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_visual";
$i++;
//------------------------------------------------END GRID DATA 2------------------------------------------------------




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


// $edit["field"][$i]["label"] 						= "Kode";
// $edit["field"][$i]["input"] 						= "kode";
// $edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
// if ($edit["mode"] == "add")
// 	$edit["field"][$i]["input_value"] 				= formatting_code($con, $edit["string_code"]);
// $i++;
// $edit["field"][$i]["label"]                     = "Supllier";
// $edit["field"][$i]["label_class"]                 = "req";
// $edit["field"][$i]["input"]                     = "nomormhrelasi";
// $edit["field"][$i]["input_class"]                 = "required";
// $edit["field"][$i]["input_element"]             = "browse";
// $edit["field"][$i]["browse_setting"]             = "master_supplier";
// $i++;
// $edit["field"][$i]["label"]                     = "Supllier";
// $edit["field"][$i]["label_class"]                 = "req";
// $edit["field"][$i]["input"]                     = "nomormhrelasi";
// $edit["field"][$i]["input_class"]                 = "required";
// $edit["field"][$i]["input_element"]             = "browse";
// $edit["field"][$i]["browse_setting"]             = "master_supplier";
// $edit["field"][$i]["browse_set"]["call_function"] = array(
//     "load_grid_detail2", "load_grid_detail"
// );
// $edit["field"][$i]["input_save"] = "skip";
// $i++;

$edit["field"][$i]["label"]       = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_attr"]["onblur"] = "load_grid_detail2(), load_grid_detail()";
$i++;

$edit["field"][$i]["label"]                     = "No. LOT";
$edit["field"][$i]["input"]                        = "lot_number";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["label"]                     = "Nama Produk";
$edit["field"][$i]["input"]                        = "nama_produk";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]                     = "Qty Produk";
$edit["field"][$i]["input"]                        = "qty";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["label"]                     = "MD No";
$edit["field"][$i]["input"]                        = "md_no";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["label"]                     = "Komposisi Bahan";
$edit["field"][$i]["input"]                        = "komposisi_bahan";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"] = "ARAH GULUNGAN HASIL SLITTING";
$edit["field"][$i]["input"] = "arah_gulungan";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("0|SESUAI SPK", "1|TIDAK SESUAI SPK");
$i++;

// $edit["field"][$i]["label"]       = "Tanggal Kedatangan";
// $edit["field"][$i]["label_class"] = "req";
// $edit["field"][$i]["input"]       = "tanggal_kedatangan";
// $edit["field"][$i]["input_class"] = "required";
// $edit["field"][$i]["input_class"] = "required date_1";
// $i++;


// $edit["field"][$i]["label"]       = "Tanggal Pengecekan";
// $edit["field"][$i]["label_class"] = "req";
// $edit["field"][$i]["input"]       = "tanggal_pengecekan";
// $edit["field"][$i]["input_class"] = "required";
// $edit["field"][$i]["input_class"] = "required date_1";
// $i++;



// $edit["field"][$i]["form_group"]              = 0;
// $edit["field"][$i]["label"]                   = "";
// $edit["field"][$i]["input_element"]      = "
// 	<a   class='btn btn-info btn-app-sm' onclick=load_grid_detail()><i class='fa fa-refresh'></i></a>
// ";
// $edit["field"][$i]["input_col"] = "col-sm-1";
// $edit["field"][$i]["input_save"] = "skip";
// $i++;


//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'DIMENSI CHECK'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Dimensi',
'Std',
'Toleransi',
'1',
'2',
'3',
'4',
'5',
'6',
'7',
'8'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "dimention",
    "std",
    "toleransi",
    "sample_1",
    "sample_2",
    "sample_3",
    "sample_4",
    "sample_5",
    "sample_6",
    "sample_7",
    "sample_8",
    "sample_9",
    "sample_10"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    dimention:'',
    std:'',
    toleransi:'',
    sample_1:'',
    sample_2:'',
    sample_3:'',
    sample_4:'',
    sample_5:'',
    sample_6:'',
    sample_7:'',
    sample_8:'',
    sample_9:'',
    sample_10:''
}";

// $edit["field"][$i]["grid_set"]["navgrid"] = 0;
// $edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'dimention'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'dimention'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'std'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'std'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'toleransi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'toleransi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sample_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sample_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sample_2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sample_2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sample_3'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sample_3'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sample_4'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sample_4'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sample_5'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sample_5'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sample_6'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sample_6'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sample_7'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sample_7'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sample_8'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sample_8'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$row                                                                                         = 0;
$k                                                                                                = 0;


$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'std'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "10";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Sample'";
$k++;

$row++;

$i++;
// ---------------------------------------END FRONT GRID 1-------------------------------------------------




//-----------------------------------------FRONTEND GRID 2--------------------------------
$grid[1] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'VISUAL CHECK'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'visual',
'1',
'2',
'3',
'4',
'5',
'6',
'7',
'8',
'9',
'10'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "visual",
    "sample_1",
    "sample_2",
    "sample_3",
    "sample_4",
    "sample_5",
    "sample_6",
    "sample_7",
    "sample_8",
    "sample_9",
    "sample_10"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    visual:'',
    sample_1:'',
    sample_2:'',
    sample_3:'',
    sample_4:'',
    sample_5:'',
    sample_6:'',
    sample_7:'',
    sample_8:'',
    sample_9:'',
    sample_10:''
}";

// $edit["field"][$i]["grid_set"]["navgrid"] = 0;
// $edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'visual'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'visual'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'sample_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'sample_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'sample_2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'sample_2'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'sample_3'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'sample_3'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'sample_4'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'sample_4'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'sample_5'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'sample_5'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'sample_6'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'sample_6'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'sample_7'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'sample_7'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'sample_8'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'sample_8'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'sample_9'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'sample_9'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]          = "'sample_10'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]         = "'sample_10'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["align"]         = "'center'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"]     = "'checkbox'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatoptions"] = "{ disabled: false }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "60";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]   = "{value: '1:0', defaultValue: '0'}";
$j++;

$row                                                                                         = 0;
$k                                                                                                = 0;


$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'sample_1'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "10";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Aktual Sampel'";
$k++;

$row++;

$i++;
// ---------------------------------------END FRONT GRID 2-------------------------------------------------





if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*,
    DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal
    FROM thqaprosesoutinspec a
    WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    $edit["field"][$grid[0]]["grid_set"]["query"] = "
    SELECT
    a.*
    FROM " . $edit["detail"][0]["table_name"] . " a
    where a.status_aktif = 1
    AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["field"][$grid[0]]["grid_set"]["query"];

    $edit["field"][$grid[1]]["grid_set"]["query"] = "
    SELECT
    a.*
    FROM " . $edit["detail"][1]["table_name"] . " a
    WHERE a.status_aktif = 1
    AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];


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
    function load_grid_detail() {
        var pages2 = 'pages/grid_load.php?id=proses_out_going_inspection_detail_specification-load';
        jQuery(<?= $grid_elm[0] ?>).jqGrid('setGridParam', {
            url: pages2,
            datatype: 'json',
            loadComplete: function(data) {
                <?= $grid_str[0] ?>_load = 0;
                actGridComplete_<?= $grid_str[0] ?>();
            }
        });
        jQuery(<?= $grid_elm[0] ?>).trigger('reloadGrid');

    }


    function load_grid_detail2() {
        var pages2 = 'pages/grid_load.php?id=proses_out_going_inspection_detail_visual-load';
        jQuery(<?= $grid_elm[1] ?>).jqGrid('setGridParam', {
            url: pages2,
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