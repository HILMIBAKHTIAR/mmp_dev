<?php
$edit["debug"] = 1;

$edit["manual_save"] = "contents/menu_frame/" . $_SESSION["g.frame"] . "-" . $_SESSION["g.menu"] . "-save.php";
$edit["unique"] = array();
$edit["string_code"] = "kode_uang_masuk_lain";

if ($edit["mode"] != "add") {
	$edit["query"] = "
	SELECT a.*,
	DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') AS tanggal,
	DATE_FORMAT(a.giro_tempo,'" . $_SESSION["setting"]["date_sql"] . "') AS giro_tempo,
	CONCAT(bac.kode,' - ',bac.nama,'|',bac.nomor) AS 'browse|nomormhaccount',
	CONCAT(bvl.kode,'|',bvl.nomor) AS 'browse|nomormhvaluta'
	FROM " . $edit["table"] . " a
	LEFT JOIN mhaccount bac ON a.nomormhaccount = bac.nomor AND bac.status_aktif > 0
	JOIN mhvaluta bvl ON a.nomormhvaluta = bvl.nomor AND bvl.status_aktif > 0
	WHERE a.nomor = " . $_GET["no"];

	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));

	if ($edit["mode"] == "edit")
		check_edit($r);
}

$edit["sp_approve"] = "sp_disetujui_thuangmasuk_lain";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_thuangmasuk_lain";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";

$i = 0;
// BEGIN GRID 0.DETAIL
$edit["detail"][$i]["table_name"] = "tduangmasuk";
$edit["detail"][$i]["field_name"] = array(
	"subtotal",
	"keterangan",
	"nomormhaccount",
	"nomormhpekerjaan",
	"tipe",
	"jenis"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
// END GRID 0.DETAIL

$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view")
	$edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
$edit["field"][$i]["box_tab"] = "data";
$edit["field"][$i]["label"] = "Nomor";
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
if ($_SESSION["menu_" . $_SESSION["g.menu_kode"]]["priv"]["backdate"] != 1) {
	$edit["field"][$i]["input_class"] = "required";
	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
}
$i++;
$edit["field"][$i]["label"] = "Metode";
$edit["field"][$i]["input"] = "metode";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("Kas|KAS", "Bank|BANK", "Giro|GIRO");
$i++;
$edit["field"][$i]["label"] = "Account Kas/Bank";
$edit["field"][$i]["input"] = "nomormhaccount";
$edit["field"][$i]["input_element"] = "browse";
$edit["field"][$i]["browse_setting"] = "master_account_kasbank";
$edit["field"][$i]["browse_set"]["param_input"] = array("a.kas|kas", "a.bank|bank", "a.giro|giro");
$edit["field"][$i]["browse_set"]["param_output"] = array("kode_inisial|account_kode");
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "account_kode";
$edit["field"][$i]["input"] = "account_kode";
$edit["field"][$i]["input_class"] = "browse_master_account_kasbank_clear";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_save"] = "skip";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "proyek_terpilih";
$edit["field"][$i]["input"] = "proyek_terpilih";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_save"] = "skip";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "account_terpilih";
$edit["field"][$i]["input"] = "account_terpilih";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_save"] = "skip";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "kas";
$edit["field"][$i]["input"] = "kas";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = "0";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "bank";
$edit["field"][$i]["input"] = "bank";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = "0";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "giro";
$edit["field"][$i]["input"] = "giro";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = "0";
$i++;
$edit["field"][$i]["form_group_class"] = "giro_section";
$edit["field"][$i]["label"] = "Ref Giro";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "giro_ref";
$edit["field"][$i]["input_attr"]["maxlength"] = "200";
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["form_group_class"] = "giro_section";
$edit["field"][$i]["label"] = "Jatuh Tempo Giro";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "giro_tempo";
$edit["field"][$i]["input_class"] = "date_1";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "Cabang";
$edit["field"][$i]["input"] = "nomormhcabang";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = $_SESSION["cabang"]["nomor"];
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "tipe";
$edit["field"][$i]["input"] = "tipe";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = 1;
$i++;


// BEGIN GRID 0.DETAIL
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar Account'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
	'Account',
	'Bayar',
	'Keterangan',
	'nomormhaccount',
	'tipe',
	'jenis'
";
$edit["field"][$i]["grid_set"]["column"] = array(
	"account",
	"subtotal",
	"keterangan",
	"nomormhaccount",
	"tipe",
	"jenis"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
	account        :'',
	subtotal       : null,
	keterangan     :'',
	nomormhaccount :'',
	tipe           :'1',
	jenis          :'LAIN_LAIN'
}";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[]";
$edit["field"][$i]["grid_set"]["option"]["footerrow"] = "true";
$edit["field"][$i]["grid_set"]["option"]["userDataOnFooter"] = "true";
$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'account'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'account'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_account }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhaccount'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhaccount'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jenis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jenis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;


$i++;
// END GRID 0.DETAIL

$edit["field"][$i]["input"] = "keterangan";
$edit["field"][$i]["input_class"] = "";
$edit["field"][$i]["input_col"] = "col-sm-6";
$edit["field"][$i]["input_element"] = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "7";
$edit["field"][$i]["input_attr"]["cols"] = "70";
$edit["field"][$i]["input_attr"]["placeholder"] = "Keterangan :";
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Total Bayar";
$edit["field"][$i]["input"] = "total";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "total_idr";
$edit["field"][$i]["input"] = "total_idr";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "Valuta";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "nomormhvaluta";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_element"] = "browse";
$edit["field"][$i]["browse_setting"] = "master_currency";
$edit["field"][$i]["browse_set"]["param_output"] = array("kurs|kurs");
$edit["field"][$i]["browse_set"]["call_function"] = array("calculate_all", "checkKurs");
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = "IDR - RUPIAH|1";
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Kurs";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "kurs";
$edit["field"][$i]["input_class"] = "required iptmoney";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = 1;
$i++;

if ($edit["mode"] != "add") {
	$edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT
		a.*,
		CONCAT(bac.kode,' - ',bac.nama) AS account
	FROM " . $edit["detail"][0]["table_name"] . " a
	JOIN mhaccount bac ON a.nomormhaccount = bac.nomor AND bac.status_aktif > 0
	WHERE a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];

	$edit = fill_value($edit, $r);
}
$edit = generate_info($edit, $r);

$features = "save|back|reload|add" . check_approval($r, "edit|approve|delete|disappr|print");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);

$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
?>


<script language="javascript" type="text/javascript">
	$(document).ready(function() {
		const kodeAccountContainer = document.getElementsByName('div_H_i4')[0];

		const metodeField = document.getElementById('metode');
		const kodeAccountField = document.getElementById('browse_master_account_kasbank_search');

		<?php if ($edit["mode"] == "add") { ?>
			kodeAccountField.required = true
		<?php } ?>

		const metodeValue = metodeField.value

		metodeField.addEventListener('change', (e) => {
			if (e.target.value === 'Giro') {
				kodeAccountContainer.style.display = 'none';
				kodeAccountField.required = false
				kodeAccountField.value = null;
			} else {
				kodeAccountContainer.style.display = 'block';
				kodeAccountField.required = true
				$('#giro_ref').val('')
			}
		})

		if (metodeValue == 'Giro') {
			kodeAccountContainer.style.display = 'none';
		} else {
			kodeAccountContainer.style.display = 'block';
		}

		metode_value_changed($("#metode"), 1);
		$(document).on('change', '#metode', function() {
			metode_value_changed(this);
		});
		// $('#metode').change();
		checkKurs();
	});

	function metode_value_changed(obj, firstload) {
		// <?php if ($edit["mode"] == "add") { ?>
		// if($(obj).val() == 'Kas')
		// {
		// 	$('#kas').val(1);
		// 	$('#bank').val(0);
		// 	$('#giro').val(0);
		// }
		// else if($(obj).val() == 'Bank')
		// {
		// 	$('#kas').val(0);
		// 	$('#bank').val(1);
		// 	$('#giro').val(0);
		// }
		// else if($(obj).val() == 'Giro')
		// {
		// 	$('#kas').val(0);
		// 	$('#bank').val(0);
		// 	$('#giro').val(1);
		// }
		// else
		// {
		// 	$('#kas').val(0);
		// 	$('#bank').val(0);
		// 	$('#giro').val(0);
		// }
		// browse_clear('master_account_kasbank');
		// <?php } ?>

		if ($(obj).val() == 'Kas') {
			$('#kas').val(1);
			$('#bank').val(0);
			$('#giro').val(0);
		} else if ($(obj).val() == 'Bank') {
			$('#kas').val(0);
			$('#bank').val(1);
			$('#giro').val(0);
		} else if ($(obj).val() == 'Giro') {
			$('#kas').val(0);
			$('#bank').val(0);
			$('#giro').val(1);
		} else {
			$('#kas').val(0);
			$('#bank').val(0);
			$('#giro').val(0);
		}
		if (firstload == 0)
			browse_clear('master_account_kasbank');

		if ($(obj).val() == 'Giro') {
			$('.giro_section').show();
		} else {
			$('.giro_section').hide();
		}
	}

	function clear_grid() {
		var ids = jQuery(<?= $grid_elm[0] ?>).jqGrid('getDataIDs');

		for (var i = 0; i < ids.length; i++) {
			jQuery(<?= $grid_elm[0] ?>).jqGrid('setCell', ids[i], 'pekerjaan', '');
			jQuery(<?= $grid_elm[0] ?>).jqGrid('setCell', ids[i], 'nomormhpekerjaan', '');
		}
	}

	function calculate_all() {
		<?php if ($edit["mode"] != "view") { ?>
			var total = jQuery(<?= $grid_elm[0] ?>).jqGrid('getCol', 'subtotal', false, 'sum');
			$('#total').val(total);

			var kurs = $('#kurs').val();
			var total_idr = total * kurs;
			$('#total_idr').val(total_idr);
		<?php } ?>
	}

	function checkHeader() {
		var fields = [
			'tanggal|Tanggal',
			'browse_master_currency_hidden|Valuta'
		];
		var check_failed = check_value_elements(fields);
		if (check_failed != '')
			return check_failed;
		else
			return true;
	}

	function checkSave() {
		calculate_all();

		var check_failed = '';

		var metode = $('#metode').val();
		var giro_ref = $('#giro_ref').val();
		var giro_tempo = $('#giro_tempo').val();

		if (metode == 'Giro' && giro_ref == '')
			check_failed += '- Ref Giro wajib diisi\n\n';
		if (metode == 'Giro' && giro_tempo == '')
			check_failed += '- Jatuh Tempo Giro wajib diisi\n\n';

		if (check_failed != '')
			return check_failed;
		else
			return true;
	}

	function checkKurs() {
		if ($('#browse_master_currency_hidden').val() == 1) {
			$('#kurs').val(1);
			$('#kurs').prop('readonly', true);
		} else {
			$('#kurs').val(0);
			$('#kurs').prop('readonly', false);
		}
	}
	<?= generate_function_checkgrid($grid_str) ?>
	<?= generate_function_checkunique($grid_str) ?>
	<?= generate_function_realgrid($grid_str) ?>
</script>