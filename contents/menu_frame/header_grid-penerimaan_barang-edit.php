<?php
// SETTING DEFAULT
$edit["debug"]       = 1;
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];
$edit["string_summary"] 	= $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];


$edit["sp_approve"] = "sp_disetujui_thbelinota";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_thbelinota";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";


//------------------------------------------------GRID DATA 1------------------------------------------------------
$i = 0;
$edit["detail"][$i]["table_name"] = "tdbelinota";
$edit["detail"][$i]["field_name"] = array(
	"jumlah_unit_order",
	"jumlah_unit",
	"keterangan",
	"nomortdbeliorder",
	"nomormhbarang",
	"nomormhsatuanqty",
	"nomormhsatuanberat",
	"diskon_1",
	"diskon_nominal_1",
	"harga_satuan",
	"subtotal",
	"jumlah_konversi",
	"jumlah",
	"batch_number",
	"expired_date|coltemplate_date_1"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
//------------------------------------------------END GRID DATA 1------------------------------------------------------



$i = 0;
if (!empty($_GET["a"]) && $_GET["a"] == "view") {
	$edit["field"][$i]["box_tabs"] = array("data|Data", "info|Info");
}
$edit["field"][$i]["box_tab"] = "data";



$edit["field"][$i]["label"] 						= "Kode";
$edit["field"][$i]["input"] 						= "kode";
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] 				= formatting_code($con, $edit["string_code"]);
$i++;

$edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["label"]       = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
$edit["field"][$i]["input_attr"]["onchange"] = "load_grid_detail()";
$i++;



$edit["field"][$i]["label"] 						= "Supplier";
$edit["field"][$i]["label_class"] 					= "req";
$edit["field"][$i]["input"] 						= "nomormhrelasi";
$edit["field"][$i]["input_class"] 					= "required";
$edit["field"][$i]["input_element"] 				= "browse";
$edit["field"][$i]["browse_setting"] 				= "master_supplier";
$i++;


$edit["field"][$i]["form_group"]              = 0;
$edit["field"][$i]["label"]         = "Order Beli";
$edit["field"][$i]["label_class"]   = "req";
$edit["field"][$i]["input"]         = "nomorthbeliorder";
$edit["field"][$i]["input_class"]   = "required";
$edit["field"][$i]["input_element"] = "browse";
$edit["field"][$i]["browse_setting"] = "order_pembelian";
$edit["field"][$i]["browse_set"]["param_input"] = array(
	"a.nomormhrelasi|browse_master_supplier_hidden"
);
$edit["field"][$i]["browse_set"]["call_function"] = array(
	"load_grid_detail"
);
$i++;



$edit["field"][$i]["label"] 						= "Kode Gudang";
$edit["field"][$i]["label_class"] 					= "req";
$edit["field"][$i]["input"] 						= "nomormhgudang";
$edit["field"][$i]["input_class"] 					= "required";
$edit["field"][$i]["input_element"] 				= "browse";
$edit["field"][$i]["browse_setting"] 				= "master_gudang";
$i++;

$edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["label"] 					= "SJ supplier";
$edit["field"][$i]["input"]						= "supplier_sj_nomor";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$i++;

$edit["field"][$i]["label"] 						= "PPN / Non-PPN";
$edit["field"][$i]["input"] 						= "ppn";
$edit["field"][$i]["input_element"] 				= "select1";
$edit["field"][$i]["input_option"] 					= array("1|PPN", "0|Non-PPN");
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
// $edit["field"][$i]["input_attr"]["onchange"] 		= "calculate_all()";
$edit["field"][$i]["input_value"] 			= 1;
$i++;

$edit["field"][$i]["form_group"]              = 0;
$edit["field"][$i]["label"]                   = "";
$edit["field"][$i]["input_element"]      = "
	<a   class='btn btn-info btn-app-sm' onclick=load_grid_detail()><i class='fa fa-refresh'></i></a>
";
$edit["field"][$i]["input_col"] = "col-sm-1";
$edit["field"][$i]["input_save"] = "skip";
$i++;


$edit["field"][$i]["form_group_class"] 				= "hiding";
$edit["field"][$i]["label"] 						= "jenis";
$edit["field"][$i]["input"] 						= "jenis";
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] 				= "btb";
$i++;

$edit["field"][$i]["form_group_class"] 				= "hiding";
$edit["field"][$i]["label"] 						= "nomormhcabang";
$edit["field"][$i]["input"] 						= "nomormhcabang";
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] 				= 1;
$i++;

//-----------------------------------------FRONTEND GRID 1--------------------------------
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Detail Order Beli'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
'Nama',
'Qty Sisa Order',
'Qty Terima',
'Satuan',
'Harga',
'Diskon (%)',
'Diskon',
'Sub Total',
'Batch Number',
'Expired Date',
'Keterangan',
'nomortdbeliorder',
'nomormhbarang',
'nomormhsatuanqty',
'nomormhsatuanberat',
'jumlah_konversi',
'jumlah',
";
$edit["field"][$i]["grid_set"]["column"] = array(
	"nama_barang",
	"jumlah_unit_order",
	"jumlah_unit",
	"satuan",
	"harga_satuan",
	"diskon_1",
	"diskon_nominal_1",
	"subtotal",
	"batch_number",
	"expired_date",
	"keterangan",
	"nomortdbeliorder",
	"nomormhbarang",
	"nomormhsatuanqty",
	"nomormhsatuanberat",
	"jumlah_konversi",
	"jumlah",
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{}";

$edit["field"][$i]["grid_set"]["nav_option"]["add"] = "false";
$edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;

$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nama_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nama_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah_unit_order'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah_unit_order'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'harga_satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'harga_satuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'diskon_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'diskon_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'diskon_nominal_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'diskon_nominal_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'batch_number'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'batch_number'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'expired_date'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'expired_date'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_date_1";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomortdbeliorder'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomortdbeliorder'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuanqty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuanqty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuanberat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuanberat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah_konversi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah_konversi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;
$i++;

$edit["field"][$i]["label"]              = "Keterangan";
$edit["field"][$i]["label_col"] = "col-sm-12";
$edit["field"][$i]["label_attr"]["style"] = "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"] = "keterangan";
$edit["field"][$i]["input_class"] = "";
$edit["field"][$i]["input_col"] = "col-sm-6";
$edit["field"][$i]["input_element"] = "textarea";
$edit["field"][$i]["input_attr"]["rows"] = "10";
$edit["field"][$i]["input_attr"]["cols"] = "70";
$i++;

$edit = generate_summary($edit, "subtotal|diskon1|dpp|ppn|totalakhir", $edit["detail"][0]["grid_id"]);
$i++;
$i++;
$i++;
$i++;
$i++;
$i++;


$i++;

if ($edit["mode"] != "add") {

	$edit["query"] = " SELECT
    a.*,
	DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
    CONCAT(t.kode, '|', t.nomor) AS 'browse|nomorthbeliorder',
    CONCAT(m2.nama, '|', m2.nomor) AS 'browse|nomormhrelasi',
    CONCAT(m5.nama, '|', m5.nomor) AS 'browse|nomormhgudang',
    t.tanggal as tanggal_order,
	t.kode as kode_order,
	m.nama as nama_barang,
	m2.nama as supplier,
	m3.nama as pembuat,
	m4.nama as approve,
	t.status_aktif 
	FROM " . $edit["table"] . " a
	join thbeliorder t on t.nomor = a.nomorthbeliorder 
	join tdbeliorder t2 on t2.nomorthbeliorder = t.nomor 
	left join mhbarang m on m.nomor = T2.nomormhbarang 
	left join mhrelasi m2 on m2.nomor = t.nomormhrelasi and m2.nomormhrelasikelompok = 2
	left join mhadmin m3 on m3.nomor = t.dibuat_oleh 
	left join mhadmin m4 on m4.nomor = t.disetujui_oleh
	left join mhgudang m5 on m5.nomor = a.nomormhgudang 
    WHERE a.status_aktif > 0 and a.nomor = " . $_GET["no"];

	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));



	//query grid detail 1
	$edit["field"][$grid[0]]["grid_set"]["query"] = " 
	SELECT
    a.*,
		m.nama as nama_barang,
		t.harga_satuan,
		m2.nama as satuan,
		t.diskon_1,
		t.subtotal,
		t.keterangan
	FROM " . $edit["detail"][0]["table_name"] . " a
	join tdbeliorder t on t.nomor = a.nomortdbeliorder 
	join mhbarang m on m.nomor = t.nomormhbarang 
	left join mhsatuan m2 on m2.nomor = t.nomormhsatuanqty 
	WHERE a.status_aktif > 0 AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];



	$edit = fill_value($edit, $r);
}


$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");
$features = "save|back|reload|add" . check_approval($r, "edit|approve|delete|disappr");
$edit_navbutton = generate_navbutton($edit_navbutton, $features);
?>


<script type="text/javascript">
	$(document).ready(function() {

		<?php if ($edit["mode"] != "view") { ?>
			calculate_all();

		<?php } ?>


	});



	function load_grid_detail() {
		var no = $('#browse_order_pembelian_hidden').val();
		var tanggal = $('#tanggal').val();

		// format tanggal from dd/mm/yyyy to yyyy-mm-dd
		var tanggal = tanggal.split('/');
		var tanggal = tanggal[2] + '-' + tanggal[1] + '-' + tanggal[0];

		var pages = 'pages/grid_load.php?id=penerimaan_barang_detail-load&no=' + no + '&tanggal=' + tanggal + '';
		jQuery(<?= $grid_elm[0] ?>).jqGrid('setGridParam', {
			url: pages,
			datatype: 'json',
			loadComplete: function(data) {
				<?= $grid_str[0] ?>_load = 0;
				actGridComplete_<?= $grid_str[0] ?>();
			}
		});
		jQuery(<?= $grid_elm[0] ?>).trigger('reloadGrid');
	}

	//PRINT
	function print(nomor) {
		$.confirm({
			icon: 'fa fa-print',
			theme: 'modern',
			closeIcon: true,
			animation: 'scale',
			type: 'blue',
			title: 'NOTIFICATION',
			content: 'Apakah Anda Yakin?',
			buttons: {
				Ya: function() {
					// event.preventDefault();
					window.open(
						'pages/print_invoice.php?m=transaksi_order_pembelian_lokal_stok&mk=transaksi_order_pembelian_lokal_stok&f=header_grid&&sm=edit&a=view&no=' + nomor
					);

				},
				Tidak: function() {
					event.preventDefault();
					$.alert({
						title: 'Decision',
						content: '<font style="font-size: 14px;">Transaksi Dibatalkan</font>',
						icon: 'fa fa-warning',


					});
				},

			}


		});
	}

	//PRINT
	$(document).on('click', '.print', function(event) {
		var nomor = '<?= $_GET['no'] ?>';
		print(nomor);

	});




	$(document).ready(function() {
		calculate_all()
	})

	function calculate_all() {

		var ppn = $('#ppn').val();
		console.log(ppn);
		if (ppn == 1) {
			$('#sum_ppn_<?= $edit["detail"][0]["grid_id"] ?>').val(<?php echo ($_SESSION["setting"]["ppn"]); ?>);
			$('#sum_ppn_<?= $edit["detail"][0]["grid_id"] ?>').attr('readonly', true);
			$('.ppn_section').removeClass('hide');
		} else {
			$('#sum_ppn_<?= $edit["detail"][0]["grid_id"] ?>').val(0);
			$('#sum_ppn_<?= $edit["detail"][0]["grid_id"] ?>').attr('readonly', true);
			$('.ppn_section').addClass('hide');
		}

		<?php if ($edit["mode"] != "view") { ?>
			// SUBTOTAL
			// var subtotal_0 = jQuery(<?= $grid_elm[0] ?>).jqGrid('getCol','subtotal',false,'sum');
			// $('#sum_subtotal_<?= $grid_str[0] ?>').val(subtotal_0);

			// calculate_summary('<?= $grid_str[0] ?>');

			// TOTAL (KURS)
			// var total 			= $('#sum_total_<?= $grid_str[0] ?>').val();
			// var kurs 			= $('#kurs').val();
			// var total_valuta 	= total * kurs;
			// $('#total_valuta').val(total_valuta);
		<?php } ?>
	}

	// HEADER VALIDATION
	function checkHeader() {
		var fields = [];
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


	<?= generate_function_checkgrid($grid_str) ?>
	<?= generate_function_checkunique($grid_str) ?>
	<?= generate_function_realgrid($grid_str) ?>
</script>