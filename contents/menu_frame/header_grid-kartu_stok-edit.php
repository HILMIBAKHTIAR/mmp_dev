<?php
$edit["debug"] = 1;

$edit["unique"] = array();
$edit["string_code"] = "kode_" . $_SESSION["menu_" . $_SESSION["g.menu"]]["string"];

if($edit["mode"] != "add")
{
	$edit["query"] = "
	SELECT a.*,
	DATE_FORMAT(a.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
	CONCAT(a.relasinama,' - ',a.relasikode,'|',a.relasinomor) AS 'browse|relasinomor',
    CONCAT(bvl.kode,'-',bvl.nama,'|',bvl.nomor) AS 'browse|nomormhvaluta'
    FROM ".$edit["table"]." a
    JOIN mhvaluta bvl ON a.nomormhvaluta = bvl.nomor AND bvl.status_aktif > 0
	WHERE a.nomor = ".$_GET["no"];
	if($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));
	
	if($edit["mode"] == "edit")
		check_edit($r);
} 

$edit["sp_approve"] = "sp_disetujui_pradph";
$edit["sp_approve_param"] = array("param_nomormhadmin|0","param_status_disetujui|0","param_nomor|0","param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_pradph";
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
	"ppn", "dpp", "bayar", "sisa", "subtotal", "total_bayar", "total",
	"nomormhvaluta",
	"relasinomor", "relasitabel", "relasikode", "relasinama",
	"transaksinomor", "transaksitabel", "transaksikode", "transaksinama", "transaksitanggal", "supplier_invoice_nomor", "faktur_pajak_nomor",
	"supplier_sj_nomor"

);

$edit["detail"][$i]["foreign_key"] = "nomor" . $edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_" . $_SESSION["g.menu"]]["string"] . "_detail";
$i++;
// END GRID 0.DETAIL

$i = 0;
if(!empty($_GET["a"]) && $_GET["a"] == "view")
	$edit["field"][$i]["box_tabs"] = array("data|Data","info|Info");
$edit["field"][$i]["box_tab"] = "data";


$edit["field"][$i]["label"] 						= "Nomor";
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
$edit["field"][$i]["input_col"] = "col-sm-3";
// if($edit["mode"] == "add")
//     $edit["field"][$i]["input_value"] = date("Y-m-d");
// if($_SESSION["menu_".$_SESSION["g.menu_kode"]]["priv"]["backdate"] != 1)
// {
//     $edit["field"][$i]["input_class"] = "required";
//     $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// }
// $edit["field"][$i]["input_attr"]["onchange"] = array("load_grid_detail");
$i++;

// $edit["field"][$i]["form_group"] = 0;
// $edit["field"][$i]["label"]       = "Tanggal";
// $edit["field"][$i]["label_class"] = "req";
// $edit["field"][$i]["input"]       = "tanggal";
// $edit["field"][$i]["input_class"] = "required";
// $edit["field"][$i]["input_class"] = "required date_1";
// $edit["field"][$i]["input_col"] = "col-sm-3";
// if ($query_detail["total"] > 0) {
//     $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// }
// $edit["field"][$i]["input_attr"]["onchange"] = array("load_grid_detail");
// $i++;


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


// ========================aneh===================
// $edit["field"][$i]["form_group_class"] = "hiding";
// $edit["field"][$i]["label"] = "Cabang";
// $edit["field"][$i]["input"] = "nomormhcabang";
// $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// if($edit["mode"] == "add")
//     $edit["field"][$i]["input_value"] = $_SESSION["cabang"]["nomor"];
// $i++;
// $edit["field"][$i]["form_group_class"] = "hiding";
// $edit["field"][$i]["label"] = "relasinama";
// $edit["field"][$i]["input"] = "relasinama";
// $edit["field"][$i]["input_class"] = "browse_relasi_supplier_clear";
// $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// $i++;
// $edit["field"][$i]["form_group_class"] = "hiding";
// $edit["field"][$i]["label"] = "relasikode";
// $edit["field"][$i]["input"] = "relasikode";
// $edit["field"][$i]["input_class"] = "browse_relasi_supplier_clear";
// $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// $i++;
// $edit["field"][$i]["form_group_class"] = "hiding";
// $edit["field"][$i]["label"] = "relasitabel";
// $edit["field"][$i]["input"] = "relasitabel";
// $edit["field"][$i]["input_class"] = "browse_relasi_supplier_clear";
// $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// $i++;






// BEGIN GRID 0.DETAIL
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Detail Nota Beli'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
	'Transaksi',
	'Tanggal',
	'Relasi Nama',
	'DPP',
	'PPN',
	'Total Transaksi',
	'Bayar Transaksi',
	'Kurs',
	'Valuta',
	'transaksinomor',
	'transaksitabel',
	'transaksinama',
	'transaksitanggal',
	'supplier_invoice_nomor',
	'faktur_pajak_nomor',
	'relasikode',
	'relasitabel',
	'nomormhvaluta',
	'relasinomor',
	'supplier_sj_nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
	"transaksikode",
	"tanggal",
	"relasi_nama",
	"dpp",
	"ppn_nominal",
	"total",
	"total_bayar",
	"kurs",
	"valuta",
	"transaksinomor",
	"transaksitabel",
	"transaksinama",
	"transaksitanggal",
	"supplier_invoice_nomor",
	"faktur_pajak_nomor",
	"relasikode",
	"relasitabel",
	"nomormhvaluta",
	"relasinomor",
	"supplier_sj_nomor"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
	transaksikode  :'',
	tanggal:'',
	relasi_nama:'',
	dpp:'',
	ppn_nominal           :'0',
	total          :'0',
	total_bayar          :'0',
	kurs 		   :1,
	valuta 		   :'',
	transaksinomor:'',
	transaksitabel:'',
	transaksinama:'',
	transaksitanggal:'',
	supplier_invoice_nomor:'',
	faktur_pajak_nomor:'',
	relasikode:'',
	relasitabel:'',
	nomormhvaluta     :'',
	relasinomor:'',
	supplier_sj_nomor:''
}";

// $edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[ 'transaksikode' ]";
// $edit["field"][$i]["grid_set"]["option"]["footerrow"] = "true";
// $edit["field"][$i]["grid_set"]["option"]["userDataOnFooter"] = "true";
// $edit["field"][$i]["grid_set"]["option"]["pager"] = "'#gridpager'";
// $edit["field"][$i]["grid_set"]["nav_option"]["add"] = "false";
// $edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;

$edit["field"][$i]["grid_set"]["nav_option"]["add"] = "false";
$edit["field"][$i]["grid_set"]["column_autoaddrow"] = 0;
$edit["field"][$i]["grid_set"]["var"]["column_unique"]        = "[ 'nomor' ]";
$j                                                            = 0;
$j = 0;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'transaksikode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'transaksikode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
//$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_transaksikode }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "100";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'tanggal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'tanggal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "75";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'relasi_nama'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'relasi_nama'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "200";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'dpp'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'dpp'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'ppn_nominal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'ppn_nominal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'total'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'total'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "100";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'total_bayar'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'total_bayar'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "100";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'kurs'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'kurs'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "100";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'valuta'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'valuta'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["width"] = "100";
$j++;




$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'transaksinomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'transaksinomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'transaksitabel'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'transaksitabel'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'transaksinama'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'transaksinama'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'transaksitanggal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'transaksitanggal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'supplier_invoice_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'supplier_invoice_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'faktur_pajak_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'faktur_pajak_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'relasikode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'relasikode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'relasitabel'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'relasitabel'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomormhvaluta'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomormhvaluta'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'relasinomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'relasinomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'supplier_sj_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'supplier_sj_nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
// $edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;

$i++;

// END GRID 0.DETAIL

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


// $edit = generate_summary($edit,"totalbayar",$edit["detail"][0]["grid_id"]);

// $i++;

// $edit["field"][$i]["form_group"] = 0;
// $edit["field"][$i]["label"] = "Total Bayar";
// $edit["field"][$i]["input"] = "total";
// $edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
// $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// $i++;


if($edit["mode"] != "add")
{
	// $edit["field"][$grid[0]]["grid_set"]["query"] = "
	// SELECT a.*, CONCAT(b.kode,' - ',b.nama) as valuta, CONCAT(a.relasinama, ' - ', a.relasikode) AS relasinama,
	// CONCAT(c.kode,' - ', UPPER(c.nama)) as account_pph
	// FROM ".$edit["detail"][0]["table_name"]." a
	// LEFT JOIN mhvaluta b on b.nomor=a.nomormhvaluta
	// LEFT JOIN mhaccount c on c.nomor=a.nomormhaccountpph
	// WHERE a.status_aktif > 0
	// /*AND a.tipe = 0*/
	// AND a.".$edit["detail"][0]["foreign_key"]." = ".$_GET["no"];
	// $edit["field"][$grid[0]]["grid_set"]["query_order"] = "a.transaksitanggal";

	$edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT a.*,
	t.kode as transaksikode,
	DATE_FORMAT(t.tanggal,'" . $_SESSION["setting"]["date_sql"] . "') as tanggal,
	m.nama as relasi_nama,
	t.dpp,
	t.ppn_nominal,
	t.total,
	0 as nol,
	t.kurs,
	m2.nama as valuta,
	t.nomor as transaksinomor,
	'thbelinota' transaksitabel,
	'btb' transaksinama,
	t.tanggal transaksitanggal,
	t.supplier_invoice_nomor supplier_invoice_nomor,
	t.faktur_pajak_nomor faktur_pajak_nomor,
	m.kode relasikode,
	'mhrelasi'relasitabel,
	m2.nomor as nomormhvaluta
	from tdprapenagihanhutang a
	join thbelinota t on t.nomor = a.transaksinomor and a.transaksinama = 'btb'
	join mhrelasi m on m.nomor = a.relasinomor and a.relasitabel = 'mhrelasi'
	left join mhvaluta m2 on m2.nomor = t.nomormhvaluta 
	WHERE t.status_aktif = 1
	AND t.status_disetujui = 1 and t.status_disetujui_dokumen = 1 and a.status_aktif = 1
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
// 	var no = '%';
// 	var nov = $('#browse_master_currency_hidden').val();
// 	var tgl = $('#tanggal').val();
	
// 	// var pages = 'pages/grid_load.php?id=pra_daftar_pembayaran_hutang_detail-load&no='+no+'&nov='+nov+'&tgl='+tgl;
// 	var pages = 'pages/grid_load.php?id=pra_daftar_pembayaran_hutang_detail-load&tgl='+tgl;
// 	jQuery(<?=$grid_elm[0]?>).jqGrid('setGridParam',
// 	{
// 		url:pages,
// 		datatype:'json',
// 		loadComplete:function(data)
// 		{
// 			<?=$grid_str[0]?>_load = 0;
// 			actGridComplete_<?=$grid_str[0]?>();
// 		}
// 	});
// 	jQuery(<?=$grid_elm[0]?>).trigger('reloadGrid');
// }


function load_grid_detail()
	{	
	var tgl = $('#tanggal').val();
	
	var pages = 'pages/grid_load.php?id=pra_daftar_pembayaran_hutang_detail-load&tgl='+tgl+'';
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

// $(document).on('click', '.save', function(event) {
// 	 	event.preventDefault();
// 	 	var obj=$.dialog({
// 	      icon: 'fa fa-spinner fa-spin',
// 	      title: 'Working!',
// 	      draggable: false,
// 	      // theme: 'modern',
// 	      animation: 'scale',
// 	      // type: 'orange',
// 	      content: '<font style="font-size:14px">Pengecekan Data..</font>',
// 	      buttons: {
// 	        ok: {
// 	            isHidden: true,
// 	          }
// 	      },
// 	      onOpen: function () {
// 	            var gridname =<?= $grid_elm[0] ?>;
// 				var ids = jQuery(gridname).getDataIDs(); 
// 				var totalgrid = $(gridname).getGridParam("reccount");

// 				var transaksikode='';
// 				for(i = 0; i < totalgrid; i++){
// 					if(parseFloat(jQuery(gridname).jqGrid('getCell',ids[i],'pph23'))>0){
// 						if(parseFloat(jQuery(gridname).jqGrid('getCell',ids[i],'nomormhaccountpph'))==0)
// 						{
// 							if(transaksikode==''){
// 								transaksikode=jQuery(gridname).jqGrid('getCell',ids[i],'transaksikode');
// 							}
// 							else{
// 								transaksikode=transaksikode+' ,'+jQuery(gridname).jqGrid('getCell',ids[i],'transaksikode');
// 							}

// 						}
// 					}
					
// 				}
// 				obj.close();
				
// 				if(transaksikode!=''){
// 					$.alert({
// 			            icon: 'fa fa-exclamation-triangle',
// 			            theme: 'modern',
// 			            closeIcon: true,
// 			            animation: 'scale',
// 			            type: 'red',
// 			            title: 'NOTIFICATION',
// 			            content: 'Account Alokasi PPH untuk Transaksi: '+ transaksikode + ' wajib diisi',
// 			            onClose: function () {
// 			              // before the modal is hidden.
			              
// 			          }
// 			        });
// 				}
// 				else{
// 					$('form#form_edit').submit();
// 				}
// 	        }
// 	    });
// 	});
<?=generate_function_checkgrid($grid_str)?>
<?=generate_function_checkunique($grid_str)?>
<?=generate_function_realgrid($grid_str)?>
</script>