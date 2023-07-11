<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];




//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdcertificateanalysis_specification";
$edit["detail"][$i]["field_name"] = array(
    "metode",
    "result",
    "nomorheadergrid"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_specification";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------




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


$edit["field"][$i]["label"]       = "Date";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

$edit["field"][$i]["label"]                     = "Lot Number";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomorthspk";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "spk_coa";
$edit["field"][$i]["browse_set"]["param_output"] = array(
    "customer|browse_master_customer_search",
    "nomormhrelasi|browse_master_customer_hidden"
);
if ($edit["mode"] == "add")
    $edit["field"][$i]["browse_set"]["call_function"] = array(
        "load_grid_detail"
    );
$i++;


$edit["field"][$i]["label"]                     = "Customer";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhrelasi";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_customer";
$i++;


$edit["field"][$i]["label"]                     = "Product Name";
$edit["field"][$i]["input"]                        = "material";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["label"]                     = "Komposisi Bahan";
$edit["field"][$i]["input"]                        = "komposisi";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["label"]                     = "Dimensi";
$edit["field"][$i]["input"]                        = "dimensi";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;




// $edit["field"][$i]["label"]                     = "Lot Number";
// $edit["field"][$i]["input"]                        = "lot_number";
// $edit["field"][$i]["input_attr"]["maxlength"]     = "200";
// $i++;




$edit["field"][$i]["label"]                     = "Destination Product";
$edit["field"][$i]["input"]                        = "destinasi";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'SUMMARIZED COMPARISON OF TEST RESULT WITH SPECIFICATION'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Dimention Test',
'Satuan',
'Min',
'Max',
'Target',
'Result',
'Metode',
'nomorheadergrid'

";
$edit["field"][$i]["grid_set"]["column"] = array(
    "dimention_test",
    "satuan",
    "min",
    "max",
    "target",
    "result",
    "metode",
    "nomorheadergrid"
);

$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    dimention_test:'',
    satuan:'',
    min:'',
    max:'',
    target:'',
    result:'',
    metode:'',
    nomorheadergrid:''
}";


$edit["field"][$i]["grid_set"]["navgrid"] = 0;
$edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'dimention_test'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'dimention_test'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'min'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'min'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'max'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'max'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'target'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'target'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'result'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'result'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'metode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'metode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorheadergrid'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorheadergrid'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$row                                                                                         = 0;
$k                                                                                                = 0;


$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'dimention_test'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "1";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Type Of Test'";
$k++;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'min'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "3";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Specification'";
$k++;

$row++;

$i++;


// ---------------------------------------END FRONT GRID 1-------------------------------------------------






if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*
    , CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhrelasi'
    , CONCAT(c.kode, '|', c.nomor) AS 'browse|nomorthspk'
    , DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal
    FROM thcertificateanalysis a
    left join mhrelasi b on b.nomor = a.nomormhrelasi
    left join thspk c on a.nomorthspk = c.nomor
    WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));




    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*
    , b.dimention as dimention_test
    , b.satuan
    , b.min
    , b.max
    , b.target
    FROM " . $edit["detail"][0]["table_name"] . " a
    join headergrid b on b.nomor = a.nomorheadergrid 
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
    $(document).ready(function() {
        // get_nomormhusaha();
        // myFunction();
    });


    function load_grid_detail() {

        var pages = 'pages/grid_load.php?id=certificate_of_analys_detail_specification-load';
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