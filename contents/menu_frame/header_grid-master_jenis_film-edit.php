<?php
$edit["debug"]       = 1;
$edit["string_code"]    = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];



$i = 0;

//------------------------------------------------GRID DATA 1------------------------------------------------------
// $edit["detail"][$i]["table_name"] = "mdbarangjenis";
// $edit["detail"][$i]["field_name"] = array(
//     "jenis",
//     "tipe"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
// $edit["detail"][$i]["additional_where"] = "";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_jenis";
// $i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------


//------------------------------------------------GRID DATA 2------------------------------------------------------
$edit["detail"][$i]["table_name"] = "mdbarangtipe";
$edit["detail"][$i]["field_name"] = array(
    "tipe",
    "is_film",
    "nomor"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail_tipe";
$i++;
//------------------------------------------------END GRID DATA 2------------------------------------------------------



$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
    $edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
}
$edit["field"][$i]["box_tab"] = "data";



$edit["field"][$i]["form_group_class"]                 = "hiding";
$edit["field"][$i]["label"]                         = "Kategori";
$edit["field"][$i]["input"]                         = "nomormhbarangkategori";
$edit["field"][$i]["input_attr"]["readonly"]         = "readonly";
if ($edit["mode"] == "add")
    $edit["field"][$i]["input_value"]                 = 1;
$i++;

// $edit["field"][$i]["label"]                   = "Kode";
// $edit["field"][$i]["input"]                   = "kode";
// $edit["field"][$i]["input_attr"]["maxlength"] = "100";
// $edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
// $edit["field"][$i]["form_group_class"]                 = "hiding";
// if ($edit["mode"] == "add") {
//     $edit["field"][$i]["input_value"] = formatting_code($edit["string_code"]);
// }
// $i++;

// $edit["field"][$i]["label"] 					= "Nama";
// $edit["field"][$i]["label_class"] 				= "req";
// $edit["field"][$i]["input"]						= "nama";
// $edit["field"][$i]["input_class"] 				= "required";
// $edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
// $edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
// $i++;



$edit["field"][$i]["label"]                         = "Jenis";
$edit["field"][$i]["input"]                         = "jenis";
$edit["field"][$i]["input_element"]                 = "select1";
$edit["field"][$i]["input_option"]                     = array("PRINTING|PRINTING", "DRY LAMINATION|DRY LAMINATION", "EXTRUSION|EXTRUSION","SEALING|SEALING");
$i++;


// $edit["field"][$i]["label"] 						= "Tipe";
// $edit["field"][$i]["input"] 						= "tipe";
// $edit["field"][$i]["input_element"] 				= "select1";
// $edit["field"][$i]["input_option"] 					= array("OPP|OPP", "OPP DOFF|OPP DOFF", "OPP DOFF|OPP DOFF");
// $i++;





//-----------------------------------------FRONTEND GRID 1--------------------------------
// $grid[0] = $i;
// $edit["field"][$i]["input_element"] = "grid";
// $edit["field"][$i]["grid_set"] = $edit_grid;
// $edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
// $edit["field"][$i]["grid_set"]["option"]["caption"] = "'Jenis'";
// $edit["field"][$i]["grid_set"]["option"]["colNames"] = "
// 'Jenis'
// ";
// $edit["field"][$i]["grid_set"]["column"] = array(
//     "jenis"
// );


// $edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
//     jenis:''
// }";


// $j = 0;

// $edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jenis'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jenis'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $j++;

// $i++;
// ---------------------------------------END FRONT GRID 1-------------------------------------------------




//-----------------------------------------FRONTEND GRID 2--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Tipe'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Tipe',
'is_film',
'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "tipe",
    "is_film",
    "nomor"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    tipe:'',
    is_film:'1',
    nomor:''
}";


$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'is_film'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'is_film'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;


$i++;
// ---------------------------------------END FRONT GRID 2-------------------------------------------------



if ($edit["mode"] != "add") {

    $edit["query"] = " SELECT
    a.*
    FROM mhbarangjenis a
    WHERE a.nomor = " . $_GET["no"];

    if ($edit["debug"] > 0)
        echo $edit["query"];
    $r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));



    //query grid detail 1
    // $edit["field"][$grid[0]]["grid_set"]["query"] = "
    // SELECT
    // a.*
    // FROM " . $edit["detail"][0]["table_name"] . " a
    // where a.status_aktif > 0
    // AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];


    //query grid detail 2
    $edit["field"][$grid[0]]["grid_set"]["query"] = "
    SELECT
    a.*
    FROM " . $edit["detail"][0]["table_name"] . " a
    where a.status_aktif > 0
    AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];



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