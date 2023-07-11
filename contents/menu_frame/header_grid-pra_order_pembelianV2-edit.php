<?php
// SETTING DEFAULT
$edit["debug"]       = 0;
$edit["uppercase"]   = 1;
// $edit["unique"]      = array("kode|Kode");
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];
$edit["string_summary"] 	= $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];
// $edit["manual_save"]="contents/menu_frame/header_grid-transaksi_order_pembelian_lokal_stok-save.php";


if ($edit["mode"] != "add") {
	$edit["query"] = " SELECT
		a.*,
		a.kode, DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal, a.total, a.status_disetujui, a.keterangan
	FROM thbelipraorder a	
	WHERE a.nomor = " . $_GET["no"];

	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));

	$edit = fill_value($edit, $r);

	if ($edit["debug"] > 0)
		echo $edit["query"];
}




$edit["sp_approve"] = "sp_disetujui_thbelipraorder";
$edit["sp_approve_param"] = array("param_nomormhadmin|0", "param_status_disetujui|0", "param_nomor|0", "param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_thbelipraorder";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0", "param_status_dibatalkan|0", "param_nomor|0", "param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";



$i = 0;
$edit["detail"][$i]["table_name"] = "tdbelipraorder";
$edit["detail"][$i]["field_name"] = array(
	"kode_permintaan",
    "nomortdbelipermintaan",
	"nomorthbelipermintaan",
	"nomormhbarang",
	"nomormhsatuanqty",
	"jumlah",
	"jumlah_konversi",
	"jumlah_unit",
	"ppn",
	"harga",
	"diskon_1",
	"diskon_nominal_1",
	"subtotal",
	"nomormhsatuanberat",
	"jumlah_berat",
	"tanggal_kirim|coltemplate_date_1"
);
$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;



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

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Tanggal";
$edit["field"][$i]["input"] = "tanggal";
$edit["field"][$i]["label_class"] = "req ";
$edit["field"][$i]["input_class"] = "required date_1";
$i++;

$edit["field"][$i]["label"] 						= "Permintaan";
$edit["field"][$i]["input"] 						= "kode";
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] 				= formatting_code($con, $edit["string_code"]);
$i++;


$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["form_group"]              = 0;
$edit["field"][$i]["label"]                   = "";
$edit["field"][$i]["input_element"]      = "
	<a id='load_grid_detail_button' class='btn btn-info btn-app-sm' onclick=load_grid_detail()><i class='fa fa-refresh'></i></a>
";
$edit["field"][$i]["input_col"] = "col-sm-1";
$edit["field"][$i]["input_save"] = "skip";
$i++;



$edit = generate_info($edit, $r, "insert|update|approve|disapp");
$i = count($edit["field"]);

// GRID DETAIL ORDER PEMBELIAN
$edit["fields"][$i]["box_tabs_close"] = 1;

// $edit["field"][$i]["box_tabs"]                                = array(
// 	"pra_order_beli|Pra Order Beli",
// );

$edit["field"][$i]["box_tab"]                                 = "pra_order_beli";

$grid[0]                                                      = $i;

$edit["field"][$i]["input_element"]                           = "grid";
// $edit["field"][$i]["form_group_class"]						  = "grid_detail_pra_order_pembelian";
$edit["field"][$i]["grid_set"]                                = $edit_grid;
$edit["field"][$i]["grid_set"]["id"]                          = "transaksi_pra_order_pembelian_detail";
$edit["field"][$i]["grid_set"]["id"]                          = "pra_order_pembelian_detail";
$edit["field"][$i]["grid_set"]["option"]["caption"]           = "'Detail Pra Order Beli'";
$edit["field"][$i]["grid_set"]["option"]["colNames"]          = "	
	'Kode',	
	'Barang',
	'Qty',
	'Satuan',
	'Keterangan',
	'Qty',
	'Satuan',
	'Jumlah Berat',
	'berat_jenis',
	'Satuan Berat',
	'Tanggal Kirim',
	'Ppn',		
	'Harga',
	'Diskon (%)',
	'diskon_nominal_1',
	'Sub Total',
	'nomorthbelipermintaan',
	'nomortdbelipermintaan',
	'jumlah_konversi',
	'jumlah',
	'nomormhbarang',
	'nomormhsatuanqty',
	'nomormhsatuanberat'
	";
$edit["field"][$i]["grid_set"]["column"]                      = array(
	"kode_permintaan",
	"nama_barang",
	"qty_permintaan",
	"satuan_permintaan",
	"keterangan",
	"jumlah_unit",
	"satuan_purchasing",
	"jumlah_berat",
	"berat_jenis",
	"satuan_berat",
	"tanggal_kirim",
	"ppn",
	"harga",
	"diskon_1",
	"diskon_nominal_1",
	"subtotal",
	"nomorthbelipermintaan",
	"nomortdbelipermintaan",
	"jumlah_konversi",
	"jumlah",
	"nomormhbarang",
	"nomormhsatuanqty",
	"nomormhsatuanberat"

);
$edit["field"][$i]["grid_set"]["var"]["default_data"]         = "{
	kode_permintaan:'',
	nama_barang:'',
	qty_permintaan:'0',
	satuan_permintaan:'',
	keterangan:'',
	jumlah_unit:'0',
	satuan_purchasing:'',
	jumlah_berat:'',
	berat_jenis:'',
	satuan_berat:'',
	tanggal_kirim:'',
	ppn:'',
	harga:'0',
	diskon_1:'0',
	diskon_nominal_1:'',
	subtotal:'0',
	nomorthbelipermintaan:'',
	nomortdbelipermintaan:'',
	jumlah_konversi:'1',
	jumlah:'0',
	nomormhbarang:'',
	nomormhsatuanqty:'',
	nomormhsatuanberat:''
}";

$edit["field"][$i]["grid_set"]["nav_option"]["add"] = "false";
$edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;


$j                                                            = 0;
// AUTOCOMPLETE GRID
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'kode_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'kode_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "250";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'nama_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'nama_barang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "800";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'qty_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'qty_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'satuan_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'satuan_permintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "240";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "240";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'jumlah_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'jumlah_unit'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'satuan_purchasing'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'satuan_purchasing'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_purchasing }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'jumlah_berat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'jumlah_berat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'berat_jenis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'berat_jenis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'satuan_berat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'satuan_berat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_berat_purchasing }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'tanggal_kirim'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'tanggal_kirim'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_date_1";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'ppn'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'ppn'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] 		= "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["edittype"] 		= "'select'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["formatter"] 	= "'select'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"]	= "{value:{'1':'PPN','0':'Non PPN'}}";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'harga'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'harga'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'diskon_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'diskon_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'diskon_nominal_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'diskon_nominal_1'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomorthbelipermintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomorthbelipermintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomortdbelipermintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomortdbelipermintaan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'jumlah_konversi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'jumlah_konversi'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'jumlah'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomormhbarang'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomormhsatuanqty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomormhsatuanqty'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomormhsatuanberat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomormhsatuanberat'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;


$row 																						= 0;
$k 	
													   									= 0;
																						
$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]           				= "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]	= "'kode_permintaan'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "5";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]     		= "'Permintaan'";
$k++;

$edit["field"][$i]["grid_set"]["colHeader"][$row]["useColSpanStyle"]           				= "true";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["startColumnName"]	= "'qty_permintaan'";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["numberOfColumns"]    = "14";
$edit["field"][$i]["grid_set"]["colHeader"][$row]["groupHeaders"][$k]["titleText"]     		= "'Purchasing'";
$k++;
$row++;


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
// $edit 	= generate_summary($edit,"subtotal",$edit["detail"][0]["grid_id"]);
// $i++;
// $edit["field"][$i]["form_group"] = 0;
// $edit["field"][$i]["form_group_class"]       = "";
// $edit["field"][$i]["label"]                  = "Total";
// $edit["field"][$i]["input"]                  = "total";
// $edit["field"][$i]["input_col"] = "col-sm-4";
// $edit["field"][$i]["input_class"] = "iptmoney";
// $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// $i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["form_group_class"]       = "";
$edit["field"][$i]["label"]                  = "Total";
$edit["field"][$i]["input"]                  = "total";
$edit["field"][$i]["input_col"] = "col-sm-4";
// $edit["field"][$i]["input_class"] = "coltemplate_number";
$edit["field"][$i]["input_class"] = "iptmoney";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if ($edit['mode'] == 'add') {
	$edit["field"][$i]["input_attr"]["value"] = "0";
}
$i++;




if ($edit["mode"] != "add") {

	$edit["field"][$grid[0]]["grid_set"]["query"] = " SELECT DISTINCT 
			a.*,
			t.kode as kode_permintaan,
			d.nama as nama_barang,
			b.jumlah as qty_permintaan,
			e.nama as satuan_purchasing,
			f.nama as satuan_permintaan,
			b.keterangan,
			c.nama as supplier,
			a.ppn,
			a.harga,
			a.diskon_1,
			a.subtotal,
			a.nomortdbelipermintaan,
			c.nomor as nomormhrelasi,
			a.nomormhbarang,
			a.top,
			f.nama as satuan_berat,
			f.nomor as nomormhsatuanberat,
			e.nomor as nomormhsatuanqty,
			DATE_FORMAT(a.tanggal_kirim,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_kirim
		FROM
		" . $edit["detail"][0]["table_name"] . " a
		join tdbelipermintaan b on b.nomor = a.nomortdbelipermintaan
		join thbelipermintaan t on t.nomor = b.nomorthbelipermintaan 
		left join mhrelasi c on c.nomor = a.nomormhrelasi 
		left join mhbarang d on d.nomor = a.nomormhbarang 
		left join mhsatuan e on e.nomor = a.nomormhsatuanqty
		left join mhsatuan f on f.nomor = a.nomormhsatuanberat
   		WHERE a.status_aktif > 0 AND a." . $edit["detail"][0]["foreign_key"] . " = " . $_GET["no"];

	$edit = fill_value($edit, $r);
}



// END QUERY FOR VIEW AND EDIT

$_SESSION["setting"]["field_status_disetujui"] = "status_disetujui";
$_SESSION["setting"]["field_disetujui_pada"] = "disetujui_pada";
$_SESSION["setting"]["field_disetujui_oleh"] = "disetujui_oleh";
if ($r["status_disetujui"] == 1) {
	$features = "back|reload|disappr";
} else {
	$features = "save|back|reload|approve|edit";
}




$grid_str = generate_grid_string($edit["field"], $grid);
$grid_elm = generate_grid_string($edit["field"], $grid, "element");
// $edit = generate_info($edit, $r, "insert|update");
$features = "save|back|reload".check_approval($r,"edit|approve|delete|disappr");
$edit_navbutton = generate_navbutton($edit_navbutton,$features);
?>


<script type="text/javascript">
	$(document).ready(function() {
		calculate_all();

	});


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
		// calculate_summary_include_ppn('<?=$edit["string_summary"]?>');
		console.log(subtotal_0);
		
		// TOTAL (KURS)
		var total 			= $('#sum_total_<?=$edit["string_summary"]?>').val();
	    var kurs 			= $('#kurs').val();
	    var total_valuta 	= total * kurs;
	    $('#sum_totalvaluta_<?=$edit["string_summary"]?>').val(total_valuta);
    <?php } ?>
	}








	function load_grid_detail() {
		// console.log(<?= $edit["detail"][0]["grid_id"] ?>);
		$(<?= $grid_elm[0] ?>).jqGrid('clearGridData');
		var pages = 'pages/grid_load.php?id=<?= $edit["detail"][0]["grid_id"] ?>-load';
		console.log(pages);
		jQuery(<?= $grid_elm[0] ?>).jqGrid('setGridParam', {
			url: pages,
			datatype: 'json',
			loadComplete: function(data) {
				<?= $grid_str[0] ?>_load = 0;
				actGridComplete_<?= $grid_str[0] ?>();
				console.log("complete");
			}
		});
		jQuery(<?= $grid_elm[0] ?>).trigger('reloadGrid');

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
		//PRINT
		<?php if ((($r["status_disetujui"] == 1 && $r["status_disetujui_2"] == 1) || $r["status_disetujui_3"] == 1) && $edit["mode"] == "view") { ?>
			buttonPrint = "<a class='btn btn-primary print'><i class='fa fa-print' aria-hidden='true' title='print'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;";
			$(".bs-example").prepend(buttonPrint);
		<?php } ?>

		// sum_subtotal_<?= $grid_id ?>();
		<?php if ($edit["mode"] != "view") { ?>
			setTimeout(function() {
				toggle_ppn();
			}, 200);
		<?php } ?>

		$('.summary_<?= $grid_str[0] ?>').blur(function() {
			calculate_summary('<?= $grid_str[0] ?>');
			toggle_pph21_23();
		});

		var today = new Date();
		var dd = pad(today.getDate(), 2);
		var mm = pad(today.getMonth() + 1, 2); //January is 0!
		var yyyy = today.getFullYear();
		var customtodaydate = dd + '-' + mm + '-' + yyyy;
		var todaydate = yyyy + '-' + mm + '-' + dd;
		<?php if ($edit["mode"] == "add") { ?>
			$(".custom_tanggal").val(customtodaydate);
			$(".custom_tanggal_jatuh_tempo").val(customtodaydate);
			// $('#tanggal').val(todaydate);
			$('#tanggal_jatuh_tempo').val(todaydate);

		<?php } ?>
		$('#bulan').val(pad(mm, 2));
		$("#tahun").val(yyyy.toString().substr(-2));


		var date = $('.custom_tanggal').datepicker({
			dateFormat: 'dd-mm-yy',
			altFormat: "yy-mm-dd",
			altField: "#tanggal",
			changeMonth: true,
			changeYear: true,
			minDate: new Date('<?= $_SESSION["setting"]["start_date"] ?>'),
			maxDate: '+30D',
			onSelect: function(dateText, inst) {
				var date = $(this).datepicker('getDate'),
					day = date.getDate(),
					month = date.getMonth() + 1,
					year = date.getFullYear();
				$("#tahun").val(year.toString().substr(-2));
				$("#bulan").val(pad(month, 2));

			}
		}).val();

		var date = $('.custom_tanggal_jatuh_tempo').datepicker({
			dateFormat: 'dd-mm-yy',
			altFormat: "yy-mm-dd",
			altField: "#tanggal_jatuh_tempo",
			onSelect: function(dateText, inst) {
				var date = $(this).datepicker('getDate'),
					day = date.getDate(),
					month = date.getMonth() + 1,
					year = date.getFullYear();


			}
		}).val();

		<?php if ($edit["mode"] == "view") { ?>
			$(".custom_tanggal").datepicker('disable');
			$(".custom_tanggal_jatuh_tempo").datepicker('disable');
		<?php } ?>
	});

	function currency(x) {
		var parts = x.toString().split(".");
		if (typeof parts[1] != 'undefined') {
			parts[1] = parts[1].substr(0, 2);
		}

		parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		return parts.join(",");
	}

	function toggle_ppn() {
		var ppn = $('#ppn').val();
		var ppn_default = $('#ppn_default').val();

		if (ppn == 1) {
			$('#sum_ppn_<?= $grid_str[0] ?>').val(<?= ($_SESSION["setting"]["ppn"]); ?>);
			$('#sum_ppn_<?= $grid_str[0] ?>').attr("readonly", true);
		} else {
			$('#sum_ppn_<?= $grid_str[0] ?>').val(0);
			$('#sum_ppn_<?= $grid_str[0] ?>').attr("readonly", true);
		}
		calculate_summary('<?= $grid_str[0] ?>');
		toggle_pph21_23();
	}

	function toggle_pph21_23() {
		var subtotal = $('#sum_total_transaksi_order_pembelian_detail').val();
		var pph = 0;
		var nominal_pph = 0;

		pph = $('#toggle_pph').val();

		nominal_pph = pph * subtotal / 100;
		var total = $("#sum_total_transaksi_order_pembelian_detail").val();
		// alert(nominal_pph);
		$("#pph21_23_accounting").val("(" + currency(nominal_pph) + ")");
		$("#pph21_23").val(nominal_pph);
		$("#total_hutang_usaha").val(total - nominal_pph);


	}

	<?= generate_function_checkgrid($grid_str) ?>
	<?= generate_function_checkunique($grid_str) ?>
	<?= generate_function_realgrid($grid_str) ?>
</script>