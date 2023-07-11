<?php
$edit["debug"] = 1;
$edit["unique"] = array();
$edit["string_code"] = "kode_".$_SESSION["menu_".$_SESSION["g.menu"]]["string"];

if($edit["mode"] != "add")
{
	$edit["query"] = "
	SELECT a.*,
	DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
	DATE_FORMAT(a.tanggal_top,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal_top,
	CONCAT(b.kode,' - ',b.nama,'|',b.nomor) AS 'browse|nomormhrelasi'
	FROM ".$edit["table"]." a
	JOIN mhrelasi b ON a.nomormhrelasi = b.nomor
	WHERE a.nomor = ".$_GET["no"];
	if($edit["debug"] > 0) {
		// echo $edit["query"];
	}
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));
}

$edit["sp_approve"] = "sp_disetujui_dph";
$edit["sp_approve_param"] = array("param_nomormhadmin|0","param_status_disetujui|0","param_nomor|0","param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_dph";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0","param_status_dibatalkan|0","param_nomor|0","param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";

$i = 0;
$edit["detail"][$i]["table_name"] = "tdpenagihanhutang";
$edit["detail"][$i]["field_name"] = array(
	"jenis",
	"transaksi_kode",
	"supplier_invoice_nomor",
	"supplier_sj_nomor",
	"no_sj",
	"dpp",
	"faktur_pajak_tanggal",
	"faktur_pajak_nomor",
	"tgl_terima_tagihan",
	"pph",
	"ppn_nominal",
	"kurs",
	"sisa",
	"bayar",
	"subtotal",
	"keterangan",
	"transaksi_tabel",
	"transaksi_nomor",
	"nomormhaccount",
	"nomormhvaluta",
	"tipe",
	"multiplier",
	"ppn"
);

$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;


// $edit["detail"][$i]["table_name"] = "tdpenagihanhutangbiaya";
// $edit["detail"][$i]["field_name"] = array(
// 	"account",
//     "keterangan",
//     "subtotal",
//     "nomormhaccount"
// );
// $edit["detail"][$i]["foreign_key"] = "nomor".$edit["table"];
// $edit["detail"][$i]["additional_where"] = "";
// $edit["detail"][$i]["string_id"] = "";
// $edit["detail"][$i]["grid_id"] = $_SESSION["menu_".$_SESSION["g.menu"]]["string"]."_detail_biaya";
// $i++;

$i = 0;
if(!empty($_GET["a"]) && $_GET["a"] == "view")
	$edit["field"][$i]["box_tabs"] = array("data|Data","info|Info");
$edit["field"][$i]["box_tab"] = "data";

$edit["field"][$i]["label"] 						= "Permintaan";
$edit["field"][$i]["input"] 						= "kode";
$edit["field"][$i]["input_attr"]["readonly"] 		= "readonly";
if ($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] 				= formatting_code($con, $edit["string_code"]);
$i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "tanggal";
$edit["field"][$i]["input_class"] = "required date_1";
// if ($edit["mode"] == "add")
//     $edit["field"][$i]["input_value"] = date("Y-m-d");
// $edit["field"][$i]["input_attr"]["onchange"] = array("load_grid_detail");
$i++;


$edit["field"][$i]["label"] = "Supplier";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "nomormhrelasi";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_element"] = "browse";
$edit["field"][$i]["browse_setting"] = "master_supplier";
$edit["field"][$i]["browse_set"]["param_output"] = array(
	"nomor|nomormhrelasi"
);
$edit["field"][$i]["browse_set"]["call_function"] = array("load_grid_detail");
$i++;

$edit["field"][$i]["label"] 					= "nomormhrelasi";
$edit["field"][$i]["input"]						= "nomormhrelasi";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$edit["field"][$i]["input_save"] = "skip";
$edit["field"][$i]["form_group_class"] = "hiding";
$i++;

// $edit["field"][$i]["form_group"] = 0;
// $edit["field"][$i]["label"] = "Tanggal TOP";
// $edit["field"][$i]["label_class"] = "req";
// $edit["field"][$i]["input"] = "tanggal_top";
// $edit["field"][$i]["input_class"] = "required date_1";
// if($_SESSION["login"]["level"] > 2)
// {
// 	$edit["field"][$i]["input_class"] = "required";
// 	if($edit["mode"] == "add")
// 		$edit["field"][$i]["input_value"] = date("Y-m-d");
// 	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// }
// $i++;

$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Tanggal TOP";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "tanggal_top";
$edit["field"][$i]["input_class"] = "required date_1";
// if ($edit["mode"] == "add")
//     $edit["field"][$i]["input_value"] = date("Y-m-d");
// $edit["field"][$i]["input_attr"]["onchange"] = array("load_grid_detail");
$i++;

$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "Valuta";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "nomormhvaluta";
if($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = 1;
$i++;
// $edit["field"][$i]["label"]                  = "PPN";
// $edit["field"][$i]["input"]                  = "ppn";
// $edit["field"][$i]["input_element"]          = "select";
// $edit["field"][$i]["input_option"]           = array(
//     "0|Tidak",
//     "1|Iya"
// );
// $i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "Kurs";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "kurs";
if($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = 1;
$edit["field"][$i]["input_class"] = "required ".$_SESSION["setting"]["class_money"];
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "Cabang";
$edit["field"][$i]["input"] = "nomormhcabang";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = $_SESSION["cabang"]["nomor"];
$i++;

$grid[0]                                                      = $i;

$edit["field"][$i]["input_element"]                           = "grid";
$edit["field"][$i]["grid_set"]                                = $edit_grid;
$edit["field"][$i]["grid_set"]["id"]                          = "daftar_pembayaran_hutang_detail";
$edit["field"][$i]["grid_set"]["option"]["caption"]           = "'Detail Nota Beli'";
$edit["field"][$i]["grid_set"]["option"]["colNames"]          = "	
'JENIS',
'KODE TRANSAKSI',
'NO INVOICE',
'NO SJ',
'DPP',
'TGL PAJAK FAKTUR',
'NOMOR PAJAK FAKTUR',
'TGL TERIMA TAGIHAN',
'PPH (%)',
'PPN',
'ppn_nominal',
'KURS',
'SISA',
'TOTAL BAYAR',
'TOTAL TRANSAKSI',
'KETERANGAN',
'transaksi_tabel',
'transaksi_nomor',
'nomormhaccount',
'nomormhvaluta',
'tipe',
'multiplier',
'transaksi_kode'

	";
$edit["field"][$i]["grid_set"]["column"]                      = array(
	"jenis",
	"transaksi_kode",
	"supplier_invoice_nomor",
	"supplier_sj_nomor",
	"dpp",
	"faktur_pajak_tanggal",
	"faktur_pajak_nomor",
	"tanggal_terima_tagihan",
	"pph",
	"ppn",
	"ppn_nominal",
	"kurs",
	"sisa",
	"bayar",
	"subtotal",
	"keterangan",
	"transaksi_tabel",
	"transaksi_nomor",
	"nomormhaccount",
	"nomormhvaluta",
	"tipe",
	"multiplier",
	"transaksi_kode"


);
$edit["field"][$i]["grid_set"]["var"]["default_data"]         = "{
	jenis:'',
	transaksi_kode:'',
	supplier_invoice_nomor: '',
	supplier_sj_nomor:'',
	dpp:'',
	faktur_pajak_tanggal:'',
	faktur_pajak_nomor:'',
	tanggal_terima_tagihan:'',
	pph:'0',
	ppn:'',
	ppn_nominal:'',
	kurs:'1',
	sisa:'0',
	bayar:'0',
	subtotal:'0',
	keterangan:'',
	transaksi_tabel:'',
	transaksi_nomor:'',
	nomormhaccount:'',
	nomormhvaluta:'',
	tipe:'0',
	multiplier:'1',
	transaksi_kode:''

}";
// $edit["field"][$i]["grid_set"]["nav_option"]["add"] = "false";
$edit["field"][$i]["grid_set"]["nav_option"]["add"] = "false";
// $edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
// $edit["field"][$i]["grid_set"]["var"]["column_unique"]        = "[ 'nomor' ]";
$j                                                            = 0;
// AUTOCOMPLETE GRID

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'jenis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'jenis'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "250";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'transaksi_kode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'transaksi_kode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "800";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'supplier_invoice_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'supplier_invoice_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'supplier_sj_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'supplier_sj_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] 	  = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "240";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'dpp'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'dpp'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_currency";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_master_relasi }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'faktur_pajak_tanggal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'faktur_pajak_tanggal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_date_1_custom";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'faktur_pajak_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'faktur_pajak_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_satuan_purchasing }";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'tanggal_terima_tagihan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'tanggal_terima_tagihan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_date_1_custom";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'pph'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'pph'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'ppn'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'ppn'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'ppn_nominal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'ppn_nominal'";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'kurs'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'kurs'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_number2";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'sisa'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'sisa'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'bayar'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'bayar'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]        = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]       = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"]    = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["width"]       = "220";
$j++;


$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;



$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'transaksi_tabel'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'transaksi_tabel'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'transaksi_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'transaksi_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomormhaccount'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomormhaccount'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'nomormhvaluta'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'nomormhvaluta'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'tipe'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'multiplier'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'multiplier'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_number";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"]     = "'transaksi_kode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"]    = "'transaksi_kode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"]   = "true";
$j++;

$i++;


$edit["field"][$i]["label"] = "&nbsp;";
$edit["field"][$i]["input_element"] = " ";
$edit["field"][$i]["input"] = "kosong";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_save"] = "skip";
$i++;

// $edit["field"][$i]["form_group"] = 0;
// $edit["field"][$i]["form_group_class"]       = "";
// $edit["field"][$i]["label"]                  = "Total";
// $edit["field"][$i]["input"]                  = "total";
// $edit["field"][$i]["input_col"] = "col-sm-4";
// // $edit["field"][$i]["input_class"] = "coltemplate_number";
// $edit["field"][$i]["input_class"] = "iptmoney";
// $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// if ($edit['mode'] == 'add') {
// 	$edit["field"][$i]["input_attr"]["value"] = "0";
// }
// $i++;


// $edit["field"][$i]["label"] = "&nbsp;";
// $edit["field"][$i]["input_element"] = " ";
// $edit["field"][$i]["input"] = "kosong";
// $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// $edit["field"][$i]["input_save"] = "skip";
// $i++;


$edit = generate_summary($edit,"totalakhir",$edit["detail"][0]["grid_id"]);
$i++;
$i++;



if($edit["mode"] != "add")
{
	$edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT a.*,
	CONCAT(ba.kode,' - ',ba.nama) AS account,
	c.nama AS valuta,
	CASE
    WHEN a.ppn = 1 THEN 'PPN'
    ELSE 'NON PPN'
end as ppn
	FROM ".$edit["detail"][0]["table_name"]." a
	LEFT JOIN mhaccount ba ON a.nomormhaccount = ba.nomor AND ba.status_aktif > 0
	LEFT JOIN mhvaluta c ON a.nomormhvaluta = c.nomor
	WHERE a.status_aktif > 0
	AND a.".$edit["detail"][0]["foreign_key"]." = ".$_GET["no"];


	$edit = fill_value($edit,$r);
}


$edit = generate_info($edit,$r);
$check_approval_fields["status_disetujui"] = "status_disetujui";
$features = "save|back|reload|add".check_approval($r,"edit|approve|disappr|delete|periode",$check_approval_fields);
$edit_navbutton = generate_navbutton($edit_navbutton,$features);

$grid_str = generate_grid_string($edit["field"],$grid);
$grid_elm = generate_grid_string($edit["field"],$grid,"element");
?>
<script language="javascript" type="text/javascript">
	

// function load_grid_detail()
// {
// 	var browse_master_supplier_hidden = $('#browse_master_supplier_hidden').val();
// 	var tanggal = $('#tanggal').val();
// 	var pages = 'pages/grid_load.php?id=<?=$grid_str[0]?>-load&no='+browse_master_supplier_hidden+'&tgl='+tanggal;
// 	jQuery(<?=$grid_elm[0]?>).jqGrid('setGridParam',
// 	{
// 		url:pages,
// 		datatype:'json',
// 		loadComplete:function(data)
// 		{
// 			<?=$grid_str[0]?>_load = 0;
// 			actGridComplete_<?=$grid_str[0]?>();
// 			sum_subtotal_<?=$grid_str[0]?>();
// 		}
// 	});
// 	jQuery(<?=$grid_elm[0]?>).trigger('reloadGrid');
// }

function load_grid_detail()
	{	
	var no = $('#nomormhrelasi').val();
	
	var pages = 'pages/grid_load.php?id=daftar_pembayaran_hutang_detail-load&no='+no+'';
	jQuery(<?=$grid_elm[0]?>).jqGrid('setGridParam',
	{
		url:pages,
		datatype:'json',
		loadComplete:function(data)
		{
			<?=$grid_str[0]?>_load = 0;
			actGridComplete_<?=$grid_str[0]?>();
		}
	});
	jQuery(<?=$grid_elm[0]?>).trigger('reloadGrid');
	}

// =================================== test ================================================
function calculate_all()
{
	
	var ppn = $('#ppn').val();
	console.log(ppn);
    if(ppn == 1)
    {
        $('#sum_ppn_<?=$edit["detail"][0]["grid_id"]?>').val(<?php  echo($_SESSION["setting"]["ppn"]); ?>);
        $('#sum_ppn_<?=$edit["detail"][0]["grid_id"]?>').attr('readonly',true);
		$('.ppn_section').removeClass('hide');
    }
    else
    {
        $('#sum_ppn_<?=$edit["detail"][0]["grid_id"]?>').val(0);
        $('#sum_ppn_<?=$edit["detail"][0]["grid_id"]?>').attr('readonly',true);
		$('.ppn_section').addClass('hide');
    }

	<?php if($edit["mode"] != "view") { ?>
		// SUBTOTAL
		var subtotal_0 = jQuery(<?=$grid_elm[0]?>).jqGrid('getCol','subtotal',false,'sum');
		$('#sum_subtotal_<?=$grid_str[0]?>').val(subtotal_0);

		calculate_summary('<?=$grid_str[0]?>');
		
		// TOTAL (KURS)
		// var total 			= $('#sum_total_<?=$grid_str[0]?>').val();
	    // var kurs 			= $('#kurs').val();
	    // var total_valuta 	= total * kurs;
	    // $('#total_valuta').val(total_valuta);
    <?php } ?>
}	

// =================================== end test ================================================


function hitungBayar()
{
	var total = $('#total').val();
	var selisih = $('#selisih').val();
	var bayar = total - selisih;
	$('#bayar').val(bayar);
}
function checkSave() {
		var check_failed = '';

		var total = $('#total').val();


		// if (total < 0)
		// 	check_failed += '- Total Tidak Boleh Minus\n\n';

		if (check_failed != '')
			alert(check_failed);
		else
			return true;
	}
function checkHeader()
{
	var fields = [
		"tanggal|Tanggal","browse_master_supplier_hidden|Supplier"
	];
	var check_failed = check_value_elements(fields);
	if(check_failed != '')
		return check_failed;
	else
		return true;
}
<?=generate_function_checkgrid($grid_str)?>
<?=generate_function_checkunique($grid_str)?>
<?=generate_function_realgrid($grid_str)?>
</script>
