<?php
$edit["debug"] = 1;
$edit["unique"] = array("kode");
$edit["string_code"] = "";

$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view")
	$edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
$edit["field"][$i]["box_tab"] = "data";
$edit["field"][$i]["label"] = "Deskripsi";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "kode";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_attr"]["maxlength"] = "200";
$i++;
$edit["field"][$i]["label"] = "Account Awal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "nomormhaccountawal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_element"] = "browse";
$edit["field"][$i]["browse_setting"] = "master_account_all";
$edit["field"][$i]["browse_set"]["id"] = "master_account_awal";
$i++;
$edit["field"][$i]["label"] = "Account Akhir";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "nomormhaccountakhir";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_element"] = "browse";
$edit["field"][$i]["browse_setting"] = "master_account_all";
$edit["field"][$i]["browse_set"]["id"] = "master_account_akhir";
$i++;
$edit["field"][$i]["label"] = "Keterangan";
$edit["field"][$i]["input"] = "keterangan";
$edit["field"][$i]["input_element"] = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "3";
$edit["field"][$i]["input_attr"]["cols"] = "44";
$i++;
$edit["field"][$i]["anti_mode"] = "add";
$edit["field"][$i]["label"] = "Status";
$edit["field"][$i]["input"] = "status_aktif";
$edit["field"][$i]["input_element"] = "select";
$edit["field"][$i]["input_option"] = generate_status_option($edit["mode"]);
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "Tipe";
$edit["field"][$i]["input"] = "tipe";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = "0";
$i++;

if ($edit["mode"] != "add") {
	$r = mysqli_fetch_array(mysqli_query($con, "
	SELECT a.*,
	CONCAT(b.kode,' - ',b.nama,'|',b.nomor) AS 'browse|nomormhaccountawal',
	CONCAT(c.kode,' - ',c.nama,'|',c.nomor) AS 'browse|nomormhaccountakhir'
	FROM " . $edit["table"] . " a
	JOIN mhaccount b ON a.nomormhaccountawal = b.nomor AND b.status_aktif > 0
	LEFT JOIN mhaccount c ON a.nomormhaccountakhir = c.nomor AND c.status_aktif > 0
	WHERE a.nomor = " . $_GET["no"]));

	$edit = fill_value($edit, $r);
}
$edit = generate_info($edit, $r, "insert|update");
$edit_navbutton = generate_navbutton($edit_navbutton);
