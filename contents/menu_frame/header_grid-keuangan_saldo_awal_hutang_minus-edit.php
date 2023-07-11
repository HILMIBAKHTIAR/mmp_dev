<?php
$edit["debug"] = 1;
$edit["ajax"] = 1;

$edit["unique"] = array();
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];

$edit["sp_approve"] = "sp_disetujui_nds";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_nds";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "1";

if ($edit["mode"] != "add") {
	$edit["query"] = "
	SELECT a.*,
	DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') AS tanggal,
	CONCAT(b.kode,'-',b.nama,'|',b.nomor) as 'browse|nomormhrelasi'
	FROM " . $edit["table"] . " a
	join mhrelasi b on a.nomormhrelasi = b.nomor 
	WHERE a.nomor = " . $_GET["no"];
	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));

	if ($edit["mode"] == "edit")
		check_edit($r);
}

$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view")
	$edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
$edit["field"][$i]["box_tab"] = "data";
$edit["field"][$i]["label"] = "Kode";
$edit["field"][$i]["input"] = "kode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "tanggal";
$edit["field"][$i]["input_class"] = "required date_1";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit['mode'] == 'add') {
	$start_date = explode("-", $_SESSION["setting"]["start_date"]);
	$edit["field"][$i]["input_value"] = $start_date[2] . "/" . $start_date[1] . "/" . $start_date[0];
}
if ($_SESSION["menu_" . $_SESSION["g.menu_kode"]]["priv"]["backdate"] != 1) {
	$edit["field"][$i]["input_class"] = "required";
	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
}
$i++;
$edit["field"][$i]["label"] = "Supplier";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "nomormhrelasi";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_element"] = "browse";
$edit["field"][$i]["browse_setting"] = "master_supplier";
$i++;
// $edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Total";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "total";
$edit["field"][$i]["input_class"] = "required " . $_SESSION["setting"]["class_money"];
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = 0;
$i++;
$edit["field"][$i]["label"] = "Keterangan";
$edit["field"][$i]["input"] = "keterangan";
$edit["field"][$i]["input_element"] = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "3";
$edit["field"][$i]["input_attr"]["cols"] = "44";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "Cabang";
$edit["field"][$i]["input"] = "nomormhcabang";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = $_SESSION["cabang"]["nomor"];
$i++;
$edit["field"][$i]["form_group_class"]       = "hiding";
$edit["field"][$i]["label"]                  = "Jenis";
$edit["field"][$i]["input"]                  = "jenis";
$edit["field"][$i]["input_col"] = "col-sm-4";
$edit["field"][$i]["input_value"] = "NDS";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group_class"]       = "hiding";
$edit["field"][$i]["label"]                  = "Saldo Awal";
$edit["field"][$i]["input"]                  = "saldo_awal";
$edit["field"][$i]["input_col"] = "col-sm-4";
$edit["field"][$i]["input_value"] = 1;
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;

if ($edit["mode"] != "add") {
	$edit = fill_value($edit, $r);
}
$edit = generate_info($edit, $r, "insert|update|approve|disapp");;

$features = "save|back|reload|add" . check_approval($r, "edit|approve|disappr|delete");
if (isset($r["status_aktif"]) && $r["status_aktif"] == 0)
	$features = "back|reload|add";
$edit_navbutton = generate_navbutton($edit_navbutton, $features);
?>
<script language="javascript" type="text/javascript">
	$(document).ready(function() {
		
		
	});

	
</script>