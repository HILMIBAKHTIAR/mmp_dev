<?php
$edit["debug"] = 1;
$edit["ajax"] = 1;

$edit["unique"] = array();
$edit["string_code"] = "kode_".$_SESSION["menu_".$_SESSION["g.menu"]]["string"];
$edit["manual_save"] = "contents/menu_frame/".$_SESSION["g.frame"]."-".$_SESSION["g.menu"]."-save.php";
$edit["manual_save_beforecommit"] = "contents/menu_frame/header_grid-uang_keluar-save_beforecommit.php";

if($edit["mode"] != "add")
{
	$edit["query"] = "
	SELECT a.*, 
	DATE_FORMAT(a.tanggal,'".$_SESSION["setting"]["date_sql"]."') AS tanggal,
	DATE_FORMAT(a.giro_tempo,'".$_SESSION["setting"]["date_sql"]."') AS giro_tempo,
	IF(a.relasitabel='mhrelasi',CONCAT(a.relasinama,' - ',a.relasikode,'|',a.relasinomor),'') AS 'browse|tukang',
	IF(a.relasitabel='mhrelasi',CONCAT(a.relasinama,' - ',a.relasikode,'|',a.relasinomor),'') AS 'browse|supplier',
	IF(a.relasitabel='mhrelasi',CONCAT(a.relasinama,' - ',a.relasikode,'|',a.relasinomor),'') AS 'browse|customer',
	CONCAT(bac.kode,' - ',bac.nama,'|',bac.nomor) AS 'browse|nomormhaccount',
	CONCAT(bvl.kode,'|',bvl.nomor) AS 'browse|nomormhvaluta'
	FROM ".$edit["table"]." a
	LEFT JOIN mhaccount bac ON a.nomormhaccount = bac.nomor AND bac.status_aktif > 0
	JOIN mhvaluta bvl ON a.nomormhvaluta = bvl.nomor AND bvl.status_aktif > 0
	
	WHERE a.nomor = ".$_GET["no"];

	if($edit["debug"] > 0)
		echo $edit["query"];
	$r = mysqli_fetch_array(mysqli_query($con, $edit["query"]));
	
	if($edit["mode"] == "edit")
		check_edit($r);
}

$edit["sp_approve"] = "sp_disetujui_thuangkeluar_utama";
$edit["sp_approve_param"] = array("param_nomormhadmin|0","param_status_disetujui|0","param_nomor|0","param_mode|1");
$edit["sp_disapprove"] = "sp_disetujui_thuangkeluar_utama";
$edit["sp_disapprove_param"] = array("param_nomormhadmin|0","param_status_dibatalkan|0","param_nomor|0","param_mode|1");
$_POST["param_nomormhadmin"] = $_SESSION["login"]["nomor"];
$_POST["param_status_disetujui"] = 1;
$_POST["param_status_dibatalkan"] = 0;
$_POST["param_nomor"] = $_GET["no"];
$_POST["param_mode"] = "";

$i = 0;
// BEGIN GRID 0.DETAIL
$edit["detail"][$i]["table_name"] = "tduangkeluar";
$edit["detail"][$i]["field_name"] = array(
	"transaksikode",
	"subtotal",
	"keterangan",
	"transaksitabel",
	"transaksinomor",
	"nomormhaccount",
	"tipe",
	"jenis",
	"nomor"
);
$edit["detail"][$i]["foreign_key"] = "nomor".$edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_".$_SESSION["g.menu"]]["string"]."_detail";
$i++;
// END GRID 0.DETAIL
// BEGIN GRID 1.SELISIH
$edit["detail"][$i]["table_name"] = "tduangkeluarselisih";
$edit["detail"][$i]["field_name"] = array(
//	"account",
	"subtotal",
	"keterangan",
	"nomormhaccount",
	"nomor"
);
$edit["detail"][$i]["foreign_key"] = "nomor".$edit["table"];
$edit["detail"][$i]["additional_where"] = "";
$edit["detail"][$i]["string_id"] = "";
$edit["detail"][$i]["grid_id"] = $_SESSION["menu_".$_SESSION["g.menu"]]["string"]."_selisih";
$i++;
// END GRID 1.SELISIH

$i = 0;
if(!empty($_GET["a"]) && $_GET["a"] == "view")
	$edit["field"][$i]["box_tabs"] = array("data|Data","info|Info");
$edit["field"][$i]["box_tab"] = "data";


$edit["field"][$i]["label"] = "Kode";
$edit["field"][$i]["input"] = "kode";
$edit["field"][$i]["input_attr"]["maxlength"] = "100";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if($edit["mode"] == "add")
    $edit["field"][$i]["input_value"] = formatting_code($con, $edit["string_code"]);
$i++;


$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Tanggal";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "tanggal";
$edit["field"][$i]["input_class"] = "required date_1";
$edit["field"][$i]["input_col"] = "col-sm-3";

if($_SESSION["menu_".$_SESSION["g.menu_kode"]]["priv"]["backdate"] != 1)
{
    $edit["field"][$i]["input_class"] = "required";
    $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
}
$edit["field"][$i]["browse_set"]["call_function"] = array("load_grid_detail");
$i++;


// $edit["field"][$i]["form_group"]              = 0;
// $edit["field"][$i]["label"]                   = "";
// $edit["field"][$i]["input_element"]      = "
// 	<a class='btn btn-info btn-app-sm' onclick=load_grid_detail()><i class='fa fa-refresh'></i></a>
// ";
// $edit["field"][$i]["input_col"] = "col-sm-1";
// $edit["field"][$i]["input_save"] = "skip";
// $i++;


$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "tipe";
$edit["field"][$i]["input"] = "tipe";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if($edit["mode"] == "add")
    $edit["field"][$i]["input_value"] = 0;
$i++;

$edit["field"][$i]["label"] = "Metode";
$edit["field"][$i]["input"] = "metode";
$edit["field"][$i]["input_element"] = "select1";
$edit["field"][$i]["input_option"] = array("Kas|KAS","Bank|BANK","Giro|GIRO");
// if($edit["mode"] != "add")
// {
// 	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// 	$edit["field"][$i]["input_save"] = "skip";
// }
$i++;

$edit["field"][$i]["label"] = "Account Kas/Bank";
$edit["field"][$i]["input"] = "nomormhaccount";
$edit["field"][$i]["input_element"] = "browse";
$edit["field"][$i]["browse_setting"] = "master_account_kasbank";
$edit["field"][$i]["browse_set"]["param_input"] = array("a.kas|kas","a.bank|bank","a.giro|giro");
$edit["field"][$i]["browse_set"]["param_output"] = array("kode_inisial|account_kode");
// if($edit["mode"] != "add")
// {
// 	$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// 	$edit["field"][$i]["input_save"] = "skip";
// }
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
if($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = "0";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "bank";
$edit["field"][$i]["input"] = "bank";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if($edit["mode"] == "add")
	$edit["field"][$i]["input_value"] = "0";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "giro";
$edit["field"][$i]["input"] = "giro";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if($edit["mode"] == "add")
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
// $edit["field"][$i]["browse_set"]["call_function"] = array("calculate_all","checkKurs","load_grid_detail");
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Kurs";
$edit["field"][$i]["label_class"] = "req";
$edit["field"][$i]["input"] = "kurs";
$edit["field"][$i]["input_class"] = "required iptmoney";
if($edit["mode"] == "add")
    $edit["field"][$i]["input_value"] = 1;
$i++;

$edit["field"][$i]["form_group_class"] = "tukang_section";
$edit["field"][$i]["label"] = "tukang";
$edit["field"][$i]["input"] = "tukang";
$edit["field"][$i]["input_element"] = "browse";
$edit["field"][$i]["browse_setting"] = "master_tukang";
$edit["field"][$i]["input_save"]  = "skip";
$edit["field"][$i]["browse_set"]["param_output"] = array(
	"relasinomor|relasinomor",
	"nama|relasinama",
	"kode|relasikode",
	"relasitabel|relasitabel"
);
$i++;

// $edit["field"][$i]["browse_set"]["call_function"] = array("load_grid_detail");
// $i++;
// $edit["field"][$i]["form_group_class"] = "supplier_section";
// $edit["field"][$i]["label"] = "Supplier";
// $edit["field"][$i]["input"] = "supplier";
// $edit["field"][$i]["input_element"] = "browse";
// $edit["field"][$i]["browse_setting"] = "master_supplier";
// $edit["field"][$i]["input_save"]  = "skip";
// $edit["field"][$i]["browse_set"]["param_output"] = array(
// 	"relasinomor|relasinomor",
// 	"nama|relasinama",
// 	"kode|relasikode",
// 	"relasitabel|relasitabel"
// );
// // $edit["field"][$i]["browse_set"]["call_function"] = array("load_grid_detail");
 

$edit["field"][$i]["label"] 						= "Supplier";
$edit["field"][$i]["label_class"] 					= "req";
$edit["field"][$i]["input"] 						= "nomormhrelasi";
$edit["field"][$i]["input_class"] 					= "required";
$edit["field"][$i]["input_element"] 				= "browse";
$edit["field"][$i]["browse_setting"] 				= "master_supplier_penerimaan";
$edit["field"][$i]["browse_set"]["param_output"] = array(
	"nomor|nomormhrelasi"
);
$edit["field"][$i]["browse_set"]["call_function"] = array(
	"load_grid_detail"
);
$i++;


$edit["field"][$i]["label"] 					= "nomormhrelasi";
$edit["field"][$i]["input"]						= "nomormhrelasi";
$edit["field"][$i]["input_attr"]["maxlength"] 	= "200";
$edit["field"][$i]["input_save"] = "skip";
$edit["field"][$i]["form_group_class"] = "hiding";
$i++;


$edit["field"][$i]["form_group_class"] = "customer_section";
$edit["field"][$i]["label"] = "Customer";
$edit["field"][$i]["input"] = "customer";
$edit["field"][$i]["input_element"] = "browse";
$edit["field"][$i]["browse_setting"] = "master_customer";
$edit["field"][$i]["input_save"]  = "skip";
$edit["field"][$i]["browse_set"]["param_output"] = array(
	"relasinomor|relasinomor",
	"relasinama|relasinama",
	"relasikode|relasikode",
	"relasitabel|relasitabel"
);
// $edit["field"][$i]["browse_set"]["call_function"] = array("load_grid_detail");
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "relasinomor";
$edit["field"][$i]["input"] = "relasinomor";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "relasinama";
$edit["field"][$i]["input"] = "relasinama";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "relasikode";
$edit["field"][$i]["input"] = "relasikode";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "relasitabel";
$edit["field"][$i]["input"] = "relasitabel";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "Cabang";
$edit["field"][$i]["input"] = "nomormhcabang";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
if($edit["mode"] == "add")
    $edit["field"][$i]["input_value"] = $_SESSION["cabang"]["nomor"];
$i++;

// BEGIN GRID 0.DETAIL
$grid[0] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][0]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar Pembayaran Hutang'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
	'DPH',
	'Total',
	'Keterangan',
	'transaksitabel',
	'transaksinomor',
	'nomormhaccount',
	'tipe',
	'jenis',
	'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
	"kode",
	"subtotal",
	"keterangan",
	"transaksitabel",
	"transaksinomor",
	"nomormhaccount",
	"tipe",
	"jenis",
	"nomor"
);

$j = 0;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'transaksikode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'transaksikode'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
//$edit["field"][$i]["grid_set"]["colmodel"][$j]["editoptions"] = "{ dataInit:autocomplete_transaksikode }";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'subtotal'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_currency";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$j++;
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'keterangan'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'keterangan'";
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
$edit["field"][$i]["input_attr"]["rows"] = "12";
$edit["field"][$i]["input_attr"]["cols"] = "70";
$edit["field"][$i]["input_attr"]["placeholder"] = "Keterangan :";
$i++;
// $edit["field"][$i]["form_group"] = 0;
// $edit["field"][$i]["label"]                  = "";
// $edit["field"][$i]["input_col"] = "col-sm-4";
// $edit["field"][$i]["input_value"] = "";
// $edit["field"][$i]["input_attr"]["style"] = "display:none";
// $edit["field"][$i]["input_save"]             = "skip";
// $i++;
// $edit["field"][$i]["form_group"] = 0;
// $edit["field"][$i]["label"]                  = "";
// $edit["field"][$i]["input_col"] = "col-sm-2";
// $edit["field"][$i]["input_value"] = "CALCULATE SUMMARY";
// $edit["field"][$i]["input_attr"]["readonly"] = "readonly";
// $edit["field"][$i]["input_attr"]["style"] = "text-align:center;background-color:#00cbf1;color:white;background-image:none;cursor:pointer;font-size:12px";
// $edit["field"][$i]["input_attr"]["onclick"] = "calculate_all()";
// $edit["field"][$i]["input_save"]             = "skip";
// $i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Total DPH";
$edit["field"][$i]["input"] = "total";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Total DPH (IDR)";
$edit["field"][$i]["input"] = "total_idr";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Bayar";
$edit["field"][$i]["input"] = "bayar";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
$edit["field"][$i]["input_attr"]["onblur"] = "calculate_all()";
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Bayar (IDR)";
$edit["field"][$i]["input"] = "bayar_idr";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Selisih";
$edit["field"][$i]["input"] = "selisih";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Selisih (IDR)";
$edit["field"][$i]["input"] = "selisih_idr";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;

// BEGIN GRID 1.SELISIH
$grid[1] = $i;
$edit["field"][$i]["input_element"] = "grid";
$edit["field"][$i]["grid_set"] = $edit_grid;
$edit["field"][$i]["grid_set"]["id"] = $edit["detail"][1]["grid_id"];
$edit["field"][$i]["grid_set"]["option"]["caption"] = "'Daftar Selisih'";
$edit["field"][$i]["grid_set"]["option"]["colNames"] = "
	'Account',
	'Nominal',
	'Keterangan',
	'nomormhaccount',
	'nomor'
";
$edit["field"][$i]["grid_set"]["column"] = array(
	"account",
	"subtotal",
	"keterangan",
	"nomormhaccount",
	"nomor"
);
$edit["field"][$i]["grid_set"]["var"]["default_data"] = "{ 
	account        :'',
	subtotal       :'0',
	keterangan     :'',
	nomormhaccount :'',
	nomor          :'' 
}";
$edit["field"][$i]["grid_set"]["var"]["column_unique"] = "[ ]";
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
$edit["field"][$i]["grid_set"]["colmodel"][$j]["name"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["index"] = "'nomor'";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["template"] = "coltemplate_general";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["editable"] = "false";
$edit["field"][$i]["grid_set"]["colmodel"][$j]["hidden"] = "true";
$j++;
$i++;
// END GRID 1.SELISIH
$edit["field"][$i]["label"] = "&nbsp;";
$edit["field"][$i]["input"] = "&nbsp;";
$edit["field"][$i]["input_element"] = "&nbsp;";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$edit["field"][$i]["input_save"] = "skip";
$i++;
$edit["field"][$i]["form_group"] = 0;
$edit["field"][$i]["label"] = "Total Selisih";
$edit["field"][$i]["input"] = "total_selisih";
$edit["field"][$i]["input_class"] = $_SESSION["setting"]["class_money"];
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;
$edit["field"][$i]["form_group_class"] = "hiding";
$edit["field"][$i]["label"] = "total_selisih_idr";
$edit["field"][$i]["input"] = "total_selisih_idr";
$edit["field"][$i]["input_attr"]["readonly"] = "readonly";
$i++;

if($edit["mode"] != "add")
{
	$edit["field"][$grid[0]]["grid_set"]["query"] = "
	SELECT a.*
	FROM ".$edit["detail"][0]["table_name"]." a
	WHERE a.status_aktif > 0
	/*AND a.tipe = 0*/
	AND a.".$edit["detail"][0]["foreign_key"]." = ".$_GET["no"];

	$edit["field"][$grid[1]]["grid_set"]["query"] = "
	SELECT a.*,
	CONCAT(bac.kode,' - ',bac.nama) AS account
	FROM ".$edit["detail"][1]["table_name"]." a
	JOIN mhaccount bac ON a.nomormhaccount = bac.nomor AND bac.status_aktif > 0
	WHERE a.status_aktif > 0
	AND a.".$edit["detail"][1]["foreign_key"]." = ".$_GET["no"];
	
	$edit = fill_value($edit,$r);
}
$edit = generate_info($edit,$r);

$features = "save|back|reload|add".check_approval($r,"periode|edit|approve|disappr|delete");
if(isset($r["status_aktif"]) && $r["status_aktif"] == 0)
	$features = "back|reload|add";
$edit_navbutton = generate_navbutton($edit_navbutton,$features);

$grid_str = generate_grid_string($edit["field"],$grid);
$grid_elm = generate_grid_string($edit["field"],$grid,"element");
?>

<script language="javascript" type="text/javascript">
function changePiutangSection(){
	<?php if($r['internal'] == 1){ ?>
		$('.piutang_section').hide();
	<?php } else { ?>
		$('.piutang_section').show();
	<?php }?>
}

$(document).ready(function()
{	
	const kodeAccountContainer =  document.getElementsByName('div_H_i6')[0];
	
	const metodeField = document.getElementById('metode');
	const kodeAccountField = document.getElementById('browse_master_account_kasbank_search');

	const metodeValue = metodeField.value

	<?php if ($edit["mode"] == "add") { ?>
		kodeAccountField.required = true
	<?php } ?>

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

	change_relasi_section();
	metode_value_changed($("#metode"), 1);
	$(document).on('change','#metode',function()
	{
		metode_value_changed(this);
	});
	// $('#metode').change();
});
function checkKurs(){
	if($('#browse_master_currency_hidden').val()==1){
		$('#kurs').val(1);
		$('#kurs').prop('readonly', true);
	}
	else{
		$('#kurs').val(0);
		$('#kurs').prop('readonly', false);
	}
}
function change_relasi_section(){
	if($("#relasijenis").val()==1) {
		$('.tukang_section').show();
		$('.supplier_section').hide();
		$('.customer_section').hide();
	}
	else if($("#relasijenis").val()==2) {
		$('.tukang_section').hide();
		$('.supplier_section').hide();
		$('.customer_section').show();
	}
	else {
		$('.supplier_section').show();
		$('.tukang_section').hide();
		$('.customer_section').hide();
	}
}
function metode_value_changed(obj, firstload = 0)
{
	// <?php if($edit["mode"] == "add") { ?>
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

	if($(obj).val() == 'Kas')
	{
		$('#kas').val(1);
		$('#bank').val(0);
		$('#giro').val(0);
	}
	else if($(obj).val() == 'Bank')
	{
		$('#kas').val(0);
		$('#bank').val(1);
		$('#giro').val(0);
	}
	else if($(obj).val() == 'Giro')
	{
		$('#kas').val(0);
		$('#bank').val(0);
		$('#giro').val(1);
	}
	else
	{
		$('#kas').val(0);
		$('#bank').val(0);
		$('#giro').val(0);
	}
	if(firstload == 0)
		browse_clear('master_account_kasbank');
	
	if($(obj).val() == 'Giro')
	{
		$('.giro_section').show();
	}
	else
	{
		$('.giro_section').hide();
	}
}

// function load_grid_detail()
// {	
	
// 	var no  = $('#relasinomor').val();
// 	var nov = $('#browse_master_currency_hidden').val();
// 	var tanggal= $('#tanggal').val();

// 	var pages = 'pages/grid_load.php?id=<?=$edit["detail"][0]["grid_id"]?>-load&no='+no+'&nov='+nov+'&tanggal='+tanggal;
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
	var tanggal = $('#tanggal').val();
	
	var no = $('#nomormhrelasi').val();

	var pages = 'pages/grid_load.php?id=uang_keluar_utama_detail-load&no='+no+'';
	jQuery(<?=$grid_elm[0]?>).jqGrid('setGridParam',
	{
		url:pages,
		datatype:'json',
		loadComplete:function(data)
		{
			<?=$grid_str[0]?>_load = 0;
			actGridComplete_<?=$grid_str[0]?>();
			sum_subtotal_<?=$grid_str[0]?>();
		}
	});
	jQuery(<?=$grid_elm[0]?>).trigger('reloadGrid');
}

function calculate_all()
{
	<?php if($edit["mode"] != "view") { ?>
	var kurs= $("#kurs").val();
	var total = jQuery(<?=$grid_elm[0]?>).jqGrid('getCol','subtotal',false,'sum')/kurs;
	
	$('#total').val(total);
	$('#total_idr').val(total*kurs);
	
	var bayar = $('#bayar').val();
	bayar = bayar*1;
	
	var total=$('#total').val();
	var selisih = total - bayar;
	// if(selisih < 0)
	// 	selisih = selisih * -1;
	$('#selisih').val(selisih);
	
	var total_selisih = jQuery(<?=$grid_elm[1]?>).jqGrid('getCol','subtotal',false,'sum');
	$('#total_selisih').val(total_selisih);
	
	var total_idr = total * kurs;
	var bayar_idr = bayar * kurs;
	var selisih_idr = selisih * kurs;
	var total_selisih_idr = total_selisih * kurs;
	
	$('#bayar_idr').val(bayar_idr);
	$('#total_idr').val(total_idr);
	$('#selisih_idr').val(selisih_idr);
	$('#total_selisih_idr').val(total_selisih_idr);
	<?php } ?>
}
function checkHeader()
{
	var fields = [
		'tanggal|Tanggal',
		'browse_master_currency_hidden|Valuta',
		'browse_master_relasi_hidden|Supplier'
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
	
	var check_failed = '';
	
	var metode = $('#metode').val();
	var giro_ref = $('#giro_ref').val();
	var giro_tempo = $('#giro_tempo').val();
	
	if(metode == 'Giro' && giro_ref == '')
	 	check_failed += '- Ref Giro wajib diisi\n\n';
	if(metode == 'Giro' && giro_tempo == '')
	 	check_failed += '- Jatuh Tempo Giro wajib diisi\n\n';
	
	var selisih = $('#selisih').val();
	var total_selisih = $('#total_selisih').val();
	// if(selisih > total_selisih || selisih < total_selisih)
	//  	check_failed += '- Selisih tidak cocok\n\n';
	
	if(check_failed != '')
		alert(check_failed);
	else
		return true;
}
$(document).ready(function() {

});
<?=generate_function_checkgrid($grid_str)?>
<?=generate_function_checkunique($grid_str)?>
<?=generate_function_realgrid($grid_str)?>
</script>