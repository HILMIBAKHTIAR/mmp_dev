<?php
// SETTING DEFAULT
$edit["debug"]       = 1;
$edit["unique"]      = array("kode|Kode");
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];
// $edit["manual_save"]="contents/menu_frame/header_grid-transaksi_nota_pembelian_lokal_stok-save.php";

// $edit['sp_add'] = "sp_add_thuangmuka_saldoawal";
// $edit["sp_add_param"] = array("param_nomormhadmin|0", "param_mode|1");
// $edit['sp_edit'] = "sp_add_thuangmuka_saldoawal";
// $edit["sp_edit_param"] = array("param_nomormhadmin|0", "param_mode|1");
// $_POST["param_nomor"] = $_GET["no"];
// $_POST["param_nomormhadmin"] 		= $_SESSION["login"]["nomor"];
// $_POST["param_mode"] 				= "";

$edit["sp_approve"] = "sp_disetujui_thuangmuka";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_thuangmuka";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "1";

// SETTING DATA GRID FOR SAVE

// END SETTING DATA GRID

// SETTING FORM HEADER

$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
	$edit["field"][$i]["box_tabs"] = array(
		"data|Data",
		"info|Info"
	);
}
// SETTING FIELD
$edit["field"][$i]["box_tab"]                 = "data";

$edit["field"][$i]["label"]                   = "Kode";
$edit["field"][$i]["input"]                   = "kode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
if ($edit["mode"] == "add") {
	$edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
}
$i++;
$edit["field"][$i]["label"] = "Tanggal";
$edit["field"][$i]["input"] = "tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input_class"] = "required date_1";
if ($edit["mode"] == "add") {
	// set input value to session setting start_date formatted from yyyy-mm-dd to dd/mm/yyyy
	$start_date = explode("-", $_SESSION["setting"]["start_date"]);
	$edit["field"][$i]["input_value"] = $start_date[2] . "/" . $start_date[1] . "/" . $start_date[0];
}
$i++;
$edit["field"][$i]["label"]            = "Supplier";
$edit["field"][$i]["label_class"]      = "req";
$edit["field"][$i]["input"]            = "supplier";
$edit["field"][$i]["input_class"]      = "required";
$edit["field"][$i]["input_element"]    = "browse";
$edit["field"][$i]["browse_set"]["id"] = "master_supplier";
$edit["field"][$i]["browse_setting"]   = "master_supplier";
$i++;
$edit["field"][$i]["label"]                  = "Total";
$edit["field"][$i]["input"]                  = "total";
$edit["field"][$i]["input_class"] = "required iptmoney";
$i++;
$edit["field"][$i]["form_group_class"]       = "hiding";
$edit["field"][$i]["label"]                   = "saldo_awal";
$edit["field"][$i]["input"]                   = "saldo_awal";
$edit["field"][$i]["input_attr"]["maxlength"] = "200";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$edit["field"][$i]["input_value"] = "1";
$i++;
$edit["field"][$i]["form_group_class"]       = "hiding";
$edit["field"][$i]["label"]                   = "jenis";
$edit["field"][$i]["input"]                   = "jenis";
$edit["field"][$i]["input_attr"]["maxlength"] = "200";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
$edit["field"][$i]["input_value"] = "UMS";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "Cabang";
$edit["field"][$i]["input"] = "nomormhcabang";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = $_SESSION["cabang"]["nomor"];
$i++;
// END SETTING FIELD
$edit["field"][$i]["label"]              = "Keterangan";
$edit["field"][$i]["input"]              = "keterangan";
$edit["field"][$i]["input_element"]      = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "8";
$i++;

// END SETTING FORM HEADER


// QUERY FOR VIEW AND EDIT
if ($edit["mode"] != "add") {
	$edit["query"] = "
	SELECT
		a.*,
		CONCAT(b.kode,'-',b.nama,'|',b.nomor) as 'browse|supplier', 
		DATE_FORMAT(a.tanggal, '" . $_SESSION["setting"]["date_sql"] . "') as tanggal
  FROM thuangmuka a
	JOIN mhrelasi b ON a.nomormhrelasi=b.nomor
	WHERE a.nomor = " . $_GET["no"];

	$edit["debug"] = 1;
	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


	$edit = fill_value($edit, $r);
}
// END QUERY FOR VIEW AND EDIT

$edit = generate_info($edit, $r, "insert|update|approve|disapp");;
$check_approval_fields["status_disetujui"] = "status_disetujui";
$features = "save|back|reload" . check_approval($r, "approve|disappr|delete|edit", $check_approval_fields);
$edit_navbutton = generate_navbutton($edit_navbutton, $features);

// $edit           = generate_info($edit,$r,"insert|update|approve|disapp");;
// $edit_navbutton = generate_navbutton($edit_navbutton);


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

	$(document).ready(function() {});

	function currency(x) {
		var parts = x.toString().split(".");
		if (typeof parts[1] != 'undefined') {
			parts[1] = parts[1].substr(0, 2);
		}

		parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		return parts.join(",");
	}

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