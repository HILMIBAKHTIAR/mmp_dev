<?php
$edit["debug"] 			= 1;
$edit["uppercase"] 		= 0;
// $edit["unique"] 		= array("kode","nama");
$edit["unique"] 		= array("kode");
$edit["manual_save"] 	= "contents/menu_frame/" . $_SESSION["g.frame"] . "-" . $_SESSION["g.menu"] . "-save.php";
// $edit["string_code"] 	= "kode_".$_SESSION["menu_".$_SESSION["g.menu"]]["string"];


//PEMBUATAN GRID DATA detail lokasi
$i = 0;
$edit["detail"][$i]["table_name"] = "mdlocation";
$edit["detail"][$i]["field_name"] = array(
    "alamat",
    "pic",
    "keterangan"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
//END GRID DATA



$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
	$edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
}
$edit["field"][$i]["box_tab"] = "data";

$edit["field"][$i]["label"] 					= "Kode";
$edit["field"][$i]["input"] 					= "kode";

$i++;
$edit["field"][$i]["form_group"] 				= 0;
$edit["field"][$i]["anti_mode"] 				= "add";
$edit["field"][$i]["label"] 					= "Status";
$edit["field"][$i]["input"] 					= "status_aktif";
$edit["field"][$i]["input_element"] 			= "select";
$edit["field"][$i]["input_option"] 				= generate_status_option($edit["mode"]);
$i++;

$edit["field"][$i]["label"] 					= "Outlet";
$edit["field"][$i]["label_class"] 				= "req";
$edit["field"][$i]["input"] 					= "nomormhoutlet";
$edit["field"][$i]["input_class"] 				= "required";
$edit["field"][$i]["input_element"] 			= "browse";
$edit["field"][$i]["browse_setting"] 			= "master_outlet_all";
$edit["field"][$i]["browse_set"]["param_output"]     = array("keterangan|keterangan");
$i++;

$edit["field"][$i]["label"] 					= "Alamat";
$edit["field"][$i]["label_class"] 				= "req";
$edit["field"][$i]["input"]						= "alamat";
$edit["field"][$i]["input_class"] 				= "required";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "Telepon";
$edit["field"][$i]["label_class"] 				= "req";
$edit["field"][$i]["input"]						= "telpon";
$edit["field"][$i]["input_class"] 				= "required";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 					= "Email";
$edit["field"][$i]["label_class"] 				= "req";
$edit["field"][$i]["input"]						= "email";
$edit["field"][$i]["input_class"] 				= "required";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;


$edit["field"][$i]["label"]              		= "Keterangan";
$edit["field"][$i]["label_col"] 				= "col-sm-12";
$edit["field"][$i]["label_attr"]["style"] 		= "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"]              		= "keterangan";
$edit["field"][$i]["input_element"]      		= "textarea";
$edit["field"][$i]["input_attr"]["rows"] 		= "5";
$edit["field"][$i]["input_col"] 				= "col-sm-12";
$i++;






//FRONTEND UNTUK GRID DATA detail
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar Detail'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Alamat',
'Pic',
'Keterangan',
'Email',
'Nomor Lokasi'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "alamat",
    "pic",
    "keterangan",
    "email",
    "nomormhoutletlocation"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    alamat:'',
    pic:'', 
    keterangan:'', 
    email:'', 
    nomormhoutletlocation:''
}";

$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "['nomormhoutletlocation']";

$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'alamat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'alamat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pic'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pic'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'email'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'email'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_lokasi }";

$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhoutletlocation'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhoutletlocation'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$i++;
// //END FRONT END GRID DATA


if ($edit["mode"] != "add") {

	$edit["query"] = "
	SELECT a.*, b.nama nama_outlet, b.keterangan, a.alamat, a.telpon, a.email, b.status_aktif,
	CONCAT('[', b.kode, '] ', b.nama, '|', b.nomor) AS 'browse|nomormhoutlet'
	FROM " . $edit["table"] . " a
	LEFT JOIN mhoutlet b ON a.nomormhoutlet = b.nomor 
	WHERE a.nomor = " . $_GET["no"];

	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));




	//query grid untuk detail
    $edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
    a.alamat,
    a.pic,
    a.keterangan,
    b.email,
    b.nomor AS nomormhoutletlocation
	FROM " . $edit["detail"][0]["table_name"] . " a
	LEFT JOIN mhoutletlocation b ON a.nomormhoutletlocation = b.nomor
    WHERE a.status_aktif > 0
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