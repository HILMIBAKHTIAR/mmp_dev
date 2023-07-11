<?php
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];



//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdqaptinta";
$edit["detail"][$i]["field_name"] = array(
    "standar_tinta",
    "tarikan_warna"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------

// //------------------------------------------------GRID DATA 2------------------------------------------------------
// $edit["detail"][$i]["table_name"] = "tdqaptinta_other";
// $edit["detail"][$i]["field_name"] = array(
//     "parameter",
//     "media_cetak",
//     "viscositas",
//     "aktual_sample_1",
//     "aktual_sample_2",
//     "aktual_sample_3",
//     "aktual_sample_4",
//     "aktual_sample_5",
//     "metode",
//     "result"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_other";
// $i++;
// //------------------------------------------------END GRID DATA 2------------------------------------------------------



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


$edit["field"][$i]["label"]                     = "Supllier";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhrelasi";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_supplier";
$i++;


$edit["field"][$i]["label"]                     = "Material";
$edit["field"][$i]["input"]                        = "material";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["label"]                     = "Lot Number";
$edit["field"][$i]["input"]                        = "lot_number";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;


$edit["field"][$i]["label"]                     = "Qty";
$edit["field"][$i]["input"]                        = "qty";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

$edit["field"][$i]["label"]       = "Tanggal Kedatangan";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal_kedatangan";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;


$edit["field"][$i]["label"]       = "Tanggal Pengecekan";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal_pengecekan";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;



//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Warna'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Standar Tinta',
'Tarikan Warna'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "standar_tinta",
    "tarikan_warna"
);

// $counter = 1;

$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    standar_tinta:'',
    tarikan_warna:''
}";


$j = 0;

// $counter++; 

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'standar_tinta'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'standar_tinta'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tarikan_warna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tarikan_warna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;


$i++;


// ---------------------------------------END FRONT GRID 1-------------------------------------------------

// //-----------------------------------------FRONTEND GRID 2--------------------------------
// $grid[1] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'OTHER CHECK'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'PARAMETERS/NAMA ALAT CEK',
// 'MEDIA CETAK',
// 'VISCOSITAS MINIMUM',
// '1',
// '2',
// '3',
// '4',
// '5',
// 'METODE',
// 'RESULT'
// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "parameter",
//     "media_cetak",
//     "viscositas",
//     "aktual_sample_1",
//     "aktual_sample_2",
//     "aktual_sample_3",
//     "aktual_sample_4",
//     "aktual_sample_5",
//     "metode",
//     "result"
// );


// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
//     parameter:'',
//     media_cetak:'',
//     viscositas:'',
//     aktual_sample_1:'',
//     aktual_sample_2:'',
//     aktual_sample_3:'',
//     aktual_sample_4:'',
//     aktual_sample_5:'',
//     metode:'',
//     result:''
// }";


// $j = 0;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'parameter'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'parameter'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'media_cetak'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'media_cetak'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'viscositas'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'viscositas'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_1'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_1'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_2'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_2'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_3'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_3'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_4'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_4'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'aktual_sample_5'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'aktual_sample_5'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'metode'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'metode'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'result'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'result'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;



// $row                                                                                         = 0;
// $k                                                                                                = 0;


// $edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]                           = "true";
// $edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]    = "'aktual_sample_1'";
// $edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "5";
// $edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]             = "'Aktual Sampel'";
// $k++;

// $row++;

// $i++;
// // ---------------------------------------END FRONT GRID 2-------------------------------------------------




if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*
    , CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhrelasi'
    FROM thqaptinta a
    left join mhrelasi b on b.nomor = a.nomormhrelasi
    WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));



    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT a.*
    FROM " . $edit["detail"][0]["table_name"] . " a
    WHERE a.status_aktif = 1 and a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];
    // echo  $edit["field"][$grid[0]]["grid_set"]["query"];

    // $edit["field"][$grid[1]]["grid_set"]["query"] = "
    // SELECT
    // a.*
    // FROM " . $edit["detail"][1]["table_name"] . " a
    // WHERE a.status_aktif = 1 and a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];


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
        var no = $('#nomorthspk').val();

        var pages = 'pages/grid_load.php?id=spk_printing_baru_detail-load&no=' + no + '';
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

    function viewDataAction(nomor) {
        window.open("?m=spk_printing_baru_detail&f=header_grid&&sm=edit&a=edit&no=" + nomor);
    }

    <?= generate_function_checkgrid($grid_str) ?>
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>