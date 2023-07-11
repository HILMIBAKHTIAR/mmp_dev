<?php
$edit["debug"]       = 0;
$edit["string_code"]    = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];


$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
}
$edit["field"][$i]["box_tab"] = "data";

$edit["field"][$i]["label"]                     = "Nama";
$edit["field"][$i]["label_class"]                 = "req";
$edit["field"][$i]["input"]                        = "nama";
$edit["field"][$i]["input_class"]                 = "required";
$edit["field"][$i]["input_attr"]["maxlength"]     = "200";
$i++;

// $edit["field"][$i]["label"] 					= "Inisial";
// $edit["field"][$i]["label_class"] 				= "req";
// $edit["field"][$i]["input"]						= "inisial";
// $edit["field"][$i]["input_class"] 				= "required";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
// $i++;


$edit["field"][$i]["label"]                         = "Status";
$edit["field"][$i]["input"]                         = "status_aktif";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_option"]                     = array("1|Aktif", "2|Tidak Aktif");
$i++;




if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*,
    b.nomor AS nomormhbarangkategori,
    c.nomor as nomormhbarangkelompok
    FROM mhproses a
    LEFT JOIN mhbarangkategori b ON a.nomormhbarangkategori = b.nomor
    left join mhbarangkelompok c on a.nomormhbarangkelompok = c.nomor 
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
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>