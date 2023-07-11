<?php
$edit["debug"] = 1;
// $edit["ajax"] = 1;


$edit["manual_save"] = "contents/menu_frame/" . $_SESSION["g.frame"] . "-" . $_SESSION["g.menu"] . "-save.php";

$edit["unique"] = array();
$edit["string_code"] = "kode_uang_masuk_utama";
// $edit["manual_save_beforecommit"] = "contents/menu_frame/header_grid-uang_masuk-save_beforecommit.php";

if ($edit["mode"] != "add") {
	$edit["query"] = "
	SELECT a.*,
	CONCAT(b.nama,'|',b.nomor) AS 'browse|nomormhrelasi',
	CONCAT(bac.kode,' - ',bac.nama,'|',bac.nomor) AS 'browse|nomormhaccount',
	CONCAT(bvl.kode,'|',bvl.nomor) AS 'browse|nomormhvaluta'
	FROM ".$edit["table"]." a
	LEFT JOIN mhaccount bac ON a.nomormhaccount = bac.nomor AND bac.status_aktif > 0
	JOIN mhvaluta bvl ON a.nomormhvaluta = bvl.nomor AND bvl.status_aktif > 0
	LEFT JOIN mhrelasi b on b.nomor = a.nomormhrelasi
	WHERE a.nomor = " . $_GET["no"];
	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));

	if ($edit["mode"] == "edit")
		check_edit($r);
}


$edit["sp_approve"] = "sp_disetujui_uang_masuk_utama";
$edit["sp_approve_param"] = array("param_nomormhadmin|0","param_status_disetujui|0","param_nomor|0","param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_uang_masuk_utama";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0","param_status_dibatalkan|0","param_nomor|0","param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";


$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view")
	$edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
$edit["field"][$i]["box_tab"] = "data";


$edit["field"][$i]["label"] = "Kode";
$edit["field"][$i]["input"] = "kode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// if ($edit["mode"] == "add")
// 	$edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
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
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "tipe";
$edit["field"][$i]["input"] = "tipe";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = 0;
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
$edit["field"][$i]["label"] = "Valuta";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "nomormhvaluta";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_element"] = "browse";
$edit["field"][$i]["browse_setting"] = "master_currency";
$edit["field"][$i]["browse_set"]["param_output"] = array("kurs|kurs");
$edit["field"][$i]["browse_set"]["call_function"] = array("calculate_all", "checkKurs");
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = "IDR|1";
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Kurs";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "kurs";
$edit["field"][$i]["input_class"] = "required iptmoney";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = 1;
$i++;


// $edit["field"][$i]["label"] = "Relasi";
// $edit["field"][$i]["label_class"] = "req";
// $edit["field"][$i]["input"] = "relasinomor";
// $edit["field"][$i]["input_class"] = "required";
// $edit["field"][$i]["input_element"] = "browse";
// $edit["field"][$i]["browse_setting"] = "master_relasi";
// $edit["field"][$i]["browse_set"]["param_output"] = array(
// 	"relasinama|relasinama",
// 	"relasikode|relasikode",
// 	"relasitabel|relasitabel"
// );
// $i++;



$edit["field"][$i]["label"] 						= "Supplier";
$edit["field"][$i]["label_class"] 					= "req";
$edit["field"][$i]["input"] 						= "nomormhrelasi";
$edit["field"][$i]["input_class"] 					= "required";
$edit["field"][$i]["input_element"] 				= "browse";
$edit["field"][$i]["browse_setting"] 				= "master_supplier_penerimaan";
// $edit["field"][$i]["browse_set"]["param_output"] = array(
// 	"nomor|nomormhrelasi"
// );
// $edit["field"][$i]["browse_set"]["call_function"] = array(
// 	"load_grid_detail"
// );
$i++;



$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Total";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "total";
$edit["field"][$i]["input_class"] = "required " . $_SESSION["setting"]["class_money"];
$i++;
$edit["field"][$i]["label"] = "Jenis";
$edit["field"][$i]["input"] = "jenisuang";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("0|Titipan Customer", "1|Uang Muka Customer");
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "total_idr";
$edit["field"][$i]["input"] = "total_idr";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "relasinama";
$edit["field"][$i]["input"] = "relasinama";
$edit["field"][$i]["input_class"] = "browse_master_supplier_clear";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "relasikode";
$edit["field"][$i]["input"] = "relasikode";
$edit["field"][$i]["input_class"] = "browse_master_supplier_clear";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "relasitabel";
$edit["field"][$i]["input"] = "relasitabel";
$edit["field"][$i]["input_class"] = "browse_master_supplier_clear";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
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



if ($edit["mode"] != "add") {
	$edit = fill_value($edit, $r);
}
$edit = generate_info($edit, $r);

$features = "save|back|reload|add".check_approval($r,"periode|edit|approve|disappr|delete");
if(isset($r["status_aktif"]) && $r["status_aktif"] == 0)
	$features = "back|reload|add";
$edit_navbutton = generate_navbutton($edit_navbutton,$features);

$grid_str = generate_grid_string($edit["field"],$grid);
$grid_elm = generate_grid_string($edit["field"],$grid,"element");
?>

<script language="javascript" type="text/javascript">
$(document).ready(function()
{
	const kodeAccountContainer =  document.getElementsByName('div_H_i5')[0];
	
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
	$(document).on('change','#metode',function()
	{
		metode_value_changed(this);
	});

	function metode_value_changed(obj, firstload = 0) {
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

	function calculate_all() {
		<?php if ($edit["mode"] != "view") { ?>
			var kurs = $('#kurs').val();
			var total = $('#total').val();
			var total_idr = total * kurs;
			$('#total_idr').val(total_idr);
		<?php } ?>
	}

	function checkKurs() {
		if ($('#browse_master_currency_hidden').val() == 1) {
			$('#kurs').val(1);
			$('#kurs').prop('readonly', true);
		} else {
			$('#kurs').val(1);
			$('#kurs').prop('readonly', false);
		}
	}

	function checkSave() {
		var check_failed = '';

		var metode = $('#metode').val();
		var giro_ref = $('#giro_ref').val();
		var giro_tempo = $('#giro_tempo').val();

		var jenis = $('#jenis').val();

		if (metode == 'Giro' && giro_ref == '')
			check_failed += '- Ref Giro wajib diisi\n\n';
		if (metode == 'Giro' && giro_tempo == '')
			check_failed += '- Jatuh Tempo Giro wajib diisi\n\n';

		calculate_all();

		if (check_failed != '')
			return check_failed;
		else
			return true;
	}
});
</script>