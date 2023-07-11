<?php
$edit["debug"]                 = 1;
// $edit["uppercase"]             = 1;


$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
}
$edit["field"][$i]["box_tab"] = "data";

// $edit["field"][$i]["label"]                     = "Kode";
// $edit["field"][$i]["label_class"]                 = "req";
// $edit["field"][$i]["input"]                     = "kode";
// $edit["field"][$i]["input_class"]                 = "required";
// $edit["field"][$i]["input_attr"]["maxlength"]     = "100";
// $i++;

$edit["field"][$i]["label"]                         = "Supplier";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input"]                         = "nomormhrelasi";
$edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_setting"]                 = "master_supplier_silinder";
$i++;

$edit["field"][$i]["label"]                         = "Supply";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input"]                         = "nomormdsuppliersupply";
$edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_element"]                 = "browse";
$edit["field"][$i]["browse_setting"]                 = "master_tipe_filmV2_supplier";
$edit["field"][$i]["browse_set"]["param_input"]      = array("c.nomormhrelasi|browse_master_supplier_silinder_hidden");
$edit["field"][$i]["browse_set"]["param_output"]      = array("tipe|supply");
$i++;

$edit["field"][$i]["label"]            = "supply";
$edit["field"][$i]["input"]            = "supply";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$edit["field"][$i]["form_group_class"]       = "hiding";
$i++;



$edit["field"][$i]["label"]                         = "Harga";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input"]                            = "harga";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$edit["field"][$i]["input_class"]                 = "iptnumber required";
$i++;

// $edit["field"][$i]["label"]                         = "Minimum Price";
// $edit["field"][$i]["label_class"]                     = "req";
// $edit["field"][$i]["input"]                            = "minimum_price";
// $edit["field"][$i]["input_attr"]["maxlength"]         = "200";
// $edit["field"][$i]["input_class"]                 = "iptnumber required";
// $i++;

// $edit["field"][$i]["label"]                         = "Maximum Price";
// $edit["field"][$i]["label_class"]                     = "req";
// $edit["field"][$i]["input"]                            = "maximum_price";
// $edit["field"][$i]["input_attr"]["maxlength"]         = "200";
// $edit["field"][$i]["input_class"]                 = "iptnumber required";
// $i++;


$edit["field"][$i]["label"]       = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;


$edit["field"][$i]["label"]       = "Tanggal Expired";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal_expired";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

// $edit["field"][$i]["anti_mode"]     = "add";
// $edit["field"][$i]["label"]         = "Status";
// $edit["field"][$i]["input"]         = "status_aktif";
// $edit["field"][$i]["input_element"] = "select";
// $edit["field"][$i]["input_option"]  = generate_status_option($edit["mode"]);
// $i++;


if ($edit["mode"] != "add") {
    $edit["query"] = "
	SELECT a.*
    , DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal
    , DATE_FORMAT(a.tanggal_expired,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_expired
    , CONCAT(b.nama, '|', b.nomor) AS 'browse|nomormhrelasi'
    , CONCAT(c.tipe, '|', c.nomor) AS 'browse|nomormdsuppliersupply'
	FROM " . $edit["table"] . " a
    join mhrelasi b on b.nomor = a.nomormhrelasi
    JOIN mdsuppliersupply c on c.nomor = a.nomormdsuppliersupply
	WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    $edit = fill_value($edit, $r);
}

$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$edit_navbutton = generate_navbutton($edit_navbutton);
?>

<script type="text/javascript">
    $(document).ready(function() {

    });

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