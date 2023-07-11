<?php

$qa = "
	SELECT DISTINCT CONCAT(a.customer,'|',a.customer) as customer FROM thspesifikasiproduk a  WHERE a.status_disetujui = 1 ";
$ar = mysqli_query($con, $qa);

$customers = [];

while ($ra = mysqli_fetch_array($ar)) {
    $customers[] = $ra['customer'];
}

var_dump($customers);

// $ra = mysqli_fetch_array($ar);
// var_dump($qa);
// var_dump($ra['customer']);


$edit["debug"]       = 1;
$edit["uppercase"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];

$edit["sp_approve"] = "sp_disetujui_thpenawaranharga";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_thpenawaranharga";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";

//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdpenawaranharga";
$edit["detail"][$i]["field_name"] = array(
    "nama",
    "warna",
    "komposisi",
    "moq",
    "size",
    "harga",
    "nomorthspesifikasiproduk",
    "nomor"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------

$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
}

$edit["field"][$i]["box_tab"] = "data";

$edit["field"][$i]["label"]                         = "Kode";
$edit["field"][$i]["input"]                         = "kode";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"]                 = formatting_code($con, $edit["string_code"]);
$i++;

// $edit["field"][$i]["form_group"]                 = 0;
$edit["field"][$i]["label"]       = "Tanggal Berlaku Sampai";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal_jatuh_tempo";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

// $edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Customer";
$edit["field"][$i]["input"] = "customer";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = $customers;
$edit["field"][$i]["input_attr"]["onchange"] = "load_grid_detail()";
$i++;

// $edit["field"][$i]["label"]                     = "Customer";
// $edit["field"][$i]["label_class"]                 = "req";
// $edit["field"][$i]["input"]                     = "nomorthspesifikasiproduk";
// $edit["field"][$i]["input_class"]                 = "required";
// $edit["field"][$i]["input_element"]             = "browse";
// $edit["field"][$i]["browse_setting"]             = "customer_spesifikasi_produk";
// $edit["field"][$i]["browse_set"]["param_output"]     = array(
//     "customer|customer"
// );
// $edit["field"][$i]["browse_set"]["call_function"] = array(
//     "load_grid_detail"
// );
// $i++;

// $edit["field"][$i]["label"]                     = "customer";
// $edit["field"][$i]["input"]                        = "customer";
// $edit["field"][$i]["label_class"]                 = "req";
// $edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
// $edit["field"][$i]["form_group_class"]       = "hiding";
// $i++;

$edit["field"][$i]["label"]                         = "ditujukan ke";
$edit["field"][$i]["input"]                         = "peruntukan";
$i++;

//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'List Barang'";
$edit["field"][$i]["grid_set"]["nav_option"]["add"] = "false";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
    'Nama Barang',
    'Warna',
    'Komposisi',
    'Size',
    'moq',
    'harga',
    'nomorthspesifikasiproduk',   
    'nomor'

";
$edit["field"][$i]["grid_set"]["column"] = array(
    "nama",
    "warna",
    "komposisi",
    "size",
    "moq",
    "harga",
    "nomorthspesifikasiproduk",
    "nomor",

);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    nama:'',
    warna:'',
    komposisi:'',
    size:'',
    moq:'',
    harga:'',
    nomorthspesifikasiproduk:''
}";

$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[]";
$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nama'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nama'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_barangspesifikasiproduk }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'warna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'warna'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'komposisi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'komposisi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'size'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'size'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'moq'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'moq'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'harga'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'harga'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";

$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomorthspesifikasiproduk'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomorthspesifikasiproduk'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;
$i++;
// ========================================= END GRID 1 ========================================

if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
        a.*,
        DATE_FORMAT(a.tanggal_jatuh_tempo,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_jatuh_tempo,
        a.customer as customer
    FROM thpenawaranharga a
    WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));

    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*
	FROM " . $edit["detail"][0]["table_name"] . " a
    where a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];



    $edit = fill_value($edit, $r);
}



$_SESSION["setting"]["field_status_disetujui"] = "status_disetujui";
$_SESSION["setting"]["field_disetujui_pada"] = "disetujui_pada";
$_SESSION["setting"]["field_disetujui_oleh"] = "disetujui_oleh";
if ($r["status_disetujui"] == 1) {
    $features = "back|reload|disappr";
} else {
    $features = "save|back|reload|approve|edit";
}

$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$features = "save|back|reload" . check_approval($r, "edit|approve|delete|disappr|print");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);
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

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#customer').select2();
    });


    function load_grid_detail() {
        var customer = $('#customer').val();

        var pages = 'pages/grid_load.php?id=penawaran_harga-load&customer=' + customer + '';
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