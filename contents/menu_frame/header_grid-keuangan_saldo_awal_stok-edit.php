<?php
$edit["debug"] = 1;
//$edit["unique"] = array("kode|Kode");
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];

$edit["sp_approve"] = "sp_disetujui_saldo_awal_stok";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_saldo_awal_stok";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";


if ($edit["mode"] != "add") {
	$r = mysqli_fetch_array(mysqli_query($con, "
	SELECT a.*,
	DATE_FORMAT(a.tanggal, '" . $_SESSION["setting"]["date_sql"] . "') AS tanggal,
	CONCAT(b.kode,' - ',b.nama,'|',b.nomor) AS 'browse|nomormhbarang',
	CONCAT(c.kode,' - ',c.nama,'|',c.nomor) AS 'browse|nomormhgudang',
	DATE_FORMAT(a.expired_date, '" . $_SESSION["setting"]["date_sql"] . "') AS expired_date
	FROM " . $edit["table"] . " a 
	JOIN mhbarang b ON a.nomormhbarang = b.nomor AND b.status_aktif > 0 
	JOIN mhgudang c ON a.nomormhgudang = c.nomor AND c.status_aktif > 0 
	WHERE a.nomor = " . $_GET["no"]));

	$edit = fill_value($edit, $r);
}

$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view")
	$edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
$edit["field"][$i]["box_tab"] = "data";

$edit["field"][$i]["label"] = "Kode";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "kode";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
$i++;

$edit["field"][$i]["label"] = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "tanggal";
$edit["field"][$i]["input_class"] = "required date_1";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
if ($edit["mode"] == "add") {
	// set input value to session setting start_date formatted from yyyy-mm-dd to dd/mm/yyyy
	$start_date = explode("-", $_SESSION["setting"]["start_date"]);
	$edit["field"][$i]["input_value"] = $start_date[2] . "/" . $start_date[1] . "/" . $start_date[0];
}
if ($_SESSION["login"]["level"] >= $_SESSION["setting"]["level_backdate"]) {
	$edit["field"][$i]["input_class"] = "required";
	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
}
$i++;
$edit["field"][$i]["label"] = "Gudang";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "nomormhgudang";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_element"] = "browse";
$edit["field"][$i]["browse_setting"] = "master_gudang";
$i++;
$edit["field"][$i]["label"] = "Barang";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "nomormhbarang";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_element"] = "browse";
$edit["field"][$i]["browse_set"]["id"] = "master_barangV3";
$edit["field"][$i]["browse_setting"] = "master_barangV3";
$edit["field"][$i]["browse_set"]["param_output"] 	= array(
	"satuan|satuan",
	"nomormhsatuan|nomormhsatuan"
);
$i++;
$edit["field"][$i]["label"] = "Expired Date";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "expired_date";
$edit["field"][$i]["input_class"] = "required date_1";
if ($edit["mode"] == "add") {
	// set input value to session setting start_date formatted from yyyy-mm-dd to dd/mm/yyyy
	$start_date = explode("-", $_SESSION["setting"]["start_date"]);
	$edit["field"][$i]["input_value"] = $start_date[2] . "/" . $start_date[1] . "/" . $start_date[0];
}
// param output to satuan
$i++;
$edit["field"][$i]["label"] = "Jumlah";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "jumlah";
$edit["field"][$i]["input_class"] = "required " . $_SESSION["setting"]["number"];
$edit["field"][$i]["input_class"] = "required";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = 0;
$i++;
$edit["field"][$i]["label"] = "Satuan";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "satuan";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
// $edit["field"][$i]["input_save"] 					= "skip";
$i++;
$edit["field"][$i]["label"] = "HPP";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "hpp";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required " . $_SESSION["setting"]["class_money"];
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = 0;
$i++;
$edit["field"][$i]["anti_mode"] = "add";
$edit["field"][$i]["label"] = "Status";
$edit["field"][$i]["input"] = "status_aktif";
$edit["field"][$i]["input_element"] = "select";
$edit["field"][$i]["input_option"] = generate_status_option($edit["mode"]);
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "Cabang";
$edit["field"][$i]["input"] = "nomormhcabang";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = $_SESSION["cabang"]["nomor"];
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "nomormhsatuan";
$edit["field"][$i]["input"] = "nomormhsatuan";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;

if ($edit["mode"] != "add") {
	$r = mysqli_fetch_array(mysqli_query($con, "
	SELECT a.*,
	DATE_FORMAT(a.tanggal, '" . $_SESSION["setting"]["date_sql"] . "') AS tanggal,
	CONCAT(b.kode,' - ',b.nama,'|',b.nomor) AS 'browse|nomormhbarang',
	CONCAT(c.kode,' - ',c.nama,'|',c.nomor) AS 'browse|nomormhgudang',
	DATE_FORMAT(a.expired_date, '" . $_SESSION["setting"]["date_sql"] . "') AS expired_date
	FROM " . $edit["table"] . " a 
	JOIN mhbarang b ON a.nomormhbarang = b.nomor AND b.status_aktif > 0 
	JOIN mhgudang c ON a.nomormhgudang = c.nomor AND c.status_aktif > 0 
	WHERE a.nomor = " . $_GET["no"]));

	$edit = fill_value($edit, $r);
}
$edit = generate_info($edit, $r, "insert|update|approve|disapp");;

$features = "save|back|edit";
$features = "save|back|reload" . check_approval($r, "edit|approve|disappr|delete", $check_approval_fields);
$edit_navbutton = generate_navbutton($edit_navbutton, $features);
?>

<script language="javascript" type="text/javascript">
	$(document).ready(function() {
		// empty function
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
</script>