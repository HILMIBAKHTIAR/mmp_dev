<?php
$edit["debug"] = 0;

$edit["unique"] = array();
$edit["string_code"] = "kode_pra_penagihan_hutang_data";

if($edit["mode"] != "add")
{
	$edit["query"] = "
	SELECT a.*,
	CONCAT(a.relasinama,' - ',a.relasikode,'|',a.relasinomor) AS 'browse|relasinomor',
    CONCAT(bvl.kode,'-',bvl.nama,'|',bvl.nomor) AS 'browse|nomormhvaluta'
    FROM ".$edit["table"]." a
    JOIN mhvaluta bvl ON a.nomormhvaluta = bvl.nomor AND bvl.status_aktif > 0
	WHERE a.nomor = ".$_GET["no"];
	if($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysql_fetch_array(mysql_query($edit["query"]));
	
	if($edit["mode"] == "edit")
		check_edit($r);
}

$edit["sp_approve"] = "sp_disetujui_thprapenagihanhutang";
$edit["sp_approve_param"] = array("param_nomormhadmin|0","param_status_disetujui|0","param_nomor|0","param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_thprapenagihanhutang";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0","param_status_dibatalkan|0","param_nomor|0","param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";

$i = 0;
// BEGIN GRID 0.DETAIL
$edit["detail"][$i]["table_name"] = "tdprapenagihanhutang";
$edit["detail"][$i]["field_name"] = array(
	"transaksikode",
	"transaksitanggal",
	"relasinama",
	"supplier_invoice_nomor",
	"faktur_pajak_nomor",
	"dpp",
	"ppn",
	"sisa",
	"bayar",
	"kurs",
	"pph23",
	"subtotal",
	"keterangan",
	"transaksitabel",
	"transaksinomor",
	"nomormhaccount",
	"tipe",
	"jenis",
	"multiplier",
	"relasinomor",
	"relasikode",
	"relasitabel",
	"nomormhvaluta",
	"nomormhaccountpph",
	"nomor"
);
$edit["detail"][$i]["foreign_key"] = "nomor".$edit["table"];
$edit["detail"][$i]["additional_where"] = ""; // tipe = 0
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = "penagihan_hutang_data_detail";
$i++;
// END GRID 0.DETAIL

$i = 0;
if(!empty($_GET["a"]) && $_GET["a"] == "view")
	$edit["field"][$i]["box_tabs"] = array("data|Data","info|Info");
$edit["field"][$i]["box_tab"] = "data";
$edit["field"][$i]["label"] = "Nomor";
$edit["field"][$i]["input"] = "kode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if($edit["mode"] == "add")
    $edit["field"][$i]["input_value"] = formatting_code($edit["string_code"]);
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "tanggal";
$edit["field"][$i]["input_class"] = "required date_1";
$edit["field"][$i]["input_col"] = "col-sm-3";
if($edit["mode"] == "add")
    $edit["field"][$i]["input_value"] = date("Y-m-d");
if($_SESSION["menu_".$_SESSION["g.menu_kode"]]["priv"]["backdate"] != 1)
{
    $edit["field"][$i]["input_class"] = "required";
    $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
}
$edit["field"][$i]["input_attr"]["onchange"] = array("load_grid_detail");
$i++;
$edit["field"][$i]["form_group"]              = 0;
$edit["field"][$i]["label"]                   = "";
$edit["field"][$i]["input_element"]      = "
	<a   class='btn btn-info btn-app-sm' onclick=load_grid_detail()><i class='fa fa-refresh'></i></a>
";
$edit["field"][$i]["input_col"] = "col-sm-1";
$edit["field"][$i]["input_save"] = "skip";
$i++;
/*
$edit["field"][$i]["label"] = "Valuta";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "nomormhvaluta";
$edit["field"][$i]["input_class"] = "required";
$edit["field"][$i]["input_element"] = "browse";
$edit["field"][$i]["browse_setting"] = "master_currency";
$edit["field"][$i]["browse_set"]["param_output"] = array("kurs|kurs");
$edit["field"][$i]["browse_set"]["call_function"] = array("calculate_all");
$edit["field"][$i]["browse_set"]["call_function"] = array("load_grid_detail");
if($edit["mode"] == "add"){
	// $edit["field"][$i]["input_value"] = "RUPIAH|1";
}
$i++;
*/

// $edit["field"][$i]["form_group"] = 0;
// $edit["field"][$i]["label"] = "Supplier";
// $edit["field"][$i]["label_class"] = "req";
// $edit["field"][$i]["input"] = "relasinomor";
// $edit["field"][$i]["input_class"] = "required";
// $edit["field"][$i]["input_element"] = "browse";
// $edit["field"][$i]["browse_setting"] = "master_supplier";/*
// $edit["field"][$i]["browse_set"]["param_input"] = array("a.nomormhvaluta|browse_master_currency_hidden");*/
// $edit["field"][$i]["browse_set"]["param_output"] = array(
// 	"nama|relasinama",
// 	"kode|relasikode",
// 	"tabel|relasitabel"
// );

// $i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "Cabang";
$edit["field"][$i]["input"] = "nomormhcabang";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if($edit["mode"] == "add")
    $edit["field"][$i]["input_value"] = $_SESSION["cabang"]["nomor"];
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "relasinama";
$edit["field"][$i]["input"] = "relasinama";
$edit["field"][$i]["input_class"] = "browse_relasi_supplier_clear";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "relasikode";
$edit["field"][$i]["input"] = "relasikode";
$edit["field"][$i]["input_class"] = "browse_relasi_supplier_clear";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "relasitabel";
$edit["field"][$i]["input"] = "relasitabel";
$edit["field"][$i]["input_class"] = "browse_relasi_supplier_clear";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;

// BEGIN GRID 0.DETAIL
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = "penagihan_hutang_data_detail";
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar Hutang'";
$edit["field"][$i]["grid_set"]["option"]["width"]           = "'1600'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
	'Transaksi',
	'Tanggal',
	'Relasi Nama',
	'No Inv Supp',
	'No Faktur Pajak',
	'DPP',
	'Ppn',
	'Total Transaksi',
	'Bayar Transaksi',
	'Kurs',
	'Valuta',
	'PPh 23',
	'Account PPh',
	'Bayar',
	'Keterangan',
	'transaksitabel',
	'transaksinomor',
	'nomormhaccount',
	'tipe',
	'jenis',
	'multiplier',
	'relasinomor',
	'relasikode',
	'relasitabel',
	'nomormhvaluta',
	'nomormhaccountpph',
	'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
	"transaksikode",
	"transaksitanggal",
	"relasinama",
	"supplier_invoice_nomor",
	"faktur_pajak_nomor",
	"dpp",
	"ppn",
	"sisa",
	"bayar",
	"kurs",
	"valuta",
	"pph23",
	"account_pph",
	"subtotal",
	"keterangan",
	"transaksitabel",
	"transaksinomor",
	"nomormhaccount",
	"tipe",
	"jenis",
	"multiplier",
	"relasinomor",
	"relasikode",
	"relasitabel",
	"nomormhvaluta",
	"nomormhaccountpph",
	"nomor"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
	transaksikode  :'',
	transaksitanggal:'',
	supplier_invoice_nomor:'',
	faktur_pajak_nomor:'',
	sisa           :'0',
	bayar          :'0',
	kurs 		   :1,
	valuta 		   :'',
	pph23          :'0',
	subtotal       :'0',
	keterangan     :'',
	transaksitabel :'',
	transaksinomor :'',
	nomormhaccount :'',
	tipe           :'0',
	jenis          :'',
	multiplier     :'1',
	nomormhvaluta  :1,
	nomormhaccountpph:'',
	nomor          :'' 
}";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[ 'transaksikode' ]";
$edit["field"][$i]["grid_set"]["option"]["footerrow"] = "true";
$edit["field"][$i]["grid_set"]["option"]["userDataOnFooter"] = "true";
$edit["field"][$i]["grid_set"]["option"]["pager"] = "'#gridpager'";
$edit["field"][$i]["grid_set"]["nav_option"]["add"] = "false";
$edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'transaksikode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'transaksikode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
//$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_transaksikode }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "100";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'transaksitanggal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'transaksitanggal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "75";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'relasinama'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'relasinama'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "200";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'supplier_invoice_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'supplier_invoice_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'faktur_pajak_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'faktur_pajak_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'dpp'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'dpp'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "100";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'ppn'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'ppn'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "50";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'sisa'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'sisa'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "100";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'bayar'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'bayar'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "100";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kurs'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kurs'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "75";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'valuta'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'valuta'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "75";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'pph23'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'pph23'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "50";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'account_pph'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'account_pph'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_account_pph }";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "250";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'transaksitabel'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'transaksitabel'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'transaksinomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'transaksinomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
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
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'multiplier'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'multiplier'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'relasinomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'relasinomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'relasikode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'relasikode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'relasitabel'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'relasitabel'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhvaluta'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhvaluta'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhaccountpph'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhaccountpph'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
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
$edit["field"][$i]["input_attr"]["placeholder"] = "Keterangan";
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Total Bayar";
$edit["field"][$i]["input"] = "total";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;

if($edit["mode"] != "add")
{
	$edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT a.*, CONCAT(b.kode,' - ',b.nama) as valuta, CONCAT(a.relasinama, ' - ', a.relasikode) AS relasinama,
	CONCAT(c.kode,' - ', UPPER(c.nama)) as account_pph
	FROM ".$edit["detail"][0]["table_name"]." a
	LEFT JOIN mhvaluta b on b.nomor=a.nomormhvaluta
	LEFT JOIN mhaccount c on c.nomor=a.nomormhaccountpph
	WHERE a.status_aktif > 0
	/*AND a.tipe = 0*/
	AND a.".$edit["detail"][0]["foreign_key"]." = ".$_GET["no"];
	$edit["field"][$grid[0]]["grid_set"]["query_order"] = "a.transaksitanggal";
	
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
function load_grid_detail()
{	
	var no = '%';
	var nov = $('#browse_master_currency_hidden').val();
	var tgl = $('#tanggal').val();
	
	var pages = 'pages/grid_load.php?id=penagihan_hutang_data_detail-load&no='+no+'&nov='+nov+'&tgl='+tgl;
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
function calculate_all()
{
	<?php if($edit["mode"] != "view") { ?>
	var subtotal_0 = jQuery(<?=$grid_elm[0]?>).jqGrid('getCol','subtotal',false,'sum');
	var subtotal_1 = 0; // jQuery(<?=$grid_elm[1]?>).jqGrid('getCol','subtotal',false,'sum');
	var subtotal_2 = 0; // jQuery(<?=$grid_elm[2]?>).jqGrid('getCol','subtotal',false,'sum');
	var subtotal = (subtotal_0*1) + (subtotal_1*1) + (subtotal_2*1);
	
	$('#total').val(subtotal);
    <?php } ?>
}
function checkHeader()
{
	var fields = [
		'tanggal|Tanggal',
		'browse_master_currency_hidden|Valuta',
		'browse_relasi_supplier_hidden|Supplier'
	];
	var check_failed = check_value_elements(fields);
	if(check_failed != '')
		return check_failed;
	else
		return true;
}
function checkSave()
{
	calculate_all();
	return true;
}

$(document).on('click', '.save', function(event) {
	 	event.preventDefault();
	 	var obj=$.dialog({
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
	      onOpen: function () {
	            var gridname =<?= $grid_elm[0] ?>;
				var ids = jQuery(gridname).getDataIDs(); 
				var totalgrid = $(gridname).getGridParam("reccount");

				var transaksikode='';
				for(i = 0; i < totalgrid; i++){
					if(parseFloat(jQuery(gridname).jqGrid('getCell',ids[i],'pph23'))>0){
						if(parseFloat(jQuery(gridname).jqGrid('getCell',ids[i],'nomormhaccountpph'))==0)
						{
							if(transaksikode==''){
								transaksikode=jQuery(gridname).jqGrid('getCell',ids[i],'transaksikode');
							}
							else{
								transaksikode=transaksikode+' ,'+jQuery(gridname).jqGrid('getCell',ids[i],'transaksikode');
							}

						}
					}
					
				}
				obj.close();
				
				if(transaksikode!=''){
					$.alert({
			            icon: 'fa fa-exclamation-triangle',
			            theme: 'modern',
			            closeIcon: true,
			            animation: 'scale',
			            type: 'red',
			            title: 'NOTIFICATION',
			            content: 'Account Alokasi PPH untuk Transaksi: '+ transaksikode + ' wajib diisi',
			            onClose: function () {
			              // before the modal is hidden.
			              
			          }
			        });
				}
				else{
					$('form#form_edit').submit();
				}
	        }
	    });
	});
<?=generate_function_checkgrid($grid_str)?>
<?=generate_function_checkunique($grid_str)?>
<?=generate_function_realgrid($grid_str)?>
</script>