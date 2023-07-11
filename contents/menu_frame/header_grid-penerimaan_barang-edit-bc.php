<?php
$edit["debug"]       = 1;
$edit["string_code"]    = "kode_".$_SESSION["menu_".$_SESSION["g.menu"]]["string"];
$edit["string_summary"] 	= $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];



$edit["sp_approve"] = "sp_disetujui_penerimaan";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_penerimaan";
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
	"jumlah_unit",
	"keterangan",
	"nomortdbeliorder",
	"nomormhbarang",
	"nomormhsatuan",
   
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

$edit["field"][$i]["label"]                   = "Kode";
$edit["field"][$i]["input"]                   = "kode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"]  = "readonly";
if ($edit["mode"] == "add") {
	$edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
}
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



$edit["field"][$i]["form_group"] 					= 0;
$edit["field"][$i]["label"]       = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"]       = "tanggal";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_class"] = "required date_1";
// if ($edit["mode"] == "add") {
//     $edit["field"][$i]["input_value"] = date("d/m/Y");
// }
// if ($query_detail["total"] > 0) {
//     $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// }
$i++;



$edit["field"][$i]["label"] 						= "Supplier";
$edit["field"][$i]["label_class"] 					= "req";
$edit["field"][$i]["input"] 						= "nomormhrelasi";
$edit["field"][$i]["input_class"] 					= "required";
$edit["field"][$i]["input_element"] 				= "browse";
$edit["field"][$i]["browse_setting"] 				= "master_supplier_penerimaan";
$edit["field"][$i]["browse_set"]["param_output"] = array(
	"harga|harga",
	"diskon_1|diskon_1",
	"diskon_2|diskon_2",
	"subtotal|subtotal"
);
$i++;


$edit["field"][$i]["form_group"]              = 0;
$edit["field"][$i]["label"]         = "Order Beli";
$edit["field"][$i]["label_class"]   = "req";
$edit["field"][$i]["input"]         = "nomorthbeliorder";
$edit["field"][$i]["input_class"]   = "required";
$edit["field"][$i]["input_element"] = "browse";
$edit["field"][$i]["browse_setting"] = "order_pembelian";
$edit["field"][$i]["browse_set"]["param_input"] = array(
	"a.nomormhrelasi|browse_master_supplier_penerimaan_hidden"
);
$edit["field"][$i]["browse_set"]["param_output"] = array(
	"nama_barang|nama_barang",
	"harga_satuan|harga_satuan",
	"satuan|satuan",
	"diskon_1_nominal|diskon_1_nominal",
	"subtotal|subtotal",
	"keterangan|keterangan",
	"nomortdbeliorder|nomortdbeliorder",
	"nomormhbarang|nomormhbarang",
	"nomormhsatuan|nomormhsatuan"
);
$edit["field"][$i]["browse_set"]["call_function"] = array(
	"load_grid_detail",
	"get_supplier_kode"
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
$edit["field"][$i]["input_option"] 					= array("1|PPN","0|Non-PPN");
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
// $edit["field"][$i]["input_attr"]["onchange"] 		= "calculate_all()";
$edit["field"][$i]["input_value"] 			= 1;
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
'Diskon',
'Sub Total',
'Keterangan',
'nomortdbeliorder',
'nomormhbarang',
'nomormhsatuan'
";
$edit["field"][$i]["grid_set"]["column"] = array(
    "nama_barang",
    "jumlah_unit_order",
    "jumlah_unit",
    "satuan",
    "harga_satuan",
    "diskon_1_nominal",
    "subtotal",
    "keterangan",
    "nomortdbeliorder",
    "nomormhbarang",
    "nomormhsatuan"
);


$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
    nama_barang:'',
    jumlah_unit_order:'',
    jumlah_unit:'',
    satuan:'',
    harga_satuan:'',
    diskon_1_nominal:'0',
    subtotal:'',
    keterangan:'',
    nomortdbeliorder:'',
    nomormhbarang:'',
    nomormhsatuan:''
}";

$edit["field"][$i]["grid_set"]["nav_option"]["add"] = "false";
$edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;



$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nama_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nama_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'jumlah_unit_order'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'jumlah_unit_order'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
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

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'diskon_1_nominal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'diskon_1_nominal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
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

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhsatuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhsatuan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$i++;

$edit["field"][$i]["label"]              		= "Keterangan";
$edit["field"][$i]["label_attr"]["style"] 		= "text-align:left;margin-bottom:10px";
$edit["field"][$i]["input"]              		= "keterangan";
$edit["field"][$i]["input_element"]      		= "textarea";
$edit["field"][$i]["input_attr"]["rows"] 		= "5";
$i++;



$edit = generate_summary($edit,"subtotal|diskon1|dpp|ppn|totalakhir",$edit["detail"][0]["grid_id"]);

$i++;

// ---------------------------------------END FRONT GRID 1-------------------------------------------------



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
    WHERE a.nomor = " . $_GET["no"];

	if ($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));


    
    //query grid detail 1
    $edit["field"][$grid[0]]["grid_set"]["query"] = " 
	SELECT
    a.*,
	t.jumlah_unit as jumlah_unit_order,
	m.nama as nama_barang,
	t.jumlah_selesai_terima,
	t.harga_satuan,
	m2.nama as satuan,
	t.diskon_1_nominal,
	t.subtotal,
	t.keterangan
	FROM " . $edit["detail"][0]["table_name"] . " a
	join tdbeliorder t on t.nomor = a.nomortdbeliorder 
	left join mhbarang m on m.nomor = t.nomormhbarang 
	left join mhsatuan m2 on m2.nomor = t.nomormhsatuan 
    where a.status_aktif > 0
	AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];



    $edit = fill_value($edit, $r);
}



$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
$edit = generate_info($edit, $r, "insert|update");



$i = count($edit["field"]);
$edit["field"][$i]["pro_mode"] = "view";
$edit["field"][$i]["label"] = "Disetujui Oleh";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if($r["disetujui_oleh"]             != 0)
	$edit["field"][$i]["input_value"] = get_admin($r["disetujui_oleh"]);
$i++;
$edit["field"][$i]["pro_mode"] = "view";
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Disetujui Pada";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if($r["disetujui_pada"]             != $_SESSION["setting"]["default_datetime"])
	$edit["field"][$i]["input_value"] = $r["disetujui_pada"];
$i++;
$edit["field"][$i]["pro_mode"] = "view";
$edit["field"][$i]["label"] = "Dibatalkan Oleh";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if($r["dibatalkan_oleh"]            != 0)
	$edit["field"][$i]["input_value"] = get_admin($r["dibatalkan_oleh"]);
$i++;
$edit["field"][$i]["pro_mode"] = "view";
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Dibatalkan Pada";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if($r["dibatalkan_pada"]            != $_SESSION["setting"]["default_datetime"])
	$edit["field"][$i]["input_value"] = $r["dibatalkan_pada"];
$i++;

$check_approval_fields["status_disetujui"] = "sp_disetujui_penerimaan";




$features = "save|back|reload".check_approval($r,"edit|approve|delete|disappr|print");
$edit_navbutton = generate_navbutton($edit_navbutton,$features);
?>

<script type="text/javascript">
    $(document).ready(function() {
        $("#browse_order_pembelian_reset").click(function() {
				jQuery(<?= $grid_elm[0] ?>).jqGrid('clearGridData');
			});

		$("#browse_master_supplier_penerimaan_reset").click(function() {
		$("#browse_order_pembelian_hidden").val("");
		$("#browse_order_pembelian_search").val("");
		// $("#browse_master_gudang_hidden").val("");
		// $("#browse_master_gudang_search").val("");
		});

    });


    function load_grid_detail() {
		jQuery(<?= $grid_elm[0] ?>).jqGrid('clearGridData');
		var order_pembelian = $("#browse_order_pembelian_hidden").val();
		// var pages = 'pages/grid_load.php?id=<?= $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] ?>_detail-load&no=' + order_pembelian;
		var pages = 'pages/grid_load.php?id=<?=$grid_str[0]?>-load&no='+order_pembelian;
		jQuery(<?= $grid_elm[0] ?>).jqGrid('setGridParam', {
			url: pages,
			datatype: 'json',
			loadComplete: function(data) {
				// <?= $grid_str[0] ?>_load = 0;
				// actGridComplete_<?= $grid_str[0] ?>();
				// for (let index = 1; index <= data.records; index++) {
				// 	after_save_cell_sales_order_data_detail(index, '');
				// }
				<?= $grid_str[0] ?>_load = 0;
				actGridComplete_<?= $grid_str[0] ?>();
				console.log("complete");
			}
		});
		jQuery(<?= $grid_elm[0] ?>).trigger('reloadGrid');
	}

	function get_supplier_kode() {
		var entity = $("#supplier").val();
		var kode = $("#kode").val();
		var new_code = kode.replace("SO", "SO" + entity.substring(0, 1));
		$("#kode_alias").val(new_code);
	}





	

	function calculate_all()
	{

	var ppn = $('#ppn').val();
    if(ppn == 1)
    {
        $('#sum_ppn_<?=$edit["string_summary"]?>').val(<?php  echo($_SESSION["setting"]["ppn"]); ?>);
        $('#sum_ppn_<?=$edit["string_summary"]?>').attr('readonly',true);
		$('.ppn_section').removeClass('hide');
    }
    else
    {
        $('#sum_ppn_<?=$edit["string_summary"]?>').val(0);
        $('#sum_ppn_<?=$edit["string_summary"]?>').attr('readonly',true);
		$('.ppn_section').addClass('hide');
    }

	<?php if($edit["mode"] != "view") { ?>
		// SUBTOTAL
		var subtotal_0 = jQuery(<?=$grid_elm[0]?>).jqGrid('getCol','subtotal',false,'sum');
		var subtotal_1 = 0;
		if(subtotal_0 !=0 && subtotal_1!=0){
			var subtotal_2 = subtotal_0+subtotal_1;
			$('#sum_subtotal_<?=$edit["string_summary"]?>').val(subtotal_2 );
		}
		else if(subtotal_0 != 0){
			$('#sum_subtotal_<?=$edit["string_summary"]?>').val(subtotal_0 );
		}else if(subtotal_1 !=0){
			$('#sum_subtotal_<?=$edit["string_summary"]?>').val(subtotal_1 );
		}
		calculate_summary_include_ppn('<?=$edit["string_summary"]?>');
		console.log(subtotal_0);
		
		// TOTAL (KURS)
		var total 			= $('#sum_total_<?=$edit["string_summary"]?>').val();
	    var kurs 			= $('#kurs').val();
	    var total_valuta 	= total * kurs;
	    $('#sum_totalvaluta_<?=$edit["string_summary"]?>').val(total_valuta);
    <?php } ?>
	}


	function checkHeader() {
		var fields = [
			'browse_master_supplier_penerimaan_hidden|Supplier'
		];
		var check_failed = check_value_elements(fields);
		if (check_failed != '')
			return check_failed;
		else
			return true;
	}


    <?= generate_function_checkgrid($grid_str) ?>
    <?= generate_function_checkunique($grid_str) ?>
    <?= generate_function_realgrid($grid_str) ?>
</script>