<?php
$edit["debug"] 				= 1;
$edit["uppercase"] 			= 1;
$edit["next_save_delay"] 	= 3;
// $edit["unique"] 			= array("kode","nama");
$edit["unique"] 			= array("kode");
$edit["manual_save"] 		= "contents/menu_frame/" . $_SESSION["g.frame"] . "-" . $_SESSION["g.menu"] . "-save.php";
// $edit["string_code"] 		= "kode_".$_SESSION["menu_".$_SESSION["g.menu"]]["string"];

// $edit["sp_add"] 							= "sp_disimpan_mhcabang";
// $edit["sp_add_param"] 						= array("param_mode_add|1", "param_nomormhadmin|0");
// $edit["sp_edit"] 							= "sp_disimpan_mhcabang";
// $edit["sp_edit_param"] 						= array("param_mode_edit|1", "param_nomormhadmin|0");
// $_POST["param_nomormhadmin"]				= $_SESSION["login"]["nomor"];
// $_POST["param_mode_add"] 					= "ADD";
// $_POST["param_mode_edit"] 					= "EDIT";

$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
	$edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
}
$edit["field"][$i]["box_tab"] = "data";

$edit["field"][$i]["label"] 					= "Kode";
$edit["field"][$i]["label_class"] 				= "req";
$edit["field"][$i]["input"] 					= "kode";
$edit["field"][$i]["input_class"] 				= "required";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "4";
// $edit["field"][$i]["input_attr"]["readonly"] 	= "readonly";
// if($edit["mode"] == "add")
// 	$edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
$i++;
$edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["anti_mode"] 					= "add";
$edit["field"][$i]["label"] 						= "Status";
$edit["field"][$i]["input"] 						= "status_aktif";
$edit["field"][$i]["input_element"] 				= "select";
$edit["field"][$i]["input_option"] 					= generate_status_option($edit["mode"]);
$i++;
$edit["field"][$i]["label"] 						= "Nama";
$edit["field"][$i]["label_class"] 					= "req";
$edit["field"][$i]["input"]							= "nama";
$edit["field"][$i]["input_class"] 					= "required";
$edit["field"][$i]["input_attr"]["maxlength"] 		= "200";
$i++;
$edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["label"] 						= "Inisial";
$edit["field"][$i]["label_class"] 					= "req";
$edit["field"][$i]["input"]							= "inisial";
$edit["field"][$i]["input_class"] 					= "required";
$edit["field"][$i]["input_attr"]["maxlength"] 		= "3";
$i++;
$edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["anti_mode"] 					= "Pusat";
$edit["field"][$i]["label"] 						= "Status";
$edit["field"][$i]["input"] 						= "pusat";
$edit["field"][$i]["input_element"] 				= "select";
$edit["field"][$i]["input_option"] 					= array("0|Non-Pusat", "1|Pusat");
$i++;
$edit["field"][$i]["label"]              			= "Keterangan";
$edit["field"][$i]["label_col"] 					= "col-sm-12";
$edit["field"][$i]["label_attr"]["style"] 			= "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"]              			= "keterangan";
$edit["field"][$i]["input_element"]      			= "textarea";
$edit["field"][$i]["input_attr"]["rows"] 			= "5";
$edit["field"][$i]["input_col"] 					= "col-sm-12";
$i++;
$edit["field"][$i]["label"]              			= "Alamat";
$edit["field"][$i]["label_col"] 					= "col-sm-12";
$edit["field"][$i]["label_attr"]["style"] 			= "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"]              			= "catatan";
$edit["field"][$i]["input_element"]      			= "textarea";
$edit["field"][$i]["input_attr"]["rows"] 			= "5";
$edit["field"][$i]["input_col"] 					= "col-sm-12";
$i++;
$edit["field"][$i]["form_group_class"] 				= "hiding";
$edit["field"][$i]["label"] 						= "Kode TEMP";
$edit["field"][$i]["input"] 						= "kode_temp";
$edit["field"][$i]["input_save"] 					= "skip";
$i++;

if ($edit["mode"] != "add") {
	$edit["query"] = "
	SELECT a.*
	FROM " . $edit["table"] . " a
	WHERE a.nomor = " . $_GET["no"];

	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));

	$edit = fill_value($edit, $r);
}

$edit = generate_info($edit, $r, "insert|update");
$edit_navbutton = generate_navbutton($edit_navbutton);
