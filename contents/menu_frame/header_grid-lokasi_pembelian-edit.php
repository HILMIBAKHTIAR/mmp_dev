<?php
$edit["debug"]       = 1;
$edit["string_code"]    = "kode_".$_SESSION["menu_".$_SESSION["g.menu"]]["string"];


$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
	$edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
}
$edit["field"][$i]["box_tab"] = "data";


$edit["field"][$i]["form_group_class"] 				= "hiding";
$edit["field"][$i]["label"] 						= "Gudang";
$edit["field"][$i]["input"] 						= "nomormhgudang";
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] 				= 4;
$i++;



$edit["field"][$i]["label"]                   = "Kode";
$edit["field"][$i]["input"]                   = "kode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
if ($edit["mode"] == "add") {
	$edit["field"][$i]["input_value"] 				= formatting_code($con, $edit["string_code"]);
}
$i++;

$edit["field"][$i]["label"] 					= "Nama";
$edit["field"][$i]["label_class"] 				= "req";
$edit["field"][$i]["input"]						= "nama";
$edit["field"][$i]["input_class"] 				= "required";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"]                     = "Kelompok Department";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhdepartement";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_departemen";
$i++;

$edit["field"][$i]["label"]                     = "Status";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                     = "nomormhstatusteknik";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_element"]             = "browse";
$edit["field"][$i]["browse_setting"]             = "master_status_teknik";
$i++;


if ($edit["mode"] != "add") {

	$edit["query"] = " SELECT
    a.*
    , CONCAT(d.nama, '|', d.nomor) AS 'browse|nomormhdepartement'
    , CONCAT(e.nama, '|', e.nomor) AS 'browse|nomormhstatusteknik'
    FROM mhlokasi a
    left join mhgudang c on a.nomormhgudang = c.nomor 
    left join mhdepartemen d on d.nomor = a.nomormhdepartement
    left join mhstatusteknik e on e.nomor = a.nomormhstatusteknik
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
        // get_nomormhusaha();
        // myFunction();
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
    <?=generate_function_checkunique($grid_str)?>
    <?= generate_function_realgrid($grid_str) ?>
</script>