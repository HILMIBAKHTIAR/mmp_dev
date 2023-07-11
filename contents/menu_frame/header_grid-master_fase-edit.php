<?php
// SETTING DEFAULT
$edit["debug"]       = 1;
$edit["unique"]      = array("kode");
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];

// SETTING DATA GRID FOR SAVE
// $i = 0;
// $edit["detail"][$i]["table_name"] = "mdcustomerrekanan";
// $edit["detail"][$i]["field_name"] = array(
// 	"kode",
// 	"nama",
// 	"keterangan",
// 	"status_aktif"
// 	"nomormhrekanan",
// 	"nomor"
// );
// $edit["detail"][$i]["foreign_key"]      = "nomor".$edit["table"];
// $edit["detail"][$i]["additional_where"] = "";
// $edit["detail"][$i]["string_id"]        = "";
// $edit["detail"][$i]["grid_id"]          = $_SESSION["menu_".$_SESSION["g.menu"]]["string"];
// $i++;
// END SETTING DATA GRID

// SETTING FORM HEADER
$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
	$edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
}
$edit["field"][$i]["box_tab"] = "data";
// SETTING FIELD


$edit["field"][$i]["form_group"]              = 0;
$edit["field"][$i]["label"]                   = "Kode";
$edit["field"][$i]["label_class"]             = "req";
$edit["field"][$i]["input"]                   = "kode";
$edit["field"][$i]["input_class"]             = "required";
$edit["field"][$i]["input_attr"]["maxlength"] = "200";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
if ($edit["mode"] == "add") {
	$edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
}
$i++;
$edit["field"][$i]["form_group"]              = 0;
$edit["field"][$i]["label"] = "Status Aktif";
$edit["field"][$i]["input"] = "status_aktif";
$edit["field"][$i]["input_element"] = "select";
$edit["field"][$i]["input_option"] = array(
	"1|Aktif",
	"0|Tidak Aktif"
);
if ($edit["mode"] == "add") {
	$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
	$edit["field"][$i]["input_save"]  = "skip";
}
$i++;
$edit["field"][$i]["label"]                   = "Nama Fase";
$edit["field"][$i]["label_class"]             = "req";
$edit["field"][$i]["input"]                   = "nama";
$edit["field"][$i]["input_class"]             = "required";
$edit["field"][$i]["input_attr"]["maxlength"] = "200";
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"]            = "Scope";
$edit["field"][$i]["label_class"]      = "req";
$edit["field"][$i]["input"]            = "nomormhscopeproyek";
$edit["field"][$i]["input_class"]      = "required";
$edit["field"][$i]["input_element"]    = "browse";
$edit["field"][$i]["browse_set"]["id"] = "master_scope";
$edit["field"][$i]["browse_setting"]   = "master_scope";
$i++;
// $edit["field"][$i]["form_group"]              = 0;
$edit["field"][$i]["label"]            = "Account 1";
$edit["field"][$i]["label_class"]      = "req";
$edit["field"][$i]["input"]            = "nomormhaccount1";
$edit["field"][$i]["input_class"]      = "required";
$edit["field"][$i]["input_element"]    = "browse";
$edit["field"][$i]["browse_set"]["id"] = "master_account_1";
$edit["field"][$i]["browse_setting"]   = "master_account";
$i++;
$edit["field"][$i]["form_group"]              = 0;
$edit["field"][$i]["label"]                   = "Alokasi Account 1";
$edit["field"][$i]["label_class"]             = "req";
$edit["field"][$i]["input"]                   = "alokasi_account1";
$edit["field"][$i]["input_class"]             = "required iptmoney";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = 0;
$i++;
$edit["field"][$i]["label"]            = "Account 2";
$edit["field"][$i]["label_class"]      = "req";
$edit["field"][$i]["input"]            = "nomormhaccount2";
$edit["field"][$i]["input_class"]      = "required";
$edit["field"][$i]["input_element"]    = "browse";
$edit["field"][$i]["browse_set"]["id"] = "master_account_2";
$edit["field"][$i]["browse_setting"]   = "master_account";
$i++;
$edit["field"][$i]["form_group"]              = 0;
$edit["field"][$i]["label"]                   = "Alokasi Account 2";
$edit["field"][$i]["label_class"]             = "req";
$edit["field"][$i]["input"]                   = "alokasi_account2";
$edit["field"][$i]["input_class"]             = "required iptmoney";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = 0;
$i++;
// $edit["field"][$i]["form_group"]              = 0;
$edit["field"][$i]["label"]              = "Keterangan";
$edit["field"][$i]["input"]              = "keterangan";
$edit["field"][$i]["input_element"]      = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "3";
$edit["field"][$i]["input_attr"]["cols"] = "44";
$i++;


// END SETTING FIELD
// END SETTING FORM HEADER



// QUERY FOR VIEW AND EDIT
if ($edit["mode"] != "add") {
	$edit["query"] = "
	SELECT a.*,
	CONCAT(b.nama, '|',b.nomor) as 'browse|nomormhscopeproyek',
	CONCAT(acc1.kode, ' - ', acc1.nama, '|',acc1.nomor) as 'browse|nomormhaccount1',
	CONCAT(acc2.kode, ' - ', acc2.nama, '|',acc2.nomor) as 'browse|nomormhaccount2'
	FROM mhfase a
	JOIN mhscopeproyek b ON b.nomor = a.nomormhscopeproyek
	LEFT JOIN mhaccount acc1 ON acc1.nomor = a.nomormhaccount1
	LEFT JOIN mhaccount acc2 ON acc2.nomor = a.nomormhaccount2
	WHERE a.nomor = " . $_GET["no"];
	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));

	// $edit["field"][$grid[0]]["grid_set"]["query"] = "
	// SELECT a.*,
	// CONCAT(b.kode,' - ',b.nama) AS rekanan
	// FROM ".$edit["detail"][0]["table_name"]." a
	// JOIN mhrekanan b ON a.nomormhrekanan = b.nomor AND b.status_aktif > 0
	// WHERE a.status_aktif > 0
	// AND a.".$edit["detail"][0]["foreign_key"]." = ".$_GET["no"];

	$edit = fill_value($edit, $r);
}
// END QUERY FOR VIEW AND EDIT
$edit           = generate_info($edit, $r, "insert|update|approve|disapp");;
$edit_navbutton = generate_navbutton($edit_navbutton);

$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
?>

<script type="text/javascript">
	// HEADER VALIDATION
	function checkHeader() {
		var fields = [];
		var check_failed = check_value_elements(fields);

		var alokasi_account1 = parseFloat($("#alokasi_account1").val());
		var alokasi_account2 = parseFloat($("#alokasi_account2").val());

		if (alokasi_account1 + alokasi_account2 != 100)
			check_failed += "Alokasi Account 1 dan Account 2 harus berjumlah 100%<br>";

		if (check_failed != '')
			return check_failed;
		else
			return true;
	}
	// END HEADER VALIDATION
	<?= generate_function_checkgrid($grid_str) ?>
	<?= generate_function_checkunique($grid_str) ?>
	<?= generate_function_realgrid($grid_str) ?>
</script>