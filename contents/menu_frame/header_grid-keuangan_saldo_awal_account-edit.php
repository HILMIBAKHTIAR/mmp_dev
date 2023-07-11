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
// $edit["field"][$i]["form_group"]  = 0;
$edit["field"][$i]["label"] = "Tanggal";
$edit["field"][$i]["input"] = "tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input_class"] = " required date_1";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
if ($edit["mode"] == "add") {
	// set input value to session setting start_date formatted from yyyy-mm-dd to dd/mm/yyyy
	$start_date = explode("-", $_SESSION["setting"]["start_date"]);
	$edit["field"][$i]["input_value"] = $start_date[2] . "/" . $start_date[1] . "/" . $start_date[0];
}
$i++;
$edit["field"][$i]["label"]            = "Account";
$edit["field"][$i]["label_class"]      = "req";
$edit["field"][$i]["input"]            = "nomormhaccount";
$edit["field"][$i]["input_class"]      = "required";
$edit["field"][$i]["input_element"]    = "browse";
$edit["field"][$i]["browse_set"]["id"] = "master_account_all";
$edit["field"][$i]["browse_setting"]   = "master_account_all";
$i++;
// $edit["field"][$i]["form_group"]             = 0;
$edit["field"][$i]["label"]                  = "Total Debet";
$edit["field"][$i]["input"]                  = "total_debet";
$edit["field"][$i]["input_class"]            = "iptmoney";
$i++;
$edit["field"][$i]["label"]                  = "Total Kredit";
$edit["field"][$i]["input"]                  = "total_kredit";
$edit["field"][$i]["input_class"]            = "iptmoney";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "Cabang";
$edit["field"][$i]["input"] = "nomormhcabang";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = $_SESSION["cabang"]["nomor"];
$i++;
// END SETTING FIELD
// END SETTING FORM HEADER

// QUERY FOR VIEW AND EDIT
if ($edit["mode"] != "add") {
	$edit["query"] = "
	SELECT a.*,
	DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
	CONCAT(br.kode,' - ',br.nama,'|',br.nomor) AS 'browse|nomormhaccount'
	FROM " . $edit["table"] . " a
	JOIN mhaccount br ON a.nomormhaccount= br.nomor AND br.status_aktif > 0
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

	function pad(str, max) {
		str = str.toString();
		return str.length < max ? pad("0" + str, max) : str;
	}

	$(document).ready(function() {
		$("#total_kredit").change(function(){
			var total_kredit = $("#total_kredit").val();
			if(total_kredit != "0"){
				$("#total_debet").val(0);
			}
		})

		$("#total_debet").change(function(){
			var total_debit = $("#total_debet").val();
			if(total_debit != "0"){
				$("#total_kredit").val(0);
			}
		})
	});

	// cek tanggal apakah lebih dari tanggal saldo awal
	$(document).on('click', '.save', function(event) {
		event.preventDefault();
		var obj = $.dialog({
			icon: 'fa fa-spinner fa-spin',
			title: 'Working!',
			draggable: false,
			// theme: 'modern',
			animation: 'scale',
			// type: 'orange',
			content: '<font style="font-size:14px">Pengecekan Data..</font>',
			buttons: {
				ok: {
					isHidden: true,
				}
			},
			onOpen: function() {
				var tanggal_saldo_awal = '<?= $_SESSION["setting"]["start_date"] ?>'
				var tanggal = $("#tanggal").val();

				// format tanggal from dd/mm/yyyy to yyyy-mm-dd
				tanggal = tanggal.split('/').reverse().join('-');

				if (tanggal > tanggal_saldo_awal) {
					$.alert({
						icon: 'fa fa-exclamation-triangle',
						theme: 'modern',
						closeIcon: true,
						animation: 'scale',
						type: 'red',
						title: 'NOTIFICATION',
						content: 'Tanggal tidak boleh lebih besar dari tanggal saldo awal ' + tanggal_saldo_awal,
						onClose: function() {
							obj.close();
						}
					});
				} else {
					obj.close();
					$('form#form_edit').submit();
				}
			}
		});
	});

	<?= generate_function_checkgrid($grid_str) ?>
	<?= generate_function_checkunique($grid_str) ?>
	<?= generate_function_realgrid($grid_str) ?>
</script>