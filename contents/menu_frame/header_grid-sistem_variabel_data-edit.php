<?php // watched by patricklipesik
$edit["debug"] = 0;
$edit["unique"] = array("kode");
$edit["string_code"] = "";

$i = 0;
if(!empty($_GET["a"]) && $_GET["a"] == "view")
	$edit["field"][$i]["box_tabs"] = array("data|Data","info|Info");
$edit["field"][$i]["box_tab"] = "data";
$edit["field"][$i]["label"] = "Variabel";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "kode";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["label"] = "Nilai";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "nilai";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_attr"]["maxlength"] = "200";
$i++;
$edit["field"][$i]["label"] = "Keterangan";
$edit["field"][$i]["input"] = "keterangan";
$edit["field"][$i]["input_element"] = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "3";
$edit["field"][$i]["input_attr"]["cols"] = "44";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;

if($edit["mode"] != "add")
{
	$r = mysqli_fetch_array(mysqli_query($con, "
	SELECT a.*
	FROM ".$edit["table"]." a
	WHERE a.nomor = ".$_GET["no"]));
	
	$edit = fill_value($edit,$r);
}
$edit = generate_info($edit,$r,"insert|update");
$features = "save|back|reload|edit";
$edit_navbutton = generate_navbutton($edit_navbutton,$features);
?>