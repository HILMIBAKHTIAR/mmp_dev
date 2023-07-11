<?php
$edit["debug"] 			= 1;
// $edit["unique"] 		= array("kode","nama","nomormhusaha");
$edit["string_code"] 	= "";

$i = 0;
if(!empty($_GET["a"]) && $_GET["a"] == "view")
	$edit["field"][$i]["box_tabs"] 						= array("data|Data","info|Info");
$edit["field"][$i]["box_tab"] 							= "data";
$edit["field"][$i]["label"] 							= "Kode";
$edit["field"][$i]["label_class"] 						= "req";
$edit["field"][$i]["input"] 							= "kode";
$edit["field"][$i]["input_class"] 						= "required";
$edit["field"][$i]["input_attr"]["maxlength"] 			= "5";
$i++;
$edit["field"][$i]["label"] 							= "Nama";
$edit["field"][$i]["label_class"] 						= "req";
$edit["field"][$i]["input"] 							= "nama";
$edit["field"][$i]["input_class"] 						= "required";
$edit["field"][$i]["input_attr"]["maxlength"] 			= "200";
$i++;
$edit["field"][$i]["label"] 							= "Perusahaan";
$edit["field"][$i]["label_class"] 						= "req";
$edit["field"][$i]["input"] 							= "nomormhusaha";
$edit["field"][$i]["input_class"] 						= "required";
$edit["field"][$i]["input_element"] 					= "browse";
$edit["field"][$i]["browse_setting"] 					= "master_cabang_pt";
$edit["field"][$i]["browse_set"]["param_output"]		= array("kode|kode_temp");
$i++;
$edit["field"][$i]["label"] 							= "Level";
$edit["field"][$i]["label_class"] 						= "req";
$edit["field"][$i]["input"] 							= "tingkatan";
$edit["field"][$i]["input_class"] 						= "required ".$_SESSION["setting"]["class_integer"];
$edit["field"][$i]["input_attr"]["maxlength"] 			= "2";
$i++;
$edit["field"][$i]["label"] 							= "Keterangan";
$edit["field"][$i]["input"] 							= "keterangan";
$edit["field"][$i]["input_element"] 					= "textarea";
$edit["field"][$i]["input_attr"]["rows"] 				= "3";
$edit["field"][$i]["input_attr"]["cols"] 				= "44";
$i++;
$edit["field"][$i]["anti_mode"] 						= "add";
$edit["field"][$i]["label"] 							= "Status";
$edit["field"][$i]["input"] 							= "status_aktif";
$edit["field"][$i]["input_element"] 					= "select1";
$edit["field"][$i]["input_option"] 						= generate_status_option($edit["mode"]);
$i++;
// $edit["field"][$i]["form_group_class"] 					= "hiding";
// $edit["field"][$i]["label"] 							= "Cabang PT";
// $edit["field"][$i]["input"] 							= "nomormhusaha";
// $edit["field"][$i]["input_attr"]["readonly"] 			= "readonly";
// if($edit["mode"] == "add")
//     $edit["field"][$i]["input_value"] 					= $_SESSION["usaha"]["nomor"];
// $i++;

if($edit["mode"] != "add")
{
	$r = mysqli_fetch_array(mysqli_query($con, "
	SELECT a.*,
	CONCAT('[', b.kode, '] ', b.nama, '|', b.nomor) AS 'browse|nomormhusaha'
	FROM ".$edit["table"]." a
	LEFT JOIN mhusaha b ON a.nomormhusaha = b.nomor
	WHERE a.nomor = ".$_GET["no"]));
	
	$edit = fill_value($edit,$r);
}
$edit = generate_info($edit,$r,"insert|update");
$edit_navbutton = generate_navbutton($edit_navbutton);
?>