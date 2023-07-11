<?php
$edit["debug"]       = 0;
$edit["string_code"]    = "kode_".$_SESSION["menu_".$_SESSION["g.menu"]]["string"];




//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "mdtopdp";
$edit["detail"][$i]["field_name"] = array(
    "dp",
    "nomor"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_dp";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------


//------------------------------------------------GRID DATA 2------------------------------------------------------
$edit["detail"][$i]["table_name"] = "mdtoptermin";
$edit["detail"][$i]["field_name"] = array(
    "termin",
    "nomor"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_termin";
$i++;
//------------------------------------------------END GRID DATA 2------------------------------------------------------



$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
	$edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
}
$edit["field"][$i]["box_tab"] = "data";

$edit["field"][$i]["label"]                         = "Nama";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input"]                            = "nama";
$edit["field"][$i]["input_class"]                     = "required";
$edit["field"][$i]["input_attr"]["maxlength"]         = "200";
$i++;

$edit["field"][$i]["anti_mode"]     = "add";
$edit["field"][$i]["label"]         = "Status";
$edit["field"][$i]["input"]         = "status_aktif";
$edit["field"][$i]["input_element"] = "select";
$edit["field"][$i]["input_option"]  = generate_status_option($edit["mode"]);
$i++;
$edit["field"][$i]["label"]                          = "Keterangan";
$edit["field"][$i]["label_col"]                     = "col-sm-12";
$edit["field"][$i]["label_attr"]["style"]             = "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"]                          = "keterangan";
$edit["field"][$i]["input_element"]                  = "textarea";
$edit["field"][$i]["input_attr"]["rows"]             = "5";
$edit["field"][$i]["input_col"]                     = "col-sm-12";
$i++;





//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'DP'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'DP',
'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "dp",
    "nomor"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    dp:'',
    nomor:''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'dp'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'dp'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "'false'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "'true'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$j++;

$i++;
// ---------------------------------------END FRONT GRID 1-------------------------------------------------




//-----------------------------------------FRONTEND GRID 2--------------------------------
$grid[1] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Termin'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Termin',
'Nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "termin",
    "nomor"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    termin:'',
    nomor:''
}";



$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'termin'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'termin'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "'false'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "'true'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$j++;

$i++;
// ---------------------------------------END FRONT GRID 2-------------------------------------------------


if ($edit["mode"] != "add") {
    $edit["query"] = "
	SELECT a.*
	FROM " . $edit["table"] . " a
	WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    //query grid detail 1
    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.*
	FROM " . $edit["detail"][0]["table_name"] . " a
    where a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];


    //query grid detail 2
    $edit["field"][$grid[1]]["grid_set"]["query"] = "
	SELECT
    a.*
	FROM " . $edit["detail"][1]["table_name"] . " a
    where a.status_aktif > 0
	AND a." . $edit["detail"][1]["foreign_key"] . " = " . $_GET["no"];


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