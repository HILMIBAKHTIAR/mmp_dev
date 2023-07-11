<?php
// SETTING DEFAULT
$edit["debug"]       = 1;
$edit["unique"]      = array("nama");
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];

// SETTING FORM HEADER
$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
	$edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
}
$edit["field"][$i]["box_tab"] = "data";
// SETTING FIELD
$edit["field"][$i]["label"]                   = "Kode";
$edit["field"][$i]["input"]                   = "kode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
if ($edit["mode"] == "add") {
	$edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
}
$i++;

$edit["field"][$i]["label"]                  = "Nama Kategori";
$edit["field"][$i]["label_class"]     		 = "req";
$edit["field"][$i]["input"]                  = "nama";
$edit["field"][$i]["input_class"]      		 = "required";
$i++;

$edit["field"][$i]["label"]                         = "Jenis";
$edit["field"][$i]["label_class"]                     = "req";
$edit["field"][$i]["input"]                            = "jenis";
$edit["field"][$i]["input_element"]          = "select";
$edit["field"][$i]["input_option"]           =
    [
        "2|Asset",
        "1|Stok",
        "0|Non Stok"
    ];
$i++;

$edit["field"][$i]["label"]            = "Kode Account Akumulasi";
$edit["field"][$i]["input"]            = "nomormhaccountakumulasi";
$edit["field"][$i]["input_element"]    = "browse";
$edit["field"][$i]["browse_set"]["id"] = "master_account_akumulasi";
$edit["field"][$i]["browse_setting"]   = "master_account_akumulasi";
$i++;

$edit["field"][$i]["form_group"]  = 0;
$edit["field"][$i]["label"]            = "Account";
$edit["field"][$i]["label_class"]      = "req";
$edit["field"][$i]["input"]            = "nomormhaccount";
$edit["field"][$i]["input_class"]      = "required";
$edit["field"][$i]["input_element"]    = "browse";
$edit["field"][$i]["browse_set"]["id"] = "master_account_all";
$edit["field"][$i]["browse_setting"]   = "master_account_all";
$i++;

$edit["field"][$i]["label"]            = "Kde Account Beban";
$edit["field"][$i]["input"]            = "nomormhaccountbeban";
$edit["field"][$i]["input_element"]    = "browse";
$edit["field"][$i]["browse_set"]["id"] = "master_account_beban";
$edit["field"][$i]["browse_setting"]   = "master_account_beban";
$i++;
// $edit["field"][$i]["form_group"]             = 0;
$edit["field"][$i]["label"]                  = "Lama Penyusutan";
$edit["field"][$i]["label_class"]      = "req";
$edit["field"][$i]["input"]                  = "lamapenyusutan";
$edit["field"][$i]["input_class"]      = "required";
$edit["field"][$i]["input_class"]            = "iptnumber";
$i++;

$edit["field"][$i]["label"]                  = "Nilai Akhir";
$edit["field"][$i]["label_class"]     		 = "req";
$edit["field"][$i]["input"]                  = "nilaiakhir";
$edit["field"][$i]["input_class"]      		 = "required";
$edit["field"][$i]["input_class"]            = "iptmoney";
$i++;

$edit["field"][$i]["label"] = "Keterangan";
$edit["field"][$i]["input"] = "keterangan";
$edit["field"][$i]["input_element"] = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "3";
$edit["field"][$i]["input_attr"]["cols"] = "44";
$i++;

// END SETTING FIELD
// END SETTING FORM HEADER

// QUERY FOR VIEW AND EDIT
if ($edit["mode"] != "add") {
	$edit["query"] = "
	SELECT a.*,
	DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
	CONCAT(b.kode,' - ',b.nama,'|',b.nomor) AS 'browse|nomormhaccountakumulasi',
	CONCAT(c.kode,' - ',c.nama,'|',c.nomor) AS 'browse|nomormhaccount',
	CONCAT(d.kode,' - ',d.nama,'|',d.nomor) AS 'browse|nomormhaccountbeban'
	FROM " . $edit["table"] . " a
	JOIN mhaccount b ON a.nomormhaccountakumulasi = b.nomor AND b.status_aktif > 0
	JOIN mhaccount c ON a.nomormhaccount = c.nomor AND c.status_aktif > 0
	JOIN mhaccount d ON a.nomormhaccountbeban = d.nomor AND d.status_aktif > 0
	WHERE a.nomor = " . $_GET["no"];
	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));

	$edit = fill_value($edit, $r);
}
// END QUERY FOR VIEW AND EDIT
$edit           = generate_info($edit, $r, "insert|update|delete");
$edit_navbutton = generate_navbutton($edit_navbutton);

$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
?>

<script type="text/javascript">
	// HEADER VALIDATION
	function checkHeader() {
		var fields = ["kode|Kode"];
		var check_failed = check_value_elements(fields);
		if (check_failed != '')
			return check_failed;
		else
			return true;
	}
	// END HEADER VALIDATION


	$(document).ready(function() {
	
	});

	

	<?= generate_function_checkgrid($grid_str) ?>
	<?= generate_function_checkunique($grid_str) ?>
	<?= generate_function_realgrid($grid_str) ?>
</script>